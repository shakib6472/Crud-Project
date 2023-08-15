<?php 
    require_once("Inc/Files/functions.php");
    require_once("Inc/Files/variables.php");
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inc/Files/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Project Crud</title>
</head>
<body>
    <Header>
        <?php include_once("Inc/Tamplate Parts/Header.php"); ?>
    </Header>  
    <section>
        <h4 class=" text-center " ><?php echo $info; ?></h4>
        <?php if('database' == $nav && 'edit' !== $action){
            geanrateReport();
        } 
        if('new' == $nav){
           include_once("Inc/Tamplate Parts/Add New Student Form.php");
} ?>
        <?php if('edit' == $action && $updateForm == "visible"){
           include_once("Inc/Tamplate Parts/Edit Student.php");
} ?>

    </section>
    <script src="Inc/Files/JS/script.js"></script>
</body>
</html>