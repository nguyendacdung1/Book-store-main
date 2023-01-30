<div class="feedback-user-item">
    <div class="user-avatar">
        <img src="./front/imgs/user/{{\App\Models\User::where('id',$comment->user_id)->first()->avatar ?? 'default-avatar.png'}}" alt="">
    </div>
    <div class="user-feedback-content">
        <div>
            <span class="user-feedback-name">{{\App\Models\User::where('id',$comment->user_id)->first()->name}} </span>
            <span style="font-weight: 400;font-size: 14px"> {{date('d/m/Y',strtotime($comment->created_at))}}</span>
            <span
                style="display:block;font-size: 12px;color: #fdd836;margin-top: 4px"
            >
                @for($i=1;$i<=5;$i++)
                    @if($i<=$comment->rating)
                        <i class="fa-solid fa-star-sharp"></i>
                    @else
                        <i class="fa-light fa-star-sharp"></i>
                    @endif
                @endfor
            </span>
        </div>
        <div class="message-feedback" style="margin-top: 4px">
            <p>{{$comment->messages}}</p>
        </div>
    </div>
</div>
