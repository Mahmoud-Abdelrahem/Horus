<?php
include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';

$picupLocation = $_SESSION['bus']['pickup'];
$destination = $_SESSION['bus']['destination'];

$select = "SELECT * FROM directions where pickup = '$picupLocation' and destination = '$destination'";
$s = mysqli_query($conn, $select);







?>


<div class="container p-70">
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-light table-bordered">
                <tr>
                    <th>id</th>
                    <th>pickup</th>
                    <th>pcikup Arabic</th>
                    <th>destination</th>
                    <th>destination Arabic</th>
                    <th>salary</th>
                    <th>bus Number</th>
                    <th>strat Time</th>



                </tr>

                <?php foreach ($s as $data) : ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['pickup'] ?></td>
                        <td><?= $data['pickup_ar'] ?></td>
                        <td><?= $data['destination'] ?></td>
                        <td><?= $data['destination_ar'] ?></td>
                        <td><?= $data['salary'] ?></td>
                        <td><?= $data['bus_number'] ?></td>
                        <td><?= $data['start_time'] ?></td>





                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>



<?php

include 'shared/script.php';
?>