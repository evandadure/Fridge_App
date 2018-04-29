-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 29 avr. 2018 à 20:38
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

CREATE DATABASE fridgee_db;
USE fridgee_db;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fridgee_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id` int(11) UNSIGNED NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `food_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_type`) VALUES
(1, 'garlic', 'essentials'),
(2, 'butter or margarine', 'essentials'),
(3, 'chocolate', 'essentials'),
(4, 'cream', 'essentials'),
(5, 'water', 'essentials'),
(6, 'flour', 'essentials'),
(7, 'gruyere', 'essentials'),
(8, 'emmental', 'essentials'),
(9, 'olive oil', 'essentials'),
(10, 'sunflower oil', 'essentials'),
(11, 'milk', 'essentials'),
(12, 'honey', 'essentials'),
(13, 'eggs', 'essentials'),
(14, 'onions', 'essentials'),
(15, 'pastry', 'essentials'),
(16, 'puff pastry', 'essentials'),
(17, 'pasta', 'essentials'),
(18, 'pepper', 'essentials'),
(19, 'potatoes', 'essentials'),
(20, 'rice', 'essentials'),
(21, 'salt', 'essentials'),
(22, 'sugar', 'essentials'),
(44, 'artichokes', 'vegetables and tubers'),
(45, 'asparagus', 'vegetables and tubers'),
(46, 'aubergines', 'vegetables and tubers'),
(47, 'avocados', 'vegetables and tubers'),
(48, 'broccoli', 'vegetables and tubers'),
(49, 'cabbage flower', 'vegetables and tubers'),
(50, 'carrots', 'vegetables and tubers'),
(51, 'cabbage', 'vegetables and tubers'),
(52, 'pumpkin', 'vegetables and tubers'),
(53, 'cucumber', 'vegetables and tubers'),
(54, 'squash', 'vegetables and tubers'),
(55, 'spinach', 'vegetables and tubers'),
(56, 'beans', 'vegetables and tubers'),
(57, 'lentils', 'vegetables and tubers'),
(58, 'chilli', 'vegetables and tubers'),
(59, 'leeks', 'vegetables and tubers'),
(60, 'radish', 'vegetables and tubers'),
(61, 'green salad', 'vegetables and tubers'),
(62, 'tomatoes', 'vegetables and tubers'),
(63, 'green tomatoes', 'vegetables and tubers'),
(64, 'olives', 'vegetables and tubers'),
(65, 'mushrooms', 'essentials'),
(66, 'apricots', 'fruits and dried fruits'),
(67, 'dried apricots', 'fruits and dried fruits'),
(68, 'almonds', 'fruits and dried fruits'),
(69, 'pineapples', 'fruits and dried fruits'),
(70, 'bananas', 'fruits and dried fruits'),
(71, 'peanuts', 'fruits and dried fruits'),
(72, 'black currants', 'fruits and dried fruits'),
(73, 'lemons', 'fruits and dried fruits'),
(74, 'limes', 'fruits and dried fruits'),
(75, 'clementines', 'fruits and dried fruits'),
(76, 'figs', 'fruits and dried fruits'),
(77, 'strawberries', 'fruits and dried fruits'),
(78, 'raspberries', 'fruits and dried fruits'),
(79, 'candied fruit', 'fruits and dried fruits'),
(80, 'red fruits', 'fruits and dried fruits'),
(81, 'kiwis', 'fruits and dried fruits'),
(82, 'lychees', 'fruits and dried fruits'),
(83, 'mangoes', 'fruits and dried fruits'),
(84, 'melons', 'fruits and dried fruits'),
(85, 'mirabelles', 'fruits and dried fruits'),
(86, 'hazelnuts', 'fruits and dried fruits'),
(87, 'blueberries', 'fruits and dried fruits'),
(88, 'walnuts', 'fruits and dried fruits'),
(89, 'cashew nuts', 'fruits and dried fruits'),
(90, 'coconuts', 'fruits and dried fruits'),
(91, 'pecans', 'fruits and dried fruits'),
(92, 'oranges', 'fruits and dried fruits'),
(93, 'grapefruit', 'fruits and dried fruits'),
(94, 'watermelon', 'fruits and dried fruits'),
(95, 'peaches', 'fruits and dried fruits'),
(96, 'pistachios', 'fruits and dried fruits'),
(97, 'pears', 'fruits and dried fruits'),
(98, 'apples', 'fruits and dried fruits'),
(99, 'prunes', 'fruits and dried fruits'),
(100, 'plums', 'fruits and dried fruits'),
(101, 'white grapes', 'fruits and dried fruits'),
(102, 'black grapes', 'fruits and dried fruits'),
(103, 'raisins', 'fruits and dried fruits'),
(104, 'lamb', 'meat and sausages'),
(105, 'bacon', 'meat and sausages'),
(106, 'beef', 'meat and sausages'),
(107, 'white pudding', 'meat and sausages'),
(108, 'quail', 'meat and sausages'),
(109, 'duck', 'meat and sausages'),
(110, 'chorizo', 'meat and sausages'),
(111, 'turkey', 'meat and sausages'),
(112, 'foie gras', 'meat and sausages'),
(113, 'gizzards', 'meat and sausages'),
(114, 'ham', 'meat and sausages'),
(115, 'smoked ham', 'meat and sausages'),
(116, 'rabbit', 'meat and sausages'),
(117, 'merguez', 'meat and sausages'),
(118, 'mutton', 'meat and sausages'),
(119, 'pork', 'meat and sausages'),
(120, 'chicken', 'meat and sausages'),
(121, 'sausages', 'meat and sausages'),
(122, 'veal', 'meat and sausages'),
(123, 'anchovies', 'fish, shellfish and crustaceans'),
(124, 'eel', 'fish, shellfish and crustaceans'),
(125, 'pike', 'fish, shellfish and crustaceans'),
(126, 'carp', 'fish, shellfish and crustaceans'),
(127, 'hake', 'fish, shellfish and crustaceans'),
(128, 'shrimps', 'fish, shellfish and crustaceans'),
(129, 'crayfish', 'fish, shellfish and crustaceans'),
(130, 'lobster', 'fish, shellfish and crustaceans'),
(131, 'oysters', 'fish, shellfish and crustaceans'),
(132, 'lobster', 'fish, shellfish and crustaceans'),
(133, 'whiting', 'fish, shellfish and crustaceans'),
(134, 'cod', 'fish, shellfish and crustaceans'),
(135, 'scallop', 'fish, shellfish and crustaceans'),
(136, 'puff', 'fish, shellfish and crustaceans'),
(137, 'clams', 'fish, shellfish and crustaceans'),
(138, 'sardines', 'fish, shellfish and crustaceans'),
(139, 'salmon', 'fish, shellfish and crustaceans'),
(140, 'smoked salmon', 'fish, shellfish and crustaceans'),
(141, 'trout', 'fish, shellfish and crustaceans'),
(142, 'herring', 'fish, shellfish and crustaceans'),
(143, 'tuna', 'fish, shellfish and crustaceans'),
(144, 'brie', 'dairy products'),
(145, 'camembert', 'dairy products'),
(146, 'cheddar', 'dairy products'),
(147, 'goat cheese', 'dairy products'),
(149, 'feta', 'dairy products'),
(150, 'fromage blanc', 'dairy products'),
(151, 'fromage frais', 'dairy products'),
(152, 'condensed milk', 'dairy products'),
(153, 'coconut milk', 'dairy products'),
(154, 'soya milk', 'dairy products'),
(155, 'fermented milk', 'dairy products'),
(156, 'mozzarella', 'dairy products'),
(157, 'permesan', 'dairy products'),
(158, 'reblochon', 'dairy products'),
(159, 'wheat flour', 'pasta, rice, flour, cereals'),
(160, 'barley flour', 'pasta, rice, flour, cereals'),
(161, 'corn flour', 'pasta, rice, flour, cereals'),
(162, 'quinoa', 'pasta, rice, flour, cereals'),
(163, 'whole rice', 'pasta, rice, flour, cereals'),
(164, 'rice cakes', 'pasta, rice, flour, cereals'),
(165, 'sunflower seeds', 'pasta, rice, flour, cereals'),
(166, 'lasagna', 'pasta, rice, flour, cereals'),
(167, 'millet', 'pasta, rice, flour, cereals'),
(168, 'muesli', 'pasta, rice, flour, cereals'),
(169, 'Chinese noodles', 'pasta, rice, flour, cereals'),
(170, 'rice pasta', 'pasta, rice, flour, cereals'),
(171, 'buckwheat', 'pasta, rice, flour, cereals'),
(172, 'wheat semolina', 'pasta, rice, flour, cereals'),
(173, 'cornmeal', 'pasta, rice, flour, cereals'),
(174, 'cinnamon', 'spices and aromas'),
(175, 'cloves', 'spices and aromas'),
(177, 'turmeric', 'spices and aromas'),
(178, 'curry', 'spices and aromas'),
(179, 'orange blossom water', 'spices and aromas'),
(180, 'almond essence', 'spices and aromas'),
(181, 'garam massala', 'spices and aromas'),
(182, 'nutmeg', 'spices and aromas'),
(183, 'paprika', 'spices and aromas'),
(184, 'saffron', 'spices and aromas'),
(185, 'vanilla', 'spices and aromas'),
(186, 'beer', 'alcohol and other drinks'),
(187, 'champagne', 'alcohol and other drinks'),
(188, 'cider', 'alcohol and other drinks'),
(189, 'cognac', 'alcohol and other drinks'),
(190, 'cointreau', 'alcohol and other drinks'),
(191, 'sparkling water', 'alcohol and other drinks'),
(192, 'madeira', 'alcohol and other drinks'),
(193, 'martini', 'alcohol and other drinks'),
(194, 'muscatel', 'alcohol and other drinks'),
(195, 'pastis', 'alcohol and other drinks'),
(196, 'porto', 'alcohol and other drinks'),
(197, 'rum', 'alcohol and other drinks'),
(198, 'sake', 'alcohol and other drinks'),
(199, 'white wine', 'alcohol and other drinks'),
(200, 'red wine', 'alcohol and other drinks'),
(201, 'vodka', 'alcohol and other drinks'),
(202, 'whiskey', 'alcohol and other drinks'),
(203, 'goose fat', 'fat'),
(204, 'peanut oil', 'fat'),
(205, 'walnut oil', 'fat'),
(206, 'palm oil', 'fat'),
(207, 'sesame oil', 'fat'),
(208, 'peanut butter', 'sweet'),
(209, 'caramel', 'sweet'),
(210, 'white chocolate', 'sweet'),
(211, 'applesauce', 'sweet'),
(212, 'apricot jam', 'sweet'),
(213, 'orange marmalade', 'sweet'),
(214, 'blackcurrant jam', 'sweet'),
(215, 'fig jam', 'sweet'),
(216, 'strawberry jam', 'sweet'),
(217, 'raspberry jam', 'sweet'),
(218, 'redcurrant jam', 'sweet'),
(219, 'milk jam', 'sweet'),
(220, 'blackberry jam ', 'sweet'),
(221, 'blueberry jam', 'sweet'),
(222, 'peach jam', 'sweet'),
(223, 'plum jam', 'sweet'),
(224, 'chestnut cream', 'sweet'),
(225, 'banana ice cream', 'sweet'),
(226, 'coffee ice cream', 'sweet'),
(227, 'caramel ice cream', 'sweet'),
(228, 'chocolate ice cream', 'sweet'),
(229, 'strawberry ice cream', 'sweet'),
(230, 'raspberry ice cream', 'sweet'),
(231, 'mint-chocolate ice cream', 'sweet'),
(232, 'coconut ice cream', 'sweet'),
(233, 'pistachio ice cream', 'sweet'),
(234, 'praline ice cream ', 'sweet'),
(235, 'vanilla ice cream', 'sweet'),
(236, 'meringues', 'sweet'),
(237, 'Nutella', 'sweet'),
(238, 'gingerbread', 'sweet'),
(239, 'maple syrup', 'sweet'),
(240, 'maple sorbet', 'sweet'),
(241, 'apricot sorbet', 'sweet'),
(242, 'pineapple sorbet', 'sweet'),
(243, 'blackcurrant sorbet', 'sweet'),
(244, 'lemon sherbet', 'sweet'),
(245, 'mango sorbet', 'sweet'),
(246, 'melon sorbet', 'sweet'),
(247, 'speculoos', 'sweet'),
(248, 'icing sugar', 'sweet'),
(249, 'brown sugar', 'sweet'),
(250, 'vanilla sugar', 'sweet'),
(251, 'dill', 'herbs and plants'),
(252, 'anise', 'herbs and plants'),
(253, 'badian', 'herbs and plants'),
(254, 'basil', 'herbs and plants'),
(255, 'cocoa', 'herbs and plants'),
(256, 'coffee', 'herbs and plants'),
(257, 'caraway', 'herbs and plants'),
(258, 'chervil', 'herbs and plants'),
(259, 'chives', 'herbs and plants'),
(260, 'lemongrass', 'herbs and plants'),
(261, 'coriander', 'herbs and plants'),
(262, 'tarragon', 'herbs and plants'),
(263, 'provencal herbs', 'herbs and plants'),
(264, 'kombu', 'herbs and plants'),
(265, 'laurel', 'herbs and plants'),
(266, 'lavender', 'herbs and plants'),
(267, 'mint', 'herbs and plants'),
(268, 'oregano', 'herbs and plants'),
(269, 'parsley', 'herbs and plants'),
(270, 'rosemary', 'herbs and plants'),
(271, 'sage', 'herbs and plants'),
(272, 'sesame', 'herbs and plants'),
(273, 'tea', 'herbs and plants'),
(274, 'matcha tea ', 'herbs and plants'),
(275, 'thyme', 'herbs and plants'),
(276, 'verbena', 'herbs and plants'),
(277, 'capers', 'condiments and sauces'),
(278, 'tomato paste', 'condiments and sauces'),
(279, 'pickles', 'condiments and sauces'),
(280, 'tomato coulis', 'condiments and sauces'),
(281, 'shallots', 'condiments and sauces'),
(282, 'ginger', 'condiments and sauces'),
(283, 'gomasio', 'condiments and sauces'),
(284, 'harissa', 'condiments and sauces'),
(285, 'ketchup', 'condiments and sauces'),
(286, 'mayonnaise', 'condiments and sauces'),
(287, 'miso', 'condiments and sauces'),
(288, 'mustard', 'condiments and sauces'),
(289, 'soy sauce', 'condiments and sauces'),
(290, 'tabasco', 'condiments and sauces'),
(291, 'tapenade', 'condiments and sauces'),
(292, 'candied tomatoes', 'condiments and sauces'),
(293, 'sundried tomatoes', 'condiments and sauces'),
(294, 'white vinegar', 'condiments and sauces'),
(295, 'cider vinegar', 'condiments and sauces'),
(296, 'vinegar raspberry', 'condiments and sauces'),
(297, 'walnut vinegar', 'condiments and sauces'),
(298, 'rice vinegar', 'condiments and sauces'),
(299, 'sherry vinegar', 'condiments and sauces'),
(300, 'agar-agar', 'various foods'),
(301, 'baking soda', 'various foods'),
(302, 'rusks', 'various foods'),
(303, 'broth cube', 'various foods'),
(304, 'bread crumbs', 'various foods'),
(305, 'food coloring', 'various foods'),
(306, 'sesame cream', 'various foods'),
(307, 'pancakes', 'various foods'),
(308, 'cookies', 'various foods'),
(309, 'gelatin', 'various foods'),
(310, 'baking powder', 'various foods'),
(311, 'brewer\'s yeast', 'various foods'),
(312, 'baker\'s yeast', 'various foods'),
(313, 'cornflour', 'various foods'),
(314, 'bread', 'various foods'),
(315, 'hambergers bread', 'various foods'),
(317, 'marzipan', 'various foods'),
(318, 'pistachio paste', 'various foods'),
(319, 'praline', 'various foods'),
(320, 'tacos', 'various foods'),
(321, 'tapioca', 'various foods'),
(322, 'tofu', 'various foods'),
(323, 'cauliflower', 'vegetables and tubers'),
(324, 'kale', 'vegetables and tubers'),
(325, 'mixed leaves', 'herbs and plants'),
(326, 'balsamic vinegar', 'condiments and sauces'),
(327, 'concentrated liquid beef stock', 'various foods'),
(328, 'sirloin steak', 'meat and sausages'),
(329, 'gingernut biscuits', 'sweet'),
(330, 'cheese cream', 'dairy products'),
(331, 'caster sugar', 'sweet'),
(332, 'celery', 'vegetables and tubers'),
(333, 'cumin', 'spices and aromas'),
(334, 'vegetable stock', 'vegetables and tubers'),
(335, 'chickpeas', 'fruits and dried fruits'),
(336, 'parsnip', 'vegetables and tubers'),
(337, 'horseradish sauce', 'condiments and sauces'),
(338, 'horseradish', 'vegetables and tubers'),
(339, 'beetroot', 'vegetables and tubers'),
(340, 'chicken liver', 'meat and sausages'),
(341, 'white pepper', 'spices and aromas');

-- --------------------------------------------------------

--
-- Structure de la table `involves`
--

CREATE TABLE `involves` (
  `recipe_id` int(11) UNSIGNED NOT NULL,
  `food_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `involves`
