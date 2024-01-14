@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')

    <div class="rt-container">
        <div class="rt-pageheading">
            <div class="rt-title">
                <h2>Tools</h2>
            </div>
            <div class="rt-rightarea">
                <form class="rt-search">
                    <div class="rt-inputwithicon">
                        <i class="icon-search"></i>
                        <input type="search" id="searchInput" name="searchTools" class="form-control"
                               placeholder="Search here">
                    </div>
                </form>
            </div>

        </div>
        <div class="rt-subscriptionplan-area">
            <div class="row" id="ToolsDiv">
            @include('owner.tool-table')
            </div>
        </div>
    </div>
    <!--************************************
            Add Services modal
    *************************************-->
    <div class="modal fade rt-thememodal rt-editcoinpolicymodal" id="addplanmodal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <h3>Add Service & Sub-Service </h3>
                        <form class="rt-themefrom" action="{{route('owner.store.services')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tool_id" value="">
                            <div class="form-group">
                                <label>Service</label>
                                <input type="text" name="service" class="form-control" required placeholder="Name"/>
                            </div>
                            <div class="form-group" id="subServicesDiv">
                                <label>Sub-Service</label>
                                <input type="text" class="form-control m-2" placeholder="Sub Service" required
                                       name="subServices[]"/>
                            </div>
                            <div class="form-group" style="display: flex;justify-content: center">
                                <button type="button" class="rt-btn2" id="addMore">Add More Sub-Service</button>
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
    <!--************************************
            Add Prices modal
    *************************************-->
    <div class="modal fade rt-thememodal rt-editcoinpolicymodal" id="addPriceModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <h3>Add Time & Price </h3>
                        <form class="rt-themefrom" action="{{route('owner.store.pricing')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tool_id" value="">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="number" name="time" class="form-control" required placeholder="Time"/>
                            </div>
                            <div class="form-group">
                                <label>Time(in hours)</label>
                                <input type="number" name="time" class="form-control" required placeholder="Time"/>
                            </div>
                            <div class="form-group" id="subServicesDiv">
                                <label>Price</label>
                                <input type="number" class="form-control m-2" placeholder="Price" required
                                       name="price"/>
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

    <!--************************************
            Add Tool modal
    *************************************-->
    <div class="modal fade rt-thememodal rt-editcoinpolicymodal" id="addToolModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rt-contentboxmodal">
                        <form class="rt-themefrom" action="{{route('owner.store.tool')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
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
                                <label>Price</label>
                                <input type="number" value="1" name="price_per_hour" class="form-control" required placeholder="Price Per Hour"/>
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
                let tool_id = $(this).attr('data-id');
                $('input[name=tool_id]').val(tool_id);
                $('#addplanmodal').modal('show');
            });

            $('.addNewPriceBtn').on('click', function (e) {
                e.preventDefault();
                let tool_id = $(this).attr('data-id');
                $('input[name=tool_id]').val(tool_id);
                $('#addPriceModal').modal('show');
            });

            $('#searchInput').on('keyup', function () {
                let search = $(this).val();
                let data = {
                    'search': search
                };
                let url = '{{route('owner.search.tool')}}';
                $.get(url, data, function (res) {
                    if (res.status === 'success') {
                        $('#toolsDiv').empty().append(res.view)
                    }
                });
            });
        });

    </script>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"   ></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
@endsection
