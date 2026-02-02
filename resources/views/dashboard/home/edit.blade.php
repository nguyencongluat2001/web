<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
    
</form>
