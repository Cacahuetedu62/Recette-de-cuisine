<?php
require_once('lib/config.php');
require_once('lib/pdo.php');
$currentPage = basename($_SERVER['SCRIPT_NAME']);




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini site de Studi || Recettes de cuisine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/override-bootstrap.css">


    <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="assets/images/logo-cuisinea-horizontal.jpg" height="40" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></img>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">

        <?php foreach ($mainMenu as $key => $value){?>

          <li class="nav-item"> <a href="<?=$key;?>" class="nav-link <?php if($currentPage === $key) {echo'active';}?>"> <?=$value;?> </a></li> <?php

          }?>

      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
      </div>
    </header>
  </div>

</head>