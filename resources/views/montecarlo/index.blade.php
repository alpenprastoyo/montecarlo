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
                                                        <td class="sorting_1">{{ $i++ }}</td>
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
                                                        <td class="sorting_1">{{ $i++ }}</td>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Montecarlo WBS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableMontecarloWBS" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <td class="tg-0lax" rowspan="3">Nomor Simulasi</td>
                                                        <td class="tg-0lax" rowspan="3">Angka Random</td>
                                                        <td class="tg-0lax" colspan="{{ 2 * count($data_wbs) }}">wbs</td>
                                                      </tr>
                                                      <tr>
                                                        @foreach ($data_wbs as $w)
                                                        <td  colspan="2">{{ $w->id_wbs }}</td>
                                                        @endforeach
                                                      </tr>
                                                      <tr>
                                                        @foreach ($data_wbs as $w)
                                                        <td>Probability</td>
                                                        <td>Impact</td>
                                                        @endforeach
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($monte_carlo_wbs as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['rand'] }}</td>
                                                        @foreach ($w['wbs_result'] as $r)
                                                        <td>{{ $r['probability_class'] }}</td>
                                                        <td>{{ $r['impact_class'] }}</td>
                                                        @endforeach 
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td  colspan="2">Average</td>
                                                        @foreach ($monte_carlo_wbs_average as $w)
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        @endforeach
                                                    </tr>
                                                </tfoot>
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
                                            <table class="table table-bordered dataTable" id="dataTableMontecarloRBA" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <td class="tg-0lax" rowspan="3">Nomor Simulasi</td>
                                                        <td class="tg-0lax" rowspan="3">Angka Random</td>
                                                        <td class="tg-0lax" colspan="{{ 2 * count($data_rba) }}">rba</td>
                                                      </tr>
                                                      <tr>
                                                        @foreach ($data_rba as $w)
                                                        <td  colspan="2">{{ $w->id_rba }}</td>
                                                        @endforeach
                                                      </tr>
                                                      <tr>
                                                        @foreach ($data_rba as $w)
                                                        <td>Probability</td>
                                                        <td>Impact</td>
                                                        @endforeach
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($monte_carlo_rba as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['rand'] }}</td>
                                                        @foreach ($w['rba_result'] as $r)
                                                        <td>{{ $r['probability_class'] }}</td>
                                                        <td>{{ $r['impact_class'] }}</td>
                                                        @endforeach 
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td  colspan="2">Average</td>
                                                        @foreach ($monte_carlo_rba_average as $w)
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        @endforeach
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                         
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data RI Local WBS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRIWBS" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">ID WBS</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">RI Local</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($monte_carlo_wbs_average as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['id_wbs'] }}</td>
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        <td>{{ $w['risk_index_average'] }}</td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data RI Local RBA</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRIRBA" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">ID RBA</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">RI Local</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($monte_carlo_rba_average as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['id_rba'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['risk_index_average'] }}</td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Local Priority</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRIRBA" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">Pekerjaan</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">RI Local</th>
                                                        <th rowspan="1" colspan="1">Local Priority</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($local_priority as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['wbs'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['risk_index_average'] }}</td>
                                                        <td>{{ $w['local_priority'] }}</td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Idealized</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRIRBA" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                                style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">Pekerjaan</th>
                                                        <th rowspan="1" colspan="1">Impact</th>
                                                        <th rowspan="1" colspan="1">Probability</th>
                                                        <th rowspan="1" colspan="1">RI Local</th>
                                                        <th rowspan="1" colspan="1">Local Priority</th>
                                                        <th rowspan="1" colspan="1">Idealized</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($idealized as $w)
                                                    <tr class="odd">
                                                        <td class="sorting_1">{{ $i++ }}</td>
                                                        <td>{{ $w['wbs'] }}</td>
                                                        <td>{{ $w['impact_average'] }}</td>
                                                        <td>{{ $w['probability_average'] }}</td>
                                                        <td>{{ $w['risk_index_average'] }}</td>
                                                        <td>{{ $w['local_priority'] }}</td>
                                                        <td>{{ $w['idealized'] }}</td>
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

$(document).ready(function() {
  $('#dataTableMontecarloWBS').DataTable();
});

$(document).ready(function() {
  $('#dataTableMontecarloRBA').DataTable();
});

$(document).ready(function() {
  $('#dataTableRIWBS').DataTable();
});

$(document).ready(function() {
  $('#dataTableRIRBA').DataTable();
});

</script>
@endsection