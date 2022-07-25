<?php include ('header.php'); ?>

   <script>
  document.title="contact"
</script>
   <script type="text/javascript">
     
   </script>
  <br><br>
   <div class="container">
     <div class="col-md-12 shadow" style="background-color:white; ; border-radius:5px;">
      <div class="row">
            <section id="contact" class="contact">
        <div class="container">
                <?php
              if (isset($_POST['btninscrit'])) {
                # code...
                extract($_POST);
                if (!empty($nom_complet) && !empty($email) && !empty($sujet) && !empty($message)) {
                  # code...

                    $ps = $db->prepare("INSERT INTO contact(nom_complet,email,sujet,message) VALUES(:nom_complet,:email,:sujet, :message) ");
                    $statement = $ps->execute(array(
                      ':nom_complet'   =>  $nom_complet,
                      ':email'    =>  $email,
                      ':sujet'    =>  $sujet,
                      ':message'   =>  $message

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
            <hr>
            <div class="section-title">
                <h2 data-aos="fade-up" style="text-align:center;font-weight: bold;font-size:30px; font-family: candara;">Contact</h2>
                
            </div>
            <hr>
            <div class="col-md-12">
              <div class="row">
               
             <div class="col-md-4 mb-2">
              <div class="col-md-12">
                <div class="row card" style="background-color:rgb(23,48,88);">
                  <div class="col-md-12 card-body text-center">
                    <i class="fa fa-phone" aria-hidden="true" style="font-size: 50px;color:rgb(21,170,213);"></i>
                      <h3 style="font-weight: bold;color:white">Appelez-nous</h3>
                    <div class="col-md-12 text-center mt-2">
                      <a href="mailto"><h6 style="color: white;">(+243) 991571461<br>(+243) 810258135</h6></a>
                      <br>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-4 mb-2">
              <div class="col-md-12">
                <div class="row card" style="background-color:rgb(23,48,88); ">
                  <div class="col-md-12 card-body text-center">
                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 50px;color:rgb(21,170,213);"></i>
                      <h3 style="font-weight: bold;color:white;">Notre Adresse</h3>
                    <div class="col-md-12 text-center mt-4">
                     <h6 style="color: white;">Goma: Katindo, Av La Frontiere N°136 Ref:Un jour Nouveau</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-2">
              <div class="col-md-12">
                <div class="row card" style="background-color:rgb(23,48,88); ">
                  <div class="col-md-12 card-body text-center">
                    <i class="fa fa-envelope" aria-hidden="true" style="font-size: 50px;color:rgb(21,170,213);"></i>
                      <h3 style="font-weight: bold;color:white">Email Us</h3>
                    <div class="col-md-12 text-center mt-2">
                      <a href="mailto"><h6 style="color: white;">www.aga@gmail.com <br>&nbsp;</h6></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
              </div>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
         
                <div class="col-xl-9 col-lg-12 mt-4 py-3">
                                 
                    <form id="contact-form" method="POST">
            
                        <div class="form-row mx-3">
                            <div class="col-md-6 form-group">
                                <!-- <label for="nom"></label> -->
                                <input type="text" name="nom_complet" class="form-control"  style="background-color:white;font-family:candara; color:black;background-color:white;"  placeholder="Votre nom complet"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" style="background-color:white;font-family:candara; color:black;background-color:white;"  placeholder="Votre email"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="sujet"  style="background-color:white;font-family:candara; color:black;background-color:white;" placeholder="Sujet" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <textarea class="form-control" name="message"  style="background-color:white;font-family:candara; color:black;background-color:white;" rows="5" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-12 mx-3 text-center text-danger mb-2">
                                <span ouput-text='ouput'></span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn" style="background-color:rgb(21,170,213); font-weight: bold; color: white;"  name="btninscrit" type="submit">
                                    <span>Envoyer le message</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
      </div>
     </div>
   </div>
   <br>
    
     <div class="col-md-12 ">
       <div class="row">
         <div class="col-md-12 ">
        
            <iframe src="https://www.google.com/maps/d/embed?mid=19y-Fas0C4Zne-k71DVg_BwFnUYLHMhg&ehbc=2E312F" style="width: 100%; height: 600px;"></iframe>
     
            <!-- <div id="map">

          </div> -->
         <!--  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
          <script src="assets/js/map.js"></script> 
            <script>
              (function($){

                  function populateLang() {
                    if (typeof localStorage !== 'undefined') {
                      var locale = localStorage.getItem('locale');
                      if (!locale) {
                        locale = 'FR'
                      }
                      $('.current-locale').html(locale)
                      doGTranslate('en|' + locale);
                    }
                  }

                  $(document).on('change', '.lang-selector, .mobile-lang-selector', function() {
                    var selectedLanguage = $(this).val();
                      doGTranslate('en|' + selectedLanguage);
                      if (typeof localStorage !== 'undefined') {
                        localStorage.setItem('locale',selectedLanguage);
                        populateLang();
                      }
                  })

                  populateLang();

              })(jQuery);
        </script> -->
         </div>
       </div>
     </div>

  <?php include ('footer.php'); ?>