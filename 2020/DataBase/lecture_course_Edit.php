<?php
include('header.php');
?>
<script>
    document.getElementById('class').className = "active";
</script>

<div id="main-content" align='center'>
    <h2>แก้ไขข้อมูล</h2>
    <?php
    $lcID = $_GET['id'];
    // $sql = "SELECT * FROM lec_course WHERE lc_index = $lcID";
    $sql = "SELECT * FROM lec_course INNER JOIN lecture ON lec_course.lec_id = lecture.lec_id
    INNER JOIN course ON lec_course.course_id = course.course_index WHERE lc_index = $lcID";
    $res = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
    ?>

            <form class="post-form" action="lecture_course_update_P.php" method="post">
                <div class="form-group">
                    <label>รายวิชา </label>
                    <label>เปลี่ยนจาก <?php echo " [ " .  $row['course_name'] . " ] เป็น"; ?></label>
                    <input type="hidden" name="lc_id" value="<?php echo  $row['lc_index']; ?>">
                    <?php
                    $q = "SELECT * FROM course ";
                    $result = mysqli_query($dbcon, $q);
                    ?>
                    <select name="cs_idName">
                        <option value="" selected disabled>--Select--</option>
                        <?php
                        while ($row1 = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<option value='$row1[0]'>$row1[2]  $row1[3]</option>";
                        } ?>
                    </select>
                    <br>
                    <label>อาจารย์ผู้สอน </label>
                    <label>เปลี่ยนจาก <?php echo " [ " .  $row['lecture_name'] . " ] เป็น"; ?></label>
                    <?php
                    $q2 = "SELECT * FROM lecture ";
                    $result2 = mysqli_query($dbcon, $q2);
                    ?>
                    <select name="lectureID">
                        <option value="" selected disabled>--Select--</option>
                        <?php
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                            echo "<option value='$row2[0]'>$row2[1] </option>";
                        } ?>
                    </select>
                    <br>
                    <input class="submit" type="submit" value="Update">
                </div>
            </form>
    <?php }
    } ?>
</div>