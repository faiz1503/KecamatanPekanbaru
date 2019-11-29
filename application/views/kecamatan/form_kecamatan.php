
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
                <form action="<?php echo $action; ?>" method="post">
                  <div class="input-group">
                    <span class="input-group-addon" ><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="nama_kecamatan" value="<?php echo $nama_kecamatan; ?>"class="form-control" placeholder="Nama kecamatan">
                    <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>">
                  </div>
                  <div class="box-footer">
                    <input type="submit" class="btn btn-danger" value="<?php echo $button; ?>">
                    <a href="<?php echo base_url(); ?>index.php/kecamatan" class="btn btn-default">Kembali</a>
                    </div>
                  </form>
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
