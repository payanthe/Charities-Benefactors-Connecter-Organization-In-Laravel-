<?php

namespace App\Http\Controllers;

use App\Benefactor;
use App\Charity;
use App\Collaboration;
use App\User;
use App\UserRequests;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function index(){
        $charities = User::where('role_id','=','2')->get();
        $benefactors = User::where('role_id','=','1')->get();
        return view('admin')->with(compact('charities'))->with(compact('benefactors'));
    }
    public function deleteUser(Request $request){
        User::where('id','=',$request['user_id'])->delete();
        return redirect('/AdminPanel');
    }
    public function editUser(Request $request){
        $users = User::where('id','=',$request['user_id'])->get();
        return view('editPage')->with(compact('users'));
    }
    public function editRequest( Request $request){
        if(!$request['password'] == ''){
            User::where('id','=',$request['id'])->update([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>bcrypt($request['password']),
            ]);
        }
        else{
            User::where('id','=',$request['id'])->update([
                'name'=>$request['name'],
                'email'=>$request['email'],
            ]);
        }
        return redirect('/AdminPanel');
    }
    public function RQ(){
        $requests = UserRequests::all();
        $collaborations = Collaboration::all();
        return view('allRQ')->with(compact('collaborations'))->with(compact('requests'));
    }
    public function addUserPage(){
        return view('addUser');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function addUser(Request $request){
        User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password']),
            'role_id'=>$request['role'],
        ]);
        $user_id = User::where('email','=',$request['email'])->first()->id;
        if ($request['role']=='1'){
            Benefactor::create([
                'user_id' =>$user_id,
                'username' => $request['username'],
                'gender' => $request['gender'],
                'birth_date' => $request['birth_date'],
                'location_id' => $request['location'],
                'address' => $request['address'],
                'favorite_field' => $request['favorite_field'],
            ]);
            $abilities = $request['abilities'];
            foreach ($abilities as $ability){
                DB::table('benefactors_abilities')->insert([
                    ['user_id'=>$user_id,'abilities_id'=>$ability]
                ]);
            }
        }
        elseif ($request['role']=='2'){
            Charity::create([
                'user_id' =>$user_id,
                'username' => $request['username'],
                'location_id' => $request['location'],
                'address' => $request['address'],
                'latest_records' => $request['latest_records'],
            ]);

            User::where('id',$request['id'])->update(['active'=>'1']);

            $abilities = $request['required_abilities'];
            foreach ($abilities as $ability){
                DB::table('charities_abilities')->insert([
                    ['user_id'=>$user_id,'abilities_id'=>$ability]
                ]);
            }
        }
        User::where('id',$user_id)->update(['active'=>'1']);
        return 'new user has been add';
    }
}
