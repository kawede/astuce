<?php include ('header.php'); ?>
<script>
  document.title=" Formations"
</script>

<div class="col-md-12 bg-white ">
  <div class="row">
    <div class="col-md-2 md" style="background-color:rgb(14,118,205);">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
         <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/3IMAGES.jpg" style="width:215px;margin:-5px; margin-top:5px; border:1px solid rgb(14,118,205);">
        </div>
        <div class="carousel-item">
          <img src="assets/images/2IIMgae.jpg" style="width:215px;margin:-5px; margin-top:5px;border:1px solid rgb(14,118,205)">
        </div>
        <div class="carousel-item">
          <img src="assets/images/1IMAGE.jpg" style="width:205px;margin:-5px; margin-top:5px;border:1px solid rgb(14,118,205)">
        </div>
      </div>
     </div>
    </div>
    <div class="col-md-8">
        <div class="container">
    <br>
    <table class="table table">
      <thead>
        <tr style="background-color: rgb(14,118,205);color:white;">
          <th scope="col"></th>
            <th scope="col" class="text-left"><i class="fa fa-circle" aria-hidden="true" style="color:rgb(200,0,0); font-size:10px;"></i> <?= t('welcome')?></th>   
          </tr>
        </thead>
    </table>
      <p class="text-left" style="color:black; font-weight: bold;"><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(200,0,0);"></i>  Formations virtuelles</p>
       <form class="search form-inline" autocomplete="off" action="search" method="GET">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only"></label>
            <input type="Text" value="<?= isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '' ?>" name="search_keyword" class="form-control search1" required="" placeholder="Faite une recherche de votre choix" style="background-color:white; color: rgb(14,118,205);" class="form-control " id="inputPassword2" placeholder="Faite une recherche">
          </div>
          <button  class="btn btn-primary mb-2 " style="background-color:rgb(14,118,205);">Trouver</button>
        </form>
        <hr style="background-color:rgb(14,118,205); border:2px solid rgb(14,118,205);">
    <div class="row">
        <?php 
          $count=$db->prepare("SELECT count(id) AS records FROM cour ");
          $count->setFetchMode(PDO::FETCH_ASSOC);
          $count->execute();
          $tcount=$count->fetchAll();
          $recordsOnPage = 2;
          $pagesNumber = ceil($tcount[0]['records']/$recordsOnPage);
          
          @$p = $_GET['pages']; 
          $start = ($p-1)*$recordsOnPage;
          $myqwery=$db->prepare("SELECT * FROM cour ORDER BY id DESC LIMIT $start, $recordsOnPage");
          $myqwery->execute();
          foreach($myqwery->fetchAll(PDO::FETCH_OBJ) as $token):    
        ?>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
             <a href="detail_trainings?id=<?=$token->id;?>"><div class="col-md-12"> 
            <div class="row">
                <div class="col-md-3">
              <img src="./admin/images/<?= $token->image;?>" class="card-img-top" alt="...">
              </div>
              <div class="col-md-9">
               <h5 style="font-weight:bold;"><?=$token->cour_title;?></h5>
               <div style="font-size: 12px"> <?=$token->status;?></div>
              </div>
            </div>
           
            </div>
          </div></a>
        </div>
      </div>
     <?php endforeach ?>
    </div>
    <br>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <?php for ($i=1; $i <= $pagesNumber; $i++) { 
        ?>
        <li class="page-item"><a class="page-link" href="?pages=<?=$i;?>"><?=$i?></a></li>
        <?php } ?>
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
  </nav>
  </div>
    </div>
    <div class="col-md-2" style="background-color:white;">
      <br>
      <figure class="ads">
            <div class="sliderCaroussel">
              <div id="img">
                  <a class="twitter-timeline" href="https://twitter.com/ezechiel_kawede" data-widget-id="275430111547887616" style="width: 50px; height: 50px;">Tweets by finds</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
              </div>
            </div>
          </figure>
    </div>
  </div>
</div>
<br>

<?php include ('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

  <script>
    $('.updateTranslation').click(function() {
      $(this).parent().parent().children().each(function() {

        if ($(this).is('[data-lang]')) {
          $(`#${$(this).attr('data-lang')}TransUpdate`).val(
            $(this).html().trim()
          );
        }

        if ($(this).is('[data-key]')) {
          $(`#keyTransUpdate`).val($(this).attr('data-key'));
          $(`#idTransUpdate`).val($(this).attr('data-id'));
        }

        $('#exampleModal3').modal('show');
      });
    });
  </script>