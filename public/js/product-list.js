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
        order: [[1, "desc"]],
        fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            var index = iDisplayIndex +1;
            $('td:eq(0)', nRow).html(index);
            return nRow;
        },
        columns: [
            {
                data: "id",
                bSortable: false,
            },
            {
                render: (data, type, row) => {
                    return `<a href="detail/${row.id}">${row.product_name}</a>`;
                },
            },
            {
                data: "image",
                render: (data, type, row) => {
                    return `<img class="rounded-circle" style="height: 5rem"
                    src="${row.image}">`;
                },
                bSortable: false,
            },
            {
                data: "price",
                render: (data, type, row) => {
                    return `<p>${row.price} VNĐ</p>`;
                },
            },
            {
                data: "discount",
                render: (data, type, row) => {
                    return `<p>${row.discount} %</p>`;
                },
            },
            {
                data: "view",
            },
            {
                data: "product_description",
                bSortable: false,
            },
            {
                data: "",
                render: (data, type, row) => {
                    return `<button type="submit" class="btn btn-danger" onclick="deleteItem(${row.product_id})">
                            Xoá</button>`;
                },
                bSortable: false,
            },
           
        ],
    });


    // table.on( 'order.dt search.dt', function () {
    //     table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // }).draw();

});
