<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <style>
            #flashMessage{
                color: red;
                font-size: 14pt;
            }
        </style>






    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">LOGIN
           <?php echo $this->Session->flash(); ?>
            </div>
            <form action="<?php echo DOMAINAD.'login/login'; ?>" method="post" name="image" id="AdministratorIndexForm" accept-charset="utf-8">
                <input type="hidden" name="_method" value="POST">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="data[Administrator][name]" id="AdministratorName" class="form-control" placeholder="Username"/>
                        <input type="hidden" name="data[Administrator][redirect_url]" value="" id="AdministratorRedirectUrl">
                    </div>
                    <div class="form-group">
                        <input type="password" name="data[Administrator][password]" id="AdministratorPassword" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember Me
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block">Login</button>

                    <p><a href="#">Lost password?</a></p>

                </div>
            </form>

            <div class="margin text-center">
                <br/>
            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="http://almsaeedstudio.com/AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
