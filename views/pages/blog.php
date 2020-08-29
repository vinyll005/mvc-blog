<?php include_once(ROOT.'/views/layouts/header.php'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
        		<div class="row">
					<?php if(!empty($articles)): ?>
						<?php foreach($articles as $article): ?>
							<?php
								$format = 'Y-m-d H:i:s';
								$date = DateTime::createFromFormat($format, $article['date']);
							?>
						<div class="col-sm-12 col-md-6 col-lg-4 ftco-animate">
    						<div class="blog-entry">
		    					<a href="/article/<?php echo $article['id']; ?>" class="img-2"><img src="/assets/images/article/<?php echo $article['id'];?>.jpg" width="223" height="280" alt="Colorlib Template"></a>
			    				<div class="text pt-3">
	    							<p><span class="pr-3"><?php echo ucfirst($article['category']); ?></span><span style="padding-left:75px;" class="ml-auto"><?php echo $date->format('d F, Y'); ?></span></p>
	    							<h3><a href="/article/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
	    							<p class="mb-0"><a href="/article/<?php echo $article['id']; ?>" class="btn btn-black py-2">Read More<span class="icon-arrow_forward ml-4"></span></a></p>
	    						</div>
		    				</div>
    					</div>
						<?php endforeach; ?>
					<?php endif; ?>
        		</div>
        		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
					  <?php echo $pagination->get(); ?>
		              </ul>
		            </div>
		          </div>
		        </div>
        	</div>

        	<div class="col-lg-3">
        		<div class="sidebar-wrap">
	        		<div class="sidebar-box p-4 about text-center ftco-animate">
			          <h2 class="heading mb-4">About Me</h2>
			          <img src="/assets/images/author.jpg" class="img-fluid" alt="Colorlib Template">
			          <div class="text pt-4">
			          	<p>Hi! My name is <strong>Cathy Deon</strong>, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
			          </div>
	        		</div>
	        		<div class="sidebar-box p-4 ftco-animate">

	            </div>
	            <div class="sidebar-box categories text-center ftco-animate">
			          <h2 class="heading mb-4">Categories</h2>
			          <ul class="category-image">
			          	<li>
			          		<a href="/blog/food" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(/assets/images/category-1.jpg);">
			          			<div class="text">
			          				<h3>Foods</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="/blog/lifestyle" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(/assets/images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Lifestyle</h3>
			          			</div>
			          		</a>
			          	</li>
			          	<li>
			          		<a href="/blog/others" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(/assets/images/category-2.jpg);">
			          			<div class="text">
			          				<h3>Others</h3>
			          			</div>
			          		</a>
			          	</li>
			          </ul>
	        		</div>
            </div>
        	</div>
        </div>
    	</div>
    </section>

	
		
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