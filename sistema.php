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

        <aside style="padding : 15px; position : fixed; width : 15vw; left : 0;">
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
                <button command="show-modal" commandfor="listaMagia" class="btn btn-outline-light btn-lg">Lista de Magias</button>
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
                <button command="show-modal" commandfor="testes" class="btn btn-outline-light btn-lg">Testes</button>
                <button command="show-modal" commandfor="distancias" class="btn btn-outline-light btn-lg">Distâncias</button>
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
        

        <!-- TEMPLATE DIALOG
        <dialog id="distancias" class="">

            <br>
            <button commandfor="distancias" command="close" class="btn btn-outline-light btn-lg">Fechar</button>
        </dialog>
        
        -->

    </body>
</html>