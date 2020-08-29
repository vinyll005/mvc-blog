<?php include_once(ROOT.'/views/layouts/header.php'); ?>

		<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 order-lg-last ftco-animate">
            <h2 class="mb-3"><?php echo $article['title']; ?></h2>
            <p>by <?php echo $article['author']; ?></p>
            <p style="padding-bottom:8px;"><?php echo $date->format('d F, Y'); ?></p>
            <p>
              <img src="/assets/images/article/<?php echo $article['article_id'];?>.jpg" alt="" class="img-fluid">
            </p>
            <p style="padding-top:15px;"><?php echo $article['text']; ?></p>
          </div>
        </div>
      </div>
    </section>

    <form action="" method="POST">
    <div class="container" style="padding-bottom:50px;">
        <div class="row">
            <div class="col-4">
            <input type="submit" name="button" value="Accept" class="btn btn-success">
            </div>
            <div class="col-4">
            <input type="submit" name="button" value="Decline" class="btn btn-danger">
            </div>
        </div>
    </form>

    
    </div>

<?php include_once(ROOT.'/views/layouts/footer.php'); ?>