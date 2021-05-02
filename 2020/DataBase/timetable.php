<?php
include('header.php');
?>
<script>
    document.getElementById('timetable').className = "active";
</script>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Vanilla javascript plugin for building nice responsive timetables">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/timetable.css">
    <!-- <link rel="stylesheet" href="styles/demo.css">  -->
</head>

<body>

    <div id="main-content" class="div7">
        <br>
        <button class="button"><a href="timetableAdd.php">เพิ่มตารางการใช้ห้อง</a></button>
    </div>
    <br>
    <table>
        <tbody>
            <tr></tr>
            <tr>
                <td style='color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  ;'>
                    <h2>ตรวจสอบตารางการใช้ห้อง</h2>
                </td>
            </tr>

            <tr>
                <td style='padding: 5px;'>
                    <div class="div4">



                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="post-form" method="POST">
                            <div class="form-group">
                                <?php
                $q = "SELECT * FROM room ";
                $result = mysqli_query($dbcon, $q);
                ?>
                                <select name="room_id">
                                    <option value="" selected disabled>--กรุณาระบุห้องเรียน--</option>
                                    <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                    } ?>
                                </select>

                                <select type="text" name="year">
                                    <option value="" disabled>--ปีการศึกษา--</option>
                                    <option value="2564" selected>2564</option>
                                    <option value="2563">2563</option>
                                    <option value="2562">2562</option>
                                </select>

                                <select name="semester">
                                    <option value="" disabled>--ภาคการศึกษา--</option>
                                    <option value="1" selected>ภาคต้น</option>
                                    <option value="2">ภาคปลาย</option>
                                    <option value="3">ภาคฤดูร้อน</option>
                                </select>


                                <input class="submit" type="submit" value="ค้นหา" name="showbtn">
                            </div>

                        </form>

        
                        <div class="div6">
                            <?php

            if (isset($_POST['showbtn'])) {
                $room_id = $_POST['room_id'];
                $semester = $_POST['semester'];
                $year =  $_POST['year'];
                $sql = "SELECT * FROM timetable INNER JOIN lecture 
                ON timetable.lec_id = lecture.lec_id
                INNER JOIN course ON timetable.course_id = course.course_index 
                WHERE room_id = '$room_id' AND timetable.semester = $semester AND timetable.year = $year ";
                $res = mysqli_query($dbcon, $sql) or die("Query Unsuccessful***");

                // ข้อความแสดงห้องเรียน
                $ss = "SELECT * FROM room WHERE room_id = $room_id ";
                $rs = mysqli_query($dbcon, $ss) or die("Query Unsuccessful1");
                $rr = mysqli_fetch_assoc($rs);

                $ss2 = "SELECT * FROM timetable WHERE semester = $semester ";
                $rs2 = mysqli_query($dbcon, $ss2) or die("Query Unsuccessful2");
                $rr2 = mysqli_fetch_assoc($rs2);

                $ss3 = "SELECT * FROM timetable WHERE year = $year ";
                $rs3 = mysqli_query($dbcon, $ss3) or die("Query Unsuccessful3");
                $rr3 = mysqli_fetch_assoc($rs3)

            ?>
                            <!-- Start Timetable -->
                            <br>
                            <h3 style="text-align: center">ตารางการใช้ห้อง <?php echo $rr['room_name'] . ' ภาคการศึกษา ' . $rr2['semester'] ?> ปีการศึกษา <?php echo $rr3['year'] ?></h3>
                            <div class="timetable"></div>

                            <script src="scripts/timetable.js"></script>

                            <script>
                                var timetable = new Timetable();
                                timetable.setScope(7, 20)
                                timetable.addDay(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']);
                            </script>
                            <!-- End Timetable -->
                            <?php
                // Start Table Data
                if (mysqli_num_rows($res) > 0) {
                    while ($row1 = mysqli_fetch_assoc($res)) {

                        $course_text = $row1['course_id'] . '  ';
                        //  $course_text = $row1['course_id'] . '  ' . $row1['course_name'];
                        $teacher_text = "อ." . $row1['lecture_name'];
                        
                        // echo $timetable_id = $row1['timetable_id'];
                ?>
                            <script>
                                var s_time = new Date(2015, 7, 17, 9, 00) //for start time
                                var e_time = new Date(2015, 7, 17, 10, 00) //for end time
                                s_time.setHours(<?php echo $row1['start_hour'] ?>)
                                s_time.setMinutes(<?php echo $row1['start_min'] ?>)
                                e_time.setHours(<?php echo $row1['end_hour'] ?>)
                                e_time.setMinutes(<?php echo $row1['end_min'] ?>)
                                timetable.addEvent('<?php echo $course_text . '(' . $teacher_text . ' ) ' ?>', '<?php echo $row1['day'] ?>', s_time, e_time, {
                                    onClick: function(event) {
                                        window.alert(event.name + '\n' + event.location +
                                            ' <?php echo $row1['start_hour'] . ':' . $row1['start_min'] . ' - ' . $row1['end_hour'] . ':' . $row1['end_min'] ?>' +
                                            '\nID :  <?php echo $row1['timetable_id'] ?>');
                                    }
                                });

                            </script>
                            <?php
                    }
                    // end Table Data
                    ?>

                            <script>
                                // render Table
                                var renderer = new Timetable.Renderer(timetable);
                                renderer.draw('.timetable');

                            </script>
                            <?php
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



</body>
