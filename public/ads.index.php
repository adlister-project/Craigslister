<?php
require '../bootstrap.php';

if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
    if(Auth::attempt($_REQUEST['username'], $_REQUEST['password'])){
        var_dump($_SESSION);
    }
}


?>
<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/uikit.almost-flat.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/uikit.min.js"></script>
        <title>ads index</title>
    </head>
    <body>
        <?php include '../views/partials/navbar.php' ?>   
        <div class="uk-width-medium-2-4 uk-container-center">
            <form class="uk-search" id="form1" method="post" data-uk-search>
            <input class="uk-search-field" type="search" placeholder="Search">
            </form>
            <button type="submit" form="form1" value="Submit">Submit</button>
        </div>
            <hr class="uk-grid-divider">

        <div class="uk-panel uk-panel-box uk-width-1-1 uk-container-center uk-text-center">
            <div class="uk-container-center uk-container">
                <div class="uk-grid" data-uk-grid="{gutter: 20}">
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x100">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x120">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x175">
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid="{gutter: 20}">
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x175">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x130">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x90">
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid="{gutter: 20}">
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x350">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x350">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x350">
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid="{gutter: 20}">
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x200">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x200">
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel uk-panel-box">
                            <img src="http://placehold.it/350x200">
                        </div>
                    </div>
                </div>
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

        
        <?php include '../views/partials/footer.php' ?>
        <?php include 'js/js_include.php' ?>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
    </html>