@extends('layout.app')

@section('title', 'Kategori Project')
@section('main')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                @if (session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible alert-has-icon show fade">
                            <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Gagal !!!</div>
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ session('error') }} !!!
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Tambah Data Kategori Project</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form method="post" action="{{ route('kategori_project.store') }}">
                                    @csrf
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inp_name">Nama *</label>
                                        </div>
                                        <div class="col-md-8 showcase_content_area">
                                            <input type="text"
                                                class="form-control  @error('inp_name') is-invalid @enderror" id="inp_name"
                                                name="inp_name" placeholder="Masukan nama anda"
                                                value="{{ old('inp_name') }}">
                                            @error('inp_name')
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
                                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
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
