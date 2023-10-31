@extends('layouts.mylayout')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Kategory</div>
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
                    <a class="small text-white stretched-link" href="/home/tambahproducts">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
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
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Kategori
    </div>
    <div class="card-body">
        <div class="form-group  mb-2">
            <form method="POST" action="/updatecategory/{{ $category->id }}">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @csrf
                @method('PUT')
                <label for="name">Tambah Kategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" /><br>

                {{-- <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"> --}}
                <button type="submit" class="btn btn-primary -mb-2 mt-2">Save</button>
            </form>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($categories as $x)
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

@endsection