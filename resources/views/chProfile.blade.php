@extends('layouts.app')

@section('style')
    <link href="{{url('css/DnCh.css')}}" rel="stylesheet">
@endsection

@section('content')
    <main class="row justify-content-center profile" >
        <div class="CharityInfoBox col-12 row justify-content-center" style="height: 270px">
            <div class="CharityImgHolder mt-3 col-4 row justify-content-end">
                <img src="{{ url('img/Ch/1.png')}}" style="width: 60%;background: #ffffff">
            </div>
            <div class="col-6 pt-4 info" style="font-size: 18px">
                <strong>Name:</strong> {{$info->name}}<br>
                <strong>Location</strong> : {{$info->charity->location->name}}<br>
                <strong>Required Abilities</strong> :
                <span id="requirements">
                    @foreach($info->charAbilities as $ability)
                        <br>{{$ability->name}}
                    @endforeach
                </span>
                <br>
                <strong>latest Experiences</strong> : <br>{{$info->charity->latest_record}}
            </div>
        </div>
        <div class="DonateBox col-12 pt-4 row" style="height: 350px;overflow: hidden">
            <div class="Donation col-6 row justify-content-center">
                <legend class="col-7">Money Donation</legend>
                <form class="form-group col-6" style="height: 300px">
                    <input class="form-control" type="number" placeholder="Donation Amount in USD">
                    <input class="form-control mt-2" type="submit" value="Donate">
                </form>
            </div>
            <div class="application col-6 row justify-content-center">
                <legend class="col-7">Apply To Help</legend>
                <form class="form-group col-8" method="post" action="{{url('/benefactorToCharity')}}" style="height: 300px">
                    {{csrf_field()}}
                    <input type="hidden" name="from_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="to_id" value="{{$info->id}}">
                    <input class="form-control" type="text" name="specified_field" placeholder="Field of work or job name">

                    <select class="form-control" name="rqdAb">
                        <?php $number = 1; ?>
                        @foreach($info->charAbilities as $ability)
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

