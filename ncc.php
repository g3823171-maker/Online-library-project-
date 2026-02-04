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

$stmt1 = $pdo->query("SELECT MAX(req_id) as req_id FROM ncc_requirements");

   
    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  
             $req_id=$row1['req_id']; 
$req_id=$req_id+1;
    }





if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $req_id      = trim($_POST['req_id']);
    $height     = trim($_POST['height']);
    $weight     = trim($_POST['weight']);
    $medical_fitness_status    = trim($_POST['medical_fitness_status']);
    $sports_participation       = trim($_POST['sports_participation']);
    $drill_experience   = trim($_POST['drill_experience']);
    $certificates   = trim($_POST['certificates']);
    $remarks   = trim($_POST['remarks']);
    $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $req_id)) {
 $errors[] = "RegID number must be 6 digit.";
 }
 if (empty($errors)) {


    
        
        $sql = "INSERT INTO ncc_requirements 
                (req_id, height, weight, medical_fitness_status, sports_participation, drill_experience, certificates, remarks)
                VALUES 
                (?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $req_id,
    $height,
    $weight,
    $medical_fitness_status,
    $sports_participation,
    $drill_experience,
    $certificates,
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
<h2 align="center">NCC</h2>
<form method="post">
<div class="container">
<label>req_id</label>

<input type="text"name="req_id" id="req_id" title="enter to req_id" maxlength="6" placeholder="req_id" value="<?php echo $req_id; ?>"><br><br>
<label>height</label>

<input type="text"name="height"id="height"placeholder="height"><br><br>
<label>weight </label>

<input type="text"name="weight"id="weight"placeholder="weight" ><br><br>
<label>medical_fitness_status </label>

<input type="text"name="medical_fitness_status"id="medical_fitness_status"placeholder="medical_fitness_status" ><br><br>
<label>sports_participation</label>

 
<input type="text"name="sports_participation"id="sports_participation"placeholder="sports_participation" ><br><br>
<label>drill_experience </label>


<input type="text"name="drill_experience"id="drill_experience"placeholder="drill_experience" ><br><br>
<label>certificates  </label>

<input type="text"name="certificates "id="certificates "placeholder="certificates " ><br><br>
<label> remarks </label>

<input type="text"name=" remarks"id=" remarks"placeholder="remarks " ><br><br>


<button type="submit">Submit</button>
</div>
</form>
</body>
</html>