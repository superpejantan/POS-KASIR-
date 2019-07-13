<form action="{{url('selisih')}}" method="POST">
{{ csrf_field() }}
            
            <div class="box-body">
            
          <div class="form-group">
                <label for="exampleInputEmail1">Nama Pasien</label>
                <input type="date" name="tanggal1" class="form-control" id="exampleInputEmail1" placeholder="Nama Pasien">
              </div>
            </div>
          <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="date"  name="tanggal2" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
            </div>
          </form>
</form>