--

INSERT INTO `involves` (`recipe_id`, `food_id`) VALUES
(1, 8),
(1, 9),
(1, 121),
(1, 146),
(1, 323),
(1, 324),
(1, 325),
(2, 1),
(2, 4),
(2, 9),
(2, 14),
(2, 17),
(2, 48),
(2, 114),
(2, 146),
(2, 288),
(3, 4),
(3, 59),
(3, 114),
(3, 146),
(3, 288),
(4, 1),
(4, 9),
(4, 10),
(4, 12),
(4, 18),
(4, 19),
(4, 61),
(4, 275),
(4, 288),
(4, 326),
(4, 327),
(4, 328),
(5, 2),
(5, 4),
(5, 74),
(5, 248),
(5, 309),
(5, 329),
(5, 330),
(5, 331),
(6, 2),
(6, 3),
(6, 6),
(6, 13),
(6, 210),
(6, 255),
(6, 331),
(7, 9),
(7, 14),
(7, 56),
(7, 62),
(7, 73),
(7, 261),
(7, 269),
(7, 332),
(7, 333),
(7, 335),
(8, 1),
(8, 9),
(8, 14),
(8, 62),
(8, 73),
(8, 177),
(8, 261),
(8, 288),
(8, 333),
(8, 334),
(8, 336),
(9, 4),
(9, 9),
(9, 12),
(9, 61),
(9, 74),
(9, 128),
(9, 140),
(9, 282),
(9, 337),
(11, 1),
(11, 2),
(11, 98),
(11, 192),
(11, 275),
(11, 279),
(11, 314),
(11, 340),
(12, 73),
(12, 139),
(12, 251),
(12, 259),
(12, 261),
(12, 331),
(12, 341),
(15, 4),
(15, 9),
(15, 60),
(15, 73),
(15, 92),
(15, 140),
(15, 294),
(15, 338),
(15, 339),
(23, 4),
(23, 9),
(23, 21),
(23, 61),
(23, 62),
(23, 63),
(23, 120);

