$(() => {
    $("#brands-datatable").DataTable({
        destroy: true,
        "ajax": {
            "url": "/admin/brands/data",
            "type": "POST",
            "dataType": "json",
            "dataSrc": 'data',
            "contentType": 'application/json; charset=utf-8',
            'beforeSend': function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr("content")
                );
            },
            data: (data) => {
                data.page = data.start + 1
                data.per_page = data.length
                // console.log(data)
                return JSON.stringify(data)
            },
            dataFilter: (data) => {
                // console.log(data)
                var json = jQuery.parseJSON(data);
                json.recordsTotal = json.pagination.total
                json.recordsFiltered = json.pagination.total
                // console.log(json)
                return JSON.stringify(json);
            }
        },
        pagingType: "first_last_numbers",
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "paging": true,
        "searching": {
            "regex": true
        },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
        columns: [{
                defaultContent: '',
            }, {
                data: 'name'
            },
            {
                data: 'desc'
            },
            {
                data: 'img'
            },
            {
                render: (data, type, row) => {
                    return row
                },
                defaultContent: '',
            }
        ]
        // "pagingType": "full_numbers"
    })
});
