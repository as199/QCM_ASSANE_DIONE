<?php
session_start();

	unset($_SESSION['Admin']) ;
	unset($_SESSION);
	unset($_SESSION['prenoms']) ;
	unset($_SESSION['noms']) ;
	unset($_SESSION['ids']) ;
	unset($_SESSION['score']) ;
	session_destroy();
	header("Location:../index.php");
	exit();
?>