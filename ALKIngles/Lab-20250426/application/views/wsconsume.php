<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA: Web Service - Consume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .weather-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .weather-icon {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <h2 id="location">
            <?php echo $weatherData['location']['name'] . ", " . $weatherData['location']['country']; ?>
        </h2>
        <p id="localtime">
            Local Time: <?php echo $weatherData['location']['localtime']; ?>
        </p>
        <img id="weather-icon" class="weather-icon" src="<?php echo $weatherData['current']['weather_icons'][0]; ?>" alt="Weather Icon">
        <p id="weather-description">
            <?php echo $weatherData['current']['weather_descriptions'][0]; ?>
        </p>
        <p><strong>Temperature:</strong> <span id="temperature"><?php echo $weatherData['current']['temperature']; ?></span>°C</p>
        <p><strong>Feels Like:</strong> <span id="feelslike"><?php echo $weatherData['current']['feelslike']; ?></span>°C</p>
        <p><strong>Humidity:</strong> <span id="humidity"><?php echo $weatherData['current']['humidity']; ?></span>%</p>
        <p><strong>Wind:</strong> <span id="wind"><?php echo $weatherData['current']['wind_speed']; ?></span> km/h 
        (<span id="wind-dir"><?php echo $weatherData['current']['wind_dir']; ?></span>)</p>
    </div>
</body>
</html>
