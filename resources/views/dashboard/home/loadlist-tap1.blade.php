<style>
    .unit-edit span {
        font-size: 19px;
    }


    header
{
  font-family: 'Lobster', cursive;
  text-align: center;
  font-size: 25px;  
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

.scrollbar1
{
  margin-left: 30px;
  /* float: left; */
  height: 400px;
  /* width: 65px; */
  /* background: #F5F5F5; */
  overflow-y: scroll;
  margin-bottom: 25px;
}

.force-overflow
{
  min-height: 450px;
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
<table id="table-tap1-data">

<div class="pb-0 p-3">
    <div class="row">
        <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Mã ngân hàng</h6>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-outline-primary btn-sm mb-0">Chỉ số</button>
        </div>
    </div>
</div>
<div class="scrollbar1" id="style-1">
  <div class="force-overflow">
  <div class="card-body p-1 pb-0">
        <ul class="list-group">
            @foreach ($datas as $key => $data)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex " style="display:flex">
                    <!-- <div class="card-header mx-4 p-3 text-center"> -->
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                <i class="fas fa-landmark opacity-10"></i>
                            <!-- </div> -->
                            </div>
                            <div style="padding:20px;">
                                {{ $data['symbol']}}
                            </div>
                        <!-- <h6 class="mb-1 text-dark font-weight-bold text-sm"></h6> -->
                        <!-- <span class="text-xs">#MS-415646</span> -->
                    </div>
                    <div class="d-flex align-items-center text-sm">
                        @if($data['value'] < 0 )
                        <span style="color:red">
                           {{ $data['value']}}
                        </span>
                        @else 
                             {{ $data['value']}}
                        @endif
                        <!-- <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button> -->
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
</table>
<script>
    $(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
          }
      });
</script>
