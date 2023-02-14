<?php
    use Config\Database;
    use App\Product;

    if($productType == 'Dvd'){
        $height = $width = $length = $weight = 0;
    }elseif ($productType == 'Furniture'){
        $size = $weight = 0;
    }else{
        $height = $width = $length = $size = 0;
    }
    // Create New Database connection
    $database = new Database();
    $db = $database->getConn();
    // create new product Oject
    $create = new Product($db);
    // Declear Data
    $create->sku = $sku;
    $create->name = $name;
    $create->price = $price;
    $create->productType = $productType;
    $create->size = $size;
    $create->height = $height;
    $create->width = $width;
    $create->length = $length;
    $create->weight = $weight;
    // Create Product after validate 
    $create->createProduct();

    header("Location: ../index.php");

?>