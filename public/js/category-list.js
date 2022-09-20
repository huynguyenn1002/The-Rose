$(function() {

    var table = $('#category-table').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ danh mục",
            "zeroRecords": "Không có danh mục nào",
            "info": "trang _PAGE_ trong _PAGES_",
            "infoEmpty": "Không có danh mục nào",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: listCategoryUrl,
        order: [[1, 'asc']],
        columns: [{
                data: 'id',
                name: 'name'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: '',
                render: (data,type,row) => {
                    return `<button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                            data-bs-target="#myModal" id="btnEdit" onclick="viewItem(${row.id})">Chỉnh
                            sửa</button>`;
                },
                "bSortable": false
            },
            {
                data: '',
                render: (data,type,row) => {
                    return `<button type="submit" class="btn btn-danger" onclick="deleteItem(${row.id})">
                            Xoá</button>`;
                },
                "bSortable": false
            }
        ]
    });
    $('#category-table tbody').on( 'click', 'tr', function () {
        console.log( table.row( this ).data() );
    } );
    console.log(tb);
});
