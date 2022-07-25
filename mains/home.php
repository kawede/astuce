 <?php 
 include ('header.php');
$myqwery=$db->prepare("SELECT * FROM temoignage ORDER BY id DESC limit 1");
$myqwery->execute();
?>
 <style type="text/css">
  @media only screen and (max-width: 500px ){
    .md{
      display: none;
    }
  }
  body, html {
    height: 100%;
  }
  }
.slick-slide{
    margin: 0 20px;
}
.slick-slide img{
    width: 100%;
}
.slick-slider{
    position: relative;
    display: block;
    box-sizing: border-box;
}
.slick-list{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-track{
    position: relative;
    top: 0;
    left: 0;
    display: block
}
.slick-slide{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
.slick-slide img{
    display: block;
}
.slick-initialized .slick-slide{
    display: block;
}
.copy{
    padding-top: 250px;
}
</style>

<body  style="background-image:url('assets/images/us.png'">
    <div class="col-md-12" style="background-color:rgb(24,49,89);">
	    <div class="container" style="background-color:rgb(24,49,89);">
		    <div class="row">
			    <div class="col-md-6" style="height:450px;">
			        <h3 style="color: white; margin: 20px; margin-top:100px;font-family:Segoe UI;; font-weight: bold;"><?= t('salut') ?>s</h3>
			        <div class="col-md-10">
			            <h2 style="color:white;font-size:18px; font-family: Segoe UI;"><?= t('apprenez')?></h2>
			            <div id="typed-strings" style="font-size:20px;">
			              <h3><?= t('accompagnement')?></h3>
			              <p class="mb-3" style="font-size: 20px;"><?= t('session')?></p>
			              <p class="mb-3" style="font-size: 20px;"><?= t('formateur')?></p>
			              <p class="mb-3" style="font-size: 20px;"><?= t('seminaire')?></p>
			            </div>
		                <span id="typed" style="white-space:pre;color:white;font-size:20px; font-family:Segoe UI;"></span>
		            </div>
                    <a href="sign_training"><button type="button"  style="background-color:rgb(21,170,213);color:white; margin: 18px; font-weight: bold; border:1px solid rgb(21,170,213);"><?= t('demander1')?></button></a> <span><a href="orders" class="bttraduction"><button type="button"  style="background-color:rgb(24,49,89);color:white;margin:18px;  font-weight: bold; border:2px solid rgb(21,170,213);  ">Demandez des traductions</button></a></span>
                </div>
			    <div class="col-md-6 col-sm-12" style="background-color:rgb(24,49,89)">
			        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			           <div class="carousel-inner">
						    <div class="carousel-item active">
						        <img src="assets/images/LEARN1.jpg" style="height: 450px;" >
						    </div>
						    <div class="carousel-item">
						        <img src="assets/images/learn2.jpg" style="height: 450px;" >
						    </div>
					        <div class="carousel-item">
					           <img src="assets/images/LEARN1.jpg" style="height: 450px;" >
					        </div>
			            </div>
			        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin presentation -->
    <br>
	<div class="col-md-12" style="color:rgb(23,48,88);">
		<h2 class="text-center" style="font-family: candara; font-weight: bold;"><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(21,170,213);"></i> <?= t('methodes')?></h2>
		  <br>
		   <!--  <p>Ce que nous faisons</p> -->
	</div> 
	<div class="container" >
	    <div class="col-md-12"  >
		    <div class="card-group">
			    <div class="card">
			        <img src="assets/images/AGA_F3.jpg" class="card-img-top" alt="...">
			        <div class="card-body">
				        <h4 class="card-title" style="font-weight: bold; font-family: candara; color:rgb(23,48,88);"><?= t('autonome')?></h4>
				        <br>
				        <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;"></i> <?= t('ApprentissagePhysique')?></div><br>
				        <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;"></i> <?= t('bureau')?></div>
				        <br>
				        <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;"></i> <?= t('choix')?></div>
			        </div>
			    </div>
			    <div class="card">
			        <img src="assets/images/AGA_.jpg" class="card-img-top" alt="...">
			        <div class="card-body">
			            <h4 class="card-title" style="font-weight: bold;font-family: candara;color:rgb(23,48,88);"><?= t('virtuel')?></h4>
			            <br>
			            <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i> <?= t('classevirtuelle')?></div>
			            <br>
			            <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i> <?= t('zoom')?></div>
			            <br>
			            <div style="font-weight: bold; font-family: candara;font-size:18px;color:rgb(23,48,88);"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i> <?= t('live')?></div>
			        </div>
			    </div>
		    </div>
	    </div>
	</div>
    <br>
    <div class="col-md-12" style="background-color:red; ">  
	    <div class="row">
	        <div class="col-md-6" style="background-color:white; ">
		        <br>
		        <h2><span style="font-size: 20pt; margin:40px; "><strong style="margin-top:30px;color:rgb(23,48,88);">About <span style="color:rgb(21,170,213); opacity:2px 2px red; ">Bridge connexions</span></strong></span></h2>
		        <p style="text-align:left; margin:40px; font-family:tahoma; font-size: 17px;color:rgb(23,48,88); line-height: 1.5; ">Nous sommes heureux que vous souhaitiez en savoir plus sur Bridge connexions. Nous sommes fiers de fournir des services de transcription et de sous-titrage, des formations virtuelles et présentielle à la demande qui rendent plus accessibles et plus agréables pour les sourds et les malentendants, ainsi que pour les utilisateurs d'une seconde langue. Nous traitons une variété des cours concentre sur les pratiques et nous avons besoin de votre aide pour créer une communauté sure des meilleurs communicant digitale propres ! Faites un essai ! nous vous listons les formations se regroupant dans une région et vous connecter aux opportunités de partout.
		        <br>
		        Nous travaillons avec une dizaine des formateurs indépendants dans la réalisation des classes virtuelles et de présentielles et ceux ayant peu ou pas d'expérience préalable de la transcription pour fournir des transcriptions et des sous-titres vidéo d'une précision de 99 %. <br><br><span style="font-weight:bold; color:rgb(21,170,213);">Nous fournissons toute la formation et le soutien dont vous avez besoin partout!</span>
		        </p>
	        </div>
		    <div class="col-md-6" style="background-color:white; ">
		        <div class="container">
		            <div class="col-md-12" style="background-color:rgb(23,48,88); margin-top:80px; border-radius:5px;">
			            <h2><span style="font-size: 20pt; margin:20px; "><strong style="margin-top:40px; color:rgb(242,243,246);">Notre Mission</strong></span></h2> 
			            <hr style="background-color:white; height:2px; border-radius:3px;">
			            <hr style="background-color:white;height:1px;">
			            <p style="text-align:left; margin:20px; font-family:tahoma; font-size: 16px; color:rgb(242,243,246); ">
			            La mission de Bridge connexions est de résoudre les problèmes liés aux médias pour les sourds, les malentendants et accompagné les personnes parlant une deuxième langue avec des condensés de cours.
			            <br><br> 
			            Notre Focus est de créer une communauté de formateurs de langue professionnel  transcripteurs indépendants et réfléchis afin de créer des classes et médias en ligne appréciés de tous.
			            </p>
			            <h2><span style="font-size: 17pt; margin:20px; "><strong style="margin-top:40px;color:rgb(242,243,246);">“Apprendre plus, Se connecter aux opportunités”</strong></span></h2> 
			            <br>
		            </div>
		        </div>
	        </div>   
        </div>
    </div>
    <br>
    <div class="col-md-12" style="">
	    <!-- <p style="color:rgb(23,48,88);">C</p> -->
	    <h1 class="text-center mt-4" style="font-family: candara; font-weight: bold;"><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(21,170,213);"></i>  <?= t('wedo')?></h1>
	    <!-- <p style="color:rgb(23,48,88);">C</p> -->
    </div>
	<div class="col-md-12 mt-4 shadow" style="background-color: white;">
	    <div class="row" style="margin-top:20px;">                                   
	        <div class="col-md-4 mb-2 mt-4 shadow">
	          <div class="col-md-12">
	            <div class="row card" style="background-color:white ">
	              <div class="col-md-12 card-body text-center">
	                <img src="assets/svg/copy.svg" style="width:80px; height:80px;">
	                <br>
	                <br>
	                <h3 style="color:rgb(23,48,88); font-family:candara;">Copy writing </h3>
	                <div class="col-md-12 text-center mt-2">
	                  <div style="color: rgb(23,48,88); font-size: 15px; font-family:Segoe UI;">des rédactions professionnelles et  textes de vente pour toute forme de publicité ou de site web (pages de vente, lettres de vente,emails et bannières web</div>
	                </div>                    
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 mb-2 mt-4 shadow">
	            <div class="col-md-12">
	                <div class="row card" style="background-color:white;">
		                <div class="col-md-12 card-body text-center">
		                  <img src="assets/svg/translation.svg" style="width:80px; height:80px;">
		                  <br>
		                  <br>
		                  <h3 style="color:rgb(23,48,88); font-family:candara;">Traductions</h3>
		                  <div class="col-md-12 text-center mt-4">
		                    <div style="color: rgb(23,48,88); font-size: 15px; font-family:Segoe UI;">Des Traductions sur mesure sur vos fichiers d'origine dans deux 2 langues (Anglais & Francais) quel que soit votre secteur d'activité, grâce à nos chefs de projet et traducteurs.</div>
		                  </div>
		                </div>
	               </div>
	            </div>
	        </div>
	        <div class="col-md-4 mb-2 mt-4 shadow">
	            <div class="col-md-12">
		            <div class="row card" style="background-color: white;">
		                <div class="col-md-12 card-body text-center">
			               <img src="assets/svg/world.svg" style="width:80px; height:80px;">
			               <br>
			               <br>
		                    <h3 style=";color:rgb(23,48,88); font-family:candara;">Formations & Opportunités </h3>
		                    <div class="col-md-12 text-center mt-2">
		                        <div style="color: rgb(23,48,88);font-size: 15px; font-family:Segoe UI;"> Des formations virtuelles et présentielles en anglais et Français pour devenir un communicateur digital efficace dans son domaine d'expertise et avoir accès aux  opportunités</div>
		                    </div>
	                    </div>
	                </div>
	           </div>
	        </div> 
            <br>
            <br>
            <!-- explorer nos services -->
            <div class="col-md-12">
                <div class="container text-center mt-4">
                    <p>
                       <a class="btn btn-white btn-lg btn-block text-center mt-4" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size:25px; font-weight: bold;"> Explorez nos services
        					<img src="assets/svg/arrow.svg" class="align-self-center "data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;"></a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
	                        <ul>      
					            <div class="container text-center mt-4 ">
					                <div class="media ">
					                    <img src="assets/svg/trans.svg" class="align-self-center mr-3 mt-4" alt="..." style="width:80px; height:80px;">
					                    <div class="media-body">
					                    <h5 class="mt-4 text-left">Formations virtuelles & Présentielles</h5>
					                    <p class="text-left">Vous cherchez d'être accompagné dans la réalisation des vos applications aux opportunités ? nous vous proposons des directives pratiques à suivre.</p>
					                    <div class="text-right">
					                       <a href="#" class="badge badge-danger">50$</a><br>
					                    </div>
					                </div>    
					                </div>
					            </div>
			                    <div class="media mt-4">
			                  		<img src="assets/svg/people_.svg" class="align-self-center mr-3 mt-4" alt="..." style="width:80px; height:80px;">
					                <div class="media-body">
					                    <h5 class="mt-4 text-left">Connexion aux opportunités</h5>
					                    <p class="text-left">Vous cherchez d'être accompagné dans la réalisation des vos applications aux opportunités ? nous vous proposons des directives pratiques à suivre.</p>
					                    <div class="text-right">
					                       <a href="#" class="badge badge-danger">50$</a><br>
					                    </div>
					                </div>
			                    </div>
				                <div class="media mt-4">
					                <img src="assets/svg/send-copy.svg" class="align-self-center mr-3 mt-4" alt="..." style="width:80px; height:80px;">
					                <div class="media-body">
					                    <h5 class="mt-4 text-left" style="font-family:candara; font-weight: bold;">Service de traduction,Sous titrage & Copywriting</h5><br>
					                    <div class="text-left" style="font-size: 15px; font-family:Segoe UI;"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i> Accompagnement personalisé</div>
					                    <div class="text-left" style="font-size: 15px; font-family:Segoe UI;"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i>  Traducteur proffessionnel</div>
					                    <div class="text-left" style="font-size: 15px; font-family:Segoe UI;"><i class="fa fa-check" style="background-color: rgb(21,170,213);color:white; border-radius:50%;color:white;"></i> Qualité Garantie</div>
					                </div>
				                </div>
			                    <br>
				                <div class="container text-center">
				                  <a href="orders"><button type="button" class="btn btn" style="background-color:rgb(21,170,213);color:white; margin: 20px; font-weight: bold;">Commandez des traductions</button></a>
				                </div>
	                       </ul>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

  <!--   <div class="container mt-4">
   <h2 class="text-center  mt-4">Our Partners</h2>
  <section class="customer-logos slider mt-4">
    <div class="slide"><img src="assets/images/adidas.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/facebook.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/google.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/instagram.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/nike.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/twitter.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/uber.png" alt="logo"></div>
    <div class="slide"><img src="assets/images/youtube.png" alt="logo"></div>
  </section>
</div> --> 


                          
<?php include('footer.php'); ?>




       