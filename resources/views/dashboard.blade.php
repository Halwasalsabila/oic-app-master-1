@extends('layout.app')

@section('title', 'Dashboard')
@section('main')
<div class="content-viewport">
  <div class="row">
    <div class="col-12 py-5">
      <h4 class="text-light">Dashboard</h4>
      <p class="text-gray">Selamat Datang, {{ auth()->user()->name }}</p>
    </div>
  </div>
  {{-- <div class="row"> --}}
  {{-- <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p>30%</p>
            <p>+06.2%</p>
          </div>
          <p class="text-black">Data Masuk</p>
          <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_1"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p>43%</p>
            <p>+15.7%</p>
          </div>
          <p class="text-black">Conversion</p>
          <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_2"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
      <div class="grid">
        <div class="grid-body text-gray">
          <div class="d-flex justify-content-between">
            <p>23%</p>
            <p>+02.7%</p>
          </div>
          <p class="text-black">Bounce Rate</p>
          <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_3"></canvas>
          </div>
        </div>
      </div>
    </div> --}}
  <div class="row">
    <div class="col-lg-4 col-md-6 equel-grid">
      <div class="grid  bg-primary">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Keseluruhan</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['all'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 equel-grid">
      <div class="grid  bg-success">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Tanah</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['tanah'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 equel-grid">
      <div class="grid  bg-warning">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Bangunan</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['build'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 equel-grid">
      <div class="grid  bg-warning">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Kendaraan</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['kendaraan'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 equel-grid">
      <div class="grid  bg-info">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Proyek</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['proyek'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 equel-grid ">
      <div class="grid bg-danger">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Office</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['office'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 equel-grid">
      <div class="grid bg-success">
        <div class="grid-body d-flex flex-column h-100">
          <div class="wrapper">
            <div class="d-flex justify-content-between">
              <div class="split-header">
                <p class="card-title text-light">Total Asset Inv Card</p>
              </div>
              <div class="wrapper">
                <button class="btn action-btn btn-xs component-flat pr-0" type="button"><i class="mdi mdi-blur text-light mdi-2x"></i></button>
              </div>
            </div>
            <div class="d-flex align-items-end pt-2 mb-4">
              <h4 class="text-light">{{ $data['invcard'] }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg col-md-6 equel-grid">
      <div class="grid">
        <div class="grid-body">
          <img class="logo" src="{{ asset('images/logo/oic-icon.png') }}" alt="" width="100" height="100">
          <p class="card-title">Profile Perusahaan</p>
          <h4 class="text-center">YOSL-OIC</h4>
          <p class="text-center">Yayasan Orangutan Sumatera Lestari - Orangutan Information Center
            (YOSL-OIC) pertama kali didirikan pada tahun 2001 oleh Panut Hadisiswoyo. YOSL-OIC adalah sebuah
            Lembaga Swadaya Masyarakat yang berlokasi di Medan, yang bertujuan untuk melestarikan dan
            melindungi orangutan sumatera (Pongo abelii) dan rumah hutan mereka. YOSL-OIC merestorasi hutan
            yang rusak, menanggapi dan memitigasi konflik manusia orangutan, melakukan kunjungan kesadaran
            lingkungan ke sekolah dan desa, dan memberikan pelatihan untuk membantu masyarakat setempat
            bekerja menuju masa depan yang lebih berkelanjutan.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-6 equel-grid">
      <div class="grid table-responsive">
        <table class="table table-stretched">
          <thead>
            <tr>
              <th>Assets</th>
              <th>Price</th>
              <th>Change</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">TNH</p>
                <small class="text-gray">Tanah</small>
              </td>
              <td class="font-weight-medium">198.18</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-success">-1.39%</div>
              </td>
            </tr>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">BGN</p>
                <small class="text-gray">Bangunan</small>
              </td>
              <td class="font-weight-medium">03.95</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-danger">-1.17%</div>
              </td>
            </tr>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">PRJ</p>
                <small class="text-gray">Project</small>
              </td>
              <td class="font-weight-medium">11,278</td>
              <td class="text-danger font-weight-medium">
                <div class="badge badge-success">-0.24%</div>
              </td>
            </tr>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">KNDRN</p>
                <small class="text-gray">Kendaraan</small>
              </td>
              <td class="font-weight-medium">354.67</td>
              <td class="text-success font-weight-medium">
                <div class="badge badge-success">+0.15%</div>
              </td>
            </tr>
            <tr>
              <td>
                <p class="mb-n1 font-weight-medium">OFC</p>
                <small class="text-gray">Office</small>
              </td>
              <td class="font-weight-medium">08.42</td>
              <td class="text-success font-weight-medium">
                <div class="badge badge-success">+0.67%</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-7 col-md-12 equel-grid">
      <div class="grid widget-revenue-card">
        <div class="grid-body d-flex flex-column h-100">
          <div class="split-header">
            <p class="card-title text-light">Server Load</p>
            <div class="content-wrapper v-centered">
              <small class="text-light">2h ago</small>
              <span class="btn action-btn btn-refresh btn-xs component-flat">
                <i class="mdi mdi-autorenew text-light mdi-2x"></i>
              </span>
            </div>
          </div>
          <div class="mt-auto">
            <canvas id="cpu-performance" height="80"></canvas>
            <h3 class="font-weight-medium mt-4">69.05%</h3>
            <p class="text-gray">Storage is getting full</p>
            <div class="w-50">
              <div class="d-flex justify-content-between text-light mt-3">
                <small>Usage</small> <small>35.62 GB / 2TB</small>
              </div>
              <div class="progress progress-slim mt-2">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- content viewport ends -->
<!-- partial:partials/_footer.html -->
@include('component.footer')
<!-- partial -->
</div>
<!-- page content ends -->
</div>
@endsection
