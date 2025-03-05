@extends('layouts.user_type.auth')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between" style="padding-bottom: 1px;">
                        <h6>Produk</h6>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#TambahSupplier">Tambah
                            Supplier</a>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-uppercase text-secondary text-xxs font-weight-bolder">

                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Nama Supplier</th>
                                        <th style="text-align: center;">Alamat</th>
                                        <th style="text-align: center;">No Telepon</th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $s)
                                        <tr>
                                        <td>
                                            <div style="text-align: center">
                                                <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center">
                                                <h6 class="mb-0 text-sm">{{$s->nama}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center">
                                                <h6 class="mb-0 text-sm">{{$s->alamat}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center">
                                                <h6 class="mb-0 text-sm">{{$s->no}}</h6>
                                            </div>
                                        </td>
                        
                                            <td>
                                                <div style="text-align: center;">
                                                    <div class="d-flex justify-content-center" style="gap: 5px;">
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"
                                                            data-target="">Edit</a>
                                                        <a href="" class="btn btn-danger"
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
    @include('supplier.modal-supplier')
    @include('sweetalert::alert')
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>