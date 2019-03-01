@extends('layouts.admin')

@section('style')
    <style>
        span{
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
        .donatorsHolder{
            margin-top: 10px;
            background: rgba(255,255,255,0.80);
            clip-path: polygon(60% 0, 65% 10%, 100% 10%, 100% 100%, 90% 100%, 50% 100%, 0 100%, 0 10%, 35% 10%, 40% 0);
        }
    </style>
@endsection

@section('content')
    <div class="donatorsHolder col-12 pb-2 " style="padding: 10px 0 25px 0;">
        <div class="headerTitle col-12 text-center" style="color: #2e5a73;">Charities</div>
        <hr style="border-style: solid;">
        <div class="donatorsBar row justify-content-around">
            @foreach($charities as $charity)
                <div class="charitiesBox col-2 justify-content-start p-1 ml-1 benefactorBoxes"
                     style="background:rgba(249,249,249,0.89);border-radius: 5px;">
                    <img src="img/Dn/images.jpg" style="width: 100%">
                    <div class="content row justify-content-start" style="font-size: 14px">
                        <span class="text-left pl-1">name: {{$charity->name}}</span><br>
                        <span class="text-left pl-1">Username: {{$charity->charity->username}}</span><br>
                        <span class="text-left pl-1">Email: {{$charity->email}}</span><br>
                        <span class="text-left pl-1">Location:</span>
                        <span class="text-left pl-1" style="font-size: 12px;color: #dc4d52">
                            <i class="fas fa-map-marker" style="color: #FD5961;"></i>
                            {{$charity->charity->location->name}}</span>
                        <br>
                        <div class="text-left skills p-1 col-12" style="font-size: 15px;color: #2e5a73">Required Abilities:</div>
                        <div class="col-12 text-left" style="min-height: 90px;">
                            @foreach($charity->charAbilities as $ability)
                                <span class="text-left" style="font-size: 10px;line-height: 20px;">#{{$ability->name}}</span><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row col-12 p-0 justify-content-around" style="width: 100%">
                        <form class="col-4 p-0" method="post" action="{{url('/deleteUser')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$charity->id}}">
                            <button class=" button col-12 m-0" style="height: 42px;font-size: 12px">Delete</button>
                        </form>
                        <form class="col-7 p-0" method="post" action="{{url('/editUser')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$charity->id}}">
                            <button class=" button col-12 m-0" style="height: 42px;font-size: 12px">Edit</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="donatorsHolder col-12 pb-2 pt-2 ">
        <div class="headerTitle col-12 text-center" style="color: #2e5a73;">Benefactors</div>
        <hr style="border-style: solid;">
        <div class="donatorsBar row justify-content-around">
            @foreach($benefactors as $benefactor)
                <div class="charitiesBox col-2 justify-content-start p-1 ml-1 benefactorBoxes"
                     style="background:rgba(249,249,249,0.89);border-radius: 5px;">
                    <img src="img/Dn/images.jpg" style="width: 100%">
                    <div class="content row justify-content-start" style="font-size: 14px">
                        <span class="text-left pl-1">Name: {{$benefactor->name}}</span><br>
                        <span class="text-left pl-1">Username: {{$benefactor->benefactor->username}}</span><br>
                        <span class="text-left pl-1">Email: {{$benefactor->email}}</span><br>
                        <span class="text-left pl-1">Location: </span>
                        <span class="text-left pl-2" style="font-size: 12px;color: #dc4d52">
                    <i class="fas fa-map-marker" style="color: #FD5961;"></i>
                            {{$benefactor->benefactor->location->name}}</span>
                        <br>
                        <div class="text-left skills p-1 col-12" style="font-size: 15px;color: #2e5a73">Abilities:</div>
                        <div class="col-12 text-left" style="min-height: 90px">
                            @foreach($benefactor->benAbilities as $ability)
                                <span class="text-left" style="font-size: 10px;line-height: 20px;">#{{$ability->name}}</span><br>
                            @endforeach
                        </div>

                    </div>
                    <div class="row col-12 p-0 justify-content-around" style="width: 100%">
                        <form class="col-4 p-0" method="post" action="{{url('/deleteUser')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$charity->id}}">
                            <button class=" button col-12 m-0" style="height: 42px;font-size: 12px">Delete</button>
                        </form>
                        <form class="col-7 p-0" method="post" action="{{url('/editUser')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$charity->id}}">
                            <button class=" button col-12 m-0" style="height: 42px;font-size: 12px">Edit</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection