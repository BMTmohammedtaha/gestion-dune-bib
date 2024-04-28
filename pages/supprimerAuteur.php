<?php

$id_auteur = $_GET['id'];
var_dump($id_auteur);

$delete_affectation = "DELETE FROM affectation WHERE id_auteur= ?";
$sql = "DELETE FROM auteurs WHERE id_auteur = ?";
$params = [$id_auteur];
$db = new Database();
$db->executeQuery($sql, $params);
$db->executeQuery($delete_affectation, $params);
header("Location: {$base_url}auteurs");
exit();
