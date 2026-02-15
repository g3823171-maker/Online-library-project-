<?php
error_reporting(E_ERROR | E_PARSE);
$dsn = "mysql:host=localhost;dbname=online_forum;charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}

$stmt1 = $pdo->query("SELECT MAX(sprt_id) AS sprt_id FROM sports_club");

   
  $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);         

   $sprt_id=$row1['sprt_id']; 
$sprt_id=$sprt_id+1;

    

   



$dt=new DateTime("now",new DateTimeZone(date_default_timezone_get()));
$DateTime=$dt->format("Y-m-dH:i:s");
//echo $DateTime;
//echo"<br>";
//echo"<br>";
//$DtOnly1=date("Y-m-d");
//echo $DtOnly1;
//echo"<br>";
//$DtOnly1=date("Y-m-d");
//echo $DtOnly1;
//echo"<br>";
//$DtOnly2=(new DateTime())->format("Y-m-d");
//echo $DtOnly2;
//echo"<br>";
//echo"<br>";
//$TimeOnly1=date("H:i:s");
//echo $TimeOnly1;
//echo"<br>";
//$TimeOnly2=(new DateTime())->format("H:i:s");
//echo $TimeOnly2;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sprt_id = trim($_POST['sprt_id']);   
    $student_id = trim($_POST['student_id']);
    $stu_name = trim($_POST['stu_name']);
    $department = trim($_POST['department']);
    $year  = trim($_POST['year']);
    $roll_no = trim($_POST['roll_no']);
    $contact  = trim($_POST['contact_no']);
    $email  = trim($_POST['email ']);
    $preferred_sport = trim($_POST['preferred_sport']);
    $skill_level = trim($_POST['skill_level']);
    $interested_in= trim($_POST['interested_in']);
    $suggestions_for_sports_activities   = trim($_POST['suggestions_for_sports_activities']);
    $willing_to_represent_college_in_competitions  = trim($_POST['willing_to_represent_college_in_competitions']);
    $applied_date = trim($_POST['applied_date']);
    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $sprt_id)) {
 $errors[] = "sprtID number must be 6 digit.";
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $errors[] = "Invalid email format.";
 }
 if (!preg_match('/^[0-9]{10}$/', $contact)) {
 $errors[] = "contact number must be 10 digit.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO sports_club 
                (sprt_id, student_id, stu_name, department, year, roll_no, email, contact_no, preferred_sport, skill_level, interested_in, suggestions_for_sports_activities, willing_to_represent_college_in_competitions, applied_date) 

                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $sprt_id,
    $student_id,
    $stu_name,
    $department,
    $year,
    $roll_no,
    $contact_no,
    $email,
    $preferred_sport,
    $skill_level,
    $interested_in,
    $suggestions_for_sports_activities,
    $willing_to_represent_college_in_competitions,
    $applied_date
]);
} 

if ($ok) {
 echo "<p style='color:green;'>Registration Successful!</p>";
header("Location: index.php");
 }  else {
 foreach ($errors as $e) {
 echo '<script>
 var msg = "'.htmlspecialchars($e, ENT_QUOTES).'";
 alert(msg);
 </script>';
 }

 }    

}

?>


<html>
<head>
<title>online forum</title>
</head>
 <style>
        body { font-family: cursive; background:#f4f4f4; }
        .container {
            width: 400px; margin: 40px auto; padding: 20px;
            background:skyblue; border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%; padding: 10px; margin: 8px 0;
            border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            background: #007bff; color: #fff; padding: 10px;
            border: none; width: 100%; border-radius: 4px;
            cursor: pointer; font-size: 16px;
        }
        button:hover { background: #0056b3; }
    </style>

<body>
<h2 ALIGN="CENTER">sports club</h2>
<form method="post">
<div class="container">
<label>sprt_id</label>
<input type="text" name="sprt_id" id="sprt_id" title="enter to sprt_id" maxlength="6" placeholder="sprt_id" value="<?php echo $sprt_id; ?>"><br><br>
<label>student_id</label>
<input type="text" name="student_id" id="student_id" placeholder="student_id"><br><br>
<label>stu_uname</label>
<input type="text" name="stu_name" id="stu_name" placeholder="stu_name"><br><br>
<label>department</label> 
<input type="text" name="department" id="department" placeholder="department"><br><br>
<label>year</label>

<input type="text" name="year" id="year" placeholder="year"><br><br>
<label>roll_no</label>

<input type="text" name="roll_no" id="roll_no" placeholder="roll_no"><br><br>
<label>email</label>

<input type="text" name="email" id="email" placeholder="email"><br><br>
<label>contact_no</label> 

<input type="text" name="contact_no" id="contact_no" placeholder="contact_no"><br><br>
<label>preferred_sport</label>


<select name="preferred_sport" id="preferred_sport" placeholder="preferred_sport">
            <option value="">Select box</option>
            <option value="football">football</option>
            <option value="volleyball">volleyball</option>
            <option value="basketball">basketball</option>
            <option value="athletics">athletics</option>
            <option value="badminton">badminton</option>

            </select>

<label>skill_level</label>


<select name="skill_level" id="skill_evel" placeholder="skill_level">
            <option value="">Select box</option>
            <option value="beginner">beginner</option>
            <option value="intermediate">intermediate</option>
            <option value="advanced">advanced</option>

            </select>
<label>interested_in</label>


<select name="interested_in" id="interested_in" placeholder="interested_in">
            <option value="">Select box</option>
            <option value="practice">practice</option>
            <option value="tournaments">tournaments</option>
            <option value="coaching">coaching</option>
            <option value="volunteering">volunteering</option>

            </select>

<label>suggestions_for_sports_activities</label>
<input type="text" name="suggestions_for_sports_activities" id="suggestions_for_sports_activities" placeholder="suggestions_for_sports_activities"><br><br>
<label>willing_to_represent_college_in_competitions</label>
 
<select name="willing_to_represent_college_in_competitions" id="willing_to_represent_college_in_competitions" placeholder="willing_to_represent_college_in_competitions">
            <option value="">Select box</option>
            <option value="yes">yes</option>
            <option value="no">no</option>
            </select>


<label>applied_date</label>

<input type="text" name="applied_date" id="applied_date" placeholder="applied_date" value="<?php echo $DateTime; ?>"  ><br><br>


<button type="submit">Submit</button>
</div>
</form>
</body>
</html>