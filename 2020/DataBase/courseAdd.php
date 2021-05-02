<?php
include('header.php');
?>
<script>
    document.getElementById('course').className = "active";

</script>

<div id="main-content" align='center'>
    <table>
        <tbody>
            <tr>
                <br><br><br>
                <td style=' color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center  '>
                    <h2>เพิ่มรายวิชา</h2>
                </td>
            </tr>
            <tr>
                <td style='padding: 5px;'>

                    <div class="div2">
                        <form class="post-form" action="courseSave_P.php" method="post">
                            <div class="form-group">
                                <label>รหัสวิชา</label>
                                <input type="text" name="cs_id">
                            </div>
                            <div class="form-group">
                                <label>ชื่อวิชา</label>
                                <input type="text" name="cs_name">
                            </div>
                            <div class="form-group">
                                <label>หลักสูตร</label>
                                <select name="degree">
                                    <option value="" selected disabled>--ระบุหลักสูตร--</option>
                                    <option value="bachelor">วิศวกรรมศาสตร์บัณฑิต สาขาวิศวกรรมคอมพิวเตอร์</option>
                                    <option value="inter">วิศวกรรมศาสตร์บัณฑิต สาขาสื่อดิจิทัล นานาชาติ</option>
                                    <option value="master">ป.โท และ ป.เอก สาขาวิศวกรรมคอมพิวเตอร์</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>วิชาบังคับ(ชั้นปี) / วิชาเลือก</label>
                                <select name="year_type">
                                    <option value="" selected disabled>--ระบุชั้นปี--</option>
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
                                    <option value="" selected disabled>--ระบุภาคการศึกษา--</option>
                                    <option value="1">ภาคต้น</option>
                                    <option value="2">ภาคปลาย</option>
                                    <option value="3">ภาคฤดูร้อน</option>
                                    <option value="0">วิชาเลือก</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>หน่วยกิต</label>
                                <select name="cs_weight">
                                    <option value="" selected disabled>--ระบุหน่วยกิต--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lecture / Lab</label>
                                <select name="lec_lab">
                                    <option value="" selected disabled>--Lecture / Lab--</option>
                                    <option value="lec">Lecture</option>
                                    <option value="lab">Lab</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>เงื่อนไขรายวิชา</label>
                                <input type="text" name="cs_cond" value="-">
                            </div>

                            <div class="form-group">
                                <label>หมายเหตุ</label>
                                <input type="text" name="cs_option" value="-">
                            </div>
                            <br>

                            <input class="submit" type="submit" value="บันทึก">
                        </form>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
