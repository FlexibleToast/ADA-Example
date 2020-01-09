<html>
<title>ADA Example Page</title>
<head>
  <?php require_once('pdoconnect.php') ?>
</head>
<body>
  <h1>ADAs</h1>
  <?php
  $ada = "SELECT title,directive,ADA.primary_manager,ADA.secondary_manager FROM ADA
    JOIN MEMBER on primary_manager=MEMBER.member_num
    JOIN MEMBER on secondary_manager=MEMBER.member_num;";
  $adaResult = $pdo->query($ada);
  $adaList = $adaResult->fetch();
  echo "Title: $adaList[0]"?>
</body>
