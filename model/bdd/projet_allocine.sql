-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 jan. 2019 à 11:06
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_allocine`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(250) NOT NULL,
  `année` int(11) DEFAULT NULL,
  `genre` varchar(250) NOT NULL,
  `description` text,
  `réalisateurs` varchar(250) NOT NULL,
  `acteurs` text,
  `nom` varchar(250) NOT NULL,
  `affiche` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `année`, `genre`, `description`, `réalisateurs`, `acteurs`, `nom`, `affiche`) VALUES
(1, ' Les chèvres du pentagone', 2010, 'Comédie', 'Bob Wilton, un journaliste désespéré fait l\'heureuse rencontre de Lyn Cassady, un soldat aux pouvoirs paranormaux combattant le terrorisme. Ils se rendent ensemble en Irak ou ils rencontrent Bill Django, le fondateur de l\'unité, et Larry Hooper, soldat de l\'unité qui dirige une prison', 'Grant Heslov', 'George Clooney, Ewan McGregor, Jeff Bridges, Kevin Spacey', 'Youness', 'chevres_pentagon.jpg'),
(2, ' Drive ', 2011, 'Action, Thriller', 'Un jeune homme solitaire, The Driver, conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n’a pris part aux crimes de ses employeurs autrement qu’en conduisant - et au volant, il est le meilleur ! Shannon, le manager qui lui décroche tous ses contrats, propose à Bernie Rose, un malfrat notoire, d’investir dans un véhicule pour que son poulain puisse affronter les circuits de stock-car professionnels. Celui-ci accepte mais impose son associé, Nino, dans le projet. C’est alors que la route du pilote croise celle d’Irene et de son jeune fils. Pour la première fois de sa vie, il n’est plus seul. Lorsque le mari d’Irene sort de prison et se retrouve enrôlé de force dans un braquage pour s’acquitter d’une dette, il décide pourtant de lui venir en aide. L’expédition tourne mal… Doublé par ses commanditaires, et obsédé par les risques qui pèsent sur Irene, il n’a dès lors pas d’autre alternative que de les traquer un à un… ', 'Nicolas Winding Refn', 'Ryan Gosling, Carey Mulligan, Bryan Cranston', 'Youness', 'drive.jpg'),
(3, ' Interstellar', 2014, ' Science Fiction, drame', ' Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire. ', ' Christopher Nolan', ' Matthew McConaughey, Anne Hathaway, Michael Caine', 'Youness', 'interstellar.jpg'),
(4, 'Le Cinquième Elément', 1997, 'Science Fiction', 'Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l\'humanité.', 'Luc Besson', 'Bruce Willis, Milla Jovovich', 'Adrien', 'cinquieme_element.jpg'),
(6, 'Le retour du roi', 2003, 'Aventure', 'Les armées de Sauron ont attaqué Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonte d\'accomplir sa destinée ?', 'Peter Jackson', 'Viggo Mortensen, Orlando Bloom, Ian McKellen', 'Edouard', 'retour_roi.jpg'),
(7, 'L\'empire contre attaque', 1980, 'Science Fiction', 'Malgré la destruction de l\'Etoile Noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relache sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales.', 'Irvin Kershner', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'Edouard', 'empire_contre_attaque.jpg'),
(8, 'Split', 2017, 'Thriller', 'Kevin a déjà révélé 23 personnalités, avec des attributs physiques différents pour chacune, à sa psychiatre dévouée, la docteure Fletcher, mais l’une d’elles reste enfouie au plus profond de lui. Elle va bientôt se manifester et prendre le pas sur toutes les autres. Poussé à kidnapper trois adolescentes, dont la jeune Casey, aussi déterminée que perspicace, Kevin devient dans son âme et sa chair, le foyer d’une guerre que se livrent ses multiples personnalités, alors que les divisions qui régnaient jusqu’alors dans son subconscient volent en éclats.', 'Night Shyamalan', 'James McAvoy', 'Marie-Ange', 'split.jpg'),
(9, 'BirdBox', 2018, 'Thriller', 'Alors qu\'une mystérieuse force décime la population mondiale, une seule chose est sûre : ceux qui ont gardé les yeux ouverts ont perdu la vie. Malgré la situation, Malorie trouve l\'amour, l\'espoir et un nouveau départ avant de tout voir s\'envoler. Désormais, elle doit prendre la fuite avec ses deux enfants, suivre une rivière périlleuse jusqu\'au seul endroit où ils peuvent encore se réfugier. Mais pour survivre, ils devront entreprendre ce voyage difficile les yeux bandés.', 'Susanne Bier', ' Sandra Bullock, Trevante Rhodes, Sarah Paulson', 'Marie-Ange', 'birdbox.jpg'),
(10, 'Coco', 2017, 'Animation', 'Depuis déjà plusieurs générations, la musique est bannie dans la famille de Miguel. Un vrai déchirement pour le jeune garçon dont le rêve ultime est de devenir un musicien aussi accompli que son idole, Ernesto de la Cruz. Bien décidé à prouver son talent, Miguel, par un étrange concours de circonstances, se retrouve propulsé dans un endroit aussi étonnant que coloré : le Pays des Morts. Là, il se lie d’amitié avec Hector, un gentil garçon mais un peu filou sur les bords. Ensemble, ils vont accomplir un voyage extraordinaire qui leur révèlera la véritable histoire qui se cache derrière celle de la famille de Miguel…', 'Lee Unkrich, Adrian Molina', 'Andrea Santamaria, Ary Abittan, François-Xavier Demaison', 'Marie-Ange', 'coco.jpg'),
(11, 'The Shinning', 1980, 'Horreur', 'Jack Torrance, gardien d\'un hôtel fermé l\'hiver, sa femme et son fils Danny s\'apprêtent à vivre de longs mois de solitude. Danny, qui possède un don de médium, le Shining, est effrayé à l\'idée d\'habiter ce lieu', 'Stanley Kubrick', 'Jack Nicholson , Shelley Duvall , Danny LLoyd', 'Lucas', 'shining.jpg'),
(12, 'Vol au dessus d\'un nid de coucou', 1975, 'Drame', 'Rebellion dans un hôpital psychiatrique à l\'instigation d un malade qui se révolte contre la dureté d\'une infirmière.', 'Milos Forman', 'Michael Berryman, Dean R. Brooks, Jack Nicholson', 'Lucas', 'vol_coucou.jpg'),
(13, 'Inglourious Basterds', 2009, 'Action', 'Dans la France occupée de 1940, Shosanna Dreyfus assiste à l\'exécution de sa famille tombée entre les mains du colonel nazi Hans Landa. Shosanna s\'échappe de justesse et s\'enfuit à Paris où elle se construit une nouvelle identité en devenant exploitante d\'une salle de cinéma', 'Quentin Tarantino', ' Brad Pitt, Mélanie Laurent, Christoph Waltz', 'Lucas', 'inglorious_basterds.jpg'),
(14, 'Mary & Max', 2009, 'Animation, Pâte à modeler', 'Mary, une petite fille australienne de 9 ans écrit une lettre à Max, un juif obèse et autiste de New York.', 'Adam Elliot', '', 'Adrien', 'mary_max.jpg'),
(15, 'Dans la peau de John Malkovich', 1999, 'Comédie', 'En difficulté financière, le marionettiste Craig Schwartz trouve un job au 7ème étage et demi d\'un building. En classant des dossiers il découvre un passage dérobé et l\'emprunte, ce qui le conduit à l\'intérieur de... John Malkovich !', 'Spike Jonze', 'John Malkovitch, John Cusack, Cameron Diaz, Catherine Keener, Orson Bean', 'Christian', 'john_malkovitch.jpg'),
(16, 'Hackers', 1995, 'Policier', 'Un jeune hacker connu sous le nom de zero cool découvre le virus crée par le responsable informatique d\'une grosse entreprise.', ' Housam boualak', 'Jonny Lee Miller, Angelina Jolie', 'Adrien', 'hacker.jpg'),
(17, 'Inception', 2010, 'Science Fiction', 'Dans Inception, il est possible d\'explorer le rêve d\'une personne pour y extraire des idées. Cobb, un extracteur d\'idées, entreprend de tenter une \'inception\', à savoir l\'implantation d\'une idée dans l\'esprit de quelqu\'un. La cible est un homme promu PDG suite à la mort de son père, et il faudra implanter l\'idée de démanteler l\'empire industriel dont il vient d\'hériter.', 'Christopher Nolan', 'Leonardo DiCaprio, Ellen Page, Michael Caine, Marion Cotillard, Joseph Gordon-Levitt, Tom Hardy', 'Christian', 'inception.jpg'),
(18, 'The Voices', 2014, 'Comédie', 'Employé dans une usine de baignoires, Jerry Hickfang tombe amoureux d\'une de ses collègues. Il commence une relation avec elle, mais finit par la tuer accidentellement. Psychotique (plus précisément schizophrène), Jerry croit entendre son chat et son chien lui parler. Il obéit aux conseils de l\'un d\'entre eux et continue à tuer.', 'Marjane Satrapi', 'Ryan Reynolds, Gemma Arterton, Anna Kendrick, Jacki Weaver', 'Christian', 'voices.jpg'),
(19, '2001 : L\'Odyssée de L\'Espace', 1968, 'Science Fiction', 'A l\'aube de l\'Humanité, dans le désert africain, une tribu de primates subit les assauts répétés d\'une bande rivale, qui lui dispute un point d\'eau. La découverte d\'un monolithe noir inspire au chef des singes assiégés un geste inédit et décisif. Brandissant un os, il passe à l\'attaque et massacre ses adversaires. Le premier instrument est né. En 2001, quatre millions d\'années plus tard, un vaisseau spatial évolue en orbite lunaire au rythme langoureux du Beau Danube Bleu. A son bord, le Dr. Heywood Floyd enquête secrètement sur la découverte d\'un monolithe noir qui émet d\'étranges signaux vers Jupiter. Dix-huit mois plus tard, les astronautes David Bowman et Frank Poole font route vers Jupiter à bord du Discovery. Les deux hommes vaquent sereinement à leurs tâches quotidiennes sous le contrôle de HAL 9000, un ordinateur exceptionnel doué d\'intelligence et de parole. Cependant, HAL, sans doute plus humain que ses maîtres, commence à donner des signes d\'inquiétude : à quoi rime cette mission et que risque-t-on de découvrir sur Jupiter ?', 'Stanley Kubrick', 'Keir Dullea, Gary Lockwood, William Sylvester', 'Coralie', 'odyssee_espace.jpg'),
(20, 'Spider-Man : New Generation', 2018, 'Animation', 'Spider-Man : New Generation suit les aventures de Miles Morales, un adolescent afro-américain et portoricain qui vit à Brooklyn et s’efforce de s’intégrer dans son nouveau collège à Manhattan. Mais la vie de Miles se complique quand il se fait mordre par une araignée radioactive et se découvre des super-pouvoirs : il est désormais capable d’empoisonner ses adversaires, de se camoufler, de coller littéralement aux murs et aux plafonds ; son ouïe est démultipliée... Dans le même temps, le plus redoutable cerveau criminel de la ville, le Caïd, a mis au point un accélérateur de particules nucléaires capable d’ouvrir un portail sur d’autres univers. Son invention va provoquer l’arrivée de plusieurs autres versions de Spider-Man dans le monde de Miles, dont un Peter Parker plus âgé, Spider-Gwen, Spider-Man Noir, Spider-Cochon et Peni Parker, venue d’un dessin animé japonais.', 'Bob Persichetti, Peter Ramsey, Rodney Rothman', 'Stephane Bak, Camelia Jordana, Olivier Giroud', 'Coralie', 'spider_man.jpg'),
(21, 'Blade Runner 2049', 2017, 'Science Fiction', 'En 2049, la société est fragilisée par les nombreuses tensions entre les humains et leurs esclaves créés par bioingénierie. L’officier K est un Blade Runner : il fait partie d’une force d’intervention d’élite chargée de trouver et d’éliminer ceux qui n’obéissent pas aux ordres des humains. Lorsqu’il découvre un secret enfoui depuis longtemps et capable de changer le monde, les plus hautes instances décident que c’est à son tour d’être traqué et éliminé. Son seul espoir est de retrouver Rick Deckard, un ancien Blade Runner qui a disparu depuis des décennies...', 'Denis Villeneuve', 'Ryan Gosling, Harrison Ford, Jared Leto', 'Coralie', 'blade_runner.jpg'),
(22, 'La ligne verte', 2000, 'Policier', 'Paul Edgecomb, pensionnaire centenaire d\'une maison de retraite, est hanté par ses souvenirs. Gardien-chef du pénitencier de Cold Mountain en 1935, il était chargé de veiller au bon déroulement des exécutions capitales en s\'efforçant d\'adoucir les derniers moments des condamnés. Parmi eux se trouvait un colosse du nom de John Coffey. ', 'Franck Darabont', 'Tom Hanks, Michael Clarke Duncan', 'Sandra', 'ligne_verte.jpg'),
(23, 'Les évadés', 1995, 'Drame', 'En 1947, Andy Dufresne, un jeune banquier, est condamné à la prison à vie pour le meurtre de sa femme et de son amant. Ayant beau clamer son innocence, il est emprisonné à Shawshank, le pénitencier le plus sévère de l\'Etat du Maine.', 'Franck Darabont', 'Morgan Freeman, Tim Robbins', 'Sandra', 'evadés.jpg'),
(24, 'Secret Window', 2004, 'Thriller', 'Mort, Rainey devrait être devant son ordinateur, à écrire un autre de ses romans à succès. Mais son divorce le détruit et le prive de toute inspiration. Tout ce qui touche à la rupture devient un véritable cauchemar et sa page reste blanche.', 'David Koepp', 'Johnny Depp', 'Sandra', 'secret_window.jpg'),
(25, 'Dobermann', 1996, 'Action', 'Le Dobermann et son gang défraient la chronique. Banques, postes, fourgons, tout y passe. Une anthologie du braquage, un best-of du hold-up ! En face d\'eux, un flic quelque peu pourri, qui fait de leur arrestation une affaire personnelle.', 'Jan Kounen', 'Vincent Cassel, Tchéki Karyo, Monica Bellucci', 'Aurélien', 'dobermann.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
