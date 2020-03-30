<?php

namespace App\Http\Controllers;

use App\Division;
use App\Sport;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sport $sport)
    {
      //  $sport = Sport::findorfail($id);

        return view ('admin/divisions/create', compact('sport') );

        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sport $sport)
    {
      $sport->addDivision(request('name'));

        // Division::create([
        //     'sport_id' => ($sport->id),
        //     'name' => request('name')


        // ]);

    
       return redirect()->route('adminSportShow' , [$sport]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */

    public function adminShow(Sport $sport, Division $division)
    {
        return view ('admin/divisions/show' , compact('sport') , compact('division'));
    }

    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport, Division $division)
    {
        return view ('admin/divisions/edit', compact('sport') , compact('division'));
        // dd('hello');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Sport $sport, Division $division)
    {
        $division->name = request('name');
        $division->save();
        // return redirect('admin/sports');
        return redirect()->route('adminSportShow' , [$sport]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport , Division $division)
    {
        $division->delete();
        return redirect()->route('adminSportShow' , [$sport]);
    }
}
