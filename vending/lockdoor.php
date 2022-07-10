<?php
    
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $run = mysqli_query($conn, "UPDATE lockdoor SET lockdoor1 = 0");
    echo"Machine Locked"
?>