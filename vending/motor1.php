<?php
    
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $run = mysqli_query($conn, "UPDATE motors SET motor1 = 0");
    $t=time();
    $doc = mysqli_query($conn, "INSERT INTO transven (timestamp, product_id, stats) VALUES ('$t', '1', 'OK')");
    
?>