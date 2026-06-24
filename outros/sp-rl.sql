-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 24-Jun-2026 às 17:32
-- Versão do servidor: 8.4.10
-- versão do PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `sp-rl`
--
CREATE DATABASE IF NOT EXISTS `sp-rl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `sp-rl`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `AcaoCriaturas`
--

DROP TABLE IF EXISTS `AcaoCriaturas`;
CREATE TABLE `AcaoCriaturas` (
  `id` int NOT NULL,
  `idFichaCriatura` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `AcaoCriaturas`
--

INSERT INTO `AcaoCriaturas` (`id`, `idFichaCriatura`, `nome`, `efeito`) VALUES
(1, 1, 'Agredir', 'Agride um alvo a alcance curto, causando 1d8+2 de dano físico.'),
(2, 1, 'Arranhar', 'Tenta cravar unhas na pele do alvo, causando 1d4 de dano cortante e causando Sangramento.'),
(3, 2, 'Perturbar', 'Ataca a mente dum ser a alcance corpo-a-corpo, causando 1d6 de dano mental.'),
(4, 2, 'Deitar a Baixo', 'Se acertar dois Perturbar num alvo na mesma rodada, pode, como ação livre, deixá-lo Vulnerável.'),
(5, 3, 'Cortar', 'Tenta cortar um alvo a alcance corpo-a-corpo com a sua espada de fogo, causando 1d8+2 de dano incendiário.'),
(6, 3, 'Atormentar', 'Escolhe um alvo a alcance longo, o alvo começa a ouvir sussurros perturbadores, causando 1d4+4 de dano mental. Um ser que seja reduzido a 0 de SAN desta forma enlouquece imediatamente, virando um devoto insano, tentando fazer com que todos vejam a natureza celeste do Anjo.'),
(7, 4, 'Coice', 'Bate num alvo a alcance curto com os seus cascos, causando 4d4+2 de dano físico'),
(8, 4, 'Investida Incessante', 'Como ação de movimento, corre em linha reta, causando 1d10+2 de dano físico em todos os seres no caminho.'),
(9, 4, 'Expelir Ácido', 'Vomita ácido de todos os orifícios de seu corpo, todos os seres a alcance curto sofrem 2d6+4 de dano químico.'),
(10, 5, 'Feixe Laranja', 'Dispara um feixe de aura de Caos contra um alvo a alcance médio, causando 3d4 de dano de Caos.'),
(11, 5, 'Gaiola de Pedra', 'Tenta segurar um alvo a alcance médio, usando diversos pedaços de pedra para tentar o impedir de se mover, o alvo gira um teste de FOR contra a CAR de Mens, se falhar, fica Agarrado.'),
(12, 5, 'Traçar', 'Desenha um caminho no chão com sua aura, garantindo +4 no próximo teste de Corpus.'),
(13, 5, 'Santuário Celeste : Jardim do Ilegítimo Parto (Ação Completa)', 'Uma paisagem localizada no interior dum grande globo de vidro, demonstrando um enorme jardim repleto de plantas e vinhas carnosas e pulsantes, similares a artérias, que se estendem cobrindo as paredes, deixando apenas uma quantia minúscula da luz laranja do entardecer entrar, colado a uma das paredes um feto deformado, uma mescla de homem e bovino que parece lentamente gestar.\r\n\r\nEnquanto dentro do Santuário:\r\nSabotagem - Inimigos dentro do Santuário têm -4 em testes de ataque.\r\nPerambular - Inimigos dentro do Santuário devem gastar pelo menos 1 ação de movimento por rodada a se Deslocar.\r\nPoder do Desejar - Corpus causa +1D de dano em todos os ataques.\r\nO Maldito Feto - Para cada rodada onde Mens não sofrer dano, o estado de gestação avança um estágio, depois de avançar 3 vezes, o feto estoura, destruindo o Santuário e causando 3d10+10 de dano de Carniça em todos que se encontravam no seu interior'),
(14, 6, 'Raio de Calor', 'Um de seus olhos brilha, disparando um raio laranja de calor concentrado, causando 4d6+1 de dano incendiário.'),
(15, 6, 'Raio Omni', 'Todos os seus olhos brilham, disparando raios de calor concentrado em todas direções, todos os seres em alcance longo são alvos, sofrendo 5d6 de dano incendiário. Depois de usar, deve esperar uma rodada antes de usar novamente.'),
(16, 6, 'Campo A.P.D Improvisado', 'Duas vezes por rodada, ao ser alvo de um ataque, pode escolher erguer um Campo A.P.D improvisado, bloqueando todo o dano do ataque.'),
(17, 7, 'Bicar', 'Espeta o seu bico num ser a alcance corpo-a-corpo, causando 1d4+2 de dano cortante'),
(18, 7, 'Cegar', 'Ao acertar 2 Bicar seguidos no mesmo ser, o ser fica Ofuscado durante 1 rodada.'),
(19, 8, 'Arrastar Viscoso', 'Arrasta-se pelo chão, cobrindo parte de um alvo a alcance corpo-a-corpo com a sua gosma, causando 3d6+2 de dano químico.'),
(20, 8, 'Esguicho Grotesco', 'Esguicha parte da sua gosma contra um alvo a alcance médio, causando 5d4 de dano químico.'),
(21, 8, 'Dispersar', 'Divide-se em até 4 gosmas menores, os seus PVs atuais são divididos igualmente pelas gosmas, as gosmas menores tem -1 de FOR, +1 de AGI e todo o dano que causam é reduzido em 1D. A qualquer momento(desde que as gosmas menores consigam se tocar) o Coágulo pode voltar à sua forma completa, juntando os valores dos seus PVs.'),
(22, 9, 'Cortar', 'Tenta cortar um alvo a alcance curto com a sua tesoura, causando 2d6+2 de dano cortante.'),
(23, 9, 'Rasgar', 'Ao acertar dois Cortar seguidos, o Herege pode, como ação livre, fazendo o alvo entrar em Sangramento.'),
(24, 9, 'Cuspe Químico', 'Vomita uma gosma alaranjada num alvo a alcance médio, causando 2d8+4 de dano químico.'),
(25, 9, 'Nuvem de Fumaça', 'O Herege vomita uma nuvem de fumaça, o ambiente vira Ambiente Nublado durante 1 rodada'),
(26, 9, 'Duplicata', 'O Herege cria uma cópia sua atrás de alguém, começando a girar ao torno do alvo, o alvo entra no estado Flankeado.'),
(27, 9, 'Perturbar', 'Ao falhar um Cuspe Químico, pode, como ação de movimento, causar 1 estado aleatório da seguinte tabela durante 1 rodada, girando 1d4 para decidir qual :\r\n	- 1 - Em Chamas\r\n	- 2 - Derrubado\r\n	- 3 - Fraco\r\n	- 4 - Agarrado'),
(28, 10, 'Pele Urticária', 'Agride um alvo a alcance médio, causando 1d10+5 de dano físico.'),
(29, 10, 'Atravessar', 'Lança-se em investida contra o alvo, atravessando-o com a parte gosmenta que compõe o corpo mas entrelaçando com as artérias laranja a vítima, causa 2d12+3 dano de Elétrico.'),
(30, 10, 'Florescer', 'Emana vida ao seu redor, criando plantas invasivas que infestam o ambiente. Todos os alvos a alcance médio no chão farão um teste de AGI para desviar das vinhas que os vão agarrar (RN : Teste de CAR), caso não passem, ficarão Agarrados.'),
(31, 10, 'Dilúvio', 'Redireciona a chuva abundante do campo de batalha contra uma área específica, lançando um ataque cone. Uma onda de água de 4m de altura e largura ergue-se em direção do alvo (ou alvos se a área permitir mais), arremessando-o para trás e causando 2d10+7 de dano físico, caso acerte.'),
(32, 11, 'Soco', 'Soca um alvo a alcance corpo-a-corpo, causando 1d4 de dano físico.'),
(33, 11, 'Mordida', 'Morde um alvo a alcance corpo-a-corpo, causando 1d6 de dano cortante ou de Obscuro.'),
(34, 12, 'Pá Espinhenta', 'Agride um alvo a alcance corpo-a-corpo, causando 2d12+10 de dano cortante.'),
(35, 12, 'Arremessar Terra', 'Como ação de movimento, atira terra contra o rosto do alvo, causando Cegado caso acerte.'),
(36, 12, 'Cova Armadilha', 'Cava um buraco no chão. Sempre que um inimigo move-se dentro da neblina poderá cair e ser Enterrado vivo. Definido por um dado de 1d6, caso caia 1, o inimigo cai na armadilha, no entanto, se houver mais covas, as casas de dado perigosas sobem em mais um dígito, caso caia 1 ou 2 (Duas covas), o inimigo cai na armadilha.\r\n  Enterrado - Efeito de Agarrado e Derrubado, requer teste de FOR para sair ou CON para aguentar seus efeitos enquanto ajuda não chega. Dentro da cova, a experiência de ser enterrado vivo será perturbadora, perde 1d4+4 de SAN por rodada'),
(37, 12, 'Esfolar', 'Ao tocar em um alvo, o Coveiro transpõe o seu sentido agressivo na vítima, e com um feitiço, começa a remover a pele do alvo, para no final da batalha, usar como vestuário, causa 4d10 de dano de Carniça.'),
(38, 12, 'Apodrecer', 'Ao tocar um alvo com a Pá Espinhenta, o Coveiro transpõe o seu sentido misericordioso, e com um feitiço, começa a apodrecer o alvo, um efeito indolor que causa 1d20+5 de dano de Tempo. Caso use em alguém Enterrado, o Coveiro tem acerto garantido.'),
(39, 13, 'Pulso Cerebral', 'Dispara um pulso de Sabedoria contra um alvo a alcance médio, fazendo o cérebro do mesmo sangrar, causando 1d8+2 de dano de Sabedoria.'),
(40, 13, 'Controle Mental', 'Tenta tomar controle doutro ser, o ser deve girar um teste de Conexão(CAR) contra a Visita, se falhar, uma das suas ações é decidida pela Visita.'),
(41, 13, 'Perceção Interpessoal', 'Uma vez por cena, a sua íris rosada emana um leve brilho, cobrindo uma área com um raio de 35 metros com aura de Sabedoria, A Visita então gira um teste de Perceção(CAR)(RN : 20), descobrindo a quantia e localização de todos os seres nessa área.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Campanha`
--

DROP TABLE IF EXISTS `Campanha`;
CREATE TABLE `Campanha` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `notas` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Campanha`
--

INSERT INTO `Campanha` (`id`, `nome`, `descricao`, `notas`) VALUES
(1, 'testeteste', 'testeteste', NULL),
(5, 'asffazc', 'axcvxz', ''),
(6, 'Lucas Story', 'asd', ''),
(7, 'Vasco Matos', 'VASCO MATOS', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Campanha_Utilizador`
--

