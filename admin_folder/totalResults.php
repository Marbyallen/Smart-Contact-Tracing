<?php
$total = $row[0];
$messageString = 'results found:" . $total';
echo '<script type ="text/JavaScript">  
        function searchFunction(){

            var popupMessage="<?php echo $messageString; ?>";
            alert(popupMessage);
        </script>'; 
?>