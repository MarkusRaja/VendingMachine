<?php
    $passlog = "empty";
    if(isset($_GET['username'])) $username=$_GET["username"];
    if(isset($_GET['password'])) $password=$_GET["password"];
    
    if($username == "admin"&&$password == "admin"){
        echo'<label id="font3">Account ID</label><br><input type="number" id="accid"><br><label id="font2">Amount in Rupiah</label><br><input type="number" id="amount"><input type="button" onclick="addcash()" value="Add Cash Now"><input type="button" onclick="opendoor()" value="Open Vending Machine Now"><input type="button" onclick="lockdoor()" value="Lock Vending Machine Now"><div id="checkaje"></div>';
    }
    else {
        $passlog = "failed";
        echo $passlog;
    }
?>