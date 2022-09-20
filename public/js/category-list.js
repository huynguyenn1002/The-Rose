$(function () {
    $("#category-table").DataTable({
        language: {
            url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        info: false,
        ajax: listCategoryUrl,
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
                    return `<a href="/category/detail/${row.id}">${row.name}</a>`;
                },
            },
            {
                data: "description",
            },
            {
                data: "",
                render: (data, type, row) => {
                    return `<button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                            data-bs-target="#myModal" id="btnEdit" onclick="viewItem(${row.id})">Chỉnh
                            sửa</button>`;
                },
                bSortable: false,
            },
            {
                data: "",
                render: (data, type, row) => {
                    return `<button type="submit" class="btn btn-danger" onclick="deleteItem(${row.id})">
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
