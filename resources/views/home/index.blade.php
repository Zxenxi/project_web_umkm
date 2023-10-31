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
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Area Chart Example
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
@endsection

@section('table')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Added this line -->
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Nama product</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    $count = 0;
                    @endphp

                    @foreach($categories as $category)
                    @php
                    $products = $category->products; // get associated products for this category
                    @endphp

                    @if(count($products) > 0)
                    @foreach($products as $product)
                    @php
                    $count++;
                    @endphp

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ optional($product->customer)->name}}</td>
                        {{-- <td>{{ $product->customer->name }}</td> --}}

                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td> <!-- Modified this line -->
                        <td>{{$category->name}}</td>
                        <td>
                            @if($product->image)
                            <!-- <img src="{{ asset('storage/'. $product->image ) }}" width="200" height="200"> -->
                            <img src="{{ Storage::url($product->image) }}" height="200" width="200" alt="" />
                            @else
                            No Image Available
                            @endif
                        </td>
                        <td><a href="{{ url('action') }}">Action</a></td>
                    </tr>
                    @endforeach
                    @else
                    @php
                    $count++;
                    @endphp

                    <tr>
                        <td>{{ $count }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$category->name}}</td>
                        <td>-</td>
                        <td><a href="{{ url('action') }}">Action</a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div> <!-- Added this line -->
    </div>

    {{-- <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                $count = 0;
                @endphp

                @foreach($categories as $category)
                @php
                $products = $category->products; // get associated products for this category
                @endphp

                @if(count($products) > 0)
                @foreach($products as $product)
                @php
                $count++;
                @endphp

                <tr>
                    <td>{{ $count }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td> <!-- Modified this line -->
                    <td>{{$category->name}}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset('storage/'. $product->image ) }}" width="200" height="200">
                        @else
                        No Image Available
                        @endif
                    </td>
                    <td><a href="{{ url('action') }}">Action</a></td>
                </tr>
                @endforeach
                @else
                @php
                $count++;
                @endphp
                <tr>
                    <td>{{ $count }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{ url('action') }}">Action</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div> --}}
</div>

@endsection