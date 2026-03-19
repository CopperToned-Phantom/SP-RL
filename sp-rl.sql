-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2026 às 13:49
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sp-rl`
--
CREATE DATABASE IF NOT EXISTS `sp-rl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sp-rl`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acaocriaturas`
--

DROP TABLE IF EXISTS `acaocriaturas`;
CREATE TABLE `acaocriaturas` (
  `id` int(11) NOT NULL,
  `idFichaCriatura` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `efeito` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acaocriaturas`
--

INSERT INTO `acaocriaturas` (`id`, `idFichaCriatura`, `nome`, `efeito`) VALUES
(1, 1, 'aaa', 'aaa'),
(2, 1, 'bbb', 'bbb'),
(3, 2, 'ccc', 'ccc'),
(4, 2, 'ddd', 'ddd'),
(5, 3, 'Cortar', 'Tenta cortar um alvo a alcance corpo-a-corpo com a sua espada de fogo, causando 1d8+2 de dano incendiário.'),
(6, 3, 'Atormentar', 'Escolhe um alvo a alcance longo, o alvo começa a ouvir sussurros perturbadores, causando 1d4+4 de dano mental. Um ser que seja reduzido a 0 de SAN desta forma enlouquece imediatamente, virando um devoto insano, tentando fazer com que todos vejam a natureza celeste do Anjo.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha`
--

DROP TABLE IF EXISTS `campanha`;
CREATE TABLE `campanha` (
  `id` int(11) NOT NULL,
  `idMestre` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanha_utilizador`
--

DROP TABLE IF EXISTS `campanha_utilizador`;
CREATE TABLE `campanha_utilizador` (
  `idCampanha` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `criatura`
--

DROP TABLE IF EXISTS `criatura`;
CREATE TABLE `criatura` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `essencia` varchar(20) NOT NULL,
  `essenciaSec1` varchar(20) DEFAULT NULL,
  `essenciaSec2` varchar(20) DEFAULT NULL,
  `nivelDificuldade` int(11) NOT NULL,
  `narracao` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `criatura`
--

INSERT INTO `criatura` (`id`, `nome`, `essencia`, `essenciaSec1`, `essenciaSec2`, `nivelDificuldade`, `narracao`, `descricao`) VALUES
(1, 'Ariete', 'Caos', 'Carnica', NULL, 7, 'a', 'a'),
(2, 'Anjo Erróneo', 'Caos', NULL, NULL, 3, 'Em inúmeras épocas, em inúmeros lugares, independentemente de quem seja ou de onde se encontre, sempre existiram e sempre existirão relatos de milagres e daqueles que os trazem, os Anjos. Mensageiros benevolentes de Deus, supostos seres de pura luz e bondade, sua única função espalhar a grandiosa palavra do Senhor. O que acontece, porém, quando essa imagem é usada para o mal? Quando a mensagem divina é tornada num clamar pelo pecado? Quando o ser que representa a luz é tornado num ser de pura escuridão?\r\nO Caos sempre se aproveitará da imagem dos mitos e religiões, tudo depende de fé, a falta de informação, de certeza, é crucial para o seu funcionamento, e é essa exata falta de certeza que cria dúvidas como as anteriores, e são essas exatas dúvidas que perfeitamente representam aquilo que o Caos adora, que o Caos representa.', 'O Anjo Erróneo é uma manifestação pura da essência de Caos, surgindo quando uma alta quantia de aura de Caos se mistura, comprimindo-se tanto que origina um ser puro, uma representação física do básico da própria essência. \r\nO Anjo Erróneo costuma tomar a forma dum anjo estereotipado, possuindo uma aparência humana, geralmente masculina, jovem e alta, com traços suaves e um semblante gentil e dócil, olhos claros, pele clara com rubor vermelho, longos cabelos louros encaracolados, largas vestes brancas com um grande pano colorido enrolado em seu corpo, asas brancas, similares às de um pássaro, que saem de suas costas e uma auréola alaranjada.\r\n\r\nO Anjo Erróneo aparenta ter como objetivo principal assassinar o máximo de humanos possíveis, possuindo um escárnio incontrolável pelo Homem e todas as suas criações, vendo as como profanas, indignas da criação de nosso Senhor, fingindo-se de benevolente com o objetivo de punir os tolos que acreditam em si, ganhando a sua confiança, esperando até estarem distraídos, tomando então um formato distorcido e horripilante, invocando sua poderosa espada de labaredas, distribuindo a punição divina que os homens tanto merecem. ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `efeitoespecial`
--

DROP TABLE IF EXISTS `efeitoespecial`;
CREATE TABLE `efeitoespecial` (
  `id` int(11) NOT NULL,
  `idFichaCriatura` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `efeito` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `efeitoespecial`
--

INSERT INTO `efeitoespecial` (`id`, `idFichaCriatura`, `nome`, `efeito`) VALUES
(1, 3, 'Falso Semblante', 'Ao sentir-se ameaçado, revela a sua verdadeira aparência, tomando um formato deformado e assustador. Perdendo *Carisma Natural* e causando dano mental em todos que o virem, além disso ganhando +4 em testes de intimidação e imunidade a *Cegado* e *Amedrontado*.'),
(2, 3, 'Carisma Natural', '+4 em testes de *Diplomacia*, *Enganação* e *Intuição*. Não causa dano mental ao ser visto.'),
(3, 3, 'Lábia Divina', 'Uma vez por cena, pode escolher suceder imediatamente num teste de **CAR**');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

DROP TABLE IF EXISTS `equipamento`;
CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dano` varchar(50) DEFAULT NULL,
  `criticio` int(11) DEFAULT NULL,
  `modCritico` varchar(20) DEFAULT NULL,
  `alcance` varchar(20) DEFAULT NULL,
  `propriedades` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentocustom`
--

DROP TABLE IF EXISTS `equipamentocustom`;
CREATE TABLE `equipamentocustom` (
  `id` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dano` varchar(50) DEFAULT NULL,
  `criticio` int(11) DEFAULT NULL,
  `modCritico` varchar(20) DEFAULT NULL,
  `alcance` varchar(20) DEFAULT NULL,
  `propriedades` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichacriaturas`
--

DROP TABLE IF EXISTS `fichacriaturas`;
CREATE TABLE `fichacriaturas` (
  `id` int(11) NOT NULL,
  `idCriatura` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `forca` int(11) NOT NULL,
  `agilidade` int(11) NOT NULL,
  `constituicao` int(11) NOT NULL,
  `inteligencia` int(11) NOT NULL,
  `carisma` int(11) NOT NULL,
  `pvMax` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `resistencias` text DEFAULT NULL,
  `danoMental` varchar(40) NOT NULL,
  `rnMental` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fichacriaturas`
--

INSERT INTO `fichacriaturas` (`id`, `idCriatura`, `nome`, `forca`, `agilidade`, `constituicao`, `inteligencia`, `carisma`, `pvMax`, `def`, `resistencias`, `danoMental`, `rnMental`) VALUES
(1, 1, 'Corpus', 5, 5, 5, 0, 0, 200, 20, NULL, 'a', 10),
(2, 1, 'Mens', 0, 0, 0, 5, 5, 100, 10, 'a', 'a', 20),
(3, 2, NULL, 0, 3, 0, 3, 3, 62, 18, 'Resistência a dano de Caos\r\nResistência 5 a dano', '1d6+4', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `magia`
--

DROP TABLE IF EXISTS `magia`;
CREATE TABLE `magia` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `essencia` varchar(20) NOT NULL,
  `tempoExec` varchar(50) NOT NULL,
  `custo` int(11) NOT NULL,
  `efeito` text NOT NULL,
  `requisitos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

DROP TABLE IF EXISTS `personagem`;
CREATE TABLE `personagem` (
  `id` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ndp` int(11) NOT NULL,
  `classe` varchar(20) DEFAULT NULL,
  `origem` varchar(50) NOT NULL,
  `notasPlayer` text NOT NULL,
  `forca` int(11) NOT NULL,
  `agilidade` int(11) NOT NULL,
  `constituicao` int(11) NOT NULL,
  `inteligencia` int(11) NOT NULL,
  `carisma` int(11) NOT NULL,
  `resistencias` text DEFAULT NULL,
  `pvMax` int(11) NOT NULL,
  `sanMax` int(11) NOT NULL,
  `pdtMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perso_equip`
--

DROP TABLE IF EXISTS `perso_equip`;
CREATE TABLE `perso_equip` (
  `idPerso` int(11) NOT NULL,
  `idEquip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perso_equipcustom`
--

DROP TABLE IF EXISTS `perso_equipcustom`;
CREATE TABLE `perso_equipcustom` (
  `idPerso` int(11) NOT NULL,
  `idEquipCustom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perso_magia`
--

DROP TABLE IF EXISTS `perso_magia`;
CREATE TABLE `perso_magia` (
  `idPerso` int(11) NOT NULL,
  `idMagia` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perso_poder`
--

DROP TABLE IF EXISTS `perso_poder`;
CREATE TABLE `perso_poder` (
  `idPerso` int(11) NOT NULL,
  `idPoder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `poder`
--

DROP TABLE IF EXISTS `poder`;
CREATE TABLE `poder` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `efeito` text NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `requisitos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

DROP TABLE IF EXISTS `sessao`;
CREATE TABLE `sessao` (
  `id` int(11) NOT NULL,
  `idCampanha` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `numEp` int(11) NOT NULL,
  `enredo` text NOT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_criaturas_fichas`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_criaturas_fichas`;
CREATE TABLE `vw_criaturas_fichas` (
`nome` varchar(100)
,`essencia` varchar(20)
,`essenciaSec1` varchar(20)
,`essenciaSec2` varchar(20)
,`nomeFicha` varchar(100)
,`forca` int(11)
,`agilidade` int(11)
,`constituicao` int(11)
,`inteligencia` int(11)
,`carisma` int(11)
,`pvMax` int(11)
,`def` int(11)
,`resistencias` text
,`danoMental` varchar(40)
,`rnMental` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_fichas_acoes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_fichas_acoes`;
CREATE TABLE `vw_fichas_acoes` (
`NomeCriatura` varchar(100)
,`NomeFicha` varchar(100)
,`NomeAcao` varchar(100)
,`efeito` text
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_fichas_efeitos`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `vw_fichas_efeitos`;
CREATE TABLE `vw_fichas_efeitos` (
`NomeCriatura` varchar(100)
,`NomeFicha` varchar(100)
,`NomeEfeito` varchar(100)
,`efeito` text
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_criaturas_fichas`
--
DROP TABLE IF EXISTS `vw_criaturas_fichas`;

DROP VIEW IF EXISTS `vw_criaturas_fichas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_criaturas_fichas`  AS SELECT `criatura`.`nome` AS `nome`, `criatura`.`essencia` AS `essencia`, `criatura`.`essenciaSec1` AS `essenciaSec1`, `criatura`.`essenciaSec2` AS `essenciaSec2`, `fichacriaturas`.`nome` AS `nomeFicha`, `fichacriaturas`.`forca` AS `forca`, `fichacriaturas`.`agilidade` AS `agilidade`, `fichacriaturas`.`constituicao` AS `constituicao`, `fichacriaturas`.`inteligencia` AS `inteligencia`, `fichacriaturas`.`carisma` AS `carisma`, `fichacriaturas`.`pvMax` AS `pvMax`, `fichacriaturas`.`def` AS `def`, `fichacriaturas`.`resistencias` AS `resistencias`, `fichacriaturas`.`danoMental` AS `danoMental`, `fichacriaturas`.`rnMental` AS `rnMental` FROM (`criatura` join `fichacriaturas` on(`fichacriaturas`.`idCriatura` = `criatura`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_fichas_acoes`
--
DROP TABLE IF EXISTS `vw_fichas_acoes`;

DROP VIEW IF EXISTS `vw_fichas_acoes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_fichas_acoes`  AS SELECT `criatura`.`nome` AS `NomeCriatura`, `fichacriaturas`.`nome` AS `NomeFicha`, `acaocriaturas`.`nome` AS `NomeAcao`, `acaocriaturas`.`efeito` AS `efeito` FROM ((`fichacriaturas` join `acaocriaturas` on(`acaocriaturas`.`idFichaCriatura` = `fichacriaturas`.`id`)) join `criatura` on(`fichacriaturas`.`idCriatura` = `criatura`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_fichas_efeitos`
--
DROP TABLE IF EXISTS `vw_fichas_efeitos`;

DROP VIEW IF EXISTS `vw_fichas_efeitos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_fichas_efeitos`  AS SELECT `criatura`.`nome` AS `NomeCriatura`, `fichacriaturas`.`nome` AS `NomeFicha`, `efeitoespecial`.`nome` AS `NomeEfeito`, `efeitoespecial`.`efeito` AS `efeito` FROM ((`fichacriaturas` join `efeitoespecial` on(`efeitoespecial`.`idFichaCriatura` = `fichacriaturas`.`id`)) join `criatura` on(`fichacriaturas`.`idCriatura` = `criatura`.`id`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acaocriaturas`
--
ALTER TABLE `acaocriaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFichaCriatura` (`idFichaCriatura`);

--
-- Índices para tabela `campanha`
--
ALTER TABLE `campanha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `criatura`
--
ALTER TABLE `criatura`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `efeitoespecial`
--
ALTER TABLE `efeitoespecial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFichaCriatura` (`idFichaCriatura`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipamentocustom`
--
ALTER TABLE `equipamentocustom`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fichacriaturas`
--
ALTER TABLE `fichacriaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCriatura` (`idCriatura`);

--
-- Índices para tabela `magia`
--
ALTER TABLE `magia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poder`
--
ALTER TABLE `poder`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acaocriaturas`
--
ALTER TABLE `acaocriaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `campanha`
--
ALTER TABLE `campanha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `criatura`
--
ALTER TABLE `criatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `efeitoespecial`
--
ALTER TABLE `efeitoespecial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipamentocustom`
--
ALTER TABLE `equipamentocustom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fichacriaturas`
--
ALTER TABLE `fichacriaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `magia`
--
ALTER TABLE `magia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `poder`
--
ALTER TABLE `poder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
