-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table recordkeeper.boite_archives : ~0 rows (environ)

-- Listage des données de la table recordkeeper.bordereau_transferts : ~0 rows (environ)

-- Listage des données de la table recordkeeper.categories : ~0 rows (environ)
INSERT INTO `categories` (`id`, `categorie`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrative', NULL, NULL, NULL, '2023-09-10 18:31:51', '2023-09-18 00:18:02', NULL),
	(2, 'Économique', NULL, NULL, NULL, '2023-09-10 18:32:07', '2023-09-10 18:32:07', NULL),
	(3, 'Diplomatique', NULL, NULL, NULL, '2023-09-10 18:32:22', '2023-09-10 18:32:22', NULL);

-- Listage des données de la table recordkeeper.chemise_dossiers : ~0 rows (environ)

-- Listage des données de la table recordkeeper.demande_prets : ~0 rows (environ)

-- Listage des données de la table recordkeeper.demande_transferts : ~10 rows (environ)

-- Listage des données de la table recordkeeper.directions : ~0 rows (environ)
INSERT INTO `directions` (`id`, `direction`, `sigle`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Direction des Systèmes d\'Information', 'DSI', NULL, NULL, NULL, '2023-09-10 17:00:46', '2023-09-10 17:00:46', NULL),
	(2, 'Direction de la Planification de l\'Administration et des Finances', 'DPAF', NULL, NULL, NULL, '2023-09-10 17:01:39', '2023-09-10 17:01:39', NULL),
	(3, 'Direction Générale de la Sécurité Publique', 'DGSP', NULL, NULL, NULL, '2023-09-10 17:03:00', '2023-09-10 17:03:00', NULL),
	(4, 'Direction des Affaires Intérieures et des Cultes', 'DAIC', NULL, NULL, NULL, '2023-09-10 17:03:43', '2023-09-10 17:03:43', NULL),
	(5, 'Direction de la Coopération Technique de Sécurité', 'DCTS', NULL, NULL, NULL, '2023-09-10 17:04:34', '2023-09-10 17:04:34', NULL),
	(6, 'Secrétariat Général du Ministère', 'SGM', NULL, NULL, NULL, '2023-09-10 17:06:13', '2023-09-10 17:06:29', NULL),
	(7, 'Direction de Cabinet', 'DC', NULL, NULL, NULL, '2023-09-10 17:06:48', '2023-09-10 17:06:48', NULL),
	(8, 'Direction Générale de la Police Républicaine', 'DGPR', NULL, NULL, NULL, '2023-09-10 17:07:57', '2023-09-10 17:07:57', NULL),
	(9, 'Direction de l\'Etat Civil', 'DEC', NULL, NULL, NULL, '2023-09-10 17:09:01', '2023-09-10 17:10:26', NULL),
	(10, 'Nouvelle Direction 1', 'ND1', NULL, NULL, NULL, '2023-11-04 06:45:02', '2023-11-04 06:45:02', NULL);

-- Listage des données de la table recordkeeper.divisions : ~70 rows (environ)
INSERT INTO `divisions` (`id`, `division`, `sigle`, `service_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Division Accueil et de Gestion des Courriers', 'DAGC', 3, NULL, NULL, NULL, '2023-09-10 17:16:18', '2023-09-10 17:16:18', NULL),
	(2, 'Division de la Reprographie et de l\'Archivage des Dossiers', 'DRAD', 3, NULL, NULL, NULL, '2023-09-10 17:17:07', '2023-09-10 17:17:07', NULL),
	(3, 'Division des Infrastructures', 'DI', 2, NULL, NULL, NULL, '2023-09-10 17:27:42', '2023-09-10 17:27:42', NULL),
	(4, 'Division des Systemes', 'DS', 2, NULL, NULL, NULL, '2023-09-10 17:28:24', '2023-09-15 19:25:42', NULL),
	(5, 'Division des Exploitation et Helpdesk', 'DEH', 1, NULL, NULL, NULL, '2023-09-10 17:29:15', '2023-09-10 17:29:15', NULL),
	(6, 'Division des Etudes et Applications', 'DEA', 1, NULL, NULL, NULL, '2023-09-10 17:31:03', '2023-09-10 17:31:03', NULL),
	(7, 'Division Multimédia et e-Services', 'DMeS', 1, NULL, NULL, NULL, '2023-09-10 17:31:52', '2023-09-10 17:32:15', NULL),
	(8, 'Division de Pré-archivage', 'DPA', 4, NULL, NULL, NULL, '2023-09-10 17:32:55', '2023-09-10 17:32:55', NULL),
	(9, 'Division de la Gestion des Savoirs', 'DGS', 4, NULL, NULL, NULL, '2023-09-10 17:33:47', '2023-09-15 19:28:12', NULL),
	(10, 'Division Accueil et de Gestion des Courriers', 'DAGC', 5, NULL, NULL, NULL, '2023-09-10 17:57:14', '2023-09-10 17:57:14', NULL),
	(11, 'Aucune', 'AUCUNE/SIS', 2, NULL, NULL, NULL, '2023-09-15 20:10:32', '2023-09-15 20:10:32', NULL),
	(12, 'Aucune', 'AUCUN/SPGS', 4, NULL, NULL, NULL, '2023-09-15 20:11:33', '2023-09-15 20:11:33', NULL),
	(13, 'Aucune', 'AUCUNE/SEPTAE', 1, NULL, NULL, NULL, '2023-09-15 20:56:46', '2023-09-15 20:56:46', NULL),
	(14, 'Aucune', 'AUCUNE/S', 3, NULL, NULL, NULL, '2023-09-15 20:57:38', '2023-09-15 20:57:38', NULL),
	(15, 'Aucune', 'AUCUN', 9, NULL, NULL, NULL, '2023-09-15 21:00:11', '2023-09-15 21:00:11', NULL),
	(16, 'Aucune', 'AUCUN/SD', 5, NULL, NULL, NULL, '2023-09-16 12:15:19', '2023-09-16 12:15:19', NULL),
	(17, 'Aucune', 'AUCUN/SPSe', 6, NULL, NULL, NULL, '2023-09-16 12:15:46', '2023-09-16 12:15:46', NULL),
	(18, 'Aucune', 'AUCUN/CGE', 7, NULL, NULL, NULL, '2023-09-16 12:16:01', '2023-09-16 12:16:01', NULL),
	(19, 'Aucune', 'AUCUN/SES', 8, NULL, NULL, NULL, '2023-09-16 12:16:39', '2023-09-16 12:16:39', NULL),
	(20, 'Aucune', 'AUCUN/SGR', 11, NULL, NULL, NULL, '2023-09-16 12:17:15', '2023-09-16 12:17:15', NULL),
	(21, 'Aucune', 'AUCUN/SCGR', 12, NULL, NULL, NULL, '2023-09-16 12:17:40', '2023-09-16 12:17:40', NULL),
	(22, 'Aucune', 'AUCUN/RC', 13, NULL, NULL, NULL, '2023-09-16 12:18:35', '2023-09-16 12:18:35', NULL),
	(23, 'Aucune', 'AUCUN', 10, NULL, NULL, NULL, '2023-09-16 12:19:00', '2023-09-16 12:19:00', NULL),
	(24, 'Division reprographie, saisie et archivage des dossiers', 'DRSA', 5, NULL, NULL, NULL, '2023-09-16 12:26:53', '2023-09-16 12:26:53', NULL),
	(25, 'Division de l\'analyse prospective et de la mobilisation des financements', 'DAPMF', 6, NULL, NULL, NULL, '2023-09-16 12:31:10', '2023-09-16 12:31:10', NULL),
	(26, 'Division de la programmation, de la budgétisation et du suivi-évaluation du programme budgétaire <<pilotage et soutien aux services du Ministère>>', 'DPBSePB', 6, NULL, NULL, NULL, '2023-09-16 12:33:39', '2023-09-16 12:33:39', NULL),
	(27, 'Division de la programmation, de la budgétisation et du suivi-évaluation des programmes budgétaires << Sécurité publique >> et  << Protection civile >>', 'DPBSePB', 6, NULL, NULL, NULL, '2023-09-16 12:40:41', '2023-09-16 12:40:41', NULL),
	(28, 'Division de la programmation, de la budgétisation et du suivi-évaluation des programmes budgétaires << Affaires intérieures >> et << Gestion intégrée des espaces frontaliers >>', 'DPBSePB', 6, NULL, NULL, NULL, '2023-09-16 12:42:54', '2023-09-16 12:42:54', NULL),
	(29, 'Division de la programmation et du suivi des investissements publics', 'DPSIP', 6, NULL, NULL, NULL, '2023-09-16 12:43:48', '2023-09-16 12:43:48', NULL),
	(30, 'Division genre', 'DG', 7, NULL, NULL, NULL, '2023-09-16 12:44:50', '2023-09-16 12:44:50', NULL),
	(31, 'Division Environnement', 'DE', 7, NULL, NULL, NULL, '2023-09-16 12:45:20', '2023-09-16 12:45:20', NULL),
	(32, 'Division de l\'analyse, de la gestion des bases de données et de la digitalisation', 'DAGBDD', 8, NULL, NULL, NULL, '2023-09-16 12:46:56', '2023-09-16 12:46:56', NULL),
	(33, 'Division de la collecte, du traitement, de l\'analyse des données et de la diffusion des statistiques', 'DCTADDS', 8, NULL, NULL, NULL, '2023-09-16 17:54:40', '2023-09-16 17:54:40', NULL),
	(34, 'Division des études, de la prévision et de la projection', 'DEPP', 8, NULL, NULL, NULL, '2023-09-16 17:56:13', '2023-09-16 17:56:13', NULL),
	(35, 'Division de la cartographie et de l\'analyse spatiale des statistiques', 'DCASP', 8, NULL, NULL, NULL, '2023-09-16 17:57:16', '2023-09-16 17:57:16', NULL),
	(36, 'Division de la gestion et du suivi des carrières', 'DPSC', 11, NULL, NULL, NULL, '2023-09-16 18:00:08', '2023-09-16 18:00:08', NULL),
	(37, 'Division de la planification, du recrutement et de la formation', 'DPRF', 11, NULL, NULL, NULL, '2023-09-16 18:04:10', '2023-09-16 18:04:10', NULL),
	(38, 'Division des affaires disciplinaires, du contentieux et du dialogue social', 'DADCDS', 11, NULL, NULL, NULL, '2023-09-16 18:05:10', '2023-09-16 18:05:10', NULL),
	(39, 'Division de la comptabilité budgétaire', 'DCB', 12, NULL, NULL, NULL, '2023-09-16 18:09:33', '2023-09-16 18:09:33', NULL),
	(40, 'Division de la comptabilité des matières et de la gestion des ressources financières', 'DCMGRF', 12, NULL, NULL, NULL, '2023-09-16 18:10:34', '2023-09-16 18:10:34', NULL),
	(41, 'Division engagement et du suivi des dépenses', 'DESD', 12, NULL, NULL, NULL, '2023-09-16 18:11:52', '2023-09-16 18:11:52', NULL),
	(42, 'Division des services généraux', 'DSG', 12, NULL, NULL, NULL, '2023-09-16 18:12:36', '2023-09-16 18:12:36', NULL),
	(43, 'Division de la caisse centrale', 'DCC', 13, NULL, NULL, NULL, '2023-09-16 18:13:30', '2023-09-16 18:13:30', NULL),
	(44, 'Division de l\'approvisionnement en valeurs inactives, du suivi et du contrôle des opérations de dépense', 'DAVAISCOD', 13, NULL, NULL, NULL, '2023-09-16 18:15:01', '2023-09-16 18:15:01', NULL),
	(45, 'Division acceuil et gestion du courrier', 'DAGC', 15, NULL, NULL, NULL, '2023-09-16 18:36:47', '2023-09-16 18:36:47', NULL),
	(46, 'Division reprographie, saisie et archivage des dossiers', 'DRSAD', 15, NULL, NULL, NULL, '2023-09-16 18:39:01', '2023-09-16 18:39:01', NULL),
	(47, 'Aucune', 'AUCUN/SD', 15, NULL, NULL, NULL, '2023-09-16 18:54:40', '2023-09-16 18:54:40', NULL),
	(48, 'Division des associations', 'DA', 16, NULL, NULL, NULL, '2023-09-16 18:55:18', '2023-09-16 18:55:18', NULL),
	(49, 'Division des cultes et de la chifferie traditionnelle', 'DCCT', 16, NULL, NULL, NULL, '2023-09-16 18:57:35', '2023-09-16 18:57:35', NULL),
	(50, 'Aucune', 'AUCUN/SACCT', 16, NULL, NULL, NULL, '2023-09-16 18:58:13', '2023-09-16 18:58:13', NULL),
	(51, 'Division du secteur funéraire', 'DSF', 17, NULL, NULL, NULL, '2023-09-16 18:59:59', '2023-09-16 18:59:59', NULL),
	(52, 'Division de la transhumance', 'DT', 17, NULL, NULL, NULL, '2023-09-16 19:02:52', '2023-09-16 19:02:52', NULL),
	(53, 'Aucune', 'AUCUN/SFT', 17, NULL, NULL, NULL, '2023-09-16 19:03:39', '2023-09-16 19:03:39', NULL),
	(54, 'Division de la règlementation et de l\'étude des dossiers', 'DRED', 18, NULL, NULL, NULL, '2023-09-16 19:09:25', '2023-09-16 19:09:25', NULL),
	(55, 'Division de la coordination et du contrôle', 'DCC', 18, NULL, NULL, NULL, '2023-09-16 19:10:01', '2023-09-16 19:10:01', NULL),
	(56, 'Aucune', 'AUCUN/SDBLR', 18, NULL, NULL, NULL, '2023-09-16 19:10:30', '2023-09-16 19:10:30', NULL),
	(57, 'Aucune', 'AUCUN', 14, NULL, NULL, NULL, '2023-09-16 19:10:52', '2023-09-16 19:10:52', NULL),
	(58, 'Aucune', 'AUCUN', 19, NULL, NULL, NULL, '2023-09-16 19:19:22', '2023-09-16 19:19:22', NULL),
	(59, 'Division accueil, courrier et suivi', 'DACS', 20, NULL, NULL, NULL, '2023-09-16 19:20:28', '2023-09-16 19:20:28', NULL),
	(60, 'Division reprographie, saisie, liaison et classement', 'DRSLC', 20, NULL, NULL, NULL, '2023-09-16 19:23:07', '2023-09-16 19:23:07', NULL),
	(61, 'Aucune', 'AUCUN/SD', 20, NULL, NULL, NULL, '2023-09-16 19:24:19', '2023-09-16 19:24:19', NULL),
	(62, 'Division des accords et autres instruments de coopération', 'DAAIC', 21, NULL, NULL, NULL, '2023-09-16 19:25:25', '2023-09-16 19:25:25', NULL),
	(63, 'Division de maintien de la paix', 'DMP', 21, NULL, NULL, NULL, '2023-09-16 19:25:48', '2023-09-16 19:25:48', NULL),
	(64, 'Aucune', 'AUCUN/SAMP', 21, NULL, NULL, NULL, '2023-09-16 19:26:11', '2023-09-16 19:26:11', NULL),
	(65, 'Aucune', 'AUCUN/SRIS', 22, NULL, NULL, NULL, '2023-09-16 19:26:53', '2023-09-16 19:26:53', NULL),
	(66, 'Division des études et de prospection', 'DEP', 22, NULL, NULL, NULL, '2023-09-16 19:27:35', '2023-09-16 19:27:35', NULL),
	(67, 'Division du suivi évaluation', 'DSE', 22, NULL, NULL, NULL, '2023-09-16 19:27:59', '2023-09-16 19:27:59', NULL),
	(68, 'Aucune', 'AUCUNE', 23, NULL, NULL, NULL, '2023-11-04 06:45:02', '2023-11-04 06:45:02', NULL),
	(69, 'Aucune', 'AUCUNE', 24, NULL, NULL, NULL, '2023-11-04 06:55:33', '2023-11-04 06:55:33', NULL),
	(70, 'Première Division du PSND1', 'PDPSND1', 24, NULL, NULL, NULL, '2023-11-04 07:03:31', '2023-11-04 07:03:31', NULL);

-- Listage des données de la table recordkeeper.documents : ~6 rows (environ)
INSERT INTO `documents` (`id`, `nom`, `timbre`, `code`, `objet`, `emetteur`, `recepteur`, `motclefs`, `datecreation`, `disponibilite`, `archive`, `prete`, `communicable`, `standardDUAFinished`, `centralDUAFinished`, `document`, `nbrdownload`, `nbrconsult`, `archived_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `division_id`, `service_id`, `direction_id`, `nature_document_id`, `demande_transfert_id`, `chemise_dossier_id`) VALUES
	(1, 'Autorisation de stage', 'N°564/DPAF/MISP/SGHTE/DPRF/SA', NULL, 'Autorisation de stage', 'DPAF', 'Daniel', '#Économique#Commerciale', '2023-10-31', 0, 0, 0, 1, '2013-06-01', '2013-06-01', 'documents/Exercices en C++.pdf', 0, 0, NULL, NULL, NULL, NULL, '2023-11-04 15:08:42', '2024-01-20 04:07:07', NULL, 29, 6, 2, 4, NULL, NULL),
	(2, 'Rapport de stage', 'N°1164/DPAF/MISP/SGHTE/DPRF/SA', NULL, 'Rapport de stage', 'DPAF', 'Daniel', '#Économique#Commerciale#Administratif', '2023-06-01', 0, 0, 0, 1, '2013-06-01', '2025-06-01', 'documents/Pointeurs.pdf', 0, 0, NULL, 'Lama Lama', NULL, NULL, '2024-01-20 03:21:49', '2024-01-20 04:07:07', NULL, 18, 7, 2, 2, NULL, NULL),
	(3, 'Décision de stage', 'N°0064/DPAF/MISP/SGHTE/DPRF/SA', NULL, 'Décision de stage', 'DPAF', 'Daniel', '#Économique#Commerciale', '2022-12-29', 0, 0, 0, 1, '2015-12-29', '2013-12-29', 'documents/Pointeurs.pdf', 0, 0, NULL, 'Lama Lama', NULL, NULL, '2024-01-20 03:23:10', '2024-01-20 04:07:07', NULL, 42, 12, 2, 2, NULL, NULL),
	(4, 'Autorisation de soutenance', 'N°774/DAIC/MISP/SGHTE/DPRF/SA', NULL, 'Autorisation de soutenance', 'DAIC', 'Daniel', '#Commerciale#Administratif', '2023-08-03', 0, 0, 0, 1, '2015-08-03', '2015-08-03', 'documents/0172-formation-base-donnees.pdf', 0, 0, NULL, 'Kama Kama', NULL, NULL, '2024-01-20 03:25:06', '2024-01-20 04:07:07', NULL, 54, 18, 4, 4, NULL, NULL),
	(5, 'Rapport de soutenance', 'N°33334/DPAF/MISP/SGHTE/DPRF/SA', NULL, 'Rapport de soutenance', 'DPAF', 'Daniel', '#Économique#Commerciale', '2023-09-27', 0, 0, 0, 1, '2014-09-27', '2019-09-27', 'documents/Apprenez Ã  programmer en C .pdf', 0, 0, NULL, 'Kama Kama', NULL, NULL, '2024-01-20 03:26:02', '2024-01-20 04:07:07', NULL, 48, 16, 4, 5, NULL, NULL),
	(6, 'Mémoire de soutenance', 'N°004/DAIC/MISP/SGHTE/DPRF/SA', NULL, 'Mémoire de soutenance', 'DPAF', 'Daniel', '#Économique#Commerciale', '2023-08-02', 0, 0, 0, 1, '2016-08-02', '2009-08-02', 'documents/0764-la-programmation-en-c-moderne.pdf', 0, 0, NULL, 'Kama Kama', NULL, NULL, '2024-01-20 03:27:27', '2024-01-20 04:07:07', NULL, 46, 15, 4, 3, NULL, NULL);

-- Listage des données de la table recordkeeper.document_fonction : ~0 rows (environ)
INSERT INTO `document_fonction` (`document_id`, `fonction_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(1, 3),
	(1, 4),
	(4, 4),
	(5, 4);

-- Listage des données de la table recordkeeper.failed_jobs : ~0 rows (environ)

-- Listage des données de la table recordkeeper.fonctions : ~0 rows (environ)
INSERT INTO `fonctions` (`id`, `fonction`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Directeur', NULL, NULL, NULL, '2023-09-10 18:28:05', '2023-09-10 18:28:05', NULL),
	(2, 'Chef Service', NULL, NULL, NULL, '2023-09-10 18:28:18', '2023-09-10 18:28:18', NULL),
	(3, 'Chargé', NULL, NULL, NULL, '2023-09-10 18:28:35', '2023-09-10 18:28:35', NULL),
	(4, 'Chef Division', NULL, NULL, NULL, '2023-09-10 18:28:52', '2023-09-10 18:28:52', NULL);

-- Listage des données de la table recordkeeper.jobs : ~0 rows (environ)
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
	(1, 'default', '{"uuid":"41cc67df-a2b0-4f4f-91d3-2925ad35b64e","displayName":"App\\\\Jobs\\\\DemandePretJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\DemandePretJob","command":"O:23:\\"App\\\\Jobs\\\\DemandePretJob\\":3:{s:7:\\"demande\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:22:\\"App\\\\Models\\\\DemandePret\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:11:\\"routeAccept\\";s:48:\\"http:\\/\\/localhost:8000\\/documents\\/demande\\/accept\\/1\\";s:11:\\"routeReject\\";s:48:\\"http:\\/\\/localhost:8000\\/documents\\/demande\\/reject\\/1\\";}"}}', 0, NULL, 1695001957, 1695001957),
	(2, 'default', '{"uuid":"0f482be8-0297-4284-90f8-86ecfe2ebc05","displayName":"App\\\\Jobs\\\\DemandePretJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\DemandePretJob","command":"O:23:\\"App\\\\Jobs\\\\DemandePretJob\\":3:{s:7:\\"demande\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":5:{s:5:\\"class\\";s:22:\\"App\\\\Models\\\\DemandePret\\";s:2:\\"id\\";i:2;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";s:15:\\"collectionClass\\";N;}s:11:\\"routeAccept\\";s:48:\\"http:\\/\\/localhost:8000\\/documents\\/demande\\/accept\\/2\\";s:11:\\"routeReject\\";s:48:\\"http:\\/\\/localhost:8000\\/documents\\/demande\\/reject\\/2\\";}"}}', 0, NULL, 1695002141, 1695002141);

-- Listage des données de la table recordkeeper.migrations : ~0 rows (environ)

-- Listage des données de la table recordkeeper.model_has_permissions : ~0 rows (environ)
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 1),
	(4, 'App\\Models\\User', 1),
	(5, 'App\\Models\\User', 1),
	(6, 'App\\Models\\User', 1),
	(7, 'App\\Models\\User', 1),
	(8, 'App\\Models\\User', 1),
	(9, 'App\\Models\\User', 1),
	(10, 'App\\Models\\User', 1),
	(11, 'App\\Models\\User', 1),
	(12, 'App\\Models\\User', 1),
	(13, 'App\\Models\\User', 1),
	(14, 'App\\Models\\User', 1),
	(15, 'App\\Models\\User', 1),
	(16, 'App\\Models\\User', 1),
	(17, 'App\\Models\\User', 1),
	(18, 'App\\Models\\User', 1),
	(19, 'App\\Models\\User', 1),
	(20, 'App\\Models\\User', 1),
	(5, 'App\\Models\\User', 2),
	(6, 'App\\Models\\User', 2),
	(7, 'App\\Models\\User', 2),
	(8, 'App\\Models\\User', 2),
	(9, 'App\\Models\\User', 2),
	(20, 'App\\Models\\User', 2),
	(10, 'App\\Models\\User', 3),
	(16, 'App\\Models\\User', 3),
	(11, 'App\\Models\\User', 4),
	(12, 'App\\Models\\User', 4),
	(13, 'App\\Models\\User', 4),
	(14, 'App\\Models\\User', 4),
	(15, 'App\\Models\\User', 4),
	(17, 'App\\Models\\User', 4),
	(18, 'App\\Models\\User', 4),
	(19, 'App\\Models\\User', 4),
	(1, 'App\\Models\\User', 6),
	(2, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 6),
	(4, 'App\\Models\\User', 6),
	(10, 'App\\Models\\User', 7),
	(16, 'App\\Models\\User', 7);

-- Listage des données de la table recordkeeper.model_has_roles : ~0 rows (environ)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 1),
	(4, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(4, 'App\\Models\\User', 4),
	(1, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 7);

-- Listage des données de la table recordkeeper.nature_documents : ~6 rows (environ)
INSERT INTO `nature_documents` (`id`, `nature`, `duree_communicabilite`, `dua_bureaux`, `dua_service_pre_archivage`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `categorie_id`) VALUES
	(1, 'Decret', 0, 0, 0, NULL, NULL, NULL, '2023-09-10 18:32:36', '2023-09-10 18:32:36', NULL, 2),
	(2, 'Arrêté', 0, 0, 0, NULL, NULL, NULL, '2023-09-10 18:32:50', '2023-09-10 18:32:50', NULL, 2),
	(3, 'Bordereau', 0, 0, 0, NULL, NULL, NULL, '2023-09-10 18:33:07', '2023-09-10 18:33:45', NULL, 2),
	(4, 'Lettre', 0, 0, 0, NULL, NULL, NULL, '2023-09-10 18:33:22', '2023-09-10 18:33:22', NULL, 2),
	(5, 'Courrier', 0, 0, 0, NULL, NULL, NULL, '2023-09-10 18:33:32', '2023-09-10 18:33:40', NULL, 2),
	(6, 'Nouvelle Nature', 0, 0, 0, NULL, NULL, NULL, '2023-11-04 07:49:33', '2023-11-04 07:49:33', NULL, 3);

-- Listage des données de la table recordkeeper.password_reset_tokens : ~0 rows (environ)

-- Listage des données de la table recordkeeper.permissions : ~0 rows (environ)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `type_role_id`) VALUES
	(1, 'Demander un Prêt', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(2, 'Consulter un Document', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(3, 'Rechercher un Document', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(4, 'Télécharger un Document', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(5, 'Gestion des Services', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(6, 'Gestion des Fonctions', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(7, 'Gestion des Divisions', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(8, 'Gestion des Directions', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(9, 'Gestion des Utilisateurs', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(10, 'Gestion des Documents', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(11, 'Gestion des Catégories', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(12, 'Gestion des Boîtes Archives', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(13, 'Gestion des Rayons Rangements', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(14, 'Gestion des Chemises Dossiers', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(15, 'Gestion des Natures de Documents', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(16, 'Gestion des Demandes de Transferts', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(17, 'Gestion des Classements', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(18, 'Gestion des Demandes de Prêts', 'web', NULL, NULL, NULL, '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 4),
	(19, 'Gestion des Demandes de Transferts du MISP', 'web', NULL, NULL, NULL, '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 4),
	(20, 'Gestion des Rôles', 'web', NULL, NULL, NULL, '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 3);

-- Listage des données de la table recordkeeper.personal_access_tokens : ~0 rows (environ)

-- Listage des données de la table recordkeeper.rapport_prets : ~0 rows (environ)

-- Listage des données de la table recordkeeper.rayon_rangements : ~0 rows (environ)

-- Listage des données de la table recordkeeper.roles : ~0 rows (environ)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `type_role_id`) VALUES
	(1, 'Utilisateur', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(2, 'Administrateur', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(3, 'Gestionnaire-Standard', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(4, 'Gestionnaire-Central', 'web', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4);

-- Listage des données de la table recordkeeper.role_has_permissions : ~0 rows (environ)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(20, 2),
	(10, 3),
	(16, 3),
	(11, 4),
	(12, 4),
	(13, 4),
	(14, 4),
	(15, 4),
	(17, 4),
	(18, 4),
	(19, 4);

-- Listage des données de la table recordkeeper.services : ~0 rows (environ)
INSERT INTO `services` (`id`, `service`, `sigle`, `direction_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Service Exploitation, Postes de Travail, Application et E-services', 'SEPTAE', 1, NULL, NULL, NULL, '2023-09-10 17:12:26', '2023-09-10 17:12:26', NULL),
	(2, 'Services Infrastructures et Systèmes', 'SIS', 1, NULL, NULL, NULL, '2023-09-10 17:13:47', '2023-09-10 17:13:47', NULL),
	(3, 'Secrétariat', 'S / DSI', 1, NULL, NULL, NULL, '2023-09-10 17:14:23', '2023-09-10 17:34:59', NULL),
	(4, 'Services de Pré-archivage et de Gestion des Savoirs', 'SPGS', 1, NULL, NULL, NULL, '2023-09-10 17:15:16', '2023-09-10 17:15:16', NULL),
	(5, 'Secrétariat de Direction', 'SD / DPAF', 2, NULL, NULL, NULL, '2023-09-10 17:36:14', '2023-09-10 17:52:42', NULL),
	(6, 'Service de la Planification et du Suivi-évaluation', 'SPSe', 2, NULL, NULL, NULL, '2023-09-10 17:53:34', '2023-09-10 17:53:34', NULL),
	(7, 'Cellule Genre et Environnement', 'CGE', 2, NULL, NULL, NULL, '2023-09-10 17:54:13', '2023-09-10 17:54:13', NULL),
	(8, 'Service des Etudes et de la Statistique', 'SES', 2, NULL, NULL, NULL, '2023-09-10 17:54:53', '2023-09-10 17:54:53', NULL),
	(9, 'Aucun', 'AUCUN/DSI', 1, NULL, NULL, NULL, '2023-09-14 15:36:32', '2023-09-15 19:15:26', NULL),
	(10, 'Aucun', 'AUCUN/DPAF', 2, NULL, NULL, NULL, '2023-09-15 19:33:51', '2023-09-15 19:33:51', NULL),
	(11, 'Service de la Gestion des Ressources humaines, du Travail et des Emplois', 'SGRTE', 2, NULL, NULL, NULL, '2023-09-15 19:37:35', '2023-09-15 19:37:35', NULL),
	(12, 'Service des Comptabilités, de la Gestion des Ressources financières, matérielles et de la logistique', 'SCGR', 2, NULL, NULL, NULL, '2023-09-15 19:39:06', '2023-09-15 19:39:06', NULL),
	(13, 'La Régie centrale', 'RC', 2, NULL, NULL, NULL, '2023-09-15 19:39:51', '2023-09-15 19:39:51', NULL),
	(14, 'Aucun', 'AUCUN/DAIC', 4, NULL, NULL, NULL, '2023-09-16 18:15:43', '2023-09-16 18:18:33', NULL),
	(15, 'Secrétariat de direction', 'SD/DAIC', 4, NULL, NULL, NULL, '2023-09-16 18:19:26', '2023-09-16 18:19:26', NULL),
	(16, 'Service des associations, des cultes et de la chifferie traditionnelle', 'SACCT', 4, NULL, NULL, NULL, '2023-09-16 18:21:08', '2023-09-16 18:21:08', NULL),
	(17, 'Service du funéraire et de la transhumance', 'SFT', 4, NULL, NULL, NULL, '2023-09-16 18:21:44', '2023-09-16 18:21:44', NULL),
	(18, 'Service des débits de boissons et des lieux de réjouissances', 'SDBLR', 4, NULL, NULL, NULL, '2023-09-16 18:22:37', '2023-09-16 18:22:37', NULL),
	(19, 'Aucun', 'AUCUN/DCTS', 5, NULL, NULL, NULL, '2023-09-16 19:15:01', '2023-09-16 19:15:01', NULL),
	(20, 'Secrétariat de direction', 'SD', 5, NULL, NULL, NULL, '2023-09-16 19:15:36', '2023-09-16 19:15:36', NULL),
	(21, 'Service des accords et de maintien de la paix', 'SAMP', 5, NULL, NULL, NULL, '2023-09-16 19:16:36', '2023-09-16 19:16:36', NULL),
	(22, 'Service des relations internationales de sécurité', 'SRIS', 5, NULL, NULL, NULL, '2023-09-16 19:17:20', '2023-09-16 19:17:20', NULL),
	(23, 'Aucun', 'AUCUN', 10, NULL, NULL, NULL, '2023-11-04 06:45:02', '2023-11-04 06:45:02', NULL),
	(24, 'Premier Service de la ND1', 'PSND1', 10, NULL, NULL, NULL, '2023-11-04 06:55:33', '2023-11-04 06:55:33', NULL);

-- Listage des données de la table recordkeeper.statistiques : ~0 rows (environ)
INSERT INTO `statistiques` (`id`, `date`, `nbrDocArchived`, `nbrDocCreated`, `created_at`, `updated_at`) VALUES
	(1, '2023-09-14', 0, 1, '2023-09-14 13:34:45', '2023-09-14 13:34:45'),
	(2, '2023-09-14', 0, 1, '2023-09-14 13:35:05', '2023-09-14 13:35:05');

-- Listage des données de la table recordkeeper.type_roles : ~0 rows (environ)
INSERT INTO `type_roles` (`id`, `libelle`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Utilisateur', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(2, 'Gestionnaire-Standard', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(3, 'Administrateur', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(4, 'Gestionnaire-Central', NULL, NULL, NULL, '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL);

-- Listage des données de la table recordkeeper.users : ~0 rows (environ)
INSERT INTO `users` (`id`, `matricule`, `nom`, `prenoms`, `email`, `datenaissance`, `sexe`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `haschangedpwd`, `remember_token`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `division_id`, `service_id`, `direction_id`, `fonction_id`) VALUES
	(1, 2632646, 'Doe', 'Jonh', 'jonh@doe.fr', '1975-02-06', 'masculin', '2023-09-10 16:55:59', '$2y$10$bDOML/RLGtSidQbrpxr.XOV4fUlCmF2Zez6vLEqRBv8i1Mhqal7FC', NULL, NULL, NULL, 0, 'YL1toHR4I3yOvtQ7Tj0cAZMS682mzJYdVAgiU5LzvfNgRTYIxI25Ze0gopqW', NULL, NULL, NULL, '2023-09-10 16:55:59', '2023-09-10 19:10:45', NULL, 1, 1, 1, 1),
	(2, 8029737, 'Lawson', 'Tony', 'tony@lawson.fr', '1995-07-27', 'masculin', '2023-09-10 16:55:59', '$2y$10$Ri8xW44rtbR8mLrY/Noh/.Wue5WzX6Il0uximnn22gF6Lv89nnoCy', NULL, NULL, NULL, 0, '4JbcbZD8WQtayPE8BanRiNPgs94NsRLLqwip95bDNwO87X7bEQ6wjpDThyfN', NULL, NULL, NULL, '2023-09-10 16:55:59', '2023-09-13 16:02:13', NULL, 4, 1, 1, 1),
	(3, 1804281, 'Lama', 'Lama', 'lama@lama.fr', '2001-12-31', 'masculin', '2023-09-10 16:55:59', '$2y$10$YicNDqYKsa8bp8znD3xEhOReV5et0LelmVmcv1vN7XKwa7waXPH/K', NULL, NULL, NULL, 0, 'FTY8kc9zpVJLpIbsr19uP4SyD777m8IW3DNDQUPnezaBFL9kwTFqz5PN6X0O', NULL, 'Lama Lama', NULL, '2023-09-10 16:55:59', '2023-11-05 13:09:28', NULL, 31, 7, 2, 4),
	(4, 5434134, 'Jackson', 'Jinard', 'jin@jack.fr', '2005-08-29', 'masculin', '2023-09-10 16:55:59', '$2y$10$iYxafdpGm3DncLY0lpAFieUXnbyXQr9lWLWnAOIK0J.ghvxE5vwwW', NULL, NULL, NULL, 0, 'GtysLY78dq21rdfC9nWGZoLp8G8JxCUy7D71oUoQn8m74eXEHh0IAKN9b0Ep', NULL, 'Jackson Jinard', NULL, '2023-09-10 16:55:59', '2023-09-13 16:02:46', NULL, 10, 5, 2, 3),
	(6, 1315556, 'GBESSOU', 'David', 'david@gmail.com', '2023-09-07', 'masculin', '2023-09-17 01:28:23', '$2y$10$N/pSV9n1trRHU70rqQN/Lu2HQG9Qk3QrgdExiXVm4ACz/.DuUFdSW', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2023-09-17 01:25:27', '2023-09-17 01:28:23', NULL, 66, 22, 5, 1),
	(7, 31511200, 'Kama', 'Kama', 'kama@kama.fr', '2023-02-06', 'masculin', '2024-01-16 16:11:23', '$2y$10$0JbPsqJJspA8ElMC/tC16.8CXfrZdRmdo9E/jR3uReIL1G4wb0Xdi', NULL, NULL, NULL, 0, NULL, 'Lawson Tony', 'Kama Kama', NULL, '2024-01-16 16:06:28', '2024-01-16 16:11:23', NULL, 49, 16, 4, 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
