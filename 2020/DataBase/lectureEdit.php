<?php
include('header.php');
?>
<script>
    document.getElementById('lecture').className = "active";
</script>

<div id="main-content">
    <h2>Update Teacher Name</h2>
    <?php
    $lecID = $_GET['id'];
    $sql = "SELECT * FROM lecture WHERE lec_id = '$lecID'";
    $result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form class="post-form" action="lectureUpdate_P.php" method="post">
                <div class="form-group">
                    <label><?php echo "Update [ " .  $row['lecture_name'] . " ] to"; ?></label>
                    <input type="hidden" name="lec_id" value="<?php echo  $row['lec_id']; ?>">
                    <input type="text" name="lecture_name" value="<?php echo  $row['lecture_name']; ?>">
                </div>
                <input class="submit" type="submit" value="Update">
            </form>
    <?php }
    } ?>

</div>