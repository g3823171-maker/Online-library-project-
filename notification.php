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



$stmt1 = $pdo->query("SELECT MAX(user_id) as user_id FROM notifications");

   
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

    
    $user_id              = trim($_POST['user_id']);
    $title                = trim($_POST['title']);
    $message              = trim($_POST['message']);
    $notification_type    = trim($_POST['notification_type']);
    $is_read              = trim($_POST['is_read']);
    $created_at           = trim($_POST['created_at']);
    $notification_id      = trim($_POST['notification_id']);
     $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $user_id)) {
 $errors[] = "RegID number must be 6 digit.";
 }
 if (empty($errors)) {

  

    
        
        $sql = "INSERT INTO notifications 
                (user_id, title, message, notification_type, is_read, created_at, notification_id)
                VALUES 
                (?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $user_id,
    $title,
    $message,
    $notification_type,
    $is_read,
    $created_at,
    $notification_id

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
<h2 align="center">Notifications</h2>
<form method="post">
<div class="container">
<label>user_id</label>

<input type="text" name="user_id" id="user_id" title="enter to user_id" maxlength="6" placeholder="user_id" value="<?php echo $user_id; ?>"><br><br>
<label>title</label>

<input type="text"name="title"id="title" placeholder="title" ><br><br>
<label>message</label>

<input type="text"name="message"id="message"placeholder="message" ><br><br>
<label>notification_type </label>

 
<input type="text"name="notification_type"id="notification_type"placeholder="notification_type" ><br><br>
<label>is_read</label>


<input type="text"name="is_read"id="is_read"placeholder="is_read" ><br><br>
<label>created_at </label>

<input type="text"name="created_at"id="created_at "placeholder="created_at" value="<?php echo $DateTime; ?>"  ><br><br>
<label>notification_id</label>

<input type="text"name="notification_id" id="notification_id" placeholder="notification_id" value="<?php echo $notification_id;  ?>"><br><br>



<button type="submit">Submit</button>
</div>
</form>
</body>
</html>