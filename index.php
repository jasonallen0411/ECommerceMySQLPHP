<?php
require_once 'core/init.php';
$sql      = "SELECT * FROM products";
$featured = $db->query($sql);

?>

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

            <div class="col-md-2"></div>

            <div>
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
                    <!-- Modal -->
                    

                    <!-- <div class="col-md-3">
                <h4>Shirts</h4>
                <img src="images/shirt.jpg" alt="Shirts" id="images" />
                <p class="list-price text-danger">List Price: <s>$19.99</s></p>
                <p class="price">Our Price: $9.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-2">Details</button>
            </div>

            <div class="col-md-3">
                <h4>Shorts</h4>
                <img src="images/swimTrunks.jpg" alt="Shorts" id="images" />
                <p class="list-price text-danger">List Price: <s>$14.99</s></p>
                <p class="price">Our Price: $9.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-3">Details</button>
            </div>

            <div class="col-md-3">
                <h4>Bikinis</h4>
                <img src="images/bikini.jpg" alt="Bikinis" id="images" />
                <p class="list-price text-danger">List Price: <s>$29.99</s></p>
                <p class="price">Our Price: $24.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-4">Details</button>
            </div>

            <div class="col-md-3">
                <h4>Sandals</h4>
                <img src="images/sandals.jpg" alt="Sandals" id="images" />
                <p class="list-price text-danger">List Price: <s>$9.99</s></p>
                <p class="price">Our Price: $4.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-5">Details</button>
            </div>

            <div class="col-md-3">
                <h4>Sunglasses</h4>
                <img src="images/sunglasses.jpg" alt="Sunglasses" id="images" />
                <p class="list-price text-danger">List Price: <s>$11.99</s></p>
                <p class="price">Our Price: $7.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-6">Details</button>
            </div>

            <div class="col-md-3">
                <h4>Beach Towels</h4>
                <img src="images/beachTowel.jpg" alt="Beach Towels" id="images" />
                <p class="list-price text-danger">List Price: <s>$4.99</s></p>
                <p class="price">Our Price: $1.99</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-7">Details</button>
            </div> -->

                    <?php
                        endwhile;
                    ?>

                </div>
            </div>
            </div>
            <div class="modal fade" id="detailsView" tabindex="-1" role="dialog" aria-labelledby="detailsView" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modalTitle">
                                <h4 class="modal-title text-center"></h4>
                            </div>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="center-block">

                                            <img src="" class="details img-responsive" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4>Details</h4>
                                        <p id="description1">

                                        </p>
                                        <hr />
                                        <p id="price1">$

                                        </p>
                                        <p>Brand:</p>
                                        <p>Levi's</p>
                                        <form action="add_cart.php" method="post">
                                            <div class="form-group">
                                                <div class="col-xs-3">
                                                    <label for="quantity" id="quantity-label">Quantity:</label>
                                                    <input type="text" class="form-control" id="quantity" name="quantity" />
                                                </div>
                                                <br />
                                                <div class="form-group">
                                                    <label for="size">Size:</label>
                                                    <select name="size" id="size" class="form-control">
                                                        <option value=""></option>
                                                        <option class="sizes" value="28"></option>
                                                        <option class="sizes2" value="32"></option>
                                                        <option class="sizes3" value="36"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- end row -->
                            </div><!-- end container-fluid -->
                        </div><!-- end modal body -->
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="text-center" id="footer">&copy; Copyright 2019 Salmon Sands Shop</footer>

            <!-- details modal -->
            <?php
                include 'details-modal-LevisJeans.php';
                include 'details-modal-Shirts.php';
                include 'details-modal-Shorts.php';
                include 'details-modal-Bikinis.php';
                include 'details-modal-Sandals.php';
                include 'details-modal-Sunglasses.php';
                include 'details-modal-BeachTowels.php';
            ?>
                <!-- end of details modal -->

            

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
            
            <!-- Jquery Modal Stuff -->
            <script>
                $('#detailsView').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);

                    var img = button.data('image');
                    var title = button.data('title');
                    var price = button.data('price');
                    var description = button.data('description');
                    var sizes = button.data('sizes')
                    var sizes2 = button.data('sizes2')
                    var sizes3 = button.data('sizes3')

                    var modal = $(this)
                    modal.find('.modal-title').text(title)
                    modal.find('.details.img-responsive').attr("src", img);
                    modal.find('#price1').text(price);
                    modal.find('#description1').text(description);
                    modal.find('.sizes').text(sizes);
                    modal.find('.sizes2').text(sizes2);
                    modal.find('.sizes3').text(sizes3);
                })
            </script>  
            <!-- End of Jquery Modal Stuff      -->
        </body>

    </html>

    