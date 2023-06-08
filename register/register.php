<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../config.php";

// Don't touch this
$secret_key = HCAPTCHA_SECRET;
$site_key = HCAPTCHA_SITEKEY;

$username = $password = $confirm_password = $licence_key = "";
$username_err = $password_err = $confirm_password_err = $licence_key_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["password_confirmation"]);
    $licence_key = trim($_POST["license_key"]);

    $sql = "SELECT id FROM licensekeys WHERE `key` = ? AND used = FALSE";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $licence_key);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) != 1) {
                $licence_key_err = "Invalid or used license key.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }

    if (empty($licence_key_err)) {
        $response = $_POST['h-captcha-response'];

        $verify_url = 'https://hcaptcha.com/siteverify';
        $data = [
            'secret' => $secret_key,
            'response' => $response
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($verify_url, false, $context);
        $result_data = json_decode($result, true);

        if (!$result_data['success']) {
            $captcha_err = "Please complete the captcha.";
            exit;
        }

        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $param_username = trim($_POST["username"]);
            $sql = "SELECT id FROM users WHERE username = ?";
            $stmt = mysqli_prepare($link, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = $param_username;
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        if (empty(trim($_POST["password_confirmation"]))) {
            $confirm_password_err = "Please confirm the password.";
        } else {
            $confirm_password = trim($_POST["password_confirmation"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($licence_key_err)) {
            $defaultadmin = false;
            $sql = "INSERT INTO users (username, password, is_admin, profile_name) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $sql);

            if ($stmt) {
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $defaultadmin, $param_username);

                if (mysqli_stmt_execute($stmt)) {
                    // Mark license key as used
                    $sql = "UPDATE licensekeys SET used = TRUE WHERE `key` = ?";
                    $stmt = mysqli_prepare($link, $sql);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $licence_key);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                    }

                    // Insert into pages table
                    $page_owner = $param_username;
                    $page_name = "Sample Page";
                    $page_clicks = 0;
                    $sql = "INSERT INTO pages (id, owner, page_name, page_clicks) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_prepare($link, $sql);

                    if ($stmt) {
                        $id = mysqli_insert_id($link);

                        mysqli_stmt_bind_param($stmt, "isss", $id, $page_owner, $page_name, $page_clicks);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                    }

                    session_start();

                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = mysqli_insert_id($link);
                    $_SESSION["username"] = $username;

                    header("location: ../");
                    exit;
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }

        mysqli_close($link);
    }
}
?>

HTTP/1.1 503 Service Unavailable
Content-Type: text/html
Retry-After: 3600

<html>
<head>
    <title>503 Service Unavailable</title>
</head>
<body>
<h1>503 Service Unavailable</h1>

<p>This section of the page is still under construction. Please try again later.</p>
<p>If you landed here after registration, don't worry, this usually happens when the username is already taken or the license key is invalid or already used. We are working on a solution.</p>
</body>
</html>
