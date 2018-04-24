/**
Procedure: returns top five most popular articles based on view count.
Called in PHP article search script.
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS top_five_articles$$

CREATE PROCEDURE top_five_articles()
  SELECT ua.id, ua.title, ua.subtitle, ua.view_count, ua.created_at, ua.user_id
  FROM user_articles ua
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