@extends('layout.app')

@section('title', 'Kendaraan')
@section('main')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                @if (session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible alert-has-icon show fade">
                            <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Gagal!!!</div>
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session('error') }}!
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Edit Data Kendaraan</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form method="post" action="{{ route('kendaraan.update', $kendaraan->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_name">Nama Kendaraan *</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control  @error('inp_name') is-invalid @enderror" id="inp_name"
                                                name="inp_name" placeholder="Masukan nama kendaraan"
                                                value="{{ old('inp_name') ?? $kendaraan->name }}">
                                            @error('inp_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_inv_card">Inventory Card</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control  @error('inp_inv_card') is-invalid @enderror"
                                                id="inp_inv_card" name="inp_inv_card" placeholder="Masukan inventory card"
                                                value="{{ old('inp_inv_card') ?? $kendaraan->inventory_card }}">
                                            @error('inp_inv_card')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_project">Project *</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <select class="custom-select @error('inp_project') is-invalid @enderror"
                                                name="inp_project">
                                                <option value="">-- Pilih Project --</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}" @selected(old('inp_project') == $project->id or $kendaraan->project == $project->id)>
                                                        {{ $project->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('inp_project')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_tglpembelian">Tanggal Pembelian</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="date"
                                                class="form-control  @error('inp_tglpembelian') is-invalid @enderror"
                                                id="inp_tglpembelian" name="inp_tglpembelian"
                                                value="{{ old('inp_tglpembelian') ?? $kendaraan->buy_date?->format('Y-m-d') }}">
                                            @error('inp_tglpembelian')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_harga">Harga</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="number"
                                                class="form-control @error('inp_harga') is-invalid @enderror" id="inp_harga"
                                                name="inp_harga" placeholder="Masukan data harga"
                                                value="{{ old('inp_harga') ?? $kendaraan->price }}">
                                            @error('inp_harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_residu">Nilai Residu</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control @error('inp_residu') is-invalid @enderror"
                                                id="inp_residu" name="inp_residu" readonly placeholder="Masukan data harga"
                                                value="{{ old('inp_residu') ?? $kendaraan->residu_value }}">
                                            @error('inp_residu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_ekonomis">Nilai Ekonomis</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control @error('inp_ekonomis') is-invalid @enderror"
                                                id="inp_ekonomis" name="inp_ekonomis" readonly
                                                placeholder="Masukan data harga"
                                                value="{{ old('inp_ekonomis') ?? $kendaraan->economic_value }}">
                                            @error('inp_ekonomis')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_penyusutan">Nilai Penyusutan</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control @error('inp_penyusutan') is-invalid @enderror"
                                                id="inp_penyusutan" name="inp_penyusutan" readonly
                                                placeholder="Masukan data harga"
                                                value="{{ old('inp_penyusutan') ?? $kendaraan->depreciation_value }}">
                                            @error('inp_penyusutan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_lokasi">Lokasi *</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control @error('inp_lokasi') is-invalid @enderror"
                                                id="inp_lokasi" name="inp_lokasi" placeholder="Masukan data lokasi"
                                                value="{{ old('inp_lokasi') ?? $kendaraan->location }}">
                                            @error('inp_lokasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_pemakai">Pemakai</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control @error('inp_pemakai') is-invalid @enderror"
                                                id="inp_pemakai" name="inp_pemakai"
                                                placeholder="Masukan data pemakai kendaraan"
                                                value="{{ old('inp_pemakai') ?? $kendaraan->user }}">
                                            @error('inp_pemakai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_kondisi">Kondisi *</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <select class="custom-select @error('inp_kondisi') is-invalid @enderror"
                                                name="inp_kondisi">
                                                <option selected="selected">-- Pilih --</option>
                                                <option value="Baik" @selected(old('inp_kondisi') ?? $kendaraan->condition == 'Baik')>Baik</option>
                                                <option value="Rusak" @selected(old('inp_kondisi') ?? $kendaraan->condition == 'Rusak')>Rusak</option>
                                                <option value="Dijual" @selected(old('inp_kondisi') ?? $kendaraan->condition == 'Dijual')>Dijual</option>
                                                <option value="Hilang" @selected(old('inp_kondisi') ?? $kendaraan->condition == 'Hilang')>Hilang</option>
                                            </select>
                                            @error('inp_kondisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_tglpeminjaman">Tanggal Peminjaman</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="date"
                                                class="form-control  @error('inp_tglpeminjaman') is-invalid @enderror"
                                                id="inp_tglpeminjaman" name="inp_tglpeminjaman"
                                                value="{{ old('inp_tglpeminjaman') ?? $kendaraan->loan_date?->format('Y-m-d') }}">
                                            @error('inp_tglpeminjaman')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_deskripsi">Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <textarea style="resize: auto" rows="5" class="form-control @error('inp_deskripsi') is-invalid @enderror"
                                                id="inp_deskripsi" name="inp_deskripsi" value="{{ old('inp_deskripsi') }}"
                                                placeholder="Tambahkan deskripsi jika diperlukan&#10;Jika adan mengisi inputan tanggal peminjaman, berikan informasi tentang peminjamn dengan format <Peminjam : nama_peminjam> contoh : 'Peminjam : Budi'">{{ old('inp_deskrips') ?? $kendaraan->description }}</textarea>
                                            @error('inp_deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <p class="text-muted"><small> Inputan bertanda * harus di isi </small></p>

                                            <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content viewport ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- content viewport ends -->
    <!-- partial:partials/_footer.html -->
    @include('component.footer')
    <!-- partial -->
    </div>
    <!-- page content ends -->
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#inp_harga").keyup(function(event) {
            var harga = $(this).val();

            var residu = $("#inp_residu").val(nilaiResidu(harga)).val();
            var ekonomis = $("#inp_ekonomis").val(nilaiEkonomis(harga, residu)).val();
            var penyusutan = $("#inp_penyusutan").val(nilaiPenyusutan(harga, residu)).val();
            console.log($(this).val() == '');
            if (harga === '') {
                $("#inp_residu").val(null);
                $("#inp_ekonomis").val(null);
                $("#inp_penyusutan").val(null);
            }
        });
        $("#inp_harga").focusout(function() {
            var harga = $(this).val();
            $("#inp_residu").val(residu(harga));
        });

        function nilaiResidu(harga) {
            return harga * 10 / 100;
        }

        function nilaiEkonomis(harga, residu) {
            return harga - residu;
        }

        function nilaiPenyusutan(harga, residu) {
            return (harga - residu) / 5;
        }

        // var format = function(num) {
        //     var str = num.toString().replace("", ""),
        //         parts = false,
        //         output = [],
        //         i = 1,
        //         formatted = null;
        //     if (str.indexOf(".") > 0) {
        //         parts = str.split(".");
        //         str = parts[0];
        //     }
        //     str = str.split("").reverse();
        //     for (var j = 0, len = str.length; j < len; j++) {
        //         if (str[j] != ",") {
        //             output.push(str[j]);
        //             if (i % 3 == 0 && j < (len - 1)) {
        //                 output.push(".");
        //             }
        //             i++;
        //         }
        //     }
        //     formatted = output.reverse().join("");
        //     return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        // };
        // var input = 95000000000;
        // var output = parseInt(input).toLocaleString();
        // alert(output);
    </script>
@endpush
