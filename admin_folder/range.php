<?php
    require'db_connect.php';
    if(ISSET($_POST['search'])){
        $date1 = date("Y-m-d", strtotime($_POST['date1']));
        $date2 = date("Y-m-d", strtotime($_POST['date2']));
        $query=mysqli_query($conn, "SELECT * FROM `usersAndStations_table` WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
        $row=mysqli_num_rows($query);
        if($row>0){
            while($fetch=mysqli_fetch_array($query)){
?>
    <tr>
        <td><?php echo $fetch['QRcode']?></td>
        <td><?php echo $fetch['firstname']?></td>
        <td><?php echo $fetch['lastname']?></td>
        <td><?php echo $fetch['contactno']?></td>
        <td><?php echo $fetch['email']?></td>
        <td><?php echo $fetch['station']?></td>
        <td><?php echo $fetch['facialimg']?></td>
        <td><?php echo $fetch['date']?></td>
        <td><?php echo $fetch['time']?></td>
        <td><?php echo $fetch['bodyheat_temp']?></td>
    </tr>
<?php
            }
        }else{
            echo'
            <tr>
                <td colspan = "4"><center>Record Not Found</center></td>
            </tr>';
        }
    }else{
        $query=mysqli_query($conn, "SELECT * FROM `usersAndStations_table`") or die(mysqli_error());
        while($fetch=mysqli_fetch_array($query)){
?>
    <tr>
    <td><?php echo $fetch['QRcode']?></td>
        <td><?php echo $fetch['firstname']?></td>
        <td><?php echo $fetch['lastname']?></td>
        <td><?php echo $fetch['contactno']?></td>
        <td><?php echo $fetch['email']?></td>
        <td><?php echo $fetch['station']?></td>
        <td><?php echo $fetch['facialimg']?></td>
        <td><?php echo $fetch['date']?></td>
        <td><?php echo $fetch['time']?></td>
        <td><?php echo $fetch['bodyheat_temp']?></td>
    </tr>
<?php
        }
    }
?>