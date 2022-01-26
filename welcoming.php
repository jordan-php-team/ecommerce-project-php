<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php

    function destroy()
    {
        
        $_SESSION['loggedUser'] = "";
    }

    ?>
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1> Welcome <span class="text-warning"><?php if($_SESSION['loggedUser']!=""){ print_r(ucfirst($_SESSION['loggedUser']['username']));}else{ echo "There";}?></span></h1>
                    <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">

                            <div class="col-12 justify-content-center d-flex ">
                                <a class="btn btn-block btn-lg btn-primary m-2" href='cms/register.php'>Register</a>
                                <a class="btn btn-block btn-lg btn-primary m-2" href='cms/signin.php'>Login</a>
                                <a class="btn btn-block btn-lg btn-primary m-2" href='cms/signin.php' name="logout" onclick="<?php destroy() ?>">Logout</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>