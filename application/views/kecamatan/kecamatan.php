
<!DOCTYPE html>
<html>
<?php 
$this->load->view('template/head');
?>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper"> 

    <?php 
    $this->load->view('template/header_sidebar');
    ?>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <h4><?php echo "$judul"; ?></h4>

          <p><?php echo "$isi"; ?></p>
        </div>
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Kecamatan</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <?php 
                if ($this->session->flashdata('pesan')) {
                  ?>
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                    <?php echo $this->session->flashdata('pesan'); ?>
                  </div>
                  <?php
                }
                ?>
                <a href="<?php echo base_url(); ?>index.php/kecamatan/form_kecamatan" class="btn btn-success pull-right">
                  <i class="fa fa-plus"></i>Tambah Data
                </a><br><br>
                <table id="kecamatan" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id Kecamatan</th>
                      <th>Nama Kecamatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    for ($i=0; $i < count($kecamatan); $i++) { 

                      ?>
                      <tr>
                        <td><?php echo $kecamatan[$i]->id_kecamatan ?></td>
                        <td><?php echo $kecamatan[$i]->nama_kecamatan ?></td>
                        <td style="text-align:center">
                          <div clas="btn-group">
                            <a class = "btn btn-danger" href="<?php echo base_url(); ?>index.php/kecamatan/hapus_kecamatan/<?php echo $kecamatan[$i]->id_kecamatan; ?>">
                              <i class = "fa fa-trash"></i>
                            </a>
                            <a href="<?php echo site_url('kecamatan/form_edit_kecamatan/'.$kecamatan[$i]->id_kecamatan); ?>" class = "btn btn-warning">
                              <i class = "fa fa-pencil"></i>
                            </a>

                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->


              </div>
              <!-- /.box -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

          <?php 
          $this->load->view('template/footer');
          ?>

          <!-- Control Sidebar -->

          <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php 
$this->load->view('template/js')	
?>
<!-- page script -->
<script>
  $(function () {
    $('#kecamatan').DataTable()
  })
</script>
</body>
</html>
