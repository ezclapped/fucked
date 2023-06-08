<?php
    require_once "../../config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template | <?php echo WEBSITE_NAME ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo LOGO ?>">
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <link rel="stylesheet" href="../../assets/css/tailwind.css">
    <link rel="stylesheet" href="../../assets/fontwesome/css/font-awesome.min.css">
    <style>
        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .bg-gray-200{
            --tw-bg-opacity: 1;
            background-color: rgb(18,18,20);
        }

        .logoicon {
            object-fit: cover;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            box-shadow: 0 0 10px #000;
        }

        .dexoboxregister {
            width: clamp(300px, 90%, 500px);
        }

    </style>
</head>

<body>
<main>
    <div class="fixed w-full h-full bg-center bg-cover bg-green-200" style="background-image: url(https://cdn.discordapp.com/attachments/987780496685666377/1112517897747710062/Untitled_8.gif);"></div>
    <div class="relative w-full h-full table">
        <div class="table-cell align-middle px-5 py-14">
            <div class="box">
                <div class="bg-main bg-opacity-75 border-1 border-stone-500/5 rounded-md shadow-4xl dexoboxregister text-center mx-auto p-10 animate-slide-up sm:w-1/6 md:w-1/3 lg:w-1/4">
                    <a href="" title="Home" class="logoicon">
                        <img src="https://cdn.discordapp.com/attachments/1112504345985024143/1112511008003588197/yeat.gif" width="180" height="180" class="fill-theme button rounded-full shadow-sm mx-auto mb-8">
                    </a>
                    <h2 class="text-3xl font-medium text-white drop-shadow-3xl text-middle">Fedox</h2>

                    <div class="buttons">

                    </div>



                    <form>

                    </form>
                    <div class="discord align-middle">
                        <div class="accountstatus">
                            <img src="https://cdn.discordapp.com/attachments/1112504345985024143/1112511008003588197/yeat.gif" width="90" height="90" class="rounded-full shadow-sm left-0 bottom-0">
                        </div>
                        <div class="accountdiscri">
                            Fedox#2623
                        </div>
                        <div class="accountstatus">
                            offline
                        </div>
                    </div>
                    <div class="view-counter text-left text-xl text-gray-400">
                        <i class="view-icon fa-solid fa-eye text-white">  50</i>
                    </div>
                </div
            </div>
        </div>
    </div>
</main>
</body>
</html>