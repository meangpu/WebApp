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
    <link rel="stylesheet" href="styles/demo.css">
</head>

<body>

    <table>
        <tbody>
            <tr></tr>
            <tr>
                <td style='color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  ;'>
                    <h2>ตรวจสอบตารางสอนอาจารย์</h2>
                </td>
            </tr>

            <tr>
                <td style='padding: 5px;'>
                    <div class="div4">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="post-form" method="POST">
                            <div class="form-group">
                                <?php
                    $q = "SELECT * FROM lecture ";
                    $result = mysqli_query($dbcon, $q);
                    ?>
                                <select name="lecture_id">
                                    <option value="" selected disabled>--กรุณาระบุชื่ออาจารย์--</option>
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

	//query maximum number of teacher id
	//SELECT max(lec_id) FROM `lecture`
	$max_lec=25;
	
	// loop to find which teacher was select
	$count=0;
	$teacher_list = "";
	for($i=1; $i<= $max_lec; $i++){
		if(isset($_POST["teacher$i"])){
			//echo ",$i ";
			$teacher[$count] = $i;
			if( $teacher_list == "" ){
				$teacher_list .= "($i";
			} else {
				$teacher_list .= ", $i";
			}
			$count++;
		}
	}
	$semester = $_POST['semester'];
    $year =  $_POST['year'];
	
	if($count != 0){
		$teacher_list .= ")";
		$sql = "SELECT * FROM timetable INNER JOIN lecture ON timetable.lec_id = lecture.lec_id 
										INNER JOIN course ON timetable.course_id = course.course_index 
						WHERE timetable.lec_id in $teacher_list AND timetable.semester = $semester AND timetable.year = $year";
		echo "<br>";
		// echo ($sql);
	} else {
		$teacher = $_POST['lecture_id'];
		$teacher_list = "($teacher)";
		$sql = "SELECT * FROM timetable INNER JOIN lecture 
			ON timetable.lec_id = lecture.lec_id
			INNER JOIN course ON timetable.course_id = course.course_index 
			WHERE lecture.lec_id in $teacher_list AND timetable.semester = $semester AND timetable.year = $year ";
		//echo($sql);
	}
	
            if (isset($_POST['showbtn'])) {
                //$lecture_id = $_POST['lecture_id'];
                //$semester = $_POST['semester'];
                //$year =  $_POST['year'];
                $res = mysqli_query($dbcon, $sql) or die("Query Unsuccessful***");

                // ข้อความแสดงห้องเรียน
                $ss = "SELECT * FROM lecture WHERE lec_id in $teacher_list ";
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
                            <h3 style="text-align: center">ตารางสอนอาจารย์ <?php echo $rr['lecture_name'] .'ร่วม '.'  ภาคการศึกษา ' . $rr2['semester'] ?> ปีการศึกษา <?php echo $rr3['year'] ?></h3>
                            <div class="timetable"></div>

                            <script src="scripts/timetable.js"></script>

                            <script>
                                var timetable = new Timetable();
                                timetable.setScope(7, 21)
                                timetable.addDay(['Mon', 'Tue', 'Wed', 'Thu', 'Fri']);

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
                                // run when click
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

<script>



var li_day_head  = document.querySelectorAll("div.timetable aside li");
var li_day  = document.querySelectorAll("ul.room-timeline li");

// - ด้านซ้ายพวก mon tue wed
// console.log(li_day_head);

// - ด้านขวา ตามหลัง mon tue
// console.log(li_day);

console.log('ul day = ' , li_day.length);
for(var i=0; i < li_day.length; i++)
{
    day_height = false; 
    span_time = li_day[i].querySelectorAll('span'); 

    // - ตัวตารางที่เป็นกล่องมีสีคือ li_day[i]
    // console.log(span_time);

    
    // - span_time.length คือจำนวนกล่องที่มีในวันนั้น
    // console.log('day:' , i ,', li:' , li_day[i] , ', span:', span_time.length);
    var biggestCollide = 1;
    
    for(var n=0; n < span_time.length; n++)
    { 
        var collide = 1;
        for(var k=0; k < span_time.length; k++)
        {
            console.log("check", span_time[n],"with", span_time[k]);

            if(k != n && (IsOverLab(span_time[n], span_time[k]))){
                span_time[n].style.top = "0px";
                day_height = true; 

                // - collision section
                // console.log("check", span_time[n],"with", span_time[k]);
                // console.log("first collide", collide);

                if (parseFloat(span_time[n].style.top) == parseFloat(span_time[k].style.top))
                {
                    span_time[n].style.top = `${46*collide}px`;
                    span_time[n].style.backgroundColor = "#2f3640";
                    span_time[k].style.backgroundColor = "#273c75";
                    collide++;
                    console.log(collide);
                    if (biggestCollide < collide)
                    {
                        biggestCollide = collide;
                    }
                }
                break;}
        }
        if(day_height)
            { 
                // console.log(biggestCollide);
                li_day[i].style.height = `${46*biggestCollide}px`;
                li_day_head[i].style.height = `${46*biggestCollide}px`;
                
                // word text mon tue wed
                li_day_head[i].childNodes[0].style.lineHeight = `${46*biggestCollide}px`;
  
            }
        // console.log('>>' , parseFloat(span_time[n].style.left) , ',' , parseFloat(span_time[n].style.width), ',', parseFloat(span_time[n].style.left) + parseFloat(span_time[n].style.width)      , ', overwite:', overwrite ,'\n' );
    }

}

function IsOverLab(obj1, obj2){
    if (parseFloat(obj1.style.left) <= parseFloat(obj2.style.left) && 
        parseFloat(obj1.style.left) + parseFloat(obj1.style.width) > parseFloat(obj2.style.left)) {
        // if (parseFloat(obj1.style.top) == parseFloat(obj2.style.top))
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
        return true;
    }
}


// Make the DIV element draggable:

//dragElement((document.querySelectorAll("li span.time-entry"))[1]);

var t_entry = document.querySelectorAll("li span.time-entry");
for(var i=0; i<t_entry.length; i++){
	dragElement(t_entry[i]);
}

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>

</body>
