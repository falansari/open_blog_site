/**
Procedure: Update article views count every time user accesses the article.
Called in PHP page.
 */
DELIMITER $$

DROP PROCEDURE IF EXISTS proc_update_article_view_count$$

CREATE PROCEDURE proc_update_article_view_count(IN articleId INT(11))
  UPDATE user_articles
    SET view_count = view_count+1
  WHERE id = articleId;
  $$

DELIMITER ;