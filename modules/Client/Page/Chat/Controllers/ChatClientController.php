<?php

namespace Modules\Client\Page\Chat\Controllers;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Base\Helpers\ForgetPassWordMailHelper;
use Modules\Base\LoggerHelpers;
use Modules\System\Dashboard\CustomerCare\Services\CustomerCareService;
use Monolog\Logger;

class ChatClientController extends Controller
{
    public function __construct(
        CustomerCareService $customerCareService
    ){
        $this->customerCareService = $customerCareService;
    }
    public function broadcast(Request $request)
    {
        $logger = new LoggerHelpers();
        $logger->setFileName('ChatClient');
        try{

            // $ipv4 = gethostbyname(trim(exec("hostname")));
            
            $arrInput = $request->all();
            $customerCare = $this->customerCareService->where('phone', $arrInput['phone'])->first();
            if(empty($customerCare)){
                $sebdMailToCTV = $this->sendMail($arrInput);
            }
            broadcast(new PusherBroadcast($arrInput['phone'], $arrInput['message']))->toOthers();
            if(isset($arrInput['message']) && !empty($arrInput['message'])){
                $html = '<div class="right-message">';
                $html .= '<div class="response">';
                $html .= '<div class="text">';
                $html .= '<p>' . $arrInput['message'] . '</p>';
                $html .= '</div></div></div>';
                
                $params = [
                    'id' => strtoupper((string)\Str::uuid()),
                    'phone' => $arrInput['phone'],
                    'question' => $arrInput['message'],
                    'ip' => '',
                    'created_at' => date('Y/m/d H:i:s'),
                ];
                $this->customerCareService->insert($params);

                $logger->log('Susccess', $params);
                // dd($html);
                return $html;
            }
        }catch (\Exception $e){
            dd($e);
            $logger->log('Error', $e->getMessage());
        }
    }

    public function receive(Request $request)
    {
        $arrInput = $request->all();
        if(isset($arrInput['message']) && !empty($arrInput['message'])){
            $html = '';
            $html .= '<div class="left-message">';
            $html .= '<img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">';
            $html .= '<div class="text">';
            $html .= '<p>' . $arrInput['message'] . '</p>';
            $html .= '</div>';
            $html .= '</div>';
            return $html;
        }
    }
    public function showMessage(Request $request)
    {
        $arrInput = $request->all();
        $customerCare = $this->customerCareService->where('phone', $request->phone)->get();
        $htmls = '';
        $htmls .= '<div class="left-message">';
        $htmls .= '<img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">';
        $htmls .= '<div class="text">';
        $htmls .= '<p>Xin chào!<br>Chúng tôi có thể giúp gì cho bạn.</p>';
        $htmls .= '</div></div>';
        $htmls .= '<div class="left-message">';
        $htmls .= '<img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">';
        $htmls .= '<div class="text">';
        $htmls .= '<p><a href="facilities" target="_blank" class="btn btn-light">Đặt lịch khám</a></p>';
        $htmls .= '</div></div>';
        $check = false;
        foreach($customerCare as $key => $value){
            $created_at = Carbon::create($value->created_at);
            $now = Carbon::now();
            if(!empty($value->reply)){
                $htmls .= '<div class="left-message">';
                $htmls .= '<img src="./assets/images/staff-chat.png" alt="" width="50vw" style="margin-right: 5px;">';
                $htmls .= '<div class="text">';
                $htmls .= '<p>' . $value->reply . '</p>';
                $htmls .= '</div></div>';
            }elseif(!empty($value->question)){
                $htmls .= '<div class="right-message">';
                $htmls .= '<div class="response">';
                $htmls .= '<div class="text">';
                $htmls .= '<p>' . $value->question . '</p>';
                $htmls .= '</div>';
                $htmls .= '</div>';
                $htmls .= '</div>';
            }
            if($now->diffInHours($created_at) > 1){
                $check = true;
            }
        }
        return array('htmls' => $htmls, 'check' => $check);
    }
    // gửi thông báo đến cộng tác viên khi có tin nhắn mới
    public function sendMail($input)
    {
        $phone = $input['phone'];
        // $stringHtml = file_get_contents(base_path() . '\storage\templates\chat\tem_forget.html');
        // Lấy dữ liệu
        $data['date'] = 'Ngày ' . date('d') . ' tháng ' . date('m') . ' năm ' . date('Y');
        $data['email'] = 'nguyencongluat092001@gmail.com';
        $data['phone'] = $phone;
        $data['mailto'] = 'nguyencongluat092001@gmail.com';
        $data['message'] = $input['message'];
        $data['subject'] = 'Phần mềm đặt lịch khám nhanh tại các tuyến trung ương';
        dd(1);
        // Gửi mail
        (new ForgetPassWordMailHelper($data['email'], $data['email'], '', $data))->send($data);
    }
}