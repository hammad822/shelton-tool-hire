@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <form class="rt-themefrom" action="{{route('owner.update.tool',$tool->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="type" id="" required>
                                    <option value="Building" {{$tool->type === 'Building' ? 'selected' : ''}}>Building</option>
                                    <option value="Cleaning" {{$tool->type === 'Cleaning' ? 'selected' : ''}}>Cleaning</option>
                                    <option value="Decorating" {{$tool->type === 'Decorating' ? 'selected' : ''}}>Decorating</option>
                                    <option value="Landscaping" {{$tool->type === 'Landscaping' ? 'selected' : ''}}>Landscaping</option>
                                    <option value="Electrical" {{$tool->type === 'Electrical' ? 'selected' : ''}}>Electrical</option>
                                    <option value="Plumbing" {{$tool->type === 'Plumbing' ? 'selected' : ''}}>Plumbing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$tool->name}}" class="form-control" required placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number"  value="{{$tool->price_per_hour}}" name="price_per_hour" class="form-control" required placeholder="Price Per Hour"/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" value="{{$tool->address}}" placeholder="Address" required name="address"/>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="file"  placeholder="Image"/>
                            </div>
                            <div class="form-group">
                                <label>Post Code</label>
                                <input type="text" name="post_code" value="{{$tool->post_code}}" class="form-control" required
                                       placeholder="Post Code"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" required
                                          placeholder="Description">{{$tool->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="rt-btn2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
    <script>


    </script>
@endsection
