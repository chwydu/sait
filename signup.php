<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    $data = $_POST;
    if(isset($data['do_signup'])) {

        if (trim($data['login']) == '') {
            $errors[] = 'Введите свой login';
        }
        if ($data['password'] == '') {
            $errors[] = 'Введите свой пароль';
        }
        if ($data['password2'] != $data['password']) {
            $errors[] = 'Пользователь с таким password уже существует';
        }
        if (R::count('users', 'login = ?', array($data['login'])) > 0) {
            echo $errors[] = "Пользователь с таким login уже существует";
        }
        if (R::count('users', 'email = ?', array($data['email'])) > 0) {
            echo $errors[] = "\nПользователь с таким email уже существует";
        }
        if (empty($errors)) {
            //registration
            $user = R::dispense('users');
            $user-> login = $data['login'];
            $user-> email = $data['email'];
            $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user-> name = $data['name'];
            $user-> lastname = $data['lastname'];
            R::store($user);
            echo '<div style="color: green;"> Вы были зарегестрированы </div><hr>';
        }else {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<form action="/signup.php" method="post" class="container mt-5 d-flex signupleo align-items-center mx-auto justify-content-center">
    <form>
        <h5 style="font-family:Calibri">Регистрация</h5>
        <div class="col-3 d-flex justify-content-center mt-3">
            <a href="login.php">У вас уже есть аккаунт</a>
        </div>
        <div class="form-group col-3">
            <label for="exampleInputEmail1" style="font-family:Calibri">Login</label>
            <input  required type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['login'];?>">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-3">
            <label for="exampleInputEmail1"style="font-family:Calibri">Password</label>
            <input required type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['password'];?>">
            <small id="emailHelp" class="form-text text-muted">.</small>
        </div>
        <div class="form-group col-3">
            <label for="exampleInputPassword1"style="font-family:Calibri">Confirm password</label>
            <input required type="password" class="form-control" name="password2" id="exampleInputPassword1" value="<?php echo @$data['password2'];?>">
        </div>
        <div class="form-group col-3">
            <label for="exampleInputEmail1"style="font-family:Calibri">Name</label>
            <input required type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['name'];?>">
            <small id="emailHelp" class="form-text text-muted">.</small>
        </div>
        <div class="form-group col-3">
            <label for="exampleInputEmail1"style="font-family:Calibri">Lastame</label>
            <input required type="text" class="form-control" name="lastname" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$data['lastname'];?>">
            <small id="emailHelp" class="form-text text-muted">.</small>
        </div> 
        <div class="form-group col-3">
            <label for="exampleInputEmail1"style="font-family:Calibri">E-mail</label>
            <input required type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['email'];?>"">
            <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="do_signup"> Confirm </button>
        </div>
       
    </form>
</form>

