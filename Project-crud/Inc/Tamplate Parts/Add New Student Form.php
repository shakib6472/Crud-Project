<div class="container">
        <div class="row justify-content-center align-content-center ">
            <div class="col formbox">
                <h3 class=" p-4 text-center">Add a new student</h3>
                <div class="form">
                <form action="?nav=new" method="POST">
                    <label for="name">Enter Your Full name:</label> <br>
                    <input type="text" name="fullname" placeholder="E.g Shakib Shown" value="<?php echo $name; ?>"> <br>
                    <?php if ($error == 1) { ?>
                        <div class="bg-red p-2 ">
                            <h6 class=" text-left wrong">Please change the name, We already have a "<?php echo $name; ?>"" in our Record</h6>
                        </div> <?php

                            } ?>
                    <label for="number">Enter Your age:</label> <br>
                    <input type="number" name="age" placeholder="E.g 24" value="<?php echo $age; ?>"> <br>
                    <label for="address">Enter Your Address:</label> <br>
                    <input type="text" name="address" placeholder="E.g Jamalpur, Mymensing" value="<?php echo $address; ?>"> <br>
                    <div class="text-center">
                    <input type="submit" value="Submit" name="submit">
                    </div>
                    
                </form>   
                </div>
            </div>
        </div>
    </div>
