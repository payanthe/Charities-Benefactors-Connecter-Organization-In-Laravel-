@extends('layouts.app')
@section('style')
    <style>
        .benefactorBoxes span{
            display: inline-block;
            width: 180px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }
        .benefactorBoxes .button{
            color: #ffffff;
            border-color: #FD5961;
            background: #FD5961;
            width: 100%!important;
            margin-top: 5px;
            border-radius: 5px;
            transition: all ease 0.5s!important;
        }
        .benefactorBoxes .button:hover{
            color: white!important;
            background: #2E5A73;
            border-color: #2E5A73;

        }
    </style>
@endsection
@section('content')
    <div class="donatorsHolder col-12 pb-2 " style="background: rgba(255,255,255,0.7);padding: 50px 0 25px 0;">
        <div class="headerTitle col-12 text-center" style="color: #2e5a73;">Benefactors</div>
        <hr style="border-style: solid;">
        <div class="container">
            <form method="post" action="{{url('/filter')}}">
                <input type="submit">
            </form>
        </div>
        <div class="donatorsBar row justify-content-around">
            @foreach($outputs as $charity)
                <div class="charitiesBox col-2 justify-content-start p-1 ml-1 benefactorBoxes"
                     style="background:rgba(249,249,249,0.89);border-radius: 5px;height:450px;">
                    <img src="{{url('img/Dn/images.jpg')}}" style="width: 100%">
                    <div class="content row justify-content-start" style="max-height: 185px;min-height: 160px;
                border-bottom: 2px dotted #2e5a73;">
                        <span class="text-left pl-1">{{$charity->name}}</span><br>
                        <span class="text-left pl-2 col-10" style="font-size: 12px;color: #dc4d52">
                    <i class="fas fa-map-marker" style="color: #FD5961;"></i>
                          {{--  {{$charity->charity->location->name}}--}}</span>
                        <br>
                        <div class="text-left skills p-1 col-12" style="font-size: 15px;color: #2e5a73">Required Abilities:</div>
                        <div class="col-12 text-left" style="height: 170px">
                            {{--@foreach($charity->charAbilities as $ability)
                                <span class="text-left" style="font-size: 10px;line-height: 20px;">#{{$ability->name}}</span><br>
                            @endforeach--}}
                        </div>
                    </div>
                    <a class="btn button col-12" style="color: white" href="{{url('charities/profile/'.$charity->id)}}">Visit</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection