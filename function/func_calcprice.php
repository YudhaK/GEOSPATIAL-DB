<?php
function calculatePrice($type, $loads, $bedcover_count) { 

  if ($type == 0) {
    $price = ($loads * 40000) + ($bedcover_count * 40000); 
  } else {
    $price = ($loads * 50000) + ($bedcover_count * 40000); 
  }

  return $price; 

} 
?>