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

$stmt1 = $pdo->query("SELECT MAX(ccc_id) as ccc_id FROM ccc");

   
  $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);         

   $ccc_id=$row1['ccc_id']; 
$ccc_id=$ccc_id+1;

    

   



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
    $ccc_id = trim($_POST['ccc_id']);   
    $student_id = trim($_POST['student_id']);
    $student_name = trim($_POST['student_name']);
    $department = trim($_POST['department']);
    $year  = trim($_POST['year']);
    $roll_number = trim($_POST['roll_number']);
    $email = trim($_POST['email']);
    $contact_number  = trim($_POST['contact_number']);
    $topic_of_interest = trim($_POST['topic_of_interest']);
    $suggestions = trim($_POST['suggestions']);
    $willing_to_volunteer = trim($_POST['willing_to_volunteer']);
    $applied_date = trim($_POST['applied_date']);
    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $ccc_id)) {
 $errors[] = "studentID number must be 6 digit.";
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $errors[] = "Invalid email format.";
 }
 if (!preg_match('/^[0-9]{10}$/', $contact_number)) {
 $errors[] = "contact_number  must be 10 digits.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO ccc 
                (ccc_id, student_id, student_name, department, year, roll_number, email, contact_number, topic_of_interest, suggestions, willing_to_volunteer, applied_date) 

                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $ccc_id,  
    $student_id,
    $student_name,
    $department,
    $year,
    $roll_number,
    $email,
    $contact_number,
    $topic_of_interest,
    $suggestions,
    $willing_to_volunteer,
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
<h2 ALIGN="CENTER">ccc</h2>
<form method="post">
<div class="container">
<label>ccc_id</label>
<input type="text"name="ccc_id" id="ccc_id" title="enter to ccc_id" maxlength="6" placeholder="ccc_id" value="<?php echo $ccc_id; ?>"><br><br>
<label>student_id</label>
<input type="text" name="student_id" id="student_id" placeholder="student_id"><br><br>
<label>student_name</label>
<input type="text" name="student_name" id="student_name" placeholder="student_name"><br><br>
<label>department</label> 
<input type="text" name="department" id="department" placeholder="department"><br><br>
<label>year</label>

<input type="text" name="year" id="year" placeholder="year"><br><br>
<label>roll_number</label>

<input type="text" name="roll_number" id="roll_number" placeholder="roll_number"><br><br>
<label>email</label>

<input type="text" name="email" id="email" placeholder="email"><br><br>
<label>contact_number</label> 

<input type="text" name="contact_number" id="contact_number" placeholder="contact_number"><br><br>
<label>topic_of_interest</label>

<select name="topic_of_interest" id="topic_of_interest" placeholder="topic_of_interest">
            <option value="">Select box</option>
            <option value="consumer rights">consumer rights</option>
            <option value="digital safety">digital safety</option>
            <option value="sustainable consumption">sustainable consumption</option>
            </select>





<label>suggestions</label>

<input type="text"name="suggestions" id="suggestions" placeholder="suggestions"><br><br>
<label>willing_to_volunteer</label>

 <select name="willing_to_volunteer" id="willing_to_volunteer" placeholder="willing_to_volunteer">
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