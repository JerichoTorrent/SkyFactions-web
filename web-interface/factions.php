<?php
// factions.php
include 'db_connect.php';

// Fetch factions from the database
function getFactions($conn) {
    $sql = "SELECT * FROM factions";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$factions = getFactions($conn);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Factions</h1>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Faction Name</th>
                <th>Lord</th>
                <th>Date Created</th>
                <th>Members</th>
                <th>Successful Raids</th>
                <th>Gems</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($factions as $faction): ?>
                <tr>
                    <td><?php echo $faction['name']; ?></td>
                    <td><a href="https://namemc.com/profile/<?php echo $faction['lord']; ?>" target="_blank"><?php echo $faction['lord']; ?></a></td>
                    <td><?php echo $faction['date_created']; ?></td>
                    <td><?php echo $faction['member_count']; ?></td>
                    <td><?php echo $faction['successful_raids']; ?></td>
                    <td><?php echo $faction['gems']; ?></td>
                    <td><?php echo $faction['balance']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
