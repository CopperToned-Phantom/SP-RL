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
$criatura = null;
$acoes = [];
$efeitos = [];

if ($id <= 0) {
    $error = 'ID de criatura inválido.';
} else {
    try {
        $mysqli = get_db_connection();

        $stmt = $mysqli->prepare(
            'SELECT nome, essencia, essenciaSec1, essenciaSec2, nomeFicha, forca, agilidade, constituicao, inteligencia, carisma, pvMax, def, resistencias, danoMental, rnMental
             FROM vw_criaturas_fichas
             WHERE nome = (SELECT nome FROM Criatura WHERE id = ? LIMIT 1)
             LIMIT 1'
        );
        if (!$stmt) {
            throw new RuntimeException('Erro ao preparar consulta da criatura.');
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $criatura = $result->fetch_assoc();
            $result->free();
        } else {
            $error = 'Criatura não encontrada.';
        }
        $stmt->close();

        if (!$error) {
            $acaoStmt = $mysqli->prepare(
                'SELECT NomeAcao AS nome, efeito FROM vw_fichas_acoes WHERE NomeCriatura = ? ORDER BY NomeAcao ASC'
            );
            if ($acaoStmt) {
                $acaoStmt->bind_param('s', $criatura['nome']);
                $acaoStmt->execute();
                $acaoResult = $acaoStmt->get_result();
                if ($acaoResult) {
                    while ($row = $acaoResult->fetch_assoc()) {
                        $acoes[] = $row;
                    }
                    $acaoResult->free();
                }
                $acaoStmt->close();
            }

            $efeitoStmt = $mysqli->prepare(
                'SELECT NomeEfeito AS nome, efeito FROM vw_fichas_efeitos WHERE NomeCriatura = ? ORDER BY NomeEfeito ASC'
            );
            if ($efeitoStmt) {
                $efeitoStmt->bind_param('s', $criatura['nome']);
                $efeitoStmt->execute();
                $efeitoResult = $efeitoStmt->get_result();
                if ($efeitoResult) {
                    while ($row = $efeitoResult->fetch_assoc()) {
                        $efeitos[] = $row;
                    }
                    $efeitoResult->free();
                }
                $efeitoStmt->close();
            }
        }

        $mysqli->close();
    } catch (Throwable $e) {
        $error = 'Não foi possível carregar a criatura. Tente novamente mais tarde.';
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
        <title>Criatura</title>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <div class="container mt-4">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php else: ?>
                <h1><?php echo htmlspecialchars($criatura['nome'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Ficha</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <?php if ($criatura['essencia'] !== null): ?>
                                    <tr><th>Essência</th><td><?php echo htmlspecialchars($criatura['essencia'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['essenciaSec1'] !== null): ?>
                                    <tr><th>Essência Secundária 1</th><td><?php echo htmlspecialchars($criatura['essenciaSec1'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['essenciaSec2'] !== null): ?>
                                    <tr><th>Essência Secundária 2</th><td><?php echo htmlspecialchars($criatura['essenciaSec2'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['nomeFicha'] !== null): ?>
                                    <tr><th>Nome da Ficha</th><td><?php echo htmlspecialchars($criatura['nomeFicha'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['forca'] !== null): ?>
                                    <tr><th>FOR</th><td><?php echo htmlspecialchars($criatura['forca'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['agilidade'] !== null): ?>
                                    <tr><th>AGI</th><td><?php echo htmlspecialchars($criatura['agilidade'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['constituicao'] !== null): ?>
                                    <tr><th>CON</th><td><?php echo htmlspecialchars($criatura['constituicao'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['inteligencia'] !== null): ?>
                                    <tr><th>INT</th><td><?php echo htmlspecialchars($criatura['inteligencia'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['carisma'] !== null): ?>
                                    <tr><th>CAR</th><td><?php echo htmlspecialchars($criatura['carisma'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['pvMax'] !== null): ?>
                                    <tr><th>PV Máx</th><td><?php echo htmlspecialchars($criatura['pvMax'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['def'] !== null): ?>
                                    <tr><th>DEF</th><td><?php echo htmlspecialchars($criatura['def'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['resistencias'] !== null): ?>
                                    <tr><th>Resistências</th><td><?php echo nl2br(htmlspecialchars($criatura['resistencias'], ENT_QUOTES, 'UTF-8')); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['danoMental'] !== null): ?>
                                    <tr><th>Dano Mental</th><td><?php echo htmlspecialchars($criatura['danoMental'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                                <?php if ($criatura['rnMental'] !== null): ?>
                                    <tr><th>RN Mental</th><td><?php echo htmlspecialchars($criatura['rnMental'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h4>Ações</h4>
                        <?php if (empty($acoes)): ?>
                            <p>Nenhuma ação encontrada.</p>
                        <?php else: ?>
                            <?php foreach ($acoes as $acao): ?>
                                <div class="card mb-2">
                                    <div class="card-header"><?php echo htmlspecialchars($acao['nome'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <div class="card-body"><p><?php echo nl2br(htmlspecialchars($acao['efeito'], ENT_QUOTES, 'UTF-8')); ?></p></div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <h4>Efeitos</h4>
                        <?php if (empty($efeitos)): ?>
                            <p>Nenhum efeito encontrado.</p>
                        <?php else: ?>
                            <?php foreach ($efeitos as $efeito): ?>
                                <div class="card mb-2">
                                    <div class="card-header"><?php echo htmlspecialchars($efeito['nome'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <div class="card-body"><p><?php echo nl2br(htmlspecialchars($efeito['efeito'], ENT_QUOTES, 'UTF-8')); ?></p></div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <a href="sistema.php" class="btn btn-secondary mt-3">Voltar ao Sistema</a>
        </div>
    </body>
</html>
