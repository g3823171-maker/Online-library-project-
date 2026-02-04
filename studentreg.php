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

$stmt1 = $pdo->query("SELECT MAX(student_id) as student_id FROM student_registration");

   
  $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);         

   $student_id=$row1['student_id']; 
$student_id=$student_id+1;

    

   



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

    $student_id = trim($_POST['student_id']);
    $student_name = trim($_POST['student_name']);
    $gender = trim($_POST['gender']);
    $dob  = trim($_POST['dob']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $department = trim($_POST['department']);
    $year_of_study = trim($_POST['year_of_study']);
    $roll_no = trim($_POST['roll_no']);
    $address = trim($_POST['address']);
    $blood_group = trim($_POST['blood_group']);
    $skillsinterested_unit = trim($_POST['skillsinterested_unit']);
    $created_at = trim($_POST['created_at']);
    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $student_id)) {
 $errors[] = "RegID number must be 6 digit.";
 }
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $errors[] = "Invalid email format.";
 }
 if (!preg_match('/^[0-9]{10}$/', $mobile)) {
 $errors[] = "Mobile number must be 10 digits.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO student_registration 
                (student_id, student_name, gender, dob, email, mobile, department, year_of_study, roll_no, address, blood_group, skillsinterested_unit, created_at)
                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $student_id,
    $student_name,
    $gender,
    $dob,
    $email,
    $mobile,
    $department,
    $year_of_study,
    $roll_no,
    $address,
    $blood_group,
    $skillsinterested_unit,
    $created_at



       
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
<h2 ALIGN="CENTER">studentreg</h2>
<form method="post">
<div class="container">
<label>student_id</label>
<input type="text"name="student_id" id="student_id" title="enter to student_id" maxlength="6" placeholder="student_id" value="<?php echo $student_id; ?>"><br><br>
<label>student_name</label>

<input type="text" name="student_name" id="student_name" placeholder="student_name"><br><br>
<label>gender</label>

<select name="gender" id="gender" placeholder="gender">
            <option value="">Select gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
            </select>

<label>dob</label>

<input type="date" name="dob" id="dob" placeholder="dob"><br><br>
<label>email</label>

<input type="text" name="email" id="email" placeholder="email"><br><br>
<label>mobile</label>

<input type="text" name="mobile" id="mobile" placeholder="mobile"><br><br>
<label>department</label> 

<input type="text" name="department" id="department" placeholder="department"><br><br>
<label>year_of_study</label>



<select name="year_of_study" id="year_of_study" placeholder="year_of_study">
            <option value="">Select type</option>
            <option value="I year">I year</option>
            <option value="II year">II year</option>
            <option value="III year">III year</option>
            </select>





<label>roll no</label>

<input type="text" name="rol no" id="roll no" placeholder="roll no"><br><br>
<label>address</label>

<input type="text"name="address"id="address"placeholder="address"><br><br>
<label>blood_group</label>

<select name="blood_group" id="blood_group" placeholder="blood_group">
            <option value="">Select type</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB=">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            </select>






<label>skillsinterested_unit</label>

<input type="text"name="skillsinterested_unit"id="skillsinterested_unit"placeholder="skillsinterested_unit"><br><br>
<label>created_at</label>

<input type="text" name="created_at" id="created_at" placeholder="created_at" value="<?php echo $DateTime; ?>"  ><br><br>


<button type="submit">Submit</button>
</div>
</form>
</body>
</html>