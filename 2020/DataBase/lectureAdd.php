<?php
include('header.php');
?>
<script>
    document.getElementById('lecture').className = "active";

</script>

<div id="main-content" align='center'>
    <br><br><br>
    <div>
        <table>
            <tbody>
                <tr>
                    <td style=' color: #f5f6fa; padding: 3px; /*! border-top: 1px solid #e6e6e6; */ /*! border-left: 1px solid #e6e6e6; */ /*! border-right: 1px solid #e6e6e6; */ /*! border-bottom: 1px solid #e6e6e6; */ border-top-left-radius: 4px; border-top-right-radius: 4px; background-color: #2f3640; text-align:center ; '>
                        <h2>เพิ่มข้อมูลผู้สอน</h2>

                    </td>
                </tr>
                <tr>
                    <td style='padding: 5px;'>

                        <div class="div3">

                            <form class="post-form" action="lectureSave_P.php" method="post">
                                <div class="form-group">
                                    <br>
                                    <label>โปรดระบุชื่อท่านอาจารย์</label>
                                    <input type="text" name="lecture_name">
                                </div>
                              
                                <input class="submit" type="submit" value="บันทึก">
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
