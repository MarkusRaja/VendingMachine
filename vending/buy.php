<?php
    $passlog = "empty";
    $balance = 0;
    if(isset($_GET['susername'])) $susername=$_GET["susername"];
    if(isset($_GET['spassword'])) $spassword=$_GET["spassword"];
    if(isset($_GET['motorid'])) $motorid=$_GET["motorid"];
    $price = 0;
    $machinestats = false;
    if($motorid == "1"){
        $price = 4000;
    }
    else if($motorid == "2"){
        $price = 6000;
    }
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $login = mysqli_query($conn, "select balance from accven where user='$susername' and pass='$spassword'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        while($rowlist = mysqli_fetch_array($login)){
        $balance = $rowlist['balance'];
        
        }
        if($balance >= $price){
            $motor1 = 0;
            $motor2 = 0;
            $machine = mysqli_query($conn, "select motor1, motor2 from motors");
            while($rowlist1 = mysqli_fetch_array($machine)){
            $motor1 = $rowlist1['motor1'];
            $motor2 = $rowlist1['motor2'];
            }
            if($motorid == "1"){
                if($motor1 == 0){
                    $newbalance = $balance - $price;
                    $addcash = mysqli_query($conn, "UPDATE accven SET balance = $newbalance where user='$susername' and pass='$spassword';");
                    $run = mysqli_query($conn, "UPDATE motors SET motor1 = 1");
                    echo "Buy Done This machine running";
                }
                else{
                    echo "Motor 1 still running status please check it";
                }
                
            }
            else if($motorid == "2"){
                if($motor2 == 0){
                    $newbalance = $balance - $price;
                    $addcash = mysqli_query($conn, "UPDATE accven SET balance = $newbalance where user='$susername' and pass='$spassword';");
                    $run = mysqli_query($conn, "UPDATE motors SET motor2 = 1;");
                    echo "Buy Done This machine running";
                }
                else{
                    echo "Motor 2 still running status please check it";
                }
                
            }
        }
        else{
            echo "Your Cash not enough";
        }
        
    }
    else {
        $passlog = "No Account";
        echo $passlog;
    }
?>