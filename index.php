<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app="crud">
<head>
  <meta charset="utf-8">
  <title>Angular JS - CRUD</title>

  <script type="text/javascript" src="assets/js/jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/bootswatch/litera/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/toastr/toastr.min.css">


</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="container">
    <ng-view></ng-view>
  </div>

  <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/angular-js/angular.min.js"></script>
  <script type="text/javascript" src="assets/js/angular-js/angular-route.min.js"></script>

  <?include("assets/js/angular-js/app-js.php");?>
  
  <script type="text/javascript" src="assets/js/toastr/toastr.min.js"></script>
  <script type="text/javascript" src="assets/js/toastr/toastr-init.js"></script>

</body>
</html>
