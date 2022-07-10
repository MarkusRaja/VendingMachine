<?php
    if(isset($_GET['a'])) $a=$_GET["a"];
    if(isset($_GET['b'])) $b=$_GET["b"];
    echo $b;
    $conn=mysqli_connect("localhost","id17582439_nft_block","Nftchain1234@","id17582439_nft");
    $reg = mysqli_query($conn, "INSERT INTO accven (user, pass) VALUES ('$a', '$b')");
    
    
?>