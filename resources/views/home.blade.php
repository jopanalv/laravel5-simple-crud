@extends('layouts.app')

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
      <strong>{{ $message }}</strong>
    </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Dashboard</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


            <a href="/create" class="btn btn-primary btn-md m-3">Tambah Data</a>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=0;
                    @endphp
                    @foreach ($show as $row)
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$row->item_name}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->item_price}}</td>
                        <td>{{$row->item_qty}}</td>
                        <td>
                            <a href="edit/{{$row->id}}" class="btn btn-primary px-4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form method="POST" action="destroy/{{$row->id}}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger px-4"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
