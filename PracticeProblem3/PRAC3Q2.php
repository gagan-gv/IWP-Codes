<?php
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['mail'];
    $pieces = $_POST['pieces'];
    $fruit = $_POST['fruit'];

    echo '<div style="border:5px solid #000; width: max-content; margin: 0 auto; font-weight: 600">
        <p align="center" style="padding: 5px 100px">Thank you for the survey</p>
        <hr/>
        <p>Name: '.$name.'</p>
        <p>Email: '.$email.'</p>
        <p>No. of fruits per day: '.$pieces.'</p>
        <p>Favorite Fruit: '.$fruit.'</p>
    </div>';
?>