<?php
$bytes = 8;
$random = bin2hex(openssl_random_pseudo_bytes($bytes));
echo $random;
?>