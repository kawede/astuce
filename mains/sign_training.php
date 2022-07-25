<?php include ('header.php'); ?>
   <!-- Class container here -->
<script>
  document.title="Demande de formation"
</script>
 
   </div>
   <div class="container mt-4"style="background-color: white;">
    <hr>
     <div class="col-md-12" >
       <div class="row">
        <div class="col-md-3"></div>
         <div class="col-md-6 shadow" style="margin:30px;">
          <div class="text-center">
           <div class="card-title">
                <h4 class="mb-2 text-prmy alert alert-warning"  style="white-space:pre;margin:20px;background-color:rgb(23,48,88);color:white;font-weight: bold;font-size:20px; font-family: candara;"><?= t('Requestform')?></h4>
                <!-- <p>Formulaire de reservation d'une place d'assistance <strong></strong></p> -->
            </div>
              
            <form action="" method="POST" enctype="multipart/form-data">
            <?php
              if (isset($_POST['btninscrit'])) {
                # code...
                extract($_POST);
                if (!empty($titre_formation) && !empty($nom_complet)  &&
                !empty($genre) && !empty($email) && !empty($phone) && !empty($maniere) && !empty($centre) && !empty($lieu)  && !empty($statut)) {
                  # code...

                    $ps = $db->prepare("INSERT INTO demande_formation(titre_formation,nom_complet,adresse,genre,email,phone,maniere,centre,lieu,statut) VALUES(:titre_formation,:nom_complet,:adresse,:genre,:email,:phone,:maniere,:centre,:lieu,:statut) ");
                    $statement = $ps->execute(array(
                      ':titre_formation'   =>  $titre_formation,
                      ':nom_complet'    =>  $nom_complet,
                      ':adresse'    =>  $adresse,
                      ':genre'   =>  $genre,
                      ':email'   =>  $email,
                      ':phone'    =>  $phone,
                      ':maniere'   =>  $maniere,
                      ':centre'   =>  $centre,
                      ':lieu'    =>  $lieu,
                      ':statut'    =>  $statut
                    ));

                    if (!empty($statement)) {
                      # code...
                       echo '<b class=" text-center alert alert-success"> Enregistrement reusi </b>';
                    
                    }
                    else{
                      echo("oups!!!!");
                    }
                  }
                }
                else{
                  // echo("Tous les champs sont requis");
                }

              ?>
                         
                <div class="col-lg-12 border rounded section-bg py-3">
                    <h6 class="mb-2 font-weight-bold"><?= t('InformationT')?></h6><br>
                    <div class="form-group">
                        <label style="float:left"><?= t('Titre1')?> <span class="text-danger">*</span></label>
                        <input type="text" style="background-color:white;font-family:candara; color:black" id="title-case" name="titre_formation" value="" class="form-control font-weight-bold" placeholder="<?= t('Entrer')?> ">
                  </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold"><?= t('IPersonnelle')?></h6>
                    <div class="form-group">
                        <label for="nom-cnnx"style="float:left"><?= t('nomcomplet')?><span class="text-danger">*</span></label>
                        <input type="text" id="nom-cnnx" style="background-color:white;font-family:candara; color:black" name="nom_complet" class="form-control" placeholder="<?= t('enterfullname')?> ">
                    </div>
                    <div class="form-group">
                        <label for="add-cnnx" style="float:left"><?= t('Adresse')?> <small class="badge badge-default border"><?= t('adressfield')?></small></label>
                        <input type="text" style="background-color:white;font-family:candara; color:black"  id="add-cnnx" name="adresse" class="form-control" placeholder="<?= t('Vadresse')?>">
                    </div>
        
                    <div class="form-group">
                        <label for="gender-cnnx" style="float:left"><?= t('Genre')?> <span class="text-danger">*</span></label>
                        <select name="genre" id="gender-cnnx" style="background-color:white;font-family:candara; color:black" class="form-control">
                            <option value=""><?= t('Selectionner')?></option>
                            <option value="masculin"><?= t('Masculin')?></option>
                            <option value="feminin"><?= t('Feminin')?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold">Contacts</h6>
                    <div class="form-group ">
                        <label for="email-cnnx"style="float:left"><?= t('Adresseemail')?> <span class="text-danger">*</span></label>
                        <input type="email" style="background-color:white;font-family:candara; color:black" id="email-cnnx" name="email" class="form-control" placeholder="<?= t('votreadresse')?> ">
                    </div>
                    <div class="form-group">
                        <label for="tele-cnnx" style="float:left"><?= t('Phonenumber')?> <span class="text-danger">*</span></label>
                        <input type="text" id="tele-cnnx"style="background-color:white;font-family:candara; color:black" name="phone" maxlength="13" class="form-control" placeholder="<?= t('enterPn')?> ">
                    </div>
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold"><?= t('assisted')?></h6>
                    <div class="row">
                        <div class="form-group col-lg-6 col-6 text-center form-group-sm">
                            <label for="online-cnnx"><?= t('Online')?></label>
                            <input type="radio" name="maniere" id="maniere" class="form-control" value="online" style="height: 25px">
                        </div>
                        <div class="form-group col-lg-6 col-6 text-center form-group-sm">
                            <label for="offline-cnnx"><?= t('Inperson')?></label>
                            <input type="radio" name="maniere" id="maniere" class="form-control" value="offline" style="height: 25px">
                        </div>
                        <div class="col-lg-12 text-center text-danger">
                            <b id="online_cnnx" class="d-none"><span class="fa fa-warning mr-1"></span><span>Selectionner un cas</span></b>
                        </div>
                    </div>
                    <div class="form-group mt-2 border-top pt-2 case-online">
                        <label for="center-cnnx" style="float:left">Choisie le center de formation <span class="text-danger">*</span></label>
                        <select name="centre" id="centre" class="form-control"style="background-color:white;font-family:candara; color:black">
                            <option value="">Selectionner le centre d'assistance</option>
                            <option value="reitec">Centre Brigde</option>
                            <option value="meorg">Dans mon organisation</option>
                            <option value="mepart">Chez un partenaire</option>
                        </select>
                        <b class="place_form text-danger d-none">
                            <span class="fa fa-warning mr-1"></span>
                            <span>Selectionner le lieu d'assistance</span>
                        </b>
                    </div>
                       <div class="form-group mt-2 border-top pt-2 case-online">
                        <label for="place-reitec-cnnx"style="float:left">Choisissez le lieu d'assistance<span class="text-danger">*</span></label>
                        <select name="lieu" id="center-cnnx" class="form-control"style="background-color:white;font-family:candara; color:black">
                              <option value="">Selectioner le lieu</option>
                            <option value="Goma">Goma</option>
                            
                        </select>
                        </select>
                        <b class="place_form text-danger d-none">
                            <span class="fa fa-warning mr-1"></span>
                            <span>Selectionner le lieu de formation</span>
                        </b>
                    </div>
            
                </div>
                <div class="col-lg-12 border rounded section-bg py-3 mt-2">
                    <h6 class="mb-2 font-weight-bold"style="float:left">Sous quel status vous vous enregistrez</h6>
                    <div class="form-group">
                        <label for="kind-cnnx"style="float:left">Vous êtes une Organisation | Un Individu<span class="text-danger">*</span></label>
                        <select name="statut" id="kind-cnnx" class="form-control"style="background-color:white;font-family:candara; color:black">
                            <option value="individuel">Un individu ou personne requirante</option>
                            <option value="organisation">Une Organisation ou association</option>
                        </select>
                    </div>
              
                </div>
          
                <div class="form-group text-center">
                    <b class="text-danger my-2">
                        <em class="d-none-" ouput-text="ouput"></em>
                    </b>
                    <button class="btn btn btn-user btn-block" name="btninscrit" style="background-color:rgb(21,170,213); color:white; font-family: candara; font-weight: bold; font-size:20px;">
                         soumettre ce formulaire
                    </button>
                </div>
                <!-- <div class="col-12 mb-4">
                <a href="?page=recoverpassword" class="d-block"> <span class="bx bx-chevron-right mr-2"></span>Telecharger ce formulaire ici</a></div> -->
                
            </form>
              
         </div>
       </div>
         <div class="col-md-3"></div>
       </div>
     </div>
   </div>
   <br>
  <?php include ('footer.php'); ?>