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


$stmt1 = $pdo->query("SELECT MAX(approval_id) as approval_id FROM application_approval");

   
    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  
             $approval_id=$row1['approval_id']; 
$approval_id=$approval_id+1;
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


    $approval_id =trim($_POST['approval_id']);
    $application_id        = trim($_POST['application_id']);                               $approved_by              = trim($_POST['approved_by']);
    $approval_status          = trim($_POST['approval_status']);
    $remarks                  = trim($_POST['remarks']);
    $approved_at              = trim($_POST['approved_at']);
      $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $approval_id)) {
 $errors[] = "approval_id number must be 6 digit.";
 }
 
  if (empty($errors)) {
  

    
        
        $sql = "INSERT INTO application_approval 
                (approval_id, application_id, approved_by,approval_status,remarks,approved_at)
                VALUES 
                (?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $approval_id,
    $application_id,
    $approved_by,
    $approval_status,
    $remarks,
    $approved_at

       
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
        body { font-family:cursive; background:#f4f4f4; }
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
<h2 align="center">Application</h2>
<form method="post">
<div class="container">
<label>approval_id</label>


<input type="text" name="approval_id" id="approval_id" title="enter to approval_id" maxlength="6" placeholder="approval_id" value="<?php echo $approval_id; ?>"><br><br>
<label>application_id</label>
<input type="text" name="application_id" id="application_id" placeholder="application_id"><br><br>

<label>approved_by</label>
<input type="text" name="approved_by" id="approved_by" placeholder="approved_by" ><br><br>

<label>approval_status</label>

<select name="approval_status" id="approval_status" placeholder="approval_status" required>
            <option value="">Select type</option>
            <option value="yes">yes</option>
            <option value="no">no</option>
            </select>






 <label>remarks</label>
<input type="text"name="remarks" id="remarks" placeholder="remarks" ><br><br>
<label>approved_at</label>


<input type="text" name="approved_at"id="approved_at" placeholder="approved_at" value="<?php echo $DateTime; ?>"  ><br><br>

<button type="submit">Submit</button>
</div>
</form>
</body>
</html>
