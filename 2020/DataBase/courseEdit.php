<?php
include('header.php');
?>
<script>
    document.getElementById('course').className = "active";
</script>

<div id="main-content" align='center'>
    <h2>แก้ไขรายวิชา</h2>
    <?php
    $courseID = $_GET['id'];
    $sql = "SELECT * FROM course WHERE course_index = '$courseID'";
    $result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form class="post-form" action="courseUpdate_P.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="cs_index" value="<?php echo  $row['course_index']; ?>">
                    <label>รหัสวิชา</label>
                    <input type="text" name="cs_id" value="<?php echo  $row['course_id']; ?>">
                </div>
                <div class="form-group">
                    <label>ชื่อวิชา</label>
                    <input type="text" name="cs_name" value="<?php echo  $row['course_name']; ?>">
                </div>
                <div class="form-group">
                    <label>หลักสูตร</label>
                    <select name="degree">
                        <option value="" selected disabled>--Select--</option>
                        <option value="bachelor">วิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์</option>
                        <option value="inter">วิศวกรรมศาสตร์บัณฑิต สาขาสื่อดิจิทัล นานาชาติ</option>
                        <option value="master">ป.โท และ ป.เอก สาขาวิศวกรรมคอมพิวเตอร์</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>วิชาบังคับ(ชั้นปี) / วิชาเลือก</label>
                    <select name="year_type">
                        <option value="" selected disabled>--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="0">วิชาเลือก</option>
                        <option value="5">ป.โท ป.เอก</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>ภาคการศึกษา</label>
                    <select name="semester">
                        <option value="" selected disabled>--Select--</option>
                        <option value="1">ภาคต้น</option>
                        <option value="2">ภาคปลาย</option>
                        <option value="3">ภาคฤดูร้อน</option>
                        <option value="0">วิชาเลือก</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>หน่วยกิต</label>
                    <select name="cs_weight">
                        <option value="" selected disabled>--Select--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lecture / Lab</label>
                    <select name="lec_lab">
                        <option value="" selected disabled>--Select--</option>
                        <option value="lec">Lecture</option>
                        <option value="lab">Lab</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>เงื่อนไขรายวิชา</label>
                    <input type="text" name="cs_cond" value="<?php echo  $row['course_cond']; ?>">
                </div>

                <div class="form-group">
                    <label>หมายเหตุ</label>
                    <input type="text" name="cs_option" value="<?php echo  $row['course_option']; ?>">
                </div>

                <input class="submit" type="submit" value="Save">
            </form>
    <?php }
    } ?>

</div>