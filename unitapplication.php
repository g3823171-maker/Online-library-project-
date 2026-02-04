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



$stmt1 = $pdo->query("SELECT MAX(application_id) as application_id FROM unit_application_form");

   
    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  
             $application_id=$row1['application_id']; 
$application_id=$application_id+1;
    }



$dt=new DateTime("now",new DateTimeZone(date_default_timezone_get()));
$DateTime=$dt->format("Y-m-dH:i:s");
//echo $DateTime;
//echo"<br>";
//echo"<br>";
//$DtOnly1=date("Y-m-d");
//echo $DtOnly1;
//echo"<br>";
$DtOnly1=date("Y-m-d");
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

    $application_id = trim($_POST['application_id']);
    $student_id = trim($_POST['student_id']);
    $unit_type = trim($_POST['unit_type']);
    $requirement_id  = trim($_POST['requirement_id']);
    $motivation_statement = trim($_POST['motivation_statement']);
    $supporting_documents = trim($_POST['supporting_documents']);
    $application_date = trim($_POST['application_date']);
    $status = trim($_POST['status']);
     $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $application_id)) {
 $errors[] = "RegID number must be 6 digit.";
 }
 if (empty($errors)) {


    
  

    
        
        $sql = "INSERT INTO unit_application_form
                (application_id, student_id, unit_type, requirement_id, motivation_statement, supporting_documents, application_date, status)
                VALUES 
                (?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $application_id,
    $student_id,
    $unit_type,
    $requirement_id,
    $motivation_statement,
    $supporting_documents,
    $application_date,
    $status
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


<html>
<head>
<title>online forum</title>
</head>
 <style>
        body { font-family: cursive; background:#f4f4f4; }
        .container {
            width: 500px; margin: 40px auto; padding: 20px;
            background: skyblue; border-radius: 8px;
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
<h2 align="center">unit application</h2>
<form method="post">
<div class="container">
<label>application_id</label>
<input type="text" name="application_id" id="application_id" title="enter to application_id" maxlength="6" placeholder="application_id" value="<?php echo $application_id; ?>"><br><br>
<label>student_id</label>
<input type="text" name="student_id" id="student_id" placeholder="student_id"><br><br>
<label>unit_type</label>


<select name="unit_type" id="unit_type" placeholder="unit_type">
            <option value="">Select Role</option>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
            <option value="Staff">Staff</option>
            </select>

<label>requirement_id</label>

<input type="text" name="requirement_id" id="requirement_id" placeholder="requirement_id"><br><br>
<label>motivation_statement</label>

<input type="text" name="motivation_statement" id="motivation_statement" placeholder="motivation_statement"><br><br>
<label>supporting_documents</label>

<input type="text" name="supporting_documents" id="supporting_documents" placeholder="supporting_documents"><br><br>
<label>application_date </label>

<input type="text" name="application_date" id="application_date" placeholder="application_date"   value="<?php echo $DtOnly1; ?>"   ><br><br>
<label>status</label>

<input type="text" name="status" id="status" placeholder="status"><br><br>
<button type="submit">Submit</button>
</div>
</form>
</body>
</html>