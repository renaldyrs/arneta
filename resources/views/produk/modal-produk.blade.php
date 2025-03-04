<!---- MODAL PESANAN ---->

<form action="{{url('produk/tambahproduk')}}" method="POST" id="form-pesanan">
    @csrf
    <div class="modal fade text-left" id="TambahProduk" tabindex="-1" role="dialog" aria-hidden="true"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Produk</h3>
                        <button type="button" class="close" onclick="javascript:window.location.reload()"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-body">

                            <div class="row p-t-18">

                                <input type="hidden" value="{{Auth::user()->id}}" name="iduser">

                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Nama Produk</label>
                                        <input type="text" value="" name="nama_produk" id="namaproduk"
                                            class="form-control" placeholder="Nama Produk">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Supplier</label>
                                        <select name="supplier" class="form-control" id="supplier">

                                            @foreach ($supplier as $item)
                                                <option value="{{$item->id}}">{{$item->Nama}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Jumlah</label>
                                        <div class="group" style="display: flex; ">
                                            <input type="text" value="" name="jumlah" id="jumlah"
                                                class="group-input form-control" placeholder="Jumlah">
                                            <div class="input-group-prepend">
                                                <div class="group-text">pcs</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Harga Awal</label>
                                        <input type="text" value="" name="harga_awal" id="harga" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Harga Akhir</label>
                                        <input type="text" value="" name="harga_akhir" id="harga" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Tanggal</label>
                                        <input type="date" value="" name="tanggal" id="tanggal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Stock Awal</label>
                                        <input type="text" value="" name="stock_awal" id="harga" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-success">
                                        <label class="control-label">Stock Akhir</label>
                                        <input type="text" value="" name="stock_akhir" id="harga" class="form-control">

                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="form-actions" style="text-align: end;">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                Tambah Produk</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />

<style>
    .group {
        display: flex;
    }

    .group-text {

        border-left: none;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        height: calc(1.5em + 0.75rem;

        }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change', '#autojenis', function () {

            var id = $(this).val();

            $.ajax({
                type: "get",
                url: '{!!URL::to('getharga')!!}',
                data: { 'id': id, },
                dataType: 'json',
                success: function (data) {

                    $("#harga1").val(data.harga);
                    $("#total").val(data.harga * jumlah);

                },
                error: function (data) {

                }
            });
        });
    });

    $(document).ready(function () {
        $(document).on('change', '#metode', function () {
            var jenis = $(this).val();
            console.log(jenis);

            if (jenis) {
                $.ajax({
                    url: 'getmetode/' + jenis,
                    type: "GET",
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                        $('#metodepembayaran').empty();
                        $.each(data, function (key, value) {

                            $('#metodepembayaran').append('<option value="' + value.id + '">' + value.namabank + '</option>');
                        });

                    }
                });
            } else {

                $('#metodepembayaran').append('<option value="0"></option>');
            }

        });

    });


    $(document).ready(function () {
        $(document).on('change', '#metodepembayaran', function () {
            var id = $(this).val();
            console.log(id);

            $.ajax({
                url: '{!!URL::to('getkodebank')!!}',
                type: "GET",
                data: { 'id': id, },
                dataType: "JSON",
                success: function (data) {
                    console.log(data.kodebank);
                    $('#kodebank').val(data.kodebank);
                }

            });

        });

    });
</script>


<!-- MODAL UBAH STATUS -->