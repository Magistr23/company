<?php
session_start();

include 'app/blocks/header/header.php'; 

echo "<div class='main'>";

include 'app/view/company.php';

echo "</div>";

include 'app/blocks/footer/footer.php'; 