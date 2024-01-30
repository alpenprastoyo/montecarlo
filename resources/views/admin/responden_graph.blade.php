@extends('layouts.template')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts/sidebar-admin')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts/topbar')


                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <p class="mb-4">Persebaran data dari seluruh responden yang berkaitan dengan latar belakang identitas
                        responden ditampilkan pada halaman ini sesuai dengan klasifikasi masing-masing.</p>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Grafik Usia -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Usia Responden</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="UsiaChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data usia responden dalam rentang usia tertentu ditampilkan pada grafik di
                                    atas.
                                </div>
                            </div>

                        </div>

                        <!-- Grafik Jenis Kelamin -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin Responden</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="GenderChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data jenis kelamin responden ditampilkan pada grafik di atas.

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Grafik Jenis Perusahaan -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Jenis Perusahaan Responden</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="PerusahaanChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data jenis perusahaan responden ditampilkan pada grafik di atas.

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">

                            <!-- Grafik Pengalaman Kerja -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengalaman Kerja Responden</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="PengalamanChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data Pengalaman Kerja responden ditampilkan pada grafik di atas.
                                </div>
                            </div>

                        </div>

                        <!-- Grafik Pendidikan terakhir -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pendidikan Terakhir Responden</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="PendidikanChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data Pendidikan terakhir responden ditampilkan pada grafik di atas.

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <!-- Grafik Jabatan -->
                        <div class="col-xl-12 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Jabatan Responden</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="JabatanChart"></canvas>
                                    </div>
                                    <hr>
                                    Persebaran data Jabatan responden ditampilkan pada grafik di atas.

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>


    <!-- End of Page Wrapper -->
@endsection

@section('script')
    <script src="{{ asset('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Usia Responden Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        var ctx = document.getElementById("UsiaChart");
        var UsiaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["17-20", "21-30", "31-40", "41-50", "51-60", "Lebih dari 60"],
                datasets: [{
                    label: "Jumlah Responden",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: <?= json_encode($dataUsia) ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: '-'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50,
                            maxTicksLimit: 10,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });
        
    </script>

    <!-- Gender Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("GenderChart");
        var GenderChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Pria", "Wanita"],
                datasets: [{
                    data: <?= json_encode($dataGender) ?>,
                    backgroundColor: ['#4e73df', '#e34d39'],
                    hoverBackgroundColor: ['#2e59d9', '#e03019'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>

    <!-- Jenis Perusahaan Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("PerusahaanChart");
        var PerusahaanChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Konsultan", "Kontraktor", "Pemerintahan"],
                datasets: [{
                    data: <?= json_encode($dataPerusahaan) ?>,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>

    <!-- Pengalaman Kerja Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        var ctx = document.getElementById("PengalamanChart");
        var PengalamanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["0-5", "6-10", "11-15", "16-20", "21-25", "> 25"],
                datasets: [{
                    label: "Jumlah Responden",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: <?= json_encode($dataPengalaman) ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: '-'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 15,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 50,
                            maxTicksLimit: 10,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });
    </script>

    <!-- Pendidikan Terakhir Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("PendidikanChart");
        var PendidikanChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["D3", "D4", "S1", "S2", "S3"],
                datasets: [{
                    data: <?= json_encode($dataPendidikan) ?>,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#cc36bd', '#d6993e'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#910383', '#e68d09'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>

    <!-- Jabatan Charts -->
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        // Chart.defaults.global.defaultFontFamily = 'Nunito',
        //     '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        // function number_format(number, decimals, dec_point, thousands_sep) {
        //     // *     example: number_format(1234.56, 2, ',', ' ');
        //     // *     return: '1 234,56'
        //     number = (number + '').replace(',', '').replace(' ', '');
        //     var n = !isFinite(+number) ? 0 : +number,
        //         prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        //         sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        //         dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        //         s = '',
        //         toFixedFix = function(n, prec) {
        //             var k = Math.pow(10, prec);
        //             return '' + Math.round(n * k) / k;
        //         };
        //     // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        //     s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        //     if (s[0].length > 3) {
        //         s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        //     }
        //     if ((s[1] || '').length < prec) {
        //         s[1] = s[1] || '';
        //         s[1] += new Array(prec - s[1].length + 1).join('0');
        //     }
        //     return s.join(dec);
        // }
        // Bar Chart Example
        var ctx = document.getElementById("JabatanChart");
        var JabatanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                axis: 'y',
                labels: <?= json_encode($labelJabatan) ?>,
                datasets: [{
                    label: "Jumlah Responden",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: <?= json_encode($jumlah_jabatan) ?>,
                }],
            },
            options: {
                indexAxis: 'y',
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: '-'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 30
                        },
                        maxBarThickness: 10,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 10,
                            max: 50,
                            maxTicksLimit: 10,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });
    </script>
@endsection
