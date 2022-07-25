<?php include ('header.php'); ?>
<script>
  document.title=" Devenir formateur"
</script>
<div class="col-md-12 mt-4 bg-white">
  <div class="container">
    <div class="col-md-12">
      <h2 style="color:white;">#</h2>
      <h1 class="text-center" style="color:rgb(14,118,205);"><i class="fa fa-arrow-right" aria-hidden="true" style="color:red;"></i> Devenir formateur</h1>
     <!--  <p class="text-center">Principles on which we are based and which allow us to evolve well, whether with our developers or with our customers.</p> -->
    </div>
    <br>
    <div class="row bg-white">
      <div class="col-md-6">
        <h1  class="text-left" style="color:rgb(14,118,205);">Ayez un impact global</h1>
        <p class="text-left" style="color:black; font-size:20px; font-weight: bold;"> Construisez votre cours en ligne et monétisez votre expertise en partageant votre savoir partout dans le monde.</p>
        <br>
        <button class="btn btn-danger" style="float:left;background-color:rgb(200,0,0); font-weight:bold;" data-toggle="modal" data-target="#logoutModal12" >Devenir un formateur</button>
      </div>
      <div class="col-md-6">
        <img src="assets/images/online-teacher.jpg" class="img-thumbnail"  >
      </div>
    </div>
    <hr>
     <p>
            <a class="btn btn-white btn-lg btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color:rgb(14,118,205);;font-size:15px; font-weight: bold;">+ Remplisser ce formulaire?</a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <ul>
               
                  
              </ul>
            </div>
          </div>
         <h2 style="color: white;">#</h2>
</div> 
<br>
<br>
  <div class="col-md-12"style="background-color: rgb(241,244,253);">
                <div class="container" >
                  <h2 class="text-center" style="margin-top: 100px;"> <?= t('Temoignages')?></h2>
                  <h5 class="text-center"><?= t('sayins')?></h5>
                  <br>
                  <br>
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="container">
                       <div class="row">
                         <div class="col-md-2"></div>
                           <div class="col-md-8">
                            <div class="carousel-inner">
                              <?php foreach($myqwery->fetchAll(PDO::FETCH_OBJ) as $token): ?>
                              <div class="carousel-item active">
                                <span style="font-weight: bold; color: red;"><?=$token->nom?></span>  <!-- <span><?=$token->pays?></span> -->
                                <p style="font-weight: bold; font-size:18px;"><?=$token->description;?></p>        
                              </div>
                              <?php endforeach ?>
                              <?php 
                               $myqwery=$db->prepare("SELECT * FROM temoignage ORDER BY id ");
                               $myqwery->execute();
                               foreach($myqwery->fetchAll(PDO::FETCH_OBJ) as $token): 
                              ?>
                              <div class="carousel-item">
                                <span style="font-weight: bold; color: red;"><?=$token->nom?></span>-<span><?=$token->pays?></span>
                                <p style="font-weight: bold; font-size:18px;"><?=$token->description;?></p>  
                              </div>
                             <?php endforeach ?>
                            </div>
                          </div>
                         <div class="col-md-2"></div>
                        </div>
                     </div>
                    <span class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </span>
                    <span class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </span>
                  </div>
                  <br>
                  <br>
               </div>
             </div>
           </div>
          </div>



<?php include ('footer.php'); ?>


 <div class="modal fade" id="logoutModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"  style="color:black; font-weight: bold; font-family:candara;">Devenez un formateur Aga</h5>
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
                    <input type="text"style="color:black; font-family: candara; background-color:white;" class="form-control" name="designation"  id="exampleFirstName" placeholder="Nom et prenom" >
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="video" placeholder="Email" >
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="video" placeholder="Telephone" >
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color:white;" class="form-control" required="" rows="9" name="video" placeholder="Formateur de..." >
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn btn-user btn-block" name="btninscritvideo" style="background-color:rgb(200,0,0); color:white;">
                 S'inscrire Maintenant
                </button>
              </form>
        </div>
      </div>
    </div>
  </div>

