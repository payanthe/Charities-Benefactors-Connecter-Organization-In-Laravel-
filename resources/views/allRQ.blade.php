@extends('layouts.admin')
@section('style')
    <style>
        /*span{
            display: inline-block;
            width: 180px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }*/
        .benefactorBoxes button{
            cursor: pointer;
            color: #ffffff;
            border-color: #FD5961;
            background: #FD5961;
            transition: all ease 0.5s!important;
            border: none!important;
        }
        .Holder{
            background: rgba(255,255,255,0.80);
            min-height: 300px;
            margin-top: 20px;
            clip-path: polygon(18% 0, 25% 10%, 100% 10%, 100% 100%, 0 100%, 0 0);
            border-radius: 5px;
        }
        .colapsBox > div{
            box-shadow: -1px 2px 10px 2px #1d1e1f;
        }
    </style>
@endsection
@section('content')
    <div class="donatorsHolder col-12 pb-2 " style="background: rgba(255,255,255,0.7);padding: 50px 0 25px 0;">
        <div class="headerTitle col-12 text-center" style="color: #2e5a73;">All Requests & Collaborations</div>
        <hr style="border-style: solid;">
        <div class="container">
            <div class="Holder">
                <div class="col-12 text-left p-2" style="color: #2e5a73;font-weight: bold;font-size: 20px"> Requests : <i class="fas fa-arrow-down"></i></div><hr style="margin-top: 0;border-style: solid;border-radius: 0">
                <div class="col-12 row justify-content-start colapsBox" style=";">
                    @foreach($requests as $request)
                        <div class="charitiesBox col-2 justify-content-start p-1 ml-1 benefactorBoxes"
                             style="background:rgba(249,249,249,0.89);border-radius: 5px;font-size: 13px">
                            <div style="color: #2E5A73">
                                {{$request->created_at}}
                            </div>
                            <div class="content row justify-content-start mt-2 pt-1" style="max-height: 185px;min-height: 160px;border-top: 2px dotted #FD5961;">
                                <span class="text-left pl-1">From: {{$request->receiverName->name}}</span>
                                <span class="text-left pl-1">To: {{$request->senderName->name}}</span>
                                <span class="text-left pl-1">Field: {{$request->specified_field}}</span>
                                <div class="text-left skills p-0" style="font-size: 13px;color: #FD5961">Required Ability:</div>
                                <div class="col-12 text-left p-1">
                                    {{$request->requestedAbility->name}}
                                </div>
                                <div style="font-size: 13px;color: #FD5961">message:</div>
                                <span class="col-12 text-left p-1">
                                {{$request->message}}
                            </span><br>
                            </div>
                            <div class="row justify-content-around">
                                {{--<form action="{{url('/benefactor/requestFunction')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$request->id}}" name="request_id">
                                    <input type="hidden" value="1" name="accept">
                                    <button class="btn col-12" type="submit">Accept</button>
                                </form>
                                <form action="{{url('/benefactor/requestFunction')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$request->id}}" name="request_id">
                                    <input type="hidden" value="0" name="accept">
                                    <button class="btn col-12" type="submit" style="background: #2e5a73">Reject</button>
                                </form>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="Holder">
                <div class="col-12 text-left p-2 " style="color: #2e5a73;font-weight: bold;font-size: 20px">
                    collaborations : <i class="fas fa-arrow-down"></i></div>
                <hr style="margin-top: 0;border-style: solid;border-radius: 0">
                <div class="col-12 row justify-content-start colapsBox" style=";">
                    @foreach($collaborations as $request)
                        <div class="charitiesBox col-2 justify-content-start p-1 ml-1 benefactorBoxes"
                             style="background:rgba(249,249,249,0.89);border-radius: 5px;font-size: 13px">
                            <div style="color: #2E5A73">
                                {{$request->created_at}}
                            </div>
                            <div class="content row justify-content-start mt-2 pt-1" style="max-height: 185px;min-height: 160px;border-top: 2px dotted #FD5961;">
                                <span class="text-left pl-1">Charity Name: {{$request->charityName->name}}</span>
                                <span class="text-left pl-1">Benefactor Name: {{$request->BenefactorName->name}}</span>
                                <span class="text-left pl-1">Field: {{$request->specified_field}}</span>
                                <div class="text-left skills p-0" style="font-size: 13px;color: #FD5961">Required Ability:</div>
                                <div class="col-12 text-left p-1">
                                    {{$request->requestedAbility->name}}
                                </div>
                                <br>
                            </div>
                            <div class="row justify-content-around">

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection