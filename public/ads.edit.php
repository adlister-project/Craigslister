<?php

require '../bootstrap.php';


function pageController($dbc)
{
    $categoryResults = Ad::getAllCategories();

    foreach ($categoryResults as $category) {
        $categories[] = $category['category'];
    }
    var_dump($categories);

    if(isset($_GET['ad-id'])) {
        $oneAd = Ad::adWithAllFields($_GET['ad-id']);
    } else {
        header("Location: ads.index.php");
        die();
    }

    $ad = $oneAd->getAttributes();
    // $ad['price'] = '$' . number_format($ad['price'], 2, '.', ',');
    $keywords = array_values($ad['keywords']);

    var_dump($ad);

    return array (
        'ad' => $ad,
        'categories' => $categories,
        'keywords' => $keywords
    );
}

extract(pageController($dbc));

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Craigslister</title>
        <link rel="shortcut icon" href="img/icon.png">
        <link rel="stylesheet" href="css/uikit.almost-flat.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/adsedit.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/uikit.min.js"></script>
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
                                    <input class="uk-form-width-large" type='text' value="<?= $ad['title'] ?>" id="title" name="adTitle">
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="description">Ad Description</label>
                                    <textarea class="uk-form-width-large" value='' name='description' id="description" rows="5"><?= $ad['description'] ?></textarea>
                                </div>
                                <div class="uk-form-row uk-form-horizontal uk-form-icon">
                                    <label class="uk-form-label" for="Price">Price</label>
                                    <i class="uk-icon-usd"></i>
                                    <input type='number' value='<?= $ad['price'] ?>' name="price" id="price" min="0.01" step="0.01" max="99999999.99">
                                </div>                           
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_1">Ad Keyword 1</label>
                                    <input type='text' <?php if(isset($keywords[0])): ?> value='<?= $keywords[0] ?>' <?php endif ?> name="keyword_1" id="keyword_1">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_2">Ad Keyword 2</label>
                                    <input type='text' <?php if(isset($keywords[1])): ?> value='<?= $keywords[1] ?>' <?php endif ?> name="keyword_2" id="keyword_2">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_3">Ad Keyword 3</label>
                                    <input type='text' <?php if(isset($keywords[2])): ?> value='<?= $keywords[2] ?>' <?php endif ?> name="keyword_3" id="keyword_3">
                                </div>
                                <div class="uk-button-dropdown" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
                                    <button class="uk-button">Category <i class="uk-icon-caret-down"></i></button>
                                    <div class="uk-dropdown uk-dropdown-bottom" style="top: 30px; left: 0px;">
                                        <ul class="uk-nav uk-nav-dropdown">
                                            <?php foreach($categories as $category): ?>
                                            <li><a href="#"><?= $category ?></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <?php foreach($ad['image_urls'] as $adImage): ?>
                                    <a href="" class="uk-close"></a>
                                    <a class="uk-thumbnail" href="<?= $adImage ?>"><img src="<?= $adImage ?>" width="200" height="100" alt=""></a>
                                    
                                    <?php endforeach ?>
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