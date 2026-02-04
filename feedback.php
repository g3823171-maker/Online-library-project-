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


$stmt1 = $pdo->query("SELECT MAX(feedback_id) as feedback_id FROM feedback");

   
    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  
             $feedback_id=$row1['feedback_id']; 
$feedback_id=$feedback_id+1;
    }



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

    $feedback_id = trim($_POST['feedback_id']);
    $student_id = trim($_POST['student_id']);
    $unit_type = trim($_POST['unit_type']);
    $feedback_type  = trim($_POST['feedback_type']);
    $rating = trim($_POST['rating']);
    $comments = trim($_POST['comments']);
    $submitted_at = trim($_POST['submitted_at']);
      $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $feedback_id)) {
 $errors[] = "feedback_id number must be 6 digit.";
 }
 if (!preg_match('/^[0-9]{6}$/', $student_id)) {
 $errors[] = "student_id number must be 6 digit.";
 }

 if (empty($errors)) {


        $sql = "INSERT INTO feedback 
                (feedback_id, student_id, unit_type, feedback_type, rating, comments, submitted_at)
                VALUES 
                (?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $feedback_id,
    $student_id,
    $unit_type,
    $feedback_type,
    $rating,
    $comments,
    $submitted_at
   



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
<h2>feedback</h2>
<form method="post">
<div class="container">
<label>feedback_id</label>
<input type="text" name="feedback_id" id="feedback_id" title="enter to feedback_id" maxlength="6" placeholder="feedback_id" value="<?php echo $feedback_id; ?>"><br><br>

<label>student_id</label>

<input type="text" name="student_id" id="feedback_id" title="enter to feedback_id" maxlength="6" placeholder="feedback_id" value="<?php echo $feedback_id; ?>"><br><br>

<label>unit_type</label>
 
<select name="unit_type" id="unit_type" placeholder="unit_type">
            <option value="">Select Role</option>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
            <option value="Staff">Staff</option>
            </select>











<label>feedback_type</label>

<input type="text"name="feedback_type"id="feedback_type"placeholder="feedback_type" ><br><br>
 <label>rating</label>

<input type="text"name="rating"id="rating"placeholder="rating" ><br><br>
<label>comments</label>

<input type="text"name="comments"id="comments"placeholder="comments" ><br><br>
<label>submitted_at</label>

<input type="text"name="submitted_at"id="submitted_at"placeholder="submitted_at" value="<?php echo $DateTime; ?>"   ><br><br>


<button type="submit">Submit</button>
</form>
</body>
</html>