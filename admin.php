<?php
require_once 'core/init.php';
$sql      = "SELECT * FROM products";
$featured = $db->query($sql);


$id = $_POST['id'];
$title = "";
$price = "";
$list_price = "";
$brand = "";
$description = "";
// $featured = "";
$sizes = "";
$sizes2 = "";
$sizes3 = "";
$product = mysqli_fetch_assoc($featured)

// $sql = "INSERT INTO products (id)
// VALUES $('#id').val()";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
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
                            <a class="nav-link" id="nav-linkA" href="admin.php">Admin</a>
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

            <h1 id="adminHeader">Update Data</h1>

            
            <?php
              // while ($product = mysqli_fetch_assoc($featured)):
            ?>
            

          <form method="post">
            <div class="container">
              <div class="form-group">
                <label for="id">Id</label>
                <input type="text" class="form-control" id="id" aria-describedby="id" placeholder="id is: <?php echo $product['id']; ?>">
              </div>
              <?php
                // endwhile;
              ?>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" aria-describedby="price" placeholder="Enter price">
              </div>
              <div class="form-group">
                <label for="list-price">List Price</label>
                <input type="text" class="form-control" id="list-price" aria-describedby="list-price" placeholder="Enter list price">
              </div>
              <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" aria-describedby="brand" placeholder="Enter brand">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" aria-describedby="image" placeholder="Enter image">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" aria-describedby="description" placeholder="Enter description">
              </div>
              <div class="form-group">
                <label for="featured">Featured</label>
                <input type="text" class="form-control" id="featured" aria-describedby="featured" placeholder="Enter featured">
              </div>
              <div class="form-group">
                <label for="sizes">Sizes</label>
                <input type="text" class="form-control" id="sizes" aria-describedby="sizes" placeholder="Enter sizes">
              </div>
              <div class="form-group">
                <label for="sizes2">Sizes2</label>
                <input type="text" class="form-control" id="sizes2" aria-describedby="sizes2" placeholder="Enter sizes2">
              </div>
              <div class="form-group">
                <label for="sizes3">Sizes3</label>
                <input type="text" class="form-control" id="sizes3" aria-describedby="sizes3" placeholder="Enter sizes3">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

            
        </body>

    </html>

