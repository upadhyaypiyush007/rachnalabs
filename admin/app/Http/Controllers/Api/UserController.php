<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Users;
use App\Models\Familys;
use App\Models\Address;
use App\Models\City;
use App\Models\Service;
use App\Models\State;
use App\Models\Channel_Banner;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Booking;
use App\Models\Pagesubdata;
use App\Models\Partnersubject;
use App\Models\Enquiry;
use App\Models\Gallery;
use App\Models\Lablists;
use App\Models\Blogcategory;
use App\Models\Relation;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    private $folder = "language";
    private $folder1 = "cast";
    private $folder2 = "category";
    private $folder3 = "video";
    private $folder4 = "show";
    private $folder5 = "channel";
    private $folder6 = "app";
    private $folder7 = "user";
    private $folder8 = "avatar";
    private $folder9 = "blog";
    private $folder10 = "other";

    public function get_profile(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'id' => 'required|numeric',
                ],
                [
                    'id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->id;
            $Data = Users::where('id', $id)->first();
            if (!empty($Data)) {

                if (!empty($Data->image)) {
                    $path = Get_Image($this->folder7, $Data->image);
                    $Data['image'] = $path;
                } else {
                    $Data['image'] = asset('/assets/imgs/no_img.png');
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
     public function create_booking(Request $request)
    {
        try {

            

                $validation = Validator::make(
                    $request->all(),
                    [
                        'user_id' => 'required|numeric',
                    ],
                    [
                        'user_id.required' => __('api_msg.please_enter_required_fields'),
                    ]
                );
                if ($validation->fails()) {

                    $errors = $validation->errors()->first('mobile');
                    $data['status'] = 400;
                    if ($errors) {
                        $data['message'] = $errors;
                    }
                    return $data;
                }
                
                $user_id=$request->user_id;
            
        $class_category_id = $request->booking_type;
           
            $package_id =$request->test_id;
         
            $booking_id=date('ymdhis');

          

                $data = Users::where('id', $user_id)->first();
                if (!empty($data)) {
                    
                     $data = array(
                        'user_id' => $user_id,
                        'booking_id' => $booking_id,
                        'test_id' => $package_id,
                        'amount' => $request->amount,
                        'booking_type' =>$class_category_id
                       
                    );
                    $b_id = Booking::insertGetId($data);
                    if (isset($user_id)) {

                        $user_data = Booking::where('id', $b_id)->first();
                        // Image
                    
                    $return['status'] = 200;
                    $return['message'] = 'Booking saved successfully';
                    $return['result'] = $user_data;
                    return $return;
                    
                    }else {

                   
                        return APIResponse(400, 'Something went wrong');
                    
                }
                } else {

                   
                        return APIResponse(400, 'User id not correct');
                    
                }


        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
     public function booking_success(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'booking_id' => 'required|numeric',
                ],
                [
                    'booking_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->booking_id;
            $data = array();

            $User_Data = Booking::where('booking_id', $id)->first();
            if (!empty($User_Data)) {

              
                    $data['payment_id'] = $request->payment_id;
               
                    $data['payment_status'] = $request->payment_status;
               
                $User_Data->update($data);
                if(isset($User_Data)){

                    

                    $Data['status'] = 200;
                    $Data['message'] = 'Data updated';
                    $Data['result'] = $User_Data;
                    return $Data;
                }
            } else {
                return APIResponse(400, 'Invalid booking id');
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    
    public function blog_details(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'blog_id' => 'required|numeric',
                ],
                [
                    'blog_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->blog_id;
            $Data = Blog::where('id', $id)->with('blogcategory')->first();
            if (!empty($Data)) {

                if (!empty($Data->image)) {
                    $path = Get_Image($this->folder9, $Data->image);
                    $Data['image'] = $path;
                } else {
                    $Data['image'] = asset('/assets/imgs/no_img.png');
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    
      
    public function about_uspage()
    {
        
            $Data = Page::where('id', 1)->first();
            if (!empty($Data)) {
                
                 $Dataother = Pagesubdata::get();
           if (sizeof($Dataother) > 0) {

                for ($i = 0; $i < count($Dataother); $i++) {

                    if (!empty($Dataother[$i]['icon'])) {

                        $path = Get_Image($this->folder10, $Dataother[$i]['icon']);
                        $Dataother[$i]['image'] = $path;
                    } else {

                        $Dataother[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
           }
           
           $Data['others']=$Dataother;

               
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
    
    }
    
    
      public function get_blog()
    {
        
            $Data = Blog::with('blogcategory')->get();
           if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder9, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }
    
      public function get_alllabs()
    {
        
        $Data = Lablists::get();
           if (sizeof($Data) > 0) {

              
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }
    
     public function get_tests()
    {
        
        $Data = Service::get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder10, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            }else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }
    
      public function get_allbanner()
    {
        
        $Data = Channel_Banner::orderBy('order_no', 'ASC')->get();
           if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder10, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }
    
     public function get_partnersubject()
    {
        
            $Data = Partnersubject::select('sub')->get();
           if (sizeof($Data) > 0) {

              
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }

 public function get_gallery()
    {
        
            $Data = Gallery::get();
           if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder9, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
       
    }
    
     public function delete_family(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'id' => 'required|numeric',
                ],
                [
                    'id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->id;
            $Data = Familys::where('id', $id)->first();
            if (!empty($Data)) {

               $Data = Familys::where('id', $id)->delete();
                return APIResponse(200, __('api_msg.delete_success'), []);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    
      public function get_relation()
    {
        try {
            $Data = Relation::where('status','1')->latest()->get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder2, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
      public function get_state()
    {
        try {
            $Data = State::latest()->get();
            if (sizeof($Data) > 0) {

                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
     public function get_city(Request $request)
    {
        try {
            if(isset($request->state_id) && $request->state_id!='0'){
            $Data = City::where('state_id',$request->state_id)->latest()->get();    
            }else{
            $Data = City::latest()->get();
            }
            if (sizeof($Data) > 0) {

                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    
    public function list_address(Request $request)
    {
         try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->user_id;
            $Data = Address::where('user_id', $id)->with('state')->with('city')->get();
            
            if (sizeof($Data) > 0) {

               
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
     public function list_family(Request $request)
    {
         try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->user_id;
            $Data = Familys::where('user_id', $id)->with('relation')->get();
            
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder7, $Data[$i]['image']);
                        $Data[$i]['image'] = $path;
                    } else {

                        $Data[$i]['image'] = asset('/assets/imgs/no_img.png');
                    }
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    public function delete_address(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'address_id' => 'required|numeric',
                ],
                [
                    'address_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->address_id;
            $Data = Address::where('id', $id)->first();
            if (!empty($Data)) {

               $Data = Address::where('id', $id)->delete();
                return APIResponse(200, __('api_msg.delete_success'), []);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    public function add_address(Request $request)
    {
         try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                     'address' => 'required',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'address.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->user_id;
            $data = Users::where('id', $id)->first();
            if (!empty($data)) {


            $address = $request->address;
            $house = $request->house;
            $landmark = $request->landmark;
            $area = $request->area;
            $pincode = $request->pincode;
             $state_id = $request->state_id;
              $city_id = $request->city_id;
              
            


            $data = array(
               
                'address' => $address,
                'user_id' => $id,
                'house' => $house,
                'landmark' => $landmark,
                'area' => $area,
                'pincode' => $pincode,
                 'state_id' => $state_id,
               'city_id' => $city_id,
             
                
            );

            $user_id = Address::insertGetId($data);
            
            
                return APIResponse(200, __('api_msg.update_successfully'));
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
     public function update_address(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'address_id' => 'required|numeric',
                ],
                [
                    'address_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->address_id;
            $data = array();

            $User_Data = Address::where('id', $id)->first();
            if (!empty($User_Data)) {

                if (isset($request->address) && $request->address != '') {
                    $data['address'] = $request->address;
                }
                 if (isset($request->house) && $request->house != '') {
                    $data['house'] = $request->house;
                }
                 if (isset($request->landmark) && $request->landmark != '') {
                    $data['landmark'] = $request->landmark;
                }
                if (isset($request->area) && $request->area != '') {
                    $data['area'] = $request->area;
                }
                 if (isset($request->pincode) && $request->pincode != '') {
                    $data['pincode'] = $request->pincode;
                }
                if (isset($request->state_id) && $request->state_id != '') {
                    $data['state_id'] = $request->state_id;
                }
                if (isset($request->city_id) && $request->city_id != '') {
                    $data['city_id'] = $request->city_id;
                }

                $User_Data->update($data);
                if(isset($User_Data)){

                  
                    $Data['status'] = 200;
                    $Data['message'] = __('api_msg.update_profile_sucessfuly');
                    $Data['result'] = $User_Data;
                    return $Data;
                }
            } else {
                return APIResponse(400, __('api_msg.User_id_worng'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    
    
    
    
    public function add_family(Request $request)
    {
         try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                     'first_name' => 'required',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'first_name.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->user_id;
            $data = Users::where('id', $id)->first();
            if (!empty($data)) {


            $name = $request->first_name;
            $last_name = $request->last_name;
            $email = $request->email;
            $date_of_birth = $request->date_of_birth;
            $mobile = $request->mobile;
             $relation = $request->relation;
              $gender = $request->gender;
              
               $org_name = $request->file('image');

           if($org_name!=''){
                $dimage = saveImage($org_name, $this->folder7);
           }else{
               $dimage='';
           }
              

            $data = array(
               
                'first_name' => $name,
                'user_id' => $id,
                'mobile' => $mobile,
                'email' => $email,
                'relation' => $relation,
                'gender' => $gender,
                 'last_name' => $last_name,
               'date_of_birth' => $date_of_birth,
               'image' => $dimage,
                
            );

            $user_id = Familys::insertGetId($data);
            
            
                return APIResponse(200, __('api_msg.update_successfully'));
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    
    
    
    public function enquiry(Request $request)
    {
         try {

            $validation = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                     'email' => 'required',
                      'phone' => 'required',
                       'enquiry_type' => 'required',
                ],
                [
                    'name.required' => __('api_msg.please_enter_required_fields'),
                    'email.required' => __('api_msg.please_enter_required_fields'),
                     'phone.required' => __('api_msg.please_enter_required_fields'),
                      'enquiry_type.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }



            $name = $request->name;
          
            $email = $request->email;
            $subject = $request->subject;
            $mobile = $request->phone;
             $message = $request->message;
              $enquiry_type = $request->enquiry_type;
              
          

         
            $data = array(
               
                'name' => $name,
              
                'phone' => $mobile,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                 'enquiry_type' => $enquiry_type,
             
                
            );

            $user_id = Enquiry::insertGetId($data);
            
            
                return APIResponse(200, 'Enquiry sent successfully');
           
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function image_upload(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'id' => 'required|numeric',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'id.required' => __('api_msg.please_enter_required_fields'),
                    'image.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $errors1 = $validation->errors()->first('image');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                }
                return $data;
            }

            $id = $request->id;
            $org_name = $request->file('image');

            $data = Users::where('id', $id)->first();
            if (!empty($data)) {

                @unlink("images/" . $this->folder7 . "/" . $data['image']);

                $data->image = saveImage($org_name, $this->folder7);
                if ($data->save()) {
                    return APIResponse(200, __('api_msg.update_successfully'));
                } else {
                    return APIResponse(400, __('api_msg.data_not_save'));
                }
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function registration(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                   // 'age' => 'required|numeric',
                    'name' => 'required',
                    'email' => 'required|unique:user|email',
                   // 'gender' => 'required',
                    'mobile' => 'required|numeric',
                ],
                [
                //    'age.required' => __('api_msg.please_enter_required_fields'),
                    'email.required' => __('api_msg.please_enter_required_fields'),
                    'mobile.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

            //    $errors = $validation->errors()->first('age');
                $errors1 = $validation->errors()->first('email');
                $errors2 = $validation->errors()->first('mobile');
                $data['status'] = 400;
               if ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } else {
                    $data['message'] = __('api_msg.please_enter_required_fields');
                }
                return $data;
            }

            $type = 3;
            $name = $request->name;
            $email = $request->email;
            $password = '12345';
            $mobile = $request->mobile;
             $age = '0';
              $gender = 'Male';

            $data = array(
                'language_id' => 0,
                'name' => $name,
                'last_name' => $request->last_name,
                'user_name' => "",
                'mobile' => $mobile,
                'email' => $email,
                'password' => $password,
                'gender' => $gender,
                 'age' => $age,
                'image' => "",
                'status' => 1,
                'type' => $type,
                'api_token' => "",
                'email_verify_token' => "",
                'is_email_verify' => "",
            );

            $user_id = Users::insertGetId($data);

            if (isset($user_id)) {

                $user_data = Users::where('id', $user_id)->first();
                return APIResponse(200, __('api_msg.User_registration_sucessfuly'), $user_data);
            } else {
                return APIResponse(400, __('api_msg.data_not_save'));
            }

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function login(Request $request)
    {
        try {
            
            $request->type=3;

            if ($request->type == 1 or $request->type == 2) {

                $validation = Validator::make(
                    $request->all(),
                    [
                        'name' => 'required',
                        'email' => 'required|email',
                    ],
                    [
                        'name.required' => __('api_msg.please_enter_required_fields'),
                        'email.required' => __('api_msg.please_enter_required_fields'),
                    ]
                );
                if ($validation->fails()) {

                    $errors = $validation->errors()->first('name');
                    $errors1 = $validation->errors()->first('email');
                    $data['status'] = 400;
                    if ($errors) {
                        $data['message'] = $errors;
                    } elseif ($errors1) {
                        $data['message'] = $errors1;
                    }
                    return $data;
                }

            } elseif ($request->type == 3) {

                $validation = Validator::make(
                    $request->all(),
                    [
                        'mobile' => 'required|numeric',
                       
                    ],
                    [
                        'mobile.required' => __('api_msg.please_enter_required_fields'),
                    ]
                );
                if ($validation->fails()) {

                    $errors = $validation->errors()->first('mobile');
                    $data['status'] = 400;
                    if ($errors) {
                        $data['message'] = $errors;
                    }
                    return $data;
                }

            } elseif ($request->type == 4) {

                $validation = Validator::make(
                    $request->all(),
                    [
                        'email' => 'required|email',
                        'password' => 'required',
                    ],
                    [
                        'email.required' => __('api_msg.please_enter_required_fields'),
                    ]
                );
                if ($validation->fails()) {

                    $errors = $validation->errors()->first('email');
                    $data['status'] = 400;
                    if ($errors) {
                        $data['message'] = $errors;
                    } else {
                        $data['message'] = __('api_msg.please_enter_required_fields');
                    }
                    return $data;
                }

            } else {
                $validation = Validator::make(
                    $request->all(),
                    [
                        'type' => 'required|numeric',
                    ],
                    [
                        'type.required' => __('api_msg.please_enter_required_fields'),
                    ]
                );
                if ($validation->fails()) {

                    $errors = $validation->errors()->first('type');
                    $data['status'] = 400;
                    if ($errors) {
                        $data['message'] = $errors;
                    }
                    return $data;
                }
            }

            $type = $request->type;
            $name = isset($request->name) ? $request->name : "";
            $email = isset($request->email) ? $request->email : "";
            $password = isset($request->password) ? $request->password : "";
            $mobile = isset($request->mobile) ? $request->mobile : "";
            $role = isset($request->role) ? $request->role : "";

            if ($type == 1 or $type == 2) {

                $data = Users::where('email', $email)->first();
                if (!empty($data)) {

                    // Image
                    if (!empty($data['image'])) {
                        $path = Get_Image($this->folder7, $data['image']);
                        $data['image'] = $path;
                    } else {
                        $data['image'] = asset('/assets/imgs/no_img.png');
                    }
                    $return['status'] = 200;
                    $return['message'] = __('api_msg.login_successfully');
                    $return['result'] = $data;
                    return $return;
                } else {

                    
                        return APIResponse(400, __('api_msg.data_not_save'));
                    
                }

            } elseif ($type == 3) {

                $data = Users::where('mobile', $mobile)->first();
                if (!empty($data)) {

                    // Image
                    if (!empty($data['image'])) {
                        $path = Get_Image($this->folder7, $data['image']);
                        $data['image'] = $path;
                    } else {
                        $data['image'] = asset('/assets/imgs/no_img.png');
                    }
                    $return['status'] = 200;
                    $return['message'] = __('api_msg.login_successfully');
                    $return['result'] = $data;
                    return $return;
                } else {
                    
                      return APIResponse(400, 'User not registered');
                    
                }

            } elseif ($type == 4) {

                $data = Users::where('email', $email)->where('password', $password)->first();
                if (!empty($data)) {

                    // Image
                    if (!empty($data['image'])) {
                        $path = Get_Image($this->folder7, $data['image']);
                        $data['image'] = $path;
                    } else {
                        $data['image'] = asset('/assets/imgs/no_img.png');
                    }
                    $return['status'] = 200;
                    $return['message'] = __('api_msg.login_successfully');
                    $return['result'] = $data;
                    return $return;
                } else {
                    return APIResponse(400, __('api_msg.email_pass_worng'), array($data));
                }

            } else {
                return APIResponse(400, __('api_msg.change_type'));
            }

        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    public function update_family(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'id' => 'required|numeric',
                ],
                [
                    'id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->id;
            $data = array();

            $User_Data = Familys::where('id', $id)->first();
            if (!empty($User_Data)) {

                if (isset($request->first_name) && $request->first_name != '') {
                    $data['first_name'] = $request->first_name;
                }
                 if (isset($request->last_name) && $request->last_name != '') {
                    $data['last_name'] = $request->last_name;
                }
                 if (isset($request->date_of_birth) && $request->date_of_birth != '') {
                    $data['date_of_birth'] = $request->date_of_birth;
                }
                if (isset($request->email) && $request->email != '') {
                    $data['email'] = $request->email;
                }
                 if (isset($request->gender) && $request->gender != '') {
                    $data['gender'] = $request->gender;
                }
                if (isset($request->mobile) && $request->mobile != '') {
                    $data['mobile'] = $request->mobile;
                }
                if (isset($request->relation) && $request->relation != '') {
                    $data['relation'] = $request->relation;
                }

                $User_Data->update($data);
                if(isset($User_Data)){

                    if (!empty($User_Data->image)) {
                        $path = Get_Image($this->folder7, $User_Data->image);
                        $User_Data['image'] = $path;
                    } else {
                        $User_Data['image'] = asset('/assets/imgs/no_img.png');
                    }

                    $Data['status'] = 200;
                    $Data['message'] = __('api_msg.update_profile_sucessfuly');
                    $Data['result'] = $User_Data;
                    return $Data;
                }
            } else {
                return APIResponse(400, __('api_msg.User_id_worng'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function update_profile(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'id' => 'required|numeric',
                ],
                [
                    'id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $id = $request->id;
            $data = array();

            $User_Data = Users::where('id', $id)->first();
            if (!empty($User_Data)) {

                if (isset($request->name) && $request->name != '') {
                    $data['name'] = $request->name;
                }
                 if (isset($request->last_name) && $request->last_name != '') {
                    $data['last_name'] = $request->last_name;
                }
                 if (isset($request->date_of_birth) && $request->date_of_birth != '') {
                    $data['date_of_birth'] = $request->date_of_birth;
                }
                if (isset($request->email) && $request->email != '') {
                    $data['email'] = $request->email;
                }
                 if (isset($request->gender) && $request->gender != '') {
                    $data['gender'] = $request->gender;
                }
                if (isset($request->mobile) && $request->mobile != '') {
                    $data['mobile'] = $request->mobile;
                }

                $User_Data->update($data);
                if(isset($User_Data)){

                    if (!empty($User_Data->image)) {
                        $path = Get_Image($this->folder7, $User_Data->image);
                        $User_Data['image'] = $path;
                    } else {
                        $User_Data['image'] = asset('/assets/imgs/no_img.png');
                    }

                    $Data['status'] = 200;
                    $Data['message'] = __('api_msg.update_profile_sucessfuly');
                    $Data['result'] = $User_Data;
                    return $Data;
                }
            } else {
                return APIResponse(400, __('api_msg.User_id_worng'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
    
    
  public function booking_list(Request $request)
{
    try {
        $query = Booking::with([
            'user:id,name,image', 
            'test:id,name'
        ])->orderBy('id', 'desc');

        if ($request->has('user_id') && !empty($request->user_id)) {
            $query->where('user_id', $request->user_id);
        }

        $bookings = $query->get();

        if ($bookings->isEmpty()) {
            return response()->json([
                'status'  => 200,
                'message' => 'No bookings found',
                'result'  => []
            ], 200);
        }

        $result = [];
        foreach ($bookings as $booking) {
            $status = 'Pending';
            if ($booking->payment_status == 1) {
                $status = 'Booked';
            } elseif ($booking->payment_status == 2) {
                $status = 'Cancelled';
            }

            $result[] = [
                'booking_id'   => $booking->booking_id,
                'user_name'    => $booking->user->name ?? '',
                'user_image'   => $booking->user->image ?? '',
                'test_name'    => $booking->test->name ?? '',
                'date'         => date('d M Y', strtotime($booking->created_at)),
                'time'         => date('h:i A', strtotime($booking->created_at)),
                'center_name'  => 'Rachana Diagnostic',
                'status'       => $status,
            ];
        }

        return response()->json([
            'status'  => 200,
            'message' => 'Booking list fetched successfully',
            'result'  => $result
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 400,
            'errors' => $e->getMessage()
        ], 400);
    }
}



}
