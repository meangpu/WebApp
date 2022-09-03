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
    <link rel="stylesheet" href="styles/timetablejs.css">
    <link rel="stylesheet" href="styles/demo.css">
</head>

<!--start delete -->
<!--//ทำเผื่อไว้-->

<body>
    <br>
    <table>
        <tbody>
            <tr></tr>
            <tr>
                <td style='color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  ;'>
                    <h2>***สำหรับลบตารางการใช้ห้องที่ต้องการ***</h2>
                </td>
            </tr>
            <tr>
                <td style='padding: 5px;'>
                    <div class="div4">
                        <h5>กดคาบเรียนเพื่อดู id ที่ใช้ delete</h5>
                        <form action=" <?php  $_SERVER['PHP_SELF']; ?>" class="post-form" method="POST">
                            <?php
            $q11 = "SELECT * FROM timetable ";
            $result11 = mysqli_query($dbcon, $q11);
            ?>
                            <select name="timetable_id">
                                <option value="" selected disabled>--เลือก id --</option>
                                <?php
                while ($row11 = mysqli_fetch_array($result11, MYSQLI_NUM)) {
                    echo "<option value='$row11[0]'>$row11[0]</option>";
                } ?>
                            </select>
                            <input class="submit" type="submit" value="Delete" name="delbtn">
                        </form>
                        <br>

                    </div>

                </td>

            </tr>
        </tbody>
    </table>
</body>
<!-- delete -->
