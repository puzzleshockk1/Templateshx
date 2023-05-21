<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) { 
  $sName = "localhost";
  $uName = "root";
  $pass = "";
  $db_name = "auth_db";

  try {
      $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                      $uName, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }

  $sql = "SELECT coins FROM users WHERE fname= :fname";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':fname', $_SESSION['fname']);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $coins = $row['coins'];
  } else {
    $coins = 0;
  }
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TemplateXZ - Dashboard</title>
  <link rel="icon" type="image/x-icon" href="xz.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pwaI8aGfWDkTz+iq/OzCU1grEZNDr9BC41LK6mJog3Wm8TGo3XMj1qRDL5PZS8pWQTHneZaMYjwWLWOkkazbvg==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />


  <style>


  body {
      background-color: #0b0c1b;
      color: #0b0c1b;
    }
     h3{
     color: #ffffff;
     }
     h1{
     color: #ffffff;
     font-size: 20px;
     }



    .rounded-corners {
    border-radius: 20px; /* Adjust the value to change the roundness */
    }
</style>

<style>
  .left-align {
    text-align: left !important;
  }

  .small-text {
    font-size: 30px;
}
</style>
<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>
<aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-700 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
      <i class="fa fa-user" aria-hidden="true"></i>
  <?=$_SESSION['fname']?>
         <li>
            <a href="/index.php" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
               <span class="ml-3">Home</span>
            </a>
         </li>
         <li>
         <li>
  <a href="legal/seller.pdf" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <i class="fas fa-money-bill text-white text-lg mr-2"></i>
    <span class="flex-1 ml-3 whitespace-nowrap">How to sell?</span>
  </a>
</li>
         <li>
  <a href="legal/score.pdf" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <i class="fas fa-coins text-yellow-500 text-lg mr-2"></i>
    <span class="flex-1 ml-3 whitespace-nowrap">Seller Score: <?=$coins?></span>
  </a>
</li>
<li>
            <a href="https://discord.gg/nBAQNBTn2T" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Discord</span>
            </a>
         </li>
         <li>
            <a href="logout.php" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
               <span href="logout.php" class="flex-1 ml-3 whitespace-nowrap">Log out</span>
            </a>
         </li>
      </ul>
      <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
         <div class="flex items-center mb-3">
            <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">Bugs</span>
            </button>
         </div>
         <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
         If you would like to help us, please report any web bugs. Your feedback is valuable in improving our website and providing you with a better browsing experience.
         </p>
         <a class="text-sm text-blue-800 underline font-medium hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" href="https://discord.gg/nBAQNBTn2T">Report</a>
      </div>
      
   </div>
</aside>
<div class="p-4 sm:ml-64">
      <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="product-container">
  <div class="product-box">
    <a href="https://betavps.pages.dev/">
      <img src="ss.png" alt="Product Image">
    </a>
    <h3 class="product-title">Hosting Template<br> 1$</h3>
    <p class="product-description">Template made for web hosting services. <br>Click on the image for a demo</p>
    <button class="add-to-cart">
      <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62QXP2UKNX8UU">Add to Cart</a><br>
    </button>
  </div>
  
  <div class="product-box">
    <a href="#">
      <img src="dsc temp.png" alt="Product Image">
    </a>
    <h3 class="product-title">Discord Template<br>0$</h3>
    <p class="product-description">Discord community template </p>
    <button class="add-to-cart">
      <a href="https://discord.new/fdm5CaAJ9rRz">Add to Cart</a><br>
    </button>
  </div>
         </div>
      </div>
   </div>
</div>

<body>
<style>
    .custom-font {
      color: #808080;
    }
    b{
      display: block;
      text-align: center;
      color: white;
      font-size: 60px;
    }

    .product-box {
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
}

.product-box img {
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

</style>


<div class="shadow rounded-corners w-450 p-3 text-start ">
<p class="display-4 small-text"><i class="fa fa-user" aria-hidden="true"></i>
  <?=$_SESSION['fname']?>
</p>
</div>
</div>
</body>






<?php
?>

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
<p><a href="legal/seller.pdf">How to sell?</a></p>
</div> 


</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>