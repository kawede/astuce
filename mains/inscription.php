<?php include ('header.php'); ?>
   <!-- Class container here -->
<script>
  document.title=" First-Choice | Inscription"
</script>
     <div class="col-md-12"style="background-color: rgb(2,4,104);">
       <div class="row" >
         <div class="col-md-12" >
           <h1 class="text-center text-white"><i class="fa fa-users" style="font-size:25px;"></i> Inscription</h1>
           <p class="text-center text-white" style="font-size: 20px;">Inscrivez-vous pour la nouvelle cohorte de formation des commerciaux et vendeurs brillants.</p>
         </div>
       </div>
     
   </div>
   <div class="container mt-4">
     <div class="col-md-12">
       <div class="row">
        <div class="col-md-2"></div>
         <div class="col-md-8 "  >
          <div class="text-center">

                 <?php
                 //exit(var_dump(isset($_POST['btninscrit'])));
                if (isset($_POST['btninscrit'])) {
                 $prenom = $_POST['prenom'];
                 $nom = $_POST['nom'];
                 $genre = $_POST['genre'];
                 $email = $_POST['email'];
                 $telephone = $_POST['telephone'];  
                 $NiveauE = $_POST['NiveauE'];
                 $Filiere = $_POST['Filiere'];
                 $adresse = $_POST['adresse'];
                 $description = $_POST['description'];
                 if ($prenom && $nom && $genre && $email && $telephone && $NiveauE && $Filiere && $adresse && $description) {
                 $myqwery=$db->prepare("INSERT INTO commerciaux (prenom,nom,genre,email,telephone,NiveauE,Filiere,adresse,description) VALUES(:prenom,:nom,:genre,:email,:telephone,:NiveauE,:Filiere,:adresse,:description)");
                 $myqwery->execute(array(
                  'prenom'=> $prenom,
                  'nom'=> $nom,
                  'genre'=> $genre,
                  'email'=> $email,
                  'telephone'=> $telephone,
                  'NiveauE'=> $NiveauE,
                  'Filiere'=> $Filiere,
                  'adresse'=> $adresse,
                  'description'=> $description
                
                 ));
                 
                 if ($myqwery){
                 echo '<div class="text-danger text-center alert alert-success"><i class="fa fa-check" aria-hidden="true"></i>  Candidature recue avec succées </div>';
                 }  
                }
                 else{
                  echo '<b class="text-danger text-center alert alert-danger"><i class="fa fa-check" aria-hidden="true"></i>  une case est vide </b>';
                  }
                 } 
               
               ?>
          </div>
            <form class="mt-2" method="POST" action="">
                <div class="col-md-12 form-group">
                  <input type="text" name="prenom" class="form-control bg-white" placeholder="Prenom *" required="">
                </div>
              <div class="col-md-12 form-group" >
                 <input type="text" class="form-control bg-white" placeholder="Nom *" name="nom" required="">
              </div>
              <div class="col-md-12">
                <select name="genre"class="form-control bg-white form-group" >
                  <option value="Masculin" >Masculin</option>
                  <option value="Masculin">Feminin</option>
                </select>
              </div>
              <div class="col-md-12 form-group">
                 <input type="email" class="form-control bg-white" placeholder=" email *" name="email" required="" style="color:black;font-family: candara;">
              </div>
              <div class="col-md-12 form-group">
                 <input type="phone" class="form-control bg-white" placeholder="Telephone *" name="telephone" required="" style="color:black;font-family: candara;">
              </div>
              <div class="col-md-12 form-group">
                 <input type="phone" class="form-control bg-white" placeholder="Niveau d'etude *" name="NiveauE" required="" style="color:black;font-family: candara;">
              </div>
              <div class="col-md-12 form-group">
                 <input type="phone" class="form-control bg-white" placeholder="Filiere *" name="Filiere" required="" style="color:black;font-family: candara;">
              </div>
              <div class="col-md-12 form-group">
                <textarea class="form-control bg-white" cols="30" placeholder="Adresse physique *" name="adresse" style="color:black;font-family: candara;" ></textarea>
              </div>
               <div class="col-md-12 form-group">
                <textarea class="form-control bg-white" cols="30" placeholder="Description sur son profil *" name="description" style="color:black;font-family: candara;"></textarea>
              </div> 
              <div class="col-md-12 form-group">
                <button type="submit" name="btninscrit" class="btn btn-primary btn-block" style="background-color: rgb(2,4,104); font-family: candara; border:1px solid rgb(2,4,104);">
                  <i class="fa fa-send mr-1"></i> Inscription
                </button>
              </div>
          </form>
         </div>
         <div class="col-md-2"></div>
       </div>
     </div>
   </div>
  <?php include ('footer.php'); ?>