<?
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PT Ciputra Raya</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img style="width: 50%;" src="assets/images/citra-raya.jpg">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">cluster</a></li>
                            <li class="scroll-to-section"><a href="about.html">About Us</a></li>
                            <li class="scroll-to-section"><a href="login.php">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are Citra Raya Tanggerang</h4>
                            </div>
                            <img style="height: 530px;" src="assets/images/citra-raya-02.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <img style="height: 250px;" src="assets/images/citra-raya-01.jfif">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <img style="height: 250px;" src="assets/images/citra-raya-03.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <img style="height: 250px;" src="assets/images/citra-raya-04.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <img src="assets/images/citra-raya-05.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Cluster</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <?php
                            $data = mysqli_query($conn, "select * from produk");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <div class="item">
                                    <div class="thumb">
                                        <img src="images/produk/<?php echo $d['foto'] ?> " alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4><? echo $d['nama_produk']; ?></h4>
                                        <span>Rp. <? echo $d['harga_produk']; ?></span>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Citra Raya Tangerang</h2>
                        <span>Pilihan yang tepat untuk investasi masa depan Anda</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Management Office :<br><span>Jl. Ecopolis Avenue Blok VE. 07 no. 07-09
                                        CitraRaya - Tangerang 15710</span></li>
                                <li>Phone:<br><span>(021) 2259 6999</span></li>
                                <li>Marketing Office:<br><span>Jl. CitraRaya Boulevard Tangerang 15710</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>08:00 AM - 5:00 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Social Media:<br><span><a href="https://www.facebook.com/CitraRaya">Facebook</a>, <a href="https://www.instagram.com/citraraya">Instagram</a>, <a href="https://www.youtube.com/channel/UCbY8-vMoUzoPbQ3IR8q8CZA">Youtube</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img style="width: 80%;" src="assets/images/citra-raya.jpg" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li>
                                <p style="color: white;">Jl. CitraRaya Boulevard Tangerang 15710</p>
                            </li>
                            <li>
                                <p style="color: white;">(021) 2966 0934</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#men">Cluster</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Sosial Media</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/CitraRaya">Facebook</a></li>
                        <li><a href="https://www.instagram.com/citraraya">Instagram</a></li>
                        <li><a href="https://www.youtube.com/channel/UCbY8-vMoUzoPbQ3IR8q8CZA">YouTube</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 All Rights Reserved.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

</body>

</html>