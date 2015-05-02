<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/dbfunctions.php';

//form default values
$new_only = 0;
$lyear = 2000;
$uyear = date("Y");
$sort_by = "price";
$order_by = "ASC";

if(isset($_GET['custom'])) {
    if ($_GET['custom'] == 1) {
        //create clause with filter values
        $queryClauses = "WHERE (year BETWEEN " . $_GET['lower_year'] . " AND " . $_GET['upper_year'] . ") ";
        
        //checks to see if new_only exists before adding it to conditions in query
        if(isset($_GET['new_only'])) {
            if($_GET['new_only'] == 1) {
                $queryClauses .= "AND is_new = 1 ";
                $new_only = 1;
            }   
        }
        $queryClauses .= "ORDER BY " . $_GET['sort_by'] . " " . $_GET['order'] . " ";
        
        $results = getInventory($queryClauses)->fetchAll();
        
        //gets passed GET values to use for form
        $lyear = $_GET['lower_year'];
        $uyear = $_GET['upper_year'];
        $sort_by = $_GET['sort_by'];
        $order_by = $_GET['order'];
    } else {
        $results = getAllCars()->fetchAll();
    }
} else {
    $results = getAllCars()->fetchAll();
}

?>

<html>
    <head>
        <title>Inventory List</title>
        <link rel="stylesheet" href = "css/styles.css" type="text/css"/>
    </head>
    
    <body>
        <h1 style="color:darkorange; text-align: center; font-family: monospace">Inventory List</h1>
        <div class="bodyDesign">
            <h2 style="color:darkorange">Advanced Listing Options</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <input type="hidden" name="custom" value="1">
                <div><input type="checkbox" name="new_only" value="1" <?php echo ($new_only == 1 ? 'checked' : '') ?>> New only?</div>
                <div>Year Range: <input type="text" name="lower_year" value="<?php echo $lyear; ?>"> to <input type="text" name="upper_year" value="<?php echo $uyear; ?>"></div>
                <div>
                    Sort by: 
                    <select name="sort_by">
                        <option value="price" <?php echo ($sort_by == 'price' ? 'selected' : '') ?>>Price</option>
                        <option value="mileage" <?php echo ($sort_by == 'mileage' ? 'selected' : '') ?>>Mileage</option>
                        <option value="year" <?php echo ($sort_by == 'year' ? 'selected' : '') ?>>Year</option>
                    </select>
                    
                    <select name="order">
                        <option value="ASC" <?php echo ($order_by == 'ASC' ? 'selected' : '') ?>>Low to High</option>
                        <option value="DESC" <?php echo ($order_by == 'DESC' ? 'selected' : '') ?>>High to Low</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Filter"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Reset Filter</a>
            </form>
        </div>
        
                <h2 style="color:darkorange">Inventory</h2>
        <table border="1" cellspacing="1"
               cellpadding="2"bordercolor="darkorange" 
               style="margin-left:auto;margin-right:auto">
            <tr  style="color:darkorange">
                <th >Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>New</th>
                <th>Price</th>
                <th>Mileage</th>
                <th>Drive Type</th>
                <th>Colour</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($results as $value): ?>
            <tr>
                <td><?php echo $value['make']; ?></td>
                <td><?php echo $value['model']; ?></td>
                <td><?php echo $value['year']; ?></td>
                <td><?php echo ($value['is_new'] == 1 ? 'New' : 'Used' ); ?></td>
                <td>$<?php echo $value['price']; ?></td>
                <td><?php echo $value['mileage']; ?>km</td>
                <td><?php echo $value['drive_type']; ?></td>
                <td><?php echo $value['color']; ?></td>
                <td>
                    <a href="editCar.php?id=<?php echo $value['car_id']; ?>">Edit Details</a> |
                    <a href="sellCar.php?id=<?php echo $value['car_id']; ?>">Sell Car</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <h2><a type="submit" href="addCar.php">Add New Car</a></h2>        
        </div>
    </body>
</html>