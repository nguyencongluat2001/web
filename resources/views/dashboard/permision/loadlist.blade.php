<style>
    /* .bold {
        font-weight: normal;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .hide {
        display: none;
    } */

    /* .font {
        font-style: italic;
    } */
    /* .th{
        text-align: center;
    }   */
    .box1{
        text-align: center;
        background-color:#ffecec;
    }
    .box2{
        text-align: center;
        background-color:#ddffce;
    }
    .box3{
        text-align: center;
        background-color:#feffcf;
    }
    .box4{
        text-align: center;
        background-color:#cafbff;
    }
    .box5{
        text-align: center;
        background-color:#d2e1ff;
    }
</style>
<div class="div_tab_head">
    <table class="table table-bordered table-responsive" style="margin-bottom:0px;font-size: 13px;">
        <colgroup>
            <col width="5%">
            <col width="20%">
            <col width="14%">
            <col width="14%">
            <col width="14%">
            <col width="14%">
            <col width="14%">
            <col width="5%">
        </colgroup>
        <thead>
        <tr style="background:#0a0c1ae3;color:white">
            <!-- <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td> -->
            <th style="text-align: center" colspan="1">Tên chức năng</th>
            <th style="text-align: center" colspan="1">Editor Tổng</th>
            <th style="text-align: center" colspan="1">Editor Pro</th>
            <th style="text-align: center" colspan="1">Editor</th>
            <th style="text-align: center" colspan="1">Sales Admin</th>
            <th style="text-align: center" colspan="1">Sales</th>
            <th style="text-align: center" colspan="1">Sửa quyền</th>
        </tr>
        </thead>
        <body>
            @foreach ($data as  $value)
                <tr>
                    <!-- <td style="padding-top: 20px;"align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $value['id'] }}"></td> -->
                    <!-- <td style="text-align: center;">1</td> -->
                    <td style="text-align: left;"><b>{{$value['name_cate']}}</b></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td style="text-align: center"><input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/></td>
                    <td class="text-center" style="vertical-align: middle;">
                        <span class="text-cursor text-warning" onclick="JS_Permision.edit('{{$value['id']}}')"><i class="fas fa-edit"></i></span>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
</div>

