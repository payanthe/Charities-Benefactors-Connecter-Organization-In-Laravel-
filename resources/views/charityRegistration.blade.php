@extends('layouts.app')

@section('style')
    <link href="{{url('css/register.css')}}" rel="stylesheet">
@endsection

@section('content')
    <main class="row justify-content-center RegForm" >
        <div class="col-6 mt-4 text-center formDiv row justify-content-center" style="background: rgba(255,255,255,0.85);">
            <span class="col-12" style="color: #FD5961;">
                Donators Registration Form
            </span>
            <br>
            <span style="font-size: 16px" class="mb-3"> Please enter your info for registration</span>
            <hr>
            <form class="form-horizontal col-10" role="form" method="POST" action="{{ url('/registerPart2/charityFinalRegistration') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input placeholder="Username" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <select id="location" class="form-control" name="location">
                            <option value="0">Choose Your Location</option>
                            <option value="th">Tehran</option>
                            <option value="is">Isfahan</option>
                            <option value="ta">Tabriz</option>
                            <option value="ma">Mashhad</option>
                        </select>
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <textarea placeholder="Enter Your Address" id="address" class="form-control" name="address" value="{{ old('address') }}"></textarea>

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('required_abilities') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <select id="required_abilities" class="form-control" name="required_abilities[]" multiple>
                            <option style="font-weight: bold" value="0">.... Required abilities ....</option>
                            <option value="1">1. Money resources </option>
                            <option value="2">2. Communication skills: oral and written</option>
                            <option value="3">3. Administrative and organisational skills</option>
                            <option value="4">4. Commercial / Business awareness</option>
                            <option value="5">5. Pro-activity and flexibility</option>
                            <option value="6">6. Willingness to undertake routine jobs</option>
                            <option value="7">7. Languages</option>
                            <option value="8">8. Team-working and people skills</option>
                        </select>

                        @if ($errors->has('required_abilities'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('required_abilities') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('latest_records') ? ' has-error' : '' }}">
                     <div class="col-md-12">
                        <textarea id="favorite_field"  class="form-control" name="latest_records" placeholder="Your Latest Records"></textarea>
                        @if ($errors->has('latest_records'))
                            <span class="help-block">
                                <strong>{{ $errors->first('latest_records') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control mt-2" type="submit" value="Register">
                </div>
            </form>
        </div>
    </main>
@endsection
