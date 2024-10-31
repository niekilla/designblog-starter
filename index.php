<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
require 'config.php';
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
                    <span class="fa fa-pencil-square-o"></span> Web Programming Blog</a>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item dropdown @@category__active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item @@cp__active" href="technology.html">Technology posts</a>
                                <a class="dropdown-item @@ls__active" href="lifestyle.html">Lifestyle posts</a>
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
    <div class="w3l-homeblock1">
    <div class="container pt-lg-5 pt-md-4">
        <!-- block -->
        <div class="row">
            <div class="col-lg-9 most-recent">
                    <h3 class="section-title-left">Most Recent Posts</h3>
                    <div class="list-view">
                        <?php
                        // Batas artikel terbaru yang ditampilkan
                        $limit = 5;

                        // Ambil halaman saat ini dari URL, jika tidak ada default ke halaman 1
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $offset = ($page - 1) * $limit;

                        // Query untuk artikel dengan limit dan offset
                        $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($article = $result->fetch_assoc()) {
                                echo "<div class='grids5-info img-block-mobile mt-5'>";
                                echo "<div class='blog-info align-self'>";
                                echo "<span class='category'>{$article['category_id']}</span>";
                                echo "<a href='counter.php?id={$article['article_id']}' class='blog-desc'>{$article['title']}</a>";
                                echo "<p>{$article['content']}</p>";
                                echo "<div class='author align-items-center mt-3 mb-1'>";
                                echo "<a href='#author'>{$article['user_id']}</a>";
                                echo "</div>";
                                echo "<ul class='blog-meta'>";
                                echo "<li class='meta-item blog-lesson'>";
                                echo "<span class='meta-value'>{$article['created_at']}</span>";
                                echo "</li>";
                                echo "<li class='meta-item blog-students'>";
                                echo "<span class='meta-value'>{$article['view_count']} read</span>";
                                echo "</li>";
                                echo "</ul>";
                                echo "</div>";
                                echo "<a href='#blog-single' class='d-block zoom mt-md-0 mt-3'><img src='assets/images/{$article['image_url']}' alt='' class='img-fluid radius-image news-image'></a>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>Belum ada artikel.</p>";
                        }
                        ?>
                    </div>
            

                    <!-- pagination -->
                    <div class="pagination-wrapper mt-5">
                        <ul class="page-pagination">
                            <?php
                            // Hitung total halaman
                            $resultTotal = $conn->query("SELECT COUNT(*) as total FROM articles");
                            $rowTotal = $resultTotal->fetch_assoc();
                            $totalArticles = $rowTotal['total'];
                            $totalPages = ceil($totalArticles / $limit);

                            // Tombol halaman sebelumnya
                            if ($page > 1) {
                                $prevPage = $page - 1;
                                echo "<li><a class='prev' href='?page=$prevPage'><span class='fa fa-angle-left'></span></a></li>";
                            }

                            // Link ke halaman-halaman
                            for ($i = 1; $i <= $totalPages; $i++) {
                                if ($i == $page) {
                                    echo "<li><span aria-current='page' class='page-numbers current'>$i</span></li>";
                                } else {
                                    echo "<li><a class='page-numbers' href='?page=$i'>$i</a></li>";
                                }
                            }

                            // Tombol halaman berikutnya
                            if ($page < $totalPages) {
                                $nextPage = $page + 1;
                                echo "<li><a class='next' href='?page=$nextPage'><span class='fa fa-angle-right'></span></a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- //pagination -->
                </div>
                <div class="col-lg-3 trending mt-lg-0 mt-5 mb-lg-5">
                <div class="pos-sticky">
                    <h3 class="section-title-left">Trending</h3>

                    <?php
                    $trendingLimit = 4; // Jumlah artikel trending yang ditampilkan
                    $query = "SELECT * FROM articles ORDER BY view_count DESC LIMIT $trendingLimit";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $index = 1;
                        while ($article = $result->fetch_assoc()) {
                            echo "<div class='grids5-info'>";
                            echo "<h4>" . str_pad($index, 2, '0', STR_PAD_LEFT) . ".</h4>";
                            echo "<div class='blog-info'>";
                            echo "<a href='counter.php?id={$article['article_id']}' class='blog-desc1'>{$article['title']}</a>";
                            echo "<div class='author align-items-center mt-2 mb-1'>";
                            echo "<a href='#author'>{$article['user_id']}</a> ";
                            echo "</div>";
                            echo "<ul class='blog-meta'>";
                            echo "<li class='meta-item blog-lesson'><span class='meta-value'>{$article['created_at']}</span></li>";
                            echo "<li class='meta-item blog-students'><span class='meta-value'> Dibaca: {$article['view_count']} read</span></li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</div>";
                            $index++;
                        }
                    } else {
                        echo "<p>Belum ada artikel trending.</p>";
                    }
                    ?>
                </div>

                </div>
            </div>
            <!-- //block-->

            <!-- ad block -->
            <!-- <div class="ad-block text-center mt-5">
                <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
            </div> -->
            <!-- //ad block -->

        </div>
    </div>
    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2024 Web Programming Blog . Made by <i>(your name)</i> with <span class="fa fa-heart" aria-hidden="true"></span><br>Designed by
                        <a href="https://w3layouts.com">W3layouts</a> </h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                    </li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                    </li>
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