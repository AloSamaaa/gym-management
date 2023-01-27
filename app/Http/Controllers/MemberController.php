<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function display(){
        return view('welcome')->with('members', Member::orderByDesc('created_at')->get());
    }

    public function edit($id)
    {
        $member = Member::find($id);

        return view('edit')->with('member', $member);
    }

    public function update(Request $request)
    {
        $member = Member::find($request->id);

        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_expiration = $request->membership_expiration;
        $member->trainer_id = $request->trainer_id;
        $member->membership_id = $request->membership_id;

        $member->save();

        return redirect()->route('welcome')->with('success', 'Member updated successfully!');
    }

    public function create(Request $request){
        $member = new member;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->membership_expiration = $request->membership_expiration;
        $member->trainer_id = $request->trainer_id;
        $member->membership_id = $request->membership_id;

        $member->save();
        return redirect()->route('welcome')->with('success', "New member added!");
    }

    public function delete($id){
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('welcome')->with('success',"Member deleted!");
    }
}
