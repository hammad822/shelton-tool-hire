<header class="rt-header">
    <div class="rt-container">
        <div class="rt-nav">
            @if(\Illuminate\Support\Facades\Auth::user()->isOwner())
                <button type="button" class="rt-btn2" data-bs-toggle="modal" data-bs-target="#addToolModal">Add new
                    Tool
                </button>
                <a href="{{route('owner.dashboard')}}" class="rt-btn2 m-2">Home
                </a>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->isModerator())
                <a href="{{route('moderator.dashboard')}}" class="rt-btn2 m-2">Home</a>
                <a href="{{route('moderator.pending.tools')}}" class="rt-btn2 m-2">Tools Need Approval
                    ( {{$pendingTools}} )</a>
                <a href="{{route('moderator.pending.services')}}" class="rt-btn2">Services Need Approval
                    ( {{$pendingServices}} )</a>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->isUser())
                <a href="{{route('user.dashboard')}}" class="rt-btn2 m-2">Home</a>
                <a href="{{route('user.hired.tools')}}" class="rt-btn2 m-2">Hired Tools</a>
            @endif
            <button type="button" class="rt-menubtn"><i class="fas fa-bars"></i></button>
            <div class="rt-addnavarea">
                <div class="rt-addnav">
                    <div class="dropdown rt-themedropdown rt-profiledropdown">
                        <button id="dropdownMenuButton" class="rt-profilebtn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <div class="rt-themecontent">
                                <figure class="rt-roundimage">
                                    <img src={{asset('assets/images/user/11.png')}} alt=""/>
                                    <span class="active"><i class="icon-down-arrow"></i></span>
                                </figure>
                                <div class="rt-titlebox">
                                    <h5>{{auth()->user()->name}}</h5>
                                    <span>{{auth()->user()->email}}</span>
                                </div>
                                <i class="icon-down-arrow"></i>
                            </div>
                        </button>
                        <ul class="dropdown-menu rt-themedropdownmenu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="{{ route('logout') }}"><i class="icon-logout-icon"></i> logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
