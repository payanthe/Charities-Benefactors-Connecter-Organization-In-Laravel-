@extends('layouts.app')

@section('style')
    <link href="{{url('css/DnCh.css')}}" rel="stylesheet">
@endsection

@section('content')
    {{--<h1>{{$info->benefactor->abilities->name}}</h1>--}}
    <main class="row justify-content-center profile" >
        <div class="CharityInfoBox col-12 row justify-content-center">
            <div class="CharityImgHolder mt-3 col-4 row justify-content-end">
                <img src="{{url('img/Dn/images.jpg')}}" style="width: 60%">
            </div>
            <div class="col-6 pt-4 info" style="font-size: 18px">
                <strong>Name</strong> {{$info->name}}<br>
                <strong>Location</strong> : {{$info->benefactor->location->name}}<br>
                <strong>Abilities</strong> :
                <span id="requirements">
                    @foreach($info->benAbilities as $ability)
                        <br>{{$ability->name}}
                    @endforeach
                </span>
                <br>
                <strong>Favorite Field</strong> : <br>{{$info->benefactor->abilities->name}}
                <strong>Job History</strong> :
            </div>
        </div>
        <div class="DonateBox col-12 pt-4 row justify-content-center" style="min-height: 300px;height: 337px">
            <div class="application col-9 row justify-content-center">
                <legend class="col-7">Send Request For Collaboration</legend>
                <form class="form-group col-8" method="post" action="{{url('/charityToBenefactor')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="from_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="to_id" value="{{$info->id}}">
                    <input class="form-control" type="text" name="specified_field" placeholder="Field of work or job name">
                    <select class="form-control" name="rqdAb">
                        <option style="font-weight: bold" value="0">.... Required ability ....</option>
                        <?php $number = 1; ?>
                        @foreach($info->benAbilities as $ability)
                            <option value="{{$ability->id}}">{{$number++.'.'}} {{$ability->name}} </option>
                        @endforeach
                    </select>
                    <textarea class="form-control mt-1" rows="3" placeholder="Message" name="message"></textarea>
                    <input class="form-control mt-2" type="submit" value="Send Request">
                </form>
            </div>
        </div>
    </main>
@endsection