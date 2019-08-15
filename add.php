<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';

    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>

<?php
require_once 'core/init.php';
//$sql = 'UPDATE products SET title="'. $_GET['editTitleText'] .'", list_price="'. $_GET['editPriceText'] .'", description="'. $_GET['editDescriptionText'] .'", WHERE id="'.$_GET['productId'].'"';
// echo $sql = "INSERT INTO products (title, list_price, description, id)
// VALUES (SET title="' . $_GET['editTitleTextProduct'] . '" , list_price="' . $_GET['editPriceTextProduct']. '", description= "' . $_GET['editDescriptionTextProduct']. '", WHERE id="'. $_GET['productId'] . '")";

//echo $sql = "INSERT INTO products (title, list_price, description, id)
//VALUES ( $_GET['editTitleTextProduct']  ,  $_GET['editPriceTextProduct'] , $_GET['editDescriptionTextProduct'] ,  $_GET['productId'] )";

$title = $_GET['editTitleTextProduct'];
$price = $_GET['editPriceTextProduct'];
$description = $_GET['editDescriptionTextProduct'];
$id = $_GET['productId'];


$sql = "INSERT INTO products (title, list_price, description, id)
VALUES ( '$title'  ,  '$price' , '$description' ,  '$id' )";


// 'INSERT INTO products (title, list_price, description)
// VALUES ($_GET['editTitleTextProduct'], $_GET['editPriceTextProduct'] ,$_GET['editDescriptionTextProduct'] , $_GET['productId'] ';

//'UPDATE products SET title="'. $_GET['editTitleText'] .'", list_price="'. $_GET['editPriceText'] .'", description="'. $_GET['editDescriptionText'] .'", WHERE id="'.$_GET['productId'].'"';

console_log($sql);
if ($db->query($sql) === TRUE) {
    $message = "Record updated successfully: " . $_GET['editTitleTextProduct'];  
    echo '<h2>' . $message . '</h2>'; 
} else {
    $message = "Error updating record: " . $conn->error; 
    echo '<h2>' . $message . '</h2>'; 
}


?>



<!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Salmon Sands Shop</title>
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/main.css" />
        </head>

        <body>


            <nav class="navbar navbar-expand-lg" id="navbar">
                <a id="text1" class="navbar-brand" href="/WebAppIntegration%20Week%2014%20ECommerce%20Site/index.php">Salmon Sands Shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">+</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" id="nav-linkA" href="edit.php">Edit</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="text" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Men
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Shirts</a>
                                <a class="dropdown-item" href="#">Pants</a>
                                <a class="dropdown-item" href="#">Shoes</a>
                                <a class="dropdown-item" href="#">Accessories</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="text" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Women
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Shirts</a>
                                <a class="dropdown-item" href="#">Pants</a>
                                <a class="dropdown-item" href="#">Shoes</a>
                                <a class="dropdown-item" href="#">Accessories</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="text" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Boys
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Shirts</a>
                                <a class="dropdown-item" href="#">Pants</a>
                                <a class="dropdown-item" href="#">Shoes</a>
                                <a class="dropdown-item" href="#">Accessories</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="text" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Girls
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Shirts</a>
                                <a class="dropdown-item" href="#">Pants</a>
                                <a class="dropdown-item" href="#">Shoes</a>
                                <a class="dropdown-item" href="#">Accessories</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="background-image">
                <!-- <div id="image-1"></div>
                    <div id="image-2"></div> -->
            </div>


                
            <div class="FP">
                <h2>Featured Products</h2>
            </div>

            <div class="container">
                    <div class="row">
                        <?php
                            while ($product = mysqli_fetch_assoc($featured)):
                        ?>

                            <?php
                                /*<div class="col-md-3">
                                    <h4><?= $product['title']; ?>
                                    </h4>
                                    <img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" id="images" />
                                    <p class="list-price text-danger">List Price: <s>$<?= $product['price']; ?></s></p>
                                    <p class="price">Our Price: $
                                        <?= $product['list_price']; ?>
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                                </div>*/ 
                            ?>

                    <div class="card col-md-3 mt-4">
                        <div style="height: 170px; overflow: hidden;">
                            <img src="<?= $product['image']; ?>" alt="<?= $product['title']; ?>" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['title']; ?></h5>
                            <p class="list-price text-danger">List Price: <s>$<?= $product['price']; ?></s></p>
                            <p class="price">Our Price: $
                                <?= $product['list_price']; ?>
                            </p>
                            <button 
                            type="button" 
                            class="btn btn-info btn-sample" 
                            data-toggle="modal" 
                            data-target="#detailsView" 
                            data-title="<?php echo $product['title'] ?>" 
                            data-image="<?php echo $product['image'] ?>" 
                            data-id="<?php echo $product['id'] ?>" 
                            data-price="$<?php echo $product['list_price'] ?>" 
                            data-description="<?php echo $product['description'] ?>" 
                            data-sizes="<?php echo $product['sizes'] ?>"
                            data-sizes2="<?php echo $product['sizes2'] ?>"
                            data-sizes3="<?php echo $product['sizes3'] ?>"
                            >
                                Details
                            </button>
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button> -->
                        </div>
                    </div>
                    

                    <?php
                        endwhile;
                    ?>

            </div>

            
                                    
                         
            <footer class="text-center" id="footer">&copy; Copyright 2019 Salmon Sands Shop</footer>
                

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
            
            <script>
                $(document).ready(function(){
                    if(confirm(<?php $message ?> + ' Do you want to go back?')){
                        window.location.href = "./index.php";
                    }
                });
                
            </script>
        </body>

    </html>


    


    