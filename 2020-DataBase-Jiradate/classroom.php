<?php
include('header.php');
?>
<script>
    document.getElementById('classroom').className = "active";
</script>


<div align='center'>
    <br>
    <button class="button"><a href="classroomAdd.php">เพิ่มห้องเรียน</a></button>

</div>
<br>

<div>
    <table>
        <tbody>
            <tr>
                <td style='color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  ;'>
    <h3 align='center'>(EN04) ห้องเรียนตึกวิศวกรรมคอมพิวเตอร์  มหาวิทยาลัยขอนแก่น</h3>
                    </td>
            </tr>
            <td style='padding: 5px;'>
                <div class="div4">
    <?php
    $sql = "SELECT * FROM room";
    $result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

    if (mysqli_num_rows($result) > 0) {
    ?>
        <table cellpadding="7px">
            <thead>
                <th>ห้อง</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="div8">
                        <td> <?php echo  $row['room_name'] ?></td>
                        <td>
                            <a href="classroomEdit.php?id=<?php echo $row['room_id'] ?>">Edit</a>
                            <a href="classroomDelete-inline_P.php?id=<?php echo $row['room_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "No record found";
    }
    mysqli_close($dbcon);
    ?>
                    </div>
                  
              
        </tbody>
    </table>
  
    <br>
</div>