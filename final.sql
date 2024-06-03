-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Haz 2024, 21:37:08
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `final`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `password`, `email`, `is_active`, `created_at`) VALUES
(6, 'dwqdwq', 'dwqdwq', '4297f44b13955235245b2497399d7a93', 'berkay@gmail.com', 1, '2024-06-03 00:35:50');

--
-- Tetikleyiciler `users`
--
DROP TRIGGER IF EXISTS `users_delete`;
DELIMITER $$
CREATE TRIGGER `users_delete` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO users_log(id,name,surname,password,email,is_active,created_at)
VALUES(OLD.id,OLD.name,OLD.surname,OLD.password,OLD.email,OLD.is_active,OLD.created_at)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users_log`
--

DROP TABLE IF EXISTS `users_log`;
CREATE TABLE IF NOT EXISTS `users_log` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `users_log`
--

INSERT INTO `users_log` (`id`, `name`, `surname`, `password`, `email`, `is_active`, `created_at`) VALUES
(4, 'dwqdwq', 'dwqdwq', '549', 'mehmet.semih22@gmail.com', 1, '2024-06-02 23:28:32'),
(5, 'dwq', 'dwqwq', '43', 'berkay@gmail.com', 1, '2024-06-02 23:50:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
