<?php
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRAC3 Q3 19BCE0788 INSERT</title>
    </head>
    <body>
        <form method="post" action="./PRAC3Q3_INSERT.php">
            <table cellpadding="10px">
                <tr>
                    <td>Enter mobile number:</td>
                    <td><input type="number" id="mobinum" name="mobinum"></td>
                </tr>
                <tr>
                    <td>Enter amount cost:</td>
                    <td><input type="number" id="amt" name="amt"></td>
                </tr>
            </table>
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $mobinum = $_POST['mobinum'];
                $amt = $_POST['amt'];

                $sql = mysqli_query($con, "INSERT INTO mobile_details(`mobinum`, `amount`) VALUES(".$mobinum.", ".$amt.")");
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
        <a href="./PRAC3Q3_DELETE.php"><button>Delete Data</button></a>
    </body>
</html>