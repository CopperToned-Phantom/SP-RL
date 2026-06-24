<?php
session_start();
require_once __DIR__ . '/include/db.php';

$user = $_SESSION['user'] ?? null;
if (!is_array($user) || empty($user['id'])) {
    header('Location: login.php');
    exit;
}

$campanhas = [];
$error = null;
$success = null;
try {
    $mysqli = get_db_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['create_campaign'])) {
            $nome = trim($_POST['nome'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            if ($nome === '') {
                $error = 'O nome da campanha não pode ficar vazio.';
            } else {
                $campaignId = get_next_id($mysqli, 'Campanha');
                $ins = $mysqli->prepare('INSERT INTO Campanha (id, nome, descricao, notas) VALUES (?, ?, ?, ?)');
                if ($ins) {
                    $notas = '';
                    $ins->bind_param('isss', $campaignId, $nome, $descricao, $notas);
                    $ins->execute();
                    $ins->close();
                    $link = $mysqli->prepare('INSERT INTO Campanha_Utilizador (idCampanha, idUtilizador, mestre) VALUES (?, ?, 1)');
                    if ($link) {
                        $link->bind_param('ii', $campaignId, $user['id']);
                        $link->execute();
                        $link->close();
                        $success = 'Campanha criada com sucesso.';
                    }
                }
            }
        }

        if (isset($_POST['delete_campaign'])) {
            $deleteId = intval($_POST['campaign_id'] ?? 0);
            if ($deleteId > 0) {
                $check = $mysqli->prepare('SELECT mestre FROM Campanha_Utilizador WHERE idCampanha = ? AND idUtilizador = ? LIMIT 1');
                if ($check) {
                    $check->bind_param('ii', $deleteId, $user['id']);
                    $check->execute();
                    $check->store_result();
                    $check->bind_result($isMaster);
                    if ($check->fetch() && intval($isMaster) === 1) {
                        $check->close();
                        $delLink = $mysqli->prepare('DELETE FROM Campanha_Utilizador WHERE idCampanha = ?');
                        if ($delLink) {
                            $delLink->bind_param('i', $deleteId);
                            $delLink->execute();
                            $delLink->close();
                        }
                        $delCamp = $mysqli->prepare('DELETE FROM Campanha WHERE id = ?');
                        if ($delCamp) {
                            $delCamp->bind_param('i', $deleteId);
                            $delCamp->execute();
                            $delCamp->close();
                        }
                        $success = 'Campanha eliminada com sucesso.';
                    } else {
                        $error = 'Apenas o mestre pode eliminar esta campanha.';
                    }
                }
            }
        }
    }

    if (intval($user['admin']) === 1) {
        $stmt = $mysqli->prepare(
            'SELECT c.id, c.nome, c.descricao, cu.mestre
             FROM Campanha c
             LEFT JOIN Campanha_Utilizador cu ON cu.idCampanha = c.id AND cu.idUtilizador = ?
             ORDER BY c.nome ASC'
        );
        if ($stmt) {
            $stmt->bind_param('i', $user['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $campanhas[] = $row;
                }
                $result->free();
            }
            $stmt->close();
        }
    } else {
        $stmt = $mysqli->prepare(
            'SELECT c.id, c.nome, c.descricao, cu.mestre
             FROM Campanha c
             JOIN Campanha_Utilizador cu ON cu.idCampanha = c.id
             WHERE cu.idUtilizador = ?
             ORDER BY c.nome ASC'
        );
        if ($stmt) {
            $stmt->bind_param('i', $user['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $campanhas[] = $row;
                }
                $result->free();
            }
            $stmt->close();
        }
    }
    $mysqli->close();
} catch (Throwable $e) {
    error_log('Campanhas list error: ' . $e->getMessage());
    if (!$error) {
        $error = 'Não foi possível carregar as campanhas. Tente novamente mais tarde.';
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
        <title>Campanhas / Sessões</title>
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
                                    <h1 class="h3 mb-0">Campanhas</h1>
                                    <p class="text-muted mb-0">Clique em uma campanha para ver os detalhes.</p>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCampaignModal">Criar Campanha</button>
                                </div>
                            </div>

                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php elseif (empty($campanhas)): ?>
                                <div class="alert alert-info">Não há campanhas associadas a este utilizador.</div>
                            <?php else: ?>
                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                    <?php foreach ($campanhas as $campanha): ?>
                                        <div class="col">
                                            <div class="card h-100 border border-white">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title"><?php echo htmlspecialchars($campanha['nome']); ?></h5>
                                                    <p class="card-text text-muted"><?php echo nl2br(htmlspecialchars($campanha['descricao'])); ?></p>
                                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                                        <?php if (intval($campanha['mestre']) === 1): ?>
                                                            <span class="badge bg-primary">Mestre</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-secondary">Jogador</span>
                                                        <?php endif; ?>
                                                        <div class="gap-2 d-flex">
                                                            <a href="campanha.php?id=<?php echo intval($campanha['id']); ?>" class="btn btn-sm btn-outline-primary">Abrir</a>
                                                            <?php if (intval($campanha['mestre']) === 1): ?>
                                                                <form method="POST" style="display:inline;" onsubmit="return confirm('Tem a certeza que quer eliminar esta campanha?');">
                                                                    <input type="hidden" name="delete_campaign" value="1">
                                                                    <input type="hidden" name="campaign_id" value="<?php echo intval($campanha['id']); ?>">
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                                </form>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Create Campaign Modal -->
        <div class="modal fade" id="createCampaignModal" tabindex="-1" aria-labelledby="createCampaignLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCampaignLabel">Criar Nova Campanha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <?php if ($success): ?>
                                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="campaignName" class="form-label">Nome da Campanha</label>
                                <input type="text" class="form-control" id="campaignName" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="campaignDescription" class="form-label">Descrição</label>
                                <textarea class="form-control" id="campaignDescription" name="descricao" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="create_campaign" value="1" class="btn btn-success">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
