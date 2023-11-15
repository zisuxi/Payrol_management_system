<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/dist/css/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/themes/v3/dist/css/adminlte.min2167.css?v=3.2.0') }}">
    <script src="{{ asset('/themes/v3/dist/js/adminlte.min2167.js?v=3.2.0') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="{{ asset('/themes/v3/dist/css/stackpath.bootstrap.min.css') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.jscss"></script>
    <script nonce="c93e5263-88eb-4452-9858-ab8ed2e570df">
        (function(w, d) {
            ! function(a, b, c, d) {
                a[c] = a[c] || {};
                a[c].executed = [];
                a.zaraz = {
                    deferred: [],
                    listeners: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function(e) {
                    return async function() {
                        var f = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: f
                        })
                    }
                };
                for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                a.zaraz.init = () => {
                    var h = b.getElementsByTagName(d)[0],
                        i = b.createElement(d),
                        j = b.getElementsByTagName("title")[0];
                    j && (a[c].t = b.getElementsByTagName("title")[0].text);
                    a[c].x = Math.random();
                    a[c].w = a.screen.width;
                    a[c].h = a.screen.height;
                    a[c].j = a.innerHeight;
                    a[c].e = a.innerWidth;
                    a[c].l = a.location.href;
                    a[c].r = b.referrer;
                    a[c].k = a.screen.colorDepth;
                    a[c].n = b.characterSet;
                    a[c].o = (new Date).getTimezoneOffset();
                    if (a.dataLayer)
                        for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                                ...o[1],
                                ...p[1]
                            })), {}))) zaraz.set(n[0], n[1], {
                            scope: "page"
                        });
                    a[c].q = [];
                    for (; a.zaraz.q.length;) {
                        const q = a.zaraz.q.shift();
                        a[c].q.push(q)
                    }
                    i.defer = !0;
                    for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith(
                        "_zaraz_"))).forEach((s => {
                        try {
                            a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                        } catch {
                            a[c]["z_" + s.slice(7)] = r.getItem(s)
                        }
                    }));
                    i.referrerPolicy = "origin";
                    i.src = "../../../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[
                        c])));
                    h.parentNode.insertBefore(i, h)
                };
                ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);

        <
        script src = "{{ asset('/themes/v3/dist/js/demo.js') }}" >
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <script type="text/javascript" style="display:none">
                //<![CDATA[
                window.__mirage2 = {
                    petok: "yN_wHuS6OVAxCoj0nvnTvjfDc26INBeE8uDmFRBifTE-1800-0"
                };
                //]]>
            </script>
            <script type="text/javascript"
                src="{{ asset('/themes/v3/ajax.cloudflare.com/cdn-cgi/scripts/04b3eb47/cloudflare-static/mirage2.min.js') }}">
            </script>
            <img class="animation__shake" data-cfsrc="{{ asset('/themes/v3/dist/img/AdminLTELogo.png') }}"
                alt="AdminLTELogo" height="60" width="60" style="display:none;visibility:hidden;"><noscript><img
                    class="animation__shake" src="{{ asset('/themes/v3/dist/img/AdminLTELogo.png') }}"
                    alt="AdminLTELogo" height="60" width="60"></noscript>
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{ url('#') }}" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <div class="btn-group">
                    <button type="button" class="btn btn-success">{{ ucfirst($user->name) }}</button>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">

                        <a class="dropdown-item" href="{{ url('/logout') }}"> <i
                                class="fa-solid fa-right-from-bracket mr-2"></i><b>Logout</b></a>

                    </div>
                </div>

                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <span class="brand-text font-weight-light"><img
                        src="{{ asset('themes/v3/dist/img/logo-png-removebg-preview.png') }}" alt=""
                        style="    width: 136px;
                    margin-left: 25px;
                "></span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a class="nav-link active" href="{{ url('/dashboard') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/category') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa-solid fa-people-group"></i>
                                <p class="ml-2">
                                    Staff
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/staff') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Staff</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa-solid fa-wrench"></i>
                                <p class="ml-2">
                                    Ledger
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/ledger') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>View Ledger</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa-solid fa-file-pdf"></i>
                                <p class="ml-2">
                                    Report
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/report') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            © Payroll System 2023-2023 <a href="https://adminlte.io/">Payrol</a>.

            <div class="float-right d-none d-sm-inline-block">
                Design & Develop by Ibexstack
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

    </div>

<!-- Include Inputmask library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <script src="{{ asset('/themes/v3/plugins/jquery.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/sparklines/sparkline.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/dist/js/adminlte2167.js?v=3.2.0') }}"></script>

    <script src="{{ asset('/themes/v3/dist/js/demo.js') }}"></script>

    <script src="{{ asset('/themes/v3/dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('/themes/v3/dist/js/sweat@alert.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('/themes/v3/dist/js/adminlte.min2167.js?v=3.2.0') }}"></script>

    <script src="{{ asset('/themes/v3/dist/js/demo.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
                ['2004/05', 165, 938, 522, 998, 450, 614.6],
                ['2005/06', 135, 1120, 599, 1268, 288, 682],
                ['2006/07', 157, 1167, 587, 807, 397, 623],
                ['2007/08', 139, 1110, 615, 968, 215, 609.4],
                ['2008/09', 136, 691, 629, 1026, 366, 569.6]
            ]);

            var options = {
                title: 'Monthly Coffee Production by Country',
                vAxis: {
                    title: 'Cups'
                },
                hAxis: {
                    title: 'Month'
                },
                seriesType: 'bars',
                series: {
                    5: {
                        type: 'line'
                    }
                }
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['geochart'],
        });
        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                ['Country', 'Popularity'],
                ['Germany', 200],
                ['United States', 300],
                ['Brazil', 400],
                ['Canada', 500],
                ['France', 600],
                ['RU', 700]
            ]);

            var options = {};

            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

            chart.draw(data, options);
        }
    </script>
    @yield('script')

</body>

</html>
