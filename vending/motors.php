<?php
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $machine = mysqli_query($conn, "select motor1, motor2 from motors");
    $motor1 = 0;
    $motor2 = 0;
    while($rowlist1 = mysqli_fetch_array($machine)){
    $motor1 = $rowlist1['motor1'];
    $motor2 = $rowlist1['motor2'];
    }
    if($motor1 == 1){
        echo "1";
    }
    else if($motor2 == 1){
        echo "2";
    }
    else{
        echo "0";
    }
?>