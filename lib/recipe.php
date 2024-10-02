<?php

function getRecipeById(PDO $pdo, int $id){
$query = $pdo->prepare("SELECT*FROM recipes WHERE id=:id");
$query -> bindparam(':id',$id, PDO::PARAM_INT);
$query->execute();
return $query->fetch();
}

function getRecipeImage (string|null $image) {

    if ($image === null){
       return _ASSETS_IMG_PATH_.'recipe_default.jpg';
      } else {
        return _RECIPES_IMG_PATH_.$image;
      }  
}

function getRecipes(PDO $pdo, int $limit=null){
  $sql = 'SELECT * FROM recipes ORDER BY id DESC';

  if($limit){
    $sql.=' LIMIT :limit';
  }

  $query = $pdo->prepare($sql);

  if($limit) {
  $query -> bindparam(':limit',$limit, PDO::PARAM_INT);
  }

  $query->execute();
  return $query->fetchAll();
}

function saveRecipe(PDO $pdo, int $category, string $title, string $description, string $ingredients, string $instrcutions, string|null $image){
  $sql = "INSERT INTO `recipes` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL,:category_id, :title, :description, :ingredients, :instructions, :image);";
  $query = $pdo -> prepare($sql);
  $query -> bindparam(':category_id',$category, PDO::PARAM_INT);
  $query -> bindparam(':title' ,$title, PDO::PARAM_STR);
  $query -> bindparam(':description' ,$description, PDO::PARAM_STR);
  $query -> bindparam(':ingredients' ,$ingredients, PDO::PARAM_STR);
  $query -> bindparam(':instructions' ,$instrcutions, PDO::PARAM_STR);
  $query -> bindparam(':image' ,$image, PDO::PARAM_STR);
  return $query-> execute();
}