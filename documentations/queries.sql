-- Liste des articles (trier par date de parution DESC) => index.php
  SELECT * FROM `articles` ORDER BY `published_date` DESC;
  -- Count du nombre de commentaire par article (articleId)
  SELECT `articles_id`, COUNT(*) FROM `comments` GROUP BY `articles_id`;
-- L'affichage d'un article (id) => article.php
  SELECT * FROM `articles` WHERE `idarticle` = ?;
  -- Recupère la catégorie de l'article (articleId)
  $catID = "SELECT `categories_id` FROM `articles` WHERE `idarticles` = ?";
  SELECT `label` FROM `categories` WHERE `idcategories` = ?;
  -- Récupère les tags de l'article (articleId)
  $tagsId[] = "SELECT `tags_id` FROM `articles_has_tags` WHERE `articles_id` = ?";
  SELECT `label` FROM `tags` WHERE `idtags` = ?;

  -- Récupère les infos auteur (userId)
  SELECT `users_id` FROM `articles` WHERE `idarticles` = ?;
  SELECT `firstname`, `lastname` FROM `users` WHERE `idusers` = ?;
  -- Commentaire de l'article (articleId)
  SELECT `content` FROM `comments` WHERE `articles_id` = ?;
-- L'affichage d'un auteur (id) => author.php
  SELECT `users_id` FROM `articles` WHERE `idarticles` = ?;
  SELECT * [except `password`] FROM `users` WHERE `idusers` = ?;

  -- Une liste d'articles (userId) (trier par date de parution DESC)
  SELECT * FROM `articles` WHERE `users_id` = ? ORDER BY `published_date` DESC;
-- Liste des articles par tags
  SELECT `idtags` FROM `tags` WHERE `label` LIKE '';
  SELECT `articles_id` FROM `articles_has_tags` WHERE `tags_id` = ?;
-- Liste des articles par catégories
  SELECT `idcategories` FROM `categories` WHERE `label` LIKE '%Yellow%';
  SELECT * FROM `articles` WHERE `categories_id` = ?;





-- SELECT COUNT(*) AS nbr_comments, `articles_id`, `title`, `articles`.`content`, CONCAT(`firstname`, ' ', `lastname`) AS fullname
-- FROM `comments`
-- INNER JOIN `articles` ON `articles`.`idarticles` = `comments`.`articles_id`
-- INNER JOIN `users` ON `articles`.`users_id` = `users`.`idusers`
-- GROUP BY `articles_id`
-- ORDER BY nbr_comments DESC;
