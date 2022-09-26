$(function () {
    $("#product-table").DataTable({
        language: {
            url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        info: false,
        ajax: listProductUrl,
        order: [[0, "desc"]],
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            var index = iDisplayIndex +1;
            $('td:eq(0)', nRow).html(index);
            return nRow;
        },
        columns: [
            {
                data: "id",
            },
            {
                render: (data, type, row) => {
                    return `<a href="detail/${row.id}">${row.product_name}</a>`;
                },
            },
            {
                data: "view",
                render: (data, type, row) => {
                    console.log(row);
                    return `<img class="rounded-circle mt-5"
                    src="{{ asset('/images/therose.png') }}">`;
                },
            },
            {
                data: "price",
            },
            {
                data: "discount",
            },
            {
                data: "view",
            },
            {
                data: "product_description",
            },
           
        ],
    });

    // table.on( 'order.dt search.dt', function () {
    //     table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // }).draw();
});
