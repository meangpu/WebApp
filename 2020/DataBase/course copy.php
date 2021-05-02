<?php
include('header.php');
?>
<script>
    document.getElementById('course').className = "active";
</script>


<div>
    <br>
    <button><a href="courseAdd.php">Insert Course</a></button>

</div>

<div>
    <h2>CoE Course</h2>
    <h3>หลักสูตรวิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์</h3>
    <?php
    $sql11 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '1'";
    $result11 = mysqli_query($dbcon, $sql11) or die("Query Unsuccessful");
    if (mysqli_num_rows($result11) > 0) {
    ?>
        <h3>ชั้นปี 1 ภาคต้น</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql111 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '1' and lec_lab = 'lec' ";
                $result111 = mysqli_query($dbcon, $sql111) or die("Query Unsuccessful");
                while ($row111 = mysqli_fetch_assoc($result111)) {
                ?>
                    <tr>
                        <td> <?php echo $row111['course_id']  ?></td>
                        <td> <?php echo $row111['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row111['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row111['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql112 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '1' and lec_lab = 'lab' ";
                $result112 = mysqli_query($dbcon, $sql112) or die("Query Unsuccessful");
                while ($row112 = mysqli_fetch_assoc($result112)) {
                ?>
                    <tr>
                        <td> <?php echo $row112['course_id']  ?></td>
                        <td> <?php echo $row112['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row112['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row112['course_index'] ?>">Delete</a>
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
    $sql12 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '2'";
    $result12 = mysqli_query($dbcon, $sql12) or die("Query Unsuccessful");
    if (mysqli_num_rows($result12) > 0) {
    ?>
        <h3>ชั้นปี 1 ภาคปลาย</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql121 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '2' and lec_lab = 'lec' ";
                $result121 = mysqli_query($dbcon, $sql121) or die("Query Unsuccessful");
                while ($row121 = mysqli_fetch_assoc($result121)) {
                ?>
                    <tr>
                        <td> <?php echo $row121['course_id']  ?></td>
                        <td> <?php echo $row121['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row121['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row121['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql122 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '1' and semester = '2' and lec_lab = 'lab' ";
                $result122 = mysqli_query($dbcon, $sql122) or die("Query Unsuccessful");
                while ($row122 = mysqli_fetch_assoc($result122)) {
                ?>
                    <tr>
                        <td> <?php echo $row122['course_id']  ?></td>
                        <td> <?php echo $row122['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row122['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row122['course_index'] ?>">Delete</a>
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
    $sql21 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '1'";
    $result21 = mysqli_query($dbcon, $sql21) or die("Query Unsuccessful");
    if (mysqli_num_rows($result21) > 0) {
    ?>
        <h3>ชั้นปี 2 ภาคต้น</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql211 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '1' and lec_lab = 'lec' ";
                $result211 = mysqli_query($dbcon, $sql211) or die("Query Unsuccessful");
                while ($row211 = mysqli_fetch_assoc($result211)) {
                ?>
                    <tr>
                        <td> <?php echo $row211['course_id']  ?></td>
                        <td> <?php echo $row211['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row211['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row211['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql212 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '1' and lec_lab = 'lab' ";
                $result212 = mysqli_query($dbcon, $sql212) or die("Query Unsuccessful");
                while ($row212 = mysqli_fetch_assoc($result212)) {
                ?>
                    <tr>
                        <td> <?php echo $row212['course_id']  ?></td>
                        <td> <?php echo $row212['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row212['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row212['course_index'] ?>">Delete</a>
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
    $sql22 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '1'";
    $result22 = mysqli_query($dbcon, $sql22) or die("Query Unsuccessful");
    if (mysqli_num_rows($result22) > 0) {
    ?>
        <h3>ชั้นปี 2 ภาคปลาย</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql221 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '2' and lec_lab = 'lec' ";
                $result221 = mysqli_query($dbcon, $sql221) or die("Query Unsuccessful");
                while ($row221 = mysqli_fetch_assoc($result221)) {
                ?>
                    <tr>
                        <td> <?php echo $row221['course_id']  ?></td>
                        <td> <?php echo $row221['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row221['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row221['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql222 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '2' and semester = '2' and lec_lab = 'lab' ";
                $result222 = mysqli_query($dbcon, $sql222) or die("Query Unsuccessful");
                while ($row222 = mysqli_fetch_assoc($result222)) {
                ?>
                    <tr>
                        <td> <?php echo $row222['course_id']  ?></td>
                        <td> <?php echo $row222['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row222['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row222['course_index'] ?>">Delete</a>
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
    $sql31 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '1'";
    $result31 = mysqli_query($dbcon, $sql31) or die("Query Unsuccessful");
    if (mysqli_num_rows($result31) > 0) {
    ?>
        <h3>ชั้นปี 3 ภาคต้น</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql311 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '1' and lec_lab = 'lec' ";
                $result311 = mysqli_query($dbcon, $sql311) or die("Query Unsuccessful");
                while ($row311 = mysqli_fetch_assoc($result311)) {
                ?>
                    <tr>
                        <td> <?php echo $row311['course_id']  ?></td>
                        <td> <?php echo $row311['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row311['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row311['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql312 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '1' and lec_lab = 'lab' ";
                $result312 = mysqli_query($dbcon, $sql312) or die("Query Unsuccessful");
                while ($row312 = mysqli_fetch_assoc($result312)) {
                ?>
                    <tr>
                        <td> <?php echo $row312['course_id']  ?></td>
                        <td> <?php echo $row312['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row312['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row312['course_index'] ?>">Delete</a>
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
    $sql32 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '2'";
    $result32 = mysqli_query($dbcon, $sql32) or die("Query Unsuccessful");
    if (mysqli_num_rows($result32) > 0) {
    ?>
        <h3>ชั้นปี 3 ภาคปลาย</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql321 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '2' and lec_lab = 'lec' ";
                $result321 = mysqli_query($dbcon, $sql321) or die("Query Unsuccessful");
                while ($row321 = mysqli_fetch_assoc($result321)) {
                ?>
                    <tr>
                        <td> <?php echo $row321['course_id']  ?></td>
                        <td> <?php echo $row321['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row321['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row321['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql322 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '2' and lec_lab = 'lab' ";
                $result322 = mysqli_query($dbcon, $sql322) or die("Query Unsuccessful");
                while ($row322 = mysqli_fetch_assoc($result322)) {
                ?>
                    <tr>
                        <td> <?php echo $row322['course_id']  ?></td>
                        <td> <?php echo $row322['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row322['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row322['course_index'] ?>">Delete</a>
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
    $sql33 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '3'";
    $result33 = mysqli_query($dbcon, $sql33) or die("Query Unsuccessful");
    if (mysqli_num_rows($result33) > 0) {
    ?>
        <h3>ชั้นปี 3 ภาคฤดูร้อน</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql331 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '3' and lec_lab = 'lec' ";
                $result331 = mysqli_query($dbcon, $sql331) or die("Query Unsuccessful");
                while ($row331 = mysqli_fetch_assoc($result331)) {
                ?>
                    <tr>
                        <td> <?php echo $row331['course_id']  ?></td>
                        <td> <?php echo $row331['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row331['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row331['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql332 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '3' and semester = '3' and lec_lab = 'lab' ";
                $result332 = mysqli_query($dbcon, $sql332) or die("Query Unsuccessful");
                while ($row332 = mysqli_fetch_assoc($result332)) {
                ?>
                    <tr>
                        <td> <?php echo $row332['course_id']  ?></td>
                        <td> <?php echo $row332['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row332['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row332['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

    <?php } else {
        echo "";
    } ?>

    <?php
    $sql41 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '1'";
    $result41 = mysqli_query($dbcon, $sql41) or die("Query Unsuccessful");
    if (mysqli_num_rows($result41) > 0) {
    ?>
        <h3>ชั้นปี 4 ภาคต้น</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql411 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '1' and lec_lab = 'lec' ";
                $result411 = mysqli_query($dbcon, $sql411) or die("Query Unsuccessful");
                while ($row411 = mysqli_fetch_assoc($result411)) {
                ?>
                    <tr>
                        <td> <?php echo $row411['course_id']  ?></td>
                        <td> <?php echo $row411['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row411['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row411['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql412 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '1' and lec_lab = 'lab' ";
                $result412 = mysqli_query($dbcon, $sql412) or die("Query Unsuccessful");
                while ($row412 = mysqli_fetch_assoc($result412)) {
                ?>
                    <tr>
                        <td> <?php echo $row412['course_id']  ?></td>
                        <td> <?php echo $row412['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row412['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row412['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

    <?php } else {
        echo "";
    } ?>

    <?php
    $sql42 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '2'";
    $result42 = mysqli_query($dbcon, $sql42) or die("Query Unsuccessful");
    if (mysqli_num_rows($result42) > 0) {
    ?>
        <h3>ชั้นปี 4 ภาคต้น</h3>
        <table cellpadding="7px">
            <thead>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th></th>
            </thead>
            <tbody>
                <!-- lecture -->
                <?php
                $sql421 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '2' and lec_lab = 'lec' ";
                $result421 = mysqli_query($dbcon, $sql421) or die("Query Unsuccessful");
                while ($row421 = mysqli_fetch_assoc($result421)) {
                ?>
                    <tr>
                        <td> <?php echo $row421['course_id']  ?></td>
                        <td> <?php echo $row421['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row421['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row421['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }

                // Lab
                $sql422 = "SELECT * FROM course WHERE degree = 'bachelor' and year_type = '4' and semester = '2' and lec_lab = 'lab' ";
                $result422 = mysqli_query($dbcon, $sql422) or die("Query Unsuccessful");
                while ($row422 = mysqli_fetch_assoc($result422)) {
                ?>
                    <tr>
                        <td> <?php echo $row422['course_id']  ?></td>
                        <td> <?php echo $row422['course_name'] ?></td>
                        <td>
                            <a href="courseEdit.php?id=<?php echo $row422['course_index'] ?>">Edit</a>
                            <a href="courseDelete-inline_P.php?id=<?php echo $row422['course_index'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

    <?php } else {
        echo "";
    } ?>


    <?php mysqli_close($dbcon);
    ?>

</div>

<div>
    <br>
    <br>
</div>