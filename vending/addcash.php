<?php
    $passlog = "empty";
    $balance = 0;
    if(isset($_GET['accid'])) $accid=$_GET["accid"];
    if(isset($_GET['amount'])) $amount=$_GET["amount"];
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $login = mysqli_query($conn, "select balance from accven where id='$accid'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($login)){
        $balance = $rowlist['balance'];
        
        }
        $newbalance = $balance + $amount;
        $addcash = mysqli_query($conn, "UPDATE accven SET balance = $newbalance where id='$accid'");
        echo "Buying Cash Done";
    }
    else {
        $passlog = "No Account";
        echo $passlog;
    }
?>