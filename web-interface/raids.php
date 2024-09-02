<?php
// raids.php
include 'db_connect.php';

// Fetch raids from the database
function getRaids($conn, $type = 'player', $sort = 'DESC') {
    $column = $type == 'player' ? 'player_raids' : 'faction_raids';
    $sql = "SELECT * FROM $column ORDER BY raid_date $sort";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$type = $_GET['type'] ?? 'player';
$sort = $_GET['sort'] ?? 'DESC';
$raids = getRaids($conn, $type, $sort);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raids</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Raiding history on the Torrent SkyFactions</h1>

<div class="navbar">
    <a href="raids.php?type=player">Player Raids</a>
    <a href="raids.php?type=faction">Faction Raids</a>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Raid Date</th>
                <th>Tier</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($raids as $raid): ?>
                <tr>
                    <td><?php echo $raid['raid_date']; ?></td>
                    <td><?php echo $raid['tier']; ?></td>
                    <td><?php echo $raid['name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>