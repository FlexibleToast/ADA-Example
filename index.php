<html>
<title>ADA Example Page</title>
<head>
  <?php require_once('pdoconnect.php') ?>
</head>
<body>
  <h1>ADAs</h1>
  <?php
  $ada = "SELECT ada_num,title,directive FROM ADA;";
  $adaResult = $pdo->query($ada);
  ?>
  <table>
    <tr>
      <th>Title</th><th>Directives</th><th>Primary Manager</th>
    </tr>
    <?php
    while($adaList = $adaResult->fetch())
    {
      $primary = "SELECT rank,last_name,first_name,email FROM MEMBER
        JOIN MEMBERSHIP on MEMBERSHIP.member_num=MEMBER.member_num
        WHERE ada_number=$adaList[0] and member_level=1;";
      $primaryResult = $pdo->query($primary)->fetch();
      echo "    <tr>\n";
      echo "      <td>$adaList[1]</td><td>$adaList[2]</td><td>$primaryResult[0] $primaryResult[1], $primaryResult[2]</td>\n";
      echo "    </tr>\n";
    }
    ?>
  </table>
</body>
