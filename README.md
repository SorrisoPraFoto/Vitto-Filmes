<h1>Introdução</h1>

Um sistema de assistente pessoal que faz recomendação de filmes de acordo com a sugestões de pistas de vontade para assistir, executando uma pesquisa dentro de um banco de dados de mais de 400 mil filmes para encontrar a produção melhor enquadrada as pistas entregues.

<p align="center">
<img src="https://i.imgur.com/Lh8uPYU.png"></img>
</p>

<h2>A TMDB</h2>

A The Movie Database é uma comunidade aberta feita para reunir diversos dados sobre filmes e séries gratuitamente desde 2008. Com isso, a plataforma consegue abrangir diversos campos da indústria do cinema com notas, títulos, sinopses, cartazes e pôsteres em alta resolução, fanarts, descrições, data de lançamento e vários tipos de dados que servem para aplicações comunitárias e de ajuda social, como o Vitto!

<img src="https://i.imgur.com/3yahHHq.png"></img>

<h2>O Sistema</h2>

Página da aplicação mostrando o filme com a nota, sinopse e título

O sistema foi feito como uma aplicação web que engloba tanto o back-end quanto o front-end, usando PHP com uma API de banco de dados de filmes chamada "The Movie Database" (TMDb). Além disso, implementei animações e recursos estáticos com HTML, CSS, Javascript, JQuery e fiz requisições assíncronas do algoritmo back-end por meio de Ajax.

O algoritmo executa um tratamento de textos com espaçamentos, vírgulas e caracteres de separação para formar, em cada palavra, uma pesquisa dentro da database da API e retornar o ID de tipo de filme.

Todo o programa feito em PHP utiliza o cURL como ferramenta e organiza a engine de pesquisa por meio de ID associada a cada espaço preenchido:

<ul>
    <li>Gênero</li>
    <li>Tipo</li>
    <li>Elenco</li>
    <li>Duração</li>
    <li>Época</li>
</ul>

<h2>Disposições finais</h2>
Autor: Marcus Vinícius Caruso Leite<br>
Link do site em funcionamento: https://vitto-filmes.herokuapp.com/

Esse é o meu projeto final para o curso de extensão HackoonSpace na UFSCar de Sorocaba: Vitto!
