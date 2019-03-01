<?php

namespace App\Http\Controllers;

use App\Benefactor;
use App\Charity;
use App\Collaboration;
use App\UserRequests;
use App\User;
use Illuminate\Http\Request;
use App\Abilities;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CharityController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('IsCharity');
    }

    public function index(){

        $benefactors =User::where('role_id','=','1')->get();
        return view('benefactors',compact('benefactors'));

    }
    public function filter(Request $request)
    {
        if($request['rqdAb']=='0'){
            $benefactors = User::where('role_id','1')->get();
            return view('benefactors', compact('benefactors'));
        }
        else{
            $users = DB::table('benefactors_abilities')->where('abilities_id', '=', $request['rqdAb'])->pluck('user_id');
            //$charities = User::find($users);
            $benefactors = User::whereIn('id',$users)->get();
            //return $charities;
            return view('benefactors', compact('benefactors'));
        }
    }
    public function profile($id){
        $info = User::find($id);
        return view('benProfile',compact('info'));
    }
    public function collaborationRequest(Request $request){
        $this->validate($request,[
            'rqdAb' => 'required|not_in:0',
        ]);
        UserRequests::create([
            'sender_id'=>$request['from_id'],
            'receiver_id'=>$request['to_id'],
            'specified_field'=>$request['specified_field'],
            'abilities_id'=>$request['rqdAb'],
            'message'=>$request['message'],
        ]);
        return redirect('/charity/dashboard');
    }
    public function dashboard(){
       //return 'this is charity dashboard';
        $receivedRequests = UserRequests::where('receiver_id','=',Auth::user()->id)->get();
        $sentRequests = UserRequests::where('sender_id','=',Auth::user()->id)->get();
        $collaborations = Collaboration::where('owner_id','=',Auth::user()->id)->get();
        return view('charityDashboard')->with(compact('sentRequests'))->with(compact('receivedRequests'))->with(compact('collaborations'));

    }
    public function requestFunction(Request $request){
        if($request['accept']=='0'){
            UserRequests::where('id','=',$request['request_id'])->delete();
            return redirect('/charity/dashboard');
        }
        elseif ($request['accept']=='1'){
            $columns = UserRequests::where('id','=',$request['request_id'])->get();
            foreach ($columns as $column) {
                Collaboration::create([
                    'owner_id'=>$column->receiver_id,
                    'employee_id'=>$column->sender_id,
                    'abilities_id'=>$column->abilities_id,
                    'specified_field'=>$column->specified_field,
                ]);
            }
            UserRequests::where('id','=',$request['request_id'])->delete();
            return redirect('/charity/dashboard');
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){

        $this->validate($request,[
            'username' => 'required|max:255|unique:charity',
            'required_abilities' => 'required|not_in:0',
        ]);

        Charity::create([
            'user_id' =>$request['id'],
            'username' => $request['username'],
            'location_id' => $request['location'],
            'address' => $request['address'],
            'latest_records' => $request['latest_records'],
        ]);

        User::where('id',$request['id'])->update(['active'=>'1']);

        $abilities = $request['required_abilities'];
        foreach ($abilities as $ability){
            DB::table('charities_abilities')->insert([
                ['user_id'=>$request['id'],'abilities_id'=>$ability]
            ]);
        }
        return redirect('/dashboard');
    }
}
