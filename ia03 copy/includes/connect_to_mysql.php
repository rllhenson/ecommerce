<?php  
$mysqli = new mysqli("sulley.cah.ucf.edu", 'ra072140', 'amilu91', 'ra072140');
<<<<<<< Updated upstream
// $mysqli = new mysqli("localhost", 'root', 'chocolateguy1', 'floorfive');
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
//$mysqli = new mysqli("localhost", 'root', 'chocolateguy1', 'floorfive');
=======
// $mysqli = new mysqli("localhost", 'root', 'chocolateguy1', 'floorfive');
>>>>>>> FETCH_HEAD
=======
// $mysqli = new mysqli("localhost", 'root', 'chocolateguy1', 'floorfive');
>>>>>>> FETCH_HEAD
=======
// $mysqli = new mysqli("localhost", 'root', 'chocolateguy1', 'floorfive');
>>>>>>> FETCH_HEAD
>>>>>>> Stashed changes
//$mysqli = new mysqli("localhost", 'an787958', '4E685B1987FA464388562A50A41C12DF', 'an787958');

$errnum=mysqli_connect_errno();
if ($errnum) 
{
    $errmsg=mysqli_connect_error();
  print "Connect failed. error number=$errnum<br />
          error message=$errmsg";    
  exit();
}
?>