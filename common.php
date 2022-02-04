<?php
session_start();
include_once "class/DB.php";
$db = new DB();

include_once "class/NaverLogin.php";
$naverLogin = new NaverLogin();


/** 로그인 한 경우 회원 정보 조회 */
$member = [];
if (isset($_SESSION['memNo']) && $_SESSION['memNo'] > 0) {
	$sql = "SELECT * FROM member WHERE memNo = :memNo";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":memNo", $_SESSION['memNo'], PDO::PARAM_INT);
	$result = $stmt->execute();
	if ($result) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$member = $row?$row:[];
	}
}