$(() => {

    // init tables
    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };
    var tableElement = $('#brands-datatable');

    tableElement.dataTable({
        "sDom": "<'row'<'col-md-6'l T><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [{
                "sExtends": "collection",
                "sButtonText": "<i class='fa fa-cloud-download'></i>",
                "aButtons": ["csv", "xls", "pdf", "copy"]
            }]
        },
        "sPaginationType": "bootstrap",
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0]
        }],
        "aaSorting": [
            [1, "asc"]
        ],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        bAutoWidth: false,
        fnPreDrawCallback: function () {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
            }
        },
        fnRowCallback: function (nRow) {
            responsiveHelper.createExpandIcon(nRow);
        },
        fnDrawCallback: function (oSettings) {
            responsiveHelper.respond();
        }
    });
    $('#example th').click(function (e) {
        $('#example .animate-progress-bar').each(function () {
            $(this).removeClass('progress-bar');
            $(this).css('width', '0%');
            $(this).css('width', $(this).attr("data-percentage"));
            $(this).addClass('progress-bar');
        });
    });
    $('#example_wrapper .dataTables_filter input').addClass("input-medium "); // modify table search input
    $('#example_wrapper .dataTables_length select').addClass("select2-wrapper span12"); // modify table per page dropdown



    $('#example input').click(function () {
        $(this).parent().parent().parent().toggleClass('row_selected');
    });


    $('#quick-access .btn-cancel').click(function () {
        $("#quick-access").css("bottom", "-115px");
    });
    $('#quick-access .btn-add').click(function () {
        fnClickAddRow();
        $("#quick-access").css("bottom", "-115px");
    });
});
