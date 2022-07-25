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
    if(isset($_GET['id']) and !empty($_GET['id'])):
    $id=htmlspecialchars($_GET['id']);
    $myqwery=$db->prepare("SELECT cour.id,cour.cour_title,cour._admin,cour.description, cour.Prix, cour.prerequiP,cour.prerequiS, cour.public1, cour.public2, cour.avantage1,cour.avantage2, cour.status,cour.niveau,cour._admin,cour.image,fomateur.id as idf, fomateur.nom_complet,fomateur.image as imagef, section.id as ids, section.idcours, section.nom,section.description,section.image as images, lesson.id as idl,lesson.idsection FROM 
      cour
      INNER JOIN
      fomateur
      ON 
      cour._admin 
      INNER JOIN
      section
      ON
      section.idcours
      INNER JOIN
      lesson
      ON
      lesson.idsection
      WHERE cour.id=:id");
    $myqwery->execute(array(
    'id'=>$id
    ));
    if ($myqwery):
    $data=$myqwery->fetchAll(PDO::FETCH_OBJ);
    // var_dump($data);
    if (!empty($data)):
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
    <meta property="og:title" content="<?=$data[0]->cour_title?>" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
     <script src="assets/demo/demos.js"></script>
     <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-06ae8963-2b2e-4b21-bb57-fe298b9def84"></div>

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
  main {

}
summary {
  font-size: 1.25rem;
  font-weight: 600;
  background-color: rgb(249,249,249);
  border:1px solid  rgb(232,233,235);
  color:rgb(23,48,88);
  padding: 1rem;
  margin-bottom: 1rem;
  outline: none;
  border-radius: 0.25rem;
  text-align: left;
  cursor: pointer;
  position: relative;
}
p { text-align: left; }
details[open] summary ~ * {
  animation: sweep .5s ease-in-out;
}
@keyframes sweep {
  0%    {opacity: 0; margin-top: -10px}
  100%  {opacity: 1; margin-top: 0px}
}
details > summary::after {
  position: absolute;
  content: "+";
  right: 20px;
}
details[open] > summary::after {
  position: absolute;
  content: "-";
  right: 20px;
}
details > summary::-webkit-details-marker {
  display: none;
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style=" border:1px solid black; border-radius:5px;background-color: rgb(2,4,104);" ></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding:10px;">

          <ul class="navbar-nav ml-auto" >
            
            <li class="nav-item active">
                <a class="nav-link" href="index" style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;"><?= t('accueil1')?><span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="take_partTraining?pages=1" style="font-family:candara;color:rgb(23,48,88); font-weight:bold;font-size:18px;  "><?= t('formation')?><span class="sr-only"></span></a>
              </li>
               <!--  <li class="nav-item active">
                <a class="nav-link" href="formateur"style="font-family:candara;color:rgb(14,118,205); font-weight:bold;font-size:18px;">Devenir formateur<span class="sr-only"></span></a>
              </li> -->
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
<script>
  document.title="<?=$data[0]->cour_title?>"
</script>

<div class="col-sm-12 bg-white">
  <?php
           if (isset($_POST['btninscrit'])) {
                # code...
                extract($_POST);
                if (!empty($formation)  && !empty($name) && !empty($ville) && !empty($email) && !empty($phone) && !empty($message)) {
                  # code...

                    $ps = $db->prepare("INSERT INTO inscription_candidat(formation,name,ville,email,phone,message) VALUES(:formation,:name,:ville,:email,:phone,:message)");
                    $statement = $ps->execute(array(
                      ':formation'   =>  $formation,
                      ':name'    =>  $name,
                      ':ville'   =>  $ville,
                      ':email'    =>  $email,
                      ':phone'   =>  $phone,
                      ':message'    =>  $message
                    ));

                    if (!empty($statement)) {
                      # code...
                       echo '<b class=" text-center alert alert-success"> Enregistrement reusi </b>';
                    
                    }
                    else{
                      echo("Erreur du lors de l'enregistrement");
                    }
                  }
                }
                else{
                  // echo("Tous les champs sont requis");
                }

              ?>
        
  <div class="container">
    
    <div class="row">
      <div class="col-md-8 mt-4" style="">
        <div class="alert" style="background-color: rgb(23,48,88);color:white;line-height: 1.7;">
          <h2><?=$data[0]->cour_title?></h2>
          <div class="text-left"><span style="font-weight:bold;"><?php echo(countInscription($db,$id)) ?></span>  <span><a href="" style="text-decoration: underline;" data-toggle="modal" data-target="#callmodal">Participants</a></span></div> 
        </div>
        <br>
        <div class="form-group row">
          <div class="col-sm-9 mb-3 mb-sm-0">
            <span class="text-black" style="font-weight: bold; color: black;"><i class="fa fa-share" aria-hidden="true" style="color:rgb(200,0,0);"></i>  Partager maintenant</span>
            <hr>
            <nav role="navigation">
              <ul class="nav text-light">
                <li class="nav-item mr-2 share_twitter" data-url="<?php echo('http://localhost/astute/detail_trainings?id='.$_GET['id'])?>" style="background-color: rgb(101,153,255);; border-radius: 50%;"><a class="nav-link" href="" title="Twitter"><i class="fa fa-twitter"style="color:white "></i><span class="menu-title sr-only" >Twitter</span></a></li>
                <li class="nav-item mr-2 share_facebook" data-url="<?php echo('http://localhost/astute/detail_trainings?id='.$_GET['id'])?>" style="background-color: rgb(93,117,161);; border-radius: 50%;"><a class="nav-link" href="" title="Facebook"><i class="fa fa-facebook"style="color:white;"></i><span class="menu-title sr-only">Facebook</span></a></li>
                <li class="nav-item mr-2 share_instagram" style="background-color: rgb(229,58,111);; border-radius: 50%;"><a class="nav-link" href="" title="Instagram"><i class="fa fa-instagram" style="color:white"></i><span class="menu-title sr-only">Instagram</span></a></li>
                <li class="nav-item mr-2 share_linkedin"  data-url="<?php echo('http://localhost/astute/detail_trainings?id='.$_GET['id'])?>" style="background-color: rgb(61,225,90); border-radius: 50%;"><a class="nav-link" href="" title="LinkedIn"><i class="fa fa-linkedin"style="color:white"></i><span class="menu-title sr-only">LinkedIn</span></a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="https://www.behance.net/templateflip" title="Behance"><i class="fab fa-behance"></i><span class="menu-title sr-only">Behance</span></a></li> -->
              </ul>
            </nav>
           
          </div>
         
          <div class="col-sm-3">
            <span class="text-black" style="font-weight:bold;">Formateur</span><br>
              <span><i class="fa fa-user" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i> <span style="font-size: 12px"> <?=$data[0]->nom_complet;?></span></span>
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <div class="col-sm-4 mb-3 mb-sm-0">
            <span class="text-black" >Prix de participation</span><br>
            <span style="font-weight: bold; color: rgb(200,0,0);"><?=$data[0]->Prix?></span>
          </div>
          <div class="col-sm-3">
            <span class="text-black" >Total Inscrit</span><br> 
            <span style="font-weight: bold; color: rgb(200,0,0);"><?php echo(countInscription($db,$id)) ?></span>  
          </div>
          <div class="col-sm-3">
            <span class="text-black">Periode</span><br>
              <span style="font-weight: bold; color: rgb(200,0,0);"><?=$data[0]->status?></span>
          </div>
        </div>
        <hr>
        <h5>A propos du cour</h5>
        <hr>
        <p style="text-align: justify; font-family: Segoe UI; font-size: 15px;"></i><?=$data[0]->description?></p>
        <hr>
         <p>
            <a class="btn btn-white btn-lg btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:black;font-size:15px; font-weight: bold;">+ Qu'allez-vous apprendre?</a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <ul>
                <div class="row">
                  <div class="col-lg-12 col-md-4 col-sm-6 mix oranges fresh-meat" >
                    <div class="featured__item">
                      <div class="featured__item__pic set-bg" data-setbg="">
                         <div><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->description?></div>
                         
                      </div>
                    </div>
                  </div>
                </div>
              </ul>
            </div>
          </div>
          <br>
        
          <main>
        
                <?php   
                $myqwery = $db->prepare("SELECT * FROM  section WHERE idcours =:idcours");
                $myqwery->execute(array("idcours"  =>  $_GET['id']));
                $count = $myqwery->rowCount();
                
                if ($count > 0) {
                  # code...
                  while ($data1 = $myqwery->fetch()) {
                    # code...
                    ?>
                    <details>
                      <summary><?php echo($data1['nom']); ?></summary>
                      <div class="faq__content">

                        <?php 
                
                        $myqwery = $db->prepare("SELECT * FROM lesson WHERE idsection =:idsection");
                        $myqwery->execute(array("idsection"  =>  $data1['id']));
                        $count2 = $myqwery->rowCount();
                        
                        if ($count2 > 0) {
                          # code...
                          while ($data2 = $myqwery->fetch()) {
                            # code...
                            ?>
                              <div class="faq__content">
                                <div><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(200,0,0);"></i> <?php echo($data2['titre']); ?></div>
                              </div>
                            

                            <?php
                          }
                        }


                        ?>

                      </div>
                    

                    <?php
                  }
                }


                ?>





            <!--   <details>
              <summary>What Is Graphic Design?</summary>
              <div class="faq__content">
                <p>Graphic design is the process of visual communication and problem-solving through the use of typography, photography, iconography and illustration. </p>
              </div>
            </details>
            <details>
              <summary>What Is JavaScript?</summary>
              <div class="faq__content">
                <p>JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. </p>
              </div>
            </details> -->
          </main>
         
        </div>
      <div class="col-md-4 mt-4 shadow">
        <img src="./admin/images/<?= $data[0]->image;?>" class="card-img-top img-thumbnail mt-4"  alt="...">
        <hr>
        <button class="btn btn- btn-block" data-toggle="modal" data-target="#logoutModal12" style="background-color:rgb(21,170,213); color:white; font-weight:bold;">S'inscrire maintenant</button>
        <hr>
          <h5 class="text-left">Prerequis</h5>
        <hr>
        <p style="text-align:justify; font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->prerequiP?></p>
        <p style="text-align:justify;font-size:15px;line-height: 1"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->prerequiS?></p>
        <hr>
          <h5 class="text-left">Public ciblés</h5>
          <hr>
          <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->public1?></p>
          <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->public2?></p>
        <!--   <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->public3?></p> -->
        <hr>
         <h5 class="text-left">Avantages</h5>
          <hr>
          <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->avantage1?></p>
          <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->avantage2?></p>
      <!--     <p style="text-align:justify;font-size:15px;"><i class="fa fa-check" style="color:red;"></i> <?=$data[0]->avantage3?></p> -->
      </div>
    </div>
  </div>
</div>
<br>
<?php endif;?>
<?php endif;?>
    <?php endif;?>
<?php include ('mains/footer.php'); ?>
<div class="modal fade" id="logoutModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"  style="color:black; font-weight: bold; font-family:candara;">S'impliquer</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">        
          <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
           <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text"style="color:black; font-family: candara; background-color:white; display: none;" class="form-control"  name="formation"  id="exampleFirstName" placeholder="Cour" value="<?=$data[0]->id?>" >
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text"style="color:black; font-family: candara; background-color:white;" class="form-control" name="name"  id="exampleFirstName" placeholder="Nom et prenom" >
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="ville" placeholder="ville" >
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="email" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="email" placeholder="email" >
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="phone" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="phone" placeholder="Telephone" >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <textarea placeholder="message" required="" name="message" class="form-control" style="background-color:white;"></textarea>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary btn-block" name="btninscrit" style="background-color:rgb(21,170,213); color:white; font-weight:bold; border:1px solid rgb(21,170,213); ">
                 S'inscrire Maintenant
                </button>
              </form>
        </div>
      </div>
    </div>
  </div>
 
  <script type="text/javascript">
(function(){


//la partie de jquery et integration de partage

   var popupCenter = function(url, title, width, height){
       var popupWidth = width || 640;
       var popupHeight = height || 320;
       var windowLeft = window.screenLeft || window.screenX;
       var windowTop = window.screenTop || window.screenY;
       var windowWidth = window.innerWidth || document.documentElement.clientWidth;
       var windowHeight = window.innerHeight || document.documentElement.clientHeight;
       var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
       var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
       var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
       popup.focus();
       return true;
   };

   document.querySelector('.share_twitter').addEventListener('click', function(e){
       e.preventDefault();
       var url = this.getAttribute('data-url');
       var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
           "&via=Grafikart_fr" +
           "&url=" + encodeURIComponent(url);
       popupCenter(shareUrl, "Partager sur Twitter");
   });

   document.querySelector('.share_facebook').addEventListener('click', function(e){
       e.preventDefault();
       var url = this.getAttribute('data-url');
       var shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
       popupCenter(shareUrl, "Partager sur facebook");
   });

   document.querySelector('.share_instagram').addEventListener('click', function(e){
       e.preventDefault();
       var url = this.getAttribute('data-url');
       var shareUrl = "https://instagram.com/share?url=" + encodeURIComponent(url);
       popupCenter(shareUrl, "Partager sur Instagram");
   });

   document.querySelector('.share_linkedin').addEventListener('click', function(e){
       e.preventDefault();
       var url = this.getAttribute('data-url');
       var shareUrl = "https://www.linkedin.com/shareArticle?url=" + encodeURIComponent(url);
       popupCenter(shareUrl, "Partager sur Linkedin");
   });

})();
</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>

