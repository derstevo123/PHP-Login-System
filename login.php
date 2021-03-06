<?php 
    //Allow the config
    define('___CONFIG___', true);
    require_once "inc/config.php" 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow">
    <title>Pagetitle</title>
    <base href="/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />
</head>
<body>
<div class="uk-section uk-container">
    <h2>Login</h2>
        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
            <form class="uk-form-stacked js-login">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="email"  required="required" placeholder="email@email.com">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="password" required="required" placeholder="Your Password">
                    </div>
                    <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none'>
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button uk-button-default" type="submit">Login</button>
                </div>
            </form>
        </div>

    </div>

    <?php require_once "inc/footer.php"; ?> 
</body>
</html>
