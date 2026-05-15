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
        <!-- REGRAS BASICAS -->
        <h2 align="center"> Regras Básicas </h2> <br>

        <div align="center">
            <button command="show-modal" commandfor="testes" class="btn btn-outline-light btn-lg">Testes</button>
            <button command="show-modal" commandfor="distancias" class="btn btn-outline-light btn-lg">Distâncias</button>
        </div>

        <br><br>
        
        <!-- CRIACAO DE PERSONAGEM -->
        <h2 align="center"> Criação de Personagem </h2> <br>

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

        
        <br><br>

        <h3 align="center"> Magias </h3> <br>

        <div align="center">
            <button command="show-modal" commandfor="baseCriacao" class="btn btn-outline-light btn-lg">Criação Base</button>
        </div>

        <br>

        <h3 align="center"> Outras Habilidades </h3> <br>

        <div align="center">
            <button command="show-modal" commandfor="baseCriacao" class="btn btn-outline-light btn-lg">Criação Base</button>
        </div>

        <br><br>

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
        
        <!-- TEMPLATE DIALOG
        <dialog id="distancias" class="">

            <br>
            <button commandfor="distancias" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        -->

    </body>
</html>