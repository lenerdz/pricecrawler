<?php
    function listaCartas($edicao, $tipo){

        $cartas = DBRead('cartas','where edicao="'.$edicao.'" AND tipo="'.$tipo.'"','nome, edicao, tipo, link');
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
                    $count = DBRead('precos','where link="'.$link.'"','preco'); //deixar mais eficiente
                    echo "<tr>";
                    echo "<th scope='row'>".($i+1)."</td>";
                    echo "<td><a href='info.php?tipo=$tipo&card=$link'>".$nome."</a></td>";
                    echo "<td>".$edicao."</td>";
                    echo "<td><a href='atualiza.php?nome=$nome&set=$edicao&tipo=$tipo&link=$link' class='badge badge-primary'>Atualizar</a> ".($count ? count($count) : 'Nenhuma entrada')."</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
<?php
    }
?>