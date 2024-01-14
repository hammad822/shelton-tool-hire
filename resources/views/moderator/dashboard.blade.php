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
                                <a href="{{route('moderator.toggle.tool',$tool->id)}}"
                                        class="rt-btn rt-btn-lg m-2"
                                        style=" background-color: {{$tool->is_enable ? 'green' : 'red'}}">{{$tool->is_enable ? 'Enable' : 'Disable'}}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>

    <!--************************************
            Add Tool modal
    *************************************-->
    <div class="modal fade rt-thememodal rt-editcoinpolicymodal" id="addLocationModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <h3>Edit Plan</h3>
                        <form class="rt-themefrom" action="{{route('moderator.tool.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="owner_id" id="" required>
                                    <option value=" ">Select Owner</option>
                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="type" id="" required>
                                    <option value="Building">Building</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Decorating">Decorating</option>
                                    <option value="Landscaping">Landscaping</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Plumbing">Plumbing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" required name="address"/>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="file" required placeholder="Image"/>
                            </div>
                            <div class="form-group">
                                <label>Post Code</label>
                                <input type="text" name="post_code" class="form-control" required
                                       placeholder="Post Code"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" required
                                          placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="rt-btn2">Submit</button>
                                <button type="button" class="rt-btn2 rt-btncancel" data-bs-dismiss="modal">cancel
                                </button>
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
            $('#addMore').on('click', function (e) {
                e.preventDefault();
                let input = '<input type="text" class="form-control m-2" placeholder="Sub Service" required name="subServices[]"/>'
                $('#subServicesDiv').append(input);
            });
            $('.addNewServicesBtn').on('click', function (e) {
                e.preventDefault();
                let location_id = $(this).attr('data-id');
                $('input[name=location_id]').val(location_id);
                $('#addplanmodal').modal('show');
            });
        });
    </script>
@endsection
