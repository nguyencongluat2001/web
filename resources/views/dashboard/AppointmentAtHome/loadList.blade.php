<style>
    .unit-edit span {
        font-size: 19px;
    }
    td > p { overflow-y:scroll;overflow-x:hidden;} 
</style>
<span>Doanh thu theo tiêu thức lọc: <span style="font-weight: 600; color: #ff8414;">{{$sumMoney}}</span> VND</span>
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>Thông tin</b></td>
                @if($_SESSION['role'] == 'ADMIN')
                <td align="center"><b>Phê duyệt</b></td>
                @endif
                <td align="center"><b>Chi tiết</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
            @if(count($datas) > 0)
                @foreach ($datas as $key => $data)
                @php $id = $data->id; $i = 1; @endphp
                    @if($data->status == 1)
                    <tr style="background:#ceffdf">
                    @else 
                    <tr>
                    @endif
                        <td style="white-space: inherit;vertical-align: middle;" align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data->id }}">
                        </td>
                        <td>
                            <span>Ngày tạo: {{ isset($data->created_at) ? $data->created_at : '' }}</span> <br>
                            <span>Mã code: <span style="font-weight: 600;color:#f90000">{{ isset($data->code) ? $data->code : '' }}</span></span> <br>
                            <span>Tên bệnh nhân: <span style="font-weight: 600;">{{ isset($data->name) ? $data->name : '' }}</span></span> <br>
                            <span>Năm sinh: {{ isset($data->date_birthday) ? $data->date_birthday : '' }}</span> <br>
                            <span>Số điện thoại: {{ isset($data->phone) ? $data->phone : '' }}</span><br>
                            <span>Số tiền:  <span style="font-weight: 600;color:#ff6200">{{ !empty($data->money) ? number_format($data->money,0, '', ',') : '' }}</span> VNĐ </span><br>
                            <span>Lấy mẫu: Lúc <span style="font-weight: 600;">{{ isset($data->hour_sampling) ? $data->hour_sampling : '' }}</span>
                            Ngày <span style="font-weight: 600;">{{Carbon\Carbon::parse($data->date_sampling)->format('d-m-Y')}}</span>
                              - Tại <span style="font-weight: 600;">{{ isset($data->address) ? $data->address : '' }}</span>  </span> <br>
                            <span>CTV chỉ định: {{ isset($data->code_ctv) ? $data->code_ctv : '' }}</span> <br>
                            <span>Trạng thái thanh toán: {{ $data->status == 1 ? 'Đã xác nhận' : 'Chưa xác nhận' }}</span> <br>
                            @if(!empty($data['status_gh']) && $data['status_gh'] == 1)
                            <span>Trạng thái kết quả: <span style="color: #ea00ff;font-weight: 600;">Đã có kết quả</span> </span><br>
                            <span>File kết quả: <span style="color:#009efe"><a style="color:#00baff !important" href="{{$data['url']}}">{{$data['filename']}}</a></span> </span><br>
                            @endif  
                        </td>
                        @if($_SESSION['role'] == 'ADMIN')
                        <td style="white-space: inherit;vertical-align: middle;" onclick="{select_row(this);}" align="center">
                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                                <span class="custom-control-indicator p-0 m-0" onclick="JS_AppointmentAtHome.changeStatusAppointmentAtHome('{{$id}}')"></span>
                            </label>
                        </td>
                        @endif
                        <td style="width:5% ;white-space: inherit;vertical-align: middle;" align="center"> <br>
                            <button onclick="JS_AppointmentAtHome.showDetail('{{$id}}')" class="btn btn-light"  type="button">
                                <i style="color:#00740a" class="far fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(count($datas) > 0)
            <tr class="fw-bold" id="pagination">
                <td colspan="10">{{$datas->links('pagination.phantrang')}}</td>
            </tr>
            @else
            <tr id="pagination" align="center">
                <td colspan="10">Không tìm thấy dữ liệu!</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>
