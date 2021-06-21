<?php 
    // Url de l'API
    $url = "http://api.openweathermap.org/data/2.5/weather?q=Youssoufia&lang=en&units=metric&appid=bb50c2148901ddc9d04126129ece044f";

    // to read file into a string
    $raw = file_get_contents($url);
    // change it to std class
    $json = json_decode($raw);
    
    // Name of the city
    $name = $json->name;
    // Météo
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;
    // Températures
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;
    // Vent
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="banner">
            <div class="img-text">
            <div class="container text-center py-5">
                <h1>Today's weather in <strong><?php echo $name; ?></strong></h1>
                <h2><?php echo $weather; ?></h2>

                <div class="row justify-content-center align-items-center">
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                     <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                        </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                        </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                                <?php echo $temp; ?> °C / Feeling <?php echo $feel_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h - <?php echo $deg; ?> ° <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div><h2><?php echo date("l Y-m-d"). " / "; ?></h2></div>
                    <div class="heures"></div>    
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>