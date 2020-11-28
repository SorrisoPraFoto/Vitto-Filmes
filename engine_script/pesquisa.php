<?php
	function callAPI($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL,$url);
		$result=curl_exec($ch);
		$arrayID = json_decode($result, true);

		return $arrayID;
	}

	$api = ""; //Chave da API
	$runtime = 0;
	$criterios = 0;
	$pesquisas = $_POST['pesquisas'];
	$genero = $pesquisas[1];
	$elenco = $pesquisas[2];
	$duracao = $pesquisas[3];
	$tipo = $pesquisas[4];
	$epoca = $pesquisas[5];

	$filmeURL = "https://api.themoviedb.org/3/discover/movie?language=pt-BR&api_key=" . $api;

	for ($i=1; $i<=5; $i++){
		if (!(empty($pesquisas[$i]))){
			$criterios++;
		}
	}

	switch (strtoupper($duracao)){
		case "CURTO":
			$runtimeIni = 90;
			$runtimeFin = 119;
			break;
		case "MÉDIO":
			$runtimeIni = 120;
			$runtimeFin = 149;
			break;
		case "LONGO":
			$runtimeIni = 150;
			$runtimeFin = 200;
			break;
		default:
			$runtimeIni = 90;
			$runtimeFin = 200;
			break;
	}

	// Início da pesquisa por ID's						

	$url =  "https://api.themoviedb.org/3/genre/movie/list?api_key=" . $api . "&language=pt-BR";
	$generosID = callAPI($url);

	$generosID = callAPI($url);
	$genero = preg_replace("#[\s]+#", " ", $genero);
	$generoArray = explode(" ", $genero);

	for ($i=0; $i<sizeof($generoArray); $i++) {
		if (strtoupper($generosID["genres"][$i]["name"]) == strtoupper($generoArray[$i])){
			$generoID = $generosID["genres"][$i]["id"];
		}
	}


	if (!(empty($elenco))){
		$url =  "https://api.themoviedb.org/3/search/person?api_key=" . $api . "&language=pt-BR&query=" . urlencode($elenco) . "&page=1&include_adult=false";
		$elencoID = (callAPI($url))["results"][0]["id"];
		$filmeURL = $filmeURL . "&with_cast=" . $elencoID;
	}

	if (!(empty($tipo))){
		$url = "https://api.themoviedb.org/3/search/keyword?api_key=" . $api . "&query=" . urlencode($tipo) . "&page=1";
		$tipoID = (callAPI($url))["results"]["id"];
		$filmeURL = $filmeURL . "&with_keywords=" . $tipoID;
	}

	if (!(empty($genero))){
		$filmeURL = $filmeURL . "&with_cast=" . $generoID;
	}

	//Fim da pesquisa por ID's

	if (is_numeric($epoca)){
		$epoca = intval($epoca);
		$epocaIni = $epocaIni . "-01-01";
		$epocaFin = ($epoca + 10) . "-12-30";
	} else {
		if (!(empty($epoca))){
			if (strpos($epoca, "70") != false){
				$epocaIni = "1970-01-01";
				$epocaFin = "1981-12-31";
			}
			if (strpos($epoca, "80") != false){
				$epocaIni = "1980-01-01";
				$epocaFin = "1991-12-31";
			} if (strpos($epoca, "90") != false){
				$epocaIni = "1990-01-01";
				$epocaFin = "2000-01-01";
			}
		} else {
			$epocaIni = "2000-01-01";
			$epocaFin = "2022-12-01";
		}
	}

	$filmeURL = $filmeURL . "&with_runtime.gte=" . $runtimeIni . "&with_runtime.lte=" . $runtimeFin . "&primary_release_date.gte=" . $epocaIni . "&primary_release_date.lte=" . $epocaFin . "&sort_by=revenue.desc&vote_average.gte=6.5&with_original_language=pt|es|pt-BR|en|it|fr";

	$filmeFinal = callAPI($filmeURL);
	if (rand(1, 100) >= 50 || $filmeFinal["total_pages"] == 1){
		$pagina = 1;
	} else {
		$pagina = 2;
	}

	$filmeURL = $filmeURL . "&page=" . $pagina;
	$filmeFinal = callAPI($filmeURL);

	if ($filmeFinal["total_results"] < 19){
		$selFilme = rand(0, $filmeFinal["total_results"]);
	} else {
		$selFilme = rand(0, 19);
	}

	$img = "https://image.tmdb.org/t/p/w500" . ($filmeFinal["results"][$selFilme]["poster_path"]);

	echo json_encode((array(
		'titulo' => (($filmeFinal["results"][$selFilme]["title"])), 
		'nota' => ($filmeFinal["results"][$selFilme]["vote_average"]), 
		'img' => $img,
		'sinopse' => (($filmeFinal["results"][$selFilme]["overview"]))
	)));
?>