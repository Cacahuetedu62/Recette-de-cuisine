<?php
define('_RECIPES_IMG_PATH_', 'uploads/recipes/');
?>

<?php

    $recipes = [
        ['title' => 'mousse au chocolat', 'description' => 'uhuhuhuhuh', 'image' => '1-chocolate-au-mousse'],
        ['title' => 'Moussaka', 'description' => 'Tsteeeee2', 'image' => '2-gratin-dauphinois'],
        ['title' => 'Tarte à la fraise', 'description' => 'LALALALLLA1', 'image' => '3-salade'],
    ];

include('templates/header.php')

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
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
        </div>
      </div>
    </div>
  </div>

<div class="row">



<?php 
foreach ($recipes as $key => $recipe){?>

<div class="col-md-4">
        <div class="card">

            <img src="<?=_RECIPES_IMG_PATH_.$recpie['image'];?>  " class="card-img-top"  alt="...">


            <div class="card-body">
                <h5 class="card-title">     <?=$recipe['title'];?>   </h5>
                <p class="card-text">   <?=$recipe['description'];?>    </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>

            </div>
        </div>
    </div>

<?php } ?>


</div>

<?php 
include('templates/footer.php')
?>
    
