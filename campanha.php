<?php
session_start();
require_once __DIR__ . '/include/db.php';

$user = $_SESSION['user'] ?? null;
if (!is_array($user) || empty($user['id'])) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
$error = null;
$success = null;
$campanha = null;
$isMaster = false;

if ($id <= 0) {
    $error = 'Campanha inválida.';
} else {
    try {
        $mysqli = get_db_connection();
        $isAdmin = intval($user['admin']) === 1;
        
        if ($isAdmin) {
            $stmt = $mysqli->prepare(
                'SELECT c.id, c.nome, c.descricao, c.notas, COALESCE(cu.mestre, 0) as mestre
                 FROM Campanha c
                 LEFT JOIN Campanha_Utilizador cu ON cu.idCampanha = c.id AND cu.idUtilizador = ?
                 WHERE c.id = ?
                 LIMIT 1'
            );
            if (!$stmt) {
                throw new RuntimeException('Erro ao preparar consulta da campanha.');
            }
            $stmt->bind_param('ii', $user['id'], $id);
        } else {
            $stmt = $mysqli->prepare(
                'SELECT c.id, c.nome, c.descricao, c.notas, cu.mestre
                 FROM Campanha c
                 JOIN Campanha_Utilizador cu ON cu.idCampanha = c.id
                 WHERE c.id = ? AND cu.idUtilizador = ?
                 LIMIT 1'
            );
            if (!$stmt) {
                throw new RuntimeException('Erro ao preparar consulta da campanha.');
            }
            $stmt->bind_param('ii', $id, $user['id']);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $campanha = $result->fetch_assoc();
            $isMaster = intval($campanha['mestre']) === 1;
            $result->free();
        } else {
            $error = 'A campanha não existe ou não tem acesso.';
        }
        $stmt->close();

        if (!$error && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_campanha']) && $isMaster) {
                $nome = trim($_POST['nome'] ?? '');
                $descricao = trim($_POST['descricao'] ?? '');
                $notas = trim($_POST['notas'] ?? '');
                if ($nome === '') {
                    $error = 'O nome da campanha não pode ficar vazio.';
                } else {
                    $upd = $mysqli->prepare('UPDATE Campanha SET nome = ?, descricao = ?, notas = ? WHERE id = ?');
                    if ($upd) {
                        $upd->bind_param('sssi', $nome, $descricao, $notas, $id);
                        $upd->execute();
                        $upd->close();
                        $success = 'Campanha atualizada com sucesso.';
                        header('Location: campanha.php?id=' . $id);
                        exit;
                    }
                }
            }

            if (isset($_POST['create_sessao']) && $isMaster) {
                $nomeSessao = trim($_POST['nomeSessao'] ?? '');
                $numEp = intval($_POST['numEp'] ?? 0);
                $enredo = trim($_POST['enredo'] ?? '');
                $notasSessao = trim($_POST['notasSessao'] ?? '');
                if ($nomeSessao === '') {
                    $error = 'O nome da sessão não pode ficar vazio.';
                } else {
                    $sessaoId = get_next_id($mysqli, 'Sessao');
                    $ins = $mysqli->prepare('INSERT INTO Sessao (id, idCampanha, nome, numEp, enredo, notas) VALUES (?, ?, ?, ?, ?, ?)');
                    if ($ins) {
                        $ins->bind_param('iissss', $sessaoId, $id, $nomeSessao, $numEp, $enredo, $notasSessao);
                        $ins->execute();
                        $ins->close();
                        $success = 'Sessão criada com sucesso.';
                        header('Location: campanha.php?id=' . $id);
                        exit;
                    }
                }
            }

            if (isset($_POST['update_sessao']) && $isMaster) {
                $sessaoId = intval($_POST['session_id'] ?? 0);
                $nomeSessao = trim($_POST['nomeSessao'] ?? '');
                $numEp = intval($_POST['numEp'] ?? 0);
                $enredo = trim($_POST['enredo'] ?? '');
                $notasSessao = trim($_POST['notasSessao'] ?? '');
                if ($sessaoId > 0 && $nomeSessao !== '') {
                    $check = $mysqli->prepare('SELECT id FROM Sessao WHERE id = ? AND idCampanha = ? LIMIT 1');
                    if ($check) {
                        $check->bind_param('ii', $sessaoId, $id);
                        $check->execute();
                        $check->store_result();
                        if ($check->num_rows > 0) {
                            $check->close();
                            $upd = $mysqli->prepare('UPDATE Sessao SET nome = ?, numEp = ?, enredo = ?, notas = ? WHERE id = ?');
                            if ($upd) {
                                $upd->bind_param('sisis', $nomeSessao, $numEp, $enredo, $notasSessao, $sessaoId);
                                $upd->execute();
                                $upd->close();
                                $success = 'Sessão atualizada com sucesso.';
                                header('Location: campanha.php?id=' . $id);
                                exit;
                            }
                        } else {
                            $error = 'Sessão não encontrada para esta campanha.';
                        }
                    }
                } else {
                    $error = 'Dados inválidos para atualizar a sessão.';
                }
            }

            if (isset($_POST['add_player']) && $isMaster) {
                $playerNome = trim($_POST['player_nome'] ?? '');
                if ($playerNome === '') {
                    $error = 'O nome do utilizador não pode ficar vazio.';
                } else {
                    $userStmt = $mysqli->prepare('SELECT id FROM Utilizador WHERE nome = ? LIMIT 1');
                    if ($userStmt) {
                        $userStmt->bind_param('s', $playerNome);
                        $userStmt->execute();
                        $userStmt->store_result();
                        $userStmt->bind_result($playerId);
                        if ($userStmt->fetch()) {
                            $userStmt->close();
                            $exists = $mysqli->prepare('SELECT 1 FROM Campanha_Utilizador WHERE idCampanha = ? AND idUtilizador = ? LIMIT 1');
                            if ($exists) {
                                $exists->bind_param('ii', $id, $playerId);
                                $exists->execute();
                                $exists->store_result();
                                if ($exists->num_rows > 0) {
                                    $error = 'O utilizador já faz parte desta campanha.';
                                } else {
                                    $exists->close();
                                    $ins = $mysqli->prepare('INSERT INTO Campanha_Utilizador (idCampanha, idUtilizador, mestre) VALUES (?, ?, 0)');
                                    if ($ins) {
                                        $ins->bind_param('ii', $id, $playerId);
                                        $ins->execute();
                                        $ins->close();
                                        $success = 'Utilizador adicionado como jogador.';
                                        header('Location: campanha.php?id=' . $id);
                                        exit;
                                    }
                                }
                            }
                        } else {
                            $userStmt->close();
                            $error = 'Utilizador não encontrado.';
                        }
                    }
                }
            }
        }

        $sessions = [];
        if (!$error) {
            $sessionStmt = $mysqli->prepare('SELECT id, nome, numEp, enredo, notas FROM Sessao WHERE idCampanha = ? ORDER BY numEp ASC, nome ASC');
            if ($sessionStmt) {
                $sessionStmt->bind_param('i', $id);
                $sessionStmt->execute();
                $sessionResult = $sessionStmt->get_result();
                if ($sessionResult) {
                    while ($row = $sessionResult->fetch_assoc()) {
                        $sessions[] = $row;
                    }
                    $sessionResult->free();
                }
                $sessionStmt->close();
            }
        }

        $members = [];
        if (!$error) {
            $memberStmt = $mysqli->prepare(
                'SELECT u.id, u.nome, cu.mestre
                 FROM Campanha_Utilizador cu
                 JOIN Utilizador u ON u.id = cu.idUtilizador
                 WHERE cu.idCampanha = ?
                 ORDER BY cu.mestre DESC, u.nome ASC'
            );
            if ($memberStmt) {
                $memberStmt->bind_param('i', $id);
                $memberStmt->execute();
                $memberResult = $memberStmt->get_result();
                if ($memberResult) {
                    while ($row = $memberResult->fetch_assoc()) {
                        $members[] = $row;
                    }
                    $memberResult->free();
                }
                $memberStmt->close();
            }
        }

        $mysqli->close();
    } catch (Throwable $e) {
        error_log('Campanha detalhe error: ' . $e->getMessage());
        if (!$error) {
            $error = 'Erro ao carregar a campanha. Tente novamente mais tarde.';
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
        <title><?php echo htmlspecialchars($campanha['nome'] ?? 'Campanha', ENT_QUOTES, 'UTF-8'); ?></title>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h1 class="h3 mb-0">Detalhes da Campanha</h1>
                                    <p class="text-muted mb-0">Todas as informações e sessões desta campanha.</p>
                                </div>
                                <a href="campanhas.php" class="btn btn-secondary">Voltar</a>
                            </div>

                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php else: ?>
                                <?php if (!empty($success)): ?>
                                    <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                                <?php endif; ?>

                                <div class="mb-4">
                                    <h2><?php echo htmlspecialchars($campanha['nome']); ?></h2>
                                    <p><?php echo nl2br(htmlspecialchars($campanha['descricao'])); ?></p>
                                </div>

                                <?php if ($isMaster): ?>
                                    <div class="border rounded p-3 mb-4">
                                        <h5>Editar campanha</h5>
                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Nome</label>
                                                <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($campanha['nome']); ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Descrição</label>
                                                <textarea name="descricao" class="form-control" rows="4"><?php echo htmlspecialchars($campanha['descricao']); ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Notas</label>
                                                <textarea name="notas" class="form-control" rows="3"><?php echo htmlspecialchars($campanha['notas']); ?></textarea>
                                            </div>
                                            <button type="submit" name="update_campanha" value="1" class="btn btn-primary">Guardar campanha</button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="border rounded p-3 mb-4 bg-light text-dark">
                                        <strong>Você é jogador nesta campanha.</strong>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="border rounded p-3 mb-4">
                                            <h5>Participantes</h5>
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($members as $member): ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <?php echo htmlspecialchars($member['nome']); ?>
                                                        <?php if (intval($member['mestre']) === 1): ?>
                                                            <span class="badge bg-primary">Mestre</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-secondary">Jogador</span>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <?php if ($isMaster): ?>
                                            <div class="border rounded p-3 mb-4">
                                                <h5>Adicionar jogador</h5>
                                                <form method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nome do utilizador</label>
                                                        <input type="text" name="player_nome" class="form-control" required>
                                                    </div>
                                                    <button type="submit" name="add_player" value="1" class="btn btn-primary">Adicionar jogador</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="border rounded p-3 mb-4">
                                            <h5>Sessões</h5>
                                            <?php if (empty($sessions)): ?>
                                                <p class="text-muted">Ainda não existem sessões nesta campanha.</p>
                                            <?php else: ?>
                                                <?php foreach ($sessions as $session): ?>
                                                    <div class="border rounded p-3 mb-3 bg-dark text-white">
                                                        <h6 class="mb-2"><?php echo htmlspecialchars($session['nome']); ?> <small class="text-muted">Ep <?php echo htmlspecialchars($session['numEp']); ?></small></h6>
                                                        <p><?php echo nl2br(htmlspecialchars($session['enredo'])); ?></p>
                                                        <?php if (!empty($session['notas'])): ?>
                                                            <p><strong>Notas:</strong><br><?php echo nl2br(htmlspecialchars($session['notas'])); ?></p>
                                                        <?php endif; ?>
                                                        <?php if ($isMaster): ?>
                                                            <details class="text-start">
                                                                <summary class="text-white">Editar sessão</summary>
                                                                <form method="post" class="mt-3">
                                                                    <input type="hidden" name="session_id" value="<?php echo intval($session['id']); ?>">
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Nome da sessão</label>
                                                                        <input type="text" name="nomeSessao" class="form-control" value="<?php echo htmlspecialchars($session['nome']); ?>" required>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Número de episódio</label>
                                                                        <input type="number" name="numEp" class="form-control" value="<?php echo intval($session['numEp']); ?>">
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Enredo</label>
                                                                        <textarea name="enredo" class="form-control" rows="3"><?php echo htmlspecialchars($session['enredo']); ?></textarea>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label class="form-label">Notas da sessão</label>
                                                                        <textarea name="notasSessao" class="form-control" rows="2"><?php echo htmlspecialchars($session['notas']); ?></textarea>
                                                                    </div>
                                                                    <button type="submit" name="update_sessao" value="1" class="btn btn-sm btn-light">Guardar sessão</button>
                                                                </form>
                                                            </details>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>

                                        <?php if ($isMaster): ?>
                                            <div class="border rounded p-3 mb-4">
                                                <h5>Criar nova sessão</h5>
                                                <form method="post">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nome da sessão</label>
                                                        <input type="text" name="nomeSessao" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Número de episódio</label>
                                                        <input type="number" name="numEp" class="form-control" value="1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Enredo</label>
                                                        <textarea name="enredo" class="form-control" rows="3"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Notas</label>
                                                        <textarea name="notasSessao" class="form-control" rows="2"></textarea>
                                                    </div>
                                                    <button type="submit" name="create_sessao" value="1" class="btn btn-primary">Criar sessão</button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
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
