@php
use Modules\System\Dashboard\CustomerCare\Models\CustomerCareModel;
@endphp

{{--@php
$ip = gethostbyname(trim(exec("hostname")));
$columnSelect = ['phone', 'ip', \DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as created_at")];
$columnGroup = ['phone', 'ip', \DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00')")];
$customerCare = CustomerCareModel::select($columnSelect)->where('ip', $ip)->groupBy($columnGroup)->orderBy('created_at', 'desc')->get();
foreach($customerCare as $key => $value){
    $date = date('Y-m-d', strtotime($value->created_at));
    $c = CustomerCareModel::where('ip', $value->ip)->where('phone', $value->phone)->whereRaw("cast(created_at as date) >= '$date' and cast(created_at as date) <= '$date'")->orderBy('created_at', 'desc')->first();
    $value->message = '';
    $value->check = 0;
    if(!empty($c->reply)){
        $value->message = $c->reply;
        $value->check = 1;
    }elseif(!empty($c->question)){
        $value->message = $c->question;
    }
}

@endphp--}}
<!-- <form action="" method="POST" id="frmChat_box" autocomplete="off">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <span class="form-group input-group" style="align-items: center;">
        @if(isset($notification))
        <div id="alertNotifi" class="form-control alertNotifi" @if(count($notification) <=0) hidden @endif>
            <span>Bạn có {{count($notification)}} thông báo mới</span>
        </div>
        @endif
        <div class="input-group-btn messageClose" id="messageCustomer">
            <label class="" for="message">
                <img width="70px" height="70px" style="background-color: none" src="../clients/img/support.jpg" alt="">
            </label>
        </div>
    </span>

    <section class="avenue-messenger messageCustomer transform" id="">
        <div class="chat">

            <div class="chat-title-customer">
                <span class="title-header">
                    <span class="icon-back" style="cursor: pointer; color: #fff; display:none;margin-right: 10px;font-size: 18px;" ><i class="fas fa-angle-left"></i></span>
                    <span class="text-uppercase" style="color: #fff;font-size: 18px;letter-spacing: 1px;font-family: Trocchi, serif;">Chào mừng bạn đã đến với Booking Fast</span>
                    <p class="text-capitalize mb-0">Nhập số điện thoại để liên hệ Dịch vụ Khách hàng, chúng tôi luôn túc trực 24/7</p>
                </span>
                <span class="messageClose">
                    <i class="fa fa-window-close fa-xs" aria-hidden="true" style="color: rgb(255, 255, 255);font-size: 22px;"></i>
                </span>
            </div>
        </div>
        <div class="table-responsive">
            <div id="table-container-box">
                @if(!isset($customerCare) || (count($customerCare) > 0) && isset($customerCare))
                {{--<div class="list-chat">
                    <div class="list-title">Danh sách hội thoại</div>
                    <div class="list-list">
                        @if(isset($customerCare) && count($customerCare) > 0)
                        @foreach($customerCare as $key => $value)
                        <div class="list-item" onclick="showMessage('{{$value->phone}}')">
                            <div class="avatar">
                                <img src="{{URL::asset('clients/img/logo.png')}}" alt="" width="50px">
                            </div>
                            <div class="list-last-info">
                                <div class="d-flex flex-row">
                                    <div class="list-name">{{$value->check == 1 ? 'BOOKING FAST' : $value->phone}}</div>
                                    <div class="list-time"><span>{{!empty($value->created_at) ? date('d/m/Y', strtotime($value->created_at)) : ''}}</span></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="list-last-message">
                                        <div class="list-last-mes">{{$value->message ?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>--}}
                @endif
                {{-- <div class="form-group" id="txt-phone" @if(isset($customerCare) && count($customerCare) > 0) hidden @endif> --}}
                <div class="form-group" id="txt-phone">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                    <p class="errorPhone"></p>
                </div>
            </div>
            <div id="body-message" style="display: none;"></div>
        </div>
        <div class="start col-md-12">
            @if(!isset($customerCare) || (count($customerCare) > 0) && isset($customerCare))
            {{-- <button type="button" id="start_new" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Bắt đầu cuộc trò truyện mới</button> --}}
            @endif
            {{-- <button type="button" id="start" class="btn btn-primary" @if(isset($customerCare) && count($customerCare) > 0) hidden @endif><i class="fa fa-paper-plane"></i> Bắt đầu cuộc hội thoại</button> --}}
            <button type="button" id="start" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Bắt đầu cuộc hội thoại</button>
        </div>
        <div class="sendMessage" style="display: none;">
            <div class="row">
                <div style="width: 83.33333%">
                    <input type="text" name="txt-message" id="txt-message" class="form-control">
                </div>
                <div style="width: 16.66667%">
                    <button type="button" id="sendMessage" class="btn btn-primary"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </section>
</form> -->