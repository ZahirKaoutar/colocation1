<?php

namespace App\Http\Controllers;
use App\Http\Requests\ColocationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colocation;
use Illuminate\Support\Facades\Auth;


class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations=Colocation::all();
        return view('colocation.index',compact('colocations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
             return view('colocation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(ColocationRequest $request)
{
    $Activmember = auth()->user()
        ->memberships()
        ->whereNull('left_at')
        ->whereHas('colocation', function($q){
            $q->where('status','active');
        })
        ->exists();

    if($Activmember){
        return redirect()->back()->with('error','Tu as déjà une colocation active');
    }

    $colocation = Colocation::create([
        'name' => $request->name,
        'owner_id' => auth()->id(),
        'status' => 'active',
    ]);

    $colocation->members()->attach(auth()->id(), [
        'role' => 'owner',
        'joined_at' => now(),
        'left_at' => null
    ]);

    return redirect()->route('colocations.index')
        ->with('success','Colocation créée avec succès');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // return view('colocation.search');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $colocation=Colocation::find($id);
        return view('colocation.edite',compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColocationRequest $request, string $id)
    {
         $colocation=Colocation::find($id);
         $colocation->update(['name'=>$request->name,
         'owner_id'=>auth()->user()->id]);
         return redirect()->route('colocations.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colocation=Colocation::find($id);
        $colocation->delete();
        return redirect()->route('colocations.index')
        ->with('success','Colocation créée avec succès');
    }
}
