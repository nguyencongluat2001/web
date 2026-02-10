<style>
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    /* Hero full màn hình */
    .hero {
        position: relative;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }

    /* Ảnh phủ kín */
    .hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Logo đè lên ảnh */
    .hero-logo {
        position: absolute;
        top: 10%;
        right: 5%;
        color: #fff;
        text-align: right;
        text-decoration: none;
    }

    /* Chữ ZICZAC */
    .hero-logo h1 {
        font-size: 60px;
        font-weight: 700;
        letter-spacing: 10px;
        margin: 0;
    }

    /* ARCHITECTURE */
    .hero-logo span {
        font-size: 15px;
        letter-spacing: 5px;
        opacity: 0.9;
    }

    /* MENU BÊN TRÁI */
    .hero-menu {
        position: absolute;
        left: 0%;
        top: 60%;
        display: flex;
        flex-direction: column;
        gap: 18px;
        z-index: 10;
    }

    .hero-menu a {
        display: inline-block;
        padding: 12px 26px;
        background: rgba(0,0,0,0.55);
        color: #fff;
        text-decoration: none;
        font-size: 30px;
        font-family: sans-serif !important;
        /* font-family: 'Patrick Hand', cursive; */
        font-family: 'auto';
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    /* Hover */
    .hero-menu a:hover {
        background: rgba(0,0,0,0.85);
        transform: translateX(6px);
    }


</style>
<div class="hero">
    <img src="../clients/img/home.jpg" alt="Hero Image">

    <!-- MENU BÊN TRÁI -->
    <div class="hero-menu">
        <a href="/client/home/about" style="font-family: sans-serif;">Giới thiệu</a>
        <a href="/client/project/index" style="font-family: sans-serif;">Dự án</a>
        <a href="/contact" style="font-family: sans-serif;">Liên hệ</a>
    </div>

    <!-- LOGO -->
    <div class="hero-logo">
        <a href="{{url('/client/home/about')}}" class="hero-logo">
            <h1 style="font-family: sans-serif;">ZICZAC</h1>
            <center>
                <span style="font-family: sans-serif;">ARCHITECTURE</span>
            </center>
        </a>
    </div>
</div>



