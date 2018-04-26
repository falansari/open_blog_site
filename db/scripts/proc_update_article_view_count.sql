/**
 * MySQL version 8 InnoDB
 * 
 * Update article views count every time user accesses the article.
 * 
 * @category procedure
 * @package  Open_Blog_Site
 * @author   Fatima A. Alansari <fatima.a.alansari@outlook.com>
 * @license  All rights reserved
 * @link     https://github.com/fatima-alansari/open_blog_site
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_update_article_view_count$$

CREATE PROCEDURE proc_update_article_view_count(IN articleId INT(11))
  UPDATE user_articles
    SET view_count = view_count+1
  WHERE id = articleId;
  $$

DELIMITER ;