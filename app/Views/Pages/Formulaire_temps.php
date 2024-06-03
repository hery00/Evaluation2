<main id="main" class="main">
  <!-- Table with hoverable rows -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Formulaire de saisie de temps</h5>
            <form id="participationForm" action="<?= base_url('/') ?>" method="POST">
              <div class="form-group">
                <label for="id_etape">ID Étape</label>
                <input type="text" class="form-control" id="id_etape" name="id_etape" required>
              </div>
              <div class="form-group">
                <label for="id_coureur">ID Coureur</label>
                <input type="text" class="form-control" id="id_coureur" name="id_coureur" required>
              </div>
              <div class="form-group">
                <label for="id_equipe">ID Équipe</label>
                <input type="text" class="form-control" id="id_equipe" name="id_equipe" required>
              </div>
              <div class="form-group">
                <label for="heure_arrivee">Heure Arrivée</label>
                <input type="text" class="form-control" id="heure_arrivee" name="heure_arrivee" required>
              </div>
              <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
