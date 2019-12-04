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
//sql = 'UPDATE products SET title="'. $_GET['editTitleText'] .'", list_price="'. $_GET['editPriceText'] .'", description="'. $_GET['editDescriptionText'] .'" WHERE id="'.$_GET['productId'].'"';
$sql = 'DELETE FROM products WHERE id="'.$_GET['productIdDelete'].'" ';

//'UPDATE products SET title="'. $_GET['editTitleText'] .'", list_price="'. $_GET['editPriceText'] .'", description="'. $_GET['editDescriptionText'] .'", WHERE id="'.$_GET['productId'].'"';

console_log($sql);
if ($db->query($sql) === TRUE) {
    $message = "Deleted successfully " ;  
    // echo '<h2>' . $message . '</h2>'; 
} else {
    $message = "Error updating record: " . $conn->error; 
    // echo '<h2>' . $message . '</h2>'; 
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


        <?php require "navbar.php"; ?>

            <div id="background-image">
                <!-- <div id="image-1"></div>
                    <div id="image-2"></div> -->
            </div>


                
            <div>
                <h1 class="FPD">
                    <?php $message = "Deleted Successfully " ?>
                    <?php echo  $message ; ?>
                </h1>
                <div id="backBtn1">
                    <button id="backBtnD" class="btn btn-sample">Back</button>
                </div>
                
            </div>

            <div class="container">
                

            </div>

            
                                    
                         
            <footer class="text-center" id="footer">&copy; Copyright 2019 Salmon Sands Shop</footer>
                

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
            <script>
               $("#backBtnD").click(function() {
                    window.location.href = "./index.php";
                });
                
            </script>
        
        </body>

    </html>

    


    