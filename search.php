<?php

$pdo_conn = new PDO("mysql:host=localhost;dbname=aga_db","kawede@1","180012@#%&Ab");
const ROW_PER_PAGE = 1;

$search_keyword = isset($_GET['search_keyword'])
    ? $_GET['search_keyword']
    : '';

$per_page_html = '';

if ($search_keyword) {
    $sql = 'SELECT * FROM cour WHERE cour_title LIKE :keyword OR Prix LIKE :keyword OR status LIKE :keyword OR id LIKE :keyword';

    $page = 1;
    $start = 0;
    if (!empty($_GET["page"])) {
        $page = $_GET["page"];
        $start = ($page - 1) * ROW_PER_PAGE;
    }
    $limit = " limit " . $start . "," . ROW_PER_PAGE;
    $pagination_statement = $pdo_conn->prepare($sql);
    $pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pagination_statement->execute();

    $row_count = $pagination_statement->rowCount();

    if (!empty($row_count)) {
        $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
        $page_count = ceil($row_count / ROW_PER_PAGE);
        if ($page_count > 1) {
            $link = $_SERVER['REQUEST_URI'] . '&page=';
            for ($i = 1; $i <= $page_count; $i++) {
                $uri = $link . $i;
                if ($i == $page) {
                    $per_page_html .= '<a href="' . $uri . '" class="btn-page current">' . $i . '</a>';
                } else {
                    $per_page_html .= '<a href="' . $uri . '"  class="btn-page">' . $i . '</a>';
                }
            }
        }
        $per_page_html .= "</div>";
    }

    $query = $sql . $limit;
    $pdo_statement = $pdo_conn->prepare($query);
    $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
    $pdo_statement->execute();
    $results = $pdo_statement->fetchAll(\PDO::FETCH_ASSOC);
}

?>

<?php include ('mains/header.php'); ?>
<div class="col-sm-12 bg-white">
  <div class="row">
    <div class="col-md-8">
       <br>
    <table class="table table">
      <thead>
        <tr style="background-color: rgb(23,48,88);color:white;">
          <th scope="col"></th>
            <th scope="col" class="text-left"><i class="fa fa-circle" aria-hidden="true" style="color:rgb(21,170,213); font-size:10px;"></i> <?= t('welcome')?></th>   
          </tr>
        </thead>
    </table>
      <p class="text-left" style="color:black; font-weight: bold;"><i class="fa fa-arrow-right" aria-hidden="true" style="color:rgb(21,170,213);"></i>  Formations</p>
        <form class="search form-inline" autocomplete="off" action="search" method="GET">
          <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only"></label>
            <input type="search" style="background-color:white;" required="" class="form-control" name="search_keyword" value="<?= $search_keyword ?>" placeholder="Rechercher ici">
          </div>
          <button  class="btn btn mb-2" style="background-color: rgb(23,48,88); color: white; font-weight: bold;">Trouver</button>
        </form>
        <hr>
        <br>
  <?php
    if (isset($results)) :
        echo "<p>${row_count} resultats trouvés</p>";
        foreach ($results as $row) :
    ?> 
      
    <div class="row">
     
     <div class="card">
          <div class="card-body">
             <a href="detail_trainings?id=<?=$row['id'];?>"><div class="col-md-12"> 
            <div class="row">
                <div class="col-md-3">
              <img src="admin/images/<?= $row['image'];?>" class="card-img-top" alt="...">
              </div>
              <div class="col-md-9">
               <div style="font-weight:bold;"> <?= $row['cour_title'];?></div>
               <div>  <?= $row['status'];?></div>
              </div>
            </div>
           
            </div>
          </div></a>
        </div>

        </div>
       
      </div>
       <?php
        endforeach;
        // echo '</div>' . $per_page_html;
    endif;
    ?>
 <?php include("mains/menu_right_training.php"); ?>
</div>
  </div>
    </div>

  </div>
</div>
<br>
<br>



<?php include ('mains/footer.php'); ?>