@extends('layouts.mylayout')


@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Kategori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/home/tambahcategory') }}">View
                        Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Produk</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('home/tambahproducts') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Customer</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/home/add-customer') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('table')

<div class="form-group  mb-2">
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($error->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div id="category-form" style="display: none">
        <form method="POST" action="/categories" class="category-form">
            @csrf
            <div class="form-group">
                <label for="name">
                        Tambah Kategori
                </label>
                <input type="text" name="name" id="name" class="form-control col-md-6" placeholder="Masukan kategori"
                    style="width: 20%">
            </div>
            <button type="submit" class="btn btn-primary -mb-2 mt-2">Save</button>
        </form>
    </div>

    <form method="POST" action="/categories">
        @csrf
        <div class="form-group">
            <label for="name">Tambah Kategori</label>
            <input type="text" name="name" id="name" class="form-control col-md-6" placeholder="Masukan kategori"
                style="width: 20%">
        </div>
        <button type="submit" class="btn btn-primary -mb-2 mt-2">Save</button>
    </form>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Kategori
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Produk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $x->name }}</td>
                    <td>
                        <button class="btn-primary  ">
                            <a href="{{ url('/editcategory/'.$x->id)}}" class="btn btn-primary   ">Edit</a>
                        </button>
                        <button class="btn-danger">
                            <a href="{{ url('/deleted/'.$x->id) }}" class="btn btn-danger">Hapus</a>
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    <script src="{{ asset('js/custom.js') }}">
</script> --}}
@endsection