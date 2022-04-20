<?php
	session_start();
    include('function.php');
    include('connection.php');
    $user_data = check_login($con);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="qrcode.css">
      <title>QR Code</title>
</head>
<header>
<nav class="nav">
    <div class="logo"><a href="index.php">Tracing <span>Connections</span></a></div>
    <ul class="nav_link">
    </ul>
    <div class="nav_button">
    </div>
</nav>
</header>
<body>
      <div class="wrapper">
        <div class="inside">
          <div class="myqrcode">
            PERSONAL QR CODE
          </div>
          <div class="container-fluid">
            <div class="text-center">
              <a href="<?php echo qrdisplay($_SESSION['QRcode']);?>">
                <img src="<?php echo qrdisplay($_SESSION['QRcode']);?>" class="qr-code img-thumbnail img-responsive" />
              </a>
             </div>
            <!-- <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2"
                  for="content">
                </label>
                <div class="col-sm-10">
          
                  <input type="text" size="60" id="content" placeholder="Enter content" />
                </div>
              </div>
              <div class="form-group">
                <div id="col-button">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-default" id="generate">
                    GENERATE
                  </button> -->
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="sidebar">
        <ul>
            <li><button><a href="dashboard.php">DASHBOARD</a></button></li>
            <li><button><a href="profile.php">PROFILE</a> </button></li>
            <li><button><a href="qrcode.php">QR CODE</a></button></li>
            <li><button><a href="mylogs.php">MY LOGS</a></button></li>
        </ul>
    </div>
    <div class="sidebar_bottom">
        <ul>
            <li><button><a href="logout.php" >LOG OUT</a></button></li>
        </ul>
    </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js">
  </script>
  
  <script>
    function htmlEncode(value) {
      return $('<div/>').text(value)
        .html();
    }
  
    $(function () {
  
      $('#generate').click(function () {
  
        // Generate the link that would be
        // used to generate the QR Code
        // with the given data 
        var string1 = 'user registered: '
        let finalURL ='https://chart.googleapis.com/chart?cht=qr&chl='+htmlEncode($('#content').val()) +'&chs=160x160&chld=L|0'
        $('.qr-code').attr('src', finalURL);
        let var1 = htmlEncode($('#content').val());
        console.log(finalURL);
        console.log('#content');
      });
    });
    
  </script>
</body>

</html>