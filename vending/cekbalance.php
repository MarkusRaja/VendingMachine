<?php
    $passlog = "empty";
    if(isset($_GET['username'])) $username=$_GET["username"];
    if(isset($_GET['password'])) $password=$_GET["password"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $login = mysqli_query($conn, "select balance from accven where user='$username' and pass='$password'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($login)){
        $balance = $rowlist['balance'];
        echo "Your balances Rp $balance";
        
        }
    }
    else {
        $passlog = "Error Balance";
        echo $passlog;
    }
?>