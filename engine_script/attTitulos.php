<?php
	$titulo = $_POST['titulo'];
	$sug = $_POST['sugestoes'];
	$envios = $_POST['envios'];

	//Envio de Sugestões e Títulos
	switch ($envios){
		case 1:
			$titulo = 'Elenco';
			$sug = 'Digite o seu ator ou diretor favorito para encontrar o seu filme';
			break;
		case 2:
			$titulo = 'Duração do Filme';
			$sug = 'Curto | Médio | Longo';
			break;
		case 3:
			$titulo = 'Tipo de filme';
			$sug = 'Popular | Reflexivo | Cult | Final Plot Twist';
			break;
		case 4:
			$titulo = 'Época do filme';
			$sug = 'Anos 80 | Anos 90 | Atual | Todos';
			break;
	}

	echo json_encode((array('titulo' => $titulo, 'sugestoes' => $sug)));
?>