<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="card">
        <h3 class="card-header">Importation de données</h3>
          <div class="card-body">
            <form action="<?= base_url("importcsv"); ?>" method="POST">
              <div class="col-lg-6">
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Importation Etapes</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="file" name="fichier" id="csv_file" required accept=".csv">
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </section>
</main>