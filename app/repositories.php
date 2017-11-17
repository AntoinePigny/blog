<?php

/**
 * [getPDO description]
 * @return PDO
 */
  function getPDO()
  {
    $dsn = "mysql:dbname=blog;host=127.0.0.1;charset=UTF8";
    $username = "root";
    $password = "0000";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

/**
 * [getArticle description]
 * @param  $id int
 * @return void | array
 */
  function listArticles($offsetPage = 1, $limitArticle = 7)
  {
    $start = ($offsetPage - 1) * $limitArticle;
    $pdo = getPDO();
    $query = "SELECT `published_date`, CONCAT(SUBSTRING(`content` FROM 1 FOR 100), '...'), `idarticles`, `title`, `users_id`, `categories_id` FROM `articles` ORDER BY `published_date` DESC LIMIT :limitArticle OFFSET :start;";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(':limitArticle', $limitArticle, PDO::PARAM_INT);
    $prepare->bindParam(':start', $start, PDO::PARAM_INT);
    $result = $prepare->execute();
      if ($result == true) {
        return $prepare->fetchAll();
      }
  }

  function countArticles(){
    $pdo = getPDO();
    $query = "SELECT COUNT(*) FROM `articles`;";
    $result = $pdo->query($query);
    $count = $result->fetchColumn();
    return $count;
  }

  function getArticle($id)
  {
    $pdo = getPDO();
    $query = "SELECT * FROM `articles` WHERE `idarticles` = ?;";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(1, $id, PDO::PARAM_INT);
    $result = $prepare->execute();
      if ($result == true) {
        return $prepare->fetch();
      }
  }

  function getAuthor($id)
  {
    $pdo = getPDO();
    $query = "SELECT * FROM `users` WHERE `idusers` = ?;";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(1, $id, PDO::PARAM_INT);
    $result = $prepare->execute();
      if ($result == true) {
        return $prepare->fetch();
      }
  }

  function getComments($id)
  {
    $pdo = getPDO();
    $query = "SELECT * FROM `comments` WHERE `articles_id` = ?;";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(1, $id, PDO::PARAM_INT);
    $result = $prepare->execute();
      if ($result == true) {
        return $prepare->fetchAll();
      }
  }

  function paginate()
  {
    $pdo = getPDO();

  }
