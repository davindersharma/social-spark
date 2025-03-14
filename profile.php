<?php
require_once './management/main.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $name = $user->getFname() . " " . $user->getLname();
    $email = $user->getEmail();

    if (isset($_POST['friendProfile'])) {
        $profileEmail = $_POST['friendProfile'];
        $user = new User();
        $user->setEmail($profileEmail);
        $found = $user->find($connection);
        if ($found) {
            $name = $user->getFname() . " " . $user->getLname();
            $email = $user->getEmail();
        }
    }
} else {
    header("Location: $loginPage");
}

// if (isset($_SESSION['friend'])) {
//     unset($_SESSION['friend']);
// }

// if (!isset($_SESSION['user'])) {
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/profile.min.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./assets/favicon.ico">
    <script src="./functions/profile.js" defer></script>
</head>
<body>
    <div class="profile-wrapper">
        <div class="overlay"></div>
        <!-- SEARCHBAR -->
        <?php include './components/profile/search-bar.php'?>
        <!-- HEADER -->
        <?php include './components/profile/header.php'?>

        <main>
            <!-- FRIENDS -->
            <?php include './components/profile/friends.php'?>

            <!-- POSTS -->
            <?php include './components/profile/posts.php'?>
        </main>

        <?php include "./components/profile/message-list.php"?>

    </div>
</body>
</html>

