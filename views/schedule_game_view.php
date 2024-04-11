<form id="scheduleGameForm" method="post" action="../actions/schedule_game.php">
    <select name="player1Id" required>

        <?php
        include '../settings/connection.php';
        $sql = "SELECT pid, fname, lname FROM users";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['pid'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
        }
        ?>
    </select>
    <select name="player2Id" required>
        <?php
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['pid'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
        }
        ?>
    </select>
    <button type="submit">Schedule Game</button>
</form>
