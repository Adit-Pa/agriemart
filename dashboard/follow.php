<?php
require '../connection.php';

$f=$_POST['f'];
$t=$_POST['t'];
$sql=mysqli_query($con,"INSERT INTO followers VALUES('$f','$t')");
?>