<?php
    $conn = mysqli_connect("localhost", "root", "", "inventaria");
    if( !$conn ){
        die("Gagal terhubung dengan database: ");
    }
