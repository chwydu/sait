<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions/functions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
 $product_ids = array();
//check if button have been submitted

    if (isset($_SESSION['shopping_cart'])){
        $count = count($_SESSION['shopping_cart']);
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_POST, 'id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array(
                'id' => filter_input(INPUT_POST, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }else{
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_POST, 'id')){
                    // добавить кол-во товаров к сущ-му товару в корзине
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
    } else{
        $_SESSION['shopping_cart'][0] = array(
            'id' => filter_input(INPUT_POST, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
    if(filter_input(INPUT_POST, 'action') == 'delete'){
        foreach ($_SESSION['shopping_cart'] as $key => $product){
            if ($product['id'] == filter_input(INPUT_POST, 'id')){
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        // reset session
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }
?>
<?php // корзина ?>
<div style="clear: both"></div>
<br/>
<div class="table-responsive col-9">
    <table class="table">
        <tr><th colspan="5"><h3>Order Detail</h3></th></tr>
        <tr>
            <th width="40%">Product Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>

        <?php
        if (!empty($_SESSION['shopping_cart'])):
            $total = 0;
            foreach ($_SESSION['shopping_cart'] as $key => $product):
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                    <td>
                        <a href="all_products.php?action=delete&id=<?php echo $product['id'] ?>">
                            <div class="btn-danger">Remove</div>
                        </a>
                    </td>
                </tr>
                <?php
                $total = $total + ($product['quantity'] * $product['price']);
            endforeach;;
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total, 2) ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <?php
                    if (isset($_SESSION['shopping_cart'])):
                        if (count($_SESSION['shopping_cart']) > 0):
                            ?>
                            <a href="#" class="button">Checkout</a>
                        <?php endif; endif; ?>
                </td>
            </tr>
        <?php endif; ?>
    </table>
</div>
<div class="container">
        <div class="">
            <div class="">
                <h1> All products <p></p></h1>
            </div>

            <?php
            //отоборажение товаров
            $products = displayProducts();
            ?>
            <?php foreach ($products as $product): ?>
                <form action="all_products.php?action=add&id=<?php echo $product['id'] ?>" class="computer-item mb-4" method="post">
                    <input hidden name="id" value="<?=$product['id']?>">
                    <div class="row">
                        <input hidden name="name" value="<?=$product['product']?>">
                        <h2 class="mb-3"><?=$product['product']?></h2>
                    </div>
                    <div class="row">
                        <div class="col-4"><img class="img-thumbnail" src="<?=$product['img']?>" alt="" /></div>
                        <div class="col-8"><p><?=$product['description']?></p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <?php if ($product['available'] == true): ?>
                            <input hidden name="price" value="<?=$product['price']?>">
                            <span> In stock </span>
                            <input type="number" name="quantity" class="col-2 mb-2 ml-2" value="1" />
                            <button class="btn btn-primary ml-3" name="add_to_cart" type="submit"> Add to cart <?=$product['price'] . '$'?></button>
                        <?php else: ?>
                            <span> Out of stock </span>
                        <?php endif; ?>
                    </div>
                </form>
                <hr/>
            <?php endforeach; ?>
        </div>
</div>

