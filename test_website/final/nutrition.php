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

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
 <div class= "main">
      <nav>
        <div class= "logo">
          <img src= "logo.png" alt="" width="200" height="100">
        </div>
        <ul class= "nav-bar">
          <li><a href="mainpage.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="login.html">Login</a></li>
        </ul>
      </nav>
    </div>
    <div class="bg-image"> </div> 
 <div class="bg-text">
    <h3>Nutrition Search</h3>

    <input onkeyup="search()"" type=" text" id="myText" value="">
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
            axios.get(`https://api.nutritionix.com/v1_1/search/instant?branded=true&common=true&appId=778cd870&appKey=0de2019e4675112d04a62b61b1a94ec3&query=${searchValue}`)
                .then(response => {
                    var resultsData = response.data.hits;
                    myObj = resultsData
                    txt += "<table border='1'>"
                    $.each(resultsData, function (index, value) {
                        console.log(value)
                        txt += "<tr><td>" + value.fields.item_name + "</td><td>" + value.fields.brand_name + "</td><td>" + value.fields.nf_serving_size_qty + "</td><td>" + value.fields.nf_serving_size_unit + "</td></tr>"
                    });
                    txt += "</table>"    
                    document.getElementById("demo").innerHTML = txt;
                })
                .catch(error => {
                    
                }
                );
        }
    </script>
</div>
</body>

</html>
