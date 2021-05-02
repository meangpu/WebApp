<?php
include('header.php');
?>
<script>
    document.getElementById('class').className = "active";

</script>

<div align='center'>
    <br>
    <button class="button"><a href="lecture_course_add.php">เพิ่มรายชื่อผู้สอนในรายวิชา</a></button>
</div>

<div align='center'>
    <br>
    <table>
        <tbody>
            <tr>
                <td style='color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  ;'>
                    <h2>เลือกวิชาที่ต้องการดูผู้สอน</h2>
                </td>
            </tr>
            <td style='padding: 5px;'>
                <div class="div4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" class="post-form" method="POST">
                        <div class="form-group">
                            <?php
            $q = "SELECT * FROM course ";
            $result = mysqli_query($dbcon, $q);
            ?>
                            <select name="cs_idName">
                                <option value="" selected disabled>--ระบุรายวิชา--</option>
                                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    echo "<option value='$row[0]'>$row[2]  $row[3]</option>";
                } ?>
                            </select>
                        </div>
                        <br>
                        <input class="submit" type="submit" value="ค้นหา" name="showbtn">

                    </form>
                    <br>
                    <div>
                        <?php

        if (isset($_POST['showbtn'])) {
            $course_index = $_POST['cs_idName'];
            $sql = "SELECT * FROM lec_course INNER JOIN lecture ON lec_course.lec_id = lecture.lec_id
    INNER JOIN course ON lec_course.course_id = course.course_index WHERE course_index = $course_index";
            $res = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

            if (mysqli_num_rows($res) > 0) {
                $s1 = "SELECT * FROM course WHERE course_index = $course_index";
                $r1 = mysqli_query($dbcon, $s1);

                while ($row1 = mysqli_fetch_assoc($r1)) {
                    echo "รายวิชา : ". $row1['course_id'] . '  ' . $row1['course_name'] . "<br>";
                }

                while ($row2 = mysqli_fetch_assoc($res)) {
                    echo "อาจารย์ " . $row2['lecture_name'] . "<br>";
                }
            } else {
                echo "No record found";
            }
        ?>
                    </div>

                    <?php mysqli_close($dbcon);
        }
?>
                </div>
            </td>
            </tr>
        </tbody>
    </table>

</div>
