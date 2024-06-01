<main id="main" class="main">
  <div class="col-lg-4"></div>
  <div class="container col-lg-4"><a class=" btn btn-primary" href="<?= base_url('clientcontroller/newdevis') ?>">Nouveau devis</a></div>
  <div class="col-lg-4"></div>
  <!-- Table with hoverable rows -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
       
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">List des devis</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date Devis</th>
                  <th scope="col">ID Maison</th>
                  <th scope="col">Type Maison</th>
                  <th scope="col">Type Finition</th>
                  <th scope="col">Date Début</th>
                  <th scope="col">ID Finition</th>
                  <th scope="col">ID Client</th>
                  <th scope="col">Num Téléphone</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                
                <?php foreach ($devis as $devis_client): ?>
                <tr>
                  <th scope="row"><?= $devis_client['id_devis'] ?></th>
                  <td><?= $devis_client['date_devis'] ?></td>
                  <td><?= $devis_client['id_maison'] ?></td>
                  <td><?= $devis_client['type_maison'] ?></td>
                  <td><?= $devis_client['type_finition'] ?></td>
                  <td><?= $devis_client['date_debut'] ?></td>
                  <td><?= $devis_client['id_finition'] ?></td>
                  <td><?= $devis_client['id_client'] ?></td>
                  <td><?= $devis_client['num_telephone'] ?></td>
                  <td><a class=" btn btn-primary" href="<?= base_url('clientcontroller/devisdetails')?>?id_devis=<?= $devis_client['id_devis'] ?>">Voir detail</a></td>
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
