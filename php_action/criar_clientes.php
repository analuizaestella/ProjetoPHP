<?php 

	session_start();

	require_once 'conexao_bd.php';

	if (isset($_POST['btn-cadastrar'])) {

		//sanitização
		
		$nome = mysqli_escape_string($connection,$_POST['nome']);
		$especie = mysqli_escape_string($connection,$_POST['especie']);
		$sexo = mysqli_escape_string($connection,$_POST['sexo']);
		$raca = mysqli_escape_string($connection,$_POST['raca']);
		$cor = mysqli_escape_string($connection,$_POST['cor']);
		$nascimento = mysqli_escape_string($connection,$_POST['nascimento']);

		$sql = "INSERT INTO tbAnimal(nome,especie,sexo,raca,cor,nascimento)VALUES('$nome','$especie','$sexo','$raca','$cor','$nascimento')";

		if(mysqli_query($connection, $sql)) {

			$_SESSION['mensagem'] = "Cadastrado com sucesso.";

			header('Location: ../index.php');
		}
		else{

			$_SESSION['mensagem'] = "Erro ao cadastrar.";

			header('Location: ../index.php');	
		}
	}
?>