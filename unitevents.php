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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $event_id  = trim($_POST['event_id']);
    $unit_type = trim($_POST['unit_type']);
    $event_title = trim($_POST['event_title']);
    $event_description  = trim($_POST['event_description']);
    $event_date = trim($_POST['event_date']);
    $event_time = trim($_POST['event_time']);
    $venue = trim($_POST['venue']);
    $created_by = trim($_POST['created_by']);

     $errors = [];
 if (!preg_match('/^[0-9]{6}$/', $event_id)) {
 $errors[] = "event_id number must be 6 digit.";
 }
 if (empty($errors)) {
        
        $sql = "INSERT INTO unit_events 
                (event_id, unit_type, event_title, event_description, 	event_date, event_time, venue, created_by)
                VALUES 
                (?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
    $event_id,
    $unit_type,
    $event_title,
    $event_description,
    $event_date,
    $event_time,
    $venue,
    $created_by

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
<h2 align="center">unit_events</h2>
<form method="post">
<div class="container">
<label>event_id</label>
<input type="text" name="event_id" id="event_id" title="enter to event_id" maxlength="6" placeholder="event_id" value="<?php echo $event_id; ?>"><br><br>
<label>unit_type</label>
<input type="text" name="unit_type" id="unit_type" placeholder="unit_type"><br><br>
<label>event_title</label>

<input type="text" name="event_title" id="event_title" placeholder="event_title"><br><br>
<label>event_description</label>

<input type="text" name="event_description" id="event_description" placeholder="event_description"><br><br>
<label>event_date</label>

<input type="text" name="event_date" id="event_date" placeholder="event_date"><br><br>
<label>event_time</label>

<input type="text" name="event_time" id="event_time" placeholder="event_time"><br><br>
<label>venue</label>

<input type="text" name="venue" id="venue" placeholder="venue"><br><br>
<label>created_by</label>

<input type="text" name="created_by" id="created_by" placeholder="created_by"><br><br>
<button type="submit">submit</button>
</div>
</form>
</body>
</html>