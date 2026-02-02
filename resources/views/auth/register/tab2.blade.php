<style>
    .form-control{
        background:#ffffff !important;
    }
</style>
<div class="card" style="background:#20364b94;">
    <div class="form-group" align="center">
        <div class="col-md-12 mt-4 mb-3">
            <h3 class="text-uppercase" style="font-family: Serif;color:#ffffff">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- <div class="form-wrapper col-md-4">
                <label for="">Thời gian đầu tư <span class="request_star">*</span></label>
                <select name="investment_time" id="investment_time" class="form-control chzn-select">
                    <option value="0-3">0 - 3 tháng</option>
                    <option value="3-6">3 - 6 tháng</option>
                    <option value="6-12">6 - 12 tháng</option>
                    <option value="1nam">> 1 năm</option>
                </select>
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Khẩu vị đầu tư</label>
                <select name="investment_taste" id="investment_taste" class="form-control chzn-select">
                    <option value="nganhan">Lướt sóng ngắn hạn</option>
                    <option value="daihan">Trung và dài hạn</option>
                    <option value="linhhoat">Linh hoạt kết hợp</option>
                </select>
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Công ty chứng khoán <span class="request_star">*</span></label>
                <select name="investment_taste" id="investment_taste" class="form-control chzn-select">
                    <option value="TKCK">Chưa TKCK</option>
                    <option value="vps">VPS</option>
                    <option value="ssi">SSI</option>
                    <option value="vnd">VND</option>
                    <option value="khac">Công ty khác</option>
                </select>
            </div> -->
        </div>
        <div class="row">
            <div class="form-wrapper col-md-6">
                <label for="">Đặt mật khẩu <span class="request_star">*</span></label>
                <input placeholder="Nhập mật khẩu..." id="password" type="password" class="form-control" name="password" value="">
            </div>
            <div class="form-wrapper col-md-6">
                <label for="">Nhập lại mật khẩu <span class="request_star">*</span></label>
                <input placeholder="Nhập lại mật khẩu" id="repass" type="password" class="form-control" name="repass" value="">
            </div>
        </div>
        <div class="form-group" style="display: flex;justify-content: center;">
            <button type="button" class="btn-primary me-0 ms-0" style="background-color: slategrey" onclick="JS_Register.Tab3()">Tiếp tục</button>
            <button type="button" class="btn-primary me-0 ms-0" style="background-color: slategrey" onclick="JS_Register.Tab1()">Quay lại</button>
        </div>
    </div>
</div>