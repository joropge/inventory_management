//busqueda dinamica
$(document).ready(function(){
    $('#search').on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search',
            data: {'search': value},
            success: function(data){
                $('#table').html(data);
            }
        });
    });
}
);