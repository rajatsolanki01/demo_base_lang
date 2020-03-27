<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>404 Page Not Found</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= config_item('base_url');?>assets/error/css/style.css" />
</head>
<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
            </div>
            <h2>404 - Page not found</h2>
            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
            <a href="<?php echo config_item('base_url');?>">Go To Homepage</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>