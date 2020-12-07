<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Exchange Blood Registration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        #form {
            width: 80%;
            height: 350px;
            background-color: red;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="full">
        <div id="inner-full">

            <div id="header">
                <h2>Bank Management System</h2>
            </div>

            <div id="body">
                <?php
                $un = $_SESSION['un'];
                if (!$un) {
                    header("Location:index.php");
                }
                ?>
                <h2>Exchange Blood Donor Registration</h2>
                <center>
                    <div id="form">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td width="200px" height="50px">Enter name</td>
                                    <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                                    <td width="200px" height="50px">Enter Father's name</td>
                                    <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name"></td>
                                </tr>

                                <tr>
                                    <td width="200px" height="50px">Enter address</td>
                                    <td width="200px" height="50px"><textarea name="address"></textarea></td>
                                    <td width="200px" height="50px">Enter City</td>
                                    <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter city"></td>
                                </tr>

                                <tr>
                                    <td width="200px" height="50px">Enter Age</td>
                                    <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
                                    <td width="200px" height="50px">Enter E-Mail</td>
                                    <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail"></td>
                                </tr>

                                <tr>
                                    <td width="200px" height="50px">Enter Mobile No</td>
                                    <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No"></td>
                                </tr>
                                <tr>
                                    <td width="200px" height="50px">Select Blood Group</td>
                                    <td width="200px" height="50px">
                                        <select name="bgroup">
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                        </select>
                                    </td>

                                    <td width="200px" height="50px">Exchange Blood Group</td>
                                    <td width="200px" height="50px">
                                        <select name="exbgroup">
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                        </select>
                                    </td>

                                </tr>

                                <tr>
                                    <td><input type="submit" name="sub" value="Save"></td>
                                </tr>

                            </table>
                        </form>

                        <?php
                        if (isset($_POST['sub'])) {
                            // Front-end data input
                            $name = $_POST['name'];
                            $fname = $_POST['fname'];
                            $address = $_POST['address'];
                            $city = $_POST['city'];
                            $age = $_POST['age'];
                            $bgroup = $_POST['bgroup'];
                            $exbgroup = $_POST['exbgroup'];
                            $mno = $_POST['mno'];
                            $email = $_POST['email'];

                            // Insertation of data
                            $q = "select * from donor_registration where bgroup = '$bgroup'";
                            $st = $db->query($q);
                            $num_row = $st->fetch();
                            $id = $num_row['id'];
                            $name1 = $num_row['name'];
                            $bgroup1 = $num_row['bgroup'];
                            $mno1 = $num_row['mno'];
                            $q1 = "INSERT INTO out_stock_b (bgroup, name, mno) value(?, ?, ?)";
                            $st1 = $db->prepare($q1);
                            $st1->execute([$bgroup1, $name1, $mno1]);

                            // Deletion of data 
                            $q2 = "delete from donor_registration where id='$id'";
                            $st2 = $db->prepare($q2);
                            $st2->execute();





                            $q = $db->prepare("INSERT INTO exchange_b (name, fname, address, city, age, bgroup, mno, email, exbgroup) VALUES(:name, :fname, :address, :city, :age, :bgroup, :mno, :email, :exbgroup)");

                            $q->bindValue('name', $name);
                            $q->bindValue('fname', $fname);
                            $q->bindValue('address', $address);
                            $q->bindValue('city', $city);
                            $q->bindValue('age', $age);
                            $q->bindValue('bgroup', $bgroup);
                            $q->bindValue('mno', $mno);
                            $q->bindValue('email', $email);
                            $q->bindValue('exbgroup', $exbgroup);

                            if ($q->execute()) {
                                echo "<script>alert('Registration successfull')</script>";
                            } else {
                                echo "<script>alert('Registration failed')</script>";
                            }
                        }
                        ?>
                    </div>
                </center>

            </div>

            <div id="footer">
                <h4 align="center">SDP Project</h4>
                <p align="center">
                    <a href="logout.php">
                        <font color="white">Logout</font>
                    </a>
                </p>
            </div>

        </div>
    </div>
</body>

</html>