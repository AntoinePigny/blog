<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <table class="table table-striped table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Password hash</th>
      <th>Birthdate</th>
    </tr>
  </thead>
  <tbody>
    <?php require_once 'importUser.php'; ?>
  </tbody>
</table>
  <?php
    echo "<ul style='display:flex;justify-content:center;' class='pagination pagination-lg'>";
    if($offset > 0){?>
      <li class="page-item">
        <a class="page-link" href="?offset=<?=($offset - $limit)?>">Previous</a>
      </li>
    <?php } else {?>
      <li class="page-item">
        <a class="page-link" disable>Previous</a>
      </li>
    <?php }
    $j = 0;
    for ($i = 1; $i <= $pageNumber; $i++) {?>
      <li class="page-item">
        <a class="page-link" href="?offset=<?= $j ?>"><?= $i ?></a>
      </li>
      <?php $j += 2;
    }
    if($offset < $offsetMax) {?>
      <li class="page-item">
        <a class="page-link" href="?offset=<?= ($offset + $limit) ?>">Next</a>
      </li>
    <?php } else {?>
      <li class="page-item">
        <a class="page-link" disable>Next</a>
      </li>
    <?php }
    echo "</ul>";
?>
  <div style="width:200px;" class="form-group">
    <label for="select">Nombre d'éléments par page</label>
    <select class="form-control" id="select" name="select">
      <option data-page="1">1</option>
      <option data-page="2">2</option>
      <option data-page="3">3</option>
    </select>
  </div>


</body>
</html>
