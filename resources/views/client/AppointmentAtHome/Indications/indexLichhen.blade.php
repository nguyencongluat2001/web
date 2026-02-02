@extends('client.layouts.index')
@section('body-client')
<br>
<br>
    <div class=" bg-light pt-5" >
        <div id="" class="banner-vertical-center-index">
            <div class="carousel-inner active" >
                <div class="banner-content col-lg-8 col-10 offset-1 m-lg-auto text-left ">
                    <div class="container-fluid pt-5"style="background: white;">
                    <div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
          <colgroup>
            <col width="90%">
            <col width="10%">
        </colgroup>
        <thead>
            <tr style="color: #000000;">
                <td style="white-space: inherit;vertical-align: middle;" align="center"><b>Thông tin chỉ định</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
                @foreach ($datas as $key => $data)
                @php $id = $data['id']; $i = 1; @endphp
                    @if(!empty($data['status_gh']) && $data['status_gh'] == 1)
                    <tr style="background: linear-gradient(#f9fcff, #d0fff9c9)">
                    @else
                    <tr>
                    @endif
                        <td style="white-space: inherit;vertical-align: middle;">
                            <span>Ngày hẹn: <span style="color: #1b2b74;font-weight: 700;">{{ isset($data['appointment']) ? $data['appointment'] : '' }} + thêm 3 ngày</span></span> <br>
                            <span>Mã ống nghiệm cũ: <span style="color: #ff0000;font-weight: 600;">{{ isset($data['code_patient']) ? $data['code_patient'] : '' }}</span></span> <br>
                            <span>Tên bệnh nhân: {{ isset($data['name']) ? $data['name'] : '' }}</span> <br>
                            <span>Năm sinh: {{ isset($data['date_birthday']) ? $data['date_birthday'] : '' }}</span> <br>
                            <span>Số điện thoại: {{ isset($data['phone']) ? $data['phone'] : '' }}</span><br>
                            <span>Địa chỉ: {{ isset($data['address']) ? $data['address'] : '' }}</span><br>
                            <!-- <span>Số tiền: {{ !empty($data['money']) ? number_format($data['money'],0, '', ',') : '' }} VNĐ </span><br> -->
                            <span>Ngày tạo lịch cũ: {{ isset($data['created_at']) ? $data['created_at'] : '' }}</span> <br>

                            @if(!empty($data['link_excel']) && $data['link_excel'] != null)
                            <span>Link Excel: <span style="color:#009efe"><a href="{{$data['link_excel']}}">Xem</a></span> </span><br>
                            @endif
                            @if(!empty($data['status_gh']) && $data['status_gh'] == 1)
                            <span>Trạng thái đợt cũ: <span style="color: #ea00ff;font-weight: 500;">Đã có kết quả</span> </span><br>
                            <span>File kết quả đợt cũ: <span style="color:#009efe"><a href="{{$data['url']}}">{{$data['filename']}}</a></span> </span><br>
                            @endif 
                        </td>
                    </tr>
                   
                @endforeach
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
@endsection

