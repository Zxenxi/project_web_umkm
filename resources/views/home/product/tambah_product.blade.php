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
                    <a class="small text-white stretched-link" href="{{ url('/home/tambahproducts') }}">View Details</a>
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

<form method="POST" action="/product" enctype="multipart/form-data">
    @csrf
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

    <h3>Nama Product</h3>
    <input type="text" name="name" id="name" class="form-control">
    <label for="price">harga</label>
    <input type="text" name="price" id="price" class="form-control">
    <br>
    <label for="category_id">Kategori</label>
    <br>
    <select name="category_id" id="category_id">
        <option value="">Select a Category</option>
        @foreach ($category as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="customer_id">Customer</label>
    <br>
    <select name="customer_id" id="customer_id">
        <option value="">Select a Customer</option>
        @foreach ($customer as $customer)
        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>
    <br>
    <br>
    <label for="description">Deskripsi</label>
    <br>
    <textarea class="form-control" name="description" id="description" cols="10" rows="4"></textarea>
    <br>
    <div class="form-group">
        <label for="image">Gambar</label>
        {{-- <img src="{{ Storage::url($product->image) }}" height="200" width="200"> --}}
        <input type="file" accept="image/*" name="image" id="image" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary -mb-2 mt-2">Save</button>
</form>


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Kategori
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $x)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($x->customer)->name }}</td>

                        <td>{{ $x->name }}</td>
                        <td>{{ $x->description }}</td>
                        <td>Rp {{ number_format($x->price, 2, ',', '.') }}</td>
                        <td>
                            <!-- {{-- <img src="{{ asset($x->image) }}"> --}} -->
                            @if($x->image)
                            <!-- <img src="{{ asset('storage/'. $x->image ) }}" width="200" height="200"> -->
                            <img src="{{ Storage::url($x->image) }}" height="200" width="200" alt="" />

                            @else
                            No Image Available
                            @endif
                        </td>
                        <td>
                            <button class="btn-primary  ">
                                <a href="{{ url('/editproduct/'.$x->id)}}" class="btn btn-primary">Edit</a>
                            </button>
                            {{-- <button class="btn-danger">
                                <a href="{{ url('/deleted/'.$x->id) }}" class="btn btn-danger">Hapus</a>
                            </button> --}}
                            <button class="btn-danger">
                                <a href="{{ url('/deleteproduct/'.$x->id) }}" class="btn btn-danger">Hapus</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection