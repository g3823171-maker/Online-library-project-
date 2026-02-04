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

$stmt1 = $pdo->query("SELECT MAX(req_id) as req_id FROM yrc_requirements");
  
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
  
             $req_id=$row1["req_id"]; 
 $req_id=$req_id+1;

   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $req_id                  = trim($_POST['req_id']);
    $blood_donation_interest = trim($_POST['blood_donation_interest']);
    $first_aid_knowledge     = trim($_POST['first_aid_knowledge']);
    $volunteer_experience    = trim($_POST['volunteer_experience']);
    $health_awareness_interest = trim($_POST['health_awareness_interest']);
    $remarks = trim($_POST['remarks']);
    $errors = [];

 if (!preg_match('/^[0-9]{6}$/', $req_id)) {
 $errors[] = "req_id number must be 6 digit.";
 }

 if (empty($errors)) {

  

    
        
        $sql = "INSERT INTO yrc_requirements 
                (req_id, blood_donation_interest, first_aid_knowledge, volunteer_experience, health_awareness_interest, remarks)
                VALUES 
                (?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $req_id,
    $blood_donation_interest,
    $first_aid_knowledge,
    $volunteer_experience,
    $health_awareness_interest,
    $remarks
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
<h2 align="center">yrc requirements</h2>
<form method="post">
<div class="container">
<label>req_id</label>
<input type="text" name="req_id" id="req_id" title="enter to req_id" maxlength="6" placeholder="req_id" value="<?php echo $req_id; ?>"><br><br>

<label>blood_donation_interest</label>
<input type="text" name="blood_donation_interest" id="blood_donation_interest" placeholder="blood_donation_interest"><br><br>
<label>first_aid_knowledge</label>

<input type="text" name="first_aid_knowledge" id="first_aid_knowledge" placeholder="first_aid_knowledge"><br><br>
<label>volunteer_experience</label>

<input type="text" name="volunteer_experience" id="volunteer_experience" placeholder="volunteer_experience"><br><br>
<label>health_awareness_interest</label>

<input type="text" name="health_awareness_interest" id="health_awareness_interest" placeholder="health_awareness_interest"><br><br>
<label>remarks</label>

<input type="text" name="remarks" id="remarks" placeholder="remarks"><br><br>
<button type="submit">Submit</button>
</div>
</form>
</body>
</html>