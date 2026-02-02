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
    font-size: 18px;
    letter-spacing: 13px;
    opacity: 0.9;
}

</style>
<div class="hero">
    <img src="../clients/img/home.jpg" alt="Hero Image">

    <div class="hero-logo">
        <a href="{{url('/')}}" class="hero-logo">
            <h1>ZICZAC</h1>
            <span>ARCHITECTURE</span>
            <!-- <img src="../clients/img/home.jpg" alt="main_logo" style="width:80%;padding-left:20%"> -->
        </a>
    </div>
</div>


