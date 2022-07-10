<?php
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $machine = mysqli_query($conn, "select lockdoor1 from lockdoor");
    $lockdoor1 = 0;
    while($rowlist1 = mysqli_fetch_array($machine)){
    $lockdoor1 = $rowlist1['lockdoor1'];
    }
    if($lockdoor1 == 1){
        echo "1";
    }
    else{
        echo "0";
    }
?>