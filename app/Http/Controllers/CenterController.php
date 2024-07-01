<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{

    public function index(Request $request)
    {
        $centers = Center::paginate(10);

        return view('admin.manage-center', compact('centers'));
    }

    public function create(){
        return view('admin.add-center');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:centers,name',
            'state' => 'required|string',
            'code' => 'required|unique:centers,code',
            'address' => 'required|string',
        ]);

        $center = new Center([
            'name' => $request->get('name'),
            'state' => $request->get('state'),
            'code' => $request->get('code'),
            'address' => $request->get('address'),
            'created_by' => auth()->id(), 
        ]);

        $center->save();
        return redirect()->route('add.center')->with('alert', [
            'title' => 'Success!',
            'text' => 'Center created successfully.',
            'icon' => 'success'
        ]);
    }


    public function edit(string $id)
    {
        $center = Center::findOrFail($id); // Fetch program by ID
        return view('admin.update-center', compact('center')); // Pass program data to view
    }


    public function update(Request $request, Center $center)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string',
            'code' => 'required',
            'address' => 'required|string',
        ]);
        

        $center = Center::findOrFail($request->id);

        $center->name = $request->input('name');
        $center->state = $request->input('state');
        $center->code = $request->input('code');
        $center->address = $request->input('address');
        $center->save();

        return redirect()->route('all.center')->with('alert', [
            'title' => 'Success!',
            'text' => 'Center updated successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        // Find the program by ID and delete it
        $center = Center::findOrFail($id);
        $center->delete();

        return redirect()->route('all.center')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Center deleted successfully!',
            'icon' => 'success'
        ]);
    }

}
