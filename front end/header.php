<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <title>Tanya Yuk!</title>
    <link rel="icon" type="image/png" href="img/favicon.png" sizes="16x16">
</head>
<body>
<!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="wrapper">
            <input type="checkbox" id="btn" hidden>
            <label id="cek" for="btn" class="menu-btn" onclick="side_open()">
            <i class="bi bi-list"></i>
            <i class="bi bi-x-lg"></i>
            </label>
            <nav id="sidebar">
                <div class="title">
                    Tanya Yuk!
                </div>
                <ul class="list-items">
                    <li><a href="index.html"><i class="bi bi-house-door-fill"></i>Beranda</a></li>
                    <li><a href=""><i class="bi bi-house-door-fill"></i>Beranda</a></li>
                    <li><a href=""><i class="bi bi-house-door-fill"></i>Beranda</a></li>
                    <li><a href=""><i class="bi bi-house-door-fill"></i>Beranda</a></li>
                </ul>
            </nav>
        </div>
        <div class="container d-flex align-items-center" style="padding: 0px; margin: auto;">

            <a class="logo me-auto"><img src="img/favicon.png" alt="" class="img-fluid"></a>

            <form class="d-flex w-75" style="margin-bottom: 0px;">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <a href="uploadquest.html"><h1>+</h1></a>
            <!-- <i class="bi bi-plus-lg"></i> -->

            <a href="userpage.html"><img src="img/spo6.png" alt="mdo" class="pp"></a>

        </div>
    </header>
<!-- End Header -->
<div class="overlay" onclick="side_close()" style="cursor:pointer" id="myOverlay"></div>