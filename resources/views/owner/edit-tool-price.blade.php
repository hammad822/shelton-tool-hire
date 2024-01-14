@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <form class="rt-themefrom" action="{{route('owner.update.tool.price',$price->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{$price->price}}" class="form-control" required placeholder="Price"/>
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="number" class="form-control" value="{{$price->time}}" placeholder="Time" required name="address"/>
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
