<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>DDoS-Defender</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

        <!-- Le styles -->
        <link href="/tpl/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/tpl/style.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 16%;
                background-color: #f5f5f5;
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
                <?php
                if (isset($this->e_mess))
                    echo '<div class="alert alert-error">' . $this->e_mess . '</div>';
                ?>

                <h2 class="form-signin-heading"><?= $this->LANG['AUTH'] ?></h2>
                <input type="text" name="login" class="input-block-level" placeholder="<?= $this->LANG['LOGIN'] ?>">
                <input type="password" name="password" class="input-block-level" placeholder="<?= $this->LANG['PASSWORD'] ?>">
                <button class="btn btn-large btn-primary" name="auth" type="submit"><?= $this->LANG['SINGIN'] ?></button>
            </form>

        </div> <!-- /container -->


    </body>
</html>