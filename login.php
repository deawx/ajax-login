<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/signup-form.css" type="text/css" />

</head>
<body>
<div class="container">
    <div class="signin-form">

        <div class="container">


            <form class="form-signin" method="post" id="login-form">

                <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />

                <div id="error">
                    <!-- error will be shown here ! -->
                </div>

                <div class="form-group">
                    <input type="test" class="form-control" placeholder="Username" name="username" id="username" />
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                </div>

                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                    </button>
                </div>
                <div style="padding: 20px;"><a href="index.php">Sign Up</a></div>

            </form>

        </div>

    </div>

</div>


<script src="assets/jquery-3.1.1.min.js"></script>
<script src="assets/jquery.validate.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="assets/auth.js"></script>

</body>
</html>