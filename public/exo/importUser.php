  <?php
  if(!isset($_GET['offset']))
    $offset = 0;
  else
    $offset = $_GET['offset'];

  // Connexion
  $dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
  $pdo = new PDO($dsn, "root", "0000");

  // Compter le nombre de row dans la table `users`
  $row_count = $pdo->query('SELECT * FROM `users`')->rowCount();
  $limit = 2;
  $pageNumber = round(($row_count / $limit), 0, PHP_ROUND_HALF_UP);
  // ou $pageNumber = ceil($row_count / $limit);
  $offsetMax = $row_count - $limit;
  $sql = "SELECT * FROM `users` ORDER BY `birthdate` ASC LIMIT " . $limit . " OFFSET " . $offset . ";";
  $results = $pdo->query($sql);
  foreach ($results as $rows) {?>
  <tr>
    <td><?= $rows['id'] ?></td>
    <td><?= $rows['email'] ?></td>
    <td><?= $rows['password'] ?></td>
    <td><?= $rows['birthdate'] ?></td>
  </tr>
  <?php }