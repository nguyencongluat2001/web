<style>
    .animate-charcter
    {
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #231557 0%,
        #44107a 29%,
        #ff1361 67%,
        #231557 100%
    );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 2s linear infinite;
    display: inline-block;
    }

    @keyframes textclip {
    to {
        background-position: 200% center;
    }
}
</style>
<form id="frmVideo"  role="form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#293251">
            <div class="modal-header">
                <h5 class="modal-title">{{$data['name_hospital']}}</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
        </div>
    </div>
</form>
