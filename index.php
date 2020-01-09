<html>
<title>ADA Example Page</title>
<head>
  <?php require_once('pdoconnect.php') ?>
</head>
<body>
  <h1>ADAs</h1>
  <?php
  $ada = "SELECT title,directive,MEMBER.rank,MEMBER.last_name,MEMBER.first_name FROM ADA
    JOIN PRIMARY_MANAGER on ADA.ada_num=PRIMARY_MANAGER.ada_num
    JOIN MEMBER on MEMBER.member_num=PRIMARY_MANAGER.member_num;";
  $adaResult = $pdo->query($ada);
  ?>
  <table>
    <tr>
      <th>Title</th><th>Directives</th><th>Primary Manager</th>
    </tr>
    <?php
    while($adaList = $adaResult->fetch())
    {
      echo "    <tr>\n";
      echo "      <td>$adaList[0]</td><td>$adaList[1]</td><td>$adaList[2] $adaList[3], $adaList[4]</td>\n";
      echo "    </tr>\n";
    }
    ?>
  </table>
</body>
