<?php

use sifirdanphp\db\DataBase;
use sifirdanphp\routing;

require_once 'theme/header.php';
$db = new DataBase();

$ID = intval($_GET['ID']);
$del = $db->Delete('DELETE FROM members WHERE MemberID =?', array($ID));

if ($del) {
  routing::go('members.php');
}
?>

<?php require_once 'theme/footer.php'; ?>

