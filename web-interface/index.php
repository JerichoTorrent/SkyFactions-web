<?php
// index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkyFactions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>SkyFactions</h1>

<!-- Landing Page Image Placeholder -->
<div class="container">
    <img src="images/placeholder.jpg" class="landing-image" alt="SkyFactions">
</div>

<!-- Section Boxes -->
<div class="container">
    <div class="section-box" onclick="window.location.href='raids.php'">
        <img src="images/placeholder.jpg" alt="Raids">
        <div class="section-box-text">Raids</div>
    </div>
    <div class="section-box" onclick="window.location.href='factions.php'">
        <img src="images/placeholder.jpg" alt="Factions">
        <div class="section-box-text">Factions</div>
    </div>
    <div class="section-box" onclick="window.location.href='islands.php'">
        <img src="images/placeholder.jpg" alt="Islands">
        <div class="section-box-text">Islands</div>
    </div>
</div>

</body>
</html>