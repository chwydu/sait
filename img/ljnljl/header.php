<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
?>

<link rel="stylesheet" href="/Views/front.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Carousel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/admin/admin_panel.php">товары <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/projectcar.php">вывод в exel</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/staff.php"> таблица<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!--<div class="d-flex blue d-blu flex-column flex-md-row align-items-center p-3 px-md-4  border-bottom shadow-sm">-->
<!--    <h5 class="my-0 size mr-md-auto font-weight-normal">CORONAWAY</h5>-->
<!--    <nav class="my-2 my-md-0 mr-md-3">-->
<!--        <a class="p-2 text-dark" href="/products/all_products.php">Products</a>-->
<!--        <a class="p-2 text-dark" href="/">About us</a>-->
<!--        --><?php //if($_SESSION['logged_user'] -> admin == '1'):?>
<!--        <a class="p-2 text-dark btn-danger" href="/admin/admin_panel.php">Admin Panel</a>-->
<!--        --><?php //endif; ?>
<!--        <a class="p-2 text-dark" href="#">Pricing</a>-->
<!--    </nav>-->
<!--    --><?php //if ( isset($_SESSION['logged_user'])) : ?>
<!--        <p>What's up --><?php //echo $_SESSION['logged_user'] -> login; ?><!--</p><br/>-->
<!--        <a class="btn margins btn-outline-primary" href="/logout.php">Logout</a>-->
<!--    --><?php //else: ?>
<!--        <a class="btn btn-outline-primary" href="/signup.php">Sign up</a>-->
<!--    --><?php //endif; ?>
<!--</div>-->
<?php
//    $categories = getCategories();
//?>
<!---->
<!--<div class="row text-center mb-3 p-2 categories">-->
<?php //foreach ($categories as $category): ?>
<!--    <div class="col"><a href="--><?php //echo '/categories.php' . '?' . $category['id']; ?><!--">--><?//=$category['category']?><!--</a></div>-->
<?// endforeach; ?>
<!---->
<!--</div>-->
