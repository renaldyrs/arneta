<!---- MODAL PRODUK ---->

<form action="{{url('supplier/tambahsupplier')}}" method="POST" name="form-supplier">
    @csrf
    <div class="modal fade text-left" id="TambahSupplier" tabindex="-1" role="dialog" aria-hidden="true"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
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
                                        <label class="control-label">Nama Supplier</label>
                                        <input type="text" value="" name="nama" id="nama"
                                            class="form-control" placeholder="Nama Supplier">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Alamat Supplier</label>
                                        <input type="text" value="" name="alamat" id="alamatsupplier"
                                            class="form-control" placeholder="Alamat Supplier">

                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">No Telepon</label>
                                        <input type="text" value="" name="no" id="no"
                                            class="form-control" placeholder="No Telepon">

                                    </div>
                                </div>


                                

                                <div class="col-md-3 form-actions">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Tambah 
                                    </button>
                                </div>
                                <div class="col-md-3 form-actions">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>


                            </div>

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
    $("#total").keyup(function () {
        var jumlah = $("#jumlah").val();
        var total = $("#total").val();
        var harga_beli = parseInt(total) / parseInt(jumlah);
        var harga_beli = harga_beli.toFixed(2);
        $("#harga_beli").val(harga_beli);
    });
});


</script>