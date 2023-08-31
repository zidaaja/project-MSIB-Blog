<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- datatables -->
    {{-- @stack('stylesDataTables') --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('dist') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">

    {{-- CSS flatpickr --}}
    @stack('flatpickr-css')


    {{-- datatables css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>



    <!-- CSS Front Template -->
    <link rel="stylesheet" href="./node_modules/tom-select/dist/css/tom-select.bootstrap5.css">
    <link rel="preload" href="{{ asset('dist') }}/assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{ asset('dist') }}/assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/ckeditor.scss') }}" rel="stylesheet"> --}}
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('js/ckeditor.js') }}" defer></script> --}}


    <style data-hs-appearance-onload-styles>
        * {
            transition: unset !important;
        }

        body {
            opacity: 0;
        }
    </style>
    


    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js",
                    "assets/js/demo.js"
                ],
                "build": ["assets/css/theme.css",
                    "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js",
                    "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css",
                    "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js",
                    "assets/js/hs.theme-appearance-charts.js",
                    "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js",
                    "assets/js/demo.js"
                ]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>

@stack('styles')

    @stack('stylesDataTables')
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset bg-light">

    <script src="{{ asset('dist') }}/assets/js/hs.theme-appearance.js"></script>

    <script
        src="{{ asset('dist') }}/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js">
    </script>

    <!-- ========== HEADER ========== -->

    <header id="header"
        class="bg-white navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                <img class="navbar-brand-logo " src="{{ asset('dist') }}/assets/svg/logos/digitaliz.svg"
                alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ asset('dist') }}/assets/svg/logos/digitaliz.svg"
                alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <div class="navbar-nav-wrap-content-start">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->
            </div>

            <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- Account -->
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                                data-bs-dropdown-animation>
                                <div class="avatar-info me-2">
                                    <span class="avatar-name">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                    @php
                                    $name = explode(' ', Auth::user()->name);
                                    $initials = substr($name[0], 0, 1);
                                    if (count($name) > 1) {
                                    $initials .= substr($name[1], 0, 1);
                                    }
                                    @endphp

                                    <span class="avatar-initials bg-soft-dark">{{ $initials }}</span>
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>

                                </div>
                                <span>
                                    <i class="bi-chevron-down ms-2"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                                aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-circle">


                                            <span class="avatar-initials bg-soft-dark">{{ $initials }}</span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0">

                                                {{ Auth::user()->name }}

                                            </h5>
                                            <p class="card-text text-body">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('admin.setting', auth()->user()) }}">Profile &amp; account</a>
                                <a class="dropdown-item" href="{{ route('admin.setting', auth()->user()) }}">Settings</a>

                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Navbar Vertical -->

    <aside
        class="bg-white js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset mt-3">
                <!-- Logo -->

                    {{-- <a class="navbar-brand justify-content-center" href="{{url('/')}}" aria-label="Front"> --}}
                    <a class="navbar-brand" href="{{route('admin.dashboard')}}" aria-label="Front">

                        <img class="navbar-brand-logo " src="{{ asset('dist') }}/assets/svg/logos/digitaliz.svg"
                            alt="Logo" data-hs-theme-appearance="default">
                        <img class="navbar-brand-logo" src="{{ asset('dist') }}/assets/svg/logos/digitaliz.svg"
                            alt="Logo" data-hs-theme-appearance="dark">

                        <img class="navbar-brand-logo-mini" src="{{ asset('dist') }}/assets/svg/logos/digitaliz-short.png"
                            alt="Logo" data-hs-theme-appearance="default">

                        <img class="navbar-brand-logo-mini"
                            src="{{ asset('dist') }}/assets/svg/logos/digitaliz-short.png" alt="Logo"
                            data-hs-theme-appearance="dark">
                    </a>


                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">

                        {{-- <span class="dropdown-header">Homepage</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small> --}}

                        <div class="nav-item">
                            <a class="nav-link {{ Request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}" data-placement="left">
                                <i class="bi-grid-1x2 nav-icon"></i>
                                <span class="nav-link-title">Dashboard</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link {{ Request()->routeIs('admin.article.*') ? 'active' : '' }}"
                                href="{{ route('admin.article.index') }}" data-placement="left">
                                <i class="bi-layout-text-sidebar-reverse nav-icon"></i>
                                <span class="nav-link-title">Article</span>
                            </a>
                        </div>

                        {{-- <div class="nav-item">
                            <a class="nav-link dropdown-toggle {{ Request()->routeIs('admin.article.*') || Request()->routeIs('admin.article-category.*') ? 'active bg-secondary bg-opacity-10 text-black' : '' }}"
                                href="#" role="button" data-bs-toggle="collapse" data-bs-target="#shopCategoriesThree"
                                aria-expanded="truephp" aria-controls="shopCategoriesThree">
                                <i class="bi bi-layout-text-sidebar-reverse nav-icon"></i>
                                <span class="nav-link-title">Article</span>
                            </a>
                            <div id="shopCategoriesThree"
                                class="nav-collapse collapse {{ Request()->routeIs('admin.article.*') || Request()->routeIs('admin.article-category.*') ? 'show' : '' }}"
                                data-bs-parent="#shopNavCategories">
                                <div id="shopNavCategoriesThree">
                                    <a class="nav-link {{ Request()->routeIs('admin.article.*') ? 'active' : '' }}"
                                        href="{{ route('admin.article.index') }}">Articles</a>

                                    <a class="nav-link " href="">Article Category</a>
                                </div>
                            </div>

                        </div> --}}

                        <div class="nav-item">
                            <a class="nav-link {{ Request()->routeIs('admin.setting') ? 'active' : '' }}"
                                href="{{ route('admin.setting', auth()->user()) }}" data-placement="left">
                                <i class="bi-gear nav-icon"></i>
                                <span class="nav-link-title">Settings</span>
                            </a>
                        </div>





                    </div>

                </div>

            </div>
            <!-- End Content -->
            <!-- Footer -->
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Style Switcher -->
                        <div class="dropdown dropup">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-dropdown-animation>

                            </button>

                            <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                aria-labelledby="selectThemeDropdown">
                                <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                    <i class="bi-moon-stars me-2"></i>
                                    <span class="text-truncate" title="Auto (system default)">Auto (system
                                        default)</span>
                                </a>
                                <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                    <i class="bi-brightness-high me-2"></i>
                                    <span class="text-truncate" title="Default (light mode)">Default (light
                                        mode)</span>
                                </a>
                                <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                    <i class="bi-moon me-2"></i>
                                    <span class="text-truncate" title="Dark">Dark</span>
                                </a>
                            </div>
                        </div>

                        <!-- End Style Switcher -->
                    </li>


                </ul>
            </div>
            <!-- End Footer -->

        </div>
        </div>
    </aside>

    <main id="content" role="main" class="main">
        {{ $slot }}


        <div class="footer">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <p class="mb-0 fs-6">&copy; Digitaliz. <span class="d-none d-sm-inline-block">2023
                    </span></p>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="d-flex justify-content-end">
                        <!-- List Separator -->
                        <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">FAQ</a>
                            </li>

                            <li class="list-inline-item">
                                <a class="list-separator-link" href="#">License</a>
                            </li>

                            <li class="list-inline-item">
                                <!-- Keyboard Shortcuts Toggle -->
                                <button class="btn btn-ghost-secondary btn-icon rounded-circle" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts"
                                    aria-controls="offcanvasKeyboardShortcuts">
                                    <i class="bi-command"></i>
                                </button>
                                <!-- End Keyboard Shortcuts Toggle -->
                            </li>
                        </ul>
                        <!-- End List Separator -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </main>








    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('dist') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('dist') }}/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js">
    </script>
    <script src="{{ asset('dist') }}/assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

    <script src="{{ asset('dist') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <script src="{{ asset('dist') }}/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/clipboard/dist/clipboard.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dist') }}/assets/vendor/datatables.net.extensions/select/select.min.js"></script>

    <!-- JS Front -->
    <script src="{{ asset('dist') }}/assets/js/theme.min.js"></script>
    <script src="{{ asset('dist') }}/assets/js/hs.theme-appearance-charts.js"></script>


    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format(
                    'MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
        });


        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: `<div class="p-4 text-center">
              <img class="mb-3" src="{{ asset('dist') }}/assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="{{ asset('dist') }}/assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
            }
        });

        const datatable = HSCore.components.HSDatatables.getItem(0)

        document.querySelectorAll('.js-datatable-filter').forEach(function(item) {
            item.addEventListener('change', function(e) {
                const elVal = e.target.value,
                    targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                    targetTable = e.target.getAttribute('data-target-table');

                HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(
                    elVal !== 'null' ? elVal : '').draw()
            })
        })
    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            localStorage.removeItem('hs_theme')

            window.onload = function() {


                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                const HSFormSearchInstance = new HSFormSearch('.js-form-search')

                if (HSFormSearchInstance.collection.length) {
                    HSFormSearchInstance.getItem(1).on('close', function(el) {
                        el.classList.remove('top-0')
                    })

                    document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                        let dataOptions = JSON.parse(e.currentTarget.getAttribute(
                                'data-hs-form-search-options')),
                            $menu = document.querySelector(dataOptions.dropMenuElement)

                        $menu.classList.add('top-0')
                        $menu.style.left = 0
                    })
                }


                // INITIALIZATION OF BOOTSTRAP DROPDOWN
                // =======================================================
                HSBsDropdown.init()


                // INITIALIZATION OF CHARTJS
                // =======================================================
                HSCore.components.HSChartJS.init('.js-chart')


                // INITIALIZATION OF CHARTJS
                // =======================================================
                HSCore.components.HSChartJS.init('#updatingBarChart')
                const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

                // Call when tab is clicked
                document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                    item.addEventListener('click', e => {
                        let keyDataset = e.currentTarget.getAttribute('data-datasets')

                        const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart',
                            HSThemeAppearance.getAppearance())

                        if (keyDataset === 'lastWeek') {
                            updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25",
                                "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"
                            ];
                            updatingBarChart.data.datasets = [{
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0]
                                    .hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            }, {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245,
                                    110
                                ],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }];
                            updatingBarChart.update();
                        } else {
                            updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4",
                                "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"
                            ];
                            updatingBarChart.data.datasets = [{
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0]
                                    .hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            }, {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225,
                                    120
                                ],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }]
                            updatingBarChart.update();
                        }
                    })
                })


                // INITIALIZATION OF CHARTJS
                // =======================================================
                HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                    plugins: [ChartDataLabels],
                    options: {
                        plugins: {
                            datalabels: {
                                anchor: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                align: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? 'end' : 'center';
                                },
                                color: function(context) {
                                    var value = context.dataset.data[context.dataIndex];
                                    return value.r < 20 ? context.dataset.backgroundColor : context
                                        .dataset.color;
                                },
                                font: function(context) {
                                    var value = context.dataset.data[context.dataIndex],
                                        fontSize = 25;

                                    if (value.r > 50) {
                                        fontSize = 35;
                                    }

                                    if (value.r > 70) {
                                        fontSize = 55;
                                    }

                                    return {
                                        weight: 'lighter',
                                        size: fontSize
                                    };
                                },
                                formatter: function(value) {
                                    return value.r
                                },
                                offset: 2,
                                padding: 0
                            }
                        },
                    }
                })

                // INITIALIZATION OF SELECT
                // =======================================================
                HSCore.components.HSTomSelect.init('.js-select')


                // INITIALIZATION OF CLIPBOARD
                // =======================================================
                HSCore.components.HSClipboard.init('.js-clipboard')
            }
        })()
    </script>

    <!-- Style Switcher JS -->

    <script>
        (function() {
            // STYLE SWITCHER
            // =======================================================
            const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
            const $variants = document.querySelectorAll(
                `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

            // Function to set active style in the dorpdown menu and set icon for dropdown trigger
            const setActiveStyle = function() {
                $variants.forEach($item => {
                    if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                        $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                        return $item.classList.add('active')
                    }

                    $item.classList.remove('active')
                })
            }

            // Add a click event to all items of the dropdown to set the style
            $variants.forEach(function($item) {
                $item.addEventListener('click', function() {
                    HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                })
            })

            // Call the setActiveStyle on load page
            setActiveStyle()

            // Add event listener on change style to call the setActiveStyle function
            window.addEventListener('on-hs-appearance-change', function() {
                setActiveStyle()
            })
        })()
    </script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    {{-- datatables js --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
    </script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    {{-- @stack('scriptsDataTables') --}}
    @include('sweetalert::alert')
    @stack('scripts')



    <!-- End Style Switcher JS -->


</body>

</html>
