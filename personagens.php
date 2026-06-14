<?php
session_start();
require_once __DIR__ . '/include/db.php';

$user = $_SESSION['user'] ?? null;
$isLoggedIn = is_array($user) && !empty($user['id']);
$isAdmin = $isLoggedIn && (!empty($user['admin']) && $user['admin'] == 1);
$personagens = [];
$error = null;

if ($isLoggedIn) {
    try {
        $mysqli = get_db_connection();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            if ($action === 'create') {
                $nome = trim($_POST['nome'] ?? '');
                $ndp = intval($_POST['ndp'] ?? 1);
                $classe = trim($_POST['classe'] ?? '');
                $origem = trim($_POST['origem'] ?? '');
                $notasPlayer = trim($_POST['notasPlayer'] ?? '');
                $forca = intval($_POST['forca'] ?? 0);
                $agilidade = intval($_POST['agilidade'] ?? 0);
                $constituicao = intval($_POST['constituicao'] ?? 0);
                $inteligencia = intval($_POST['inteligencia'] ?? 0);
                $carisma = intval($_POST['carisma'] ?? 0);
                $resistencias = trim($_POST['resistencias'] ?? '');
                $pvMax = intval($_POST['pvMax'] ?? 0);
                $sanMax = intval($_POST['sanMax'] ?? 0);
                $pdtMax = intval($_POST['pdtMax'] ?? 0);

                $stmt = $mysqli->prepare(
                    'INSERT INTO Personagem (idUtilizador, nome, ndp, classe, origem, notasPlayer, forca, agilidade, constituicao, inteligencia, carisma, resistencias, pvMax, sanMax, pdtMax, pvAtual, sanAtual, pdtAtual) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
                );
                if (!$stmt) {
                    throw new RuntimeException('Erro ao preparar a criação de personagem.');
                }

                // set current values equal to max on creation
                $pvAtual = $pvMax;
                $sanAtual = $sanMax;
                $pdtAtual = $pdtMax;

                $stmt->bind_param(
                    'isisssiiiiisiiiiii',
                    $user['id'],
                    $nome,
                    $ndp,
                    $classe,
                    $origem,
                    $notasPlayer,
                    $forca,
                    $agilidade,
                    $constituicao,
                    $inteligencia,
                    $carisma,
                    $resistencias,
                    $pvMax,
                    $sanMax,
                    $pdtMax,
                    $pvAtual,
                    $sanAtual,
                    $pdtAtual
                );

                if (!$stmt->execute()) {
                    error_log('Personagem create error: ' . $stmt->error);
                    throw new RuntimeException('Erro ao criar nova personagem.');
                }

                $stmt->close();
                header('Location: personagens.php');
                exit;
            }

            if ($action === 'delete') {
                $personagemId = intval($_POST['personagem_id'] ?? 0);
                if ($personagemId <= 0) {
                    throw new RuntimeException('ID de personagem inválido.');
                }

                if ($isAdmin) {
                    $stmt = $mysqli->prepare('DELETE FROM Personagem WHERE id = ?');
                    if ($stmt) {
                        $stmt->bind_param('i', $personagemId);
                    }
                } else {
                    $stmt = $mysqli->prepare('DELETE FROM Personagem WHERE id = ? AND idUtilizador = ?');
                    if ($stmt) {
                        $stmt->bind_param('ii', $personagemId, $user['id']);
                    }
                }

                if (!$stmt) {
                    throw new RuntimeException('Erro ao preparar exclusão de personagem.');
                }

                if (!$stmt->execute()) {
                    throw new RuntimeException('Erro ao excluir personagem.');
                }

                $stmt->close();
                header('Location: personagens.php');
                exit;
            }
        }

        if ($isAdmin) {
            $stmt = $mysqli->prepare('SELECT * FROM Personagem ORDER BY nome');
        } else {
            $stmt = $mysqli->prepare('SELECT * FROM Personagem WHERE idUtilizador = ? ORDER BY nome');
            if ($stmt) {
                $stmt->bind_param('i', $user['id']);
            }
        }

        if (!$stmt) {
            throw new RuntimeException('Erro ao preparar a consulta de personagens.');
        }

        if (!$stmt->execute()) {
            throw new RuntimeException('Erro ao executar a consulta de personagens.');
        }

        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $personagens[] = $row;
            }
            $result->free();
        }

        $stmt->close();
        $mysqli->close();
    } catch (Throwable $e) {
        error_log('Personagens page error: ' . $e->getMessage());
        $error = 'Não foi possível carregar as personagens. Tente novamente mais tarde.';
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
        <title>Personagens</title>
    </head>
    <body>
        <?php include('templates/header.php'); ?>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title mb-4">Personagens</h1>

                            <?php if (!$isLoggedIn): ?>
                                <div class="alert alert-warning">
                                    Por favor, faça login primeiro para ver as suas personagens.
                                </div>
                            <?php else: ?>
                                <?php if ($error): ?>
                                    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                                <?php endif; ?>

                                <?php if ($isAdmin): ?>
                                    <div class="alert alert-info">Visão de administrador: a lista inclui todas as personagens.</div>
                                <?php endif; ?>

                                <!-- Character list on top -->
                                <?php if (empty($personagens)): ?>
                                    <div class="alert alert-secondary">Nenhuma personagem encontrada.</div>
                                <?php else: ?>
                                    <div class="table-responsive mb-4">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Classe</th>
                                                    <th>Origem</th>
                                                    <th>NDP</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($personagens as $personagem): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($personagem['nome']); ?></td>
                                                        <td><?php echo htmlspecialchars($personagem['classe']); ?></td>
                                                        <td><?php echo htmlspecialchars($personagem['origem']); ?></td>
                                                        <td><?php echo htmlspecialchars($personagem['ndp']); ?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="personagem.php?id=<?php echo urlencode($personagem['id']); ?>">Abrir</a>
                                                            <form method="post" class="d-inline ms-1" onsubmit="return confirm('Tem certeza que deseja excluir esta personagem?');">
                                                                <input type="hidden" name="action" value="delete">
                                                                <input type="hidden" name="personagem_id" value="<?php echo htmlspecialchars($personagem['id']); ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h2 class="h5 mb-3">Criar nova personagem</h2>
                                        <form method="post">
                                            <input type="hidden" name="action" value="create">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="nome" class="form-label">Nome</label>
                                                    <input type="text" id="nome" name="nome" class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ndp" class="form-label">NDP</label>
                                                    <input type="number" id="ndp" name="ndp" class="form-control" min="1" value="1" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="classe" class="form-label">Classe</label>
                                                    <input type="text" id="classe" name="classe" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="origem" class="form-label">Origem</label>
                                                    <input type="text" id="origem" name="origem" class="form-control" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="notasPlayer" class="form-label">Notas do jogador</label>
                                                    <textarea id="notasPlayer" name="notasPlayer" class="form-control" rows="2"></textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="forca" class="form-label">Força</label>
                                                    <input type="number" id="forca" name="forca" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="agilidade" class="form-label">Agilidade</label>
                                                    <input type="number" id="agilidade" name="agilidade" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="constituicao" class="form-label">Constituição</label>
                                                    <input type="number" id="constituicao" name="constituicao" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="inteligencia" class="form-label">Inteligência</label>
                                                    <input type="number" id="inteligencia" name="inteligencia" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="carisma" class="form-label">Carisma</label>
                                                    <input type="number" id="carisma" name="carisma" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="resistencias" class="form-label">Resistências</label>
                                                    <input type="text" id="resistencias" name="resistencias" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="pvMax" class="form-label">PV Máx</label>
                                                    <input type="number" id="pvMax" name="pvMax" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sanMax" class="form-label">SAN Máx</label>
                                                    <input type="number" id="sanMax" name="sanMax" class="form-control" min="0" value="0" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="pdtMax" class="form-label">PDT Máx</label>
                                                    <input type="number" id="pdtMax" name="pdtMax" class="form-control" min="0" value="0" required>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success">Criar personagem</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
