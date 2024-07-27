<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <script src='{{ asset('js/fontawesome.js') }}'></script>
    <!-- Bootstrap core CSS -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- DataTable -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
   
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

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
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

  </head>
  <body>
    {{-- navbar --}}
    <x-navbar></x-navbar>
  <div class="container-fluid">
    <div class="row">
      {{-- sidebar --}}
      <x-sidebar></x-sidebar>
      
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">     
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div> 
        <div class="table-responsive">
          {{-- main content goes here --}}
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>      
  </body>
</html>
