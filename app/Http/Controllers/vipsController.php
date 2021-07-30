<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\vip;

use Illuminate\Http\Request;

class vipsController extends Controller
{
    public function vip($id)
    {
        $user = user::find($id);
        return view('admin.users.vip')->with(compact('user'));
    }

    public function upgradeVip(Request $request, $id)
    {
        if(vip::where('user_id','=',$id)->count() > 0) {
            $vip = vip::where('user_id','=',$id)->first();

            if($vip->end_day <= date('Y-m-d')) {
                $vip->start_day = date('Y-m-d');
                $end_day = strtotime(date('Y-m-d') . $request['vip_day']);
            }
            else {
                $end_day = strtotime($vip->end_day . $request['vip_day']);
            }
            $end_day = strftime("%Y-%m-%d", $end_day);

            $vip->end_day = $end_day;
            $vip->save();
        }
        else {
            $start_day = date('Y-m-d');
            $end_day = strtotime(date("Y-m-d", strtotime($start_day)) . $request['vip_day']);
            $end_day = strftime("%Y-%m-%d", $end_day);
            vip::create([
                'user_id' => $id,
                'start_day' => $start_day,
                'end_day' => $end_day,
            ]);
        }
        return redirect()->route('admin.users.index')->with('success', 'You add vip ' . $request->email . ' success');
    }
}
