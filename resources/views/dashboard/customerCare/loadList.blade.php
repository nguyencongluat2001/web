@php
use Carbon\Carbon;
@endphp

<section id="discussions" class="col-md-3">
    @if(isset($datas) && count($datas) > 0)
    @foreach($datas as $data)
        <input type="hidden" name="phone" id="phone" value="{{$data->phone}}">
        <div class="discussion" id="active_{{$data->phone}}" onclick="JS_CustomerCare.message('{{$data->phone}}')" style="cursor: pointer;"  onmouseover="mouseover(this)" onmouseout="mouseout(this, '{{$data->phone}}')">
            <div class="desc-contact">
                <p class="name {{!empty($data->question) && $data->view != 1 ? 'font-bold' : ''}}">{{ $data->phone }}</p>
                <p class="message {{!empty($data->question) && $data->view != 1 ? 'font-bold' : ''}}">
                    @if(!empty($data->question))
                        {{ $data->question }}
                    @elseif(!empty($data->reply))
                        {{ $data->reply }}
                    @endif
                </p>
            </div>
            <div class="timer dropdown">
                <div class="discussion-time">
                    @php
                    Carbon::setLocale('vi');
                    $now = Carbon::now();
                    $created_at = Carbon::create($data->created_at);
                    @endphp
                    {{ $created_at->diffForHumans($now) }}
                </div>
                <div class="show-more dropdown-toggle"  data-bs-toggle="dropdown" onclick="showMore(this, '{{$data->phone}}')">
                    <span>
                        <i class="fas fa-ellipsis-h"></i>
                    </span>
                </div>
                
                <div class="menuShowMore dropdown-menu">
                    <ul>
                        <li class="deleteMes">Xóa</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</section>

<div class="col-md-9" style="background: url('assets/images/background-chat.png'); background-size: 100%;">
    <section class="message-title" id="message-title">
        <span class="message-title-back">
            <i class="fas fa-chevron-left"></i>
        </span>
        <span class="message-title-title"></span>
    </section>
    <section class="chat" id="message">
        <div style="position: absolute;top: 50%;left: 50%;color: #000;" class="message-mobile">Hãy chọn một cuộc trò chuyện để bắt đầu!</div>
    </section>
</div>