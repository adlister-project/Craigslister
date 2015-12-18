<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Craigslister</title>
        <link rel="stylesheet" href="css/uikit.almost-flat.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/uikit.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
        <style type="text/css">
            .currencyinput{border: 1px inset #ccc;}
        </style>
    </head>
    <body>
        <?php include '../views/partials/navbar.php' ?>
        <div class="uk-container uk-container-center">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li class="uk-active">Create Ad</li>
                        <li><a href="ads.edit.php">Edit Ad</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-1">
                    <article class="uk-article">
                        <h1 class="uk-article-title">Create New Ad</h1>
                    </article>
                </div>
                <div class="uk-grid" >
                    <div class="uk-width-1-1">
                        <form class="uk-form uk-form-stacked" method='POST' id='ad-create'>
                            <fieldset data-uk-grid-margin>
                            <legend>Fill out title, description, keywords, and upload a picture</legend>
                                <div class="uk-form-rom">
                                    <label class="uk-form-label" for="title">Ad Title</label>
                                    <input class="uk-form-width-large" type='text' placeholder='Title' id="title" name="adTitle">
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="description">Ad Description</label>
                                    <textarea class="uk-form-width-large" placeholder='Description' name='description' id="description" rows="5"></textarea>
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="Price">Price</label>
                                    <i class="fa fa-usd"></i>
                                    <input class="uk-form-width-small" type='number' placeholder='Price' name="price" id="price" min="0.01" step="0.01" max="99999999.99">
                                </div>                                
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_1">Ad Keyword 1</label>
                                    <input type='text' placeholder='Keyword #1' name="keyword_1" id="keyword_1">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_2">Ad Keyword 2</label>
                                    <input type='text' placeholder='Keyword #2' name="keyword_2" id="keyword_2">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <label class="uk-form-label" for="keyword_3">Ad Keyword 3</label>
                                    <input type='text' placeholder='Keyword #3' name="keyword_3" id="keyword_3">
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    Upload Picture <i class="uk-icon-image"></i>
                                    <div class="uk-form-file uk-text-primary">
                                        <input type="file">
                                    </div>                                    
                                </div>
                                <div class="uk-form-row uk-form-horizontal">
                                    <button type="submit" class="uk-button uk-button-primary"><i class="uk-icon-check"></i> Submit</button>
                                    <button type="reset" class="uk-button uk-button-danger"><i class="uk-icon-remove"></i> Reset</button>
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
        <script>
            $(document).ready(function() {
                $('#title').on('input', function(){
                    var input = $(this);
                    var isName = input.val();
                    if(isName) {
                        input.removeClass('uk-form-danger').addClass('uk-form-success');
                    } else {
                        input.addClass('uk-form-danger').removeClass('uk-form-success');
                    }
                });
                $('#description').keyup(function (event){
                    var input = $(this);
                    var description = input.val();
                    if(description) {
                        description.removeClass('uk-form-danger').addClass('uk-form-success');                        
                    } else {
                        description.addClass('uk-form-danger').removeClass('uk-form-success');
                    }
                });
            });
        </script>
    </body>
</html>