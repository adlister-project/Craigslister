<?php 
require '../bootstrap.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Craigslister</title>
        <link rel="stylesheet" href="css/uikit.almost-flat.min.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php include '../views/partials/navbar.php' ?>
        <div class="uk-container-center uk-container">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="ads.create.php">Create Ad</a></li>
                        <li class="uk-active">Edit Ad</li>
                    </ul>
                </div>
                <div class="uk-width-1-1">
                    <article class="uk-article">
                        <h1 class="uk-article-title">Edit Ad</h1>
                    </article>
                </div>
                <div class="uk-grid" >
                    <div class="uk-width-1-1">
                        <form class="uk-form uk-form-stacked" method='POST'>
                            <legend>Edit, Add, or Delete Information</legend>
                            <fieldset data-uk-grid-margin>
                                <div class="uk-form-rom">
                                    <label class="uk-form-label" for="title">Ad Title</label>
                                    <input class="uk-form-width-large" type='text' value='' id="title" name="adTitle">
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="description">Ad Description</label>
                                    <textarea class="uk-form-width-large" value='' name='description' id="description" rows="5"></textarea>
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="Price">Price</label>
                                    <input type='number' value='' name="price" id="price" min="0.01" step="0.01" max="99999999.99">
                                </div>                                
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_1">Ad Keyword 1</label>
                                    <input type='text' value='' name="keyword_1" id="keyword_1">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_2">Ad Keyword 2</label>
                                    <input type='text' value='' name="keyword_2" id="keyword_2">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_3">Ad Keyword 3</label>
                                    <input type='text' value='' name="keyword_3" id="keyword_3">
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-form-file uk-text-primary">
                                        Upload a Picture
                                    </div>
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <button type="submit" class="uk-button uk-button-primary">Submit</button>
                                    <button type="reset" class="uk-button uk-button-danger">Reset</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../views/partials/footer.php' ?>
        <?php include 'js/js_include.php' ?>
        <script src="js/main.js"></script>
    </body>
</html>