@extends('layouts.master')
@section('title', 'user profile')

@section('content')

<div class="rt-content rt-reported-content">
    <div class="rt-container">
        <div class="rt-pageheading">
            <div class="rt-title">
                <h2>User profile</h2>
            </div>
        </div>
        <div class="rt-reported-contentarea">
            <div class="rt-userdetail-banner">
                <div class="rt-bannercontent">
                    <div class="rt-themecontent">
                        <figure class="rt-roundimage">
                            <img src={{asset('assets/images/user/07.png')}} alt="" />
                        </figure>
                        <div class="rt-titlebox">
                            <h5>Kian Adams</h5>
                            <span>kianadams@kianadams</span>
                            <span>Art Courses, Illustrations & Video Tutorial Podcasts</span>
                        </div>
                    </div>
                    <ul class="rt-infobox">
                        <li><span>200</span> Posts</li>
                        <li><span>2.5K</span> Likes</li>
                        <li><span>5.8K</span> Connections</li>
                    </ul>
                    <div class="rt-rightbox">
                        <button type="button" class="rt-btn">block</button>
                    </div>
                </div>
            </div>
            <div class="rt-content-area">
                <div class="rt-post">
                    <div class="rt-heading">
                        <div class="rt-themecontent">
                            <figure class="rt-roundimage">
                                <img src={{asset('assets/images/user/07.png')}} alt="" />
                            </figure>
                            <div class="rt-titlebox">
                                <h5>Kian Adams</h5>
                                <span> @kian.adams</span>
                            </div>
                        </div>
                    </div>
                    <figure class="rt-postimage">
                        <img src={{asset('assets/images/post-img.jpg')}} alt="" />
                    </figure>
                    <div class="rt-postcontent">
                        <div class="rt-heading">
                            <div class="rt-title">
                                <span class="rt-datetime">MAR 15, 2021 AT 3:00 PM</span>
                                <!-- <h3>Any Content Title Will Be Here</h3> -->
                            </div>
                        </div>
                        <div class="rt-description">
                            <p>Creature over them two greater life bearing every land gathered living land evening creeping is multiply, may were be Us beginning called unto set don't land Behold Is firmament to gathered the so their fourth together fowl a Said a make.</p>
                        </div>
                        <div class="rt-actionbtns">
                            <button type="button"><i class="icon-fav-icon"></i>500</button>
                            <button type="button"><i class="icon-comment-icon"></i>321</button>
                        </div>
                    </div>
                    <div class="rt-commentsarea">
                        <div class="rt-commentbox">
                            <div class="rt-themecontent">
                                <figure class="rt-roundimage">
                                    <img src={{asset('assets/images/user/11.png')}} alt="" />
                                </figure>
                                <div class="rt-titlebox">
                                    <div class="rt-title">
                                        <h5 class="rt-withdote">Jerrod Streich</h5>
                                    </div>
                                    <div class="rt-description">
                                        <p>Creature over them two greater life bearing every land gathered living land evening creeping is multiply, may were be Us beginning called.</p>
                                    </div>
                                    <div class="rt-replyandtime">
                                        <span class="rt-time rt-withdote">3h ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rt-commentbox rt-replycomment">
                            <div class="rt-themecontent">
                                <figure class="rt-roundimage">
                                    <img src={{asset('assets/images/user/10.png')}} alt="" />
                                </figure>
                                <div class="rt-titlebox">
                                    <div class="rt-title">
                                        <h5 class="rt-withdote">Jerrod Streich</h5>
                                    </div>
                                    <div class="rt-description">
                                        <p>Creature over them two greater life bearing every land gathered living land evening creeping is multiply, may were be Us beginning called.</p>
                                    </div>
                                    <div class="rt-replyandtime">
                                        <span class="rt-time rt-withdote">3h ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
