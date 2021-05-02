<?php
include('header.php');
?>

<div id='main-content'>

</div>

<script>
    document.getElementById('contact').className = "active";

</script>


<head>
    <title>Our team</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="styles/demo.css"> -->
    <style>
        body
        {
            background-color: #353b48;
        }
        #bg {
            background-color: #2f3640;
        }

        .team {
            margin: 0px 0;
        }

        #prof {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;
            width: 30%;
        }

        h2 {
            margin-top: 3px;
            margin-bottom: 0px;
            font-size: 3em;
            text-align: center;
            font-weight: bold;
            letter-spacing: 2px;
            padding-top: 10px;
            color: white;
        }

        h2:after {
            content: '';
            background: #fff;
            display: block;
            height: 3px;
            width: 150px;
            margin: 10px auto;
            color: white;
        }

        h3 {
            margin-top: 8px;
            margin-bottom: 0px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            color: white;

        }

        h4 {
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 2px;
            padding-top: 5px;
            padding-bottom: 3px;
            color: white;
        }

        h5,
        p {
            margin-top: 2px;
            color: white;
            float: center;
            font-size: 18px;
        }


        .profile {
            margin-top: 10px;
        }

        .profile .img-box {
            opacity: 100;
            /* display: block; */
            position: relative;
        }

        .profile h3 {
            margin-top: 30px;
        }

        .img-box:after {
            content: '';
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.6);
            /*position: absolute;*/
            right: 0;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .img-box ul {
            margin: 0;
            padding: 10px 0;
            /*position: absolute;*/
            z-index: 1;
            bottom: 0;
            display: block;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;

        }

        .img-box ul li {
            width: 10px;
            height: 10px;
            border: 1px solid #a73b23;
            border-radius: 20%;
            margin: 3px;
            padding: 7px;
            display: inline-block;
        }

        .img-box a {
            color: #fff;
        }

        .img-box:hover:after {
            opacity: 100;
        }

        .img-box:hover ul {
            opacity: 100;
        }

        .img-box a:hover li {
            color: #007bff;
        }

        .img-box:after,
        .img-box ul,
        .img-box ul li {
            transition: all o.5s ease-in-out 0s;
        }

        #align {
            align-content: center;
            /* padding: 50px; */
        }

        .meangpu {
            display: flex;
        }

    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
          
                <td style='padding: 5px;'>
                    <div class="div9" id="bg">
                        <h2>Advisor</h2>
                        <img id="prof" width="100%" src="images/teacher.jpg">
                        <h4>Asst.Prof. Jiradej Ponsawat</h4>
                        <div class="container">
                            <h2>Our team</h2>
                            <br><br>
                            <div class="meangpu">
                                <div class="img-box">
                                    <img src="images/Pu1.PNG" width="50%" class="img-responsive">
                                    <h3>Nattapong Tangsatheanrapap</h3>
                                    <p>Digital Media Engineering</p>
                                </div>
                                
                                <div class="img-box">
                                    <img src="images/Jaokha1.PNG" width="50%" class="img-responsive">
                                    <h3>Thiranat Kanchanophat</h3>
                                    <p>Digital Media Engineering</p>
                                </div>

                                <div class="img-box">
                                    <img src="images/Tiger1.PNG" width="50%" class="img-responsive">
                                    <h3>Chakrit Jidsophaphun</h3>
                                    <p>Digital Media Engineering</p>
                                </div>

                            </div>
           
                        </div>
                    </div>


                    </div>
                </td>
            </tr>

        </tbody>
    </table>

</body>
