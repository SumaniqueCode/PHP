<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            text-decoration: none;
        }
        body{
            margin: 20px;
            padding: 20px;
        }
        button{
            border: 2px solid skyblue;
            border-radius: 3px;
            font-size: medium;
        }
    </style>
</head>

<body>
<?php
if ($_POST['submit'] !== null) {
    if ($_POST['num1'] && $_POST['num2']) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = 0;

        switch ($_POST['operation']) {
            case '+':
                $result = $num1 + $num2;
                break;

            case '-':
                $result = $num1 - $num2;
                break;

            case '*':
                $result = $num1 * $num2;
                break;

            case '/':
                $result = $num1 / $num2;
                break;

            default:
                echo ("Enter the valid number.");
                break;
        }
    } else {
        echo ("Please Enter Two Numbers.");
    }
}

   echo('The result is: '.$result);
    
?>
<br><button name="back"><a href="Calculator_PHP.html">GO BACK</a></button>
    </body>
    </html>