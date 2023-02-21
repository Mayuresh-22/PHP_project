<?php
$status = NULL;

if(isset($_POST["fname"]) and isset($_POST["enroll"]) and isset($_POST["dept"])){
$connect = mysqli_connect("localhost", "root", "");
// if($connect){
//     echo "Connected";
// }
// else{
//     die("error: ". mysqli_connect_error());
// }

$fname = $_POST["fname"];
$enroll = $_POST["enroll"];
$dept = $_POST["dept"];
$division = $_POST["division"];
// $division = implode(',', $division);
$course = $_POST["course"];
$courses = implode(',', $course);

$sql = "INSERT INTO `register`.`entry` (`srno`, `fname`, `enrollment`, `department`, `division`, `courses`, `log`) VALUES ('NULL', '$fname', '$enroll', '$dept', '$division', '$courses', current_timestamp());";

$query = mysqli_query($connect, $sql);

if($query){
    $status = TRUE;
}
else {
    $status = FALSE;
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Course Registration - 2023</title>
</head>

<body>
    <div class="contain">
        <img src="https://online.gppune.ac.in/gpp_s20/images/header.jpg" alt="logo" class="responsive">
        <h2 class="text"><br>
            <center>Course Registration IT - 2023</center>
            <center></center>
        </h2><br>
        <hr style="width:40%; height:0px; margin: auto; background-color:gray; border: solid gray; border-width:1px">
        <br>

        <p class="instruction"><br>Select Courses for which you would like to Appear for Registration.
            <br><br> : Maximum Courses can be selected.
            <br><br> : Regular students can register for maximum 36 credits and PTD students can register for maximum 24
            credits.
            <br><br> : Once all desired Courses have been added, you can Confim your Registration Application.
            <br><br> : Student must check the history sheets before Registration
            <br><br> : Course for in plant training will not appear on this screen.
            <br><br> : In plant training course is reflected on registration slip.
        </p><br>

        <hr style="width:40%; height:0px; margin: auto; background-color:gray; border: solid gray; border-width:1px">
    
    <!-- Data submission message -->
    <?php

        if($status==TRUE){
            echo "<h3>Data submitted Successfully</h3>";
            $status = FALSE;
        }
        else if($status==FALSE){
            echo "<h4>Enter All the required details</h4>";
        }
        else if($status==NULL){
            echo '';
        }
    ?>
    </div>

    <!-- course registration form -->
    <div class="form">
        <form action="index.php" method="post">
            <label for="fname">Enter Full name: </label>
            <input type="text" name="fname" id="fname" placeholder="eg: Jhon White"><br><br>

            <label for="enroll">Enrollment no: </label>
            <input type="text" name="enroll" id="enroll" placeholder="eg: 21070XX"><br><br>

            <!-- Department selection -->
            <label for="dept">Select Department: </label><br>
            <input type="radio" id="IT" name="dept" value="IT" class="radio">
            <label for="IT">Information Technology</label><br><br>

            <!-- Division selection -->
            <label for="divsion">Select Division: </label><br>
            <input type="radio" name="division" value="I1" class="radio">
            <label for="I1">I1</label><br>

            <input type="radio" name="division" value="I2" class="radio">
            <label for="I2">I2</label><br>

            <input type="radio" name="division" value="I3" class="radio">
            <label for="I3">I3</label><br><br>

            <!-- courses selection -->
            <label for="course">Select all applied courses: </label><br><br>
            <div class="table">
            <table>
                <th>Course Id</th>
                <th>Course Name</th>
                <th>Registration</th>
                <tr>
                    <td>CM3103</td>
                    <td><label for="ds">Data Structure &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="DS"><br></td>
                </tr>
                <tr>
                    <td>CM3102</td>
                    <td><label for="jp">Java Programming -I &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="JP1"><br></td>
                </tr>
                <tr>
                    <td>IT3103</td>
                    <td><label for="dcn">Data Communication & Networking &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="DCN"><br></td>
                </tr>
                <tr>
                    <td>CM5103</td>
                    <td><label for="php"> PHP &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="PHP"><br></td>
                </tr>
                <tr>
                    <td>CM4105</td>
                    <td><label for="pp"> Professional Practices-II &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="PP2"><br></td>
                </tr>
                <tr>
                    <td>CM4106</td>
                    <td><label for="js"> Web Development using JavaScript &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="JS"><br></td>
                </tr>
                <tr>
                    <td>MA4101</td>
                    <td><label for="edp"> Entrepreneurship and Startups &nbsp</label></td>
                    <td><input type="checkbox" name="course[]" value="EDP"><br></td>
                </tr>
            </table>
            </div>
            <button class="submit">Submit</button>
        </form>
    </div>

    <div class="footer">
        <p>
            Above details are not associated with any institution,
            all the material used only for educational purpose
        </p>
        <h4>Project By Mayuresh Choudhary</h4>
    </div>
    
</body>
</html>