<?php

require_once './lib/database.php';

// check if it's an update request, if so, perform update operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'update_display_in_shop') {
        if ($_POST['display_in_shop'] !== 'yes' && $_POST['display_in_shop'] !== 'no') {
            exit(1);
        }
        $sql = 'UPDATE products SET display_in_shop=' . ($_POST['display_in_shop'] === 'yes' ? '1' : '0') . ' WHERE id=' . intval($_POST['product_id']);
        if ($mysqli->query($sql) !== TRUE) {
            exit(1);
        }
    }
    header('Location: /products_list.php');
    exit(0);
}

// get products
$sql = "SELECT * FROM products";

// error
if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

// results
if ($result->num_rows === 0) {
    echo "Your product catalogue is empty.";
    exit;
}


$products = [];
while ($product = $result->fetch_object()) {
    $products[] = $product;
}

// html
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Product List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Product List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Display in Shop?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?php echo $product->id;?></td>
                                    <td><?php echo $product->name;?></td>
                                    <td>
                                        <form method="post" action="products_list.php">
                                            <input type="hidden" name="action" value="update_display_in_shop">
                                            <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
                                            <input type="radio" name="display_in_shop" value="yes"<?php echo $product->display_in_shop === '1' ? ' checked' : '';?>> Yes
                                            <input type="radio" name="display_in_shop" value="no"<?php echo $product->display_in_shop !== '1' ? ' checked' : '';?>> No
                                            <button type="submit" class="btn btn-info">Update!</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
