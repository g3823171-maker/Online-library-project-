<?php
$dsn="mysql:host=localhost;dbname=online forum;charset=utf8mb4";
$username="root";
$password="";
try{
$CONN=new PDO($dsn,$username,$price);
$CONN->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
die("connection failed:" . $e->getMessage());}



$stmt=$CONN->query("SELECT * FROM notifications");
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
    background: #007bff;   /* Blue for odd headers */
    color: #fff;
}

th:nth-child(even) {
    background: #28a745;   /* Green for even headers */
    color: #fff;
}

</style>

</head><body>
<h2 align="center">notifications REPORT</h2>

<?php if(!empty($rows)):?>

<table>
<tr>
<th>NOTI_ID</th>
<th>USER_ID</th>
<th>TITLE</th>
<th>MESSAGE</th>
<th>NOTI_TYPE</th>
<th>IS_READ</th>
<th>CREATED_AT</th>
</tr>

<?php foreach($rows as $row):?>

<tr><td><?php echo htmlspecialchars($row['notification_id']); ?></td>
<td><?php echo htmlspecialchars($row['user_id']); ?></td>
<td><?php echo htmlspecialchars($row['title']); ?></td>
<td><?php echo htmlspecialchars($row['message']); ?></td>
<td><?php echo htmlspecialchars($row['notification_type']); ?></td>
<td><?php echo htmlspecialchars($row['is_read']); ?></td>
<td><?php echo htmlspecialchars($row['created_at']); ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
  
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
<label>notification_id </label>

<input type="text"name="notification_id "id="notification_id "placeholder="notification_id "><br><br>
<label>user_id </label>

<input type="text"name="user_id"id="user_id"placeholder="user_id"><br><br>
<label>title </label>

<input type="text"name="title"id="title"placeholder="title" ><br><br>
<label> message</label>

<input type="text"name="message"id="message"placeholder="message" ><br><br>
<label>notification_type </label>

 
<input type="text"name="notification_type"id="notification_type"placeholder="notification_type" ><br><br>
<label>is_read</label>


<input type="text"name="is_read"id="is_read"placeholder="is_read" ><br><br>
<label>created_at </label>

<input type="text"name="created_at"id="created_at "placeholder="created_at " ><br><br>


<button type="submit">Submit</button>
</div>
</form>
</body>
</html>
