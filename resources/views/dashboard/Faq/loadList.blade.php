<div class="pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="5%">
            <col width="5%">
            <col width="20%">
            <col width="30%">
            <col width="10%">
            <col width="10%">
            <col width="5%">
        </colgroup>
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Tên câu hỏi</b></td>
                <td align="center"><b>Câu trả lời</b></td>
                <td align="center"><b>Thứ tự</b></td>
                <td align="center"><b>Trạng thái</b></td>
                <td align="center"><b>#</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
            @if(count($datas) > 0)
            @foreach ($datas as $key => $data)
            @php $id = $data->id; $i = 1; @endphp
            <tr>
                <td align="center"><input type="checkbox" ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="{{ $data->id }}"></td>
                <td onclick="{select_row(this);}" align="center">{{ $key + 1 }}</td>
                <td onclick="{select_row(this);}">{{ $data->question }}</td>
                <td onclick="{select_row(this);}">{{ $data->answer }}</td>
                <td onclick="{select_row(this);}">{{ $data->order }}</td>
                <td onclick="{select_row(this);}" align="center">
                    <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                        <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                        <span class="custom-control-indicator p-0 m-0" onclick="JS_FAQ.changeStatus('{{$id}}')"></span>
                    </label>
                </td>
                <td align="center"><span class="text-cursor text-warning" onclick="JS_FAQ.edit('{{$id}}')"><i class="fas fa-edit"></i></span></td>
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
            <tr>
                <td colspan="10" align="center">Không tìm thấy dữ liệu!</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>