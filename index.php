<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Charset" charset="UTF-8">
	<link rel="stylesheet" href="estilo\indexCSS.css"></link>
	<link rel="shortcut icon" href="icone.ico" type="image/x-icon">
	<script src="engine_script\jquery.js"></script>
	<title>Vitto - O seu assistente pessoal de filmes</title>
</head>
<body>
	<div id="fundo"></div>
	<img id="imgDesenvolvimento" alt="Under" src="estilo/desenvolvimento.png" id="underDevelopment" width="60%" height="55%" style="position: relative; top: 35vh; left: 10vh">
	<h3 id="desenvolvimento">Em desenvolvimento no Mobile</h3>
	<h1 id="iniciandoBusca">Iniciando busca</h1>
	<h1 id="tituloPesquisa"></h1>

	<div id="home"><img src="estilo\home.png" onClick="location.reload()" width="50px" height="45px" style="position: absolute; left: 76,5rem; top: 2vh;padding-top: 0.2vh; padding-bottom: 0.2vh;padding-right: 1.5vh; background-color: #f8a119;"></div>
	<div id="fundoCard"></div>
	<div class="tituloFinal">
		<h1>.</h1>
	</div>
	<div class="sinopse">
		<p>.</p>
	</div>
	<div class="nota">
		<p>.</p>
	</div>

	<header id="header">
		<img alt="Logo" id="logoImg" src="logo.png" onClick="meusFilmes()" weight="80px" height="80px" style="margin: 10px;">
		<div class="headerDireita">
			<a Id="Home" href="#" class="comeco">Início</a>
			<a Id="Pesquisar" href="#ancoraDescricao">Quem é Vitto?</a>
			<a Id="Contato" href="#author">Contato</a>
		</div>
	</header>

	<div style="width: 100%; display: block; height: 50%;"></div>

	<main class="espacoPesquisa">
		<p id="pistas">Vitto,</p>
		<p id="pistas2">seu assistente pessoal de filmes.</p>

		<form class="caixaDePesquisa">
			<div id="sugestoes">Sugestões: <a id="TagsSug" style="color: #F8AC35;"></a> <a style="font-size: 10px; "> - Deixe em branco se não souber</a></div>
			<input type="text" id="txtPesquisa" maxlength="40">
			<img alt="Enviar" id="btnEnviar" onClick="mostrarHudPesquisa()" src="estilo/btnEnviar.png" weight="50px" height="50px" style="position: absolute; left: 175vh; top: 71.5vh; display: inline; z-index: 6; padding: 2vh">
		</form>

		<div>
			<button id="botaoIniciar">Iniciar</button>
		</div>

		<div id="ancoraDescricao" style="position: absolute; top: 165vh"></div>
	</main>

	<script src="engine_script\iniciarHudPesquisa.js"></script>

	<script type="text/javascript">
		$('#txtPesquisa').on('keypress', function(e) {
    		return e.which !== 13;
		});

		var pesquisando = false;
		$('.comeco').click(function(){
        	$('html, body').animate({scrollTop : 0},800);
        	return false;
    	});
    	$(".tituloFinal").hide();
		$(".sinopse").hide();
		$(".nota").hide();
		$("#imgDesenvolvimento").hide();
		$("#desenvolvimento").hide();
		$("#home").hide();
		$("#fundo").hide();
		$("#iniciandoBusca").hide();
		$("#tituloPesquisa").hide();
		$(".caixaDePesquisa").hide();
		$("#botaoIniciar").one('click', function(){
			$("aside").hide();
			$("footer").hide();
			$("header").fadeOut(1000);
			$("#fundo").delay(300).fadeIn();
			$("#fundo").css("top", "0%");
			$(this).animate({
				top: "80vh",
				left: '40vh',
				width: '1000px',
				height: '0px',
				padding: '0px',
				border: '0px'
			}, 1500);
			$("#pistas").animate({
				height: 'toggle'
			});
			$("#pistas2").animate({
				height: 'toggle'
			});
			$(".espacoPesquisa").css('padding-bottom', '0px');
			$("#iniciandoBusca").delay(1800).fadeIn(1500);
			$("#iniciandoBusca").delay(900).fadeOut(1500);
			$("#tituloPesquisa").delay(5800).fadeIn(800);
            $(".caixaDePesquisa").delay(6300).fadeIn(800);
            $("#TagsSug").delay(6300).fadeIn(800);
			mostrarHudPesquisa();
			$(this).text("");

			return 0;
		});
	</script>

	<aside class="descricao" id="descricao">
		<h2 id="tituloDescricao">Quem é Vitto?</h2>
		<p id="p1">O Vitto é um assistente pessoal criado por mim, Marcus Vinícius, com o intuito de auxiliar as pessoas a ter acesso a um algoritmo de recomendações de filmes, feito como projeto de extensão no Hackoonspace, curso de extensão na UFSCar de Sorocaba. O sistema usa uma base de dados filantrópica para qualquer desenvolvedor que pode ser acessada no rodapé da página, bem como o meu contato e a organização.</p>

		<h2 id="segundoDescricao">Como funciona?</h2>
		<p id="p2">O website opera em cima das respostas do usuário, que incluem tags como gênero, tipo, elenco, época, popularidade e executa uma pesquisa dentro da database de filmes, fazendo uma pesquisa backend detalhada sobre as entradas e encontrando os filmes que respeitam a época solicitada, gênero e informações que permitiram a compreensão dentro do algoritmo.</p>
	</aside>
	
	<footer class="rodape">
		<h3>Email</h3>
		<br>
		<p id="email">marcus.caruso@estudante.ufscar.br</p>
		<div id="TMDB" >
			<a href="https://www.themoviedb.org/" target="_blank">
			<img src="estilo/tmdb.png" weight="60px" height="60px">
			</a>
		</div>
		<br>
		<div style="width: 80%; height: 1px; background-color: #656362; position: relative; left: 10%; top: 20vh; opacity: 0.6">
		</div>
		<p id="author">
			Developed by
			<br>
			Marcus Vinícius
		</p>
	</footer>

	<script>
		if (navigator.userAgent.indexOf('Mobile') !== -1) {
			$("body").css("background-size", "150%");
			$("#imgDesenvolvimento").show();
			$("#desenvolvimento").show();
			$("header").hide();
			$("div").hide();
			$("main").hide();
			$("aside").hide();
			$("footer").hide();
		}
	</script>
</body>
</html>