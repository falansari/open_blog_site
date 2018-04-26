/**
 * MySQL version 8 InnoDB
 * 
 * Procedure: Retrieve most relevant articles based on search term by title, subtitle or content.
 * Order by, which record to start showing on the page and how many records to show chosen by site user.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_fetch_articles_search$$

CREATE PROCEDURE proc_fetch_articles_search(IN search TINYTEXT)
SELECT ua.id article_id, ua.title, ua.subtitle, ua.view_count, ua.created_at, ua.user_id, u.username
FROM user_articles ua
LEFT JOIN users u
ON ua.user_id = u.id
WHERE MATCH(ua.title, ua.subtitle, ua.content) AGAINST (search IN BOOLEAN MODE)
ORDER BY ua.view_count
$$

DELIMITER ;