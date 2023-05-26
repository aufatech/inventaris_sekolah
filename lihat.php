<?php
include"koneksi.php";
?>
<?php
if (isset($_GET['lihat'])){
$id=$_GET['lihat'];
$qry=mysql_query("SELECT r.nama_ruang, b.*, j.* FROM barang b INNER JOIN ruang r on b.kode_ruang=r.kode_ruang INNER JOIN jenis_barang j on b.type=j.id where kode_barang='$id'");
$data=mysql_fetch_assoc($qry);
echo '
 <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Transaksi</h3>
              <div class="col-12"><br>
                <img src="img/'.$data['gambar'].'" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><b>Kode Barang : '.$data['kode_barang'].'</b></h3>
              <p></p>
              <hr>
              <table>
              <tr>
                <td><h4 class="mt-3">Nama Barang </h4></td>
                <td width="40%"><h4 class="mt-3">'.$data['nama_barang'].'</h4></td></tr>
              <tr>
              <tr>
                <td><h4 class="mt-3">Kode Lokasi </h4></td>
                <td width="40%"><h4 class="mt-3">12.11.21.08.02.'.substr(date("yy", strtotime($data['tahun'])), 2).'.16</h4></td></tr>
              <tr>
              <tr>
                <td><h4 class="mt-3">Kodefikasi Barang </h4></td>
                <td width="40%"><h4 class="mt-3">'.$data['kodefikasi'].'</h4></td></tr>
              <tr>
              <tr>
                <td><h4 class="mt-3">Nomer Registrasi</h4></td>
                <td width="40%"><h4 class="mt-3">';
                if($data['jumlah_barang']<=1)
                  {
                    echo '000'.$data['jumlah_barang'];
                    }
                    else{
                      if($data['jumlah_barang']<=9){
                        echo '0001 s/d 000'.$data['jumlah_barang'];
                      }else if($data['jumlah_barang']<=99){
                        echo '0001 s/d 00'.$data['jumlah_barang'];
                      }else if($data['jumlah_barang']<=999){
                        echo '0001 s/d 0'.$data['jumlah_barang'];
                      }else{
                        echo '0001 s/d '.$data['jumlah_barang'];
                      }
                     
                   }
                      echo '</h4></td></tr>
              <tr>
              <tr>
                <td><h4 class="mt-3">Jumlah Barang    </h4></td>
                <td><h4 class="mt-3">'.$data['jumlah_barang'].'</h4></td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Type Barang   </h4></td>
                <td><h4 class="mt-3">'.$data['jenis_barang'].'</h4></td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Tahun Pembelian</h4></td>
                <td><h4 class="mt-3">'.$data['tahun'].'</h4></td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Keterangan</h4></td>
                <td><h4 class="mt-3">'.$data['keterangan'].'</h4></td>
              </tr>
              <tr>
                <td><h4 class="mt-3">Harga Per Satuan   </h4></td>
                <td><div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 Rp.'.$data['harga_satuan'].'
                </h2>
              </div></td>
              </tr>
              <tr>
                <td><br></td>
                <td><br><a href="javascript:window.history.go(-1);">
                <div class="btn btn-info btn-lg btn-flat">
                  
                  <i class="fas fa-chevron-left  fa-lg mr-2"></i> 
                  Kembali
                </div></a></td>
              </tr>
             </table>
            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->';
}?>
