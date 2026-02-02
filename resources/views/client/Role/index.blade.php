@extends('client.layouts.index')
@section('body-client')
<style>
    #roles .nav-link {
        margin-right: 2rem;
    }

    #roles .nav-tabs {
        border-bottom: none;
    }

    #roles .nav-tabs .nav-link {
        border: none;
    }

    #roles .nav-tabs .nav-link.active {
        border: none;
    }

    #roles .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border: none;
    }

    #roles .nav.nav-tabs button {
        background: unset;
    }
    #roles .nav.nav-tabs button div p {
        margin-bottom: 0;
    }

    #roles .nav.nav-tabs button:focus {
        outline: unset;
    }

    #roles .nav .nav-link i {
        font-size: 2rem;
    }

    #roles .nav .nav-link.active i,
    #roles .nav .nav-link.active p {
        color: #49bce2;
    }

    #roles .nav .nav-link span {
        font-size: 1rem;
    }

    #roles #nav-tabContent {
        border-top: 1px solid transparent;
        border-color: #e9ecef #e9ecef #dee2e6;
    }
    #nav-comments ol li{
        font-size: 1rem;
    }
    @media (max-width: 991px){
        #roles .nav-link {
            margin-right: 1rem;
        }
    }
    @media (max-width: 768px){
        #roles .service-wrapper{
            padding-top: 1rem!important;
        }
        #roles .nav-link{
            margin-right: 0;
        }
        #roles .nav.nav-tabs button div{
            display: flex;
        }
        #roles .nav.nav-tabs button div p{
            padding-left: 5px;
        }
        #roles .nav.nav-tabs button{
            text-align: left;
            width: 100%;
        }
        #roles .nav .nav-link i{
            font-size: 1.5rem;
            width: 30px;
        }
        #roles ol, ul {
            padding-left: 1rem;
        }
        #roles li{
            text-align: justify;
        }
        #nav-tabContent p {
            text-align: justify;
        }
    }
    @media (max-width: 450px){
        #roles .service-wrapper{
            padding-top: 1rem!important;
        }
        #roles .nav-link{
            margin-right: 0;
        }
        #roles .nav.nav-tabs button div{
            display: flex;
        }
        #roles .nav.nav-tabs button div p{
            padding-left: 5px;
        }
        #roles .nav.nav-tabs button{
            text-align: left;
            width: 100%;
        }
        #roles .nav .nav-link i{
            font-size: 1.5rem;
            width: 30px;
        }
        #roles ol, ul {
            padding-left: 1rem;
        }
        #roles li{
            text-align: justify;
        }
        #nav-tabContent p {
            text-align: justify;
        }
    }
</style>

