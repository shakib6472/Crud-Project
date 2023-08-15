<div class="container">
    <div class="row justify-content-center align-content-center ">
        <div class="col formbox">
            <h3 class=" p-4 text-center">Update The Student</h3>
            <div class="form">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $student["id"];  ?>">
                    <label for="name">Enter Your Full name:</label> <br>
                    <input type="text" name="fullname" placeholder="E.g Shakib Shown" value="<?php if ($error == 1 || $error == 2 ) { 
                        echo $_POST["fullname"];
                    } else {
                        echo  $student["name"]; }?>"> <br>


                    <?php if ($error == 1) { ?>
                        <div class="bg-red p-2 ">
                            <h6 class=" text-left wrong">Please change the name, We already have a "<?php echo $_POST["fullname"]; ?> </h6> </div> <?php
                    } else if ($error == 2) { ?>
                        <div class="bg-red p-2 ">
                            <h6 class=" text-left wrong">Your Name is already "<?php  echo $_POST["fullname"]; ?></h6> </div> <?php

                            } ?>
                    <label for="number">Enter Your age:</label> <br>
                    <input type="number" name="age" placeholder="E.g 24" value="<?php echo  $student["age"]; ?>"> <br>
                    <label for="address">Enter Your Address:</label> <br>
                    <input type="text" name="address" placeholder="E.g Jamalpur, Mymensing" value="<?php echo  $student["address"]; ?>"> <br>
                    <div class="text-center">
                        <input type="submit" value="Update" name="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>