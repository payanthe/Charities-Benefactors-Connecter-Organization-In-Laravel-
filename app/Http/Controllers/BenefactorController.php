<?php

namespace App\Http\Controllers;

use App\Charity;
use App\Collaboration;
use App\User;
use App\UserRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests;
use App\Benefactor;


class BenefactorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('IsBenefactor');
    }

    public function index()
    {
        $charities = User::where('role_id', '=', '2')->get();
        return view('charities', compact('charities'));
    }

    public function filter(Request $request)
    {
        if($request['rqdAb']=='0'){
            $charities = User::where('role_id',2)->get();
            return view('charities', compact('charities'));
        }
        else{
            $users = DB::table('charities_abilities')->where('abilities_id', '=', $request['rqdAb'])->pluck('user_id');
            //$charities = User::find($users);
            $charities = User::whereIn('id',$users)->get();
            //return $charities;
            return view('charities', compact('charities'));
        }
    }

    public function profile($id)
    {

        $info = User::find($id);
        return view('chProfile', compact('info'));

    }

    public function collaborationRequest(Request $request)
    {
        $this->validate($request, [
            'rqdAb' => 'required|not_in:0',
        ]);
        UserRequests::create([
            'sender_id' => $request['from_id'],
            'receiver_id' => $request['to_id'],
            'specified_field' => $request['specified_field'],
            'abilities_id' => $request['rqdAb'],
            'message' => $request['message'],
        ]);
        return redirect('/benefactor/dashboard');
    }

    public function dashboard()
    {

        $receivedRequests = UserRequests::where('receiver_id', '=', Auth::user()->id)->get();
        $sentRequests = UserRequests::where('sender_id', '=', Auth::user()->id)->get();
        $collaborations = Collaboration::where('employee_id', '=', Auth::user()->id)->get();
        return view('benefactorDashboard')->with(compact('sentRequests'))->with(compact('receivedRequests'))->with(compact('collaborations'));
    }

    public function requestFunction(Request $request)
    {
        if ($request['accept'] == '0') {
            UserRequests::where('id', '=', $request['request_id'])->delete();
            return redirect('/benefactor/dashboard');
        } elseif ($request['accept'] == '1') {
            $columns = UserRequests::where('id', '=', $request['request_id'])->get();
            foreach ($columns as $column) {
                Collaboration::create([
                    'owner_id' => $column->sender_id,
                    'employee_id' => $column->receiver_id,
                    'abilities_id' => $column->abilities_id,
                    'specified_field' => $column->specified_field,
                ]);
            }
            UserRequests::where('id', '=', $request['request_id'])->delete();
            return redirect('/benefactor/dashboard');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|max:255|unique:benefactor',
            'abilities' => 'required|not_in:0',
            'favorite_field' => 'required|not_in:0',
        ]);
        Benefactor::create([
            'user_id' => $request['id'],
            'username' => $request['username'],
            'gender' => $request['gender'],
            'birth_date' => $request['birth_date'],
            'location_id' => $request['location'],
            'address' => $request['address'],
            'favorite_field' => $request['favorite_field'],
        ]);
        User::where('id', $request['id'])->update(['active' => '1']);

        $abilities = $request['abilities'];
        foreach ($abilities as $ability) {
            DB::table('benefactors_abilities')->insert([
                ['user_id' => $request['id'], 'abilities_id' => $ability]
            ]);
        }
        return redirect('/dashboard');
    }

}
