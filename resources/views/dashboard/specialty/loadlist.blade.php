<style>
    .unit-edit span {
        font-size: 19px;
    }
    body {margin:2rem;}
        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }



        .modal-body {
        position:relative;
        padding:0px;
        }
        .close {
        position:absolute;
        right:-30px;
        top:0;
        z-index:999;
        font-size:2rem;
        font-weight: normal;
        color:#fff;
        opacity:1;
        }

        td > p { overflow-y:scroll;overflow-x:hidden;} 
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Mã chuyên khoa</b></td>
                <td align="center"><b>Tên chuyên khoa</b></td>
                <td align="center"><b>Avatar</b></td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($datas as $key => $data)
                <tr>
                    <td style="padding-top: 20px;vertical-align: middle;"align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data->id }}"></td>
                    <td style="padding-top: 20px;vertical-align: middle;"align="center">{{ $key + 1 }}
                    <td style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                       {{$data->code}}
                    </td>
                    <td style="padding-top: 20px;white-space: inherit;vertical-align: middle;" ondblclick="" onclick="{select_row(this);}">
                       {{$data->name_specialty}}
                    </td>
                    <td style="width:20%;vertical-align: middle;" align="center"><img  src="{{url('/file-image-client/avatar-specialty/')}}/{{ !empty($data->avatar)?$data->avatar:'' }}" alt="Image" style="height: 150px;width: 150px;object-fit: cover;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang')}}
            </td>
        </tr>
    </tfoot>
</div>
<!-- <div class="modal" id="videomodal" role="dialog"></div> -->

<script>
function coppy(e) {
  navigator.clipboard.writeText(e);
  // Alert the copied text
  Swal.fire({
    position: 'top-start',
    icon: 'success',
    title: 'Coppy đường dẫn thành công!',
    showConfirmButton: false,
    timer: 3000
    })
}
</script>
