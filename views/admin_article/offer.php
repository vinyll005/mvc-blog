<?php include_once(ROOT.'/views/layouts/header.php'); ?>

<div class="container" style="padding-top:60px; padding-bottom:60px;">
        <div class="row">
            <h4>Hello admin!</h4>
        </div>
        <div class="row p-t-40">
            <p>Choose what you want to do:</p>
        </div>
            <ul style="padding:20px;">
                <li><a href="/admin/article">Go back to articles</a></li>
            </ul>        
</div>

<?php if(!empty($offeredArticles)): ?>

<div class="container-fluid" style="padding-bottom:60px;">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Article id</th>
      <th scope="col">Author name</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Date</th>
      <th scope="col">Category</th>
      <th scope="col">Check it</th>
    </tr>
  </thead>
  <tbody>
      
      <?php foreach($offeredArticles as $article): ?>
    <tr>
      <th scope="row"><?php echo $article['id']; ?></th>
      <td><?php echo $article['author']; ?></td>
      <td><?php echo $article['title']; ?></td>
      <td><?php echo $article['text']; ?></td>
      <td><?php echo $article['date']; ?></td>
      <td><?php echo ucfirst($article['category']); ?></td>
      <td style="padding-left:30px;"><a href="/admin/article/check/<?php echo $article['id']; ?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
    </tr>
      <?php endforeach; ?>
      <?php endif; ?>
  </tbody>
</table>
</div>


<?php include_once(ROOT.'/views/layouts/footer.php'); ?>