<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
      font-family: Arial, sans-serif;
      display: flex;s
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f4f4f4;
    }

    .button-container {
      display: grid;
      grid-template-columns: repeat(4, 200px); 
      grid-gap: 20px;
    }

    .btn {
      width: 200px;              
      height: 60px;             
      background: #3498db;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      transition: background 0.3s ease;
      text-align: center;
    }

    .btn:hover {
      background: #2980b9;
    }
  </style>
  <meta charset="UTF-8">
  <title>Button Layout</title>
  </head>
<body>
  <div class="button-container">


    <form action="activity.php" method="get">
      <button class="btn">ACTIVITY</button>
    </form>

<form action="activity_report.php" method="get">
      <button class="btn">ACTIVITY_REPORT</button>
    </form>


<div id="application">
    <form action="application.php" method="get">
      <button class="btn">APPLICATION</button>
    </form>
</div>

<form action="application_report.php" method="get">
      <button class="btn">APPLICATION_REPORT</button>
    </form>


<div id="feedback" style="display:none">
    <form action="feedback.php" method="get">
      <button class="btn">FEEDBACK</button>
    </form>
</div>
<form action="feedback_report.php" method="get">
      <button class="btn">FEEDBACK_REPORT</button>
    </form>

    <form action="loginuser.php" method="get">
      <button class="btn">LOGINUSER</button>
    </form>

<form action="loginuser_report.php" method="get">
      <button class="btn">LOGINUSER_REPORT</button>
    </form>

    <form action="ncc.php" method="get">
      <button class="btn">NCC</button>
    </form>

<form action="ncc_report.php" method="get">
      <button class="btn">NCC_REPORT</button>
    </form>

    <form action="notification.php" method="get">
      <button class="btn">NOTIFICATION</button>
    </form>

 <form action="notification_report.php" method="get">
      <button class="btn">NOTIFICATION_REPORT</button>
    </form>

    <form action="nss.php" method="get">
      <button class="btn">NSS</button>
    </form>


  <form action="nss_report.php" method="get">
      <button class="btn">NSS_REPORT</button>
    </form>


    <form action="studentreg.php" method="get">
      <button class="btn">STUDENTREG</button>
    </form>

<form action="studentreg_report.php" method="get">
      <button class="btn">STUDENTREG_REPORT</button>
    </form>

    <form action="unitapplication.php" method="get">
      <button class="btn">UNITAPPLICATION</button>
    </form>

<form action="unitapplication_report.php" method="get">
      <button class="btn">UNITAPPLICATION_REPORT</button>
    </form>


    <form action="unitevents.php" method="get">
      <button class="btn">UNITEVENTS</button>
    </form>

<form action="unitevents_report.php" method="get">
      <button class="btn">UNITEVENTS_REPORT</button>
    </form>

    <form action="yrc.php" method="get">
      <button class="btn">YRC</button>
    </form>

<form action="yrc_report.php" method="get">
      <button class="btn">YRC_REPORT</button>
    </form>

    <form action="ccc.php" method="get">
      <button class="btn">CCC</button>
    </form>

<form action="ccc_report.php" method="get">
      <button class="btn">CCC_REPORT</button>
    </form>

    <form action="cb.php" method="get">
      <button class="btn">CB</button>
    </form>


    <form action="cb_report.php" method="get">
      <button class="btn">CB_REPORT</button>
    </form>

    <form action="gcc.php" method="get">
      <button class="btn">GCC</button>
    </form>

<form action="gcc_report.php" method="get">
      <button class="btn">GCC_REPORT</button>
    </form>

    <form action="sports club.php" method="get">
      <button class="btn">SPORTS CLUB</button>
    </form>


    <form action="sports club_report.php" method="get">
      <button class="btn">SPORTS CLUB_REPORT</button>
    </form>

    <form action="ssl.php" method="get">
      <button class="btn">SSL</button>
    </form>


<form action="ssl_report.php" method="get">
      <button class="btn">SSL_REPORT</button>
    </form>

    <form action="physical education & fitness centre.php" method="get">
      <button class="btn">PHYSICAL EDUCATION & FITNESS CENTRE</button>
    </form>

<form action="physical education & fitness centre_report.php" method="get">
      <button class="btn">PHYSICAL EDUCATION & FITNESS CENTRE_report</button>
    </form>

    </div>
</body>
</html>
<script>
var user_type="<?php echo $_SESSION['type'] ?? ''; ?>";
if (user_type === 'Admin')
{
document.getElementById("application").style.display = "none";
document.getElementById("feedback").style.display = "none";
}

</script>


