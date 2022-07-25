<?php include ('mains/header.php'); 
if(isset($_GET['id']) and !empty($_GET['id'])):
    $id=htmlspecialchars($_GET['id']);
    $myqwery=$db->prepare("SELECT * FROM programmeitc WHERE id=:id");
    $myqwery->execute(array(
    'id'=>$id
    ));
    if ($myqwery):
    $data=$myqwery->fetchAll(PDO::FETCH_OBJ);
    // var_dump($data);
    if (!empty($data)):       
  ?>

   <!-- Class container here -->
  <script>
  document.title=" ITC-Rdc | <?=$data[0]->designation?>"
</script>
 <?php var_dump($_GET); ?>
<hr>
 <div class="container mt-2">
     <div class="col-md-12">
        <div class="row">
          <div class="col-md-8">
                                      <?php
              if (isset($_POST['btninscrit1'])) {
                # code...
                extract($_POST);
                if (!empty($nom_complet) && !empty($telephone) && !empty($email) && !empty($formation)) {
                  # code...

                    $ps = $db->prepare("INSERT INTO inscription(nom_complet,lieu,telephone,email,formation) VALUES(:nom_complet,:lieu,:telephone,:email,:formation) ");
                    $statement = $ps->execute(array(
                      ':nom_complet'   =>  $nom_complet,
                      ':lieu'    =>  $lieu,
                      ':telephone'    =>  $telephone,
                      ':email'   =>  $email,
                       ':formation'   =>  $formation

                      ));

                    if (!empty($statement)) {
                      # code...
                       echo '<b class=" text-center alert alert-success"> Message envoyé avec succes </b>';
                    
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
            <div class="alert alert-info">
              <span><em><?=$data[0]->description ?></em></span>
            </div>
             <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control" style="color:black;background-color: white; font-family: candara;" name="_nom"  id="exampleFirstName" readonly="" value="<?=$data[0]->designation ?>" >
                </div>
                <div class="col-sm-6">
                  <input type="text" style="color:black; font-family: candara;background-color: white;" readonly="" class="form-control " name="_email" style="color:black;font-family:candara" value=" <?=$data[0]->region ?>"  id="exampleSecondName" placeholder="Email" >
                </div>
              </div>
                 <button class="btn btn-danger btn-block" name="btninscrit"  data-toggle="modal" data-target="#logoutModal12" style=" color:white; font-family: candara;background-color: rgb(200,0,0);">
                         S'inscrire
                    </button>
          </div>

          <div class="col-md-4">
                   <table class="table table">
            <thead>
              <tr style="background-color: rgb(10,74,145);color:white;">
                <th scope="col"></th>
                <th scope="col">Restez interessé</th>   
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Abris / Articles Ménagers Essentiels (AME)</td>
              </tr>
               <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Eau, Hygiène et Assainissement (EHA) </td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Education</td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Wash : EHA </td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Nutrition  & protection</td>
              </tr>
                 <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Santé: Epidémiologie</td>
              </tr>
               <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Sécurité alimentaire </td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Conseils-Audit Interne & Ms Project</td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Logistique Humanitaires & Entrepreneurial & coaching </td>
              </tr>
              <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Comptabilité OHADA  & Marketing Digital </td>
              </tr>
                <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Management  & Administration / Secrétariat  </td>
              </tr>
                <tr>
                <th scope="row"><i class="fa fa-circle" aria-hidden="true" style="font-size:10px;color:rgb(200,0,0);"></i></th>
                <td >Ressources Humaines   & Gestion des Projets et suivi évaluation    </td>
              </tr>
              
            </tbody>

      </table>
          </div>
        </div>
       </div>
     </div>
   </div>
  <?php endif;?>
  <?php endif;?>
  <?php endif;?>
 </div><br>
 <?php include ('mains/footer.php'); ?>

 <div class="modal fade" id="logoutModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"  style="color:black; font-weight: bold; font-family:candara;">Prendre inscription</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
             
          <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
             <form action="" method="post" enctype="multipart/form-data">
                    <input type="text"style="color:black; font-family: candara; background-color: white;" class="form-control" name="nom_complet"  id="exampleFirstName" placeholder="Nom complet" >
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <small class="badge badge-default border">Le lieu n'est pas obligatoir</small>
                    <input type="text" style="color:black; font-family: candara;background-color: white;" class="form-control"  name="lieu" placeholder="Lieu...." >
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color: white;" class="form-control" required="" rows="9" name="telephone" placeholder="Telephone" >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" style="color:black; font-family: candara;background-color: white;" class="form-control" required="" rows="9" name="email" placeholder="email..." >
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="email" style="color:black;display: none; font-family: candara;background-color: white;" class="form-control" required="" rows="9" name="formation" placeholder=""  value="<?=$data[0]->designation ?>">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn btn-user btn-block" name="btninscrit1" style="background-color:rgb(200,0,0); color:white;">
                  Envoyer
                </button>
              </form>
        </div>
      </div>
    </div>
  </div>

