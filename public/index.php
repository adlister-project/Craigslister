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
        <style type="text/css">
            #back-cover {background-image: url('img/couch_sale.jpg');} 
            .text-white{color: white;}
            .text-blue{color: blue;}
        </style>
    </head>
    <body>
        <div id='back-cover' class="uk-cover-background">
        <?php include '../views/partials/navbar.php' ?>
            <div class="uk-container uk-container-center">
                <div class="uk-block">
                    <article>
                        <h1 class="uk-article-title text-white">What isn't in Craigs'Lists?</h1>
                        <h4 class="uk-article-lead text-blue">We are Carigs' List of Lists. Buy, sell, trade, barter, you can find it all here! Have notifications sent directly to your phone so you never miss a sale. Now accepting BitCoin and other cryptocurrencies.</p>
                    </article>
                </div>
            </div>
            <hr class="uk-grid-divider">
            <div class="uk-container-center">
                <div class="uk-grid data-uk-grid uk-container-center">
                    <div class="uk-width-medium-1-3">
                        <a class="uk-thumbnail uk-overlay-hover" href="#">
                            <figure class="uk-overlay">
                                <img src="http://placehold.it/350x250" alt="300x110" data-src="holder.js/350x250/auto" data-holder-rendered="true">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">For SALE!!</div>
                            </figure>
                            <div class="uk-thumbnail-caption">List Keyword!!</div>
                        </a>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <a class="uk-thumbnail uk-overlay-hover" href="#">
                            <figure class="uk-overlay">
                                <img src="http://placehold.it/350x250" alt="300x110" data-src="holder.js/350x250/auto" data-holder-rendered="true">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">For SALE!!</div>
                            </figure>
                            <div class="uk-thumbnail-caption">List Keyword!!</div>
                        </a>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <a class="uk-thumbnail uk-overlay-hover" href="#">
                            <figure class="uk-overlay">
                                <img src="http://placehold.it/350x250" alt="300x110" data-src="holder.js/350x250/auto" data-holder-rendered="true">
                                <div class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">For SALE!!</div>
                            </figure>
                            <div class="uk-thumbnail-caption">List Keyword!!</div>
                        </a>
                    </div> 
                </div>
            </div>
        </div>
        <?php include '../views/partials/footer.php' ?>

        <?php include 'js/js_include.php' ?>
    </body>
</html>