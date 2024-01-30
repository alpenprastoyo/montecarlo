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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Petunjuk</h1>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Petunjuk</li>
                        </ol>
                    </nav>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="mt-2 font-weight-bold text-primary float-left align-middle"><i class="mr-2 fas fa-fw fa-person-circle-question "></i> Petunjuk Penggunaan untuk Responden</h5>
                        </div>
                    </div>
                    <!-- Dropdown Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard1">
                            <h6 class="m-0 font-weight-bold text-primary">1. Pastikan Data Diri Sudah Benar</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="collapse" id="collapseCard1">
                            <div class="card-body">
                                Pastikan data yang telah diisi saat registrasi sudah benar. Jika terdapat kesalahan atau dibutuhkan perubahan, silakan untuk mengubah data diri Anda pada laman <a target="_blank" href="{{ route('responden.user.index')}}">Data Diri</a>.
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard2">
                            <h6 class="m-0 font-weight-bold text-primary">2. Ubah Password Jika Diperlukan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="collapse" id="collapseCard2">
                            <div class="card-body">
                                Jika diperlukan adanya perubahan password pada akun Anda, silakan mengubah password dengan mengunjungi laman <a target="_blank" href="{{ route('responden.user.index')}}">Ubah Password</a>.
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard3">
                            <h6 class="m-0 font-weight-bold text-primary">3. Jawab Semua Kuesioner yang Tersedia</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="collapse" id="collapseCard3">
                            <div class="card-body">
                                Kuesioner yang tersedia pada laman <a target="_blank" href="{{ route('responden.kuesioner.index')}}">Kuesioner</a> wajib diisi dengan baik dan teliti untuk setiap pertanyaan yang tersedia.
                                Setelah menjawab setiap pertanyaan pada kuesioner, jawaban akan disimpan langsung ke dalam database.
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div href="#collapseCard4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard4">
                            <h6 class="m-0 font-weight-bold text-primary">4. Cek Nilai <em>Risk Index</em></h6>
                        </div>
                        <!-- Card Body -->
                        <div class="collapse" id="collapseCard4">
                            <div class="card-body">
                                Nilai Indeks Risiko yang merupakan hasil dari pengolahan data kuesioner dari seluruh responden dengan menggunakan Simulasi Monte Carlo dan <em>Analytical Hierarchy Process</em> (AHP)
                                akan ditampilkan dalam bentuk tabel pada laman <a target="_blank" href="{{ route('responden.risk.index')}}">Risk Index</a> dan ditampilkan secara spesifik untuk nilai Indeks
                                Risiko terbesar dan seluruh nilai Indeks Risiko dalam bentuk diagram batang pada laman <a target="_blank" href="{{ route('responden.index')}}">Dashboard</a>.
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
