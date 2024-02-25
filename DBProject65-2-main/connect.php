<?php 

$servername ='localhost';
$username ='root';
$password = '';
$dbname = 'dd';

$conn = mysqli_connect($servername,$username,$password
,$dbname);

if(!$conn){
    die("failed") . mysqli_connect_error();

}
else{
    //echo "connect ok ";
}

?>