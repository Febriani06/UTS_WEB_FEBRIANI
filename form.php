<!DOCTYPE html>
<html>

<head>
    <title>Student Registration Form</title>
    <link rel="icon" href="asset/img/aa.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="cssfrom.css">
    <link rel="stylesheet" href="cssnavbar.css">

</head>

<body>
    <!-- Your existing HTML body here -->
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="table.php"><i class="far fa-address-book"></i>Tabel</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone "></i>Input Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="far fa-copy"></i>loggout</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="testbox">
            <form method="POST" action="config/create.php" enctype="multipart/form-data">
                <div class="banner">
                    <h1>Student Registration Form</h1>


                </div>
                <br />


                <?php
                // Mulai session
                session_start();

                // Cek apakah ada notifikasi
                if (isset($_SESSION['notification'])) {
                    echo '<div class="notification text-center" id="notification">' . $_SESSION['notification'] . '</div>';

                    // Hapus notifikasi setelah ditampilkan
                    unset($_SESSION['notification']);
                }
                ?>

                <br>
                <fieldset>


                    <legend>Personal Information</legend>
                    <div class="columns">
                        <div class="item">
                            <label for="nim">NIM<span>*</span></label>
                            <input id="nim" type="text" name="nim" />
                        </div>
                        <div class="item">
                            <label for="nama">Nama<span>*</span></label>
                            <input id="nama" type="text" name="nama" />
                        </div>
                        <div class="item">
                            <label for="jenis_kelamin">Jenis Kelamin<span>*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="item">
                            <label for="ttl">TTL<span>*</span></label>
                            <input id="ttl" type="text" name="ttl" />
                        </div>
                        <div class="item">
                            <label for="status">Status<span>*</span></label>
                            <input id="status" type="text" name="status" />
                        </div>
                        <div class="item">
                            <label for="pendidikan">Pendidikan<span>*</span></label>
                            <select id="pendidikan" name="pendidikan">
                                <option value="s1">S1</option>
                                <option value="d3">D3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="item">
                            <label for="jurusan">Jurusan<span>*</span></label>
                            <input id="jurusan" type="text" name="jurusan" />
                        </div>
                        <div class="item">
                            <label for="hobby">Hobby<span>*</span></label>
                            <input id="hobby" type="text" name="hobby" />
                        </div>
                        <div class="item">
                            <label for="email">Email<span>*</span></label>
                            <input id="email" type="email" name="email" />
                        </div>
                        <div class="item">
                            <label for="nomer">Nomer<span>*</span></label>
                            <input id="nomer" type="tel" name="nomer" />
                        </div>
                        <div class="item">
                            <label for="foto">Foto<span>*</span></label>
                            <input id="foto" type="file" name="foto" accept="image/*" />
                        </div>
                    </div>
                </fieldset>
                <br />
                <fieldset>
                    <legend>Additional Information</legend>
                    <div class="columns">
                        <div class="item">
                            <label for="agama">Agama</label>
                            <input id="agama" type="text" name="agama" />
                        </div>
                        <div class="item">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input id="golongan_darah" type="text" name="golongan_darah" />
                        </div>
                        <div class="item">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input id="kewarganegaraan" type="text" name="kewarganegaraan" />
                        </div>
                        <div class="item">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input id="asal_sekolah" type="text" name="asal_sekolah" />
                        </div>
                        <div class="item">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input id="tahun_masuk" type="text" name="tahun_masuk" />
                        </div>
                        <div class="item">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <input id="tahun_lulus" type="text" name="tahun_lulus" />
                        </div>
                    </div>
                </fieldset>
                <div class="btn-block">
                    <button type="submit" href="/">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Add a script to hide the notification after 3 seconds
        setTimeout(function () {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
    <!-- External JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script>
        // Your existing JavaScript code here
        // ---------Responsive-navbar-active-animation-----------
        function test() {
            var tabsNewAnim = $('#navbarSupportedContent');
            var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
            var activeItemNewAnim = tabsNewAnim.find('.active');
            var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
            var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
            var itemPosNewAnimTop = activeItemNewAnim.position();
            var itemPosNewAnimLeft = activeItemNewAnim.position();
            $(".hori-selector").css({
                "top": itemPosNewAnimTop.top + "px",
                "left": itemPosNewAnimLeft.left + "px",
                "height": activeWidthNewAnimHeight + "px",
                "width": activeWidthNewAnimWidth + "px"
            });
            $("#navbarSupportedContent").on("click", "li", function (e) {
                $('#navbarSupportedContent ul li').removeClass("active");
                $(this).addClass('active');
                var activeWidthNewAnimHeight = $(this).innerHeight();
                var activeWidthNewAnimWidth = $(this).innerWidth();
                var itemPosNewAnimTop = $(this).position();
                var itemPosNewAnimLeft = $(this).position();
                $(".hori-selector").css({
                    "top": itemPosNewAnimTop.top + "px",
                    "left": itemPosNewAnimLeft.left + "px",
                    "height": activeWidthNewAnimHeight + "px",
                    "width": activeWidthNewAnimWidth + "px"
                });
            });
        }
        $(document).ready(function () {
            setTimeout(function () { test(); });
        });
        $(window).on('resize', function () {
            setTimeout(function () { test(); }, 500);
        });
        $(".navbar-toggler").click(function () {
            $(".navbar-collapse").slideToggle(300);
            setTimeout(function () { test(); });
        });

        // --------------add active class-on another-page move----------
        jQuery(document).ready(function ($) {
            // Get current path and find target link
            var path = window.location.pathname.split("/").pop();

            // Account for home page with empty path
            if (path == '') {
                path = 'index.html';
            }

            var target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
            // Add active class to target link
            target.parent().addClass('active');
        });
    </script>
</body>

</html>