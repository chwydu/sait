<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/get_reply.php';

$data = $_POST;


    if (isset($data['do_add'])) {
    
        if (empty($errors)){
            $train = R::dispense('train');
            $train -> training = $data['training'];
            $train -> day = $data['day'];
            $train -> data = $data['data'];
            $train -> idtrainer = $data['idtrainer'];
            $train -> trainername = $data['trainername'];
            $train -> price = $data['price'];

           R::store($train);
            echo '<div style="color: green;"> Вы добавили новый товар </div><hr>';
        }else {
            echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
        }
    }


    if (isset($data['remove'])) {
        $link = mysqli_connect('localhost', 'mysql', 'mysql', 'yakuza2');
        $del = 'DELETE FROM `train` WHERE `id`='. $data['remove'];
        $result = mysqli_query($link, $del);
print_r($del);
}
?>
<?php
//отоборажение таблицы
    $suppliers = getSuppliers();
?>
<div>
  <div class="table-responsive">
<table class="table">
<tr><th colspan="5"><h3 class="mb-20%">Товары</h3></th></tr>
<tr>
<th width="10%">id</th>
<th width="20%">название</th>
<th width="10%">фирма</th>
<th width="15%">страна</th>
<th width="15%">количество</th>
<th width="10%">Цена</th>




</tr>

<?php

foreach ($suppliers as $supplier):
?>
<tr>
<td><?php echo $supplier['id']; ?></td>
<td><?php echo $supplier['training']; ?></td>
<td><?php echo $supplier['day']; ?></td>
<td><?php echo $supplier['trainername']; ?></td>
<td><?php echo $supplier['idtrainer']; ?></td>
<td><?php echo $supplier['price']; ?></td>

<td><form action="/admin/admin_panel.php" method="POST">
<button class="btn btn-danger" name="remove" value="<?= $supplier['id'] ?>">Удалить</button>

</form>
</td>
<td>
<button type="button" class="btn btn-success"href="/projectcar.php">Добавить</button></td>
</tr>
<?php
endforeach;;
?>

<tr>
<td colspan="5">
<?php
if (isset($_SESSION['shopping_cart'])):
if (count($_SESSION['shopping_cart']) > 0):
?>
<a href="#" class="button"></a>
<?php endif; endif; ?>
</td>
</tr>
</table>
</div>
<?php if($_SESSION['logged_user'] -> admin == '1'):?>
<form action="/admin/admin_panel.php" class="container d-flex mt-5 signupleo align-items-center mx-auto justify-content-center" method="POST">
    <h5></h5>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">Название </label>
        <input required type="text" class="form-control" name="training" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['training'];?>"">
    </div>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">страна</label>
        <input required type="text" class="form-control" name="day" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['day'];?>"">
    </div>
   
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">фирма</label>
        <input required type="text" class="form-control" name="idtrainer" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['idtrainer'];?>"">
    </div>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">количество</label>
        <input required type="text" class="form-control" name="trainername" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['trainername'];?>"">
    </div>
    <div class="form-group col-3">
        <label for="exampleInputEmail1"style="font-family:Calibri">Цена</label>
        <input required type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp value="<?php echo @$data['price'];?>"">
    </div>
    <button type="submit" name="do_add" class=" btn btn-primary"> Добавить товар </button>
    <?php echo $log; ?>
</form>
<form action="/functions/get_reply.php"  class="d-flex container " method="post">
    <button name="train" class=" btn btn-primary"> Скачать отчетность об отсутствующих товарах Excel </button>
</form>
<?php else: ?>
<div class="align-items-center mx-auto justify-content-center">
</div>
<?php endif; ?>

<!--<p>-->
<!--    <p>Введите название товара</p>-->
<!--    <input type="text" name="training">-->
<!--</p>-->
<!--<p>-->
<!--    <p>Выберите категорию</p>-->
<!--    <input type="text" name="day" value="--><?php //echo @$data['day'];?><!--">-->
<!--</p>-->
<!--<p>-->
<!--<button type="submit" name="do_add"> Add new product </button>-->
<!--    --><?php //echo $log; ?>
<!--</form>-->