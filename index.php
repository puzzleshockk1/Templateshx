<?php
// Get the requested URL
$requestUrl = $_SERVER['REQUEST_URI'];

// Check if the URL ends with .php
if (substr($requestUrl, -4) === '.php') {
  // Remove the .php extension
  $newUrl = substr($requestUrl, 0, -4);

  // Redirect to the new URL without .php
  header('Location: ' . $newUrl, true, 301);
  exit;
}
?>


<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <title>XZ - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-zBdkt1sNf3+n3Cy0Zn3lKzvzDxJyBc0dXwPbOISXdo3I1VU9/nq3Ww1QvpBYR2EFeHDtY3ZLcQay3XjcGrDgjA==" crossorigin="anonymous" />
  <link rel="icon" type="image/x-icon" href="xz.png">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
<style>
 

      @import "https://unpkg.com/open-props";
   
      body {
        margin: 0;
            padding: 0;
            height: 100%;
            min-height: 100vh
      }
      

        /* scroll*/
/* Set the width and height of the scrollbar */
::-webkit-scrollbar {
  width: 12px;
  height: 12px;
}

/* Set the background color of the scrollbar track */
::-webkit-scrollbar-track {
  color: #0b0c1b;
}

/* Set the color of the scrollbar thumb */
::-webkit-scrollbar-thumb {
  background-color: #0080FE	;
}

/* Set the color of the scrollbar thumb on hover */
::-webkit-scrollbar-thumb:hover {
  background-color: #02a9f0;
}

        /* scroll*/

      .form-label {
        color: #ffffff;
      }

      .btn-primary {
        color: #ffffff;
      }

      .link-secondary {
        color: #ffffff;
      }

      h4 {
        color: #ffffff;
      }

      .link-secondary {
        margin-left: 5px;
      }

      p {
        color: #ffffff;
        text-align: center;
      }

      .mobile-image {
        pointer-events: none;
      }

      @media only screen and (max-width: 600px) {
        .mobile-image {
          display: none;
        }
      }

      m {
        margin-top: 400px;
        display: block;
        text-align: center;
        font-size: 30px;
        color: #ffffff;
      }

      * {
        margin: 0;
        padding: 0;
      }

      .container {
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
      }

      .main-content {
        margin: 20px;
        text-align: center;
      }

      h1 {
        color: #ffffff;
      }

      button {
        font-family: var(--font-sans);
        font-weight: var(--font-weight-6);
        font-size: var(--font-size-5);
        color: #ffffff;
        background: #34568B;
        border: 0;
        padding: var(--size-4) var(--size-8);
        transform: translateY(calc(var(--y, 0) * 1%)) scale(var(--scale));
        transition: transform 0.1s;
        position: relative;
      }

      button:hover {
        --y: -10;
        --scale: 1.1;
        --border-scale: 1;
      }

      button:active {
        --y: 5%;
        --scale: 0.9;
        --border-scale: 0.9, 0.8;
      }

      button:before {
        content: "";
        position: absolute;
        inset: calc(var(--size-3) * -1);
        border: var(--size-2) solid var(--gray-0);
        transform: scale(var(--border-scale, 0));
        transition: transform 0.125s;

        --angle-one: 105deg;
        --angle-two: 290deg;
        --spread-one: 30deg;
        --spread-two: 40deg;
        --start-one: calc(var(--angle-one) - (var(--spread-one) * 0.5));
        --start-two: calc(var(--angle-two) - (var(--spread-two) * 0.5));
        --end-one: calc(var(--angle-one) + (var(--spread-one) * 0.5));
        --end-two: calc(var(--angle-two) + (var(--spread-two) * 0.5));

        mask: conic-gradient(transparent 0 var(--start-one),
            white var(--start-one) var(--end-one),
            transparent var(--end-one) var(--start-two),
            white var(--start-two) var(--end-two),
            transparent var(--end-two));

        z-index: -1;
      }
      * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
a {
  text-decoration: none;
  color: #fff;
}
      

.topnavi {
    background-color: #0b0c1b;
    overflow: hidden;
  }
  
      
.topnavi a {
    float: left;
    color: #ffffff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 16px;
    position: relative; 
}

