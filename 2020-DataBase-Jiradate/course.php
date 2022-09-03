<?php
include('header.php');
?>
<script>
    document.getElementById('course').className = "active";
</script>

<div align='center'>
<div>
    <br>
    <button class="button"><a href="courseAdd.php">เพิ่มรายวิชา</a></button>

</div>
<br>
<div>
    <table>
        <tbody>
            <tr>
                <td style=' color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  '>
                    <h2>รายวิชาที่เปิดสอน</h2>
                    
                </td>
            </tr>
            <tr>
                <td style='padding: 5px;'>
                    
                    <div class="div2">
                    
    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="post-form" method="POST">
        
            <label text-align="center">***กรุณาระบุให้ครบทั้ง 3 ขั้นตอน</label>
            <br><br>
        <div class="form-group">
    
            <label>ขั้นที่ 1 : หลักสูตร</label>
            <select name="degree">
                <option value="" selected disabled>--กรุณาระบุหลักสูตร--</option>
                <option value="bachelor">วิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์</option>
                <option value="inter">วิศวกรรมศาสตร์บัณฑิต สาขาสื่อดิจิทัล นานาชาติ</option>
                <option value="master">ป.โท และ ป.เอก สาขาวิศวกรรมคอมพิวเตอร์</option>
            </select>
        </div>
        <div class="form-group">
            <label>ขั้นที่ 2 : วิชาบังคับ(ชั้นปี) / วิชาเลือก</label>
            <select name="year_type">
                <option value="" selected disabled>--ระบุชั้นปี/วิชาเลือก--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="0">วิชาเลือก</option>
                <option value="5">ป.โท ป.เอก</option>
            </select>
        </div>
        <div class="form-group">
            <label>ขั้นที่ 3 : ภาคการศึกษา</label>
            <select name="semester">
                <option value="" selected disabled>--ภาคการศึกษา--</option>
                <option value="1">ภาคต้น</option>
                <option value="2">ภาคปลาย</option>
                <option value="3">ภาคฤดูร้อน</option>
                <option value="0">วิชาเลือก</option>
            </select>
            

        </div>
        
        
        <br>
        <input class="submit" type="submit" value="ค้นหา" name="showbtn" >
    </form>
                    </div>

    <?php
    if (isset($_POST['showbtn'])) {

        $degree = $_POST['degree'];
        $year_type = $_POST['year_type'];
        $semester = $_POST['semester'];

    ?>


        <div class="div5">
            <h2 style="color: #192a56;">CoE Course</h2>

            <?php
            $sql = "SELECT * FROM course WHERE degree = '$degree' and year_type = '$year_type' and semester = '$semester'";
            $result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");
            if (mysqli_num_rows($result) > 0) {
                if ($degree == 'bachelor') {
                    $text1 = 'หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์';
                } elseif ($degree == 'inter') {
                    $text1 = 'หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาสื่อดิจิทัล นานาชาติ';
                } elseif ($degree == 'master') {
                    $text1 = 'หลักสูตร ป.โท และ ป.เอก สาขาวิศวกรรมคอมพิวเตอร์';
                }

                if ($year_type == '1') {
                    $text2 = 'ชั้นปี 1';
                } elseif ($year_type == '2') {
                    $text2 = 'ชั้นปี 2';
                } elseif ($year_type == '3') {
                    $text2 = 'ชั้นปี 3';
                } elseif ($year_type == '4') {
                    $text2 = 'ชั้นปี 4';
                } elseif ($year_type == '5') {
                    $text2 = '';  //ป.โท เอก
                } elseif ($year_type == '0') {
                    $text2 = 'วิชาเลือก';
                }

                if ($semester == '1') {
                    $text3 = 'ภาคต้น';
                } elseif ($semester == '2') {
                    $text3 = 'ภาคปลาย';
                } elseif ($semester == '3') {
                    $text3 = 'ภาคฤดูร้อน';
                } elseif ($semester == '0') {
                    $text3 = ''; //วิชาเลือก
                }
            ?>
                <h3> <?php echo $text1  ?></h3>
                <h3><?php echo $text2 . "  " . $text3 ?></h3>
                <table cellpadding="7px">
                    <thead>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th>หน่วยกิต</th>
                        <th>เงื่อนไขรายวิชา</th>
                        <th>หมายเหตุ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <!-- lecture -->
                        <?php
                        $sql1 = "SELECT * FROM course WHERE degree = '$degree' and year_type = '$year_type' and semester = '$semester' and lec_lab = 'lec' ";
                        $result1 = mysqli_query($dbcon, $sql1) or die("Query Unsuccessful");
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                            <tr>
                                <td> <?php echo $row1['course_id']  ?></td>
                                <td> <?php echo $row1['course_name'] ?></td>
                                <td> <?php echo $row1['course_weight'] ?></td>
                                <td> <?php echo $row1['course_cond'] ?></td>
                                <td> <?php echo $row1['course_option'] ?></td>
                                <td>
                                    <a href="courseEdit.php?id=<?php echo $row1['course_index'] ?>">Edit</a>
                                    <a href="courseDelete-inline_P.php?id=<?php echo $row1['course_index'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php }

                        // Lab
                        $sql2 = "SELECT * FROM course WHERE degree = '$degree' and year_type = '$year_type' and semester = '$semester' and lec_lab = 'lab' ";
                        $result2 = mysqli_query($dbcon, $sql2) or die("Query Unsuccessful");
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <td> <?php echo $row2['course_id']  ?></td>
                                <td> <?php echo $row2['course_name'] ?></td>
                                <td> <?php echo $row2['course_weight'] ?></td>
                                <td> <?php echo $row2['course_cond'] ?></td>
                                <td> <?php echo $row2['course_option'] ?></td>
                                <td>
                                    <a href="courseEdit.php?id=<?php echo $row2['course_index'] ?>">Edit</a>
                                    <a href="courseDelete-inline_P.php?id=<?php echo $row2['course_index'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            <?php } else {
                echo "No record found";
            } ?>

        

    <?php
        mysqli_close($dbcon);
    }
    ?>

</div>
                </td>
            </tr>
        </tbody>
    </table>
</div>



<div>
    <br>
    <br>
</div>


</div>