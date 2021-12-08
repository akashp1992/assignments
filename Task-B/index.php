<?php

 //sets date, time and timezone
 date_default_timezone_set('GMT');
 $date = date('d M Y h:i', time());

 //gets the request string and puts it into an associative array
 $postData = file_get_contents('php://input');
 if($_GET['cur']){
   $action=$_GET['action'];
   $cur=$_GET['cur'];
   if($action=="put"){
    
    $currCode =$_GET['cur'];;
 $currRate = "23.00";
 $outputFormat = "xml";
 $currNewFloatRate = (float) $currRate;

 //gets the filename for the rates and the currencies
 $filename = "../currDataXml.xml";

 //loops through the simplexml object and finds the code that needs to be updated
 $currXml = simplexml_load_file($filename) or die("Error opening file");
 foreach ($currXml->rates->children() as $currency) //loops through the simplexml object and gets the currency code
 {
     if ($currCode == $currency->currencyName)
     {
         define('currOldRate', $currency->currencyRate); //a constant variable is used to prevent the retrieved old rate from changing
         $currName = $currency->currencyFullName; //puts the currency full name into a variable
         $currCountry = $currency->currencyCountry; //puts the currency country into a variable
         $currency->currencyRate = $currNewFloatRate; //puts the currency rate into a variable
         break;
     }
 }
 $currXml->asXML($filename); //saves the xml file

 
xmlPostOutput($date, $currNewFloatRate, currOldRate, $currCode, $currName, $currCountry);



   }else{
     echo "Hello";
   }
  
 }

 function xmlPostOutput($date, $newRate, $oldRate, $code, $name, $country) //function for xml output
 {
  $xmlOutput = '<?xml version="1.0" encoding="UTF-8"?>';
  $xmlOutput .= '<action type="put">';
  $xmlOutput .= '<at>'.$date.'</at>';
  $xmlOutput .= '<rate>'.$newRate.'</rate>';
  $xmlOutput .= '<old_rate>'.currOldRate.'</old_rate>';
  $xmlOutput .= '<curr>';
  $xmlOutput .= '<code>'.$code.'</code>';
  $xmlOutput .= '<name>'.$name.'</name>';
  $xmlOutput .= '<loc>'.$country.'</loc>';
  $xmlOutput .= '</curr>';
  $xmlOutput .= '</action>';
  header('Content-Type: text/xml');
  echo $xmlOutput;
 }

?>
