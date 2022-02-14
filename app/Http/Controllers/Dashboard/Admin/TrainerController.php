<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Model\Trainer;
use App\Model\Position;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $data = array();
        $trainers = User::where('role','TRAINER');
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
                $trainers = $trainers->where('name','LIKE','%'.$data['search'].'%')->orWhere('phone','LIKE','%'.$data['search'].'%');
            }
        }
        if($request->has('rows'))
        {
            $data['rows'] = $request->rows;
        }
        
        $data['trainers'] = $trainers->paginate($data['rows']);
        return view('pages.admin.trainers.index')->with(compact('data'),["search"=>$data['search'],'rows'=>$data['rows']]);
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
        $trainer = User::find($id);
        $data['trainer'] = $trainer;
        // $data['position'] = Position::find($trainer->trainer->favorite_position_id);
        return view('pages.admin.trainers.show')->with(compact('data'));
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
        $trainer = User::find($id);
        $trainer->update($request->all());
        
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
        $user = User::find($id);
        $trainer = Trainer::where('user_id',$id)->first();
        $trainer->delete();
        $user->delete();
        
        return back()->withInput();
    }
}

