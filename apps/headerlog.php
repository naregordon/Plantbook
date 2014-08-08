<?php 

$res = mysqli_query($db, "SELECT nom FROM user WHERE id = '".$_SESSION['id']."'");
$data = mysqli_fetch_assoc($res);
$pseudo = $data['nom'];

require("views/headerlog.phtml");