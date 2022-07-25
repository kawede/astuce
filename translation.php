<?php
include('admin/includes/_base.php');
function selfRedirect()
{
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit();
}

if (isset($_POST['newTranslation'])) {
  $data = $_POST;
  unset($data['newTranslation']);

  $keys = array_keys($data);
  $fields = '`' . implode('`, `', $keys) . '`';

  #here is my way
  $placeholders = substr(str_repeat('?,', count($keys)), 0, -1);

  $statement = $db->prepare("INSERT INTO `translations`($fields) VALUES($placeholders)")
    ->execute(array_values($data));

  selfRedirect();
}

if (isset($_POST['updateTranslation'])) {
  $data = $_POST;
  $id = $data['id'];
  unset($data['updateTranslation'], $data['id']);

  $keys = array_keys($data);
  $fields = implode('=?, ', $keys) . '=?';

  $payload = array_merge(array_values($data), [$id]);
  $sql = "UPDATE `translations` SET $fields WHERE id=?";
  //exit(var_dump($payload, $sql));
  $st = $db->prepare($sql)->execute($payload);

  selfRedirect();
}

if (isset($_POST['deleteTranslation'])) {
  $db->exec("DELETE FROM `translations` WHERE id = " . $_POST['id']);
  selfRedirect();
}

if (isset($_POST['deleteLocale'])) {
  $db->exec("DELETE FROM `locale` WHERE id = " . $_POST['id']);
  $db->exec("ALTER TABLE translations DROP COLUMN " . $_POST['cca2']);
  selfRedirect();
}

if (isset($_POST['newLocale'])) {
  $ps = $db->prepare("INSERT INTO locale(label,cca2) VALUES(:label, :cca2) ");
  $statement = $ps->execute(array(
    ':label'   =>  $_POST['label'],
    ':cca2'    =>  $_POST['cca2']
  ));

  $db->exec("ALTER TABLE translations ADD COLUMN " . $_POST['cca2'] . " TEXT");

  selfRedirect();
}

if (isset($_GET['locale'])) {
  $myqwery = $db->prepare("SELECT * from locale WHERE cca2 = ?");
  $myqwery->execute([$_GET['locale']]);
  $locale = $myqwery->fetch(PDO::FETCH_OBJ);

  if ($locale) {
    $_SESSION['locale'] = $locale;
    selfRedirect();
  }
}

$myqwery = $db->prepare("SELECT * from locale ORDER by id ASC");
$myqwery->execute();
$locales = $myqwery->fetchAll(PDO::FETCH_OBJ);

$myqwery = $db->prepare("SELECT * from translations");
$myqwery->execute();
$translations = $myqwery->fetchAll(PDO::FETCH_OBJ);

$currentLocale = isset($_SESSION['locale'])
  ? $_SESSION['locale']
  : (count($locales) ? $locales[0] : null);

