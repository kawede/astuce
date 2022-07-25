<?php include ('header.php'); ?>
<script>
  document.title="liste des classe"
</script>
 <div class="col-md-12" style="background-color:rgb(23,48,88); color: white; font-family: candara;">
  <div class="container">
    <br>
    <div class="btn-inner text-center">
      <a class="btn-play" href="https://www.youtube.com/watch?v=7lWapcgpILg">
        <i class="fa fa-play" aria-hidden="true" style="font-size: 30px; color:red; "></i>
      </a>
    </div>
    <br>
  </div>
</div>
<br>
<div class="col-md-12" style="background-color: white;">
 
  <div class="container">
    <div class="row">
        <div class="col-md-8 ">
      <div class="container center">
        <div class="text-left">
          <div class="text-left" style="font-family:Segoe UI; font-size: 13px; font-weight:bold;">Liste des classes</div>
          <div class="text-left" style="font-family:Segoe UI; font-size: 13px;"><?php echo(courCoutn($db)) ?> Cours</div>
        </div>
        <hr>
  <div class="container text-center mt-4 ">
      <?php 
        $myqwery=$db->prepare("SELECT * FROM meeting_zoom ORDER BY id Desc ");
        $myqwery->execute();
        $datas=$myqwery->fetchAll(PDO::FETCH_OBJ);
        if ($datas):
        foreach($datas as $token): 
      ?>
        <div class="media shadow" style="border-radius: 3px;">
        <img src="assets/svg/online.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
          <div class="media-body mt-3 mb-2 mr-4">
            <h5 class="text-left mr-4" style=" color:rgb(23,48,88);"><?=$token->topic;?></h5>
            <p class="text-left mr-4" style=" font-size:12px; line-height:0.9"><a href="<?=$token->url;?>" style="text-decoration:underline;color:blue;">Rejoignez la reunion</a></p>
             <p class="text-left" style=" font-size:12px; line-height:0.9">Date: <?=$token->start_date;?></p>
             <p class="text-left mr-1" style=" font-size:12px; line-height:0.9">Durée: <?=$token->duration;?></p>

          </div>
      </div> <br><br>
      <?php
        endforeach;
        else: 
      ?>
      <span style="font-family: candara; font-weight: bold; color:red; font-size:30px;" class="text-danger text-center alert alert-success">Aucune classe disponnible!</span>
      <?php
      endif;
      ?>
   </div>
</div>
    </div>
   
    <br>
    <div class="col-md-4 mt-1">
      <div class="col-md-12 mt-4" style="background-color:rgb(23,48,88); border-radius:10px;">
        <p style="color:rgb(23,48,88);">dgd</p>
         <div class="text-center text-white " style=" font-size:16px; margin-top:15px; font-weight: bold;">Traductions professionnelles sur vos fichiers d'origine dans 2 langues (Anglais et Francais) quel que soit votre secteur d'activité, grâce à nos chefs de projet et traducteurs proffessionnels. </div>
         <div class="container text-center">
            <a href="classes"><button type="button" class="btn btn" style="background-color:rgb(21,170,213);color:white; margin: 20px; font-weight: bold;">Commander des traductions</button></a>
          </div>
      </div>
      <br>
      <div class="container text-center">
        <img src="assets/svg/arrow.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
      </div>
      <br>
     <div class="media shadow" style="border-radius: 3px;">
        <img src="assets/svg/calendar.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
          <div class="media-body mt-3">
            <h5 style="margin-left:30px; color:rgb(23,48,88);">Livraison rapides</h5>
            <p style="margin-left:-90px; font-size:12px; line-height:0.9">Délais indiqués & respecté </p>
          </div>
      </div>
      <br>
       <div class="media shadow" style="border-radius: 3px;">
        <img src="assets/svg/start.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
          <div class="media-body mt-3">
            <h5 style="margin-left:30px; color:rgb(23,48,88);">Qualité garantie</h5>
            <p style="margin-left:-90px; font-size:12px; line-height:0.9">Retours gratuits & illimités </p>
          </div>
      </div>
      <br>
        <div class="media shadow" style="border-radius: 3px;">
        <img src="assets/svg/statistics.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
          <div class="media-body mt-3">
            <h5 style="margin-left:30px; color:rgb(23,48,88);">Tarifs dégressifs</h5>
            <p style="margin-left:-90px; font-size:12px; line-height:0.9">Dès 500 mots commandés </p>
          </div>
      </div>
      <br>
        <div class="media shadow" style="border-radius: 3px;">
        <img src="assets/svg/phone.svg" class="align-self-center " alt="..." style="width:40px; height:40px; margin-left:20px; margin-top:2px;">
          <div class="media-body mt-3">
            <h5 style="margin-left:30px; color:rgb(23,48,88);">Support client disponible</h5>
            <p style="margin-left:-75px; font-size:12px; line-height:0.9">Lundi à vendredi de 9h à 17h </p>
          </div>
      </div>

    </div>
  </div>
    </div>
  </div>
</div>
<br>
<?php include ('footer.php'); ?>
</body>











  