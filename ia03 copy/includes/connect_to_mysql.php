<?php  

$mysqli = new mysqli("sulley.cah.ucf.edu", 'ra072140', 'amilu91', 'ra072140');

$errnum=mysqli_connect_errno();
if ($errnum) 
{
    $errmsg=mysqli_connect_error();
  print "Connect failed. error number=$errnum<br />
          error message=$errmsg";    
  exit();
}
?>