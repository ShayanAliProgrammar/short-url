<?php

require_once __DIR__ . '/base-config.php';
require_once __DIR__ . '/middlewares.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ .'/helpers.php';

$user_ip = getUserIpAddr();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['url'])) {
        echo json_encode(['error' => 'Invalid URL']);
        die();
    }

    $url = $_POST['url'];


    if (!(filter_var($url, FILTER_VALIDATE_URL))) {
        echo "Invalid URL";
    }

    $short_url = generateShortUrl();

    $stmt = $db->prepare("INSERT INTO urls (original_url, short_url, user_ip) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $url, $short_url, $user_ip);

    if (!($stmt->execute())) {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

}

if (isset($_GET['url'])) {
    $stmt = $db->prepare("SELECT original_url, short_url FROM urls WHERE user_ip = ? AND short_url = ? LIMIT 1");
    $stmt->bind_param("ss", $user_ip, $_GET['url']);
    $stmt->execute();
    $stmt->bind_result($original_url, $short_url);

    while ($stmt->fetch()) {
        header("Location: $original_url");
        break;
    }

    $stmt->close();
}

$stmt = $db->prepare("SELECT original_url, short_url FROM urls WHERE user_ip = ?");
$stmt->bind_param("s", $user_ip);
$stmt->execute();
$stmt->bind_result($original_url, $short_url);

$urls = [];
while ($stmt->fetch()) {
    $urls[] = ['original_url' => $original_url, 'short_url' => $short_url];
}

$stmt->close();
$db->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/styles.css/" rel="stylesheet">

    <title>Url Shortener - Project</title>
    <meta name="description" content="Improving my PHP skills by creating mini projects. This is an free to use PHP project to shorten your long urls." />

    <link rel="canonical" href="<?=$currentUrl?>">
</head>
<body class='bg-primary-light'>

    <main class='grid place-items-center min-h-screen min-w-screen'>
        <div class='flex flex-col items-center bg-white *:w-full rounded-3xl p-10 max-w-3xl w-full'>

            <div class='flex flex-col gap-4 max-w-3xl'>
                <h1 class='text-4xl font-bold'>Let's Shorten Your Url</h1>

                <form action='/' class='mt-3 flex items-center justify-between w-full gap-3' method='post'>
                    <input type='url' class='input-bordered w-full' name='url' id='url' placeholder='Enter a url here.' required autofocus />

                    <button class='btn-primary' type='submit'>Shorten</button>
                </form>
            </div>


            <div class='flex flex-col mt-4 pt-5 gap-2 border-t'>
                <?php
                    foreach ($urls as $url):
                ?>
                    <a href='/?url=<?= $url['short_url'] ?>' class='btn-link w-max'>http://short.url.test?url=<?= $url['short_url'] ?></a>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </main>

</body>
</html>
