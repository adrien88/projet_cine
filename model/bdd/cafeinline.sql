-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 23 Janvier 2019 à 21:21
-- Version du serveur :  10.1.34-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cafeinline`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurfilms`
--

CREATE TABLE `acteurfilms` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `acteurs` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acteurfilms`
--

INSERT INTO `acteurfilms` (`id`, `acteurs`) VALUES
(1, 'George Clooney'),
(2, 'Ewan McGregor'),
(3, 'Jeff Bridges'),
(4, 'Kevin Spacey'),
(5, 'Ryan Gosling'),
(6, 'Carey Mulligan'),
(7, 'Bryan Cranston'),
(8, 'Matthew McConaughey'),
(9, 'Anne Hathaway'),
(10, 'Michael Caine'),
(11, 'Bruce Willis'),
(12, 'Milla Jovovich'),
(13, 'Viggo Mortensen'),
(14, 'Orlando Bloom'),
(15, 'Ian McKellen'),
(16, 'Mark Hamill'),
(17, 'Harrison Ford'),
(18, 'Carrie Fisher'),
(19, 'James McAvoy'),
(20, 'Sandra Bullock'),
(21, 'Trevante Rhodes'),
(22, 'Sarah Paulson'),
(23, 'Andrea Santamaria'),
(24, 'Ary Abittan'),
(25, 'François-Xavier Demaison'),
(26, 'Jack Nicholson'),
(27, 'Shelley Duvall'),
(28, 'Danny LLoyd'),
(29, 'Michael Berryman'),
(30, 'Dean R. Brooks'),
(31, 'Jack Nicholson'),
(32, 'Brad Pitt'),
(33, 'Mélanie Laurent'),
(34, 'Christoph Waltz'),
(35, 'John Malkovitch'),
(36, 'John Cusack'),
(37, 'Catherine Keener'),
(38, 'Orson Bean'),
(39, 'Jonny Lee Miller'),
(40, 'Angelina Jolie'),
(41, 'Leonardo DiCaprio'),
(42, 'Ellen Page'),
(43, 'Michael Caine'),
(44, 'Marion Cotillard'),
(45, 'Joseph Gordon-Levitt'),
(46, 'Tom Hardy'),
(47, 'Ryan Reynolds'),
(48, 'Gemma Arterton'),
(49, 'Anna Kendrick'),
(50, 'Jacki Weaver'),
(51, 'Keir Dullea'),
(52, 'Gary Lockwood'),
(53, ' William Sylvester'),
(54, 'Stephane Bak'),
(55, 'Camelia Jordana'),
(56, ' Olivier Giroud'),
(57, 'Ryan Gosling'),
(58, 'Harrison Ford'),
(59, 'Jared Leto'),
(60, 'Tom Hanks'),
(61, 'Michael Clarke Duncan'),
(62, 'Morgan Freeman'),
(63, 'Tim Robbins'),
(64, 'Johnny Depp'),
(65, 'Vincent Cassel'),
(66, 'Tchéki Karyo'),
(67, 'Monica Bellucci');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(250) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `genre` varchar(250) NOT NULL,
  `description` text,
  `realisateurs` varchar(250) NOT NULL,
  `acteurs` text,
  `nom` varchar(250) NOT NULL,
  `affiches` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `annee`, `genre`, `description`, `realisateurs`, `acteurs`, `nom`, `affiches`) VALUES
(1, 'Les chèvres du pentagone', 2010, 'comédie', 'Bob Wilton, un journaliste désespéré fait l\'heureuse rencontre de Lyn Cassady, un soldat aux pouvoirs paranormaux combattant le terrorisme. Ils se rendent ensemble en Irak ou ils rencontrent Bill Django, le fondateur de l\'unité, et Larry Hooper, soldat de l\'unité qui dirige une prison', 'Grant Heslov', 'George Clooney, Ewan McGregor, Jeff Bridges, Kevin Spacey', 'youness', 'chevres'),
(2, 'Drive ', 2011, 'action', 'Un jeune homme solitaire, The Driver, conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n’a pris part aux crimes de ses employeurs autrement qu’en conduisant - et au volant, il est le meilleur !\r\nShannon, le manager qui lui décroche tous ses contrats, propose à Bernie Rose, un malfrat notoire, d’investir dans un véhicule pour que son poulain puisse affronter les circuits de stock-car professionnels. Celui-ci accepte mais impose son associé, Nino, dans le projet.\r\nC’est alors que la route du pilote croise celle d’Irene et de son jeune fils. Pour la première fois de sa vie, il n’est plus seul.\r\nLorsque le mari d’Irene sort de prison et se retrouve enrôlé de force dans un braquage pour s’acquitter d’une dette, il décide pourtant de lui venir en aide. L’expédition tourne mal…\r\nDoublé par ses commanditaires, et obsédé par les risques qui pèsent sur Irene, il n’a dès lors pas d’autre alternative que de les traquer un à un… ', 'Nicolas Winding Refn', 'Ryan Gosling, Carey Mulligan, Bryan Cranston', 'youness', 'drive'),
(4, 'Le 5ème élément', 1997, 'science-fiction', 'The fith element is coming back to save the world !', 'Luc Besson', 'Bruce Willis, Milla Jovovich', 'Adrien', 'le_5eme_element'),
(5, 'Interstellar', 2014, 'science-fiction', 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille recemment decouverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquete des distances astronomiques dans un voyage interstellaire. ', 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Michael Caine', 'Edouard', 'interstellar'),
(6, 'Le retour du roi', 2003, 'aventure', 'Les armees de Sauron ont attaque Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonte d accomplir sa destinee ?', 'Peter Jackson', 'Viggo Mortensen, Orlando Bloom, Ian McKellen', 'Edouard', 'le_retour_du_roi'),
(7, 'L\'empire contre attaque', 1980, 'science-fiction', 'Malgre la destruction de l Etoile Noire, l Empire maintient son emprise sur la galaxie, et poursuit sans relache sa lutte contre lAlliance rebelle. Bases sur la planete glacee de Hoth, les rebelles essuient un assaut des troupes imperiales.', 'Irvin Kershner', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'Edouard', 'empire_contre_attaque'),
(8, 'Split', 2017, 'thriller', 'Kevin a déjà révélé 23 personnalités, avec des attributs physiques différents pour chacune, à sa psychiatre dévouée, la docteure Fletcher, mais l’une d’elles reste enfouie au plus profond de lui. Elle va bientôt se manifester et prendre le pas sur toutes les autres. Poussé à kidnapper trois adolescentes, dont la jeune Casey, aussi déterminée que perspicace, Kevin devient dans son âme et sa chair, le foyer d’une guerre que se livrent ses multiples personnalités, alors que les divisions qui régnaient jusqu’alors dans son subconscient volent en éclats.', 'Night Shyamalan', 'James McAvoy', 'Marie-Ange', 'split'),
(9, 'BirdBox', 2018, 'thriller', 'Alors qu\'une mystérieuse force décime la population mondiale, une seule chose est sûre : ceux qui ont gardé les yeux ouverts ont perdu la vie. Malgré la situation, Malorie trouve l\'amour, l\'espoir et un nouveau départ avant de tout voir s\'envoler. Désormais, elle doit prendre la fuite avec ses deux enfants, suivre une rivière périlleuse jusqu\'au seul endroit où ils peuvent encore se réfugier. Mais pour survivre, ils devront entreprendre ce voyage difficile les yeux bandés.', 'Susanne Bier', ' Sandra Bullock, Trevante Rhodes, Sarah Paulson', 'Marie-Ange', 'birdbox'),
(10, 'Coco', 2017, 'animation', 'Depuis déjà plusieurs générations, la musique est bannie dans la famille de Miguel. Un vrai déchirement pour le jeune garçon dont le rêve ultime est de devenir un musicien aussi accompli que son idole, Ernesto de la Cruz. Bien décidé à prouver son talent, Miguel, par un étrange concours de circonstances, se retrouve propulsé dans un endroit aussi étonnant que coloré : le Pays des Morts. Là, il se lie d’amitié avec Hector, un gentil garçon mais un peu filou sur les bords. Ensemble, ils vont accomplir un voyage extraordinaire qui leur révèlera la véritable histoire qui se cache derrière celle de la famille de Miguel…', 'Lee Unkrich, Adrian Molina', 'Andrea Santamaria, Ary Abittan, François-Xavier Demaison', 'Marie-Ange', 'coco'),
(11, 'The Shinning', 1980, 'horreur', 'Jack Torrance, gardien d un hôtel fermé l hiver, sa femme et son fils Danny s apprêtent à vivre de longs mois de solitude. Danny, qui possède un don de médium, le Shining, est effrayé à l idée d habiter ce lieu', 'Stanley Kubrick', 'Jack Nicholson , Shelley Duvall , Danny LLoyd', 'Lucas', 'shinning'),
(12, 'Vol au dessus d\'un nid de coucou', 1975, 'drame', 'Rebellion dans un hôpital psychiatrique à l instigation d un malade qui se révolte contre la dureté d une infirmière.', 'Milos Forman', 'Michael Berryman, Dean R. Brooks, Jack Nicholson', 'Lucas', 'vol_coucou'),
(13, 'Inglourious Basterds', 2009, 'action', 'Dans la France occupée de 1940, Shosanna Dreyfus assiste à l exécution de sa famille tombée entre les mains du colonel nazi Hans Landa. Shosanna s échappe de justesse et s enfuit à Paris où elle se construit une nouvelle identité en devenant exploitante d une salle de cinéma', 'Quentin Tarantino', ' Brad Pitt, Mélanie Laurent, Christoph Waltz', 'Lucas', 'inglorious_basterds'),
(14, 'Mary & Max', 2009, 'animation', 'Mary, une petite fille australienne de 9 ans écrit une lettre à Max, un juif obèse et autiste de New York.', 'Adam Elliot', '', 'Adrien', 'mary_max'),
(15, 'Dans la peau de John Malkovich', 1999, 'comédie', 'En difficulté financière, le marionettiste Craig Schwartz trouve un job au 7ème étage et demi d\'un building. En classant des dossiers il découvre un passage dérobé et l\'emprunte, ce qui le conduit à l\'intérieur de... John Malkovich !', 'Spike Jonze', 'John Malkovitch, John Cusack, Cameron Diaz, Catherine Keener, Orson Bean', 'Christian', 'john_malkovich'),
(16, 'Hackers', 1995, 'policier', 'Un jeune hacker connu sous le nom de zero cool découvre le virus crée par le responsable informatique d\'une grosse entreprise.', ' Housam boualak', 'Jonny Lee Miller, Angelina Jolie', 'Adrien', 'hackers'),
(17, 'Inception', 2010, 'science-fiction', 'Dans Inception, il est possible d\'explorer le rêve d\'une personne pour y extraire des idées. Cobb, un extracteur d\'idées, entreprend de tenter une \'inception\', à savoir l\'implantation d\'une idée dans l\'esprit de quelqu\'un. La cible est un homme promu PDG suite à la mort de son père, et il faudra implanter l\'idée de démanteler l\'empire industriel dont il vient d\'hériter.', 'Christopher Nolan', 'Leonardo DiCaprio, Ellen Page, Michael Caine, Marion Cotillard, Joseph Gordon-Levitt, Tom Hardy', 'Christian', 'inception'),
(18, 'The Voices', 2014, 'comédie', 'Employé dans une usine de baignoires, Jerry Hickfang tombe amoureux d\'une de ses collègues. Il commence une relation avec elle, mais finit par la tuer accidentellement. Psychotique (plus précisément schizophrène), Jerry croit entendre son chat et son chien lui parler. Il obéit aux conseils de l\'un d\'entre eux et continue à tuer.', 'Marjane Satrapi', 'Ryan Reynolds, Gemma Arterton, Anna Kendrick, Jacki Weaver', 'Christian', 'voices'),
(19, '2001 : L\'odyssée de l\'espace', 1968, 'science-fiction', 'A l\'aube de l\'Humanité, dans le désert africain, une tribu de primates subit les assauts répétés d\'une bande rivale, qui lui dispute un point d\'eau. La découverte d\'un monolithe noir inspire au chef des singes assiégés un geste inédit et décisif. Brandissant un os, il passe à l\'attaque et massacre ses adversaires. Le premier instrument est né. En 2001, quatre millions d\'années plus tard, un vaisseau spatial évolue en orbite lunaire au rythme langoureux du Beau Danube Bleu. A son bord, le Dr. Heywood Floyd enquête secrètement sur la découverte d\'un monolithe noir qui émet d\'étranges signaux vers Jupiter. Dix-huit mois plus tard, les astronautes David Bowman et Frank Poole font route vers Jupiter à bord du Discovery. Les deux hommes vaquent sereinement à leurs tâches quotidiennes sous le contrôle de HAL 9000, un ordinateur exceptionnel doué d\'intelligence et de parole. Cependant, HAL, sans doute plus humain que ses maîtres, commence à donner des signes d\'inquiétude : à quoi rime cette mission et que risque-t-on de découvrir sur Jupiter ?', 'Stanley Kubrick', 'Keir Dullea, Gary Lockwood, William Sylvester', 'Coralie', 'odyssee_espace'),
(20, 'Spider-man : new generation', 2018, 'animation', 'Spider-Man : New Generation suit les aventures de Miles Morales, un adolescent afro-américain et portoricain qui vit à Brooklyn et s’efforce de s’intégrer dans son nouveau collège à Manhattan. Mais la vie de Miles se complique quand il se fait mordre par une araignée radioactive et se découvre des super-pouvoirs : il est désormais capable d’empoisonner ses adversaires, de se camoufler, de coller littéralement aux murs et aux plafonds ; son ouïe est démultipliée... Dans le même temps, le plus redoutable cerveau criminel de la ville, le Caïd, a mis au point un accélérateur de particules nucléaires capable d’ouvrir un portail sur d’autres univers. Son invention va provoquer l’arrivée de plusieurs autres versions de Spider-Man dans le monde de Miles, dont un Peter Parker plus âgé, Spider-Gwen, Spider-Man Noir, Spider-Cochon et Peni Parker, venue d’un dessin animé japonais.', 'Bob Persichetti, Peter Ramsey, Rodney Rothman', 'Stephane Bak, Camelia Jordana, Olivier Giroud', 'Coralie', 'spider_man'),
(21, 'Blade runner 2049', 2017, 'science-fiction', 'En 2049, la société est fragilisée par les nombreuses tensions entre les humains et leurs esclaves créés par bioingénierie. L’officier K est un Blade Runner : il fait partie d’une force d’intervention d’élite chargée de trouver et d’éliminer ceux qui n’obéissent pas aux ordres des humains. Lorsqu’il découvre un secret enfoui depuis longtemps et capable de changer le monde, les plus hautes instances décident que c’est à son tour d’être traqué et éliminé. Son seul espoir est de retrouver Rick Deckard, un ancien Blade Runner qui a disparu depuis des décennies...', 'Denis Villeneuve', 'Ryan Gosling, Harrison Ford, Jared Leto', 'Coralie', 'blade_runner'),
(22, 'La ligne verte', 2000, 'policier', 'Paul Edgecomb, pensionnaire centenaire dune maison de retraite, est hante par ses souvenirs. Gardien-chef du penitencier de Cold Mountain en 1935, il etait charge de veiller au bon deroulement des executions capitales en sefforçant dadoucir les derniers moments des condamnes. Parmi eux se trouvait un colosse du nom de John Coffey. ', 'Franck Darabont', 'Tom Hanks, Michael Clarke Duncan', 'Sandra', 'ligne_verte'),
(23, 'Les évadés', 1995, 'drame', 'En 1947, Andy Dufresne, un jeune banquier, est condamne a la prison a vie pour le meurtre de sa femme et de son amant. Ayant beau clamer son innocence, il est emprisonne à Shawshank, le penitencier le plus severe de l\'Etat du Maine.', 'Franck Darabont', 'Morgan Freeman, Tim Robbins', 'Sandra', 'les_evades'),
(24, 'secret window', 2004, 'thriller', 'Mort Rainey devrait etre devant son ordinateur, a ecrire un autre de ses romans a succes. Mais son divorce le détruit et le prive de toute inspiration. Tout ce qui touche a la rupture devient un veritable cauchemar et sa page reste blanche.', 'David Koepp', 'Johnny Depp', 'Sandra', 'secret_window'),
(25, 'Dobermann', 1996, 'action', 'Le Dobermann et son gang défraient la chronique. Banques, postes, fourgons, tout y passe. Une anthologie du braquage, un best-of du hold-up ! En face d\'eux, un flic quelque peu pourri, qui fait de leur arrestation une affaire personnelle.', 'Jan Kounen', 'Vincent Cassel, Tchéki Karyo, Monica Bellucci', 'Aurélien', 'dobermann');

-- --------------------------------------------------------

--
-- Structure de la table `genrefilms`
--

CREATE TABLE `genrefilms` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `genre` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genrefilms`
--

INSERT INTO `genrefilms` (`id`, `genre`) VALUES
(1, 'thriller'),
(2, 'science-fiction'),
(3, 'comédie'),
(4, 'action'),
(5, 'policier'),
(6, 'aventure'),
(7, 'horreur'),
(8, 'drame'),
(9, 'animation');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acteurfilms`
--
ALTER TABLE `acteurfilms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genrefilms`
--
ALTER TABLE `genrefilms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acteurfilms`
--
ALTER TABLE `acteurfilms`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `genrefilms`
--
ALTER TABLE `genrefilms`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`id`) REFERENCES `acteurfilms` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
