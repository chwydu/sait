<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

$data = $_POST;
if (isset($data['do_login'])) {
    $user = R::findOne('users', 'login = ?', array($data['login']));
    //verify pass & login
    if ($user) {
        if (password_verify($data['password'], $user -> password)){
            //all good - login
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;"> Вы были авторизрованы.<br/> Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
        }else {
            echo $errors[] = 'Password is not correct';
        }
    } else{
        $errors[] = 'User with that login not found';
    }
    if (! empty($errors)) {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>

<form action="login.php" method="post" class="container mt-5 d-flex signupleo align-items-center mx-auto justify-content-center">
    <h5></h5>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">Логин</label>
        <input  required type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['login'];?>">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">Пароль</label>
        <input  required type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['password'];?>">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
<!--    <p>-->
<!--        <p><strong>Login</strong>:</p>-->
<!--        <input type="text" name="login" value="--><?php //echo @$data['login'];?><!--">-->
<!--    </p>-->
<!--    <p>-->
<!--        <p><strong>Password</strong>:</p>-->
<!--        <input type="password" name="password" value="--><?php //echo @$data['password'];?><!--">-->
<!--    </p>-->
<!--    <p>-->
<!--        <button type="submit" name="do_login">Confirm</button>-->
<!--    </p>-->
    <div class="col-3 d-flex justify-content-center"><button type="submit" class="btn btn-primary mr-3" name="do_login"> Confirm </button></div>
</form>
