@extends('client.layouts.index')
@section('body-client')
<style>
    #contact .service-tag {
        font-size: 20px;
    }
    @media (max-width: 450px){
        #contact .service-wrapper{
            padding-top: 1rem!important;
        }
        #contact .service-tag {
            font-size: 16px;
        }
    }
</style>

<div id="contact">
    <section class="service-wrapper mt-5 pt-5">
        <div class="container">
            <div class="col-md-12 pt-3">
                <h2 class="h2 text-center col-12 py-2">Liên hệ</h2>
            </div>
        </div>
    </section>
    <section class="container popular-specialties mb-5">
        <div class="service-tag py-3 row">
            <p>Nền tảng Đặt khám Booking</p>
            <table class="table">
                <colgroup>
                    <col width="10%">
                    <col width="90%">
                </colgroup>
                <tbody>
                    <tr>
                        <td>Điện thoại</td>
                        <td><a href="tel:02439036555">02439935556</a></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@company.com">info@company.com</a></td>
                    </tr>
                    <tr>
                        <td>Trực thuộc</td>
                        <td>Công ty TNHH dịch vụ y tế BOOKING HOSPITAL</td>
                    </tr>
                    <tr>
                        <td>ĐKKD số</td>
                        <td>123456789, Sở KH-ĐT Hà Nội cấp ngày: 21/09/2023</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>Quận Cầu Giấy, Thành phố Hà Nội, Việt Nam</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection