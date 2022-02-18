<?php

// load phpSpareadsheet
require 'vendor/autoload.php';


/**
 * xlsx file read and dispay
 * @param $inputFile
 */
function displayXlsx ($inputFile) {    
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    // open Spareadsheet
    $spreadSheet = $reader->load($inputFile);
    $worksheet = $spreadSheet->getActiveSheet();    
    foreach($worksheet->getRowIterator() as $row) {
        // read the cell
        $cellIterate= $row->getCellIterator();
        $cellIterate->setIterateOnlyExistingCells(false);
        // to output 
        echo "<table cellspacing=0px; cellpadding=0px; border=1px solid;>";
        echo "<tr width=80px;>";
        foreach($cellIterate as $cell) {
            echo "<td width=80px;>" .$cell->getValue()."</td>";
        }
        echo "</tr>";
        echo "<table>";    
    }
}

/**
 * xlsx file read and dispay
 * @param $inputFile
 */
function displayTxt($inputFile) {
    
    $file = $inputFile; 
    // Check file is exist or not
    if(file_exists($file)){
        // Reading the entire file into an array
        $contents = file($file) or die("ERROR: Cannot open the file.");
        foreach($contents as $line){
            // Display the file content 
            echo "<pre>";
            echo $line;
        }
    } else {
        echo "ERROR: File does not exist.";
    }
}

/**
 * xlsx file read and dispay
 * @param $inputFile
 */
function displayCsv($inputFile) {
     
    $file = $inputFile; 
    // Check file is exist or not
    if(file_exists($file)){
        // Reading the entire file into an array
        $contents = file($file) or die("ERROR: Cannot open the file.");
        foreach($contents as $line){
            // Display the file content 
            echo "<pre>";
            echo $line;
        }
    } else{
        echo "ERROR: File does not exist.";
    }    
}

/**
 * xlsx file read and dispay
 * @param $inputFile
 */
function displayDoc($inputFile) {
     
    $file = $inputFile; 
    // Check file is exist or not
    if(file_exists($file)){
        // Reading the entire file into an array
        $contents = file($file) or die("ERROR: Cannot open the file.");
        foreach($contents as $line){
            // Display the file content 
            echo "<pre>";
            echo $line;
        }
    } else{
        echo "ERROR: File does not exist.";
    }
    
}
displayXlsx("test.xlsx");
displayTxt("test.txt");
displayCsv("test.csv");
displayDoc("test.doc");
?>