<?php

namespace App\Http\Controllers;
use Auth;
use App\TeamPost;
use App\Team;
use App\TeamMember;
use Illuminate\Http\Request;

class TeamPostController extends Controller
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
    public function create(Team $team , TeamMember $teamMember)
    {


        $this->authorize('createPost' , [TeamPost::class , $team]);
        return view ('teams/posts/create' , compact('team' , $team), compact('teamMember', $teamMember));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team, TeamMember $teamMember)
    {
        
        $this->authorize('createPost' , [TeamPost::class , $team]);
        request()->validate([
            'body' => 'required|max:1000'

        ]);

        TeamPost::create([
                    'member_id' => Auth::User()->member->id,
                    'team_id' => $team->id,
                    'body' => request('body')

                ]);

        return redirect()->route('teamShow' , [$team]); //Adding Wildcard to Route
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamPost  $teamPost
     * @return \Illuminate\Http\Response
     */
    public function show(TeamPost $teamPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamPost  $teamPost
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, TeamMember $teamMember, TeamPost $teamPost)
    {
        $this->authorize('update' , [TeamPost::class , $teamPost]);
        return view ('teams/posts/edit' , compact('teamPost' , $teamPost), compact('teamMember', $teamMember))->with('team' , $team);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamPost  $teamPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, TeamMember $teamMember, TeamPost $teamPost)
    {
        $this->authorize('update' , [TeamPost::class , $teamPost]);
        $teamPost->body = request('body');
        $teamPost->save();
        return redirect()->route('teamShow' , [$team]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamPost  $teamPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, TeamMember $teamMember, TeamPost $teamPost)
    {
        $this->authorize('delete' , [TeamPost::class , $teamPost]);
        $teamPost->delete();
        return redirect()->route('teamShow' , [$team]);
    }
}
