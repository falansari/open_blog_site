/**
 * MySQL version 8 InnoDB
 * 
 * Procedure: Retrieve count of total results in user search query.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE if EXISTS proc_count_fetch_articles_search$$

CREATE PROCEDURE proc_count_fetch_articles_search(IN search TINYTEXT)
SELECT COUNT(*) count
FROM 
(SELECT ua.id
FROM user_articles ua
LEFT JOIN users u
ON ua.user_id = u.id
WHERE MATCH(ua.title, ua.subtitle, ua.content) AGAINST (search IN BOOLEAN MODE)
GROUP BY ua.id) as total_results

$$

DELIMITER ;