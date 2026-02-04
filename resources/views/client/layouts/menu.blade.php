<style>
    .navbar-nav .nav-link {
        padding-right: 10px !important;
        padding-left: 10px !important;
    }

    .tooltip-text {
        visibility: hidden;
        position: absolute;
        z-index: 2;
        width: 100px;
        color: white;
        font-size: 12px;
        background-color: #192733;
        border-radius: 10px;
        padding: 10px 15px 10px 0px;
    }

    .tooltip-text::before {
        content: "";
        position: absolute;
        transform: rotate(45deg);
        background-color: #192733;
        padding: 5px;
        z-index: 1;
    }

    .hover-text:hover .tooltip-text {
        visibility: visible;
    }

    #top::before {
        top: 80%;
        left: 45%;
    }

    @media (max-width: 512px) {
        #navbar-toggler-success {
            display: none;
        }
    }

    #menu-list {
        position: relative;
        display: none;
        overflow: auto;
        display: block;
    }

    #menu-list.closed {
        display: none;
    }

    #navbar-toggler {
        position: absolute;
        left: 0;
    }

    #navbar-toggler {
        display: none;
        transition: ease-in .5s;
    }

    #navbar-toggler.show {
        display: block;
        background-color: #fff;
        width: 18rem;
        animation: menu-show .5s;
        height: 100%;
    }

    .menu-sidebar {
        max-height: 90vh;
        overflow-y: scroll;
        display: block;
    }

    .menu-sidebar::-webkit-scrollbar {
        width: 0.4rem;
    }

    .menu-sidebar::-webkit-scrollbar-thumb {
        background: #24354c;
        border-radius: 0.2rem;
    }


    @keyframes menu-show {
        0% {
            left: -200px;
        }

        100% {
            left: 0;
        }
    }
    #dropdownMenu{
        position: absolute;
        transform-origin: top center;
        animation: rotateX .5s ease-in-out
    }
    @keyframes rotateX {
        0% {
            opacity: 0;
            transform: rotateX(-90deg);
        }
        50% {
            transform: rotateX(-20deg);
        }
        100% {
            opacity: 1;
            transform: rotateX(0deg);
        }
    }
    #btn_addMenu{
        border-radius: 50%;
        background-color: #ffffff;
        padding: 0;
        width: 40px;
        height: 40px;
    }
    #btn_addMenu .navbar-nav.acc_auth{
        width: 100%;
    }
    #btn_addMenu .navbar-nav.acc_auth .hover-text{
        width: 100%;
    }
    #btn_addMenu .navbar-nav.acc_auth .hover-text a{
        color: #fff;
    }
    #btn_addMenu .navbar-nav.acc_auth .hover-text:hover a{
        color: #ff4d00;
    }
    #menu_user{
        background-color: #f6fffc8f;
        padding: 0.5rem 1rem;
        border-radius: 10px;
    }
    #menu_user .navbar-nav.acc_auth .hover-text a{
        color: #fff;
    }
    /* LOGO */
    .nav-logo .logo-link {
        font-size: 48px;
        letter-spacing: 12px;
        font-weight: 700;
        text-decoration: none;
        color: #000;
    }

    /* RIGHT SIDE */
    .nav-right {
        gap: 40px;
    }

    /* MENU */
    .nav-menu li {
        margin-bottom: 8px;
    }

    .nav-menu a {
        text-decoration: none;
        color: #000;
        font-size: 13px;
        letter-spacing: 1px;
    }

    .nav-menu .active a {
        position: relative;
        padding-left: 16px;
    }

    .nav-menu .active a::before {
        content: "—";
        position: absolute;
        left: 0;
    }

    /* FILTER */
    .nav-filter {
        min-width: 220px;
    }

    .filter-title {
        font-size: 12px;
        margin-bottom: 6px;
        text-align: right;
    }

    .nav-filter select {
        width: 100%;
        border: 1px solid #000;
        padding: 4px 6px;
        margin-bottom: 6px;
        font-size: 12px;
        background: #fff;
    }
    /* css ẩn hiện lọc */
    .filter-box {
        display: none;          /* ẨN BAN ĐẦU */
        margin-top: 8px;
    }

    .filter-box select {
        width: 95%;
        padding: 6px 8px;
        margin: 0px 10px 2px 10px;
        border: 1px solid #000;
        background: #fff;
    }

    .toggle-btn {
        background: none;
        border: 1px solid #000;
        width: 24px;
        height: 24px;
        cursor: pointer;
        font-size: 16px;
        line-height: 1;
    }

    .filter-header {
        display: flex;
        align-items: center;
        justify-content: space-between; /* đẩy + sang phải */
        width: 95%;                    /* KÉO DÀI */
        padding: 10px 12px;
        border: 1px solid #000;
        box-sizing: border-box;
        margin: auto;
    }

    .filter-text {
        font-size: 12px;
        letter-spacing: 1px;
    }

    .toggle-btn {
        width: 24px;
        height: 24px;
        border: 1px solid #000;
        background: #fff;
        cursor: pointer;
        font-size: 16px;
        line-height: 1;
    }
    .mobile{
        display: none;
    }


    /* ===============================
   RESPONSIVE HEADER – KITE
   =============================== */

    /* -------- Tablet & Mobile -------- */
    @media (max-width: 991px) {

        .mobile{
            display: none !important;
        }

        .nav-inner {
            flex-direction: column;
            align-items: flex-start;
        }

        .nav-right {
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        /* LOGO */
        .nav-logo {
            width: 100%;
        }

        .nav-logo .logo-link {
            font-size: 36px;
            letter-spacing: 10px;
        }

        /* MENU */
        .nav-menu {
            padding-left: 0;
        }

        .nav-menu li {
            margin-bottom: 6px;
        }

        .nav-menu a {
            font-size: 13px;
        }

        /* FILTER */
        .nav-filter {
            width: 100%;
            max-width: 260px;
        }

        .filter-title {
            text-align: left;
        }
    }

    /* -------- Mobile nhỏ -------- */
    @media (max-width: 768px) {

        .mobile{
            display: block !important;
        }
        .nav-logo .logo-link {
            font-size: 35px;
            letter-spacing: 8px;
        }

        .nav-menu a {
            font-size: 12px;
        }

        .nav-filter {
            max-width: 100%;
        }

        .nav-filter select {
            font-size: 11px;
        }

        .web {
            display: none !important;
        }
        /* .nav-logo-mobile{
            width: 80%%;
        } */
    }
</style>
<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white" style="top:0;padding-top:0px !important;padding-bottom: 0px !important;background:#ffffff!important;width: 100%;z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="nav-inner w-100 d-flex justify-content-between align-items-start">
            <!-- PC --> 
            <div class="nav-right d-flex web">
                <div class="nav-logo">
                    <a href="/" class="logo-link">ZICZAC</a>
                </div>
                <!-- MENU -->
                <ul class="nav-menu list-unstyled mb-0">
                    <li><a href="/client/home/about">ABOUT</a></li>
                    <li><a href="/client/project/index">PROJECTS</a></li>
                    <li><a href="/contact">CONTACT</a></li>
                </ul>

                <!-- SEARCH / FILTER -->
                <div class="nav-filter">
                    <div class="filter-title">SEARCH</div>
                    <select>
                        <option>typology</option>
                    </select>
                    <select>
                        <option>projects</option>
                    </select>
                    <select>
                        <option>year</option>
                    </select>
                </div>

            </div>
        </div>
    </div>
</nav>

<!-- MOBILE -->
 <div class="mobile">

    <div class="d-flex">
        <div style="width:20%;color:#6f6969;margin-left: 8px;">
            <span>en</span>
        </div>
        <div class="nav-logo" style="width:60%">
            <a href="/" class="logo-link">ZICZAC</a> <br>
            <span style="font-size: 13px;font-family: monospace;">ARCHITECTURE</span>
        </div>
        <div >
            <a href="/client/home/about" style="font-size: 12px;text-decoration: none;color:#6f6969">Giới thiệu</a>
        </div>
    </div>
    <div style="width:95%;height:1px;background: #545454;margin: 0 auto;margin:10px"></div>
    <div class="filter-header">
        <span class="filter-text">FILTER</span>
        <button id="toggleFilter" class="toggle-btn">+</button>
    </div>

    <div id="filterBox" class="filter-box">
        <select>
            <option>typology</option>
        </select>
        <select>
            <option>projects</option>
        </select>
        <select>
            <option>year</option>
        </select>
    </div>

 </div>

<!-- Close Header -->
@section('js')
<script>
    $('#menu-toggle').click(function() {
        $("#navbar-toggler").toggleClass('show');
        $("#menu-list").toggleClass('closed');
        $("body").attr('style', 'overflow: hidden');
    })
    $(".menu-close").click(function() {
        $("#navbar-toggler").toggleClass('show');
        $("#menu-list").toggleClass('closed');
        $("body").removeAttr('style');
    })
    document.addEventListener('click', closeOnClickOutside);

    function closeOnClickOutside(e) {
        if (!$("#menu-list").hasClass('closed') && !e.target.matches('#menu-toggle, .fa-bars')) {
            $("#menu-list").addClass('closed');
            $("#navbar-toggler").removeClass('show');
        }
    }


    // ẩn hiện lọc 
    const btn = document.getElementById("toggleFilter");
    const box = document.getElementById("filterBox");

    btn.addEventListener("click", () => {
        const isOpen = box.style.display === "block";

        box.style.display = isOpen ? "none" : "block";
        btn.textContent = isOpen ? "+" : "×";
    });
</script>
@endsection