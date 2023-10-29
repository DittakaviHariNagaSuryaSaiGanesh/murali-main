<?php 
    session_start();
    if($_SESSION['username'] == "") 
    {
        header("Location: index.php");
    }

?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    :root {
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100
    }

    *,
    ::before,
    ::after {
        box-sizing: border-box
    }

    body {
        position: relative;
        margin: var(--header-height) 0 0 0;
        padding: 0 1rem;
        font-family: var(--body-font);
        font-size: var(--normal-font-size);
        transition: .5s
    }

    a {
        text-decoration: none
    }

    .header {
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);
        transition: .5s
    }

    .header_toggle {
        color: #7C3B84;
        font-size: 1.5rem;
        cursor: pointer
    }

    .header_img {
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden
    }

    .header_img img {
        width: 40px
    }

    .l-navbar {
        position: fixed;
        top: 0;
        left: -30%;
        width: var(--nav-width);
        height: 100vh;
        background-color: #bc0201;
        padding: .5rem 1rem 0 0;
        transition: .5s;
        z-index: var(--z-fixed)
    }

    .nav {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden
    }

    .nav_logo,
    .nav_link {
        display: grid;
        grid-template-columns: max-content max-content;
        align-items: center;
        column-gap: 1rem;
        padding: .5rem 0 .5rem 1.5rem
    }

    .nav_logo {
        margin-bottom: 2rem
    }

    .nav_logo-icon {
        font-size: 1.25rem;
        color: var(--white-color)
    }

    .nav_logo-name {
        color: var(--white-color);
        font-weight: 700
    }

    .nav_link {
        position: relative;
        color: var(--first-color-light);
        margin-bottom: 1.5rem;
        transition: .3s
    }

    .nav_link:hover {
        color: var(--white-color)
    }

    .nav_icon {
        font-size: 1.25rem
    }

    .show {
        left: 0
    }

    .body-pd {
        padding-left: calc(var(--nav-width) + 1rem)
    }

    .active {
        color: var(--white-color)
    }

    .active::before {
        content: '';
        position: absolute;
        left: 0;
        width: 2px;
        height: 32px;
        background-color: var(--white-color)
    }

    .height-100 {
        height: 100vh
    }

    a {
        text-decoration: none !important;
    }

    /* i {
            font-size: 26px;
        } */

    @media screen and (min-width: 768px) {
        body {
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem)
        }

        .header {
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
        }

        .header_img {
            width: 40px;
            height: 40px
        }

        .header_img img {
            width: 45px
        }

        .l-navbar {
            left: 0;
            padding: 1rem 1rem 0 0
        }

        .show {
            width: calc(var(--nav-width) + 156px)
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 188px)
        }

        a {
            text-decoration: none !important;
        }
    }
    span#tab_name {
        font-weight: bold;
        color: #bc0201;
    }
    .show_hide {
        display: none;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="script.js" defer></script>

<script>
    $(document).ready(function() {
            const activePage = window.location.pathname
            $('.nav-tab').removeClass("active");
            const user = "<?= $_SESSION['username'] ?>"
            // console.log(user)
            if(user == "admin")
            {
                var elements = document.getElementsByClassName("show_hide");
                for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = "block";
                }
            }
            $('#login_user').html(user);

            if (activePage == "/murali-main/dashboard.php") {
                $(".select-forum").addClass("active");
                $("#tab_name").html ("Dashboard");
            } else if (activePage == "/murali-main/addproduct.php") {
                $(".enter-context").addClass("active");
                $("#tab_name").html ("Add Product");
            } else if (activePage == "/murali-main/sales.php") {
                $(".report-tab").addClass("active");
                $("#tab_name").html ("Sales");
            } else if (activePage == "/social_listening/audience.php") {
                $(".audience-tab").addClass("active");
            }
            else if (activePage == "/social_listening/message.php") {
                $(".message-tab").addClass("active");
            }
        });
</script>
<body id="body-pd" style="background: #f7f3f7;">
    <header class="header mb-3 body-pd" id="header" style="background: white">
        <div> <span id="tab_name"></span> </div>
        <span style="color: #bc0201">Login as: <span id="login_user"></span></span>
        <a href="log_out.php">
            <i class='bx bx-log-out-circle' style="font-size:22px; color: #bc0201"></i>
        </a>
    </header>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="">
                    <img src="img/logo.jpg" alt="#" class="mt-3" id="emg1" style="width: 100%;margin-left: 9px; padding-right: 10px">
                </a>

                <div class="nav_list mt-3">
                    <a href="dashboard.php" class="nav_link nav-tab select-forum">
                        <i class='bx bx-message-alt-detail' style="font-size: 26px;" style="font-size: 26px;"></i>
                        <span class="nav_name">Dashboard</span>
                    </a>

                    <div class="show_hide">
                        <a href="addproduct.php" class="nav_link nav-tab enter-context">
                            <i class='bx bxs-objects-horizontal-center' style="font-size: 26px;"></i>
                            <span class="nav_name">Add product</span>
                        </a>
                        <a href="sales.php" class="nav_link nav-tab report-tab">
                            <i class='bx bxs-objects-horizontal-center' style="font-size: 26px;"></i>
                            <span class="nav_name">Sales</span>
                        </a>
                    </div>


                    <!-- <a href="" class="nav_link nav-tab report-tab">
                        <i class='bx bx-scatter-chart' style="font-size: 26px;"></i>
                        <span class="nav_name">Report</span>
                    </a>

                    <a href="" class="nav_link nav-tab audience-tab">
                        <i class='bx bxs-user-voice' style="font-size: 26px;"></i>
                        <span class="nav_name">Audience</span>
                    </a>

                    <a href="" class="nav_link nav-tab message-tab">
                        <i class="bx bx-folder nav_icon" style="font-size: 26px;"></i>
                        <span class="nav_name">Message</span>
                    </a>

                    <a href="#" class="nav_link nav-tab">
                        <i class="bx bx-bar-chart-alt-2 nav_icon" style="font-size: 26px;"></i>
                        <span class="nav_name">Result</span>
                    </a> -->
                </div>
            </div>

        </nav>
    </div>
    <br><br>
</body>
