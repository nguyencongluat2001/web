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

</style>
<span id="menu-toggle"><i class="fas fa-bars"></i></span>
<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow" style="top:0;padding-top:0px !important;padding-bottom: 0px !important;background:#ffffff!important;width: 100%;z-index: 1000;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="nav-inner w-100 d-flex justify-content-between align-items-start">

            <!-- LEFT: LOGO -->
            <div class="nav-logo">
                
            </div>

            <!-- RIGHT: MENU + SEARCH -->
            <div class="nav-right d-flex">
                <div class="nav-logo">
                    <a href="/" class="logo-link">KITE</a>
                </div>
                <!-- MENU -->
                <ul class="nav-menu list-unstyled mb-0">
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="/client/project/index">PROJECTS</a></li>
                    <li><a href="#">CONTACT</a></li>
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

<div id="menu-list" class="closed" style="position: fixed;top: 0;right: 0;left: 0;bottom: 0;background: rgba(0,0,0,0.7);z-index: 1000;">
    <div class="" id="navbar-toggler">
        <div class="flex-fill mx-xl-2 menu-navigate">
            <div style="text-align: right; padding: .5rem">
                <span type="button" class="menu-close"><i class="fas fa-times"></i></span>
            </div>
            <ul class="nav navbar-nav justify-content-between mx-xl-2 text-dark menu-sidebar">
                <li class="nav-item">
                    <a class="nav-link link-home btn-outline-info" href="{{ url('/') }}"> <span class="text-menu-header"> <i class="fas fa-home"></i> Trang chủ </span> <br> <span class="text-12">Hạng mục nổi bật</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-bloodtest btn-outline-info" href="{{ url('/client/appointmentathome/indexApointment') }}"> <span class="text-menu-header"><i class="fas fa-tint"></i> Xét nghiệm </span> <br> <span class="text-12">Lấy máu tại nhà</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-infusion btn-outline-info" href="{{ url('/client/appointmentathome/indexInfusion') }}"> <span class="text-menu-header"><i class="fas fa-thermometer"></i> Truyền dịch </span> <br> <span class="text-12">Truyền dịch tại nhà</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-searchschedule btn-outline-info" href="{{ url('/searchschedule') }}"> <span class="text-menu-header"><i class="fas fa-search-plus"></i> Tra cứu </span> <br> <span class="text-12">Tra cứu kết quả</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-contact btn-outline-info" href="{{ url('/contact') }}"> <span class="text-menu-header"><i class="fas fa-comment-medical"></i> Đánh giá </span> <br> <span class="text-12">Đánh giá dịch vụ</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-patients btn-outline-info" href="{{ url('/patients') }}"> <span class="text-menu-header"><i class="fas fa-procedures"></i> Dành cho bệnh nhân </span> <br> <span class="text-12">Dành cho bệnh nhân</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-package btn-outline-info" href="{{ url('/vai-tro') }}"> <span class="text-menu-header"><i class="fas fa-dice-d6"></i> Vai trò </span> <br> <span class="text-12">Vai trò của medhanoi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-package btn-outline-info" href="{{ url('/lien-he') }}"> <span class="text-menu-header"><i class="fas fa-phone"></i> Liên hệ </span> <br> <span class="text-12">Liên hệ</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-package btn-outline-info" href="{{ url('/faq') }}"> <span class="text-menu-header"><i class="fas fa-question-circle"></i> Câu hỏi thường gặp </span> <br> <span class="text-12">Câu hỏi thường gặp</span></a>
                </li>
            </ul>
        </div>
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
</script>
@endsection