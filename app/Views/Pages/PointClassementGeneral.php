<main id="main" class="main">
<section class="section">
    <div class="row">
      <div class="col-lg-12">
           
        <div class="card col-lg-12">
          <div class="card-body">
            <h5 class="card-title"> Classement  general</h5>
            
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">Nom de l'Etape</th>
                        <th scope="col">Nom de l'Équipe</th>
                        <th scope="col">Longueur</th>
                        <th scope="col">Nb coureur</th>
                        <th scope="col">Rang etape</th>
                        <th scope="col">Coureur</th>
                        <th scope="col">Numero Dossard</th>
                        <th scope="col">Chronos</th>
                        <th scope="col">Rang</th>
                        <th scope="col">Points</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classements as $classement) : ?>
                        <tr>
                           
                            <td><?php echo $classement['etape_nom']; ?></td>
                            <td><?php echo $classement['equipe_nom']; ?></td>
                            <td><?php echo $classement['longueur_km']; ?></td>
                            <td><?php echo $classement['nb_coureur']; ?></td>
                            <td><?php echo $classement['rang_etape']; ?></td>
                            <td><?php echo $classement['coureur_nom']; ?></td>
                            <td><?php echo $classement['numero_dossard']; ?></td>
                            <td><?php echo $classement['chronos']; ?></td>
                            <td><?php echo $classement['rang']; ?></td>
                            <td><?php echo $classement['points']; ?></td>
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