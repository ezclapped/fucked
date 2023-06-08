<?php
    require_once "config.php";
?>


<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#">
<head>
    <title>Index | <?php  echo WEBSITE_NAME?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php echo LOGO?>"/>
    <link rel="icon" type="image/x-icon" href="<?php echo LOGO?>">
    <meta property="og:description" content="Upload your images to the web!"/>
    <meta property="og:url" content="<?php echo DISCORD_INV?>"/>
    <meta property="og:title" content="CDN Upload"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/983377ea12.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/PureSnow.css">
    <link rel="stylesheet" href="index.css">



</head>
<?php

$sql = "SELECT id FROM users";
$result = mysqli_query($link, $sql);
$totalUsers = mysqli_num_rows($result);
$sql2 = "SELECT * FROM pages ORDER BY page_clicks DESC LIMIT 10";
$result2 = mysqli_query($link, $sql2);
?>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--<img src="<?php echo LOGO?>" alt="Logo">-->
    <div class="mainContent">

        <h1 class="clapped-text">FUCKED.<span class="rip-text">RIP</span></h1>
        <p class="description-text">Another profile page creator unlike any other, but this one is special due to its <br>unique domain and exceptional support team. Your experience will be nothing short of extraordinary.<br><br><b>TOTAL USERS: <?php echo $totalUsers; ?><br><br></p>
        <a href="login" class="loginButtonLight">Login</a>
        <a href="register" class="loginButton">Register</a>

    </div>

    <div id="snowcontainer">

        <div id="snow"></div>

    </div>
    <table>
        <tr>
            <th>Page Owner</th>
            <th>Page Name</th>
            <th>Page Clicks</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
            <tr>
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['page_name']; ?></td>
                <td><?php echo $row['page_clicks']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
<script src="./assets/js/PureSnow.js"></script>
</html>