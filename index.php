<?php
include "DivideByZeroException.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $numerator = $_REQUEST['numerator'];
    $denominator = $_REQUEST['denominator'];

    function divide($numerator,$denominator)
    {
        if ($denominator == 0 ){
            throw new DivideByZeroException();
        }else{
            return $numerator / $denominator;
        }
    }

}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="get">
    Numerator :
    <input type="number" name="numerator">
    Denominator :
    <input type="number" name="denominator">
    <button type="submit">CAL</button>
</form>
<div>
    <?php
    if (isset($numerator,$denominator)){
        try {
           echo divide($numerator,$denominator);
        }catch (DivideByZeroException $e){
            echo "Error : " . $e;
        }
    }
    ?>
</div>
</body>
</html>
