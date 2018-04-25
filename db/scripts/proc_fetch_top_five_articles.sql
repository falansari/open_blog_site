/**
Procedure: returns top five most popular articles based on view count, 
even if fk user_id is null.
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