/**
Procedure: Retrieves the full information related to a specific article.
Called whenever the article's view page is accessed.
*/
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_fetch_article_info$$

CREATE PROCEDURE proc_fetch_article_info()
SELECT ua.id article_id, ua.user_id, ua.title, ua.subtitle, ua.content, ua.view_count, 
  ua.created_at, ua.updated_at, u.username, u.first_name, u.last_name
FROM user_articles ua, users u
WHERE
ua.id = 1
AND
ua.user_id = u.id
$$

DELIMITER ;