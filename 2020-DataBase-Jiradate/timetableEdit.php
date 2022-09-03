<?php
include('header.php');
?>
<script>
    document.getElementById('timetable').className = "active";

</script>

<div class="main-content" align='center'>
    <table>
        <tbody>
            <tr>
                <br><br><br>
                <td style=' color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center ; '>
                    <h2>แก้ไขเปลี่ยนแปลง วัน-เวลา</h2>
                </td>
            </tr>
            <tr>
                <td style='padding: 5px;'>

                    <div class="div2">
                        <form class="post-form" action="timetableSave_Edit.php" method="post">
                            <div class="form-group">

                                <label>โปรดระบุข้อมูลให้ครบถ้วน</label>
		    <input type="hidden" id="timetable_id" name="timetable_id" value="<?php echo $_GET["timetabID"]?>">
                                <?php
			$timetable_id = $_GET["timetabID"];
            $timetabSql = "SELECT * FROM timetable where timetable_id=$timetable_id";
            $timetabRs = mysqli_query($dbcon, $timetabSql);
			$timetab = mysqli_fetch_array($timetabRs);
			//print_r($timetab);

            $q1 = "SELECT * FROM  room ";
            $result1 = mysqli_query($dbcon, $q1);
            ?>
                                <br><label>ห้อง</label>
								<select name="room_id" disabled>
                                    <?php
                while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) {
					if($timetab["room_id"] == $row1[0]) {
						echo "<option value='$row1[0]' selected>$row1[1]</option>";
					} else {
						echo "<option value='$row1[0]'>$row1[1]</option>";
					}
                } ?>
                                </select>

                                <label>ปีการศึกษา</label>
								<select name="year" disabled>
                                    <option value="2562" <?php if($timetab["year"]=="2562") {echo "selected";}?>>2562</option>
                                    <option value="2563" <?php if($timetab["year"]=="2563") {echo "selected";}?>>2563</option>
                                    <option value="2564" <?php if($timetab["year"]=="2564") {echo "selected";}?>>2564</option>
                                </select>

                                <label>ภาคการศึกษา</label>
                                <select name="semester" disabled>
                                    <option value="1" <?php if($timetab["semester"]=="1") {echo "selected";}?>>ภาคต้น</option>
                                    <option value="2" <?php if($timetab["semester"]=="2") {echo "selected";}?>>ภาคปลาย</option>
                                    <option value="3" <?php if($timetab["semester"]=="3") {echo "selected";}?>>ภาคฤดูร้อน</option>
                                </select>
                                <br>

                                <label>วิชา</label>
                                <?php
			
            $q = "SELECT * FROM `course` ORDER BY `course`.`course_name` ASC ";
            $result = mysqli_query($dbcon, $q, );
            ?>
							   <select name="cs_idName" disabled>
                                    <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
					if($timetab["course_id"] == $row[0]) {
						echo "<option value='$row[0]' selected>$row[2]  $row[3]</option>";
					} else {
						echo "<option value='$row[0]'>$row[2]  $row[3]</option>";
					}
                } ?>
                                </select>
                                <br>

                                <label>อาจารย์ผู้สอน </label>
                                <?php
            $q2 = "SELECT * FROM lecture ";
            $result2 = mysqli_query($dbcon, $q2);
            ?>
                                <select name="lectureID" disabled>
                                    <?php
                while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
					if($timetab["lec_id"] == $row2[0]) {
						echo "<option value='$row2[0]' selected>$row2[1] </option>";
					} else {
						echo "<option value='$row2[0]'>$row2[1] </option>";
					}
                } ?>
                                </select>
                                <br>

                                <label>วัน </label>
                                <select name="day">
                                    <option value="" selected disabled>--วัน--</option>
                                    <option value="Mon" <?php if($timetab["day"]=="Mon") {echo "selected";}?>>จันทร์</option>
                                    <option value="Tue" <?php if($timetab["day"]=="Tue") {echo "selected";}?>>อังคาร</option>
                                    <option value="Wed" <?php if($timetab["day"]=="Wed") {echo "selected";}?>>พุธ</option>
                                    <option value="Thu" <?php if($timetab["day"]=="Thu") {echo "selected";}?>>พฤหัส</option>
                                    <option value="Fri" <?php if($timetab["day"]=="Fri") {echo "selected";}?>>ศกร์</option>

                                </select>
                                <br>

                                <label>เวลาเริ่ม</label>
                                <select name="start_hour" id="start_hour">
                                    <!--option value="" selected disabled>--hour--</option-->

                                    <?php
                $start = "7";
                $end = "20";
                $tNow = $start;
                while ($tNow <= $end) {
 					if($timetab["start_hour"] == $tNow){ $selected="selected"; } else { $selected=""; }
                    echo '<option value="' . $tNow . '"'.$selected.'>' . $tNow . '</option>';
                    $tNow += 1;
                }
                ?>
                                </select>
                                <label>นาฬิกา</label>

                                &nbsp;
                                <select name="start_min" id="start_min">
                                    <!--option value="" selected disabled>--min--</option-->

                                    <?php
                $start = "00";
                $end = "59";
                $tNow = $start;
                while ($tNow <= $end) {
					if($timetab["start_min"] == $tNow){ $selected="selected"; } else { $selected=""; }
                    echo '<option value="' . $tNow . '"'.$selected.'>' . $tNow . '</option>';
                    $tNow += 1;
                }
                ?>
                                </select>
                                <label>นาที</label>
                                <br>
                                <label>เวลาสิ้นสุด</label>
                                <select name="end_hour" id="end_hour">
                                    <!--option value="" selected disabled>--hour--</option-->

                                    <?php
                $start = "7";
                $end = "20";
                $tNow = $start;
                while ($tNow <= $end) {
					if($timetab["end_hour"] == $tNow){ $selected="selected"; } else { $selected=""; }
                    echo '<option value="' . $tNow . '"'.$selected.'>' . $tNow . '</option>';
                    $tNow += 1;
                }
                ?>
                                </select>
                                <label>นาฬิกา</label>

                                &nbsp;
                                <select name="end_min" id="end_min">
                                    <!--option value="" selected disabled>--min--</option-->

                                    <?php
                $start = "00";
                $end = "59";
                $tNow = $start;
                while ($tNow <= $end) {
					if($timetab["end_min"] == $tNow){ $selected="selected"; } else { $selected=""; }
                    echo '<option value="' . $tNow . '"'.$selected.'>' . $tNow . '</option>';
                    $tNow += 1;
                }
                ?>
                                </select>
                                <label>นาที</label>
                            </div>

                            <input class="submit" type="submit" value="บันทึก">
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
