<?php
    require_once('templates/header.php');
    require_once('lib/recipe.php');
    require_once('lib/tools.php');
    require_once('lib/category.php');


    $errors = [];
    $messages = [];
    $recipe = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'ingredients' => $_POST['ingredients'],
        'instructions' => $_POST['instructions'],
        'category_id' => $_POST['category'],
    ];

    $categories = getCategories($pdo);


if(isset($_POST['saveRecipe']))  {
    $fileName = null;

if(isset($_FILES['file']['tmp_name']) && $_FILES ['file']['tmp_name'] !=''){
    $checkImage = getimagesize($_FILES['file']['tmp_name']);
    if ($checkImage !== false) {


$fileName = uniqid()."-".slugify($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'],_RECIPES_IMG_PATH_.$fileName);

    } else {
        $errors[] = 'le fichier doit être une image';
    }
}

    if (!$errors) {
        $res = saveRecipe($pdo, $_POST['category'], $_POST['title'],$_POST['description'],$_POST['ingredients'],$_POST['instructions'], $fileName);
    if($res) 
    {
$messages[] = 'la recette à bien été sauvergardée';

} else {

$errors[]= 'la recette n\'a pas été sauvergardée';

}
}
}

?>

<H1>Ajouter une recette</H1>

<?php foreach ($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
<?php } ?>



<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="title" class="from-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?=$recipe['title'];?>">
    </div>

    <div class="mb-3">
        <label for="description" class="from-label" >Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?=$recipe['description'];?></textarea>
    </div>

    <div class="mb-3">
        <label for="ingredients" class="from-label" >Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control"><?=$recipe['ingredients'];?></textarea>
    </div>

    <div class="mb-3">
        <label for="instructions" class="from-label" >Instructions</label>
        <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control"><?=$recipe['instructions'];?></textarea>
    </div>

    <div class="mb-3">
        <label for="category" class="from-label" >Catégories</label>
        <select name="category" id="category" class="form-select">

            <?php foreach ($categories as $category) {?>
                <option value="<?=$category['id'];?>" <?php if ($recipe['category_id']==$category['id']) {echo 'selected="selected"';}    ?>  ><?=$category['name']?></option>
                <?php } ?>

    </div>

    <div class="mb-3">
    <label for="file" class="from-label" >Image</label>
    <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="enregistrer" name="saveRecipe" class="btn btn-primary">
</form>


<?php 
require_once('templates/footer.php')
?>
    