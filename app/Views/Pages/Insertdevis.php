
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page d'Accueil</title>
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link href="<?= base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Entreprise BTP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#pricing">Tarification</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-primary btn-lg" href="<?= base_url('formcontroller/choix_login')?>" role="button">Se connecter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-4">Bienvenue chez ER Agency</h1>
    <p class="lead">Nous sommes spécialisés dans la construction et la rénovation de votre maison.</p>
  </div>
</div>

<div id="pricing" class="container">
<hr/>
  <h1 class="text-center mb-4">Nos Tarifs</h1>
  <!-- Ajoutez ici vos options de tarification -->
</div>
<form class="container" method="get" action="<?= base_url('clientcontroller/insertdevis')?>">
<div class="row">
<div class="col-lg-4"></div>
<div class="container col-lg-4" style="margin-bottom:50px;">
  <div class="form-group">
    <input type="date" class="form-control" id="date_debut" name="date_debut">
  </div>
</div>
<div class="col-lg-4"></div>
<div class="col-lg-4"></div>
<div class="container col-lg-4" style="margin-bottom:50px;">
  <div class="form-group">
    <select class="form-control" id="exampleSelect" name="idfinition">
      <option value="">Choisir...</option>
      <?php foreach ($finitions as $finition): ?>
      <option value="<?= $finition['id_finition'] ?>"><?= $finition['type_finition'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="col-lg-4"></div>
    </div>
    <div class="row text-center">
          <?php foreach ($maisons as $maison): ?>
              <div class="col-lg-4">
                      <div class="card plan-card">
                          <div class="card-block">
                              <div class="pt-3 pb-3">
                                  <h1><i class="fa fa-plane plan-icon"></i></h1>
                                  <h6 class="text-uppercase text-primary"><?= $maison['type_maison'] ?></h6>
                              </div>
                              <div class="plan-features pb-3 mt-3 text-muted padding-t-b-30">
                                  <p><?= $maison['description_maison'] ?></p>
                                  <input type="radio" name="id_maison" value="<?= $maison['id_maison'] ?>" class="btn btn-primary"> Sélectionner
                              </div>
                          </div>
                      </div>
              </div>
      <?php endforeach; ?>
    </div>
    <div class="row" style="margin-bottom:200px;">
    <div class="col-lg-4"></div>
            <button type="submit" class="btn  col-lg-4 btn-primary">Valider</button>
    <div class="col-lg-4"></div>
    </div>
</form>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

