<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Css/CssStyling.css">
    <title>Sparta Gym</title>
    <link rel="stylesheet" href="Css/project1.css">
    <link rel="stylesheet" href="Css/csshanna.css">
</head>

<body>
<?php
include "header.php";
?>
<div class="intro-container">
    <div class="intro">Sparta<br>Gym</div>
    <div class="intro2">The best gym<br>in town</div>
</div>

<div class="introduction-container">
    <p class="txt1">Welcome to Sparta gym .
        Here you will find modern equipment for strength training, a free weight area and a stretching area.</p>
    <p class="txt2">The most fun is exercising together, and with us you'll always get a boost from the team. Our
        wonderful members know it best - at Sparta Gym, life is full of energy!</p>
</div>

<div class="middle_part">
    <div class="flex-container">
        <p><br></p>
        <div class="cardio">
            <div>
                <img class="img_cardio" src="images/Cardio_Image.jpg" alt="ImageCardio">
            </div>
            <div class="cardioText">
                <h2 style="text-align: center;"><b>Cardio</b></h2>
                <h4>Run on the treadmill or pedal on the cycling machine. Whatever equipment you choose, you're sure to
                    work up a good sweat and get your workout going.</h4>
            </div>
        </div>

        <div class="weights">
            <div class="weightText">
                <h2 style="text-align: center;"><b>Weights</b></h2>
                <h4 style="margin-top: 20px;">You'll find a wide range of free weights in our gym, from kettlebells to
                    dumbbells and bars.</h4>
            </div>
            <div>
                <img class="img_weight" src="images/Weights.jpg" alt="ImageWeight">
            </div>
        </div>

        <div class="stretching">
            <div>
                <img class="img_Stretch" src="images/Stretching.jpg" alt="ImageStretch">
            </div>
            <div class="stretchText">
                <h2 style="text-align: center;"><b>Stretching</b></h2>
                <h4>Let your body recover. This section is dedicated to stretching. Grab a mat, sit down and find your
                    inner peace.</h4>
            </div>
        </div>

        <div class="advertisement">
            <img class="smallImage1" src="images/smallImage1.jpg" alt="girlDoingExercise">
            <h1 class="text1"><b>Come and<br>join our<br>courses</b></h1>
            <img class="smallImage2" src="images/smallImage2.jpg" alt="Abs">
        </div>
        <div class="advertisement2">
            <h1 class="text2"><b>We have personal trainers<br>ready to help you in every<br>course</b></h1>
            <img style="flex-grow: 1;" class="smallImage3" src="images/smallImage3.jpg" alt="Gym">
            <p></p>
        </div>
    </div>
</div>

<div class="openinginfo">
    <h1 class="openinfo"><b>When are we open?</b></h1>
    <div class="flex-container">
        <div class="open">
            <div>
                <img class="openimg" style="opacity: 0;" src="images/openimg.png" alt="Openimg">
            </div>
            <div class="textWithopen" style="flex-grow: 1;">
                <p>We are open:<br>
                    24/7<br>
                    We never close!!!<br>
                    Come and exercise whenever you want<br></p>
            </div>
            <div>
                <img class="openimg" src="images/openimg.png" alt="Openimg">
            </div>
        </div>
    </div>
</div>

