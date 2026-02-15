<?php
include("db.php");

$stmt1 = $pdo->query("SELECT MAX(staff_id) AS staff_id FROM staff_registration"); 
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC); // Handle case when table is empty (MAX returns NULL) 
$staff_id = ($row1['staff_id'] ?? 0) + 1;


// --- FORM SUBMISSION HANDLER ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $staff_id      = trim($_POST['staff_id']);
    $staff_name        = trim($_POST['staff_name']);
    $email      = trim($_POST['email']);
    $mobile    = trim($_POST['mobile']);
    $qualification     = trim($_POST['qualification']);
    $designation = trim($_POST['designation']);
    $department      = trim($_POST['department']);
    $address     = trim($_POST['address']);
    $pass     = trim($_POST['pass']);
    $joining_date        = trim($_POST['joining_date']);
    $created_at         = trim($_POST['created_at']);
$errors = [];  

if (!preg_match('/^[0-9]{4}$/', $staff_id)) { 
$errors[] = "Staff must be 4 digits."; 
} 
 


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
$errors[] = "Invalid email format."; 
} 
 
if (!preg_match('/^[0-9]{10}$/', $mobile)) { 
$errors[] = "Mobile number must be 10 digits."; 
} 
 

  
if (empty($errors)) {

        $sql = "INSERT INTO staff_registration (staff_id,staff_name,email,mobile,qualification,designation,department,address,password, joining_date,created_at   )
                VALUES 
                (?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $pdo->prepare($sql);

        $ok = $stmt->execute([
           $staff_id,
$staff_name,
$email,
$mobile,
$qualification,
$designation,
$department,
$address,
$pass,
$joining_date,
$created_at ]);

if($ok)
{
   echo '<script> alert("data stored"); 
   window.location.href = "' . $_SERVER['PHP_SELF'] . '"; 
   </script>'; 
   exit;
    
}

}
if ($ok) { 
echo "<p style='color:green;'>Registration Successful!</p>"; 
}else { 
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
<title>staff_registration</title>
<style>
        body { font-family: Arial; background:#7ee5de; }
        .container {
            width: 450px; margin: 40px auto; padding: 20px;
            background: #dfd0f2; border-radius: 8px;
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

</head>
<body><center><h2>staff_registration</h2>
<div class="container">
<form name="staff_registration" id="staff_registration" method="post">
<label> staff_id:</label>
<input type="text" name="staff_id" id="staff_id" title="enter your id" placeholder= "enter your staff_id"  value="<?php echo $staff_id;?>"/><br><br>
<label>staff_name:</label>
<input type="text" name="staff_name" id="staff_name" title="enter your staffname" placeholder="enter your staff_name "/><br><br>
<label>email:</label>
<input type="text" name="email" id="email" title="enter your email" placeholder="enter your email"/><br><br>
<label>	mobile:</label>
<input type="text" name="mobile" id="mobile" title="enter your mobile" placeholder="enter your mobile"/><br><br>
<label>qualification:</label>
<input type="text" name="qualification" id="qualification" title="enter your qualification" placeholder="enter your qualification"/><br><br>
<label>designation:</label>
<input type="text" name="designation" id="designation" title="enter your designation" placeholder="enter your designation"/><br><br>
<label>department:</label>
<input type="text" name="department" id="department" title="enter your department" placeholder="enter your department"/><br><br>
<label>address:</label>
<input type="text" name="address" id="address" title="enter your address" placeholder="enter your address"/><br><br>
<label>password:</label>
<input type="text" name="pass" id="pass" title="enter your password" placeholder="enter your password"/><br><br>
<label>joining_date:</label>
<input type="date" name="joining_date" id="joining_date" title="enter your joining date" placeholder="enter your joining_date"/><br><br>
<label>created_at:</label>
<input type="date" name="created_at" id="created_at" placeholder="enter your created_at"/><br><br>
<button type="submit">submit</button>
</div>
</center>
</body>
</html>