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

                $query = "INSERT INTO registredusers (username,email,password)";
                $query .= "VALUES (?,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$username, $email, $password]);
                header("location:login.php");
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
                    // header("location:../welcoming.php");
                    var_dump($_SESSION['loggedUser']);
                } else {
                    header("location:../cms/table.php");
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

// function orders(){
//     global $pdo;

//     $username=$_SESSION['loggedUser']['username'];
//     $userid=$_SESSION['loggedUser']['id'];
   
//     $userpassword=$_SESSION['loggedUser']['password'];
//     $query = "SELECT * FROM orders WHERE user_id = $userid";
//     $stmt = $pdo->prepare($query);
//     $stmt = $pdo->query($query);
    
//     if($stmt->fetchColumn() >1){
//                 $stmt->execute();
//                 $result = $stmt->fetchAll(); 
//                 $id=$result[0]['id'];
//                 print_r($result);
//}      
//   }



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

function getData()
{
    global $pdo;
    $sql = "SELECT * FROM registredusers";
    $select_all_categories = $pdo->query($sql);
    $select_all_categories->execute();


    while ($row = $select_all_categories->fetchAll()) {
        $username = $row;
        foreach ((array) $username as $user) {
            echo "<tr>";
            echo   '<td>' . $user['id'] . '</td>';
            echo   '<td>' . $user['username'] . '</td>';
            echo   '<td>' . $user['email'] . '</td>';
            echo   '<td>' . $user['password'] . '</td>';
            echo   '<td>' . $user['date created'] . '</td>';
            echo   '<td>' . $user['last_login_date'] . '</td>'; ?>
            <form method='post' action='../login-update.php'>
                <?php

                echo '<td>     <button name="update-user" value=' . $user['id'] . ' type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></button></td>';
                ?>
            </form>
            <form method='post'>
                <?php
                echo '<td> <button name="delete-user" value=' . $user['id'] . ' type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></button></td>';
                ?>
            </form>
        <?php
            echo "</tr>";
        }
    }
}

function getProducts()
{
    global $pdo;
    $sql = "SELECT * FROM products";
    $select_all_categories = $pdo->query($sql);
    $select_all_categories->execute();


    while ($row = $select_all_categories->fetchAll()) {
        $username = $row;
        foreach ((array) $username as $user) {
            echo "<tr>";
            echo   '<td>' . $user['id'] . '</td>';
            echo   '<td>' . $user['product_name'] . '</td>';
            echo   '<td>' . $user['product_price'] . '</td>';
            echo   '<td>' . $user['product_description'] . '</td>';
            echo   '<td>' ?>
            <img class="img-responsive" src="../images/<?php echo  $user['product_image']; ?>" alt="">
            <?php
            echo '</td>';
            echo   '<td>' . $user['category_id'] . '</td>';


            echo "<td> <a href='productsAdmin.php?editing={$user['id']}'>Update</td>";
            ?>
            <form method='post'>
                <?php
                echo '<td> <button name="delete-product" value=' . $user['id'] . ' type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></button></td>';
                ?>
            </form>
        <?php
            echo "</tr>";
        }
    }
}


function getCategories()
{
    global $pdo;
    $sql = "SELECT * FROM categories";
    $select_all_categories = $pdo->query($sql);
    $select_all_categories->execute();


    while ($row = $select_all_categories->fetchAll()) {
        $username = $row;
        foreach ((array) $username as $user) {
            echo "<tr>";
            echo   '<td>' . $user['id'] . '</td>';
            echo   '<td>' . $user['category_title'] . '</td>';
            echo "<td> <a href='categoriesAdmin.php?edit={$user['id']}'>Update</td>";
            echo "<td> <a href='categoriesAdmin.php?delete-category={$user['id']}'><i class='zmdi zmdi-delete'></i></td>";



            echo "</tr>";
        }
    }
}


function getComments()
{
    global $pdo;
    $sql = "SELECT * FROM comments";
    $select_all_categories = $pdo->query($sql);
    $select_all_categories->execute();


    while ($row = $select_all_categories->fetchAll()) {
        $username = $row;
        foreach ((array) $username as $user) {
            echo "<tr>";
            echo   '<td>' . $user['id'] . '</td>';
            echo   '<td>' . $user['comments'] . '</td>';
            echo   '<td>' . $user['user_id'] . '</td>';
            echo   '<td>' . $user['product_id'] . '</td>';
            echo "<td> <a href='categoriesAdmin.php?edit={$user['id']}'>Update</td>";
            echo "<td> <a href='commentsAdmin.php?delete-comment={$user['id']}'><i class='zmdi zmdi-delete'></i></td>";



            echo "</tr>";
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
                header("location: ../cms/categoriesAdmin.php");
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
                <label for="product">Update Des</label>
                <input class="form-control" type="text" name="update_product_des">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_product_submit" value="Update">
            </div>
        </form>

<?php
        if (isset($_POST['update_product_submit'])) {
            $update_product_name = $_POST['update_product_name'];
            $update_product_price = $_POST['update_product_price'];
            $update_product_des = $_POST['update_product_des'];

            $query = "UPDATE products SET product_name = '$update_product_name', product_price ='$update_product_price', product_description= '$update_product_des' WHERE id= $product_id  ";


            $stmt = $pdo->prepare($query);
            $stmt = $pdo->query($query);

            if (!$stmt) {
                echo 'failed';
            } else {
                header("location: ../cms/productsAdmin.php");
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
        $product_des = $_POST['product_des'];
        $category_id = $_POST['category_id'];
        $query = "INSERT INTO products (product_name,product_price,product_description,category_id )";
        $query .= "VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$product_name, $product_price, $product_des, $category_id]);
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

function getAddedComment()
{


    if (isset($_POST['add_comment_submit'])) {

        global $pdo;
        $comment = $_POST['new_comment'];
        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];

        $query = "INSERT INTO comments (user_id, comments, product_id) VALUES (?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id, $comment, $product_id]);
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

            header("location: productsAdmin.php");
            // echo '<script type="text/javascript">alert("user deleted")</script>';
        }
    }
}


function getDeletedCategories()
{

    if (isset($_GET['delete-category'])) {
        global $pdo;

        $the_category_id = $_GET['delete-category'];

        $query = "DELETE FROM categories WHERE id='$the_category_id'";
        $stmt = $pdo->prepare($query);
        $stmt = $pdo->query($query);
        if ($stmt) {
            header("location: categoriesAdmin.php");
        }
    }
}

function getDeletedComment()
{

    if (isset($_GET['delete-comment'])) {
        global $pdo;

        $the_comment_id = $_GET['delete-comment'];

        $query = "DELETE FROM comments WHERE id='$the_comment_id'";
        $stmt = $pdo->prepare($query);
        $stmt = $pdo->query($query);
        if ($stmt) {
            header("location: commentsAdmin.php");
        }
    }
}


function addcomments(){
      if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_SESSION['loggedUser'] )){
        global $pdo;
        // echo "<h1>haneen</h1>";
        // var_dump($_SESSION['loggedUser']);

    $message=$_POST['message'];
    $idproduct=$_GET['id'];
    $iduser=$_SESSION['loggedUser']['id'];


    $data="INSERT INTO comments(user_id,comments,product_id) 
      VALUE ('$iduser','$message' ,'$idproduct')";

   $stmt = $pdo->prepare($data);
$stmt->execute();


      }

      else{
        echo '<script type="text/javascript">alert("is not loggin")</script>';

      }
   }
}


?>