<?php

require_once 'dbfunctions.php';

function exportCars() {
    $doc = new DOMDocument("1.0", "UTF-8");

    $stmt = getAllCars();

    $numCars = $stmt->rowCount();

    $results = $stmt->fetchAll();

    $root = $doc->createElement("cars");


    $doc->appendChild($root);


    for ($i = 0; $i < $numCars; $i++) {
        $currentCar = $results[$i];

        
        $carElement = $doc->createElement("car");
        
        $carElement->setAttribute("carId", $currentCar["car_id"]);


        //Create the elements
        $makeElement = $doc->createElement("make");
        $makeText = $doc->createTextNode($currentCar["make"]);
        $makeElement->appendChild($makeText);
        
        $modelElement = $doc->createElement("model");
        $modelText = $doc->createTextNode($currentCar["model"]);
        $modelElement->appendChild($modelText);
        
        $stateElement = $doc->createElement("is_new");
        $stateText = $doc->createTextNode($currentCar["is_new"]);
        $stateElement->appendChild($stateText);
        
        $mileageElement = $doc->createElement("mileage");
        $mileageText = $doc->createTextNode($currentCar["mileage"]);
        $mileageElement->appendChild($mileageText);
        
        $driveElement = $doc->createElement("drive_type");
        $driveText = $doc->createTextNode($currentCar["drive_type"]);
        $driveElement->appendChild($driveText);
        
        $priceElement = $doc->createElement("price");
        $priceText = $doc->createTextNode($currentCar["price"]);
        $priceElement->appendChild($priceText);
        
        $colourElement = $doc->createElement("color");
        $colourText = $doc->createTextNode($currentCar["color"]);
        $colourElement->appendChild($colourText);
        
        $condElement = $doc->createElement("comments");
        $condText = $doc->createTextNode($currentCar["comments"]);
        $condElement->appendChild($condText);
        
        
        
        
        
        $carElement->appendChild($makeElement);
        $carElement->appendChild($modelElement);
        $carElement->appendChild($stateElement);
        $carElement->appendChild($mileageElement);
        $carElement->appendChild($driveElement);
        $carElement->appendChild($priceElement);
        $carElement->appendChild($colourElement);
        $carElement->appendChild($condElement);
       
        
        
        
        $root->appendChild($carElement);
    }
    $xml = $doc->saveXML();
    return $xml;
}
?>