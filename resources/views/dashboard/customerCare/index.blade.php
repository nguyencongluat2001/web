@extends('dashboard.layouts.index')
@section('body')
<script src="{{URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/js/moment-with-locales.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/pages/JS_CustomerCare.js') }}"></script>
<link rel="stylesheet" href="{{URL::asset('dist/css/backend/customerCase.css')}}">
<div class="container-fluid">
    <div class="row">
        <form action="" method="POST" id="frmCustomerCare_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <section class="content-wrapper">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{--<div class="row form-group">
                            <div class="col-md-3">
                                <button class="btn btn-success shadow-sm" id="btn_add" type="button" data-toggle="tooltip" data-original-title="Thêm cổ phiếu"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-danger shadow-sm" id="btn_delete" type="button" data-toggle="tooltip" data-original-title="Xóa cổ phiếu"><i class="fas fa-trash-alt"></i></button>
                            </div>
                            <div class="input-group" style="width:30%;height:10%">
                                <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm theo mã CP, người đảm nhận...">
                            </div>
                            <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                        </div>--}}
                        <!-- Màn hình danh sách -->
                        <div class="row" id="table-container" style="padding-top:10px"></div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<div class="modal fade" id="editmodal" data-backdrop="static" role="dialog"></div>

<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_CustomerCare = new JS_CustomerCare(baseUrl, 'system', 'customerCare');
    $(document).ready(function($) {
        JS_CustomerCare.loadIndex(baseUrl);
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.2.0/pusher.min.js"></script>
<script>
    // chat ng dung
    const pusher = new Pusher("{{config('chat.pusher.key')}}", {
        cluster: 'ap1'
    });
    const chanel = pusher.subscribe('public');

    chanel.bind('chat', function(data) {
        $.ajax({
            url: '/system/customerCare/receive',
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                message: data.message,
                phone: data.phone
            },
            success: function(res) {
                $("#frmCustomerCare_index .active_" + data.phone + " .messages-chat").append(res);
                var dateNow = moment().format('YYYYMMDDHHmmss');
                var html = '';
                if($("#discussions #active_" + data.phone).html() == undefined
                || $("#discussions #active_" + data.phone).html() == ''){
                    html += '<div class="discussion" id="active_' + data.phone + '" onclick="JS_CustomerCare.message(\'' + data.phone + '\')" style="cursor: pointer;">';
                }
                html += '<div class="desc-contact">';
                html += '<p class="name font-bold">' + data.phone + '</p>';
                html += '<p class="message font-bold">' + data.message + '</p>';
                html += '</div>';
                html += '<div class="timer">' + moment(dateNow, "YYYYMMDDhmmss").locale('vi').fromNow() + '</div>';
                if($("#discussions #active_" + data.phone).html() !== undefined
                && $("#discussions #active_" + data.phone).html() !== ''){
                    $("#active_" + data.phone).html(html);
                }else{
                    html += '</div>';
                    $("#discussions").prepend(html);
                }
            }
        });
    });
    
</script>
@endsection