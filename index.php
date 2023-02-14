<?php
    include './vendor/autoload.php';
    use Config\Database;
    use App\Product;
    
    $page_title = "Product List";
    require_once './layouts/header.php';
?>

<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <div class="logo">
            <a class="navbar-brand" href="./index.php">
                <?php echo isset($page_title) ? $page_title : "Product Page" ?>
            </a>
        </div>
        <div class="menu">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-light" href="./add-product.php" style="margin-right: 10px;">ADD</a>
                    </li>
                    <li class="nav-item">
                        <!-- Mass Delete redirect to ./config/delete.php -->
                        <input id="delete-product-btn" class="btn btn-light" type="submit" name="buttonDelete" form="product_delete" value="MASS DELETE">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Start Body -->
<div class="container text-center " style="margin-top: 100px;">
    <form id="product_delete" action="./config/delete.php" method="POST">
        <div class="row">
            <?php
            // Get Products Fro database using php PDO
            $database = new Database();
            $db = $database->getConn();
            $productsObj = new Product($db);
            $stmt = $productsObj->getProducts();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // print_r($products);
            foreach($products as $product){
            ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card" style="width: 18em;">
                    <div class="checkbox">
                            <input class="delete-checkbox" type="checkbox" name="delete[]" value="<?php echo $product['id']; ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Pro. SUK : <?php echo $product['sku']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Name : <?php echo $product['name']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Price : <?php echo $product['price']; ?> <span style='color:#212529;'>$</span></h6>
                        <?php
                            // check what kind of product type is ... 
                            $size = $product['size'];
                            $height = $product['height'];
                            $width = $product['width'];
                            $length = $product['length'];
                            $weight = $product['weight'];
                            if ($size) {
                                echo "<h6 class='card-subtitle mb-2 text-muted'>size : {$size} <span style='color:#212529;'>MB</span></h6>";
                            } elseif ($height && $width && $length) {
                                echo "<h6 class='card-subtitle mb-2 text-muted'>Dimention : {$height}x{$width}x{$length} <span style='color:#212529;'>CM<sup>3</sup></span></h6>";
                            } else {
                                echo "<h6 class='card-subtitle mb-2 text-muted'>Weight : {$weight} <span style='color:#212529;'>KG</span></h6>";
                            }
                        ?>
                    </div>
                </div>
                
            </div>
            <?php
                }
            ?>
        </div>
    </form>
</div>
<!-- End Body -->

<?php require_once './layouts/footer.php' ?>