<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaizala</title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">        
    <link rel="stylesheet" href="assets/css/templatemo_main.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/templatemo_script.js"></script>
    <script type="text/javascript" src="assets/javascript.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- CSS -->
    <style>
        
        body{
            background-color: white;
        }
    </style>
</head>
<body>

<br><br>
<h1 align="center">Rekap Absensi Mitra Pengolahan C1</h1><br><hr>
<br>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        
        <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10%" bgcolor="#66FF99" scope="col"><tt><p align="center">Tahun</p></tt></th>
                    <th width="15%" bgcolor="#66FF99" scope="col"><tt><p align="center">bulan</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">Tanggal</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">NIP</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">id</p></tt></th>
					          <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">Jam datang</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">Jam pulang</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">Asal</p></tt></th>
                    <th width="7%" bgcolor="#66FF99" scope="col"><tt><p align="center">Sattus</p></tt></th>
                  </tr>

                  </thead>
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
    <div class="col-md-1"></div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<!--<script src="dist/js/adminlte.min.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      // "processing": true,
      // "serverSide": true,
      "ajax": {
        "url" : "https://pbd.bps.go.id/presensi/forms/kaizala.php?request=presensi_bulanan&nip=340060019&bulan=7&tahun=2021",
        "dataSrc" : "data"
      },
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      dom: 'Bfrtip',
      buttons: ["copy", "csv", "excel", "print"]
    });
  });
</script>
</body>
</html>