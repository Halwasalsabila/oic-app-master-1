@extends('layout.app')

@section('title', 'Profile')
@push('style')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
@endpush
@section('main')
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible alert-has-icon show fade">
                    <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Sukses</div>
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('success') }}!
                    </div>
                </div>
            @endif
            <div class="row">

                @if ($errors->any())
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible alert-has-icon show fade">
                            <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Gagal!!!</div>
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-4 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Photo Profile</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <center>
                                    <div class="user-profile">
                                        <img id="img"
                                            src="{{ is_null(auth()->user()->photo_profile) ? asset('storage/images/profile/male/image_1.png') : asset('storage/images/profiles') . '/' . auth()->user()->photo_profile }}"
                                            style="width:100%">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Data Pribadi</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form method="post" action="{{ route('profile.update', auth()->user()->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail1">Username</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->username }}"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Masukan nama"
                                            name="name" value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1">Password</label>
                                        <input type="password" class="form-control" id="inputPassword1" name="password"
                                            placeholder="Masukan password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1">Foto Profile</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="upload"
                                                onchange="readURL(this)" name="image">
                                            <label class="custom-file-label">Pilih Foto</label>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
                                </form>
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
        function readURL(input) {
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#img').attr('src', '/assets/no_preview.png');
            }
        }
    </script>
@endpush
