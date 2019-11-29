
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
                <a href="<?php echo base_url(); ?>index.php/data_kecamatan/form_data_kecamatan" class="btn btn-success pull-right">
                  <i class="fa fa-plus"></i>Tambah Data
                </a><br><br>
                <table id="data_kecamatan" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id Data Kecamatan</th>
                      <th>Nama Kecamatan</th>
                      <th>Jumlah Penduduk</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    for ($i=0; $i < count($data_kecamatan); $i++) { 

                      ?>
                      <tr>
                        <td><?php echo $data_kecamatan[$i]->id_data_kecamatan ?></td>
                        <td><?php echo $data_kecamatan[$i]->nama_kecamatan ?></td>
                        <td><?php echo $data_kecamatan[$i]->jumlah_penduduk ?></td>
                        <td style="text-align:center">
                          <div clas="btn-group">
                            <a class = "btn btn-danger" href="<?php echo base_url(); ?>index.php/data_kecamatan/hapus_data_kecamatan/<?php echo $data_kecamatan[$i]->id_data_kecamatan; ?>">
                              <i class = "fa fa-trash"></i>
                            </a>
                            <a href="<?php echo site_url('data_kecamatan/form_edit_data_kecamatan/'.$data_kecamatan[$i]->id_data_kecamatan); ?>" class = "btn btn-warning">
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
              <div class="box">
                <div class="row">
                  <div class="col-md-4"><div id="jumlah_penduduk_Line"></div></div>
                  <div class="col-md-4"><div id="jumlah_penduduk_Bar"></div>
                  <div class="col-md-4"><div id="jumlah_penduduk_Pie" ></div>
                </div>
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
<script>
  Highcharts.chart('jumlah_penduduk_Line', {

    title: {
      text: 'Jumlah Penduduk Kota Pekanbaru'
    },

    subtitle: {
      text: 'Source: Pekanbaru.go.id'
    },

    yAxis: {
      title: {
        text: 'Jumlah Penduduk'
      }
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },

    xAxis:{
      categories:[<?php for ($i=0; $i < count($data_kecamatan); $i++) { 
        echo "'".$data_kecamatan[$i]->nama_kecamatan."',";
      }?>]
    },

    series: [{
      name: 'Jumlah Penduduk',
      data: [<?php for ($i=0; $i < count($data_kecamatan); $i++) { 
        echo $data_kecamatan[$i]->jumlah_penduduk.",";
      }?>]
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>
<script>
  Highcharts.chart('jumlah_penduduk_Bar', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Jumlah Penduduk Kota Pekanbaru'
    },

    subtitle: {
      text: 'Source: Pekanbaru.go.id'
    },

    yAxis: {
      title: {
        text: 'Jumlah Penduduk'
      }
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },

    xAxis:{
      categories:[<?php for ($i=0; $i < count($data_kecamatan); $i++) { 
        echo "'".$data_kecamatan[$i]->nama_kecamatan."',";
      }?>]
    },

    series: [{
      name: 'Jumlah Penduduk',
      data: [<?php for ($i=0; $i < count($data_kecamatan); $i++) { 
        echo $data_kecamatan[$i]->jumlah_penduduk.",";
      }?>]
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>
<script>
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('jumlah_penduduk_Pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Chrome', y: 61.41 },
            { name: 'Internet Explorer', y: 11.84 },
            { name: 'Firefox', y: 10.85 },
            { name: 'Edge', y: 4.67 },
            { name: 'Safari', y: 4.18 },
            { name: 'Other', y: 7.05 }
        ]
    }]
});
</script>
<!-- page script -->
<script>
  $(function () {
    $('#data_kecamatan').DataTable()
  })
</script>
<script>
</body>
</html>
