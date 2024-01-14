@extends('layouts.master')
@section('title', 'user profile')

@section('content')
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
                        <figure class="rt-postimage">
                            <img src={{asset('uploads/tool/'.$tool->avatar)}} alt=""/>
                        </figure>
                        <div class="rt-postcontent">
                            <div class="rt-heading">
                                <div class="rt-title">
                                    <span
                                        class="rt-datetime">{{\Carbon\Carbon::parse($tool->created_at)->toDateTimeString()}}</span>
                                </div>
                            </div>
                            <div class="rt-description">
                                <p>{{$tool->description}}</p>
                            </div>
                            <div class="rt-actionbtns">
                                <form action="{{route('owner.like.tool',$tool->id)}}" method="post">
                                    @csrf
                                    <button type="submit"><i class="icon-fav-icon"
                                                             style="color:{{$isLiked ? 'red' : ''}}">
                                        </i>{{$tool->like_count}}
                                    </button>
                                </form>
                                <button type="button"><i class="icon-comment-icon"></i>{{$tool->comment_count}}
                                </button>
                                <button type="button" id="toolReviewButton" data-rated="{{$isReviewed}}">
                                    <i class="fa fa-star"
                                       style="color: {{$isReviewed ? '#ffc107' : ''}}"></i>{{$tool->total_rating}}
                                </button>
                            </div>
                        </div>
                        <div class="rt-commentsarea">
                            @foreach($tool->comments as $comment)
                                <div class="rt-commentbox">
                                    <div class="rt-themecontent">
                                        <figure class="rt-roundimage">
                                            <img src={{asset('profile-img/'.$comment->user->avatar)}} alt=""/>
                                        </figure>
                                        <div class="rt-titlebox">
                                            <div class="rt-title">
                                                <h5 class="rt-withdote">{{$comment->user->name}}</h5>
                                            </div>
                                            <div class="rt-description">
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                            <div class="rt-replyandtime">
                                                <span
                                                    class="rt-time rt-withdote">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                        <div class="rt-actionbtns">
                                            <a href="#" data-comment-id="{{$comment->id}}" class="replyCommentBtn"><i
                                                    class="fa fa-reply">Reply</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="commentReplyDiv{{$comment->id}}" style="display: none">
                                    <div class="rt-commentbox rt-replycomment">
                                        <div class="rt-themecontent">
                                            <div class="rt-description">
                                                <input required class="form-control" type="text"
                                                       id="reply-{{$comment->id}}"
                                                       placeholder="Comment reply ........">
                                            </div>
                                            <div class="rt-replyandtime col-2" style="float: right">
                                                <a href="javascript:void(0);" data-comment-id="{{$comment->id}}"
                                                   class="submitReplyBtn rt-btn rt-btn-lg m-2">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="commentRepliesDiv-{{$comment->id}}">
                                    @foreach($comment->replies as $reply)
                                        <div class="rt-commentbox rt-replycomment">
                                            <div class="rt-themecontent">
                                                <figure class="rt-roundimage">
                                                    <img src={{asset('profile-img/'.$reply->user->avatar)}} alt=""/>
                                                </figure>
                                                <div class="rt-titlebox">
                                                    <div class="rt-title">
                                                        <h5 class="rt-withdote">{{$reply->user->name}}</h5>
                                                    </div>
                                                    <div class="rt-description">
                                                        <p>{{$reply->comment}}</p>
                                                    </div>
                                                    <div class="rt-replyandtime">
                                                    <span
                                                        class="rt-time rt-withdote">{{\Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <div class="rt-commentbox">
                                <form action="{{route('owner.comment.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="tool_id" value="{{$tool->id}}">
                                    <div class="rt-themecontent">
                                        <figure class="rt-roundimage">
                                            <img
                                                src={{asset('profile-img/'.\Illuminate\Support\Facades\Auth::user()->avatar)}} alt=""/>
                                        </figure>
                                        <div class="rt-titlebox">
                                            <div class="rt-title">
                                                <h5 class="rt-withdote">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                            </div>
                                            <div class="rt-description">
                                                <input required class="form-control" type="text" name="comment"
                                                       placeholder="Comment here ........">
                                            </div>
                                            <div class="rt-replyandtime col-2" style="float: right">
                                                <button type="submit" class="rt-btn rt-btn-lg m-2">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade rt-thememodal rt-editcoinpolicymodal" id="submitRating" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <h3>Rating Form</h3>
                        <form class="rt-themefrom at-formapplyovertime at-formapplyrating"
                              action="{{route('owner.review.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tool_id" value="{{$tool->id}}">
                            <div class="form-body">
                                <div class="form-group">
                                    @foreach($tool->services as $service)
                                        @if($service->status === 'Approved')
                                            <h5>{{$service->type}}</h5>
                                            <ol class="at-ratinglist">
                                                @foreach($service->subServices as $subService)

                                                    <li>
                                                        {{--                                        @php--}}
                                                        {{--                                            if(old('timing') !== null){--}}
                                                        {{--                                                $option = old('timing');--}}
                                                        {{--                                            }--}}
                                                        {{--                                            else{ $option = $task->value; }--}}
                                                        {{--                                        @endphp--}}
                                                        <label class="at-ratingtitle">{{$subService->type}}:</label>
                                                        <div class="at-ratingbox">
                                                            <fieldset class="rate">
                                                                <input type="radio" id="rating10{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="5"/>
                                                                <label for="rating10{{$subService->id}}"
                                                                       title="5 stars"></label>
                                                                <input type="radio" id="rating9{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="4.5"/>
                                                                <label class="half" for="rating9{{$subService->id}}"
                                                                       title="4 1/2 stars"></label>
                                                                <input type="radio" id="rating8{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="4"/>
                                                                <label for="rating8{{$subService->id}}"
                                                                       title="4 stars"></label>
                                                                <input type="radio" id="rating7{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="3.5"/>
                                                                <label class="half" for="rating7{{$subService->id}}"
                                                                       title="3 1/2 stars"></label>
                                                                <input type="radio" id="rating6{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="3"/>
                                                                <label for="rating6{{$subService->id}}"
                                                                       title="3 stars"></label>
                                                                <input type="radio" id="rating5{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="2.5"/>
                                                                <label class="half" for="rating5{{$subService->id}}"
                                                                       title="2 1/2 stars"></label>
                                                                <input type="radio" id="rating4{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="2"/>
                                                                <label for="rating4{{$subService->id}}"
                                                                       title="2 stars"></label>
                                                                <input type="radio" id="rating3{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="1.5"/>
                                                                <label class="half" for="rating3{{$subService->id}}"
                                                                       title="1 1/2 stars"></label>
                                                                <input type="radio" id="rating2{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="1"/>
                                                                <label for="rating2{{$subService->id}}"
                                                                       title="1 star"></label>
                                                                <input type="radio" id="rating1{{$subService->id}}"
                                                                       name="subServices[{{$subService->id}}]"
                                                                       value="0.5"/>
                                                                <label class="half" for="rating1{{$subService->id}}"
                                                                       title="1/2 star"></label>
                                                            </fieldset>
                                                        </div>
                                                    </li>

                                                @endforeach
                                            </ol>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="rt-btn2">Submit</button>
                                    <button type="button" class="rt-btn2 rt-btncancel" data-bs-dismiss="modal">cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#toolReviewButton').on('click', function (e) {
                e.preventDefault();
                let isRated = $(this).attr('data-rated');
                if (isRated) {
                    toastr.error('You already submitted your reviews', 'Error', {timeOut: 3000});
                } else {
                    $('#submitRating').modal('show');
                }
            });
            $('.replyCommentBtn').on('click', function (e) {
                e.preventDefault();
                let comment_id = $(this).attr('data-comment-id');
                $('#commentReplyDiv' + comment_id).css("display", "block");
            });
            $('.submitReplyBtn').on('click', function (e) {
                e.preventDefault();
                let comment_id = $(this).attr('data-comment-id');
                let comment = $('#reply-' + comment_id).val();
                let data = {
                    '_token': "{{csrf_token()}}",
                    'comment': comment,
                    'comment_id': comment_id,
                }
                let url = '{{route('owner.submit.reply')}}';
                $.post(url, data, function (res) {
                    if (res.status === 'success') {
                        $('#reply-' + comment_id).val('');

                        toastr.success(res.message, 'Success', {timeOut: 3000});
                        $('#commentReplyDiv' + res.reply.comment_id).css("display", "none");
                        let image = '{{asset('profile-img/')}}' + '/' + res.reply.user.avatar;
                        let reply = '<div class="rt-commentbox rt-replycomment">' +
                            '<div class="rt-themecontent">' +
                            '<figure class="rt-roundimage">' +
                            '<img src=' + image + ' alt=""/></figure>' +
                            '<div class="rt-titlebox">' +
                            '<div class="rt-title">' +
                            '<h5 class="rt-withdote">' + res.reply.user.name + '</h5>' +
                            '</div>' +
                            '<div class="rt-description">' +
                            '<p>' + res.reply.comment + '</p>' +
                            '</div>' +
                            '<div class="rt-replyandtime">' +
                            '<span class="rt-time rt-withdote">' + res.date + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        $('#commentRepliesDiv-' + res.reply.comment_id).append(reply);
                    }
                });
            });
        });
    </script>
@endsection
