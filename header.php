<?php
session_start();
$link = mysqli_connect("localhost","root","","blog1");
$link -> set_charset("utf8");
// Check connection
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 
}

if(isset($_POST["giris"])){
	  $sifre = mysqli_real_escape_string($link, $_POST["sifre"]);
	  $sql = "SELECT password FROM admin";
	  if($result=mysqli_query($link, $sql)){
		  $row= mysqli_fetch_assoc($result);
		  if($row["password"]==$sifre){			  
			  $_SESSION["user"]=="admin";
			  header("Location: blog.php");
		  }
		  else{
			 echo "Hatalı şifre";
		  }
	  }
  }
  
  if(isset($_POST["cikis"])){
	  session_unset();
  }
?>

<!DOCTYPE html>


<html>
<head>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
<title>Blog</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="blog.php"><img src="style/d.png" style="width:40px;"</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="blog.php">Anasayfa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="profil.php">Profil</a>
      </li>
	  <li class="nav-item ">
        <a class="nav-link" href="olustur.php">Oluştur</a>
      </li>
	 <form method="post" class="form-inline my-2 my-lg-0">
	  <?php if(!isset($_SESSION["user"])){ ?>
	  <input type="password" id="girisInput" class="form-control mr-sm-2" name="sifre">  
	  <button type="submit" class="btn btn-warning" id="giris" name="giris">Giriş</button>  
	  <?php } if(isset($_SESSION["user"])){ ?>
	  <button type="submit" class="btn btn-warning" id="giris" name="cikis">Çıkış</button>
	  <?php } ?>
    </form>
	  
      </form>
    </ul>
  </div>
</nav>