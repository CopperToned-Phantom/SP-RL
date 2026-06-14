<?php
session_start();
require_once __DIR__ . '/include/db.php';

$errors = [];
$loggedInUser = $_SESSION['user'] ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mode = $_POST['mode'] ?? 'login';
    $nome = trim($_POST['nome'] ?? '');
    $passe = trim($_POST['passe'] ?? '');

    if ($nome === '' || $passe === '') {
        $errors[] = 'Por favor, preencha o nome de utilizador e a palavra-passe.';
    } elseif ($mode === 'register' && trim($_POST['passe_confirm'] ?? '') !== $passe) {
        $errors[] = 'A confirmação da palavra-passe não coincide.';
    } else {
        try {
            $mysqli = get_db_connection();
            if ($mode === 'register') {
                $stmt = $mysqli->prepare('SELECT id FROM Utilizador WHERE nome = ? LIMIT 1');
                if ($stmt) {
                    $stmt->bind_param('s', $nome);
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $errors[] = 'O nome de utilizador já existe.';
                    }
                    $stmt->close();
                }

                if (empty($errors)) {
                    $email = trim($_POST['email'] ?? '');
                    if ($email === '') {
                        $errors[] = 'O email é obrigatório para registo.';
                    }
                }

                if (empty($errors)) {
                    $hashed = password_hash($passe, PASSWORD_DEFAULT);
                    $insertStmt = $mysqli->prepare('INSERT INTO Utilizador (nome, email, passe, admin) VALUES (?, ?, ?, 0)');
                    if ($insertStmt) {
                        $insertStmt->bind_param('sss', $nome, $email, $hashed);
                        $insertStmt->execute();
                        $newId = $insertStmt->insert_id;
                        $insertStmt->close();
                        $_SESSION['user'] = [
                            'id' => $newId,
                            'nome' => $nome,
                            'admin' => 0,
                        ];
                        header('Location: index.php');
                        exit;
                    }
                }
            } else {
                $stmt = $mysqli->prepare('SELECT id, nome, passe FROM Utilizador WHERE nome = ? LIMIT 1');
                if (!$stmt) {
                    throw new RuntimeException('Erro interno ao preparar a consulta.');
                }

                $stmt->bind_param('s', $nome);
                if (!$stmt->execute()) {
                    throw new RuntimeException('Erro interno ao executar a consulta.');
                }
                $stmt->store_result();
                $stmt->bind_result($id, $dbNome, $dbPasse);

                if ($stmt->fetch()) {
                    $dbAdmin = 0;
                    $colRes = $mysqli->query("SHOW COLUMNS FROM Utilizador LIKE 'admin'");
                    if ($colRes) {
                        if ($colRes->num_rows > 0) {
                            $colRes->free();
                            $adminStmt = $mysqli->prepare('SELECT admin FROM Utilizador WHERE id = ? LIMIT 1');
                            if ($adminStmt) {
                                $adminStmt->bind_param('i', $id);
                                $adminStmt->execute();
                                $adminStmt->bind_result($dbAdminVal);
                                if ($adminStmt->fetch()) {
                                    $dbAdmin = intval($dbAdminVal);
                                }
                                $adminStmt->close();
                            }
                        } else {
                            $colRes->free();
                        }
                    }
                    $validPassword = false;
                    if (password_verify($passe, $dbPasse)) {
                        $validPassword = true;
                    } elseif ($passe === $dbPasse) {
                        $validPassword = true;
                    }

                    if ($validPassword) {
                        if ($dbPasse === $passe || password_needs_rehash($dbPasse, PASSWORD_DEFAULT)) {
                            $newHash = password_hash($passe, PASSWORD_DEFAULT);
                            $updateStmt = $mysqli->prepare('UPDATE Utilizador SET passe = ? WHERE id = ?');
                            if ($updateStmt) {
                                $updateStmt->bind_param('si', $newHash, $id);
                                $updateStmt->execute();
                                $updateStmt->close();
                            }
                        }

                        $_SESSION['user'] = [
                            'id' => $id,
                            'nome' => $dbNome,
                            'admin' => intval($dbAdmin),
                        ];
                        header('Location: index.php');
                        exit;
                    }

                    $errors[] = 'Nome de utilizador ou palavra-passe inválidos.';
                } else {
                    $errors[] = 'Nome de utilizador ou palavra-passe inválidos.';
                }
                $stmt->close();
            }
            $mysqli->close();
        } catch (Throwable $e) {
            error_log('Login error: ' . $e->getMessage());
            $errors[] = 'Erro interno ao autenticar. Tente novamente mais tarde.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body>
        <?php include('templates/header.php'); ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Login</h1>

                            <?php if ($loggedInUser): ?>
                                <div class="alert alert-success">
                                    Bem-vindo, <strong><?php echo htmlspecialchars($loggedInUser['nome']); ?></strong>.
                                </div>
                                <p>Já está autenticado. <a href="login.php?action=logout">Terminar sessão</a></p>
                            <?php else: ?>
                                <?php if (!empty($errors)): ?>
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            <?php foreach ($errors as $error): ?>
                                                <li><?php echo htmlspecialchars($error); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php $showRegister = (isset($_GET['action']) && $_GET['action'] === 'register'); ?>
                                <?php if ($showRegister): ?>
                                    <h2 class="mb-4">Registo</h2>
                                    <form method="post" action="login.php">
                                        <input type="hidden" name="mode" value="register">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome de utilizador</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="passe" class="form-label">Palavra-passe</label>
                                            <input type="password" class="form-control" id="passe" name="passe" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="passe_confirm" class="form-label">Confirmar palavra-passe</label>
                                            <input type="password" class="form-control" id="passe_confirm" name="passe_confirm" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registar</button>
                                        <a href="login.php" class="btn btn-link">Já tenho conta</a>
                                    </form>
                                <?php else: ?>
                                    <h2 class="mb-4">Entrar</h2>
                                    <form method="post" action="login.php">
                                        <input type="hidden" name="mode" value="login">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome de utilizador</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="passe" class="form-label">Palavra-passe</label>
                                            <input type="password" class="form-control" id="passe" name="passe" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Entrar</button>
                                        <a href="login.php?action=register" class="btn btn-link">Registar</a>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
