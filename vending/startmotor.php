<?php
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $reg = mysqli_query($conn, "UPDATE motors SET motor1 = 0, motor2 = 0;");
    echo "Reset Motor stats";
    
    
?>