<?php include('partials-front/menu.php'); ?>

<!-- Contact us MEnu Section Starts Here -->
<section class="contact us-menu">
    <div class="container">
        <h2 class="text-center">Contact us </h2>

        <form action="" method="POST">

            <label for="fname"> Full Name:</label><br>

            <input type="text" id="fullname" name="fullname" value="Abdur rahman"><br><br>

            <label for="email">Email:</label><br>

            <input type="email" id="email" name="email" value="akaid@gmail.com"> <br><br>

            <label for="feedback">Your feedback :</label><br>
            <textarea id="feedback" name="feedback" rows="8" cols="30"> Your feedback </textarea> <br>

            <input type="submit" name="submit" value="submit" class="btn btn-primary">

        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Get all the details from the form
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];


            $sql2 = "INSERT INTO tbl_contact SET fullname = '$fullname', email = '$email', feedback = '$feedback' ";
            $res2 = mysqli_query($conn, $sql2);

            //Check whether query executed successfully or not
            if ($res2 == true) {
                //Query Executed and Contact Saved
                $_SESSION['contact'] = "<div class='success text-center'>Conact us Successfully.</div>";
                header('location:' . SITEURL);
            } else {
                //Failed to Save Contact
                $_SESSION['contact'] = "<div class='error text-center'>Failed to Contact Us.</div>";
                header('location:' . SITEURL);
            }
        }
        ?>

        <div class="clearfix"></div>

    </div>




</section>
<!-- Contact us Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>