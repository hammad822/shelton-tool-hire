@extends('layouts.master')
@section('title', 'user profile')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .activeBtn {
        background-color: #0f5132;
    }

    .btnClr {
        background-color: grey;

    }
</style>
@section('content')
    <div class="rt-content rt-reported-content">
        <div class="rt-container">
            <div class="rt-reported-contentarea">
                <div class="rt-content-area">
                    <div class="rt-post">
                        <div class="rt-heading">
                            <div class="rt-themecontent">
                                <div class="rt-titlebox">
                                    <h3>Name : {{$tool->name}}</h3>
                                    <h3>Address : {{$tool->address}}</h3>
                                    <h3>Post code : {{$tool->post_code}}</h3>
                                    <h3>Price Per Hour : £{{$tool->price_per_hour}}</h3>
                                </div>
                            </div>
                            <div style="padding-left: 450px"></div>
                        </div>
                        <div class="rt-postcontent">
                            <div class="rt-heading">
                                <div class="rt-title"></div>
                            </div>
                            <div class="rt-description">
                                <span style="font-weight: bolder;font-size: 25px">Select Option</span><br><br>
                                <button style="border: slateblue;color: white;padding: 15px 32px;
                                    text-align: center;display: inline-block;font-size: 16px;
                                    border-radius: 10px" type="button" class="hire-type-btn btnClr"
                                        data-hire-type="Hourly">Hourly
                                </button>
                                <button style="border: slateblue;color: white;padding: 15px 32px;
                                    text-align: center;display: inline-block;font-size: 16px;
                                    border-radius: 10px" type="button" class="hire-type-btn btnClr"
                                        data-hire-type="Daily">Daily
                                </button>
                                <button style="border: slateblue;color: white;padding: 15px 32px;
                                    text-align: center;display: inline-block;font-size: 16px;
                                    border-radius: 10px" type="button" class="hire-type-btn btnClr"
                                        data-hire-type="LongTerms">Long Terms
                                </button>
                            </div>
                            <div class="hire-type-div" id="toolDetailDiv" style="display:block;margin-top: 15px">
                                <span id="typeSpan" style="font-weight: bolder;font-size: 25px"></span>
                                <br>
                                <br>
                                <div id="dateDive" style="display: block">
                                    <span>Duration</span><br>
                                    <input type="number" value="1" name="durationVal" placeholder="Select the duration">
                                </div>
                                <br>
                                <div id="dates" style="display: none">
                                    <div>
                                        <span>Start Date</span><br>
                                        <input type="datetime-local" id="startDate" name="startDateVal"
                                               placeholder="Select the duration">
                                    </div>
                                    <br>
                                    <div>
                                        <span>End Date</span><br>
                                        <input type="datetime-local" id="endDate" name="endDateVal"
                                               placeholder="Select the duration">
                                    </div>
                                </div>
                                <br>
                                <span id="result" style="font-weight: bolder;font-size: 25px; color: black"></span>

                                <div>
                                    <button style="background-color:blue ;border: slateblue;color: white;padding: 15px 32px;
                                    text-align: center;display: inline-block;font-size: 16px;
                                    border-radius: 10px" data-type="" data-price="{{$tool->price_per_hour}}"
                                            id="calculateBtn" type="button">Calculate
                                    </button>
                                </div>
                                <br>
                                <div style="display: none" id="submitFormDiv">
                                    <form action="{{route('user.hire.tool')}}" method="post" >
                                        @csrf
                                        <input type="hidden" name="tool_id" value="{{$tool->id}}">
                                        <input type="hidden" name="type" value="">
                                        <input type="hidden" name="duration" value="">
                                        <input type="hidden" name="start_date" value="">
                                        <input type="hidden" name="end_date" value="">
                                        <input type="hidden" name="total_price" value="">
                                        <input type="hidden" name="hiring price" value="{{$tool->price_per_hour}}">

                                        <button style="background-color:blue ;border: slateblue;color: white;padding: 15px 32px;
                                    text-align: center;display: inline-block;font-size: 16px;
                                    border-radius: 10px" type="submit">Hire A Tool
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.hire-type-btn').click(function () {
                $('input[name="type"]').val("");
                $('input[name="duration"]').val("");
                $('input[name="total_price"]').val("");
                $('input[name="start_date"]').val("");
                $('input[name="end_date"]').val("");

                $("#submitFormDiv").attr("style", "display:none");
                $("#result").text("");
                var hireType = $(this).data('hire-type');
                $('input[name="type"]').val(hireType);

                if(hireType === 'LongTerms'){
                    $("#dateDive").attr("style", "display:none")
                    $("#dates").attr("style", "display:block")
                }else{
                    $("#dates").attr("style", "display:none")
                    $("#dateDive").attr("style", "display:show")
                }
                $('.hire-type-btn').removeClass('activeBtn');
                $('.hire-type-btn').addClass('btnClr');
                $(this).removeClass('btnClr');
                $(this).addClass('activeBtn');
                $('#typeSpan').text(hireType);
                $('#calculateBtn').attr('data-type', hireType);
            });

            //Calculator

            $('#calculateBtn').click(function () {
                let price = $(this).attr('data-price');
                let type = $(this).attr('data-type');
                let duration = $("input[name=durationVal]").val();
                if(type === 'Hourly' || type === "Daily"){
                    if (type === '' || duration === '') {
                        toastr.error('Please select the options first', 'error', {timeOut: 3000});
                    } else {
                        if (type === 'Hourly') {
                            let hourlyPrice = (parseFloat(price) * parseFloat(duration)).toFixed(2);
                            $('input[name="total_price"]').val(hourlyPrice);

                            $('#result').text("You need to pay £" + hourlyPrice + " for selected duration");

                        }
                        if (type === 'Daily') {
                            let dailyPrice = (parseFloat(price) * (parseFloat(duration) * 24)).toFixed(2);
                            $('input[name="total_price"]').val(dailyPrice);

                            $('#result').text("You need to pay £" + dailyPrice + " for selected duration");
                        }
                    }
                }
                else{
                    let startDateString = $("input[name=startDateVal]").val();
                    let endDateString = $("input[name=endDateVal]").val();

                    console.log(startDateString,endDateString)
                    if (startDateString === '' || endDateString === '') {
                        toastr.error('Please select the start and end date/time first', 'error', {timeOut: 3000});
                    }else{
                        let startDate = new Date(startDateString);
                        let endDate = new Date(endDateString);
                        if (startDate.getTime() >= endDate.getTime()) {
                            toastr.error('End date should be greater than start date', 'error', {timeOut: 3000});
                        } else {
                            let differenceInHours = Math.abs(endDate - startDate) / 36e5;
                            let longTermPrice =(parseFloat(price) * differenceInHours).toFixed(2);
                            $('input[name="total_price"]').val(longTermPrice);
                            $('input[name="start_date"]').val(startDate);
                            $('input[name="end_date"]').val(endDate);
                            $('#result').text("You need to pay £" + longTermPrice + " for selected duration");
                        }
                    }
                }
                $('input[name="duration"]').val(duration);

                $("#submitFormDiv").attr("style", "display:block")
            });
        });
    </script>
@endsection
