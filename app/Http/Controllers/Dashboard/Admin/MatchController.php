<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Model\Match;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $data = array();
        $matches = Match::query();
        $data['search'] = "";
        $data['rows'] = 10;
        $data['tab'] = "new";
        if($request->has('tab'))
        {
            $data['tab'] = $request->tab;
        }

        // $data['fields'] = ['id','name','phone'];

        if($request->has('search') )
        {
            // var_dump($request->all()); exit;
            if($request->filled('search'))
            {
                $data['search'] = $request->search;
                $matches = $matches->where('name','LIKE','%'.$data['search'].'%')->orWhere('phone','LIKE','%'.$data['search'].'%');
            }
        }
        if($request->has('rows'))
        {
            $data['rows'] = $request->rows;
        }
        
        $data['matches'] = $matches->paginate($data['rows']);
        return view('pages.admin.matches.index')->with(compact('data'),["search"=>$data['search'],'rows'=>$data['rows']]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
        $match = Match::find($id);
        $data['match'] = $match;
        return view('pages.admin.matches.show')->with(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $match = Match::find($id);
        $match->update($request->all());
        
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $match = Match::find($id);
        $match->delete();

        return back()->withInput();
    }
}