-- --------------------------------------------------------

--
-- Structure de la table `possesses`
--

CREATE TABLE `possesses` (
  `food_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `possesses`
--

INSERT INTO `possesses` (`food_id`, `user_id`) VALUES
(4, 2),
(59, 2),
(114, 2),
(145, 2),
(146, 2),
(288, 2);

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) UNSIGNED NOT NULL,
  `recipe_name` varchar(250) NOT NULL,
  `recipe_description` longtext,
  `recipe_type` varchar(100) DEFAULT NULL,
  `recipe_prep_time` int(11) DEFAULT '0',
  `recipe_cook_time` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`id`, `recipe_name`, `recipe_description`, `recipe_type`, `recipe_prep_time`, `recipe_cook_time`) VALUES
(1, 'Cauli-kale sausage bake', 'This cheap, crowd-pleasing meal is easy, hearty fare. This needs hardly any prep and it\'s pure comfort food, with a good helping of veg and hot bubbling cheese', 'main-course', 10, 40),
(2, 'Cheesy ham & broccoli pasta', 'Satisfy your comfort food cravings with this cheap and simple creamy pasta dish with chunks of ham and crunchy veg', 'main-course', 10, 20),
(3, 'Cheesy leeks & ham', 'A low-carb leek, ham and cheese meal in 25 minutes', 'main-course', 5, 20),
(4, 'Balsamic steaks with peppercorn wedges', 'Freeze single portions of sirloin steak and chips so you have a home-cooked meal within minutes of getting home', 'main-course', 10, 20),
(5, 'Layered lime cheesecake', 'Make this stunning layered, citrussy dessert ahead of time if you\'re entertaining. It\'s a crowd-pleaser that\'s part key lime pie, part cheesecake, part trifle', 'dessert', 30, 10),
(6, 'Best ever chocolate brownies recipe', 'A foolproof brownie recipe for a squidgy chocolate bake. Watch our recipe video to help you get a perfect traybake every time.', 'dessert', 20, 40),
(7, 'Moroccan chickpea soup', 'Try something different for vegetarians with Moroccan chickpea soup', 'starter', 5, 20),
(8, 'Spicy roasted parsnip soup', 'Aromatic flavours transform the ordinary parsnip into a delicious warming soup', 'starter', 10, 35),
(9, 'Smoked salmon with prawns, horseradish cream & lime vinaigrette', 'This stunning starter can be assembled ahead, then topped with dressed leaves just before serving', 'starter', 20, 0),
(11, 'Chicken liver pate', 'James Martin\'s luxuriously rich dinner party starter can be made up to two days in advance for fuss-free entertaining - serve with toasted brioche, cornichons and chutney', 'starter', 15, 10),
(12, 'Quick lemon gravadlax', 'This speedy, zesty version of the Swedish classic cuts the curing time to 30 minutes and makes a special starter for two', 'starter', 15, 0),
(15, 'Smoked salmon carpaccio', 'James Martin\'s stunning seafood starter is guaranteed to impress at any dinner party - layer with beetroot, orange and tangy horseradish cream', 'starter', 30, 0),
(23, 'Chicken salad', 'This chicken salad is very easy', 'starter', 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_identifier` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `user_identifier`, `user_password`, `user_name`) VALUES
(2, 'evandadure', '$2y$10$wjV1vBipobmacPGsJS3zQeiKYkNVWbtrHEQiru0vAEIyAhHtuNpsO', 'Evan Dadure');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOOD_ID` (`id`);

--
-- Index pour la table `involves`
--
ALTER TABLE `involves`
  ADD PRIMARY KEY (`recipe_id`,`food_id`),
  ADD KEY `FK_INVOLVES_FOOD` (`food_id`);

--
-- Index pour la table `possesses`
--
ALTER TABLE `possesses`
  ADD PRIMARY KEY (`food_id`,`user_id`),
  ADD KEY `FK_POSSESSES_USER` (`user_id`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RECIPE_ID` (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USER_ID` (`id`),
  ADD UNIQUE KEY `user_identifier` (`user_identifier`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `involves`
--
ALTER TABLE `involves`
  ADD CONSTRAINT `FK_INVOLVES_FOOD` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INVOLVES_RECIPE` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `possesses`
--
ALTER TABLE `possesses`
  ADD CONSTRAINT `FK_POSSESSES_FOOD` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POSSESSES_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
