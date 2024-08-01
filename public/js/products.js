$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
        }
    });

    function productsDataTable(){
        $('#products-table').dataTable({
            'ajax'      : {
                'url'   : '/get-products',
                'type'  : 'POST',
                'dataType': 'json',
                'data' : {
                    'category_id': $(".categories-sel").val() ?? 0
                }
                
            },
            "processing": true,
            "bDestroy": true,
            "serverSide": true,
            "ordering": false,
            'searching': false,
            "paging": false,
            "pageLength": 20,
            "columns": [
                {data:"id"},
                {data:"name"},
                {data:"price"},
                {data:"image",render:function(row, type, set){
                    return `<img src = "uploades/${set.image}" width ="100px">`;
                }},
            ],
        });
    }

    $(".categories-sel").change(function(){
        productsDataTable();
    })
    productsDataTable();
});