<div id="roles">
    <section class="service-wrapper py-3 mt-5 pt-5">
        <div class="container pb-3 pt-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="true">
                        <div><i class="fas fa-user-nurse"></i><p>Bác sĩ uy tín</p></div>
                    </button>
                    <button class="nav-link" id="nav-calendar-tab" data-bs-toggle="tab" data-bs-target="#nav-calendar" type="button" role="tab" aria-controls="nav-calendar" aria-selected="false">
                        <div><i class="fas fa-calendar-check"></i><p>Đúng người đúng bệnh</p></div>
                    </button>
                    <button class="nav-link" id="nav-comments-tab" data-bs-toggle="tab" data-bs-target="#nav-comments" type="button" role="tab" aria-controls="nav-comments" aria-selected="false">
                        <div><i class="fas fa-comments"></i><p>Hỗ trợ chu đáo</p></div>
                    </button>
                    <button class="nav-link" id="nav-clock-tab" data-bs-toggle="tab" data-bs-target="#nav-clock" type="button" role="tab" aria-controls="nav-clock" aria-selected="false">
                        <div><i class="fas fa-clock"></i><p>Đặt lịch 24/7</p></div>
                    </button>
                </div>
            </nav>
            <div class="tab-content pt-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                    <h2>Bác sĩ uy tín</h2>
                    <p>Booking giúp bệnh nhân dễ dàng lựa chọn đúng bác sĩ từ mạng lưới bác sĩ chuyên khoa giỏi, với thông tin đã xác thực và đặt lịch nhanh chóng.</p>
                    <p>Bác sĩ chuyên khoa giỏi, được nhiều bệnh nhân tin tưởng, đồng nghiệp đánh giá cao, có uy tín trong ngành.</p>
                    <p>Các bác sĩ đã, đang công tác tại các bệnh viện hàng đầu như: Bệnh viện Bạch Mai, Bệnh Viện Việt Đức, Bệnh viện TW Quân đội 108, Bệnh viện Quân Y 103, Bệnh viện Nhi TW, Bệnh viện Tai Mũi Họng TW, Viện Tim mạch Việt Nam, Bệnh viện Chợ Rẫy, Bệnh viện Đại học Y dược TP.HCM, Bệnh viện Nhân dân 115…</p>
                    <p>Các bác sĩ có lịch khám tại các bệnh viện công lớn hoặc phòng khám tư nhân uy tín, được chọn lọc kỹ lưỡng tại Hà Nội và TP.HCM.</p>
                    <p>Bên cạnh đó, hệ thống ghi nhận ý kiến đánh giá phản hồi của bệnh nhân sau khi đi khám và phương án điều trị của từng bác sĩ. Từ đó chúng tôi có thêm thông tin để giới thiệu trên hệ thống những bác sĩ uy tín, chuyên môn cao.</p>
                </div>
                <div class="tab-pane fade" id="nav-calendar" role="tabpanel" aria-labelledby="nav-calendar-tab">
                    <h2>Đúng người, đúng bệnh</h2>
                    <p>Các chuyên khoa được tổ chức khoa học, thông tin và kinh nghiệm bác sĩ được xác thực, nội dung bài viết cẩm nang dễ hiểu cùng với sự gợi ý từ hệ thống, bệnh nhân đặt khám đúng bác sĩ chuyên khoa giỏi phù hợp với vấn đề của mình.</p>
                    <p>“Đúng bác sĩ” giúp bệnh nhân được gặp đúng bác sĩ chuyên khoa giỏi với căn bệnh của mình. Qua đó, tiết kiệm thời gian, chi phí, góp phần nâng cao hiệu quả khám chữa bệnh.</p>
                    <p>Hệ thống Booking nỗ lực kết nối bệnh nhân đến "đúng bác sĩ" với vấn đề của mình.</p>
                </div>
                <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                    <h2>Hỗ trợ chu đáo</h2>
                    <ol>
                        <div>
                            <b>
                                <li>Giúp bệnh nhân dễ dàng lựa chọn đúng bác sĩ từ mạng lưới bác sĩ chuyên khoa giỏi với thông tin đã xác thực và đặt lịch nhanh.</li>
                            </b>
                        </div>
                        <div>
                            <ul>
                                <li>Mạng lưới bác sĩ chuyên khoa giỏi, uy tín, thông tin minh bạch, rõ ràng</li>
                                <li>Sắp xếp đúng bác sĩ mà bệnh nhân đặt lịch khám</li>
                                <li>Hỗ trợ trước, trong và sau khi đi khám</li>
                                <li>Bảo vệ quyền lợi của bệnh nhân khi đi khám</li>
                            </ul>
                        </div>
                        <div>
                            <b>
                                <li>Hỗ trợ trước, trong và sau khi đi khám.</li>
                            </b>
                        </div>
                        <div>
                            <span>Trước khám</span>
                        </div>
                        <div>
                            <ul>
                                <li>Nhắc lịch khám, dặn dò chuẩn bị trước khi đi khám</li>
                                <li>Hướng dẫn đi lại, quy trình làm thủ tục khám</li>
                            </ul>
                        </div>
                        <div>

                            <span>Trong khi khám</span>
                        </div>
                        <div>
                            <ul>
                                <li>Hỗ trợ giải quyết các vướng mắc trong khi khám</li>
                                <li>Hỗ trợ người bệnh những yêu cầu nảy sinh</li>
                            </ul>
                        </div>
                        <div>
                            <span>Sau khi khám</span>
                        </div>
                        <div>
                            <ul>
                                <li>Ghi nhận ý kiến của bệnh nhân sau khám</li>
                                <li>Hỗ trợ giải đáp, làm rõ những vấn đề chuyên môn</li>
                                <li>Hỗ trợ bảo vệ quyền lợi của bệnh nhân sau khi đi khám</li>
                            </ul>
                        </div>
                        <div>
                            <b>
                                <li>Khám lại miễn phí</li>
                            </b>
                        </div>
                        <div>
                            <ul>
                                <li>Sau khi đi khám, nếu người bệnh không hài lòng với qui trình khám, tư vấn và phương án điều trị của bác sĩ, hệ thống sẽ hỗ trợ bệnh nhân gặp lại bác sĩ để được khám và tư vấn kỹ hơn (nếu bệnh nhân có yêu cầu).</li>
                                <li>
                                    Bệnh nhân được hỗ trợ khám miễn phí với bác sĩ khác cùng chuyên khoa (nếu yêu cầu của bệnh nhân phù hợp).
                                </li>
                            </ul>
                        </div>
                        <div>
                            <span>Booking không trực tiếp cung cấp dịch vụ khám, chữa bệnh mà đóng vai trò trung gian kết nối giữa bệnh nhân và bác sĩ. Trong thực tế khám chữa bệnh, những vướng nảy sinh là khó tránh khỏi. Vì có quan hệ đối tác tin cậy với các bác sĩ, cơ sở y tế, chúng tôi sẽ hỗ trợ giải quyết băn khoăn của bệnh nhân một cách thấu đáo. Trong thực tế, nhiều thắc mắc của bệnh nhân đã được giải đáp rõ ràng hoặc hỗ trợ khám lại miễn phí.</span>
                        </div>
                    </ol>
                </div>
                <div class="tab-pane fade" id="nav-clock" role="tabpanel" aria-labelledby="nav-clock-tab">
                    <h2>Đặt lịch 24/7</h2>
                    <p>medhanoi.com hoạt động liên tục 24 giờ một ngày, 7 ngày một tuần, và 365 ngày một năm, kể cả ngày nghỉ và ngày lễ để bạn có thể đặt lịch trực tuyến. Đây là một lợi thế lớn của hệ thống đặt lịch khám trên Internet, hoạt động liên tục 24/7 thay vì chỉ giới hạn trong giờ hành chính như dịch vụ truyền thống.</p>
                    <p>Cụ thể như sau:</p>
                    <p>Đặt lịch trực tuyến: 24 giờ/ngày, 7 ngày/tuần, 365 ngày/năm. Người dùng đặt khám trực tuyến bằng cách chọn chuyên khoa, bác sĩ, bệnh viện hoặc phòng khám theo nhu cầu khám chữa bệnh.</p>
                    <p>Từ 6h30 - 18h00 hàng ngày (trừ ngày nghỉ, ngày lễ, Tết): Đội ngũ hỗ trợ của Booking sẽ hỗ trợ trực tiếp với những trường hợp khó khăn lựa chọn chuyên khoa, bác sĩ để đặt khám.</p>
                    <p>Bạn có thể sử dụng dịch vụ đặt lịch khám của Booking bất cứ lúc nào nếu bạn có một tình trạng sức khỏe không khẩn cấp, có kế hoạch thăm khám chủ động. Hoặc đơn giản là muốn có một lựa chọn phù hợp, hiệu quả thay cho việc đến đăng ký khám trực tiếp, xếp hàng và chờ đợi tại các cơ sở y tế.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection