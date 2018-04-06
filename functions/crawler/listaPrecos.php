<?php
    function listaPrecos($tipo, $link){
        $fixedlink = str_replace(" ", "+", $link);
        $fixedlink .= "#".$tipo;
        echo $fixedlink;
        $precos = DBRead('precos','where link="'.$fixedlink.'"','nome, edicao, data, preco, tipo');
?>
        <table class="table table-dark" style="margin-bottom: 0;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Edição</th>
                    <th>Data</th>
                    <th>Preco</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                //var_dump($precos);
                for ($i=0; $i < count($precos); $i++) {
                    echo "<tr>";
                    echo "<th scope='row'>".($i+1)."</td>";
                    echo "<td>".$precos[$i]['nome']."</td>";
                    echo "<td>".$precos[$i]['edicao']."</td>";
                    echo "<td>".$precos[$i]['data']."</td>";
                    echo "<td>".$precos[$i]['preco']."</td>";
                    echo "<td>".$precos[$i]['tipo']."</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
<?php
    }
?>