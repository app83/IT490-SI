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
            #outer{width:350px;background:#fff;text-align:center;}
            #cover{border:2px solid #111;border-radius:7px;box-shadow:inset 0 0 13px #888;padding:7px 0}
            .main{table-layout:fixed;width:94%;border:0;border-collapse:collapse;margin:0 auto;}
            .main td{padding:0 8px;vertical-align:middle;text-align:left;border:0;font:500 11px arial}
            .main input{width:96%;border:1px solid #ccc;margin:2px 0;padding:0 2%;height:17px;text-align:right;font:500 11px arial;background:none;}td.ac {text-align:center}
            .main select{width:100%;border:1px solid #ccc;margin:2px 0;background:#fff;height:18px;font:500 11px arial}.main button{width:100%;font:600 12px arial;margin:2px 0;}.w60{width:60%}.w40{width:40%}
        </style>
        <title>BMI Calculator</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel= "stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
	<div class= "main">
      <nav>
        <div class= "logo">
          <img src= "images/logo.png" alt="" width="200" height="100">
        </div>
        <ul class= "nav-bar">
	<li><a href="nutritionapi.php">Nutrition</a></li> 
	<li><a href="bmi.php">BMI Calculator</a></li> 	
	 <li><form action="logout.php"><input type="submit" value="Logout"></form></li>	
        </ul>
      </nav>
    </div>
    <div class="bg-image"> </div> 
	<div class="bg-text">
        <div id=outer><b>Body Mass Index (BMI) Calculator</b>
            <div id=cover>
                <form name=fn>
                    <table class=main>
                        <col class=w60><col class=w60>
                        <tr><td>Measuring System<td>
                            <select id=msm onchange=msystem();>
                                <option value=metric>Metric (Kgs, Cms)
                                    <option value=us>US (lbs, inches)
                            </select>
                        <tr><td>Height<span id=thm> (Cms Or inches)</span>
                            <td><input id=hm><tr><td>Weight <span id=twm> (Kgs Or lbs)</span>
                            <td><input id=wm>
                        <tr><td><button type=reset>Reset</button>
                            <td><button type=button onclick='bmass();'>Submit</button>
                        <tr><td>Body Mass Index (BMI)
                            <td><input id=bmi class=op>
                        <tr><td>Normal BMI range
                            <td><input class=op id=nbmi value='18.5-25 kg/m2'>
                        <tr><td colspan=2 class=ac><br>The calculations are based on WHO recommendations.
                    </table>
                </form>
            </div>
        </div>
        <script>
            var $=function( id ){
                return document.getElementById(id);
            };
                function msystem(){
                    if($('msw').value=='metric'){
                        $('thw').innerHTML=' (Cms)';
                    }
                    else{
                        $('thw').innerHTML=' (inches)';
                        };

                        if($('msm').value=='metric'){
                            $('thm').innerHTML=' (Cms)';$('twm').innerHTML=' (Kgs)';
                        }
                        else{
                            $('thm').innerHTML=' (inches)';$('twm').innerHTML=' (lbs)';
                        };

                        if($('msf').value=='metric'){
                            $('thf').innerHTML=' (Cms)';
                            $('tneck').innerHTML=' (Cms)';
                            $('twaist').innerHTML=' (Cms)';
                            $('thips').innerHTML=' (Cms)';
                        }
                        else{
                            $('thf').innerHTML=' (inches)';
                            $('tneck').innerHTML=' (inches)';
                            $('twaist').innerHTML=' (inches)';
                            $('thips').innerHTML=' (inches)';
            }
            }
                function bmass (){
                    var ms=$('msm').value;
                    var height=$('hm').value;
                    var weight=$('wm').value;
                    if(height==null || height.length==0 || weight==null || weight.length==0 ){
                        $('bmi').value="Pl. enter data.";
                    }
                    else{
                        $('bmi').value="";
                    }

                    if(ms=='metric'&&height>0){
                        $('bmi').value=Math.round(weight/(height*height/10000)*100)/100+" kg/m2 " 
                    }
                    else if(ms=='us'&&height>0){
                        $('bmi').value=Math.round(703*weight/(height*height)*100)/100+" kg/m2 "
                    }
                }
        </script>


	</div>
        
    </body>
</html>

