<?php 
    function is_palindrome($input){
        for( $i=0; $i<(strlen($input) / 2); $i+=2 ){
            $end = strlen($input) - 1 - $i;
            if($input[$i] != $input[$end]){
                return False;
            }
        }
         return True;   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Palindrome</title>
</head>
<body>
    <div class="container">
        <form action="palindrome.php" method="POST">
            <input type="text" name="input" placeholder="Enter text to see if it is Palindrome or not"><br>
            <input type="submit" value="Check">
        </form>
        <h1>
            <?php 
            if(isset($_POST['input']))
                echo (is_palindrome($_POST['input'])) ? 
                    "Great, It's Palindrome" : 
                    7yu"Ops, It's not Palindrome"; ?>
        </h1>
    </div>
</body>
</html>