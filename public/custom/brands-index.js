$(() => {
    $("#brands-datatable").DataTable({
        destroy: true,
        "language": {
            "paginate": {
                "previous": "<span style='font-size: 18px'><i class='fa fa-chevron-left'></i></span>",
                "next": "<span style='font-size: 18px'><i class='fa fa-chevron-right'></i></span>",
            }
        },
        ajax: {
            url: "/admin/brands",
            type: "POST",
            dataType: "json",
            dataSrc: "data",
            contentType: "application/json",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    $('meta[name="csrf-token"]').attr("content")
                );
            },
            data: data => {
                data.page = data.start / data.length + 1;
                data.per_page = data.length;
                // console.log(data);
                return JSON.stringify(data);
            },
            dataFilter: data => {
                // console.log(data)
                var json = jQuery.parseJSON(data);
                json.recordsTotal = json.pagination.total;
                json.recordsFiltered = json.pagination.total;
                // console.log(json);
                return JSON.stringify(json);
            }
        },
        pagingType: "simple_numbers",
        processing: true,
        serverSide: true,
        deferRender: true,
        paging: true,
        autoWidth: false,
        searching: false,
        ordering: false,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pageLength: 10,
        columns: [{
                width: "1%",
                data: "id"
            },
            {
                width: "5%",
                data: "name"
            },
            {
                width: "40%",
                data: "desc"
            },
            {
                width: "15%",
                data: "img",
                render: (data, type, row) => {
                    $imgHtml = "";
                    $.each(data, (i, el) => {
                        $imgHtml +=
                            '<img width="100px" class="mx-1" src="' +
                            el +
                            '" alt="Gambar Product">';
                    });
                    return $imgHtml;
                }
            },
            {
                width: "10%",
                render: (data, type, row) => {
                    return (
                        '\
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md edit-brand" data-id=' +
                        row.id +
                        ' title="Edit">\
                            <i class="fa fa-edit"></i>\
                        </button>\
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md del-brand" data-id=' +
                        row.id +
                        ' title="Delete">\
                            <i class="fa fa-trash"></i>\
                        </button>\
                    '
                    );
                },
                defaultContent: ""
            }
        ],
        "initComplete": function (settings, json) {
            $(".del-brand").click((e) => {
                e.preventDefault();
                $this = $(e.currentTarget)
                $id = $($this).data('id')
                swal2Confirm("Test", "Yes its test", "warning", () => {
                    $.ajax({
                        type: "DELETE",
                        url: base_url + "/admin/brands/" + $id,
                        success: function (data) {
                            show_alert('success', 'Brand Deleted!', null, null, null, () => {
                                window.location.reload()
                            });
                        },
                        error: function (data) {
                            show_alert('Error', 'Oops... Something went wrong!');
                        },
                    });
                })
            })
        }
    });
});
