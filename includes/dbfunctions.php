<?php
require_once 'dbconfig.php';

/*
 *Get all entries in database. 
 */
function getAllCars() {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $query = "SELECT * FROM car_inventory";
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        $pdo = null;
        
        // Return the prepared statement containing
        // the result set
        return $stmt;
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
}

/*
 * Get inventory based on conditions determined in listInventory.php
 */
function getInventory($queryClauses) {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $query = "SELECT * FROM car_inventory " . $queryClauses;
        $stmt = $pdo->prepare($query);
        
        $stmt->execute();
        
        $pdo = null;
        
        // Return the prepared statement containing
        // the result set
        return $stmt;
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
}

/*
 * Get a specific car by car_id
 */
function getCarByID($id) {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $stmt = $pdo->prepare("SELECT * FROM car_inventory WHERE car_id = ?");
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        $pdo = null;
        
        // Return the prepared statement containing
        // the result set
        return $stmt;
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
}

/*
 * Add a new car to the table
 */
function addCar($make, $model, $year, $is_new, $price, $mileage, $drive_type, $color, $comments) {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $stmt = $pdo->prepare("INSERT INTO `car_inventory` (`make`, `model`, `year`, `is_new`, `price`, `mileage`, `drive_type`, `color`, `comments`) "
                . "VALUES(?,?,?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $make);
        $stmt->bindParam(2, $model);
        $stmt->bindParam(3, $year);
        $stmt->bindParam(4, $is_new);
        $stmt->bindParam(5, $price);
        $stmt->bindParam(6, $mileage);
        $stmt->bindParam(7, $drive_type);
        $stmt->bindParam(8, $color);
        $stmt->bindParam(9, $comments);    
        
        
        $stmt->execute();
        $pdo = null;
        
        if ($stmt->rowCount() > 0) {
            return true;
        } 
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
    
    return false;
}

/*
 * update a car in the table by car_id
 */
function updateCar($car_id,$year,$is_new,$price,$mileage,$drive_type,$color,$comments) {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $stmt = $pdo->prepare("UPDATE car_inventory SET "
                . "year = ?, "
                . "is_new = ?, "
                . "price = ?, "
                . "mileage = ?, "
                . "drive_type = ?, "
                . "color = ?, "
                . "comments = ? "
                . "WHERE car_id = ?");
        $stmt->bindParam(1, $year);
        $stmt->bindParam(2, $is_new);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $mileage);
        $stmt->bindParam(5, $drive_type);
        $stmt->bindParam(6, $color);
        $stmt->bindParam(7, $comments);
        $stmt->bindParam(8, $car_id);        
        
        $stmt->execute();
        $pdo = null;
        
        if ($stmt->rowCount() > 0) {
            return true;
        } 
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
    
    return false;
}

/*
 * delete a car from the table by car_id
 */
function deleteCar($id) {
    try {
        // Step 1: Specify the datasource
        $ds = "mysql:dbhost=" . DBHOST 
                . ";port=" . DBPORT
                . ";dbname=" . DBNAME;

        // Step 2: Create PDO object
        $pdo = new PDO($ds, DBUSER, DBPASS);

        // Step 3: Create prepared statement and
        // execute query  
        $stmt = $pdo->prepare("DELETE FROM car_inventory WHERE car_id = ?");
        $stmt->bindParam(1, $id);
        
        $stmt->execute();
        
        $pdo = null;
        
        // Return the prepared statement containing
        // the result set
        return $stmt;
    } catch (PDOException $ex) {
        echo "PDOException: " + $ex->getMessage();
    }
}

?>