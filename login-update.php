<?php
include "db.php";
?>
<?php include "functions.php"; ?>

<?php

updateUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class='container'>
        <div class="col-sm-6">
            <h1 class="text-center">Update</h1>

            <form action="login-update.php" method='post'>
                <div class="form-group">

                    <label for='username'>username</label>
                    <input type="text" class="form-control" name='username'>
                </div>
                <div class="form-group">
                    <label for='password'>password</label>
                    <input type="password" class="form-control" name='password'>
                </div>
                <div class="form-group">
                    <select name="id" id="">
                        <?php
                        read();
                        ?>
                    </select>

                </div>
                <input type="submit" class="btn btn-primary" value='UPDATE' name='submit'>

            </form>
        </div>
    </div>

</body>

</html>