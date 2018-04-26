/**
 * MySQL version 8 InnoDB
 * 
 * Procedure: Retrieve user record.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_login_user$$

CREATE PROCEDURE proc_login_user(IN nickname CHAR(20), IN pw CHAR(60))
SELECT id FROM users 
WHERE
username = nickname
AND
password = pw
$$

DELIMITER ;