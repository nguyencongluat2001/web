
<style>
    #form_chat {
        position: fixed;
        right: 0;
        bottom: 90px;
    }

    #customerCare {
        position: fixed;
        right: 0;
        bottom: 0;
        width: 90px;
        height: 90px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div>
    <div id="form_chat">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <section class="">
            <div id="chatMesss">
                    <a href="tel:02439935556">
                        <img width="" height="50px" style="background-color: none"
                         src="../clients/img/phone.png" alt=""
                    ></a>
            </div>
            <br>
            <div id="chatZalo" class="chatZaloClose">
                <label for="checkbox1">
                <img width="" height="50px" style="background-color: none"
                    src="../clients/img/zalo.png" alt="">
                </label>
            </div>
            <br>
            <div id="chatMesss" onclick="openMessage()">
                <img width="" height="50px" style="background-color: none"
                    src="../clients/img/icon_messager.jpg" alt="">
                </label>
            </div>
        </section>
        <section class="avenue-messenger chatZalo transform" id="pDetails">
            <div class="menu">
                <div class="button" style="padding-right: 15px;padding-top: 5px;">
                    <div>
                        <label for="checkbox1" class="chatZaloClose">
                            <i class="fa fa-window-close fa-xs" aria-hidden="true" style="color: rgb(255, 255, 255);"></i>
                        </label>
                    </div>
                </div>
                <div class="agent-face">
                    <div class="half">
                        <img class="agent circle" src="../clients/img/support.jpg" alt="Jesse Tino">
                    </div>
                </div>
            </div>
            <div class="chat">
                <div class="chat-title">
                    <span style="color: #fff;font-weight: 600;font-size: 20px;letter-spacing: 1px;font-family: Trocchi, serif;">ZALO CHAT</span> <br>
                    <span style="text-transform:none;color: yellow;">Quét mã QR zalo của nhân viên tư vấn!</span>
                </div>

                <div class="testsss">
                    <center>
                    <div class="">
                        <div id="messages-content"></div>
                        <img class="card-img " src="../clients/img/QRZalo.jpg" alt="Card image">

                    </div>
                    </center>
                   
                </div>
            </div>
            <div id="message-alert" class="content">
                <h4 class="m-0 p-0"><strong><i id="message-icon"></i> <span id="message-label"></span></strong></h4>
                <span id="message-infor"></span>
            </div>

        </section>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.2.0/pusher.min.js"></script>
