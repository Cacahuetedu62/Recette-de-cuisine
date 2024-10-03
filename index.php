<?php
require_once('templates/header.php');

$recipes = getRecipes($pdo, _HOME_RECIPES_LIMIT_);
?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="/assets/images/logo-cuisinea.jpg"  alt="Bootstrap Themes" width="400" height="300">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">          
        <a href="recettes.php" class="btn btn-primary">Voir nos recettes</a>
        </div>
      </div>
    </div>
  </div>


<div class="row">

<?php foreach ($recipes as $key => $recipe){
  include('templates/recipe_partial.php');  
 } ?>

</div>

<?php 
require_once('templates/footer.php')
?>
    
