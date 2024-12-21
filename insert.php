<?php
$conn =mysqli_connect('localhost', 'root', '', 'industry');

if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $conn->query("call manu_add('$name', '$address', '$contact')");
}

if(isset($_POST['addBtn'])){
    $name = $_POST['bname'];
    $price = $_POST['price'];
    $aid = $_POST['product_list'];
    
    $conn->query("Call product_add('$name','$price', $aid)");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product details</title>
</head>
<body>
    <h2>Brand Table</h2>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="name"><br><br>
        <label for="">Address</label>
        <input type="text" name="address"><br><br>
        <label for="">Contact</label>
        <input type="text" name="contact"><br><br>

        <input type="submit" name="btn"><br><br>
    </form>

    <h2>Product Table</h2>
    <form action="" method="post">
        <label for="">Name</label>
        <input type="text" name="bname"><br><br>
        <label for="">Price</label>
        <input type="text" name="price"><br><br>
        <label for="">Product List</label>
        <select name="product_list">
            <?php
            $conn =mysqli_connect('localhost', 'root', '', 'industry');
            $product_list= $conn->query('SELECT * FROM manufacturer');
            while(list($id,$name)= $product_list->fetch_row()){
                echo "<option value= '$id'>$name</option>";
            }
            
            ?>
        </select><br><br>
        <button name="addBtn">Add Product</button>
    </form>

    <table border="1" style="border-collapse: collapse; width: 100%; margin: 20px auto;">
    <thead style="background-color: #4CAF50; color: white;">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Brand Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody style="font-family: Arial, sans-serif; font-size: 14px; color: #555;">
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'industry');
            $data = $conn->query("SELECT * FROM show_product");
            while (list($name, $address, $contact, , $pname, $price) = $data->fetch_row()) {
                echo "
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <td style='padding: 8px; text-align: center;'>$name</td>
                        <td style='padding: 8px; text-align: center;'>$address</td>
                        <td style='padding: 8px; text-align: center;'>$contact</td>
                        <td style='padding: 8px; text-align: center;'>$pname</td>
                        <td style='padding: 8px; text-align: center;'>$$price</td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

<style>
    /* Table Styling */
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-family: 'Arial', sans-serif;
    }
    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        table {
            width: 100%;
        }

        th, td {
            font-size: 12px;
            padding: 8px;
        }
    }
</style>

</body>
</html>