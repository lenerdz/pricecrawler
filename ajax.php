<html>
<head>
   <title>Ajax Teste</title>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>   
<script>
$(document).ready(function(){
   $("#linkajax").click(function(evento){
      evento.preventDefault();
      $("#carregando").css("display", "inline");
      $("#destino").load("pagina-lenta.php", function(){
         $("#carregando").css("display", "none");
      });
   });
})
</script>
</head>

<body>
Isto é um Ajax com uma mensagem de carregando...
<br>
<br>

<a href="#" id="linkajax">Clique aqui!</a>
<div id="carregando" style="display:none; color: green;">Carregando...</div>
<br>
<div id="destino"></div>

</body>
</html>