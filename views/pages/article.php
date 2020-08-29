<?php include_once(ROOT.'/views/layouts/header.php'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread"><?php echo $article['title']; ?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/blog">Blog<i class="ion-ios-arrow-forward"></i></a></span> <span>Article<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

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


            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo $totalComments[0]; ?> Comments</h3>
              <ul class="comment-list">
            <?php if(!empty($comments)): ?>
                  <?php foreach($comments as $comment):
                    $format = 'Y-m-d H:i:s';
                    $date = DateTime::createFromFormat($format, $comment['date']);
                    ?>
                <li class="comment" style="padding-bottom:20px;">
                <div class="vcard bio">
                    <img src="/assets/images/person_1.png" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $comment['user_name']; ?></h3>
                    <div class="meta"><?php echo $date->format('d F, Y H:i:s'); ?></div>
                    <p><?php echo $comment['comment']; ?></p>
                  </div>
                </li>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <p>Be the first one to comment this article!</p>
                  <?php endif; ?>
              </ul>

              <?php if($totalComments[0] > 10): ?>
              <div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
					  <?php echo $pagination->get(); ?>
		              </ul>
		            </div>
		          </div>
                </div>
              <?php endif; ?>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form class="p-5 bg-light" method="POST">
                    <input type="hidden" name="article_id" value="<?php echo $article['article_id']; ?>">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
            <div class="sidebar-box ftco-animate">
              <ul class="categories">
                <h3 class="heading mb-4">Categories</h3>
                <li><a href="/blog/food">Foods<span>(<?php echo Articles::getTotalArticlesByCategory('food')[0]; ?>)</span></a></li>
                <li><a href="/blog/lifestyle">Lifestyle<span>(<?php echo Articles::getTotalArticlesByCategory('lifestyle')[0]; ?>)</span></a></li>
                <li><a href="/blog/others">Others<span>(<?php echo Articles::getTotalArticlesByCategory('others')[0]; ?>)</span></a></li>

              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Recent Blog</h3>
              <?php for($i = 0; $i < 3; $i++):
                $format = 'Y-m-d H:i:s';
                $date = DateTime::createFromFormat($format, $latestArticles[$i]['date']);
                ?>
                <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/assets/images/article/<?php echo $latestArticles[$i]['id']; ?>.jpg);"></a>
                <div class="text">
                  <h3><a href="/article/<?php echo $latestArticles[$i]['id']; ?>"><?php echo $latestArticles[$i]['title']; ?></a></h3>
                  <div class="meta">
                    <div><a href="/article/<?php echo $latestArticles[$i]['id']; ?>"><span class="icon-calendar"></span> <?php echo $date->format('d F, Y'); ?></a></div>
                    <div><a href="/article/<?php echo $latestArticles[$i]['id']; ?>"><span class="icon-person"></span><?php echo $latestArticles[$i]['author']; ?></a></div>
                    <div><a href="/article/<?php echo $latestArticles[$i]['id']; ?>"><span class="icon-chat" style="padding-right:4px;"></span><?php echo Comments::getTotalComments($latestArticles[$i]['id'])[0]; ?></a></div>
                  </div>
                </div>
              </div>
              <?php endfor; ?>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading mb-4">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
		
		<section class="ftco-subscribe ftco-section bg-light">
      <div class="overlay">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
              <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include_once(ROOT.'/views/layouts/footer.php'); ?>