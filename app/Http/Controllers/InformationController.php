<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Information::latest()->paginate(10);
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
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'skills' => 'required',
        ]);

        $data = new Information();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $skill = implode(',',$request->skills);
        $data->skills = $skill;
        
        if($request->image)
            {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];
   
            $image_name = time().".".$ext;
            $img = Image::make($request->image)->resize(540,500);
            $upload_path = 'backend/images/';
            $image_url = $upload_path.$image_name;
            $img->save($image_url);

                // $file = $request->image;
                // $filename = date('YmdHi').$file->getClientOriginalExtension();
                // $file->move(public_path('upload/image/'),$filename);
                $data->image = $image_url;
            }

        $data->save();

        return ['message' => 'Success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Information::findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required',
            'gender' => 'required',
            'skills' => 'required',
        ]);

        $data = Information::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $skill = implode(',',$request->skills);
        $data->skills = $skill;
        
        if($request->image)
            {
            @unlink(public_path($data->image));
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];
   
            $image_name = time().".".$ext;
            $img = Image::make($request->image)->resize(540,500);
            $upload_path = 'backend/images/';
            $image_url = $upload_path.$image_name;
            $img->save($image_url);

                $data->image = $image_url;
            }

        $data->save();

        return ['message' => 'Success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Information::findOrFail($id);

        $upload->delete();

        @unlink(public_path($upload->image));

        return [
         'message' => 'Photo deleted successfully'
        ];
    }
}
