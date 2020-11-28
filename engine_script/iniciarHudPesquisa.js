var envios = 0;
var pesquisas=[];

function meusFilmes(){
    $("#logoImg").hide();
    var minhasRecomendacoes = $.ajax({
            url:"engine_script/meusFilmes.php",
            dataType: 'json',
            type: "POST",
            data: {img: "estilo/poster.jpg"},
            success:function(result){
                $("aside").hide();
                $("footer").hide();
                $("header").fadeOut(1000);
                $("#fundo").delay(300).fadeIn();
                $("#fundo").css("top", "0%");
                $("#botaoIniciar").hide();
                $("#pistas").animate({
                    height: 'toggle'
                });
                $("#pistas2").animate({
                    height: 'toggle'
                });
                $("#fundoCard").css("background-image", ("url("+result.img+")"));
                $(".tituloFinal h1").text(result.titulo);
                $(".sinopse p").text(result.sinopse);
                $(".nota p").text(result.nota);
                $("#fundoCard").animate({
                    opacity: "1",
                    left: "35%"
                }, 2500);
                $(".tituloFinal").delay(2500).toggle(600);
                $(".sinopse").delay(4500).fadeIn(2000);
                $(".nota").delay(4000).fadeIn(2000);
                $("#home").delay(5500).fadeIn(2000);
            },
            error:function(jqXHR, textStatus, errorThrown){
                window.alert(textStatus);
            }
        });
}

function mostrarHudPesquisa(){
    if (envios > 0){
        $("#tituloPesquisa").fadeOut(500);
        $(".caixaDePesquisa").fadeOut(500);
        $("#btnEnviar").hide();
        $("#TagsSug").fadeOut(500);
    }
	var texto = $("#txtPesquisa").val();
    pesquisas[envios] = texto;
    var sugestoes = "Terror | Ação | Animação | História | Aventura | Comédia | Documentário | Thriller | Fantasia | Romance | Mistério";
    if (envios < 5){
        var ajax = $.ajax({
            url:"engine_script/attTitulos.php",
            dataType: 'json',
            type: "POST",
            data: {titulo: "Gênero do Filme", envios: envios, pesquisa: texto, pesquisas: pesquisas, sugestoes: sugestoes},
            success:function(result){
                $("#txtPesquisa").val("");
                console.log("Pesquisa foi inicializada com sucesso.");
                $("#tituloPesquisa").queue(function(){
                    $("#tituloPesquisa").html(result.titulo);
                    $("#tituloPesquisa").dequeue();
                    });
                $("#TagsSug").queue(function(){
                    $("#TagsSug").html(result.sugestoes);
                    $("#TagsSug").dequeue();
                });
                $("#tituloPesquisa").delay(1500).fadeIn(800);
                $(".caixaDePesquisa").delay(1700).fadeIn(800);
                $("#btnEnviar").delay(1700).fadeIn(800);
                $("#TagsSug").delay(1700).fadeIn(800);
            },
            error:function(){
                console.log("Pesquisa não foi inicializada.");
            }
        });
    } else {
        var engine = $.ajax({
            url:"engine_script/pesquisa.php",
            dataType: 'json',
            type: "POST",
            data: {pesquisas: pesquisas, titulo: "", genero: "", nota: 0.0, sinopse: "", img: "estilo/poster.jpg"},
            success:function(result){
                $("#fundoCard").css("background-image", ("url("+result.img+")"));
                $(".tituloFinal h1").text(result.titulo);
                $(".sinopse p").text(result.sinopse);
                $(".nota p").text(result.nota);
                $("#fundoCard").animate({
                    opacity: "1",
                    left: "35%"
                }, 2500);
                $(".tituloFinal").delay(2500).toggle(600);
                $(".sinopse").delay(4500).fadeIn(2000);
                $(".nota").delay(4000).fadeIn(2000);
                $("#home").delay(5500).fadeIn(2000);
            },
            error:function(jqXHR, textStatus, errorThrown){
                meusFilmes();
                $(".espacoPesquisa").hide();
            }
        });
    }

    envios = envios + 1;
}