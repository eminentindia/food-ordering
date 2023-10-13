<footer class="footer text-center">
    All Rights Reserved by <a href="https://www.eminent-india.com">Eminent India</a> &hearts;
</footer>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.10/js/min/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/spartline.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/datepicker.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/excanvas.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/wave.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/custom.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/sidebar.js"></script>
<script src="<?php echo ADMIN_SITE_PATH; ?>js/scripts.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<style>
    .dataTables_filter,
    label {
        width: 100%;
    }

    table.dataTable.nowrap th,
    table.dataTable.nowrap td {
        white-space: wrap;
        max-width: 500px;
        overflow: auto;
        text-overflow: ellipsis;
    }

    .dtfc-fixed-left,
    .dtfc-fixed-right {
        background: #fff !important;
        z-index: 10;
        color: #000 !important;
        font-weight: bold !important;
    }

    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }

    .table td:first-child {
        text-align: center;
    }

    table.dataTable>thead .sorting_asc:after,
    table.dataTable>thead .sorting_desc:after {
        display: none !important;
    }

    .dt-button {
        width: 100%;
        padding: calc(0.5rem + 1px) calc(1rem + 1px) !important;
        color: #fff !important;
        border: 0 !important;
        color: #3a3a3a !important;
        border-color: black !important;
        margin-right: 0.75rem !important;
        display: inline-block !important;
        font-weight: 500 !important;
        line-height: 1.5 !important;
        text-align: center !important;
        vertical-align: middle !important;
        cursor: pointer !important;
        user-select: none !important;
        font-size: .8rem !important;
        border-radius: 0.475rem !important;
        border: 1px solid !important;
        background: #d2d2d217 !important;
    }

    .form-search {
        background: #bababa17 !important;
        border: 1px solid #979797 !important;
        padding: 10px !important;
    }
</style>
<script>
    $(document).ready(function() {
        $('#zero_config').DataTable({
            "dom": "<'row'<'col-sm-12 col-md-8'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-2'l><'col-sm-12 col-md-5'p>>",
            "language": {
                sSearch: "",
                searchPlaceholder: "Search here in all records...",
            },
            "responsive": false,
            "lengthChange": true,
            "paging": true,
            "autoWidth": false,
            "searching": true,
            "processing": true,
            "scrollX": true,
            "colReorder": true,

            "buttons": [{
                extend: 'collection',
                text: 'Export Data',
                buttons: ['copy', 'excel', 'csv', 'print']
            }],
        }).buttons().container().appendTo('#export');
        $('#zero_config_filter input').addClass('form-control form-control-sm form-search form-control-solid w-100');
    });
</script>
<script>
    jQuery('.mydatepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        dateFormat: "yyyy-mm-dd"
    });

    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>

</html>