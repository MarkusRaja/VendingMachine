<?php
    $passlog = "empty";
    if(isset($_GET['username'])) $username=$_GET["username"];
    if(isset($_GET['password'])) $password=$_GET["password"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $login = mysqli_query($conn, "select id from accven where user='$username' and pass='$password'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($login)){
        $accid = $rowlist['id'];
        echo "Your Account ID is $accid";
        
        }
    }
    else {
        $passlog = "Error id";
        echo $passlog;
    }
?>