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

$stmt1 = $pdo->query("SELECT MAX(gcc_id) as gcc_id FROM gcc");

   
  $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);         

   $gcc_id=$row1['gcc_id']; 
$gcc_id=$gcc_id+1;

    

   



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
    $gcc_id = trim($_POST['gcc_id']);   
    $student_id = trim($_POST['student_id']);
    $name = trim($_POST['name']);
    $department = trim($_POST['department']);
    $year  = trim($_POST['year']);
    $roll_no = trim($_POST['roll_no']);
    $contact_no  = trim($_POST['contact_no']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $interest_area = trim($_POST['interest_area']);
    $suggestion_for_promoting_gender_equality = trim($_POST['suggestion_for_promoting_gender_equality']);
    $willing_to_volunteer_as_gender_champion = trim($_POST['willing_to_volunteer_as_gender_champion']);
    $applied_date = trim($_POST['applied_date']);

    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $gcc_id)) {
 $errors[] = "gccID number must be 6 digit.";
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $errors[] = "Invalid email format.";
 }
 if (!preg_match('/^[0-9]{10}$/', $contact_no)) {
 $errors[] = "contact_no  must be 10 digits.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO gcc 
                (gcc_id, student_id, name, department, year, roll_no, email, contact_no, gender, interest_area, suggestion_for_promoting_gender_equality, willing_to_volunteer_as_gender_champion, applied_date) 

                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $gcc_id,   
    $student_id,
    $name,
    $department,
    $year,
    $roll_no,
    $contact_no,
    $email,
    $gender,
    $interest_area,
    $suggestion_for_promoting_gender_equality,
    $willing_to_volunteer_as_gender_champion,
    $applied_date 
]);
} 

if ($ok) {
 echo "<p style='color:green;'>Registration Successful!</p>";
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
<h2 ALIGN="CENTER">gcc</h2>
<form method="post">
<div class="container">
<label>gcc_id</label>
<input type="text" name="gcc_id" id="gcc_id" title="enter to gcc_id" maxlength="6" placeholder="gcc_id" value="<?php echo $gcc_id; ?>"><br><br>
<label>student_id</label>
<input type="text" name="student_id" id="student_id" placeholder="student_id"><br><br>
<label>name</label>
<input type="text" name="name" id="name" placeholder="name"><br><br>
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
<label>gender</label>

<select name="gender" id="gender" placeholder="gender">
            <option value="">Select box</option>
            <option value="female">female</option>
            <option value="male">male</option>
            <option value="others">others</option>

            </select>



<label>interest_area</label>
<select name="interest_area" id="interest_area" placeholder="interest_area">
            <option value="">Select box</option>
            <option value="awareness campaigns">awareness campaigns</option>
            <option value="workshops">workshops</option>
            <option value="peer counseling">peer counseling</option>
            <option value="events">events</option>
            <option value="research">research</option>

            </select>




<label>suggestion_for_promoting_gender_equality</label>
<input type="text" name="suggestion_for_promoting_gender_equality" id="suggestion_for_promoting_gender_equality" placeholder="suggestion_for_promoting_gender_equality"><br><br>
<label>willing_to_volunteer_as_gender_champion</label>

<select name="willing_to_volunteer_as_gender_champion" id="willing_to_volunteer_as_gender_champion" placeholder="willing_to_volunteer_as_gender_champion">
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