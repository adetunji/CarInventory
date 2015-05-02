<?php

/* 
 * Removes a purchased vehicle from the table
 */

require_once 'includes/dbfunctions.php';

if(isset($_POST['CarID'])) {
    deleteCar($_POST['CarID']);
} else {
    echo "This page cannot be accessed directly";
}
?>

<h1>Congratulations <?php echo $_POST['customer']; ?>!</h1>
<h2>You have purchased a <?php echo ($_POST['state'] == 1 ? 'New' : 'Used') . " " . $_POST['make'] . " " . $_POST['model']; ?>!</h2>

<a href="index.php">Go Back to Inventory List</a>