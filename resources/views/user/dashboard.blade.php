@extends('layouts.master')
@section('title', 'User Dashboard')

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
            <div class="row" id="toolsDiv">
                @include('user.tool-table')
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

