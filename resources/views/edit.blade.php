@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>Ubah Data</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="px-5" method="POST" action="/update/{{ $map->id }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="{{$map->stock_id}}" name="kode" id="kode">
                        </div>
                        <div class="form-group">
                          <label for="name">Nama Barang</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="{{$map->item_name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori : </label>
                            <select class="form-control select2" style="width: 100%;" name="category" id="category">
                            <option disabled value>-- PILIH KATEGORI --</option>
                            @foreach ($item as $cat)
                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="{{$map->item_price}}" required>
                          </div>
                          <div class="form-group">
                            <label for="stock">Stok</label>
                            <input type="number" class="form-control" name="stock" id="stock" placeholder="ex: 20" required>
                          </div>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
                        <a href="{{URL::previous()}}" class="btn btn-secondary btn-md btn-block">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
