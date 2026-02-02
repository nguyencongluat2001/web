@if(count($datas) > 0)
<div class="table-responsive pmd-card pmd-z-depth " style="background: #dcf9ffd9;">
    <center><span style="font-size: 30px;font-family: math;color: #ff0202;font-weight: 600;">Dịch vụ đặt lịch khám nhanh tại các tuyến trung ương</span></center>
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="15%">
            <col width="25%">
            <col width="20%">
            <col width="15%">
            <col width="20%">
        </colgroup>
        <thead>
            <tr style="background: #243649;color: #ffa700;">
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Mã khám bệnh</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin khách hàng</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin dịch vụ</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin giao dịch</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Trạng thái</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
                @foreach ($datas as $key => $data)
                @php $id = $data['id']; $i = 1; @endphp
                    <tr>
                        <td style="white-space: inherit;vertical-align: middle;" align="center">{{ isset($data['code_schedule']) ? $data['code_schedule'] : '' }}</td>
                        <td style="white-space: inherit;vertical-align: middle;">
                            <span>Tên khách hàng: {{ isset($data['name']) ? $data['name'] : '' }}</span> <br>
                            <span>Số điện thoại: {{ isset($data['phone']) ? $data['phone'] : '' }}</span><br>
                            <span>Ngày sinh: {{ isset($data['date_of_brith']) ? $data['date_of_brith'] : '' }}</span><br>
                            <span>Địa chỉ: {{ isset($data['address']) ? $data['address'] : '' }}</span><br>
                            <span>Lý do: {{ isset($data['reason']) ? $data['reason'] : '' }}</span>
                        </td>
                        <td style="wwhite-space: inherit;vertical-align: middle;">
                            <span>Thời gian tạo lịch: {{ isset($data['created_at']) ? $data['created_at'] : '' }}</span> <br>
                            <span>Đơn vị: {{ isset($data['code_hospital']) ? $data['code_hospital'] : '' }}</span> <br>
                            <span>Khoa khám bệnh: {{ isset($data['code_specialty']) ? $data['code_specialty'] : '' }}</span><br>
                        </td>
                        <td style="wwhite-space: inherit;vertical-align: middle;">
                            <span>Số tiền: {{ isset($data['money']) ? $data['money'] : '' }}</span> <br>
                            <span>Thanh Toán qua:
                            @if($data['type_payment'] == 'BANK')
                                <span style="color:#00ab5f;white-space: inherit;vertical-align: middle;" align="center">Ngân hàng</span>
                                @else
                                <span style="color:#ff00c5;white-space: inherit;vertical-align: middle;" align="center">MoMo</span>
                                @endif
                            </span> <br>
                        </td>
                        @if($data['status'] == 1)
                        <td style="color:#00b406;white-space: inherit;vertical-align: middle;" align="center">Đã xác nhận - Thanh toán thành công</td>
                        @elseif($data['status'] == 0 || $data['status'] == '')
                        <td style="color: #ff6b00;white-space: inherit;vertical-align: middle;" align="center">Chưa xác nhận - chờ admin kiểm tra giao dịch!</td>
                        @else
                        <td style="color: #ff0000;white-space: inherit;vertical-align: middle;" align="center">Không nhận được tiền - nhân viên sẽ liên hệ khách hàng</td>
                        @endif
                    </tr>
                   
                @endforeach
        </tbody>
    </table>
</div>
@endif


@if(count($datas_athome) > 0)
<div class="table-responsive pmd-card pmd-z-depth " style="background: #fff2fec9;">
    <center><span style="font-size: 30px;font-family: math;color: #ff0202;font-weight: 600;">Dịch vụ đặt lịch lấy máu , truyền  dịch tại nhà</span></center>
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="15%">
            <col width="35%">
            <col width="35%">
            <col width="14%">
        </colgroup>
        <thead>
            <tr style="background: #243649;color: #ffa700;">
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Mã đặt lịch</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin khách hàng</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin dịch vụ</b></td>
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Trạng thái</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
                @foreach ($datas_athome as $key => $data)
                @php $id = $data['id']; $i = 1; @endphp
                    <tr>
                        <td style="white-space: inherit;vertical-align: middle;" align="center"> {{ isset($data['code']) ? $data['code'] : '' }} </td>
                        <td style="white-space: inherit;vertical-align: middle;">
                            <span>Tên Khách hàng: {{ isset($data['name']) ? $data['name'] : '' }}</span> <br>
                            <span>Số điện thoại: {{ isset($data['phone']) ? $data['phone'] : '' }}</span> <br>
                            <span>Giới tính: {{$data['sex'] == 1 ? 'Nam' : Nữ}}</span> <br>
                            <span>Địa chỉ: {{ isset($data['address']) ? $data['address'] : '' }}</span> <br>
                            <span>Lý do: {{ isset($data['reason']) ? $data['reason'] : '' }}</span> <br>
                        </td>
                        <td style="wwhite-space: inherit;vertical-align: middle;">
                            <span>Thời gian tạo lịch: {{ isset($data['created_at']) ? $data['created_at'] : '' }}</span> <br>
                            <span>Loại xét nghiệm: <b>{{ isset($data['type']) ? $data['type'] : '' }}</b></span> <br>
                            <span>Ngày lấy mẫu: <b>{{ isset($data['date_sampling']) ? $data['date_sampling'] : '' }}</b> ( Tháng - Ngày - Năm)</span> <br>
                            <span>Giờ lấy mẫu: <b>{{ isset($data['hour_sampling']) ? $data['hour_sampling'] : '' }} Phút</b></span> <br>
                            <span>Số tiền: <b>{{ isset($data['money']) ? $data['money'] : '' }} VND</b></span> <br>
                            <span>Thanh toán: <b>Tại nhà</b></span> <br>
                        </td>

                        @if($data['status'] == 1)
                        <td style="color:#00b406;white-space: inherit;vertical-align: middle;" align="center">Đã xác nhận</td>
                        @elseif($data['status'] == 0 || $data['status'] == '')
                        <td style="color: #ff6b00;white-space: inherit;vertical-align: middle;" align="center">Chưa xác nhận!</td>
                        @endif
                    </tr>
                   
                @endforeach
           
        </tbody>
    </table>
</div>
@endif


@if(empty($datas) && empty($datas_athome))
<center><span style="color:red">Không tìm thấy kết quả tra cứu!</span></center>
@endif