<?php include ('mains/header.php'); ?><!-- Class container here -->
  <script>
  document.title=" ITC-Rdc | <?=$data[0]->designation?>"
</script>
 
<div class="col-md-12 bg-white ">
  <div class="row">
    
    <div class="col-md-8">
        <div class="container">
    <br>
    <table class="table table">
      <thead>
        <tr style="background-color: rgb(23,48,88);;color:white;">
          <th scope="col"></th>
            <th scope="col" class="text-left"><i class="fa fa-circle" aria-hidden="true" style="color:rgb(21,170,213); font-size:10px;"></i>  <?= t('welcome')?></th>   
          </tr>
        </thead>
    </table>
      <p class="text-left" style="color:black; font-weight: bold;"><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(21,170,213);"></i>  <?= t('Formationsvirtuelles12')?></p>
       <form class="search form-inline" autocomplete="off" action="search" method="GET">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only"></label>
            <input type="Text" value="<?= isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '' ?>" name="search_keyword" class="form-control search1" required="" placeholder="Faite une recherche de votre choix" style="background-color:white; color: rgb(23,48,88);" class="form-control " id="inputPassword2" placeholder="Faite une recherche">
          </div>
          <button  class="btn btn-primary mb-2 " style="background-color:rgb(23,48,88); border:1px solid rgb(23,48,88);">Trouver</button>
        </form>
        <hr style="background-color:rgb(14,118,205); border:2px solid rgb(23,48,88);">
    <div class="row">
        <?php 
          $count=$db->prepare("SELECT count(id) AS records FROM cour ");
          $count->setFetchMode(PDO::FETCH_ASSOC);
          $count->execute();
          $tcount=$count->fetchAll();
          $recordsOnPage = 4;
          $pagesNumber = ceil($tcount[0]['records']/$recordsOnPage);
          
          @$p = $_GET['pages']; 
          $start = ($p-1)*$recordsOnPage;
          $myqwery=$db->prepare("SELECT *FROM cour  ORDER BY id DESC LIMIT $start, $recordsOnPage");
          $myqwery->execute();
          foreach($myqwery->fetchAll(PDO::FETCH_OBJ) as $token):    
        ?>
      <div class="col-md-6">
        <div class="card mt-2">
          <div class="card-body">
             <a href="detail_trainings?id=<?=$token->id;?>"><div class="col-md-12"> 
            <div class="row">
                <div class="col-md-3">
              <img src="./admin/images/<?= $token->image;?>" class="card-img-top" alt="...">
              </div>
              <div class="col-md-9">
               <h5 style="font-weight:bold;"><?=$token->cour_title;?></h5>
               <div style="font-size: 12px"><?=$token->status;?> </div>
                <div style="font-size:12px;"><?=$token->Prix;?></div>
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
         <!--  <a class="page-link">Precedent</a> -->
        </li>
        <?php for ($i=1; $i <= $pagesNumber; $i++) { 
        ?>
        <li class="page-item"><a class="page-link" href="?pages=<?=$i;?>" style="background-color:rgb(23,48,88); border:1px solid rgb(23,48,88); color:white; font-weight: bold;"><?=$i?></a></li>
        <?php } ?>
          <!-- <a class="page-link" >Suivant</a> -->
        </li>
      </ul>
  </nav>
  </div>
    </div>
   <?php include("mains/menu_right_training.php"); ?>
  </div>
</div>
<br>
<?php include ('mains/footer.php'); ?>