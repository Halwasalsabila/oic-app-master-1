@extends('layout.app')

@section('title', 'Kategori Project')
@push('style')
    <style>
        .float-end {
            float: right;
        }
    </style>
@endpush
@section('main')
    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-12">
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
                @if (session()->has('error'))
                    <div class="alert alert-info alert-dismissible alert-has-icon show fade">
                        <div class="alert-icon"><i class="far fa-circle-check"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Peringatan !!!</div>
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('error') }}!
                        </div>
                    </div>
                @endif
                <div class="grid">
                    <div class="grid-header">
                        <p class="d-inline start">Kategori Project</p>
                        <a href="{{ route('kategori_project.create') }}">
                            <button type="button" class="d-inline btn btn-outline-success mb-3 float-end">
                                Add Document
                            </button>
                        </a>
                    </div>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td>{{ $projects->firstItem() + $loop->index }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('kategori_project.destroy', $item->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-xs has-icon"><i
                                                            class="mdi mdi-delete mr-0"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    {!! $projects->links() !!}
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
@endsection
