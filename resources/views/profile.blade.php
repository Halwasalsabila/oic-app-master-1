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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                <div class="col-lg-4 equel-grid">
                    <div class="grid">
                        <p class="grid-header">Photo Profile</p>
                        <div class="grid-body">
                          <div class="item-wrapper">
                            <center>
                            <div class="user-profile">
                                  <img src="{{ asset('images/profile/male/image_1.png') }}" style="width:150px">
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
                            <form method="post" action="{{ route('profile.update', auth()->user()->id)}}">
                                @method('PUT')
                                @csrf
                              <div class="form-group">
                                <label for="inputEmail1">Username</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->username}}" >
                              </div>
                              <div class="form-group">
                                <label for="inputName">Nama</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Masukan nama" name="name" value="{{ auth()->user()->name}}">
                              </div>
                              <div class="form-group">
                                <label for="inputPassword1">Password</label>
                                <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Masukan password">
                              </div>
                              <div class="form-group">
                                <label for="inputPassword1">Foto Profile</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="photo">
                                    <label class="custom-file-label" for="customFile">Pilih Foto</label>
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
