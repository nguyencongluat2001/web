<style>

        td > p { overflow-y:scroll;overflow-x:hidden;} 
        .table-responsive.pmd-card.pmd-z-depth{
                max-height: 1000px;
        }
</style>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{isset($_id) ? $_id : ''}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content  card">
                <div class="modal-header">
                    <h5 class="modal-title">Các chỉ số xét nghiệm</h5>
                    <div class="modal-footer pt-2">
                        <button class="btn btn-sm" type="button" data-bs-dismiss="modal">
                            x
                        </button>
                    </div>
                </div>
                    <div class="table-responsive pmd-card pmd-z-depth ">
                        <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                            <thead>
                                <tr>
                                    <td align="center"><input type="checkbox" name="chk_all_item_id"
                                            onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                                    <td align="center"><b>STT</b></td>
                                    <td align="center"><b>Tên xét nghiệm</b></td>
                                    <td align="center"><b>Giá xét nghiệm</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($arr_price as $key => $data)
                                    <tr>
                                        <td style="padding-top: 20px;vertical-align: middle;"align="center"><input type="checkbox" name="chk_item_id"
                                                value="{{ $data['id'] }}"></td>
                                        <td style="padding-top: 20px;vertical-align: middle;"align="center">{{ $key + 1 }}
                                        <td style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                                        {{$data['name']}}
                                        </td>
                                        <td style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                                        {{$data['price']}}  VND
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer pt-2">
                        <button style="background:#70be9e" type="button" data-bs-dismiss="modal">
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

