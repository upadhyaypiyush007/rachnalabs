<?php

namespace App\Http\Controllers\Admin;

use Validator;  
use App\Models\Service;
use App\Models\TVShow;
use App\Models\Video;
use App\Models\Session;
use DataTables, URL, DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{

    private $folder = "service";

    public function index()
    {
        try{
            return view('admin.service.index');
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function data(Request $request)
    {
        try{
            if ($request==true) {
                $data = Service::select('*');

                return DataTables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route("editService",$row->id).'" class="btn"><img src="'.url("assets/imgs/edit.png").'" /></a> ';
                    $btn .= '<a href="'.route("deleteService",$row->id).'" onclick="return confirm(\'Are you sure you want to delete this item\')" class="delete btn btn-sm"><img src="'.url("assets/imgs/trash.png").'" /></a>';
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
            
            return view('admin.service.add', [ 'type' => $type]);
            
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function save(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:2',
                'type' => 'required',
                'personal_info' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if($validator->fails()){

                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors'=> $errs ));
            } else {
                $cast = new Service();
                $cast->name = $request->name;
                $cast->type = $request->type;
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
            $user = Service::where('id',$id)->first();
           $type = Session::select('*')->get();
            return view('admin.service.edit',['type' => $type, 'result'=>$user]);
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required|min:2',
                'type' => 'required',
                'personal_info' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',            
            ]);
            if($validator->fails()){
                $errs = $validator->errors()->all();
                return response()->json(array('status' => 400, 'errors'=> $errs ));
            } else{
                $cast = Service::where('id',$request->id)->first();

                if (isset($cast->id)) {

                    $cast->name = $request->name;
                    $cast->type = $request->type;
                    $cast->personal_info = $request->personal_info;

                    $org_name = $request->file('image');
                    if ($org_name == null && $cast->image ==null) {
                        $cast->image = "";
                    } else if($org_name != null && $cast->image == null){                        
                        $cast->image = saveImage($org_name,$this->folder);
                    } else if ($org_name != null){
                        $cast->image = saveImage($org_name,$this->folder);
                        @unlink("images/service/".$request->old_image);      
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
            $cast = Service::where('id',$id)->first();
           
                if($cast->delete()){
                    @unlink("images/service/".$cast->image);        
                    return back()->with('success', __('Label.Data Delete Successfully'));
                }
        } catch(Exception $e){
            return response()->json(array('status' => 400, 'errors'=> $e->getMessage() ));
        } 
    }
    
}