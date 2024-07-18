<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->paginate('20');
        return view('admin.partners', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'url' => 'required|max:255',
            'logo' => 'required|max:255',
            'width' => 'nullable|max:255',
            'height' => 'nullable|max:255',
            'startDate' => 'required|max:255',
            'endDate' => 'required',
            'none' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $timestamp = now()->timestamp;
            $fileName =   $timestamp . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('partners', $fileName, 'public');
        }
            // $file = $request->file('image');
            // $filename = date('YmdHi') . $file->getClientOriginalName();
            // $file->move(public_path('upload/partner/'), $filename);
            // $data['image'] = 'upload/partner/'.$filename;
        $dat['logo'] = $filePath;
        $partner = Partner::create($data);
        return view('admin.partner')->with('alert', [
            'title' => 'Success!',
            'text' => 'Course created successfully.',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
