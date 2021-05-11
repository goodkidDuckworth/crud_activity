<?php include('server.php');

    var_dump($_GET);
    //fetches the value to be updated
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $val = mysqli_query($db, "SELECT * FROM product WHERE id=$id");
        $value = mysqli_fetch_array($val);
        $name = $value['name'];
        $company = $value['company'];
        $stock = $value['stock'];
        $oPrice = $value['oPrice'];
        $rPrice = $value['rPrice'];
        $id = $value['id'];
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud</title>
</head>

<body>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="message">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>manufacturer</th>
                <th>quantity</th>
                <th>original price</th>
                <th>retail price</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($results)){ ?>
            <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['company']?></td>
            <td><?php echo $row['stock']?></td>
            <td><?php echo $row['oPrice']?></td>
            <td><?php echo $row['rPrice']?></td>
            <td>
                <a class="edit_btn" href="index.php?edit=<?php echo $row['id'] ?>">Edit</a>
            </td>
            <td>
                <a class="del_btn" href="server.php?del=<?php echo $row['id'] ?>">Delete</a>
            </td>
            
            </tr>
            
        <?php } ?>
        </tbody>
    </table>

    <form method="post" action="server.php" >
    <input type="text" name="id", value="<?php echo $id;  ?>" hidden>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>manufacturer</label>
			<input type="text" name="company" value="<?php echo $company; ?>">
		</div>
		<div class="input-group">
			<label>quantity</label>
			<input type="number" name="stock" value="<?php echo $stock; ?>">
		</div>
		<div class="input-group">
			<label>original price</label>
			<input type="float" name="oPrice" value="<?php echo $oPrice; ?>">
		</div>
		<div class="input-group">
			<label>retail price</label>
			<input type="float" name="rPrice" value="<?php echo $rPrice; ?>">
		</div>
		<div class="input-group">
            <?php if($update == false): ?>
                <button class="btn" type="submit" name="save" >Save</button>
            <?php else: ?>
                <button class="btn" type="submit" name="update" >update</button>
            <?php endif ?>
		</div>
	</form>

</body>

</html>