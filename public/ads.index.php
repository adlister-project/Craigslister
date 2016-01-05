<?php

require '../bootstrap.php';

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    if(Auth::attempt($_REQUEST['username'], $_REQUEST['password'])){
        var_dump($_SESSION);
    }
}

function pageController($dbc)
{
    $categoryResults = Ad::getAllCategories();

    foreach ($categoryResults as $category) {
        $categories[] = $category['category'];
    }
    var_dump($categories);

    
    if(isset($_GET['cat'])) {
        $ads = Ad::sortByCategory($_GET['cat']);
    } else {
        $ads = Ad::allAds();
    }

    foreach($ads as $key => $ad) {
        $ads[$key]['price'] = '$' . number_format($ad['price'], 2, '.', ',');
    }
    var_dump($ads);

    return array (
        'ads' => $ads,
        'categories' => $categories
    );
}

extract(pageController($dbc));

?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Ads Index</title>
        <link rel="shortcut icon" href="img/icon.png">
        <link rel="stylesheet" type="text/css" href="css/uikit.almost-flat.min.css">
        <link rel="stylesheet" type="text/css" href="css/components/slidenav.almost-flat.min.css">
        <link rel="stylesheet" type="text/css" href="css/components/slideshow.almost-flat.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/adsindex.css">
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/uikit.min.js"></script>
    </head>
    <body>
        <?php include '../views/partials/navbar.php' ?>   
        <div class="uk-width-medium-2-4 uk-container-center">
            <form class="uk-search" id="form1" method="post" data-uk-search>
            <input class="uk-search-field" type="search" placeholder="Search">
            </form>
            <button type="submit" form="form1" value="Submit" class="uk-button uk-button-primary">Submit</button>
        </div>
            <hr class="uk-grid-divider">
        <div class="uk-grid">
            <div class="uk-panel uk-panel-box uk-width-1-10 uk-container sidebar">
                <h3 class="uk-panel-title">Categories</h3>
                <?php foreach($categories as $category): ?>
                <ul>
                    <li><a href="?cat=<?= strtolower($category) ?>"><?= $category ?></a></li>
                </ul>
                <?php endforeach ?>
            </div>
            <div class="uk-panel uk-panel-box uk-width-8-10 uk-container-center uk-text-center">
                
                <div class="uk-container-center uk-container">
                    <div class="uk-grid" data-uk-grid="{gutter: 20}">
                        <?php foreach($ads as $ad): ?>
                        <?php $temp = array_values($ad['image_urls']) ?>
                        <?php if(!is_null($temp[0])): ?>
                        <div class="uk-width-1-3">
                            <div class="uk-panel uk-panel-box">
                                <?= $ad['title'] ?>
                                
                                <div class="uk-slidenav-position" data-uk-slideshow>
                                    <ul class="uk-slideshow">
                                    <?php foreach($ad['image_urls'] as $adImage): ?>
                                        <li><a href="ads.show.php?ad-id=<?= $ad['id'] ?>"><img src="<?= $adImage ?>" alt="<?= $ad['title'] . ' - ' . $ad['description'] ?>"></a></li>
                                    <?php endforeach ?>
                                    </ul>
                                    <?= $ad['price'] ?>
                                    <?php var_dump(count($ad['image_urls'])) ?>
                                    <?php if(count($ad['image_urls']) > 1): ?>
                                    <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                                    <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>  
                        <?php endforeach ?>
                    </div>
               
                <div class="uk-grid" data-uk-grid="{gutter: 20}">
                    <div class="uk-width-1-1">
                        <ul class="uk-pagination" data-uk-pagination="{items:1000, itemsOnPage:12, currentPage:50}">
                            <li><a href="#page-1" data-page="0">1</a></li>
                            <li><span>...</span></li>
                            <li><a href="#page-48" data-page="47">48</a></li>
                            <li><a href="#page-49" data-page="48">49</a></li>
                            <li><a href="#page-50" data-page="49">50</a></li>
                            <li class="uk-active"><span>51</span></li>
                            <li><a href="#page-52" data-page="51">52</a></li>
                            <li><a href="#page-53" data-page="52">53</a></li>
                            <li><a href="#page-54" data-page="53">54</a></li>
                            <li><span>...</span></li>
                            <li><a href="#page-100" data-page="99">100</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <?php include '../views/partials/footer.php' ?>
        <?php include 'js/js_include.php' ?>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
    </html>