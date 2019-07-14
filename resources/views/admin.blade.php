@extends('layout.admin')
@section('content')
<div class="container">
    <h3 class="mt-5 mb-2">Product Manager</h3>
    <div class="col p-3 main">
        <div class="d-block text-right">
            <button class="btn btn-success my-2">Add Product</button></div>
        <div class="card">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Label</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Link ke Toko</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>MTZ52</td>
                            <td>MOTOBATT</td>
                            <td><i class="fas fa-motorcycle"></i></td>
                            <td><i class="fas fa-check mx-1"></i><i class="fas fa-recycle mx-1"></i><i
                                    class="fas fa-newspaper mx-1"></i></td>
                            <td>12</td>
                            <td>Rp. 200.000</td>
                            <td>Lorem ipsum,...</td>
                            <td>
                                <div class="img-product">
                                    <img src="http://jatakebattery.local/assets/Motobatt__MTZ-2.png">
                                    <img src="http://jatakebattery.local/assets/Motobatt__MTZ-2.png">
                                    <img src="http://jatakebattery.local/assets/Motobatt__MTZ-2.png">
                                </div>
                            </td>
                            <td>
                                <div class="d-block">Wa : 08123123</div>
                                <div class="d-block">Bukalapak: bukalapak.com</div>
                                <div class="d-block">Tokopedia: bukalapak.com</div>
                            </td>
                            <td class="text-center">
                                <button class="btn my-1 mx-1 btn-sm btn-warning"><i
                                        class="fas fa-pencil-alt mr-1"></i>Edit</button>
                                <button class="btn my-1 mx-1 btn-sm btn-danger"><i
                                        class="fas fa-trash mr-1"></i>Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modalbox" id="add-product-modal">
    <div class="modal-lg mx-auto mt-5">
        <div class="shadow-lv2 overflow-hidden rounded modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                <form action="" class="">
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" id="name-product" class="form-control" name='name'>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Merk Product</label>
                                <input type="text" id="merk-product" class="form-control" name='merk'>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="type-product" class="form-control">
                                    <option value="">Motor</option>
                                    <option value="">Mobil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">
                                    Label
                                </label>
                                <br>
                                <input class="ml-2" type="checkbox" name="label1" id="">label1<i
                                    class="fas fa-check"></i>
                                <input class="ml-2" type="checkbox" name="label1" id="">label1<i
                                    class="fas fa-check"></i>
                                <br>
                                <input class="ml-2" type="checkbox" name="label1" id="">label1<i
                                    class="fas fa-check"></i>
                                <input class="ml-2" type="checkbox" name="label1" id="">label1<i
                                    class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" class="form-control" name="qty" id="">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="qty" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 1">
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 2">
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 3">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Link Toko</label>
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 1">
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 2">
                                <input type="text" class="mb-1 form-control" name="qty" id=""
                                    placeholder="Link Gambar 3">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#add-product-modal').modal()
</script>
</div>
@endsection
