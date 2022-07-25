<?php include ('header.php'); ?>
<style type="text/css">
  

</style>
<script>
  document.title="Commandez le texte"
</script>
<br>
   
<div class="col-md-12" style="background-color: white;">

  <div class="container">
    <div class="row">
      <div class="col-md-8 shadow" style="background-color: white; border-radius:20px;">
      <div class="container center">
        <h2 style="font-family:; margin:20px;">Demande de devis</h2>
        <div class="" style="margin:20px; font-weight: bold;">Décrivez vos besoins en traduction et nous reviendront rapidement vers vous pour vous accompagner dans votre projet.</div>
        <hr>
          <?php
                 //exit(var_dump(isset($_POST['btninscrit'])));
                if (isset($_POST['btninscrit'])) {       
                 $email = $_POST['email'];
                 $phone = $_POST['phone'];
                 $image=Image_Compreser::UploadDocs('documents'); 
                 $mots = $_POST['mots'];
                 $detail = $_POST['detail'];       
                 if ($image) {
                   # code...
                 if ($email && $phone && $mots && $detail) {
                 $myqwery=$db->prepare("INSERT INTO texte_traduction (email,phone,image,mots,detail) VALUES(:email,:phone,:image,:mots,:detail)");
                 $myqwery->execute(array(
                  ':email'   =>  $email,
                 ':phone'    =>  $phone,
                 ':image'    =>  $image,
                 ':mots'    =>  $mots,
                 ':detail'    =>  $detail             
                 ));
                 
                 if ($myqwery){
                 echo '<b class="text-danger text-center alert alert-success"><i class="fa fa-check" aria-hidden="true"></i>  Enregistrement reusi </b>';
                 }  
                
                 else{
                   echo'érreur';
                 }
                }
  
                 else{
                 echo '<br><br/><br/><br/><br/><h3 style="color:red;">Veuillez remplir tous les champs.</h3>';
                  }
                 } else{
                  echo '<br><br/><br/><br/><br/><h3 style="color:red;">Erreur fichier.</h3>';

                 }
                 $email = $_POST['email'];
                  $from = "info@congofirstchoice.com";
                  $name ='First Choice';
                  $subject = 'Merci de nous avoir rejoint';
                  $number = '+243977743843';
                  $cmessage = 'Votre inscription à la newsletter Marketing de Congo First Choice a bien été prise en compte <br>
                  Tout les derniers samedis du mois, vous recevez des un condensé des conseils aux techniques des ventes pour Booster votre efficacité commerciale. <br>
                  Vous pouvez nous contacter directement aux <br>

                  +243998957572';
                  $headers = "From: $from";
                  $headers = "From: " . $from . "\r\n";
                  $headers .= "Reply-To: ". $from . "\r\n";
                  $headers .= "MIME-Version: 1.0\r\n";
                  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                  $csubject = "Confirmation email.";
                  $logo = 'assets/images/first.jpg';
                  $link = 'www.firstchoice.com';

                  $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
                  $body .= "<table style='width: 100%;'>";
                  $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
                  // $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
                  $body .= "</td></tr></thead><tbody><tr>";
                  $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
                  $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
                  $body .= "</tr>";
                  $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
                  $body .= "<tr><td></td></tr>";
                  $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
                  $body .= "</tbody></table>";
                  $body .= "</body></html>";
                  if (mail($email, $subject, $body, $headers)) {
                    // echo 'Email envoyé avec succes';
                    }else{
                    // echo 'Erreur du systeme de messagerie';
                    }  

              } 
              else {

              }
                  
                 
               ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="email" class="form-control bg-white" required="" style="border: 2px solid #f2f3f5;" name="email" placeholder="Votre email">
              </div>
               <div class="form-group">
                <input type="phone" pattern="((+[0-9]))" class="form-control bg-white" required="" style="border: 2px solid #f2f3f5;" name="phone" placeholder="Numero de téléphone">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="drop-zone">
                  <img src="assets/svg/slide-up.svg" class="align-self-center" alt="..." style="width:50px; font-weight: bold; font-size:30px; "><br>
                  <span class="drop-zone__prompt">Glissez ici le document à traduire</span>
                  <input type="file" name="doc" accept=".pdf , .docx" class="drop-zone__input" required="">
                </div>
              </div>
              <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control bg-white" rows="6" placeholder="Copier et coller le texte ici, 500 mot max" name="mots" style="border: 2px solid #f2f3f5;" ></textarea>
                </div>
                <div class="form-group">
                  <textarea class="form-control bg-white" required="" name="detail" rows="6"placeholder="Description" style="border: 2px solid #f2f3f5;"></textarea>
                </div>
                <button type="submit" name="btninscrit" class="btn btn-"style="background-color:rgb(21,170,213);border:1px solid rgb(21,170,213); color:white; font-weight: bold;">
                  Envoyer
                </button>           
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <br>
      <div class="col-md-4 mt-1">
        <div class="col-md-12 mt-4">
          <img src="assets/images/Order.png">
      </div>
    </div>
  </div>
</div>
</div>
<br>
<script type="text/javascript">
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

</script>
<?php include ('footer.php'); ?>
</body>











  