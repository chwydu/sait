<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/get_reply.php';

?>
<?php
//отоборажение таблицы
    $suppliers = getSuppliers();
?>
<div>
  <div class="table-responsive">
<table class="table">
<tr><th colspan="5"><h3>Расписание</h3></th></tr>
<tr>
<th width="10%">id</th>
<th width="20%">тренировка</th>
<th width="10%">дата</th>
<th width="15%">время</th>
<th width="15%">имя тренира</th>
<th width="10%">id тренира</th>
<th width="10%">Цена</th>




</tr>

<?php

foreach ($suppliers as $supplier):
?>
<tr>
<td><?php echo $supplier['id']; ?></td>
<td><?php echo $supplier['training']; ?></td>
<td><?php echo $supplier['data']; ?></td>
<td><?php echo $supplier['day']; ?></td>
<td><?php echo $supplier['trainername']; ?></td>
<td><?php echo $supplier['idtrainer']; ?></td>
<td><?php echo $supplier['price']; ?></td>
</td>
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