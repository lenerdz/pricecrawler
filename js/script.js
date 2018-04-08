$( document ).ready(function() {
    $('.atualizaPrecos').click(function () {
        id = $(this).next().text();
        $(this).toggle();
        $(this).next().next().toggle();
        $(this).next().next().next().toggleClass('d-none');
        elemento = $(this);
        $.ajax({
            type: "POST",
            url: "atualizaPrecos.php",
            dataType: "html",
            data: { cardid: id },
            success: function (response) {
                elemento.next().next().toggle();
                elemento.next().next().next().toggleClass('d-none');
                elemento.toggle();
            }
        });
        
    });

});

