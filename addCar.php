<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'includes/dbfunctions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = addCar($_POST['make'], $_POST['model'], $_POST['year'], $_POST['is_new'], $_POST['price'], $_POST['mileage'], $_POST['drive_type'], $_POST['color'], $_POST['comments']);

    
}
?>

<html>
    <head>
        <title>Add New Car</title>
        <script type="text/javascript" src="js/validation.js"></script>
        <link rel="stylesheet" href = "css/styles.css" type="text/css"/>
    </head>
    <body>
       
       <?php if(isset($message)): ?>
           <h2>Successfully Added!</h2>  
        <?php endif; ?>
           
           
        <form class="bodyDesign" method="POST" onsubmit = "return validate(this)"action="<?php echo  $_SERVER['PHP_SELF']; ?>">
            <div>
                <h1 style="color: darkorange">Add New Car</h1>
                <h3 id ="output" style ="color:red; font-size: large"></h3>
            </div>
            
            <div>
                Make: <input type="text" name="make" value="">
            </div>
            <div>
                Model: <input type="text" name="model" value="">
            </div>
            <div>
                Year: <input type="text" name="year" value="">
            </div>
            <div>
                New: <input type="radio" name="is_new" value="1" checked> Yes
                <input type="radio" name="is_new" value="0"> No
            </div>
            <div>
                Mileage: <input type="text" name="mileage" value="">km
            </div>
            <div>
                Drive Type: 
                <select name="drive_type">
                    <option value="Front-Wheel Drive">Front-Wheel Drive</option>
                    <option value="All-Wheel Drive">All-Wheel Drive</option>
                    <option value="Rear-Wheel Drive">Rear-Wheel Drive</option>
                </select>
            </div>
            <div>
                Price: $<input type="text" name="price" value="">
            </div>
            <div>
                Colour: <input type="text" name="color" value="">
            </div>
            <div>
                Comments: <textarea name="comments"></textarea>
            </div>
            <div>
                <input type="submit" name="add" value="Add Car"><input type="reset" name="reset">
            </div>
        </form>
        <div>
            <a href="listInventory.php">Return to Inventory List</a>
        </div>
    </body>
</html>