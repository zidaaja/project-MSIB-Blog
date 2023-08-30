<x-app-layout>
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-info" href="javascript:;" data-bs-toggle="modal" data-bs-target="#inviteUserModal">
                        <i class="bi-person-plus-fill me-1"></i> Some Button
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Total Users</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">72,540</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,20,18,17,15,17,18,30,31,30,30,35,25,35,35,40,60,90,90,90,85,70,75,70,30,30,30,50,72],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "y": {
                                       "display": false
                                     },
                                     "x": {
                                       "display": false
                                     }
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "plugins": {
                                    "tooltip": {
                                      "postfix": "k",
                                      "hasIndicator": true,
                                      "intersect": false
                                    }
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 12.5%
                        </span>
                        <span class="text-body fs-6 ms-1">from 70,104</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Sessions</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">29.4%</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,20,18,17,15,17,30,30,35,25,18,30,31,35,35,90,90,90,85,100,120,120,120,100,90,75,75,75,90],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "y": {
                                       "display": false
                                     },
                                     "x": {
                                       "display": false
                                     }
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "plugins": {
                                    "tooltip": {
                                      "postfix": "k",
                                      "hasIndicator": true,
                                      "intersect": false
                                    }
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                            <i class="bi-graph-up"></i> 1.7%
                        </span>
                        <span class="text-body fs-6 ms-1">from 29.1%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Avg. Click Rate</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">56.8%</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [25,18,30,31,35,35,60,60,60,75,21,20,24,20,18,17,15,17,30,120,120,120,100,90,75,90,90,90,75,70,60],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "y": {
                                       "display": false
                                     },
                                     "x": {
                                       "display": false
                                     }
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "plugins": {
                                    "tooltip": {
                                      "postfix": "k",
                                      "hasIndicator": true,
                                      "intersect": false
                                    }
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-danger text-danger">
                            <i class="bi-graph-down"></i> 4.4%
                        </span>
                        <span class="text-body fs-6 ms-1">from 61.2%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Pageviews</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">92,913</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                        data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                   "datasets": [{
                                    "data": [21,20,24,15,17,30,30,35,35,35,40,60,12,90,90,85,70,75,43,75,90,22,120,120,90,85,100,92,92,92,92],
                                    "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "y": {
                                       "display": false
                                     },
                                     "x": {
                                       "display": false
                                     }
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "plugins": {
                                    "tooltip": {
                                      "postfix": "k",
                                      "hasIndicator": true,
                                      "intersect": false
                                    }
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-secondary text-body">0.0%</span>
                        <span class="text-body fs-6 ms-1">from 2,913</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->
    </div>
    <!-- End Content -->
</x-app-layout>
