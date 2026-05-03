-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 mai 2026 à 17:48
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ce_sitedg_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `activiteprogrammes`
--

DROP TABLE IF EXISTS `activiteprogrammes`;
CREATE TABLE IF NOT EXISTS `activiteprogrammes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateactivite` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `emplacement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeactivite` enum('Jeudi saint','Pie X','Investiture','Aspiranant','Promesse','Journee eucharistique','Sesssion paroiciale','Session decanale','Session diocesaine','Jeudi Adoration','Christ Roi','Autre') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` enum('en attente','effectif') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doyenne_id` bigint UNSIGNED NOT NULL,
  `paroisse_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `activiteprogrammes_slug_unique` (`slug`),
  KEY `activiteprogrammes_doyenne_id_foreign` (`doyenne_id`),
  KEY `activiteprogrammes_paroisse_id_foreign` (`paroisse_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activiteprogrammes`
--

INSERT INTO `activiteprogrammes` (`id`, `titre`, `description`, `dateactivite`, `start_time`, `end_time`, `emplacement`, `typeactivite`, `image1`, `image2`, `image3`, `statut`, `doyenne_id`, `paroisse_id`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Retraite de ressourcement spirituelle à caracciolini du 11 au 12/10', 'Thème General: Fortifiée dans l\'Eucharitie soyons temoin de paix,d\'unité,et porteur de l\'esperence', '2025-10-11', '08:30:00', '15:00:00', 'caracciolini ', 'Session decanale', 'activites/1759911833_1_goma2Retraite.jpg', NULL, NULL, 'effectif', 2, 4, '2025-10-07 06:37:10', '2025-10-08 06:50:55', 'retraite-de-ressourcement-spirituelle-a-caracciolini-du-11-au-1210'),
(2, 'Deviens ami de Jésus dans l’Eucharistie', '🌟 1. Sens du thème\nCe thème invite chaque membre de la Croisade Eucharistique à vivre une amitié véritable et personnelle avec Jésus, présent dans le Sacrement de l’Eucharistie.\nÊtre ami de Jésus, c’est plus qu’une simple dévotion : c’est vivre avec Lui, penser comme Lui, aimer comme Lui et Le rencontrer chaque jour dans la prière et la communion.\n🕊️ 2. L’Eucharistie : lieu de rencontre avec l’Ami véritable\nDans l’Eucharistie, Jésus nous attend, nous écoute, et se donne à nous.\nChaque fois que nous participons à la messe, Il nous dit comme à ses disciples :\n« Je ne vous appelle plus serviteurs… mais amis » (Jean 15,15).\nC’est là que naît et grandit notre amitié avec Lui : dans le silence du cœur, devant le Saint Sacrement, ou quand nous recevons son Corps à la communion.\n💖 3. Vivre cette amitié au quotidien\nDevenir ami de Jésus dans l’Eucharistie, c’est :\nPrier chaque jour, pour rester proche de Lui.\nParticiper à la messe avec amour et attention.\nFaire des sacrifices et des gestes d’amour pour Lui offrir notre journée.\nAimer les autres, car un vrai ami de Jésus aime aussi ses frères et sœurs.\nAinsi, chaque croisé devient un petit apôtre de l’amour eucharistique.\n🌼 4. Engagement du Croisé\nUn membre de la Croisade Eucharistique peut se redire souvent :\n« Jésus, mon ami, je veux te connaître, t’aimer et te servir.\nRends mon cœur semblable au tien, doux et humble. »\n📖 5. Verset biblique à méditer\n« Demeurez dans mon amour. »\n(Jean 15,9)\nC’est l’appel constant de Jésus : rester près de Lui, surtout dans l’Eucharistie, source d’amour, de paix et de force.', '2025-10-07', '09:00:00', '16:00:00', 'Bureau Diocesain', 'Session diocesaine', 'activites/1759826760_1_goma2Retraite.jpg', 'activites/1759826760_2_IMG-20240822-WA0106.jpg', NULL, 'effectif', 1, 1, '2025-10-07 06:46:00', '2025-10-08 06:51:09', 'deviens-ami-de-jesus-dans-leucharistie'),
(4, 'THEME : FAZILA ZA MWONGOZI', 'confert: VADEMECUM DES CHEFS CROISES page:47\nA. Fazila zilizo shina ya fazila zote\n✔ Imani(la Foi) – Kuwa na msimamo wa kiroho na kumtumainia Mungu katika kila jambo.\n✔ Matumaini(l’Esperance) – Kuwa na moyo wa kusubiri mema na kutokata tamaa hata katika magumu.\n✔ Mapendo(la Charité) – Kupenda watu wote kwa haki na bila ubaguzi, kama Mungu anavyotupenda. (1 Corinthiens 13:13)\nB. Fazila za Mwongozi\n✔ Uhaki(Justice) – Kutenda kwa haki bila upendeleo.\n✔ Uvumilivu(Patience) – Kuwa na subira(patience) kwa watu na hali tofauti(les difficultés et les erreurs des autres).\n✔ Uwema(Bonté) – Kuwa mwema kwa watu wote bila ubaguzi.\n✔ Upole(Douceur) – Kutawala kwa utulivu(calme) na busara(sagesse).\n✔ Amani(Paix) – Kuhakikisha kuna utulivu katika kundi.\n✔ Furaha(Joie) – Kuwa na moyo wa furaha ili kuwahamasisha(inspirer) wengine.\n✔ Ukunjufu(Ouverture) – Kuwa accueillant et chaleureux kwa wengine.\n✔ Huruma(Compassion) – una Ressentir et soulager mateso ya wengine nakuwasaidiya.\n✔ Kicheko(Sourire) – Kuwa na tabia ya kuleta furaha kwa watu.\n✔ Mwendo mtaratibu(Sérénité) – Kutenda kwa utulivu na mpangilio/ Agir avec calme et discipline.\n✔ Ukamilifu(Perfection) – Kutafuta ubora katika uongozi/ Chercher l’excellence.\n✔ Heshima(Respect) – Kuwaheshimu watu wote bila kujali nafasi zao(peu importe leur statut).\n✔ Mamlaka ya kuongoza(Autorité) – Kuwa na msimamo wa haki katika uongozi.\n✔ Utii(Obéissance) – Kuheshimu sheria na kufuata maagizo ya haki.\n✔ Ukadirifu(Reconnaissance) – Kutambua na kuthamini kazi ya wengine/Valoriser et apprécier les efforts des autres.\n✔ Hekima Nguvu(Sagesse et force) – Kuwa na busara na uthabiti wa kufanya maamuzi/ prendre des décisions justes et fermes.\n✔ Unyofu(Honnêteté) – Kutokuwa na unafiki wala ubinafsi(sincérité et intégrité).\n✔ Unyenyekevu(Humilité) – Kujishusha na kutanguliza wengine mbele.\n✔ Uhuru(Liberté) – Kutenda bila shinikizo la hofu(sans pression) au rushwa(ni la corruption).\n✔ Masikilizano(Écoute) – Kusikiliza na kuelewana na watu wote.\n✔ Wema(Bienveillance) – Kuwa na moyo wa kusaidia wengine.\n✔ Kuwa tayari (Disponibilité )– Kuwa tayari kwa kazi na majukumu ya uongozi.\n✔ Ibada(Prière) – Kuwa karibu na Mungu katika sala na matendo mema.\n✔ Daraka ya kuongoza(Responsabilité) – Kujua devoirs zako kama mwongozi nakuzitimiza na seriosite.\n✔ Juhudi(Effort) – Kufanya kazi kwa bidii bila uvivu.\n✔ Uangalifu(Vigilance) – Kuwa makini katika maamuzi/Être attentif et prudent dans ses décisions.\n✔ Adabu njema(Bonne conduite) – Kuwa na heshima kwa maneno na matendo.\n✔ Kukaribisha(Hospitalité) – Kuwa na moyo wa ukarimu(accueillant et généreux) kwa watu wote.\n✔ Mpendelevu(Préférence pour le bien) – Kutaka mema kwa watu wote.\n✔ Kusimamiya vizuri(Bonne gestion) – Kuongoza kwa mpangilio mzuri/ Organiser et diriger avec efficacité.\n✔ Uaminifu(Fidélité) – Kutokuwa msaliti au mwongo/ digne de confiance.\n✔ Ukweli(Vérité) – Kusema na kutenda kwa ukweli.\n✔ Kuweza kufundisha wengine(Capacité à enseigner) – Kuwa na maarifa ya kusaidia wengine.\n✔ Kusimamiya vema kundi – Kuhakikisha watu unaowaongoza wako sawa.\n✔ Zamiri safi(Conscience pure) – Kuwa na zamiri isiyo na lawama/ une morale irréprochable.\n✔ Uhodari sabiti(Courage et persévérance) – Faire preuve de détermination et de bravoure.\n✔ Usafi(Pureté) – Kuwa na usafi wa mwili, roho na mawazo/ Avoir un esprit, un cœur et un corps sains.', '2025-10-12', '08:30:00', '14:30:00', 'Paroisse notre dame de l\'Esperance', 'Jeudi saint', 'activites/1759912119_1_IMG-20250928-WA0014.jpg', NULL, NULL, 'effectif', 1, 1, '2025-10-08 06:28:39', '2025-10-11 10:38:03', 'theme-fazila-za-mwongozi');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ce-site-cache-25fbd468e8ee4d4c58505aa2f1dd154e:timer', 'i:1760265625;', 1760265625),
('ce-site-cache-25fbd468e8ee4d4c58505aa2f1dd154e', 'i:1;', 1760265625),
('ce-site-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1760174643;', 1760174643),
('ce-site-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1760174643),
('ce-site-cache-f36a88674acd0489925ae8009e109457:timer', 'i:1760265608;', 1760265608),
('ce-site-cache-f36a88674acd0489925ae8009e109457', 'i:1;', 1760265608),
('ce-site-cache-gaciersikuly@gmail.com|127.0.0.1:timer', 'i:1760265608;', 1760265608),
('ce-site-cache-gaciersikuly@gmail.com|127.0.0.1', 'i:1;', 1760265608);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activiteprogramme_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaires_activiteprogramme_id_foreign` (`activiteprogramme_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `countmembers`
--

DROP TABLE IF EXISTS `countmembers`;
CREATE TABLE IF NOT EXISTS `countmembers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count_croisillons` int NOT NULL,
  `count_feunouveau` int NOT NULL,
  `count_cadets` int NOT NULL,
  `count_equap` int NOT NULL,
  `annee` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countmembers`
--

INSERT INTO `countmembers` (`id`, `created_at`, `updated_at`, `count_croisillons`, `count_feunouveau`, `count_cadets`, `count_equap`, `annee`) VALUES
(1, '2025-10-11 07:13:31', '2025-10-11 07:13:39', 500, 600, 700, 400, 2025);

-- --------------------------------------------------------

--
-- Structure de la table `doyennes`
--

DROP TABLE IF EXISTS `doyennes`;
CREATE TABLE IF NOT EXISTS `doyennes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreaproximatifmembre` int DEFAULT NULL,
  `fonction` enum('zelateur','zelatrice') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `doyennes`
--

INSERT INTO `doyennes` (`id`, `designation`, `localisation`, `responsable`, `nombreaproximatifmembre`, `fonction`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Doyenne de Goma I', 'Nordkivu/Ville de Goma', 'Kambale muangaza', 1500, 'zelateur', '243990378202', '2025-09-26 09:55:28', '2025-10-03 10:18:55'),
(2, 'Doyenne de Goma II', 'Nordkivu Goma', 'Laurent Bayala', 800, 'zelateur', '0990378205', '2025-09-30 08:36:04', '2025-10-03 10:18:25'),
(3, 'Doyenne de Goma III', 'Nordkivu/Ville de Goma', 'Lucien Kavughe', 1000, 'zelateur', '+243 990 157 350', '2025-10-03 10:18:03', '2025-10-03 10:18:16'),
(4, 'Doyenne de Mweso', 'Nordkivu/Mweso', 'Laetitia Mbese', 500, 'zelatrice', '243990378202', '2025-10-03 10:19:39', '2025-10-03 10:19:39');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomcomplet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateenregistrement` date DEFAULT NULL,
  `paroisse_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membres_paroisse_id_foreign` (`paroisse_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_26_091144_create_doyennes_table', 1),
(5, '2025_08_26_091158_create_paroisses_table', 1),
(6, '2025_08_26_091215_create_photo_videos_table', 1),
(7, '2025_08_26_093134_create_membres_table', 1),
(8, '2025_08_26_093150_create_activiteprogrammes_table', 2),
(9, '2025_08_26_094604_create_ressources_table', 2),
(10, '2025_08_26_094620_create_contacts_table', 2),
(11, '2025_08_26_094643_create_newsletters_table', 2),
(12, '2025_09_20_090915_create_rapportdoyennes_table', 2),
(13, '2025_09_20_093408_create_commentaires_table', 2),
(14, '2025_09_20_095943_add_two_factor_columns_to_users_table', 2),
(15, '2025_09_20_100032_create_personal_access_tokens_table', 2),
(16, '2025_09_20_132252_add_role_to_users', 3),
(17, '2025_09_20_132558_add_slug_to_activiteprogramme', 4),
(20, '2025_10_08_083731_add_column_to_activiteprogrammes', 7),
(19, '2025_10_03_115314_create_niamwezis_table', 6),
(21, '2025_10_08_105101_add_typeressource_to_ressources', 8),
(22, '2025_10_07_093546_create_countmembers_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niamwezis`
--

DROP TABLE IF EXISTS `niamwezis`;
CREATE TABLE IF NOT EXISTS `niamwezis` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mois` enum('janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('actif','inactif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niamwezis`
--

INSERT INTO `niamwezis` (`id`, `designation`, `mois`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Nita onesha mfano wangu mwema katika mwenendo wangu wote', 'janvier', 'inactif', '2025-10-07 06:57:08', '2025-10-07 07:06:02'),
(2, 'Nita kuwa mtii kama mtoto Yesu', 'février', 'inactif', '2025-10-07 06:59:22', '2025-10-07 06:59:22'),
(3, 'Nita ombea Baba, Mama na Ndugu zangu wote', 'mars', 'inactif', '2025-10-07 06:59:49', '2025-10-07 06:59:49'),
(4, 'Nitaombea Wakristu wa Parukia yangu wapate kukomonika vema wakati wa Pasaka', 'avril', 'inactif', '2025-10-07 07:01:32', '2025-10-07 07:01:32'),
(5, 'Nitaombea Wakristu wapate kumpenda na kumheshimu Mama Bikira Maria', 'mai', 'inactif', '2025-10-07 07:02:31', '2025-10-07 07:02:31'),
(6, 'Nitaomba Usafi wa Moyo kwa mimi na kwa wenzangu; tena nitaombea Wakristu wote', 'juin', 'inactif', '2025-10-07 07:03:19', '2025-10-07 07:03:19'),
(7, 'Nitaombea Wakristu na wasioifanya Takatifu siku ya Mungu.', 'juillet', 'inactif', '2025-10-07 07:07:34', '2025-10-07 07:07:34'),
(8, 'Nitaombea wa Seminariste na Watawa wote.', 'août', 'inactif', '2025-10-07 07:08:02', '2025-10-07 14:04:42'),
(9, 'Nitaombea Maaskofu, Mapadri na Waalimu wote.', 'septembre', 'inactif', '2025-10-07 07:08:17', '2025-10-07 14:03:35'),
(10, 'Nitasaidia kwa kazi kubwa ya mwenezowadini, kwa sala na kwa mali.', 'octobre', 'actif', '2025-10-07 07:08:39', '2025-10-11 10:40:28'),
(11, 'Nitaombea Marehemu wote.', 'novembre', 'inactif', '2025-10-07 07:08:50', '2025-10-11 10:40:27'),
(12, 'Nitaombea wa Maskini na kuwasaidia.', 'décembre', 'inactif', '2025-10-07 07:09:05', '2025-10-07 07:09:05');

-- --------------------------------------------------------

--
-- Structure de la table `paroisses`
--

DROP TABLE IF EXISTS `paroisses`;
CREATE TABLE IF NOT EXISTS `paroisses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` enum('zelateur','zelatrice') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombreaproximatifmembre` int DEFAULT NULL,
  `doyenne_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paroisses_doyenne_id_foreign` (`doyenne_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paroisses`
--

INSERT INTO `paroisses` (`id`, `designation`, `localisation`, `longitude`, `latitude`, `responsable`, `fonction`, `contact`, `nombreaproximatifmembre`, `doyenne_id`, `created_at`, `updated_at`) VALUES
(1, 'Notre Dame d\'Afrique', 'Nordkivu/Ville de Goma', '29,4953', '-1,3945', 'Christelle', 'zelatrice', '243990378202', 800, 1, '2025-10-06 09:57:33', '2025-10-06 09:57:33'),
(4, 'Notre Dame du mont Carmel', 'Nordkivu/Ville de Goma', '29,4953', '-1,3945', 'Laurent Bayala', 'zelateur', '243990378204', 800, 2, '2025-10-08 06:24:48', '2025-10-08 06:24:48');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('graciersikuly@gmail.com', '$2y$12$E6NTPSFkM3jEXQ7OFfXBCepXQHi6FrV8sU6MjOBxXMnbCDgIrUUtW', '2025-09-20 08:32:03');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo_videos`
--

DROP TABLE IF EXISTS `photo_videos`;
CREATE TABLE IF NOT EXISTS `photo_videos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liens` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doyenne_id` bigint UNSIGNED NOT NULL,
  `paroisse_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_videos_doyenne_id_foreign` (`doyenne_id`),
  KEY `photo_videos_paroisse_id_foreign` (`paroisse_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo_videos`
--

INSERT INTO `photo_videos` (`id`, `designation`, `liens`, `doyenne_id`, `paroisse_id`, `created_at`, `updated_at`) VALUES
(1, 'Doyenne de Goma I investiture', 'photovideo/photos/1759755606_68e3bd560a015_20240821_124132.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:00:06'),
(2, 'Doyenne de Goma I investiture', 'photovideo/photos/1759755606_68e3bd560bcab_20240821_124222.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:00:06'),
(3, 'Doyenne de Goma I investiture', 'photovideo/photos/1759755606_68e3bd560d37d_20240821_124325.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:00:06'),
(4, 'Doyenne de Goma I investiture', 'photovideo/photos/1759755606_68e3bd560eab2_20240821_124327.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:00:06'),
(5, 'Doyenne de Goma I investiture', 'photovideo/photos/1759755606_68e3bd5612778_20240821_124400.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:00:06'),
(6, 'Doyenne de Goma I investiture 2024', 'photovideo/photos/1759755606_68e3bd56144f8_20240821_124403.jpg', 1, 1, '2025-10-06 11:00:06', '2025-10-06 11:15:08');

-- --------------------------------------------------------

--
-- Structure de la table `rapportdoyennes`
--

DROP TABLE IF EXISTS `rapportdoyennes`;
CREATE TABLE IF NOT EXISTS `rapportdoyennes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateenvoi` date NOT NULL,
  `lienfichier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `envoyer_par` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doyenne_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rapportdoyennes_doyenne_id_foreign` (`doyenne_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rapportdoyennes`
--

INSERT INTO `rapportdoyennes` (`id`, `designation`, `annee`, `dateenvoi`, `lienfichier`, `envoyer_par`, `doyenne_id`, `created_at`, `updated_at`) VALUES
(1, 'Rapport annuelle de la CE doyenne goma1', '2025', '2025-09-30', 'rapports/doyennes/1759226372_Facture- 2771025 (2).pdf', 'Gracieux', 1, '2025-09-30 07:59:32', '2025-09-30 07:59:32'),
(2, 'Rapport annuelle de la CE doyenne goma2', '2025', '2025-09-30', 'rapports/doyennes/1759228219_Facture- 321825.pdf', 'Gracieux sikuly', 1, '2025-09-30 08:30:19', '2025-09-30 08:30:19');

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

DROP TABLE IF EXISTS `ressources`;
CREATE TABLE IF NOT EXISTS `ressources` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeressource` enum('Theme','Hymne et chant','Collection theme','Collection livre','Radio maria','Autre') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `formatressource` enum('video','audio','pdf','image') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `description`, `typeressource`, `file`, `created_at`, `updated_at`, `formatressource`) VALUES
(1, 'HYMNES DE LA CE', 'Les Hymnes de la Croisade eucharistique', 'Hymne et chant', 'ressources/1759918519_THEME_FAZILA_ZA_MWONGOZI.pdf', '2025-10-06 07:42:36', '2025-10-08 08:15:19', 'pdf'),
(2, 'QUANTIQUE DE CHANT', 'Nyimbo ya nyiya ya msalaba siku kuu ya kwarezima', 'Hymne et chant', 'ressources/1759920412_AMANI YA KWELI.mp3', '2025-10-06 08:40:19', '2025-10-08 08:46:52', 'audio'),
(4, 'THEME : FAZILA ZA MWONGOZI', 'confert: VADEMECUM DES CHEFS CROISES page:47\nA. Fazila zilizo shina ya fazila zote\n✔ Imani(la Foi) – Kuwa na msimamo wa kiroho na kumtumainia Mungu katika kila jambo.\n✔ Matumaini(l’Esperance) – Kuwa na moyo wa kusubiri mema na kutokata tamaa hata katika magumu.\n✔ Mapendo(la Charité) – Kupenda watu wote kwa haki na bila ubaguzi, kama Mungu anavyotupenda. (1 Corinthiens 13:13)\nB. Fazila za Mwongozi\n✔ Uhaki(Justice) – Kutenda kwa haki bila upendeleo.\n✔ Uvumilivu(Patience) – Kuwa na subira(patience) kwa watu na hali tofauti(les difficultés et les erreurs des autres).\n✔ Uwema(Bonté) – Kuwa mwema kwa watu wote bila ubaguzi.\n✔ Upole(Douceur) – Kutawala kwa utulivu(calme) na busara(sagesse).\n✔ Amani(Paix) – Kuhakikisha kuna utulivu katika kundi.\n✔ Furaha(Joie) – Kuwa na moyo wa furaha ili kuwahamasisha(inspirer) wengine.\n✔ Ukunjufu(Ouverture) – Kuwa accueillant et chaleureux kwa wengine.\n✔ Huruma(Compassion) – una Ressentir et soulager mateso ya wengine nakuwasaidiya.\n✔ Kicheko(Sourire) – Kuwa na tabia ya kuleta furaha kwa watu.\n✔ Mwendo mtaratibu(Sérénité) – Kutenda kwa utulivu na mpangilio/ Agir avec calme et discipline.\n✔ Ukamilifu(Perfection) – Kutafuta ubora katika uongozi/ Chercher l’excellence.\n✔ Heshima(Respect) – Kuwaheshimu watu wote bila kujali nafasi zao(peu importe leur statut).\n✔ Mamlaka ya kuongoza(Autorité) – Kuwa na msimamo wa haki katika uongozi.\n✔ Utii(Obéissance) – Kuheshimu sheria na kufuata maagizo ya haki.\n✔ Ukadirifu(Reconnaissance) – Kutambua na kuthamini kazi ya wengine/Valoriser et apprécier les efforts des autres.\n✔ Hekima Nguvu(Sagesse et force) – Kuwa na busara na uthabiti wa kufanya maamuzi/ prendre des décisions justes et fermes.\n✔ Unyofu(Honnêteté) – Kutokuwa na unafiki wala ubinafsi(sincérité et intégrité).\n✔ Unyenyekevu(Humilité) – Kujishusha na kutanguliza wengine mbele.\n✔ Uhuru(Liberté) – Kutenda bila shinikizo la hofu(sans pression) au rushwa(ni la corruption).\n✔ Masikilizano(Écoute) – Kusikiliza na kuelewana na watu wote.\n✔ Wema(Bienveillance) – Kuwa na moyo wa kusaidia wengine.\n✔ Kuwa tayari (Disponibilité )– Kuwa tayari kwa kazi na majukumu ya uongozi.\n✔ Ibada(Prière) – Kuwa karibu na Mungu katika sala na matendo mema.\n✔ Daraka ya kuongoza(Responsabilité) – Kujua devoirs zako kama mwongozi nakuzitimiza na seriosite.\n✔ Juhudi(Effort) – Kufanya kazi kwa bidii bila uvivu.\n✔ Uangalifu(Vigilance) – Kuwa makini katika maamuzi/Être attentif et prudent dans ses décisions.\n✔ Adabu njema(Bonne conduite) – Kuwa na heshima kwa maneno na matendo.\n✔ Kukaribisha(Hospitalité) – Kuwa na moyo wa ukarimu(accueillant et généreux) kwa watu wote.\n✔ Mpendelevu(Préférence pour le bien) – Kutaka mema kwa watu wote.\n✔ Kusimamiya vizuri(Bonne gestion) – Kuongoza kwa mpangilio mzuri/ Organiser et diriger avec efficacité.\n✔ Uaminifu(Fidélité) – Kutokuwa msaliti au mwongo/ digne de confiance.\n✔ Ukweli(Vérité) – Kusema na kutenda kwa ukweli.\n✔ Kuweza kufundisha wengine(Capacité à enseigner) – Kuwa na maarifa ya kusaidia wengine.\n✔ Kusimamiya vema kundi – Kuhakikisha watu unaowaongoza wako sawa.\n✔ Zamiri safi(Conscience pure) – Kuwa na zamiri isiyo na lawama/ une morale irréprochable.\n✔ Uhodari sabiti(Courage et persévérance) – Faire preuve de détermination et de bravoure.\n✔ Usafi(Pureté) – Kuwa na usafi wa mwili, roho na mawazo/ Avoir un esprit, un cœur et un corps sains.', 'Theme', 'ressources/1759918396_THEME_FAZILA_ZA_MWONGOZI.pdf', '2025-10-08 08:13:16', '2025-10-08 08:13:16', 'pdf');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('soUk5hTxNOkdIp8ivfPbwlwl52oz3amRDnJpGkK7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnB6S29BOTlDMWFzS2ExQkdIT1A2ZGFsWEVhbTRGTzdEcnZvSnF0TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NldWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1761235613),
('mnJlR8vLSJjBydxl3XI00sPy2iBjjRF9wTRCBdM9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0hLcmg3ZWp3ZExoY3VEQnppTlFkbUtNYmZFZFRsUVYzbUhodkZwUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NldWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1760256105),
('mrjeteFcSuoLW9vAyZRllOQOSi4kdctav0Hvycnr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUZoR1dUN1g4RHlmM0hJald1OFM5RmNxZFlIYnFBeEtsTG44cDR5ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NldWlsIjt9fQ==', 1760267081),
('JhmeHlTmTzzZSBXkpQ526JgEEoshqiDO1vyIH6Gc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYTN5NXI5WTFlbnZlY2VrbUhzRkRZbmhLTUdaNEdQRk5hQmRNZDJvNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NldWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkRmRNYnVITGNjOUd5Znd1a255cldqdVk3b2xESU9jUkhlcWk4VFJpRzU1L0FITTZFZFRUbUciO30=', 1760188262);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'gracieux', 'graciersikuly@gmail.com', 'admin', NULL, '$2y$12$FdMbuHLcc9GyfwuknyrWjuY7olDIOcRHeqi8TRiG55/AHM6EdTTmG', NULL, NULL, NULL, 'TgylAhNy9NNwLImIgDKIS3DcGpV1UGYLKOZnIbd70Cii20SjNmEJd625ADe4', NULL, NULL, '2025-09-20 08:31:47', '2025-09-20 08:31:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
