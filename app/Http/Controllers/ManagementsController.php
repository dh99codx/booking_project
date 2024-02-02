<?php

namespace App\Http\Controllers;

use App\Models\FamilyDetails;
use App\Models\Management;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ManagementsController extends Controller
{
    public function index()
    {
        $model_has_roles = DB::table('model_has_roles')->get();
        return view('app.manageaccount.index',compact('model_has_roles'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('app.manageaccount.create', compact('roles','users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id'=>'required',
            'role_id'=>'required',
        ]);

        $model_has_roles =DB::table('model_has_roles')->where('model_id', $request->user_id)->exists();

        if ($model_has_roles)
        {
            return back()->with("error","User already exist");

        }else{

            $form_data=array(
                'role_id'=>$request->role_id,
                'model_type'=>'App\Models\User',
                'model_id'=>$request->user_id,
            );

            DB::table('model_has_roles')->insert($form_data);

            return back()->with("success", "Store data successfully.");
        }

    }

    public function destroy(Request $request)
    {

        DB::table('model_has_roles')
            ->where('model_id', $request->model_id)
            ->delete();

        return back()->with("success", "Record delete successfully.");
    }

}
