<?php

namespace Modules\Client\Page\Chat\Controllers;

use App\Events\PusherBroadcast;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\System\Dashboard\CustomerCare\Services\CustomerCareService;

class ChatAdminController extends Controller
{
    public function __construct(
        CustomerCareService $customerCareService
    ){
        $this->customerCareService = $customerCareService;
    }
    public function broadcast(Request $request)
    {
        $arrInput = $request->all();
        broadcast(new PusherBroadcast($arrInput['phone'], $arrInput['message']))->toOthers();
        if(isset($arrInput['message']) && !empty($arrInput['message'])){
            $html = '';
            $html .= '<div class="message">';
            $html .= '<div class="response">';
            $html .= '<div class="text">';
            $html .= '<b>' . $arrInput['phone'] . '</b>';
            $html .= '<p>' . $arrInput['message'] . '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div style="margin-left: 10px; align-items: top;">';
            $html .= '<img src="../assets/images/staff-chat.png" width="50px" alt="">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<p class="response-time time" style="padding-right: 4rem;">' . date('H:i d/m/Y') . '</p>';

            $params = [
                'id' => strtoupper((string)\Str::uuid()),
                'phone' => $arrInput['phone'],
                'reply' => $arrInput['message'],
                'created_at' => date('Y/m/d H:i:s'),
            ];
            $this->customerCareService->insert($params);

            return $html;
        }
    }

    public function receive(Request $request)
    {
        $arrInput = $request->all();
        if(isset($arrInput['message']) && !empty($arrInput['message'])){
            $html = '<div class="message">';
            $html .= '<div style="margin-right: 10px; align-items: top;">';
            $html .= '<img src="../assets/images/avatar_default.png" width="50px" alt="">';
            $html .= '</div>';
            $html .= '<div class="text 123123123">';
            $html .= '<b>' . $arrInput['phone'] . '</b>';
            $html .= '<p>' . $arrInput['message'] . '</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<p class="time" style="padding-left: 4rem;">' . date('H:i d/m/Y') . '</p>';
            return $html;
        }
    }
}