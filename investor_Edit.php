<?php
require 'Connection.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM investor WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  echo "<script>
            alert('Please Login Yourself');
            window.location.href='investor_login.php';
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Bridging Dreams </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="investor_index.php">
            <span>
              Bridging Dreams
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
            <li class="nav-item">
                <a class="nav-link" href="investor_index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="investor_about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="investor_service.php">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="investor_team.php">Team</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="investor_profile.php"> <i class="fa fa-user" aria-hidden="true"></i> Profile <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"> <i class="fa fa-user" aria-hidden="true"></i> Logout</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Edit <span>Details</span>
        </h2>
      </div><br>
        <link href="/home asset/css/profile.css" rel="stylesheet">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="investor_Image/<?php echo$row['investor_Image']; ?>" alt="user" class="rounded-circle" width="150">
                        </div>
                        <h5><?php echo$row['Name']; ?></h5>
    
                        <h6 class="user-email"><?php echo$row["Email"]; ?></h6>
                    </div>
           
                </div>
            </div>
        </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="on">
             <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                       
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <!-- Right column form fields -->
                                <div class="form-group">
                                    <label for="website">Name</label>
                                    <input type="text" class="form-control" name="Name" placeholder="Enter your name" value="<?php echo$row['Name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="website">Email</label>
                                    <input type="email" class="form-control" name="Email" placeholder="Enter your email" value="<?php echo$row['Email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="website">Company & Project Name</label>
                                    <input type="text" class="form-control" name="Name" placeholder="Enter your Company & Project Name" value="<?php echo$row['about']; ?>">
                                </div>
                                
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12"> 
                            <div class="form-group">
                                    <label for="website">New password</label>
                                    <input type="password" class="form-control" name="Password" placeholder="New password" value="<?php echo$row['Password']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="website">Confirm New password</label>
                                    <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm New password">
                                </div>
                                <div class="form-group">
                                    <label for="website">Image</label>
                                    <input type="file" class="form-control" name="file" placeholder="Upload an image" required>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <a href="investor_profile.php" class="btn btn-secondary">Cancel</a>
                                    <button value="update" name="update" class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        
        </div>
        </div>
  </section>

  <!-- end why section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="index.php">
                Home
              </a>
              <a class="" href="about.php">
                About
              </a>
              <a class="" href="service.php">
                Services
              </a>
              <a class="" href="why.php">
                Why Us
              </a>
              <a class="" href="team.php">
                Team
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>

<!-- Update Your Profile in a Database -->

<?php
if (isset($_POST["update"])){
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Mobile=$_POST["Mobile"];
$Password=$_POST["Password"];
$ConfirmPassword=$_POST["ConfirmPassword"];
$about=$_POST["about"];

$file=$_FILES['file']['tmp_name'];
	list($width,$height)=getimagesize($file);
	$nwidth=250;
	$nheight=250;
	$newimage=imagecreatetruecolor($nwidth,$nheight);
	if($_FILES['file']['type']=='image/jpeg'){
		$source=imagecreatefromjpeg($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.jpg';
		imagejpeg($newimage,'investor_Image/'.$file_name);
	}elseif($_FILES['file']['type']=='image/png'){
		$source=imagecreatefrompng($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.png';
		imagepng($newimage,'investor_Image/'.$file_name);
	}else{
		echo "Please select only jpg, png and gif image";
	}

$duplicate = mysqli_query($con, "SELECT * FROM investor WHERE Mobile = '$Mobile'");
if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Email or Mobile Number Has Already Exist'); </script>";
}
else{
if($Password == $ConfirmPassword){
    $query = "UPDATE investor set Name='".$Name."',Email='".$Email."',Password='".$Password."',about='".$about."',investor_Image='".$file_name."'";
mysqli_query($con,$query);
echo "<script>
            alert('Record Update');
            window.location.href='investor_profile.php';
            </script>";
}
else{
    echo "<script> alert('Password Does Not Match'); </script>";
}
}
}
?>