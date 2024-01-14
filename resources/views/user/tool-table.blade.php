@forelse($tools as $tool)
    <div class="col-xl-4">
        <div class="rt-subscriptionbox">
            <h3>{{$tool->name}}</h3>
            <h4>{{$tool->address}}</h4>
            <div class="rt-description">
                <p>{{$tool->post_code}}</p>
            </div>
            <div class="rt-list" style=" display: block;margin-left: auto;margin-right: auto;width: 50%;">
                <img src="{{asset('uploads/tool/'.$tool->avatar)}}" alt="">
            </div>
            <div class="rt-btnbox col-2">
                <a href="{{route('user.tool.show',$tool->id)}}" class="rt-btn rt-btn-lg m-2">Detail</a>
            </div>
        </div>
    </div>
@empty
@endforelse
