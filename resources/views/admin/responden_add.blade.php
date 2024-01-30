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
        <h1 class="h3 mb-0 text-gray-800">Tambah Responden</h1>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a>Dashboard</a></li>
            <li class="breadcrumb-item"><a>Tabel Responden</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Responden</li>
        </ol>
    </nav>

    <form action="{{ route('admin.responden.input')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="mt-2 font-weight-bold text-primary float-left align-middle"><i class="mr-2 fas fa-fw fa-user-plus "></i> Formulir Penambahan Responden</h5>
                <button type="reset" name="reset" class="btn btn-danger btn-icon-split float-right">
                    <span class="icon text-white">
                        <i class="fas fa-times   "></i>
                    </span>
                    <span class="text fs-6">Reset</span>
                </button>
                <button type="submit" name="simpan" class="btn btn-primary btn-icon-split float-right mr-2">
                    <span class="icon text-white">
                        <i class="fas fa-save   "></i>
                    </span>
                    <span class="text fs-6">Simpan</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-4 col-form-label text-gray-900">Email</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-7">
                                <input placeholder="Masukkan username." type="text" title="Minimal 6 karakter dan dapat disertai dengan kombinasi huruf besar (kapital), huruf kecil, dan angka." class="form-control border-bottom border-success-subtle" id="username" name="email"  autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label text-gray-900">Password Default</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-7">
                                <label for="" class="col-form-label text-gray-900">123456</label>
                                <input name="password" type="text" hidden value="123456">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 col-form-label text-gray-900">Nama</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-7">
                                <input placeholder="Masukkan nama responden." type="text" class="form-control border-bottom border-success-subtle" id="nama" name="name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label text-gray-900">Jenis Kelamin</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-4">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control btn btn-light dropdown-toggle col-sm-12" required>
                                    <option value="" selected>Pilih Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="usia" class="col-sm-4 col-form-label text-gray-900">Usia</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-3">
                                <input placeholder="Masukkan angka." type="text" onkeypress="return hanyaAngka(event)" class="form-control border-bottom border-success-subtle" id="usia" name="usia" maxlength="2" autocomplete="off" required>
                            </div>
                            <label for="tahun" class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_perusahaan" class="col-sm-4 col-form-label text-gray-900">Jenis Perusahaan</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-4">
                                <select name="jenis_perusahaan" id="jenis_perusahaan" class="btn btn-light dropdown-toggle col-sm-12" required>
                                    <option value="" selected>Pilih Jenis Perusahaan</option>
                                    <option value="Konsultan">Konsultan</option>
                                    <option value="Kontraktor">Kontraktor</option>
                                    <option value="Pemerintahan">Pemerintahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jabatan" class="col-sm-4 col-form-label text-gray-900">Jabatan</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-7">
                                <input placeholder="Masukkan jabatan." type="text" class="form-control border-bottom border-success-subtle" id="jabatan" name="jabatan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pengalaman_kerja" class="col-sm-4 col-form-label text-gray-900">Pengalaman Kerja</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-3">
                                <input placeholder="Masukkan angka." type="text" onkeypress="return hanyaAngka(event)" class="form-control border-bottom border-success-subtle" id="pengalaman_kerja" name="pengalaman_kerja" maxlength="2" autocomplete="off" required>
                            </div>
                            <label for="tahun" class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                        </div>
                        <div class="mb-3 row">
                            <label for="pendidikan_terakhir" class="col-sm-4 col-form-label text-gray-900">Pendidikan Terakhir</label>
                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                            <div class="col-sm-4">
                                <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="btn btn-light dropdown-toggle col-sm-12" required>
                                    <option value="" selected>Pilih Pendidikan Terakhir</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </form>

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
