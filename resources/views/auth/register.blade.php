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
        <form class="form-group col-10 mt-3"  method="post" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <select name="role" class="form-control" >
                        {{ old('role') }}
                        <option value="0" style="font-weight: bold">Choose your Role</option>
                        <option value="1">Benefactor</option>
                        <option value="2">Charity</option>
                    </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <hr class="dotted mt-2">
            <input class="form-control mt-2" type="submit" value="Register">
        </form>
    </div>
</main>
@endsection
