<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Model\AgeBracket;

class AgeBracketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $data = array();
        $age_brackets = AgeBracket::query();
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
                $age_brackets = $age_brackets->where('name','LIKE','%'.$data['search'].'%')->orWhere('phone','LIKE','%'.$data['search'].'%');
            }
        }
        if($request->has('rows'))
        {
            $data['rows'] = $request->rows;
        }
        
        $data['age_brackets'] = $age_brackets->paginate($data['rows']);
        return view('pages.admin.age-brackets.index')->with(compact('data'),["search"=>$data['search'],'rows'=>$data['rows']]);
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
        $input_arr = $request->all();
        $age_bracket = AgeBracket::create($input_arr);

        return back()->withInput();
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
        $age_bracket = AgeBracket::find($id);
        $data['age_bracket'] = $age_bracket;
        return view('pages.admin.age-brackets.show')->with(compact('data'));
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
        $age_bracket = AgeBracket::find($id);
        $age_bracket->update($request->all());
        $age_bracket->name_ar = $request->min."-".$request->max;
        $age_bracket->name_en = $request->min."-".$request->max;
        $age_bracket->save();

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
        $age_bracket = AgeBracket::find($id);
        $age_bracket->delete();
        
        return back()->withInput();
    }
}

