<style>
    form{
        width:100%;
    }
    .hiddel{
        display: none;
    }
    .show{
        display: block;
    }
    .modal-dialog {
        padding-top: 100px;
    }
    a {
    text-decoration: none;
    }
</style>
<form id="frmFlow" role="form" action="" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($datas->id) ? $datas->id : ''}}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content card" style="background:#fff0;border: 0px solid rgb(0 0 0 / 0%)">
            <div class="modal-body">
                {{-- <table id="myTable" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                    <tbody id="body_data" style="background: #fdffff;">
                            @foreach ($data as $key => $data)
                                <tr>
                                    <td style="white-space: inherit;vertical-align: middle;" >
                                    <span style="color:#254885;font-size:16px">{{ isset($data['name']) ? $data['name'] : '' }}  </span><br>
                                    </td>
                                    <td style="white-space: inherit;vertical-align: middle;" align="center">
                                        <a href="{{url('appointmentathome/')}}/{{$data['code']}}">
                                            <span style="background: #ffba4b; color: #0d1226;" class="btn btn-outline-light rounded-pill">Đặt lịch</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                --}}
                @foreach ($data as $key => $data)
                    <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden my-3" style="background:#ffffff">
                    
                        <div class="text-light col-lg-12" style="padding-top: 20px;padding-bottom: 10px;">
                            <ul class="text-left list-unstyled mb-0" style="color: #596986;font-family: ui-monospace;">
                                <li class="text-center" style="color: #2a2d45;font-family: serif;font-weight: 600;"><span>{{ isset($data['name']) ? $data['name'] : '' }}</span></li>
                            </ul>
                        </div>
                        <a href="{{url('appointmentathome/')}}/{{$data['code']}}">
                        <div class="pricing-horizontal-icon col-md-12 text-center text-light p-0" style="margin-bottom: 10px;">
                            <a href="{{url('appointmentathome/')}}/{{$data['code']}}">
                                <span style="background: #62caff;color: #ffeec0;font-weight: 700;width: 150px;" class="btn btn-outline-light rounded-pill">Đặt lịch</span>
                            </a>
                        </div>
                        </a>
                    </div>
                @endforeach
                <div class="modal-footer pt-2" style="border-top: 1px solid #dee2e600;">
                    <button style="background: #ffffff;color: black;" type="button" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


