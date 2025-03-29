<?php
$apiKey = "53c80a2404c9c3fc00ee70548fd818cf";
$location = "Japan";
$apiUrl = "http://api.weatherstack.com/current?access_key={$apiKey}&query={$location}";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (optional)

// Execute cURL session and store the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    die("cURL Error: " . curl_error($ch));
}

// Close cURL session
curl_close($ch);

// Decode the JSON response
$weatherData = json_decode($response, true);

// Check if the API returned valid data
if (!isset($weatherData['location']) || !isset($weatherData['current'])) {
    die("Error: Unable to fetch weather data. Check API key or request format.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6dd5ed, #2193b0);
            text-align: center;
            padding: 20px;
            animation: fadeIn 2s ease-in-out;
        }
        .weather-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            display: inline-block;
            animation: bounceIn 1s ease-in-out;
            transition: transform 0.3s ease;
        }
        .weather-container:hover {
            transform: scale(1.05);
        }
        .weather-icon {
            width: 80px;
            height: 80px;
        }
        h2, p {
            color: #333;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <h2 id="location">
            <?php echo htmlspecialchars($weatherData['location']['name']) . ", " . htmlspecialchars($weatherData['location']['country']); ?>
        </h2>
        <p id="localtime">Local Time: <?php echo htmlspecialchars($weatherData['location']['localtime']); ?></p>
        <img id="weather-icon" class="weather-icon" src="<?php echo htmlspecialchars($weatherData['current']['weather_icons'][0]); ?>" alt="Weather Icon">
        <p id="weather-description">
            <?php echo htmlspecialchars($weatherData['current']['weather_descriptions'][0]); ?>
        </p>
        <p>
            <strong>Temperature:</strong> <span id="temperature"><?php echo htmlspecialchars($weatherData['current']['temperature']); ?></span>°C
        </p>
        <p>
            <strong>Feels Like:</strong> <span id="feelslike"><?php echo htmlspecialchars($weatherData['current']['feelslike']); ?></span>°C
        </p>
        <p>
            <strong>Humidity:</strong> <span id="humidity"><?php echo htmlspecialchars($weatherData['current']['humidity']); ?></span>%
        </p>
        <p>
            <strong>Wind:</strong> <span id="wind"><?php echo htmlspecialchars($weatherData['current']['wind_speed']); ?></span> km/h (
            <span id="wind-dir"><?php echo htmlspecialchars($weatherData['current']['wind_dir']); ?></span>)
        </p>
    </div>
</body>
</html>
