<?php 
$array = Array ( 
    'musicals' => 
        Array (
            0 => 'Oklahoma',
            1 => 'The Music Man', 
            2 => "South Pacific" 
        ),
    'dramas' =>
        Array (
            0 => 'Lawrence of Arabia', 
            1 => 'To Kill a Mockingbird', 
            2 => 'Casablanca' 
        ) ,
    'mysteries' =>
        Array (
            0 => 'The Maltese Falcon', 
            1 => 'Rear Window',
            2 => 'North by Northwest' 
        ) 
);
// sort the array in descending order
krsort($array);

//function to print the array in specific style
function print_array($array){
    foreach ($array as $key => $value) {
        echo strtoupper($key) . "<br>";
        foreach ($value as $key => $value) {
            echo "----> " . $key . " = " . $value . "<br>";
            
        }
    }    
}
// run the function
print_array($array)
?>

