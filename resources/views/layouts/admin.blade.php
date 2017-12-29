<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/toolkit-inverse.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/application.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <nav class="sidebar-nav">
                <div class="sidebar-header">
                    <button class="nav-toggler nav-toggler-md sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-md">
                        <span class="sr-only">Toggle nav</span>
                    </button>
                    <a class="sidebar-brand img-responsive" href="{{ route('dashboard') }}">
                        <span class="icon icon-leaf sidebar-brand-icon"></span>
                    </a>
                </div>

                <div class="collapse nav-toggleable-md" id="nav-toggleable-md">
                    <form class="sidebar-form">
                        <input class="form-control" type="text" placeholder="Search...">
                        <button type="submit" class="btn-link">
                            <span class="icon icon-magnifying-glass"></span>
                        </button>
                    </form>
                    <ul class="nav nav-pills nav-stacked flex-column">
                        <li class="nav-header">Dashboards</li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="order-history/index.html">Order history</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "href="fluid/index.html">Fluid layout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="icon-nav/index.html">Icon nav</a>
                        </li>

                        <li class="nav-header">More</li>
                        <li class="nav-item">
                            <a class="nav-link "href="docs/index.html">
                                Toolkit docs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://getbootstrap.com" target="blank">
                                Bootstrap docs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index-light/index.html">Light UI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#docsModal" data-toggle="modal">
                                Example modal
                            </a>
                        </li>
                    </ul>
                    <hr class="visible-xs mt-3">
                </div>
            </nav>
        </div>
        <div class="col-md-9 content">
            <div class="dashhead">
                <div class="dashhead-titles">
                    <h6 class="dashhead-subtitle">Dashboards</h6>
                    <h2 class="dashhead-title">Overview</h2>
                </div>

                <div class="btn-toolbar dashhead-toolbar">
                    <div class="btn-toolbar-item input-with-icon">
                        <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                        <span class="icon icon-calendar"></span>
                    </div>
                </div>
            </div>

            <hr class="mt-3">

            <div class="row text-center mt-5">
                <div class="col-md-4 mb-4 mb-md-3">
                    <div class="w-3 mx-auto">
                        <canvas
                                class="ex-graph"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-dataset="[230, 130]"
                                data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
                                data-labels="['Returning', 'New']">
                        </canvas>
                    </div>
                    <strong class="text-muted">Traffic</strong>
                    <h4>New vs Returning</h4>
                </div>
                <div class="col-md-4 mb-4 mb-md-3">
                    <div class="w-3 mx-auto">
                        <canvas
                                class="ex-graph"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-dataset="[330,30]"
                                data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
                                data-labels="['Returning', 'New']">
                        </canvas>
                    </div>
                    <strong class="text-muted">Revenue</strong>
                    <h4>New vs Recurring</h4>
                </div>
                <div class="col-md-4 mb-4 mb-md-3">
                    <div class="w-3 mx-auto">
                        <canvas
                                class="ex-graph"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-dataset="[100,260]"
                                data-dataset-options="{ borderColor: '#252830', backgroundColor: ['#1ca8dd', '#1bc98e'] }"
                                data-labels="['Referrals', 'Direct']">
                        </canvas>
                    </div>
                    <strong class="text-muted">Traffic</strong>
                    <h4>Direct vs Referrals</h4>
                </div>
            </div>

            <div class="hr-divider mt-5 mb-3">
                <h3 class="hr-divider-content hr-divider-heading">Quick stats</h3>
            </div>

            <div class="row statcards">
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                    <div class="statcard statcard-success">
                        <div class="p-3">
                            <span class="statcard-desc">Page views</span>
                            <h2 class="statcard-number">
                                1,293
                                <small class="delta-indicator delta-positive">5%</small>
                            </h2>
                            <hr class="statcard-hr mb-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline"
                                data-chart="spark-line"
                                data-dataset="[[28,68,41,43,96,45,100]]"
                                data-labels="['a','b','c','d','e','f','g']"
                                style="width: 189px; height: 47px;">
                        </canvas>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                    <div class="statcard statcard-danger">
                        <div class="p-3">
                            <span class="statcard-desc">Downloads</span>
                            <h2 class="statcard-number">
                                758
                                <small class="delta-indicator delta-negative">1.3%</small>
                            </h2>
                            <hr class="statcard-hr mb-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline"
                                data-chart="spark-line"
                                data-dataset="[[4,34,64,27,96,50,80]]"
                                data-labels="['a', 'b','c','d','e','f','g']"
                                style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                    <div class="statcard statcard-info">
                        <div class="p-3">
                            <span class="statcard-desc">Sign-ups</span>
                            <h2 class="statcard-number">
                                1,293
                                <small class="delta-indicator delta-positive">6.75%</small>
                            </h2>
                            <hr class="statcard-hr mb-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline"
                                data-chart="spark-line"
                                data-dataset="[[12,38,32,60,36,54,68]]"
                                data-labels="['a', 'b','c','d','e','f','g']"
                                style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-3 mb-md-4 mb-xl-0">
                    <div class="statcard statcard-warning">
                        <div class="p-3">
                            <span class="statcard-desc">Downloads</span>
                            <h2 class="statcard-number">
                                758
                                <small class="delta-indicator delta-negative">1.3%</small>
                            </h2>
                            <hr class="statcard-hr mb-0">
                        </div>
                        <canvas id="sparkline1" width="378" height="94" class="sparkline"
                                data-chart="spark-line"
                                data-dataset="[[43,48,52,58,50,95,100]]"
                                data-labels="['a', 'b','c','d','e','f','g']"
                                style="width: 189px; height: 47px;"></canvas>
                    </div>
                </div>
            </div>

            <hr class="mt-5">

            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="list-group mb-3">
                        <h6 class="list-group-header">
                            Countries
                        </h6>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 62.4%;"></span>
                            United States
                            <span class="ml-a text-muted">62.4%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 15.0%;"></span>
                            India
                            <span class="ml-a text-muted">15.0%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 5.0%;"></span>
                            United Kingdom
                            <span class="ml-a text-muted">5.0%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 5.0%;"></span>
                            Canada
                            <span class="ml-a text-muted">5.0%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 4.5%;"></span>
                            Russia
                            <span class="ml-a text-muted">4.5%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 2.3%;"></span>
                            Mexico
                            <span class="ml-a text-muted">2.3%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 1.7%;"></span>
                            Spain
                            <span class="ml-a text-muted">1.7%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 1.5%;"></span>
                            France
                            <span class="ml-a text-muted">1.5%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 1.4%;"></span>
                            South Africa
                            <span class="ml-a text-muted">1.4%</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span class="list-group-progress" style="width: 1.2%;"></span>
                            Japan
                            <span class="ml-a text-muted">1.2%</span>
                        </a>

                    </div>
                    <a href="#" class="btn btn-outline-primary px-3">All countries</a>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="list-group mb-3">
                        <h6 class="list-group-header">
                            Most visited pages
                        </h6>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/ (Logged out)</span>
                            <span class="mr-a text-muted">3,929,481</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/ (Logged in)</span>
                            <span class="mr-a text-muted">1,143,393</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/tour</span>
                            <span class="mr-a text-muted">938,287</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/features/something</span>
                            <span class="mr-a text-muted">749,393</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/features/another-thing</span>
                            <span class="mr-a text-muted">695,912</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/users/username</span>
                            <span class="mr-a text-muted">501,938</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/page-title</span>
                            <span class="mr-a text-muted">392,842</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/some/page-slug</span>
                            <span class="mr-a text-muted">298,183</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/another/directory/and/page-title</span>
                            <span class="mr-a text-muted">193,129</span>
                        </a>

                        <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                            <span>/one-more/page/directory/file-name</span>
                            <span class="mr-a text-muted">93,382</span>
                        </a>

                    </div>
                    <a href="#" class="btn btn-outline-primary px-3">View all pages</a>
                </div>
            </div>

            <div class="list-group mb-3">
                <h6 class="list-group-header">
                    Devices and resolutions
                </h6>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (1920x1080)</span>
                    <span class="text-muted">3,929,481</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (1366x768)</span>
                    <span class="text-muted">1,143,393</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (1440x900)</span>
                    <span class="text-muted">938,287</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (1280x800)</span>
                    <span class="text-muted">749,393</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Tablet (1024x768)</span>
                    <span class="text-muted">695,912</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Tablet (768x1024)</span>
                    <span class="text-muted">501,938</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Phone (320x480)</span>
                    <span class="text-muted">392,842</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Phone (720x450)</span>
                    <span class="text-muted">298,183</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (2560x1080)</span>
                    <span class="text-muted">193,129</span>
                </a>

                <a class="list-group-item list-group-item-action justify-content-between d-flex" href="#">
                    <span>Desktop (2560x1600)</span>
                    <span class="text-muted">93,382</span>
                </a>

            </div>
            <a href="#" class="btn btn-outline-primary px-3">View all devices</a>

        </div>
    </div>
</div>

<div id="docsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Example modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>You're looking at an example modal in the dashboard theme.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cool, got it!</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('vendor/js/chart.js') }}"></script>
<script src="{{ asset('vendor/js/tablesorter.min.js') }}"></script>
<script src="{{ asset('vendor/js/toolkit.js') }}"></script>
<script src="{{ asset('vendor/js/application.js') }}"></script>
</body>
</html>