function t($key)
{
  global $currentLocale, $translations;

  foreach ($translations as $element) {
    if ($key == $element->key) {
      return $element->{$currentLocale->cca2};
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Translations</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-3">
    <?php if ($currentLocale) : ?>
      <div class="dropdown mb-5">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $currentLocale->label ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php foreach ($locales as $locale) : if ($currentLocale->id != $locale->id) : ?>
              <a class="dropdown-item" href="?locale=<?= $locale->cca2 ?>">
                <?= $locale->label ?>
              </a>
          <?php endif;
          endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="col-md-12">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Nouvelle langue
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <form method="POST" class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nouvelle langue</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class=" form-group">
                <input type="text" name="label" class="form-control" required="" placeholder="Label">
              </div>
              <div class="form-group">
                <input type="text" name="cca2" class="form-control" required="" placeholder="Cca2">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="newLocale" class="btn btn-primary" value="Save changes">
            </div>
          </form>
        </div>
      </div>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        Nouvelle traduction
      </button>
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <form method="POST" class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nouvelle traduction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <input type="text" name="key" class="form-control" required placeholder="Key">
              </div>
              <?php foreach ($locales as $locale) : ?>
                <div class="form-group">
                  <input type="text" name="<?= $locale->cca2 ?>" class="form-control" required="" placeholder="<?= mb_convert_case($locale->label, MB_CASE_TITLE) ?>">
                </div>
              <?php endforeach ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="newTranslation" class="btn btn-primary" value="Save changes">
            </div>
          </form>
        </div>
      </div>


      <div class="row">
        <div class="table-responsive col-sm-3">
          <table class="table table-sm table-bordered mt-5">
            <thead>
              <tr class="gradeX">
                <th>#</th>
                <th>LABEL</th>
                <th>CCA2</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($locales as $key => $locale) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= strtoupper($locale->label); ?></td>
                  <td><?= strtoupper($locale->cca2); ?></td>

                  <td class="btn-group">
                    <form method="POST">
                      <input type="hidden" name="id" value="<?= $locale->id ?>">
                      <input type="hidden" name="cca2" value="<?= $locale->cca2 ?>">
                      <input type="submit" name="deleteLocale" value="Delete" class="btn btn-danger btn-sm text-uppercase ml-2">
                    </form>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive col-sm-9">
          <table class="table table-sm table-bordered mt-5">
            <thead>
              <tr class="gradeX">
                <th>#</th>
                <th>KEY</th>
                <?php foreach ($locales as $locale) : ?>
                  <th><?= strtoupper($locale->label); ?></th>
                <?php endforeach ?>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($translations as $key => $translation) : ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td data-key="<?= $translation->key ?>" data-id="<?= $translation->id ?>"><?= $translation->key ?></td>
                  <?php foreach ($locales as $locale) : ?>
                    <td data-lang="<?= $locale->cca2 ?>">
                      <?= $translation->{$locale->cca2} ?? '' ?>
                    </td>
                  <?php endforeach ?>
                  <td class="btn-group"><input type="button" value="Modifier" class="btn btn-primary btn-sm text-uppercase updateTranslation" />
                    <form method="POST">
                      <input type="hidden" name="id" value="<?= $translation->id ?>">
                      <input type="submit" name="deleteTranslation" value="Delete" class="btn btn-danger btn-sm text-uppercase ml-2">
                    </form>
                  </td>
                </tr>
              <?php
              endforeach;
              ?>
            </tbody>
          </table>
        </div>

        <div class="card p-5">
        <!--   <div class="card-header">UTILISATION DE NOTRE TRADUCTEUR</div> -->
          <div class="card-body">
            <p class="h1"><?= t('salut') ?></p>
            <p class="h1"><?= t('welcome')?></p>
            <p class="h1"><?= t('formation')?></p>
            <p class="h1"><?= t('accueil1')?></p>
            <p class="h1"><?= t('about')?></p>
            <p class="h1"><?= t('demander1')?></p>
            <p class="h1"><?= t('apprenez')?></p> 
            <p class="h1"><?= t('accompagnement')?></p>
            <p class="h1"><?= t('session')?></p>
            <p class="h1"><?= t('formateur')?></p> 
            <p class="h1"><?= t('seminaire')?></p>
            <p class="h1"><?= t('methodes')?></p> 
            <p class="h1"><?= t('autonome')?></p>  
            <p class="h1"><?= t('virtuel')?></p>
            <p class="h1"><?= t('ApprentissagePhysique')?></p>  
            <p class="h1"><?= t('classevirtuelle')?></p>
            <p class="h1"><?= t('bureau')?></p>
            <p class="h1"><?= t('choix')?></p>
            <p class="h1"><?= t('zoom')?></p>  
            <p class="h1"><?= t('live')?></p>
            <p class="h1"><?= t('wedo')?></p>
            <p class="h1"><?= t('Marketing')?></p>
            <p class="h1"><?= t('marketindescription')?></p> 
            <p class="h1"><?= t('Abonnement')?></p> 
            <p class="h1"><?= t('subscriptionAb')?></p> 
            <p class="h1"><?= t('successTraining')?></p>
            <p class="h1"><?= t('Temoignages')?></p>   
            <p class="h1"><?= t('sayins')?></p> 
            <p class="h1"><?= t('Formationsvirtuelles12')?></p>
            <p class="h1"><?= t('Requestform')?></p>
            <p class="h1"><?= t('Titre1')?></p>
            <p class="h1"><?= t('Entrer')?></p>
            <p class="h1"><?= t('InformationT')?></p>
            <p class="h1"><?= t('IPersonnelle')?></p>
            <p class="h1"><?= t('nomcomplet')?></p>
            <p class="h1"><?= t('enterfullname')?></p>
            <p class="h1"><?= t('Adresse')?></p> 
            <p class="h1"><?= t('adressfield')?></p>  
            <p class="h1"><?= t('Vadresse')?></p>
            <p class="h1"><?= t('Genre')?></p> 
            <p class="h1"><?= t('Selectionner')?></p>
            <p class="h1"><?= t('Masculin')?></p> 
            <p class="h1"><?= t('Feminin')?></p> 
            <p class="h1"><?= t('Adresseemail')?></p>
            <p class="h1"><?= t('votreadresse')?></p>
            <p class="h1"><?= t('Phonenumber')?></p>
            <p class="h1"><?= t('enterPn')?></p>
            <p class="h1"><?= t('assisted')?></p>
            <p class="h1"><?= t('Online')?></p>  
            <p class="h1"><?= t('Inperson')?></p>
            <p class="h1"><?= t('Bethe1')?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <form method="POST" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification traduction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="idTransUpdate">
          <div class="form-group">
            <input type="text" name="key" id="keyTransUpdate" class="form-control" required placeholder="Key">
          </div>
          <?php foreach ($locales as $locale) : ?>
            <div class="form-group">
              <input type="text" id="<?= $locale->cca2 ?>TransUpdate" name="<?= $locale->cca2 ?>" class="form-control" required="" placeholder="<?= mb_convert_case($locale->label, MB_CASE_TITLE) ?>">
            </div>
          <?php endforeach ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="updateTranslation" class="btn btn-primary" value="Save changes">
        </div>
      </form>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</body>

</html>