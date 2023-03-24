<?php

// Replace API_ENDPOINT with the endpoint URL of the API
$api_endpoint = 'https://api.cricapi.com/v1/players_info?apikey=dc3b39e5-97b0-498b-bbf2-0530d0c0bb5e&id=1e5b4ad5-223d-4bef-9c57-6b15baa75da6';

// Replace API_KEY with your API key
$api_key = 'dc3b39e5-97b0-498b-bbf2-0530d0c0bb5e';

// Replace PLAYER_ID with the ID of the player you want to retrieve stats for
$playerId = '1e5b4ad5-223d-4bef-9c57-6b15baa75da6';

function getPlayerStats($api_endpoint, $api_key, $playerId) {
    // Build the API URL with the required parameters
    $url = "{$api_endpoint}/playerStats?apikey={$api_key}&pid={$playerId}";

    // Make a request to the API using cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response into a PHP array
    $data = json_decode($response, true);

    // Check if there was an error with the API request
    ////if ($data['error']) {
        //echo "Error: {$data['error']}";
        //exit();
   // }

    // Extract the required information from the API response
    $playerStats = $data['data'];

    // Return the player stats data
    return $playerStats;
}

// Retrieve the player stats data using the getPlayerStats function
$playerStats = getPlayerStats($api_endpoint, $api_key, $playerId);
echo "<h2>{$playerStats['name']}</h2>";
echo "<p>Matches: {$playerStats['dateOfBirth']}</p>";
echo "<p>Runs: {$playerStats['country']}</p>";
echo "<p>Wickets: {$playerStats['role']}</p>";

