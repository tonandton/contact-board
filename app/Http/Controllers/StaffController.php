<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $staffs = Staff::where([
            ['id', '!=', Null],
            [
                function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('first_name', 'LIKE', '%' . $s . '%')->orWhere('last_name', 'LIKE', '%' . $s . '%')->get();
                    }
                }
            ]
        ])->paginate(10);

        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Staff::create($request->all());
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staffs = Staff::where('id', $id)->get();
        return view('staff.edit', compact('staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->update($request->all());
        return redirect()->route('staff.index')->with('alert', "แก้ไขข้อมูลเรียบร้อยแล้ว");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::where('id', $id)->delete();
        return redirect()->route('staff.index')->with('alert', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}
