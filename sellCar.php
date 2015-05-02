<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/dbfunctions.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "No id specified";
        die();
    }   
}
$results = getCarByID($id)->fetchAll();
?>

<html>
    <head>
        <title><?php echo $results[0]['model'] . " " . $results[0]['model']; ?></title>
        <link rel="stylesheet" href = "css/styles.css" type="text/css"/>
        <script type="text/javascript">
            function confirmPurchase() {
                var customer = document.getElementById("customer").value;
                var make = "<?php echo $results[0]['make']; ?>";
                var model = "<?php echo $results[0]['model']; ?>";
                var year = "<?php echo $results[0]['year']; ?>";
                
                if(customer === "") {
                    alert("Please enter the customer's name");
                    return false;
                }
                return confirm("Are you sure you wish to sell this " + year + " " + make + " " + model + " to " + customer + "?");
            }
        </script>
    </head>
    <body>
        <?php if(isset($message)): ?>
            <h2><?php echo $message; ?></h2>
        <?php endif; ?>
        <form class="bodyDesign"method="POST" action="confirmPurchase.php">
            <input type="hidden" name="CarID" value="<?php echo $results[0]['car_id']; ?>">
            <input type="hidden" name="make" id="make" value="<?php echo $results[0]['make']; ?>">
            <input type="hidden" name="model" id="model" value="<?php echo $results[0]['model']; ?>">
            <input type="hidden" name="state" value="<?php echo $results[0]['is_new']; ?>">
            <div>
                <h1><?php echo $results[0]['make'] . " " . $results[0]['model']; ?></h1>
                <h2>Price: $<?php echo $results[0]['price']; ?></h2>
            </div>
            <div>
                New: <?php echo ($results[0]['is_new'] == 1 ? 'Yes' : 'No'); ?>
            </div>
            <div>
                Mileage: <?php echo $results[0]['mileage']; ?>km
            </div>
            <div>
                Drive Type: <?php echo $results[0]['drive_type']; ?>
            </div>
            <div>
                Colour: <?php echo $results[0]['color']; ?>
            </div>
            <div>
                Mileage: <?php echo $results[0]['comments']; ?>
            </div>
            <div>
                Purchaser Name: <input type="input" id="customer" name="customer" value="">
            <div>
                <input type="submit" name="edit" value="Sell Car" onclick="return confirmPurchase();">
            </div>
        </form>
        <div>
            <a href="listInventory.php">Return to Inventory List</a>
        </div>
    </body>
</html>