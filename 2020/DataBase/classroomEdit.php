<?php
include('header.php');
?>
<script>
    document.getElementById('classroom').className = "active";
</script>

<div id="main-content">
    <h2>Update Teacher Name</h2>
    <?php
    $roomID = $_GET['id'];
    $sql = "SELECT * FROM room WHERE room_id = '$roomID'";
    $result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form class="post-form" action="classroomUpdate_P.php" method="post">
                <div class="form-group">
                    <label><?php echo "Update [ " .  $row['room_name'] . " ] to"; ?></label>
                    <input type="hidden" name="room_id" value="<?php echo  $row['room_id']; ?>">
                    <input type="text" name="room_name" value="<?php echo  $row['room_name']; ?>">
                </div>
                <input class="submit" type="submit" value="Update">
            </form>
    <?php }
    } ?>

</div>