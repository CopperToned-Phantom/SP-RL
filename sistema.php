<?php
require_once __DIR__ . '/include/db.php';

$criaturas = [];
try {
    $mysqli = get_db_connection();
    $stmt = $mysqli->prepare('SELECT id, nome FROM Criatura ORDER BY nome ASC');
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $criaturas[] = $row;
            }
            $result->free();
        }
        $stmt->close();
    }
    $mysqli->close();
} catch (Throwable $e) {
    // ignore database load errors for bestiário section
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Sistema "Suprenima"</title>
    </head>

    <body>
        <!-- HEADER -->
        <?php include('templates/header.php'); ?>

        <br>
        
        <h1> -- Sistema </h1>

        <aside class="aside-sistema">
            <h2> Quick Access.. </h2>
            <ul>
                <li>
                    <a href="#RegrasBasicas" class="b_cont"> Regras Básicas </a>
                </li>
                <li>
                    <a href="#CriaPerso" class="b_cont"> Criação de Personagem </a>
                </li>
                <li>
                    <a href="#Equipamento" class="b_cont"> Equipamento </a>
                </li>
                <li>
                    <a href="#OutraRegra" class="b_cont"> Outras Regras </a>
                </li>
                <li>
                    <a href="#Espiral" class="b_cont"> A Espiral </a>
                </li>
                <li>
                    <a href="#Essencias" class="b_cont"> Essências do Desconhecido </a>
                </li>
            </ul>        
        </aside>

        <aside style="width : 80vw; position : absolute; left : 15vw; right : 0;">
                
            <!-- REGRAS BASICAS -->
            <h2 align="center" id="RegrasBasicas"> Regras Básicas </h2> <br>

            <div align="center">
                <button command="show-modal" commandfor="testes" class="btn btn-outline-light btn-lg">Testes</button>
                <button command="show-modal" commandfor="distancias" class="btn btn-outline-light btn-lg">Distâncias</button>
            </div>

            <br><br>
            
            <!-- CRIACAO DE PERSONAGEM -->
            <h2 align="center" id="CriaPerso"> Criação de Personagem </h2> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseCriacao" class="btn btn-outline-light btn-lg">Criação Base</button>
                <button command="show-modal" commandfor="listaOrigens" class="btn btn-outline-light btn-lg"> Lista Origens</button>
            </div>

            <br>

            <h3 align="center"> Classes </h3>
            <h4 align="center"> Cultista </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseCultista" class="btn btn-outline-light btn-lg">Base</button>
            </div> <br>
            <h4 align="center"> Feiticeiro </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseFeiticeiro" class="btn btn-outline-light btn-lg">Base</button>
            </div> <br>
            <h4 align="center"> Lutador </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseLutador" class="btn btn-outline-light btn-lg">Base</button>
                <button command="show-modal" commandfor="habilLutador" class="btn btn-outline-light btn-lg">Habilidades</button>
            </div> <br>
            <h4 align="center"> Ritualista </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseRitualista" class="btn btn-outline-light btn-lg">Base</button>
            </div> <br>
            <h4 align="center"> Técnico </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseTecnico" class="btn btn-outline-light btn-lg">Base</button>
                <button command="show-modal" commandfor="habilTecnico" class="btn btn-outline-light btn-lg">Habilidades</button>
            </div> <br>
            
            <br>

            <h3 align="center"> Magias </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="baseMagia" class="btn btn-outline-light btn-lg">Magia Base</button>
                <button command="show-modal" commandfor="listaMagias" class="btn btn-outline-light btn-lg">Lista de Magias</button>
            </div>

            <br>

            <h3 align="center"> Outras Habilidades </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="aptidoes" class="btn btn-outline-light btn-lg">Aptidões</button>
                <button command="show-modal" commandfor="habilGerais" class="btn btn-outline-light btn-lg">Habilidades Gerais</button>
                <button command="show-modal" commandfor="recomAssi" class="btn btn-outline-light btn-lg">Recompensas por Assimilação</button>
            </div>

            <br><br>

            <!-- EQUIPAMENTO -->
            <h2 align="center" id="Equipamento"> Equipamento </h2> <br>

            <div align="center">
                <button command="show-modal" commandfor="listaArma" class="btn btn-outline-light btn-lg">Lista de Armas</button>
                <button command="show-modal" commandfor="propArma" class="btn btn-outline-light btn-lg">Propriedades Armas</button>
                <button command="show-modal" commandfor="listaUten" class="btn btn-outline-light btn-lg">Lista de Utensílios</button>
            </div>

            <br><br>
            
            <!-- OUTRAS REGRAS -->
            <h2 align="center" id="OutraRegra"> Outras Regras </h2> <br>
            
            <h3 align="center"> Tipos de Cena </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="cenaCombate" class="btn btn-outline-light btn-lg">Cenas de Combate</button>
                <button command="show-modal" commandfor="cenaDebate" class="btn btn-outline-light btn-lg">Cenas de Debate</button>
                <button command="show-modal" commandfor="cenaDuelo" class="btn btn-outline-light btn-lg">Cenas de Duelo de Vontades</button>
                <button command="show-modal" commandfor="cenaFurti" class="btn btn-outline-light btn-lg">Cenas de Furtividade</button>
                <button command="show-modal" commandfor="cenaGuerra" class="btn btn-outline-light btn-lg">Cenas de Guerra de Vontades</button>
                <button command="show-modal" commandfor="cenaInteracao" class="btn btn-outline-light btn-lg">Cenas de Interação</button>
                <button command="show-modal" commandfor="cenaInterludio" class="btn btn-outline-light btn-lg">Cenas de Interlúdio</button>
                <button command="show-modal" commandfor="cenaInvesti" class="btn btn-outline-light btn-lg">Cenas de Investigação</button>
                <button command="show-modal" commandfor="cenaJornada" class="btn btn-outline-light btn-lg">Cenas de Jornada</button>
                <button command="show-modal" commandfor="cenaPerigo" class="btn btn-outline-light btn-lg">Cenas de Perigo Complexo</button>
                <button command="show-modal" commandfor="cenaPersegu" class="btn btn-outline-light btn-lg">Cenas de Perseguição</button>
            </div> <br>

            <h3 align="center"> Regras Extra </h3> <br>

            <div align="center">
                <button command="show-modal" commandfor="dificilTerreno" class="btn btn-outline-light btn-lg">Dificuldades de Terreno</button>
                <button command="show-modal" commandfor="EfeitoLouco" class="btn btn-outline-light btn-lg">Efeitos de Loucura</button>
                <button command="show-modal" commandfor="EstadoTrauma" class="btn btn-outline-light btn-lg">Estados e Traumas</button>
                <button command="show-modal" commandfor="Fagulha" class="btn btn-outline-light btn-lg">Fagulha Inversa</button>
                <button command="show-modal" commandfor="Profici" class="btn btn-outline-light btn-lg">Proficiências</button>
                <button command="show-modal" commandfor="RegrasCriatura" class="btn btn-outline-light btn-lg">Regras Criaturas/Máquinas</button>
                <button command="show-modal" commandfor="TipoDano" class="btn btn-outline-light btn-lg">Tipos de Dano</button>
            </div> <br>

            <!-- A ESPIRAL -->
            <h1 align = "center" id="Espiral"> A Espiral </h1> <br>
            <p align = "center"> 
                A Espiral do Desconhecido é o começo de tudo, todas as realidades existentes, universos, mundos, existem nessa grande espiral, uma espiral com 6 longos braços, cada um representando uma das Essências do Desconhecido e demonstrando a sua infinita influência.
                Essa vasta espiral expande-se sem um fim alcançável ou concebível, do seu ponto de origem saem infinitos fios, como os de uma grande teia, cada fio uma realidade, um universo, realidades essas distorcidas pela influência das 6 essências, pela influência do Desconhecido, resultando em manifestações que consideramos impossíveis, magias, criaturas e outros eventos impossíveis, tudo causado pela existência da mente humana e pela forma como a espiral a consegue distorcer, alimentando-se dela. 
            </p> <br>

            <h2 align = "center" id="Essencias"> Essências do Desconhecido </h2> <br>
            <div align="center">
                <button command="show-modal" commandfor="Apostasia" class="btn btn-outline-light btn-lg">Apostasia</button>
                <button command="show-modal" commandfor="Caos" class="btn btn-outline-light btn-lg">Caos</button>
                <button command="show-modal" commandfor="Carnica" class="btn btn-outline-light btn-lg">Carniça</button>
                <button command="show-modal" commandfor="Energia" class="btn btn-outline-light btn-lg">Energia</button>
                <button command="show-modal" commandfor="Obscuro" class="btn btn-outline-light btn-lg">Obscuro</button>
                <button command="show-modal" commandfor="Sabedoria" class="btn btn-outline-light btn-lg">Sabedoria</button>
                <button command="show-modal" commandfor="Tempo" class="btn btn-outline-light btn-lg">Tempo</button>
                <button command="show-modal" commandfor="bestiario" class="btn btn-outline-light btn-lg">Bestiário</button>
            </div> <br>
            
        
        </aside>


        <!-- DIALOGS -->
        <dialog id="testes" class="">
            <p>Sempre que um ser tenta fazer uma ação com uma chance de falhar, ele deve girar um <em>Teste</em>.</p>
            <p>Antes de girar, o <em>Mestre</em> deve decidir 4 coisas :</p>
            <ul>
                <li><strong>Atributo</strong> - O <em>Atributo</em> que mais se encaixa no teste, por exemplo, um teste para arrombar uma porta com um chute seria um teste com <strong>FOR</strong>, para tentar notar a presença de alguém escondido, seria com <strong>INT</strong>.</li>
                <li><strong>Tipo de Teste</strong> - Este sistema, diferente de muitos, não possui <em>Perícias</em> ou algo similar, ao invés disso existem <em>Tipos de Teste</em>, cada um tendo um atributo comumente associado com ele, o <em>Mestre</em> então escolhe qual tipo de teste se encaixa melhor pra situação. Pode também escolher fazer um teste sem tipo, um teste puro dum atributo.</li>
                <li><strong>Modificadores</strong> - Além dos modificadores que os <em>Atributos</em> garantem, o ser pode ganhar um modificador extra, dependendo da situação, podendo ser positivo ou negativo, adicionando ou retirando um valor definido ao resultado final. Pode também ganhar uma <em>Vantagem</em> ou <em>Desvantagem</em>.
                Por exemplo, um ser que tente arrombar uma porta já danificada com um chute teria um modificador de +2. Por norma, usa-se 2 para uma dificuldade/facilidade pequena, 4 para uma dificuldade/facilidade média e 6 para uma dificuldade/facilidade grande e <em>Desvantagem</em>/<em>Vantagem</em> para uma dificuldade/facilidade extrema.</li>
                <li><strong>RN (Resultado Necessário)</strong> - O valor que o ser precisa tirar no total para obter um sucesso, quanto mais alto o número, mais difícil. Pode escolher dizer ou não a <strong>RN</strong> ao ser que vai fazer o teste.</li>
            </ul>
            <p>Depois de decidir isso, o <em>Mestre</em> pede o teste e o ser gira.
            O que girar
            Todo o teste segue a seguinte fórmula :</p>
            <blockquote>
                <p>2d12 + Modificador do Atributo + Bónus de Aptidões + Outro</p>
            </blockquote>
            <p>Depois de juntar tudo, o ser obtém o resultado do teste, se o resultado for maior ou igual ao <strong>RN</strong> do teste, o ser passa.</p>
            <h2 id="exemplo">Exemplo</h2>
            <p>Seguindo um dos exemplos anteriores, se um personagem com origem <em>Criminoso</em> e com 2 de <strong>FOR</strong>, tentar arrombar uma porta com um chute, o <em>Mestre</em> pede um teste de <em>Crime</em> feito com <strong>FOR</strong>, o personagem então gira 2d12+8(2d12+4(<strong>FOR</strong>)+4(Aptidão da Origem)), obtendo 22 no total, o <strong>RN</strong> que o <em>Mestre</em> decidiu era 15, logo o ser passa e consegue arrombar a porta.</p>
            <h1 id="vantagens-e-desvantagens">Vantagens e Desvantagens</h1>
            <p>No caso de uma alta dificuldade/facilidade durante um teste, é possível o teste sofrer duma <em>Vantagem</em> ou <em>Desvantagem</em>. <em>Vantagens</em> e <em>Desvantagens</em> funcionam de forma extremamente similar, em ambos os casos, o ser gira o <em>Teste</em> uma vez a mais, anotando ambos os valores obtidos, no caso de uma <em>Vantagem</em>, ficando com o mais alto, no caso de uma <em>Desvantagem</em>, ficando com o mais baixo. Se o ser possui mais que uma <em>Vantagem</em>/<em>Desvantagem</em>, ele gira uma vez a mais para cada <em>Vantagem</em>/<em>Desvantagem</em> que possuir, ficando na mesma com o valor mais alto/baixo dependendo de qual for.</p>
            <h2 id="exemplo">Exemplo</h2>
            <p>Se um ser possuir 2 <em>Vantagens</em> num <em>Teste</em>, ele gira 3 vezes(1 vez para o <em>Teste</em> normal e +1 para cada <em>Vantagem</em>), ficando com o resultado mais alto dos 3.</p>
            <h1 >Testes de Conflito</h1>
            <p><em>Testes de Conflito</em> são <em>Testes</em> girados simultaneamente por 2 ou mais seres ao mesmo tempo. Segue a mesma lógica que <em>Testes</em> normais, o <em>Mestre</em> decide o que cada um girará e ambos giram, aquele que tirar o maior resultado, ganha. No caso de um empate, o ser que tiver o papel ativo/ofensivo na situação ganha.</p>
            <h1 id="tipos-de-teste">Tipos de Teste</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th></th>
                    <th>Atributo Associado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Ciências</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Conexão</strong></td>
                        <td><strong>INT</strong>/<strong>CAR</strong>/<strong>CON</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Crime</strong></td>
                        <td><strong>INT</strong>/<strong>FOR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Diplomacia</strong></td>
                        <td><strong>CAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Enganação</strong></td>
                        <td><strong>CAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Furtividade</strong></td>
                        <td><strong>AGI</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Iniciativa</strong></td>
                        <td><strong>AGI</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Intimidação</strong></td>
                        <td><strong>CAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Intuição</strong></td>
                        <td><strong>CAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Investigação</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Luta</strong></td>
                        <td><strong>FOR</strong>/<strong>AGI</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Medicina</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Perceção</strong></td>
                        <td><strong>INT</strong>/<strong>CAR</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Pilotagem</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Pontaria</strong></td>
                        <td><strong>AGI</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Sobrevivência</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Tática</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Tecnologia</strong></td>
                        <td><strong>INT</strong></td>
                    </tr>
                </tbody>
            </table>

            <br>
            <button commandfor="testes" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="distancias" class="">
            <p>Em certas cenas, é importante manter a distância entre os seres envolvidos em mente, um exemplo óbvio seriam cenas de combate.</p>
            <h1 id="categorias-de-dist-ncia">Categorias de Distância</h1>
            <p>Existem as seguintes <em>Categorias de Distância</em>(de menor distância para maior) : <em>Corpo-a-Corpo</em>, <em>Curto</em>, <em>Médio</em>, <em>Longo</em>, <em>Extremo</em>, <em>Extremo + x</em>.
            Passar de <em>Longo</em> para <em>Extremo</em>, diferente do habitual, requer 2 ações de movimento. A partir disso, cada subida de categoria é anotada ao lado do <em>Extremo</em>. Por exemplo, estar a distância <em>Extrema</em> de algo e gastar 3 ações de <em>Deslocar</em> para te afastares ainda mais leva-te à distância <em>Extremo + 3</em>.</p>
            <p>Importante destacar que estas categorias são meramente mecânicas, narrativamente, o espaço que encaixaria na descrição “Curto” ou “Médio” pode variar, tanto dependendo da cena quanto dos personagens. Narrativamente, o “Curto” de um personagem <strong>NdP</strong> 1 e o “Curto” de um personagem <strong>NdP</strong> 12 podem ser diferentes.</p>

            <br>
            <button commandfor="distancias" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="baseCriacao" class="">
            <h1 id="atributos">Atributos</h1>
            <p>Todos os seres dentro do sistema <strong><em>Suprenima</em></strong> possuem 5 atributos, sendo eles:</p>
            <ul>
            <li><em><strong>FOR(Força)</strong></em> – Representa a força física do personagem.</li>
            <li><em><strong>AGI(Agilidade)</strong></em> – Representa a velocidade, equilíbrio e tempo de reação do personagem.</li>
            <li><em><strong>CON(Constituição)</strong></em> – Representa a resistência física do personagem.</li>
            <li><em><strong>INT(Inteligência)</strong></em> – Representa a habilidade de raciocínio do personagem.</li>
            <li><em><strong>CAR(Carisma)</strong></em> – Representa a habilidade social e resistência mental do personagem.</li>
            </ul>
            <p>Todo o personagem começa com 5 pontos que pode distribuir entre os 5 atributos, no nível 1 o valor máximo por atributo é 4, a partir daí o valor máximo é 8. Também pode retirar um ponto de um atributo, ficando com -1 a esse atributo mas ganhando um ponto extra.</p>
            <h2 id="modificadores-de-atributo">Modificadores de Atributo</h2>
            <p>Testes recebem um bónus adequado ao valor do atributo usado no teste, adicionando ao teste ou valores numéricos ou dados extra. Os bónus são:</p>
            <table class="table table-bordered">
            <thead>
            <tr>
            <th><strong>Valor de Atributo</strong></th>
            <th><strong>Modificador</strong></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>-1</td>
            <td>-2</td>
            </tr>
            <tr>
            <td>0</td>
            <td>+0</td>
            </tr>
            <tr>
            <td>1</td>
            <td>+2</td>
            </tr>
            <tr>
            <td>2</td>
            <td>+4</td>
            </tr>
            <tr>
            <td>3</td>
            <td>+6</td>
            </tr>
            <tr>
            <td>4</td>
            <td>+1d12</td>
            </tr>
            <tr>
            <td>5</td>
            <td>+2d12</td>
            </tr>
            <tr>
            <td>6</td>
            <td>+3d12</td>
            </tr>
            <tr>
            <td>7</td>
            <td>+4d12</td>
            </tr>
            <tr>
            <td>8</td>
            <td>+5d12</td>
            </tr>
            </tbody>
            </table>
            <h1 id="status">Status</h1>
            <p>Todos os seres dentro do sistema Suprenima possuem 4 status, eles sendo:</p>
            <ul>
            <li><em><strong>PV(Pontos de Vida)</strong></em> – Representa o bem estar físico do personagem</li>
            <li><em><strong>SAN(Sanidade)</strong></em> – Representa o bem estar mental do personagem</li>
            <li><em><strong>PdT(Pontos de Talento)</strong></em> – Representa a quantidade de estamina/energia do personagem</li>
            <li><em><strong>DEF(Defesa)</strong></em> – Representa o quão difícil é acertar o personagem.</li>
            </ul>
            <p>No começo os status são definidos desta forma:</p>
            <table class="table table-bordered">
            <thead>
            <tr>
            <th></th>
            <th>Inicial</th>
            <th>Por Nível</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>PV</td>
            <td>10+CON*2</td>
            <td>3+CON</td>
            </tr>
            <tr>
            <td>SAN</td>
            <td>10+CAR*2</td>
            <td>2+CAR</td>
            </tr>
            <tr>
            <td>PdT</td>
            <td>10+INT*2</td>
            <td>3+INT</td>
            </tr>
            <tr>
            <td>DEF</td>
            <td>10+AGI*2+Outros bónus</td>
            <td>A forma que a DEF é definida não altera com o passar dos níveis.</td>
            </tr>
            </tbody>
            </table>
            <blockquote>
            <p>Ao chegar a 0 de PV, um ser entra no estado <em>A Falecer</em>
            Ao chegar a 0 ou menos de SAN, um ser entra no estado <em>A Enlouquecer</em>. Se for tirado desse estado, o ser ganha um <em>Efeito de Loucura</em>, só o perdendo quando a SAN ficar maior que 0.</p>
            </blockquote>
            <h1 id="n-veis-de-poder-ndp-">Níveis de Poder (NdP)</h1>
            <p>Os personagens do Sistema Suprenima possuem um NdP, uma valor que quantificar a sua força, o nível máximo é 12. O personagem recebe bónus, como habilidades e aumento dos status, com o passar dos níveis.
            Os primeiros 3 níveis oferecem os seguintes bónus:</p>
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Nível</th>
            <th>Recompensa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>1</td>
            <td>Nível inicial</td>
            </tr>
            <tr>
            <td>2</td>
            <td>Habilidade Geral</td>
            </tr>
            <tr>
            <td>3</td>
            <td>Escolha de Classe, a partir deste ponto, a recompensa dos níveis(incluindo a quantia que os status aumentam) depende da classe escolhida.</td>
            </tr>
            </tbody>
            </table>
            <blockquote>
            <p>O personagem recebe +1 ponto para Atributos e +1 proficiência <strong>TODOS OS NÍVEIS</strong>, independentemente da classe escolhida.</p>
            </blockquote>
            <h1 id="origens">Origens</h1>
            <p>Origens demonstram o que representa o personagem, aquilo que fazem (ou faziam), aquilo que eram antes da campanha começar.</p>
            <p>Ao escolher a origem, o personagem ganha o poder da mesma.</p>
            <h1 id="ordem-para-cria-o-da-ficha">Ordem para Criação da Ficha</h1>
            <p>A ordem de procedimento a seguir ao criar a ficha é a seguinte:</p>
            <ol>
            <li>Escolha da Origem</li>
            <li>Distribuição dos pontos para Atributos</li>
            <li>Definição dos modificadores de atributo e status</li>
            <li>Definição do equipamento do personagem</li>
            <li>Escolha do NdP do personagem (se for maior que 1, escolher as recompensas obtidas nível por nível)</li>
            </ol>
            <br>
            <button commandfor="baseCriacao" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="listaOrigens" class="">
            <h1 id="amn-sico">Amnésico</h1>
            <p>Tu não te recordas de nada do teu passado. As tuas únicas memórias são de momentos importantes. O mestre decide toda a vida que tiveste antes de a esqueceres.</p>
            <blockquote>
            <p><strong>O que sou?</strong> - Começas com +1 ponto de Atributo para gastar.</p>
            </blockquote>
            <h1 id="artista">Artista</h1>
            <p>Tu és uma pessoa criativa, expressando os teus pensamentos na forma de arte, seja desenhos, pinturas, musicas ou qualquer outra forma de arte.<br>Seja essa arte o teu hobby ou até o teu trabalho, fazer essa arte é a forma mais fácil de te acalmares.</p>
            <blockquote>
            <p><strong>Paixão pela Arte</strong> - Ao fazer a ação &quot;<em>Relaxar</em>&quot; numa <em>Cena de Interlúdio</em>, se praticares a tua arte, tu recuperas +1D que o normal.</p>
            </blockquote>
            <h1 id="atleta">Atleta</h1>
            <p>Tu treinas todos os dias. Por tal disciplina, apresentas um corpo mais habituado com esforço físico do que qualquer outro. Seja como um ex-atleta olímpico ou com um mero desporto de passar o tempo.</p>
            <blockquote>
            <p><strong>Flexível e Resiliente</strong> - Tu tens +2 em qualquer teste atlético. Durante uma <em>Cena de Perseguição</em>, a vantagem torna-se um bónus de +4 em <strong>AGI</strong>.</p>
            </blockquote>
            <h1 id="cidad-o">Cidadão</h1>
            <p>Tu és uma pessoa nascida de uma sociedade com normas e deveres. Trabalhos e culturas, regras e senso comum. Não passavas de um cidadão vulgar sem muita técnica nem talento natural até tudo mudar.</p>
            <blockquote>
            <p><strong>Saudade de Casa</strong> - Ao lembrar de casa, podes perder 3 de <em>SAN</em> em troca de +4 em qualquer teste de <strong>FOR</strong> ou <strong>CON</strong>, como um esforço esperançoso de voltar aos tempos antigos.</p>
            </blockquote>
            <h1 id="cientista">Cientista</h1>
            <p>Tu estudas ou estudaste ciências, tendo um conhecimento profundo do assunto, conseguindo aplicar esse conhecimento com facilidade.</p>
            <blockquote>
            <p><strong>Saber Científico</strong> - Por causa dos teus estudos, tu ganhaste um grande senso de ciências, +4 em testes de <em>Ciência</em>.</p>
            </blockquote>
            <h1 id="criminoso">Criminoso</h1>
            <p>Tu cometias ou cometes crimes como forma de vida, sendo algo que não necessariamente gostas, mas que necessitas fazer para ver o dia seguinte.</p>
            <blockquote>
            <p><strong>Ofício Ilegal</strong> - Por causa dos teus crimes recorrentes, tu aprendeste a garantir um crime bem sucedido, +4 em testes de <em>Crime</em>.</p>
            </blockquote>
            <h1 id="desprivilegiado">Desprivilegiado</h1>
            <p>Tu cresceste num ambiente pobre, tendo que fazer o máximo apenas para poder aguentar até o próximo dia.</p>
            <blockquote>
            <p><strong>Desenrascar</strong> - Por causa das tuas condições de vida, tu estás habituado a improvisar, pode gastar 7 PdT para anular uma desvantagem.</p>
            </blockquote>
            <h1 id="detetive">Detetive</h1>
            <p>Tu estudaste por anos para virar um investigador profissional, tendo um talento inato para descobrir provas.</p>
            <blockquote>
            <p>Perícia Investigativa - Tu passaste por um extenso estudo investigativo, +4 em testes de <em>Investigação</em>.</p>
            </blockquote>
            <h1 id="devoto">Devoto</h1>
            <p>Tu és um ávido crente de uma religião, tendo uma vida muito marcada e influenciada por tal religião, e tal como acreditavas, a tua fé prova-se extremamente útil.</p>
            <blockquote>
            <p><strong>Rezar</strong> - Uma vez por cena, podes gastar uma ação padrão e 7 PdT para rezar para a tua religião, pedindo auxílio divino, tu ganhas +1 em um atributo à tua escolha durante 1d3 rodadas. (Não ultrapassando o limite de 8)</p>
            </blockquote>
            <h1 id="elite">Elite</h1>
            <p>Tu és rico, seja de herança ou por mérito próprio, sabes que dinheiro dá poder. Mesmo que fiques sem esse dinheiro, o teu nome, o da tua família, transborda riqueza e reconhecimento no mundo em que vives.</p>
            <blockquote>
            <p><strong>Recompensado</strong> - Sempre recebes o dobro do dinheiro em missões ou trabalhos. Caso não exista sistema de dinheiro, vendedores darão certos pertences de graça ao personagem.</p>
            </blockquote>
            <h1 id="engenheiro">Engenheiro</h1>
            <p>Tu usavas a tua mente na criação de maquinaria e mecanismos complexos. Seja anteriormente em profissão ou não, agora essas habilidades irão te ajudar.</p>
            <blockquote>
            <p><strong>Manufaturar</strong> - Ao decompor 3 armas poderás criar qualquer arma na <em>Lista de Armas</em>. Ao decompor 2 utensílios poderás criar qualquer item na <em>Lista de Utensílios</em>.</p>
            </blockquote>
            <h1 id="estudante">Estudante</h1>
            <p>Tu ainda estás nos teus anos estudantis, indo à escola diariamente, aprendendo algo novo todos os dias, o que não esperavas é que tal conhecimento pode ser extremamente útil.</p>
            <blockquote>
            <p><strong>Aprendizado</strong> - Por causa das tuas aulas, tu ganhaste conhecimento em diversas áreas, podes gastar 6 PdT para ter +4 em qualquer teste.</p>
            </blockquote>
            <h1 id="exposto">Exposto</h1>
            <p>Tu cresceste numa área com alta exposição a uma das 6 Essências do Desconhecido, ficar exposto à aura dessa essência por tanto tempo mudou-te, dando te uma leve conexão com essa essência.</p>
            <blockquote>
            <p><strong>Conexão Prévia</strong> - Escolhe uma essência, por causa da exposição constante à Essência, tu começas com uma <em>Magia</em>/<em>Aptidão</em> da Essência escolhida.</p>
            </blockquote>
            <h1 id="herdado">Herdado</h1>
            <p>Tu vens de uma grande linhagem, uma linhagem cheia de guerreiros e pessoas conectadas a Essências, por causa disso tu herdaste um pouco desse poder de nascença.</p>
            <blockquote>
            <p><strong>Presente Hereditário</strong> - Tu começas com uma <em>Magia</em> extra a tua escolha.</p>
            </blockquote>
            <h1 id="lend-rio">Lendário</h1>
            <p>Um grande feito já canta o teu nome. Sejas um combatente experiente ou uma criança acabada de nascer. Milhares já esperam grandes feitos realizados por ti e rezam a tua ascensão com esperança.</p>
            <blockquote>
            <p><strong>Glorioso</strong> - Se um inimigo impor-te o estado de <em>A Falecer</em>, todos os teu aliados ganham um bónus de X1,5 de dano contra esse inimigo até perderes o estado. Cair em batalha é a maior honra de todas.</p>
            </blockquote>
            <h1 id="m-quina">Máquina</h1>
            <p>Tu és o resultado dum experimento peculiar, um robô com um alma humana imbuída em seu interior, sendo movido inteiramente a sangue, possuindo, de alguma forma, a bênção que é uma consciência própria.</p>
            <blockquote>
            <p><strong>Sangue é Combustível</strong> - As tuas placas exteriores naturalmente sugam sangue e reciclam-lo como combustível, ao acertar um ataque armado, tu recuperas 1/3 do dano causado como <strong>PVs</strong>(não funciona em alvos com o estado <em>Seco</em>).</p>
            </blockquote>
            <h1 id="militar">Militar</h1>
            <p>Tu estás ou estiveste numa organização militar, passando por um treino intensivo e vivendo uma vida árdua.</p>
            <blockquote>
            <p><strong>Treino para Guerra</strong> - Por causa do teu treino com armas de fogo tu agora consegues disparar com muita precisão, +4 em testes de <em>Pontaria</em>.</p>
            </blockquote>
            <h1 id="pol-cia">Polícia</h1>
            <p>Tu trabalhas ou trabalhavas num departamento policial, tendo que lidar com diversos criminosos e múltiplas situações letais, e passar por tais experiências mudou-te, afinal o que não mata deixa mais forte.</p>
            <blockquote>
            <p><strong>Treino Policial</strong> - Depois de passar por diversos treinos, tanto em prática e tanto em ação, tu apuraste as tuas habilidades de autodefesa, +2 em DEF.</p>
            </blockquote>
            <h1 id="pol-tico">Político</h1>
            <p>Tu estás ou já estiveste associado à política, por causa disso sabes lidar com pessoas muito bem, especialmente se mentir ou enganar for necessário.</p>
            <blockquote>
            <p><strong>Boa Lábia</strong> - Tu já tiveste de mentir ou enganar muitas pessoas pelo que querias, tu tens +4 em testes de <em>Enganação</em>.</p>
            </blockquote>
            <h1 id="psic-logo">Psicólogo</h1>
            <p>Tu és ou eras um psicólogo, tu estás mais que habituado a ajudar pessoas com os seus medos e inseguranças e por vezes a tua ajuda é extremamente necessária.</p>
            <blockquote>
            <p><strong>Acalmar</strong> - Ao gastar uma ação e 7 PdT tu podes acalmar alguém, a pessoa recupera 2d6 de <strong>SAN</strong>.</p>
            </blockquote>
            <h1 id="s-dico">Sádico</h1>
            <p>Tu és o que a sociedade chama de psicopata, tu gastas uma boa parte do teu tempo a realizar atos inumanos, atos que vão contra a própria natureza do Homem.</p>
            <blockquote>
            <p><strong>Esforço Maníaco</strong> - Sempre que realizares um esforço extra para cometer um ato grotesco desnecessário, recuperas 2d6 de <strong>PdT</strong>.</p>
            </blockquote>
            <h1 id="selvagem">Selvagem</h1>
            <p>Tu cresceste na floresta, abandonado da civilização moderna, tendo que te habituares a condições de vida complicadas, crescendo sozinho ou num pequeno grupo de pessoas também desconexas da civilização moderna.</p>
            <blockquote>
            <p><strong>Sentidos Aprimorados</strong> - O constante perigo do teu ambiente fez com que desenvolvesses uma atenção especial aos teus arredores, +4 em testes de Perceção</p>
            </blockquote>
            <h1 id="sensitivo">Sensitivo</h1>
            <p>Tu nasceste com uma sensibilidade aumentada ao Desconhecido, conseguindo o sentir e o analisar com mais facilidade que uma pessoa normal.</p>
            <blockquote>
            <p><strong>Predisposição</strong> - Por causa da tua maior sensibilidade, tens uma melhor noção do Desconhecido, +2 em testes para perceber e compreender o Desconhecido.</p>
            </blockquote>
            <h1 id="sic-rio">Sicário</h1>
            <p>Tu ganhas a vida a matar pessoas, sendo contratado por todo tipo de pessoas, por todo o tipo de motivos, tendo em comum apenas o pedido, o assassinato de alguém.</p>
            <blockquote>
            <p><strong>Alvo Marcado</strong> - Uma vez por cena, podes escolher um ser para virar o teu alvo, testes contra o teu alvo têm +4, porém testes contra outros seres têm -2, se o teu alvo morrer na mesma cena, tu recuperas 1d12+INTx2 de <strong>PdT</strong>.</p>
            </blockquote>
            <h1 id="socorrista">Socorrista</h1>
            <p>Tu trabalhavas ou trabalhaste como um agente da saúde, tendo desenvolvido as capacidades necessárias para o atendimento de feridos. Seja um antigo doutor/enfermeiro/paramédico e entre outros.</p>
            <blockquote>
            <p><strong>Salvação</strong> - Tens +4 ao socorrer alguém no estado <em>A Falecer</em>. Itens ou feitiços de cura ganham +1D.</p>
            </blockquote>
            <h1 id="submundano">Submundano</h1>
            <p>Tu nasceste no submundo, nascendo com certas deficiências por causa do ambiente, tu sentes e encontras o desconhecido desde o começo da tua vida e isso tem um certo efeito em ti.</p>
            <blockquote>
            <p><strong>Ambiente Monstruoso</strong> - Por teres nascido e crescido no submundo, ver uma criatura não surte tanto efeito em ti, +4 em testes pra resistir a dano mental de criaturas.</p>
            </blockquote>

            <br>
            <button commandfor="listaOrigens" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="baseCultista" class="">

            <br>
            <button commandfor="baseCultista" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="baseFeiticeiro" class="">

            <br>
            <button commandfor="baseFeiticeiro" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="baseLutador" class="">

            <br>
            <button commandfor="baseLutador" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="habilLutador" class="">
            <ul>
                <li><strong>Golpe Poderoso</strong> – Podes adicionar +1d6 ao teu dano, custa 4 PdT por d6, o máximo é 3d6</li>
                <li><strong>Golpe Especial</strong> – Podes adicionar +1d6 ao teu teste, custa 4 PdT por d6, o máximo é 3d6</li>
                <li><strong>Golpe Pesado</strong> – Ao gastar 7 PdT tu causas +1D de dano no próximo ataque</li>
                <li><strong>Contra-Ataque Veloz</strong> – Ao gastar 7 PdT tu podes contra-atacar como ação livre</li>
                <li><strong>Força Devastadora</strong> – Ao gastar 7 PdT tu adicionas no dano do teu ataque o teu Mod. de FOR x2</li>
                <li><strong>Ataques Seguidos</strong> – Ao gastar 7 PdT depois de acertar um ataque podes voltar a atacar como ação livre, se acertares esse ataque podes atacar denovo mas desta vez o preço é dobrado.</li>
                <li><strong>Esquiva Aperfeiçoada</strong> – Quando sofreres um ataque que a esquiva reduz o dano pela metade(como explosões), ao invés disso, se esquivares, evitas o dano por completo.</li>
                <li><strong>Apanhar um Ar</strong> – Uma vez por cena, tu podes parar para respirar um pouco, assim recuperando xd6 de PVs, x sendo a tua CON.</li>
                <li><strong>Investida Mortal</strong> – Uma vez por cena, ao gastar 12 PdT, tu fazes a ação completa <em>Investida</em> como uma ação padrão</li>
                <li><strong>Agarrão Veloz</strong> - Ao acertar um ataque corpo-a-corpo, podes gastar 7 PdT para fazer a ação padrão “Agarrar” como ação livre</li>
                <li><strong>Derrubar Veloz</strong> - Ao acertar um ataque corpo-a-corpo, podes gastar 6 PdT para fazer a ação padrão “Derrubar” como ação livre</li>
                <li><strong>Forçar Crítico</strong> - Ao gastar 14 PdT, o crítico da tua arma diminui pela metade, precisando obter o novo valor em apenas um dos dados do teste para causar um ataque crítico.</li>
                <li><strong>Ataque Debilitante</strong> - Ao acertar um ataque, podes gastar 8 PdT para deixar o alvo <em>Fraco</em> durante 1 rodada.</li>
                <li><strong>Tontear</strong> - Tu fazes um ataque especial, tendo o foco de confundir o inimigo. Ao acertar um ataque corpo-a-corpo, podes gastar 10 PdT para forçar o alvo a perder 1 ação padrão no seu próximo turno.</li>
                <li><strong>Provocar</strong> - Ao gastar 7 PdT, tu fazes uma ação chamativa e insultuosa contra um ser, testes feitos por esse ser que não sejam direcionados contra ti têm -4, dura 1 rodada.</li>
                <li><strong>Casca Grossa</strong> - Tu ganhas 5 de resistência contra dano cortante, balístico e físico.</li>
            </ul>
        
            <br>
            <button commandfor="habilLutador" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="baseRitualista" class="">

            <br>
            <button commandfor="baseRitualista" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="baseTecnico" class="">

            <br>
            <button commandfor="baseTecnico" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="habilTecnico" class="">
            <ul>
                <li><strong>Descobrir fraqueza</strong> – Ao gastar 5 PdT para analisar as fraquezas dum inimigo, escolhe um alvo, tu ganhas +4 em testes para atacar o ser durante 1d3 rodadas.</li>
                <li><strong>Ataque Perspicaz</strong> – Ao gastar 7 PdT, tu fazes um ataque que impede a reação do oponente, o inimigo não pode esquivar ou bloquear o teu ataque.</li>
                <li><strong>Interferir</strong> – Ao gastar 10 PdT, tu interferes na ação de um inimigo, quando um inimigo fizer um teste, tu podes dá-lo desvantagem.</li>
                <li><strong>Pronto para Agir</strong> – Tu passas a girar testes de Iniciativa com a tua INT.</li>
                <li><strong>Troca Veloz</strong> – Ao ver um aliado a até distância curta de ti ser atacado, podes gastar 8 PdT para rapidamente trocar de lugar com ele, assim sofrendo o dano por ele, tu reduzes o dano pela metade.</li>
                <li><strong>Análise Prévia</strong> – Ao gastar 9 PdT, tu analisas os teus arredores, tu +2 em testes de Iniciativa e ficas imune à condição <em>Desprevenido</em> durante 2 rodadas.</li>
                <li><strong>Apoio Intenso</strong> – Ao gastar 10 PdT, tu ajudas a ação de um aliado, quando um aliado fizer um teste, tu podes dá-lo vantagem.</li>
                <li><strong>Defesa Inesperada</strong> - Quando um aliado a até distância curta de ti for atacado, podes gastar 10 PdT para aumentar a defesa dele em xd4, x sendo a tua INT/2, se o ataque falhar, o aliado ganha um ataque como ação livre contra o atacante.</li>
                <li><strong>Ataque Duplo</strong> - Ao gastar 7 PdT, tu atacas duas vezes numa ação padrão.</li>
                <li><strong>Ataque Furtivo</strong> - Ao acertar um ataque num ser <em>Desprevenido</em> ou que esteja <em>Flankeado</em> por ti, tu causas +1D de dano.</li>
                <li><strong>Dor na Vista</strong> - Ao acertar um ataque, podes gastar 8 PdT para deixar o alvo <em>Ofuscado</em> durante 1 rodada.</li>
                <li><strong>Mestre do Esconderijo</strong> - Ao gastar 7 PdT, podes fazer a ação de movimento <em>Esconder-se</em> como ação livre.</li>
                <li><strong>Arremesso Múltiplo</strong> - Ao atirar um item, podes gastar 7 PdT para atirar mais 2 itens como ação livre.</li>
                <li><strong>Ofício Veloz</strong> - Durante uma Cena de Interlúdio, ao fazer a ação <em>Ofício</em>, consegues criar 1 item extra.</li>
                <li><strong>Profissional</strong> - Ao gastar 6 PdT, tu giras +1d8 no próximo teste que realizares.</li>
                <li><strong>Ordenar</strong> - Ao gastar 8 PdT, tu gritas uma ordem para um aliado, o aliado gasta uma das tuas ações para realizar a ordem que gritaste.</li>
                <li><strong>Apoiar e Bater</strong> - Ao usar a ação padrão <em>Apoiar</em> num aliado, podes gastar 8 PdT para atacar um ser em alcance como ação livre.</li>
            </ul>
        
            <br>
            <button commandfor="habilTecnico" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="baseMagia" class="">
            <p>Existem 3 formas de magia, elas sendo:</p>
            <ul>
                <li><strong>Feitiços</strong> - A forma de magia mais comum da maioria das realidades, gastando estamina ou energia física do ser para realizar a magia. 
                A peculiaridade dos Feitiços é a sua <em>Maleabilidade</em>. Ao usar um Feitiço, o conjurador pode girar um teste de INT para tentar alterar (com limites) o seu efeito, quanto mais complexa a mudança maior a RN do teste, se passar consegue fazer a alteração que deseja.</li>
                <li><strong>Rituais</strong> - A alternativa mais comum da maioria das realidades, gastando o bem estar mental do ser para realizar a magia. 
                A peculiaridade dos Rituais é a sua <em>Amplificação</em>. Ao usar um Ritual, o conjurador pode dobrar o seu preço, amplificando o seu efeito(seja aumentar dados de dano/cura, duração de efeitos. Fica a critério do Mestre).</li>
                <li><strong>Oferendas</strong> - A forma de magia mais rara da maioria das realidades, sendo até completamente inexistente em algumas, gastando sangue, carne, o bem estar físico do ser para realizar a magia. 
                A peculiaridade das Oferendas é a sua <em>Cerimônia</em>. Ao usar uma Oferenda, o conjurador pode estender o tempo de execução em uma categoria(ação de movimento&gt;ação padrão&gt;ação completa&gt;ação completa+ação padrão e assim vai), adicionando gestos ou palavras à magia, amplificando o seu efeito(seja aumentar dados de dano/cura, duração de efeitos. Fica a critério do Mestre).</li>
            </ul>
            <p>1 de Custo equivale a 1 de SAN/PV(para Rituais e Oferendas) e 2 de PdT(para Feitiços).</p>
            <h1 id="magias-de-ataque">Magias de Ataque</h1>
            <p>Magias de Ataque funcionam da mesma forma que um ataque normal, girando um teste de Conexão(<strong>INT</strong>(feitiços), <strong>CAR</strong>(rituais) ou <strong>CON</strong>(oferendas)) para ver se é um acerto.</p>

            <br>
            <button commandfor="baseMagia" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="listaMagias" class="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="text-align:center">Nome</th>
                    <th style="text-align:center">Essência</th>
                    <th style="text-align:center">Tempo de Execução</th>
                    <th style="text-align:center">Custo</th>
                    <th style="text-align:center">Efeito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="text-align:center"><strong>Mutilação</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu tocas num ser, cobrindo o seu corpo com diversos cortes superficiais, cortando-o repetidamente, causando 3d6 de dano cortante</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Amarras Violentas</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu conjuras tripas grotescas que saem do chão, enrolando-se num alvo, tentando restringir os seus movimentos, o alvo faz um teste de <strong>FOR</strong> contra a tua <strong>INT</strong>/<strong>CAR</strong>, se falhar fica <em>Agarrado</em>.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Desmantelar</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu disparas um corte invisível contra um alvo a distância média de ti, causando 3d6 de dano cortante.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Corrente Óssea</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu disparas uma corrente criada a partir dos teus ossos contra um alvo a distância curta de ti, tu giras um teste de FOR contra o alvo, se passares, o alvo fica agarrado.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Sabre Medular</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">A tua medula espinal estende-se, saindo pela tua nuca, ao pegares nela, tu sacas-la pra fora, criando um sabre feito d’ossos.  <br>Sabre Medular - 2d12+1d6 dano cortante - Crítico: 23, 24 – +2d6 - Duas Mãos, Manha, Imponente, Potente</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Unha Pútrida</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Uma das tuas unhas cresce, virando um unha afiada rubra, ao a espetar num ser, o ser fica Envenenado(Fraco).</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Limpeza Interna</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu tocas num ser, alterando o seu sangue, acelerando o processo de cura, curando 4d6 de PVs do ser, cura Envenenado(Fraco).</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Bomba de Sangue [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação de Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu crias uma enorme bolha de sangue coagulado e atiras contra um alvo a alcance médio, criando uma explosão viscosa e nojenta, causando 6d6 de dano de Carniça em todos a distância curta da explosão.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Corvos Rubros [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu fazes um gesto com as mãos, criando, nos teus pés, uma poça de um líquido vermelho viscoso, desse mesmo líquido, saem dois Corvos Rubros.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Jardim de Espinhos [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">9</td>
                    <td style="text-align:center">Tu tocas no chão, cobrindo uma área de alcance curto com aura de Carniça, criando inúmeras vinhas espinhosas, seres que entrarem ou acabarem a rodada na área sofrem 2d8 de dano de Carniça, a área conta como Terreno Complexo, dura até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Transfigurar [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu cobres o teu corpo com aura de Carniça, alterando o formato da tua carne, tomando a aparência que desejares. +4 em testes que envolvam comunicação social até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Águia de Sangue [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">As tuas costelas expandem, criando costelas longas e curvadas que saem das tuas costas, criando carne entre os ossos, criando duas enormes asas de carne. Podes usar a ação <em>Deslocar</em> para te moveres verticalmente além de horizontalmente. Dura até o fim da cena</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Cortina de Insetos [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu fechas a tua boca, sendo possível começar a ouvir um forte zumbido vindo do fundo da tua garganta, tu abres a boca, vomitando inúmeros insetos deformados que rapidamente se espalham pelo campo de batalha, dificultando a visão dos inimigos. O ambiente torna-se <em>Ambiente Nublado</em> mas tu e os teus aliados não sofrem os efeitos, dura até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Forçar Ódio [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu tocas num ser, o ser sente como uma fúria incontrolável a começar a toma-lo, os olhos ficam encharcados de sangue, as veias pulsam incontrolavelmente, como se entrasse num estado de adrenalina. Ganha +4 em testes de ataque, +1D dano e +2 em reação durante 1d3 rodadas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Apunhalo Brutal [Requisitos : NdP 6]</strong></td>
                    <td style="text-align:center">Carniça</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">9</td>
                    <td style="text-align:center">O teu braço é coberto por uma camada grotesca de carne e sangue coagulado, tomando um formato afiado, com uma marca que brilha carmesim nas costas da tua palma, disparando esse sangue contra um alvo a alcance médio, o sangue tomando o formato duma enorme lâmina vermelha, causando 6d8+5 de dano cortante</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Seta de Fogo</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu crias uma pequena flecha de fogo, disparando-a contra um alvo, causando 2d8+2 de dano incendiário.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Ataque em Chamas</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Livre</td>
                    <td style="text-align:center">2</td>
                    <td style="text-align:center">Tu cobres a tua arma em fogo, no próximo ataque a arma causa +1d10 de dano incendiário.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Cúmulo de Raios</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu crias um amontoado de raios azulados nas tuas mãos e disparas-lo contra um alvo, causando 2d6 de dano elétrico e deixando o inimigo vulnerável durante 1 rodada.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Braço Arcano</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu crias um braço flutuante feito de aura de Energia, o braço tem 20 PV, ao atacar, causa 2d6+Mod. de INT de dano elétrico ou físico, girando o teste de ataque com a INT do conjurador.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Trovão Potente</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu puxas um raio azulado de uma fonte de energia próxima ou do céu, disparando-lho contra um inimigo, causando 1d20 de dano elétrico ou de Energia.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Toque Elétrico</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu cobres a tua mão com raios e tocas num ser, causando 3d6 de dano elétrico.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Cauterização Brutal</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu aqueces a ferida de um ser ao ponto de a cauterizar, o alvo recupera 4d6 de PV.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Garras Elétricas</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu cobres as tuas mãos com aura de Energia, conjurando garras feitas de raios azulados em ambas as mãos. As garras causam 1d10+5 de dano elétrico e possuem as propriedades Sagaz e Manha, duram até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Anéis Abastecedores</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">3/rodada</td>
                    <td style="text-align:center">Tu conjuras anéis ondulados feitos de aura de Energia ao redor das tuas mãos, enquanto os anéis estiverem ativos, o custo de feitiços diminuí em 2, custando no mínimo 1 (Não afeta esta magia).</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Raios de Outro Mundo</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Os teus olhos brilham azul, disparando dois raios, escolhe até 2 alvos, os raios voam até os alvos escolhidos, cada raio causando 1d10+1 de dano de Energia.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Combustão Instantânea</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">2</td>
                    <td style="text-align:center">Tu estalas os dedos, cobrindo o corpo de um ser em aura de Energia, aura essa que rapidamente vira uma enorme chama azulada, um alvo (á tua escolha) fica em chamas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Investida Elétrica [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu investes para a frente, virando um raio azul, tu moves-te o dobro, evitando ataques e conseguindo passar por espaços apertados. <br>Pode gastar +2 para usar como reação, esquivando-se do ataque garantidamente, ou para levar outra pessoa junto, +2 por pessoa.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Carregar [Requisitos :  NdP 4]</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">7</td>
                    <td style="text-align:center">Tu preenches as veias dum ser de eletricidade, fazendo as brilhar azul, dando a tal ser uma vitalidade absurda. O ser ganha 2d10+5 PVs temporários.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Benzer [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu cobres uma área a teu redor com aura de Energia, abençoando-a com a beleza da vitalidade. Todos os seres a alcance curto de ti recuperam 3d6+INT de PdTs.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Rajada de Fogo [Requisitos : NdP 6]</strong></td>
                    <td style="text-align:center">Energia</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">10</td>
                    <td style="text-align:center">Tu conjuras uma chama azul entre as tuas mãos, lançando-a para a frente na forma de um enorme leque de fogo, causando 2d12+10 de dano de Energia em todos os seres a alcance médio.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Veneno Profano</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu cobres a tua arma com uma substância negra que parece apodrecer tudo que toca, ao acertar um inimigo, ele fica <em>Envenenado(Fraco+3)</em>, ao invés de venenoso é necrótico.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Espinho Negro</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu crias um espinho negro e disparas-lo contra o alvo, causando 4d6 de dano necrótico.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Chama Maldita</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3/rodada</td>
                    <td style="text-align:center">Tu crias uma chamas preta que ocupa uma área de alcance curto, se alguém entrar nela ou acabar o turno dentro dela, sofre 1d12+3 de dano necrótico.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Piso Gosmento</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu cobres o chão com uma lama negra, a lama é quente e grotesca, ela quase parece viva, prendendo e puxando tudo que toca, o terreno vira terreno complexo até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Teia Negra</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu disparas uma teia feita duma gosma negra que se prende ao alvo, se acertado, o alvo fica <em>Agarrado</em>. Precisa passar um teste de FOR(RN : 15+INT/EMO*2), se passar solta-se.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Sentença [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu declaras uma sentença de morte a um alvo, gerando uma tatuagem negra que circunda o seu pescoço, sempre que sofrer dano de Obscuro, o ser sofre +3 de dano extra para cada dado girado, dura até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Duplicatas [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu fazes um gesto com as mãos, conjurando, a partir da tua sombra, 3 duplicatas, aumentando a tua DEF em 6, sempre que um ataque direcionado a ti falhar, uma das duplicatas se desfaz, diminuindo a tua DEF em 2.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Forçar Penumbra [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu fazes um gesto com as mãos, clamando pelas sombras, toda a fonte de luz da área é ofuscada, o ambiente ganha <em>Penumbra Parcial.</em> Se usar num ambiente já em <em>Penumbra Parcial</em>, o ambiente passa a ter <em>Penumbra Total</em>.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Gás Negro [Requisitos : NdP 6]</strong></td>
                    <td style="text-align:center">Obscuro</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Marcas negras aparecem no teu rosto, logo depois um espesso gás negro começa a sair da tua boca, espalhando pelo ambiente, criando uma enorme nuvem negra a teu redor, o ambiente torna-se <em>Ambiente Sufocado</em> até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Projétil Sonoro</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu assobias, conjurando um projétil alaranjado que sai da tua boca, disparando-lho contra um alvo, causando 2d8+4 de dano sónico.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Olhos de Ruído</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Os teus olhos são cobertos por estática de TV, dando te uma  <br>visão bizarra que parece prever trajetórias, tu ganhas +2 em testes de ataque com armas à distância e em testes de esquiva contra ataques à distância até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Pedra, Papel, Tesoura</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu jogas um jogo de pedra, papel e tesoura com o Caos (contra o Mestre). Se perderes, perdes 1d6+1 de SAN, se empatares, nada acontece, se venceres, recebes 1 dos seguintes bónus (dependendo do que usaste para vencer) :  <br>Pedra - Tu recebes 5 de resistência a dano até o fim da cena.  <br>Papel - Tu recebes +2 num tipo de teste (à tua escolha) até o fim da cena.  <br>Tesoura - Todos os teus ataques passam a causar +1D de dano cortante até o fim da cena.  <br>Os efeitos não acumulam consigo mesmos.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Rejeitar Sapiência</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu escolhes um alvo, criando um bloqueio mental nele, o alvo esquece certos conhecimentos, certas habilidades que antes possuía, escolhe um tipo de teste, o alvo terá -4 nesse tipo de teste até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Energizado</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Uma onda de motivação preenche-te, tu sentes como se tudo fosse possível, basta tentares o suficiente, +2 em todos os testes até o fim da rodada.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Seguir o Ritmo</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Uma música bizarra começa a tocar na tua mente e tu começas a, inconscientemente, seguir o seu ritmo, +4 em testes de esquiva até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Fraco Sinal</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu cobres a mente dum alvo com aura de Caos, preenchendo os seus pensamentos de estática e falhas, -4 em testes de <strong>INT</strong> até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Troca Troca</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Estala os dedos, trocando dois seres que estejam a até distância média um do outro de lugar, se um dos seres for um aliado, concede-lhe um <em>Ataque de Oportunidade</em> contra o outro ser. Pode gastar +2 para usar este feitiço como reação, pode gastar +3 para usar este feitiço como reação no turno de outro ser.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Palavras Doem</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu fazes uma onomatopeia com a voz, criando a palavra com aura de Sabedoria e disparando contra um alvo, causando 2d8 de dano, o tipo de dano varia de acordo com a onomatopeia.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Tu Não Podes Sair Daqui! [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">7</td>
                    <td style="text-align:center">Tu tocas no chão, espalhando aura de Caos pela sala onde te encontras, criando barras laranjas que tapam todas as saídas, inimigos que tentem passar pelas barras sofrem 2d8 de dano de Caos e devem girar um teste de INT/CAR contra ti, se passarem, conseguem atravessar as barras.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Vislumbre Ilusório [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">6-12</td>
                    <td style="text-align:center">Tu passas a mão pelo ar, tecendo com os teus dedos uma ilusão. Todos que presenciarem a ilusão devem girar um teste de Perceção(CAR) contra ti, se passarem conseguem ver através da ilusão, tu adicionas ao teu teste o quanto gastaste para fazer a magia(se for um feitiço ou oferenda, o que gastaste pela metade).</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Estrábico [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Caos</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">7</td>
                    <td style="text-align:center">Tu infestas os músculos dum alvo a alcance curto com aura de Caos, causando espasmos e movimentos involuntários que parecem guiar o ser a um direção aleatória. O ser é forçado a usar a sua ação de movimento para se <em>Deslocar</em> em uma direção aleatória, não podendo usar nenhuma outra ação para se <em>Deslocar</em>, dura 1d4+1 rodadas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Reescrever Feridas</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu crias sigilos de Sabedoria em volta dos ferimentos, reescrevendo as células do alvo, curando-o instantaneamente. O alvo recupera 3d6 PVs, a cura ignora habilidades que impedem cura.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Paralisia</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu cobres o corpo de um alvo com sigilos de Sabedoria, o alvo deve fazer um teste de CAR(RN:15+CAR2 do conjurador), se falhar ele fica <em>Vulnerável</em> durante 1 rodada.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Conquistar</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu cobres o cérebro de um ser em sigilos de Sabedoria, assim manipulando a sua mente, esse ser deve girar um teste de INT ou CAR contra ti, se falhar, não pode te atacar durante 1 rodada</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Decifrar</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu cobres a tua mão com aura de Sabedoria, ao tocares num objeto com informação (um livro, dispositivo com uma gravação, etc), tu compreendes as palavras(mesmo não conhecendo o idioma), contanto que seja um idioma humano.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Desconcentrar</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu cobres a tua mão com aura de Sabedoria, formando um círculo rosado na tua palma, ao tocar na cabeça de um alvo, um chiado forte começa a tocar na sua mente, o alvo perde a habilidade de realizar magias sustentadas até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Ligação Angustiante</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Uma vez por cena, tu tocas num alvo, criando uma conexão direta entre a tua mente e o seu corpo, durante 1 rodada, para cada 3 PdT que perderes, o alvo sofre 1d6 de dano de Sabedoria.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Ordens Diretas</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4/aliado</td>
                    <td style="text-align:center">Aparecem diversos sigilos rosados nos teus dedos, sigilos esses que disparas contra até 3 aliados teus, ao serem atingidos, as mentes dos teus aliados recebem ordens de combate, melhores posições, táticas, fraquezas do alvo, os aliados atingidos ganham +2 em testes de Luta e Pontaria até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Sigilos Marciais</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu cravas 4 sigilos rosa numa arma, ao atacar com ela, podes escolher gastar 1 dos sigilos, assim ganhando +4 no teste de ataque.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Carimbar</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu apontas para um alvo a alcance longo, na ponta do teu dedo surge um grande sigilo rosa que rapidamente viaja contra o alvo, causando 2d6+2 de dano incendiário, queimando a carne do alvo.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Encarar [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu encaras um alvo a distância média de ti, cobrindo o cérebro dele com sigilos. O alvo gira um teste de INT contra ti, se falhar, perde a habilidade de se locomover, ainda conseguindo se mexer mas não podendo sair do lugar. Se sofreres dano, a magia termina.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Manto de Lâminas [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">10</td>
                    <td style="text-align:center">Tu fazes um gesto, conjurando 8 espadas feitas de sigilos rosa que giram a teu redor, se um ser entrar ou terminar o turno na distância corpo-a-corpo de ti, ele sofre 3d6+5 de dano de Sabedoria. Dura até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Forçar Sinapses [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu estendes a mão contra um alvo a até distância média de ti, conjurando sigilos no seu cérebro, forçando certas sinapses a agir. O alvo gira um teste de INT contra ti, se falhar, tu tomas controle duma das suas ações de movimento, dando-lhe uma ordem direta.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Localizar [Requisitos : NdP 5]</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu conjuras um sigilo rosa a teus pés, a aura emanada por esse sigilo se expande, destacando a presença de todos os seres num raio de 1km. Seres dentro desse raio podem escolher girar um teste de Furtividade(INT/CAR) contra um teste de Perceção(INT/CAR) teu, se passarem, a sua presença não é destacada.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Conexão Mental [Requisitos : NdP 6]</strong></td>
                    <td style="text-align:center">Sabedoria</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu tocas na cabeça dum aliado, tocando na tua simultaneamente, criando um símbolo rosa em ambas, assim estabelecendo uma conexão entre as vossas mentes. Até o fim da cena, conseguem comunicar telepaticamente um com o outro independentemente de distância.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Putrefação</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3/rodada</td>
                    <td style="text-align:center">Tu cobres um alvo com aura de Tempo, o corpo do alvo entra em estado de decomposição acelerado, sofrendo 2d6 de dano necrótico por rodada.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Olho Clarividente</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu vês um futuro possível, prevendo a ação de um inimigo, tu tens +4 na reação contra o próximo ataque do inimigo.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Acelerar Cura</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">2</td>
                    <td style="text-align:center">Tu cobres as feridas de um ser em aura de Tempo, assim acelerando o processo de cicatrização, curando 1d12+3 de PV</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Playback</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação Livre</td>
                    <td style="text-align:center">5</td>
                    <td style="text-align:center">Tu cobres o teu corpo com aura de Tempo, assim conseguindo repetir a última ação feita como ação livre (2 usos por rodada)</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Sono Forçado</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu apontas para um ser, cobrindo o seu cérebro com aura de Tempo, acelerando o seu processamento de cansaço, o ser faz um teste de <strong>INT</strong>/<strong>CAR</strong> contra ti, se falhar, o ser fica <em>Cansado</em>.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Velhice Errónea</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center">Tu apontas para um ser, cobrindo os seus músculos com aura de Tempo, simulando os músculos fracos de um corpo idoso, o ser faz um teste de <strong>INT</strong>/<strong>CAR</strong> contra ti, se falhar, fica <em>Fraco</em>.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Tocar na Ferida</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação Padrão</td>
                    <td style="text-align:center">4</td>
                    <td style="text-align:center">Tu tocas num ser, forçando uma ferida antes fechada a se reabrir, se o ser tocado tiver se curado de um ataque na última rodada, a cura é anulada. Só consegue anular uma cura por uso.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Inconsistência [Requisitos : NdP 4]</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">6</td>
                    <td style="text-align:center">Tu cobres o teu corpo com aura de Tempo, mudando a forma que o teu corpo age, criando uma inconsistência temporal, o teu corpo acelerando e desacelerando, dificultando prever os teus movimentos. A tua DEF aumenta em 2 até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Speed Up [Requisitos : NdP 6]</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">8</td>
                    <td style="text-align:center">Tu tocas num ser, cobrindo o seu corpo com aura de Tempo, acelerando-o. O ser ganha +1 ação de movimento até o fim da cena.</td>
                    </tr>
                    <tr>
                    <td style="text-align:center"><strong>Speed Up Total [Requisitos : Speed Up]</strong></td>
                    <td style="text-align:center">Tempo</td>
                    <td style="text-align:center">Ação de Movimento</td>
                    <td style="text-align:center">10</td>
                    <td style="text-align:center">Tu tocas num ser, cobrindo o seu corpo com aura de Tempo, acelerando-o a um ponto intenso. O ser ganha +1 ação padrão até o fim da cena.</td>
                    </tr>
                </tbody>
            </table>
        
            <br>
            <button commandfor="listaMagias" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="aptidoes" class="">
            <ul>
                <li><strong>Debilitar com Arremesso</strong> – Tu aprendeste a arremessar as tuas armas de uma maneira especial, de uma maneira que debilite o teu inimigo. Ao arremessar uma arma, se acertares, o alvo tem -4 no seu próximo teste(não acumula consigo mesmo).</li>
                <li><strong>Dano Certeiro</strong> – Ao girar o dano de uma arma, tu voltas a girar todos os dados que tiveram como resultado 1 ou 2.</li>
                <li><strong>Mira Precisa</strong> – Tu ignoras a desvantagem de cobertura parcial e ganhas +4 em testes de pontaria se gastares uma ação de movimento a mirar.</li>
                <li><strong>Perícia</strong> - Escolhe um tipo de teste, tu ganhas +4 em testes desse tipo.</li>
                <li><strong>Versátil</strong>  – Tu ganhas +1 em todos os testes.</li>
                <li><strong>Corpo Robusto</strong> – Ao escolher esta aptidão, tu recebes o dobro da tua CON como PVs, sempre que subires de nível ganhas +3 PVs.</li>
                <li><strong>Mente Robusta</strong> - Ao escolher esta aptidão, tu recebes o dobro da tua CAR como SAN, sempre que subires de nível ganhas +3 SAN.</li>
                <li><strong>Cérebro Robusto</strong> - Ao escolher esta aptidão, tu recebes o dobro da tua INT como PdTs, sempre que subires de nível ganhas +3 PdTs.</li>
                <li><strong>Reflexos Defensivos</strong> – Tu ganhas +2 em testes de bloqueio e esquiva.</li>
                <li><strong>Sempre Atento</strong> – Tu desenvolves um sexto sentido que alerta-te de perigos inesperados, tu ficas imune ao estado <em>Desprevenido</em></li>
                <li><strong>Imparável</strong> – Se estiveres <em>A Falecer</em> tu podes continuar a agir, porém testes de cura feitos contra ti têm desvantagem.</li>
                <li><strong>Empunhadura Dupla</strong> - Ao segurar uma arma leve em cada mão, pode atacar com ambas numa ação.</li>
                <li><strong>Artes Marciais</strong> - O teu dano físico aumenta em 1D e sobe uma categoria (d6-&gt;d8-&gt;d10...) (Pode ser escolhido duas vezes).</li>
                <li><strong>Fôlego Extra</strong>  – Uma vez por combate ganhas uma ação de movimento a mais. Podendo tornar as duas ações de movimento numa ação padrão.</li>
                <li><strong>Adiar Catástrofe</strong>  – Uma vez por <em>Cena de Combate</em>, tu consegues adiar uma desvantagem ou modificador negativo para o próximo teste.</li>
                <li><strong>Ataque Executor</strong>  – Inimigos com apenas metade da vida têm -2 de <strong>DEF</strong> contra os teus ataques.</li>
                <li><strong>Corpo Muralha</strong>  – Inimigos têm -4 no teste se tentarem usar a manobra <em>Agarrar</em> em ti.</li>
                <li><strong>Intercetar</strong> [Requisitos : NdP 4] – Se um aliado em curta distância for alvo de um ataque, poderás sofrer o dano no lugar do aliado.</li>
                <li><strong>Duelista</strong> [Requisitos : NdP 4] – Durante uma Cena de Duelo de Vontades, ao atingir o Ultimato, o dano armado recebe +1D.</li>
                <li><strong>Corpo Resiliente</strong> - Ganhas 5 de resistência a um tipo de dano à tua escolha.</li>
                <li><strong>Corpo Resistente</strong> [Requisitos : NdP 5] - Tu ganhas 5 de resistência a dano. </li>
                <li><strong>Contra-ataque Atrelado</strong> [Requisitos : NdP 6] – Ao esquivar/bloquear, caso obtenhas um sucesso com uma diferença de +4 contra o teste inimigo realizarás um contra-ataque como ação livre.</li>
                <li><strong>Adaptação</strong> [Requisitos : NdP 6] – Se um inimigo atacar-te duas vezes seguidas terás +2 na reação do segundo ataque, o efeito amplia caso os ataques continuem, sempre com +2 e mesmo que o ataque não acerte. O efeito reinicia assim que a sequência for quebrada.</li>
                <li><strong>Defesa Poderosa</strong> [Requisitos : NdP 6] – Tu passas a adicionar o teu Mod. de FOR na tua DEF</li>
                <li><strong>Tocar na Alma</strong> [Requisitos : NdP 6] - Tu passas a ter uma leve visão das almas, conseguindo senti-las, conseguindo toca-las. Ao atacar um ser, podes escolher acertar a alma e não o corpo, apenas causando metade mas mudando o tipo de dano para <em>Espiritual</em>(não se aplica a magias).</li>
                <li><strong>Ataque Rutura</strong> [Requisitos : NdP 6]  – Inimigos têm a sua resistência cortada pela metade contra os teus ataques.</li>
            </ul>

            <br>
            <button commandfor="aptidoes" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="habilGerais" class="">
            <h1 id="habilidades-de-aura">Habilidades de Aura</h1>
            <ul>
            <li><strong>Armadura Momentânea</strong> – Ao gastar 8 PdT tu cobres o teu corpo com uma aura protetora, essa energia dá te 5 de resistência a um tipo de dano à tua escolha até o fim da cena.</li>
            <li><strong>Armadura Desconhecida</strong> – Ao gastar 8 PdT tu tornas a aura dentro de ti numa aura protetora, tu ganhas +2 de DEF até o fim da cena.</li>
            <li><strong>Aura Amedrontadora</strong> - Ao gastar 8 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto, tu então alteras a tua aura, tornando-a numa energia terrível e hedionda, todos dentro da aura devem fazer um teste de <strong>CAR</strong>(RN: 18+Mod. de CAR), se falharem ficam <em>Amedrontados</em>.</li>
            <li><strong>Aura Curandeira</strong> - Ao gastar 8 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto, tu então alteras a tua aura, tornando-a numa energia benevolente e bondosa, todos os aliados dentro da aura recuperam +2d10+2 de PVs.</li>
            <li><strong>Estímulo Muscular</strong> - Ao gastar 4 PdT, tu concentras aura do Desconhecido nos teus músculos, aumentando a capacidade física deles, ganhando +4 no próximo teste de <strong>FOR</strong>/<strong>AGI</strong>/<strong>CON</strong> que realizares.</li>
            </ul>
            <h1 id="habilidades-de-controle-leitura">Habilidades de Controle/Leitura</h1>
            <ul>
            <li><strong>Canalização</strong> – Ao gastar 6 PdT, tu concentras a aura do Desconhecido na tua arma, a arma causa +1d8 de dano até o fim da cena.</li>
            <li><strong>Canalização Momentânea</strong> [Requisitos: Canalização] – Ao gastar 9 PdT tu rapidamente concentras aura do Desconhecido na tua arma, aumentando a sua potência momentaneamente, ao usar este poder antes de um ataque, a arma causa +3d8 de dano, mas a arma volta ao normal depois do ataque.</li>
            <li><strong>Canalização Máxima</strong> [Requisitos: Canalização] – Ao gastar 10 PdT, tu concentras uma quantidade massiva de aura do Desconhecido na tua arma, a arma causa +2d6 de dano até o fim da cena.</li>
            <li><strong>Canalização Momentânea Aperfeiçoada</strong> [Requisitos: Canalização Momentânea] - Ao gastar 13 PdT tu rapidamente concentras uma quantidade massiva de aura do Desconhecido na tua arma, aumentando a sua potência momentaneamente, ao usar este poder antes de um ataque, a arma arma causa +4d6 de dano, mas a arma volta ao normal depois de dois ataques.</li>
            <li><strong>Impacto Atrasado</strong> – Ao gastar 7 PdT tu divides o teu golpe em dois impactos, ao acertar o golpe tu causas apenas metade do dano, causando a outra metade no próximo turno, esse impacto toma a forma de uma pequena explosão de aura do Desconhecido, o alvo faz um teste de <strong>CON</strong>(RN:15+Mod. de CAR), se falhar fica <em>Vulnerável</em> durante 1 rodada</li>
            <li><strong>Projeção de Energia</strong> – Ao gastar 4-7 PdT, tu rapidamente converges aura do Desconhecido num pequeno ponto, criando um projétil similar a uma bala feito de pura aura, disparando-o contra um alvo a alcance médio, o projétil causa +1d4 por cada ponto gasto, o tipo de dano é o dano da tua essência. (Se não tiver essência o tipo de dano é elétrico)</li>
            <li><strong>Projeção de Energia Aperfeiçoada</strong> [Requisitos: Projeção de Energia] – Ao gastar 13 PdT, tu rapidamente converges uma quantidade massiva de aura do Desconhecido num ponto minúsculo, comprimindo esse ponto com as mãos, usando-as para apontar para um alvo a até alcance longo, disparando um raio de aura do Desconhecido que rapidamente viaja contra o alvo, o raio causa 6d6 de dano, o tipo de dano é o dano da tua essência. (Se não tiver essência o tipo de dano é elétrico)</li>
            <li><strong>Leitura Rápida</strong> - Ao gastar 6 PdT, tu fazes uma análise rápida da aura dum ser ou objeto, descobrindo as essências da aura e tendo uma noção mais aprofundada da sua força/efeito.</li>
            <li><strong>Leitura Reveladora</strong> - Ao gastar 8 PdT, tu fazes uma análise da aura do ambiente, buscando nas sombras, seres escondidos devem re-rolar o teste de Furtividade contra ti.</li>
            </ul>
            <h1 id="habilidades-de-barreira-territ-rio">Habilidades de Barreira/Território</h1>
            <ul>
            <li><strong>Conjuração de Barreiras</strong> - Ao gastar 20 PdT, tu conjuras uma barreira, tomando a forma de um domo cobrindo uma área de alcance curto(se tiver 4 ou mais de <strong>CAR</strong>/<strong>INT</strong> cobre alcance médio, se tiver mais de 6 de <strong>CAR</strong>/<strong>INT</strong> cobre alcance longo), o domo tem 20+10x<strong>CAR</strong>/<strong>INT</strong> de PVs (tendo resistência a dano de essências). O portador pode também gastar 1 ação de movimento para alterar o seu tamanho (não ultrapassando o limite). Ninguém, exceto o conjurador, consegue entrar ou sair da barreira sem a quebrar.</li>
            <li><strong>Brandir Território</strong> - Ao gastar 10 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto(se tiver 4 ou mais de <strong>CAR</strong>/<strong>INT</strong> cobre alcance médio, se tiver mais de 6 de <strong>CAR</strong>/<strong>INT</strong> cobre alcance longo), enquanto dentro dessa área, tens +2 em todos os testes e todos os seres dentro do território estão a teu alcance, como se conseguisses os tocar. O território mantém-se de pé enquanto o conjurador não se deslocar.</li>
            <li><strong>Território Benigno</strong> [Requisitos : Brandir Território] - Ao gastar 12 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto(se tiver 4 ou mais de <strong>CAR</strong>/<strong>INT</strong> cobre alcance médio, se tiver mais de 6 de <strong>CAR</strong>/<strong>INT</strong> cobre alcance longo), enquanto dentro dessa área, magias com efeito em área são anuladas. O território mantém-se de pé enquanto o conjurador não se deslocar.</li>
            <li><strong>Estender Território</strong> [Requisitos : Brandir Território] - Ao gastar 6 PdT, enquanto o território está erguido, estende uma porção do território, tomando a forma duma linha que busca um oponente, criando em seus pés uma extensão do teu território. Escolhe um alvo fora do teu território, enquanto ele não se deslocar ele passa a sofrer dos efeitos do teu território.</li>
            <li><strong>Armar Território</strong> [Requisitos : Brandir Território] - Ao gastar 8 PdT antes dum ataque, tu envolves a arma com o teu território, forçando-a a atingir a alma do oponente. O tipo de dano do próximo ataque muda para dano espiritual.</li>
            <li><strong>Campo A.P.D</strong> - Ao gastar x PdTs, como reação, tu cobres uma área prestes a ser danificada com uma barreira feita de aura do Desconhecido, resistindo ao dano do ataque, x é igual ao dano do ataque. Se não tiver PdTs o suficiente para resistir o dano inteiro, resiste uma quantia de dano igual aos PdTs restantes.</li>
            </ul>
            <h1 id="habilidades-especiais">Habilidades Especiais</h1>
            <ul>
            <li><strong>Feitiço Ensinado</strong> – Tu escolhes uma magia da lista e aprendes-la na forma de um feitiço</li>
            <li><strong>Ritual Ensinado</strong> – Tu escolhes uma magia da lista e aprendes-la na forma de um ritual</li>
            <li><strong>Oferenda Ensinada</strong> – Tu escolhes uma magia da lista e aprendes-la na forma de um oferenda</li>
            <li><strong>Adquirir Aptidão</strong> – Tu ganhas uma Aptidão da lista de Aptidões.</li>
            </ul>
        
            <br>
            <button commandfor="habilGerais" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="listaArma" class="">
            <h1 id="armas-brancas">Armas Brancas</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Dano</th>
                        <th>Crítico</th>
                        <th>Modificador de Crítico</th>
                        <th>Alcance</th>
                        <th>Propriedades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>Alabarda</strong></td>
                    <td>3d6+1 de dano cortante</td>
                    <td>24</td>
                    <td>+4d6</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Bastão</strong></td>
                    <td>1d6+4 de dano físico</td>
                    <td>24</td>
                    <td>+1d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Duas Mãos, Impactante</td>
                    </tr>
                    <tr>
                    <td><strong>Chicote</strong></td>
                    <td>1d8+1 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Curto</td>
                    <td>Leve, Cabo, Sagaz</td>
                    </tr>
                    <tr>
                    <td><strong>Desmontador</strong></td>
                    <td>1d12+1 de dano cortante</td>
                    <td>24</td>
                    <td>+2d6</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Manha, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Espada</strong></td>
                    <td>1d10+1d6 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Espada Gancho</strong></td>
                    <td>1d10+2 de dano cortante</td>
                    <td>23, 24</td>
                    <td>+3d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz, Manha, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Faca</strong></td>
                    <td>1d8 de dano cortante</td>
                    <td>24</td>
                    <td>+1d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Facão</strong></td>
                    <td>1d10+1 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve</td>
                    </tr>
                    <tr>
                    <td><strong>Foice</strong></td>
                    <td>1d6 de dano cortante</td>
                    <td>24</td>
                    <td>+1d8</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz</td>
                    </tr>
                    <tr>
                    <td><strong>Gadanho</strong></td>
                    <td>4d4+2 de dano cortante</td>
                    <td>24</td>
                    <td>+2d4</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Afiada</td>
                    </tr>
                    <tr>
                    <td><strong>Katana</strong></td>
                    <td>1d12+1d6 de dano cortante</td>
                    <td>23, 24</td>
                    <td>+2d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Duas Mãos, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Katar</strong></td>
                    <td>1d4+3 de dano cortante</td>
                    <td>24</td>
                    <td>+1d10</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz</td>
                    </tr>
                    <tr>
                    <td><strong>Kusarigama</strong></td>
                    <td>1d8 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Lança</strong></td>
                    <td>1d12+1 de dano cortante</td>
                    <td>24</td>
                    <td>+2d6</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Manha, Arremessável</td>
                    </tr>
                    <tr>
                    <td><strong>Maça</strong></td>
                    <td>1d10+1d4+2 de dano físico</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Impactante</td>
                    </tr>
                    <tr>
                    <td><strong>Machadinha</strong></td>
                    <td>1d8+2 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz, Arremessável</td>
                    </tr>
                    <tr>
                    <td><strong>Machado</strong></td>
                    <td>1d10+1d4 de dano cortante</td>
                    <td>24</td>
                    <td>+2d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Duas Mãos</td>
                    </tr>
                    <tr>
                    <td><strong>Macuahuitl</strong></td>
                    <td>2d12 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Pesada</td>
                    </tr>
                    <tr>
                    <td><strong>Manopla</strong></td>
                    <td>1d8 de dano físico</td>
                    <td>24</td>
                    <td>+1d8</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Martelo</strong></td>
                    <td>1d8 de dano físico</td>
                    <td>24</td>
                    <td>+1d8</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz</td>
                    </tr>
                    <tr>
                    <td><strong>Martelo Meteoro</strong></td>
                    <td>2d6 de dano físico</td>
                    <td>24</td>
                    <td>+2d4</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Manha, Impactante</td>
                    </tr>
                    <tr>
                    <td><strong>Martelo-de-Guerra</strong></td>
                    <td>2d8+1 de dano físico</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Curto</td>
                    <td>Duas Mãos, Manha, Impactante</td>
                    </tr>
                    <tr>
                    <td><strong>Motoserra</strong></td>
                    <td>3d6 de dano cortante</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Duas Mãos, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Nunchaku</strong></td>
                    <td>1d10+1 de dano físico</td>
                    <td>23, 24</td>
                    <td>+1d12</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Sagaz, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Punhal</strong></td>
                    <td>1d8+2 de dano cortante</td>
                    <td>24</td>
                    <td>+1d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Rapieira</strong></td>
                    <td>1d10 de dano cortante</td>
                    <td>23, 24</td>
                    <td>+1d10</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Manha</td>
                    </tr>
                    <tr>
                    <td><strong>Soqueira</strong></td>
                    <td>1d6 de dano físico</td>
                    <td>24</td>
                    <td>+1d6</td>
                    <td>Corpo-a-Corpo</td>
                    <td>Leve, Especial</td>
                    </tr>
                </tbody>
            </table>
            <h1 id="armas-dist-ncia">Armas à Distância</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Dano</th>
                        <th>Crítico</th>
                        <th>Modificador de Crítico</th>
                        <th>Alcance</th>
                        <th>Propriedades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>Arco</strong></td>
                    <td>1d10+1 de dano cortante</td>
                    <td>23, 24</td>
                    <td>2x</td>
                    <td>Médio</td>
                    <td>Duas Mãos</td>
                    </tr>
                    <tr>
                    <td><strong>Arco Composto</strong></td>
                    <td>1d12+1 de dano cortante</td>
                    <td>23, 24</td>
                    <td>2x</td>
                    <td>Longo</td>
                    <td>Duas Mãos</td>
                    </tr>
                    <tr>
                    <td><strong>Balestra</strong></td>
                    <td>1d10+3 de dano cortante</td>
                    <td>23, 24</td>
                    <td>+1d12</td>
                    <td>Médio</td>
                    <td>Duas Mãos</td>
                    </tr>
                    <tr>
                    <td><strong>Besta</strong></td>
                    <td>1d10+3 de dano cortante</td>
                    <td>23, 24</td>
                    <td>+1d12</td>
                    <td>Médio</td>
                    <td>Leve</td>
                    </tr>
                    <tr>
                    <td><strong>Espingarda</strong></td>
                    <td>5d8 de dano balístico</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Médio</td>
                    <td>Duas Mãos, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Fisga</strong></td>
                    <td>1d8 de dano físico</td>
                    <td>23, 24</td>
                    <td>2x</td>
                    <td>Curto</td>
                    <td>Leve</td>
                    </tr>
                    <tr>
                    <td><strong>Fuzil de Caça</strong></td>
                    <td>1d12+1d6 de dano balístico</td>
                    <td>23, 24</td>
                    <td>2x</td>
                    <td>Longo</td>
                    <td>Duas Mãos</td>
                    </tr>
                    <tr>
                    <td><strong>Lança-Chamas</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Curto</td>
                    <td>Duas Mãos,  Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Lança-Mísseis</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Médio</td>
                    <td>Duas Mãos, Pesada, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Pistola</strong></td>
                    <td>1d12+2 de dano balístico</td>
                    <td>24</td>
                    <td>+1d12</td>
                    <td>Médio</td>
                    <td>Leve</td>
                    </tr>
                    <tr>
                    <td><strong>Revólver</strong></td>
                    <td>1d12+1d4 de dano balístico</td>
                    <td>23, 24</td>
                    <td>2x</td>
                    <td>Médio</td>
                    <td>Leve</td>
                    </tr>
                    <tr>
                    <td><strong>Sniper</strong></td>
                    <td>3d10+5 de dano balístico</td>
                    <td>22, 23, 24</td>
                    <td>2x</td>
                    <td>Longo</td>
                    <td>Duas Mãos, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Submetralhadora</strong></td>
                    <td>2d6 de dano balístico</td>
                    <td>24</td>
                    <td>2x</td>
                    <td>Médio</td>
                    <td>Leve, Especial</td>
                    </tr>
                    <tr>
                    <td><strong>Uzi</strong></td>
                    <td>1d8+5 de dano balístico</td>
                    <td>23, 24</td>
                    <td>+1d8</td>
                    <td>Médio</td>
                    <td>Leve, Sagaz</td>
                    </tr>
                </tbody>
            </table>
                    
            <br>
            <button commandfor="listaArma" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
 
        <dialog id="listaUten" class="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Efeito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>Bandoleira</strong></td>
                    <td>Guarda 1 Arma ou 2 Utensílios, sacar esses itens passa a ser ação livre.</td>
                    </tr>
                    <tr>
                    <td><strong>Binóculos</strong></td>
                    <td>Garante +4 em testes de <em>Perceção</em> que envolvam observar algo distante.</td>
                    </tr>
                    <tr>
                    <td><strong>Bússola</strong></td>
                    <td>Garante +4 em <em>Testes de Jornada</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Condutor</strong></td>
                    <td>Um objeto usado como condutor de aura do Desconhecido.<br>Quando portado, garante +4 em testes de Conexão.</td>
                    </tr>
                    <tr>
                    <td><strong>Escudo</strong></td>
                    <td>Quando portado, garante +4 na reação <em>Bloquear</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Escudo Militar</strong></td>
                    <td>Quando portado, garante 5 de resistência a dano (não inclui dano <em>Mental</em> e de <em>Essências</em>) e 10 de resistência a dano balístico</td>
                    </tr>
                    <tr>
                    <td><strong>Frasco de Óleo</strong></td>
                    <td>Usado para recarregar uma Lamparina, concedendo 3 recargas.<br>Pode ser usado para encharcar um ser com o óleo, se o ser sofrer dano incendiário, entra <em>Em Chamas</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Gazua</strong></td>
                    <td>Garante +4 em testes de <em>Crime</em> para destrancar portas, janelas e caixas trancadas.</td>
                    </tr>
                    <tr>
                    <td><strong>Granada</strong></td>
                    <td>Ao usar uma ação padrão para a arremessar, explode, causando 6d6 de dano explosivo em todos em alcance curto.</td>
                    </tr>
                    <tr>
                    <td><strong>Granada de Atordoamento</strong></td>
                    <td>Ao usar uma ação padrão para a arremessar, estoura, causando um clarão acompanhado dum som alto, todos os seres em alcance médio devem girar um teste de <strong>CON</strong> contra o teste de arremesso, quem passar fica <em>Vulnerável</em> durante 1 rodada, quem falhar fica <em>Atordoado</em> durante 1 rodada.</td>
                    </tr>
                    <tr>
                    <td><strong>Granada de Fragmentação</strong></td>
                    <td>Ao usar uma ação padrão para a arremessar, explode em estilhaços, causando 6d6 de dano cortante em todos em alcance curto.</td>
                    </tr>
                    <tr>
                    <td><strong>Granada de Fumo</strong></td>
                    <td>Ao usar uma ação padrão para a arremessar, explode, criando uma grande nuvem cinza, o terreno passa a <em>Ambiente Nublado</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Granada Incendiária</strong></td>
                    <td>Ao usar uma ação padrão para a arremessar, explode em chamas, causando 6d6 de dano incendiário em todos em alcance curto, aqueles que falharem no teste de esquiva, entram <em>Em Chamas</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Lamparina</strong></td>
                    <td>Quando acesa, anula <em>Penumbra Total</em> e <em>Parcial</em><br>Dura 5 cenas, precisando ser recarregada para uso futuro.</td>
                    </tr>
                    <tr>
                    <td><strong>Lanterna Simples</strong></td>
                    <td>Quando ligada, anula <em>Penumbra Parcial</em> e torna <em>Penumbra Total</em> em <em>Parcial</em>. <br>Dura 5 cenas, precisando ser recarregada para uso futuro.</td>
                    </tr>
                    <tr>
                    <td><strong>Lanterna Tática</strong></td>
                    <td>Quando ligada, anula <em>Penumbra Total</em> e <em>Parcial</em><br>Dura 3 cenas, precisando ser recarregada para uso futuro.</td>
                    </tr>
                    <tr>
                    <td><strong>Máscara de Gás</strong></td>
                    <td>Garante +4 em testes de <strong>CON</strong> contra efeitos que dependam da respiração.</td>
                    </tr>
                    <tr>
                    <td><strong>Memorabilia</strong></td>
                    <td>Um objeto importante, repleto de boas memórias.<br>Quando portado, garante +4 em testes para resistir a dano mental.</td>
                    </tr>
                    <tr>
                    <td><strong>Óculos de Visão Noturna</strong></td>
                    <td>Quando ligado, dá te imunidade aos efeitos de <em>Penumbra Parcial</em> e <em>Total</em>.<br>Dura 5 cenas, precisando ser recarregada para uso futuro.</td>
                    </tr>
                    <tr>
                    <td><strong>Pé de Cabra</strong></td>
                    <td>Garante +4 em testes de <em>Crime</em> para abrir portas, janelas e caixas trancadas à força.<br>Pode ser usado como arma, tendo os mesmos status dum <em>Bastão</em></td>
                    </tr>
                    <tr>
                    <td><strong>Rolo de Bandagem</strong></td>
                    <td>Ao usar uma ação padrão, enrola as bandagens num ser, curando 1d12+2 de PVs.<br>Pode ser usado 5 vezes antes de acabar.</td>
                    </tr>
                    <tr>
                    <td><strong>Saco Cama</strong></td>
                    <td>Se durante uma Cena de Interlúdio, a ação <em>Descansar</em> for do tipo <em>Desconfortável</em>, o tipo muda para <em>Normal</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Spray de Pimenta</strong></td>
                    <td>Ao usar uma ação padrão para disparar contra um ser, o ser gira <strong>CON</strong> contra a tua <strong>AGI</strong>, se falhar, fica <em>Vulnerável</em> durante 1d4 rodadas. <br>Pode ser usado 3 vezes antes de esvaziar.</td>
                    </tr>
                    <tr>
                    <td><strong>Tocha</strong></td>
                    <td>Quando ligada, anula <em>Penumbra Parcial</em> e torna <em>Penumbra Total</em> em <em>Parcial</em>. <br>Dura 1 cena, apagando-se logo depois.</td>
                    </tr>
                </tbody>
            </table>
        
            <br>
            <button commandfor="listaUten" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="propArma" class="">
            <h1 id="propriedades-f-sicas">Propriedades Físicas</h1>
            <ul>
            <li><strong>Duas mãos</strong> – A arma tem de ser segurada com ambas as mãos para poder ser usada. Adiciona o valor de FOR ao dano. (Se segurar uma arma Leve com ambas as mãos, tem o mesmo efeito). Não se aplica a armas à distância</li>
            <li><strong>Sagaz</strong> – A arma foi feita para ser usada em conjunto com outra de similar tamanho, ao segurar duas armas com esta propriedade, uma em cada mão, pode atacar duas vezes numa ação, um ataque com cada.</li>
            <li><strong>Leve</strong> – A arma é leve, podendo ser segurada e usada com só uma mão.</li>
            <li><strong>Manha</strong> – Ao atacar, podes girar os testes de ataque da arma com FOR ou AGI</li>
            <li><strong>Pesada</strong> – A arma é mais pesada que o normal, só seres com 3 de FOR ou mais as podem usar</li>
            <li><strong>Arremessável</strong> - A arma foi feita para ser arremessada, testes de pontaria ao atirar a arma têm +4</li>
            <li><strong>Afiada</strong> - A arma é extremamente afiada, sempre que acertar um crítico, causa <em>Sangramento</em> no alvo.</li>
            <li><strong>Impactante</strong> - A arma causa um impacto destruidor, sempre que acertar um crítico, causa <em>Fraturado</em> no alvo(escolhe o atributo).</li>
            <li><strong>Cabo</strong> - A arma possui um longo cabo/corrente. Enquanto portar, +2 em testes da manobra <em>Desarmar</em>.</li>
            </ul>
            <h1 id="propriedades-especiais">Propriedades Especiais</h1>
            <p>Propriedades únicas para certos tipos de armas</p>
            <ul>
            <li><strong>Soqueira</strong> - Ao equipar, o dano da arma é adicionado ao dano físico.</li>
            <li><strong>Manopla</strong> - Ao equipar, o dano da arma é adicionado ao dano físico. Não ocupa as mãos, podendo segurar outros itens sem problemas.</li>
            <li><strong>Kusarigama</strong> - Ao atacar, pode escolher atacar com a bola de ferro na outra ponta, mudando o tipo de dano para físico. Enquanto portar, +4 em testes da manobra <em>Desarmar</em>.</li>
            <li><strong>Desmontador</strong> - Enquanto portar, +4 em testes da manobra <em>Agarrar</em>.</li>
            <li><strong>Motosserra</strong> – Ao girar o dano, sempre que calhar um 6 o dano aumenta em +1d6</li>
            <li><strong>Sniper</strong> – Quanto mais longe, menor o acerto da Sniper. Distância corpo-a-corpo - desvantagem; Distância curta – -6; Distância média – -4; Distância longa – Normal;</li>
            <li><strong>Espingarda</strong> – Quanto mais perto, maior o dano da Escopeta. Distância média : -4D; Distância curta : -2D; Distância corpo-a-corpo – dano normal;</li>
            <li><strong>Espada Gancho</strong> – Podes gastar uma ação de movimento para juntar as armas, formando uma nova arma que possui alcance curto, causa +1D de dano mas perde a propriedade Sagaz.</li>
            <li><strong>Lança-Chamas</strong> - Ao acertar um ataque, o alvo fica <em>Em Chamas</em>.</li>
            <li><strong>Lança-Mísseis</strong> - Ataques causam dano em área, resultando numa explosão. Ao acertar um ponto, todos em alcance curto são alvos do ataque.</li>
            <li><strong>Submetralhadora</strong> - Pode atacar duas vezes numa ação.</li>
            </ul>
            <h1 id="propriedades-customizadas">Propriedades Customizadas</h1>
            <p>Estas são as propriedades que podes escolher adicionar na arma, aumentando a sua força</p>
            <ul>
            <li><strong>Balanceada</strong> – Uma arma perfeitamente balanceada, permitindo uma melhor movimentação. Enquanto portares, +2 em testes de <strong>AGI</strong>(não inclui ataques)</li>
            <li><strong>Certeira</strong> – A arma dá +4 em testes de ataque feitos com ela (Pode escolher esta propriedade 2 vezes) </li>
            <li><strong>Cruel</strong> - A arma possui espinhos(ou outras partes) que aumentam o seu perigo, +4 no dano. (Pode escolher esta propriedade 2 vezes) </li>
            <li><strong>Compartimento</strong> - A arma possui um pequeno compartimento, dentro dele um frasco com veneno. Ao gastar uma ação de movimento, o veneno é aplicado na arma, durante 1 rodada, acertos com a arma causam <em>Envenenado(Fraco)</em> no alvo. Depois de 3 usos, é preciso gastar uma ação numa <em>Cena de Interlúdio</em> para poder voltar a usar.  (Pode escolher esta propriedade 3 vezes, aumentando o patamar do veneno para cada escolha consecutiva).</li>
            <li><strong>Defensora</strong> – Enquanto segurares a arma a tua <strong>DEF</strong> aumenta em 2 (Pode escolher esta propriedade 3 vezes) </li>
            <li><strong>Destruidora</strong> – O Modificador de crítico da arma sobe um nível, uma arma não pode ser Destruidora e Perigosa ao mesmo tempo</li>
            <li><strong>Imponente</strong> – A tua arma tem um aspeto ameaçador, enquanto segurares a arma +4 em testes de *Intimidação</li>
            <li><strong>Longo</strong> – Tu estendes o tamanho da tua arma, o alcance da arma aumenta em 1 patamar.</li>
            <li><strong>Otimizada</strong> – Uma arma cujo saque foi otimizado, enquanto segurares a arma +4 em testes de <em>Iniciativa</em></li>
            <li><strong>Penetrante</strong> – A arma ignora resistências contra o seu tipo de dano, ela só ignora resistências que sejam menores ou iguais à <strong>FOR</strong> ou <strong>AGI</strong> do usuário</li>
            <li><strong>Perigosa</strong> – A chance de crítico da arma aumenta em 1, uma arma não pode ser Destruidora e Perigosa ao mesmo tempo</li>
            <li><strong>Potente</strong> – A arma causa +1D de dano (Pode escolher esta propriedade 2 vezes)</li>
            </ul>
        
            <br>
            <button commandfor="propArma" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaDebate" class="">
            <p>Em certos momentos, os personagens precisam resolver a situação duma forma menos agressiva, por vezes, a situação precisa ser resolvida na base da discussão, para isso existem <em>Cenas de Debate</em>.</p>
            <p><em>Cenas de Debate</em>, similar a <em>Cenas de Combate</em>, são divididas em rodadas e turnos, cada personagem participando de 1 de 2 lados.</p>
            <h1 id="lados-do-debate">Lados do Debate</h1>
            <p>Toda a <em>Cena de Debate</em> tem dois lados, o <em>Lado a ser Convencido</em>(<strong>LC</strong>) e o <em>Lado Oposto</em>(<strong>LO</strong>), o <strong>LC</strong> toma uma posição passiva e defensiva enquanto que o <em>Lado Oposto</em> toma a posição ativa e atacante. Nomeadamente, o <strong>LO</strong> tenta convencer o <strong>LC</strong> a acreditar em algo, enquanto o <strong>LC</strong> argumenta contra.</p>
            <h1 id="regras-do-debate">Regras do Debate</h1>
            <p>O <strong>LC</strong> tem um <em>Valor de Desconfiança</em>(<strong>VD</strong>), por rodada, 2 membros do <strong>LO</strong> devem girar testes de <strong>INT</strong>/<strong>CAR</strong>, o resultado dos testes reduz o <strong>VD</strong>, por exemplo, se um ser tirar 18 no teste, o <strong>VD</strong> diminui em 18, se o valor for reduzido a 0, o <strong>LC</strong> é convencido. Dependendo da interpretação do personagem e das palavras ditas, o <em>Mestre</em> pode escolher conceder ao seu teste um modificador positivo ou negativo.
            Durante essa rodada, porém, os lados podem escolher usar, antes de girar o teste, uma das suas ações especiais para mudar ou adicionar condições aos seus testes. Cada ação só pode ser usada uma vez por cena.</p>
            <h2 id="a-es-especiais-do-lc">Ações Especiais do LC</h2>
            <ul>
            <li><strong>Questionar</strong> - O <strong>LC</strong> questiona algo dito, o <strong>LC</strong> escolhe um membro do <strong>LO</strong>, esse membro gira um teste de <em>Diplomacia</em>(<strong>CAR</strong>) contra o <strong>LC</strong>, se falhar, tem desvantagem na próxima rodada, se passar, tem +6 na próxima rodada.</li>
            <li><strong>Interromper</strong> - O <strong>LC</strong> corta a fala do <strong>LO</strong> a meio, na próxima rodada, um dos membros do <strong>LO</strong> tem -1D nos testes.</li>
            <li><strong>Distorcer</strong> - O <strong>LC</strong> distorce as palavras de um membro do <strong>LO</strong>, o resultado do teste desse membro é reduzido pela metade.<h2 id="a-es-especiais-do-lo">Ações Especiais do LO</h2>
            </li>
            <li><strong>Falácia</strong> - O <strong>LO</strong> usa-se duma falácia, o membro do <strong>LO</strong> gira um teste de <em>Diplomacia</em>(<strong>CAR</strong>) contra o <strong>LC</strong>, se falhar, o <strong>LC</strong> recupera 1d8+4 de <strong>VD</strong>, se passar, tem vantagem na próxima rodada.</li>
            <li><strong>Mentira</strong> - O <strong>LO</strong> conta uma mentira superficial, que a princípio parece verídica mas que com pouco pensamento era desmentida, o membro do <strong>LO</strong> gira um teste de <em>Enganação</em>(<strong>CAR</strong>) contra o <strong>LC</strong>, se passar, tem +4 na próxima rodada, se falhar, tem -4 na próxima rodada.</li>
            <li><strong>Compaixão</strong> - O <strong>LO</strong> diz um argumento que vai contra si mesmo, tentando demonstrar-se empático e reconhecer a dúvida do <strong>LC</strong>, o membro do <strong>LO</strong> gira um teste de <em>Diplomacia</em>(<strong>CAR</strong>) contra o <strong>LC</strong>, se passar, diminui o <strong>VD</strong> em 1d6+4, se falhar, perde o seu turno.</li>
            </ul>

            <br>
            <button commandfor="cenaDebate" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="cenaDuelo" class="">
            <p>Quando dois seres de similar força se encontram, existe a chance da própria Espiral sentir o confronto, o conflito intenso da vontade de ambos, vontades que, por seu número de membros reduzido, de destacam muito mais que outras, com a vontade e a aura de ambos os seres a transbordarem de seus eus, um foco intenso causado pela distorção da Espiral força esse mesmo duelo a acontecer sem interrupções.</p>
            <p>Um <em>Duelo de Vontades</em> é igual a uma <em>Cena de Combate</em> porém com algumas regras e condições adicionais. Ao invés de girar testes de <em>Iniciativa(<strong>AGI</strong>)</em>, os envolvidos giram um ataque com suas armas, aquele que tiver o maior resultado é o primeiro a acertar um golpe, um golpe meramente narrativo, golpe esse que define quem agirá primeiro. Depois disso, o combate segue como sempre, sendo afetados pelas seguintes regras e condições.</p>
            <h1 id="coreografia-de-combate">Coreografia de Combate</h1>
            <p>Durante o Duelo, ao ser alvo de um ataque, as reações funcionam duma forma diferente. Ao invés de escolher uma das 3 reações e girar um teste oposto, o ser atacado simplesmente narra o que faz como reação, fazer isso dá ao atacante a chance de narrar uma reação e um novo ataque, o ser atacado pode então narrar outra reação e o atacante narrar um terceiro, e último, ataque, uma última tentativa de acertar.
            Para cada ataque adicional, o ser ganha uma desvantagem no teste mas o dano é aumentado (2x para 2 ataques e 3x para 3 ataques), o ser atacado não gira nada, dependendo inteiramente do teste do atacante. O ser atacado pode também escolher não reagir, não garantindo ao atacante a chance de causar esse dano aumentado.
            Esta regra aplica-se apenas a ataques normais, não se aplicando a magias.</p>
            <h1 id="ultimato">Ultimato</h1>
            <p>Após 5 rodadas de combate, os dois participantes podem começar um <em>Ultimato</em>, ao começar o Ultimato, os dois participantes devem apenas girar o seu dano armado, ao mesmo tempo, sem teste, apenas dano, continuado até um cair, sem interrupções.</p>
            <h1 id="condi-es">Condições</h1>
            <ul>
            <li>Seres que tentem se infiltrar a meio do Duelo têm desvantagem em todos os testes. Testes dos Duelistas que sejam direcionados a esses seres têm vantagem.</li>
            <li>Ao começar o Duelo, todos os envolvidos recuperam 20 de todos os status.</li>
            <li>Vencer o duelo traz ao vencedor uma resolução intensa e incomparável, demonstrando a si mesmo o esplendor da sua vontade superior. O ser ganha um poder de Apostasia.</li>
            </ul>

            <br>
            <button commandfor="cenaDuelo" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaFurti" class="">
            <p>Em certos momentos, os personagens precisam ser discretos, esconder-se do mal ao invés do enfrentar, para isso existem <em>Cenas de Furtividade</em>.
            <em>Cenas de Furtividade</em> possuem dois lados opostos: O <em>Buscador</em> e os <em>Escondidos</em>.</p>
            <h1 id="o-buscador">O Buscador</h1>
            <p>O <em>Buscador</em> representa o ser ou seres que procuram aqueles que se escondem, tomando a posição ofensiva na cena.
            O <em>Buscador</em> possui um <em>Nível de Perceção</em>(<strong>NP</strong>), sendo esse um valor de 1 a 10, esse valor define o quão bom o <em>Buscador</em> é a notar os <em>Escondidos</em>(quanto menor o valor, melhor), definindo o limite de exposição que os <em>Escondidos</em> podem chegar antes de serem notados.</p>
            <p>No começo da cena, o <em>Buscador</em> faz um teste de <em>Perceção</em>(<strong>INT</strong>/<strong>CAR</strong>), o resultado define a <strong>RN</strong> dos testes de <em>Furtividade</em> dos <em>Escondidos</em>. A partir daí, por rodada, pode então escolher fazer uma ação especial.</p>
            <h2 id="a-es-especiais-de-buscador">Ações Especiais de Buscador</h2>
            <ul>
            <li><strong>Nova Perspetiva</strong> - O <em>Buscador</em> muda a forma como está a tentar encontrar os <em>Escondidos</em>, re-rolando o teste de <em>Perceção</em>(<strong>INT</strong>/<strong>CAR</strong>) e definindo uma nova <strong>RN</strong>.</li>
            <li><strong>Desfazer Esconderijo</strong> - O <em>Buscador</em> destrói um dos possíveis esconderijos da cena, todos os testes de <em>Furtividade</em> dos <em>Escondidos</em> passam a ter -2 até o fim da cena. Esta ação só poder ser tomada 2 vezes por cena.</li>
            <li><strong>Forçar Erro</strong> - O <em>Buscador</em> faz uma ação inesperada, um som alto, um movimento brusco, tentando tirar um som ou movimento dos <em>Escondidos</em>, o <em>Buscador</em> escolhe um <em>Escondido</em> e gira <em>Intimidação</em>(<strong>CAR</strong>) contra o mesmo, se passar, o <strong>NE</strong> do <em>Escondido</em> aumenta em 1.</li>
            </ul>
            <h1 id="os-escondidos">Os Escondidos</h1>
            <p>Os <em>Escondidos</em> representam o ser ou seres que se estão a esconder, tomando a posição defensiva na cena.
            Os <em>Escondidos</em> possuem um <em>Nível de Exposição</em>(<strong>NE</strong>), representando o quão exposto o <em>Escondido</em> está, esse nível começa a 0 e aumenta em 1(ou mais) a cada teste que o <em>Escondido</em> fracassar. Se o <strong>NE</strong> de um <em>Escondido</em> for igual ou maior ao <strong>NP</strong> do <em>Buscador</em>, o <em>Escondido</em> é encontrado pelo <em>Buscador</em>.
            Um grupo de <em>Escondidos</em> compartilha um único <strong>NE</strong>, sendo igual ao maior <strong>NE</strong> do grupo
            (Por exemplo, se num grupo de 3 <em>Escondidos</em>, um deles tiver <strong>NE</strong> : 2, outro <strong>NE</strong> : 1 e o outro <strong>NE</strong> : 0, o <strong>NE</strong> do grupo é 2). Se o <em>Buscador</em> encontrar um membro do grupo, ele encontra todos.</p>
            <p>No começo de cada rodada, os <em>Escondidos</em> fazem um teste de <em>Furtividade</em>(<strong>AGI</strong>) contra a <strong>RN</strong> do <em>Buscador</em>, podendo então escolher fazer uma ação especial.</p>
            <h2 id="a-es-especiais-de-escondido">Ações Especiais de Escondido</h2>
            <ul>
            <li><strong>Esconder</strong> - O <em>Escondido</em> tenta mudar seu esconderijo, esconder-se melhor, o jogador descreve como o <em>Escondido</em> se esconde e faz um teste de <em>Furtividade</em>(<strong>AGI</strong>; <strong>RN</strong> fica a critério do <em>Mestre</em>), se passar, o <strong>NE</strong> do <em>Escondido</em> diminui em 1.</li>
            <li><strong>Distração</strong> - O <em>Escondido</em> tenta distrair o <em>Buscador</em>, fazendo um teste de <em>Enganação</em>(<strong>CAR</strong>) contra o mesmo, se passar, diminui o <strong>NE</strong> de outro <em>Escondido</em>(à escolha do <em>Escondido</em>) em 1, se falhar, aumenta o seu <strong>NE</strong> próprio em 1. Só 1 <em>Escondido</em> pode tomar esta ação por rodada, a cada vez que esta ação é tomada na cena, o <em>Buscador</em> ganha +4 no teste de <strong>CAR</strong> para resistir à distração.</li>
            <li><strong>Atenção</strong> - O <em>Escondido</em> chama atenção para si mesmo, para evitar que outro <em>Escondido</em> seja encontrado, o <strong>NE</strong> do <em>Escondido</em> aumenta em 2, o <strong>NE</strong> de outro <em>Escondido</em>(à escolha do personagem) diminui em 1.</li>
            <li><strong>Importunar</strong> - O <em>Escondido</em> tenta chamar atenção para outro <em>Escondido</em>, girando <strong>INT</strong> contra o mesmo, se passar, o <strong>NE</strong> do outro <em>Escondido</em> aumenta em 1, se falhar, o <strong>NE</strong> próprio aumenta em 1.</li>
            <li><strong>Sacrificar</strong> - O <em>Escondido</em> revela-se ao <em>Buscador</em>, sendo encontrado mas diminuindo a <strong>NE</strong> de todos os outros <em>Escondidos</em> em 2.</li>
            <li><strong>Outro</strong> - O <em>Escondido</em> pode tomar qualquer outra ação, necessitando sempre fazer um teste de <em>Furtividade</em>(<strong>AGI</strong>) contra a <strong>RN</strong> do Buscador, se falhar no teste, pode fazer a ação na mesma.</li>
            </ul>

            <br>
            <button commandfor="cenaFurti" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaGuerra" class="">
            <p>Quando dois grupos de similares números e força se encontram, existe a chance da própria Espiral sentir o confronto, o conflito das vontades dos envolvidos, existe a chance da Espiral tomar interesse em tal conflito, o céu coberto pela sua influência, uma distorção na realidade com um formato de espiral e um confronto que é forçado a acontecer.</p>
            <p>Uma <em>Guerra de Vontades</em> é igual a uma <em>Cena de Combate</em> porém com algumas condições adicionais. Antes do começo do combate, as equipas devem escolher os Rivais de Vontades, associando cada membro duma equipa com um membro da outra, sem repetições. A equipe que foi atacada escolhe primeiro, as equipas então alternam até todos terem um Rival.
            Apenas a equipe que atacou gira Iniciativa, os membros da outra equipe tendo o seu turno na ordem de iniciativa logo depois do seu rival.</p>
            <h1 id="condi-es-dos-rivais">Condições dos Rivais</h1>
            <ul>
            <li>Testes feitos contra o teu Rival têm +2 e causam 1d10 de dano extra.</li>
            <li>Testes feitos contra alguém que não seja o teu Rival têm -10 e o dano reduzido em 1D</li>
            <li>Matar o teu Rival traz uma resolução absoluta, uma vitória como nenhuma outra, uma prova da tua vontade superior. Ao matar o teu Rival, tu recuperas 20 de PV, PdT e SAN e perdes as outras condições de Rival.</li>
            </ul>

            <br>
            <button commandfor="cenaGuerra" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaInteracao" class="">
            <p>As Cenas de Interação são as cenas que se encontram entre as cenas importantes, entre os combates, investigações, descansos e etc, os personagens têm momentos para falar e se conhecerem melhor.</p>
            <p>Cenas de Interação não possuem regras mecânicas, sendo puramente narrativas, servindo para os personagens comunicarem, aprofundar laços, discutir temas da história, fazer planos e etc. É importante o <em>Mestre</em> incentivar tais interações para, assim, formar uma história mais aprofundada e mais conectada com os jogadores, melhorando a experiência para todos. Importante clarificar também que os personagens podem, obviamente, interagir fora de Cenas de Interação.</p>
        
            <br>
            <button commandfor="cenaInteracao" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaInterludio" class="">
            <p>Por mais que passem por muitas dificuldades, em certos momentos, os personagens precisam de descansar, recuperar antes de seguir caminho, para isso existem Cenas de Interlúdio.</p>
            <h1 id="a-es-e-atividades">Ações e Atividades</h1>
            <p>Durante uma cena de Interlúdio, todos os personagens têm um número de ações que podem fazer. O número varia dependendo do tempo que a cena durará, um momento breve para descansar só daria aos personagens 1 ação, enquanto que umas horas de descanso dariam 3, por exemplo. O limite de ações por <em>Cena de Interlúdio</em> é 3.
            Eles gastam as ações para fazer as seguintes atividades, podendo escolher como quiserem quais fazer, cada ação tendo o seu custo :</p>
            <ul>
            <li><strong>Relaxar(<em>1 Ação</em>)</strong> - Aproveita o tempo para fazer uma atividade que considere relaxante, um hobby, algo para relaxar a mente. Recuperando 2d12 ou de <strong>PV</strong> ou de <strong>PdT</strong> ou de <strong>SAN</strong>.</li>
            <li><strong>Descansar(<em>2 Ações</em>)</strong>  - Aproveita o tempo para dormir, recuperando o corpo inteiro. Existem 3 tipos de descanso, o tipo depende do estado do ambiente :<ul>
            <li><strong>Normal</strong> - Um descanso normal, obtido ao dormir numa cama normal ou num lugar similar, recupera 2d12 de <strong>PV</strong> e <strong>PdT</strong> e 1d12 de <strong>SAN</strong>.</li>
            <li><strong>Desconfortável</strong> - Um descanso num lugar desconfortável, obtido ao dormir no interior dum carro, numa tenda ou num lugar similar, recupera 1d12 de <strong>PV</strong> e <strong>PdT</strong>.</li>
            <li><strong>Luxuoso</strong> - Um descanso num lugar chique, obtido ao dormir num hotel de luxo, uma cama almofadada ou num lugar similar, recupera 3d12 de <strong>PV</strong> e <strong>PdT</strong> e 2d12 de <strong>SAN</strong>.</li>
            </ul>
            </li>
            <li><strong>Alimentação(<em>1 Ação</em>)</strong> - Aproveita o tempo para comer algo, recuperando 1d12+6 de <strong>PV</strong> e <strong>PdT</strong>.</li>
            <li><strong>Aquecimento(<em>1 Ação</em>)</strong> - Aproveita o tempo para fazer um aquecimento físico, fazendo uns exercícios simples e rápidos. Até o fim da próxima cena, +2 em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong></li>
            <li><strong>Informar(<em>1 Ação</em>)</strong> - Aproveita o tempo para fazer um aquecimento mental, lendo livros ou artigos para poder o cérebro a trabalhar. Até o fim da próxima cena, +2 em testes de <strong>INT</strong> e <strong>CAR</strong>.</li>
            <li><strong>Ofício(2 Ações)</strong> - Tu aproveitas o tempo para tentar fazer um item que te vá ajudar no futuro, tu crias um item da Lista de Utensílios.</li>
            <li><strong>Treinar(<em>Varia</em>)</strong> - Faz um longo treino, durando horas onde o personagem foca-se em melhorar algo. Pode fazer 1 dos seguintes treinos :<ul>
            <li><strong>Aprimorar(<em>2 Ações</em>)</strong> - Ganha 1 <em>Proficiência</em>.</li>
            <li><strong>Aprender(<em>3 Ação</em>)</strong> - Aprende 1 <em>Habilidade Geral</em>.</li>
            <li><strong>Estudar(<em>3 Ação</em>)</strong> - Aprende 1 <em>Magia</em>.</li>
            </ul>
            </li>
            </ul>
        
            <br>
            <button commandfor="cenaInterludio" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="cenaInvesti" class="">
            <p>Em certos momentos, os personagens precisam parar e explorar os seus arredores, investigar para aprender mais sobre a situação onde se encontram, para isso existem <em>Cenas de Investigação</em>.</p>
            <p><em>Cenas de Investigação</em>, similar a <em>Cenas de Combate</em>, são divididas em rodadas e turnos, cada personagem tendo 1 turno. A área que vão investigar é então dividida em diversos <em>Pontos de Interesse</em> e a cena começa.</p>
            <h1 id="pontos-de-interesse">Pontos de Interesse</h1>
            <p>Locais específicos dentro do ambiente que se destacam dos outros, parecendo pontos vitais do mistério a ser investigado, podendo, ou não, possuir pistas.
            Um <em>Ponto de Interesse</em> pode possuir mais que 1 pista, cada pista escondida no <em>Ponto de Interesse</em> possui a sua própria <strong>RN</strong>, requirindo um teste para ser descoberta. Normalmente, o teste é de <em>Investigação</em>(<strong>INT</strong>) mas pode ser de qualquer tipo ou atributo, dependendo do que fizer mais sentido para a cena.</p>
            <h1 id="a-es-dos-personagens">Ações dos Personagens</h1>
            <p>No começo, todos os participantes giram <em>Iniciativa</em>(<strong>AGI</strong>) para definir a ordem dos turnos.</p>
            <p>No seu turno, o personagem pode tomar 1 das seguintes ações:</p>
            <ul>
            <li><strong>Investigar</strong> - Escolhe um <em>Ponto de Interesse</em>, decidindo investigá-lo, gira o teste necessário para descobrir a pista e, se passar, descobre a mesma. Se o <em>Ponto de Interesse</em> possuir mais que 1 pista, o <em>Mestre</em> deve dizer ao jogador os tipos de teste que pode girar para as diferentes pistas e deixá-lo escolher uma, descobrindo a pista respetiva ao teste. 
            Se o mesmo personagem investigar o mesmo <em>Ponto de Interesse</em> mais que uma vez, depois de uma falha, ele ganha uma desvantagem por cada vez consecutiva. 
            <strong>Ex</strong> : Se um personagem investigar o mesmo ponto 3 vezes, na 1º vez não tem desvantagem, na 2º vez tem 1 desvantagem e na 3º vez tem 2 desvantagens e assim vai.</li>
            <li><strong>Auxiliar</strong> - Ao invés de investigar, decide ajudar outra personagem a investigar, concedendo ao personagem +4 no teste.</li>
            <li><strong>Analisar</strong> - Ao invés de investigar, analisa o ambiente num geral, o personagem gira <em>Perceção</em>(<strong>INT</strong>; <strong>RN</strong> varia com o número de <em>Pontos de Interesse</em>), se passar, descobre se existem <em>Pontos de Interesse</em> que não possuem pistas, descobrindo também quais são.</li>
            <li><strong>Prevenir</strong> - Ao invés de investigar, analisa os arredores exteriores do ambiente, o personagem gira <em>Sobrevivência</em>(<strong>INT</strong>), se passar, descobre a <em>Duração</em> da cena.</li>
            </ul>
            <h1 id="dura-o">Duração</h1>
            <p>A <em>Duração</em> duma <em>Cena de Investigação</em> pode variar, podendo ou durar até todas as pistas serem encontradas ou ter uma <em>Duração</em> definida, tendo um número de rodadas limite, a cena acabando com algum evento exterior que interrompe a investigação, forçando os personagens a entrarem noutro tipo de cena.</p>

            <br>
            <button commandfor="cenaInvesti" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="cenaJornada" class="">
            <p>Em certos momentos, os personagens precisam realizar uma viagem, longa ou não, para poder chegar ao seu objetivo, para isso existem Cenas de Jornada.</p>
            <p>Cenas de Jornada são simples em execução, todos os envolvidos devem girar um <em>Teste de Jornada</em>, o tipo de teste pode variar, dependendo da forma que o ser descrever como percorre a trajetória a ser feita. O RN do <em>Teste de Jornada</em> depende do tempo e do terreno a ser percorrido.
            Seres que passem no teste, recebem um <em>Benefício de Jornada</em> à escolha do Mestre, seres que falhem, recebem um <em>Malefício de Jornada</em>, também à escolha do Mestre.</p>
            <h1 id="benef-cios-de-jornada">Benefícios de Jornada</h1>
            <ul>
            <li>Recupera 2d12 ou de <strong>PV</strong> ou de <strong>PdT</strong> ou de <strong>SAN</strong>.</li>
            <li>Até o fim da próxima cena, +2 em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong></li>
            <li>Imune a <em>Terreno Complexo</em> até a próxima <em>Cena de Interlúdio</em>.</li>
            <li>Recupera 1d12 de <strong>PV</strong>, <strong>PdT</strong> e <strong>SAN</strong>.</li>
            <li>+4 em um tipo de teste(à escolha do Mestre) até o fim da próxima cena.</li>
            <li>Cura <em>Fraco</em> ou <em>Cansado</em>.</li>
            </ul>
            <h1 id="malef-cios-de-jornada">Malefícios de Jornada</h1>
            <ul>
            <li>Perde 1d12+6 ou de <strong>PV</strong> ou de <strong>PdT</strong>.</li>
            <li>Até o fim da próxima cena, -2 em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong></li>
            <li>Fica <em>Fraturado</em> até o fim da próxima cena.</li>
            <li>Perde 1d8 de <strong>PV</strong>, <strong>PdT</strong> e <strong>SAN</strong>.</li>
            <li>-4 em um tipo de teste(à escolha do Mestre) até o fim da próxima cena.</li>
            <li>Fica <em>Cansado</em> até o fim da próxima cena.</li>
            </ul>
        
            <br>
            <button commandfor="cenaJornada" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="cenaPersegu" class="">
            <p>Em certos momentos, os personagens não conseguem enfrentar uma ameaça diretamente, precisando fugir, correr para chegar a um lugar seguro, para isso existem <em>Cenas de Perseguição</em>.</p>
            <p><em>Cenas de Perseguição</em>, similar a <em>Cenas de Combate</em>, são divididas em rodadas e turnos, cada personagem tendo 1 turno e 1 ação. No começo da cena, todos os envolvidos giram um teste de iniciativa(<strong>AGI</strong>), assim definindo a ordem dos turnos, após isso a cena finalmente começa.
            Uma <em>Cena de Perseguição</em> envolve perseguidores e perseguidos. Os personagens não precisam de necessariamente ser os perseguidos, a sua função na cena pode alterar.</p>
            <h1 id="regras-de-persegui-o">Regras de Perseguição</h1>
            <p><em>Cenas de Perseguição</em> são resolvidas com diversos testes de <strong>AGI</strong>, para sobreviver, um personagem necessita de acumular um número específico de sucessos(o número depende da cena). 
            Nomeadamente, se um <em>Perseguido</em> alcançar o número de sucessos necessários ele está salvo, ficando fora da cena. 
            Se um <em>Perseguidor</em> alcançar esse mesmo número de sucessos ele alcança um Perseguido à sua escolha, dando um ataque direto no mesmo.</p>
            <p>A RN dos testes é definida pelos perseguidores no começo da cena, o perseguidor gira um teste de <strong>AGI</strong>, o seu resultado vira a RN (o mestre pode, ao invés disso, escolher uma RN fixa), depois de definir a RN, todos giram. 
            Se um <em>Perseguido</em> acumular 3 falhas, ele é apanhado, sofrendo um ataque direto e inevitável do <em>Perseguidor</em>, se um <em>Perseguidor</em> acumular 3 falhas, todos os <em>Perseguidos</em> ganham 1 sucesso.
            Depois de girar o testes de <strong>AGI</strong>, os envolvidos podem escolher usar uma ação especial.</p>
            <h1 id="a-es-especiais">Ações Especiais</h1>
            <h2 id="perseguidos">Perseguidos</h2>
            <ul>
            <li><strong>Auxiliar</strong> - O personagem tenta ajudar outro perseguido a correr mais rápido. O personagem faz o teste normal porém com -4, mas concede ao outro perseguido +4 no seu próximo teste.</li>
            <li><strong>Cortar Caminho</strong> - O personagem tenta tomar um caminho mais curto porém mais difícil. O personagem faz o teste normal porém com uma desvantagem, mas, se passar, ganha 2 sucessos. (O Mestre pode determinar que não existe forma de cortar caminho, impossibilitando esta ação).</li>
            <li><strong>Esforço Extra</strong> - O personagem dá o seu máximo. O personagem faz o teste normal porém com +4, mas perde 1d6 <strong>PVs</strong> para cada vez que usou esta ação na cena (1d6 na primeira, 2d6 na segunda, 3d6 na terceira e assim vai).</li>
            <li><strong>Criar Obstáculo</strong> - O personagem tenta criar um obstáculo para os <em>Perseguidores</em>. O personagem faz o teste normal porém com desvantagem, fazendo também um teste de <strong>FOR</strong> ou <strong>INT</strong> (RN depende do obstáculo que o perseguido queira criar), se passar, cria o obstáculo, diminuindo a RN do teste de <strong>AGI</strong> em -4 para todos. Só um personagem pode fazer esta ação por cena. (Assim como em <em>Cortar Caminho</em>, o mestre pode escolher que está ação é impossível).</li>
            <li><strong>Sacrificar</strong> - O personagem para de correr, tentando atrapalhar ao máximo os <em>Perseguidores</em>. O personagem automaticamente falha no teste, mas fornece aos outros <em>Perseguidos</em> +4 no seu próximo teste.</li>
            </ul>
            <h2 id="perseguidores">Perseguidores</h2>
            <ul>
            <li><strong>Cortar Caminho</strong> - O personagem tenta tomar um caminho mais curto porém mais difícil. O personagem faz o teste normal porém com uma desvantagem, mas, se passar, ganha 2 sucessos. (O Mestre pode determinar que não existe forma de cortar caminho, impossibilitando esta ação).</li>
            <li><strong>Esforço Extra</strong> - O personagem dá o seu máximo. O personagem faz o teste normal porém com +4, mas perde 1d6 PVs para cada vez que usou esta ação na cena (1d6 na primeira, 2d6 na segunda, 3d6 na terceira e assim vai).</li>
            <li><strong>Criar Obstáculo</strong> - O personagem tenta criar um obstáculo para os <em>Perseguidos</em>. O personagem faz o teste normal porém com desvantagem, fazendo também um teste de <strong>FOR</strong> ou <strong>INT</strong> (RN depende do obstáculo que o perseguido queira criar), se passar, cria o obstáculo, aumentando a RN do teste de <strong>AGI</strong> em +4 para todos. Só um personagem pode fazer esta ação por cena. (Assim como em <em>Cortar Caminho</em>, o mestre pode escolher que está ação é impossível).</li>
            <li><strong>Forçar Erro</strong> - O personagem tenta bater num dos Perseguidos, não para o ferir, mas para estragar o seu equilíbrio forçando-o a abrandar. O personagem faz o teste normal porém com uma desvantagem, mas, se passar, escolhe 1 <em>Perseguido</em>, esse <em>Perseguido</em> ganha 1 falha.</li>
            <li><strong>Desafiar</strong> - O personagem tenta mudar o ritmo da sua corrida. Gira um novo teste de <strong>AGI</strong>, definindo uma nova RN para a cena. Se fizer isso depois de algum teste de <strong>AGI</strong> dos participantes, todos re-rolam.</li>
            </ul>

            <br>
            <button commandfor="cenaPersegu" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="dificilTerreno" class="">
            <p>Nem sempre o ambiente é propenso para combate, podendo gerar desvantagens para aqueles que lutarem nele</p>
            <h1 id="lista-de-dificuldades-de-terreno">Lista de Dificuldades de Terreno</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="text-align:left"></th>
                    <th>Efeito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="text-align:left"><strong>Ambiente Nublado</strong></td>
                    <td>O ambiente é ocultado por uma neblina forte, seres dentro da neblina têm -4 em testes de perceção que envolvam visão e +4 em testes de furtividade.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Ambiente Sufocado</strong></td>
                    <td>O ambiente não possui ar respirável, seres conseguem aguentar a respiração por um número de rodadas igual ao seu valor de <strong>CON</strong>, depois disso devem girar testes de <strong>CON</strong> por rodada (RN : 5(+5 para cada teste feito anteriormente)), se falhar fica <em>Desacordado</em> e começa a perder 1d12 de vida por rodada, só parando quando respirar novamente.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Cheia</strong></td>
                    <td>O ambiente tem um nível de água que chega até os joelhos dos seres. Os seres têm o movimento reduzido pela metade e -4 em testes de <strong>AGI</strong></td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Extremas Temperaturas</strong></td>
                    <td>O ambiente tem uma temperatura extremamente elevada ou reduzida, seres nesse ambiente sofrem 1 dos seguintes efeitos :<br><em>Calor</em> - -4 em testes de <strong>CON</strong> <br><em>Frio</em> - -4 em testes de <strong>AGI</strong></td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Incêndio</strong></td>
                    <td>O ambiente está em chamas, todos os seres ganham o estado <em>Em Chamas</em>, só conseguindo sair dele quando o incêndio for apagado ou quando saírem da área em chamas. Se o incêndio ocorrer num espaço fechado, adiciona os efeitos de <em>Ambiente Sufocado</em> além dos normais.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Penumbra Parcial</strong></td>
                    <td>O ambiente está escuro, com baixa visibilidade, tem os mesmos efeitos que ambiente nublado. Pode ser anulado por fontes de luz como lanternas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Penumbra Total</strong></td>
                    <td>O ambiente está completamente escuro, todos os testes de perceção que envolvam visão falham imediatamente e testes de furtividade têm vantagem. Pode ser anulado ou reduzido a <em>Parcial</em> por fontes de luz como lanternas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Terreno Complexo</strong></td>
                    <td>O chão é desnivelado ou instável, todo o movimento é reduzido pela metade.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Vento Forte</strong></td>
                    <td>O ambiente tem uma corrente de ar constante e muito forte, -4 em testes de ataque à distância, por rodada gira 1d4, se calhar 1 ou 2, chamas são apagadas e névoas dissipadas.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Queda Livre</strong></td>
                    <td>O ambiente não possui chão, a cena acontecendo enquanto os seres rapidamente caem dum ponto alto. Testes de <em>Pontaria</em> têm falha garantida, todo o movimento é reduzido pela metade e todos os seres ficam <em>Vulneráveis</em> e <em>Fracos</em>. As penalidades, excluindo a que afeta <em>Pontaria</em>, não afetam seres que consigam voar.</td>
                    </tr>
                    <tr>
                    <td style="text-align:left"><strong>Submerso</strong></td>
                    <td>O ambiente está completamente submerso por água ou outro líquido similar. A ação de movimento <em>Deslocar</em> requer um teste de <strong>AGI</strong>/<strong>FOR</strong>(<strong>RN</strong> varia dependendo do movimento da água), possui as mesmas condições de <em>Ambiente Sufocado</em>, ataques à distância têm o seu alcance reduzido em uma categoria e todos os seres ficam <em>Fracos</em>.</td>
                    </tr>
                </tbody>
            </table>

            <br>
            <button commandfor="dificilTerreno" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>       

        <dialog id="EfeitoLouco" class="">
            <p>Presenciar a grandeza da Espiral do Desconhecido pode causar danos severos na mente frágil que o Homem possui, rasgar a mente, levar memórias, distorcer a distorção que possuímos do próprio real. Para refletir isso, existem os <em>Efeitos de Loucura</em>.</p>
            <p> Ao chegar a 0 ou menos de <strong>SAN</strong>, o personagem ganha um <em>Efeito de Loucura</em>, enquanto a <strong>SAN</strong> estiver igual ou menor a 0, todo dano mental que o personagem sofrer causa 1 Efeito extra. A única forma de perder os <em>Efeitos de Loucura</em> é ao recuperar a <strong>SAN</strong> a valores positivos.</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th></th>
                    <th><strong>Efeito</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>Perfeccionista</strong></td>
                    <td>O personagem ganha um foco intenso pelos mínimos detalhes. Ao girar um teste, se o resultado for ímpar, o teste falha.</td>
                    </tr>
                    <tr>
                    <td><strong>Piromaníaco</strong></td>
                    <td>O personagem ganha um fascínio incontrolável por fogo. Se o personagem estiver no estado <em>Em Chamas</em>, ele não pode removê-lo conscientemente, fazendo também um esforço para impedir outros de apagarem as suas chamas.</td>
                    </tr>
                    <tr>
                    <td><strong>Invencível</strong></td>
                    <td>O personagem julga-se imortal, impossível de ser derrotado, agindo sem cuidado algum. O ser não pode reagir a ataques.</td>
                    </tr>
                    <tr>
                    <td><strong>Auto Mutilador</strong></td>
                    <td>O personagem possui um desejo sádico por dor, por causar dor a si mesmo. O ser deve gastar pelo menos 1 ação padrão por rodada a se auto-atacar.</td>
                    </tr>
                    <tr>
                    <td><strong>Covarde</strong></td>
                    <td>O personagem possui um medo enorme pelos seus arredores. O ser ganha vulnerabilidade a dano Mental.</td>
                    </tr>
                    <tr>
                    <td><strong>Alucinado</strong></td>
                    <td>O personagem começa a ver alucinações. Uma vez por cena, o personagem irá começar a ver coisas que não existem, acreditando inteiramente que o que vê é real e agindo de acordo.</td>
                    </tr>
                    <tr>
                    <td><strong>Mania</strong></td>
                    <td>O personagem fica obcecado por uma atividade específica, querendo realizá-la sempre que possível. O <em>Mestre</em> escolhe um <em>Tipo de Teste</em>, o personagem terá -2 em todos os testes que não sejam desse tipo.</td>
                    </tr>
                    <tr>
                    <td><strong>Traumatizado</strong></td>
                    <td>O personagem começa a julgar possuir uma fraqueza que não possui. O personagem sofre do efeito de um <em>Trauma</em> à escolha do <em>Mestre</em>(excluindo <em>Em Coma</em>).</td>
                    </tr>
                    <tr>
                    <td><strong>Fóbico</strong></td>
                    <td>O personagem ganha uma fobia extremamente forte. Testes mentais que envolvam essa fobia têm falha garantida.</td>
                    </tr>
                </tbody>
            </table>
        
            <br>
            <button commandfor="EfeitoLouco" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="Fagulha" class="">
            <p>O sincronizar da alma e do corpo, a união perfeita de duas coisas feitas para se oporem constantemente.
            Por mais que sejam forçadas a coexistir, a alma e o corpo naturalmente se repelem, se movem de forma assíncrona, um sempre à frente do outro, porém, num momento de grande foco, essas duas metades do &quot;eu&quot; se sincronizam, tornando a aura do ser em algo além, algo inexplicável, uma expressão pura da própria Espiral. Ao atacar alguém com essa aura, a própria realidade explode, causando uma explosão duma energia que inverte as cores do ambiente, emitindo um brilho multicolorido, uma espécie de junção perfeita das essências.</p>
            <h1 id="mec-nica">Mecânica</h1>
            <p>Ao girar um ataque, se o ser obter 12 em 3 dados, ao invés de realizar um crítico ou algo similar, ele realiza uma <em>Fagulha Inversa</em>. Ao realizar a mesma, o ataque beneficia-se dos seguintes efeitos :</p>
            <ul>
            <li>O tipo de dano muda para <em>Espiritual</em> e é triplicado.</li>
            <li>O ser atacado deve girar <strong>CON</strong>(RN : 30), se falhar, perde 1 ação no seu próximo turno.</li>
            <li>O atacante ganha o estado <em>Êxtase</em> até o fim da cena.</li>
            </ul>
        
            <br>
            <button commandfor="Fagulha" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Profici" class="">
            <p>Com o subir dos níveis, além da força vinda do Desconhecido, o personagem vai aprendendo, ficando melhor a usar aquilo que já sabe fazer, para representar isso existem as <em>Proficiências</em>. <em>Proficiências</em> podem ser gastas de 2 formas :</p>
            <ul>
            <li><strong>Melhorar</strong> - Gastar num item/habilidade/magia, deixando-a mais forte, com um limite de 3 <em>Proficiências</em> para cada item/habilidade/magia, a melhora é decidida pelo <em>Mestre</em>, aumentando dano, diminuindo custo, dando algum bónus, etc. É possível o <em>Mestre</em> decidir que o limite de <em>Proficiências</em> colocadas num item sejam menores ou que não seja possível colocar <em>Proficiências</em> de todo.</li>
            <li><strong>Aumentar</strong> - Gasta em si mesmo, obtendo 1 ponto para atributo para distribuir como quiser, não ultrapassando o limite de 8 por atributo.</li>
            </ul>
            <p>A cada <em>Proficiência</em> consecutiva gasta num item/habilidade/magia, a melhora vinda da <em>Proficiência</em> fica melhor. A 1º <em>Proficiência</em> gasta dá uma melhora simples, a 2º uma melhora um pouco mais forte e a 3º uma melhora grande.</p>
            <hr class="class-hr">
            <p>Por exemplo, se uma <em>Espada</em> receber 3 <em>Proficiências</em>, a 1º <em>Proficiência</em> aumenta algo simples, como aumentar o número de d6 de dano em 1.
            <strong>Acabando assim :</strong></p>
            <ul>
            <li><strong>Espada</strong> - 1d10+2d6 de dano cortante- Crítico: 24 - 2x - L {1 Proficiência}</li>
            </ul>
            <p>Já a 2º <em>Proficiência</em> vai oferecer um melhora aprimorada, como, por exemplo, além de aumentar o número de d10 de dano em 1, a <em>Espada</em> passa a também ter uma chance maior de crítico.
            <strong>Acabando assim :</strong></p>
            <ul>
            <li><strong>Espada</strong> - 2d10+2d6 de dano cortante - Crítico: 23, 24 - 2x - L {2 Proficiências}</li>
            </ul>
            <p>Se então adicionarmos ainda uma 3º <em>Proficiência</em>, seria uma melhora grande, como subir a classe de ambos os dados e aumentar ainda mais a chance de crítico.
            <strong>Acabando assim :</strong></p>
            <ul>
            <li><strong>Espada</strong> - 2d12+2d8 de dano cortante - Crítico: 22, 23, 24 - 2x - L {3 Proficiências}</li>
            </ul>
        
            <br>
            <button commandfor="Profici" command="close" class="btn btn-outline-light btn-lg">Fechar</button>

        </dialog>
        
        <dialog id="RegrasCriatura" class="">
            <h1 id="geral">Geral</h1>
            <ul>
            <li>Não possuem <strong>PdTs</strong> nem <strong>SAN</strong>, dano Mental e Espiritual diminui os <strong>PVs</strong> ao invés do status habitual. </li>
            <li>Ações não diminuem nenhum status e custam uma ação padrão(a não ser que seja dito diferente na descrição da ação). <h1 id="m-quinas">Máquinas</h1>
            </li>
            <li>Possuem um status chamado <em>Calor de Motor</em> (<strong>CdM</strong>), usar certas ações aumenta o valor atual de <strong>CdM</strong>, se o valor chegar no limite, a <em>Máquina</em> sobreaquece, perdendo uma quantia de <strong>PVs</strong>, a quantia depende de <em>Máquina</em> para <em>Máquina</em> e deve ser definido à frente do valor de <strong>CdM</strong>, depois de sobreaquecer, o valor de <strong>CdM</strong> volta a 0.</li>
            </ul>
            <h1 id="n-vel-de-dificuldade">Nível de Dificuldade</h1>
            <p>Perante o Desconhecido e suas manifestações, é possível catalogar os seus Níveis de Dificuldade através da experiência dos agentes e suas habilidades. Normalmente, esta estatística surge pelo nível de personagem.</p>
            <p>Veja-se o exemplo simples de uma equipa trio de agentes <strong>NdP</strong> 3, 4 e 5. A <em>Média de Dificuldade</em> a qual o grupo pode lidar encaixa na média dos seus níveis. A média de nível do grupo é 4, logo uma criatura <em>Nível de Dificuldade 4</em> seria o desafio ideal, abaixo seria um pequeno desafio e acima seria um grande desafio. </p>
            <p>É importante notar que nem sempre o nível de personagem condiz com a sua capacidade em lidar com dificuldades. Além da ideia de RPG, onde tudo pode acontecer, dependendo do <em>Mestre</em>, determinado personagem pode possuir habilidades mais poderosas, itens ou magias mais avançadas do que o comum pra sua categoria.
            Nesta parte, cabe ao <em>Mestre</em> decidir se a <em>Média de Dificuldade</em> deveria subir por esse integrante especial ou não.</p>
            <hr class="class-hr">
            <p>Por fim, para determinar o <em>Nível de Dificuldade</em>, é preciso interpretar o seu resultado como &quot;O <strong>NdP</strong> da Criatura&quot;, apesar de que se o mesmo <strong>NdP</strong> fosse para um personagem, o mesmo não teria poder o suficiente para derrotar a criatura. 
            O cálculo para o <em>Nível de Dificuldade</em> envolve somar todos os seus pontos de atributos e dividir por 2, logo de seguida, tendo por base o número dado, considera-se as habilidades características da criatura juntamente da sua vida e status para um modificador positivo (+1 a 2 ND) ou negativo (-1 a 2 ND).</p>
            <p>Exemplo do &quot;Criado de Sangue&quot;, os seus pontos juntam-se em 7/2, que resulta em aproximadamente (sempre por defeito, ou seja, mais baixo), 3. Como o &quot;Criado de Sangue&quot; é um ser de pouca vida e baixo leque de habilidades, sofrerá um modificador negativo. </p>
            <hr class="class-hr">
            <p><strong>Nível de Dificuldade</strong></p>
            <blockquote>
            <p>Atributos Somados/2 + ou - Modificador de Status e Habilidades</p>
            </blockquote>
            <p>O conceito de Status baixo e habilidades simples para uma criatura varia para o Mestre se assim o entender.</p>
        
            <br>
            <button commandfor="RegrasCriatura" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="TipoDano" class="">

            <br>
            <button commandfor="TipoDano" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
  
        <dialog id="EstadoTrauma" class="">
            <h1 id="estados">Estados</h1>
            <p>Estados representam certas condições temporárias em que o ser se encontra, normalmente ganhando uma vantagem ou desvantagem dependendo do estado.</p>
            <h2 id="lista-de-estados">Lista de Estados</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th></th>
                    <th>Efeito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>A Falecer</strong></td>
                    <td>Fica incapaz de agir, ao entrar no estado faz um teste de CON(RN : 20), se falhar fica <em>Desacordado</em>, se ficar 3 rodadas não consecutivas neste estado morre, pode ser removido deste estado via cura. <br>Se voltar a entrar neste estado na mesma cena, o número de rodadas até morrer mantém-se. Por exemplo, se um ser ficar 1 rodada neste estado, for curado e depois voltar a este estado, ele só terá 2 rodadas para ser salvo.</td>
                    </tr>
                    <tr>
                    <td><strong>Agarrado</strong></td>
                    <td>-4 em reações e testes de ataque. Não pode se locomover. Acaba quando o ser se soltar de quem o agarra.</td>
                    </tr>
                    <tr>
                    <td><strong>Amedrontado</strong></td>
                    <td>-4 em testes contra o ser que causou o estado, se for um teste de <strong>CAR</strong>, tem desvantagem. Não consegue aproximar-se do ser que causou o estado.</td>
                    </tr>
                    <tr>
                    <td><strong>Apaixonado</strong></td>
                    <td>-4 em testes contra o ser que causou a paixão, +2 em testes para auxiliar o mesmo. Dano mental sofrido por danos realizados ao ser que causou a paixão têm o seu dano aumentado em 1D.</td>
                    </tr>
                    <tr>
                    <td><strong>Atordoado</strong></td>
                    <td>O ser não pode agir ou reagir.</td>
                    </tr>
                    <tr>
                    <td><strong>Cansado</strong></td>
                    <td>-4 em todos os testes, se voltar a ficar <em>Cansado</em> fica <em>Exausto</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Cura Acelerada</strong></td>
                    <td>O ser recupera x PVs por rodada, o valor de x deve ser especificado poder/magia que concede este estado.</td>
                    </tr>
                    <tr>
                    <td><strong>Débil</strong></td>
                    <td>Desvantagem em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong>.</td>
                    </tr>
                    <tr>
                    <td><strong>Derrubado</strong></td>
                    <td>-4 em testes de ataque corpo a corpo, o movimento é reduzido pela metade, ataques corpo a corpo contra o ser têm +4, ataques à distância contra o ser têm -4. <br>Pode gastar uma ação de movimento para se levantar, acabando a condição.</td>
                    </tr>
                    <tr>
                    <td><strong>Desacordado</strong></td>
                    <td>O ser não pode agir ou reagir, estando inconsciente e não podendo absorver informações.</td>
                    </tr>
                    <tr>
                    <td><strong>Desprevenido</strong></td>
                    <td>-4 de <strong>DEF</strong> e não consegue reagir.</td>
                    </tr>
                    <tr>
                    <td><strong>Determinado</strong></td>
                    <td>+2 em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong></td>
                    </tr>
                    <tr>
                    <td><strong>Em Chamas</strong></td>
                    <td>O ser sofre 2d8 de dano incendiário por rodada. <br>Pode gastar uma ação de movimento para apagar o fogo, acabando o estado. Mergulhar em água também acaba o estado.</td>
                    </tr>
                    <tr>
                    <td><strong>Envenenado</strong></td>
                    <td>O ser sofre dano venenoso por rodada, o dano varia com a força do veneno, sendo 1 dos seguintes:<br>    - <strong>Veneno Fraco</strong> - 1d8<br>    - <strong>Veneno Médio</strong> - 2d8<br>    - <strong>Veneno Forte</strong> - 2d10<br>    - <strong>Veneno Extremo</strong> - 2d12</td>
                    </tr>
                    <tr>
                    <td><strong>Exausto</strong></td>
                    <td>Desvantagem em todos os testes, se voltar a ficar <em>Exausto</em> fica <em>Desacordado</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Êxtase</strong></td>
                    <td>+2 em todos os testes.</td>
                    </tr>
                    <tr>
                    <td><strong>Flankeado</strong></td>
                    <td>O ser tem -2 em testes de reação e testes de ataque contra o ser têm +2</td>
                    </tr>
                    <tr>
                    <td><strong>Fraco</strong></td>
                    <td>-4 em testes de <strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong>, se voltar a ficar <em>Fraco</em> fica <em>Débil</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Fragmentado</strong></td>
                    <td>Afeta um dos atributos físicos(<strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong>) do ser, o ser tem desvantagem em testes com esse atributo.</td>
                    </tr>
                    <tr>
                    <td><strong>Fraturado</strong></td>
                    <td>Afeta um dos atributos físicos(<strong>FOR</strong>, <strong>AGI</strong> e <strong>CON</strong>) do ser, o ser tem -4 em testes com esse atributo. Se um ser voltar a ficar <em>Fraturado</em> no mesmo atributo, ele fica <em>Fragmentado</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Inspirado</strong></td>
                    <td>+2 em testes de <strong>INT</strong> e <strong>CAR</strong></td>
                    </tr>
                    <tr>
                    <td><strong>Mouco</strong></td>
                    <td>Testes que necessitem de audição têm falha garantida, -4 em outros testes que dependam de audição.</td>
                    </tr>
                    <tr>
                    <td><strong>Ofuscado</strong></td>
                    <td>Testes que necessitem de visão têm falha garantida, -4 em outros testes que dependam de visão. Um ser <em>Ofuscado</em> também fica <em>Desprevinido</em>.</td>
                    </tr>
                    <tr>
                    <td><strong>Sangramento</strong></td>
                    <td>O ser perde 1d12 de vida por rodada, se curado, sai deste estado</td>
                    </tr>
                    <tr>
                    <td><strong>Seco</strong></td>
                    <td>Imune ao estado <em>Sangramento</em></td>
                    </tr>
                    <tr>
                    <td><strong>Vulnerável</strong></td>
                    <td>Testes de ataque contra o ser têm +4</td>
                    </tr>
                </tbody>
            </table>
            <h1 id="traumas">Traumas</h1>
            <p>Traumas representam o mesmo que Estados, a sua diferença sendo que ao invés de serem temporários, são permanentes, garantindo uma desvantagem que varia de acordo com o Trauma.</p>
            <h2 id="lista-de-traumas">Lista de Traumas</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th></th>
                    <th>Efeito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><strong>Cego</strong></td>
                    <td>Incapaz de ver, o ser sofre do estado <em>Ofuscado</em> permanentemente.</td>
                    </tr>
                    <tr>
                    <td><strong>Desmembrado</strong></td>
                    <td>Tendo perdido um de seus membros principais, o ser sofre do estado <em>Fragmentado</em> permanentemente. É possível possuir este <em>Trauma</em> até 3 vezes.</td>
                    </tr>
                    <tr>
                    <td><strong>Em Coma</strong></td>
                    <td>Num estado de inconsciência profunda, o ser sofre do estado <em>Desacordado</em> permanentemente.</td>
                    </tr>
                    <tr>
                    <td><strong>Surdo</strong></td>
                    <td>Incapaz de ouvir, o ser sofre do estado <em>Mouco</em> permanentemente.</td>
                    </tr>
                </tbody>
            </table>
        
            <br>
            <button commandfor="EstadoTrauma" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="Apostasia" class="">
            <p>A <strong>Apostasia</strong> é o <em>ato de renegar as Essências</em>, renegar o <em>Desconhecido</em>, a <em>Espiral</em> e qualquer outra coisa associada à mesma, ao invés disso, começando um processo de assimilação à realidade natal, aquilo que te criou.
            Ao rejeitar o <em>Desconhecido</em>, a aura do ser muda, tomando um semblante místico, possuindo uma cor dourada repleta de brilhos e cintilhos, ainda sendo constituída por aura do <em>Desconhecido</em> mas sem pertencer a nenhuma essência específica, uma espécie de energia além das 6.
            A <strong>Apostasia</strong>, por mais que extremamente raro, também já se manifestou no formato de criaturas ou objetos, tomando todas formatos variados e únicos, sem limitações, possuindo todas os tons áureos e divinos do rejeitar da <em>Espiral</em>. Manifestações de <strong>Apostasia</strong> são inerentes a uma única realidade, todo o seu ser e força pertencente à aura dos seus arredores, à aura da realidade que a criou, não podendo se manifestar em nenhuma outra realidade, por mais que, teoricamente, consiga habitar noutras.</p>
        
            <br>
            <button commandfor="Apostasia" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Caos" class="">
            <p>O <strong>Caos</strong> é a <em>Essência da Incerteza</em>, estando relacionado à loucura, confusão, desordem e qualquer outra coisa que dependa de probabilidade, representando a fé e a natureza imprevisível do Homem.
            O <strong>Caos</strong> aprecia lugares desarrumados, caóticos e incoerentes, lugares fortemente associados com essa falta de sentido e certeza que tanto busca, tendo uma preferência profana pela incerteza da religião, lugares religiosos, com presença de mito, culto ou lenda, lugares onde a incerteza é quase que venerada.
            O <strong>Caos</strong> tende a se manifestar como elementos laranjas, podendo tomar basicamente qualquer forma não viva, chamas, rochas, líquidos, escrituras e etc. As criaturas de <strong>Caos</strong>, por outro lado, tendem a se manifestar como seres mitológicos, imitando duma forma irónica a aparência de figuras religiosas ou pertencentes a mitos, em casos raros podendo se manifestar apenas como uma mescla incoerente de conceitos, mas tentando sempre mostrar e se deleitar na própria confusão e falta de coerência lógica.</p>
            <p>A natureza inconstante e indecifrável do <strong>Caos</strong> é a única coisa que pode quebrar e fugir do absoluto saber da <strong>Sabedoria</strong>.</p>
        
            <br>
            <button commandfor="Caos" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>  
        
        <dialog id="Carnica" class="">
            <p>A <strong>Carniça</strong> é a <em>Essência da Emoção</em>, estando relacionado ao ódio, nojo, paixão, fome, violência e qualquer outro sentimento ou necessidade carnal que possuímos, representando as vontades mais carnais do Homem.
            A <strong>Carniça</strong> aprecia lugares traumáticos, horríveis e sanguinários, lugares fortemente associados a esses sentimentos que tanta idolatra, tendo uma preferência insalubre pelos sentimentos negativos, lugares onde aconteceram eventos terríveis, mortes, torturas, ofensas à vida.
            A <strong>Carniça</strong> tende a se manifestar como um líquido espesso vermelho, similar a sangue coagulado, exibindo um cheiro metálico e um visual grotesco. As criaturas de <strong>Carniça</strong>, por outro lado, tendem a se manifestar como seres grotescos, imitando duma forma distorcida a aparência de animais da realidade, com uma preferência sadia pela aparência humana, tomando visuais que causam nos outros aqueles sentimentos que os moldam, saboreando o efeito que causam nas suas vítimas.</p>
            <p>A perceção vil e carnal da <strong>Carniça</strong> é a única coisa que consegue perverter e arruinar a gloriosa vitalidade da <strong>Energia</strong>.</p>

            <br>
            <button commandfor="Carnica" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Energia" class="">
            <p>A <strong>Energia</strong> é a <em>Essência da Vida</em>, estando relacionada ao poder, potência, luz, vitalidade e qualquer outra fonte de energia ou força que exista, representando aquilo que alimenta o viver do Homem.
            A <strong>Energia</strong> aprecia lugares movimentados, vivos, com a presença forte de fontes de energia, plantas e outros indícios da vida que tanto cultiva, tendo uma preferência pelas energias elementais, coisas como raios, chamas, vento, lugares onde a influência desses fatores é facilmente notável.
            A <strong>Energia</strong> tende a se manifestar como os elementos que tanto persegue, chamas e raios com tons de azul e ciano, causando um som que parece digitalmente alterado e um visual brilhante. As criaturas de <strong>Energia</strong>, por outro lado, tendem a se manifestar como seres chamativos, imitando a vida dos seres que o rodeiam ou simplesmente tomando uma forma completamente constituída por um dos elementos, tomando visuais que chamam a atenção, que mostram a todos a glória da vida que adora.</p>
            <p>O interminável rejuvenescer da <strong>Energia</strong> é a única coisa que pode persistir e luzir perante o infinito vácuo da mudança do <strong>Obscuro</strong>.</p>
        
            <br>
            <button commandfor="Energia" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Obscuro" class="">
            <p>O <strong>Obscuro</strong> é a <em>Essência da Mudança</em>, estando relacionado ao indiferente, o vácuo, a falta de algo, o espaço que essa falta causa e as oportunidades que oferece, representando a natureza inerentemente mutável do Homem. 
            O <strong>Obscuro</strong> aprecia lugares escuros, vazios e solitários, lugares onde a mudança que tanto espalha pode tomar lugar, tendo uma preferência forte por lugares abandonados recentemente, lugares que recentemente foram importantes e que agora foram diminuídos a uma sombra do que eram, lugares onde a sua mudança pode acontecer.
            O <strong>Obscuro</strong> tende a se manifestar como rabiscos roxos, insetos, impressões digitais negras, os rabiscos representando a inconsistência, os insetos representando a metamorfose, as impressões, que algo foi alterado, podendo também tomar a forma de sombras e escuridão, exibindo um visual escuro e monocromático. As criaturas de <strong>Obscuro</strong>, por outro lado, tendem a se manifestar como seres sombrios, possuindo características góticas, membros pálidos, formatos abstratos e visuais misteriosos, tentando ao máximo demonstrar a liberdade que a transformação constante as oferece.</p>
            <p>A mudança incontrolável do <strong>Obscuro</strong> é a única coisa que consegue se adaptar e conter a incompreensão causada pela variação eterna do <strong>Caos</strong></p>
        
            <br>
            <button commandfor="Obscuro" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Sabedoria" class="">
            <p>A <strong>Sabedoria</strong> é a <em>Essência da Lógica</em>, estando relacionada ao conhecimento, ordem, juízo e qualquer outra habilidade mental ou contemplativa, representando o lado pensante da mente do Homem.
            A <strong>Sabedoria</strong> aprecia lugares calmos, organizados e limpos, lugares fortemente associados à busca desses fatos incontestáveis que tanto espalha, tendo uma preferência por formas escritas do seu conhecimento, lugares onde seria fácil absorver conhecimento através de meios físicos.
            A <strong>Sabedoria</strong> tende a se manifestar como letras e sigilos com um brilho rosado, similar a textos humanos porém incompreensíveis, exibindo um visual chamativo. As criaturas de <strong>Sabedoria</strong>, por outro lado, tendem a se manifestar como seres elegantes, imitando de certa forma visuais reais e soberbos, possuindo sempre um semblante que parece distante, como se pertencesse a algo além, causando naqueles que os observam a curiosidade pelo conhecimento que os fortalece. </p>
            <p>O saber incontestável e interminável da <strong>Sabedoria</strong> é a única coisa que escapa à influência interminável causada pela degradação do <strong>Tempo</strong>.</p>

            <br>
            <button commandfor="Sabedoria" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        <dialog id="Tempo" class="">
            <p>O <strong>Tempo</strong> é a <em>Essência do Fim</em>, estando relacionado à morte, o apodrecer, o degradar e qualquer outro efeito negativo que o envelhecimento causa,, representando o fim inevitável do Homem.
            O <strong>Tempo</strong> aprecia lugares antigos, apodrecidos e sujos, lugares fortemente associados à sua influência, tendo uma preferência notável por lugares à muito abandonados, lugares que por causa da sua influência se tornaram nada, que agora não passam de restos sem qualquer indício do que algum dia foi.
            O <strong>Tempo</strong> tende a se manifestar como numerais verdes, similares a números romanos, exibindo um cheiro putrefato e nojento, porém, mais impercetivelmente, manifesta-se como apodrecimento dos arredores, envelhecendo algo a uma velocidade anormal. As criaturas de <strong>Tempo</strong>, por outro lado, tendem a se manifestar como seres esotéricos, imitando duma forma quase alienada visuais antigos e futuros, tomando aparências que parecem fora de época, muitas vezes podres e empoeirados, espalhando pelos seus arredores a graciosidade da sua influência.</p>
            <p>O transformar degradante e inevitável do <strong>Tempo</strong> é a única coisa que consegue superar e apodrecer os sentimentos passageiros da <strong>Carniça</strong>.</p>

            <br>
            <button commandfor="Tempo" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="bestiario" class="">
            <h1>Bestiário</h1>
            <p>Escolha uma criatura para ver a sua ficha completa.</p>
            <div class="d-grid gap-2">
                <?php foreach ($criaturas as $criatura): ?>
                    <a href="criatura.php?id=<?php echo urlencode($criatura['id']); ?>" class="btn btn-outline-light btn-lg"><?php echo htmlspecialchars($criatura['nome'], ENT_QUOTES, 'UTF-8'); ?></a>
                <?php endforeach; ?>
            </div>
            <br>
            <button commandfor="bestiario" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>

        <dialog id="template" class="">

            <br>
            <button commandfor="template" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        

        <!-- TEMPLATE DIALOG
        <dialog id="distancias" class="">

            <br>
            <button commandfor="distancias" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        -->

    </body>
</html>