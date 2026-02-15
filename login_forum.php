<?php
include("db.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email  = trim($_POST['email']);
    $password  = trim($_POST['password']);
    $user_type = trim($_POST['user_type']);
    
    // Choose table based on user_type
    if ($user_type === 'Admin') {
        $table = 'staff_registration';
    } elseif ($user_type === 'Staff') {
        $table = 'staff_registration';
    } elseif ($user_type === 'Student') {
        $table = 'student_registration';
    } else {
        die("Invalid user type.");
    }
    
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        
        if ($user['password'] === $password) {
            $_SESSION['type'] = $user_type;
            $_SESSION['email'] = $email;
			
			$stmt1 = $pdo->prepare("UPDATE $table SET status = 'Active' WHERE  email = :email;");
			$stmt1->execute([':email' => $email]);
			$user1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            header("Location: index.php");
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container {
            width: 450px; 
			margin: 40px auto; 
			padding: 20px;
            background: #fff; 
			border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%; 
			padding: 10px; 
			margin: 8px 0;
            border: 1px solid #ccc; 
			border-radius: 4px;
        }
        button {
            background: #007bff; 
			color: #fff; padding: 10px;
            border: none; 
			width: 100%; 
			border-radius: 4px;
            cursor: pointer; 
			font-size: 16px;
        }
        button:hover { background: #0056b3; }
        a { display: block; margin-top: 10px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2 align="center">Login</h2>

    <form method="POST">
        <label>User-Type</label>
        <select name="user_type" required>
            <option value="">Select Type</option>
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
            <option value="Student">Student</option>
        </select>

        <label>email</label>
        <input type="text" name="email" placeholder="Email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="password" required>

        <button type="submit">Submit</button>
        <a href="Staff_registration.php">New Staff? Register here...</a>
		<a href="student_register.php">New student? Register here...</a>
		</form>
</div>

</body>
</html>
