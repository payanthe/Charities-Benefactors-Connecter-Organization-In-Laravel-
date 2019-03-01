@extends('layouts.admin')

@section('style')
    <link href="{{url('css/register.css')}}" rel="stylesheet">
@endsection

@section('content')
<main class="row justify-content-center RegForm" >
    <div class="col-6 mt-4 text-center formDiv row justify-content-center" style="background: rgba(255,255,255,0.85);">
        <span class="col-12" style="color: #FD5961;">
            Registration Form
        </span>
        <br>
        <span style="font-size: 16px" class="mb-3"> Please enter User info for registration</span>
        <hr>
        <form class="form-group col-10 mt-3"  method="post" action="{{ url('/addUser') }}">
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
            <div class="userTypeInputs">

            </div>
            <hr class="dotted mt-2">
            <input class="form-control mt-2 submit" type="submit" value="Register">
        </form>
        <div class="response" style="color: #FD5961;font-size: 30px;">

        </div>
    </div>
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('select[name="role"]').on('change',function(){
               var role = $('select').val();
               if(role === '1'){
                   $('.userTypeInputs').empty();
                   $('.userTypeInputs').append("<div class=\"form-group{{ $errors->has('username') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <input id=\"username\" type=\"text\" class=\"form-control\" name=\"username\" value=\"{{ old('username') }}\" placeholder=\"Username\">\n" +
                       "                    @if ($errors->has('username'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('username') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "\n" +
                       "            <div class=\"form-group{{ $errors->has('gender') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <select id=\"gender\" class=\"form-control\" name=\"gender\">\n" +
                       "                        <option value=\"0\" style=\"font-weight: bold\">Select Your Gender</option>\n" +
                       "                        <option value=\"male\">Male</option>\n" +
                       "                        <option value=\"female\">Female</option>\n" +
                       "                    </select>\n" +
                       "                    @if ($errors->has('gender'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('gender') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "            <div class=\"form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}\">\n" +
                       "               <div class=\"col-md-12\">\n" +
                       "                    <input type=\"date\" name=\"birth_date\" class=\"form-control\">\n" +
                       "                    @if ($errors->has('birth_date'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('birth_date') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "            <div class=\"form-group{{ $errors->has('location') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <select id=\"location\" class=\"form-control\" name=\"location\">\n" +
                       "                        <option style=\"font-weight: bold\" value=\"0\">Select You Location</option>\n" +
                       "                        <option value=\"th\">Tehran</option>\n" +
                       "                        <option value=\"is\">Isfahan</option>\n" +
                       "                        <option value=\"ta\">Tabriz</option>\n" +
                       "                        <option value=\"ma\">Mashhad</option>\n" +
                       "                    </select>\n" +
                       "                    @if ($errors->has('location'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('location') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "            <div class=\"form-group{{ $errors->has('address') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <textarea id=\"address\" class=\"form-control\" name=\"address\" value=\"{{ old('address') }}\" placeholder=\"Address\"></textarea>\n" +
                       "\n" +
                       "                    @if ($errors->has('address'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('name') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "\n" +
                       "            <div class=\"form-group{{ $errors->has('abilities') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <select id=\"abilities\" class=\"form-control\" name=\"abilities[]\" multiple>\n" +
                       "                        <option style=\"font-weight: bold\">.... Choose your abilities ....</option>\n" +
                       "                        <option value=\"1\">1. Money resources </option>\n" +
                       "                        <option value=\"2\">2. Communication skills: oral and written</option>\n" +
                       "                        <option value=\"3\">3. Administrative and organisational skills</option>\n" +
                       "                        <option value=\"4\">4. Commercial / Business awareness</option>\n" +
                       "                        <option value=\"5\">5. Pro-activity and flexibility</option>\n" +
                       "                        <option value=\"6\">6. Willingness to undertake routine jobs</option>\n" +
                       "                        <option value=\"7\">7. Languages</option>\n" +
                       "                        <option value=\"8\">8. Team-working and people skills</option>\n" +
                       "                    </select>\n" +
                       "\n" +
                       "                    @if ($errors->has('abilities'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('abilities') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>\n" +
                       "\n" +
                       "            <div class=\"form-group{{ $errors->has('favorite_field') ? ' has-error' : '' }}\">\n" +
                       "                <div class=\"col-md-12\">\n" +
                       "                    <select id=\"favorite_field\"  class=\"form-control\" name=\"favorite_field\">\n" +
                       "                        <option style=\"font-weight: bold\">.... Choose your favorite Field ....</option>\n" +
                       "                        <option value=\"8\">1. Team-working and people skills</option>\n" +
                       "                        <option value=\"2\">2. Communication skills: oral and written</option>\n" +
                       "                        <option value=\"3\">3. Administrative and organisational skills</option>\n" +
                       "                        <option value=\"4\">4. Commercial / Business awareness</option>\n" +
                       "                        <option value=\"5\">5. Pro-activity and flexibility</option>\n" +
                       "                        <option value=\"6\">6. Willingness to undertake routine jobs</option>\n" +
                       "                        <option value=\"7\">7. Languages</option>\n" +
                       "                    </select>\n" +
                       "\n" +
                       "                    @if ($errors->has('favorite_field'))\n" +
                       "                        <span class=\"help-block\">\n" +
                       "                            <strong>{{ $errors->first('favorite_field') }}</strong>\n" +
                       "                        </span>\n" +
                       "                    @endif\n" +
                       "                </div>\n" +
                       "            </div>");
               }
               else if(role === '2'){
                   $('.userTypeInputs').empty();
                    $('.userTypeInputs').append("<div class=\"form-group{{ $errors->has('username') ? ' has-error' : '' }}\">\n" +
                        "                    <div class=\"col-md-12\">\n" +
                        "                        <input placeholder=\"Username\" id=\"username\" type=\"text\" class=\"form-control\" name=\"username\" value=\"{{ old('username') }}\">\n" +
                        "\n" +
                        "                        @if ($errors->has('username'))\n" +
                        "                            <span class=\"help-block\">\n" +
                        "                                <strong>{{ $errors->first('username') }}</strong>\n" +
                        "                            </span>\n" +
                        "                        @endif\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "                <div class=\"form-group{{ $errors->has('location') ? ' has-error' : '' }}\">\n" +
                        "                    <div class=\"col-md-12\">\n" +
                        "                        <select id=\"location\" class=\"form-control\" name=\"location\">\n" +
                        "                            <option value=\"0\">Choose Your Location</option>\n" +
                        "                            <option value=\"th\">Tehran</option>\n" +
                        "                            <option value=\"is\">Isfahan</option>\n" +
                        "                            <option value=\"ta\">Tabriz</option>\n" +
                        "                            <option value=\"ma\">Mashhad</option>\n" +
                        "                        </select>\n" +
                        "                        @if ($errors->has('location'))\n" +
                        "                            <span class=\"help-block\">\n" +
                        "                                <strong>{{ $errors->first('location') }}</strong>\n" +
                        "                            </span>\n" +
                        "                        @endif\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "\n" +
                        "                <div class=\"form-group{{ $errors->has('address') ? ' has-error' : '' }}\">\n" +
                        "                    <div class=\"col-md-12\">\n" +
                        "                        <textarea placeholder=\"Enter Your Address\" id=\"address\" class=\"form-control\" name=\"address\" value=\"{{ old('address') }}\"></textarea>\n" +
                        "\n" +
                        "                        @if ($errors->has('address'))\n" +
                        "                            <span class=\"help-block\">\n" +
                        "                                <strong>{{ $errors->first('name') }}</strong>\n" +
                        "                            </span>\n" +
                        "                        @endif\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "\n" +
                        "                <div class=\"form-group{{ $errors->has('required_abilities') ? ' has-error' : '' }}\">\n" +
                        "                    <div class=\"col-md-12\">\n" +
                        "                        <select id=\"required_abilities\" class=\"form-control\" name=\"required_abilities[]\" multiple>\n" +
                        "                            <option style=\"font-weight: bold\" value=\"0\">.... Required abilities ....</option>\n" +
                        "                            <option value=\"1\">1. Money resources </option>\n" +
                        "                            <option value=\"2\">2. Communication skills: oral and written</option>\n" +
                        "                            <option value=\"3\">3. Administrative and organisational skills</option>\n" +
                        "                            <option value=\"4\">4. Commercial / Business awareness</option>\n" +
                        "                            <option value=\"5\">5. Pro-activity and flexibility</option>\n" +
                        "                            <option value=\"6\">6. Willingness to undertake routine jobs</option>\n" +
                        "                            <option value=\"7\">7. Languages</option>\n" +
                        "                            <option value=\"8\">8. Team-working and people skills</option>\n" +
                        "                        </select>\n" +
                        "\n" +
                        "                        @if ($errors->has('required_abilities'))\n" +
                        "                            <span class=\"help-block\">\n" +
                        "                                        <strong>{{ $errors->first('required_abilities') }}</strong>\n" +
                        "                                    </span>\n" +
                        "                        @endif\n" +
                        "                    </div>\n" +
                        "                </div>\n" +
                        "\n" +
                        "                <div class=\"form-group{{ $errors->has('latest_records') ? ' has-error' : '' }}\">\n" +
                        "                     <div class=\"col-md-12\">\n" +
                        "                        <textarea id=\"favorite_field\"  class=\"form-control\" name=\"latest_records\" placeholder=\"Your Latest Records\"></textarea>\n" +
                        "                        @if ($errors->has('latest_records'))\n" +
                        "                            <span class=\"help-block\">\n" +
                        "                                <strong>{{ $errors->first('latest_records') }}</strong>\n" +
                        "                            </span>\n" +
                        "                        @endif\n" +
                        "                    </div>\n" +
                        "                </div>");
                }
            });
            $('.submit').click(function (e) {
                e.preventDefault();
                var data = $('form').serialize();
                $.ajax({
                    type:'POST',
                    url:'addUser',
                    data: data,
                    success:function () {
                       $('.response').text('new User Has been Registered');
                    }
                });
            })
        })
    </script>
@endsection

