<?php
	$getpage = $_GET['page'];
	include "header.php";
	include "navigationbar.php";
	include "home.php";
	include "footer.php";
    // we insert the contain of the files
    
    //* <form method = "POST" action = "login_processubg.php">
    //*     <input type = "text" name = "uname">
    //*     <input type = "password" name="upassword">
    //*     <button type = "submit" label = "login">
    //* </form>

    if(isset $_POST['uname'])
    $uname = $_POST['uname'];

    if(isset $_POST['upassword'])
    $upassword = $_POST['upassword'];

?>