@extends('layouts.master')
@section('title', 'user profile')

@section('content')
{{--    <div class="rt-content rt-reported-content">--}}
{{--        <div class="rt-container">--}}
{{--            <div class="rt-reported-contentarea">--}}
{{--                <div class="rt-content-area">--}}
{{--                    <div class="rt-post">--}}
{{--                        <div class="rt-heading">--}}
{{--                            <div class="rt-themecontent">--}}
{{--                                <div class="rt-titlebox">--}}
{{--                                    <h5>{{$tool->address}}</h5>--}}
{{--                                    <span>{{$tool->post_code}}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <figure class="rt-postimage">--}}
{{--                            <img src={{asset('uploads/tool/'.$tool->avatar)}} alt=""/>--}}
{{--                        </figure>--}}
{{--                        <div class="rt-postcontent">--}}
{{--                            <div class="rt-heading">--}}
{{--                                <div class="rt-title">--}}
{{--                                    <span--}}
{{--                                        class="rt-datetime">{{\Carbon\Carbon::parse($tool->created_at)->toDateTimeString()}}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="rt-description">--}}
{{--                                <p>{{$tool->description}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="rt-commentsarea">--}}
{{--                                    @foreach($tool->pricings as $price)--}}
{{--                                        <div class="rt-commentbox rt-replycomment">--}}
{{--                                            <div class="rt-themecontent">--}}
{{--                                                <div class="rt-titlebox">--}}
{{--                                                    <div class="rt-title">--}}
{{--                                                        <h5 class="rt-withdote">{{$price->price}}</h5>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rt-description">--}}
{{--                                                        <p>{{$price->time}}</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rt-replyandtime">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="rt-content rt-reported-content">
        <div class="rt-container">
            <div class="rt-reported-contentarea">
                <div class="rt-content-area">
                    <div class="rt-post">
                        <div class="rt-heading">
                            <div class="rt-themecontent">
                                <div class="rt-titlebox">
                                    <h5>{{$tool->address}}</h5>
                                    <span>{{$tool->post_code}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="rt-postcontent">
                            <table>
                                <tr>
                                    <th>Price</th>
                                    <th>Time</th>
                                    <th>Edit</th>
                                </tr>
                                @foreach($tool->pricings as $price)
                                    <tr>
                                        <td>{{$price->price}}</td>
                                        <td>{{$price->time}}</td>
                                        <td>
                                            <a href="{{route('owner.edit.tool.price',$price->id)}}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
    </script>
@endsection