@media (max-width: 768px) {
  .fa {
    display: none;
  }
  
  /* Velikost texta za mobile */
.topnavi a {
        font-size: 10px;
  }
}

  
  .topnavi a.active {
  background-color: #1b1e1f;
  color: white;
    
  }
    /* Author: Puzzle_Shock1 */
  .topnavi a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 2px;
    background-color: #02a9f0;
    transition: width 0.3s ease-in-out;
  }
  
  .topnavi a:hover::after {
    width: 100%;
  }
    .logo {
        pointer-events: none;
      }
  .no-pull{
          pointer-events: none;
  }
  
  .left-align {
    text-align: left !important;
  }
  h1{
    text-align: center;
  }
  .product-box {
    text-align: center;
    justify-content: center;
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
}

.product-box img {
  text-align: center;
    justify-content: center;
  width: 100%;
  border-radius: 5px;
  margin-bottom: 10px;
}

.product-title {
  font-size: 18px;
  margin-bottom: 5px;
}

.product-description {
  font-size: 14px;
  color: #888;
  margin-bottom: 10px;
}

.add-to-cart {
  background-color: #3498db;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 3px;
  font-size: 14px;
  cursor: pointer;
}

.add-to-cart:hover {
  background-color: #2980b9;
}
.product-container {
  display: flex;
}

.product-box {
  margin-right: 20px; 
  margin-top: 50px;
}
h3{
  color: white;
}
    </style>
   <div class="topnavi">
  <a class="active" href="home.php">Dashboard</a>
  <a href="https://discord.gg/nBAQNBTn2T">Discord</a>
  <a href="publicup.php">Public Share</a>
</div> 

  </head>
  <div class="container">
    <div class="main-content">
<img class="logo" src="xz.png" width="200" height="200" alt="logo">

      <h1>TemplateXZ</h1>
      <p>TemplateXZ, web marketplace that offers a wide range of high-quality HTML, CSS, and JS templates.<br>
    <b>Register to acces templates!</b></p>
    <button onclick="scrollToForm()" type="button" style="border-radius: 5px; padding: 15px 20px;">Login/Register</button>
    </div>
  </div>
   
  <script>
    function scrollToForm() {
      const formSection = document.getElementById('form-section');
      formSection.scrollIntoView({ behavior: 'smooth' });
    }
  </script>
  <main>
<m style="font-size: 50px;">Store</m>
<p style="color: red;">Preview</p>
<div class="p-4 sm:ml-64">
      <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="product-container">
  <div class="product-box">
    <a href="https://betavps.pages.dev/">
      <img src="ss.png" alt="Product Image">
    </a>
    <h3 class="product-title">Hosting Template<br> 1$</h3>
    <p class="product-description">Template made for web hosting services. <br>Click on the image for a demo</p>
  </div>
  
  <div class="product-box">
    <a href="#">
      <img src="dsc temp.png" alt="Product Image">
    </a>
    <h3 class="product-title">Discord Template<br>0$</h3>
    <p class="product-description">Discord template made for communities and hosting services...</p>

  </div>
  </main>
  <button style="display: flex; justify-content: center;" onclick="myFunction()">Show More</button>

<div id="myDIV" style="display: none;">
  <div class="product-box">
    <a href="#">
      <img src="dsc temp.png" alt="Product Image">
    </a>
    <h3 class="product-title">Discord Template<br>$0</h3>
    <p class="product-description">Discord template made for communities and hosting services...</p>
  </div>
</div>

<script>
function myFunction() {
  var div = document.getElementById("myDIV");
  if (div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
}
</script>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>
  
      <div class="form-container" id="form-section">
    <div class="form-wrapper">
    <div class="d-flex justify-content-center align-items-center vh-100">
 


      <img src="xsz.png" alt="gta" width="350" height="350" class="mobile-image">
      <form class="shadow w-450 p-3" action="php/signup.php" method="post">

        <h4 class="display-4  fs-1">Create Account</h4><br>
        <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">
          <?php echo $_GET['success']; ?>
        </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="fname" value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">User name</label>
          <input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="pass">
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
        <a href="login.php" class="btn btn-primary">Login</a>
      </form>
      </div>

    <style>
      .footer {
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
      }
    </style>

    <div class="footer">
      <p>©TemplateXZ<br>
      </p>
      <p>Powered by <a href="https://planetvps.eu">Planet Vps</a></p>

    </div>
  </body>
