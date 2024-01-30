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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Dashboard </li>
                            <li class="breadcrumb-item active" aria-current="page">Tabel Data Responden</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Responden </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTableRiskIndex"
                                                width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">Nama</th>
                                                        <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                                        <th rowspan="1" colspan="1">Usia</th>
                                                        <th rowspan="1" colspan="1">Jenis Perusahaan</th>
                                                        <th rowspan="1" colspan="1">Pengalaman Kerja</th>
                                                        <th rowspan="1" colspan="1">Pendidikan Terakhir</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($responden as $w)
                                                        <tr class="odd">
                                                            <td class="sorting_1">{{ $i++ }}</td>
                                                            <td>{{ $w->name }}</td>
                                                            <td>{{ $w->jenis_kelamin }}</td>
                                                            <td>{{ $w->usia }} Tahun</td>
                                                            <td>{{ $w->jenis_perusahaan }}</td>
                                                            <td>{{ $w->pengalaman_kerja }} Tahun</td>
                                                            <td>{{ $w->pendidikan_terakhir }}</td>
                                                            <td><align-items-center>
                                                                <a href="{{ route('admin.responden.edit',['id' => $w->id ]) }}" class="btn btn-sm btn-warning" title="Ubah Data Responden"><i class="fa-solid fa-pen"></i></a>
                                                                <a href="{{ route('admin.responden.delete',['id' => $w->id ]) }}" class="btn btn-sm btn-danger" title="Hapus Data Responden" onclick="return confirm('Anda yakin untuk menghapus data ini?')" ><i class="fa-solid fa-trash"></i></a>
                                                            </align-items-center></td>
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
    <script src="{{ asset('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>


    <script>
        // Call the dataTables jQuery plugin

        $(document).ready(function() {
            $('#dataTableRiskIndex').DataTable();
        });
    </script>
@endsection
