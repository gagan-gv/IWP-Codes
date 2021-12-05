<?php
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRAC3 Q3 19BCE0788 Delete</title>
    </head>
    <body>
        <form action="./PRAC3Q3_DELETE.php" method="post">
            <!--<label for="del">Number to be deleted</label>-->
            <table cellpadding="10px">
                <tr>
                    <th>Number to be deleted</th>
                    <th>
                        <select name="del" default="Select">
                            <option value="none" selected disabled hidden>Select a mobinum</option>
                        <?php
                            $x = mysqli_query($con, "SELECT mobinum FROM mobile_details WHERE mobinum LIKE '%567';");
                            $count = mysqli_num_rows($x);

                            while($count > 0){
                                $mob = implode(mysqli_fetch_assoc($x));
                                
                                echo '<option value='.$mob.'>'.$mob.'</option>';
                                $count = $count - 1;
                            }
                        ?>
                        </select>
                    </th>
                </tr>
            </table>
            <input type="submit" value="Delete" name="sub">
        </form>
        <?php
            if(isset($_POST['sub'])){
                $op = $_POST['del'];
                $deleted = mysqli_query($con, "DELETE FROM mobile_details WHERE mobinum = ".$op."");
            }
        ?>
        <br>
        <table border="1" cellpadding="10px">
            <tr>
                <th>Mobinum</th>
                <th>Call Date</th>
                <th>Amt</th>
            </tr>
            <?php
                $x = mysqli_query($con, "SELECT mobinum FROM mobile_details WHERE mobinum LIKE '%567';");
                $count = mysqli_num_rows($x);

                if($count > 0){
                    while($count > 0){
                        $mob = implode(mysqli_fetch_assoc($x));
                        $date = mysqli_query($con, "SELECT calldate FROM mobile_details where mobinum = ".$mob.";");
                        $date = implode(mysqli_fetch_assoc($date));
                        $amount = mysqli_query($con, "SELECT amount FROM mobile_details where mobinum = ".$mob.";");
                        $amount = implode(mysqli_fetch_assoc($amount));
    
                        echo '<tr>
                        <td>'.$mob.'</td>
                        <td>'.$date.'</td>
                        <td>'.$amount.'</td>';
    
                        $count = $count - 1;
                    }
                }
            ?>
        </table>
        <br>
        <a href="./PRAC3Q3_INSERT.php"><button>Insert Data</button></a>
    </body>
</html>