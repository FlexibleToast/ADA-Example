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
      <th>Title</th><th>Directives</th><th>Primary Manager</th><th>Email</th>
    </tr>
    <?php
    $adaList = $adaResult->fetchAll();
    foreach($adaList as $row)
    {
      $primary = "SELECT rank,last_name,first_name,email FROM MEMBER
        JOIN MEMBERSHIP on MEMBERSHIP.member_num=MEMBER.member_num
        WHERE ada_num=$row[0]
        AND member_level=1;";
      $primaryResult = $pdo->query($primary)->fetch();
      echo "    <tr>\n";
      echo "      <td><a href='/members.php?ada=$row[0]'>$row[1]</a></td><td>$row[2]</td><td>$primaryResult[0] $primaryResult[1], $primaryResult[2]</td><td> $primaryResult[3]</td>\n";
      echo "    </tr>\n";
    }
    ?>
  </table>
</body>
