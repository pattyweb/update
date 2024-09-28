-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/09/2024 às 14:11
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `patty658_larav38`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Cidade 1', NULL, NULL),
(2, 'Cidade 2', NULL, NULL),
(3, 'Cidade 3', NULL, NULL),
(4, 'Cidade 4', NULL, NULL),
(5, 'Cidade 5', NULL, NULL),
(6, 'Cidade 6', NULL, NULL),
(7, 'Cidade 7', NULL, NULL),
(8, 'Cidade 8', NULL, NULL),
(9, 'Cidade 9', NULL, NULL),
(10, 'Cidade 10', NULL, NULL),
(11, 'Cidade 11', NULL, NULL),
(12, 'Cidade 12', NULL, NULL),
(13, 'Cidade 13', NULL, NULL),
(14, 'Cidade 14', NULL, NULL),
(15, 'Cidade 15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` enum('Masculino','Feminino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nascimento`, `sexo`, `endereco`, `email`, `telefone`, `cidade_id`, `created_at`, `updated_at`) VALUES
(1, 'Cliente 1', '', NULL, 'Masculino', '', 'cliente1@teste.com', '123456789', 1, NULL, NULL),
(2, 'Cliente 2', '', NULL, 'Masculino', '', 'cliente2@teste.com', '987654321', 2, NULL, NULL),
(3, 'Cliente 3', '', NULL, 'Masculino', '', 'cliente3@teste.com', '456123789', 1, NULL, NULL),
(4, 'Cliente 4', '', NULL, 'Masculino', '', 'cliente4@teste.com', '789456123', 3, NULL, NULL),
(5, 'Cliente 5', '', NULL, 'Masculino', '', 'cliente5@teste.com', '321654987', 2, NULL, NULL),
(6, 'Cliente 6', '', NULL, 'Masculino', '', 'cliente6@teste.com', '159753486', 1, NULL, NULL),
(7, 'Cliente 7', '', NULL, 'Masculino', '', 'cliente7@teste.com', '357951486', 3, NULL, NULL),
(8, 'Cliente 8', '', NULL, 'Masculino', '', 'cliente8@teste.com', '654987321', 1, NULL, NULL),
(9, 'Cliente 9', '555.456.789-11', '2000-02-02', 'Feminino', 'QE 20, Bloco G, Minas Gerais', 'cliente9@teste.com', '852963147', 2, NULL, '2024-09-28 17:51:25'),
(10, 'Cliente 10', '', NULL, 'Masculino', '', 'cliente10@teste.com', '963741852', 3, NULL, NULL),
(11, 'Cliente 11', '', NULL, 'Masculino', '', 'cliente11@teste.com', '123123123', 1, NULL, NULL),
(12, 'Cliente 12', '', NULL, 'Masculino', '', 'cliente12@teste.com', '456456456', 2, NULL, NULL),
(13, 'Cliente 13', '', NULL, 'Masculino', '', 'cliente13@teste.com', '789789789', 3, NULL, NULL),
(14, 'Cliente 14', '', NULL, 'Masculino', '', 'cliente14@teste.com', '987987987', 1, NULL, NULL),
(15, 'Cliente 15', '', NULL, 'Masculino', '', 'cliente15@teste.com', '654654654', 2, NULL, NULL),
(17, 'Cliente 1', '123.456.789-00', '1985-01-01', 'Feminino', 'Rua Exemplo, 123', 'cliente1@exemplo.com', '99999-1111', 1, NULL, '2024-09-28 16:58:29'),
(18, 'Cliente 2', '234.567.890-11', '1990-02-02', 'Feminino', 'Avenida Exemplo, 456', 'cliente2@exemplo.com', '99999-2222', 2, NULL, NULL),
(19, 'Cliente 20', '222.456.789-22', '2024-09-01', 'Feminino', 'QE 20, Bloco G, Rio de Janeiro', 'teste55@gmail.com', '21996088363', 14, '2024-09-28 17:00:31', '2024-09-28 17:00:31'),
(20, 'Cliente 25', '666.456.789-11', '1999-02-24', 'Feminino', 'QE 20, Bloco G, Rio Grande do Sul', 'teste32@gmail.com', '21996088321', 15, '2024-09-28 17:52:26', '2024-09-28 20:10:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_28_124831_create_cidades_table', 2),
(5, '2024_09_28_124822_create_clientes_table', 3),
(7, '2024_09_28_124838_create_representantes_table', 4),
(8, '2024_09_28_133223_add_extra_fields_to_clientes_table', 5),
(10, '2024_09_28_155144_create_personal_access_tokens_table', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `representantes`
--

CREATE TABLE `representantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `representantes`
--

INSERT INTO `representantes` (`id`, `nome`, `telefone`, `cidade_id`, `created_at`, `updated_at`) VALUES
(1, 'Representante 1', '111111111', 1, NULL, NULL),
(2, 'Representante 2', '222222222', 2, NULL, NULL),
(3, 'Representante 3', '333333333', 3, NULL, NULL),
(4, 'Representante 4', '444444444', 4, NULL, NULL),
(5, 'Representante 5', '555555555', 5, NULL, NULL),
(6, 'Representante 6', '666666666', 6, NULL, NULL),
(7, 'Representante 7', '777777777', 7, NULL, NULL),
(8, 'Representante 8', '888888888', 8, NULL, NULL),
(9, 'Representante 9', '999999999', 9, NULL, NULL),
(10, 'Representante 10', '101010101', 10, NULL, NULL),
(11, 'Representante 11', '111111111', 11, NULL, NULL),
(12, 'Representante 12', '121212121', 12, NULL, NULL),
(13, 'Representante 13', '131313131', 13, NULL, NULL),
(14, 'Representante 14', '141414141', 14, NULL, NULL),
(15, 'Representante 15', '151515151', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1d3nAvMsvTZiSyTVXnQyPTX9cAywQ2O4ZPd2b4Yl', NULL, '167.94.146.57', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXdqcFNpS0NSaHlnSkExN0dxZWpUT2NYMTlSVTBzd29iTFRKcHZFZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LnVwZGF0ZS5wYXR0eXdlYi5jb20uYnIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727541405),
('9cb9UK0wbgR0oDzx4iqJePg5sjRxnBJZfp8Rq9E7', NULL, '199.45.155.68', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlVnalRobVFaaE5hRzFSS3kyWWp1RGhzMHh1eW9sRlRVSG5hSFN6TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93d3cudXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jbGllbnRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727540252),
('A0HJY6X8ZyPVwaOSABvZwbthlbG6oPDVaHVqD5KW', NULL, '167.94.146.57', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekpaM1I2Z1NwZkRsSVM5M0FVQm14MlJLSXVWYUtlbFdGT1dqNTVQbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVwZGF0ZS5wYXR0eXdlYi5jb20uYnIvY2xpZW50ZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727541418),
('cNtWr1lNdXiPO4NGHcUsmR9zn3UWLCuVGDaMoChL', NULL, '179.214.113.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkc1Q3ZOWXhGbERlZ0lGTktkUGREUmxKcm9GbGVpZ0hhdE9yYWhrQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jbGllbnRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727543412),
('enNxilYrsZBWRXNWLdNbVds7DrFid3K8lSsLa2FV', NULL, '179.214.113.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGVFZGpyaFRMSWFUd3NuWEJ1UlhNR1hGVjVZYUwxeEl1dG90VURNVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jbGllbnRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727542709),
('GCyXfpqEsAZMCOf7yXDs0LCm0vI12ZaRbgiwGlfV', NULL, '199.45.155.68', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFZ2YmwzTWpVNElXY1d2SnJoMFlRYlZNcU9KYnhjU0M1elZQWkEwWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly93d3cudXBkYXRlLnBhdHR5d2ViLmNvbS5iciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727540243),
('gz0lioaoXwY2aXQBfEODgcg8YvceUhLn84ZcswDH', NULL, '52.167.144.225', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2lWdkpHQnFMWktUZkh4OU9mamgxcHk2Mlc3WFNvMkM2MmR6THZwSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jbGllbnRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727540034),
('jx4TIsV6sh8HarA30y1hPXEKM0iBYmhrJX9Vj2NM', NULL, '54.156.251.192', 'Mozilla/5.0 (compatible)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2wwMEYyZXV0eGF6aDhqbUowTVRSN242aHBYSTZLbGhvbWtoZ3RNTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vdXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jbGllbnRlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727539768),
('qRglJeyTXVfe79QrXBqNyx3vEVJDhnHGfSJcvFPo', NULL, '93.119.227.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:58.0) Gecko/20100101 Firefox/58.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFRlNlpDcnZydlZ1MHlsNHZqeE1HZmhoeEZZR1pwenBQaXd4N2Y5biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LnVwZGF0ZS5wYXR0eXdlYi5jb20uYnIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727543388),
('SjS5ibiMwg76GUaSudJVeIi8xIqYn1POeVanf7h0', NULL, '93.119.227.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:58.0) Gecko/20100101 Firefox/58.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVhINUNoTjYyYTBFT3NmV2I1dXBvR2xRZUhoUzJMRVJDRkdvZVFBcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnVwZGF0ZS5wYXR0eXdlYi5jb20uYnIvY2xpZW50ZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727543389);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`),
  ADD KEY `clientes_cidade_id_foreign` (`cidade_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `representantes_cidade_id_foreign` (`cidade_id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
