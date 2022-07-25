<?php
include('./admin/includes/_headersec.php');
function selfRedirect()
{
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit();
}
if (isset($_POST['newTranslation'])) {
  $data = $_POST;
  unset($data['newTranslation']);

  $keys = array_keys($data);
  $fields = '`' . implode('`, `', $keys) . '`';
  #here is my way
  $placeholders = substr(str_repeat('?,', count($keys)), 0, -1);

  $statement = $db->prepare("INSERT INTO `translations`($fields) VALUES($placeholders)")
    ->execute(array_values($data));
  selfRedirect();
}
if (isset($_POST['updateTranslation'])) {
  $data = $_POST;
  $id = $data['id'];
  unset($data['updateTranslation'], $data['id']);

  $keys = array_keys($data);
  $fields = implode('=?, ', $keys) . '=?';

  $payload = array_merge(array_values($data), [$id]);
  $sql = "UPDATE `translations` SET $fields WHERE id=?";
  //exit(var_dump($payload, $sql));
  $st = $db->prepare($sql)->execute($payload);

  selfRedirect();
}

if (isset($_POST['deleteTranslation'])) {
  $db->exec("DELETE FROM `translations` WHERE id = " . $_POST['id']);
  selfRedirect();
}

if (isset($_POST['deleteLocale'])) {
  $db->exec("DELETE FROM `locale` WHERE id = " . $_POST['id']);
  $db->exec("ALTER TABLE translations DROP COLUMN " . $_POST['cca2']);
  selfRedirect();
}

if (isset($_POST['newLocale'])) {
  $ps = $db->prepare("INSERT INTO locale(label,cca2) VALUES(:label, :cca2) ");
  $statement = $ps->execute(array(
    ':label'   =>  $_POST['label'],
    ':cca2'    =>  $_POST['cca2']
  ));

  $db->exec("ALTER TABLE translations ADD COLUMN " . $_POST['cca2'] . " TEXT");

  selfRedirect();
}

if (isset($_GET['locale'])) {
  $myqwery = $db->prepare("SELECT * from locale WHERE cca2 = ?");
  $myqwery->execute([$_GET['locale']]);
  $locale = $myqwery->fetch(PDO::FETCH_OBJ);

  if ($locale) {
    $_SESSION['locale'] = $locale;
    selfRedirect();
  }
}

$myqwery = $db->prepare("SELECT * from locale ORDER by id ASC");
$myqwery->execute();
$locales = $myqwery->fetchAll(PDO::FETCH_OBJ);

$myqwery = $db->prepare("SELECT * from translations");
$myqwery->execute();
$translations = $myqwery->fetchAll(PDO::FETCH_OBJ);

$currentLocale = isset($_SESSION['locale'])
  ? $_SESSION['locale']
  : (count($locales) ? $locales[0] : null);

function t($key)
{
  global $currentLocale, $translations;

  foreach ($translations as $element) {
    if ($key == $element->key) {
      return $element->{$currentLocale->cca2};
    }
  }
}
?>
<!doctype html>
<html lang="en">
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="" author="Bridgeconnexions">
    <meta name="keyword" content="">
    <!-- Shareable -->
    <meta property="og:title" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
     <script src="assets/demo/demos.js"></script>
    

     <link href="assets/demo/demos.css" rel="stylesheet"/>
     <script src="assets/lib/typed.js" type="text/javascript"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
    <link href="assets/css/google-font.css" rel="stylesheet">

     <link rel="shortcut icon" href="assets/images/AGA_.png">
      <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-06ae8963-2b2e-4b21-bb57-fe298b9def84"></div>
 
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-M31ZR2P9WE');
    </script>
    <title>Brige connexion</title>
  </head>
<style type="text/css">
.text-small {
  font-size: 0.9rem;
}

