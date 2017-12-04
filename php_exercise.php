<?php
/**
* return structure should be an array of hashmaps which looks something like
*
* array(3) {
* [0] =>
* array(2) {
* 'min' => int(500)
* 'max' => int(750)
* }
* [1] =>
* array(2) {
* 'min' => int(750)
* 'max' => int(1000)
* }
* [2] =>
* array(2) {
* 'min' => int(1000)
* 'max' => int(1250)
* }
* }
*
* @param int $min
* @param int $max
* @param int $incrementStep
* @return array
*/
function getPriceRangeCollection($min, $max, $incrementStep) {
	//Calculating the row number first
	$row = 0;
	for ($x = 0; $x <= $max; $x++) 
	{
		$value = $min + ($x * $incrementStep);
		if (($value + $incrementStep) >= $max)
		{
			$row = $x;
			$x = $max;
		}
		#echo "The max value is: $value <br>";
		#echo "The row number is: $row <br>";
	}  
	echo "\r\nThe row number is: $row <br>";

	// Creating and printing array  
	$fields = array();


	for($i = 0; $i <= $row; $i++){
		$fields[$i] = array ( //'occurence' => $i,
            array( //this array must be created dynamic 
                'min' => $min,
                'max' => ($min + $incrementStep)
                  ));
				$min = $min + $incrementStep;
	}
print_r($fields);
print_r($fields[2][min]);
}
getPriceRangeCollection(500, 2000, 250);
// $priceRangeCollection = getPriceRangeCollection(500, 5000, 250);
// assert($priceRangeCollection[17]['min'] === 4750 && $priceRangeCollection[17]['max'] === 5000);
// assert($priceRangeCollection[9]['min'] === 2750 && $priceRangeCollection[9]['max'] === 3000);
$priceRangeCollection2 = getPriceRangeCollection(1, 100, 3);
//assert(count($priceRangeCollection2) === 33);
//assert($priceRangeCollection2[32]['min'] === 96);
//assert($priceRangeCollection2[32]['max'] === 99);

?>