<?php
error_reporting(E_ERROR | E_PARSE);

$dsn = "mysql:host=localhost;dbname=online forum;charset=utf8mb4";
$db_user = "root";
$db_pass = "";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}



$stmt1 = $pdo->query("SELECT MAX(activity_id) as activity_id  FROM activity_register");

   
   $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
             $activity_id=$row1["activity_id"]; 
$activity_id=$activity_id+1;
    
   









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
$DtOnly2=(new DateTime())->format("Y-m-d");
//echo $DtOnly2;
//echo"<br>";
//echo"<br>";
$TimeOnly1=date("H:i:s");
//echo $TimeOnly1;
//echo"<br>";
//$TimeOnly2=(new DateTime())->format("H:i:s");
//echo $TimeOnly2;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $activity_id                = trim($_POST['activity_id']);
    $student_id                 = trim($_POST['student_id']);
    $unit_type                  = trim($_POST['unit_type']);
    $activity_title             = trim($_POST['activity_title']);
    $activity_description       = trim($_POST['activity_description']);
    $activity_date              = trim($_POST['activity_date']);
    $hours_spent                = trim($_POST['hours_spent']);
    $certificate_path           = trim($_POST['certificate_path']);
    $verified_by                = trim($_POST['verified_by']);
    $verified_at                = trim($_POST['verified_at']);
       $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $activity_id)) {
 $errors[] = "activity_id  number must be 6 digit.";
 }
if (!preg_match('/^[0-9]{6}$/', $student_id)) {
 $errors[] = "student_id  number must be 6 digit.";
 }

   if (empty($errors)) {
  

     
        $sql = "INSERT INTO activity_register 
                (activity_id, student_id, unit_type, activity_title, activity_description, activity_date, hours_spent, certificate_path, verified_by, verified_at)
                VALUES 
                (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $activity_id,
    $student_id,
    $unit_type,
    $activity_title,
    $activity_description,
    $activity_date,
    $hours_spent,
    $certificate_path,
    $verified_by,
    $verified_at
      ]);
} 

if ($ok) {
 echo "<p style='color:green;'>Registration Successful!</p>";
 } else {
 echo "<p style='color:red;'>Failed to register user.</p>";
 }

 }

 else {
 foreach ($errors as $e) {
 echo '<script>
 var msg = "'.htmlspecialchars($e, ENT_QUOTES).'";
 alert(msg);
 </script>';
 }

 }    



?>



<!DOCTYPE html>
<html>
<head>
<title>online forum</title>
</head>
<style>
        body { font-family: cursive; background:#f4f4f4; }
        .container {
            width: 500px; margin: 40px auto; padding: 20px;
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
<h2 align="center">activity</h2>
<form method="post">
<div class="container">

<label>activity_id</label>
<input type="text" name="activity_id" id="activity_id" title="enter to activity_id" maxlength="6" placeholder="activity_id" value="<?php echo $activity_id; ?>"><br><br>
<label>student_id</label>
<input type="text" name="student_id" id="student_id" title="enter to student_id" maxlength="6" placeholder="student_id" value="<?php echo $student_id; ?>"><br><br>
<label>unit_type</label>



<select name="unit_type" id="unit_type" placeholder="unit_type">
            <option value="">Select Role</option>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
            <option value="staff">staff</option>
            </select>












<label>activity_title</label>

 <input type="text" name="activity_title" id="activity_title" placeholder="activity_title"><br><br>
<label>activity_description</label>
 
<input type="text" name="activity_description" id="activity_description" placeholder="activity_description" ><br><br>
<label>activity_date</label>

<input type="text" name="activity_date" id="activity_date" placeholder="activity_date" value="<?php echo $DtOnly2; ?>" ><br><br>
<label>hours_spent</label>

<select name="hours_spent" id="hours_spent" placeholder="hours_spent">
            <option value="">Select Type</option>
            <option value="1 to 5">1 to 5</option>
            <option value="5 to 10">5 to 10</option>
            <option value="10 to 15">10 to 15</option>
            </select>






<label>certificate_path</label>

<input type="text" name="certificate_path" id="certificate_path" placeholder="certificate_path" ><br><br>
<label>verified_by</label>

<input type="text" name="verified_by" id="verified_by" placeholder="verified_by" ><br><br>
<label>verified_at</label>

<input type="text" name="verified_at" id="verified_at" placeholder="verified_at" value="<?php echo $DateTime; ?>" ><br><br>

<button type="submit">Submit</button>




</div>
</form>
</body>
</html>
