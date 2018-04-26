/**
 * MySQL version 8 InnoDB
 * 
 * Procedure: Retrieves the full information related to a specific article.
 * Called whenever the article's view page is accessed.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_fetch_article_info$$

CREATE PROCEDURE proc_fetch_article_info(IN articleId INT(11))
SELECT ua.id article_id, ua.user_id, ua.title, ua.subtitle, ua.content, ua.view_count, 
  ua.created_at, ua.updated_at, u.username, u.first_name, u.last_name
FROM user_articles ua, users u
WHERE
ua.id = articleId
AND
ua.user_id = u.id
$$

DELIMITER ;