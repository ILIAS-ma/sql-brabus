-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 03 nov. 2024 à 19:30
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `image_url` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `updated_at`, `titre`, `contenu`, `image_url`, `image_path`) VALUES
(28, 2, 'La Brabus E63 S est une berline qui se distingue par son mélange de puissance et d&#039;élégance. Avec son moteur V8 biturbo de 4,0 litres, elle développe jusqu&#039;à 700 chevaux, permettant des performances spectaculaires. Le design extérieur est rehaussé par des éléments sportifs et une attention particulière aux détails. L&#039;intérieur est luxueux, avec des finitions haut de gamme et des technologies avancées. C’est un choix idéal pour ceux qui recherchent une berline à la fois performante et raffinée.', '2024-11-01 15:00:27', '2024-11-02 19:01:07', 'Brabus E 63s', NULL, 'https://th.bing.com/th/id/OIP.0ZKh7-DazCTDL3Alg1h18wHaE7?rs=1&amp;pid=ImgDetMain', NULL),
(30, 2, 'La Brabus Rocket 900 est une supercar basée sur le Mercedes-AMG GT 63 S, portée à 900 chevaux pour des performances exceptionnelles. Avec un design audacieux en fibre de carbone et un intérieur luxueux en cuir et Alcantara, elle allie puissance extrême et raffinement. Sa vitesse de pointe approche les 330 km/h, faisant de cette voiture une véritable fusion entre luxe et performance poussée au maximum.', '2024-11-01 18:17:01', '2024-11-02 15:46:47', 'Brabus Rocket 900', NULL, 'https://www.topgear-magazine.fr/wp-content/uploads/2020/10/brabus_rocket_900_11.jpg', NULL),
(33, 2, 'Le Brabus GLE 63 est un SUV ultra-puissant, basé sur le Mercedes-AMG GLE 63, mais boosté par Brabus pour atteindre jusqu’à 800 chevaux. Il se distingue par son design agressif avec des éléments en fibre de carbone et des jantes spécifiques. À l’intérieur, le luxe est rehaussé avec des matériaux haut de gamme et des finitions exclusives. Ce modèle combine puissance extrême et raffinement pour une expérience de conduite unique.', '2024-11-02 15:45:58', '2024-11-02 15:45:58', 'Brabus Gle 63', NULL, 'https://th.bing.com/th/id/OIP.ZeW5i4Ox-r2sY79uczz6twAAAA?rs=1&amp;pid=ImgDetMain', NULL),
(34, 2, '\r\nLe Brabus G63 est une version ultra-puissante et exclusive du Mercedes-AMG G63, revisitée pour offrir jusqu&#039;à 800 chevaux. Avec son design imposant et des finitions en fibre de carbone, ce SUV allie robustesse et style unique. L&#039;intérieur, entièrement personnalisé, est paré de cuir fin et de détails exclusifs, offrant un confort luxueux. Ce modèle est idéal pour ceux qui recherchent un 4x4 au look agressif, doté de performances impressionnantes et d’un raffinement exceptionnel.', '2024-11-02 15:48:02', '2024-11-02 15:48:02', 'Brabus G63', NULL, 'https://imgr1.auto-motor-und-sport.de/Brabus-Black-Ops-800-169FullWidth-1f0c54c2-1598387.jpg', NULL),
(35, 2, 'Le BRABUS SLK63 est une version haute performance de la Mercedes-Benz SLK63 AMG, modifiée pour offrir une expérience de conduite exceptionnelle. Avec son moteur V8 rehaussé, il atteint des performances impressionnantes, accélérant de 0 à 100 km/h en quelques secondes. Son design agressif se distingue par des éléments aérodynamiques, des finitions en carbone et une peinture personnalisée. À l&amp;amp;#039;intérieur, un mélange de luxe et de sportivité s&amp;amp;#039;exprime à travers des sièges en cuir haut de gamme et des technologies avancées. Le BRABUS SLK63 allie élégance et puissance, en faisant un choix idéal pour les passionnés d&amp;amp;#039;automobile.', '2024-11-02 16:27:57', '2024-11-02 16:27:57', 'Brabus SLK63', NULL, 'https://www.autoblog.nl/files/2023/06/brabus-fostla-amg-sl-63-r232-2023-970-001-768x432.jpg', NULL),
(37, 2, 'La Porsche BRABUS est une version modifiée et haute performance des modèles Porsche, spécialement préparée par le célèbre préparateur automobile BRABUS. Avec une attention méticuleuse aux détails, elle offre une puissance accrue, un design distinctif et des améliorations techniques qui élèvent l&#039;expérience de conduite. Les modifications incluent des ajustements de suspension, des améliorations de moteur pour des performances supérieures, et un intérieur luxueusement personnalisé avec des matériaux haut de gamme. La Porsche BRABUS allie sportivité et luxe, créant ainsi une machine qui incarne l&#039;excellence automobile.', '2024-11-02 19:02:06', '2024-11-02 19:02:06', 'Brabus Rocket 900 R', NULL, 'https://th.bing.com/th/id/OIP.vUZbcWSCvbeufnteejxWMwHaEK?w=327&amp;h=184&amp;c=7&amp;r=0&amp;o=5&amp;dpr=1.1&amp;pid=1.7', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `is_admin`, `role`) VALUES
(2, 'admin@gmail.com', '$2y$10$FFtKjTrAvpXrkD4nvRncHOsGqe.96yz8h39lVtc6w7uHwD1P7wafm', 'admin', 1, 'admin'),
(27, 'user@gmail.com', '$2y$10$777kcSoe8/RlGkKBNWGzCeRiFEJPurbUDZWSRXPCVrLbN/PMOm.Eq', 'user1', 0, 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
