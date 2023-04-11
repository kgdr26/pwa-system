<?php
function distance($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $dist = $dist * 60 * 1.1515;
    $dist = $dist * 1.609344 * 1000; // convert to meters
    return $dist;
}

function travelTime($distance, $speed) {
    $time = $distance / ($speed * 1000 / 3600);
    return $time; // in seconds
}

$locA_lat = -6.3999446998244345;
$locA_lon = 106.73689985687379;
$locB_lat = -6.396884704113019;
$locB_lon = 106.63947477739692;

$distance = distance($locA_lat, $locA_lon, $locB_lat, $locB_lon);
$time = travelTime($distance, 40); // speed of 40 km/hour

echo "Distance: " . round($distance, 2) . " meters\n";
echo "Travel time: " . round($time / 60, 2) . " minutes";
?>
