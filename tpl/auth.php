<?php
if (!APP)
    exit('No direct access!');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DDoS-Defender</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

        <!-- Le styles -->
        <link href="/tpl/bootstrap/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 16%;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }

        </style>
        <link href="/tpl/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="/tpl/bootstrap/img/firewall.png">
    </head>

    <body>

        <div class="container">

            <form class="form-signin" method="post">
                <h2 class="form-signin-heading"><?= $LANG['AUTH'] ?></h2>
                <input type="text" name="login" class="input-block-level" placeholder="<?= $LANG['LOGIN'] ?>">
                <input type="password" name="password" class="input-block-level" placeholder="<?= $LANG['PASSWORD'] ?>">
                <label class="checkbox">
                    <input type="checkbox" name="remember-me" value="1"> <?= $LANG['REMEMBER'] ?>
                </label>
                <button class="btn btn-large btn-primary" name="auth" type="submit"><?= $LANG['SINGIN'] ?></button>
            </form>

        </div> <!-- /container -->


    </body>
</html>