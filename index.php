<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presensi Mitra Pengolahan C2</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .bg-image {
      /* The image used */
      background-image: url("bg.jpg");

      /* Add the blur effect */
      filter: blur(8px);
      -webkit-filter: blur(8px);

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    /* Position text in the middle of the page/image */
    .bg-text {
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.65);
      /* Black w/opacity/see-through */
      color: white;
      font-weight: bold;
      border: 3px solid #f1f1f1;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
      width: 45%;
      height: 70%;
      padding: 30px;
      text-align: center;
    }

    .pesan-berhasil {
      height: 70px;
    }

    #time {
      height: 30px;
    }

    ::-webkit-input-placeholder {
      color: red;
      text-align: center;
    }

    :-moz-placeholder {
      /* Firefox 18- */
      color: red;
      text-align: center;
    }

    ::-moz-placeholder {
      /* Firefox 19+ */
      color: red;
      text-align: center;
    }

    :-ms-input-placeholder {
      color: red;
      text-align: center;
    }

    #submit {
      visibility: hidden;
    }

    /* #barcode {
      visibility: hidden;
    } */

    hr.line {
      border: 0.75px solid white;
    }

    .ui-hidden-accessible {
      position: absolute !important;
      height: 1px;
      width: 1px;
      overflow: hidden;
      clip: rect(1px,1px,1px,1px);
    }
  </style>
</head>

<body>

  <div class="bg-image"></div>

  <div class="bg-text">
    <div class="pesan-berhasil">
      <?php

      date_default_timezone_set('Asia/Singapore');

      if (isset($_POST['submit'])) {
        $barcode = $_POST['barcode'];
        $waktu = date("H:i:s");
        
        $sql = "SELECT `email` FROM mitra WHERE nama=?";
        $conn = new mysqli("localhost", "u8152743_ipd", "ipd@6400", "u8152743_presensi_c2");
        
        $stmt1 = $conn->prepare($sql); 
        $stmt1->bind_param("s", $barcode);
        $stmt1->execute();
        $stmt1->store_result();
        
        if ($stmt1->num_rows == 0) {
          echo '<div class="alert alert-danger" role="alert">
                          <strong>Gagal!</strong> Gagal Melakukan Absensi
                        </div>';
        } else {
          $newconn = new mysqli("localhost", "u8152743_ipd", "ipd@6400", "u8152743_presensi_c2");
          // Check connection
          if ($newconn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $stmt = $newconn->prepare("INSERT INTO record(`email`,nama,`date`,`time`) VALUES (?,?,NOW(),?)");

          $stmt1->bind_result($email);
          $stmt1->fetch();
          
          $stmt->bind_param("sss", $email, $barcode, $waktu);
          if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">
                    <strong>Sukses!</strong> ' . $barcode . ' Berhasil Melakukan Absensi
                  </div>';
          } else {
            echo "ERROR: Could not able to execute query. " . mysqli_error($newconn);
            header("location: index.php");
          }
        }
      }

      ?>
    </div>

    <center>
      <h2>Presensi Mitra Pengolahan C2 <br> BPS Provinsi Kalimantan Timur</h2>
    </center>
    <hr class="line"><br><br>
    <!-- <h3 style="font-size:50px">Current Time</h3> -->
    <div id="date"></div>
    <div id="time"></div><br>
    <form action="index.php" method="POST" id="myForm" autocomplete="off">
      <div>
        <br>
      </div>
      <div class="form-group">
        <input type="text" class="form-control ui-hidden-accessible" id="barcode" name="barcode" placeholder="Scan QRCODE untuk melakukan absensi" autofocus>
      </div>
      <div>
        <input type="submit" class="btn btn-success" name="submit" id="submit">
      </div>
    </form>
    <br>

    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 3000);
    </script>
  </div>

  <script>
    var timer = setInterval(myTimer, 1000);

    // get date now
    var d = new Date();
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
    document.getElementById("date").innerHTML = "<h5>" + days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()] + " " + d.getFullYear() + "</h5>";

    // get time now 
    function myTimer() {
      var d = new Date();
      var options = {
        hour12: false
      };
      document.getElementById("time").innerHTML = d.toLocaleTimeString('en-US', options) + " WITA";
    }
  </script>

  <script>
    $(document).ready(function() {
      $(window).keydown(function(event) {
        if (event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });

      $('#barcode').keyup(function() {
          $('#submit').click()
      });
    });
  </script>
</body>

</html>