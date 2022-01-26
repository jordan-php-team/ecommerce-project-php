<?php
ob_start();
include_once "db.php";
?>
<?php


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



function getUsers()
{
    if (isset($_POST['submit'])) {
        global $pdo;

        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $repeatPass = test_input($_POST['repeatPass']);

        $usernamePattern = " /^[A-Za-z]{3,13}$/";
        $emailRegex = "/^[^ ]+@[^ ]+\.[a-z]{2,3}$/";

        if (preg_match($usernamePattern, $username) && preg_match($emailRegex, $email) && strlen($password) >= 8 && $password == $repeatPass) {

            $sql = "SELECT email FROM registredusers WHERE email='$email'";
            $stmt = $pdo->prepare($sql);
            $stmt = $pdo->query($sql);
            if ($stmt->fetchColumn() > 0) {

                echo '<script type="text/javascript">alert("email exist")</script>';
            } else {

                $query = "INSERT INTO registredusers (username,email,password,repeatPass)";
                $query .= "VALUES (?,? ,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$username, $email, $password, $repeatPass]);
                header("location:signin.php");
            }
        } else {
            echo '<script type="text/javascript">alert("please check your information")</script>';
        }
    }
}





function loggedUsers()
{

    if (isset($_POST['submit'])) {
        global $pdo;

        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $emailRegex = "/^[^ ]+@[^ ]+\.[a-z]{2,3}$/";
        if (preg_match($emailRegex, $email)) {

            $query = "SELECT * FROM registredusers WHERE (email = '$email') AND (password = '$password')  ";
            $stmt = $pdo->prepare($query);
            $stmt = $pdo->query($query); //we run it

            if ($stmt->fetchColumn() > 0) {
                $stmt->execute();
                $result = $stmt->fetchAll(); //we set the default behavior in db file (fetch mode) ,also you use fetch without all
                $isAdmin = $result[0]['is_admin'];


                if (!$isAdmin) {
                    $id = $result[0]['id'];

                    $date = date('Y-m-d');
                    $time = date("H:i:s", time());
                    $lastLogin = "$date, $time";

                    $query = "UPDATE registredusers SET last_login_date='$lastLogin' WHERE id='$id' ";

                    $stmt = $pdo->prepare($query);
                    $stmt = $pdo->query($query);

                    $_SESSION['loggedUser'] = $result[0]; //if you use only fetch ,there is non need for '[0]' anymore
                    header("location:../welcoming.php");
                } else {
                    header("location:table.php");
                }
            } else {
                echo '<script type="text/javascript">alert("incorrect email or password")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("please check your information")</script>';
        }
    }
}




function read()
{
    global $pdo;
    $query = "SELECT * FROM registredusers";
    $stmt = $pdo->prepare($query);
    $stmt = $pdo->query($query);
    if (!$stmt) {
        die('failed'); //stop every thing
    }
    while ($row = $stmt->fetch()) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option> ";
    }
}



function updateUser()
{

    if (isset($_POST['submit'])) {
        global $pdo;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];

        $query = "UPDATE registredusers SET username = '$username' , password = '$password' WHERE id= $id  ";

        $stmt = $pdo->prepare($query);
        $stmt = $pdo->query($query);

        if (!$stmt) {
            echo 'failed';
        } else {
            header("location:../mysql/cms/table.php");
        }
    }
}




function deleteUser()
{


    if (isset($_POST['delete-user'])) {
        global $pdo;
        $id = $_POST['delete-user'];
        $query = "DELETE FROM registredusers WHERE id='$id'"; //make sure to put space
        $stmt = $pdo->prepare($query);
        $stmt = $pdo->query($query);

        if ($stmt) {
            echo 'deklkl';
            // echo '<script type="text/javascript">alert("user deleted")</script>';
        }
    }
}



function getUpdateCategory()
{

    if (isset($_GET['edit'])) {

        global $pdo;

        $category_id = $_GET['edit']; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="category_title">Update</label>
                <input class="form-control" type="text" name="update_category_title">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_submit" value="Update">
            </div>
        </form>

        <?php
        if (isset($_POST['update_submit'])) {
            $update_category_title = $_POST['update_category_title'];

            $query = "UPDATE categories SET category_title = '$update_category_title'  WHERE id= $category_id  ";


            $stmt = $pdo->prepare($query);
            $stmt = $pdo->query($query);

            if (!$stmt) {
                echo 'failed';
            } else {
                header("location: ../cms/table.php");
            }
        }
    }
}


function getUpdatedProduct()
{

    if (isset($_GET['editing'])) {
        global $pdo;


        $product_id = $_GET['editing']; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="product">Update Name</label>
                <input class="form-control" type="text" name="update_product_name">
            </div>
            <div class="form-group">
                <label for="product">Update Price</label>
                <input class="form-control" type="text" name="update_product_price">
            </div>
            <div class="form-group">
                <label for="product">Update Brand</label>
                <input class="form-control" type="text" name="update_product_brand">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_product_submit" value="Update">
            </div>
        </form>

<?php
        if (isset($_POST['update_product_submit'])) {
            $update_product_name = $_POST['update_product_name'];
            $update_product_price = $_POST['update_product_price'];
            $update_product_brand = $_POST['update_product_brand'];

            $query = "UPDATE products SET product_name = '$update_product_name', product_price ='$update_product_price', product_brand= '$update_product_brand' WHERE id= $product_id  ";


            $stmt = $pdo->prepare($query);
            $stmt = $pdo->query($query);

            if (!$stmt) {
                echo 'failed';
            } else {
                header("location: ../cms/table.php");
            }
        }
    }
}


function getAddedProduct()
{


    if (isset($_POST['add_product_submit'])) {
        global $pdo;


        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_brand = $_POST['product_brand'];
        $category_id = $_POST['category_id'];
        $query = "INSERT INTO products (product_name,product_price,product_brand,category_id )";
        $query .= "VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_name, $product_price, $product_brand, $category_id]);
    }
}



function getAddedCategory()
{


    if (isset($_POST['add_category_submit'])) {

        global $pdo;
        $category_title = $_POST['category_title'];

        $query = "INSERT INTO categories (category_title)";
        $query .= "VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$category_title]);
    }
}


function getDeletedProduct()
{

    if (isset($_POST['delete-product'])) {
        global $pdo;

        $the_product_id = $_POST['delete-product'];
        print_r($the_product_id);
        $query = "DELETE FROM products WHERE id='$the_product_id'";
        $stmt = $pdo->prepare($query);
        $stmt = $pdo->query($query);

        if ($stmt) {

            header("location: table.php");
            // echo '<script type="text/javascript">alert("user deleted")</script>';
        }
    }
}


?>