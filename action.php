
<?php
include('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $runlogin = mysqli_query($con, $login);

    if ($runlogin) {

        $num_rows = mysqli_num_rows($runlogin);

        if ($num_rows > 0) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['sucessmessages'][] = "Login Sucessfully!";
            header('Location: dashboard.php');
        } else {
            $_SESSION['errormessages'][] = "Login Failed.Try Again!";
            header('Location: index.php');
        }
    } else {
        $_SESSION['errormessages'][] = "server error";
        header('Location: index.php');
    }
    mysqli_close($con);
}

if (isset($_POST['addAI'])) {
    $amount = $_POST['amount'];
    $source = $_POST['source'];
    $date = $_POST['date'];

    $addai = "INSERT INTO invested_amount (amount, source, date) VALUES ('$amount', '$source', '$date')";
    $runaddai = mysqli_query($con, $addai);
    if ($runaddai) {
        $_SESSION['sucessmessages'][] = "Data have been added successfully";
        header('Location: list.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occured while adding data.Try Again!";
        header('Location: addAI.php');
    }
    mysqli_close($con);
}

if (isset($_POST['updateAI'])) {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $source = $_POST['source'];
    $date = $_POST['date'];

    $updateai = "UPDATE invested_amount SET amount='$amount', source='$source', date='$date' WHERE id='$id'";
    $runupdateai = mysqli_query($con, $updateai);
    if ($runupdateai) {
        $_SESSION['sucessmessages'][] = "Data has been updated successfully";
        header('Location: list.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating data. Try Again!";
        header('Location: editAI.php');
    }
    mysqli_close($con);
}

if (isset($_POST['addparts'])) {
    $name = $_POST['name'];
    $size = $_POST['size'];


    $addparts = "INSERT INTO parts (name, size) VALUES ('$name', '$size')";
    $runaddparts = mysqli_query($con, $addparts);
    if ($runaddparts) {
        $_SESSION['sucessmessages'][] = "Size have been added successfully";
        header('Location: listParts.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occured while adding size.Try Again!";
        header('Location: addParts.php');
    }
    mysqli_close($con);
}
if (isset($_POST['updateparts'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $size = $_POST['size'];


    $updateparts = "UPDATE parts SET name='$name', size='$size' WHERE id='$id'";
    $runupdateparts = mysqli_query($con, $updateparts);
    if ($runupdateparts) {
        $_SESSION['sucessmessages'][] = "Size has been updated successfully";
        header('Location: listParts.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating size. Try Again!";
        header('Location: editParts.php');
    }
    mysqli_close($con);
}


if (isset($_POST['addvendor'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $specialist = $_POST['specialist'];


    $addvendor = "INSERT INTO vendor (name, address,phone,specialist) VALUES ('$name', '$address' ,'$phone','$specialist')";
    $runaddvendor = mysqli_query($con, $addvendor);
    if ($runaddvendor) {
        $_SESSION['sucessmessages'][] = "Vendor have been added successfully";
        header('Location: listVendor.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occured while adding vendor.Try Again!";
        header('Location: addVendor.php');
    }
    mysqli_close($con);
}
if (isset($_POST['updatevendor'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $specialist = $_POST['specialist'];


    $updateparts = "UPDATE vendor SET name='$name', address='$address' , phone='$phone', specialist='$specialist' WHERE id='$id'";
    $runupdateparts = mysqli_query($con, $updateparts);

    if ($runupdateparts) {
        $_SESSION['sucessmessages'][] = "Vendor has been updated successfully";
        header('Location: listVendor.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating vendor. Try Again!";
        header('Location: editvendor.php');
    }
    mysqli_close($con);
}

if (isset($_POST['addpurchase'])) {
    $part_id = $_POST['part_id'];
    $vendor_id = $_POST['vendor_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $date = $_POST['date'];

    $insertPurchase = "INSERT INTO purchase (part_id, vendor_id, qty, price, date) 
                       VALUES ('$part_id', '$vendor_id', '$qty', '$price', '$date')";
    $runInsertPurchase = mysqli_query($con, $insertPurchase);
    $insertPurchasestock = "INSERT INTO stock (part_id, Type) 
    VALUES ('$part_id', 'purchase')";
    $runInsertPurchasestock = mysqli_query($con, $insertPurchasestock);

    if ($runInsertPurchase && $runInsertPurchasestock) {
        $_SESSION['sucessmessages'][] = "Purchase has been added successfully";
        header('Location: listPurchase.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while adding purchase. Try Again!";
        header('Location: addPurchase.php');
    }

    mysqli_close($con);
}

if (isset($_POST['updatepurchase'])) {
    $id = $_POST['id'];
    $part_id = $_POST['part_id'];
    $vendor_id = $_POST['vendor_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $date = $_POST['date'];


    $updatePurchase = "UPDATE purchase 
                       SET part_id='$part_id', vendor_id='$vendor_id', qty='$qty', price='$price', date='$date' 
                       WHERE id='$id'";
    $runUpdatePurchase = mysqli_query($con, $updatePurchase);

    if ($runUpdatePurchase) {

        $_SESSION['sucessmessages'][] = "Purchase details updated successfully";
        header('Location: listPurchase.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating purchase details. Try Again!";
        header('Location: editPurchase.php');
    }

    mysqli_close($con);
}

if (isset($_POST['addclient'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $GST = $_POST['GST'];


    $insertclient = "INSERT INTO client (name, address, phone, GST) 
                       VALUES ('$name', '$address', '$phone', '$GST')";
    $runInsertinsertclient = mysqli_query($con, $insertclient);

    if ($runInsertinsertclient) {
        $_SESSION['sucessmessages'][] = "client has been added successfully";
        header('Location: listclient.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while adding client. Try Again!";
        header('Location: addclient.php');
    }

    mysqli_close($con);
}
if (isset($_POST['updateclient'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $GST = $_POST['GST'];



    $updateclient = "UPDATE client 
                       SET name='$name', address='$address', phone='$phone', GST='$GST' 
                       WHERE id='$id'";
    $runUpdateclient = mysqli_query($con, $updateclient);

    if ($runUpdateclient) {

        $_SESSION['sucessmessages'][] = "client details updated successfully";
        header('Location: listclient.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating client details. Try Again!";
        header('Location: editclient.php');
    }

    mysqli_close($con);
}
if (isset($_POST['addorders'])) {
    $part_id = $_POST['part_id'];
    $qty = $_POST['qty'];
    $date = $_POST['date'];

    $insertorders = "INSERT INTO orders (part_id, qty, date)  VALUES ('$part_id', '$qty', '$date')";
    $runInsertorders = mysqli_query($con, $insertorders);

    $insertordersstock = "INSERT INTO stock (part_id, Type) VALUES ('$part_id', 'sale')";
    
    $runInsertordersstock = mysqli_query($con, $insertordersstock);

    if ($runInsertorders && $runInsertordersstock) {
        $_SESSION['sucessmessages'][] = "orders has been added successfully";
        header('Location: listorders.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while adding orders. Try Again!";
        header('Location: addorders.php');
    }

    mysqli_close($con);
}
if (isset($_POST['updateorders'])) {
    $id = $_POST['id'];
    $part_id = $_POST['part_id'];
    $qty = $_POST['qty'];
    $date = $_POST['date'];


    $updateorders = "UPDATE orders 
                       SET part_id='$part_id', qty='$qty', date='$date' 
                       WHERE id='$id'";
    $runUpdateorders = mysqli_query($con, $updateorders);

    if ($runUpdateorders) {

        $_SESSION['sucessmessages'][] = "orders details updated successfully";
        header('Location: listorders.php');
    } else {
        $_SESSION['errormessages'][] = "ERROR occurred while updating orders details. Try Again!";
        header('Location: editorders.php');
    }

    mysqli_close($con);
}
?>