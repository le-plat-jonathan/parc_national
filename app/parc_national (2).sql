-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 01 oct. 2024 à 13:36
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc_national`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `bungalow_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bungalow`
--

DROP TABLE IF EXISTS `bungalow`;
CREATE TABLE IF NOT EXISTS `bungalow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `environment`
--

DROP TABLE IF EXISTS `environment`;
CREATE TABLE IF NOT EXISTS `environment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `environment_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `environment`
--

INSERT INTO `environment` (`id`, `environment_name`) VALUES
(1, 'terrestrial_fauna'),
(2, 'marine_fauna'),
(3, 'flora');

-- --------------------------------------------------------

--
-- Structure de la table `natural_ressource`
--

DROP TABLE IF EXISTS `natural_ressource`;
CREATE TABLE IF NOT EXISTS `natural_ressource` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `population` varchar(255) NOT NULL,
  `environment_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `natural_ressource`
--

INSERT INTO `natural_ressource` (`id`, `name`, `description`, `population`, `environment_id`, `img`) VALUES
(1, 'Renard', 'Discret le jour, le renard roux sort au crépuscule.Il délimite son territoire de manière odorante, en laissant ses crottes en évidence à des points de passage. On l’entend parfois glapir, appelant ainsi sa compagne et ses petits. Il se nourrit de rongeurs et de lapins, mais aussi d’insectes, de poissons ou de fruits.C’est un animal qui se distingue par son opportunisme, s’adaptant à des milieux très différents et modifiant son alimentation suivant la période de l\'année.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/renard-mathieu-benquet-parc-national-calanques-marseille-cassis-la-ciotat_0.jpg?itok=0it1MvVe'),
(2, 'Sanglier', 'Mammifère court sur pattes, on reconnait le sanglier à son pelage noir, épais et hirsute et à sa tête triangulaire dotée d’un long museau.C’est un animal omnivore qui a une nette préférence pour les végétaux : glands, racines et bulbes… qu’il ramasse ou déterre dans le sol avec son groin.La femelle peut avoir deux à trois portées par an, avec une moyenne de six petits par portée ! C’est une espèce prolifique dont la population nécessite d’être suivie et contrôlée.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/sanglier-parc-national-calanques-marseille-cassis-la-ciotat.jpg?itok=A9R002M-'),
(3, 'Lapin de Garenne', 'Ce rongeur au pelage gris-brun vit en groupe de deux à dix individus. Le jour, il reste généralement à l’abri dans les galeries et les terriers qu’il creuse, où les femelles mettent bas. Il sort dès la fin de journée pour s’alimenter de végétaux et socialiser avec ses congénères.Au même titre que le rat noir, c’est une espèce invasive dont la prolifération est liée à celle du goéland leucophée, et qui met en péril des espèces protégées telles que les puffins (cendrés, de Méditerranée ou de Scopoli), en détruisant leurs terriers, ce qui provoque l’abandon de la reproduction.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/lapin-de-garenne-jp-durand-parc-national-calanques-marseille-cassis-la-ciotat_0.jpg?itok=laz-soGP'),
(4, 'Rainette méridionale', 'Appréciant les jardins, la rainette méridionale s\'invite souvent en ville, tout près de nous... Et si sa couleur verte la rend discrète dans la végétation, elle sait se faire entendre lors de sa période de reproduction !Elle peut par ailleurs donner de la voix à peu près toute l’année, y compris au cœur de l’hiver s’il fait doux. C’était par exemple le cas en janvier 2020 dans certains quartiers périphériques de Marseille.Cet amphibien rejoint les points d’eau pour se reproduire, mais part à la conquête de vastes territoires le reste du temps, y compris dans des endroits très secs comme les garrigues du Parc national des Calanques, où elle chasse les insectes.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/rainette-meridionale-patrice-d-onoforio-parc-calanques-marseille-cassis-la-ciotat_0.jpg?itok=9iaDwHPM'),
(5, 'Loup', 'La présence du loup est une bonne nouvelle pour la biodiversité. Le loup est un prédateur situé en haut de la chaîne alimentaire, se nourrissant de principalement d’ongulés : chevreuils, sangliers mais aussi de renards, lièvres et autres rongeurs de taille plus réduite…Sa présence est le signe d’une bonne santé des écosystèmes et de leur capacité à produire une ressource alimentaire suffisante.Le loup assure également un rôle sanitaire en éliminant les individus les plus faibles de chaque espèce (animaux malades ou blessés). De manière marginale, le loup peut également être charognard, évitant ainsi la propagation des maladies.En dépit de la forte fréquentation du territoire et de la pression urbaine, la présence d’une espèce territoriale et craintive comme le loup, prouve également que les Calanques sont toujours en capacité de fournir des zones de quiétude propices au développement de la biodiversité.', 'Très faible', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/400400nouveauloup.jpg?itok=4hpFn7EG'),
(6, 'Grand Duc d\'Europe', 'Dans le Parc national, il niche en falaises où la femelle pond chaque année de 1 à 3 œufs. Prédateur opportuniste, il se nourrit de mammifères et d’oiseaux. Il peut vivre jusqu’à 20 ans.Son chant puissant qui résonne l’hiver dans les Calanques, ainsi que les pelotes de restes de proie qu’il rejette depuis ses perchoirs, permettent de déceler sa présence.Sur l\'archipel de Riou, où l\'espèce est représentée par un seul couple, le grand-duc n\'est apparu que depuis les années 1990, probablement favorisé par l\'explosion démographique des goélands leucophée et la prolifération des rats et des lapins, ses trois proies favorites. Il arrive également que ce grand rapace s\'attaque à des espèces rares et menacées comme les puffins.', 'Faible', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/grand-duc-2-claude-agnes-association-la-cheveche.jpg?itok=ESPwXMOc'),
(7, 'Chevreuil', 'Ce cervidé de petite taille arbore un pelage d’été brun roux et gris foncé en hiver.Seul le mâle porte des bois sur la tête, qui tombent chaque année à l’automne. La tâche blanche qu’il porte sur les fesses à la forme d’un cœur chez la femelle et de deux haricots chez le mâle. C’est un herbivore qui se nourrit principalement de jeunes pousses tendres, de glands et de feuilles.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/chevreuil-carpiagne-matthieu-gibert-pnc-calanques-marseille-cassis-la-ciotat_0.jpg?itok=kKXbZ_nR'),
(8, 'Aigle de Bonelli', 'Emblématique du milieu méditerranéen, l’aigle de Bonelli est une espèce en danger et sous haute surveillance.Il vit en couple toute l’année sur le même territoire, et nidifie dans les anfractuosités des falaises rocheuses. La femelle pond un ou deux œufs, et les petits aiglons, nés après un mois et demi d’incubation, seront élevés durant deux mois. Il mesure entre 1,45 et 1,65 mètre d’envergure et la femelle est plus trapue et plus grande que le mâle. Il se nourrit principalement d\'oiseaux, de mammifères et de reptiles.Comme d\'autres espèces l\'aigle de Bonelli est très sensible aux dérangements, notamment au survol motorisé qui n’est pas sans conséquence sur le milieu (troubles dans la période de reproduction, nuisances sonores, etc.)', 'Très faible', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/aigle-bonelli-f-launette-calanques-marseille-cassis-la-ciotat_0.jpg?itok=mC7vNb1K'),
(9, 'Chenille processionnaire du pin', 'Avez-vous déjà remarqué des drôles de nids blancs qui parsèment la cime des pins ?Ce sont des cocons de chenilles processionnaires. Les petites chenilles y grandissent pendant l’hiver et se couvrent de poils urticants pour se protéger des prédateurs. Au printemps, elles quittent le cocon, forment des files indiennes et partent à la recherche d’un endroit où se métamorphoser. Les papillons ne vivent qu’une nuit ou deux, le temps de pondre leurs œufs sur les aiguilles des pins. Un nouveau cycle commence alors.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/chenille-processionnaire-calanques-marseille-cassis-la-ciotat_0.jpg?itok=o0nyrcM8'),
(10, 'Cormoran huppé', 'Le cormoran huppé de Méditerranée est reconnaissable à son plumage noirâtre avec des reflets vert bouteille, son long cou et son bec fin de couleur jaune. Il se distingue du grand cormoran par sa plus petite taille et par la huppe qu’il porte sur le front au printemps, lors de la période de reproduction.Ce nageur hors pair se nourrit de poissons qu’il chasse sous l’eau. Il peut plonger à plus de 30 mètres de profondeur et rester immergé pendant deux minutes ! On l’observe souvent les ailes déployées au soleil en train de faire sécher ses plumes après être allé pêcher.', 'Faible', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/cormoran-huppe-jp-durand-pncal-calanques-marseille-cassis-la-ciotat.jpg?itok=0qxnJzB8'),
(11, 'Le gabian', 'Bien connu des Provençaux, cet oiseau marin côtier est reconnaissable à son manteau gris bleuté, à ses ailes aux extrémités noires et à son corps d’un blanc pur. Il se distingue de son cousin atlantique, le Goéland argenté, par ses pattes et son bec jaune marqué d’un point rouge. Il pèse près d’un kilo et peut mesurer plus d’1 mètre 50 d’envergure.Il est omniprésent sur les îles de Marseille où sa population est passée d’une centaine de couples au début du XXe siècle pour soudainement augmenter dans les années 1960 et atteindre plus de 23 000 couples en 2008 : c’est aujourd’hui la plus grande colonie de reproduction de France.', 'Dense', 1, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/goeland-leucophee-gabian-1-jp-durand-calanques-marseille-cassis-la-ciotat_0.jpg?itok=QG0pyoEp'),
(12, 'Dauphin bleu et blanc', 'Le dauphin bleu et blanc est reconnaissable aux stries noires et aux bandes blanches en forme de flammes qui partent de son œil et qui ornent ses flancs.C’est l’espèce de dauphin la plus commune en Méditerranée où il vit en groupes de quelques dizaines d’individus. Ce dauphin peut atteindre 2 mètres 20 pour un poids allant jusqu’à 100 kilos.Curieux, joueur, il vient volontiers nager dans l’étrave des bateaux.', 'Faible', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/dauphin-bleu-et-blanc-f-larrey-regard-du-vivant_0.jpg?itok=QRA76CdK'),
(13, 'Tortue caouane', 'Elle peut mesurer un mètre et peser 100 kg ! Elle est reconnaissable à sa carapace brun orangé sur le dessus, à sa grosse tête et son cou trapu.Elle se nourrit de petits poissons, mais aussi de mollusques et crustacés, dont elle casse la carapace grâce à sa mâchoire puissante.Les femelles ne pondent que toutes les deux ou trois saisons et rejoignent alors la terre, où elles creusent un trou profond dans le sable pour y déposer les œufs.', 'Faible', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/tortue_caouane_500x500.jpg?itok=_js-OMf-'),
(14, 'Daurade royale', 'Célèbre poisson que l’on retrouve en Méditerranée, en mer Noire et dans l’océan Atlantique, il arbore C’est dans cette zone de brisants qu’on le croise le plus souvent, solitaire ou en petits groupes. Mais il s’aventure parfois jusqu’à 150 mètres sous la surface !Son corps est ovale et mince, et sa mâchoire est bombée. Entre ses yeux se dessine un bandeau doré bordé de noir qui lui a donné son nom, qu’on peut d’ailleurs écrire « dorade ». Une autre tache, plus allongée, se situe au niveau de ses ouïes. On retrouve aussi du noir qui forme un liseré sur les extrémités de ses nageoires caudale et dorsale.', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/daurade-royale-c-parc-national-des-calanques_-_copie.jpg?itok=RIHsvimq'),
(15, 'Girelle', 'Si la femelle est de couleur dominante brune avec une bande blanche sur le flanc, le mâle arbore une robe très colorée, avec un dos vert ou bleu et une bande orangée en zigzag sur les flancs marqué d’une large tache noire.D’une taille maximale de 25 centimètres, c’est un poisson hermaphrodite, qui peut changer de sexe une fois au cours de sa vie, de femelle à mâle. Tous les individus de plus de 18 centimètres sont des mâles.Il vit le plus souvent en grand nombre, à proximité des fonds rocheux ou des herbiers de Posidonie. Lorsqu’il se sent menacé, ou lorsque la température de l’eau est trop basse, il s’enfouit dans le sable pour se protéger.', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/dsc_5341x_o_bianchimani-convention_0.jpg?itok=9h0c_IZs'),
(16, 'Mérou brun', 'Massif et robuste, il peut mesurer 1 mètre 50 de long, peser 50 kg et vivre jusqu’à 60 ans ! Il est reconnaissable à ses yeux proéminents et à sa large mâchoire.Autrefois, ce poisson était présent dans les eaux peu profondes, mais trop pêché, il a dû se déplacer plus en profondeur. Depuis 1993, un moratoire interdit sa chasse et sa pêche à l’hameçon sur les côtes françaises, ce qui a permis à cette espèce de repeupler progressivement les eaux du Parc national.', 'Très faible', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/merou_brun_500x500.jpg?itok=cIjhc2lJ'),
(17, 'Poulpe', 'Il possède huit tentacules, près de 240 ventouses et un énorme cerveau : c’est le poulpe !Ce céphalopode doté d’une grande intelligence peut changer instantanément la couleur et la texture de sa peau pour se camoufler, projeter des nuages d’encre pour leurrer ses prédateurs et reconstituer ses tentacules en cas d’amputation. Sa bouche est un bec puissant qui lui permet de briser la carapace des crabes et autres mollusques dont il ne nourrit.', 'Faible', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/poulpe_500x500.jpg?itok=IYHlSuYl'),
(18, 'Hippocampe à museau court', 'L’hippocampe à museau court peut mesurer jusqu’à 15 centimètres.Il vit sur les fonds sableux, notamment en présence de végétaux sur lesquels il s\'accroche grâce à sa queue préhensile, c’est-à-dire apte à saisir et s’accrocher. Sa coloration est variable car il a la capacité de se camoufler en imitant son milieu environnant !', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/hippocampus_hippocampus_on_ascophyllum_nodosum2_-_copie_0.jpg?itok=ANp64E0Z'),
(19, 'Oursin diadème méditerranéen', 'L’oursin diadème possède de très longs piquants, qui peuvent mesurer plus de 10 centimètres !Il vit entre 15 et 200 mètres de profondeur, dans les cavités et fentes rocheuses et parfois dans les herbiers de Posidonie. Il se déplace de nuit pour chercher sa nourriture (débris d’éponges, algues...) qu’il racle sur la roche. Lorsqu’il se sent menacé, il redresse ses piquants et les dirige vers le danger en les agitant rapidement.', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/oursin-diademe_500x500.jpg?itok=axG8-qHA'),
(20, 'Rorqual commun', 'Le rorqual commun est le deuxième plus grand animal vivant de la planète après la baleine bleue, pouvant atteindre 20 mètres de long pour 40 tonnes !Son œil fait la taille d’un pamplemousse et son souffle peut aller jusqu’à quatre mètres de haut ! C’est d’ailleurs aussi le plus bruyant des mammifères marins.La coloration de sa tête est asymétrique : tout le côté droit est clair tandis que le côté gauche est plus foncé.Pour se nourrir il peut engloutir jusqu’à 25 000 litres d’eaux d’un coup, qu’il filtre ensuite grâce à ses fanons. Il avale ainsi plusieurs tonnes de poissons et crustacés chaque jour ! On l’observe au large des Calanques.', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/rorqual_commun_500x500.jpg?itok=I5_0VfHK'),
(21, 'Rouget-barbet de roche', 'Malgré son nom, le rouget-barbet de roche fréquente principalement les fonds meubles.On peut le repérer de loin aux nuages de sédiments qu’il soulève grâce à ces deux barbillons tactiles (ses excroissances au niveau de sa bouche) qui ressemblent à une barbichette, d’où son nom. Ces appendices très sensibles lui permettent de fouiller dans le sol pour repérer ses proies : vers, crustacés, mollusques...Il mesure généralement entre 15 et 25 cm mais peut atteindre les 40 cm et peser jusqu’à 1 kg.', 'Dense', 2, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/rouget-barbet_500x500.jpg?itok=zIYjvNXU'),
(22, 'Thymélée tartonraire', 'La thymélée ou passerine tartonraire est un petit arbrisseau dont les feuilles sont recouvertes sur les deux faces d’un abondant duvet soyeux argenté.Il apprécie les bords de mer où sa forme compacte lui permet de se protéger du vent et de la sécheresse. Il peut mesurer jusqu’à un mètre et se pare de petites fleurs jaunes qui dégagent une odeur mentholée.', 'Faible', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/thymclce_t4.jpg?itok=XgyE35iE'),
(23, 'Arbousier', 'L’arbousier est un arbre typiquement méditerranéen reconnaissable à ses baies colorées.En automne, il laisse apparaître des grappes de fleurs blanches en forme de clochette qui ont la particularité d’éclore alors que les fruits de l’année précédente mûrissent encore. Ces derniers viendront décorer l’arbre de belles boules rouges et orangées.Ses fruits sont comestibles crus et cuits, et peuvent servir à confectionner des confitures et des desserts.', 'Moyenne', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/arbousier_4.jpg?itok=PN1WVa8y'),
(24, 'Astragale de Marseille', 'L’astragale de Marseille est un bijou de l’évolution qui a su s’adapter aux conditions extrêmes de vent, de sel et d’aridité du littoral des Calanques. Comme son nom l’indique, en France elle est endémique des côtes calcaires provençales, c’est-à-dire qu’elle ne vit qu’ici.Son port en coussinet et ses petites feuilles velues lui permettent de résister au vent et de limiter ses pertes d’eau. Au printemps elle se pare de jolies fleurs blanches, puis perd la partie verte de ses feuilles en été pour s’exposer le moins possible aux rayons du soleil. La plante se transforme alors en un épineux buisson, ce qui lui vaut son surnom local de... « coussin de belle-mère » !Victime de l’urbanisation, de la pollution et du piétinement sur le littoral, elle s’épanouit au Frioul, loin de ces menaces.', 'Très faible', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/astragale_de_marseille_500x500.jpg?itok=8rifvf_j'),
(25, 'Baouque', 'La baouque a une allure d’herbe touffue et désordonnée. Ses longues tiges et ses feuilles effilées recouvrent la garrigue de tapis denses, qui blondissent avec la saison sèche. À partir du mois d’avril, la baouque se coiffe de petits épis dorés qui resplendissent au soleil couchant.L’autre nom commun de la baouque est le « brachypode rameux ». Le terme « rameux » fait référence à ses tiges très ramifiées qui, contrairement à beaucoup de graminées vivaces, ne disparaissent pas pour repartir de la souche chaque année. Elles continuent de pousser à chaque nouvelle saison de végétation en produisant de nouvelles ramifications.', 'Moyenne', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/baouque_500x500.jpg?itok=2iBDNOjj'),
(26, 'Chêne kermès', 'Le chêne kermès est un buisson très touffu, reconnaissable à ses petites feuilles épineuses qui ne manquent pas de piquer les jambes des randonneurs !Malgré les apparences, qui le différencient nettement du chêne pubescent que le visiteur est plus habitué à reconnaître, il s’agit bien d’un chêne : la preuve, il produit des glands !On le rencontre partout dans le Parc national où il s’accommode des terrains les plus arides grâce à son important réseau de racines. Celles-ci, en plus de lui permettre d’aller puiser de l’eau en profondeur jusqu’à plus de 10 mètres sous terre, favorisent sa repousse rapide après les incendies.Généralement, il pousse en buissons denses et bas, mais parfois, lorsque les conditions s’y prêtent, il peut mesurer plus de deux mètres de haut.', 'Moyenne', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/chane_kermas_500x500.jpg?itok=7Q-gLkdS'),
(27, 'Romarin', 'Le romarin est une plante prisée pour son odeur et son goût entêtants.Parfois dès le mois de janvier, avec, en fonction des conditions climatiques, une deuxième floraison en automne, il arbore de jolies petites fleurs bleu pâle ou lilas. En effet, dès qu’il pleut en automne, il est en capacité de refleurir parfois jusqu’en hiver, s’il ne fait pas trop froid.Cet arbrisseau aux tiges dressées et aux feuilles très étroites et coriaces reste vert toute l’année. Il se plaît au soleil et prospère sur les coteaux les plus arides des Calanques.C’est un champion de l’adaptation, qui a su s’acclimater à son environnement méditerranéen ! Pour se protéger du soleil et du vent, il pousse en boule : ainsi le vent glisse-t-il autour de son port arrondi ou aplati, et ses pieds restent-ils à l’ombre et au frais. C’est d’ailleurs pour résister aux assauts de l’aridité que cette plante n’adopte qu’une taille modeste de petit arbrisseau. La forme de ses feuilles – étroites, épaisses et coriaces, à la face inférieure velue – limite quant à elle les pertes d’eau.', 'Moyenne', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/romarin_500x500.jpg?itok=0fvoAJFL'),
(28, 'Fenouil de mer', 'Le fenouil de mer, aussi appelé criste marine, colonise les fissures des parois rocheuses, où il insinue ses longues racines afin d’aller chercher de l’eau, qu’il stocke dans ses feuilles charnues.Il a la particularité de très bien s’accommoder aux fortes concentrations de sel, au  déficit en eau, et aux conditions de survie en milieu littoral hostile. Il y pousse en touffes compactes, et se pare de bouquets de minuscules fleurs blanc verdâtre en été.On peut consommer ses feuilles, dont la saveur anisée se rapproche de celle du fenouil.', 'Moyenne', 3, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/500x500/public/fenouil_de_mer_500x500.jpg?itok=PsGMcB-8');

-- --------------------------------------------------------

--
-- Structure de la table `point_of_interest`
--

DROP TABLE IF EXISTS `point_of_interest`;
CREATE TABLE IF NOT EXISTS `point_of_interest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `point_of_interest`
--

