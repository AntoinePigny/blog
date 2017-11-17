<?php
  require_once '../app/repositories.php';
  $currentPage = (!empty($_GET['page']) ? $_GET['page'] : 1);
  $limitArticle = 7;
  $articles = listArticles($currentPage, $limitArticle);
  $count = countArticles();
 ?>
 <!-- Blog Entries Column -->
 <div class="col-md-8">

   <h1 class="my-4">Page Heading
     <small>Secondary Text</small>
   </h1>

   <!-- Blog Post -->
   <?php foreach ($articles as $article) {
      $author = getAuthor($article['users_id']);
      if ($author == false) {
        $fullname = "Anonyme";
      } else {
        $fullname = $author['firstname'] . ' ' . $author['lastname'];
      }
      $content = $article["CONCAT(SUBSTRING(`content` FROM 1 FOR 100), '...')"];?>
   <div class="card mb-4">
     <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
     <div class="card-body">
       <h2 class="card-title"><?= ucfirst($article['title']) ?></h2>
       <p class="card-text"><?= $content ?></p>
       <a href="#" class="btn btn-primary">Read More &rarr;</a>
     </div>
     <div class="card-footer text-muted">
       Publication date : <?= $article['published_date'] ?> by
       <a href="author.php"><?= $fullname ?></a>
     </div>
   </div>
 <?php } ?>
   <!-- Pagination -->
   <ul class="pagination justify-content-center mb-4">
      <?php if(($currentPage * $limitArticle) < $count) { ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $currentPage + 1; ?>">&larr; Older</a>
      </li>
      <?php } else { ?>
      <li class="page-item disabled">
        <span class="page-link" >&larr; Older</span>
      </li>
      <?php } ?>
      <?php if ($currentPage > 1) { ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $currentPage - 1; ?>">Newer &rarr;</a>
      </li>
      <?php } else { ?>
      <li class="page-item disabled">
        <span class="page-link" >Newer &rarr;</span>
      </li>
      <?php } ?>

   </ul>

 </div>
