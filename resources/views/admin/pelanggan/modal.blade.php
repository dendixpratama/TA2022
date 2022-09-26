<!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $pelanggan->id_pelanggan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
		
			<div class="container-fluid">
				<h5><center>Yakin Hapus Data dengan Nama : <strong> {{ $pelanggan->nama_pelanggan }} ?</strong></center></h5> 
            </div> 
			</div>
            <div class="modal-footer">

                <form action="{{ route('pelanggans.destroy', $pelanggan->id_pelanggan) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Modal Popup untuk Edit -->
    <div class="modal fade" id="edit{{ $pelanggan->id_pelanggan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                 <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                <div class="modal-body">
                  <form action="{{ route('pelanggans.update',['pelanggan' => $pelanggan->id_pelanggan]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="card shadow mb-4">
                        <div class="card-body" style="text-align: left">
                            <div class="form-group col-md-12">
                                <label>Nama :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Telepon :</label>
                                <input type="number" class="form-control" placeholder="" name="telepon" value="{{ $pelanggan->telepon }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email :</label>
                                <input type="email" required="" class="form-control" placeholder="" name="email" value="{{ $pelanggan->email }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Username :</label>
                                <input type="text" class="form-control" placeholder="" name="username" value="{{ $pelanggan->username }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pwd">Password :</label>
                                <input type="password"  class="form-control" id="password" placeholder="" name="password" value="{{ $pelanggan->password }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Status :</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="status" id="status" value="Aktif"
                                        @if($pelanggan->status == 'Aktif')
                                            checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif"
                                    @if($pelanggan->status == 'Tidak Aktif')
                                            checked
                                        @endif
                                        >
                                    <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Keterangan :</label>
                                <input type="text" class="form-control" placeholder="" name="keterangan" value="{{ $pelanggan->keterangan }}" >
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->