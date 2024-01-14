@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

    <div class="rt-container">
        <div class="rt-pageheading">
            <div class="rt-title">
                <h2>Tools</h2>
            </div>

        </div>
        <div class="rt-subscriptionplan-area">
            <div class="row">
                @forelse($tools as $tool)
                    <div class="col-xl-4">
                        <div class="rt-subscriptionbox">
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
                                <a href="{{route('moderator.approve.tool',$tool->id)}}" class="rt-btn rt-btn-lg m-2" style=" background-color: green">Approve</a>
                                <a href="{{route('moderator.reject.tool',$tool->id)}}" class="rt-btn rt-btn-lg m-2" style=" background-color: red">Reject
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#addMore').on('click', function (e) {
                e.preventDefault();
                let input = '<input type="text" class="form-control m-2" placeholder="Sub Service" required name="subServices[]"/>'
                $('#subServicesDiv').append(input);
            });
            $('.addNewServicesBtn').on('click', function (e) {
                e.preventDefault();
                let tool_id = $(this).attr('data-id');
                $('input[name=location_id]').val(location_id);
                $('#addplanmodal').modal('show');
            });
        });
    </script>
@endsection
