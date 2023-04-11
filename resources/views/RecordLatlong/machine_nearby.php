<?php

function distance($lat1, $lon1, $lat2, $lon2) {
  $radius = 6371; // Earth's radius in km

  $dLat = deg2rad($lat2 - $lat1);
  $dLon = deg2rad($lon2 - $lon1);

  $a = sin($dLat / 2) * sin($dLat / 2) +
       cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
       sin($dLon / 2) * sin($dLon / 2);
  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

  $distance = $radius * $c * 1000; // convert to meters
  return $distance;
}

$current_lat = -6.3985053313022;
$current_lon = 106.73623466907199;

$locations = array(
  array('name' => 'Machine A', 'lat' => -6.3999446998244345, 'lon' => 106.73689985687379),
  array('name' => 'Machine B', 'lat' => -6.399027769234672, 'lon' => 106.7364921611243),
  array('name' => 'Machine C', 'lat' => -6.396884704113019, 'lon' => 106.73947477739692)
);

$radius = 200; // meters

$nearby_locations = array();

foreach ($locations as $location) {
  $distance = distance($current_lat, $current_lon, $location['lat'], $location['lon']);
  if ($distance <= $radius) {
    $nearby_locations[] = $location;
  }
}

// print the nearby locations
foreach ($nearby_locations as $location) {
  echo $location['name'] . ': ' . $location['lat'] . ', ' . $location['lon'] . "\n";
}

?>