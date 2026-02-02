
@foreach ($datas as $key => $data)
  <a href="{{url('/facilities')}}/{{$data->code}}" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business" style="padding:10px">
    <div class="service-work overflow-hidden card  m-sm-0">
        <img class="card-img-top" style="height: 150px;object-fit: cover;" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($data->avatar)?$data->avatar:'' }}" alt="...">
        <div class="card-body" >
            <h5 class="card-title light-300 text-dark">{{$data->name_hospital}}</h5>
            <p class="card-text light-300 text-dark">
            {{$data->address}}
            </p>
            <!-- <span class="text-decoration-none text-primary light-300">
                Đặt lịch khám <i class='bx bxs-hand-right ms-1'></i>
            </span> -->
            <span style="background:#3c9200;color: #ffd100" class="btn btn-outline-light rounded-pill">Đặt lịch khám</span>
        </div>
    </div>
  </a>
    <!-- <div class="col-md-3 mb-3">
        <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
            <img class="recent-work-img card-img" style="height: 150px;width: 300px;object-fit: cover;" src="{{url('/file-image-client/avatar-hospital/')}}/{{ !empty($data->avatar)?$data->avatar:'' }}" alt="Card image">
            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                <div style="background: radial-gradient(#000000c2, transparent);border-radius: 5px" class="recent-work-content text-start mb-3 ml-3 text-dark">
                    <h3 class="card-title">{{$data->name_hospital}}</h3>
                    <span style="color: #ffd100" class="btn btn-outline-light rounded-pill">Đặt lịch khám</span>
                </div>
            </div>
        </a>
    </div> -->
@endforeach
