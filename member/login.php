<?php
include "../common.php";
$url = $naverLogin->getCodeUrl();
echo "<script>alert('$url');</script>";
?>
<a href='<?=$url?>'>
	<img src='../image/login_btn.png' height='45'>
</a>
