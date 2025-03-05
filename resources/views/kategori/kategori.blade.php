@extends('layouts.user_type.auth')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between" style="padding-bottom: 1px;">
                        <h6>Kategori</h6>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#TambahKategori">Tambah
                            Kategori</a>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-uppercase text-secondary text-xxs font-weight-bolder">

                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Kode Kategori</th>
                                        <th style="text-align: center;">Nama Kategori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                            style="text-align: center;">Aksi</th>
                                            
                                    </tr>
                                </thead>
                                <tbody>

                                @php
                                $no = 1;
                                $kategori = DB::table('kategori')->get();
                                foreach($kategori as $data){
                                    echo "<tr>";
                                    echo "<td style='text-align: center;'>$no</td>";
                                    echo "<td style='text-align: center;'>$data->kode</td>";
                                    echo "<td style='text-align: center;'>$data->nama</td>";
                                    echo "<td style='text-align: center;'>
                                    <a href='#' class='btn btn-info' data-toggle='modal' data-target='#EditKategori$data->id'>Edit</a>
                                    <a href='/kategori/delete/$data->id' class='btn btn-danger'>Hapus</a>
                                    </td>";
                                    echo "</tr>";
                                    $no++;
                                }

                                @endphp

                                
                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('kategori.modal-kategori')
    @include('sweetalert::alert')
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>