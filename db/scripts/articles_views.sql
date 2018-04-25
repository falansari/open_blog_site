/**
Procedure: returns top five most popular articles based on view count, 
even if fk user_id is null.
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS top_five_articles$$

CREATE PROCEDURE top_five_articles()
  SELECT ua.id article_id, ua.title, ua.subtitle, ua.view_count, ua.created_at, ua.user_id, u.username
  FROM user_articles ua
  LEFT JOIN users u
  ON ua.user_id = u.id
  ORDER BY ua.view_count DESC
  LIMIT 5 $$
$$

/**
Procedure: Update article views count every time user accesses the article.
Called in PHP page.
 */
DROP PROCEDURE IF EXISTS update_user_articles_view_count$$

CREATE PROCEDURE update_user_articles_view_count(IN articleId INT(11))
  UPDATE user_articles
    SET view_count = view_count+1
  WHERE id = articleId;
  $$

DELIMITER ;