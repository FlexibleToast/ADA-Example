<html>
<title>ADA Example Page</title>
<head>
  <?php require_once('pdoconnect.php') ?>
</head>
<body>
  <h1>ADAs</h1>
  <?php
  $ada = "SELECT title,directive,MEMBER.rank,MEMBER.last_name,MEMBER.first_name FROM ADA
    JOIN PRIMARY on ADA.ada_num=PRIMARY.ada_num
    JOIN MEMBER on MEMBER.member_num=PRIMARY.member_num;";
  $adaResult = $pdo->query($ada);
  $adaList = $adaResult->fetch();
  echo "Title: $adaList[0]"?>
</body>
