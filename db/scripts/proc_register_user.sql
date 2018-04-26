/**
 * MySQL version 8 InnoDB
 * 
 * Procedure: Save new user record.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_register_user$$

CREATE PROCEDURE proc_register_user(IN nickname CHAR(20), IN fName VARCHAR(20), IN lName VARCHAR(20), IN emailAdd CHAR(50), IN pw CHAR(60))
INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES (NULL, nickname, fName, lName, emailAdd, pw, CURRENT_TIMESTAMP, NULL);

$$