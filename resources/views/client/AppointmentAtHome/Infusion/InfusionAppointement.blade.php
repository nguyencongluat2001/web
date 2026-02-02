@extends('client.layouts.index')
@section('body-client')
<style>
    form{
        width:80%;
    }
</style>
<style> 
.test {
  width: 100px;
  height: 100px;
  background-color: red;
  position: relative;
  animation-name: example;
  animation-duration: 6s;
}

@keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  100%  {background-color:yellow; left:50%; top:0px;}
  100%  {background-color:yellow; left:50%; top:0px;}
  100%  {background-color:yellow; left:50%; top:0px;}

}
@media (max-width: 450px){
    .title-appoinment {
        font-size: 24px !important;
        padding-top: 0 !important;
    }
    .objective-icon{
        width: 12rem;
        height: 6.5rem;
    }
    .objective h2, .objective .h3{
        font-size: 22px !important;
    }
    .team-member ul li b{
        font-size: 20px;
    }
    b, span, strong{
        font-size: 1rem;
    }
}
</style>
<link rel="stylesheet" href="../clients/css/style.css">
    <!-- Start Banner Hero -->
    <!-- Start Banner Hero -->
    <div class="image-logo" style="width:100%;background-position: center; background-size: 100%;background-repeat: no-repeat;height: 100%;">
        <img class="card-img " src="../clients/img/Banner_medhn.png" alt="Card image">
    </div>
    <center>
        <div class="col-md-6 mb-4">
                    <a href="{{url('/client/appointmentathome/tab2/')}}/truyendich" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" style="height: 250px;object-fit: cover;" src="{{url('/clients/img/truyentainha1.jpeg')}}" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                            <div style="border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                <div style="background: #486289a8;padding: 10px;border-radius: 10px;color: #ffffff;">
                                    <h3 style="font-size: 23 !important;font-family: serif;color: #ffffff;font-weight: 700;">Dịch vụ truyền dịch tại nhà</h3>
                                    <span  class="blogReader">Giúp khách hàng được chăm sóc tại chính ngôi nhà của bạn hơn thế tiết kiệm thời gian đi lại, mức chi phí hợp lý.</span> <br>
                                    <center>
                                            <span style="background: #f1fffd;color: #ff6a20;font-weight: 700;width: 150px;" class="btn btn-outline-light rounded-pill">Đặt lịch truyền</span>
                                    </center>
                                </div>
                               
                            </div>
                        </div>
                    </a>
                </div>
    </center>
    <!-- Start Banner Hero -->
    <section class="bg-light w-100">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-start" >
                    <h1 style="color: #7fd6ff!important;font-family: serif;" class="h2 mt-5 py-5 typo-space-line title-appoinment">ĐIỂM KHÁC BIỆT KHI SỬ DỤNG DỊCH VỤ TRUYỀN DỊCH TẠI NHÀ</h1>
                    <p class="">
                    Tiện lợi: Việc làm truyền dịch tại nhà giúp tiết kiệm thời gian và công sức di chuyển đến cơ sở y tế. Người dùng có thể sắp xếp thời gian và địa điểm phù hợp cho việc làm truyền dịch.
                    </p>
                    <div class="row g-lg-5 mb-4" >
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/tuvan.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="fas fa-headset"></i> Tư vấn miễn phí</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/bank.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="fas fa-dollar-sign"></i> Giá cả phải chăng</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/bacsi.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="fas fa-hospital-user"></i> Bác sĩ chuyên môn giỏi</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/laymautainha.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="fas fa-user-nurse"></i> Nhân viên chuyên nghiệp</h3>
                                    </div>  
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/nhanvien.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="fas fa-blender-phone"></i> Phục vụ 24/24</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                        <!-- Start Recent Work -->
                        <div class="col-md-4 mb-4">
                            <a href="" class="recent-work card border-0 shadow-lg overflow-hidden">
                                <img class="recent-work-img card-img" style="height: 150px;object-fit: cover;" src="{{url('/clients/img/like.jpeg')}}" alt="Card image">
                                <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                    <div style="background: #00000045;border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                                        <h3 class="card-title" style="font-weight: 600;;padding:10px;font-size: 15px !important;font-family: auto;"><i class="far fa-hand-point-right"></i> Hơn 5000 khách hàng hài lòng</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Recent Work -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="../clients/img/work.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Team Member -->
    <section class="container py-5">
    <h2 style="color: #7fd6ff!important;font-family: serif;" class="h2 title-appoinment">BẢNG GIÁ DỊCH VỤ TẠI NHÀ - TIÊM THUỐC THEO CHỈ ĐỊNH CỦA BÁC SĨ</h2>
        <div class="pt-5 pb-3 d-lg-flex gx-5" style="background: #bef4ff;padding: 5%;">
            <div class="col-lg-6">
                <p class="text-muted " style="padding-left: 10%;">
                +Cấy que tránh thai tại nhà: loại que hà lan cấy 1 lần tác dụng 3 năm : phí combo tại nhà 2tr ( bv phụ sản 3,6tr)  <br>
                +Tiêm tĩnh mạch 80-100k/1 lần tiêm. <br>
                +Tiêm bắp ( tiêm mông, tiêm dưới da …)80- 100k/1 lần tiêm. <br>
                +Truyền dịch theo chỉ định của bs, và theo nhu cầu của ng bệnh:<br>
                +Dịch Natri clorid 0,9% chai 500ml 200k/ chai. <br>
                +Chai thứ 2 : 150k <br>
                +Dịch hoa quả ( Vitaplex ) chai 500ml 300k/ chai. <br>
                +Đạm ( Aminoplasma) chai 250ml 350k/ chai. <br>
                +Đạm sữa lipovenos chai 250ml 400k/ chai. <br>
                +Thuốc cerebrolysin 200k/ ống. <br>
                +Thuốc tanganil 120k/ ống. <br>
                +Thuốc nootropin 120k/ ống. <br>
                +Thuốc bổ gan 100k/ ống. <br>
                +Vitamin b 150k/ 2 ống. <br>
                +Solu medrol 150/ ống. <br>
                +Canxi 150k/ ống.<br>
                +Buscopan 100k/ ống.<br>
                +Nospa 100k/ ống.<br>
                +Chống oxy hoá huyết và giải độc ( reamberin ) 450k/ chai.<br>
                +Paracetamol chai 100ml 150k/ chai<br><br>
                </p>
            </div>
            <div class="col-lg-6">
                <p class="text-muted " style="padding-left: 10%;">
                +Thay băng gạc hằng ngày: <br>
                +Khâu vết thương<br>
                +Thay băng gạc và chăm sóc vết thương mổ 150k/ tuỳ từng vết thương.<br>
                +Cắt chỉ 100 - 200k/ tuỳ từng vết thương.<br>
                +Thủ thuật khác:<br>
                +Đặt sonde ăn 250k/ lần.<br>
                +Đặt sonde tiểu 250k/ lần.<br>
                <span style="color:red">*</span> Lưu ý:<br>
                - Giá có thể thay đổi theo nếu trường hợp ngoài giờ từ 23-6h sáng.<br>
                Bên hoạt nhé<br>
                </p>
            </div>

        </div>
    </section>
    <!-- End Team Member -->

    <!-- Start Contact -->
    <section class="banner-bg bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto my-4 p-3">
                    <h1 style="color: #7fd6ff!important;font-family: serif;" class="h2 title-appoinment">KHI NÀO CƠ THỂ CẦN TRUYỀN NƯỚC VÀ CÁC LOẠI DỊCH TRUYỀN PHỔ BIẾN?</h1>
                    <p><b>Truyền nước hay truyền dịch là truyền các chất có lợi vào cơ thể thông qua đường tĩnh mạch để hỗ trợ điều trị hoặc phục hồi sức khỏe. Việc truyền dịch chỉ thực hiện khi có sự đồng ý của bác sĩ chuyên khoa. Không nên tự ý truyền dịch bừa bãi, rất có thể sẽ gây ra nhiều biến chứng nguy hiểm như suy tim, phù phổi, nghiêm trọng hơn là tình trạng sốc phản vệ dẫn đến tử vong.</b></p>
                    <p><b>1. Khi nào cơ thể mới cần truyền nước?</b></p>
                    <p>Các chỉ số trong máu, muối, đường, chất điện giải,... ở cơ thể người đều có một mức giá trị nhất định, khi giá trị này giảm đi thì phải bù đắp thêm vào để không làm mất sự cân bằng. Lúc này chúng ta cần thực hiện xét nghiệm máu để kiểm tra chính xác lượng mất đi từ đó có những biện pháp bù đắp với liều lượng thích hợp. Do đó việc khám và xét nghiệm kiểm tra rất quan trọng trước khi truyền dịch, để có thể kiểm soát được lượng nước đưa vào cơ thể không ít hơn và cũng không nhiều hơn.</p>
                    <p>Những công trình nghiên cứu khoa học và những cuốn sách về Hóa sinh học của thầy là những tài liệu quý và hữu ích cho nhiều thế hệ sinh viên Y trong toàn quốc. Một trong những công trình của thầy được ứng dụng nhiều nhất là “Nghiên cứu phát hiện biến đổi gen trong ung thư đại trực tràng” (Đề tài Cấp Bộ Y tế 2006 - 2009). Công trình của PGS.TS Nguyễn Nghiêm Luật đã giúp phát hiện sớm ung thư đại trực tràng ở những bệnh nhân và những người thân trong gia đình mang các đột biến trên gen APC để có biện pháp điều trị sớm ngay cả khi bệnh chưa xuất hiện, giúp họ tránh được nguy cơ tử vong. Tuy nhiên, nếu thuộc một trong số những đối tượng sau thì vẫn cho bệnh nhân truyền nước trước khi có kết quả xét nghiệm: bệnh nhân bị mất máu, mất nước, ngộ độc, trước và sau thực hiện phẫu thuật. <br>
                    Hiện nay việc tự ý truyền dịch tại nhà khi cảm thấy cơ thể mệt mỏi, ngủ ít, ăn uống kém,... rất phổ biến. Không phải lúc nào truyền cũng tốt, tùy theo thể trạng và đối tượng bệnh nhân mà sẽ có nhóm dịch truyền khác nhau. Do đó việc truyền dịch mà không được bác sĩ kiểm tra rất dễ xảy ra tai biến và gây nên những hậu quả nghiêm trọng. <br>
                     Đối với một số trường hợp bị mất nước nhưng vẫn còn khả năng ăn uống thì việc truyền dịch lại không hiệu quả bằng việc uống trực tiếp. Ví dụ: Truyền một chai muối 9% chỉ tương đương với việc bạn uống trực tiếp một bát canh, truyền glucose 5% chỉ như uống một muỗng cà phê đường.</p>
                    <p><b>2. Một số loại dịch truyền phổ biến</b></p>
                    <p><b>2.1. Những nhóm dịch truyền phổ biến</b></p>
                    <p>Có 3 loại truyền nước phổ biến tùy thuộc vào mục đích điều trị như sau: <br>
                    Cung cấp dưỡng chất cho cơ thể: Được sử dụng để truyền cho những người cơ thể suy nhược, không ăn uống được bằng miệng, trước và sau phẫu thuật. Bao gồm: glucose nhiều nồng độ 5%, 10%, 20%,... các loại chất đạm, chất béo, vitamin.
                    <br>
                    Cung cấp nước và chất điện giải: Được sử dụng cho bệnh nhân bị mất nước, mất máu do tiêu chảy, ngộ độc,... Bao gồm: Dung dịch NaCl 0,9%, bicarbonate natri 1,4%, lactate ringer.
                    <br>
                    Nhóm đặc biệt: Được sử dụng trong trường hợp bệnh nhân cần bù dịch tuần hoàn trong cơ thể hoặc bù nhanh albumin. Bao gồm: dung dịch chứa albumin, dung dịch cao phân tử, dung dịch dextran, huyết tương tươi,...</p>
                    <br>
                    <p><b>2.2. Giới thiệu một số loại dịch truyền phổ biến</b></p>
                    <p>NaCl 0,9% (Nước muối sinh lý)<br>

                    Loại truyền nước thông dụng nhất, thường được gọi với cái tên “truyền muối biển”. Tại nồng độ 0,9%, dung dịch muối đẳng trương, nồng độ này thích hợp nhất do có độ thẩm thấu tương đầu với các dịch bên trong cơ thể người.
                    <br><br>
                    Truyền 1000ml nước muối sinh lý thì có khoảng 250ml được giữ lại trong lòng mạch.
                    <br>
                    Được sử dụng trong những trường hợp sau:
                    <br>
                    - Sốt siêu vi mất nước, tiêu chảy, nôn mửa, tiểu đường,...
                    <br>
                    - Pha loãng cùng với một số loại thuốc để truyền vào cơ thể.
                    <br>
                    - Sử dụng khi có những chỉ định đặc biệt của bác sĩ.
                    <br>
                    Lactate Ringer
                    <br>
                    </p>


                    <p>Trong dung dịch Lactate Ringer bao gồm nước và một số ion như Na+, K+, Ca2+. Cl-,... Dung dịch này có tình chất thẩm thấu giống như huyết tương, ươu trương nhẹ. Được chỉ định trong những trường hợp cần bù nước và điện giải, không nên sử dụng cho những bệnh nhân bị mất nước do nôn nhiều. Truyền 1000ml thì có 190ml được giữ lại trong lòng mạch.
                    <br>
                    Đường Glucose 5%<br>

                    Dung dịch đường Glucose 5% có tính chất tương tự như dung dịch NaCl 9%, được sử dụng trong những trường hợp sau:<br>

                    - Bù dịch.<br>

                    - Ăn uống kém, nôn ói nhiều.<br>

                    - Mệt mỏi nôn nao sau khi say rượu.<br>
                    </p>

                    <p><b>3. Một số lưu ý khi truyền nước</b></p>
                    <p>Không phải nhân viên y tế hoặc bác sĩ nào cũng có đủ chuyên môn để ứng phó với những trường hợp tai biến khi truyền dịch. Những biến chứng xảy ra có thể nặng hoặc nhẹ tùy thuộc vào mức độ.
                    <br><br>
                    Nếu nhẹ, bệnh nhân có thể bị đau, sưng ở vị trí truyền. Trường hợp nặng, bệnh nhân có thể bị suy tim, phù phổi, viêm tĩnh mạch do tiếp nhận lượng dịch truyền quá mức cần thiết đối với cơ thể. Trường hợp xấu nhất là sốc phản vệ dẫn đến tử vong sau khi truyền dịch.
                    <br>
                    Do đó cần chú ý một số vấn đề sau đây trước khi tiến hành truyền dịch như sau:
                    <br>
                    - Chỉ truyền khi có sự chỉ định của bác sĩ chuyên khoa, liều lượng truyền dựa vào kết quả thăm khám và xét nghiệm.
                    <br>
                    - Có bộ dụng cụ xử lý tai biến, thuốc chống sốc. Dụng cụ truyền nước phải đảm bảo vô khuẩn.
                    <br>
                    - Loại bỏ bọt khí trong túi truyền bằng cách cho chảy những giọt đầu tiên ra ngoài trước khi cắm vào tĩnh mạch của người bệnh.
                    <br>
                    - Theo dõi và đảm bảo các yếu tố liều lượng, tốc độ, thời gian, y tá phụ trách truyền cần thường xuyên kiểm tra tình trạng của bệnh nhân.
                    <br>
                    - Nếu còn ăn uống được thì nên thay đổi chế độ dinh dưỡng phù hợp vì cách này an toàn và tự nhiên hơn so với việc truyền dịch.
                    <br>
                    Truyền dịch rất tốt cho việc phục hồi sức khỏe và phục vụ điều trị, tuy nhiên cần tuân theo những chỉ dẫn của bác sĩ để việc truyền nước đạt được hiệu quả tốt nhất mà không có những rủi ro ngoài ý muốn.
                    <br>
                    </p>
                    <p>
                    Để được truyền nước an toàn hãy đến Bệnh viện Đa khoa MEDLATEC. Tại đây, chúng tôi thực hiện khám và xét nghiệm trước khi truyền nước cho bệnh nhân để kiểm soát được liều lượng thích hợp. Bên cạnh đó MEDLATEC còn trang bị đầy đủ dụng cụ truyền, dụng cụ cấp cứu khi tai biến đều đạt chuẩn chất lượng. Ngoài ra bạn có nhận được sự tư vấn của những bác sĩ là chuyên gia đầu ngành có nhiều năm kinh nghiệm.
                    <br>
                     Không những về vấn đề truyền nước, MEDLATEC còn hỗ trợ khám chữa nhiều bệnh lý khác nhau, phòng thí nghiệm đạt tiêu chuẩn quốc tế có thể kiểm tra hơn 500 loại xét nghiệm. Đến với MEDLATEC bạn sẽ được tận hưởng chất lượng dịch vụ y tế tuyệt vời.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact -->
    <!-- End Banner Hero -->
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="addfile" role="dialog"></div>
<div class="modal " id="show" role="dialog"></div>

<div id="dialogconfirm"></div>
    <!-- End Service -->
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_AppointmentAtHome.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    NclLib.menuActive('.link-infusion');
    var baseUrl = "{{ url('') }}";
    var JS_AppointmentAtHome = new JS_AppointmentAtHome(baseUrl, 'client', 'appointmentathome');
    $(document).ready(function($) {
        JS_AppointmentAtHome.loadIndex(baseUrl);
    })
</script>
@endsection