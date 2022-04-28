<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
    <base href="{{ asset('').'employee/' }}">
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google fonts -->
    <link href="dist/css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1>Đăng Nhập</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Login</h2>
                    <form method="POST" role="form">
                        @csrf
                        <fieldset>
                            <div class="input-group">
                                <span><i class="fas fa-user" aria-hidden="true"></i></span>
                                <input type="email" name="email" placeholder="Username or Email" value="{{ old('email') }}" >
                               
                            </div>
                           {!! show_error($errors,'email') !!}
                            <div class="input-group">
                                <span><i class="fas fa-key" aria-hidden="true"></i></span>
                                <input type="password" placeholder="Password" name="password">
                            </div>
                            {!! show_error($errors,'password') !!}
                            @if(session("thongbao"))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session("thongbao") }}</strong>
                                </div>
                            @endif
                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </fieldset>
                      
                    </form>

                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
        <!-- footer -->
        <div class="footer">

        </div>
        <!-- footer -->
    </div>

    <!-- fontawesome v5-->
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/fontawesome.js"></script>

</body>

</html>