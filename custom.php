<?php
session_start();
require_once __DIR__ . '/include/db.php';

$user = $_SESSION['user'] ?? null;
if (!is_array($user) || empty($user['id'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
$success = null;
$equipamentos = [];
$magias = [];
$poderes = [];
$editEquip = ['id' => 0, 'nome' => '', 'tipo' => '', 'dano' => '', 'critico' => '', 'modCritico' => '', 'alcance' => '', 'propriedades' => '', 'efeito' => ''];
$editMagia = ['id' => 0, 'nome' => '', 'essencia' => '', 'tempoExec' => '', 'custo' => 0, 'efeito' => '', 'requisitos' => ''];
$editPoder = ['id' => 0, 'nome' => '', 'tipo' => '', 'essencia' => '', 'efeito' => '', 'requisitos' => ''];

try {
    $mysqli = get_db_connection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_equip'])) {
            $nome = trim($_POST['equip_nome'] ?? '');
            $tipo = trim($_POST['equip_tipo'] ?? '');
            $dano = trim($_POST['equip_dano'] ?? '');
            $critico = trim($_POST['equip_critico'] ?? '');
            $modCritico = trim($_POST['equip_modCritico'] ?? '');
            $alcance = trim($_POST['equip_alcance'] ?? '');
            $propriedades = trim($_POST['equip_propriedades'] ?? '');
            $efeito = trim($_POST['equip_efeito'] ?? '');

            if ($nome === '' || $tipo === '') {
                $errors[] = 'Nome e tipo de equipamento são obrigatórios.';
            } else {
                $stmt = $mysqli->prepare(
                    'INSERT INTO EquipamentoCustom (idUtilizador, nome, dano, critico, modCritico, alcance, propriedades, efeito, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
                );
                if ($stmt) {
                    $stmt->bind_param('issssssss', $user['id'], $nome, $dano, $critico, $modCritico, $alcance, $propriedades, $efeito, $tipo);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Equipamento custom criado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a criação de equipamento custom.';
                }
            }
        }

        if (isset($_POST['add_magia'])) {
            $nome = trim($_POST['magia_nome'] ?? '');
            $essencia = trim($_POST['magia_essencia'] ?? '');
            $tempoExec = trim($_POST['magia_tempoExec'] ?? '');
            $custo = intval($_POST['magia_custo'] ?? 0);
            $efeito = trim($_POST['magia_efeito'] ?? '');
            $requisitos = trim($_POST['magia_requisitos'] ?? '');

            if ($nome === '' || $essencia === '' || $tempoExec === '') {
                $errors[] = 'Nome, essência e tempo de execução da magia são obrigatórios.';
            } else {
                $stmt = $mysqli->prepare(
                    'INSERT INTO MagiaCustom (idUtilizador, nome, essencia, tempoExec, custo, efeito, requisitos) VALUES (?, ?, ?, ?, ?, ?, ?)'
                );
                if ($stmt) {
                    $stmt->bind_param('issisis', $user['id'], $nome, $essencia, $tempoExec, $custo, $efeito, $requisitos);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Magia custom criada com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a criação de magia custom.';
                }
            }
        }

        if (isset($_POST['add_poder'])) {
            $nome = trim($_POST['poder_nome'] ?? '');
            $tipo = trim($_POST['poder_tipo'] ?? '');
            $essencia = trim($_POST['poder_essencia'] ?? '');
            $efeito = trim($_POST['poder_efeito'] ?? '');
            $requisitos = trim($_POST['poder_requisitos'] ?? '');

            if ($nome === '' || $tipo === '' || $efeito === '') {
                $errors[] = 'Nome, tipo e efeito do poder são obrigatórios.';
            } else {
                $stmt = $mysqli->prepare(
                    'INSERT INTO PoderCustom (idUtilizador, nome, efeito, essencia, tipo, requisitos) VALUES (?, ?, ?, ?, ?, ?)'
                );
                if ($stmt) {
                    $stmt->bind_param('isssss', $user['id'], $nome, $efeito, $essencia, $tipo, $requisitos);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Poder custom criado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a criação de poder custom.';
                }
            }
        }

        if (isset($_POST['update_equip'])) {
            $equipId = intval($_POST['equip_id'] ?? 0);
            $nome = trim($_POST['equip_nome'] ?? '');
            $tipo = trim($_POST['equip_tipo'] ?? '');
            $dano = trim($_POST['equip_dano'] ?? '');
            $critico = trim($_POST['equip_critico'] ?? '');
            $modCritico = trim($_POST['equip_modCritico'] ?? '');
            $alcance = trim($_POST['equip_alcance'] ?? '');
            $propriedades = trim($_POST['equip_propriedades'] ?? '');
            $efeito = trim($_POST['equip_efeito'] ?? '');

            if ($equipId <= 0 || $nome === '' || $tipo === '') {
                $errors[] = 'Nome, tipo e ID de equipamento são obrigatórios para atualizar.';
            } else {
                $stmt = $mysqli->prepare(
                    'UPDATE EquipamentoCustom SET nome = ?, tipo = ?, dano = ?, critico = ?, modCritico = ?, alcance = ?, propriedades = ?, efeito = ? WHERE id = ? AND idUtilizador = ?'
                );
                if ($stmt) {
                    $stmt->bind_param('ssssssssii', $nome, $tipo, $dano, $critico, $modCritico, $alcance, $propriedades, $efeito, $equipId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Equipamento custom atualizado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a atualização de equipamento custom.';
                }
            }
        }

        if (isset($_POST['update_magia'])) {
            $magiaId = intval($_POST['magia_id'] ?? 0);
            $nome = trim($_POST['magia_nome'] ?? '');
            $essencia = trim($_POST['magia_essencia'] ?? '');
            $tempoExec = trim($_POST['magia_tempoExec'] ?? '');
            $custo = intval($_POST['magia_custo'] ?? 0);
            $efeito = trim($_POST['magia_efeito'] ?? '');
            $requisitos = trim($_POST['magia_requisitos'] ?? '');

            if ($magiaId <= 0 || $nome === '' || $essencia === '' || $tempoExec === '') {
                $errors[] = 'Nome, essência, tempo de execução e ID de magia são obrigatórios para atualizar.';
            } else {
                $stmt = $mysqli->prepare(
                    'UPDATE MagiaCustom SET nome = ?, essencia = ?, tempoExec = ?, custo = ?, efeito = ?, requisitos = ? WHERE id = ? AND idUtilizador = ?'
                );
                if ($stmt) {
                    $stmt->bind_param('sssisiii', $nome, $essencia, $tempoExec, $custo, $efeito, $requisitos, $magiaId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Magia custom atualizada com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a atualização de magia custom.';
                }
            }
        }

        if (isset($_POST['update_poder'])) {
            $poderId = intval($_POST['poder_id'] ?? 0);
            $nome = trim($_POST['poder_nome'] ?? '');
            $tipo = trim($_POST['poder_tipo'] ?? '');
            $essencia = trim($_POST['poder_essencia'] ?? '');
            $efeito = trim($_POST['poder_efeito'] ?? '');
            $requisitos = trim($_POST['poder_requisitos'] ?? '');

            if ($poderId <= 0 || $nome === '' || $tipo === '' || $efeito === '') {
                $errors[] = 'Nome, tipo, efeito e ID de poder são obrigatórios para atualizar.';
            } else {
                $stmt = $mysqli->prepare(
                    'UPDATE PoderCustom SET nome = ?, tipo = ?, essencia = ?, efeito = ?, requisitos = ? WHERE id = ? AND idUtilizador = ?'
                );
                if ($stmt) {
                    $stmt->bind_param('ssssiii', $nome, $tipo, $essencia, $efeito, $requisitos, $poderId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Poder custom atualizado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a atualização de poder custom.';
                }
            }
        }

        if (isset($_POST['delete_equip'])) {
            $equipId = intval($_POST['delete_equip'] ?? 0);
            if ($equipId > 0) {
                $stmt = $mysqli->prepare('DELETE FROM EquipamentoCustom WHERE id = ? AND idUtilizador = ?');
                if ($stmt) {
                    $stmt->bind_param('ii', $equipId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Equipamento custom eliminado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a eliminação do equipamento custom.';
                }
            }
        }

        if (isset($_POST['delete_magia'])) {
            $magiaId = intval($_POST['delete_magia'] ?? 0);
            if ($magiaId > 0) {
                $stmt = $mysqli->prepare('DELETE FROM MagiaCustom WHERE id = ? AND idUtilizador = ?');
                if ($stmt) {
                    $stmt->bind_param('ii', $magiaId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Magia custom eliminada com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a eliminação da magia custom.';
                }
            }
        }

        if (isset($_POST['delete_poder'])) {
            $poderId = intval($_POST['delete_poder'] ?? 0);
            if ($poderId > 0) {
                $stmt = $mysqli->prepare('DELETE FROM PoderCustom WHERE id = ? AND idUtilizador = ?');
                if ($stmt) {
                    $stmt->bind_param('ii', $poderId, $user['id']);
                    $stmt->execute();
                    $stmt->close();
                    $success = 'Poder custom eliminado com sucesso.';
                } else {
                    $errors[] = 'Falha ao preparar a eliminação do poder custom.';
                }
            }
        }
    }

    $equipStmt = $mysqli->prepare('SELECT id, nome, tipo, dano, critico, modCritico, alcance, propriedades, efeito FROM EquipamentoCustom WHERE idUtilizador = ? ORDER BY nome ASC');
    if ($equipStmt) {
        $equipStmt->bind_param('i', $user['id']);
        $equipStmt->execute();
        $equipResult = $equipStmt->get_result();
        if ($equipResult) {
            while ($row = $equipResult->fetch_assoc()) {
                $equipamentos[] = $row;
            }
            $equipResult->free();
        }
        $equipStmt->close();
    }

    $magiaStmt = $mysqli->prepare('SELECT id, nome, essencia, tempoExec, custo, efeito, requisitos FROM MagiaCustom WHERE idUtilizador = ? ORDER BY nome ASC');
    if ($magiaStmt) {
        $magiaStmt->bind_param('i', $user['id']);
        $magiaStmt->execute();
        $magiaResult = $magiaStmt->get_result();
        if ($magiaResult) {
            while ($row = $magiaResult->fetch_assoc()) {
                $magias[] = $row;
            }
            $magiaResult->free();
        }
        $magiaStmt->close();
    }

    $poderStmt = $mysqli->prepare('SELECT id, nome, tipo, essencia, efeito, requisitos FROM PoderCustom WHERE idUtilizador = ? ORDER BY nome ASC');
    if ($poderStmt) {
        $poderStmt->bind_param('i', $user['id']);
        $poderStmt->execute();
        $poderResult = $poderStmt->get_result();
        if ($poderResult) {
            while ($row = $poderResult->fetch_assoc()) {
                $poderes[] = $row;
            }
            $poderResult->free();
        }
        $poderStmt->close();
    }

    $mysqli->close();
} catch (Throwable $e) {
    error_log('Custom page error: ' . $e->getMessage());
    $errors[] = 'Erro ao carregar a página de customização. Tente novamente mais tarde.';
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <title>Customização</title>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-0">Customização</h1>
                        <p class="text-muted mb-0">Crie equipamentos, magias e poderes customizados.</p>
                    </div>
                    <a href="index.php" class="btn btn-secondary">Voltar</a>
                </div>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="card h-100 border border-white">
                        <div class="card-body">
                            <h5 class="card-title">Novo Equipamento Custom</h5>
                            <form method="post">
                                <input type="hidden" name="add_equip" value="1">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="equip_nome" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <input type="text" name="equip_tipo" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Dano</label>
                                    <input type="text" name="equip_dano" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Crítico</label>
                                    <input type="text" name="equip_critico" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mod. Crítico</label>
                                    <input type="text" name="equip_modCritico" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alcance</label>
                                    <input type="text" name="equip_alcance" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Propriedades</label>
                                    <textarea name="equip_propriedades" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Efeito</label>
                                    <textarea name="equip_efeito" class="form-control" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Criar equipamento</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100 border border-white">
                        <div class="card-body">
                            <h5 class="card-title">Nova Magia Custom</h5>
                            <form method="post">
                                <input type="hidden" name="add_magia" value="1">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="magia_nome" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Essência</label>
                                    <input type="text" name="magia_essencia" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempo de Execução</label>
                                    <input type="text" name="magia_tempoExec" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Custo</label>
                                    <input type="number" name="magia_custo" class="form-control" value="0" min="0">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Efeito</label>
                                    <textarea name="magia_efeito" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Requisitos</label>
                                    <textarea name="magia_requisitos" class="form-control" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Criar magia</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100 border border-white">
                        <div class="card-body">
                            <h5 class="card-title">Novo Poder Custom</h5>
                            <form method="post">
                                <input type="hidden" name="add_poder" value="1">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="poder_nome" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label>
                                    <input type="text" name="poder_tipo" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Essência</label>
                                    <input type="text" name="poder_essencia" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Efeito</label>
                                    <textarea name="poder_efeito" class="form-control" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Requisitos</label>
                                    <textarea name="poder_requisitos" class="form-control" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Criar poder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4 mb-4">
                    <div class="card border border-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Equipamentos custom</h5>
                            <?php if (empty($equipamentos)): ?>
                                <p class="text-muted">Nenhum equipamento custom criado ainda.</p>
                            <?php else: ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($equipamentos as $item): ?>
                                        <li class="list-group-item bg-dark text-white">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <strong><?php echo htmlspecialchars($item['nome']); ?></strong> — <?php echo htmlspecialchars($item['tipo']); ?><br>
                                                    <?php if ($item['dano'] !== null && $item['dano'] !== ''): ?>Dano: <?php echo htmlspecialchars($item['dano']); ?><br><?php endif; ?>
                                                    <?php if ($item['critico'] !== null && $item['critico'] !== ''): ?>Crítico: <?php echo htmlspecialchars($item['critico']); ?><br><?php endif; ?>
                                                    <?php if ($item['alcance'] !== null && $item['alcance'] !== ''): ?>Alcance: <?php echo htmlspecialchars($item['alcance']); ?><br><?php endif; ?>
                                                </div>
                                                <div class="text-end">
                                                    <form method="post" class="d-inline">
                                                        <input type="hidden" name="delete_equip" value="<?php echo intval($item['id']); ?>">
                                                        <button type="submit" class="btn btn-sm btn-secondary">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card border border-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Magias custom</h5>
                            <?php if (empty($magias)): ?>
                                <p class="text-muted">Nenhuma magia custom criada ainda.</p>
                            <?php else: ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($magias as $item): ?>
                                        <li class="list-group-item bg-dark text-white">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <strong><?php echo htmlspecialchars($item['nome']); ?></strong> — <?php echo htmlspecialchars($item['essencia']); ?><br>
                                                    Tempo: <?php echo htmlspecialchars($item['tempoExec']); ?>, Custo: <?php echo intval($item['custo']); ?>
                                                </div>
                                                <div class="text-end">
                                                    <form method="post" class="d-inline">
                                                        <input type="hidden" name="delete_magia" value="<?php echo intval($item['id']); ?>">
                                                        <button type="submit" class="btn btn-sm btn-secondary">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card border border-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Poderes custom</h5>
                            <?php if (empty($poderes)): ?>
                                <p class="text-muted">Nenhum poder custom criado ainda.</p>
                            <?php else: ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($poderes as $item): ?>
                                        <li class="list-group-item bg-dark text-white">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <strong><?php echo htmlspecialchars($item['nome']); ?></strong> — <?php echo htmlspecialchars($item['tipo']); ?><br>
                                                    <?php if ($item['essencia'] !== null && $item['essencia'] !== ''): ?>Essência: <?php echo htmlspecialchars($item['essencia']); ?><br><?php endif; ?>
                                                </div>
                                                <div class="text-end">
                                                    <form method="post" class="d-inline">
                                                        <input type="hidden" name="delete_poder" value="<?php echo intval($item['id']); ?>">
                                                        <button type="submit" class="btn btn-sm btn-secondary">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
