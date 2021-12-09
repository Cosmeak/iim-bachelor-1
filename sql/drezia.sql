-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2021 at 09:01 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drezia`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  `img_blog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date_time`, `img_blog`) VALUES
(1, 'League of Legens Event', '<p style=\"margin-bottom: 17px;\">Ruination spreads across Runeterra, consuming all in its path. But the Sentinels of Light have returned to fight back against the Ruined King—and they need your help.</p><p style=\"margin-top: 17px; margin-bottom: 17px;\"><b>Will you stand with the light?</b></p><p style=\"margin-top: 17px; margin-bottom: 17px;\">Explore the Sentinels of Light event across Riot Games from July 8, 2021 until August 10, 2021. For more information on how to participate, check out the FAQs for <a href=\"https://support-leagueoflegends.riotgames.com/hc/articles/4402790648595\" target=\"_blank\" style=\"cursor: pointer; padding-bottom: 3px; border-bottom: 1px solid rgb(19, 216, 246);\">League of Legends</a> and <a href=\"https://support-wildrift.riotgames.com/hc/articles/1500002620921\" target=\"_blank\" style=\"cursor: pointer; padding-bottom: 3px; border-bottom: 1px solid rgb(19, 216, 246);\">Wild Rift</a>.</p><h4 class=\"style__CaptionTitle-w4qg7j-11 ByRlT\" style=\"line-height: 1.22222; animation: 0.9s cubic-bezier(0.165, 0.84, 0.44, 1) 0s 1 normal both running fsVUFH;\">DEFEND THE LIGHT</h4><div class=\"style__CaptionDesc-w4qg7j-12 ZdpDu\" style=\"margin-top: 10px; line-height: 1.66667; animation: 1.1s cubic-bezier(0.165, 0.84, 0.44, 1) 0.07s 1 normal both running fsVUFH;\"><div class=\"style__Wrapper-c6pz3s-0 gELiLJ\" style=\"width: 720px; line-height: 1.66667;\"><p style=\"margin-bottom: 17px;\">Join the Sentinels of Light on July 8 with an in-client narrative adventure, an all-new game mode, Sentinel and Ruined skins, unique missions, and in-game rewards. Explore the <a href=\"https://support-leagueoflegends.riotgames.com/hc/articles/4402790648595\" target=\"_blank\" style=\"cursor: pointer; padding-bottom: 3px; border-bottom: 1px solid rgb(19, 216, 246);\">Sentinels of Light FAQ</a> for more info.</p><h4 style=\"margin-top: 40px; line-height: 1;\">Narrative Adventure: Rise of the Sentinels</h4><p style=\"margin-top: 17px; margin-bottom: 17px;\">Deploy across Runeterra and recruit a ragtag team to build an unstoppable force of light. Rise of the Sentinels is an in-client narrative adventure that allows you to choose your path as the story unfolds. Each week, explore new regions, gather recruits, and play games to unlock rewards. Learn more in the <a href=\"https://support-leagueoflegends.riotgames.com/hc/articles/4402792434067\" target=\"_blank\" style=\"cursor: pointer; padding-bottom: 3px; border-bottom: 1px solid rgb(19, 216, 246);\">Rise of the Sentinels FAQ</a>.</p><h4 style=\"margin-top: 40px; line-height: 1;\">New Game Mode: Ultimate Spellbook</h4><p style=\"margin-top: 17px;\">What dream plays could you pull off with another champion\'s ultimate? Ultimate Spellbook lets you pick one of three random ults in place of one Summoner Spell. Experience the madness with accelerated pacing, different objectives, and a unique Ruined map. Learn more in the Patch Notes.</p></div></div>', '2021-07-09 16:10:41', 'League of Legens Event.jpg'),
(2, 'New RMR Eligibility Guidelines', '<p style=\"border: 0px; margin-top: 10px; outline: 0px; padding-bottom: 10px; vertical-align: baseline;\">As we enter the 2021 RMR season, we’ve decided to revisit some of our event guidelines.</p><p style=\"border: 0px; margin-top: 10px; outline: 0px; padding-bottom: 10px; vertical-align: baseline;\">Up until today, players were ineligible to participate in Valve-sponsored events if they had ever received a VAC-ban in CS:GO. These guidelines had not seen an update since the game was new and all CS:GO VAC bans were relatively recent. But VAC bans can now be more than 8 years old. So we’ve decided to update them.</p><p style=\"border: 0px; margin-top: 10px; outline: 0px; padding-bottom: 10px; vertical-align: baseline;\">Moving forward, a VAC ban will only disqualify a player from an event if it was either received less than 5 years prior, or if it was received at any time after their first participation in a Valve-sponsored event (e.g., after participating in a qualifier for an RMR event). Note that VAC bans stay in place with all of their other effects; the only change is how they influence your eligibility to play in Valve-sponsored events.</p><p style=\"border: 0px; margin-top: 10px; outline: 0px; padding-bottom: 10px; vertical-align: baseline;\">There are other reasons a player may not be eligible to participate in Valve-sponsored events. These remain unchanged.</p><p style=\"border: 0px; margin-top: 10px; outline: 0px; padding-bottom: 10px; vertical-align: baseline;\">We hope you’re as excited as we are for the upcoming 2021 RMR events. Stay tuned for more information as we head toward the Stockholm Major this Fall!</p>', '2021-07-09 14:56:10', 'New RMR Eligibility Guidelines.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_comments`
--

CREATE TABLE `data_comments` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_comments`
--

INSERT INTO `data_comments` (`id`, `nickname`, `comment`, `date_time`) VALUES
(1, 'PereFection', 'Hello World ! \r\n', '2021-07-09 15:09:39'),
(2, 'Steven', 'I\'m the boss here !', '2021-07-09 15:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name_` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `commentary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name_`, `email`, `commentary`) VALUES
(33, 'Ménoria', 'juliette17gsell@gmail.com', 'Hello, je vous contacte pour essayer votre form !\r\n'),
(34, 'Coco', 'tintinch59@gmail.com', 'Il flex avec son jeu à génération aléatoire !\r\n'),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nickname`, `email`, `password`, `profile_picture`, `rank`) VALUES
(1, 'PereFection', 'perefection09@gmail.com', '$2y$10$s8rsQYxx.LnwNAqQN8XuAOI1p3ogWAfVP3tD1/hrzUFaH5K7yCpZ.', '1.gif', 2),
(2, 'Guillaume', 'guillaumefine09@gmail.com', '$2y$10$2AdMNOBdmhqaynx3UoAi1.J/ugcIVPUvB8JLsglZ1.tTxUQs9qtJ2', '2.gif', 1),
(3, 'Cocominéral', 'tintinch59@gmail.com', '$2y$10$mrkG8BwDi7igjC3bDF2.veVIkpT.FvecEi/sjSxr6EtyubkuONwom', '3.jpg', 0),
(5, 'Tatsuya', 'alexandrefine.l@gmail.com', '$2y$10$PpkI9T77EZ2bNAF4tCc9Z.CN5y56Iu3lMP64sPmYWUB/ePTHK78My', 'default.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_comments`
--
ALTER TABLE `data_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_comments`
--
ALTER TABLE `data_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
