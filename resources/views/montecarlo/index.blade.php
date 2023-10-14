@extends('layouts.template')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts/sidebar-user')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts/topbar')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Montecarlo WBS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableWBS" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">ID WBS</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">Probability Frekuensi</th>
                                                        <th rowspan="1" colspan="1">Probability Probability</th>
                                                        <th rowspan="1" colspan="1">Probability Kumulative</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Impact Frekuensi</th>
                                                        <th rowspan="1" colspan="1">Impact Probability</th>
                                                        <th rowspan="1" colspan="1">Impact Kumulative</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($wbs as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i }}</td>
                                                        <td>{{ $w['id_wbs'] }}</td>
                                                        <td>{{ $w['probability'] }}</td>
                                                        <td>{{ $w['probability_frequency'] }}</td>
                                                        <td>{{ $w['probability_prob'] }}</td>
                                                        <td>{{ $w['probability_kumulative'] }}</td>
                                                        <td>{{ $w['impact'] }}</td>
                                                        <td>{{ $w['impact_frequency'] }}</td>
                                                        <td>{{ $w['impact_prob'] }}</td>
                                                        <td>{{ $w['impact_kumulative'] }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                         
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Montecarlo RBA</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRBA" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">ID WBS</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">Probability Frekuensi</th>
                                                        <th rowspan="1" colspan="1">Probability Probability</th>
                                                        <th rowspan="1" colspan="1">Probability Kumulative</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Impact Frekuensi</th>
                                                        <th rowspan="1" colspan="1">Impact Probability</th>
                                                        <th rowspan="1" colspan="1">Impact Kumulative</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($rba as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i }}</td>
                                                        <td>{{ $w['id_rba'] }}</td>
                                                        <td>{{ $w['probability'] }}</td>
                                                        <td>{{ $w['probability_frequency'] }}</td>
                                                        <td>{{ $w['probability_prob'] }}</td>
                                                        <td>{{ $w['probability_kumulative'] }}</td>
                                                        <td>{{ $w['impact'] }}</td>
                                                        <td>{{ $w['impact_frequency'] }}</td>
                                                        <td>{{ $w['impact_prob'] }}</td>
                                                        <td>{{ $w['impact_kumulative'] }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                         
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

<script  src="{{ asset('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script  src="{{ asset('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>


<script>

    // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableWBS').DataTable();
});
$(document).ready(function() {
  $('#dataTableRBA').DataTable();
});

</script>
@endsection