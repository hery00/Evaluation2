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
                    <form method="post" action="<?= base_url('importcsv') ?>" enctype="multipart/form-data">
                    <input type="file" name="fichier">
                    <button type="submit">Importer</button>
                </form>

                  </div>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </section>
</main>