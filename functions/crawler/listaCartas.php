<?php
    function listaCartas($edicao, $tipo){

        $cartas = DBRead('cartas','where edicao="'.$edicao.'" AND tipo="'.$tipo.'"','nome, edicao, tipo');
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
                    echo "<tr>";
                    echo "<th scope='row'>".($i+1)."</td>";
                    echo "<td>".$cartas[$i]['nome']."</td>";
                    echo "<td>".$edicao."</td>";
                    echo "<td>".$tipo."</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
<?php
    }
?>