DROP TABLE IF EXISTS `Campanha_Utilizador`;
CREATE TABLE `Campanha_Utilizador` (
  `idCampanha` int NOT NULL,
  `idUtilizador` int NOT NULL,
  `mestre` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Campanha_Utilizador`
--

INSERT INTO `Campanha_Utilizador` (`idCampanha`, `idUtilizador`, `mestre`) VALUES
(1, 1, 1),
(1, 2, 0),
(5, 1, 1),
(6, 1, 1),
(6, 5, 0),
(7, 7, 1),
(7, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Criatura`
--

DROP TABLE IF EXISTS `Criatura`;
CREATE TABLE `Criatura` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `essencia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `essenciaSec1` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `essenciaSec2` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nivelDificuldade` int NOT NULL,
  `narracao` text COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Criatura`
--

INSERT INTO `Criatura` (`id`, `nome`, `essencia`, `essenciaSec1`, `essenciaSec2`, `nivelDificuldade`, `narracao`, `descricao`) VALUES
(1, 'Conexos', 'Carniça', NULL, NULL, 3, '\"Um sentimento fantasma, de que ele ainda está lá, que ele pode se mexer tão bem desde que te lembras. Um mecanismo simples de estender e contrair, uma força inata que nem consegues explicar, uma parte de ti já desde bebé, agora, não está mais lá, por mais que pareça. Os \"especialistas\" chamam de \"Síndrome do Membro Fantasma\", uma condição mental onde as respostas do comando neural nunca chegam de volta ao cérebro, pelo que, o membro já se foi, este pavor, só se sente quando se sabe o que é ter um membro arrancado.\"\r\n  \r\n\"Não para por aí, nós sabemos que não. Essa força, essa coisa de sentir ainda lá, é bom. Estes tais especializados na medicina não sabem a força do coração, da nossa carne, do nosso corpo. Não sabem que o braço ainda se endurece, ou que a perna ainda se estica. Não precisas te mexer. Garanto-te uma coisa, vai doer, mas não em mim. Fica só parado, umas costuras irão concertar-te, só lembra-te, o braço é teu, não é ele que te controla.\"', 'Os Conexos são manifestações da Carniça, e caracterizam-se pelo fenómeno de membros decepados ainda vivos e pulsantes que atacam qualquer ser vivo ao seu redor. Ainda tomados pela violência da separação do corpo original, membros, a partir do qual chamamos Conexos, irão debater-se e agredir imediatamente qualquer coisa que sintam.\r\n\r\nOriginam-se em casos de extrema assimilação com a Carniça ou outros fatores externos ainda ligados à essência. Surgem de pessoas, cujo o elemento seja Carniça, e que tenham sido decepadas em combate, através de ataques e feitiços da essência, ou até em locais cuja a sensação de brutalidade e crueldade perdura. Uma possibilidade também surge da criação desta criatura ou no seu encontro. Se um corpo, desmembrado, assimilado com Carniça (ou através de magias da essência caso a pessoa não seja assimilada) costurar um braço \"Conexo\" em si, poderá obter esse mesmo membro de volta, controlado a rede neural a partir da costura, algo que, no entanto, pode ser difícil de realizar contra uma criatura veloz e que dará um membro, por vezes, que ataca o próprio corpo ou não o obedece.\r\n\r\nO nome \"Conexo\" deriva da sua maior habilidade que é acoplar com outros membros decepados vivos, no caso, outras criaturas como ele mesmo. Capazes de se juntarem ilimitadamente em uma massa de braços e pernas que fica cada vez mais resistente mas mais pesada.'),
(2, 'Mímico', 'Sabedoria', NULL, NULL, 2, 'A solidão de verdade não é algo alcançável, existe sempre algo que nos rodeia, sons, cheiros, paredes, objetos. Tudo que a mente humana reconhece, tudo que a mente humana vê e sente pode ser distorcido pela influência da Espiral. Tudo.\r\nNa Espiral, nada é confiável, nada é derradeiro, tudo pode ser um manifestação, até mesmo os objetos a nossa redor. Mesas, cadeiras, caixas, estantes, nada nos garante que não possam ser criaturas, que não possam saltar e nos atacar. Esses pensamentos são a base do poder da Espiral.', 'O Mímico é uma manifestação pura da essência de Sabedoria, surgindo quando uma alta quantia de aura de Sabedoria se mistura, comprimindo-se tanto que origina um ser puro, uma representação física do básico da própria essência. O Mímico costuma tomar formas diversas, tentando imitar objetos inanimados, fingindo ser um objeto apenas para surpreender a sua vítima, revelando uma forma agora perigosa e coberta de sigilos de Sabedoria.\r\n\r\nO Mímico parece ter como objetivo consumir os pensamentos e conhecimentos de seres vivos, saboreando tal sapiência e alimentando-se da mesma, precisando dela para se manter vivo. Por causa da sua fisiologia frágil, o Mímico foca-se em se esconder à vista de todos, costumando esperar em lugares que pessoas fracas costumam frequentar, esperando alguém estar completamente desatento para realizar um ataque rápido, deixar a pessoa num estado vegetal e, rapidamente, se esconder novamente. Os sigilos que cobrem seu corpo oferecem-lhe uma leve proteção mas não se provam o suficiente para combates diretos, por causa disso, o Mímico é uma criatura extremamente medrosa e cuidadosa.'),
(3, 'Anjo Erróneo', 'Caos', NULL, NULL, 3, 'Em inúmeras épocas, em inúmeros lugares, independentemente de quem seja ou de onde se encontre, sempre existiram e sempre existirão relatos de milagres e daqueles que os trazem, os Anjos. Mensageiros benevolentes de Deus, supostos seres de pura luz e bondade, sua única função espalhar a grandiosa palavra do Senhor. O que acontece, porém, quando essa imagem é usada para o mal? Quando a mensagem divina é tornada num clamar pelo pecado? Quando o ser que representa a luz é tornado num ser de pura escuridão?\r\nO Caos sempre se aproveitará da imagem dos mitos e religiões, tudo depende de fé, a falta de informação, de certeza, é crucial para o seu funcionamento, e é essa exata falta de certeza que cria dúvidas como as anteriores, e são essas exatas dúvidas que perfeitamente representam aquilo que o Caos adora, que o Caos representa.', 'O Anjo Erróneo é uma manifestação pura da essência de Caos, surgindo quando uma alta quantia de aura de Caos se mistura, comprimindo-se tanto que origina um ser puro, uma representação física do básico da própria essência. \r\nO Anjo Erróneo costuma tomar a forma dum anjo estereotipado, possuindo uma aparência humana, geralmente masculina, jovem e alta, com traços suaves e um semblante gentil e dócil, olhos claros, pele clara com rubor vermelho, longos cabelos louros encaracolados, largas vestes brancas com um grande pano colorido enrolado em seu corpo, asas brancas, similares às de um pássaro, que saem de suas costas e uma auréola alaranjada.\r\n\r\nO Anjo Erróneo aparenta ter como objetivo principal assassinar o máximo de humanos possíveis, possuindo um escárnio incontrolável pelo Homem e todas as suas criações, vendo as como profanas, indignas da criação de nosso Senhor, fingindo-se de benevolente com o objetivo de punir os tolos que acreditam em si, ganhando a sua confiança, esperando até estarem distraídos, tomando então um formato distorcido e horripilante, invocando sua poderosa espada de labaredas, distribuindo a punição divina que os homens tanto merecem.'),
(4, 'Aríete do Inferno', 'Caos', 'Carniça', NULL, 7, '- 03/07/20XX\r\nQuerido Diário, (...) mas, ao voltar a casa encontrei algo interessante(para variar)! Tava a limpar a casa e enquanto tava na lavanderia encontrei uma porta escondida!! Um cómodo secreto! Nem imaginas a minha surpresa e felicidade, finalmente algo novo para me entreter. Mas, só vou lá amanhã, tou cansado, mais vale dormir e preparar-me para ver o que tá lá dentro!!\r\n- 04/07/20XX\r\nQuerido Diário, tou prestes a lá ir, deseja me sorte! Quando voltar escrevo o que vi!\r\nDiário, acabo de lá voltar e... a sala é... algo, assim, ela é estranhamente grande... eu não acho que tenha assim tanto espaço de sobra cá em casa... e ainda tem outra porta do outro lado. Eu não sei o que fazer disto... Uma sala daquelas não devia encaixar, não devia ser possível! Eu vou voltar lá amanhã, preciso ver mais, mais longe, ver até onde estas salas vão. Preciso descobrir o que se passa!!\r\n- 06/07/20XX\r\nDiário, já desde ontem que não consigo encontrar a saída deste lugar, desde a última vez que te escrevi, eu entrei no cómodo denovo e comecei a explorar, as salas não acabavam, eu ia e ia e ia, parecia que não tinha fim!! Tinha portas pra todo o lado, todas as direções, incontáveis delas, as salas estavam cheias de coisas que nunca tinha visto, coisas que não sabia que guardávamos, a planta não faz sentido algum! Já à umas 2 horas(por aí) que tento encontrar a saída, eu voltei pelo mesmo caminho mas fui parar em salas diferentes. Devo ter me enganado no caminho de volta.\r\n(...)\r\n- 22/07/20XX\r\nOnde tá a saída? Fazem semanas, SEMANAS!! Eu ainda não encontrei o raio da saída deste lugar! Eu ando, ando e ando e nada! NADA!! A cada dia que passo parece que mais longe estou! O RAIO daquele mugir fica cada vez mais alto, os estrondos que ouço, os passos. Eu não sei que raio de coisa anda a galopar pelas entranhas deste inferno, e também NÃO quero descobrir!! Eu já ouvi estrondos, explosões, até BERROS aqui dentro. Se a coisa que anda por aqui causou isso, eu não a quero ver! Que fiz EU para merecer isto? Que FIZ??\r\n(...)\r\n- 02/08/20XX\r\nO MUGIR, O MUGIR, PERTO, PERTO, TÁ A CHEGAR, FINALMENTE, FINALMENTE, LIBERTAÇÃO, SAÍDA, FINALMENTE, UM ADEUS.\r\nTOU A OUVIR, A CHEIRAR, A COISA APROXIMA-SE, TÁ A CHEGAR, TOU A VE-LA\r\nGRANDE, GRANDE, ENORME, MASSIVA, VERMELHA, COMO CARNE, COMO SANGUE, OLHOS, TANTOS OLHOS, DENTES, TANTOS DENTES, PELO, BOCAS, TUDO, TUDO, TUMOR, TUMOR, MONSTRO, MONSTRO, BESTA\r\n\r\n> Excertos retirados do Diário do falecido Mark Patala', 'O Aríete do Inferno é uma manifestação de Caos e Carniça, sendo uma personificação da interpretação cristã do mito do Minotauro, como o guardião do 7º Círculo do Inferno. \r\nO Aríete do Inferno costuma tomar uma forma segmentada, dividida em duas criaturas, Corpus e Mens. \r\nMens possui o semblante dum busto humanoide de pedra com um rosto desprovido de detalhes, possuindo apenas olhos negros e uma coroa de louros, espalhado pela pedra que o forma, adornos dourados em formato de labirinto, o busto emite um brilho laranja forte e aparenta flutuar.\r\nJá Corpus possui um semblante maior e muito grotesco, sendo um ser feito de pura carne viva, com veias deformadas e pulsantes, olhos e dentes espalhados por toda a sua superfície e um corpo completamente feito e repleto por tumores, como se fosse um enorme e desfigurado caroço de carne com vida, do seu corpo saem cinco membros, quatro deles fortes e resistentes, servindo como as pernas principais do Corpus, enquanto o último sai de sua traseira, um membro longo e maleável, similar a uma cauda disforme.\r\n\r\nO Aríete do Inferno manifesta-se em áreas aparentemente randómicas, não aparentando possuir características comuns ou recorrentes, ao surgir, porém, a área é alterada, sendo forçada a tomar um formato e organização labiríntica, tomando o layout da área original e distorcendo-o, transformando-o, até a área virar um acúmulo gigante de salas e corredores sem sentido e em constante mudanças, uma verdadeira prisão. \r\nAo se manifestar, Corpus começa a perambular pelo labirinto, correndo incessantemente, buscando ou uma saída ou algo para se alimentar, uma besta apenas movida pela fome e pelo desespero de estar preso, destruíndo tudo por seu caminho e alimentando se dos corpos dos tolos que entraram em sua trajetória, tudo para se manter acordado, para continuar a correr. Enquanto isso, Mens observa de longe, escondido por entre as paredes do labirinto, vigiando Corpus e garantindo que o mesmo nunca escapará do labirinto, alterando a ordem das salas, o formato das mesmas, desfazendo caminhos e criando novos, tendo sempre a certeza, porém, de dar a mínima esperança a Corpus, garantindo que sua corrida incessante nunca terminará. As suas vítimas não passam de peças azaradas desse grande jogo que ambos jogam eternamente.'),
(5, 'Fortaleza', 'Caos', NULL, NULL, 5, 'Eu não sei como tudo começou, foi à uns 5 dias atrás, eu estava a caminho do meu monótono trabalho de assalariado, uma rotina que tão bem conhecia e que não apresentava nenhum sinal de mudar, porta atrás de porta, andar atrás de andar, tudo para o mesmo trabalho secante. Um dia, porém, ao chegar no meu andar, eu vi, pela janela, uma explosão no prédio ao lado, nós todos levantamos-nos e começamos a tentar chamar a polícia, tentar perceber o que se passava, rapidamente assumimos que foi algum atentado terrorista e fugimos para os andares inferiores, buscar abrigo. Horas passaram e nada, ouvimos tiros, ouvimos berros, ouvimos explosões mas, nada de ajuda, alguns colegas meus arriscaram sair mas a maioria ficou para trás, quando a noite chegou, tudo que víamos lá fora era a cidade iluminada por chamas e pela luz vermelha de metais derretidos e incandescentes. \r\nOs dias foram passando, fomos nos arriscando mais e mais, saímos do prédio, buscamos mantimentos, ajuda, outras pessoas, tudo que desse para encontrar, alguns foram se perdendo no caminho, nunca cheguei a ver aquela coisa, apenas a sua silhueta nos céus a disparar aqueles raios, a destruir o pouco que sobrava. \r\nAinda me lembro da primeira vez que encontrei aquilo, ainda estávamos no prédio onde trabalhava, começamos a sentir a temperatura a aumentar e a ouvir... risos... risos infantis, como aqueles de várias crianças, mas nós sabíamos muito bem que crianças, ainda mais felizes, eram a última coisa que íamos encontrar por ai, então ficamos todos parados, a ver a sombra daquela coisa a lentamente passar. \r\nPassado esses dias, eu acabei sozinho, tava a tentar encontrar forma de sair daquele inferno na Terra, custasse o que custar, eventualmente, porém, aquela coisa viu-me, a última coisa que me lembro são aqueles risos malditos e um último clarão antes de... acabar aqui.\r\n\r\n> Relato do falecido Masayoshi Orikawa sobre o \"Ataque de 2008 em Shinjuku\"', 'A Fortaleza é uma manifestação de Caos, originando algo que mais se assemelha a uma arma, algo poderoso e quase impenetrável. \r\nA Fortaleza costuma tomar a forma dum polígono regular, geralmente uma esfera, do tamanho dum carro, a sua superfície coberta por olhos laranjas que constantemente se movem por sua superfície, olhando para tudo e todos. O seu interior, porém, é a sua parte mais complexa, possuindo algo remetente a um Tokamak, no seu centro um toróide de aura de Caos que constantemente cria energia, expelindo a como calor. Por fora, possui uma camada de aura de Caos, similar a um Campo A.P.D, este porém bloqueando todo tipo de dano exceto um, a sua fraqueza é inconstante, mudando passando alguns segundos, ao ser atingido, porém, essa camada desaparece por um breve período de tempo.\r\n\r\nA Fortaleza manifesta-se em áreas populadas, com grande populações, cidades grandes e assim, aparecendo nos céus com uma chegada brutal, como se fosse uma verdadeira arma de guerra, o seu comportamento, porém, é simples, a Fortaleza simplesmente vagueia pela área onde se manifestou, calmamente flutuando, emitindo um som semelhante a risos infantis, ao avistar algo vivo, usando se da energia criada por seu toróide, dispara um raio de calor concentrado, aniquilando todos que entrem em seu alcance, desprovendo a área inteira de vida, tudo apenas para se mover para outra área.'),
(6, 'Corvos Rubros', 'Carniça', NULL, NULL, 1, 'A vida animal é algo tão natural à vida humana como todo o resto da natureza, todo lugar que o Homem vai, algum outro animal ou já foi ou há de ir. Por esse crescimento simultâneo, muitos animais viraram úteis ao Homem, comuns de ver. Animais de estimação, gado, mensageiros e muito mais. Todo animal tem algo, algum trabalho, algum conceito associado à ele.\r\nUm desses muitos casos é o dos corvos, por serem animais necrófagos, isto é, por se alimentarem de cadáveres, são comummente vistos como um símbolo da morte, um mau presságio.\r\n\r\nE é essa exata visão, esse simbolismo, que a Espiral distorce para a criação de uma das suas muitas bestas, símbolos voadores da morte que o Homem está fadado a encontrar.', 'O Corvo Rubro é uma manifestação de Carniça, sendo um ser fraco nascido do distorcer do conceito e semblante dum corvo, agindo de forma similar ao animal que imita, apenas tendo um semblante horroroso e um comportamento mais brutal.\r\n\r\nOs Corvos Rubros costumam tomar a forma de seres carnosos similares a corvos, não possuindo penas porém, tendo um tamanho levemente maior que o de um corvo normal e sendo feitos inteiramente de carne e veias soltas, com partes de seus ossos a escapar por entre seus tendões orgânicos, no lugar dum rosto possuem um grande crânio de corvo com restos de músculo e carne, não possuindo olhos.'),
(7, 'Coágulo', 'Carniça', NULL, NULL, 6, 'No meio do escuro, nos cantos mal vistos dum vilarejo abandonado, escondem-se longos rastros viscosos, rastros duma substância gosmenta, substância que parece queimar e derreter aquilo que toca, a sua superfície coberta por pequenas bolhas que estouram e se formam sem fim visível. No meio desse vilarejo, um jovem de longos cabelos castanhos encaracolados com um casaco de couro corre, em suas mãos uma marreta velha, ele corre ofegante, olhando para seus arredores, como se buscasse algo.\r\nEle para no meio desse vilarejo, gritando por algo, clamando por atenção. Atenção que é rapidamente recebida, uma enorme massa vermelha gosmenta sai de dentro duma das casas, o seu interior repleto de restos humanos que ainda se dissolvem. A confiança que o jovem possuía desaparece assim que ele vê o tamanho desse ser, deixando sua marreta, fugindo enquanto grita por misericórdia. Num único movimento, a gosma rapidamente estica-se, cobrindo-o e consumindo o imediatamente, o jovem virando parte dessa massa horrenda, massa que parece ter uma fome sem fim.', 'O Coágulo é uma manifestação pura da essência de Carniça, surgindo quando uma alta quantia de aura de Carniça se mistura, comprimindo-se tanto que origina um ser puro, uma representação física do básico da própria essência. O Coágulo costuma tomar a forma de um aglomerado duma gosma vermelho escuro, sendo espessa e borbulhosa, tendo um semblante similar ao de sangue coagulado, a sua consistência, porém, com propriedades acídicas, derretendo e queimando tudo que toca, tendo um efeito particularmente forte em matéria orgânica.\r\n\r\nO Coágulo parece ter como objetivo consumir o máximo de seres vivos possíveis, possuindo uma fome insaciável por mais massa, o seu tamanho e poder aumentando de acordo com a quantia de matéria consumida, tornando o conteúdo consumido em mais gosma e as emoções absorvidas em aura do Desconhecido.\r\nPor causa da sua fisiologia gosmenta, o Coágulo é porcamente suscetível a danos físicos, coisas como cortes, tiros ou impactos causam pouco estrago no Coágulo, a forma mais efetiva de o matar é a partir de mudanças radicais de temperatura, a sua forma não possuindo boa tolerância a calor ou frio extremo, sendo necessário erradicar completamente a sua gosma para o matar de vez.'),
(8, 'O Herege', 'Carniça', 'Caos', NULL, 6, 'No meio do nada, algures na profundeza dos Estados Unidos, uma cidadezinha brilha a meio do escuro da madrugada, ruas iluminadas, pessoas fantasiadas, o dia mais especial do ano para aqueles que moram em Merlotville, o Dia das Bruxas. As pessoas andam animadas, mascaradas, sacos repletos de doces baratos em mãos, as portas das casas abrem com ânimo, sorrisos nas caras daqueles que entregam doces, o dia onde os habitantes tornam o medo em felicidade e espalham a caridade por todos.\r\nMal sabiam eles que enquanto todos celebravam, algo acordava, se livrava de suas amarras, pegava numa velha tesoura de jardinagem e caminhava à porta. Um objetivo em mente.\r\nEm míseros momentos, a noite feliz tornou-se um horror, uma figura, alta, rápida, agressiva, como um animal esfomeado, percorre a cidade, deixando o rubro e o cheiro metálico por onde passa, atacando todos que encontra. Ataques, gritos, sangue, choros, súplicas e um riso. Um riso maníaco pertencente à coisa que causou tal ataque. Comportamento tão animalesco e, de alguma forma, aparência tão humana.\r\nHá apenas uma coisa que pode verdadeiramente atormentar o Homem, ele mesmo.', 'O Herege é uma manifestação de Carniça e Caos, sendo uma personificação do medo do Homem, o medo que sentimos uns pelos outros, uma representação da dúvida sentida ao interagir com outro da nossa própria espécie, a maior maldição trazida pela consciência é a falta da certeza, a falta do comportamento previsível, a habilidade de negar o instinto e fazer o naturalmente impossível. O Herege costuma tomar a forma duma pessoa alta e deformada, possuindo membros longos e tortos, cicatrizes disformes, tumores, olhos completamente ensanguentados, um com uma iris que brilha no escuro, similar à de um animal, e o outro com um enorme olho dilatado vesgo, uma boca pequena com dentes de diferentes tamanhos, ao redor dela um rasgo que parece formar um sorriso, nariz e orelhas que lembram um porco, cabelos sujos e veias saltantes. Em suas mãos, possui sempre algum aparato para usar como arma, ele, porém, nunca porta uma \"arma\" de verdade, sempre algum utensílio que não foi feito com esse propósito, ferramentas, restos partidos e outros objetos, fazendo questão de distorcer algo normal em algo sádico.\r\n\r\nO Herege costuma manifestar-se em lugares onde haja população, aparecendo e imediatamente começando o seu ataque, começando a sua existência com um ataque insano e imparável, correndo pela área onde se manifestou, atacando tudo e todos que encontra, logo depois do ataque, o Herege esconde-se, começando a conseguir processar raciocínio, tomando a postura de um verdadeiro predador, escondido e meticulosamente enganado suas vítimas para obter uma morte fácil, se notar que existem pessoas na área capazes de o parar, o Herege vai, ao invés disso, tentar chamar a atenção das mesmas, querendo atrai-las a um grande combate, uma \"Última Ceia\".\r\nO Herege possui um repudio enorme por religiosidade e crença num geral, sendo algo que humanos adoram, o que ele mais deseja é destruir e distorcer essa coisa tão amada, o Herege sempre vai fazer um esforço para destruir aparatos religiosos, se forçado a escolher entre tirar uma vida humana ou destruir um objeto de crença, o seu ódio profano sempre vencerá.'),
(9, 'Dádiva', 'Energia', 'Caos', NULL, 8, 'As antigas tribos sempre glorificaram a chuva. Em tempos, quando o solo era seco, o cultivo e semear eram impossíveis, o que era extremamente preocupante para povos subdesenvolvidos. Chuva era a notícia boa que chegava ao ser humano, a notícia da prosperidade e de uma futura nova colheita. Uma catalisadora de nascentes e futuros rios, poças, lama, mas o mais importante, plantas. A água que penetrava o solo, era sempre bem vinda por todos os povos sedentários, sem exceção, no entanto, e se essa riqueza viesse a mais?\r\n\r\nÁgua tão interminável esta, sempre tão desejada, tão pedida, que simplesmente afogasse a estes povos tão insatisfeitos dela?\r\n\r\nDivindades são muito perigosas no que toca a concretizar pedidos, muitas delas realizam jogos de palavras quando o fazem, mas para a Vida, isto não é um jogo, é uma questão simples, o homem nunca estará acima dela, e a sua vontade insaciável deve ser respondida a tal.\r\n\r\n> \"T k\'áataj ja\', ba\'ale\' a nojbe\'enile\' tu taasaj to\'on jump\'éel búulkabal\"\r\n> Escritos de Tribos Antigas\r\n\r\nA chuva não é uma notícia, é o presságio do castigo para a ambição nojenta do ser humano.', 'A Dádiva é uma manifestação de Energia e Caos. Onde existe chuva intensa, esta criatura surge como uma personificação do fenómeno natural, florescendo a vegetação ao seu redor, flutuando por cima das placas, antes secas, do solo, e tornando-as em campos jardinados belos. A Dádiva é uma criatura humanoide que se assemelha a uma alforreca, mais especificamente, a classe \"Medusazoa\".\r\n\r\nCom a forma de um corpo, todas a veias desta criatura \"Homo Cnidária\" (Homem-Alforreca) são extensões brilhantes alaranjadas, visíveis através da pele transparente e gelatinosa. No pescoço, a Dádiva apresenta uma juba que imita a mesogleia de uma medusa, a corroa de uma alforreca, que por sua vez libera um conjunto de tentáculos de extensões superiores à do próprio corpo gosmento líquido.\r\n\r\nNo que seria a cabeça de um humano, a criatura apresenta um conjunto de laços (semelhante às artérias laranjas) entrelaçados a forma uma espécie de triângulo ao contrário dentro do seu crânio translúcido, como um símbolo que indicaria a posição do rosto e possivelmente os olhos ambíguos da Dádiva. Assim como qualquer Medusa, a criatura também apresenta sinais de toxinas.\r\n\r\nÉ possível, em raros momentos, ouvir uma voz quase vinda da criatura, mas não te enganes, é apenas uma onde química no cérebro, uma mensagem falsa, um engano.'),
(10, 'Zumbi de Escuridão', 'Obscuro', NULL, NULL, 2, '[COMEÇO DA GRAVAÇÃO]\r\n...\r\nVista no interior de uma floresta escura, é possível ver a silhueta de um grande edifício a alguns metros de distância do gravador. Gravador aproxima-se da silhueta, sendo possível ouvir o som abafado de galhos a estalar em seus pés. Uma luz fraca revela uma porta metálica enferrujada que rapidamente é aberta pelo Gravador, originando um alto ranger. Gravador entra no edifício.\r\n- Gravador(Em Sussurros) : “[Respiração] Este lugar ‘tá mais ‘cabado do que esperava [Riso baixo].”\r\nGravador continua a entrar mais fundo no edifício, que aparenta ser uma fábrica abandonada, passando por alguns corredores e salas vazias, fazendo comentários breves, repetindo esse processo por 2:32 minutos, até que o Gravador para, sendo possível ouvir o que parece o som abafado de algo a mastigar.\r\n- Gravador(Em Sussurros) : “Te-Tem um animal aqui?[Respiração] Que raio?”\r\nGravador continua a entrar mais fundo no edifício, chegando numa sala ampla, vendo, mal iluminado, a uns metros de distância de si, um homem com pele cinza, parecendo um cadáver, no chão a comer o que parece restos humanos. Assim que a luz da câmara é apontada para esse homem, o mesmo olha para o Gravador e berra. O Gravador corre pra longe, ofegante e audivelmente assustado, poucos momentos depois, porém, ele é derrubado, começando a gritar por ajuda. Os seus gritos acabam com o som duma mordida, acompanhado por sons de mastigar.\r\n...\r\n[FIM DA GRAVAÇÃO]\r\n\r\n> Transcrição de vídeo removido da câmara de Mac Romero, 2004', 'Os Zumbis de Escuridão são manifestações de Obscuro, sendo um ser nascido de cadáveres humanos, um corpo antes vivo e racional agora movido e tomado completamente pela sede por mudança, pelo alterar, pelo diferente.\r\nOs Zumbis de Escuridão costumam tomar a forma de humanos deformados, possuindo pele cinza repleta de manchas negras, dedos sem unhas, boca sem lábios com dentes podres expostos, sem nariz e com olhos completamente brancos sem pálpebras, dando-lhes um formato redondo.\r\n\r\nOs Zumbis de Escuridão manifestam-se em áreas com uma alta quantia de aura de Obscuro, nascendo sempre de cadáveres, ao se manifestarem, eles simplesmente vagueiam pelas redondezas, buscando humanos para assassinarem, desfazendo-os e alimentando-se de seus restos, como se buscassem virar um com o morto.'),
(11, 'O Coveiro', 'Tempo', 'Carniça', NULL, 9, 'Na penumbra de um nevoeiro, as lápides de um cemitério sempre ficam mais vazias. A marca de uma vida crava ao solo, coberto por tristezas, regado por lágrimas, sofre o tratado silencioso do desalento olhar daqueles que passam. A falta de alguém, corrompe, e faz da dor um lembrete que, todos estes dias, estes meses, todos estes anos, podem facilmente ceder da memória, perante apenas isto, a pedra, mágoa eterna da saudade, da troca da vida por algo inanimado.\r\n\r\nPedra que simboliza o nada, o abiótico da vida dos outros e carrega seu nome, chama-te para um caminho compatível com o dela. Perder alguém sempre é dito com algo de superação, um obstáculo, mas o sentimento, não importa se o queiras esconder, ele fica.\r\n\r\nEsse sentimento pode ser tirado de ti, só precisas ter calma. Sentes falta daquilo que perdeste? Não chores, apenas relembra, não deixes a dor ignorada, sente mais fundo, lembra-te de TUDO. Cada momento, SENTE. Ele está a chegar. Lembra-te do tempo em que não sentias ISTO. Lembra-te como foi a PERDA. Um jazigo cavado. Lembra-te da sua APARÊNCIA, o seu SORRISO, a sua PRESENÇA.\r\n\r\nAté que vejas, quase como se tivesse bem na tua frente, um portal, como um buraco no chão, com um reflexo daquilo que pesa tanto na tua alma. Ele segura-te nos ombros, orgulhoso que aceitas reencontrar aquilo perdido, e empurra-te para o eterno.', 'O Coveiro é uma manifestação de Tempo e Carniça, sendo ligado à forte sensação do luto pela morte de uma pessoa, ou animal. Esta criatura não pretende que a passagem temporal diminua o poder das emoções, pelo contrário, o Coveiro usa-o em sua vantagem, saboreando a sensação da dor de alguém perdido, a força dos sentimentos da sua presa, muitas vezes manipulando-a ao suicido, na promessa do reencontro com quem falta, e de um mundo eterno onde nunca serão separados.\r\n\r\nEm aparência, O Coveiro porta trajes sujos e medievais, usa botas por cima de calças despojadas e sujas, na sua cintura, uma corrente de 12 caveiras em perfeito estado de conservação, paradas no tempo, com numerais brilhantes em sentido horário, usa também uma jaqueta de couro feito de pele humana costurado e por fim, trás sempre um chapéu em cartola torcido e com dentes nos rasgos que pertence ao seu corpo.\r\nO Coveiro é também uma criatura humanoide alta, com cerca de 4 metros, mas sempre curvada, com pernas refletidas e uma atitude paciente com presas não agressivas. O seu rosto, feito de duas pupilas fundas, remete ao rosto do morto a qual o luto não consegue lidar, apenas revelando a sua verdadeira face em batalha, como um rosto de carne quase a imitar uma máquina, sem boca, desfigurado por cicatrizes e costurado por cima das mesmas.\r\nO seu objeto simbólico é a pá que sempre carrega consigo, adornada por espinhos no seu cabo (até na parte onde a criatura segura), e com uma conha mais longa do que a de pás normais. O Coveiro carrega consigo uma névoa que surge escorrendo da sua jaqueta, afetando o ambiente com uma forte neblina.'),
(12, 'A Visita', 'Sabedoria', 'Obscuro', NULL, 5, 'O bater na porta da frente a meio da madrugada, uma chamada por atenção que corta o silêncio feito uma lâmina, que acorda os habitantes perturbados por tais batidas, habitantes que se movem, vagarosamente até a fonte do som, chegando na entrada de suas casas e espreitando pelo olho mágico, mas nem sempre se vê o desejado através desse maldito olho.\r\n\r\nDo outro lado, um homem sénior com um porte gordo e alto, possuindo uma grande corcunda e braços estranhamente longos, vestido com uma veste formal negra, um grande blazer, luvas, sapatos e um chapéu que cobre seu rosto.\r\n\r\nO homem fala, introduzindo-se, questionando gostos, escolhas, contando histórias dum passado distante, toda uma longa conversa só para encher chouriço, para cansar e confundir a mente daquele que fala, com o intuito de chegar à pergunta que realmente lhe importa.\r\n\r\n> “Está sozinho?”\r\n\r\nAzarados são aqueles que estavam de fatos sozinhos, quando descobre que a pessoa que fala está só, ele finalmente faz sua entrada.\r\n\r\nAqueles que acolhem o homem nunca mais são vistos, desaparecendo na madrugada junto do homem, similares às batidas que os levaram a esse destino, um pequeno ruído que rapidamente desaparece, despercebido, assim retornando o silêncio à noite.', 'A Visita é uma manifestação de Sabedoria e Obscuro, a Visita costuma tomar a forma de pessoas idosas deformadas, usando roupas de inverno negras, possuindo membros alongados, rostos descaídos repletos de verrugas e olhos negros com uma única iris rosada, tendo uma aparência desconcertante mas inofensiva, nunca mostrando sinais de ameaça.\r\n\r\nA Visita apenas se manifesta em áreas povoadas, durante a noite, navegando de casa em casa, batendo na porta da frente e conversando com aqueles que responderem, fazendo conversa, tentando descobrir quantas pessoas estão na casa, isto porque a Visita possui uma condição especial, ela só entra em casas onde apenas 1 pessoa esteja presente, desaparecendo se descobrir que a casa que tenta entrar não cumpre essa condição.  \r\nAo encontrar uma casa que se encaixe na sua descrição, a Visita controla a mente da pessoa, forçando entrada, forçando a pessoa a suicidar-se, alimentando-se das memórias, pensamentos e sonhos do falecido, logo depois desfazendo o corpo, tornando-o numa gosma negra que se espalha, escondendo-se na sujeira da casa, logo depois a Visita desaparece sem deixar traços da sua presença, apenas para retornar noutra noite.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `EfeitoEspecial`
--

DROP TABLE IF EXISTS `EfeitoEspecial`;
CREATE TABLE `EfeitoEspecial` (
  `id` int NOT NULL,
  `idFichaCriatura` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `EfeitoEspecial`
--

INSERT INTO `EfeitoEspecial` (`id`, `idFichaCriatura`, `nome`, `efeito`) VALUES
(1, 1, 'Manha', 'Gira testes de ataque com AGI'),
(2, 1, 'Evoluir', 'A criatura durante combate pode gastar uma ação de movimento para girar um teste de CON(RN : 20) para evoluir de alguma forma que concederá vantagem ou bónus. Como desenvolver uma boca, olhos, ou até pequenas patas.'),
(3, 1, 'Acoplar', 'Caso toque em outra criatura semelhante, poderá acoplar, a qual dará +1d10+5 de PVs máximos e +1 em FOR ou AGI temporário. O bônus de atributo não acumula por cada nova ação de Acoplar.'),
(4, 1, 'Ataque em Bando', 'Quando o alvo é atacado por mais que um Conexo, o próximo que atacar o mesmo alvo pode tentar desarma-lo com +4. A arma pode ser usada pelo Conexo. '),
(5, 2, 'Manha', 'Gira testes de ataque com AGI'),
(6, 2, 'Aparência Enganadora', 'Por ter um semblante idêntico ao de um objeto, o Mímico consegue esconder-se em lugares óbvios. +4 em testes de Furtividade.'),
(7, 3, 'Falso Semblante', 'Ao sentir-se ameaçado, revela a sua verdadeira aparência, tomando um formato deformado e assustador. Perdendo *Carisma Natural* e causando dano mental em todos que o virem, além disso ganhando +4 em testes de intimidação e imunidade a Ofuscado e Amedrontado.'),
(8, 3, 'Carisma Natural', '+4 em testes de Diplomacia, Enganação e Intuição. Não causa dano mental ao ser visto.'),
(9, 3, 'Lábia Divina', 'Uma vez por cena, pode escolher suceder imediatamente num teste de CAR'),
(10, 4, 'Anatomia Grotesca', 'Imune ao estados Fraco, Ofuscado e Envenenado.'),
(11, 4, 'Tamanho Absurdo', 'Por causa de seu tamanho e peso, não pode ser empurrado nem agarrado por seres com menos FOR que ele.'),
(12, 4, 'Vida de Corrida', '+6 em testes que envolvam correr.'),
(13, 5, 'Voo', 'Consegue usar a ação Deslocar para se mover verticalmente além de horizontalmente.'),
(14, 5, 'Corpo Incompleto', 'Por ser apenas um busto, não consegue bloquear ou contra atacar ataques físicos e tem -2 em testes para resistir a manobras.'),
(15, 6, 'Omni-Visão', 'Imune ao estado Desprevenido, tem +4 em testes de Perceção e gira testes de Perceção com CAR.'),
(16, 6, 'Ofensiva Arcana', 'Gira ataques com Conexão(CAR).'),
(17, 6, 'Presença Hipertérmica', 'A sua presença causa Extremas Temperaturas(Calor) no ambiente.'),
(18, 6, 'Fraqueza', 'No começo de toda a rodada, gira 1d6, o resultado definindo o tipo de dano que é a fraqueza da Fortaleza, ao sofrer 10(ou mais) de dano desse tipo num único ataque, perde a sua imunidade a dano durante 1 rodada. (1-Incendiário/2-Elétrico/3-Venenoso/4-Químico/5-Gélido/6-Explosivo)'),
(19, 7, 'Manha', 'Gira testes de ataque com AGI'),
(20, 7, 'Voo', 'Consegue usar a ação Deslocar para se mover verticalmente além de horizontalmente.'),
(21, 7, 'Anatomia Monstruosa', 'Imune ao estado Ofuscado'),
(25, 8, 'Manha', 'Gira testes de ataque com AGI'),
(26, 8, 'Forma Maleável', 'or ser uma enorme gosma, a forma do Coágulo é extremamente maleável, o Coágulo não pode ser parado por obstáculos físicos, conseguindo se espremer por qualquer espaço que água conseguiria passar. Por esse mesmo motivo o Coágulo pode ocupar espaços de outros seres, e outros seres podem ocupar os espaços do Coágulo, esses espaços são considerados Terreno Complexo.'),
(27, 8, 'Gosma Fervente', 'A massa viscosa que forma o Coágulo possui propriedades acídicas, derretendo tudo e todos que toca, qualquer ser que entre ou comece o seu turno num espaço ocupado pelo Coágulo sofre 2d6 de dano químico(um ser só sofre esse dano uma vez por rodada).'),
(28, 9, 'Instintos de Caçador', 'Imune aos efeitos de Penumbra (Parcial e Total) e Ambiente Nublado'),
(29, 9, 'Olhos Sensíveis', 'Fraco contra luzes fortes, falha imediatamente testes para resistir a uma Granada de Atordoamento, um inimigo pode usar uma ação padrão (girando AGI contra a CON do Herege) para tentar cegá-lo com uma fonte de luz forte.'),
(30, 9, 'Fúria', 'Ao chegar a metade dos PVs, o Herege transforma-se, ficando maior, com veias pulsantes. Todos os ataques causam +1D de dano e ele passa a girar testes de ataque com AGI.'),
(31, 10, 'Aura Invasiva', 'Qualquer ataque físico é tornado em dano da essência de Energia.'),
(32, 10, 'Causa de Cheia', 'Caso o espaço seja apertado, ou possível de ser inundado por altas cargas de água, a criatura é capaz de causar o efeito de Cheia no campo de batalha.'),
(33, 10, 'Dança da Chuva', 'A chuva acompanha sempre a criatura. Dano incendiário é cortado pela metade.'),
(34, 10, 'Chance de Veneno', 'A cada ataque físico causado no alvo pela criatura, ou vice-versa (caso haja toque de pele) é necessário girar um teste de 50/50 para a chance do efeito de Envenenado(Médio).'),
(35, 11, 'Amanhecer dos Mortos-Vivos', 'Ao ficar com 0 PVs, o Zumbi de Escuridão faz um teste de CON(RN : 17), se passar, volta à vida com 1d10+1 de PVs.'),
(36, 11, 'Força nos Números', 'Se estiver acompanhado de, pelo menos, outros 2 aliados, ganha +2 em testes de ataque.'),
(37, 12, 'Disfarce', 'A criatura consegue imitar a aparência de um ser humano. Testes gerais de CAR ganham +4 e específicos de Enganação/Diplomacia/Intimidação ganham +6.'),
(38, 12, 'Presença de Nevoeiro', 'Em torno da criatura, um forte nevoeiro atinge o campo de batalha. Causa efeito de Ambiente Nublado.'),
(39, 12, 'Investida de Fumaça', 'A criatura consegue transfigurar-se em fumo por um curto período de tempo para deslocar-se, movendo-se o equivalente a duas ações de Deslocar.'),
(40, 13, 'Forma Sociável', 'A Visita é estranhamente carismática, dependendo inteiramente disso, +4 em todos os testes que envolvam interações sociais, +6 em Enganação, Diplomacia e Conexão.'),
(41, 13, 'Educação Forçada', 'A Visita possui uma única regra que lhe impede invasão, ele só pode entrar um lugar que alguém já esteja a habitar se possuir permissão, implícita ou não, de alguém que lá habite.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Equipamento`
--

DROP TABLE IF EXISTS `Equipamento`;
CREATE TABLE `Equipamento` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dano` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `critico` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modCritico` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alcance` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `propriedades` text COLLATE utf8mb4_general_ci,
  `efeito` text COLLATE utf8mb4_general_ci,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Equipamento`
--

INSERT INTO `Equipamento` (`id`, `nome`, `dano`, `critico`, `modCritico`, `alcance`, `propriedades`, `efeito`, `tipo`) VALUES
(1, 'Bandoleira', NULL, NULL, NULL, NULL, NULL, 'Guarda 1 Arma ou 2 Utensílios, sacar esses itens passa a ser ação livre.', 'Utensílio'),
(2, 'Binóculos', NULL, NULL, NULL, NULL, NULL, 'Garante +4 em testes de *Perceção* que envolvam observar algo distante.', 'Utensílio'),
(3, 'Bússola', NULL, NULL, NULL, NULL, NULL, 'Garante +4 em *Testes de Jornada*.', 'Utensílio'),
(4, 'Condutor', NULL, NULL, NULL, NULL, NULL, 'Um objeto usado como condutor de aura do Desconhecido.Quando portado, garante +4 em testes de Conexão.', 'Utensílio'),
(5, 'Escudo', NULL, NULL, NULL, NULL, NULL, 'Quando portado, garante +4 na reação *Bloquear*.', 'Utensílio'),
(6, 'Escudo Militar', NULL, NULL, NULL, NULL, NULL, 'Quando portado, garante 5 de resistência a dano (não inclui dano *Mental* e de *Essências*) e 10 de resistência a dano balístico', 'Utensílio'),
(7, 'Frasco de Óleo', NULL, NULL, NULL, NULL, NULL, 'Usado para recarregar uma Lamparina, concedendo 3 recargas.Pode ser usado para encharcar um ser com o óleo, se o ser sofrer dano incendiário, entra *Em Chamas*.', 'Utensílio'),
(8, 'Gazua', NULL, NULL, NULL, NULL, NULL, 'Garante +4 em testes de *Crime* para destrancar portas, janelas e caixas trancadas.', 'Utensílio'),
(9, 'Granada', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para a arremessar, explode, causando 6d6 de dano explosivo em todos em alcance curto.', 'Utensílio'),
(10, 'Granada de Atordoamento', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para a arremessar, estoura, causando um clarão acompanhado dum som alto, todos os seres em alcance médio devem girar um teste de **CON** contra o teste de arremesso, quem passar fica *Vulnerável* durante 1 rodada, quem falhar fica *Atordoado* durante 1 rodada.', 'Utensílio'),
(11, 'Granada de Fragmentação', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para a arremessar, explode em estilhaços, causando 6d6 de dano cortante em todos em alcance curto.', 'Utensílio'),
(12, 'Granada de Fumo', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para a arremessar, explode, criando uma grande nuvem cinza, o terreno passa a *Ambiente Nublado*.', 'Utensílio'),
(13, 'Granada Incendiária', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para a arremessar, explode em chamas, causando 6d6 de dano incendiário em todos em alcance curto, aqueles que falharem no teste de esquiva, entram *Em Chamas*.', 'Utensílio'),
(14, 'Lamparina', NULL, NULL, NULL, NULL, NULL, 'Quando acesa, anula *Penumbra Total* e *Parcial*Dura 5 cenas, precisando ser recarregada para uso futuro.', 'Utensílio'),
(15, 'Lanterna Simples', NULL, NULL, NULL, NULL, NULL, 'Quando ligada, anula *Penumbra Parcial* e torna *Penumbra Total* em *Parcial*. Dura 5 cenas, precisando ser recarregada para uso futuro.', 'Utensílio'),
(16, 'Lanterna Tática', NULL, NULL, NULL, NULL, NULL, 'Quando ligada, anula *Penumbra Total* e *Parcial*Dura 3 cenas, precisando ser recarregada para uso futuro.', 'Utensílio'),
(17, 'Máscara de Gás', NULL, NULL, NULL, NULL, NULL, 'Garante +4 em testes de **CON** contra efeitos que dependam da respiração.', 'Utensílio'),
(18, 'Memorabilia', NULL, NULL, NULL, NULL, NULL, 'Um objeto importante, repleto de boas memórias.Quando portado, garante +4 em testes para resistir a dano mental.', 'Utensílio'),
(19, 'Óculos de Visão Noturna', NULL, NULL, NULL, NULL, NULL, 'Quando ligado, dá te imunidade aos efeitos de *Penumbra Parcial* e *Total*.Dura 5 cenas, precisando ser recarregada para uso futuro.', 'Utensílio'),
(20, 'Pé de Cabra', NULL, NULL, NULL, NULL, NULL, 'Garante +4 em testes de *Crime* para abrir portas, janelas e caixas trancadas à força.Pode ser usado como arma, tendo os mesmos status dum *Bastão*', 'Utensílio'),
(21, 'Rolo de Bandagem', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão, enrola as bandagens num ser, curando 1d12+2 de PVs.Pode ser usado 5 vezes antes de acabar.', 'Utensílio'),
(22, 'Saco Cama', NULL, NULL, NULL, NULL, NULL, 'Se durante uma Cena de Interlúdio, a ação *Descansar* for do tipo *Desconfortável*, o tipo muda para *Normal*.', 'Utensílio'),
(23, 'Spray de Pimenta', NULL, NULL, NULL, NULL, NULL, 'Ao usar uma ação padrão para disparar contra um ser, o ser gira **CON** contra a tua **AGI**, se falhar, fica *Vulnerável* durante 1d4 rodadas. Pode ser usado 3 vezes antes de esvaziar.', 'Utensílio'),
(24, 'Tocha', NULL, NULL, NULL, NULL, NULL, 'Quando ligada, anula *Penumbra Parcial* e torna *Penumbra Total* em *Parcial*. Dura 1 cena, apagando-se logo depois.', 'Utensílio'),
(25, 'Alabarda', '3d6+1 de dano cortante', '24', '+4d6', 'Curto', 'Duas Mãos, Manha', NULL, 'Arma'),
(26, 'Bastão', '1d6+4 de dano físico', '24', '+1d6', 'Corpo-a-Corpo', 'Duas Mãos, Impactante', NULL, 'Arma'),
(27, 'Chicote', '1d8+1 de dano cortante', '24', '2x', 'Curto', 'Leve, Cabo, Sagaz', NULL, 'Arma'),
(28, 'Desmontador', '1d12+1 de dano cortante', '24', '+2d6', 'Curto', 'Duas Mãos, Manha, Especial', NULL, 'Arma'),
(29, 'Espada', '1d10+1d6 de dano cortante', '24', '2x', 'Corpo-a-Corpo', 'Leve, Manha', NULL, 'Arma'),
(30, 'Espada Gancho', '1d10+2 de dano cortante', '23, 24', '+3d6', 'Corpo-a-Corpo', 'Leve, Sagaz, Manha, Especial', NULL, 'Arma'),
(31, 'Faca', '1d8 de dano cortante', '24', '+1d6', 'Corpo-a-Corpo', 'Leve, Manha', NULL, 'Arma'),
(32, 'Facão', '1d10+1 de dano cortante', '24', '2x', 'Corpo-a-Corpo', 'Leve', NULL, 'Arma'),
(33, 'Foice', '1d6 de dano cortante', '24', '+1d8', 'Corpo-a-Corpo', 'Leve, Sagaz', NULL, 'Arma'),
(34, 'Gadanho', '4d4+2 de dano cortante', '24', '+2d4', 'Curto', 'Duas Mãos, Afiada', NULL, 'Arma'),
(35, 'Katana', '1d12+1d6 de dano cortante', '23, 24', '+2d6', 'Corpo-a-Corpo', 'Duas Mãos, Manha', NULL, 'Arma'),
(36, 'Katar', '1d4+3 de dano cortante', '24', '+1d10', 'Corpo-a-Corpo', 'Leve, Sagaz', NULL, 'Arma'),
(37, 'Kusarigama', '1d8 de dano cortante', '24', '2x', 'Curto', 'Duas Mãos, Especial', NULL, 'Arma'),
(38, 'Lança', '1d12+1 de dano cortante', '24', '+2d6', 'Curto', 'Duas Mãos, Manha, Arremessável', NULL, 'Arma'),
(39, 'Maça', '1d10+1d4+2 de dano físico', '24', '2x', 'Corpo-a-Corpo', 'Leve, Impactante', NULL, 'Arma'),
(40, 'Machadinha', '1d8+2 de dano cortante', '24', '2x', 'Corpo-a-Corpo', 'Leve, Sagaz, Arremessável', NULL, 'Arma'),
(41, 'Machado', '1d10+1d4 de dano cortante', '24', '+2d6', 'Corpo-a-Corpo', 'Duas Mãos', NULL, 'Arma'),
(42, 'Macuahuitl', '2d12 de dano cortante', '24', '2x', 'Curto', 'Duas Mãos, Pesada', NULL, 'Arma'),
(43, 'Manopla', '1d8 de dano físico', '24', '+1d8', 'Corpo-a-Corpo', 'Leve, Especial', NULL, 'Arma'),
(44, 'Martelo', '1d8 de dano físico', '24', '+1d8', 'Corpo-a-Corpo', 'Leve, Sagaz', NULL, 'Arma'),
(45, 'Martelo Meteoro', '2d6 de dano físico', '24', '+2d4', 'Curto', 'Duas Mãos, Manha, Impactante', NULL, 'Arma'),
(46, 'Martelo-de-Guerra', '2d8+1 de dano físico', '24', '2x', 'Curto', 'Duas Mãos, Manha, Impactante', NULL, 'Arma'),
(47, 'Motoserra', '3d6 de dano cortante', '24', '2x', 'Corpo-a-Corpo', 'Duas Mãos, Especial', NULL, 'Arma'),
(48, 'Nunchaku', '1d10+1 de dano físico', '23, 24', '+1d12', 'Corpo-a-Corpo', 'Leve, Sagaz, Manha', NULL, 'Arma'),
(49, 'Punhal', '1d8+2 de dano cortante', '24', '+1d6', 'Corpo-a-Corpo', 'Leve, Manha', NULL, 'Arma'),
(50, 'Rapieira', '1d10 de dano cortante', '23, 24', '+1d10', 'Corpo-a-Corpo', 'Leve, Manha', NULL, 'Arma'),
(51, 'Soqueira', '1d6 de dano físico', '24', '+1d6', 'Corpo-a-Corpo', 'Leve, Especial', NULL, 'Arma'),
(52, 'Arco', '1d10+1 de dano cortante', '23, 24', '2x', 'Médio', 'Duas Mãos', NULL, 'Arma'),
(53, 'Arco Composto', '1d12+1 de dano cortante', '23, 24', '2x', 'Longo', 'Duas Mãos', NULL, 'Arma'),
(54, 'Balestra', '1d10+3 de dano cortante', '23, 24', '+1d12', 'Médio', 'Duas Mãos', NULL, 'Arma'),
(55, 'Besta', '1d10+3 de dano cortante', '23, 24', '+1d12', 'Médio', 'Leve', NULL, 'Arma'),
(56, 'Espingarda', '5d8 de dano balístico', '24', '2x', 'Médio', 'Duas Mãos, Especial', NULL, 'Arma'),
(57, 'Fisga', '1d8 de dano físico', '23, 24', '2x', 'Curto', 'Leve', NULL, 'Arma'),
(58, 'Fuzil de Caça', '1d12+1d6 de dano balístico', '23, 24', '2x', 'Longo', 'Duas Mãos', NULL, 'Arma'),
(59, 'Pistola', '1d12+2 de dano balístico', '24', '+1d12', 'Médio', 'Leve', NULL, 'Arma'),
(60, 'Revólver', '1d12+1d4 de dano balístico', '23, 24', '2x', 'Médio', 'Leve', NULL, 'Arma'),
(61, 'Sniper', '3d10+5 de dano balístico', '22, 23, 24', '2x', 'Longo', 'Duas Mãos, Especial', NULL, 'Arma'),
(62, 'Submetralhadora', '2d6 de dano balístico', '24', '2x', 'Médio', 'Leve, Especial', NULL, 'Arma'),
(63, 'Uzi', '1d8+5 de dano balístico', '23, 24', '+1d8', 'Médio', 'Leve, Sagaz', NULL, 'Arma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `EquipamentoCustom`
--

DROP TABLE IF EXISTS `EquipamentoCustom`;
CREATE TABLE `EquipamentoCustom` (
  `id` int NOT NULL,
  `idUtilizador` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dano` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `critico` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modCritico` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alcance` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `propriedades` text COLLATE utf8mb4_general_ci,
  `efeito` text COLLATE utf8mb4_general_ci,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `EquipamentoCustom`
--

INSERT INTO `EquipamentoCustom` (`id`, `idUtilizador`, `nome`, `dano`, `critico`, `modCritico`, `alcance`, `propriedades`, `efeito`, `tipo`) VALUES
(3, 1, 'a', '', '', '', '', '', 'a', 'a'),
(4, 1, 'czx', '', '', '', '', '', 'zcx', 'zcxcz'),
(5, 1, 'Gargalhado', '', '', '', '', '', 'Uma máscara dourada com o formato dum rosto sorridente. Pode guardar uma magia na máscara, gastando o custo, podendo mais tarde conjurar a magia uma vez sem gasto, com o tempo de execução reduzido em uma categoria.', 'Utensílio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `FichaCriaturas`
--

DROP TABLE IF EXISTS `FichaCriaturas`;
CREATE TABLE `FichaCriaturas` (
  `id` int NOT NULL,
  `idCriatura` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forca` int NOT NULL,
  `agilidade` int NOT NULL,
  `constituicao` int NOT NULL,
  `inteligencia` int NOT NULL,
  `carisma` int NOT NULL,
  `pvMax` int NOT NULL,
  `def` int NOT NULL,
  `resistencias` text COLLATE utf8mb4_general_ci,
  `danoMental` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `rnMental` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `FichaCriaturas`
--

INSERT INTO `FichaCriaturas` (`id`, `idCriatura`, `nome`, `forca`, `agilidade`, `constituicao`, `inteligencia`, `carisma`, `pvMax`, `def`, `resistencias`, `danoMental`, `rnMental`) VALUES
(1, 1, NULL, 2, 4, 1, 0, 0, 45, 17, 'Resistência 10 a dano de Carniça\r\nVulnerabilidade 5 a dano Cortante', '1d4', 15),
(2, 2, NULL, -1, 2, 0, 2, 2, 36, 14, 'Resistência 2 a dano', '1d4+1', 14),
(3, 3, NULL, 0, 3, 0, 3, 3, 62, 18, 'Resistência a dano de Caos\r\nResistência 5 a dano', '1d6+4', 18),
(4, 4, 'Corpus', 4, 3, 4, -1, 0, 275, 18, 'Resistência 10 a dano', '2d12+2', 20),
(5, 4, 'Mens', 0, 3, -1, 4, 4, 130, 19, 'Resistência 10 a dano incendiário e elétrico\r\nResistência 5 a dano', '2d12+2', 20),
(6, 5, NULL, 0, 4, 0, 0, 5, 75, 22, 'Imune a dano', '2d10', 19),
(7, 6, NULL, 1, 3, 2, 0, 0, 30, 14, 'Resistência 5 a dano de Carniça', '1d4', 14),
(8, 7, NULL, 3, 4, 3, 0, 0, 238, 18, 'Imune a dano químico e de Carniça.\r\nResistência 10 a dano cortante, físico e balístico.\r\nVulnerável a dano incendiário e gélido.', '1d12+3', 18),
(9, 8, NULL, 3, 4, 3, 0, 2, 352, 18, 'Resistência a dano de Sangue\r\nResistência 5 a dano balístico, cortante e físico.', '2d8+2', 18),
(10, 9, NULL, 2, 4, 1, 4, 5, 220, 15, 'Resistência 10 a dano de Energia e Caos\r\nImunidade a Físico e Cortante', '1d10', 19),
(11, 10, NULL, 1, 1, 2, 0, 0, 23, 13, 'Resistência a dano de Obscuro', '1d4', 14),
(12, 11, NULL, 5, 3, 3, 4, 4, 580, 18, 'Resistência 10 a dano de Tempo e Carniça\r\nImunidade a dano venenoso e necrótico', '2d12+4', 20),
(13, 12, NULL, 0, 3, 0, 4, 4, 97, 17, 'Imune a dano mental\r\nResistência 5 a dano de Sabedoria', '3d8', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Magia`
--

DROP TABLE IF EXISTS `Magia`;
CREATE TABLE `Magia` (
  `id` int NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `essencia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tempoExec` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `custo` int NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Magia`
--

INSERT INTO `Magia` (`id`, `nome`, `essencia`, `tempoExec`, `custo`, `efeito`, `requisitos`) VALUES
(1, 'Mutilação', 'Carniça', 'Ação Padrão', 3, 'Tu tocas num ser, cobrindo o seu corpo com diversos cortes superficiais, cortando-o repetidamente, causando 3d6 de dano cortante', NULL),
(2, 'Amarras Violentas', 'Carniça', 'Ação Padrão', 3, 'Tu conjuras tripas grotescas que saem do chão, enrolando-se num alvo, tentando restringir os seus movimentos, o alvo faz um teste de **FOR** contra a tua **INT**/**CAR**, se falhar fica *Agarrado*.', NULL),
(3, 'Desmantelar', 'Carniça', 'Ação Padrão', 4, 'Tu disparas um corte invisível contra um alvo a distância média de ti, causando 3d6 de dano cortante.', NULL),
(4, 'Corrente Óssea', 'Carniça', 'Ação Padrão', 3, 'Tu disparas uma corrente criada a partir dos teus ossos contra um alvo a distância curta de ti, tu giras um teste de FOR contra o alvo, se passares, o alvo fica agarrado.', NULL),
(5, 'Sabre Medular', 'Carniça', 'Ação de Movimento', 5, 'A tua medula espinal estende-se, saindo pela tua nuca, ao pegares nela, tu sacas-la pra fora, criando um sabre feito d’ossos.  Sabre Medular - 2d12+1d6 dano cortante - Crítico: 23, 24 - +2d6 - Duas Mãos, Manha, Imponente, Potente', NULL),
(6, 'Unha Pútrida', 'Carniça', 'Ação Padrão', 4, 'Uma das tuas unhas cresce, virando um unha afiada rubra, ao a espetar num ser, o ser fica Envenenado(Fraco).', NULL),
(7, 'Limpeza Interna', 'Carniça', 'Ação Padrão', 5, 'Tu tocas num ser, alterando o seu sangue, acelerando o processo de cura, curando 4d6 de PVs do ser, cura Envenenado(Fraco).', NULL),
(8, 'Bomba de Sangue', 'Carniça', 'Ação de Padrão', 8, 'Tu crias uma enorme bolha de sangue coagulado e atiras contra um alvo a alcance médio, criando uma explosão viscosa e nojenta, causando 6d6 de dano de Carniça em todos a distância curta da explosão.', 'NdP 4'),
(9, 'Corvos Rubros', 'Carniça', 'Ação Padrão', 8, 'Tu fazes um gesto com as mãos, criando, nos teus pés, uma poça de um líquido vermelho viscoso, desse mesmo líquido, saem dois Corvos Rubros.', 'NdP 4'),
(10, 'Jardim de Espinhos', 'Carniça', 'Ação Padrão', 9, 'Tu tocas no chão, cobrindo uma área de alcance curto com aura de Carniça, criando inúmeras vinhas espinhosas, seres que entrarem ou acabarem a rodada na área sofrem 2d8 de dano de Carniça, a área conta como Terreno Complexo, dura até o fim da cena.', 'NdP 4'),
(11, 'Transfigurar', 'Carniça', 'Ação Padrão', 8, 'Tu cobres o teu corpo com aura de Carniça, alterando o formato da tua carne, tomando a aparência que desejares. +4 em testes que envolvam comunicação social até o fim da cena.', 'NdP 5'),
(12, 'Águia de Sangue', 'Carniça', 'Ação Padrão', 8, 'As tuas costelas expandem, criando costelas longas e curvadas que saem das tuas costas, criando carne entre os ossos, criando duas enormes asas de carne. Podes usar a ação *Deslocar* para te moveres verticalmente além de horizontalmente. Dura até o fim da cena', 'NdP 5'),
(13, 'Cortina de Insetos', 'Carniça', 'Ação Padrão', 6, 'Tu fechas a tua boca, sendo possível começar a ouvir um forte zumbido vindo do fundo da tua garganta, tu abres a boca, vomitando inúmeros insetos deformados que rapidamente se espalham pelo campo de batalha, dificultando a visão dos inimigos. O ambiente torna-se *Ambiente Nublado* mas tu e os teus aliados não sofrem os efeitos, dura até o fim da cena.', 'NdP 5'),
(14, 'Forçar Ódio', 'Carniça', 'Ação Padrão', 8, 'Tu tocas num ser, o ser sente como uma fúria incontrolável a começar a toma-lo, os olhos ficam encharcados de sangue, as veias pulsam incontrolavelmente, como se entrasse num estado de adrenalina. Ganha +4 em testes de ataque, +1D dano e +2 em reação durante 1d3 rodadas.', 'NdP 5'),
(15, 'Apunhalo Brutal', 'Carniça', 'Ação Padrão', 9, 'O teu braço é coberto por uma camada grotesca de carne e sangue coagulado, tomando um formato afiado, com uma marca que brilha carmesim nas costas da tua palma, disparando esse sangue contra um alvo a alcance médio, o sangue tomando o formato duma enorme lâmina vermelha, causando 6d8+5 de dano cortante', 'NdP 6'),
(16, 'Seta de Fogo', 'Energia', 'Ação Padrão', 3, 'Tu crias uma pequena flecha de fogo, disparando-a contra um alvo, causando 2d8+2 de dano incendiário.', NULL),
(17, 'Ataque em Chamas', 'Energia', 'Ação Livre', 2, 'Tu cobres a tua arma em fogo, no próximo ataque a arma causa +1d10 de dano incendiário.', NULL),
(18, 'Cúmulo de Raios', 'Energia', 'Ação Padrão', 5, 'Tu crias um amontoado de raios azulados nas tuas mãos e disparas-lo contra um alvo, causando 2d6 de dano elétrico e deixando o inimigo vulnerável durante 1 rodada.', NULL),
(19, 'Braço Arcano', 'Energia', 'Ação Padrão', 3, 'Tu crias um braço flutuante feito de aura de Energia, o braço tem 20 PV, ao atacar, causa 2d6+Mod. de INT de dano elétrico ou físico, girando o teste de ataque com a INT do conjurador.', NULL),
(20, 'Trovão Potente', 'Energia', 'Ação Padrão', 4, 'Tu puxas um raio azulado de uma fonte de energia próxima ou do céu, disparando-lho contra um inimigo, causando 1d20 de dano elétrico ou de Energia.', NULL),
(21, 'Toque Elétrico', 'Energia', 'Ação Padrão', 3, 'Tu cobres a tua mão com raios e tocas num ser, causando 3d6 de dano elétrico.', NULL),
(22, 'Cauterização Brutal', 'Energia', 'Ação Padrão', 3, 'Tu aqueces a ferida de um ser ao ponto de a cauterizar, o alvo recupera 4d6 de PV.', NULL),
(23, 'Garras Elétricas', 'Energia', 'Ação de Movimento', 4, 'Tu cobres as tuas mãos com aura de Energia, conjurando garras feitas de raios azulados em ambas as mãos. As garras causam 1d10+5 de dano elétrico e possuem as propriedades Sagaz e Manha, duram até o fim da cena.', NULL),
(24, 'Anéis Abastecedores', 'Energia', 'Ação de Movimento', 3, 'Tu conjuras anéis ondulados feitos de aura de Energia ao redor das tuas mãos, enquanto os anéis estiverem ativos, o custo de feitiços diminuí em 2, custando no mínimo 1 (Não afeta esta magia). Gasta por rodada.', NULL),
(25, 'Raios de Outro Mundo', 'Energia', 'Ação Padrão', 3, 'Os teus olhos brilham azul, disparando dois raios, escolhe até 2 alvos, os raios voam até os alvos escolhidos, cada raio causando 1d10+1 de dano de Energia.', NULL),
(26, 'Combustão Instantânea', 'Energia', 'Ação Padrão', 2, 'Tu estalas os dedos, cobrindo o corpo de um ser em aura de Energia, aura essa que rapidamente vira uma enorme chama azulada, um alvo (á tua escolha) fica em chamas.', NULL),
(27, 'Investida Elétrica', 'Energia', 'Ação de Movimento', 5, 'Tu investes para a frente, virando um raio azul, tu moves-te o dobro, evitando ataques e conseguindo passar por espaços apertados. Pode gastar +2 para usar como reação, esquivando-se do ataque garantidamente, ou para levar outra pessoa junto, +2 por pessoa.', 'NdP 4'),
(28, 'Carregar', 'Energia', 'Ação de Movimento', 7, 'Tu preenches as veias dum ser de eletricidade, fazendo as brilhar azul, dando a tal ser uma vitalidade absurda. O ser ganha 2d10+5 PVs temporários.', ' NdP 4'),
(29, 'Benzer', 'Energia', 'Ação Padrão', 6, 'Tu cobres uma área a teu redor com aura de Energia, abençoando-a com a beleza da vitalidade. Todos os seres a alcance curto de ti recuperam 3d6+INT de PdTs.', 'NdP 4'),
(30, 'Rajada de Fogo', 'Energia', 'Ação Padrão', 10, 'Tu conjuras uma chama azul entre as tuas mãos, lançando-a para a frente na forma de um enorme leque de fogo, causando 2d12+10 de dano de Energia em todos os seres a alcance médio.', 'NdP 6'),
(31, 'Veneno Profano', 'Obscuro', 'Ação de Movimento', 4, 'Tu cobres a tua arma com uma substância negra que parece apodrecer tudo que toca, ao acertar um inimigo, ele fica *Envenenado(Fraco+3)*, ao invés de venenoso é necrótico.', NULL),
(32, 'Espinho Negro', 'Obscuro', 'Ação Padrão', 4, 'Tu crias um espinho negro e disparas-lo contra o alvo, causando 4d6 de dano necrótico.', NULL),
(33, 'Chama Maldita', 'Obscuro', 'Ação Padrão', 3, 'Tu crias uma chamas preta que ocupa uma área de alcance curto, se alguém entrar nela ou acabar o turno dentro dela, sofre 1d12+3 de dano necrótico. Gasta por rodada.', NULL),
(34, 'Piso Gosmento', 'Obscuro', 'Ação Padrão', 4, 'Tu cobres o chão com uma lama negra, a lama é quente e grotesca, ela quase parece viva, prendendo e puxando tudo que toca, o terreno vira terreno complexo até o fim da cena.', NULL),
(35, 'Teia Negra', 'Obscuro', 'Ação Padrão', 4, 'Tu disparas uma teia feita duma gosma negra que se prende ao alvo, se acertado, o alvo fica *Agarrado*. Precisa passar um teste de FOR(RN : 15+INT/EMO*2), se passar solta-se.', NULL),
(36, 'Sentença', 'Obscuro', 'Ação de Movimento', 6, 'Tu declaras uma sentença de morte a um alvo, gerando uma tatuagem negra que circunda o seu pescoço, sempre que sofrer dano de Obscuro, o ser sofre +3 de dano extra para cada dado girado, dura até o fim da cena.', 'NdP 4'),
(37, 'Duplicatas', 'Obscuro', 'Ação de Movimento', 6, 'Tu fazes um gesto com as mãos, conjurando, a partir da tua sombra, 3 duplicatas, aumentando a tua DEF em 6, sempre que um ataque direcionado a ti falhar, uma das duplicatas se desfaz, diminuindo a tua DEF em 2.', 'NdP 4'),
(38, 'Forçar Penumbra', 'Obscuro', 'Ação Padrão', 5, 'Tu fazes um gesto com as mãos, clamando pelas sombras, toda a fonte de luz da área é ofuscada, o ambiente ganha *Penumbra Parcial.* Se usar num ambiente já em *Penumbra Parcial*, o ambiente passa a ter *Penumbra Total*.', 'NdP 4'),
(39, 'Gás Negro', 'Obscuro', 'Ação Padrão', 8, 'Marcas negras aparecem no teu rosto, logo depois um espesso gás negro começa a sair da tua boca, espalhando pelo ambiente, criando uma enorme nuvem negra a teu redor, o ambiente torna-se *Ambiente Sufocado* até o fim da cena.', 'NdP 6'),
(40, 'Projétil Sonoro', 'Caos', 'Ação Padrão', 3, 'Tu assobias, conjurando um projétil alaranjado que sai da tua boca, disparando-lho contra um alvo, causando 2d8+4 de dano sónico.', NULL),
(41, 'Olhos de Ruído', 'Caos', 'Ação de Movimento', 5, 'Os teus olhos são cobertos por estática de TV, dando te uma  visão bizarra que parece prever trajetórias, tu ganhas +2 em testes de ataque com armas à distância e em testes de esquiva contra ataques à distância até o fim da cena.', NULL),
(42, 'Pedra, Papel, Tesoura', 'Caos', 'Ação Padrão', 5, 'Tu jogas um jogo de pedra, papel e tesoura com o Caos (contra o Mestre). Se perderes, perdes 1d6+1 de SAN, se empatares, nada acontece, se venceres, recebes 1 dos seguintes bónus (dependendo do que usaste para vencer) :  Pedra - Tu recebes 5 de resistência a dano até o fim da cena.  Papel - Tu recebes +2 num tipo de teste (à tua escolha) até o fim da cena.  Tesoura - Todos os teus ataques passam a causar +1D de dano cortante até o fim da cena.  Os efeitos não acumulam consigo mesmos.', NULL),
(43, 'Rejeitar Sapiência', 'Caos', 'Ação Padrão', 5, 'Tu escolhes um alvo, criando um bloqueio mental nele, o alvo esquece certos conhecimentos, certas habilidades que antes possuía, escolhe um tipo de teste, o alvo terá -4 nesse tipo de teste até o fim da cena.', NULL),
(44, 'Energizado', 'Caos', 'Ação de Movimento', 5, 'Uma onda de motivação preenche-te, tu sentes como se tudo fosse possível, basta tentares o suficiente, +2 em todos os testes até o fim da rodada.', NULL),
(45, 'Seguir o Ritmo', 'Caos', 'Ação de Movimento', 4, 'Uma música bizarra começa a tocar na tua mente e tu começas a, inconscientemente, seguir o seu ritmo, +4 em testes de esquiva até o fim da cena.', NULL),
(46, 'Fraco Sinal', 'Caos', 'Ação Padrão', 5, 'Tu cobres a mente dum alvo com aura de Caos, preenchendo os seus pensamentos de estática e falhas, -4 em testes de **INT** até o fim da cena.', NULL),
(47, 'Troca Troca', 'Caos', 'Ação Padrão', 3, 'Estala os dedos, trocando dois seres que estejam a até distância média um do outro de lugar, se um dos seres for um aliado, concede-lhe um *Ataque de Oportunidade* contra o outro ser. Pode gastar +2 para usar este feitiço como reação, pode gastar +3 para usar este feitiço como reação no turno de outro ser.', NULL),
(48, 'Palavras Doem', 'Caos', 'Ação Padrão', 3, 'Tu fazes uma onomatopeia com a voz, criando a palavra com aura de Sabedoria e disparando contra um alvo, causando 2d8 de dano, o tipo de dano varia de acordo com a onomatopeia.', NULL),
(49, 'Tu Não Podes Sair Daqui!', 'Caos', 'Ação Padrão', 7, 'Tu tocas no chão, espalhando aura de Caos pela sala onde te encontras, criando barras laranjas que tapam todas as saídas, inimigos que tentem passar pelas barras sofrem 2d8 de dano de Caos e devem girar um teste de INT/CAR contra ti, se passarem, conseguem atravessar as barras.', 'NdP 4'),
(50, 'Vislumbre Ilusório', 'Caos', 'Ação Padrão', 6, 'Tu passas a mão pelo ar, tecendo com os teus dedos uma ilusão. Todos que presenciarem a ilusão devem girar um teste de Perceção(CAR) contra ti, se passarem conseguem ver através da ilusão, tu adicionas ao teu teste o quanto gastaste para fazer a magia(se for um feitiço ou oferenda, o que gastaste pela metade). O custo varia de 6 a 12', 'NdP 5'),
(51, 'Estrábico', 'Caos', 'Ação de Movimento', 7, 'Tu infestas os músculos dum alvo a alcance curto com aura de Caos, causando espasmos e movimentos involuntários que parecem guiar o ser a um direção aleatória. O ser é forçado a usar a sua ação de movimento para se *Deslocar* em uma direção aleatória, não podendo usar nenhuma outra ação para se *Deslocar*, dura 1d4+1 rodadas.', 'NdP 5'),
(52, 'Reescrever Feridas', 'Sabedoria', 'Ação Padrão', 4, 'Tu crias sigilos de Sabedoria em volta dos ferimentos, reescrevendo as células do alvo, curando-o instantaneamente. O alvo recupera 3d6 PVs, a cura ignora habilidades que impedem cura.', NULL),
(53, 'Paralisia', 'Sabedoria', 'Ação Padrão', 4, 'Tu cobres o corpo de um alvo com sigilos de Sabedoria, o alvo deve fazer um teste de CAR(RN:15+CAR2 do conjurador), se falhar ele fica *Vulnerável* durante 1 rodada.', NULL),
(54, 'Conquistar', 'Sabedoria', 'Ação Padrão', 5, 'Tu cobres o cérebro de um ser em sigilos de Sabedoria, assim manipulando a sua mente, esse ser deve girar um teste de INT ou CAR contra ti, se falhar, não pode te atacar durante 1 rodada', NULL),
(55, 'Decifrar', 'Sabedoria', 'Ação Padrão', 3, 'Tu cobres a tua mão com aura de Sabedoria, ao tocares num objeto com informação (um livro, dispositivo com uma gravação, etc), tu compreendes as palavras(mesmo não conhecendo o idioma), contanto que seja um idioma humano.', NULL),
(56, 'Desconcentrar', 'Sabedoria', 'Ação Padrão', 4, 'Tu cobres a tua mão com aura de Sabedoria, formando um círculo rosado na tua palma, ao tocar na cabeça de um alvo, um chiado forte começa a tocar na sua mente, o alvo perde a habilidade de realizar magias sustentadas até o fim da cena.', NULL),
(57, 'Ligação Angustiante', 'Sabedoria', 'Ação Padrão', 5, 'Uma vez por cena, tu tocas num alvo, criando uma conexão direta entre a tua mente e o seu corpo, durante 1 rodada, para cada 3 PdT que perderes, o alvo sofre 1d6 de dano de Sabedoria.', NULL),
(58, 'Ordens Diretas', 'Sabedoria', 'Ação Padrão', 4, 'Aparecem diversos sigilos rosados nos teus dedos, sigilos esses que disparas contra até 3 aliados teus, ao serem atingidos, as mentes dos teus aliados recebem ordens de combate, melhores posições, táticas, fraquezas do alvo, os aliados atingidos ganham +2 em testes de Luta e Pontaria até o fim da cena.  Gasta por aliado.', NULL),
(59, 'Sigilos Marciais', 'Sabedoria', 'Ação de Movimento', 3, 'Tu cravas 4 sigilos rosa numa arma, ao atacar com ela, podes escolher gastar 1 dos sigilos, assim ganhando +4 no teste de ataque.', NULL),
(60, 'Carimbar', 'Sabedoria', 'Ação Padrão', 4, 'Tu apontas para um alvo a alcance longo, na ponta do teu dedo surge um grande sigilo rosa que rapidamente viaja contra o alvo, causando 2d6+2 de dano incendiário, queimando a carne do alvo.', NULL),
(61, 'Encarar', 'Sabedoria', 'Ação de Movimento', 6, 'Tu encaras um alvo a distância média de ti, cobrindo o cérebro dele com sigilos. O alvo gira um teste de INT contra ti, se falhar, perde a habilidade de se locomover, ainda conseguindo se mexer mas não podendo sair do lugar. Se sofreres dano, a magia termina.', 'NdP 4'),
(62, 'Manto de Lâminas', 'Sabedoria', 'Ação Padrão', 10, 'Tu fazes um gesto, conjurando 8 espadas feitas de sigilos rosa que giram a teu redor, se um ser entrar ou terminar o turno na distância corpo-a-corpo de ti, ele sofre 3d6+5 de dano de Sabedoria. Dura até o fim da cena.', 'NdP 5'),
(63, 'Forçar Sinapses', 'Sabedoria', 'Ação Padrão', 8, 'Tu estendes a mão contra um alvo a até distância média de ti, conjurando sigilos no seu cérebro, forçando certas sinapses a agir. O alvo gira um teste de INT contra ti, se falhar, tu tomas controle duma das suas ações de movimento, dando-lhe uma ordem direta.', 'NdP 5'),
(64, 'Localizar', 'Sabedoria', 'Ação Padrão', 8, 'Tu conjuras um sigilo rosa a teus pés, a aura emanada por esse sigilo se expande, destacando a presença de todos os seres num raio de 1km. Seres dentro desse raio podem escolher girar um teste de Furtividade(INT/CAR) contra um teste de Perceção(INT/CAR) teu, se passarem, a sua presença não é destacada.', 'NdP 5'),
(65, 'Conexão Mental', 'Sabedoria', 'Ação Padrão', 8, 'Tu tocas na cabeça dum aliado, tocando na tua simultaneamente, criando um símbolo rosa em ambas, assim estabelecendo uma conexão entre as vossas mentes. Até o fim da cena, conseguem comunicar telepaticamente um com o outro independentemente de distância.', 'NdP 6'),
(66, 'Putrefação', 'Tempo', 'Ação Padrão', 3, 'Tu cobres um alvo com aura de Tempo, o corpo do alvo entra em estado de decomposição acelerado, sofrendo 2d6 de dano necrótico por rodada. Gasta por rodada.', NULL),
(67, 'Olho Clarividente', 'Tempo', 'Ação de Movimento', 3, 'Tu vês um futuro possível, prevendo a ação de um inimigo, tu tens +4 na reação contra o próximo ataque do inimigo.', NULL),
(68, 'Acelerar Cura', 'Tempo', 'Ação de Movimento', 2, 'Tu cobres as feridas de um ser em aura de Tempo, assim acelerando o processo de cicatrização, curando 1d12+3 de PV', NULL),
(69, 'Playback', 'Tempo', 'Ação Livre', 5, 'Tu cobres o teu corpo com aura de Tempo, assim conseguindo repetir a última ação feita como ação livre (2 usos por rodada)', NULL),
(70, 'Sono Forçado', 'Tempo', 'Ação Padrão', 4, 'Tu apontas para um ser, cobrindo o seu cérebro com aura de Tempo, acelerando o seu processamento de cansaço, o ser faz um teste de **INT**/**CAR** contra ti, se falhar, o ser fica *Cansado*.', NULL),
(71, 'Velhice Errónea', 'Tempo', 'Ação Padrão', 3, 'Tu apontas para um ser, cobrindo os seus músculos com aura de Tempo, simulando os músculos fracos de um corpo idoso, o ser faz um teste de **INT**/**CAR** contra ti, se falhar, fica *Fraco*.', NULL),
(72, 'Tocar na Ferida', 'Tempo', 'Ação Padrão', 4, 'Tu tocas num ser, forçando uma ferida antes fechada a se reabrir, se o ser tocado tiver se curado de um ataque na última rodada, a cura é anulada. Só consegue anular uma cura por uso.', NULL),
(73, 'Inconsistência', 'Tempo', 'Ação de Movimento', 6, 'Tu cobres o teu corpo com aura de Tempo, mudando a forma que o teu corpo age, criando uma inconsistência temporal, o teu corpo acelerando e desacelerando, dificultando prever os teus movimentos. A tua DEF aumenta em 2 até o fim da cena.', 'NdP 4'),
(74, 'Speed Up', 'Tempo', 'Ação de Movimento', 8, 'Tu tocas num ser, cobrindo o seu corpo com aura de Tempo, acelerando-o. O ser ganha +1 ação de movimento até o fim da cena.', 'NdP 6'),
(75, 'Speed Up Total', 'Tempo', 'Ação de Movimento', 10, 'Tu tocas num ser, cobrindo o seu corpo com aura de Tempo, acelerando-o a um ponto intenso. O ser ganha +1 ação padrão até o fim da cena.', 'Speed Up');

-- --------------------------------------------------------

--
-- Estrutura da tabela `MagiaCustom`
--

DROP TABLE IF EXISTS `MagiaCustom`;
CREATE TABLE `MagiaCustom` (
  `id` int NOT NULL,
  `idUtilizador` int NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `essencia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tempoExec` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `custo` int NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `MagiaCustom`
--

INSERT INTO `MagiaCustom` (`id`, `idUtilizador`, `nome`, `essencia`, `tempoExec`, `custo`, `efeito`, `requisitos`) VALUES
(1, 1, 'a', 'a', '0', 0, '0', ''),
(2, 1, 'dasdasdasdas', 'adsdsads', '0', 0, '0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Personagem`
--

DROP TABLE IF EXISTS `Personagem`;
CREATE TABLE `Personagem` (
  `id` int NOT NULL,
  `idUtilizador` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ndp` int NOT NULL,
  `classe` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `origem` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `notasPlayer` text COLLATE utf8mb4_general_ci,
  `forca` int NOT NULL,
  `agilidade` int NOT NULL,
  `constituicao` int NOT NULL,
  `inteligencia` int NOT NULL,
  `carisma` int NOT NULL,
  `resistencias` text COLLATE utf8mb4_general_ci,
  `pvAtual` int NOT NULL,
  `pvMax` int NOT NULL,
  `sanAtual` int NOT NULL,
  `sanMax` int NOT NULL,
  `pdtAtual` int NOT NULL,
  `pdtMax` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Personagem`
--

INSERT INTO `Personagem` (`id`, `idUtilizador`, `nome`, `ndp`, `classe`, `origem`, `notasPlayer`, `forca`, `agilidade`, `constituicao`, `inteligencia`, `carisma`, `resistencias`, `pvAtual`, `pvMax`, `sanAtual`, `sanMax`, `pdtAtual`, `pdtMax`) VALUES
(2, 1, 'Pedro Cunha', 1, '', 'adsadsdas', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(3, 1, 'aaaa', 1, '', 'aaaa', 'blablabla', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(4, 1, 'zcx', 1, '', 'zcx', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(5, 1, 'dasads', 1, '', 'adsads', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0),
(7, 1, 'Lucas Vilarinho de Morais Soares', 1, '', 'Cidadão', '', 0, 2, 0, 2, 1, '', 10, 10, 12, 12, 14, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_Equip`
--

DROP TABLE IF EXISTS `Perso_Equip`;
CREATE TABLE `Perso_Equip` (
  `idPerso` int NOT NULL,
  `idEquip` int NOT NULL,
  `quantia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Perso_Equip`
--

INSERT INTO `Perso_Equip` (`idPerso`, `idEquip`, `quantia`) VALUES
(2, 25, 1),
(3, 53, 1),
(3, 23, 1),
(6, 18, 1),
(7, 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_EquipCustom`
--

DROP TABLE IF EXISTS `Perso_EquipCustom`;
CREATE TABLE `Perso_EquipCustom` (
  `idPerso` int NOT NULL,
  `idEquipCustom` int NOT NULL,
  `quantia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Perso_EquipCustom`
--

INSERT INTO `Perso_EquipCustom` (`idPerso`, `idEquipCustom`, `quantia`) VALUES
(3, 3, 1),
(3, 5, 1),
(6, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_Magia`
--

DROP TABLE IF EXISTS `Perso_Magia`;
CREATE TABLE `Perso_Magia` (
  `idPerso` int NOT NULL,
  `idMagia` int NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Perso_Magia`
--

INSERT INTO `Perso_Magia` (`idPerso`, `idMagia`, `tipo`) VALUES
(2, 68, ''),
(3, 68, ''),
(3, 64, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_MagiaCustom`
--

DROP TABLE IF EXISTS `Perso_MagiaCustom`;
CREATE TABLE `Perso_MagiaCustom` (
  `idPerso` int NOT NULL,
  `idMagiaCustom` int NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Perso_MagiaCustom`
--

INSERT INTO `Perso_MagiaCustom` (`idPerso`, `idMagiaCustom`, `tipo`) VALUES
(3, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_Poder`
--

DROP TABLE IF EXISTS `Perso_Poder`;
CREATE TABLE `Perso_Poder` (
  `idPerso` int NOT NULL,
  `idPoder` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Perso_Poder`
--

INSERT INTO `Perso_Poder` (`idPerso`, `idPoder`) VALUES
(2, 70),
(2, 171),
(3, 28),
(6, 152),
(7, 152);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Perso_PoderCustom`
--

DROP TABLE IF EXISTS `Perso_PoderCustom`;
CREATE TABLE `Perso_PoderCustom` (
  `idPerso` int NOT NULL,
  `idPoderCustom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Poder`
--

DROP TABLE IF EXISTS `Poder`;
CREATE TABLE `Poder` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL,
  `essencia` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Poder`
--

INSERT INTO `Poder` (`id`, `nome`, `efeito`, `essencia`, `tipo`, `requisitos`) VALUES
(1, 'Armadura Momentânea', 'Ao gastar 8 PdT tu cobres o teu corpo com uma aura protetora, essa energia dá te 5 de resistência a um tipo de dano à tua escolha até o fim da cena.', NULL, 'Habilidade Geral', NULL),
(2, 'Armadura Desconhecida', 'Ao gastar 8 PdT tu tornas a aura dentro de ti numa aura protetora, tu ganhas +2 de DEF até o fim da cena.', NULL, 'Habilidade Geral', NULL),
(3, 'Aura Amedrontadora', 'Ao gastar 8 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto, tu então alteras a tua aura, tornando-a numa energia terrível e hedionda, todos dentro da aura devem fazer um teste de **CAR**(RN: 18+Mod. de CAR), se falharem ficam *Amedrontados*.', NULL, 'Habilidade Geral', NULL),
(4, 'Aura Curandeira', 'Ao gastar 8 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto, tu então alteras a tua aura, tornando-a numa energia benevolente e bondosa, todos os aliados dentro da aura recuperam +2d10+2 de PVs.', NULL, 'Habilidade Geral', NULL),
(5, 'Estímulo Muscular', 'Ao gastar 4 PdT, tu concentras aura do Desconhecido nos teus músculos, aumentando a capacidade física deles, ganhando +4 no próximo teste de **FOR**/**AGI**/**CON** que realizares.', NULL, 'Habilidade Geral', NULL),
(6, 'Canalização', 'Ao gastar 6 PdT, tu concentras a aura do Desconhecido na tua arma, a arma causa +1d8 de dano até o fim da cena.', NULL, 'Habilidade Geral', NULL),
(7, 'Canalização Momentânea', 'Ao gastar 9 PdT tu rapidamente concentras aura do Desconhecido na tua arma, aumentando a sua potência momentaneamente, ao usar este poder antes de um ataque, a arma causa +3d8 de dano, mas a arma volta ao normal depois do ataque.', NULL, 'Habilidade Geral', 'Canalização'),
(8, 'Canalização Máxima', 'Ao gastar 10 PdT, tu concentras uma quantidade massiva de aura do Desconhecido na tua arma, a arma causa +2d6 de dano até o fim da cena.', NULL, 'Habilidade Geral', 'Canalização'),
(9, 'Canalização Momentânea Aperfeiçoada', 'Ao gastar 13 PdT tu rapidamente concentras uma quantidade massiva de aura do Desconhecido na tua arma, aumentando a sua potência momentaneamente, ao usar este poder antes de um ataque, a arma arma causa +4d6 de dano, mas a arma volta ao normal depois de dois ataques.', NULL, 'Habilidade Geral', 'Canalização Momentânea'),
(10, 'Impacto Atrasado', 'Ao gastar 7 PdT tu divides o teu golpe em dois impactos, ao acertar o golpe tu causas apenas metade do dano, causando a outra metade no próximo turno, esse impacto toma a forma de uma pequena explosão de aura do Desconhecido, o alvo faz um teste de **CON**(RN:15+Mod. de CAR), se falhar fica *Vulnerável* durante 1 rodada', NULL, 'Habilidade Geral', NULL),
(11, 'Projeção de Energia', 'Ao gastar 4-7 PdT, tu rapidamente converges aura do Desconhecido num pequeno ponto, criando um projétil similar a uma bala feito de pura aura, disparando-o contra um alvo a alcance médio, o projétil causa +1d4 por cada ponto gasto, o tipo de dano é o dano da tua essência. (Se não tiver essência o tipo de dano é elétrico)', NULL, 'Habilidade Geral', NULL),
(12, 'Projeção de Energia Aperfeiçoada', 'Ao gastar 13 PdT, tu rapidamente converges uma quantidade massiva de aura do Desconhecido num ponto minúsculo, comprimindo esse ponto com as mãos, usando-as para apontar para um alvo a até alcance longo, disparando um raio de aura do Desconhecido que rapidamente viaja contra o alvo, o raio causa 6d6 de dano, o tipo de dano é o dano da tua essência. (Se não tiver essência o tipo de dano é elétrico)', NULL, 'Habilidade Geral', 'Projeção de Energia'),
(13, 'Leitura Rápida', 'Ao gastar 6 PdT, tu fazes uma análise rápida da aura dum ser ou objeto, descobrindo as essências da aura e tendo uma noção mais aprofundada da sua força/efeito.', NULL, 'Habilidade Geral', NULL),
(14, 'Leitura Reveladora', 'Ao gastar 8 PdT, tu fazes uma análise da aura do ambiente, buscando nas sombras, seres escondidos devem re-rolar o teste de Furtividade contra ti.', NULL, 'Habilidade Geral', NULL),
(15, 'Conjuração de Barreiras', 'Ao gastar 20 PdT, tu conjuras uma barreira, tomando a forma de um domo cobrindo uma área de alcance curto(se tiver 4 ou mais de **CAR**/**INT** cobre alcance médio, se tiver mais de 6 de **CAR**/**INT** cobre alcance longo), o domo tem 20+10x**CAR**/**INT** de PVs (tendo resistência a dano de essências). O portador pode também gastar 1 ação de movimento para alterar o seu tamanho (não ultrapassando o limite). Ninguém, exceto o conjurador, consegue entrar ou sair da barreira sem a quebrar.', NULL, 'Habilidade Geral', NULL),
(16, 'Brandir Território', 'Ao gastar 10 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto(se tiver 4 ou mais de **CAR**/**INT** cobre alcance médio, se tiver mais de 6 de **CAR**/**INT** cobre alcance longo), enquanto dentro dessa área, tens +2 em todos os testes e todos os seres dentro do território estão a teu alcance, como se conseguisses os tocar. O território mantém-se de pé enquanto o conjurador não se deslocar.', NULL, 'Habilidade Geral', NULL),
(17, 'Território Benigno', 'Ao gastar 12 PdT, tu expandes a tua aura, cobrindo uma área de alcance curto(se tiver 4 ou mais de **CAR**/**INT** cobre alcance médio, se tiver mais de 6 de **CAR**/**INT** cobre alcance longo), enquanto dentro dessa área, magias com efeito em área são anuladas. O território mantém-se de pé enquanto o conjurador não se deslocar.', NULL, 'Habilidade Geral', 'Brandir Território'),
(18, 'Estender Território', 'Ao gastar 6 PdT, enquanto o território está erguido, estende uma porção do território, tomando a forma duma linha que busca um oponente, criando em seus pés uma extensão do teu território. Escolhe um alvo fora do teu território, enquanto ele não se deslocar ele passa a sofrer dos efeitos do teu território.', NULL, 'Habilidade Geral', 'Brandir Território'),
(19, 'Armar Território', 'Ao gastar 8 PdT antes dum ataque, tu envolves a arma com o teu território, forçando-a a atingir a alma do oponente. O tipo de dano do próximo ataque muda para dano espiritual.', NULL, 'Habilidade Geral', 'Brandir Território'),
(20, 'Campo A.P.D', 'Ao gastar x PdTs, como reação, tu cobres uma área prestes a ser danificada com uma barreira feita de aura do Desconhecido, resistindo ao dano do ataque, x é igual ao dano do ataque. Se não tiver PdTs o suficiente para resistir o dano inteiro, resiste uma quantia de dano igual aos PdTs restantes.', NULL, 'Habilidade Geral', NULL),
(21, 'Feitiço Ensinado', 'Tu escolhes uma magia da lista e aprendes-la na forma de um Feitiço.', NULL, 'Habilidade Geral', NULL),
(22, 'Ritual Ensinado', 'Tu escolhes uma magia da lista e aprendes-la na forma de um Ritual.', NULL, 'Habilidade Geral', NULL),
(23, 'Oferenda Ensinada', 'Tu escolhes uma magia da lista e aprendes-la na forma de um Oferenda.', NULL, 'Habilidade Geral', NULL),
(24, 'Adquirir Aptidão', 'Tu ganhas uma Aptidão da lista de Aptidões.', NULL, 'Habilidade Geral', NULL),
(25, 'Debilitar com Arremesso', 'Tu aprendeste a arremessar as tuas armas de uma maneira especial, de uma maneira que debilite o teu inimigo. Ao arremessar uma arma, se acertares, o alvo tem -4 no seu próximo teste(não acumula consigo mesmo).', NULL, 'Aptidão', NULL),
(26, 'Dano Certeiro', 'Ao girar o dano de uma arma, tu voltas a girar todos os dados que tiveram como resultado 1 ou 2.', NULL, 'Aptidão', NULL),
(27, 'Mira Precisa', 'Tu ignoras a desvantagem de cobertura parcial e ganhas +4 em testes de pontaria se gastares uma ação de movimento a mirar.', NULL, 'Aptidão', NULL),
(28, 'Perícia', 'Escolhe um tipo de teste, tu ganhas +4 em testes desse tipo.', NULL, 'Aptidão', NULL),
(29, 'Versátil', 'Tu ganhas +1 em todos os testes.', NULL, 'Aptidão', NULL),
(30, 'Corpo Robusto', 'Ao escolher esta aptidão, tu recebes o dobro da tua CON como PVs, sempre que subires de nível ganhas +3 PVs.', NULL, 'Aptidão', NULL),
(31, 'Mente Robusta', 'Ao escolher esta aptidão, tu recebes o dobro da tua CAR como SAN, sempre que subires de nível ganhas +3 SAN.', NULL, 'Aptidão', NULL),
(32, 'Cérebro Robusto', 'Ao escolher esta aptidão, tu recebes o dobro da tua INT como PdTs, sempre que subires de nível ganhas +3 PdTs.', NULL, 'Aptidão', NULL),
(33, 'Reflexos Defensivos', 'Tu ganhas +2 em testes de bloqueio e esquiva.', NULL, 'Aptidão', NULL),
(34, 'Sempre Atento', 'Tu desenvolves um sexto sentido que alerta-te de perigos inesperados, tu ficas imune ao estado *Desprevenido*', NULL, 'Aptidão', NULL),
(35, 'Imparável', 'Se estiveres *A Falecer* tu podes continuar a agir, porém testes de cura feitos contra ti têm desvantagem.', NULL, 'Aptidão', NULL),
(36, 'Empunhadura Dupla', 'Ao segurar uma arma leve em cada mão, pode atacar com ambas numa ação.', NULL, 'Aptidão', NULL),
(37, 'Artes Marciais', 'O teu dano físico aumenta em 1D e sobe uma categoria (d6->d8->d10...) (Pode ser escolhido duas vezes).', NULL, 'Aptidão', NULL),
(38, 'Fôlego Extra', 'Uma vez por combate ganhas uma ação de movimento a mais. Podendo tornar as duas ações de movimento numa ação padrão.', NULL, 'Aptidão', NULL),
(39, 'Adiar Catástrofe', 'Uma vez por *Cena de Combate*, tu consegues adiar uma desvantagem ou modificador negativo para o próximo teste.', NULL, 'Aptidão', NULL),
(40, 'Ataque Executor', 'Inimigos com apenas metade da vida têm -2 de **DEF** contra os teus ataques.', NULL, 'Aptidão', NULL),
(41, 'Corpo Muralha', 'Inimigos têm -4 no teste se tentarem usar a manobra *Agarrar* em ti.', NULL, 'Aptidão', NULL),
(42, 'Corpo Resiliente', 'Ganhas 5 de resistência a um tipo de dano à tua escolha.', NULL, 'Aptidão', NULL),
(43, 'Intercetar', 'Se um aliado em curta distância for alvo de um ataque, poderás sofrer o dano no lugar do aliado.', NULL, 'Aptidão', 'NdP 4'),
(44, 'Duelista', 'Durante uma Cena de Duelo de Vontades, ao atingir o Ultimato, o dano armado recebe +1D.', NULL, 'Aptidão', 'NdP 4'),
(45, 'Corpo Resistente', 'Tu ganhas 5 de resistência a dano.', NULL, 'Aptidão', 'NdP 5'),
(46, 'Contra-Ataque Atrelado', 'Ao esquivar/bloquear, caso obtenhas um sucesso com uma diferença de +4 contra o teste inimigo realizarás um contra-ataque como ação livre.', NULL, 'Aptidão', 'NdP 6'),
(47, 'Adaptação', 'Se um inimigo atacar-te duas vezes seguidas terás +2 na reação do segundo ataque, o efeito amplia caso os ataques continuem, sempre com +2 e mesmo que o ataque não acerte. O efeito reinicia assim que a sequência for quebrada.', NULL, 'Aptidão', 'NdP 6'),
(48, 'Defesa Poderosa', 'Tu passas a adicionar o teu Mod. de FOR na tua DEF', NULL, 'Aptidão', 'NdP 6'),
(49, 'Tocar na Alma', 'Tu passas a ter uma leve visão das almas, conseguindo senti-las, conseguindo toca-las. Ao atacar um ser, podes escolher acertar a alma e não o corpo, apenas causando metade mas mudando o tipo de dano para *Espiritual*(não se aplica a magias).', NULL, 'Aptidão', 'NdP 6'),
(50, 'Ataque Rutura', 'Inimigos têm a sua resistência cortada pela metade contra os teus ataques.', NULL, 'Aptidão', 'NdP 6'),
(51, 'Revelar Caráter', 'O ser revela o seu verdadeiro Eu, uma expressão forçada da sua própria alma toma controle do ser, presenteando-o com o seu verdadeiro nome e a força que esse nome porta. Ao ativar, o ser ganha 3 pontos extra pra distribuir entre os seus atributos, 3 poderes/magias novas e 30 pontos para recuperar em status(podendo ultrapassar o máximo)(tanto os pontos quanto os poderes e os status obtidos são definidos ao aprender esta habilidade e nunca mudam). Enquanto ativo, o ser perderá 6 de SAN por rodada, esta SAN só pode ser recuperada depois de 3 cenas. Pode ser desativado a qualquer momento, ao desativar, todos os efeitos são perdidos.', NULL, 'Aptidão', 'NdP 6'),
(52, 'Resistência Aprimorada', 'A resistência para dano da tua essência assimilada aumenta para 10', NULL, 'Assimilação', NULL),
(53, 'Bruxaria Aprimorada', 'O bônus no teste para realizar magias da tua essência assimilada aumenta para +4', NULL, 'Assimilação', NULL),
(54, 'Defesa Aprimorada', 'O bônus no teste para resistir a magias da tua essência assimilada aumenta para +4', NULL, 'Assimilação', NULL),
(55, 'Transmutação', 'Escolhe uma magia que possuas, a essência da magia muda para a tua essência (Se a magia der dano de essência, o dano também muda para o da tua essência).', NULL, 'Assimilação', NULL),
(56, 'Aura Invasiva', 'Qualquer ataque físico feito por ti tem o seu tipo de dano alterado para o dano da tua essência.', NULL, 'Assimilação', NULL),
(57, 'Manifestar Essência', 'A tua presença é imbuída com a tua essência, denunciando-a aos teus inimigos. Qualquer ataque teu que cause o dano da tua essência tem +2 no teste.', NULL, 'Assimilação', NULL),
(58, 'Pele Armadurada', 'A tua pele torna-se espessa, mais resistente a danos, +2 de DEF.', 'Carniça', 'Assimilação', NULL),
(59, 'Células Vivas', 'As tuas células passam a agir como se tivessem consciência própria, tendo um foco em manterem-se vivas, a tua regeneração fica mais rápida, +1D de PVs recuperados ao descansar.', 'Carniça', 'Assimilação', NULL),
(60, 'Contra Medida', 'O teu corpo cria um reforço, reforço que só ativa quando te encontras mais fraco que o habitual, ao adquirir um estado, +2 em todos os testes até perder o estado (não acumula consigo mesmo).', 'Carniça', 'Assimilação', NULL),
(61, 'Exterior Volátil', 'O teu corpo passa a estar coberto de uma fina camada de carga elétrica, carga essa que repele aqueles que a tocam, ao sofrer um ataque físico, o atacante sofre 1d8 de dano elétrico.', 'Energia', 'Assimilação', NULL),
(62, 'Extração Vital', 'Após acertar um crítico, recuperas 1/3 do dano causado como PdTs.', 'Energia', 'Assimilação', NULL),
(63, 'Sobrecarga', 'A cada magia de Energia que realizares acumulas 1 carga. Ao atingir 3, libertas automaticamente uma explosão que causa dano a todos em alcance curto, causando 1d10+5 de dano de Energia.', 'Energia', 'Assimilação', NULL),
(64, 'Transferência Vital', 'Uma vez por rodada, podes roubar um estado a um aliado, trocando as suas dores com o bem-estar do teu corpo (não funciona com A Falecer ou A Enlouquecer).', 'Energia', 'Assimilação', NULL),
(65, 'Rutura de Limite', 'Podes usar habilidades mesmo com PdT a 0, entrando em dívida. Cada PdT negativo custa-te 2 de PV.', 'Energia', 'Assimilação', 'NdP 5'),
(66, 'Carga Total', 'Se tiveres os PdT cheios, a primeira Magia de Energia que realizares causa +2D de cura/dano.', 'Energia', 'Assimilação', 'NdP 5'),
(67, 'Descarga', 'Ao desacordares, recebes uma descarga que acelera o teu sistema cardiovascular e a adrenalina. Ganhas imunidade aos estados Desacordado e Atordoado.', 'Energia', 'Assimilação', 'NdP 5'),
(68, 'Fogo Vivo', 'Ganhas imunidade a dano incendiário.', 'Energia', 'Assimilação', 'NdP 6'),
(69, 'Aposta', 'Uma vez por cena, ao fazer um teste, ao invés de girar os dados normais, diz um número de 1 a 10 e gira 1d10, se calhar o número que disseste, tu passas o teste.', 'Caos', 'Assimilação', NULL),
(70, 'Falha Proveitosa', 'Ao errar uma Magia, poderás desviá-la para outro inimigo e refazer o teste.', 'Caos', 'Assimilação', NULL),
(71, 'Apesar de Tudo', 'Crer, mesmo quando tem tudo pra dar errado. Se obtiveres um sucesso em testes de ataque com condições negativas (desvantagem ou -4, etc…) ganhas um bónus de +2d10 de dano de Caos.', 'Caos', 'Assimilação', NULL),
(72, 'Os Últimos Serão Primeiros', 'Em testes de Iniciativa, agora, se fores o último colocado, tornaste o primeiro a agir.', 'Caos', 'Assimilação', NULL),
(73, 'Surpresa!', 'Uma vez por cena, ao acertar um ataque com sucesso, podes forçar o teste a um crítico, independentemente do teste. O dano que for realizado no inimigo será também realizado em ti.', 'Caos', 'Assimilação', 'NdP 5'),
(74, 'Mente Fragmentada', 'Ganhas resistência a dano mental, mas no início de cada batalha, a tua primeira ação padrão vai ser completamente aleatória.', 'Caos', 'Assimilação', 'NdP 5'),
(75, 'Instabilidade', 'Quantas mais rodadas um combate durar, maior a tua chance de acertar um ataque. Primeira rodada seria +1, e assim por diante.', 'Caos', 'Assimilação', 'NdP 5'),
(76, 'Leitura de Padrões', 'Se gastares um turno para observares um inimigo, estritamente sem o atacar durante esse tempo, passas a saber exatamente qual será a próxima ação dele.', 'Sabedoria', 'Assimilação', NULL),
(77, 'Estratégia', 'Qualquer ataque que realizes num combate sem ser um golpe da tua arma ou uma Magia/Poder, ou seja, uma ideia improvisada, terá +4 no teste.', 'Sabedoria', 'Assimilação', NULL),
(78, 'Declarar', 'A fim de confundir o inimigo, ao declarares a tua ação terás +2 no teste, no entanto se for um teste contra esse mesmo inimigo, ele já estará avisado da ação.', 'Sabedoria', 'Assimilação', NULL),
(79, 'Ponto Fraco', 'Com a tua visão atenta, ao acertares um segundo ataque seguido no mesmo inimigo, acertarás no ponto fraco do teu oponente, causando +2d8 de dano.', 'Sabedoria', 'Assimilação', NULL),
(80, 'Mente Encorpada', 'O teu cérebro deixa de ser um ponto vital, és capaz de mover o corpo mesmo com a cabeça decepada. És imune a estrangulamento.', 'Sabedoria', 'Assimilação', 'NdP 5'),
(81, 'Memória Perfeita', 'Uma vez por batalha, podes “guardar” o resultado de um dado que rolaste e reutilizar novamente e unicamente num teste futuro. O valor que for guardado não pode ser alterado até ser usado.', 'Sabedoria', 'Assimilação', 'NdP 5'),
(82, 'O Justo', 'O teu corpo cobre-se em sigilos rosa sempre que és Flankeado ou atacado de surpresa, danificando a arma (ou membro) do agressor instantaneamente para equilibrar a tua justiça. Se danificar uma arma, a arma causará -1D de dano até ser polida, se danificar um membro do inimigo, ele ganha o estado Fraturado nesse membro.', 'Sabedoria', 'Assimilação', 'NdP 6'),
(83, 'Zona da Razão', 'Ao atacarem-te corpo-a-corpo, seja com arma ou não, inimigos têm de impor-se contra a tua barreira de lógica para te acertarem, obrigando a um teste de INT em vez de FOR ou AGI. Caso optem por atacar sem INT, o conhecimento os castigará com 2d8 de dano de Sabedoria.', 'Sabedoria', 'Assimilação', 'NdP 6'),
(84, 'Visão Noturna', 'Tu passas a conseguir ver no escuro, ganhas imunidade aos efeitos de *Penumbra Total* e *Parcial*.', 'Obscuro', 'Assimilação', NULL),
(85, 'Silêncio', 'Tudo que fazes é constantemente silencioso, +2 em testes de furtividade.', 'Obscuro', 'Assimilação', NULL),
(86, 'Ser de Sombras', 'No início de cada batalha, independentemente se tiveres furtivo ou não, tu não te revelas até realizares o teu primeiro ataque. Inimigos apenas vêm-te antes disso se passarem um teste de Perceção(CAR)(RN : 8 + teste teu de CAR).', 'Obscuro', 'Assimilação', NULL),
(87, 'Indiferença', 'Se um inimigo acertar um ataque em ti e não causar nenhum dano, recuperas +1d10+4 de PdT.', 'Obscuro', 'Assimilação', NULL),
(88, 'Vácuo Vocal', 'Ao acertares um inimigo, podes roubar a voz dele, podendo imita-la perfeitamente e tornando o alvo mudo até ele te acertar, onde recuperará a sua voz. Enquanto possuírem a voz do inimigo, não poderás usar a tua.', 'Obscuro', 'Assimilação', 'NdP 5'),
(89, 'Necrose', 'Ao desacordares, a falta da tua consciência é preenchida pelo Obscuro. Continuarás a agir normalmente, durante este estado, que não pode ser induzido, ganhas imunidade a dano físico, sendo impossível sentires dor, mas após 2 rodadas és obrigado a acordar, com a chance da essência apoderar-se do teu corpo.', 'Obscuro', 'Assimilação', 'NdP 5'),
(90, 'Fim da Linha', 'Ao finalizar a vida de um ser, recuperas +2d8+2 de PVs.', 'Tempo', 'Assimilação', NULL),
(91, 'Hora Final', 'Golpes teus são acelerados contra inimigos que estejam próximos do fim. +2 em testes de ataque contra inimigos abaixo da metade dos PVs totais.', 'Tempo', 'Assimilação', NULL),
(92, 'Saltar', 'Uma vez por cena, efeitos e estados temporários negativos podem ser saltados para ocorrerem apenas uma única vez.', 'Tempo', 'Assimilação', NULL),
(93, 'Tempo Extra', 'Em Cenas de Investigação, o tempo desacelera, permitindo uma abordagem mais meticulosa da cena. +2 em qualquer teste investigativo.', 'Tempo', 'Assimilação', NULL),
(94, 'Intervalos', 'Durante qualquer teste de CON, consegues congelar o tempo por um breve momento, recuperando o fôlego, ganhando +2 no teste.', 'Tempo', 'Assimilação', NULL),
(95, 'Barreira Anacrónica', 'Tu ganhas uma aura especial a teu redor que desacelera aquilo que se aproxima, tu ganhas +4 de DEF.', 'Tempo', 'Assimilação', 'NdP 5'),
(96, 'Afiação Perpétua', 'As armas que portas são aceleradas, estando sempre prontas para combate e mais fortes que armas comuns, no entanto, estas armas adquirem ferrugem e desgastam mais rapidamente. As tuas armas causam +1D de dano, porém, na 6ª batalha onde a arma é usada, ela perde 2/3 do seu dano permanentemente.', 'Tempo', 'Assimilação', 'NdP 5'),
(97, 'Ambição', 'A tua vontade pelo sucesso aumenta a um ponto impossível, criando uma aura dourada especial, como se a tua determinação moldasse a realidade a teu favor. Uma vez por cena, tu ignoras um teste falho, sucedendo nesse teste ao invés disso.', 'Apostasia', 'Assimilação', NULL),
(98, 'Vontade Suprassuma', 'A tua vontade de interferir toma controle, uma vez por cena, tu podes escolher usar 1 ação no turno doutro ser.', 'Apostasia', 'Assimilação', NULL),
(99, 'Última Lembrança', 'Ao portar um objeto por muito tempo(mínimo 5 cenas), é possível declará-lo como um totem de sorte, com o qual o personagem poderá atrelar e masterizar a sua utilidade. A tua vontade pode ser abaixar o crítico de uma arma, aumentar seu alcance, aumentar 1D de dano, impor uma propriedade customizada ou reduzir a necessidade de duas mãos. A perda de um objeto querido causará dano Mental.', 'Apostasia', 'Assimilação', NULL),
(100, 'Palavra Profética', 'A tua vontade é manifestada pelo discurso poderoso da tua fala. Uma vez por cena, os aliados que ouvirem tua palavra terão +x (x = 6 a dividir pelo número de alvos Ex: 3 aliados=6/3=2) no próximo teste.', 'Apostasia', 'Assimilação', NULL),
(101, 'Importância', 'A tua vontade é o que te trouxe até aqui, não morrerás, não hoje. Ao chegar a menos de 1/4 da vida máxima, o personagem causará dano a dobrar.', 'Apostasia', 'Assimilação', NULL),
(102, 'Presença de Êxtase', 'A tua existência impõe hesitação. Inimigos que iniciem o turno contra ti ou ataquem-te de surpresa terão -4 nos seus testes. Criaturas muito mais fracas que tu escolherão não agir agressivamente contra ti.', 'Apostasia', 'Assimilação', NULL),
(103, 'Cicatrizes de Batalha', 'Pelas cicatrizes que adquiriste aprendeste uma valiosa lição. Sempre que realizarem um ataque semelhante ao que outra hora feriu-te profundamente terás uma vantagem na reação. Uma cicatriz só considera-se quando um ataque retira mais de metade da vida ou impõem o efeito de A Falecer em ti.', 'Apostasia', 'Assimilação', NULL),
(104, 'Repulsor', 'A tua vontade é desgostosa para criaturas. É possível, uma vez por cena, chamar a atenção de uma criatura e forçá-la a te atacar, independente do que esta esteja a fazer.', 'Apostasia', 'Assimilação', NULL),
(105, 'Persistência Rubra', 'Ao chegar a metade dos PVs totais, tu ganhas cura acelerada igual à tua CON', NULL, 'BaseCultista', NULL),
(106, 'Trocar Corpo e Mente', 'Se uma magia/habilidade/aptidão pedir um teste de INT/CAR, podes, ao invés disso, girar CON.', NULL, 'BaseCultista', NULL),
(107, 'Reabastecer', 'Uma vez por cena, podes gastar uma ação padrão para recuperar o teu Mod. de INT como PdTs.', NULL, 'BaseFeiticeiro', NULL),
(108, 'Sono Energético', 'Ao dormir, a quantidade de PdTs recuperados aumenta em 1D.', NULL, 'BaseFeiticeiro', NULL),
(109, 'Espírito de Batalha', 'Lutar é o que faz um Lutador sentir se vivo, a cada luta que passa, o Lutador aprende mais, torna-se mais motivado, ficando cada vez mais forte. Tu ganhas um novo status chamado de: PE(Ponto de Espírito), tu podes gastar esses PE de 3 formas:<br>- 1 PE - Re-rolar um teste<br>- 3 PE - Forçar um inimigo a re-rolar um teste(ficando com o pior resultado)<br>- 5 PE - Passar num teste imediatamente.<br>Tu começas com 3 PE e ganhas 1 a cada batalha vencida', NULL, 'BaseLutador', NULL),
(110, 'Golpe Poderoso', 'Podes adicionar +1d6 ao teu dano, custa 4 PdT por d6, o máximo é 3d6', NULL, 'HabLutador', NULL),
(111, 'Golpe Especial', 'Podes adicionar +1d6 ao teu teste, custa 4 PdT por d6, o máximo é 3d6', NULL, 'HabLutador', NULL),
(112, 'Golpe Pesado', 'Ao gastar 7 PdT tu causas +1D de dano no próximo ataque', NULL, 'HabLutador', NULL),
(113, 'Contra-Ataque Veloz', 'Ao gastar 7 PdT tu podes contra-atacar como ação livre', NULL, 'HabLutador', NULL),
(114, 'Força Devastadora', 'Ao gastar 7 PdT tu adicionas no dano do teu ataque o teu Mod. de FOR x2', NULL, 'HabLutador', NULL),
(115, 'Ataques Seguidos', 'Ao gastar 7 PdT depois de acertar um ataque podes voltar a atacar como ação livre, se acertares esse ataque podes atacar denovo mas desta vez o preço é dobrado.', NULL, 'HabLutador', NULL),
(116, 'Esquiva Aperfeiçoada', 'Quando sofreres um ataque que a esquiva reduz o dano pela metade(como explosões), ao invés disso, se esquivares, evitas o dano por completo.', NULL, 'HabLutador', NULL),
(117, 'Apanhar um Ar', 'Uma vez por cena, tu podes parar para respirar um pouco, assim recuperando xd6 de PVs, x sendo a tua CON.', NULL, 'HabLutador', NULL),
(118, 'Investida Mortal', 'Uma vez por cena, ao gastar 12 PdT, tu fazes a ação completa Investida como uma ação padrão', NULL, 'HabLutador', NULL),
(119, 'Agarrão Veloz', 'Ao acertar um ataque corpo-a-corpo, podes gastar 7 PdT para fazer a ação padrão “Agarrar” como ação livre', NULL, 'HabLutador', NULL),
(120, 'Derrubar Veloz', 'Ao acertar um ataque corpo-a-corpo, podes gastar 6 PdT para fazer a ação padrão Derrubar como ação livre', NULL, 'HabLutador', NULL),
(121, 'Forçar Crítico', 'Ao gastar 14 PdT, o crítico da tua arma diminui pela metade, precisando obter o novo valor em apenas um dos dados do teste para causar um ataque crítico.', NULL, 'HabLutador', NULL),
(122, 'Ataque Debilitante', 'Ao acertar um ataque, podes gastar 8 PdT para deixar o alvo Fraco durante 1 rodada.', NULL, 'HabLutador', NULL),
(123, 'Tontear', 'Tu fazes um ataque especial, tendo o foco de confundir o inimigo. Ao acertar um ataque corpo-a-corpo, podes gastar 10 PdT para forçar o alvo a perder 1 ação padrão no seu próximo turno.', NULL, 'HabLutador', NULL),
(124, 'Provocar', 'Ao gastar 7 PdT, tu fazes uma ação chamativa e insultuosa contra um ser, testes feitos por esse ser que não sejam direcionados contra ti têm -4, dura 1 rodada.', NULL, 'HabLutador', NULL),
(125, 'Casca Grossa', 'Tu ganhas 5 de resistência contra dano cortante, balístico e físico.', NULL, 'HabLutador', NULL),
(126, 'Mente Guardada', 'Tu ganhas resistência a dano mental igual ao teu CARx2', NULL, 'BaseRitualista', NULL),
(127, 'Sono Confortante', 'Ao descansar, a quantidade de SAN recuperados aumenta em 1D.', NULL, 'BaseRitualista', NULL),
(128, 'Especialista em Combate', 'Tu giras testes de Luta com a tua INT.', NULL, 'BaseTécnico', NULL),
(129, 'Especialista em Disparo', 'Tu giras testes de Pontaria com a tua INT.', NULL, 'BaseTécnico', NULL),
(130, 'Especialista em Furtividade', 'Tu tens +2 em testes de Furtividade e, durante uma Cena de Furtividade, podes gastar 7 PdT para diminuir o teu nível de exposição em 1.', NULL, 'BaseTécnico', NULL),
(131, 'Especialista em Medicina', 'Tu tens +2 em testes de Medicina e adicionas a tua INTx2 à cura.', NULL, 'BaseTécnico', NULL),
(132, 'Descobrir Fraqueza', 'Ao gastar 5 PdT para analisar as fraquezas dum inimigo, escolhe um alvo, tu ganhas +4 em testes para atacar o ser durante 1d3 rodadas.', NULL, 'HabTécnico', NULL),
(133, 'Ataque Perspicaz', 'Ao gastar 7 PdT, tu fazes um ataque que impede a reação do oponente, o inimigo não pode esquivar ou bloquear o teu ataque.', NULL, 'HabTécnico', NULL),
(134, 'Interferir', 'Ao gastar 10 PdT, tu interferes na ação de um inimigo, quando um inimigo fizer um teste, tu podes dá-lo desvantagem.', NULL, 'HabTécnico', NULL),
(135, 'Pronto para Agir', 'Tu passas a girar testes de Iniciativa com a tua INT.', NULL, 'HabTécnico', NULL),
(136, 'Troca Veloz', 'Ao ver um aliado a até distância curta de ti ser atacado, podes gastar 8 PdT para rapidamente trocar de lugar com ele, assim sofrendo o dano por ele, tu reduzes o dano pela metade.', NULL, 'HabTécnico', NULL),
(137, 'Análise Prévia', 'Ao gastar 9 PdT, tu analisas os teus arredores, tu +2 em testes de Iniciativa e ficas imune à condição Desprevenido durante 2 rodadas.', NULL, 'HabTécnico', NULL),
(138, 'Apoio Intenso', 'Ao gastar 10 PdT, tu ajudas a ação de um aliado, quando um aliado fizer um teste, tu podes dá-lo vantagem.', NULL, 'HabTécnico', NULL),
(139, 'Defesa Inesperada', 'Quando um aliado a até distância curta de ti for atacado, podes gastar 10 PdT para aumentar a defesa dele em xd4, x sendo a tua INT/2, se o ataque falhar, o aliado ganha um ataque como ação livre contra o atacante.', NULL, 'HabTécnico', NULL),
(140, 'Ataque Duplo', 'Ao gastar 7 PdT, tu atacas duas vezes numa ação padrão.', NULL, 'HabTécnico', NULL),
(141, 'Ataque Furtivo', 'Ao acertar um ataque num ser Desprevenido ou que esteja Flankeado por ti, tu causas +1D de dano.', NULL, 'HabTécnico', NULL),
(142, 'Dor na Vista', 'Ao acertar um ataque, podes gastar 8 PdT para deixar o alvo Ofuscado durante 1 rodada.', NULL, 'HabTécnico', NULL),
(143, 'Mestre do Esconderijo', 'Ao gastar 7 PdT, podes fazer a ação de movimento Esconder-se como ação livre.', NULL, 'HabTécnico', NULL),
(144, 'Arremesso Múltiplo', 'Ao atirar um item, podes gastar 7 PdT para atirar mais 2 itens como ação livre.', NULL, 'HabTécnico', NULL),
(145, 'Ofício Veloz', 'Durante uma Cena de Interlúdio, ao fazer a ação Ofício, consegues criar 1 item extra.', NULL, 'HabTécnico', NULL),
(146, 'Profissional', 'Ao gastar 6 PdT, tu giras +1d8 no próximo teste que realizares.', NULL, 'HabTécnico', NULL),
(147, 'Ordenar', 'Ao gastar 8 PdT, tu gritas uma ordem para um aliado, o aliado gasta uma das tuas ações para realizar a ordem que gritaste.', NULL, 'HabTécnico', NULL),
(148, 'Apoiar e Bater', 'Ao usar a ação padrão Apoiar num aliado, podes gastar 8 PdT para atacar um ser em alcance como ação livre.', NULL, 'HabTécnico', NULL),
(149, 'O que sou?', 'Começas com +1 ponto de Atributo para gastar.', NULL, 'HabOrigem', NULL),
(150, 'Paixão pela Arte', 'Ao fazer a ação Relaxar numa Cena de Interlúdio, se praticares a tua arte, tu recuperas +1D que o normal.', NULL, 'HabOrigem', NULL),
(151, 'Flexível e Resiliente', 'Tu tens +2 em qualquer teste atlético. Durante uma Cena de Perseguição, a vantagem torna-se um bónus de +4 em AGI.', NULL, 'HabOrigem', NULL),
(152, 'Saudade de Casa', 'Ao lembrar de casa, podes perder 3 de SAN em troca de +4 em qualquer teste de FOR ou CON, como um esforço esperançoso de voltar aos tempos antigos.', NULL, 'HabOrigem', NULL),
(153, 'Saber Científico', 'Por causa dos teus estudos, tu ganhaste um grande senso de ciências, +4 em testes de Ciência.', NULL, 'HabOrigem', NULL),
(154, 'Ofício Ilegal', 'Por causa dos teus crimes recorrentes, tu aprendeste a garantir um crime bem sucedido, +4 em testes de Crime.', NULL, 'HabOrigem', NULL),
(155, 'Desenrascar', 'Por causa das tuas condições de vida, tu estás habituado a improvisar, pode gastar 7 PdT para anular uma desvantagem.', NULL, 'HabOrigem', NULL),
(156, 'Perícia Investigativa', 'Tu passaste por um extenso estudo investigativo, +4 em testes de Investigação.', NULL, 'HabOrigem', NULL),
(157, 'Rezar', 'Uma vez por cena, podes gastar uma ação padrão e 7 PdT para rezar para a tua religião, pedindo auxílio divino, tu ganhas +1 em um atributo à tua escolha durante 1d3 rodadas. (Não ultrapassando o limite de 8)', NULL, 'HabOrigem', NULL),
(158, 'Recompensado', 'Sempre recebes o dobro do dinheiro em missões ou trabalhos. Caso não exista sistema de dinheiro, vendedores darão certos pertences de graça ao personagem.', NULL, 'HabOrigem', NULL),
(159, 'Manufaturar', 'Ao decompor 3 armas poderás criar qualquer arma na Lista de Armas. Ao decompor 2 utensílios poderás criar qualquer item na Lista de Utensílios.', NULL, 'HabOrigem', NULL),
(160, 'Aprendizado', 'Por causa das tuas aulas, tu ganhaste conhecimento em diversas áreas, podes gastar 6 PdT para ter +4 em qualquer teste.', NULL, 'HabOrigem', NULL),
(161, 'Conexão Prévia', 'Escolhe uma essência, por causa da exposição constante à Essência, tu começas com uma Magia/Aptidão da Essência escolhida.', NULL, 'HabOrigem', NULL),
(162, 'Presente Hereditário', 'Tu começas com uma Magia extra a tua escolha.', NULL, 'HabOrigem', NULL),
(163, 'Glorioso', 'Se um inimigo impor-te o estado de A Falecer, todos os teu aliados ganham um bónus de X1,5 de dano contra esse inimigo até perderes o estado. Cair em batalha é a maior honra de todas.', NULL, 'HabOrigem', NULL),
(164, 'Sangue é Combustível', 'As tuas placas exteriores naturalmente sugam sangue e reciclam-lo como combustível, ao acertar um ataque armado, tu recuperas 1/3 do dano causado como PVs(não funciona em alvos com o estado Seco).', NULL, 'HabOrigem', NULL),
(165, 'Treino Para Guerra', 'Por causa do teu treino com armas de fogo tu agora consegues disparar com muita precisão, +4 em testes de Pontaria.', NULL, 'HabOrigem', NULL),
(166, 'Treino Policial', 'Depois de passar por diversos treinos, tanto em prática e tanto em ação, tu apuraste as tuas habilidades de autodefesa, +2 em DEF.', NULL, 'HabOrigem', NULL),
(167, 'Boa Lábia', 'Tu já tiveste de mentir ou enganar muitas pessoas pelo que querias, tu tens +4 em testes de Enganação.', NULL, 'HabOrigem', NULL),
(168, 'Acalmar', 'Ao gastar uma ação e 7 PdT tu podes acalmar alguém, a pessoa recupera 2d6 de SAN.', NULL, 'HabOrigem', NULL),
(169, 'Esforço Maníaco', 'Sempre que realizares um esforço extra para cometer um ato grotesco desnecessário, recuperas 2d6 de PdT.', NULL, 'HabOrigem', NULL),
(170, 'Sentidos Aprimorados', 'O constante perigo do teu ambiente fez com que desenvolvesses uma atenção especial aos teus arredores, +4 em testes de Perceção.', NULL, 'HabOrigem', NULL),
(171, 'Predisposição', 'Por causa da tua maior sensibilidade, tens uma melhor noção do Desconhecido, +2 em testes para perceber e compreender o Desconhecido.', NULL, 'HabOrigem', NULL),
(172, 'Alvo Marcado', 'Uma vez por cena, podes escolher um ser para virar o teu alvo, testes contra o teu alvo têm +4, porém testes contra outros seres têm -2, se o teu alvo morrer na mesma cena, tu recuperas 1d12+INTx2 de PdT.', NULL, 'HabOrigem', NULL),
(173, 'Salvação', 'Tens +4 ao socorrer alguém no estado A Falecer. Itens ou feitiços de cura ganham +1D.', NULL, 'HabOrigem', NULL),
(174, 'Ambiente Monstruoso', 'Por teres nascido e crescido no submundo, ver uma criatura não surte tanto efeito em ti, +4 em testes pra resistir a dano mental de criaturas.', NULL, 'HabOrigem', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PoderCustom`
--

DROP TABLE IF EXISTS `PoderCustom`;
CREATE TABLE `PoderCustom` (
  `id` int NOT NULL,
  `idUtilizador` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `efeito` text COLLATE utf8mb4_general_ci NOT NULL,
  `essencia` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `PoderCustom`
--

INSERT INTO `PoderCustom` (`id`, `idUtilizador`, `nome`, `efeito`, `essencia`, `tipo`, `requisitos`) VALUES
(1, 1, 'a', 'a', 'a', 'a', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Sessao`
--

DROP TABLE IF EXISTS `Sessao`;
CREATE TABLE `Sessao` (
  `id` int NOT NULL,
  `idCampanha` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `numEp` int NOT NULL,
  `enredo` text COLLATE utf8mb4_general_ci NOT NULL,
  `notas` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Sessao`
--

INSERT INTO `Sessao` (`id`, `idCampanha`, `nome`, `numEp`, `enredo`, `notas`) VALUES
(1, 1, 'ads', 1, 'adsasdadsadsads', '0'),
(2, 4, 'teste', 1, '0', 'teste'),
(3, 1, 'teste231', 2, '0', ''),
(5, 5, 'a', 2, 'a', 'a'),
(6, 5, 'b', 3, 'b', 'b'),
(7, 5, 'asd', 67, 'a', 'dsa'),
(9, 6, 'sdsasaddsa', 1, 'dsadsadsa', 'dsadsadsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Utilizador`
--

DROP TABLE IF EXISTS `Utilizador`;
CREATE TABLE `Utilizador` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `passe` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Utilizador`
--

INSERT INTO `Utilizador` (`id`, `nome`, `email`, `passe`, `admin`) VALUES
(1, 'aaa', 'a@a', '$2y$10$5hBGnHD7pzHrynYGfpbA/.2smSWhc60E9BJ10D8urdpr8b4u/BLJO', 0),
(3, 'bbb', 'b@b', '$2y$10$wuoc1EPV5GCGibneltG6MuY1IEtpNZf0VypqkUXkZyZkUSBoC/Rcq', 0),
(4, 'eee', 'e@e', '$2y$10$yXsOYLV0I5fJIE9PC6QpaujiH/g6ZRBNUg0pQDxeJNklfqCBDG4Je', 0),
(8, 'CopperTonned_Phantom', 'mastatime48@gmail.com', '$2y$10$WhnADPMjnlycTwKDcvTpZOC68C.mM/QYStyVxGde320drrxSAqHDW', 1),
(9, 'Vasco Matos', 'phknght@gmail.com', '$2y$10$7cd2ukZQ5IdWKIxzpo8Mk.woDJ6HKnCyZ9XvRZAdnJUodq1PkgLw.', 0);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_aptidoes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_aptidoes`;
CREATE TABLE `vw_aptidoes` (
`efeito` text
,`nome` varchar(100)
,`requisitos` text
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_armas`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_armas`;
CREATE TABLE `vw_armas` (
`alcance` varchar(20)
,`critico` varchar(20)
,`dano` varchar(50)
,`modCritico` varchar(20)
,`nome` varchar(100)
,`propriedades` text
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_campanhas_membros`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_campanhas_membros`;
CREATE TABLE `vw_campanhas_membros` (
`descricao` text
,`mestre` tinyint(1)
,`nomeCampanha` varchar(100)
,`nomeUtilizador` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_campanha_membros`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_campanha_membros`;
CREATE TABLE `vw_campanha_membros` (
`descCampanha` text
,`mestre` tinyint(1)
,`nomeCampanha` varchar(100)
,`nomeUtilizador` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_campanha_sessoes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_campanha_sessoes`;
CREATE TABLE `vw_campanha_sessoes` (
`enredo` text
,`nomeCampanha` varchar(100)
,`nomeSessao` varchar(100)
,`numEp` int
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_classes_poderes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_classes_poderes`;
CREATE TABLE `vw_classes_poderes` (
`efeito` text
,`nome` varchar(100)
,`requisitos` text
,`tipo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_criaturas_fichas`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_criaturas_fichas`;
CREATE TABLE `vw_criaturas_fichas` (
`agilidade` int
,`carisma` int
,`constituicao` int
,`danoMental` varchar(40)
,`def` int
,`essencia` varchar(20)
,`essenciaSec1` varchar(20)
,`essenciaSec2` varchar(20)
,`forca` int
,`inteligencia` int
,`nome` varchar(100)
,`nomeFicha` varchar(100)
,`pvMax` int
,`resistencias` text
,`rnMental` int
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_fichas_acoes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_fichas_acoes`;
CREATE TABLE `vw_fichas_acoes` (
`efeito` text
,`NomeAcao` varchar(100)
,`NomeCriatura` varchar(100)
,`NomeFicha` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_fichas_efeitos`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_fichas_efeitos`;
CREATE TABLE `vw_fichas_efeitos` (
`efeito` text
,`NomeCriatura` varchar(100)
,`NomeEfeito` varchar(100)
,`NomeFicha` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_habil_geral`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_habil_geral`;
CREATE TABLE `vw_habil_geral` (
`efeito` text
,`nome` varchar(100)
,`requisitos` text
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_origens_poderes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_origens_poderes`;
CREATE TABLE `vw_origens_poderes` (
`efeito` text
,`nome` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_itens`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_itens`;
CREATE TABLE `vw_personagem_itens` (
`alcance` varchar(20)
,`critico` varchar(20)
,`dano` varchar(50)
,`efeito` text
,`modCritico` varchar(20)
,`nomeItem` varchar(100)
,`personagemNome` varchar(100)
,`propriedades` text
,`quantia` int
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_itens_custom`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_itens_custom`;
CREATE TABLE `vw_personagem_itens_custom` (
`alcance` varchar(20)
,`critico` varchar(20)
,`dano` varchar(50)
,`efeito` text
,`modCritico` varchar(20)
,`nomeItem` varchar(100)
,`personagemNome` varchar(100)
,`propriedades` text
,`quantia` int
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_magias`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_magias`;
CREATE TABLE `vw_personagem_magias` (
`custo` int
,`efeito` text
,`essencia` varchar(20)
,`magiaNome` varchar(200)
,`personagemNome` varchar(100)
,`tempoExec` varchar(50)
,`tipo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_magias_custom`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_magias_custom`;
CREATE TABLE `vw_personagem_magias_custom` (
`custo` int
,`efeito` text
,`essencia` varchar(20)
,`magiaNome` varchar(200)
,`personagemNome` varchar(100)
,`tempoExec` varchar(50)
,`tipo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_poderes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_poderes`;
CREATE TABLE `vw_personagem_poderes` (
`efeito` text
,`essencia` varchar(20)
,`nomePoder` varchar(100)
,`personagemNome` varchar(100)
,`tipo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_personagem_poderes_custom`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_personagem_poderes_custom`;
CREATE TABLE `vw_personagem_poderes_custom` (
`efeito` text
,`essencia` varchar(20)
,`nomePoder` varchar(100)
,`personagemNome` varchar(100)
,`tipo` varchar(20)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_utensilios`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_utensilios`;
CREATE TABLE `vw_utensilios` (
`efeito` text
,`nome` varchar(100)
);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `AcaoCriaturas`
--
ALTER TABLE `AcaoCriaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFichaCriatura` (`idFichaCriatura`);

--
-- Índices para tabela `Campanha`
--
ALTER TABLE `Campanha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Campanha_Utilizador`
--
ALTER TABLE `Campanha_Utilizador`
  ADD KEY `idCampanha` (`idCampanha`,`idUtilizador`);

--
-- Índices para tabela `Criatura`
--
ALTER TABLE `Criatura`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `EfeitoEspecial`
--
ALTER TABLE `EfeitoEspecial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFichaCriatura` (`idFichaCriatura`);

--
-- Índices para tabela `Equipamento`
--
ALTER TABLE `Equipamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `EquipamentoCustom`
--
ALTER TABLE `EquipamentoCustom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Índices para tabela `FichaCriaturas`
--
ALTER TABLE `FichaCriaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCriatura` (`idCriatura`);

--
-- Índices para tabela `Magia`
--
ALTER TABLE `Magia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `MagiaCustom`
--
ALTER TABLE `MagiaCustom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Índices para tabela `Personagem`
--
ALTER TABLE `Personagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Índices para tabela `Perso_Equip`
--
ALTER TABLE `Perso_Equip`
  ADD KEY `idPerso` (`idPerso`,`idEquip`);

--
-- Índices para tabela `Perso_EquipCustom`
--
ALTER TABLE `Perso_EquipCustom`
  ADD KEY `idPerso` (`idPerso`,`idEquipCustom`);

--
-- Índices para tabela `Perso_Magia`
--
ALTER TABLE `Perso_Magia`
  ADD KEY `idPerso` (`idPerso`,`idMagia`);

--
-- Índices para tabela `Perso_MagiaCustom`
--
ALTER TABLE `Perso_MagiaCustom`
  ADD KEY `idPerso` (`idPerso`,`idMagiaCustom`);

--
-- Índices para tabela `Perso_Poder`
--
ALTER TABLE `Perso_Poder`
  ADD KEY `idPerso` (`idPerso`,`idPoder`);

--
-- Índices para tabela `Perso_PoderCustom`
--
ALTER TABLE `Perso_PoderCustom`
  ADD KEY `idPerso` (`idPerso`,`idPoderCustom`);

--
-- Índices para tabela `Poder`
--
ALTER TABLE `Poder`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `PoderCustom`
--
ALTER TABLE `PoderCustom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Índices para tabela `Sessao`
--
ALTER TABLE `Sessao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCampanha` (`idCampanha`);

--
-- Índices para tabela `Utilizador`
--
ALTER TABLE `Utilizador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `AcaoCriaturas`
--
ALTER TABLE `AcaoCriaturas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `Campanha`
--
ALTER TABLE `Campanha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `Criatura`
--
ALTER TABLE `Criatura`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `EfeitoEspecial`
--
ALTER TABLE `EfeitoEspecial`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `Equipamento`
--
ALTER TABLE `Equipamento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `EquipamentoCustom`
--
ALTER TABLE `EquipamentoCustom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `FichaCriaturas`
--
ALTER TABLE `FichaCriaturas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `Magia`
--
ALTER TABLE `Magia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `MagiaCustom`
--
ALTER TABLE `MagiaCustom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `Personagem`
--
ALTER TABLE `Personagem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `Poder`
--
ALTER TABLE `Poder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de tabela `PoderCustom`
--
ALTER TABLE `PoderCustom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Sessao`
--
ALTER TABLE `Sessao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Utilizador`
--
ALTER TABLE `Utilizador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_aptidoes`
--
DROP TABLE IF EXISTS `vw_aptidoes`;

DROP VIEW IF EXISTS `vw_aptidoes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_aptidoes`  AS SELECT `Poder`.`nome` AS `nome`, `Poder`.`efeito` AS `efeito`, `Poder`.`requisitos` AS `requisitos` FROM `Poder` WHERE (`Poder`.`tipo` like 'Aptidão') ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_armas`
--
DROP TABLE IF EXISTS `vw_armas`;

DROP VIEW IF EXISTS `vw_armas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_armas`  AS SELECT `Equipamento`.`nome` AS `nome`, `Equipamento`.`dano` AS `dano`, `Equipamento`.`critico` AS `critico`, `Equipamento`.`modCritico` AS `modCritico`, `Equipamento`.`alcance` AS `alcance`, `Equipamento`.`propriedades` AS `propriedades` FROM `Equipamento` WHERE (`Equipamento`.`tipo` like 'Arma') ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_campanhas_membros`
--
DROP TABLE IF EXISTS `vw_campanhas_membros`;

DROP VIEW IF EXISTS `vw_campanhas_membros`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_campanhas_membros`  AS SELECT `Campanha`.`nome` AS `nomeCampanha`, `Campanha`.`descricao` AS `descricao`, `Utilizador`.`nome` AS `nomeUtilizador`, `Campanha_Utilizador`.`mestre` AS `mestre` FROM ((`Campanha` join `Campanha_Utilizador` on((`Campanha_Utilizador`.`idCampanha` = `Campanha`.`id`))) join `Utilizador` on((`Campanha_Utilizador`.`idUtilizador` = `Utilizador`.`id`))) ORDER BY `Campanha`.`nome` ASC, `Campanha_Utilizador`.`mestre` DESC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_campanha_membros`
--
DROP TABLE IF EXISTS `vw_campanha_membros`;

DROP VIEW IF EXISTS `vw_campanha_membros`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_campanha_membros`  AS SELECT `Campanha`.`nome` AS `nomeCampanha`, `Campanha`.`descricao` AS `descCampanha`, `Utilizador`.`nome` AS `nomeUtilizador`, `Campanha_Utilizador`.`mestre` AS `mestre` FROM ((`Campanha` join `Campanha_Utilizador` on((`Campanha_Utilizador`.`idCampanha` = `Campanha`.`id`))) join `Utilizador` on((`Campanha_Utilizador`.`idUtilizador` = `Utilizador`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_campanha_sessoes`
--
DROP TABLE IF EXISTS `vw_campanha_sessoes`;

DROP VIEW IF EXISTS `vw_campanha_sessoes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_campanha_sessoes`  AS SELECT `Campanha`.`nome` AS `nomeCampanha`, `Sessao`.`nome` AS `nomeSessao`, `Sessao`.`numEp` AS `numEp`, `Sessao`.`enredo` AS `enredo` FROM (`Campanha` join `Sessao` on((`Sessao`.`idCampanha` = `Campanha`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_classes_poderes`
--
DROP TABLE IF EXISTS `vw_classes_poderes`;

DROP VIEW IF EXISTS `vw_classes_poderes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_classes_poderes`  AS SELECT `Poder`.`nome` AS `nome`, `Poder`.`efeito` AS `efeito`, `Poder`.`tipo` AS `tipo`, `Poder`.`requisitos` AS `requisitos` FROM `Poder` WHERE ((`Poder`.`tipo` like 'Base%') OR (`Poder`.`tipo` like 'HabTécnico') OR (`Poder`.`tipo` like 'HabLutador')) ORDER BY `Poder`.`tipo` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_criaturas_fichas`
--
DROP TABLE IF EXISTS `vw_criaturas_fichas`;

DROP VIEW IF EXISTS `vw_criaturas_fichas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_criaturas_fichas`  AS SELECT `Criatura`.`nome` AS `nome`, `Criatura`.`essencia` AS `essencia`, `Criatura`.`essenciaSec1` AS `essenciaSec1`, `Criatura`.`essenciaSec2` AS `essenciaSec2`, `FichaCriaturas`.`nome` AS `nomeFicha`, `FichaCriaturas`.`forca` AS `forca`, `FichaCriaturas`.`agilidade` AS `agilidade`, `FichaCriaturas`.`constituicao` AS `constituicao`, `FichaCriaturas`.`inteligencia` AS `inteligencia`, `FichaCriaturas`.`carisma` AS `carisma`, `FichaCriaturas`.`pvMax` AS `pvMax`, `FichaCriaturas`.`def` AS `def`, `FichaCriaturas`.`resistencias` AS `resistencias`, `FichaCriaturas`.`danoMental` AS `danoMental`, `FichaCriaturas`.`rnMental` AS `rnMental` FROM (`Criatura` join `FichaCriaturas` on((`FichaCriaturas`.`idCriatura` = `Criatura`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_fichas_acoes`
--
DROP TABLE IF EXISTS `vw_fichas_acoes`;

DROP VIEW IF EXISTS `vw_fichas_acoes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_fichas_acoes`  AS SELECT `Criatura`.`nome` AS `NomeCriatura`, `FichaCriaturas`.`nome` AS `NomeFicha`, `AcaoCriaturas`.`nome` AS `NomeAcao`, `AcaoCriaturas`.`efeito` AS `efeito` FROM ((`FichaCriaturas` join `AcaoCriaturas` on((`AcaoCriaturas`.`idFichaCriatura` = `FichaCriaturas`.`id`))) join `Criatura` on((`FichaCriaturas`.`idCriatura` = `Criatura`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_fichas_efeitos`
--
DROP TABLE IF EXISTS `vw_fichas_efeitos`;

DROP VIEW IF EXISTS `vw_fichas_efeitos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_fichas_efeitos`  AS SELECT `Criatura`.`nome` AS `NomeCriatura`, `FichaCriaturas`.`nome` AS `NomeFicha`, `EfeitoEspecial`.`nome` AS `NomeEfeito`, `EfeitoEspecial`.`efeito` AS `efeito` FROM ((`FichaCriaturas` join `EfeitoEspecial` on((`EfeitoEspecial`.`idFichaCriatura` = `FichaCriaturas`.`id`))) join `Criatura` on((`FichaCriaturas`.`idCriatura` = `Criatura`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_habil_geral`
--
DROP TABLE IF EXISTS `vw_habil_geral`;

DROP VIEW IF EXISTS `vw_habil_geral`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_habil_geral`  AS SELECT `Poder`.`nome` AS `nome`, `Poder`.`efeito` AS `efeito`, `Poder`.`requisitos` AS `requisitos` FROM `Poder` WHERE (`Poder`.`tipo` like 'Habilidade Geral') ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_origens_poderes`
--
DROP TABLE IF EXISTS `vw_origens_poderes`;

DROP VIEW IF EXISTS `vw_origens_poderes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_origens_poderes`  AS SELECT `Poder`.`nome` AS `nome`, `Poder`.`efeito` AS `efeito` FROM `Poder` WHERE (`Poder`.`tipo` like 'HabOrigem') ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_itens`
--
DROP TABLE IF EXISTS `vw_personagem_itens`;

DROP VIEW IF EXISTS `vw_personagem_itens`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_itens`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `Perso_Equip`.`quantia` AS `quantia`, `Equipamento`.`nome` AS `nomeItem`, `Equipamento`.`dano` AS `dano`, `Equipamento`.`critico` AS `critico`, `Equipamento`.`modCritico` AS `modCritico`, `Equipamento`.`alcance` AS `alcance`, `Equipamento`.`propriedades` AS `propriedades`, `Equipamento`.`efeito` AS `efeito` FROM ((`Personagem` join `Perso_Equip` on((`Perso_Equip`.`idPerso` = `Personagem`.`id`))) join `Equipamento` on((`Equipamento`.`id` = `Perso_Equip`.`idEquip`))) ORDER BY `Personagem`.`id` ASC, `Equipamento`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_itens_custom`
--
DROP TABLE IF EXISTS `vw_personagem_itens_custom`;

DROP VIEW IF EXISTS `vw_personagem_itens_custom`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_itens_custom`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `Perso_EquipCustom`.`quantia` AS `quantia`, `EquipamentoCustom`.`nome` AS `nomeItem`, `EquipamentoCustom`.`dano` AS `dano`, `EquipamentoCustom`.`critico` AS `critico`, `EquipamentoCustom`.`modCritico` AS `modCritico`, `EquipamentoCustom`.`alcance` AS `alcance`, `EquipamentoCustom`.`propriedades` AS `propriedades`, `EquipamentoCustom`.`efeito` AS `efeito` FROM ((`Personagem` join `Perso_EquipCustom` on((`Perso_EquipCustom`.`idPerso` = `Personagem`.`id`))) join `EquipamentoCustom` on((`EquipamentoCustom`.`id` = `Perso_EquipCustom`.`idEquipCustom`))) ORDER BY `Personagem`.`id` ASC, `EquipamentoCustom`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_magias`
--
DROP TABLE IF EXISTS `vw_personagem_magias`;

DROP VIEW IF EXISTS `vw_personagem_magias`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_magias`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `Magia`.`nome` AS `magiaNome`, `Magia`.`essencia` AS `essencia`, `Magia`.`tempoExec` AS `tempoExec`, `Magia`.`custo` AS `custo`, `Magia`.`efeito` AS `efeito`, `Perso_Magia`.`tipo` AS `tipo` FROM ((`Personagem` join `Perso_Magia` on((`Perso_Magia`.`idPerso` = `Personagem`.`id`))) join `Magia` on((`Magia`.`id` = `Perso_Magia`.`idMagia`))) ORDER BY `Personagem`.`id` ASC, `Magia`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_magias_custom`
--
DROP TABLE IF EXISTS `vw_personagem_magias_custom`;

DROP VIEW IF EXISTS `vw_personagem_magias_custom`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_magias_custom`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `MagiaCustom`.`nome` AS `magiaNome`, `MagiaCustom`.`essencia` AS `essencia`, `MagiaCustom`.`tempoExec` AS `tempoExec`, `MagiaCustom`.`custo` AS `custo`, `MagiaCustom`.`efeito` AS `efeito`, `Perso_MagiaCustom`.`tipo` AS `tipo` FROM ((`Personagem` join `Perso_MagiaCustom` on((`Perso_MagiaCustom`.`idPerso` = `Personagem`.`id`))) join `MagiaCustom` on((`MagiaCustom`.`id` = `Perso_MagiaCustom`.`idMagiaCustom`))) ORDER BY `Personagem`.`id` ASC, `MagiaCustom`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_poderes`
--
DROP TABLE IF EXISTS `vw_personagem_poderes`;

DROP VIEW IF EXISTS `vw_personagem_poderes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_poderes`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `Poder`.`nome` AS `nomePoder`, `Poder`.`efeito` AS `efeito`, `Poder`.`essencia` AS `essencia`, `Poder`.`tipo` AS `tipo` FROM ((`Personagem` join `Perso_Poder` on((`Perso_Poder`.`idPerso` = `Personagem`.`id`))) join `Poder` on((`Poder`.`id` = `Perso_Poder`.`idPoder`))) ORDER BY `Personagem`.`id` ASC, `Poder`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_personagem_poderes_custom`
--
DROP TABLE IF EXISTS `vw_personagem_poderes_custom`;

DROP VIEW IF EXISTS `vw_personagem_poderes_custom`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_personagem_poderes_custom`  AS SELECT `Personagem`.`nome` AS `personagemNome`, `PoderCustom`.`nome` AS `nomePoder`, `PoderCustom`.`efeito` AS `efeito`, `PoderCustom`.`essencia` AS `essencia`, `PoderCustom`.`tipo` AS `tipo` FROM ((`Personagem` join `Perso_PoderCustom` on((`Perso_PoderCustom`.`idPerso` = `Personagem`.`id`))) join `PoderCustom` on((`PoderCustom`.`id` = `Perso_PoderCustom`.`idPoderCustom`))) ORDER BY `Personagem`.`id` ASC, `PoderCustom`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_utensilios`
--
DROP TABLE IF EXISTS `vw_utensilios`;

DROP VIEW IF EXISTS `vw_utensilios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`appuser`@`%` SQL SECURITY DEFINER VIEW `vw_utensilios`  AS SELECT `Equipamento`.`nome` AS `nome`, `Equipamento`.`efeito` AS `efeito` FROM `Equipamento` WHERE (`Equipamento`.`tipo` like 'Utensílio') ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
