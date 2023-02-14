<?php 
    include './vendor/autoload.php';
    use App\Validation;

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productType = $_POST['productType'];
    $size = $_POST['size'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $weight = $_POST['weight']; 
    // All Inputs value declare in validation.php
    $validate = new Validation;
    $validate->inputName("sku")->inputValue($sku)->is_string()->is_empty();
    $validate->inputName("name")->inputValue($name)->is_string()->is_empty();
    $validate->inputName("price")->inputValue($price)->is_num()->is_empty();

    if($productType == 'Dvd'){
        $validate->inputName("size")->inputValue($size)->is_num()->is_empty();

    }elseif ($productType == 'Furniture'){
        $validate->inputName("height")->inputValue($height)->is_num()->is_empty();
        $validate->inputName("width")->inputValue($width)->is_num()->is_empty();
        $validate->inputName("length")->inputValue($length)->is_num()->is_empty();
    }elseif ($productType == "Book"){
        $validate->inputName("weight")->inputValue($weight)->is_num()->is_empty();
    }

