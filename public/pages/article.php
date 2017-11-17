<?php
  require_once '../app/repositories.php';
  $idArticle = $_GET['id'];
  $article = getArticle($idArticle);
  $comments = getComments($idArticle);
  $author = getAuthor($article['users_id']);
  if ($author == false) {
    $fullname = "Anonyme";
  } else {
    $fullname = $author['firstname'] . ' ' . $author['lastname'];
  }
?>

<!-- Post Content Column -->
<div class="col-lg-8">

  <!-- Title -->
  <h1 class="mt-4"><?= ucfirst($article['title'])?></h1>
  <!-- Author -->
  <p class="lead">
    by
    <a href="#"><?= $fullname ?></a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p>Posted on January 1, 2017 at 12:00 PM</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

  <hr>

  <!-- Post Content -->
  <?= $article['content']?>
  <hr>

  <!-- Comments Form -->
  <div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form>
        <div class="form-group">
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <!-- All Comments -->
  <?php foreach ($comments as $comment) { ?>
    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
      <div class="media-body">
        <h5 class="mt-0"><?= $comment['name'] ?></h5>
        <?= $comment['content'] ?>
      </div>
    </div>
  <?php } ?>

</div>
