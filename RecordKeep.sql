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

-- Listage des données de la table recordkeep.boite_archives : ~0 rows (environ)
INSERT INTO `boite_archives` (`id`, `libelle`, `code`, `rayon_rangement_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Boite 1', 'R2B1', 2, '2023-09-10 19:44:52', '2023-09-10 19:44:52', NULL),
	(2, 'Boite 2', 'R3B2', 3, '2023-09-10 19:45:07', '2023-09-10 19:45:07', NULL),
	(3, 'Boite 3', 'R1B3', 1, '2023-09-10 19:45:22', '2023-09-10 19:45:22', NULL);

-- Listage des données de la table recordkeep.bordereau_transferts : ~0 rows (environ)

-- Listage des données de la table recordkeep.categories : ~0 rows (environ)
INSERT INTO `categories` (`id`, `categorie`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administratif', '2023-09-10 18:31:51', '2023-09-10 18:31:51', NULL),
	(2, 'Economique', '2023-09-10 18:32:07', '2023-09-10 18:32:07', NULL),
	(3, 'Diplomatique', '2023-09-10 18:32:22', '2023-09-10 18:32:22', NULL);

-- Listage des données de la table recordkeep.chemise_dossiers : ~0 rows (environ)
INSERT INTO `chemise_dossiers` (`id`, `libelle`, `code`, `boite_archive_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Chemise 1', 'R3B2CH1', 2, '2023-09-10 19:47:38', '2023-09-10 19:47:38', NULL),
	(2, 'Chemise 4', 'R1B3CH2', 3, '2023-09-10 19:47:55', '2023-09-10 19:47:55', NULL);

-- Listage des données de la table recordkeep.demande_prets : ~0 rows (environ)

-- Listage des données de la table recordkeep.demande_transferts : ~0 rows (environ)

-- Listage des données de la table recordkeep.directions : ~0 rows (environ)
INSERT INTO `directions` (`id`, `direction`, `sigle`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Direction des Systèmes d\'Information', 'DSI', '2023-09-10 17:00:46', '2023-09-10 17:00:46', NULL),
	(2, 'Direction de la Planification de l\'Administration et des Finances', 'DPAF', '2023-09-10 17:01:39', '2023-09-10 17:01:39', NULL),
	(3, 'Direction Générale de la Sécurité Publique', 'DGSP', '2023-09-10 17:03:00', '2023-09-10 17:03:00', NULL),
	(4, 'Direction des Affaires Intérieures et des Cultes', 'DAIC', '2023-09-10 17:03:43', '2023-09-10 17:03:43', NULL),
	(5, 'Direction de la Coopération Technique de Sécurité', 'DCTS', '2023-09-10 17:04:34', '2023-09-10 17:04:34', NULL),
	(6, 'Secrétariat Général du Ministère', 'SGM', '2023-09-10 17:06:13', '2023-09-10 17:06:29', NULL),
	(7, 'Direction de Cabinet', 'DC', '2023-09-10 17:06:48', '2023-09-10 17:06:48', NULL),
	(8, 'Direction Générale de la Police Républicaine', 'DGPR', '2023-09-10 17:07:57', '2023-09-10 17:07:57', NULL),
	(9, 'Direction de l\'Etat Civil', 'DEC', '2023-09-10 17:09:01', '2023-09-10 17:10:26', NULL);

-- Listage des données de la table recordkeep.divisions : ~0 rows (environ)
INSERT INTO `divisions` (`id`, `division`, `sigle`, `service_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Division Accueil et de Gestion des Courriers', 'DAGC', 3, '2023-09-10 17:16:18', '2023-09-10 17:16:18', NULL),
	(2, 'Division de la Reprographie et de l\'Archivage des Dossiers', 'DRAD', 3, '2023-09-10 17:17:07', '2023-09-10 17:17:07', NULL),
	(3, 'Division des Infrastructures', 'DI', 2, '2023-09-10 17:27:42', '2023-09-10 17:27:42', NULL),
	(4, 'Division des Systemes', 'DS', 1, '2023-09-10 17:28:24', '2023-09-10 17:28:24', NULL),
	(5, 'Division des Exploitation et Helpdesk', 'DEH', 1, '2023-09-10 17:29:15', '2023-09-10 17:29:15', NULL),
	(6, 'Division des Etudes et Applications', 'DEA', 1, '2023-09-10 17:31:03', '2023-09-10 17:31:03', NULL),
	(7, 'Division Multimédia et e-Services', 'DMeS', 1, '2023-09-10 17:31:52', '2023-09-10 17:32:15', NULL),
	(8, 'Division de Pré-archivage', 'DPA', 4, '2023-09-10 17:32:55', '2023-09-10 17:32:55', NULL),
	(9, 'Division de Gestion des Savoirs', 'DGS', 4, '2023-09-10 17:33:47', '2023-09-10 17:33:47', NULL),
	(10, 'Division Accueil et de Gestion des Courriers', 'DAGC', 5, '2023-09-10 17:57:14', '2023-09-10 17:57:14', NULL);

-- Listage des données de la table recordkeep.documents : ~0 rows (environ)

-- Listage des données de la table recordkeep.document_fonction : ~0 rows (environ)

-- Listage des données de la table recordkeep.failed_jobs : ~0 rows (environ)

-- Listage des données de la table recordkeep.fonctions : ~0 rows (environ)
INSERT INTO `fonctions` (`id`, `fonction`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Directeur', '2023-09-10 18:28:05', '2023-09-10 18:28:05', NULL),
	(2, 'Chef Service', '2023-09-10 18:28:18', '2023-09-10 18:28:18', NULL),
	(3, 'Chargé', '2023-09-10 18:28:35', '2023-09-10 18:28:35', NULL),
	(4, 'Chef Division', '2023-09-10 18:28:52', '2023-09-10 18:28:52', NULL);

-- Listage des données de la table recordkeep.jobs : ~0 rows (environ)

-- Listage des données de la table recordkeep.model_has_permissions : ~0 rows (environ)
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
	(10, 'App\\Models\\User', 3),
	(11, 'App\\Models\\User', 3),
	(12, 'App\\Models\\User', 3),
	(13, 'App\\Models\\User', 3),
	(14, 'App\\Models\\User', 3),
	(15, 'App\\Models\\User', 3),
	(16, 'App\\Models\\User', 3),
	(17, 'App\\Models\\User', 4),
	(18, 'App\\Models\\User', 4),
	(19, 'App\\Models\\User', 4);

-- Listage des données de la table recordkeep.model_has_roles : ~0 rows (environ)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 1),
	(4, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(3, 'App\\Models\\User', 3),
	(4, 'App\\Models\\User', 4),
	(1, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 5);

-- Listage des données de la table recordkeep.nature_documents : ~0 rows (environ)
INSERT INTO `nature_documents` (`id`, `nature`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Decret', '2023-09-10 18:32:36', '2023-09-10 18:32:36', NULL),
	(2, 'Arrêté', '2023-09-10 18:32:50', '2023-09-10 18:32:50', NULL),
	(3, 'Bordereau', '2023-09-10 18:33:07', '2023-09-10 18:33:45', NULL),
	(4, 'Lettre', '2023-09-10 18:33:22', '2023-09-10 18:33:22', NULL),
	(5, 'Courrier', '2023-09-10 18:33:32', '2023-09-10 18:33:40', NULL);

-- Listage des données de la table recordkeep.password_reset_tokens : ~0 rows (environ)

-- Listage des données de la table recordkeep.permissions : ~0 rows (environ)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`, `type_role_id`) VALUES
	(1, 'Demander un Prêt', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(2, 'Consulter un Document', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(3, 'Rechercher un Document', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(4, 'Télécharger un Document', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(5, 'Gestion des Services', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(6, 'Gestion des Fonctions', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(7, 'Gestion des Divisions', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(8, 'Gestion des Directions', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(9, 'Gestion des Utilisateurs', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(10, 'Gestion des Documents', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(11, 'Gestion des Catégories', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(12, 'Gestion des Boîtes Archives', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(13, 'Gestion des Rayons Rangements', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(14, 'Gestion des Chemises Dossiers', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(15, 'Gestion des Natures de Documents', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(16, 'Gestion des Demandes de Transferts', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(17, 'Gestion des Classements', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4),
	(18, 'Gestion des Demandes de Prêts', 'web', '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 4),
	(19, 'Gestion des Demandes de Transferts du MISP', 'web', '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 4),
	(20, 'Gestion des Rôles', 'web', '2023-09-10 16:55:59', '2023-09-10 16:55:59', NULL, 3);

-- Listage des données de la table recordkeep.personal_access_tokens : ~0 rows (environ)

-- Listage des données de la table recordkeep.rapport_prets : ~0 rows (environ)

-- Listage des données de la table recordkeep.rayon_rangements : ~0 rows (environ)
INSERT INTO `rayon_rangements` (`id`, `libelle`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Rayon 1', 'R1', '2023-09-10 19:43:50', '2023-09-10 19:43:50', NULL),
	(2, 'Rayon 2', 'R2', '2023-09-10 19:44:02', '2023-09-10 19:44:02', NULL),
	(3, 'Rayon 3', 'R3', '2023-09-10 19:44:13', '2023-09-10 19:44:31', NULL);

-- Listage des données de la table recordkeep.roles : ~0 rows (environ)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`, `type_role_id`) VALUES
	(1, 'Utilisateur', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 1),
	(2, 'Administrateur', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 3),
	(3, 'Gestionnaire-Standard', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 2),
	(4, 'Gestionnaire-Central', 'web', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL, 4);

-- Listage des données de la table recordkeep.role_has_permissions : ~0 rows (environ)
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
	(10, 3),
	(11, 3),
	(12, 3),
	(13, 3),
	(14, 3),
	(15, 3),
	(16, 3),
	(17, 4),
	(18, 4),
	(19, 4);

-- Listage des données de la table recordkeep.services : ~0 rows (environ)
INSERT INTO `services` (`id`, `service`, `sigle`, `direction_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Service Exploitation, Postes de Travail, Application et E-services', 'SEPTAE', 1, '2023-09-10 17:12:26', '2023-09-10 17:12:26', NULL),
	(2, 'Services Infrastructures et Systèmes', 'SIS', 1, '2023-09-10 17:13:47', '2023-09-10 17:13:47', NULL),
	(3, 'Secrétariat', 'S / DSI', 1, '2023-09-10 17:14:23', '2023-09-10 17:34:59', NULL),
	(4, 'Services de Pré-archivage et de Gestion des Savoirs', 'SPGS', 1, '2023-09-10 17:15:16', '2023-09-10 17:15:16', NULL),
	(5, 'Secrétariat de Direction', 'SD / DPAF', 2, '2023-09-10 17:36:14', '2023-09-10 17:52:42', NULL),
	(6, 'Service de la Planification et du Suivi-évaluation', 'SPSe', 2, '2023-09-10 17:53:34', '2023-09-10 17:53:34', NULL),
	(7, 'Cellule Genre et Environnement', 'CGE', 2, '2023-09-10 17:54:13', '2023-09-10 17:54:13', NULL),
	(8, 'Service des Etudes et de la Statistique', 'SES', 2, '2023-09-10 17:54:53', '2023-09-10 17:54:53', NULL);

-- Listage des données de la table recordkeep.statistiques : ~0 rows (environ)

-- Listage des données de la table recordkeep.type_roles : ~0 rows (environ)
INSERT INTO `type_roles` (`id`, `libelle`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Utilisateur', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(2, 'Gestionnaire-Standard', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(3, 'Administrateur', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL),
	(4, 'Gestionnaire-Central', '2023-09-10 16:55:58', '2023-09-10 16:55:58', NULL);

-- Listage des données de la table recordkeep.users : ~0 rows (environ)
INSERT INTO `users` (`id`, `matricule`, `nom`, `prenoms`, `email`, `datenaissance`, `sexe`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `division_id`, `service_id`, `direction_id`, `fonction_id`) VALUES
	(1, 2632646, 'Doe', 'Jonh', 'jonh@doe.fr', '1975-02-06', 'masculin', '2023-09-10 16:55:59', '$2y$10$bDOML/RLGtSidQbrpxr.XOV4fUlCmF2Zez6vLEqRBv8i1Mhqal7FC', NULL, NULL, NULL, 'RYqzN2ppiBJ7hwarTFoBIwJV5hy1IC8yI6Q4Jzn7MgnK7AP1EPEVMN3FmBPK', '2023-09-10 16:55:59', '2023-09-10 19:10:45', NULL, 1, 1, 1, 1),
	(2, 8029737, 'Lawson', 'Tony', 'tony@lawson.fr', '1995-07-27', 'masculin', '2023-09-10 16:55:59', '$2y$10$Ri8xW44rtbR8mLrY/Noh/.Wue5WzX6Il0uximnn22gF6Lv89nnoCy', NULL, NULL, NULL, 'loW8aD6Xc8', '2023-09-10 16:55:59', '2023-09-13 16:02:13', NULL, 4, 1, 1, 1),
	(3, 1804281, 'Lossin', 'Lobert', 'lossin@lobert.fr', '2001-12-31', 'masculin', '2023-09-10 16:55:59', '$2y$10$0Jh3ZgFvRrQO42IDU9hkHuGthyrfZ5UvU4PbFy6EBNwAku2rcbAqW', NULL, NULL, NULL, '754jtGt0it', '2023-09-10 16:55:59', '2023-09-13 16:04:27', NULL, 1, 7, 2, 4),
	(4, 5434134, 'Jackson', 'jinard', 'jin@jack.fr', '2005-08-29', 'masculin', '2023-09-10 16:55:59', '$2y$10$iYxafdpGm3DncLY0lpAFieUXnbyXQr9lWLWnAOIK0J.ghvxE5vwwW', NULL, NULL, NULL, '97XSWy6usC', '2023-09-10 16:55:59', '2023-09-13 16:02:46', NULL, 10, 5, 2, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
