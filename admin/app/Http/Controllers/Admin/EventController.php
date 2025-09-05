<?php

namespace App\Http\Controllers\Admin;

use Validator;  
use App\Models\Event;
use App\Models\TVShow;
use App\Models\Video;
use App\Models\Session;
use DataTables, URL, DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Session;

class EventController extends Controller
{

    private $folder = "event";

    public function index()
    {
        try{
            return view('admin.event.index');
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function data(Request $request)
    {
        try{
            if ($request==true) {
                $data = Event::select('*');

                return DataTables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route("editEvent",$row->id).'" class="btn"><img src="'.url("assets/imgs/edit.png").'" /></a> ';
                    $btn .= '<a href="'.route("deleteEvent",$row->id).'" onclick="return confirm(\'Are you sure you want to delete this item\')" class="delete btn btn-sm"><img src="'.url("assets/imgs/trash.png").'" /></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            } else{     
                return view('admin.level.index');
            }
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function add()
    {
        try{
              $type = Session::select('*')->get();
            
            return view('admin.event.add', [ 'type' => $type]);
            
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function save(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:2',
               
                'personal_info' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if($validator->fails()){

                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors'=> $errs ));
            } else {
                $cast = new Event();
                $cast->name = $request->name;
                 $cast->dateofevent = $request->dateofevent;
                     $cast->timeofevent = $request->timeofevent;
                $cast->personal_info = $request->personal_info;
                
                $org_name = $request->file('image');
                $cast->image = saveImage($org_name,$this->folder);

                if($cast->save())
                {
                    return response()->json(array('status' => 200, 'success'=> __('Label.Data Add Successfully')));
                } else {
                    return response()->json(array('status' => 400, 'errors'=> __('Label.Data Not Add') ));
                }
            }
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function edit(Request $request,$id)
    {
        try{
            $user = Event::where('id',$id)->first();
           $type = Session::select('*')->get();
            return view('admin.event.edit',['type' => $type, 'result'=>$user]);
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:2',
              
                'personal_info' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',            
            ]);
            if($validator->fails()){
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors'=> $errs ));
            } else{
                $cast = Event::where('id',$request->id)->first();

                if (isset($cast->id)) {

                    $cast->name = $request->name;
                    $cast->dateofevent = $request->dateofevent;
                     $cast->timeofevent = $request->timeofevent;
                    $cast->personal_info = $request->personal_info;

                    $org_name = $request->file('image');
                    if ($org_name == null && $cast->image ==null) {
                        $cast->image = "";
                    } else if($org_name != null && $cast->image == null){                        
                        $cast->image = saveImage($org_name,$this->folder);
                    } else if ($org_name != null){
                        $cast->image = saveImage($org_name,$this->folder);
                        @unlink("images/event/".$request->old_image);      
                    } else {
                        $cast->image = $request->old_image;                    
                    }

                    if($cast->save()){
                        return response()->json(array('status' => 200, 'success'=> __('Label.Data Edit Successfully') ));
                    } else {
                        return response()->json(array('status' => 400, 'errors'=> __('Label.Data Not Updated') ));
                    }
                }
            }
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        }
    }
    public function delete($id){
        try{
            $cast = Event::where('id',$id)->first();
           
                if($cast->delete()){
                    @unlink("images/event/".$cast->image);        
                    return back()->with('success', __('Label.Data Delete Successfully'));
                }  
            
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    
}