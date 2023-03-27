<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>CSAD mini-project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	<div class="container">
            <a class="navbar-brand" href="mainPage.php">FamilyforHope</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu">Menu</span> 
            </button>
            
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="mainPage.php#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#news-section" class="nav-link"><span>News</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#help_center-section" class="nav-link"><span>Help Centers</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#volunteer-section" class="nav-link"><span>Volunteer</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#donate-section" class="nav-link"><span>Donate</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#about-section" class="nav-link"><span>About Us</span></a></li>
                    <li class="nav-item"><a href="mainPage.php#contact-section" class="nav-link"><span>Contact Us</span></a></li>
                </ul>
            </div>
	</div>
    </nav>
	  
	  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/homepage-img1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-4">
            <h1 class="mb-3 bread">Discover Your Suitable Center</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="mainPage.php#home-section">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Destination <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "miniproject";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if (mysqli_connect_error()) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        
//        $sql="SELECT * FROM centre";
//        $result = $conn->query($sql);
        
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['by_name']);
            $sql = "SELECT * FROM centre WHERE centre_name LIKE '%$search%' OR centre_zone LIKE '%$search%'";
            $result = $conn->query($sql);
            }
    ?> 
    
        <section class="ftco-section">
    	<div class="container">
            <div class="row">
    		<div class="col-lg-9 pr-lg-4">
                    <div class="row">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                            echo "<div class='col-md-6 col-lg-4 ftco-animate'>";
                                            echo "<div class='project'>";
                                            echo "<div class='gallery'>";
                                            echo "<div class='img'>";             
                                            echo "<a href='{$row['centre_unique_link']}'><img src='{$row['centre_image_one']}' class='img-fluid' alt='Colorlib Template'></a>";
                                            echo "</div>";
                                            $img_paths = array($row['centre_image_one'], $row['centre_image_two'], $row['centre_image_three']);
                                            for ($img_path_index = 0; $img_path_index < count($img_paths); $img_path_index++) {
                                                $img_path = $img_paths[$img_path_index];
                                                $pos = $img_path_index + 1;
                                                echo "<a href='{$img_path}' class='icon image-popup d-flex justify-content-center align-items-center pos-abs zindex-{$pos}'>";
                                                echo "<span class='icon-expand'></span>";
                                                echo "</a>";
                                            }
                                            echo "</div>";
                                            echo "<div class='text'>";
                                            echo "<h4 class='price'>{$row['centre_age_group']}</h4>";
                                            echo "<span>{$row['centre_name']}</span><br>";
                                            echo "<span>{$row['centre_zone']}</span>";
                                            echo "<h3><a href='{$row['center_url']}'>Go to Website</a></h3>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                    }}
                                    
                                    ?>
                        </div>
    		</div>
                        
                        
                        <div class="col-lg-3 p-4 bg-light">
                    <div class="search-wrap-1 ftco-animate">
                        <h2 class="mb-3">Find Centers</h2>
                        
                            <form action="search_centrelist.php" method="post" class="search-property-1">
                                <div class="row">

                                    <div class="col-lg-12 align-items-end mb-3">
                                    <div class="form-group">
                                        <label >Center Name</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="ion-ios-search"></span></div>
				            <input type="text" class="form-control" name="by_name" placeholder="Enter Name or Zone">
				        </div>
                                    </div>
                                    </div>
                                    
                                    </div>
                                    <div class="col-lg-12 align-self-end">
                                        <div class="form-group">
                                        <div class="form-field">
				            <input type="submit" value="Search" name="submit-search" class="form-control btn btn-primary">
				        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div> <!-- end -->
            </div>
    	</div>
    </section>
    
    
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">About <span><a href="mainPage.php">FamilyforHope</a></span></h2>
                <p>A child life is like a piece paper on which everyone leave a mark.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="https://twitter.com/SingaporePoly?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="https://www.facebook.com/singaporepolytechnic/"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="https://www.instagram.com/singaporepoly/?hl=en"><span class="icon-instagram"></span></a></li>
                </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
                <h2 class="ftco-heading-2">More Centers</h2>
                <ul class="list-unstyled">
                    <li><a href="https://www.arcchildren.org/about/"><span class="icon-long-arrow-right mr-2"></span>ARC Children center</a></li>
                    <li><a href="http://ywca.org.sg/ywcastory/present/cdc/"><span class="icon-long-arrow-right mr-2"></span>YWCA Child Development center</a></li>
                    <li><a href="https://www.autismlinks.org.sg/programmes/ecc"><span class="icon-long-arrow-right mr-2"></span>Eden Children's Centre </a></li>
                    <li><a href="https://www.bcare.org.sg/"><span class="icon-long-arrow-right mr-2"></span>Bethesda CARE Centre</a></li>
                    <li><a href="https://lifechildcare.edu.sg/"><span class="icon-long-arrow-right mr-2"></span>Life Child society</a></li>
                    <li><a href="https://www.shine.org.sg/"><span class="icon-long-arrow-right mr-2"></span>SHINE Children and Youth Services - Clementi Centre</a></li>
                </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Other Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="https://www.cdc.gov/healthyyouth/protective/index.htm"><span class="icon-long-arrow-right mr-2"></span>CDC(USA)</a></li>
                <li><a href="https://www.unicef.org/adolescence/protection"><span class="icon-long-arrow-right mr-2"></span>UNICEF</a></li>
                <li><a href="https://www.who.int/health-topics/adolescent-health#tab=tab_1"><span class="icon-long-arrow-right mr-2"></span>World Health Organisation</a></li>
                <li><a href="https://www.ncss.gov.sg/"><span class="icon-long-arrow-right mr-2"></span>National Council of Social Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">500 Dover Road,Singapore 139651</span></li>
	                <li><a href="tel://6775 1133"><span class="icon icon-phone"></span><span class="text">+65 6775 1133</span></a></li>
	                <li><a href="mailto:contactus@sp.edu.sg"><span class="icon icon-envelope"></span><span class="text">contactus@sp.edu.sg</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>

