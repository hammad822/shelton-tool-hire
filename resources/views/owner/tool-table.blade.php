@forelse($tools as $tool)
    <div class="col-xl-4">
        <div class="rt-subscriptionbox">
            <h4 style="background-color: {{$tool->status === 'Pending' ? 'red' : 'green'}}"><b>Status:</b>{{$tool->status}}</h4>
            <h4><b>Owner:</b>{{$tool->owner->name}}</h4>
            <h3>{{$tool->name}}</h3>
            <h5>{{$tool->address}}</h5>
            <div class="rt-description">
                <p>{{$tool->post_code}}</p>
            </div>

            <div class="rt-list"
                 style=" display: block;margin-left: auto;margin-right: auto;width: 50%;">
                <img src="{{asset('uploads/tool/'.$tool->avatar)}}" alt="">
            </div>
            <div class="rt-btnbox col-2">
                <a href="{{route('owner.toggle.tool',$tool->id)}}" type="button"
                   class="rt-btn rt-btn-lg m-2"
                   style=" background-color: {{$tool->is_enable ? 'green' : 'red'}}">{{$tool->is_enable ? 'Enable' : 'Disable'}}
                </a>

                <a href="{{route('owner.get.tool.detail',$tool->id)}}" class="rt-btn rt-btn-lg m-2" style=" background-color: red">Detail</a>

                <button type="button" style=" background-color: red" class="rt-btn rt-btn-lg m-2 addNewServicesBtn"
                        data-id="{{$tool->id}}">Add Service & Sub-Service
                </button>

                <a href="{{route('owner.edit.tool',$tool->id)}}" style=" background-color: red" class="rt-btn rt-btn-lg m-2"
                        >Edit Tool
                </a>
            </div>
        </div>
    </div>
@empty
@endforelse
