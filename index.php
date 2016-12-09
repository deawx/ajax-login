<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/signup-form.css" type="text/css" />

</head>
<body>
<div class="container">

    <div class="signup-form-container">

        <!-- form start -->
        <form method="post" role="form" id="register-form" autocomplete="off" action="signup_process.php">

            <div class="form-header">
                <h3 class="form-title"><i class="fa fa-user"></i><span class="glyphicon glyphicon-user"></span> Sign Up</h3>

                <div class="pull-right">
                    <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                </div>

            </div>

            <div class="form-body">

                <!-- json response will be here -->
                <div id="errorDiv"></div>
                <!-- json response will be here -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input name="username" type="text" id="username" class="form-control" placeholder="Username" maxlength="40" autofocus="true">
                    </div>
                    <span class="help-block" id="error"></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input name="full_name" type="text" id="name" class="form-control" placeholder="Name" maxlength="40" autofocus="true">
                    </div>
                    <span class="help-block" id="error"></span>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input name="email" id="email" type="text" class="form-control" placeholder="Email" maxlength="50">
                    </div>
                    <span class="help-block" id="error"></span>
                </div>

                <div class="row">

                    <div class="form-group col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <span class="help-block" id="error"></span>
                    </div>

                    <div class="form-group col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                            <input name="cpassword" type="password" class="form-control" placeholder="Retype Password">
                        </div>
                        <span class="help-block" id="error"></span>
                    </div>

                </div>


            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-info" id="btn-signup">
                    <span class="glyphicon glyphicon-log-in"></span> Sign Me Up
                </button>
            </div>
            <div style="padding: 20px;"><a href="login.php">Login</a></div>


        </form>
    </div>
</div>


<script src="assets/jquery-3.1.1.min.js"></script>
<script src="assets/jquery.validate.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/auth.js"></script>

</body>


</html>