<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('admin/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- Sparklines CDN -->
{{--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>--}}

<!-- Chart Plugins -->
<script type="text/javascript" src="{{ asset('vendor/plugins/highcharts/highcharts.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/plugins/circles/circles.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/plugins/raphael/raphael.js') }}"></script>

<!-- Holder js  -->
<script type="text/javascript" src="{{ asset('admin/js/bootstrap/holder.min.js') }}"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="{{ asset('admin/js/utility/utility.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('admin/js/demo.js') }}"></script>-->

<!-- Admin Panels  -->
<script type="text/javascript" src="{{ asset('admin/admin-tools/admin-plugins/admin-panels/json2.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/admin-tools/admin-plugins/admin-panels/adminpanels.js') }}"></script>

<!-- Datatable -->
<script type="text/javascript" src="{{ asset('admin/js/datatable.js') }}"></script>

<!-- Page Javascript -->
<script type="text/javascript" src="{{ asset('admin/js/pages/widgets.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init({
            sbm: "sb-l-c",
        });

        // Because we are using Admin Panels we use the OnFinish
        // callback to activate the demoWidgets. It's smoother if
        // we let the panels be moved and organized before
        // filling them with content from various plugins

        // Init plugins used on this page
        // HighCharts, JvectorMap, Admin Panels

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            callback: function() {
                bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init the rest of the plugins now that the panels
                // have had a chance to be moved and organized.
                // It's less taxing to organize empty panels
                demoHighCharts.init();
                runVectorMaps();

                // We also refresh any "in-view" waypoints to ensure
                // the correct position is being calculated after the
                // Admin Panels plugin moved everything
                Waypoint.refreshAll();

            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });

        // Widget VectorMap
        function runVectorMaps() {

            // Jvector Map Plugin
            var runJvectorMap = function() {
                // Data set
                var mapData = [900, 700, 350, 500];
                // Init Jvector Map
                $('#WidgetMap').vectorMap({
                    map: 'us_lcc_en',
                    //regionsSelectable: true,
                    backgroundColor: 'transparent',
                    series: {
                        markers: [{
                            attribute: 'r',
                            scale: [3, 7],
                            values: mapData
                        }]
                    },
                    regionStyle: {
                        initial: {
                            fill: '#E5E5E5'
                        },
                        hover: {
                            "fill-opacity": 0.3
                        }
                    },
                    markers: [{
                        latLng: [37.78, -122.41],
                        name: 'San Francisco,CA'
                    }, {
                        latLng: [36.73, -103.98],
                        name: 'Texas,TX'
                    }, {
                        latLng: [38.62, -90.19],
                        name: 'St. Louis,MO'
                    }, {
                        latLng: [40.67, -73.94],
                        name: 'New York City,NY'
                    }],
                    markerStyle: {
                        initial: {
                            fill: '#a288d5',
                            stroke: '#b49ae0',
                            "fill-opacity": 1,
                            "stroke-width": 10,
                            "stroke-opacity": 0.3,
                            r: 3
                        },
                        hover: {
                            stroke: 'black',
                            "stroke-width": 2
                        },
                        selected: {
                            fill: 'blue'
                        },
                        selectedHover: {}
                    },
                });
                // Manual code to alter the Vector map plugin to
                // allow for individual coloring of countries
                var states = ['US-CA', 'US-TX', 'US-MO',
                    'US-NY'
                ];
                var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
                var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
                $.each(states, function(i, e) {
                    $("#WidgetMap path[data-code=" + e + "]").css({
                        fill: colors[i]
                    });
                });
                $('#WidgetMap').find('.jvectormap-marker')
                        .each(function(i, e) {
                            $(e).css({
                                fill: colors2[i],
                                stroke: colors2[i]
                            });
                        });
            }

            if ($('#WidgetMap').length) {
                runJvectorMap();
            }
        }

        var datatableMenu = '<select>' +
                            '<option value="10">10</option>' +
                            '<option value="25">25</option>' +
                            '<option value="50">50</option>' +
                            '<option value="100">100</option>' +
                            '<option value="-1">Tất cả</option>' +
                            '</select>';

        $.extend( $.fn.dataTable.defaults, {
            'language': {
                'info': 'Trang _PAGE_/_PAGES_',
                'paginate': {
                    'next': 'Trang kế',
                    'previous': 'Trang trước',
                    'first': 'Trang đầu',
                    'last': 'Trang cuối',
                },
                'search': 'Tìm kiếm: ',
                'searchPlaceholder': 'Tìm kiếm',
                'lengthMenu': 'Hiển thị ' + datatableMenu + ' dòng mỗi trang',
                'emptyTable': 'Có gì đâu mà đòi xem!',
                'infoEmpty': 'Không có gì xem đâu!'
            }
        } );

        $('table#datatable').dataTable();

        $('table#datatable1').dataTable( {
            "order": [[ 0, "desc" ]]
        } );

        // DataTable
        var table5 = $('#datatable5').DataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
//            "order": [[ 0, "desc" ]],
            "ordering": false
        });

        // Apply the search
        table5.columns().eq(0).each(function(colIdx) {
            $('input', table5.column(colIdx).header()).on('keyup change', function() {
                table5
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });
        });

        $("input[type='search']").addClass('form-control');

    });
</script>

<!-- END: PAGE SCRIPTS -->