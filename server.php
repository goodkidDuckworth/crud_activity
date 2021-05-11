<?php 

var_dump($_POST);
    session_start();
    //db connection
    $db = mysqli_connect('localhost', 'root', '', 'crud');

    //initializing variables
    $name = "";
    $company = "";
    $stock = "";
    $oPrice = "";
    $rPrice = "";
    $id = 0;
    $update = false;

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $company = $_POST['company'];
        $stock = $_POST['stock'];
        $oPrice = $_POST['oPrice'];
        $rPrice = $_POST['rPrice'];

        mysqli_query($db, "INSERT INTO product (name, company, stock, oPrice, rPrice) VALUES ('$name', '$company', '$stock', '$oPrice', '$rPrice')");
        $_SESSION['message'] = "product saved";
        //redirects to index page after insertion
        header('location: index.php');

    }

    //update values
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $company = $_POST['company'];
        $stock = $_POST['stock'];
        $oPrice = $_POST['oPrice'];
        $rPrice = $_POST['rPrice'];
        $id = $_POST['id'];

        // $data = array(
        //     'name' => $_POST['name'],
        //     'company' => $_POST['company'],
        //     'stock' => $_POST['stock'],
        //     'oPrice' => $_POST['oPrice'],
        //     'rPrice' => $_POST['rPrice'],
        //     'id' => $_POST['id'],
        // );

     
        mysqli_query($db, "UPDATE product SET name = '$name', company = '$company', stock = '$stock', oPrice = '$oPrice', rPrice = '$rPrice' WHERE id = $id ");
        $_SESSION['message'] = "product updated";
        // header('location: index.php');
    
    }

    //deletes values
    if(isset($_GET['del'])){
        $id = $_GET['del'];

        mysqli_query($db, "DELETE FROM product WHERE id=$id" );
        $_SESSION['message'] = "product deleted";
        header('location: index.php');

    }




    //retrieves value
    $results = mysqli_query($db, "SELECT * FROM product");


?>