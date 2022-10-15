<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Contact List</h1>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th width="5%">#ID</th>
                <th width="10%">fullname</th>
                <th width="10%">Email</th>
                <th width="5%">Feedback</th>

            </tr>

            <?php
            //Get all the orders from database
            $sql = "SELECT * FROM tbl_contact ORDER BY contact_id  DESC"; // DIsplay the Latest Order at First
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the Rows
            $count = mysqli_num_rows($res);

            $sn = 1; //Create a Serial Number and set its initail value as 1

            if ($count > 0) {
                //Order Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get all the order details
                    $contact_id = $row['contact_id'];
                    $fullname = $row['fullname'];
                    $email = $row['email'];
                    $feedback = $row['feedback'];


            ?>

                    <tr>
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $feedback; ?></td>


                    </tr>

            <?php

                }
            } else {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
            }
            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>