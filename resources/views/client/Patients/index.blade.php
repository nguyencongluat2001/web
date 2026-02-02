@extends('client.layouts.index')
@section('body-client')
<style>
    .patients-item {
        border: 1px solid #ccc;
        text-align: center;
        padding: 1rem 2rem;
        height: 20rem;
    }

    .patients-item i {
        font-size: 5rem;
        color: #49bce2;
        padding: 1rem;
    }

    .patients-item p {
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .patients-item p b {
        font-size: 24px;
    }

    .patients-item span {
        font-size: 1rem;
    }

    #patients .popular-specialties span {
        font-size: 1rem;
    }

    #patients .display-flex {
        display: flex;
        justify-content: space-between;
        margin: auto;
    }

    #patients .col-pc-3 {
        width: 30%;
    }
    @media (max-width: 991px){
        .patients-item{
            padding: 1rem 1rem;
        }
        .patients-item i{
            font-size: 3rem;
        }
        .patients-item p b {
            font-size: 20px;
        }
    }
    @media (max-width: 768px){
        #patients .service-wrapper{
            padding-top: 1rem!important;
        }
        #patients h2{
            font-size: 30px;
        }
        #patients .col-pc-3{
            margin-top: 1rem;
            width: 100%;
        }
        .patients-item {
            height: 15rem;
        }
        .patients-item p b {
            font-size: 16px;
        }
        .patients-item i {
            font-size: 4rem;
        }
        .patients-item span p{
            text-align: justify;
        }
    }
    @media (max-width: 450px){
        #patients .service-wrapper{
            padding-top: 1rem!important;
        }
        #patients h2{
            font-size: 30px;
        }
        #patients .col-pc-3{
            margin-top: 1rem;
            width: 100%;
        }
        .patients-item {
            height: 18rem;
        }
        .patients-item p b {
            font-size: 16px;
        }
        .patients-item i {
            font-size: 4rem;
        }
        .patients-item span p{
            text-align: justify;
        }
    }
</style>

<div id="patients">
    <section class="service-wrapper py-3 mt-5 pt-5">
        <div class="container-fluid pb-3">
            <div class="col-md-12 pt-3">
                <h2 class="h2 text-center col-12 py-2">Tại sao Booking lại giải quyết được vấn đề của bạn?</h2>
            </div>
            <div class="container pt-5">
                <div class="row display-flex">
                    <div class="col-pc-3 patients-item">
                        <i class="fas fa-user-nurse"></i>
                        <p><b>BÁC SĨ UY TÍN</b></p>
                        <span><p>Mạng lưới bác sĩ chuyên khoa giỏi đã/đang công tác tại các viện lớn hàng đầu, với thông tin đã xác thực.</p></span>
                    </div>
                    <div class="col-pc-3 patients-item">
                        <i class="fas fa-calendar-check"></i>
                        <p><b>ĐÚNG NGƯỜI ĐÚNG BỆNH</b></p>
                        <span><p>Đầy đủ các chuyên khoa, thông tin bác sĩ chi tiết, các bài hướng dẫn dễ hiểu, người bệnh dễ dàng lựa chọn bác sĩ phù hợp.</p></span>
                    </div>
                    <div class="col-pc-3 patients-item">
                        <i class="fas fa-comments"></i>
                        <p><b>HỖ TRỢ CHU ĐÁO</b></p>
                        <span><p>Chúng tôi hỗ trợ bệnh nhân trong suốt quá trình trước khám, trong khi đi khám và sau khi đi khám một cách hiệu quả.</p></span>
                    </div>
                </div>
                <br><br>
                <div class="row display-flex">
                    <div class="col-pc-3 patients-item">
                        <i class="fas fa-clock"></i>
                        <p><b>ĐẶT LỊCH 24/7</b></p>
                        <span><p>Lịch khám của bác sĩ hiển thị 24/7 giúp bạn chủ động lựa chọn lịch khám phù hợp.</p></span>
                    </div>
                    <div class="col-pc-3 patients-item">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p><b>MIỄN PHÍ ĐẶT LỊCH</b></p>
                        <span><p>Đặt khám qua Booking là miễn phí đặt lịch. Chi phí khám chữa bệnh, bạn thanh toán trực tiếp tại nơi khám.</p></span>
                    </div>
                    <div class="col-pc-3 patients-item">
                        <i class="far fa-handshake"></i>
                        <p><b>KHÁM LẠI MIỄN PHÍ</b></p>
                        <span><p>Nếu người bệnh không hài lòng với qui trình khám, tư vấn và phương án điều trị của bác sĩ.</p></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-wrapper py-3 popular-specialties">
        <div class="container">
            <div class="service-tag py-3 row">
                <div class="col-md-6">
                    <iframe style="width: 100%; height: 388px;" src="https://www.youtube.com/embed/wS2WgvaZggA?list=RDg_4Ql9JmoJ0" title="Mình Đã Hứa Yêu Thật Lâu... Câu Hứa Chưa Vẹn Tròn Lofi Ver  ( Phát Huy T4 x WindP )" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <h2>Booking hoạt động như thế nào?</h2>
                    <span>
                        <p>Booking là nền tảng đặt lịch khám giúp bệnh nhân dễ dàng lựa chọn đúng bác sĩ từ mạng lưới bác sĩ chuyên khoa giỏi, với thông tin đã xác thực và đặt lịch nhanh chóng.</p>
                        <p>1. Đội ngũ của Booking làm việc trực tiếp với các bác sĩ để xác thực các thông tin một cách chính xác, rõ ràng, cập nhật về chuyên khoa, quá trình huấn luyện - đào tạo, kinh nghiệm công tác.</p>
                        <p>2. Cung cấp nội dung hướng dẫn giúp bệnh nhân dễ dàng lựa chọn bác sĩ phù hợp với vấn đề của mình để đi khám đạt hiệu quả cao.</p>
                        <p>3. Hệ thống gợi ý danh sách bác sĩ phù hợp để bệnh nhân lựa chọn dựa trên dấu hiệu, triệu chứng hoặc lý do đi khám.</p>
                        <p>4. Hệ thống sẽ cập nhật những ý kiến phản hồi của bệnh nhân đã đi khám với từng bác sĩ để bệnh nhân có thêm thông tin tham khảo, lựa chọn bác sĩ phù hợp.</p>
                        <p>Chúng tôi đang nghiên cứu, từng bước ứng dụng trí tuệ nhân tạo/dữ liệu lớn (AI/Big Data) để kết nối bệnh nhân đến đúng với bác sĩ phù hợp với tình trạng của mình.</p>
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection