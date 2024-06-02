<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course</title>
  <!-- CSS Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<main id="main" class="main">
  
  <!-- Table with hoverable rows -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card col-mg-1">
          <div class="card-body">
            <h5 class="card-title">
            
              Les Etapes de la Course <?= $id_course ?>
              <div class="form-group">
              <label for="options">Categorie:</label>
              <form id="choixForm" action="<?= base_url('/listetapescourse') ?>" method="GET">
                <input type="hidden" name="idcourse" id="idcourse" value="<?= $id_course ?>">
                <select class="form-control" id="options" name="idcategorie">
                  <option value="1">Choisir une Categorie</option>
                  <option value="1">Homme</option>
                  <option value="2">Femme</option>
                  <option value="3">Junior</option>
                  <option value="4">Senior</option>
                </select>
              </form>
            </div>
          </h5>
            <table class="table table-hover">
              <thead>
                <tr>
                    <th scope="col">ID Etape</th>
                    <th scope="col">Nom Etape</th>
                    <th scope="col">Longueur (km)</th>
                    <th scope="col">Nombre de Coureurs</th>
                    <th scope="col">Rang Etape</th>
                    <th scope="col">ID Course</th>
                    <th scope="col">ID Catégorie</th>
                    <th scope="col">Nom Catégorie</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($etapes as $e): ?>
                        <tr>
                        <form method="get" action="#">
                        <th scope="row"><?= $e['id_etape'] ?></th>
                            <td><?= $e['nom_etape'] ?></td>
                            <td><?= $e['longueur_km'] ?></td>
                            <td><?= $e['nb_coureur'] ?></td>
                            <td><?= $e['rang_etape'] ?></td>
                            <td><?= $e['id_course'] ?></td>
                            <td><?= $e['id_categorie'] ?></td>
                            <td><?= $e['nom_categorie'] ?></td>
                            <td><button type="button" class="btn btn-primary choose-participants" data-etape="<?= $e['id_etape'] ?>">Choisir des Participants</button></td>
                        </form>
                        </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>



<!-- JavaScript Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
      $('#options').change(function() {
        var idCourseValue = $('#idcourse').val();
        $('#idcourse').val(idCourseValue);
        $('#choixForm').submit(); // Soumet le formulaire automatiquement lorsque l'option change
      });
    });
  </script>

</body>
</html>
