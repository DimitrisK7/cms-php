-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 01:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_creator` varchar(255) NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_creator`, `post_category`, `created_at`, `post_content`) VALUES
(27, 'Euro 2024', 'dimitrisk', 'Sports', '2024-07-01 15:07:59', 'Euro 2024 has been a great tournament so far! Many goals, great passionate teams, footballers trying to shine while sweating for their homeland\'s national team! It\'s got everything. And we still have a lot of matches to go, meaning that there is more spectacle coming our way!'),
(34, 'Pre olympic basket tournament', 'dimitrisk', 'Sports', '2024-07-01 15:11:11', 'Pre-olympic basket tournament is going to take place in Athens Greece this july. The weather in Athens can be weary for the players given the fact temperature is gonna reach 40 degrees celsius, but nevertheless we except to see great matches and a lot of superstars of the nba and european championships are gonna perform. All in all we have a great tournament ahead of us.'),
(35, 'Inflation in 2024', 'dimitrisk', 'Economics and Finance', '2024-07-01 15:15:51', 'Prices and cost of living have increased tremendously in the last years, affecting everyone in our societies. The tsunami of inflation in necessary products like food, electricity and gasoline hasnt been mitigated by any action from the goverments. That leads to the citizens\' pockets being drained even faster than ever before. '),
(36, 'EU elections', 'dimitrisk', 'Politics and international affairs', '2024-07-01 15:18:19', 'The great problem with the 2024 european elections was not only the fact that people decided to not vote, but also the rise of far-right movements that destabilize even further the european societies. Future is uncertain in the european continent and there is no light in the end of the tunnel. At least for now...'),
(37, 'Mediterranean food & sightseeing', 'dimitrisk', 'Culture', '2024-07-01 15:21:34', 'Italy, Spain, Greece, Turkey, France. Some of the greatest places you could visit to enjoy the mediterranean food, hospitality and beautiful scenery. The tasty and healthy food alongside the peaceful places you can visit and lovely encounters with the locals will make sure that you will never forget your vacations in this beautiful place of the world.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(8, 'dimitris', 'dimitriskonstantarasgr@gmail.com', '$2y$10$JdYffaxtY6R1I.y4M9tYYO2fsAty3SyfOl7PCBoacaD1iXiKdxs7G', '2024-06-28 08:49:02', 'admin'),
(13, 'user1', 'anemail@gmail.com', '$2y$10$iHlC8ALetQ4AISLg0lUWCuVFSGnoJpE5jOYNyxGVmI9uTMxiUOtCC', '2024-07-02 11:11:22', 'user'),
(14, 'user2', 'user2@gmail.com', '$2y$10$h6DEhDmoYiIZPcbmVPYQleq0KXIhtcI7M79kKdpRBPVCv1iYp0rBW', '2024-07-02 11:11:52', 'user'),
(15, 'user3', 'user3@gmail.com', '$2y$10$ptG8C6cBI7olncPzmsDCruMoUEhitIK8DJW4PMnYJUaYxnx62/S6K', '2024-07-02 11:12:08', 'user'),
(16, 'user4', 'user4@gmail.com', '$2y$10$TXf8m2y48MDuYsqJFmA2cOZDGyGlOE9c7XODDYJHLXlFhvHUgsw0G', '2024-07-02 11:12:30', 'user'),
(17, 'user5', 'user5@gmail.com', '$2y$10$ZYxUuQE.5/4sdVbfqRzfMuetN5huysjN.Kat1g7IxqReX7GjYBFeu', '2024-07-02 11:12:47', 'user'),
(18, 'user6', 'user6@gmail.com', '$2y$10$OGcJfJgfYbpfPCKHQ7m4CeDkjvCjHAIMrmefrHswJpK3JvzzZ2HKK', '2024-07-02 11:13:08', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