<script>
     function openMessage(){
        var url = 'https://www.facebook.com/profile.php?id=100094072423686&mibextid=LQQJ4d';
        window.open(url, '_blank');
    }
     function openPhone(){
        var phone = 'tel:02439935556';
        window.open(phone,'_blank');
    }
    function showMessage(phone){
        $.ajax({
            url: '/chat/showMessage',
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                phone: phone,
            },
            success: function(res) {
                $("#body-message").html(res['htmls']);
                if(res['check'] == true){
                    $("#body-message").append('<div align="center"><span>Cuộc trò truyện đã kết thúc</span></div>');
                    $(".start").show();
                    $("#table-container-box").show();
                    $(".list-chat").hide();
                }else{
                    $(".sendMessage").show();
                    $(".start").hide();
                    $("#table-container-box").hide();
                }
                $("#frmChat_box #phone").val(phone);
                $("#body-message").removeAttr('hidden');
                $("#body-message").show();
                $(".icon-back").show();
                $(".title-header").html('<span class="icon-back" style="cursor: pointer; color: #fff;margin-right: 10px;font-size: 18px;"><i class="fas fa-angle-left" aria-hidden="true"></i></span><span class="text-uppercase" style="color: #fff;font-size: 18px;letter-spacing: 1px;font-family: Trocchi, serif;">Chat Booking Fast</span>');
                $(".icon-back").click(function(){
                    callBack();
                });
            }
        });
    }
    // <span class="title-header"><span class="icon-back" style="cursor: pointer; color: #fff;margin-right: 10px;font-size: 18px;"><i class="fas fa-angle-left" aria-hidden="true"></i></span><span class="text-uppercase" style="color: #fff;font-size: 18px;letter-spacing: 1px;font-family: Trocchi, serif;">Chat Booking Fast</span></span>
    $(".icon-back").click(function(){
        callBack();
    });
    // function callBack(){
    //     $("#body-message").html('');
    //     $("#body-message").hide();
    //     $(".sendMessage").hide();
    //     $(".start").show();
    //     $("#table-container-box").show();
    //     $(".icon-back").hide();
    //     $(".list-chat").show();
    //     $("#txt-phone").hide();
    //     $("#start").hide();
    //     $("#start_new").show();
    //     $(".title-header").html('<span class="icon-back" style="cursor: pointer; color: #fff; display:none;margin-right: 10px;font-size: 18px;"><i class="fas fa-angle-left" aria-hidden="true"></i></span><span class="text-uppercase" style="color: #fff;font-size: 18px;letter-spacing: 1px;font-family: Trocchi, serif;">Chào mừng bạn đã đến với Booking Fast</span><p class="text-capitalize mb-0">Nhập số điện thoại để liên hệ Dịch vụ Khách hàng, chúng tôi luôn túc trực 24/7</p>');
    //     $(".icon-back").click(function(){
    //         callBack();
    //     });
    // }
    function callBack(){
        $("#body-message").html('');
        $("#body-message").hide();
        $(".sendMessage").hide();
        $(".start").show();
        $("#table-container-box").show();
        $("#txt-phone").show();
        $("#phone").val('');
        $("#errorPhone").html('');
        $("#start").show();
        $(".icon-back").click(function(){
            callBack();
        });
    }

    $(document).ready(function() {
        $(".chatZaloClose").click(function() {
            if($(".messageCustomer").hasClass('hidden')){
                $(".messageCustomer").toggleClass('transform');
                $('.messageCustomer').toggleClass("hidden");
            }
            $(".chatZalo").toggleClass('transform');
            $('.chatZalo').toggleClass("hidden");
            $("#customerCare").attr('style', 'z-index:9;transition: ease .4s;');
            $("#form_chat").attr('style', 'z-index:10;transition: ease .4s;');
        });

        $(".messageClose").click(function() {
            if($(".chatZalo").hasClass('hidden')){
                $(".chatZalo").toggleClass('transform');
                $('.chatZalo').toggleClass("hidden");
            }
            $(".messageCustomer").toggleClass('transform');
            $('.messageCustomer').toggleClass("hidden");
            $("#customerCare").attr('style', 'z-index:10;transition: linear .4s;');
            $("#form_chat").attr('style', 'z-index:9;transition: linear .4s;');
        });

        $("#start").click(function(){
            var phone = $("#frmChat_box #phone").val();
            if(phone == ''){
                $(".errorPhone").html('<span style="color:red;">Mời bạn nhập số điện thoại!</span>');
                $("#frmChat_box #phone").focus();
                $("#frmChat_box #phone").attr('style', 'border: 1px solid red');
                return false;
            }
            var check = isVietnamesePhoneNumber(phone);
            if(check == false){
                $(".errorPhone").html('<span style="color:red;">Số điện thoại không đúng định dạng!</span>');
                $("#frmChat_box #phone").focus();
                $("#frmChat_box #phone").attr('style', 'border: 1px solid red');
                return false;
            }
            $("#table-container-box").hide();
            $(".sendMessage").show();
            $(".start").hide();
            $("#body-message").append(`<div class="left-message">
                                        <img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">
                                        <div class="text">
                                            <p>Xin chào!<br>Chúng tôi có thể giúp gì cho bạn.</p>
                                        </div></div>
                                        `);
            $("#body-message").show();
            $(".title-header").html('<span class="icon-back" style="cursor: pointer; color: #fff;margin-right: 10px;font-size: 18px;" ><i class="fas fa-angle-left"></i></span><span class="text-uppercase" style="color: #fff;font-size: 18px;letter-spacing: 1px;font-family: Trocchi, serif;">Chat Booking Fast</span>');
            setTimeout(function(){
                $("#body-message").append(`
                                        <div class="left-message">
                                        <img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">
                                        <div class="text">
                                            <p><a href="{{url('/facilities')}}" target="_blank" class="btn btn-light">Đặt lịch khám</a></p>
                                        </div></div>
                                        `);
            }, 1000);
            $(".icon-back").click(function(){
                callBack();
            });
        });
        $("#start_new").click(function(){
            $("#start").removeAttr('hidden');
            $("#body-message").removeAttr('hidden');
            $("#body-message").html('');
            $("#txt-phone").removeAttr('hidden');
            $("#start_new").hide();
            $(".list-chat").hide();
            $(".icon-back").show();
            $("#txt-phone").show();
            $("#start").show();

        });
        // Check số điện thoại
        function isVietnamesePhoneNumber(number) {
            return /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/.test(number);
        }
        
        // chat ng dung
        const pusher = new Pusher("{{config('chat.pusher.key')}}", {cluster: 'ap1'});
        const chanel = pusher.subscribe('public');
        chanel.bind('chat', function(data) {
            $.ajax({
                url: '/chat/receive',
                type: 'GET',
                data: {
                    message: data.message,
                    phone: data.phone,
                },
                success: function(res) {
                    $("#body-message").append(res);
                }
            });
        });

        $('#sendMessage').click(function(event) {
        // $('form').submit(function(event) {
            // event.preventDefault();
            $.ajax({
                url: '/chat/broadcast',
                method: 'GET',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    message: $("#frmChat_box #txt-message").val(),
                    phone: $("#frmChat_box #phone").val(),
                },
                success: function(res) {
                    $("#body-message").append(res);
                    $("#frmChat_box #txt-message").val('');
                }
            });
        });
    });
</script>