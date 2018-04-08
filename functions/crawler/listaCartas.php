<?php
    function listaCartas($edicao, $tipo){

        $cartas = DBRead('cartas','where edicao="'.$edicao.'" AND tipo="'.$tipo.'"','id, nome, edicao, tipo, link');
?>
        <table class="table table-dark" style="margin-bottom: 0;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Edição</th>
                    <th>Entradas no Banco</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                //var_dump($cartas);
                for ($i=0; $i < count($cartas); $i++) {
                    $nome = $cartas[$i]['nome'];
                    $link = $cartas[$i]['link'];
                    $set = $cartas[$i]['edicao'];
                    $id = $cartas[$i]['id'];
                    $count = DBRead('precos','where link="'.$link.'"','preco'); //deixar mais eficiente
                    echo "<tr>";
                    echo "<th scope='row'>".($i+1)."</td>";
                    echo "<td><a href='info.php?tipo=$tipo&card=$link'>".$nome."</a></td>";
                    echo "<td>".$edicao."</td>";
                    echo "<td><a href='#' class='badge badge-primary atualizaPrecos' >Atualizar</a> <span class='d-none'>$id</span><span>".($count ? count($count) : 'Nenhuma entrada')."</span><span class='progress-bar progress-bar-striped progress-bar-animated d-none' style='width: 8em; height: 1em; display: inline-block;'></span></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
<?php
    }
?>