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
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="ads.create.php">Create Ad</a></li>
                        <li class="uk-active">Edit Ad</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="uk-grid-divider">

        <?php include '../views/partials/footer.php' ?>
        <?php include 'js/js_include.php' ?>
        <script src="js/main.js"></script>
    </body>
</html>