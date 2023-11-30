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
                        <h1 class="h3 mb-0 text-gray-800">Kuesioner</h1>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kuesioner</li>
                        </ol>
                    </nav>

                    <form action="#" method="#" enctype="#">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Formulir Kuesioner</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-gray-900" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kuesioner</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach ($sections as $section)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $section->nama_section }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-icon-split btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#KuesionerModalWBS_{{ $section->id }}">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-pen"></i>
                                                            </span>
                                                            <span class="text">Akses Formulir Kuesioner WBS</span>
                                                        </a>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if ($section->wbs[0]->transactionWbs->where('id_user',auth()->user()->id)->count() > 0)
                                                            <button type="button" class="btn btn-success">Sudah
                                                                Mengisi</button>
                                                        @else
                                                            <button type="button" class="btn btn-warning">Belum
                                                                Mengisi</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>Kuesioner RBA</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon-split btn-sm"
                                                        data-toggle="modal" data-target="#KuesionerModalRBA">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-pen"></i>
                                                        </span>
                                                        <span class="text">Akses Formulir Kuesioner RBA</span>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($rba[0]->transactionRba->where('id_user',auth()->user()->id)->count() > 0)
                                                        <button type="button" class="btn btn-success">Sudah
                                                            Mengisi</button>
                                                    @else
                                                        <button type="button" class="btn btn-warning">Belum
                                                            Mengisi</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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

    @foreach ($sections as $section)
        <!-- Modal Kuesioner -->

        <div class="modal fade" id="KuesionerModalWBS_{{ $section->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('responden.kuesioner.add.wbs') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="id" value="{{ $section->id }}" />
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Isi Kuisioner Section
                                {{ $section->nama_section }}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-1 font-weight-bold text-primary">Kolom <em>Impact</em> (Dampak)</h6>
                                        </div>
                                        <div class="card-body font-weight-normal">
                                            <h6 class="m-0 font-weight-normal text-dark lh-sm">Penilaian kolom impact (dampak) berkaitan dengan dampak atau keparahan yang dapat terjadi pada setiap risiko yang ditanyakan sesuai dengan parameter pada tabel berikut:</h6><br>
                                            <table class="table table-sm table-bordered border-black">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-success" style="width: 10%" scope="col">1</th>
                                                        <th class="text-center text-success" style="width: 10%" scope="col">2</th>
                                                        <th class="text-center text-dark" style="width: 10%" scope="col">3</th>
                                                        <th class="text-center text-danger" style="width: 20%" scope="col">4</th>
                                                        <th class="text-center text-danger" style="width: 20%" scope="col">5</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center text-success font-weight-bolder">Berdampak Sangat Kecil</th>
                                                        <td class="text-center text-success">Berdampak Kecil</td>
                                                        <td class="text-center text-dark">Berdampak Sedang</td>
                                                        <td class="text-center text-danger">Berdampak Besar</td>
                                                        <td class="text-center text-danger font-weight-bolder">Berdampak Parah</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-1 font-weight-bold text-primary">Kolom <em>Probability</em> (Kemungkinan)</h6>
                                        </div>
                                        <div class="card-body font-weight-normal">
                                            <h6 class="m-0 font-weight-normal text-dark">Penilaian kolom probability (kemungkinan) berkaitan dengan kemungkinan yang dapat terjadi pada setiap risiko yang ditanyakan sesuai dengan parameter pada tabel berikut:</h6><br>
                                            <table class="table table-sm table-bordered border-black">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-success" style="width: 20%" scope="col">1</th>
                                                        <th class="text-center text-success" style="width: 20%" scope="col">2</th>
                                                        <th class="text-center text-dark" style="width: 20%" scope="col">3</th>
                                                        <th class="text-center text-danger" style="width: 20%" scope="col">4</th>
                                                        <th class="text-center text-danger" style="width: 20%" scope="col">5</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center text-success font-weight-bolder">Sangat Jarang Terjadi</th>
                                                        <td class="text-center text-success">Jarang Terjadi</td>
                                                        <td class="text-center text-dark">Dapat Terjadi</td>
                                                        <td class="text-center text-danger">Mungkin Terjadi</td>
                                                        <td class="text-center text-danger font-weight-bolder">Sangat Mungkin Terjadi</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pertanyaan</th>
                                            <th>Nilai Impact</th>
                                            <th>Nilai Probability</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @php $x = 1; @endphp
                                        @foreach ($section->wbs as $wbs)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td style="width:50%"><b>WBS {{ $wbs->nama_wbs }}</b></td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_impact[{{ $i - 1 }}]"
                                                            id="jawaban{{ $wbs->id }}" value="1|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_1_{{ $wbs->id }}">1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_impact[{{ $i - 1 }}]"
                                                            id="jawaban_2_{{ $wbs->id }}"
                                                            value="2|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_2_{{ $wbs->id }}">2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_impact[{{ $i - 1 }}]"
                                                            id="jawaban_3_{{ $wbs->id }}"
                                                            value="3|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_3_{{ $wbs->id }}">3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_impact[{{ $i - 1 }}]"
                                                            id="jawaban_4_{{ $wbs->id }}"
                                                            value="4|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_4_{{ $wbs->id }}">4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_impact[{{ $i - 1 }}]"
                                                            id="jawaban_5_{{ $wbs->id }}"
                                                            value="5|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_5_{{ $wbs->id }}">5</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_probability[{{ $i - 1 }}]"
                                                            id="jawaban_1_{{ $wbs->id }}"
                                                            value="1|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_1_{{ $wbs->id }}">1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_probability[{{ $i - 1 }}]"
                                                            id="jawaban_2_{{ $wbs->id }}"
                                                            value="2|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_2_{{ $wbs->id }}">2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_probability[{{ $i - 1 }}]"
                                                            id="jawaban_3_{{ $wbs->id }}"
                                                            value="3|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_3_{{ $wbs->id }}">3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_probability[{{ $i - 1 }}]"
                                                            id="jawaban_4_{{ $wbs->id }}"
                                                            value="4|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_4_{{ $wbs->id }}">4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="jawaban_wbs_probability[{{ $i - 1 }}]"
                                                            id="jawaban_5_{{ $wbs->id }}"
                                                            value="5|{{ $wbs->id }}">
                                                        <label class="form-check-label"
                                                            for="jawaban_5_{{ $wbs->id }}">5</label>
                                                    </div>
                                                    @php $i++; @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

    <div class="modal fade" id="KuesionerModalRBA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="{{ route('responden.kuesioner.add.rba') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value="{{ $section->id }}" />
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi Kuisioner Section
                            {{ $section->nama_section }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        Ketentuan pengisian kuesioner:<br></br>
                        <div class="row">
                            <div class="col-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-1 font-weight-bold text-primary">Kolom <em>Impact</em> (Dampak)</h6>
                                    </div>
                                    <div class="card-body font-weight-normal">
                                        <h6 class="m-0 font-weight-normal text-dark lh-sm">Penilaian kolom impact (dampak) berkaitan dengan dampak atau keparahan yang dapat terjadi pada setiap risiko yang ditanyakan sesuai dengan parameter pada tabel berikut:</h6><br>
                                        <table class="table table-sm table-bordered border-black">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-success" style="width: 10%" scope="col">1</th>
                                                    <th class="text-center text-success" style="width: 10%" scope="col">2</th>
                                                    <th class="text-center text-dark" style="width: 10%" scope="col">3</th>
                                                    <th class="text-center text-danger" style="width: 20%" scope="col">4</th>
                                                    <th class="text-center text-danger" style="width: 20%" scope="col">5</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center text-success font-weight-bolder">Berdampak Sangat Kecil</th>
                                                    <td class="text-center text-success">Berdampak Kecil</td>
                                                    <td class="text-center text-dark">Berdampak Sedang</td>
                                                    <td class="text-center text-danger">Berdampak Besar</td>
                                                    <td class="text-center text-danger font-weight-bolder">Berdampak Parah</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-1 font-weight-bold text-primary">Kolom <em>Probability</em> (Kemungkinan)</h6>
                                    </div>
                                    <div class="card-body font-weight-normal">
                                        <h6 class="m-0 font-weight-normal text-dark">Penilaian kolom probability (kemungkinan) berkaitan dengan kemungkinan yang dapat terjadi pada setiap risiko yang ditanyakan sesuai dengan parameter pada tabel berikut:</h6><br>
                                        <table class="table table-sm table-bordered border-black">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-success" style="width: 20%" scope="col">1</th>
                                                    <th class="text-center text-success" style="width: 20%" scope="col">2</th>
                                                    <th class="text-center text-dark" style="width: 20%" scope="col">3</th>
                                                    <th class="text-center text-danger" style="width: 20%" scope="col">4</th>
                                                    <th class="text-center text-danger" style="width: 20%" scope="col">5</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center text-success font-weight-bolder">Sangat Jarang Terjadi</th>
                                                    <td class="text-center text-success">Jarang Terjadi</td>
                                                    <td class="text-center text-dark">Dapat Terjadi</td>
                                                    <td class="text-center text-danger">Mungkin Terjadi</td>
                                                    <td class="text-center text-danger font-weight-bolder">Sangat Mungkin Terjadi</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body m-1 font-weight-normal text-dark">Responden wajib menjawab seluruh pertanyaan pada kuesioner yang tersedia.<br></br>Setelah menekan tombol Simpan, jawaban telah tersimpan di database dan tidak dapat diubah kembali.
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Pertanyaan</th>
                                        <th>Nilai Impact</th>
                                        <th>Nilai Probability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x = 1; @endphp
                                    @foreach ($rba as $r)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td style="width:50%">RBA {{ $r->nama_rba }}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_impact[{{ $x - 1 }}]"
                                                        id="jawaban{{ $r->id }}" value="1|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_1_{{ $r->id }}">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_impact[{{ $x - 1 }}]"
                                                        id="jawaban_2_{{ $r->id }}"
                                                        value="2|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_2_{{ $r->id }}">2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_impact[{{ $x - 1 }}]"
                                                        id="jawaban_3_{{ $r->id }}"
                                                        value="3|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_3_{{ $r->id }}">3</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_impact[{{ $x - 1 }}]"
                                                        id="jawaban_4_{{ $r->id }}"
                                                        value="4|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_4_{{ $r->id }}">4</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_impact[{{ $x - 1 }}]"
                                                        id="jawaban_5_{{ $r->id }}"
                                                        value="5|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_5_{{ $r->id }}">5</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_probability[{{ $x - 1 }}]"
                                                        id="jawaban_1_{{ $r->id }}"
                                                        value="1|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_1_{{ $r->id }}">1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_probability[{{ $x - 1 }}]"
                                                        id="jawaban_2_{{ $r->id }}"
                                                        value="2|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_2_{{ $r->id }}">2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_probability[{{ $x - 1 }}]"
                                                        id="jawaban_3_{{ $r->id }}"
                                                        value="3|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_3_{{ $r->id }}">3</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_probability[{{ $x - 1 }}]"
                                                        id="jawaban_4_{{ $r->id }}"
                                                        value="4|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_4_{{ $r->id }}">4</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="jawaban_rba_probability[{{ $x - 1 }}]"
                                                        id="jawaban_5_{{ $r->id }}"
                                                        value="5|{{ $r->id }}">
                                                    <label class="form-check-label"
                                                        for="jawaban_5_{{ $r->id }}">5</label>
                                                </div>
                                                @php $x++; @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
