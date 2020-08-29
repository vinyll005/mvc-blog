<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stories - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="/assets/css/aos.css">

    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/style.css">

        <!-- Icons font CSS-->
        <link href="/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Stories<span>.</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php if(mb_strlen($_SESSION['uri']) == 0) echo 'active'; ?> "><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item <?php if(stristr($_SESSION['uri'], 'about')) echo 'active'; ?>"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item <?php if(stristr($_SESSION['uri'], 'blog')) echo 'active'; ?>"><a href="/blog" class="nav-link">Blog</a></li>
              <li class="nav-item <?php if(stristr($_SESSION['uri'], 'contacts')) echo 'active'; ?>"><a href="/contacts" class="nav-link">Contacts</a></li>
              <?php if(!empty($_SESSION['user_id'])) { ?>
                <li class="nav-item"><a href="/user/article" class="nav-link"><?php echo $_SESSION['user_name']; ?></a></li>
                <li class="nav-item"><a href="/logout" class="nav-link">Exit</a></li>
              <?php } else  { ?>
              <li class="nav-item <?php if(stristr($_SESSION['uri'], 'login') || stristr($_SESSION['uri'], 'register')) echo 'active'; ?>"><a href="/login" class="nav-link">Log in</a></li>
              <?php } ?>
              <?php if(!empty($_SESSION['role']))   { ?>
                <li class="nav-item"><a href="/admin" class="nav-link">Admin panel</a></li>
              <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->