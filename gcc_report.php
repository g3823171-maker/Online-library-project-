<?php
include("db.php");
session_start();


$stmt=$pdo->query("SELECT * FROM gcc");
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
<h2 align="center">GCC REPORT</h2>

<?php if(!empty($rows)):?>

<table>
<tr>
<th>GCC_ID</th>
<th>STUDENT_ID</th>
<th>NAME</th>
<th>DEPARTMENT</th>
<th>YEAR</th>
<th>ROLL_NO</th>
<th>CONTACT_N0</th>
<th>EMAIL</th>
<th>GENDER</th>
<th>INTEREST_AREA</th>
<th>SUGGESTION_FOR_PROMOTING_GENDER_EQUALITY</th>
<th>WILLING_TO_VOLUNTEER_AS_GENDER_CHAMPION</th>
<th>APPLIED_DATE</th>

</tr>

<?php foreach($rows as $row):?>

<tr><td><?php echo htmlspecialchars($row['gcc_id']); ?></td>
<td><?php echo htmlspecialchars($row['student_id']); ?></td>
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['department']); ?></td>
<td><?php echo htmlspecialchars($row['year']); ?></td>
<td><?php echo htmlspecialchars($row['roll_no']); ?></td>
<td><?php echo htmlspecialchars($row['contact_no']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['gender']); ?></td>
<td><?php echo htmlspecialchars($row['interest_area']); ?></td>
<td><?php echo htmlspecialchars($row['suggestion_for_promoting_gender_equality']); ?></td>
<td><?php echo htmlspecialchars($row['willing_to_volunteer_as_gender_champion']); ?></td>
<td><?php echo htmlspecialchars($row['applied_date']); ?></td>


</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
  
