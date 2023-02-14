<?php
    include '../vendor/autoload.php';
    use Config\Database;
    use App\Product;
    
    $checkBoxs = $_POST['delete'];
    if(isset($_POST['buttonDelete'])){
        if(!empty($checkBoxs)){
            foreach ($checkBoxs as $checkBox){
                $database = new Database();
                $db = $database->getConn();
                $delete = new Product($db);
                $delete->id = $checkBox;
                $delete->deleteProduct();
            }
        header("Location: ../index.php");
    }else{
        header("Location: ../index.php");
    }
    };
