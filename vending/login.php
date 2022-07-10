<?php
    $passlog = "empty";
    if(isset($_GET['username'])) $username=$_GET["username"];
    if(isset($_GET['password'])) $password=$_GET["password"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $login = mysqli_query($conn, "select * from accven where user='$username' and pass='$password'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        echo"<a href='menupage.html'>Go Here</a>";
    }
    else {
        $passlog = "failed";
        echo $passlog;
    }
?>