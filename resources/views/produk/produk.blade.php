@extends('layouts.user_type.auth')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
==> css
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
==> js 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between" style="padding-bottom: 1px;">
                        <h6>Produk</h6>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#TambahProduk">Tambah
                            Produk</a>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-uppercase text-secondary text-xxs font-weight-bolder">

                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Kode Produk</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Nama Produk</th>
                                        <th style="text-align: center;">Supplier</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Harga Beli</th>
                                        <th style="text-align: center;">Harga Jual</th>
                                        <th style="text-align: center;">Stock</th>
                                        <th style="text-align: center;">Barcode</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            style="text-align: center;">Aksi</th>
                                            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $p)
                                        <tr>
                                            <td>
                                                <div class="" style="text-align: center">
                                                    <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                                  
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center">
                                                    <h6 class="mb-0 text-sm">{{$p->kode}}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->tanggal}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->nama_produk}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->nama_supplier}}</h6>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->jumlah}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->total}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->harga_beli}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->harga_jual}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$p->stock}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex flex-column justify-content-center">
                                                    <?php echo QrCode::size(50)->generate($p->kode); ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex justify-content-center" style="gap: 5px;">
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                                            data-target="">Edit</a>
                                                        <a href="produk/deleteproduk/{{  $p->kode}}" class="btn btn-danger"
                                                            type="submit">Hapus</a>
                                                    </div>
                                                </div>
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
    </div>

    @include('produk.modal-produk')
    @include('sweetalert::alert')
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>