INSERT INTO `point_of_interest` (`id`, `name`, `description`, `latitude`, `longitude`) VALUES
(1, 'Port-Pin', 'Dans ce petit port naturel venaient s’amarrer autrefois les embarcations des pêcheurs. Les « pescadous » allaient ensuite se mettre à l’ombre sous la pinède qui entoure toute la calanque, et qui, encore visible aujourd’hui, lui a donné son nom.Puis les barques furent remplacées par les pédalos. C’est le temps de la société des loisirs : jusqu’aux années 70-80, s’élevait dans la calanque une guinguette très populaire. Il en reste des vestiges : des murs de pierre bien visibles au fond de la plage, adossés aux rochers. Les visiteurs descendaient en 4CV jusque sur le rivage, comme en témoignent plusieurs photos d’époque !Le succès de cette calanque est tel qu’on la voit apparaître dans un film culte : Borsalino, sorti en 1970, avec Alain Delon et Jean-Paul Belmondo. Port-Pin y voit se lier et s’affronter les clans de la pègre marseillaise. Et on note bien à l’écran les automobiles qui pouvaient autrefois accéder à la plage…', 43.204, 5.51066),
(2, 'La rivière souterraine de Port-Miou', 'Dissimulée au cœur de la roche calcaire, sous la calanque de Port-Miou, se trouve… une rivière souterraine ! Cette source gigantesque, qui se déverse dans les eaux de la calanque, fait partie d’un des plus longs fleuves souterrains d’Europe. Un puits de 44 mètres de profondeur permet aujourd’hui aux chercheurs d’y accéder.', 43.2053, 5.51301),
(3, 'Belvédère d\'En-Vau', 'Comme son nom l’indique, ce belvédère, perché à 170 mètres au milieu des pins accrochés aux falaises, offre une vue imprenable sur la calanque d’En-Vau, d’autant plus impressionnante qu’elle se situe dans l’axe de la faille. L’énorme masse du plateau de Castel Vieil s’impose à nos pieds, tandis qu’au loin, le cap Canaille ferme la baie de Cassis. Et plus loin encore, c’est le cap Sicié qui se profile.', 43.2041, 5.49407),
(4, 'Le jas de Sugiton', 'Le terme de jas (« jaç » en graphie occitane) signifie « gîte » et désigne de grandes bergeries construites à l’écart des habitations. Sur le territoire du Parc national, elles sont construites en pierres sèches. On trouvait également une autre grande ferme sur la route de la Gineste : le « Logis neuf » ou « Logisson », qui est toujours en activité aujourd’hui.', 43.219, 5.44847),
(5, 'Les falaises du Devenson', 'Le mot devenson (devensoun en provençal) fait référence à l’exposition de la paroi rocheuse, et non à un alpiniste anglo-saxon comme certains le pensent ! Plein sud, sur le versant qui bénéficie de la plus longue exposition au soleil, on se trouve donc devant la colline. Quant au suffixe -on, il est typique des substantifs provençaux : agachon, cabanon, Logisson, Sugiton…', 43.2072, 5.47842),
(6, 'Belvédère de Sugiton', 'Le belvédère de Sugiton se tient sur le site d’une ancienne vigie miliaire dont l’emplacement a été choisi pour la vue dégagée qu’il offre sur la côte et le large. Aussi connu sous le nom évocateur de « tour d’Orient », « Sugiton » proviendrait du latin saxum, qui signifie « rocher », et notamment « rocher isolé ». Culminant à 245 mètres, il offre l’une des plus belles vues sur le Parc national dans sa globalité, très représentative de ce que sont les Calanques : un massif montagneux au bord de l’eau.', 43.214, 5.4481),
(7, 'La calanque de Morgiou', 'Des pêcheurs et quelques bergers sont les premiers à s’installer à Morgiou. Dans cette calanque plus encaissée et plus confidentielle que Sormiou, ils se construisent une poignée de cabanons. Le lieu, particulièrement exposé au vent du nord, est rude : l’historien Alfred Saurel raconte comment le gros mistral brisait les pointus contre les rochers.L’absence de source, et donc d’eau potable, explique le peu d’habitations. Les citernes recueillant l’eau de pluie étaient à sec l’été, et des caravanes d’ânes allaient chercher à Mazargues de quoi se ravitailler. En chemin ils transportaient le poisson pêché à Morgiou, qui était vendu sur les marchés de la ville.', 43.213, 5.44335),
(8, 'La calanque de Sormiou', 'Sormiou est de ces endroits où l’être humain entretient, depuis des générations, un lien profond avec la nature. Plus évasée que sa voisine Morgiou, cette calanque est depuis longtemps un lieu de villégiature, aujourd\'hui surfréquenté l’été…', 43.2107, 5.41999),
(9, 'La grotte Cosquer', 'Aurochs, bisons, bouquetins, chamois et même pingouins : tous fréquentaient les Calanques… il y a 25 mille ans, durant la dernière grande glaciation ! Aujourd’hui disparu, cet incroyable bestiaire orne toujours les parois de la grotte Cosquer, près du cap Morgiou. Une grotte unique en son genre, découverte en 1985 mais déclarée officiellement en 1991 par le scaphandrier professionnel dont elle porte désormais le nom, la grotte Cosquer est à ce jour la seule grotte ornée paléolithique connue dans le sud-est de la France.C\'est également l\'unique grotte ornée au monde dont l\'entrée s\'ouvre sous la mer ! Celle-ci est en effet immergée à 37 mètres de profondeur… et il faut parcourir un boyau de 175 mètres de long pour y accéder. ', 43.2028, 5.44907);

