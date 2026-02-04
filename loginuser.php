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


$stmt1 = $pdo->query("SELECT MAX(user_id) as user_id FROM login_users");

   
    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  
             $user_id=$row1['user_id']; 
$user_id=$user_id+1;
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

    $user_id      = trim($_POST['user_id']);
    $username     = trim($_POST['username']);
    $password     = trim($_POST['password']);
    $user_type    = trim($_POST['user_type']);
    $status       = trim($_POST['status']);
    $last_login   = trim($_POST['last_login']);
    $created_at   = trim($_POST['created_at']);
        $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $user_id)) {
 $errors[] = "RegID number must be 6 digit.";
 }
 if (empty($errors)) {
  


    
        
        $sql = "INSERT INTO login_users 
                (user_id, username, password, user_type, status, last_login, created_at)
                VALUES 
                (?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $user_id,
    $username,
    $password,
    $user_type,
    $status,
    $last_login,
    $created_at
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
<h2 align="center">loginuser</h2>
<form method="post">
<div class="container">
<label>user_id</label>
<input type="text"name="user_id" id="user_id" title="enter to user_id" maxlength="6" placeholder="user_id" value="<?php echo $user_id; ?>"><br><br>
<label>username</label>

<input type="text" name="username" id="username" placeholder="username"><br><br>
<label>password</label>

<input type="text" name="password" id="password" placeholder="password" ><br><br>
<label>user_type</label>



<select name="user_type" id="user_type" placeholder="user_type">
            <option value="">Select type</option>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
            <option value="Staff">Staff</option>
        </select>








<label>status</label>


<select  name="status" id="status" placeholder="status">
            <option value="">Select type</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            </select>










<label>last_login</label>

<input type="text" name="last_login" id="last_login" placeholder="last_login" value="<?php echo $DateTime; ?>" ><br><br>



<label>created_at</label> 

<input type="text" name="created_at" id="created_at" placeholder=" created_at" value="<?php echo $DateTime; ?>" ><br><br>


<button type="submit">Submit</button>
</div>
</form>
</body>
</html>