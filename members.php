<html>
<title>Member List</title>
<head>
<?php require_once('pdoconnect.php') ?>
</head>
<body>
  <h1>Members</h1>
  <table>
    <tr>
<?php
$primary = "SELECT rank,last_name,first_name,email FROM MEMBER
  JOIN PRIMARY_MANAGER ON PRIMARY_MANAGER.member_num=MEMBER.member_num
  WHERE PRIMARY_MANAGER.ada_num='$_GET["ada"]';";
$primaryResult = $pdo->query($primary);
$primaryMember = $primaryResult->fetch() ;
echo "      <td>Primary</td><td>$primaryMember[0] $primaryMember[1], $primaryMember[2]</td><td> $primaryMember[3]</td>";
?>
    </tr>
  </table>
</body>
</html>
