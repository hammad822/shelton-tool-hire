@extends('layouts.master')
@section('title', 'User Dashboard')

@section('content')
    <div class="rt-container">
        <div class="rt-pageheading">
            <div class="rt-title">
                <h2>Hired Tools</h2>
            </div>
            <div class="rt-rightarea">
            </div>
        </div>
        <div class="rt-subscriptionplan-area">
            <div class="row" id="toolsDiv">
                @forelse($hiredTools as $hiredTool)
                    <div class="col-xl-4">
                        <div class="rt-subscriptionbox">
                            <h3>{{$hiredTool->tool->name}}</h3>
                            <h4>{{$hiredTool->tool->address}}</h4>
                            <div class="rt-description">
                                <p>{{$hiredTool->tool->post_code}}</p>
                            </div>
                            <div>
                                @if($hiredTool->type === 'LongTerms')
                                    <p style="font-weight: bold;color: black">Start Date/Time: {{$hiredTool->start_date}}</p>
                                    <p style="font-weight: bold;color: black">End Date/Time: {{$hiredTool->end_date}}</p>
                                @else
                                <p style="font-weight: bold;color: black">Duration:  {{$hiredTool->duration}}{{$hiredTool->type === 'Hourly' ? 'Hour' : 'Day'}}</p>

                                @endif
                            </div>
                            <div>
                                <p style="font-weight: bold;color: black">Hiring Price:  {{$hiredTool->hiring_price}}</p>
                            </div>
                            <div>
                                <p style="font-weight: bold;color: black">Total:  {{$hiredTool->total_price}}</p>
                            </div>
                            <div class="rt-list" style=" display: block;margin-left: auto;margin-right: auto;width: 50%;">
                                <img src="{{asset('uploads/tool/'.$hiredTool->tool->avatar)}}" alt="">
                            </div>
                            <div class="rt-btnbox col-2">
                                <a href="{{route('user.tool.show',$hiredTool->tool->id)}}" class="rt-btn rt-btn-lg m-2">Detail</a>
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
            $('#searchInput').on('keyup', function () {
                let search = $(this).val();
                let data = {
                    'search': search
                };
                let url = '{{route('user.search.tool')}}';
                $.get(url, data, function (res) {
                    if (res.status === 'success') {
                        $('#toolsDiv').empty().append(res.view)
                    }
                });
            });
        });
    </script>
@endsection

