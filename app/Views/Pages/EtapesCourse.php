<main id="main" class="main">
  
  <!-- Table with hoverable rows -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Les Etapes de la Course <?= $id_course ?></h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Longueur en km</th>
                  <th scope="col">NB coureurs/equipe</th>
                  <th scope="col">Rang etape</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                
                <?php foreach ($etapes as $etape): ?>
                <tr>
                  <th scope="row"><?= $etape['id_etape'] ?></th>
                  <td><?= $etape['nom'] ?></td>
                  <td><?= $etape['longueur_km'] ?></td>
                  <td><?= $etape['nb_coureur'] ?></td>
                  <td><?= $etape['rang_etape'] ?></td>
                  <td><a class=" btn btn-primary" href="#">Choisir des Participants</a></td>
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