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
                        <h1 class="h3 mb-0 text-gray-800">Data Diri</h1>
                    </div>



                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('responden.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
                        </ol>
                    </nav>

                    @if (session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{ session('sukses') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('responden.user.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="mt-2 font-weight-bold text-primary float-left align-middle"><i
                                        class="mr-2 fas fa-fw fa-user-pen "></i> Formulir Pengubahan Data Responden</h5>
                                <button type="submit" name="update"
                                    class="btn btn-primary btn-icon-split float-right mr-2">
                                    <span class="icon text-white">
                                        <i class="fas fa-save   "></i>
                                    </span>
                                    <span class="text fs-6">Update</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="username"
                                                class="col-sm-4 col-form-label text-gray-900">Email</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-7">
                                                <input value="{{ auth()->user()->email }}" type="email"
                                                    class="form-control border-bottom border-success-subtle" id="username"
                                                    name="email"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-4 col-form-label text-gray-900">Nama</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-7">
                                                <input value="{{ auth()->user()->name }}" type="text"
                                                    class="form-control border-bottom border-success-subtle" id="nama"
                                                    name="name" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jenis_kelamin" class="col-sm-4 col-form-label text-gray-900">Jenis
                                                Kelamin</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-3">
                                                <select name="jenis_kelamin" id="jenis_kelamin"
                                                    class="form-control btn btn-light dropdown-toggle col-sm-12">
                                                    <option {{ auth()->user()->jenis_kelamin == 'Pria' ? 'selected' : '' }}
                                                        value="Pria">Pria</option>
                                                    <option
                                                        {{ auth()->user()->jenis_kelamin == 'Wanita' ? 'selected' : '' }}
                                                        value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="usia" class="col-sm-4 col-form-label text-gray-900">Usia</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-3">
                                                <input value="{{ auth()->user()->usia }}" type="number"
                                                    class="form-control border-bottom border-success-subtle" id="usia"
                                                    name="usia" maxlength="2" autocomplete="off">
                                            </div>
                                            <label for="tahun"
                                                class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jenis_perusahaan"
                                                class="col-sm-4 col-form-label text-gray-900">Jenis Perusahaan</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-4">
                                                <select name="jenis_perusahaan" id="jenis_perusahaan"
                                                    class="btn btn-light dropdown-toggle col-sm-12">
                                                    <option
                                                        {{ auth()->user()->jenis_perusahaan == 'Konsultan' ? 'selected' : '' }}
                                                        value="Konsultan">Konsultan</option>
                                                    <option
                                                        {{ auth()->user()->jenis_perusahaan == 'Kontraktor' ? 'selected' : '' }}
                                                        value="Kontraktor">Kontraktor</option>
                                                    <option
                                                        {{ auth()->user()->jenis_perusahaan == 'Pemerintah' ? 'selected' : '' }}
                                                        value="Pemerintah">Pemerintah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jabatan"
                                                class="col-sm-4 col-form-label text-gray-900">Jabatan</label>
                                            <label for="" class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-7">
                                                <input value="{{ auth()->user()->jabatan }}" type="text"
                                                    class="form-control border-bottom border-success-subtle"
                                                    id="jabatan" name="jabatan" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pengalaman_kerja"
                                                class="col-sm-4 col-form-label text-gray-900">Pengalaman Kerja
                                                (Tahun)</label>
                                            <label for=""
                                                class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-3">
                                                <input value="{{ auth()->user()->pengalaman_kerja }}" type="number"
                                                    class="form-control border-bottom border-success-subtle"
                                                    id="pengalaman_kerja" name="pengalaman_kerja" maxlength="2"
                                                    autocomplete="off">
                                            </div>
                                            <label for="tahun"
                                                class="col-sm-3 col-form-label text-gray-900">Tahun</label>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pendidikan_terakhir"
                                                class="col-sm-4 col-form-label text-gray-900">Pendidikan Terakhir</label>
                                            <label for=""
                                                class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-4">
                                                <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                    class="btn btn-light dropdown-toggle col-sm-12">
                                                    <option
                                                        {{ auth()->user()->pendidikan_terakhir == 'D3' ? 'selected' : '' }}
                                                        value="D3">D3</option>
                                                    <option
                                                        {{ auth()->user()->pendidikan_terakhir == 'D4' ? 'selected' : '' }}
                                                        value="D4">D4</option>
                                                    <option
                                                        {{ auth()->user()->pendidikan_terakhir == 'S1' ? 'selected' : '' }}
                                                        value="S1">S1</option>
                                                    <option
                                                        {{ auth()->user()->pendidikan_terakhir == 'S2' ? 'selected' : '' }}
                                                        value="S2">S2</option>
                                                    <option
                                                        {{ auth()->user()->pendidikan_terakhir == 'S3' ? 'selected' : '' }}
                                                        value="S3">S3</option>
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

                    <form action="{{ route('responden.user.update.password') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="mt-2 font-weight-bold text-primary float-left align-middle"><i
                                        class="mr-2 fas fa-fw fa-user-pen "></i> Formulir Pengubahan Pasword Responden</h5>
                                <button type="submit" name="update"
                                    class="btn btn-primary btn-icon-split float-right mr-2">
                                    <span class="icon text-white">
                                        <i class="fas fa-save   "></i>
                                    </span>
                                    <span class="text fs-6">Update</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="password"
                                                class="col-sm-4 col-form-label text-gray-900">Password</label>
                                            <label for=""
                                                class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-7">
                                                <input value="" type="password"
                                                    class="form-control border-bottom border-success-subtle"
                                                    id="password" name="password"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="password_confirmation"
                                                class="col-sm-4 col-form-label text-gray-900">Konfirmasi Password</label>
                                            <label for=""
                                                class="col-sm-0.5 col-form-label text-gray-900">:</label>
                                            <div class="col-sm-7">
                                                <input value="" type="password"
                                                    class="form-control border-bottom border-success-subtle"
                                                    id="password_confirmation" name="password_confirmation" 
                                                    autocomplete="off">
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
    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/sb-admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('asset/sb-admin/js/demo/chart-pie-demo.js') }}"></script>
@endsection
