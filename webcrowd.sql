-- Database: `webcrowd`

--  --------------------------------------------------------

-- Table structure for table `comments`
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
-- Indexes for table `comments`
ALTER TABLE `comments`
ADD PRIMARY KEY (`id`);

-- Triggers `comments`
DELIMITER $$
CREATE TRIGGER `comments_before_insert` BEFORE INSERT ON `comments`
 FOR EACH ROW SET NEW.createdAt = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `comments_before_update` BEFORE UPDATE ON `comments`
 FOR EACH ROW SET NEW.updatedAt = NOW()
$$
DELIMITER ;

-- AUTO_INCREMENT for table `comments`
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `createdAt` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updatedAt` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
-- Indexes for table `users`
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

-- Triggers `users`
DELIMITER $$
CREATE TRIGGER `users_before_insert` BEFORE INSERT ON `users`
 FOR EACH ROW SET NEW.createdAt=NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_before_update` BEFORE UPDATE ON `users`
 FOR EACH ROW SET NEW.updatedAt=NOW()
$$
DELIMITER ;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;