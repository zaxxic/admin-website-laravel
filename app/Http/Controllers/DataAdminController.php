<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use App\Models\webprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAdminController extends Controller
{  
    public function DataAdmin()
    {
          $pending = User::where('status', 'pending')->paginate(2);
        $pending1 = User::where('status', 'aktif')->paginate(10);
        $data1=webprofile::all();
        
        return view ('webadmin.data_admin',['data'=>$pending,'data2'=>$pending1,'data1'=>$data1]);

    }

    public function deleteadmin($id){
        $data = User::Find($id)->delete();
        return redirect('dataadmin');
    }

    public function updateStatus($id)
{
    $data = User::find($id);

    if ($data->status == 'pending') {
        $data->status = 'aktif';
    }

    $data->save();

    return redirect()->back();
}




    public function lihat($id) {
        $data = register::find($id);
        $data1=webprofile::all();
        return view('evs', ['data' => $data,'data1'=>$data1]);
    }


   
}
