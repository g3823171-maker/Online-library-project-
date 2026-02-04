<?php
$dsn="mysql:host=localhost;dbname=online forum;charset=utf8mb4";
$username="root";
$password="";
try{
$CONN=new PDO($dsn,$username,$password);
$CONN->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
die("connection failed:" . $e->getMessage());}



$stmt=$CONN->query("SELECT * FROM student_registration");
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);?>



<!DOCTYPE html>
<html>
<head>
<title>store and display data</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 20px;
    }

    h3 {
        color: #333;
        margin-bottom: 10px;
    }

    form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        max-width: 400px;
        margin-bottom: 30px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background: #007bff;
        color: #fff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #eef3fb;
    }

th:nth-child(odd) {
    background: #77c8d6;   /* Blue for odd headers */
    color: #fff;
}

th:nth-child(even) {
    background: #2dacb7;   /* Green for even headers */
    color: #fff;
}

</style>

</head><body>
<h2 align="center">APPLICATION_APPROVAL REPORT</h2>

<?php if(!empty($rows)):?>

<table>
<tr>
<th>STUDENT_ID</th>
<th>STUDENT_NAME</th>
<th>GENDER</th>
<th>DOB</th>
<th>EMAIL</th>
<th>MOBILE</th>
<th>DEPATMENT</th>
<th>YEAR_OF_STUDY</th>
<th>ROLL_NO</th>
<th>ADDRESS</th>
<th>BLOOD_GROUP</th>
<th>SKILLSINTERESTED_UNIT</th>
<th>CREATED_AT</th>
</tr>

<?php foreach($rows as $row):?>

<tr><td><?php echo htmlspecialchars($row['student_id']); ?></td>
<td><?php echo htmlspecialchars($row['student_name']); ?></td>
<td><?php echo htmlspecialchars($row['dob']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['mobile']); ?></td>
<td><?php echo htmlspecialchars($row['department']); ?></td>
<td><?php echo htmlspecialchars($row['year_of_study']); ?></td>
<td><?php echo htmlspecialchars($row['roll_no']); ?></td>
<td><?php echo htmlspecialchars($row['address']); ?></td>
<td><?php echo htmlspecialchars($row['blood_group']); ?></td>
<td><?php echo htmlspecialchars($row['skillsinterested_unit']); ?></td>
<td><?php echo htmlspecialchars($row['created_at']); ?></td>


</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
  