a {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

a:hover, a:focus {
  text-decoration: none;
}

.form-control {
  background: #212529;
  border-color: #545454;
}

.form-control:focus {
  background: #212529;
}

footer {
  background: #212529;
}
 #map {
     height: 400px;
  
     margin:2rem auto;
     }

  @media only screen and (max-width: 500px ){
    .md{
       display: none;
    }
    .imgCar
    {
      width: 200px;
    }
    .bttraduction
    {
      margin-top: 170px;
      margin-right: 30px;
    }
  }
  body, html {
    height: 100%;
  }

  .scrolling-active
  {
    background-color: red;
  }

   .scrolling-active .navbar a
  {
    background-color: blue;
  }
  .scrolling-active .navbar 
  {
    height: 6.6rem;
  }
  .drop-zone {
  max-width: 700px;
  height: 200px;
  padding: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px;
  cursor: pointer;
  color: #cccccc;
  border: 3px dashed #f2f3f5;
  border-radius: 10px;
}

.drop-zone--over {
  border-style: solid;
}

.drop-zone__input {
  display: none;
}

.drop-zone__thumb {
  width: 100%;
  height: 100%;
  border-radius: 10px;
  overflow: hidden;
  background-color: #cccccc;
  background-size: cover;
  position: relative;
}

.drop-zone__thumb::after {
  content: attr(data-label);
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 5px 0;
  color: #ffffff;
  background: rgba(0, 0, 0, 0.75);
  font-size: 14px;
  text-align: center;
}
  </style>  
      <div class="col-md-12 col-sm-12 " style="background-color: rgb(23,48,88);padding:5px;">
        <div class="container">
          <div class="row" style="">
          <div class="col-md-4 md">
            <a href="" style="font-family:candara;color:white; margin-top:-20px;">   </a>
          </div> 
           <div class="col-md-4 md" style=" text-align: center;"> 
                <a href="mailto:info@itcrd.org"><button type="button" class="btn btn" style="color:white; font-weight: bold; "><i class="fa fa-envelope"></i> info@bridgeconnexion.com</button></a>
          </div>
          <div class="col-md-4">
             <?php if ($currentLocale) : ?>
      <div class="dropdown" style="float:right;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $currentLocale->label ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php foreach ($locales as $locale) : if ($currentLocale->id != $locale->id) : ?>
              <a class="dropdown-item" href="?locale=<?= $locale->cca2 ?>">
                <?= $locale->label ?>
              </a>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
          </div>
        </div>
        </div>
      </div>
      	<nav class="navbar navbar-expand-lg " style="background-color: white; background-image:url('assets/images/')"  >

    	  <a class="navbar-brand" href="index">
    	  	<img src="assets/images/AGA_(120).jpg" style="max-width:200px; ">
    	  </a>
    	  <button class="navbar-toggler navbar-toggler-right card" 
        type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" 
        aria-expanded="false" 
        aria-label="Toggle navigation bg-danger"> 
    <span class="navbar-toggler-icon" >
      <i class="fa fa-bars" style="color:rgb(23,48,88);; font-size:28px;"></i>
    </span> 
</button>

    	  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding:10px;">

    	    <ul class="navbar-nav ml-auto" >
            
    	      <li class="nav-item active">
      	        <a class="nav-link" href="accueil" style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;"><?= t('accueil1')?><span class="sr-only"></span></a>
      	      </li>
              <li class="nav-item active">
                <a class="nav-link" href="take_partTraining?pages=1" style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;  "><?= t('formation')?><span class="sr-only"></span></a>
              </li>
                <li class="nav-item active">
                <a class="nav-link" href="classes"style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;">Classes<span class="sr-only"></span></a>
              </li>
               <li class="nav-item active">
                <a class="nav-link" href="blog"style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;">Blog<span class="sr-only"></span></a>
              </li>
                <li class="nav-item active">
                <a class="nav-link" href="about"style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;"><?= t('about')?> <span class="sr-only"></span></a>
              </li>
                 <li class="nav-item active">
                <a class="nav-link" href="contact"style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;">Contact <span class="sr-only"></span></a>
              </li>
    	    </ul>
    	    <form class="form-inline my-2 my-lg-0">
             <a href="sign_training"><button type="button" class="btn btn-light" style="background-color:rgb(21,170,213);border:1px solid rgb(21,170,213); color: white; font-weight: bold;"><?= t('demander1')?></button> </a> 
    	    </form>
    	  </div>

        

    	</nav>
   <!--    <script type="text/javascript">
        window.addEventListener('scroll', function(){
          let navbar = document.querySelector(".navbar");
          let windowPosition = window.scrollY > 0;
          navbar.classList.toggle('scrolling-active', windowPosition);

        })
      </script> -->
