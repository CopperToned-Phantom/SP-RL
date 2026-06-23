<?php
session_start();
require_once __DIR__ . '/include/db.php';

$user = $_SESSION['user'] ?? null;
$isLoggedIn = is_array($user) && !empty($user['id']);
$isAdmin = $isLoggedIn && (!empty($user['admin']) && $user['admin'] == 1);
$error = null;
$personagem = null;

if (!$isLoggedIn) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    $error = 'ID de personagem inválido.';
} else {
    // handle saving entire personagem if submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_personagem'])) {
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
        $pvAtual = intval($_POST['pvAtual'] ?? $pvMax);
        $sanAtual = intval($_POST['sanAtual'] ?? $sanMax);
        $pdtAtual = intval($_POST['pdtAtual'] ?? $pdtMax);

        try {
            $m2 = get_db_connection();
            if ($isAdmin) {
                $up = $m2->prepare('UPDATE Personagem SET nome = ?, ndp = ?, classe = ?, origem = ?, notasPlayer = ?, forca = ?, agilidade = ?, constituicao = ?, inteligencia = ?, carisma = ?, resistencias = ?, pvAtual = ?, pvMax = ?, sanAtual = ?, sanMax = ?, pdtAtual = ?, pdtMax = ? WHERE id = ?');
                if ($up) {
                    $up->bind_param('sisssiiiiisiiiiiii', $nome, $ndp, $classe, $origem, $notasPlayer, $forca, $agilidade, $constituicao, $inteligencia, $carisma, $resistencias, $pvAtual, $pvMax, $sanAtual, $sanMax, $pdtAtual, $pdtMax, $id);
                    $up->execute();
                    $up->close();
                }
            } else {
                $up = $m2->prepare('UPDATE Personagem SET nome = ?, ndp = ?, classe = ?, origem = ?, notasPlayer = ?, forca = ?, agilidade = ?, constituicao = ?, inteligencia = ?, carisma = ?, resistencias = ?, pvAtual = ?, pvMax = ?, sanAtual = ?, sanMax = ?, pdtAtual = ?, pdtMax = ? WHERE id = ? AND idUtilizador = ?');
                if ($up) {
                    $up->bind_param('sisssiiiiisiiiiiiii', $nome, $ndp, $classe, $origem, $notasPlayer, $forca, $agilidade, $constituicao, $inteligencia, $carisma, $resistencias, $pvAtual, $pvMax, $sanAtual, $sanMax, $pdtAtual, $pdtMax, $id, $user['id']);
                    $up->execute();
                    $up->close();
                }
            }
            $m2->close();
            header('Location: personagem.php?id=' . $id);
            exit;
        } catch (Throwable $e) {
            $error = 'Não foi possível guardar a personagem. Tente novamente mais tarde.';
        }
    }

    try {
        $mysqli = get_db_connection();
        if ($isAdmin) {
            $stmt = $mysqli->prepare('SELECT * FROM Personagem WHERE id = ? LIMIT 1');
            $stmt->bind_param('i', $id);
        } else {
            $stmt = $mysqli->prepare('SELECT * FROM Personagem WHERE id = ? AND idUtilizador = ? LIMIT 1');
            $stmt->bind_param('ii', $id, $user['id']);
        }

        if (!$stmt) {
            throw new RuntimeException('Erro ao preparar a consulta de personagem.');
        }

        if (!$stmt->execute()) {
            throw new RuntimeException('Erro ao executar a consulta de personagem.');
        }

        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $personagem = $result->fetch_assoc();
            $result->free();
        } else {
            $error = 'Personagem não encontrada ou não autorizada.';
        }

        $stmt->close();
        $mysqli->close();
    } catch (Throwable $e) {
        $error = 'Não foi possível carregar a personagem. Tente novamente mais tarde.';
    }
}
// handle add/remove connections (after personagem loaded and authorized)
if (empty($error) && $personagem && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $m4 = get_db_connection();
        $isOwner = (!$isAdmin && isset($personagem['idUtilizador']) && $personagem['idUtilizador'] == $user['id']);
        $allowed = $isAdmin || $isOwner;

        if (!$allowed) {
            throw new RuntimeException('Não autorizado a modificar esta personagem.');
        }
        // remove handlers
        if (isset($_POST['remove_item'])) {
            $refId = intval($_POST['remove_item'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_Equip WHERE idPerso = ? AND idEquip = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['remove_item_custom'])) {
            $refId = intval($_POST['remove_item_custom'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_EquipCustom WHERE idPerso = ? AND idEquipCustom = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }

        if (isset($_POST['remove_magia'])) {
            $refId = intval($_POST['remove_magia'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_Magia WHERE idPerso = ? AND idMagia = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['remove_magia_custom'])) {
            $refId = intval($_POST['remove_magia_custom'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_MagiaCustom WHERE idPerso = ? AND idMagiaCustom = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }

        if (isset($_POST['remove_poder'])) {
            $refId = intval($_POST['remove_poder'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_Poder WHERE idPerso = ? AND idPoder = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['remove_poder_custom'])) {
            $refId = intval($_POST['remove_poder_custom'] ?? 0);
            if ($refId > 0) {
                $del = $m4->prepare('DELETE FROM Perso_PoderCustom WHERE idPerso = ? AND idPoderCustom = ? LIMIT 1');
                if ($del) { $del->bind_param('ii', $personagem['id'], $refId); $del->execute(); $del->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }

        // add handlers
        if (isset($_POST['add_item'])) {
            $equipId = intval($_POST['equip_id'] ?? 0);
            $quantia = intval($_POST['quantia'] ?? 1);
            if ($equipId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_Equip (idPerso, idEquip, quantia) VALUES (?, ?, ?)');
                if ($ins) { $ins->bind_param('iii', $personagem['id'], $equipId, $quantia); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['add_item_custom'])) {
            $equipId = intval($_POST['equip_custom_id'] ?? 0);
            $quantia = intval($_POST['quantia_custom'] ?? 1);
            if ($equipId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_EquipCustom (idPerso, idEquipCustom, quantia) VALUES (?, ?, ?)');
                if ($ins) { $ins->bind_param('iii', $personagem['id'], $equipId, $quantia); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }

        if (isset($_POST['add_magia'])) {
            $magiaId = intval($_POST['magia_id'] ?? 0);
            $tipo = trim($_POST['magia_tipo'] ?? '');
            if ($magiaId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_Magia (idPerso, idMagia, tipo) VALUES (?, ?, ?)');
                if ($ins) { $ins->bind_param('iis', $personagem['id'], $magiaId, $tipo); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['add_magia_custom'])) {
            $magiaId = intval($_POST['magia_custom_id'] ?? 0);
            $tipo = trim($_POST['magia_custom_tipo'] ?? '');
            if ($magiaId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_MagiaCustom (idPerso, idMagiaCustom, tipo) VALUES (?, ?, ?)');
                if ($ins) { $ins->bind_param('iis', $personagem['id'], $magiaId, $tipo); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }

        if (isset($_POST['add_poder'])) {
            $poderId = intval($_POST['poder_id'] ?? 0);
            if ($poderId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_Poder (idPerso, idPoder) VALUES (?, ?)');
                if ($ins) { $ins->bind_param('ii', $personagem['id'], $poderId); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
        if (isset($_POST['add_poder_custom'])) {
            $poderId = intval($_POST['poder_custom_id'] ?? 0);
            if ($poderId > 0) {
                $ins = $m4->prepare('INSERT INTO Perso_PoderCustom (idPerso, idPoderCustom) VALUES (?, ?)');
                if ($ins) { $ins->bind_param('ii', $personagem['id'], $poderId); $ins->execute(); $ins->close(); }
            }
            $m4->close(); header('Location: personagem.php?id=' . $personagem['id']); exit;
        }
    } catch (Throwable $e) {
        error_log('Personagem add-connection error: ' . $e->getMessage());
        $error = 'Não foi possível adicionar a ligação. Tente novamente mais tarde.';
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
        <title><?php echo htmlspecialchars($personagem['nome'] ?? 'Personagem', ENT_QUOTES, 'UTF-8'); ?></title>
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
                                    <h1 class="h3 mb-0">Detalhes da Personagem</h1>
                                    <p class="text-muted mb-0">Visualize os dados completos da personagem selecionada.</p>
                                </div>
                                <a href="personagens.php" class="btn btn-secondary">Voltar</a>
                            </div>

                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php elseif ($personagem): ?>
                                <form method="post">
                                    <div class="row g-3">
                                        <div class="col-md-6 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Nome</strong></label>
                                            <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($personagem['nome']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>NDP</strong></label>
                                            <input type="number" name="ndp" class="form-control" value="<?php echo htmlspecialchars($personagem['ndp']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Classe</strong></label>
                                            <input type="text" name="classe" class="form-control" value="<?php echo htmlspecialchars($personagem['classe']); ?>">
                                        </div>
                                        <div class="col-md-6 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Origem</strong></label>
                                            <input type="text" name="origem" class="form-control" value="<?php echo htmlspecialchars($personagem['origem']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Força</strong></label>
                                            <input type="number" name="forca" class="form-control" value="<?php echo htmlspecialchars($personagem['forca']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Agilidade</strong></label>
                                            <input type="number" name="agilidade" class="form-control" value="<?php echo htmlspecialchars($personagem['agilidade']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Constituição</strong></label>
                                            <input type="number" name="constituicao" class="form-control" value="<?php echo htmlspecialchars($personagem['constituicao']); ?>">
                                        </div>
                                        <div class="col-md-3 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Inteligência</strong></label>
                                            <input type="number" name="inteligencia" class="form-control" value="<?php echo htmlspecialchars($personagem['inteligencia']); ?>">
                                        </div>
                                        <div class="col-md-4 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Carisma</strong></label>
                                            <input type="number" name="carisma" class="form-control" value="<?php echo htmlspecialchars($personagem['carisma']); ?>">
                                        </div>
                                        <div class="col-md-8 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>Resistências</strong></label>
                                            <textarea name="resistencias" class="form-control" rows="3"><?php echo htmlspecialchars($personagem['resistencias']); ?></textarea>
                                        </div>
                                        <div class="col-md-4 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>PV</strong></label>
                                            <div class="fraction-input">
                                                <input type="number" name="pvAtual" class="form-control" value="<?php echo htmlspecialchars($personagem['pvAtual'] ?? $personagem['pvMax'] ?? 0); ?>">
                                                <div class="fraction-divider">/</div>
                                                <input type="number" name="pvMax" class="form-control" value="<?php echo htmlspecialchars($personagem['pvMax']); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>SAN</strong></label>
                                            <div class="fraction-input">
                                                <input type="number" name="sanAtual" class="form-control" value="<?php echo htmlspecialchars($personagem['sanAtual'] ?? $personagem['sanMax'] ?? 0); ?>">
                                                <div class="fraction-divider">/</div>
                                                <input type="number" name="sanMax" class="form-control" value="<?php echo htmlspecialchars($personagem['sanMax']); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 border rounded p-3 mb-3">
                                            <label class="form-label"><strong>PDT</strong></label>
                                            <div class="fraction-input">
                                                <input type="number" name="pdtAtual" class="form-control" value="<?php echo htmlspecialchars($personagem['pdtAtual'] ?? $personagem['pdtMax'] ?? 0); ?>">
                                                <div class="fraction-divider">/</div>
                                                <input type="number" name="pdtMax" class="form-control" value="<?php echo htmlspecialchars($personagem['pdtMax']); ?>">
                                            </div>
                                        </div>
                                        </div>

                                        <?php
                                        // load related lists from views (filter by personagemNome)
                                        $itens = [];
                                        $magias = [];
                                        $poderes = [];
                                        try {
                                            $m3 = get_db_connection();

                                            // fetch equipamento (base)
                                            $q = $m3->prepare('SELECT pe.idEquip AS refId, pe.quantia, e.nome AS nomeItem, e.dano, e.critico, e.modCritico, e.alcance, e.propriedades, e.efeito, e.tipo FROM Perso_Equip pe JOIN Equipamento e ON pe.idEquip = e.id WHERE pe.idPerso = ?');
                                            if ($q) {
                                                $q->bind_param('i', $personagem['id']);
                                                $q->execute();
                                                $res = $q->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'base'; $itens[] = $r; } $res->free(); }
                                                $q->close();
                                            }
                                            // fetch equipamento custom
                                            $qc = $m3->prepare('SELECT pec.idEquipCustom AS refId, pec.quantia, ec.nome AS nomeItem, ec.dano, ec.critico, ec.modCritico, ec.alcance, ec.propriedades, ec.efeito, ec.tipo FROM Perso_EquipCustom pec JOIN EquipamentoCustom ec ON pec.idEquipCustom = ec.id WHERE pec.idPerso = ?');
                                            if ($qc) {
                                                $qc->bind_param('i', $personagem['id']);
                                                $qc->execute();
                                                $res = $qc->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'custom'; $itens[] = $r; } $res->free(); }
                                                $qc->close();
                                            }

                                            // fetch magias base
                                            $qm = $m3->prepare('SELECT pm.idMagia AS refId, m.nome AS magiaNome, m.essencia, m.tempoExec, m.custo, m.efeito, m.requisitos, pm.tipo FROM Perso_Magia pm JOIN Magia m ON pm.idMagia = m.id WHERE pm.idPerso = ?');
                                            if ($qm) {
                                                $qm->bind_param('i', $personagem['id']);
                                                $qm->execute();
                                                $res = $qm->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'base'; $magias[] = $r; } $res->free(); }
                                                $qm->close();
                                            }
                                            // fetch magias custom
                                            $qmc = $m3->prepare('SELECT pmc.idMagiaCustom AS refId, mc.nome AS magiaNome, mc.essencia, mc.tempoExec, mc.custo, mc.efeito, mc.requisitos, pmc.tipo FROM Perso_MagiaCustom pmc JOIN MagiaCustom mc ON pmc.idMagiaCustom = mc.id WHERE pmc.idPerso = ?');
                                            if ($qmc) {
                                                $qmc->bind_param('i', $personagem['id']);
                                                $qmc->execute();
                                                $res = $qmc->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'custom'; $magias[] = $r; } $res->free(); }
                                                $qmc->close();
                                            }

                                            // fetch poderes base
                                            $qp = $m3->prepare('SELECT pp.idPoder AS refId, p.nome AS nomePoder, p.essencia, p.tipo, p.efeito, p.requisitos FROM Perso_Poder pp JOIN Poder p ON pp.idPoder = p.id WHERE pp.idPerso = ?');
                                            if ($qp) {
                                                $qp->bind_param('i', $personagem['id']);
                                                $qp->execute();
                                                $res = $qp->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'base'; $poderes[] = $r; } $res->free(); }
                                                $qp->close();
                                            }
                                            // fetch poderes custom
                                            $qpc = $m3->prepare('SELECT ppc.idPoderCustom AS refId, pc.nome AS nomePoder, pc.essencia, pc.tipo, pc.efeito, pc.requisitos FROM Perso_PoderCustom ppc JOIN PoderCustom pc ON ppc.idPoderCustom = pc.id WHERE ppc.idPerso = ?');
                                            if ($qpc) {
                                                $qpc->bind_param('i', $personagem['id']);
                                                $qpc->execute();
                                                $res = $qpc->get_result();
                                                if ($res) { while ($r = $res->fetch_assoc()) { $r['src'] = 'custom'; $poderes[] = $r; } $res->free(); }
                                                $qpc->close();
                                            }

                                            $m3->close();
                                    
                                            // also fetch selectable lists for add-forms
                                            $m4 = get_db_connection();
                                            $equipList = [];
                                            $res = $m4->query('SELECT id, nome FROM Equipamento ORDER BY nome');
                                            if ($res) { while ($r = $res->fetch_assoc()) { $equipList[] = $r; } $res->free(); }
                                            $equipCustomList = [];
                                            $stmt = $m4->prepare('SELECT id, nome FROM EquipamentoCustom WHERE idUtilizador = ? ORDER BY nome');
                                            if ($stmt) { $stmt->bind_param('i', $user['id']); $stmt->execute(); $res = $stmt->get_result(); if ($res) { while ($r = $res->fetch_assoc()) { $equipCustomList[] = $r; } $res->free(); } $stmt->close(); }

                                            $magiaList = [];
                                            $res = $m4->query('SELECT id, nome FROM Magia ORDER BY nome');
                                            if ($res) { while ($r = $res->fetch_assoc()) { $magiaList[] = $r; } $res->free(); }
                                            $magiaCustomList = [];
                                            $stmt = $m4->prepare('SELECT id, nome FROM MagiaCustom WHERE idUtilizador = ? ORDER BY nome');
                                            if ($stmt) { $stmt->bind_param('i', $user['id']); $stmt->execute(); $res = $stmt->get_result(); if ($res) { while ($r = $res->fetch_assoc()) { $magiaCustomList[] = $r; } $res->free(); } $stmt->close(); }

                                            $poderList = [];
                                            $res = $m4->query('SELECT id, nome FROM Poder ORDER BY nome');
                                            if ($res) { while ($r = $res->fetch_assoc()) { $poderList[] = $r; } $res->free(); }
                                            $poderCustomList = [];
                                            $stmt = $m4->prepare('SELECT id, nome FROM PoderCustom WHERE idUtilizador = ? ORDER BY nome');
                                            if ($stmt) { $stmt->bind_param('i', $user['id']); $stmt->execute(); $res = $stmt->get_result(); if ($res) { while ($r = $res->fetch_assoc()) { $poderCustomList[] = $r; } $res->free(); } $stmt->close(); }

                                            $m4->close();
                                        } catch (Throwable $e) {
                                            error_log('Personagem related-views error: ' . $e->getMessage());
                                        }
                                        ?>

                                        <div class="row g-3 mt-3">
                                            <div class="col-12 border rounded p-3 mb-3">
                                                <h5>Equipamento</h5>
                                                <?php if (empty($itens)): ?>
                                                    <div class="text-muted">Nenhum equipamento ligado a esta personagem.</div>
                                                <?php else: ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome</th>
                                                                    <th>Quantia</th>
                                                                    <th>Dano</th>
                                                                    <th>Crítico</th>
                                                                    <th>Alcance</th>
                                                                    <th>Propriedades</th>
                                                                    <th>Tipo</th>
                                                                    <th>Efeito</th>
                                                                    <th>Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($itens as $it): ?>
                                                                    <tr>
                                                                        <td><?php echo htmlspecialchars($it['nomeItem']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['quantia']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['dano']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['critico']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['alcance']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['propriedades']); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['tipo'] ?? ''); ?></td>
                                                                        <td><?php echo htmlspecialchars($it['efeito'] ?? ''); ?></td>
                                                                        <td>
                                                                            <div class="d-inline">
                                                                                <?php if (!empty($it['src']) && $it['src'] === 'custom'): ?>
                                                                                    <button type="submit" name="remove_item_custom" value="<?php echo htmlspecialchars($it['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php else: ?>
                                                                                    <button type="submit" name="remove_item" value="<?php echo htmlspecialchars($it['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                                
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="d-flex gap-3">
                                                    <div class="d-flex align-items-end">
                                                        <div>
                                                            <label class="form-label">Adicionar equipamento</label>
                                                            <select name="equip_id" class="form-select">
                                                                <?php foreach ($equipList ?? [] as $e): ?>
                                                                    <option value="<?php echo $e['id']; ?>"><?php echo htmlspecialchars($e['nome']); ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Quantia</label>
                                                            <input type="number" name="quantia" class="form-control" value="1" min="1">
                                                        </div>
                                                        <div class="align-self-end">
                                                            <button type="submit" name="add_item" value="1" class="btn btn-sm btn-primary">Adicionar</button>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-end">
                                                        <div>
                                                            <label class="form-label">Adicionar equipamento custom</label>
                                                            <select name="equip_custom_id" class="form-select">
                                                                <?php foreach ($equipCustomList ?? [] as $e): ?>
                                                                    <option value="<?php echo $e['id']; ?>"><?php echo htmlspecialchars($e['nome']); ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label class="form-label">Quantia</label>
                                                            <input type="number" name="quantia_custom" class="form-control" value="1" min="1">
                                                        </div>
                                                        <div class="align-self-end">
                                                            <button type="submit" name="add_item_custom" value="1" class="btn btn-sm btn-secondary">Adicionar custom</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 border rounded p-3 mb-3">
                                                <h5>Magias</h5>
                                                <?php if (empty($magias)): ?>
                                                    <div class="text-muted">Nenhuma magia ligada a esta personagem.</div>
                                                <?php else: ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome</th>
                                                                    <th>Essência</th>
                                                                    <th>Tempo</th>
                                                                    <th>Custo</th>
                                                                    <th>Tipo</th>
                                                                    <th>Efeito</th>
                                                                    <th>Requisitos</th>
                                                                    <th>Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($magias as $mg): ?>
                                                                    <tr>
                                                                        <td><?php echo htmlspecialchars($mg['magiaNome']); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['essencia']); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['tempoExec']); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['custo']); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['tipo']); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['efeito'] ?? ''); ?></td>
                                                                        <td><?php echo htmlspecialchars($mg['requisitos'] ?? ''); ?></td>
                                                                        <td>
                                                                            <div class="d-inline">
                                                                                <?php if (!empty($mg['src']) && $mg['src'] === 'custom'): ?>
                                                                                    <button type="submit" name="remove_magia_custom" value="<?php echo htmlspecialchars($mg['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php else: ?>
                                                                                    <button type="submit" name="remove_magia" value="<?php echo htmlspecialchars($mg['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-12 mb-3">
                                                    <div class="d-flex gap-3">
                                                        <div class="d-flex align-items-end">
                                                            <div>
                                                                <label class="form-label">Adicionar magia</label>
                                                                <select name="magia_id" class="form-select">
                                                                    <?php foreach ($magiaList ?? [] as $mga): ?>
                                                                        <option value="<?php echo $mga['id']; ?>"><?php echo htmlspecialchars($mga['nome']); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Tipo</label>
                                                                <input type="text" name="magia_tipo" class="form-control">
                                                            </div>
                                                            <div class="align-self-end">
                                                                <button type="submit" name="add_magia" value="1" class="btn btn-sm btn-primary">Adicionar</button>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-end">
                                                            <div>
                                                                <label class="form-label">Adicionar magia custom</label>
                                                                <select name="magia_custom_id" class="form-select">
                                                                    <?php foreach ($magiaCustomList ?? [] as $mga): ?>
                                                                        <option value="<?php echo $mga['id']; ?>"><?php echo htmlspecialchars($mga['nome']); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label class="form-label">Tipo</strong></label>
                                                                <input type="text" name="magia_custom_tipo" class="form-control">
                                                            </div>
                                                            <div class="align-self-end">
                                                                <button type="submit" name="add_magia_custom" value="1" class="btn btn-sm btn-secondary">Adicionar custom</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 border rounded p-3 mb-3">
                                                <h5>Poderes</h5>
                                                <?php if (empty($poderes)): ?>
                                                    <div class="text-muted">Nenhum poder ligado a esta personagem.</div>
                                                <?php else: ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome</th>
                                                                    <th>Essência</th>
                                                                    <th>Tipo</th>
                                                                    <th>Efeito</th>
                                                                    <th>Requisitos</th>
                                                                    <th>Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($poderes as $pd): ?>
                                                                    <tr>
                                                                        <td><?php echo htmlspecialchars($pd['nomePoder']); ?></td>
                                                                        <td><?php echo htmlspecialchars($pd['essencia']); ?></td>
                                                                        <td><?php echo htmlspecialchars($pd['tipo']); ?></td>
                                                                        <td><?php echo htmlspecialchars($pd['efeito'] ?? ''); ?></td>
                                                                        <td><?php echo htmlspecialchars($pd['requisitos'] ?? ''); ?></td>
                                                                        <td>
                                                                            <div class="d-inline">
                                                                                <?php if (!empty($pd['src']) && $pd['src'] === 'custom'): ?>
                                                                                    <button type="submit" name="remove_poder_custom" value="<?php echo htmlspecialchars($pd['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php else: ?>
                                                                                    <button type="submit" name="remove_poder" value="<?php echo htmlspecialchars($pd['refId']); ?>" class="btn btn-sm btn-danger">Remover</button>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                                <div class="col-12 mb-3">
                                                    <div class="d-flex gap-3">
                                                        <div class="d-flex align-items-end">
                                                            <div>
                                                                <label class="form-label">Adicionar poder</label>
                                                                <select name="poder_id" class="form-select">
                                                                    <?php foreach ($poderList ?? [] as $pd): ?>
                                                                        <option value="<?php echo $pd['id']; ?>"><?php echo htmlspecialchars($pd['nome']); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="align-self-end">
                                                                <button type="submit" name="add_poder" value="1" class="btn btn-sm btn-primary">Adicionar</button>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex align-items-end">
                                                            <div>
                                                                <label class="form-label">Adicionar poder custom</label>
                                                                <select name="poder_custom_id" class="form-select">
                                                                    <?php foreach ($poderCustomList ?? [] as $pd): ?>
                                                                        <option value="<?php echo $pd['id']; ?>"><?php echo htmlspecialchars($pd['nome']); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="align-self-end">
                                                                <button type="submit" name="add_poder_custom" value="1" class="btn btn-sm btn-secondary">Adicionar custom</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="border rounded p-3 mt-3">
                                            <label class="form-label"><strong>Notas do jogador</strong></label>
                                            <textarea name="notasPlayer" class="form-control" rows="6"><?php echo htmlspecialchars($personagem['notasPlayer']); ?></textarea>
                                        </div>

                                    <div class="mt-3">
                                        <button type="submit" name="save_personagem" value="1" class="btn btn-primary">Guardar alterações</button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <div class="alert alert-secondary">Nenhuma informação de personagem disponível.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
