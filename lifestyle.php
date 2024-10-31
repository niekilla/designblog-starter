<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
require 'config.php';

// Ambil artikel dengan kategori 'technology' dan nama pengguna
$query = "
    SELECT a.*, u.nama_users 
    FROM articles a 
    JOIN users u ON a.user_id = u.user_id 
    WHERE a.category_id = (SELECT category_id FROM categories WHERE name = 'lifestyle')
";
$result = $conn->query($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web Programming - Final Semester Exam</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!-- header -->
<header class="w3l-header">
	<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<span class="fa fa-pencil-square-o"></span> Design Blog</a>
			<!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<!-- <span class="navbar-toggler-icon"></span> -->
				<span class="fa icon-expand fa-bars"></span>
				<span class="fa icon-close fa-times"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item @@home__active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories <span class="fa fa-angle-down"></span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item @@cp__active" href="technology.php">Technology posts</a>
							<a class="dropdown-item active" href="lifestyle.php">Lifestyle posts</a>
						</div>
					</li>
					<li class="nav-item @@contact__active">
						<a class="nav-link" href="contact.html">Contact</a>
					</li>
                    <li class="nav-item @@about__active">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
				</ul>

				<!--/search-right-->
				<div class="search-right mt-lg-0 mt-2">
					<a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
					<!-- search popup -->
					<div id="search" class="pop-overlay">
						<div class="popup">
							<h3 class="hny-title two">Search here</h3>
							<form action="#" method="Get" class="search-box">
								<input type="search" placeholder="Search for blog posts" name="search"
									required="required" autofocus="">
								<button type="submit" class="btn">Search</button>
							</form>
							<a class="close" href="#close">×</a>
						</div>
					</div>
					<!-- /search popup -->
				</div>
				<!--//search-right-->
                    <!-- author -->
                    <!-- <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                        <a class="img-circle img-circle-sm" href="#author">
                            <img src="assets/images/author.jpg" class="img-fluid" alt="...">
                        </a>
                        <div class="align-self ml-3">
                            <a href="#author">
                                <h5>Alexander</h5>
                            </a>
                            <span>Blog Writer</span>
                        </div>
                    </div> -->
                    <!-- // author-->

			</div>

            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
		</div>
	</nav>
	<!--//nav-->
</header>
<!-- //header -->

<nav id="breadcrumbs" class="breadcrumbs">
	<div class="container page-wrapper">
		<a href="index.html">Home</a> / Categories / <span class="breadcrumb_last" aria-current="page">Lifestyle</span>
	</div>
</nav>
<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-8 most-recent">
                <h3 class="section-title-left">Lifestyle</h3>
                
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($article = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-6 col-md-6 item mb-4">
                                <div class="card">
                                    <div class="card-header p-0 position-relative">
                                        <a href="blog-single.php?id=<?php echo $article['article_id']; ?>">
                                            <img class="card-img-bottom d-block radius-image" src="assets/images/<?php echo $article['image']; ?>" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body p-0 blog-details">
                                        <a href="counter.php?id=<?php echo $article['article_id']; ?>" class="blog-desc"><?php echo $article['title']; ?></a>
                                        <p><?php echo substr($article['content'], 0, 100) . '...'; // Menampilkan 100 karakter pertama ?></p>
                                        <div class="author align-items-center mt-3 mb-1">
                                            <a href="#author"><?php echo $article['nama_users']; // Ganti dengan nama pengguna jika perlu ?></a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"><?php echo date('F j, Y', strtotime($article['created_at'])); ?></span>
                                            </li>
                                            <li class="meta-item blog-students">
                                                <span class="meta-value"><?php echo $article['view_count']; ?> reads</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>Tidak ada artikel di kategori 'lifestyle'.</p>";
                    }
                    ?>
                </div>

                <!-- pagination -->
                <div class="pagination-wrapper mt-5">
                    <ul class="page-pagination">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#url">2</a></li>
                        <li><a class="page-numbers" href="#url">3</a></li>
                        <li><a class="page-numbers" href="#url">4</a></li>
                        <li><a class="page-numbers" href="#url">....</a></li>
                        <li><a class="page-numbers" href="#url">15</a></li>
                        <li><a class="next" href="#url"><span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>
                <!-- //pagination -->
            </div>
            <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5">
                <div class="pos-sticky">
                    <h3 class="section-title-left">Trending </h3>

                    <?php
                    // Jumlah artikel trending yang ditampilkan
                    $trendingLimit = 4; 

                    // Query untuk mengambil artikel trending dari kategori 'lifestyle'
                    $query = "
                        SELECT a.*, u.nama_users
                        FROM articles a 
                        JOIN users u ON a.user_id = u.user_id 
                        WHERE a.category_id = (SELECT category_id FROM categories WHERE name = 'lifestyle') 
                        ORDER BY a.view_count DESC 
                        LIMIT $trendingLimit
                    ";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $index = 1;
                        while ($article = $result->fetch_assoc()) {
                            echo "<div class='grids5-info'>";
                            echo "<h4>" . str_pad($index, 2, '0', STR_PAD_LEFT) . ".</h4>";
                            echo "<div class='blog-info'>";
                            echo "<a href='counter.php?id={$article['article_id']}' class='blog-desc1'>{$article['title']}</a>";
                            echo "<div class='author align-items-center mt-2 mb-1'>";
                            echo "<a href='#author'>{$article['nama_users']}</a> "; // Menampilkan nama pengguna
                            echo "</div>";
                            echo "<ul class='blog-meta'>";
                            echo "<li class='meta-item blog-lesson'><span class='meta-value'>" . date('F j, Y', strtotime($article['created_at'])) . "</span></li>"; // Format tanggal
                            echo "<li class='meta-item blog-students'><span class='meta-value'> Dibaca: {$article['view_count']} read</span></li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</div>";
                            $index++;
                        }
                    } else {
                        echo "<p>Belum ada artikel trending di kategori 'lifestyle'.</p>";
                    }
                    ?>

            </div>
        </div>
        <!-- //block-->

        <!-- ad block -->
        <div class="ad-block text-center mt-5">
            <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
        </div>
        <!-- //ad block -->
    </div>
</div>

<!-- footer -->
<footer class="w3l-footer-16">
  <div class="footer-content py-lg-5 py-4 text-center">
    <div class="container">
      <div class="copy-right">
        <h6>© 2020 Design Blog . Made with <span class="fa fa-heart" aria-hidden="true"></span>, Designed by <a
            href="https://w3layouts.com">W3layouts</a> </h6>
      </div>
      <ul class="author-icons mt-4">
        <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a> </li>
        <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
        <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
        <li><a class="linkedin" href="#url"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
        <li><a class="github" href="#url"><span class="fa fa-github" aria-hidden="true"></span></a></li>
        <li><a class="dribbble" href="#url"><span class="fa fa-dribbble" aria-hidden="true"></span></a></li>
      </ul>
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
    </div>
  </div>

  <!-- move top -->
  <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
      } else {
        document.getElementById("movetop").style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <!-- //move top -->
</footer>
<!-- //footer -->

<!-- Template JavaScript -->
<script src="assets/js/theme-change.js"></script>

<script src="assets/js/jquery-3.3.1.min.js"></script>

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<script src="assets/js/bootstrap.min.js"></script>

</body>

</html>