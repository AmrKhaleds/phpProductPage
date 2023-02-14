<?php
    $page_title = "Product Add ";
    require_once './layouts/header.php';
    require_once './config/validate.php';
    
?>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="./index.php" style="font-size: 30px;font-weight: bold;">
                    <?php echo isset($page_title) ? $page_title : "Product Page" ?>
                </a>
            </div>
            <div class="menu">
                <div class="menu-links">
                    <ul class="navbar-nav">
                        <li class="link">
                            <!-- <button type="submit" form="product_form" class="btn btn-light" name="submit">Save</button> -->
                        <input class="btn btn-light" type="submit" name="submit" form="product_form" value="Save">
                        </li>
                        <li class="link">
                            <a class="nav-link delete-checkbox" href="./index.php">Cancel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <?php // Get Errors
        if(isset($_POST['submit'])){
            if(empty($validate->getErrors())){
                require_once './config/storeProduct.php';
            }else{
                foreach($validate->getErrors() as $error){

                    $html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" . $error . "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    echo $html;
                }
            }
        }
        
    ?>
        
    <!-- Start Body -->
    <div class="container text-center ">
        <form id="product_form" method="POST">
            <h1 style="margin-top: 5px;color: #41464c;">Add New Product</h1>
            <hr>
            <div class="row">
                <!-- SKU field -->
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">SKU</span>
                        </div>
                        <input id="sku" name="sku" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                </div>
                <!-- Name field -->
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                        </div>
                        <input id="name" name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                </div>
                <!-- Price field -->
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Price ($)</span>
                        </div>
                        <input id="price" name="price" type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                    </div>
                </div>
            </div>
            <!-- Type Switcher field -->
            <div class="row">
                <div class="input-group col-4 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="productType">Type Switcher</label>
                    </div>
                    <select class="custom-select" id="productType" name="productType" required>
                        <option selected disabled value="">Choose...</option>
                        <option value="Dvd">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
            </div>
            <!-- Forms changed automaticlly when type switcher field change => switcher.js-->
            <div id="typeForm"></div>
        </form>
    </div>
    <!-- End Body -->

<?php 
    $newJS = "<script src='./assets/js/switcher.js'></script>";
    require_once './layouts/footer.php';
?>
