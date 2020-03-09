(function ($) {
    console.log('Hola Wordpress')
    $('#categorias-productos').change(function () {
        $.ajax({
            url: pg.ajaxurl ,
            method: "POST",
            data: {
                "action": "pgFiltroProductos",
                "categoria": $(this).find(':selected').val()
            },
            beforeSend: function(){
                $("resultado-productos").html("Cargando...")
            },
            success: function(data){
                console.log(data)

            },
            error: function(error){
                console.log(error)
            }
        })
    })
})(jQuery)