-- --------------------------------------------------------

--
-- Structure de la table `trail`
--

DROP TABLE IF EXISTS `trail`;
CREATE TABLE IF NOT EXISTS `trail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `length` float NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `longitude_A` float NOT NULL,
  `latitude_A` float NOT NULL,
  `longitude_B` float NOT NULL,
  `latitude_B` float NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trail`
--

INSERT INTO `trail` (`id`, `name`, `length`, `difficulty`, `longitude_A`, `latitude_A`, `longitude_B`, `latitude_B`, `img`) VALUES
(1, 'Calanque de Sormiou', 2.04, 'easy', 5.4181, 43.2292, 5.4258, 43.2117, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/slide_1500_1000/public/7_sormiou_par_le_col_de_sormiou_c_philippe_echaroux.jpg?itok=u2ENkY9p'),
(2, 'Calanque de Morgiou', 2.48, 'easy', 5.4307, 43.2322, 5.4471, 43.2134, 'https://th.bing.com/th/id/OIP.xKiBqpqdPE8w9Pm5VHSgsgHaE6?w=258&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(3, 'Calanque de Port Miou', 0.57, 'easy', 5.5404, 43.207, 5.5335, 43.2062, 'https://th.bing.com/th/id/OIP.X5pLPGcPxO-biDCUud7KMwHaE8?w=282&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(4, 'Calanque de Port-Pin et En-Vau', 1.32, 'medium', 5.5404, 43.207, 5.5244, 43.2049, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/slide_1500_1000/public/15_calanque_den_vau_par_port_pin_cchabe01.jpg?itok=632Pluni'),
(5, 'Le Belvédère de Sugiton', 2.67, 'medium', 5.4307, 43.2322, 5.4579, 43.2187, 'https://www.calanques-parcnational.fr/sites/calanques-parcnational.fr/files/styles/slide_1500_1000/public/10_le_belvedere_de_sugiton_c_maxime_berenger.jpg?itok=pmpYFVX9'),
(6, 'Calanque de Sugiton', 3.23, 'medium', 5.4307, 43.2322, 5.4628, 43.2151, 'https://th.bing.com/th/id/OIP.Tm18pICcshRpgYlGw2B8EgHaE6?w=271&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(7, 'La Grande Candelle', 2.19, 'medium', 5.4307, 43.2322, 5.4556, 43.2247, 'https://th.bing.com/th/id/OIP.ZdhI3ZRBcxSXZ0MX28Gw-gHaE8?w=265&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(8, 'Traversée des Calanques (Sormiou, Morgiou, Sugiton)', 3.44, 'hard', 5.4181, 43.2292, 5.4579, 43.2187, 'https://th.bing.com/th/id/OIP.zqVKgTnQt6ZMM10h6UjLNAHaD4?w=333&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(9, 'Sentier du Cap Canaille (Grande Randonnée)', 2.35, 'hard', 5.5404, 43.207, 5.5691, 43.2097, 'https://th.bing.com/th/id/OIP.j76aa3g2P6qtpAbx03MYiwHaFj?w=252&h=188&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(10, 'Calanque de l\'Oule', 2.31, 'hard', 5.5404, 43.207, 5.5121, 43.2092, 'https://th.bing.com/th/id/OIP.L7t_2GgTbBA3W5n0HwVAugHaE8?w=279&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(11, 'Calanque de Devenson', 5.64, 'hard', 5.4307, 43.2322, 5.4952, 43.2135, 'https://th.bing.com/th/id/OIP.3kEHHVPk21Wzo893hfI0AgHaFj?w=258&h=193&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(12, 'Le Plateau de l’Homme Mort et le Cap Gros', 4.13, 'hard', 5.4181, 43.2292, 5.467, 43.2192, 'https://th.bing.com/th/id/OIP.S30vv3QyTXcZ6PhWdDW8BwHaFj?w=208&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(4, 'john', 'jonathan.le-plat@laplateforme.io', '$2y$10$2rf64b2INzk3PvFz4NK4Qu/u0R9m/6u2AURrUB9BI6PLdk9v6FPSC', 'admin', '2024-09-10 13:04:10'),
(3, 'test', 'test@gmail.com', '$2y$10$tg2GgJy7tKqrOYSzdg0nqOciKL.OEApgmfWefApTAATl4FTybDbKC', 'user', '2024-09-10 13:03:36'),
(9, 'login', 'testlogin@gmail.com', '$2y$10$88nBTxF2uRoxrccB86oe9eeHo9Pf9QITZC8qVxS286ZuBl4gNS.ra', 'user', '2024-09-11 09:53:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;