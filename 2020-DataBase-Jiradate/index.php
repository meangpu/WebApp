<?php
include('header.php');
?>
<script>
    document.getElementById('home').className = "active";
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
    body {
        font-family: 'Kanit', sans-serif;
        width: 100%;
        height: 100%;
        background-color: #2f3640;
    }
    a {
    text-decoration: none
    }

    nav {
        float: left;
        width: 30%;
        background: #273c75;
        border-radius: 20px;
        padding: 10px;
    }

    .mySlides {
        display: none;
    }

    .w3-tag,
    .fa {
        cursor: pointer
    }

    .w3-tag {
        height: 15px;
        width: 15px;
        padding: 0;
        margin-top: 6px
    }


    h3 {
        width: 230px;
        border: 2px solid white;
        border-radius: 8px;
        color: orange;
        margin: 10px 600px 20px 80px;
        background-color: white;
    }

    #pic {
        width: 150px;
        margin-left: 120px;
    }


    @keyframes slide {
        0% {
            left: 100%;
            width: 100%;
        }

        5% {
            left: 0%;
        }

        25% {
            left: 0%;
        }

        30% {
            left: -100%;
            width: 100%;
        }

        30.0001% {
            left: -100%;
            width: 0%;
        }

        100% {
            left: 100%;
            width: 0%;
        }
    }

    * {
        box-sizing: border-box
    }

    .mySlides {
        display: none
    }

    img {
        vertical-align: middle;
        border-radius: 40px;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        font-family: 'Kanit', sans-serif;
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        font-family: 'Kanit', sans-serif;
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #273c75;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .2
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .2
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    article {
        float: right;
        padding: 0px;
        width: 65%;
        background-color: #ffffff;
        /* only for demonstration, should be removed */
    }

    /* Clear floats after the columns */
    section:after {
        content: "";
        display: table;
        clear: both;

    }

    /* Style the footer */
    footer {
        background-color: #777;
        padding: 10px;
        text-align: center;
        color: white;
    }

    /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
    @media (max-width: 600px) {

        nav,
        article {
            height: auto;
        }


        .sidebar {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 16px;
            border: 0px solid;
            border-radius: 4px;
        }

        .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            border: 0px solid;
            border-radius: 4px;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 160px;
            /* Same as the width of the sidenav */
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

</style>

<body>
<br><br>
    <div id='main-content' class='div7'>
        <table>
            <tbody>
                <tr>
                    <td style='padding: 5px;'>
                        <div class="div9">
                            <img src="images/Tigermain.jpg" width="100%">


                        </div>
                    </td>
                </tr>
            </tbody>
        </table>



    </div>


    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

    </script>





</body>
