<?php
function listaEdicoes() {
?>
<table class="table table-dark" style="margin-bottom: 0;">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Código</th>
            <th>Paper</th>
            <th>Online</th>
        </tr>
    </thead>
    <tbody>

    <?php 
        $edicoes = DBRead('edicoes',null,'nome, code');
        //var_dump($edicoes);
        for ($i=0; $i < count($edicoes); $i++) {
            $code = $edicoes[$i]['code'];
            $countp = DBRead('cartas','where edicao="'.$code.'" AND tipo="paper"','edicao'); //deixar mais eficiente
            $counto = DBRead('cartas','where edicao="'.$code.'" AND tipo="online"','edicao'); //deixar mais eficiente
            echo "<tr>";
            echo "<th scope='row'>".($i+1)."</td>";
            echo "<td><a href='lista.php?set=$code'>".$edicoes[$i]['nome']."</a></td>";
            echo "<td>".$code."</td>";
            echo "<td><a href='index.php?set=$code&tipo=paper' class='badge badge-primary'>Atualizar</a> ".($countp ? count($countp) : 'Nenhuma entrada')."</td>";
            echo "<td><a href='index.php?set=$code&tipo=online' class='badge badge-primary'>Atualizar</a> ".($counto ? count($counto) : 'Nenhuma entrada')."</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
<?php
}
?>