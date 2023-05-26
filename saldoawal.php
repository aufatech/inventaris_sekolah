<?php
include("koneksi.php");
$akunn="";
?>
<div class="col-12 animated bounce">
          <div class="card card-pink">
                        <div class="card-header">
                          <h3 class="card-title">Saldo Awal <?php 
if(isset($_POST["search"])){
  $bb=$_POST['cari'];
  echo $b;
}
?></h3>
                          <div class="card-tools">
              <button class='btn btn-sm btn-flat btn-success animated swing' data-toggle='modal' data-target='#tambahsaldo'><i class='fa fa-check'></i> Tambah Akun</button>
            </div>
                        </div>
                        
            <!-- /.card-header -->
             <div class="card-body">
              <table id="example2" class="table table-hover table-head-fixed">
                
                <div class="input-group input-group-sm" style="width: 300px;">
                     <form method="post">
                     <select name="cari" class="form-control select2" id="t_level" required='true'>
                                    <option value="0">----Pilih Periode----</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    
                                  </select>

                    <div class="input-group-append">
                      <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i>  Cari</button>
                    </div>
                    </form>
                  </div>
                
                </div>
                <thead>
                <tr bgcolor="pink">
                  <th>No</th>
                  <th>Perode</th>
                  <th>Tanggal Input</th>
                  <th>No Akun</th>
                  <th>Nama Akun</th>
                  <th>Debit</th>
                  <th>Kredit</th>
                  <th>ID User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                </tbody>
               
                <tbody>
                  <?php
            include("koneksi.php");
            if(isset($_POST["search"])){
            $akunn=$_POST['cari'];
            $qry=mysql_query("SELECT saldo_awal.id, saldo_awal.periode, saldo_awal.tgl_masuk, saldo_awal.id_user, saldo_awal.no_akun, akun.nama_akun, saldo_awal.debet, saldo_awal.kredit FROM saldo_awal INNER JOIN akun ON saldo_awal.no_akun=akun.no_akun WHERE saldo_awal.periode='$akunn'")or die(mysql_error());
            $no=1;
            while($data=mysql_fetch_array($qry)){

            ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data[1] ?></td>
                  <td><?php echo $data[2] ?></td>
                  <td><?php echo $data[4] ?></td>
                  <td><?php echo $data[5] ?></td>
                  <td><?php echo $data[6] ?></td>
                  <td><?php echo $data[7] ?></td>
                  <td><?php echo $data[3] ?></td>
                  <td><a href="?admin=ubahsaldo&&update=<?php echo $data[0] ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="?admin=hapussaldo&&delete=<?php echo $data[0] ?>" onclick="return confirm('Apa Anda Yakin Mau dihapus??')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                </tr>
              
                <?php
              }
        }
        ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
<div class="modal fade" id="tambahsaldo">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Saldo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method='post'>
                <div class='form-group'>
                  <label>Periode</label>
                   <select name="t_periode" class="form-control select2" id="t_level" required='true'>
                                    <option value="0">----Pilih Periode----</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    
                                  </select>
                </div>
                <div class='form-group'>
                  <label>Induk Akun</label>
                  <select name="t_akun" class="form-control select2" id="t_level">
                    <option value="">----Pilih Akun----</option>
                    <?php
                    $brg=mysql_query("select * from akun");
                    while($b=mysql_fetch_array($brg)){
                      ?>
                      <option value="<?php echo $b['no_akun']; ?>"><?php echo $b['nama_akun'] ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class='form-group'>
                  <label>Debet</label>
                  <input type='text' name='t_debet' value="0" class='form-control' required='true'/>
                </div>
                <div class='form-group'>
                  <label>Kredit</label>
                  <input type='text' name='t_kredit' value="0" class='form-control' required='true'/>
                </div>
                <div class='form-group'>
                  <label>Tanggal Input</label>
                  <input type='text' id="datepicker" value="<?php echo date('yy-m-d')?>" name='t_tgl'  class='form-control' required='true'/>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<?php
if (isset($_POST['simpan'])){
$user=$_SESSION['username'];
$q=mysql_query("select id_user from user where username='$user'");
while($b=mysql_fetch_array($q)){
$id=$b['id_user'];
}  
$periode=$_POST['t_periode'];
$tgl=$_POST['t_tgl'];
$noakun=$_POST['t_akun'];
$dbt=$_POST['t_debet'];
$krdt=$_POST['t_kredit'];
$qry1=mysql_query("INSERT INTO `saldo_awal`(`id`, `periode`, `no_akun`, `debet`, `kredit`, `tgl_masuk`, `id_user`) VALUES (NULL,'$periode','$noakun','$dbt','$krdt','$tgl','$id')") or die(mysql_error());
if ($qry1){
echo '<script>alert("Data berhasil di Tambah");window.location.assign("admin.php?admin=saldoawal");</script>';
}else{
echo '<script>alert("silahkan cek data lagi")</script>';
}
}
?>
