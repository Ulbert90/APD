<?php
include_once 'config.php';
if (!isset($_SESSION['users'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media print {
            #navbar {
                display: none;
            }
        }
    </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Perpustakaan Palapa</title>
    <link rel="icon" href="assets/img/plp.ico" type="image/x-icon" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<body class="sb-nav-fixed">
    <nav id="navbar" class="sb-topnav navbar navbar-expand navbar-dark bg-dark mb-3">
        <!-- Navbar Brand-->
        <a class="navbar-brand" href="indexPeminjam.php">
            <img src="assets/img/nav.png" alt="Bootstrap" width="35%" height="100%" class="mx-5 mt-2 mb-2">
        </a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php if ($_SESSION['users']['role'] == 'peminjam') { ?>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="http://localhost/APD/indexPeminjam.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        <?php } ?>
                        <div class="sb-sidenav-menu-heading">Navigation</div>
                        <?php if (isset($_SESSION['users']) && $_SESSION['users']['role'] != 'peminjam') { ?>
                            <a class="nav-link" href="?page=kategori/kategori">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="?page=buku/buku">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Buku
                            </a>
                            <a class="nav-link" href="?page=laporan/laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-rotate-right"></i></div>
                                Laporan
                            </a>
                        <?php } elseif ($_SESSION['users']['role'] == 'peminjam') { ?>
                            <a class="nav-link" href="?page=peminjaman/peminjaman">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Peminjaman
                            </a>
                            <a class="nav-link" href="?page=koleksi/koleksi">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                favorit
                            </a>
                        <?php } ?>
                        <a class="nav-link" href="?page=ulasan/ulasan">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                            Ulasan
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai:</div>
                    <?php echo $_SESSION['users']['nama']; ?>
                </div>
            </nav>

        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'homePeminjam';
                    if (file_exists($page . '.php')) {
                        include $page . '.php';
                    } else {
                        include '404.php';
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script src="js/scripts.js"></script>

</body>

</html>