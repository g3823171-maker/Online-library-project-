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

$stmt1 = $pdo->query("SELECT MAX(cb_id) as cb_id FROM clean_briket");

   
  $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);         

   $cb_id=$row1['cb_id']; 
$cb_id=$cb_id+1;

    

   



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
    $cb_id = trim($_POST['cb_id']);   
    $student_id = trim($_POST['student_id']);
    $name = trim($_POST['name']);
    $department = trim($_POST['department']);
    $year  = trim($_POST['year']);
    $roll_no = trim($_POST['roll_no']);
    $contact_number  = trim($_POST['contact_number']);
    $email = trim($_POST['email']);
    $area_assigned_for_cleaning = trim($_POST['area_assigned_for_cleaning']);
    $preferred_activity = trim($_POST['preferred_activity']);
    $suggestions_for_clean_campus = trim($_POST['suggestions_for_clean_campus']);
    $willing_to_volunteer_regularly = trim($_POST['willing_to_volunteer_regularly']);
    $applied_date = trim($_POST['applied_date']);
    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $cb_id)) {
 $errors[] = "cbID number must be 6 digit.";
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $errors[] = "Invalid email format.";
 }
 if (!preg_match('/^[0-9]{10}$/', $contact_number)) {
 $errors[] = "contact_number number must be 10 digits.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO clean_briket
                (cb_id, student_id, name, department, year, roll_no, email, contact_number, area_assigned_for_cleaning, preferred_activity, suggestions_for_clean_campus, willing_to_volunteer_regularly,applied_date) 

                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $cb_id,   
    $student_id,
    $name,
    $department,
    $year,
    $roll_no,
    $contact_number,
    $email,
    $area_assigned_for_cleaning,
    $preferred_activity,
    $suggestions_for_clean_campus,
    $willing_to_volunteer_regularly,
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
<h2 ALIGN="CENTER">clean briket</h2>
<form method="post">
<div class="container">
<label>cb_id</label>
<input type="text" name="cb_id" id="cb_id" title="enter to cb_id" maxlength="6" placeholder="cb_id" value="<?php echo $cb_id; ?>"><br><br>
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
<label>contact_number</label> 

<input type="text" name="contact_number" id="contact_number" placeholder="contact_number"><br><br>
<label>area_assigned_for_cleaning</label>


<select  name="area_assigned_for_cleaning" id="area_assigned_for_cleaning" placeholder="area_assigned_for_cleaning">
            <option value="">Select box</option>
            <option value="classroom">classroom</option>
            <option value="corridor">corridor</option>
            <option value="garden">garden</option>
            <option value="playground">playground</option>

            </select>


<label>preferred_activity</label>

<input type="text" name="preferred_activity" id="preferred_activity" placeholder="preferred_activity"><br><br>
<label>suggestions_for_clean_campus</label>
<input type="text" name="suggestions_for_clean_campus" id="suggestions_for_clean_campus" placeholder="suggestions_for_clean_campus"><br><br>
<label>willing_to_volunteer_regularly</label>
  
<select name="willing_to_volunteer_regularly" id="willing_to_volunteer_regularly" placeholder="willing_to_volunteer_regularly">
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