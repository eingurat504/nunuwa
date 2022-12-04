$(document).ready(function () {

    $("#upload-route-modal").on("show.bs.modal", function () {
        var currentRow = $(event.target).closest('tr');
        var rowData = tbl_routes.row(currentRow).data();
        $(this).find('input[name=product_id]').val(rowData[0]);

        var product_id = rowData[0];

        $.ajax({

            type: "POST",

            url: app + '/admin/product/'+product_id+'/attach',

            success: function (data) {
                $("#product_id").val(data.product_id);

            }
        });
    });

  
 });