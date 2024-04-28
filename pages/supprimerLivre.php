<?php

$code_livre = $_GET['code_livre'];
$delete_affectation = "DELETE FROM affectation WHERE code_livre= ?";
$sql = "DELETE FROM auteurs WHERE code_livre = ?";
$params = [$code_livre];
$db = new Database();
$db->executeQuery($sql, $params);
header("Location: {$base_url}auteurs");
exit();
