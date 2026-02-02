<style>
    .unit-edit span {
        font-size: 19px;
    }

    header
    {
      font-family: 'Lobster', cursive;
      text-align: center;
      font-size: 25px ;  
    }

    #info
    {
      font-size: 18px;
      color: #555;
      text-align: center;
      margin-bottom: 25px;
    }

    a{
      color: #074E8C;
    }

    .scrollbar
    {
      margin-left: 30px;
      /* float: left; */
      height: 320px;
      /* width: 65px; */
      /* background: #F5F5F5; */
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow
    {
      min-height: 320px;
    }

    #wrapper
    {
      text-align: center;
      width: 500px;
      margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track
    {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
      width: 12px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb
    {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #D62929;
    }
</style>

<div class="card mb-4 ">
    <div class="card-header pb-0 px-3">
        <div class="row">
            <div class="col-md-6">
            <h6 class="mb-0">Chỉ số</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
            </div>
        </div>
        </div>
        <div class="scrollbar" id="style-1" style="padding-right:10px">
          <div class="card-body pt-4 p-3" >
              <ul class="list-group">
                  @foreach ($datas as $key => $data)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                      <div class="d-flex align-items-center">
                      <span>
                        <i style="padding:5px;color:#ffcd19" class="fas fa-coins"></i>
                    </span>
                      <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">{{ $data['symbol']}}</h6>
                            <span class="text-xs">{{ $data['date']}}</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                          {{ $data['priceHigh']}}
                      </div>
                    </li>
                  @endforeach
              </ul>
          </div>
        </div>
    </div>
</div>
