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
        edit customer
    </div>
    <div class="card-body">
        <div class="form-group  mb-2">
            <form method="POST" action="/updatecustomer/{{ $customer->id }}">
                @csrf
                @method('PUT')
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
                <div class="form-group">
                    <label for="name">Edit Customer</label><br>
                    <input type="text" name="name" value="{{ old('name', $customer->name) }}" /><br>
                    <label for="phone">Edit Nomor Hp</label><br>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" />
                </div>
                <button type="submit" class="btn btn-primary -mb-2 mt-2">Save</button>
            </form>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nomor Handphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nomor Handphone</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($customers as $x)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $x->name }}</td>
                    <td>{{ $x->phone_number }}</td>
                    <td>
                        <button class="btn-primary  ">
                            <a href="{{ url('/editcustomer/'.$x->id)}}" class="btn btn-primary">Edit</a>
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