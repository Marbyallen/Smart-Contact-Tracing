<?php 
$qrcode_display = $user_data['QRcode'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
      <h1>QRcode content</h1>
      <div class="text-center">
            
            <!-- Get a Placeholder image initially,
            this will change according to the
            data entered later -->
            <img src="<?php echo $qrcode_display?>" class="qr-code img-thumbnail img-responsive" />
          </div>


    </body>
</html>