<div class="JoinUsForm">
    <button id="joinUsButton">Click to Join as a staff member</button>
    <form class="formJoin" id="formJoin" method="post" action="test.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" required><br>
        <label for="passw">Password:</label><br>
        <input type="text" id="passw" name="passw" required><br>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="after_middle">

    <h1 style="text-align: center; padding-top: 1em; color: snow;"><b>Where to find us</b></h1>

    <div class="flex-conainer">
        <p><br></p>
        <div class="hameenlinna">
            <div>
                <a href="https://www.google.com/maps/place/Visamäentie+25,+13100+Hämeenlinna/@60.9809433,24.4652459,15z/data=!4m5!3m4!1s0x468e5d82758189e1:0xaae076d18a3ee01!8m2!3d60.980737!4d24.4750114"><img
                            class="img_hml" src="images/hmlmap.jpg" alt="hmlmap"></a>
            </div>
            <div class="hmltext">
                <h2><b>Sparta Gym Hämeenlinna</b></h2>
                <h4 style="margin-top: 1em;">Sparta Gym is well known for having one of the largest group exercise
                    studios in Finland, that can accommodate well over a hundred exercises. There are also have two
                    squash courts for the use of our members.</h4>
            </div>
        </div>

        <div class="hamk">
            <div class="hamktext">
                <h2><b>Sparta Gym HAMK</b></h2>
                <h4 style="margin-top: 1em;">Sparta Gym HAMK continues to provide high-quality exercise facilities,
                    personal training services for all kinds of exercises, and over 70 group fitness classes weekly to
                    choose from!</h4>
            </div>
            <div>
                <a href="https://www.google.com/maps/place/Visamäentie+25,+13100+Hämeenlinna/@60.9809433,24.4652459,15z/data=!4m5!3m4!1s0x468e5d82758189e1:0xaae076d18a3ee01!8m2!3d60.980737!4d24.4750114"><img
                            class="img_hamk" src="images/hamkmap.jpg" alt="hamkmap"></a>
            </div>
        </div>

        <div class="tre">
            <div>
                <a href="https://www.google.com/maps/place/Rautatienkatu+25,+33100+Tampere/@61.4988947,23.7708341,17z/data=!3m1!4b1!4m5!3m4!1s0x468edf327e8f00b3:0x60b4c1089733abec!8m2!3d61.4988947!4d23.7730228"><img
                            class="img_tre" src="images/tremap.jpg" alt="tremap"></a>
            </div>
            <div class="tretext">
                <h2><b>Sparta Gym Tampere</b></h2>
                <h4 style="margin-top: 1em;">Sparta Gym Tampere is located in the heart of Tampere CITY center and is
                    the second-largest Sparta Gym with 2000m² of fitness space including two large group exercise
                    studios.</h4>
            </div>
        </div>
    </div>
</div>

<div class="contactInfo">
    <h1 class="textInfo"><b>Contact Info</b></h1>
    <div class="flex-container">
        <div class="info">
            <div class="textWithInfo">
                <img class="icon2" src="images/telephone.png" alt="">
                <p style="padding-top: 2em;">Phone number:<br>
                    +358 51 999769638 (24/7 for every branch)<br>
                    +358 41 682567721 (Sparta Gym Hämeenlinna)<br>
                    +358 44 468515516 (Sparta Gym HAMK)<br>
                    +358 99 218188337 (Sparta Gym Tampere)<br>
                    <br>

                    Email:<br>
                    spartagym@gym.com</p>
            </div>
            <div class="socialMedia">
                <img class="icon1" src="images/spartan.png" alt="">
                <p style="padding-top: 2em;">You can also follow us on social media:</p>
                <div class="instagram">
                    <a href="https://www.instagram.com"><img class="instagramImg" src="images/instagram.png"
                                                             alt="instagramImg"></a>
                    <a href="https://www.instagram.com"><p style="padding-top: 1em;padding-left: 1em;">Instagram</p></a>
                </div>
                <div class="facebook">
                    <a href="https://www.facebook.com"><img class="facebookImg" src="images/facebook.png"
                                                            alt="facebookImg"></a>
                    <a href="https://www.facebook.com"><p style="padding-top: 1em;padding-left: 1em;">Facebook</p></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let switchForm = true;
    document.getElementById("joinUsButton").onclick = function () {
        newForm()
    };

    function newForm() {
        if (switchForm) {
            document.getElementById("joinUsButton").innerHTML = "Click to Join as a customer";
            document.getElementById("formJoin").innerHTML = '<form class="formJoin" id="formJoin"><label for="fname"> name:</label><br><input type="text" id="fname" name="fname" required><br><label for="lname">Last name:</label><br><input type="text" id="lname" name="lname" required><br><label for="uname">Other information:</label><br><input type="text" id="uname" name="uname" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Click to send form"></form>';
        } else {
            document.getElementById("joinUsButton").innerHTML = "Click to Join as a staff member";
            document.getElementById("formJoin").innerHTML = '<form class="formJoin" id="formJoin"><label for="fname">First name:</label><br><input type="text" id="fname" name="fname" required><br><label for="lname">Last name:</label><br><input type="text" id="lname" name="lname" required><br><label for="uname">Username:</label><br><input type="text" id="uname" name="uname" required><br><label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br><input type="submit" value="Submit"></form>';
        }
        switchForm = !switchForm;
    }

</script>

<p>Contact us!</p>
<form id="contact" action="db.php">
    First name: <input type="text" name="fname"><br>
    Last name: <input type="text" name="lname"><br><br>
    Email: <input type="text" name="email"><br><br>
    Phone: <input type="text" name="phone"><br><br>
    <input type="button" onclick="contactform()" value="Submit">
</form>

<script>
    function contactform() {
        document.getElementById("contact").submit();
    }
</script>
</body>
</html>