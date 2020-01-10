<html>
<title>Member List</title>
<head>
<?php require_once('pdoconnect.php');
$ada = $_GET['ada'];
$membersQuery = "SELECT MEMBERSHIP.member_level,rank,last_name,first_name,email FROM MEMBER
  JOIN MEMBERSHIP ON MEMBERSHIP.member_num=MEMBER.member_num
  WHERE ada_num = $ada
  ORDER BY member_level,last_name;";
$memberResult = $pdo->query($membersQuery);
?>
</head>
<body>
  <h1>Members</h1>
  <table>
    <?php
    $memberList = $memberResult->fetchAll();
    foreach ($memberList as $row)
    {
      if ($row[0] == "1") {
echo "      <tr>\n";
echo "        <td>Primary</td><td>$row[1] $row[2], $row[3]</td><td>$row[4]</td>\n";
echo "      </tr>\n";
      }elseif ($row[0] == "2") {
echo "      <tr>\n";
echo "        <td>Secondary</td><td>$row[1] $row[2], $row[3]</td><td>$row[4]</td>\n";
echo "      </tr>\n";
      }else{
echo "      <tr>\n";
echo "        <td></td><td>$row[1] $row[2], $row[3]</td><td>$row[4]</td>\n";
echo "      </tr>\n";
      }
    }
    ?>
  </table>
</body>
</html>
