
<div class="testsss">
    @foreach ($datas as $key => $data)
    <div class="card-body">
        <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
            <img src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png"
                alt="avatar 1" style="width: 30px; height: 100%;">
                <div style="padding-left:5px">
                <div class="p-3 ms-3" style="border-radius: 15px; background-color: #45ffa2;width:100%">
                <p style="font-size:14px;font-family:auto" class="small mb-0">
                    <h5>{{ $data->title }}</h5>
                    <span>Giá mua: {{ $data->price_buy }}</span> 
                    <span>Mục tiêu: {{ $data->target }}</span> 
                    <span>Dừng lỗ:  {{ $data->stop_loss }}</span> <br>
                    <span>Thời gian: {{date('H:i:s d-m-Y', strtotime($data->created_at))}}</span> <br>
                </p>
            </div>
        
        </div>
        </div>
        <div id="messages-content"></div>
    </div>
    @endforeach
</div>
            