<?php


//-------------------------------------------------- START  FUNCTIONS ------------------------------------>

/* START REDIRECT HOME FUNCTION  */
function redirecthome($errormsg, $seconds =5)
{
	echo "<div class='alert alert-danger'>$errormsg</div>";
	//echo "<div class='alert alert-info'>You will be redirect to home page after $seconds  Seconds.</div>";
	header("refresh:$seconds;url=index.php");
	exit();
}
/* FINISH REDIRECT HOME FUNCTION  */



/* START REDIRECT INSERT FUNCTION  */
function redirectinsert($errormsg, $seconds =3)
{
	echo "<div class='alert alert-success'>$errormsg</div>";
	//echo "<div class='alert alert-info'>You will be redirect to home page after $seconds  Seconds.</div>";
	header("refresh:$seconds;url=index.php?do=Manage");
	exit();
}
/* FINISH REDIRECT INSERT FUNCTION  */

/* START REDIRECT EDIT FUNCTION  */
function redirectupdate($errormsg, $seconds =6)
{
	echo "<div class='alert alert-success'>$errormsg</div>";
	//echo "<div class='alert alert-danger'>You will be redirect to home page after $seconds  Seconds.</div>";
	header("refresh:$seconds;url=index.php?do=Add");
	exit();
}
/* FINISH REDIRECT UPDATE FUNCTION  */
//-------------------------------------------------- END  FUNCTIONS ------------------------------------>
