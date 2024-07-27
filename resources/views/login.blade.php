<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SPK - Profile Matching</title>

    <!-- Bootstrap core JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/9f2ac9fd56.js"></script>
    <script src="js/bootstrap-password-toggler.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
     
    </style> 
  </head>
  <body class="text-center">
    @if ($errors->any())
        <div class="alert alert-warning alert-message">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <form class="form-signin" method="post" action="{{ url('/login') }}" role="form">
        @csrf
        <img class="mb-4" src="{{ asset('assets/images/logo-himatik.jpeg') }}" alt="">
        <h1 class="h4 mb-3 font-weight-normal">SPK - Profile Matching</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <span>&nbsp;</span>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <span>&nbsp;</span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> 
    </form>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(".alert-message").alert().delay(3000).slideUp('slow');
    </script>
  </body>
</html>
