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
                        <h1 class="h3 mb-0 text-gray-800">Work Breakdown Structure</h1>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><em>Work Breakdown Structure</em></li>
                        </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel <em>Work Breakdown Structure</em></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama WBS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($wbs as $r)
                                            <tr>
                                                <td>{{ $r->id }}</td>
                                                <td>{{ $r->nama_wbs }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- /.container-fluid -->

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
        $('#dataTable').DataTable();
    });
</script>
@endsection