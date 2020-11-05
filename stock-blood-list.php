<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        td 
        {
            width: 200px;
            height: 40px;
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
                <br>
                    <?php
                        $un = $_SESSION['un'];
                        if (!$un) 
                        {
                            header("Location:index.php");
                        }
                    ?>

                <h1>Stock Blood list</h1>
                <center>
                    <div id="form">
                        <table>
                            <tr>
                                <td>
                                    <center>
                                        <b>
                                            <font color="blue">Name</font>
                                        </b>
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        <b>
                                            <font color="blue">Quantity</font>
                                        </b>
                                    </center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center>O+</center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                            $q = $db->query("SELECT *FROM donor_registration WHERE bgroup='O+'");
                                            echo $row = $q->rowcount();
                                        ?>
                                    </center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center>AB+</center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                            $q = $db->query("SELECT *FROM donor_registration WHERE bgroup='AB+'");
                                            echo $row = $q->rowcount();
                                        ?>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>AB-</center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                            $q = $db->query("SELECT *FROM donor_registration WHERE bgroup='AB-'");
                                            echo $row = $q->rowcount();
                                        ?>
                                    </center>
                                </td>
                            </tr>
                        </table>
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