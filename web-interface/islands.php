<?php
// islands.php
include 'db_connect.php';

// Fetch islands from the database
function getIslands($conn, $type = 'player') {
    $column = $type == 'player' ? 'player_islands' : 'faction_islands';
    $sql = "SELECT * FROM $column ORDER BY created_date DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$type = $_GET['type'] ?? 'player';
$islands = getIslands($conn, $type);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Islands - SkyFactions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Islands</h1>

<div class="navbar">
    <a href="islands.php?type=player">Player Islands</a>
    <a href="islands.php?type=faction">Faction Islands</a>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Creation Date</th>
                <th>Owner</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($islands as $island): ?>
                <tr>
                    <td><?php echo $island['created_date']; ?></td>
                    <td><?php echo $island['owner']; ?></td>
                    <td><?php echo $island['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
