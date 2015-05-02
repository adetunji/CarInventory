<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/dbfunctions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['car_id']; //determine ID for select query
    $message = updateCar($_POST['car_id'],$_POST['year'],$_POST['is_new'],$_POST['price'],$_POST['mileage'],$_POST['drive_type'],$_POST['color'],$_POST['comments']);

    
} else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = $_GET['id']; //determine ID for select query
    } else {
        echo "No id specified";
        die();
    }   
}
$results = getCarByID($id)->fetchAll();

?>

<html>
    <head>
        <title>Edit <?php echo $results[0]['year'] . " " .$results[0]['make'] . " " . $results[0]['model']; ?></title>
        <script type="text/javascript" src="js/validation.js"></script>
        <link rel="stylesheet" href = "css/styles.css" type="text/css"/>
    </head>
    <body>
        <?php if(isset($message)): ?>
            <h2>Successfully Updated!</h2>
            <div id="errorMessages">
            
           </div>
        <?php endif; ?>
            <form class="bodyDesign" method="POST" onsubmit="return validate(this)"action="<?php echo  $_SERVER['PHP_SELF'];?>" >
                
           <input type="hidden" name="car_id" value="<?php echo $id; ?>">
            <input type="hidden" name="make" value="<?php echo $results[0]['make']; ?>">
            <input type="hidden" name="model" value="<?php echo $results[0]['model']; ?>">
            <div>
                <h1 style="color: darkorange">Edit <?php echo $results[0]['year'] . " " .$results[0]['make'] . " " . $results[0]['model']; ?></h1>
                <h3 id="output" style="color:red"></h3>
            </div>
            <div>
                Year: <input type="text" name="year" value="<?php echo $results[0]['year']; ?>">
            </div>
            <div>
                New: <input type="radio" name="is_new" value="1" <?php echo ($results[0]['is_new'] == 1 ? 'checked' : ''); ?>> Yes
                <input type="radio" name="is_new" value="0" <?php echo ($results[0]['is_new'] == 0 ? 'checked' : ''); ?>> No
            </div>
            <div>
                Mileage: <input type="text" name="mileage" value="<?php echo $results[0]['mileage']; ?>">km
            </div>
            <div>
                Drive Type: <input type="text" name="drive_type" value="<?php echo $results[0]['drive_type']; ?>">
            </div>
            <div>
                Price: $<input type="text" name="price" value="<?php echo $results[0]['price']; ?>">
            </div>
            <div>
                Colour: <input type="text" name="color" value="<?php echo $results[0]['color']; ?>">
            </div>
            <div>
                Comments: <textarea name="comments"><?php echo $results[0]['comments']; ?></textarea>
            </div>
            <div>
                <input type="submit" name="edit" value="Update"><input type="reset" name="reset">
            </div>
        </form>
        <div>
            <a href="listInventory.php">Return to Inventory List</a>
        </div>
    </body>
</html>