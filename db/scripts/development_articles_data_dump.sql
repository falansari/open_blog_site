-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 11:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `development_articles`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'falansari', 'Fatima', 'Alansari', 'fatima.a.alansari@outlook.com', 'password', '2018-04-25 10:09:45', NULL),
(2, 'Jaston', 'Jason', 'Tona', 'jason@hotmail.com', 'password', '2018-04-25 14:43:14', NULL),
(3, 'Ravi', 'Dira', 'Ravi', 'ravi@gmail.com', 'password', '2018-04-25 14:43:52', NULL);

--
-- Dumping data for table `user_articles`
--

INSERT INTO `user_articles` (`id`, `user_id`, `title`, `subtitle`, `content`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 1, 'random', 'wfqeg', 'sgwrahkandlfkn\r\n\r\n\r\nweglkwaglknwg\r\nweg\r\n', 43548, '2018-04-25 09:53:09', NULL),
(2, 2, 'fake article', 'fakest yet!', 'Sed iaculis ut lacus id ornare. Donec sodales sodales laoreet. Vestibulum eget tortor id neque fermentum viverra. Nunc augue erat, hendrerit id justo in, dignissim dictum lectus. Donec purus eros, consequat id neque eu, lacinia luctus dolor. Donec tincidunt lorem ligula, nec imperdiet nisi ullamcorper sit amet. Cras at augue efficitur, aliquam arcu et, euismod lectus. Aenean nec placerat felis. Mauris auctor velit mi, et rhoncus ex sodales vitae.\r\n<br />\r\nNulla et convallis nisi, in finibus ex. Quisque consequat vehicula magna, et commodo velit iaculis pulvinar. Donec vulputate nunc mi, ac dapibus augue faucibus in. Nullam non ipsum risus. Nunc lacinia finibus porttitor. Mauris a suscipit diam. Suspendisse interdum lorem dolor, imperdiet lobortis neque vehicula id. Donec laoreet aliquam faucibus. Nulla ornare ultrices lectus, maximus commodo augue condimentum sit amet. Maecenas ut sapien commodo, vestibulum tellus vitae, tempor nulla.\r\n<br />\r\nAliquam gravida imperdiet efficitur. Proin ac risus maximus, viverra sapien vitae, euismod nibh. Donec ac sodales ipsum, ut feugiat augue. In quam tortor, lobortis ac metus ac, imperdiet pretium orci. Integer nec molestie eros. Morbi ut mi nec lectus dictum feugiat. Sed ullamcorper justo ut sapien iaculis porta. Sed at faucibus nisl. Duis arcu metus, pellentesque eget lorem ut, molestie condimentum dolor. Aenean vel magna mollis, lacinia diam vel, pretium arcu. Nullam aliquam lacinia dolor eget vestibulum. Ut ut consequat nisi. Cras aliquet ante nec felis bibendum, sit amet lacinia nulla accumsan. Ut volutpat imperdiet est, vitae gravida ipsum feugiat ac.', 2393, '2018-04-25 09:53:29', NULL),
(3, 1, 'article SEf', 'wfqeg', 'sgwrahkandlfkn\r\n\r\nweglkwaglknwg\r\nweg\r\n', 4, '2018-04-25 09:53:47', NULL),
(4, 3, 'article', 'wfqeg', 'sgwrahkandlfkn\r\n\r\nweglkwaglknwg\r\nweg\r\n', 1216, '2018-04-25 09:53:59', NULL),
(5, 2, 'must have', 'wfqeg', 'sgwrahkandlfkn\r\n\r\nweglkwaglknwg\r\nweg\r\n', 341, '2018-04-25 09:54:13', NULL),
(6, 3, 'hana', 'wfqeg', 'sgwrahkandlfkn\r\n\r\nweglkwaglknwg\r\nweg\r\n', 1566, '2018-04-25 09:54:28', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
