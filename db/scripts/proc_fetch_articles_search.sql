/**
Procedure: Retrieve most relevant articles based on search term by title, subtitle or content,
  and order them by most popular.
*/
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_fetch_articles_search$$

CREATE PROCEDURE proc_fetch_articles_search(IN search VARCHAR(200))
SELECT ua.id article_id, ua.title, ua.subtitle, ua.view_count, ua.created_at, ua.user_id, u.username
FROM user_articles ua
LEFT JOIN users u
ON ua.user_id = u.id
WHERE MATCH(ua.title, ua.subtitle, ua.content) AGAINST (search IN BOOLEAN MODE)
ORDER BY ua.view_count DESC
LIMIT 50