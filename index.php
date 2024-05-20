<?php
// Get the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];
// Get location information using the IP address
$url = "http://ip-api.com/json/{$ip}";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Convert the JSON response to a PHP array
$data = json_decode($response, true);

if ($data && $data['status'] === 'success') {
    echo "IP Address: " . $data['query'] . "<br>";
    echo "Country: " . $data['country'] . "<br>";
    echo "Country Code: " . $data['countryCode'] . "<br>";
    echo "Region: " . $data['regionName'] . "<br>";
    echo "Region Code: " . $data['region'] . "<br>";
    echo "City: " . $data['city'] . "<br>";
    echo "ZIP Code: " . $data['zip'] . "<br>";
    echo "Latitude: " . $data['lat'] . "<br>";
    echo "Longitude: " . $data['lon'] . "<br>";
    echo "Timezone: " . $data['timezone'] . "<br>";
    echo "ISP: " . $data['isp'] . "<br>";
    echo "Organization: " . $data['org'] . "<br>";
    echo "AS: " . $data['as'] . "<br>";
} else {
    echo "Unable to retrieve location information.";
}