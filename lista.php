<?php
// include_once('simple_html_dom.php');
// include_once('functions/banco.php');
include_once('functions/functions.php');


if(!isset($_GET['set'])){
    header( "Location: localhost/preco" );
}else{
    include_once('pages/header.php');
?>

    <ul class="nav nav-tabs nav-justified bg-dark" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="paper-tab" data-toggle="tab" href="#paper" role="tab" aria-controls="paper" aria-selected="true">paper</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="online-tab" data-toggle="tab" href="#online" role="tab" aria-controls="online" aria-selected="false">online</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="paper" role="tabpanel" aria-labelledby="paper-tab">
            <?php
                listaCartas($_GET['set'], 'paper');
            ?>
        </div>
        <div class="tab-pane fade" id="online" role="tabpanel" aria-labelledby="online-tab">
            <?php
                listaCartas($_GET['set'], 'online');
            ?>
        </div>
    </div>

<?php
include_once('pages/footer.php');
}
?>