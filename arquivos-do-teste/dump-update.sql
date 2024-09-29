-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/09/2024 às 21:38
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
(9, 'Cidade 9', NULL, NULL),
(11, 'Cidade 11', NULL, NULL),
(12, 'Cidade 12', NULL, NULL),
(13, 'Cidade 13', NULL, NULL),
(16, 'Cidade 156', '2024-09-28 23:45:20', '2024-09-28 23:45:20'),
(17, 'Cidade 111', '2024-09-29 01:59:13', '2024-09-29 03:30:37'),
(18, 'São Paulo', '2024-09-29 02:08:53', '2024-09-29 02:08:53'),
(20, 'Brasília', '2024-09-29 02:49:40', '2024-09-29 02:49:40'),
(21, 'Rio de Janeiro', '2024-09-29 03:33:52', '2024-09-29 03:33:52'),
(22, 'Goiânia', '2024-09-29 03:34:05', '2024-09-29 03:34:05'),
(23, 'Amapá', '2024-09-29 03:34:12', '2024-09-29 03:34:12');

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
(25, 'João da Silva', '123.456.789-00', '1990-05-10', 'Masculino', 'Rua Principal, 123', 'joao@example.com', '11987654321', 9, '2024-09-29 03:21:30', '2024-09-29 03:21:30'),
(26, 'Natanael', '111.456.789-02', '2019-01-29', 'Masculino', 'QE 20, Bloco G, São Paulo', 'pattyxica24@gmail.com', '77996088377', 16, '2024-09-29 03:29:26', '2024-09-29 03:30:23'),
(27, 'Antonio', '666.456.789-11', '2012-01-29', 'Masculino', 'QE 20, Bloco G, São Paulo', 'teste@gmail.com', '22996088322', 17, '2024-09-29 03:33:14', '2024-09-29 03:33:14'),
(28, 'Ana Silva', '123.456.789-01', '1990-01-01', 'Feminino', 'Rua das Flores, 123', 'ana.silva@email.com', '999999999', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(29, 'João Pereira', '123.456.789-02', '1992-02-02', 'Masculino', 'Avenida Central, 456', 'joao.pereira@email.com', '999999998', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(30, 'Maria Oliveira', '123.456.789-03', '1993-03-03', 'Feminino', 'Rua da Paz, 789', 'maria.oliveira@email.com', '999999997', 16, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(31, 'Carlos Souza', '123.456.789-04', '1994-04-04', 'Masculino', 'Rua dos Andradas, 101', 'carlos.souza@email.com', '999999996', 16, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(32, 'Fernanda Lima', '123.456.789-05', '1995-05-05', 'Feminino', 'Rua São João, 202', 'fernanda.lima@email.com', '999999995', 17, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(33, 'Ricardo Almeida', '123.456.789-06', '1996-06-06', 'Masculino', 'Rua Dom Pedro, 303', 'ricardo.almeida@email.com', '999999994', 17, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(34, 'Patrícia Santos', '123.456.789-07', '1997-07-07', 'Feminino', 'Rua Bento Gonçalves, 404', 'patricia.santos@email.com', '999999993', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(35, 'Lucas Rocha', '123.456.789-08', '1998-08-08', 'Masculino', 'Rua Sete de Setembro, 505', 'lucas.rocha@email.com', '999999992', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(36, 'Isabela Costa', '123.456.789-09', '1999-09-09', 'Feminino', 'Rua Marechal Deodoro, 606', 'isabela.costa@email.com', '999999991', 16, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(37, 'Thiago Nunes', '123.456.789-10', '1990-10-10', 'Masculino', 'Rua Osvaldo Aranha, 707', 'thiago.nunes@email.com', '999999990', 16, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(38, 'Gabriela Souza', '123.456.789-11', '1991-11-11', 'Feminino', 'Rua General Osório, 808', 'gabriela.souza@email.com', '999999989', 17, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(39, 'Marcelo Ribeiro', '123.456.789-12', '1992-12-12', 'Masculino', 'Rua XV de Novembro, 909', 'marcelo.ribeiro@email.com', '999999988', 17, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(40, 'Letícia Fonseca', '123.456.789-13', '1993-01-13', 'Feminino', 'Rua Padre Cacique, 101', 'leticia.fonseca@email.com', '999999987', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(41, 'Rafael Moraes', '123.456.789-14', '1994-02-14', 'Masculino', 'Rua Fernando Ferrari, 202', 'rafael.moraes@email.com', '999999986', 9, '2024-09-29 00:37:36', '2024-09-29 00:37:36'),
(42, 'Camila Torres', '123.456.789-15', '1995-03-15', 'Feminino', 'Rua dos Navegantes, 303', 'camila.torres@email.com', '999999985', 16, '2024-09-29 00:37:36', '2024-09-29 00:37:36');

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
(8, 'Representante 8', '888888888', 16, NULL, '2024-09-29 02:35:11'),
(19, 'Representante 9', '9999999999', 9, '2024-09-29 01:28:29', '2024-09-29 01:28:37'),
(42, 'Representante 111', '1010101011', 9, '2024-09-29 02:50:03', '2024-09-29 03:30:52'),
(43, 'Representante 2', '21996088363', 18, '2024-09-29 03:38:13', '2024-09-29 03:38:13'),
(44, 'Representante 23', '77996088377', 21, '2024-09-29 03:38:33', '2024-09-29 03:38:33');

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
('0P5o6AWYfmwnZ6pJZekLAGgTqy34b1VQAJS3LKkl', NULL, '34.221.207.104', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRG5wMk5TcWgzVE1ETzdLdXhwZlk5YkxidGJmelZBT3lpckhoRXgxUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly91cGRhdGUucGF0dHl3ZWIuY29tLmJyL2NsaWVudGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727570243),
('dfYATtkuulk8QiXYSJcJj1h9JrdtOGBvJfskZ9Xk', NULL, '179.214.113.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0dhUGw5b3c3SjN3b3VBdFVpOWJ4eG9VWVVmZ1RSVGQyN3M5MThTYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdXBkYXRlLnBhdHR5d2ViLmNvbS5ici9jaWRhZGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727570322),
('DovX0C6hn3QFYeYV8oAUSAJR3z8iWNF9y9BecGHd', NULL, '34.221.207.104', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNE5RcUswb2YycXlWUEFZRTN1TFRwVVBGUDM2d3BqTEdzdGpGZEhKNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly91cGRhdGUucGF0dHl3ZWIuY29tLmJyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727570243),
('JVPAHLU9WOKH7KFmadReCBnHlKXu7dzHafb9C1zH', NULL, '54.212.229.5', 'Mozilla/5.0 (Linux; Android 13; SM-A037U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3gwOEMweXZnZFhQOUZTbjQxdWptaVFXbGE3eTZhbFhORTJDd0RoRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly91cGRhdGUucGF0dHl3ZWIuY29tLmJyL2NsaWVudGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727570243),
('qYwAuVsXiAmUPJNPoJVr83QVEgnavhXRpnxZ79xm', NULL, '34.220.63.51', 'Mozilla/5.0 (Linux; Android 13; SM-A037U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnZYSFduZndzZ1FiOFU3U1ZYNHF1TlB3RkJINTRMazhUdkppb1FKeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly91cGRhdGUucGF0dHl3ZWIuY29tLmJyL2NsaWVudGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727570261);

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
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2024-09-29 02:11:20', '$2y$12$OLqGroyhp2zQVEV4df48iOhbii0pGFDcsm4JaFz.Ai0vueizpb0XG', 'IIaj4ruuXa', '2024-09-29 02:11:20', '2024-09-29 02:11:20');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
