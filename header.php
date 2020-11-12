<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
?>

<link rel="stylesheet" href="/Views/front.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<header style="width: 95%;">
    <nav class="navbar navbar-expand-sm" style="background-color: transparent;">
        <h5 class="navbar-brand size"style="font-family:Calibri" href="#">AAROONS</h5>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/card.php">Карты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/uslugi.php"></a>
                </li>
                </li>
                <?php if($_SESSION['logged_user'] -> admin == '1'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/admin_panel.php" style="color: red;">Admin Panel</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedull.php" style="color: red;">Расписание</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products/all_products.php"></a>
                </li>
                <?php if ( isset($_SESSION['logged_user'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" type="button"> <?php echo $_SESSION['logged_user'] -> login; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="/logout.php" type="button">Выйти</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary nav-link" href="/signup.php">Войти</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?php
    $categories = getCategories();
    ?>
    <div class="row p-2 text-center">
        <?php foreach ($categories as $category): ?>
        <div class="col"><a href="<?php echo '/categories.php' . '?' . $category['id']; ?>"><?=$category['category']?></a></div>
        <? endforeach; ?>
    </div>
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
