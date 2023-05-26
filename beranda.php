<?php
include "koneksi.php";
 ?>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box animated swing ">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Pengguna</span>
        <span class="info-box-number">
         <?php
  $qry=mysql_query("SELECT count(id) as id from petugas")or die(mysql_error());
            $data=mysql_fetch_assoc($qry);
            echo $data['id'];
          ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 animated swing ">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Barang</span>
        <span class="info-box-number">
          <?php
  $qry=mysql_query("SELECT count(kode_barang) as kode_barang from barang")or die(mysql_error());
            $data=mysql_fetch_assoc($qry);
            echo $data['kode_barang'];
          ?>

        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 animated swing ">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Peminjaman</span>
        <span class="info-box-number">
          <?php
  $qry=mysql_query("SELECT count(id) as id from peminjaman")or die(mysql_error());
            $data=mysql_fetch_assoc($qry);
            echo $data['id'];
          ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 animated swing ">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pengembalian</span>
        <span class="info-box-number">
          <?php
  $qry=mysql_query("SELECT count(id) as id from peminjaman where tanggal_kembali is null")or die(mysql_error());
            $data=mysql_fetch_assoc($qry);
            echo $data['id'];
          ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div class="card card-pink">
      <div class="card-header">
        <h5 class="card-title">SI-Inventaris Sekolah</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          Selamat Datang Di Sistem Inventaris Sekolah SMP Negeri 2 Rembang
        <!-- /.row -->
      </div>
      <!-- ./card-body -->
      <div class="card-footer">
        <div class="row">
          Jl. P Sudirman No 127 Rembang, Kabongan Lor, Kecamatan Rembang, Kabupaten Rembang, Jawa Tengah 59219
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->


</div>
<!-- /.row -->
