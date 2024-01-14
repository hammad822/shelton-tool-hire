@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

    <div class="rt-container">
        <div class="rt-pageheading">
            <div class="rt-title">
                <h2>Services</h2>
            </div>

        </div>
        <div class="rt-subscriptionplan-area">
            <div class="row">
                @forelse($services as $service)
                    <div class="col-xl-4">
                        <div class="rt-subscriptionbox">
                            <h4><b>Owner:</b>{{$service->tool->owner->name}}</h4>
                            <h3>{{$service->tool->name}}</h3>
                            <h5>{{$service->tool->address}}</h5>
                            <div class="rt-description">
                                <p>{{$service->tool->post_code}}</p>
                            </div>
                            <h5>Service : <b>{{$service->type}}</b></h5>
                            <ul class="rt-list">
                               @foreach($service->subservices as $subservice)
                                    <li>{{$subservice->type}}</li>
                                @endforeach
                            </ul>
                            <div class="rt-btnbox col-2">
                                <a href="{{route('moderator.approve.service',$service->id)}}" class="rt-btn rt-btn-lg m-2" style=" background-color: green">Approve</a>
                                <a href="{{route('moderator.reject.service',$service->id)}}" class="rt-btn rt-btn-lg m-2" style=" background-color: red">Reject
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
