-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 jan. 2023 à 21:28
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `post`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surface` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `reference`, `intitule`, `descriptif`, `localisation`, `surface`, `prix`, `type`, `categorie`) VALUES
(1, '17.03.017', 'Activités Equestres, Apiculture, Chasse,', 'Propriété Charente-Maritime', '88888', '17Ha', '330000', 'Vente prix ferme', 'Exploitations'),
(2, '19.07.118', 'FERME 100% HERBAGERE/ ELEVAGE LAITIER', 'Située à l\'ordre d\'un bourg, à 10 minutes des services et commerces.', '35200', '34Ha', '950', 'Location', 'Exploitations'),
(3, '23.16.104', 'Propriété Creuse', 'Dans un hameau ? moins de 10 minutes d\'un bourg avec services et commerces, et d\'un village ayant un int?r?t touristique sur les routes de St-Jacques-de-Compostelle.', '23320', '1Ha55', '860', 'Location', 'Batiments'),
(4, '30VI9700', 'Propri?t? Gard', 'Ensemble immobilier proche d\'un plan d\'eau am?nag?', '34290', '29Ha', '2000', 'Location', 'Exploitations'),
(5, '313453DR  modified', 'Id?al soci?t? de chasse edited', 'Terrain bois? class? ONF', '34276', '35Ha', '120000', 'Vente', 'Bois'),
(6, '344334UJ', 'Sapini?re', 'Sapini?re en cours de bail, cherche reprise', '35200', '1,8Ha', '800', 'Location', 'Bois'),
(7, '345E7EG', 'Bois sur pied', 'Diverses essences sur place', '29510', '6Ha', '30000', 'Vente', 'Bois'),
(8, '34AG10897', 'Tourisme rural-h?bergement', 'Au nord de l\'H?rault, proche des axes routiers et ? 45 minutes de Montpellier', '34070', '1Ha90', '1 490 000', 'Vente', 'Batiments'),
(9, '34VI6979', 'Propri?t? viticole et sa cave', 'Au c?ur de l\'appellation Saint-Chinian', '34280', '30Ha', '1 500 000', 'Vente', 'Batiments'),
(10, '38TB22187', 'Vallons du Voironnais', '13 Ha de terrain', '38500', '13Ha', '2000', 'Location', 'Terrain agricole'),
(11, '43LM220118', 'Prairies en pays glazik', 'Usage petits animaux type caprins', '29510', '1ha22', '15000', 'Vente', 'Prairie'),
(12, '44 22 AN 08', 'B?timents avicoles ? transmettre', 'Site avicole ? transmettre sur la commune de Nort-sur-Erdre, au nord de Nantes.', '44220', '2Ha', '200000', 'Vente', 'Batiments'),
(13, '47.06.098', 'PRET A USAGE sur 95 ha - PLAINE DES VOSGES ', ' A 5 min de Villeneuve-sur-Lot', '47300', '14Ha', '11000', 'Location', 'Terrain agricole'),
(14, '48EL11345', 'Propri?t? Loz?re', 'Ensemble b?ti avec environ 1ha55', '48370', '1Ha55', '700', 'Location', 'Batiments'),
(15, '48RE11201', 'Situ? ? 15 minutes de Mende', 'id?al pour polyculture sur 14 ha', '30430', '10Ha', '1300', 'Location', 'Terrain agricole'),
(16, '55VS', 'Propri?t? Meuse', 'FERME DE COURUPT : Secteur Sainte-Menehould / Clermont-en-Argonne / Revigny', '88340', '59Ha', 'Nous consulter', 'Location', 'Exploitations'),
(17, '5667DB', 'Ancienne ferme ?questre en ruine', 'Terrains actuellement lou?s', '29510', '12Ha', '156000', 'Vente', 'Terrain agricole'),
(18, '64.02.59', 'Productions v?g?tales', 'La parcelle se situe dans le B?arn sur la commune de LAGOR.', '64150', '2Ha', '7700', 'Vente', 'Prairie'),
(19, '64.03.60', 'Propri?t? situ?e dans un secteur vallonn?', 'Propri?t? Pyr?n?es-Atlantiques', '23500', '6Ha', '650', 'Location', 'Batiments'),
(20, '65.23.876', 'Terrain class? T4', 'clotur? et partiellement bois?', '56500', '1,2Ha', '500', 'Location', 'Bois'),
(21, '7629CA', 'Prairies sur les plateaux', 'Parcelle de terre labourable d\'environ 2 ha', '81090', '76Ha', '400000', 'Vente', 'Prairie'),
(22, '765DN', 'Prairies orient?es nord ouest', 'Lot d\'un seul tenant', '56500', '11Ha', '113000', 'Vente', 'Prairie'),
(23, '76RZDC', 'Terrain proche cours d\'eau', 'Non accessible par la route, uniquement chemin d\'exploitation', '35200', '5,5Ha', '3000', 'Location', 'Prairie'),
(24, '81EL11100', 'Secteur du S?gala-Viaur', 'les secteurs les plus en pente sont empi?r?s', '12200', '54Ha', '400000', 'Vente', 'Bois'),
(25, '88 FB ', 'Vittel Dombrot : Ouest vosgien, secteur de VITTEL', 'Terrains d\'environ 6,5 ha', '88170', '6,5Ha', 'Nous consulter', 'Vente', 'Terrain agricole'),
(26, '9875RDC', 'Terrain avec abri', 'Pour propri?taire ?quin', '44110', '1,2Ha', '1200', 'Location', 'Prairie'),
(27, 'AA 72 22 0088 R', 'Exploitation Agricole sp?cialis?e en polyculture ?levage', 'Exploitation situ?e dans le Sud Est de La Sarthe, entre la commune d\'Ecommoy (72220) et Sarc? (72327)', '72220', '87Ha', 'a', 'Vente', 'Exploitations'),
(28, 'MQ14170356 ', 'Propri?t? Calvados', 'JFD : Noue de Sienne (14)', '14380', '17Ha', '173 440', 'Vente', 'Exploitations'),
(29, 'QDSGF56', 'Bois domainial', 'Bois accessible avec sentiers', '44110', '32Ha', '12000', 'Location', 'Bois'),
(30, 'Z34.345.45', 'L?g?rement en Pente', 'Id?al paturage moutons', '22700', '3,4Ha', '2400', 'Location', 'Prairie'),
(31, 'nouveauAjout', 'voir si sa passe', 'voir est-ce que ça va marcher', '35700', '100000', '23456789', 'T4', 'Appartement'),
(32, 'nouveauAjout', 'voir si sa passe', 'voir est-ce que ça va marcher', '35700', '100000', '23456789', 'T4', 'Appartement'),
(33, 'nouveauAjout', 'voir si sa passe', 'voir est-ce que ça va marcher', '35700', '100000', '23456789', 'T4', 'Appartement'),
(34, 'nouveauAjout', 'voir si sa passe', 'voir est-ce que ça va marcher', '35700', '10000', '234567', 'T4', 'Appartement'),
(35, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(36, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(37, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(38, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(39, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(40, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(41, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(42, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(43, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(44, '134.344', 'ajjnnfjfj', 'jhkllsjjakka, jjjfj', '23222', '1234', '209999', 'T45', 'ATT'),
(45, '12341', 'jjjce', 'kd,nkdckl;k', 'île;kokikejf', '345', '76567', 'tjjjj', 'hklj klk,ikj'),
(46, 'tdfyuk', 'ghk,zjnhdjzd', 'hhzjldknjzd', 'jzhildkjz', 'hhjlzdkjzd', 'hzjokjd', 'j,lkj,d', 'hjklkjn,ldz'),
(47, '2560', 'Magal', 'je suis un sénégalais', '34567', '67hAt', '30978', 'T45', 'App'),
(48, 'AHMAG', 'MOUNT', 'De la piere tailler', '51700', '65', '98000', 'VSL', 'PM'),
(49, '123', 'PJNB', 'jhjknf', 'J00', 'joie', 'jiu', 'jbbrj', 'jhgvr'),
(50, '111111', 'Touba', 'Bayale bou guandé', 'Dianatou', '123h', '23123', 'terrain nue', 'Pome'),
(51, '1234321', 'AZE', 'DFGHJK', 'scvbn,', 'bnhyrgr', '54567', 'T54', '4567');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
