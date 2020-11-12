<?php
$link = mysqli_connect('localhost', 'mysql', 'mysql', 'yakuza2');

function displayProducts(){
    $link = mysqli_connect('localhost', 'mysql', 'mysql', 'yakuza2');
    $result = mysqli_query($link, "SELECT * FROM `train`") or die(mysqli_error($link));
    mysqli_close($link);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getSuppliers(){
    $link = mysqli_connect('localhost', 'mysql', 'mysql', 'yakuza2');
    $result = mysqli_query($link, "SELECT * FROM `train`") or die(mysqli_error($link));
    mysqli_close($link);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
   
       
function getCategories(){
    $link = mysqli_connect('localhost', 'mysql', 'mysql', 'yakuza2');
    $result = mysqli_query($link, "SELECT * FROM `category`") or die(mysqli_error($link));
    mysqli_close($link);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addToCart(){

}