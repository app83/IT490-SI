<?php
session_set_cookie_params(0,"/");
session_start();

include ("account.php");
include ("myfns.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
mysqli_select_db($db, $dbname);

gatekeeper();

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(odd) {
            background-color:white;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
	<link rel= "stylesheet" type="text/css" href="css/style.css">
</head>

<body style="background-color: #e4f4e4;">
	<div class= "main" >
      <nav>
        <div class= "logo">
          <img src= "images/healtholic.jpeg" alt="" width="150" height="150">
        </div>
        <ul class= "nav-bar">
	<li><a href="nutritionapi.php">Nutrition</a></li> 
	<li><a href="bmi2.php">BMI Calculator</a></li> 	
	 <li><form action="logout.php"><input type="submit" value="Logout"></form></li>	
        </ul>
      </nav>
    </div>
   <div style="text-align: center;">
       <div>
        <h3>Nutrition Search</h3>
        <input onkeyup="search()" type=" text" id="myText" value="">
       </div>
   </div>
   
    <div id="searchresults"></div>
    <p id="demo"></p>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>

        var filterData = []

        function search() {
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            obj = { table: "customers", limit: 20 };

            var searchValue = document.getElementById('myText').value
            axios.get(`https://api.edamam.com/api/food-database/parser?nutrition-type=logging&app_id=07d50733&app_key=80fcb49b500737827a9a23f7049653b9&ingr=${searchValue}`)
                .then(response => {
                    var resultsData = response.data.hints;
                    myObj = resultsData
                    txt += "<table border='1'><tr><th>Food</th><th>Image</th><th>Energy</th><th>Calories</th></tr>"
                    $.each(resultsData, function (index, value) {
                        const food = value.food
                        const brand = food.brand ? food.brand : ''
                        const label = food.label ? food.label : ''
    
                        const nutrients = food.nutrients
                        const measures = value.measures
                        console.log(food, measures)
                        txt += "<tr><td>" + brand + ''+ label + "</td><td>" + `<img style="width:80px" src=${food.image}></img>` + "</td><td>" + Math.round( nutrients.ENERC_KCAL) + ' kcal' + "</td><td>" + 'protein: ' + Math.round(nutrients.PROCNT) + 'g' +'<br>' + 'Carbs: ' + Math.round(nutrients.FAT) +'g'  + '<br>'+ 'Fat: ' + Math.round(nutrients.CHOCDF) + 'g' + "</td></tr>"
                    });
                    txt += "</table>"    
                    document.getElementById("demo").innerHTML = txt;
                })
                .catch(error => {
                    
                }
                );
        }
    </script>
</body>

</html>
