<?php
	function callAPI($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		$arrayID = json_decode($result, true);

		return $arrayID;
	}

	$filmes = array(
		238,
		550,
		185,
		157336,
		155,
		475557,
		680,
		16869,
		106646,
		603,
		13183,
		111,
		500,
		68718,
		496243,
		530915,
		752,
		546554,
		278,
		13,
		424,
		807,
		857,
		103,
		490132,
		466272,
		205596,
		515001,
		492188,
		263115,
		398978,
		264644,
		86841,
		11324,
		286217,
		1813,
		381288,
		24
	);

	$tituloFilme = rand(0, 37);
	$filmeURL = "https://api.themoviedb.org/3/movie/" . $filmes[$tituloFilme] . "?api_key=&language=pt-BR"; //Chave da API escrita após o post da var api_key
	$filmeFinal = callAPI($filmeURL);

	$img = "https://image.tmdb.org/t/p/w500" . ($filmeFinal["poster_path"]);

	echo json_encode((array(
		'titulo' => (($filmeFinal["title"])),
		'nota' => ($filmeFinal["vote_average"]),
		'img' => $img,
		'sinopse' => (($filmeFinal["overview"]))
	)));
?>