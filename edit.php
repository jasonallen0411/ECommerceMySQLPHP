<?php
    require_once 'core/init.php';
    $sql      = "SELECT * FROM products";
    $featured = $db->query($sql);

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


                
            <div class="FP">
                <h2>Featured Products</h2>
            </div>

            <div class="container">
                <div class="row">
                <?php
                    while ($product = mysqli_fetch_assoc($featured)):
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
                                Edit
                            </button>
                            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button> -->
                        </div>
                    </div>
    

                <?php
                    endwhile;
                ?>

                    <div 
                        class="card col-md-3 mt-4 addProduct" 
                        data-toggle="modal" 
                        data-target="#newProductView"
                    >
                        <div class="card-body">
                            <h4>Add Product</h4>
                            <div id="plus">+</div>
                            
                        </div>
                    </div>

            </div>

            <!-- Edit Modal Start -->
            <div class="modal fade" id="detailsView" tabindex="-1" role="dialog" aria-labelledby="detailsView" aria-hidden="true">
                <form method="get" action="update.php">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modalTitle">
                                    <h4 class="modal-title text-center"></h4>
                                </div>
                                <span class="edit" id="editTitleBtn">Edit</span>
                            
                                <div id="titleWrap">  
                                    <input name="editTitleText" type="text" id="editTitleText">
                                    <input id="updateTitleText" type="button" value="Update" class="btn btn-success"> 
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
                                                <br>
                                                <span class="edit" id="editImageBtn">Edit</span>
                                                <br>
                                                <div id="imageWrap">
                                                    <input name="editImageText" type="text" id="editImageText">
                                                    <input id="updateImageText" type="button" value="Update" class="btn btn-success">
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Details</h4>
                                            <span id="description1"></span>
                                            <span class="edit" id="editDescriptionBtn">Edit</span>
                                            <br>
                                            <div id="descriptionWrap">
                                                <input name="editDescriptionText" type="text" id="editDescriptionText">
                                                <input id="updateDescriptionText" type="button" value="Update" class="btn btn-success">
                                            </div> 
                                            <hr />
                                            <span id="price1">$</span>
                                            <span class="edit" id="editPriceBtn">Edit</span>
                                            <br>
                                            <input type="hidden" id="productId" name="productId" value="">
                                            <div id="priceWrap">
                                                <input name="editPriceText" type="text" id="editPriceText">
                                                <input id="updatePriceText" type="button" value="Update" class="btn btn-success" />
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end container-fluid -->
                            </div><!-- end modal body -->
                        
                        
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                                <input name="saveBtn" id="saveBtn" type="submit" value="Save" class="btn btn-warning">
                            </div>
                        </div><!-- End Modal Content -->
                    </div> <!--End Modal Dialog -->                    
                </form>
                <form action="delete.php" method="get">
                    <input type="hidden" id="productIdDelete" name="productIdDelete" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div> 
            <!-- End Edit Modal -->
                
            <!-- New Product Modal Start -->
            <div class="modal fade" id="newProductView" tabindex="-1" role="dialog" aria-labelledby="detailsView" aria-hidden="true">
                <form method="get" action="add.php">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modalTitle">
                                    <h4 class="modal-title text-center"></h4>
                                </div>
                                <span class="edit" id="editTitleBtnProduct">Edit Title</span>

                                <div id="titleWrapProduct">  
                                    <input name="editTitleTextProduct" type="text" id="editTitleTextProduct">
                                    <input id="updateTitleTextProduct" type="button" value="Update" class="btn btn-success"> 
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

                                                <!-- <form action="upload.php" method="get" enctype="multipart/form-data">
                                                    Select image to upload:
                                                    <div id="imageWrapProduct">
                                                            <input name="editImageTextProduct" type="file" id="editImageTextProduct">
                                                            <input id="updateImageTextProduct" type="submit" value="Upload Image" class="btn btn-success">
                                                    </div>
                                                </form> -->

                                                <img src="" class="details img-responsive" />
                                                <br>
                                                <span class="edit" id="editImageBtnProduct">Edit Image</span>
                                                <br>
                                                <div id="imageWrapProduct">
                                                    <input name="editImageTextProduct" type="text" id="editImageTextProduct">
                                                    <input id="updateImageTextProduct" type="button" value="Update" class="btn btn-success">
                                                </div>   
                                            </div>

                                            <div class="center-block">
                                                <span id="productId"></span>
                                                <span class="edit" id="editIdBtnProduct">Edit Id</span>
                                                <br>
                                                <div id="idWrap">  
                                                    <input type="text" id="productIdProduct" name="productIdProduct" value="">
                                                    <input id="updateIdTextProduct" type="button" value="Update" class="btn btn-success"> 
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4>Details</h4>
                                            <span id="description1Product"></span>
                                            <span class="edit" id="editDescriptionBtnProduct">Edit</span>
                                            <br>
                                            <div id="descriptionWrapProduct">
                                                <input name="editDescriptionTextProduct" type="text" id="editDescriptionTextProduct">
                                                <input id="updateDescriptionTextProduct" type="button" value="Update" class="btn btn-success">
                                            </div> 
                                            <hr />
                                            <span id="price1Product">$</span>
                                            <span class="edit" id="editPriceBtnProduct">Edit</span>
                                            <br>
                                            <input type="hidden" id="productIdProduct" name="productIdProduct" value="">
                                            <div id="priceWrapProduct">
                                                <input name="editPriceTextProduct" type="text" id="editPriceTextProduct">
                                                <input id="updatePriceTextProduct" type="button" value="Update" class="btn btn-success" />
                                            </div>
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end container-fluid -->
                            </div><!-- end modal body -->
                        
                        
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                                <input name="saveBtnProduct" id="saveBtnProduct" type="submit" value="Save" class="btn btn-warning">
                            </div>
                        </div><!-- End Modal Content -->
                    </div> <!--End Modal Dialog -->                    
                </form>
            </div> 
            <!-- End New Product Modal -->
                         
            <footer class="text-center" id="footer">&copy; Copyright 2019 Salmon Sands Shop</footer>
                

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
                    var sizes = button.data('sizes');
                    var sizes2 = button.data('sizes2');
                    var sizes3 = button.data('sizes3');
                    var productId = button.data('id');

                    var modal = $(this);
                    modal.find('.modal-title').text(title);
                    modal.find('#productId').attr('value',productId);
                    modal.find('#productIdDelete').attr('value',productId);
                    modal.find('.details.img-responsive').attr("src", img);
                    modal.find('#price1').text(price);
                    modal.find('#price1Product').text(price);
                    modal.find('#description1').text(description);
                    modal.find('#description1Product').text(description);
                    modal.find('.sizes').text(sizes);
                    modal.find('.sizes2').text(sizes2);
                    modal.find('.sizes3').text(sizes3);
                });

                

                $("#titleWrap").hide();
                $("#imageWrap").hide();
                $("#descriptionWrap").hide();
                $("#priceWrap").hide();

                $("#titleWrapProduct").hide();
                $("#imageWrapProduct").hide();
                $("#descriptionWrapProduct").hide();
                $("#priceWrapProduct").hide();
                $("#idWrap").hide();

                $("#editTitleBtn").click(function(){
                    $("#titleWrap").toggle();
                });

                $("#editImageBtn").click(function(){
                    $("#imageWrap").toggle();
                });

                $("#editDescriptionBtn").click(function(){
                    $("#descriptionWrap").toggle();
                });

                $("#editPriceBtn").click(function(){
                    $("#priceWrap").toggle();
                });

                $("#editTitleBtnProduct").click(function(){
                    $("#titleWrapProduct").toggle();
                });

                $("#editImageBtnProduct").click(function(){
                    $("#imageWrapProduct").toggle();
                });

                $("#editDescriptionBtnProduct").click(function(){
                    $("#descriptionWrapProduct").toggle();
                });

                $("#editPriceBtnProduct").click(function(){
                    $("#priceWrapProduct").toggle();
                });

                $("#editIdBtnProduct").click(function(){
                    $("#idWrap").toggle();
                });

                $("#updateTitleText").click(function(){
                    $('.modal-title').text($("#editTitleText").val());
                    $("#titleWrap").hide();
                });

                $("#updateImageText").click(function(){
                    $('.details.img-responsive').text($("#editImageText").val());
                    $("#imageWrap").hide();
                });

                $("#updateDescriptionText").click(function(){
                    $('#description1').text($("#editDescriptionText").val());
                    $("#descriptionWrap").hide();
                });

                $("#updatePriceText").click(function(){
                    $('#price1').text($("#editPriceText").val());
                    $("#priceWrap").hide();
                });

                $("#updateTitleTextProduct").click(function(){
                    $('.modal-title').text($("#editTitleTextProduct").val());
                    $("#titleWrapProduct").hide();
                });

                $("#updateImageTextProduct").click(function(){
                    $('.details.img-responsive').text($("#editImageTextProduct").val());
                    $("#imageWrapProduct").hide();
                });

                $("#updateDescriptionTextProduct").click(function(){
                    $('#description1Product').text($("#editDescriptionTextProduct").val());
                    $("#descriptionWrapProduct").hide();
                });

                $("#updatePriceTextProduct").click(function(){
                    $('#price1Product').text($("#editPriceTextProduct").val());
                    $("#priceWrapProduct").hide();
                });

                $("#updateIdTextProduct").click(function(){
                    $("#productId").text($("#productIdProduct").val());
                    $("#idWrap").hide();
                });
                
            </script>  
        </body>

    </html>

    


    