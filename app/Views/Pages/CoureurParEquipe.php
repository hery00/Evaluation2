<main id="main" class="main">


<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">lISTE DE VOS COUREURS</h5>
            <form id="choixForm" action="<?base_url('/coureur/equipe') ?>" method="GET">
              <select class="form-control" id="options" name="idcategorie">
              <option value="">Selectionner Categorie</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
                <option value="3">Junior</option>
                <option value="4">Senior</option>
              </select>
            </form>
    <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom du Coureur</th>
                  <th scope="col">Numéro de Dossard</th>
                  <th scope="col">Genre</th>
                  <th scope="col">Date de Naissance</th>
                  <th scope="col">Équipe</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($coureurs as $coureur): ?>
                <tr>
                  <form action="<?= base_url('') ?>" method="get">
                    <td><?= $coureur['id_coureur'] ?></td>
                    <td><?= $coureur['coureur_nom'] ?></td>
                    <td><?= $coureur['numero_dossard'] ?></td>
                    <td><?= $coureur['genre'] ?></td>
                    <td><?= $coureur['date_naissance'] ?></td>
                    <td><?= $coureur['equipe_nom'] ?></td>
                    <td><?= $coureur['categorie_nom'] ?></td>
                    <td><button type="button" class="btn btn-primary choose-participants" data-coureur="<?= $coureur['id_coureur'] ?>">Choisir</button></td>
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

<script>
$(document).ready(function() {
  $('#options').change(function() {
    // Mettre à jour la valeur de idcourse avec la valeur actuelle

    // Soumettre le formulaire
    $('#choixForm').submit();
  });
});
</script>