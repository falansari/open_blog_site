/**
 * MySQL version 8 InnoDB
 * 
 * Return top five most popular articles based on view count, 
 * even if foreign key user_id is null.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_fetch_top_five_articles$$

CREATE PROCEDURE proc_fetch_top_five_articles()
  SELECT ua.id article_id, ua.title, ua.subtitle, ua.view_count, ua.created_at, ua.user_id, u.username
  FROM user_articles ua
  LEFT JOIN users u
  ON ua.user_id = u.id
  ORDER BY ua.view_count DESC
  LIMIT 5 $$
$$