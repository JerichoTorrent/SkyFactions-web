<?php
include "db_connect.php";

function getIslands($conn, $type = 'player') {
    $column = ($type == 'player') ? 'islands' : 'factionIslands';

    // Adjusted query to match available columns
    $sql = "SELECT id, uuid, level, gems, runes, last_raided FROM " . $column . " ORDER BY last_raided DESC";
    $result = $conn->query($sql);
    
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get the type parameter from the URL (player or faction)
$type = $_GET['type'] ?? 'player';

// Fetch the islands based on the type
$islands = getIslands($conn, $type);

// Close the connection after data is retrieved
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Islands</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b1b32;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background-image: url('image.png'); /* Assuming the image file is saved as 'image.png' */
            background-size: cover;
            padding: 20px;
            color: #fff;
        }

        h1 {
            font-size: 3em;
            margin: 0;
        }

        .navbar {
            margin: 20px 0;
        }

        .navbar a {
            color: #3498db;
            text-decoration: none;
            font-size: 1.2em;
            margin: 0 15px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 10px;
            background-color: #2c2c54;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #fff;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #3498db;
        }

        tr:nth-child(even) {
            background-color: #2c3e50;
        }

        tr:nth-child(odd) {
            background-color: #34495e;
        }
    </style>
</head>
<body>

<header>
    <h1>Islands</h1>
</header>

<div class="navbar">
    <a href="islands.php?type=player">Player Islands</a>
    <a href="islands.php?type=faction">Faction Islands</a>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>UUID</th>
                <th>Level</th>
                <th>Gems</th>
                <th>Runes</th>
                <th>Last Raided</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($islands as $island): ?>
                <tr>
                    <td><?php echo $island['id']; ?></td>
                    <td><?php echo $island['uuid']; ?></td>
                    <td><?php echo $island['level']; ?></td>
                    <td><?php echo $island['gems']; ?></td>
                    <td><?php echo $island['runes']; ?></td>
                    <td><?php echo $island['last_raided']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>