<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'cmbd-22';

    $connection = mysqli_connect($host, $user, $password, $database);
    if (!$connection) {
        echo "Connect" . mysqli_connect_error();
    }
    $query = "SELECT *  FROM productsdb01";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Free Memory
    mysqli_free_result($result);
    //connection close
    mysqli_close($connection);
    //    echo "<pre>";
    //    print_r($data);

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Fetch MySql Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>

<section class="product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-2">
                    <?php
                        if (!empty($data)) {
                            foreach ($data as $product) {

                                ?>
                                <div class="col-md-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title text-success"><?php echo $product['product_name']; ?></h3>
<!--                                            <p class="card-text"><?php /*echo $product['colors']; */?></p>

-->
                                            <span style="color: blueviolet;"><b>Colors : </b></span>
                                            <?php
                                                $singleColor = explode(',', $product['colors']);
                                                foreach ($singleColor as $color):?>
                                                    <ul>
                                                        <li><?php echo $color; ?></li>
                                                    </ul>
                                                <?php
                                                endforeach;
                                            ?>

                                            <a href="#" class="btn btn-primary">Details</a>
                                            <a href="#" class="btn btn-primary">Price : <?php echo $product['price'] ?>
                                                Taka</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>