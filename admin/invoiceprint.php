<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/invoice.css">
</head>
<body>
    <?php
    ob_start();
    include("../config.php");
    $id = $_GET["id"];

    $sql = "SELECT * FROM payment WHERE id = '$id'";
    $result = mysqli_query( $conn, $sql );
    while ( $row = mysqli_fetch_array( $result )) {
        $id = $row["id"];
        $Name = $row["Name"];
        $troom = $row["RoomType"];
        $bed = $row["Bed"];
        $nroom= $row["NoofRoom"];
        $cin = $row["cin"];
        $cout = $row["cout"];
        $meal = $row["meal"];
        $ttot = $row["roomtotal"];
        $mepr = $row["mealtotal"];
        $btot = $row["bedtotal"];
        $fintot = $row["finaltotal"];
        $days = $row["noofdays"];
    }

    $type_of_room = 0;
    if($troom =="Superior Room"){
        $type_of_room = 3000;
    }else if( $troom == "Deluxe Room"){
        $type_of_room = 2000;
    }else if( $troom == "Guest House"){
        $type_of_room = 1500;
    }else if( $troom == "Single Room"){
        $type_of_room = 1000;
    }
    if($bed =="Single"){
        $type_of_bed = $type_of_room * 1/100;
    }else if( $bed == "Double"){
        $type_of_bed = $type_of_room * 2/100;
    }else if( $bed == "Triple"){
        $type_of_bed = $type_of_room * 3/100;
    }else if( $bed == "Quad"){
        $type_of_bed = $type_of_room * 4/100;
    }else if($bed =="None") {
        $type_of_bed = $type_of_room * 0/100;
    }

    if($meal == "Room only"){
        $type_of_meal = $type_of_bed * 0;
    }else if( $meal == "Breakfast"){
        $type_of_meal = $type_of_bed * 2;
    }else if( $meal == "Half Board"){
        $type_of_meal = $type_of_bed *3;
    }else if( $meal == "Full Board"){
        $type_of_meal = $type_of_bed * 4;
    }
    ?>
    <header>
        <h1>Invoice</h1>
        <address>
            <p>Vinpearl Hotel,</p>
            <p>(+84) 0385633120</p>
        </address>
        <span> <img src="../image/vinpearlogo-removebg-preview.png" alt=""></span>
    </header>

    <article>
        <h1>Recipient</h1>
        <address>
            <p><?php echo $Name?> <br></p>
        </address>
        <table class="meta">
            <tr>
                <th><span>Invoice #</span></th>
                <td><span><?php echo $id;?></span></td>
            </tr>
            <tr>
                <th><span>Date</span></th>
                <td><span><?php echo $cout;?></span></td>
            </tr>
        </table>

        <!-- body  -->
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>Item</span></th>
                    <th><span>No of Days</span></th>
                    <th><span>Rate</span></th>
                    <th><span>Quantity</span></th>
                    <th><span>Price</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span><?php echo $troom;?></span></td>
                    <td><span><?php echo $days;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $type_of_room;?></span></td>
                    <td><span><?php echo $nroom;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $ttot;?></span></td>
                </tr>

                <tr>
                    <td><span><?php echo $bed;?>Bed</span></td>
                    <td><span><?php echo $days;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $type_of_bed;?></span></td>
                    <td><span><?php echo $nroom;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $btot;?></span></td>
                </tr>

                <tr>
                    <td><span><?php echo $meal;?></span></td>
                    <td><span><?php echo $days;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $type_of_meal;?></span></td>
                    <td><span><?php echo $nroom;?></span></td>
                    <td><span data-prefix>$</span><span><?php echo $mepr;?></span></td>
                </tr>
            </tbody>
        </table>
        
        <table class="balance">
            <tr>
                <th><span>Total</span></th>
                <td><span data-prefix>$</span><span><?php echo $fintot?></span></td>
            </tr>

            <tr>
                <th><span>Amount Paid</span></th>
                <td><span data-prefix>$</span><span>0.00</span></td>
            </tr>
            
            <tr>
                <th><span>Balance Due</span></th>
                <td><span data-prefix>$</span><span><?php echo $fintot?></span></td>
            </tr>
        </table>

        <table class="signature">
            <thead>
            <tr>
            <th><span>Customer</span></th>
            <th><span>Good sold by</span></th>
        </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span>signature & fullname</span></td>
                    <td><span>signature & fullname</span></td>
                </tr>
            </tbody>
        </table>
    </article>
    <aside>
        <h1><span>Contact Us</span></h1>
        <div>
            <p align ="center"> Email : -bao992001pth@gmail.com ||            
                <a href="http://localhost/Hotel_App/index.php">-www.vinpearl.com</a>
                || Phone : - +84 0385633120
            </p>
        </div>
    </aside>

    <button class="btns" onclick="printInvoice()" >Thank you for trusting us</button>
    <script> 
        function printInvoice(){
            window.print();
        }
    </script>
</body>
</html>
<?php
ob_end_flush();
?>