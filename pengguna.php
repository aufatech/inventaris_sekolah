<?php
include "koneksi.php";
// include "kode.php";

?>

<div class="col-12 animated bounce">
          <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Data Pengguna</h3>
              <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahakun'><i class='fa fa-check'></i> Tambah Pengguna</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr bgcolor="pink">
                  <th width="10px">No</th>
                  <th width="20px">Username</th>
                  <th width="30px">Nama Pengguna</th>
                  <th width="30px">No Telp</th>
                  <th width="30px">Level</th>
                  <th width="10px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
    			  include("koneksi.php");
    			  $qry=mysql_query("SELECT * FROM petugas")or die(mysql_error());
    			  $no=1;
    			  while($data=mysql_fetch_array($qry)){

    			  ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data[2] ?></td>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><a href="?admin=edit&&update=<?php echo $data[0] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?admin=hapus&&delete=<?php echo $data[0] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                </tr>
                <?php
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      <div class="modal fade" id="tambahakun">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Pengguna</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action='user_simpan.php' method='post'>

                <div class="row">

              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Username</label>
                  <input type='text' name='t_username' class='form-control'  required='true'/>
                </div>
              </div>
            <div class="col-sm-6">
                <div class='form-group'>
                  <label>Password</label>
                  <input type='password' name='t_password'  class='form-control' required='true'/>
                </div>
              </div></div>
              <div class='form-group'>
                <label>Nama Lengkap</label>
                <input type='text' name='t_nama'  class='form-control' required='true'/>
              </div>
              <div class='form-group'>
                  <label>No HP</label>
                  <input type='text' name='t_nohp'  class='form-control' required='true'/>
                </div>
                <div class='form-group'>
                  <label>Alamat</label>
                  <input type='text' name='t_almat'  class='form-control' required='true'/>
                </div>
              <div class="col-sm-6">
                <div class='form-group'>
                  <label>Level</label>
                  <select name="t_level" class="form-control" id="t_level" required='true'>
              <option value="">----Pilih Level----</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
              </select>
                </div>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
