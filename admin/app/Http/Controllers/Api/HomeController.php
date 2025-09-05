<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App_Section;
use App\Models\Avatar;
use App\Models\Banner;
use App\Models\Bookmark;
use App\Models\Cast;
use App\Models\Category;
use App\Models\Download;
use App\Models\General_Setting;
use App\Models\Language;
use App\Models\Package;
use App\Models\Package_Detail;
use App\Models\Payment_Option;
use App\Models\RentTransction;
use App\Models\RentVideo;
use App\Models\Session;
use App\Models\Transction;
use App\Models\TVShow;
use App\Models\TVShowVideo;
use App\Models\Type;
use App\Models\Video;
use App\Models\Video_Watch;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
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

    public function get_language()
    {
        try {
            $Data = Language::latest()->get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder, $Data[$i]['image']);
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
    
     public function get_doctor()
    {
        try {
            $Data = Cast::latest()->with('specialization')->where('status','1')->get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder1, $Data[$i]['image']);
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

    public function cast_detail(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'cast_id' => 'required|numeric',
                ],
                [
                    'cast_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('cast_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $cast_id = $request->cast_id;
            $Data = Cast::where('id', $cast_id)->first();
            if (!empty($Data)) {

                if (!empty($Data->image)) {
                    $path = Get_Image($this->folder1, $Data->image);
                    $Data['image'] = $path;
                } else {
                    $Data['image'] = asset('/assets/imgs/no_img.png');
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), array($Data));
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_category()
    {
        try {
            $Data = Category::latest()->get();
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

    public function get_banner(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'type_id' => 'required|numeric',
                    'is_home_page' => 'required|numeric',
                ],
                [
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                    'is_home_page.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('type_id');
                $errors1 = $validation->errors()->first('is_home_page');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                }
                return $data;
            }

            $type_id = $request->type_id;
            $is_home_page = $request->is_home_page;

            if ($is_home_page == "1") {

                $Data = Banner::where('is_home_screen', '1')->with('video')->with('tvshow')->latest()->get();
                if (count($Data) > 0) {

                    $Final_Data = [];
                    for ($i = 0; $i < count($Data); $i++) {
                        // Video & Show
                        if ($Data[$i]['video_type'] == 1) {
                            if ($Data[$i]['video'] != null) {

                                $Final_Data[$i]['name'] = $Data[$i]['video']['name'];
                                $Final_Data[$i]['id'] = $Data[$i]['video']['id'];
                                $Final_Data[$i]['category_id'] = $Data[$i]['video']['category_id'];
                                $Final_Data[$i]['description'] = $Data[$i]['video']['description'];
                                $Final_Data[$i]['video_type'] = (int) $Data[$i]['video']['video_type'];
                                $Final_Data[$i]['type_id'] = (int) $Data[$i]['video']['type_id'];
                                // Thumbnail
                                if (!empty($Data[$i]['video']['thumbnail'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['thumbnail']);
                                    $Final_Data[$i]['thumbnail'] = $path;
                                } else {
                                    $Final_Data[$i]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($Data[$i]['video']['landscape'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['landscape']);
                                    $Final_Data[$i]['landscape'] = $path;
                                } else {
                                    $Final_Data[$i]['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                // Video
                                if (isset($Data[$i]['video']['video']) && !empty($Data[$i]['video']['video'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['video']);
                                    $Final_Data[$i]['video'] = $path;
                                } else {
                                    $Final_Data[$i]['video'] = "";
                                }
                                $Final_Data[$i]['stop_time'] = 0;
                                $Final_Data[$i]['is_downloaded'] = 0;
                                $Final_Data[$i]['is_bookmark'] = 0;
                                $Final_Data[$i]['rent_buy'] = 0;
                                $Final_Data[$i]['is_rent'] = IsRentVideo($Data[$i]['video']['id'], $Data[$i]['video']['video_type']);
                                $Final_Data[$i]['rent_price'] = GetPriceByRentVideo($Data[$i]['video']['id'], $Data[$i]['video']['video_type']);
                                $Final_Data[$i]['is_buy'] = 0;
                                $Final_Data[$i]['category_name'] = GetCategoryNameByIds($Data[$i]['video']['category_id']);
                                $Final_Data[$i]['session_id'] = "0";
                                // Video_320
                                if (isset($Data[$i]['video']['video_320']) && !empty($Data[$i]['video']['video_320'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_320']);
                                        $Final_Data[$i]['video_320'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_320'] = $Data[$i]['video']['video_320'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_320'] = "";
                                }
                                // Video_480
                                if (isset($Data[$i]['video']['video_480']) && !empty($Data[$i]['video']['video_480'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_480']);
                                        $Final_Data[$i]['video_480'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_480'] = $Data[$i]['video']['video_480'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_480'] = "";
                                }
                                // Video_720
                                if (isset($Data[$i]['video']['video_720']) && !empty($Data[$i]['video']['video_720'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_720']);
                                        $Final_Data[$i]['video_720'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_720'] = $Data[$i]['video']['video_720'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_720'] = "";
                                }
                                // Video_1080
                                if (isset($Data[$i]['video']['video_1080']) && !empty($Data[$i]['video']['video_1080'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_1080']);
                                        $Final_Data[$i]['video_1080'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_1080'] = $Data[$i]['video']['video_1080'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_1080'] = "";
                                }
                                // SubTitle
                                if (isset($Data[$i]['video']['subtitle']) && !empty($Data[$i]['video']['subtitle'])) {
                                    if ($Data[$i]['video']['subtitle_type'] == "server_file") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['subtitle']);
                                        $Final_Data[$i]['subtitle'] = $path;
                                    } else {
                                        $Final_Data[$i]['subtitle'] = $Data[$i]['video']['subtitle'];
                                    }
                                } else {
                                    $Final_Data[$i]['subtitle'] = "";
                                }
                            }
                        } else {
                            if ($Data[$i]['tvshow'] != null) {

                                $Final_Data[$i]['name'] = $Data[$i]['tvshow']['name'];
                                $Final_Data[$i]['id'] = $Data[$i]['tvshow']['id'];
                                $Final_Data[$i]['category_id'] = $Data[$i]['tvshow']['category_id'];
                                $Final_Data[$i]['description'] = $Data[$i]['tvshow']['description'];
                                $Final_Data[$i]['video_type'] = (int) $Data[$i]['tvshow']['video_type'];
                                $Final_Data[$i]['type_id'] = (int) $Data[$i]['tvshow']['type_id'];
                                // Thumbnail
                                if (!empty($Data[$i]['tvshow']['thumbnail'])) {
                                    $path = Get_Image($this->folder4, $Data[$i]['tvshow']['thumbnail']);
                                    $Final_Data[$i]['thumbnail'] = $path;
                                } else {
                                    $Final_Data[$i]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($Data[$i]['tvshow']['landscape'])) {
                                    $path = Get_Image($this->folder4, $Data[$i]['tvshow']['landscape']);
                                    $Final_Data[$i]['landscape'] = $path;
                                } else {
                                    $Final_Data[$i]['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                $Final_Data[$i]['stop_time'] = 0;
                                $Final_Data[$i]['is_downloaded'] = 0;
                                $Final_Data[$i]['is_bookmark'] = 0;
                                $Final_Data[$i]['rent_buy'] = 0;
                                $Final_Data[$i]['is_rent'] = IsRentVideo($Data[$i]['tvshow']['id'], $Data[$i]['tvshow']['video_type']);
                                $Final_Data[$i]['rent_price'] = GetPriceByRentVideo($Data[$i]['tvshow']['id'], $Data[$i]['tvshow']['video_type']);
                                $Final_Data[$i]['is_buy'] = 0;
                                $Final_Data[$i]['category_name'] = GetCategoryNameByIds($Data[$i]['tvshow']['category_id']);
                                $Final_Data[$i]['session_id'] = GetSessionByTVShowId($Data[$i]['tvshow']['id']);
                            }
                        }
                    }
                    return APIResponse(200, __('api_msg.get_record_successfully'), $Final_Data);
                } else {
                    return APIResponse(200, __('api_msg.get_record_successfully'), []);
                }
            } elseif ($is_home_page == "2") {

                $Data = Banner::where('is_home_screen', '2')->where('type_id', $type_id)->with('video')->with('tvshow')->latest()->get();
                if (count($Data) > 0) {

                    $Final_Data = [];
                    for ($i = 0; $i < count($Data); $i++) {
                        // Video & Show
                        if ($Data[$i]['video_type'] == 1) {
                            if ($Data[$i]['video'] != null) {

                                $Final_Data[$i]['name'] = $Data[$i]['video']['name'];
                                $Final_Data[$i]['id'] = $Data[$i]['video']['id'];
                                $Final_Data[$i]['category_id'] = $Data[$i]['video']['category_id'];
                                $Final_Data[$i]['description'] = $Data[$i]['video']['description'];
                                $Final_Data[$i]['video_type'] = (int) $Data[$i]['video']['video_type'];
                                $Final_Data[$i]['type_id'] = (int) $Data[$i]['video']['type_id'];
                                // Thumbnail
                                if (!empty($Data[$i]['video']['thumbnail'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['thumbnail']);
                                    $Final_Data[$i]['thumbnail'] = $path;
                                } else {
                                    $Final_Data[$i]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($Data[$i]['video']['landscape'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['landscape']);
                                    $Final_Data[$i]['landscape'] = $path;
                                } else {
                                    $Final_Data[$i]['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                // Video
                                if (isset($Data[$i]['video']['video']) && !empty($Data[$i]['video']['video'])) {
                                    $path = Get_Image($this->folder3, $Data[$i]['video']['video']);
                                    $Final_Data[$i]['video'] = $path;
                                } else {
                                    $Final_Data[$i]['video'] = "";
                                }
                                $Final_Data[$i]['stop_time'] = 0;
                                $Final_Data[$i]['is_downloaded'] = 0;
                                $Final_Data[$i]['is_bookmark'] = 0;
                                $Final_Data[$i]['rent_buy'] = 0;
                                $Final_Data[$i]['is_rent'] = IsRentVideo($Data[$i]['video']['id'], $Data[$i]['video']['video_type']);
                                $Final_Data[$i]['rent_price'] = GetPriceByRentVideo($Data[$i]['video']['id'], $Data[$i]['video']['video_type']);
                                $Final_Data[$i]['is_buy'] = 0;
                                $Final_Data[$i]['category_name'] = GetCategoryNameByIds($Data[$i]['video']['category_id']);
                                $Final_Data[$i]['session_id'] = "0";
                                // Video_320
                                if (isset($Data[$i]['video']['video_320']) && !empty($Data[$i]['video']['video_320'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_320']);
                                        $Final_Data[$i]['video_320'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_320'] = $Data[$i]['video']['video_320'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_320'] = "";
                                }
                                // Video_480
                                if (isset($Data[$i]['video']['video_480']) && !empty($Data[$i]['video']['video_480'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_480']);
                                        $Final_Data[$i]['video_480'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_480'] = $Data[$i]['video']['video_480'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_480'] = "";
                                }
                                // Video_720
                                if (isset($Data[$i]['video']['video_720']) && !empty($Data[$i]['video']['video_720'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_720']);
                                        $Final_Data[$i]['video_720'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_720'] = $Data[$i]['video']['video_720'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_720'] = "";
                                }
                                // Video_1080
                                if (isset($Data[$i]['video']['video_1080']) && !empty($Data[$i]['video']['video_1080'])) {
                                    if ($Data[$i]['video']['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['video_1080']);
                                        $Final_Data[$i]['video_1080'] = $path;
                                    } else {
                                        $Final_Data[$i]['video_1080'] = $Data[$i]['video']['video_1080'];
                                    }
                                } else {
                                    $Final_Data[$i]['video_1080'] = "";
                                }
                                // SubTitle
                                if (isset($Data[$i]['video']['subtitle']) && !empty($Data[$i]['video']['subtitle'])) {
                                    if ($Data[$i]['video']['subtitle_type'] == "server_file") {
                                        $path = Get_Image($this->folder3, $Data[$i]['video']['subtitle']);
                                        $Final_Data[$i]['subtitle'] = $path;
                                    } else {
                                        $Final_Data[$i]['subtitle'] = $Data[$i]['video']['subtitle'];
                                    }
                                } else {
                                    $Final_Data[$i]['subtitle'] = "";
                                }
                            }
                        } else {
                            if ($Data[$i]['tvshow'] != null) {

                                $Final_Data[$i]['name'] = $Data[$i]['tvshow']['name'];
                                $Final_Data[$i]['id'] = $Data[$i]['tvshow']['id'];
                                $Final_Data[$i]['category_id'] = $Data[$i]['tvshow']['category_id'];
                                $Final_Data[$i]['description'] = $Data[$i]['tvshow']['description'];
                                $Final_Data[$i]['video_type'] = (int) $Data[$i]['tvshow']['video_type'];
                                $Final_Data[$i]['type_id'] = (int) $Data[$i]['tvshow']['type_id'];
                                // Thumbnail
                                if (!empty($Data[$i]['tvshow']['thumbnail'])) {
                                    $path = Get_Image($this->folder4, $Data[$i]['tvshow']['thumbnail']);
                                    $Final_Data[$i]['thumbnail'] = $path;
                                } else {
                                    $Final_Data[$i]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($Data[$i]['tvshow']['landscape'])) {
                                    $path = Get_Image($this->folder4, $Data[$i]['tvshow']['landscape']);
                                    $Final_Data[$i]['landscape'] = $path;
                                } else {
                                    $Final_Data[$i]['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                $Final_Data[$i]['stop_time'] = 0;
                                $Final_Data[$i]['is_downloaded'] = 0;
                                $Final_Data[$i]['is_bookmark'] = 0;
                                $Final_Data[$i]['rent_buy'] = 0;
                                $Final_Data[$i]['is_rent'] = IsRentVideo($Data[$i]['tvshow']['id'], $Data[$i]['tvshow']['video_type']);
                                $Final_Data[$i]['rent_price'] = GetPriceByRentVideo($Data[$i]['tvshow']['id'], $Data[$i]['tvshow']['video_type']);
                                $Final_Data[$i]['is_buy'] = 0;
                                $Final_Data[$i]['category_name'] = GetCategoryNameByIds($Data[$i]['tvshow']['category_id']);
                                $Final_Data[$i]['session_id'] = GetSessionByTVShowId($Data[$i]['tvshow']['id']);
                            }
                        }
                    }
                    sort($Final_Data);
                    return APIResponse(200, __('api_msg.get_record_successfully'), $Final_Data);
                } else {
                    return APIResponse(200, __('api_msg.get_record_successfully'), []);
                }
            } else {
                return APIResponse(200, __('api_msg.get_record_successfully'), []);
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function general_setting()
    {
        try {
            $data = General_Setting::get();

            if (count($data) > 0) {

                foreach ($data as $key => $value) {
                    if ($value['key'] == "app_logo") {
                        if (!empty($value['value'])) {
                            $path = Get_Image($this->folder6, $value['value']);
                            $value['value'] = $path;
                        }
                    }
                    if ($value['key'] == "currency") {
                        if (!empty($value['value'])) {
                            $value['value'] = strtoupper($value['value']);
                        }
                    }
                }

                return APIResponse(200, __('api_msg.get_record_successfully'), $data);
            } else {
                return APIResponse(200, __('api_msg.get_record_successfully'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_type()
    {
        try {
            $Data = Type::get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    $Data[$i]['type'] = (int) $Data[$i]['type'];
                }
                return APIResponse(200, __('api_msg.get_record_successfully'), $Data);
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_avatar()
    {
        try {
            $Data = Avatar::latest()->get();
            if (sizeof($Data) > 0) {

                for ($i = 0; $i < count($Data); $i++) {

                    if (!empty($Data[$i]['image'])) {

                        $path = Get_Image($this->folder8, $Data[$i]['image']);
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

    public function section_list(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'type_id' => 'required|numeric',
                    'is_home_page' => 'required|numeric',
                ],
                [
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                    'is_home_page.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('type_id');
                $errors1 = $validation->errors()->first('is_home_page');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                }
                return $data;
            }

            $type_id = $request->type_id;
            $is_home_page = $request->is_home_page;
            $user_id = isset($request->user_id) ? $request->user_id : 0;

            if ($is_home_page == "1") {

                $data = App_Section::where('is_home_screen', '1')->latest()->get();
                if (count($data) > 0) {

                    for ($i = 0; $i < count($data); $i++) {

                        $data[$i]['data'] = [];
                        if ($data[$i]['video_type'] == '1') {

                            $Ids = explode(',', $data[$i]['video_id']);
                            $video_data = Video::whereIn('id', $Ids)->latest()->get();

                            if (count($video_data) > 0) {

                                $data[$i]['data'] = $video_data;
                                for ($j = 0; $j < count($video_data); $j++) {

                                    // Thumbnail
                                    if (!empty($data[$i]['data'][$j]['thumbnail'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['thumbnail']);
                                        $data[$i]['data'][$j]['thumbnail'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Landscape
                                    if (!empty($data[$i]['data'][$j]['landscape'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['landscape']);
                                        $data[$i]['data'][$j]['landscape'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['landscape'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Video
                                    if (!empty($data[$i]['data'][$j]['video'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video']);
                                        $data[$i]['data'][$j]['video'] = $path;
                                    }
                                    // Video_320
                                    if (isset($data[$i]['data'][$j]['video_320']) && !empty($data[$i]['data'][$j]['video_320'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_320']);
                                            $data[$i]['data'][$j]['video_320'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_320'] = $data[$i]['data'][$j]['video_320'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_320'] = "";
                                    }
                                    // Video_480
                                    if (isset($data[$i]['data'][$j]['video_480']) && !empty($data[$i]['data'][$j]['video_480'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_480']);
                                            $data[$i]['data'][$j]['video_480'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_480'] = $data[$i]['data'][$j]['video_480'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_480'] = "";
                                    }
                                    // Video_720
                                    if (isset($data[$i]['data'][$j]['video_720']) && !empty($data[$i]['data'][$j]['video_720'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_720']);
                                            $data[$i]['data'][$j]['video_720'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_720'] = $data[$i]['data'][$j]['video_720'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_720'] = "";
                                    }
                                    // Video_1080
                                    if (isset($data[$i]['data'][$j]['video_1080']) && !empty($data[$i]['data'][$j]['video_1080'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_1080']);
                                            $data[$i]['data'][$j]['video_1080'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_1080'] = $data[$i]['data'][$j]['video_1080'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_1080'] = "";
                                    }
                                    // SubTitle
                                    if (isset($data[$i]['data'][$j]['subtitle']) && !empty($data[$i]['data'][$j]['subtitle'])) {
                                        if ($data[$i]['data'][$j]['subtitle_type'] == "server_file") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['subtitle']);
                                            $data[$i]['data'][$j]['subtitle'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['subtitle'] = $data[$i]['data'][$j]['subtitle'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['subtitle'] = "";
                                    }

                                    $data[$i]['data'][$j]['stop_time'] = GetStopTimeByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_downloaded'] = Is_DownloadByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_bookmark'] = Is_BookmarkByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_buy'] = VideoRentBuyByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_rent'] = IsRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_price'] = GetPriceByRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_buy'] = IsBuyByUser($user_id);
                                    $data[$i]['data'][$j]['category_name'] = GetCategoryNameByIds($data[$i]['data'][$j]['category_id']);
                                    $data[$i]['data'][$j]['session_id'] = "0";
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '2') {

                            $Ids = explode(',', $data[$i]['tv_show_id']);
                            $tvshow_data = TVShow::whereIn('id', $Ids)->latest()->get();

                            if (count($tvshow_data) > 0) {
                                $data[$i]['data'] = $tvshow_data;
                                for ($j = 0; $j < count($tvshow_data); $j++) {

                                    // Thumbnail
                                    if (!empty($data[$i]['data'][$j]['thumbnail'])) {
                                        $path = Get_Image($this->folder4, $data[$i]['data'][$j]['thumbnail']);
                                        $data[$i]['data'][$j]['thumbnail'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Landscape
                                    if (!empty($data[$i]['data'][$j]['landscape'])) {
                                        $path = Get_Image($this->folder4, $data[$i]['data'][$j]['landscape']);
                                        $data[$i]['data'][$j]['landscape'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['landscape'] = asset('/assets/imgs/no_img.png');
                                    }

                                    $data[$i]['data'][$j]['stop_time'] = 0;
                                    $data[$i]['data'][$j]['is_downloaded'] = 0;
                                    $data[$i]['data'][$j]['is_bookmark'] = Is_BookmarkByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_buy'] = VideoRentBuyByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_rent'] = IsRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_price'] = GetPriceByRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_buy'] = IsBuyByUser($user_id);
                                    $data[$i]['data'][$j]['category_name'] = GetCategoryNameByIds($data[$i]['data'][$j]['category_id']);
                                    $data[$i]['data'][$j]['session_id'] = GetSessionByTVShowId($data[$i]['data'][$j]['id']);
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '3') {

                            $Ids = explode(',', $data[$i]['language_id']);
                            $lang_data = Language::whereIn('id', $Ids)->latest()->get();

                            if (count($lang_data) > 0) {
                                $data[$i]['data'] = $lang_data;
                                for ($j = 0; $j < count($lang_data); $j++) {

                                    if (!empty($data[$i]['data'][$j]['image'])) {
                                        $path = Get_Image($this->folder, $data[$i]['data'][$j]['image']);
                                        $data[$i]['data'][$j]['image'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['image'] = asset('/assets/imgs/no_img.png');
                                    }
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '4') {

                            $Ids = explode(',', $data[$i]['category_ids']);
                            $category_data = Category::whereIn('id', $Ids)->latest()->get();

                            if (count($category_data) > 0) {
                                $data[$i]['data'] = $category_data;
                                for ($j = 0; $j < count($category_data); $j++) {

                                    if (!empty($data[$i]['data'][$j]['image'])) {
                                        $path = Get_Image($this->folder2, $data[$i]['data'][$j]['image']);
                                        $data[$i]['data'][$j]['image'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['image'] = asset('/assets/imgs/no_img.png');
                                    }
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        }
                    }

                    $continue = Video_Watch::where('user_id', $user_id)->where('status', '1')->latest()->get();
                    $continue_watching = array();
                    for ($i = 0; $i < count($continue); $i++) {

                        if ($continue[$i]['video_type'] == 1) {

                            $V_continue_video_data = Video::where('id', $continue[$i]['video_id'])->first();
                            if (!empty($V_continue_video_data)) {

                                // Thumbnail
                                if (!empty($V_continue_video_data['thumbnail'])) {
                                    $path = Get_Image($this->folder3, $V_continue_video_data['thumbnail']);
                                    $V_continue_video_data['thumbnail'] = $path;
                                } else {
                                    $V_continue_video_data['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($V_continue_video_data['landscape'])) {
                                    $path = Get_Image($this->folder3, $V_continue_video_data['landscape']);
                                    $V_continue_video_data['landscape'] = $path;
                                } else {
                                    $V_continue_video_data['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                // Video
                                if (!empty($V_continue_video_data['video'])) {
                                    $path = Get_Image($this->folder3, $V_continue_video_data['video']);
                                    $V_continue_video_data['video'] = $path;
                                }
                                // Video_320
                                if (isset($V_continue_video_data['video_320']) && !empty($V_continue_video_data['video_320'])) {
                                    if ($V_continue_video_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_video_data['video_320']);
                                        $V_continue_video_data['video_320'] = $path;
                                    } else {
                                        $V_continue_video_data['video_320'] = $V_continue_video_data['video_320'];
                                    }
                                } else {
                                    $V_continue_video_data['video_320'] = "";
                                }
                                // Video_480
                                if (isset($V_continue_video_data['video_480']) && !empty($V_continue_video_data['video_480'])) {
                                    if ($V_continue_video_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_video_data['video_480']);
                                        $V_continue_video_data['video_480'] = $path;
                                    } else {
                                        $V_continue_video_data['video_480'] = $V_continue_video_data['video_480'];
                                    }
                                } else {
                                    $V_continue_video_data['video_480'] = "";
                                }
                                // Video_720
                                if (isset($V_continue_video_data['video_720']) && !empty($V_continue_video_data['video_720'])) {
                                    if ($V_continue_video_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_video_data['video_720']);
                                        $V_continue_video_data['video_720'] = $path;
                                    } else {
                                        $V_continue_video_data['video_720'] = $V_continue_video_data['video_720'];
                                    }
                                } else {
                                    $V_continue_video_data['video_720'] = "";
                                }
                                // Video_1080
                                if (isset($V_continue_video_data['video_1080']) && !empty($V_continue_video_data['video_1080'])) {
                                    if ($V_continue_video_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_video_data['video_1080']);
                                        $V_continue_video_data['video_1080'] = $path;
                                    } else {
                                        $V_continue_video_data['video_1080'] = $V_continue_video_data['video_1080'];
                                    }
                                } else {
                                    $V_continue_video_data['video_1080'] = "";
                                }
                                // SubTitle
                                if (isset($V_continue_video_data['subtitle']) && !empty($V_continue_video_data['subtitle'])) {
                                    if ($V_continue_video_data['subtitle_type'] == "server_file") {
                                        $path = Get_Image($this->folder3, $V_continue_video_data['subtitle']);
                                        $V_continue_video_data['subtitle'] = $path;
                                    } else {
                                        $V_continue_video_data['subtitle'] = $V_continue_video_data['subtitle'];
                                    }
                                } else {
                                    $V_continue_video_data['subtitle'] = "";
                                }

                                $V_continue_video_data['stop_time'] = GetStopTimeByUser($user_id, $V_continue_video_data['id'], $V_continue_video_data['type_id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['is_downloaded'] = Is_DownloadByUser($user_id, $V_continue_video_data['id'], $V_continue_video_data['type_id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['is_bookmark'] = Is_BookmarkByUser($user_id, $V_continue_video_data['id'], $V_continue_video_data['type_id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['rent_buy'] = VideoRentBuyByUser($user_id, $V_continue_video_data['id'], $V_continue_video_data['type_id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['is_rent'] = IsRentVideo($V_continue_video_data['id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['rent_price'] = GetPriceByRentVideo($V_continue_video_data['id'], $V_continue_video_data['video_type']);
                                $V_continue_video_data['is_buy'] = IsBuyByUser($user_id);
                                $V_continue_video_data['category_name'] = GetCategoryNameByIds($V_continue_video_data['category_id']);
                                $V_continue_video_data['session_id'] = 0;
                                $V_continue_video_data['show_id'] = 0;

                                $continue_watching[$i] = $V_continue_video_data;
                            }
                        } elseif ($continue[$i]['video_type'] == 2) {

                            $V_continue_episode_data = TVShowVideo::where('id', $continue[$i]['video_id'])->with('show')->first();
                            if (!empty($V_continue_episode_data)) {

                                // Thumbnail
                                if (!empty($V_continue_episode_data['thumbnail'])) {
                                    $path = Get_Image($this->folder4, $V_continue_episode_data['thumbnail']);
                                    $V_continue_episode_data['thumbnail'] = $path;
                                } else {
                                    $V_continue_episode_data['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($V_continue_episode_data['landscape'])) {
                                    $path = Get_Image($this->folder4, $V_continue_episode_data['landscape']);
                                    $V_continue_episode_data['landscape'] = $path;
                                } else {
                                    $V_continue_episode_data['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                // Video
                                if (!empty($V_continue_episode_data['video'])) {
                                    $path = Get_Image($this->folder3, $V_continue_episode_data['video']);
                                    $V_continue_episode_data['video'] = $path;
                                }
                                // Video_320
                                if (isset($V_continue_episode_data['video_320']) && !empty($V_continue_episode_data['video_320'])) {
                                    if ($V_continue_episode_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_episode_data['video_320']);
                                        $V_continue_episode_data['video_320'] = $path;
                                    } else {
                                        $V_continue_episode_data['video_320'] = $V_continue_episode_data['video_320'];
                                    }
                                } else {
                                    $V_continue_episode_data['video_320'] = "";
                                }
                                // Video_480
                                if (isset($V_continue_episode_data['video_480']) && !empty($V_continue_episode_data['video_480'])) {
                                    if ($V_continue_episode_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_episode_data['video_480']);
                                        $V_continue_episode_data['video_480'] = $path;
                                    } else {
                                        $V_continue_episode_data['video_480'] = $V_continue_episode_data['video_480'];
                                    }
                                } else {
                                    $V_continue_episode_data['video_480'] = "";
                                }
                                // Video_720
                                if (isset($V_continue_episode_data['video_720']) && !empty($V_continue_episode_data['video_720'])) {
                                    if ($V_continue_episode_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_episode_data['video_720']);
                                        $V_continue_episode_data['video_720'] = $path;
                                    } else {
                                        $V_continue_episode_data['video_720'] = $V_continue_episode_data['video_720'];
                                    }
                                } else {
                                    $V_continue_episode_data['video_720'] = "";
                                }
                                // Video_1080
                                if (isset($V_continue_episode_data['video_1080']) && !empty($V_continue_episode_data['video_1080'])) {
                                    if ($V_continue_episode_data['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $V_continue_episode_data['video_1080']);
                                        $V_continue_episode_data['video_1080'] = $path;
                                    } else {
                                        $V_continue_episode_data['video_1080'] = $V_continue_episode_data['video_1080'];
                                    }
                                } else {
                                    $V_continue_episode_data['video_1080'] = "";
                                }
                                // SubTitle
                                if (isset($V_continue_episode_data['subtitle']) && !empty($V_continue_episode_data['subtitle'])) {
                                    if ($V_continue_episode_data['subtitle_type'] == "server_file") {
                                        $path = Get_Image($this->folder3, $V_continue_episode_data['subtitle']);
                                        $V_continue_episode_data['subtitle'] = $path;
                                    } else {
                                        $V_continue_episode_data['subtitle'] = $V_continue_episode_data['subtitle'];
                                    }
                                } else {
                                    $V_continue_episode_data['subtitle'] = "";
                                }

                                $V_continue_episode_data['stop_time'] = (int) $continue[$i]['stop_time'];
                                $V_continue_episode_data['is_buy'] = IsBuyByUser($user_id);

                                if ($V_continue_episode_data['show'] != null) {

                                    $V_continue_episode_data['is_downloaded'] = Is_DownloadByUser($user_id, $V_continue_episode_data['session_id'], $V_continue_episode_data['show']['type_id'], $V_continue_episode_data['video_type'], $V_continue_episode_data['show_id']);
                                    $V_continue_episode_data['is_bookmark'] = Is_BookmarkByUser($user_id, $V_continue_episode_data['show_id'], $V_continue_episode_data['show']['type_id'], $V_continue_episode_data['video_type']);
                                    $V_continue_episode_data['rent_buy'] = VideoRentBuyByUser($user_id, $V_continue_episode_data['show_id'], $V_continue_episode_data['show']['type_id'], $V_continue_episode_data['video_type']);
                                    $V_continue_episode_data['is_rent'] = IsRentVideo($V_continue_episode_data['show_id'], $V_continue_episode_data['video_type']);
                                    $V_continue_episode_data['rent_price'] = GetPriceByRentVideo($V_continue_episode_data['show_id'], $V_continue_episode_data['video_type']);
                                    $V_continue_episode_data['language_id'] = (string)$V_continue_episode_data['show']['language_id'];
                                    $V_continue_episode_data['channel_id'] = $V_continue_episode_data['show']['channel_id'];
                                    $V_continue_episode_data['category_id'] = (string)$V_continue_episode_data['show']['category_id'];
                                    $V_continue_episode_data['category_name'] = GetCategoryNameByIds($V_continue_episode_data['show']['category_id']);
                                    $V_continue_episode_data['name'] = $V_continue_episode_data['show']['name'];
                                    $V_continue_episode_data['type_id'] = (int)$V_continue_episode_data['show']['type_id'];
                                    $V_continue_episode_data['video_type'] = (int)$V_continue_episode_data['show']['video_type'];
                                } else {

                                    $V_continue_episode_data['is_downloaded'] = 0;
                                    $V_continue_episode_data['is_bookmark'] = 0;
                                    $V_continue_episode_data['rent_buy'] = 0;
                                    $V_continue_episode_data['is_rent'] = 0;
                                    $V_continue_episode_data['rent_price'] = 0;
                                    $V_continue_episode_data['language_id'] = "";
                                    $V_continue_episode_data['channel_id'] = "";
                                    $V_continue_episode_data['category_id'] = "";
                                    $V_continue_episode_data['category_name'] = "";
                                    $V_continue_episode_data['name'] = "";
                                    $V_continue_episode_data['type_id'] = 0;
                                    $V_continue_episode_data['video_type'] = 0;
                                }

                                unset($V_continue_episode_data['show']);
                                $continue_watching[$i] = $V_continue_episode_data;
                            }
                        }
                    }

                    $return['status'] = 200;
                    $return['message'] = __('api_msg.get_record_successfully');
                    $return['result'] = $data;
                    $return['continue_watching'] = $continue_watching;
                    return $return;

                    return APIResponse(200, __('api_msg.get_record_successfully'), $data);
                } else {
                    return APIResponse(400, __('api_msg.data_not_found'));
                }
            } elseif ($is_home_page == "2") {

                $data = App_Section::where('is_home_screen', '2')->where('type_id', $type_id)->latest()->get();
                if (count($data) > 0) {

                    for ($i = 0; $i < count($data); $i++) {

                        $data[$i]['data'] = [];
                        if ($data[$i]['video_type'] == '1') {

                            $Ids = explode(',', $data[$i]['video_id']);
                            $video_data = Video::whereIn('id', $Ids)->latest()->get();

                            if (count($video_data) > 0) {

                                $data[$i]['data'] = $video_data;
                                for ($j = 0; $j < count($video_data); $j++) {

                                    // Thumbnail
                                    if (!empty($data[$i]['data'][$j]['thumbnail'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['thumbnail']);
                                        $data[$i]['data'][$j]['thumbnail'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Landscape
                                    if (!empty($data[$i]['data'][$j]['landscape'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['landscape']);
                                        $data[$i]['data'][$j]['landscape'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['landscape'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Video
                                    if (!empty($data[$i]['data'][$j]['video'])) {
                                        $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video']);
                                        $data[$i]['data'][$j]['video'] = $path;
                                    }
                                    // Video_320
                                    if (isset($data[$i]['data'][$j]['video_320']) && !empty($data[$i]['data'][$j]['video_320'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_320']);
                                            $data[$i]['data'][$j]['video_320'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_320'] = $data[$i]['data'][$j]['video_320'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_320'] = "";
                                    }
                                    // Video_480
                                    if (isset($data[$i]['data'][$j]['video_480']) && !empty($data[$i]['data'][$j]['video_480'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_480']);
                                            $data[$i]['data'][$j]['video_480'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_480'] = $data[$i]['data'][$j]['video_480'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_480'] = "";
                                    }
                                    // Video_720
                                    if (isset($data[$i]['data'][$j]['video_720']) && !empty($data[$i]['data'][$j]['video_720'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_720']);
                                            $data[$i]['data'][$j]['video_720'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_720'] = $data[$i]['data'][$j]['video_720'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_720'] = "";
                                    }
                                    // Video_1080
                                    if (isset($data[$i]['data'][$j]['video_1080']) && !empty($data[$i]['data'][$j]['video_1080'])) {
                                        if ($data[$i]['data'][$j]['video_upload_type'] == "server_video") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['video_1080']);
                                            $data[$i]['data'][$j]['video_1080'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['video_1080'] = $data[$i]['data'][$j]['video_1080'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['video_1080'] = "";
                                    }
                                    // Subtitle
                                    if (isset($data[$i]['data'][$j]['subtitle']) && !empty($data[$i]['data'][$j]['subtitle'])) {
                                        if ($data[$i]['data'][$j]['subtitle_type'] == "server_file") {
                                            $path = Get_Image($this->folder3, $data[$i]['data'][$j]['subtitle']);
                                            $data[$i]['data'][$j]['subtitle'] = $path;
                                        } else {
                                            $data[$i]['data'][$j]['subtitle'] = $data[$i]['data'][$j]['subtitle'];
                                        }
                                    } else {
                                        $data[$i]['data'][$j]['subtitle'] = "";
                                    }

                                    $data[$i]['data'][$j]['stop_time'] = GetStopTimeByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_downloaded'] = Is_DownloadByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_bookmark'] = Is_BookmarkByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_buy'] = VideoRentBuyByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_rent'] = IsRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_price'] = GetPriceByRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_buy'] = IsBuyByUser($user_id);
                                    $data[$i]['data'][$j]['category_name'] = GetCategoryNameByIds($data[$i]['data'][$j]['category_id']);
                                    $data[$i]['data'][$j]['session_id'] = "0";
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '2') {

                            $Ids = explode(',', $data[$i]['tv_show_id']);
                            $tvshow_data = TVShow::whereIn('id', $Ids)->latest()->get();

                            if (count($tvshow_data) > 0) {
                                $data[$i]['data'] = $tvshow_data;
                                for ($j = 0; $j < count($tvshow_data); $j++) {

                                    // Thumbnail
                                    if (!empty($data[$i]['data'][$j]['thumbnail'])) {
                                        $path = Get_Image($this->folder4, $data[$i]['data'][$j]['thumbnail']);
                                        $data[$i]['data'][$j]['thumbnail'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['thumbnail'] = asset('/assets/imgs/no_img.png');
                                    }
                                    // Landscape
                                    if (!empty($data[$i]['data'][$j]['landscape'])) {
                                        $path = Get_Image($this->folder4, $data[$i]['data'][$j]['landscape']);
                                        $data[$i]['data'][$j]['landscape'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['landscape'] = asset('/assets/imgs/no_img.png');
                                    }

                                    $data[$i]['data'][$j]['stop_time'] = 0;
                                    $data[$i]['data'][$j]['is_downloaded'] = 0;
                                    $data[$i]['data'][$j]['is_bookmark'] = Is_BookmarkByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_buy'] = VideoRentBuyByUser($user_id, $data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['type_id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_rent'] = IsRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['rent_price'] = GetPriceByRentVideo($data[$i]['data'][$j]['id'], $data[$i]['data'][$j]['video_type']);
                                    $data[$i]['data'][$j]['is_buy'] = IsBuyByUser($user_id);
                                    $data[$i]['data'][$j]['category_name'] = GetCategoryNameByIds($data[$i]['data'][$j]['category_id']);
                                    $data[$i]['data'][$j]['session_id'] = GetSessionByTVShowId($data[$i]['data'][$j]['id']);
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '3') {

                            $Ids = explode(',', $data[$i]['language_id']);
                            $lang_data = Language::whereIn('id', $Ids)->latest()->get();

                            if (count($lang_data) > 0) {
                                $data[$i]['data'] = $lang_data;
                                for ($j = 0; $j < count($lang_data); $j++) {

                                    if (!empty($data[$i]['data'][$j]['image'])) {
                                        $path = Get_Image($this->folder, $data[$i]['data'][$j]['image']);
                                        $data[$i]['data'][$j]['image'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['image'] = asset('/assets/imgs/no_img.png');
                                    }
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        } elseif ($data[$i]['video_type'] == '4') {

                            $Ids = explode(',', $data[$i]['category_ids']);
                            $category_data = Category::whereIn('id', $Ids)->latest()->get();

                            if (count($category_data) > 0) {
                                $data[$i]['data'] = $category_data;
                                for ($j = 0; $j < count($category_data); $j++) {

                                    if (!empty($data[$i]['data'][$j]['image'])) {
                                        $path = Get_Image($this->folder2, $data[$i]['data'][$j]['image']);
                                        $data[$i]['data'][$j]['image'] = $path;
                                    } else {
                                        $data[$i]['data'][$j]['image'] = asset('/assets/imgs/no_img.png');
                                    }
                                }
                            } else {
                                $data[$i]['data'] = [];
                            }
                        }
                    }

                    $return['status'] = 200;
                    $return['message'] = __('api_msg.get_record_successfully');
                    $return['result'] = $data;
                    $return['continue_watching'] = [];
                    return $return;
                    // return APIResponse(200, __('api_msg.get_record_successfully'), $data);
                } else {
                    return APIResponse(400, __('api_msg.data_not_found'));
                }
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function section_detail(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'type_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                    'video_id' => 'required|numeric',
                ],
                [
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('type_id');
                $errors1 = $validation->errors()->first('video_type');
                $errors2 = $validation->errors()->first('video_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                }
                return $data;
            }

            $type_id = $request->type_id;
            $video_type = $request->video_type;
            $video_id = $request->video_id;
            $user_id = isset($request->user_id) ? $request->user_id : 0;

            if ($video_type == "1") {

                $data['status'] = 200;
                $data['message'] = __('api_msg.get_record_successfully');

                $data['result'] = Video::where('id', $video_id)->where('video_type', $video_type)->first();
                if (!empty($data['result'])) {

                    // Thumbnail
                    if (!empty($data['result']['thumbnail'])) {
                        $path = Get_Image($this->folder3, $data['result']['thumbnail']);
                        $data['result']['thumbnail'] = $path;
                    } else {
                        $data['result']['thumbnail'] = asset('/assets/imgs/no_img.png');
                    }
                    // Landscape
                    if (!empty($data['result']['landscape'])) {
                        $path = Get_Image($this->folder3, $data['result']['landscape']);
                        $data['result']['landscape'] = $path;
                    } else {
                        $data['result']['landscape'] = asset('/assets/imgs/no_img.png');
                    }
                    // Video
                    if (!empty($data['result']['video'])) {
                        $path = Get_Image($this->folder3, $data['result']['video']);
                        $data['result']['video'] = $path;
                    }
                    // Video_320
                    if (isset($data['result']['video_320']) && !empty($data['result']['video_320'])) {
                        if ($data['result']['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $data['result']['video_320']);
                            $data['result']['video_320'] = $path;
                        } else {
                            $data['result']['video_320'] = $data['result']['video_320'];
                        }
                    } else {
                        $data['result']['video_320'] = "";
                    }
                    // Video_480
                    if (isset($data['result']['video_480']) && !empty($data['result']['video_480'])) {
                        if ($data['result']['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $data['result']['video_480']);
                            $data['result']['video_480'] = $path;
                        } else {
                            $data['result']['video_480'] = $data['result']['video_480'];
                        }
                    } else {
                        $data['result']['video_480'] = "";
                    }
                    // Video_720
                    if (isset($data['result']['video_720']) && !empty($data['result']['video_720'])) {
                        if ($data['result']['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $data['result']['video_720']);
                            $data['result']['video_720'] = $path;
                        } else {
                            $data['result']['video_720'] = $data['result']['video_720'];
                        }
                    } else {
                        $data['result']['video_720'] = "";
                    }
                    // Video_1080
                    if (isset($data['result']['video_1080']) && !empty($data['result']['video_1080'])) {
                        if ($data['result']['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $data['result']['video_1080']);
                            $data['result']['video_1080'] = $path;
                        } else {
                            $data['result']['video_1080'] = $data['result']['video_1080'];
                        }
                    } else {
                        $data['result']['video_1080'] = "";
                    }
                    // SubTitle
                    if (isset($data['result']['subtitle']) && !empty($data['result']['subtitle'])) {
                        if ($data['result']['subtitle_type'] == "server_file") {
                            $path = Get_Image($this->folder3, $data['result']['subtitle']);
                            $data['result']['subtitle'] = $path;
                        } else {
                            $data['result']['subtitle'] = $data['result']['subtitle'];
                        }
                    } else {
                        $data['result']['subtitle'] = "";
                    }
                    $data['result']['stop_time'] = GetStopTimeByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['is_downloaded'] = Is_DownloadByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['is_bookmark'] = Is_BookmarkByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['rent_buy'] = VideoRentBuyByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['is_rent'] = IsRentVideo($data['result']['id'], $data['result']['video_type']);
                    $data['result']['rent_price'] = GetPriceByRentVideo($data['result']['id'], $data['result']['video_type']);
                    $data['result']['is_buy'] = IsBuyByUser($user_id);
                    $data['result']['category_name'] = GetCategoryNameByIds($data['result']['category_id']);
                    $data['result']['session_id'] = "0";

                    $data['cast'] = array();
                    $data['session'] = array();
                    $data['get_related_video'] = array();
                    $data['language'] = array();
                    $data['more_details'] = array();

                    // Cast
                    $Cast_Ids = explode(',', $data['result']['cast_id']);
                    $data['cast'] = Cast::whereIn('id', $Cast_Ids)->get();
                    for ($i = 0; $i < count($data['cast']); $i++) {
                        if (!empty($data['cast'][$i]['image'])) {
                            $path = Get_Image($this->folder1, $data['cast'][$i]['image']);
                            $data['cast'][$i]['image'] = $path;
                        } else {
                            $data['cast'][$i]['image'] = asset('/assets/imgs/no_img.png');
                        }
                    }

                    // Language
                    $Language_Ids = explode(',', $data['result']['language_id']);
                    $data['language'] = Language::whereIn('id', $Language_Ids)->get();
                    for ($i = 0; $i < count($data['language']); $i++) {
                        if (!empty($data['language'][$i]['image'])) {
                            $path = Get_Image($this->folder, $data['language'][$i]['image']);
                            $data['language'][$i]['image'] = $path;
                        } else {
                            $data['language'][$i]['image'] = asset('/assets/imgs/no_img.png');
                        }
                    }

                    //Get Related Video
                    $Category_Ids = explode(',', $data['result']['category_id']);
                    $All_Video = Video::where('id', '!=', $data['result']['id'])->latest()->get();

                    foreach ($All_Video as $key => $value) {

                        $C_Ids = explode(',', $value['category_id']);
                        foreach ($C_Ids as $key1 => $value1) {

                            if (in_array($value1, $Category_Ids)) {

                                // Thumbnail
                                if (!empty($value['thumbnail'])) {
                                    $path = Get_Image($this->folder3, $value['thumbnail']);
                                    $value['thumbnail'] = $path;
                                } else {
                                    $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($value['landscape'])) {
                                    $path = Get_Image($this->folder3, $value['landscape']);
                                    $value['landscape'] = $path;
                                } else {
                                    $value['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                // Video
                                if (!empty($value['video'])) {
                                    $path = Get_Image($this->folder3, $value['video']);
                                    $value['video'] = $path;
                                }
                                // Video_320
                                if (isset($value['video_320']) && !empty($value['video_320'])) {
                                    if ($value['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $value['video_320']);
                                        $value['video_320'] = $path;
                                    } else {
                                        $value['video_320'] = $value['video_320'];
                                    }
                                } else {
                                    $value['video_320'] = "";
                                }
                                // Video_480
                                if (isset($value['video_480']) && !empty($value['video_480'])) {
                                    if ($value['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $value['video_480']);
                                        $value['video_480'] = $path;
                                    } else {
                                        $value['video_480'] = $value['video_480'];
                                    }
                                } else {
                                    $value['video_480'] = "";
                                }
                                // Video_720
                                if (isset($value['video_720']) && !empty($value['video_720'])) {
                                    if ($value['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $value['video_720']);
                                        $value['video_720'] = $path;
                                    } else {
                                        $value['video_720'] = $value['video_720'];
                                    }
                                } else {
                                    $value['video_720'] = "";
                                }
                                // Video_1080
                                if (isset($value['video_1080']) && !empty($value['video_1080'])) {
                                    if ($value['video_upload_type'] == "server_video") {
                                        $path = Get_Image($this->folder3, $value['video_1080']);
                                        $value['video_1080'] = $path;
                                    } else {
                                        $value['video_1080'] = $value['video_1080'];
                                    }
                                } else {
                                    $value['video_1080'] = "";
                                }
                                // Subtitle
                                if (isset($value['subtitle']) && !empty($value['subtitle'])) {
                                    if ($value['subtitle_type'] == "server_file") {
                                        $path = Get_Image($this->folder3, $value['subtitle']);
                                        $value['subtitle'] = $path;
                                    } else {
                                        $value['subtitle'] = $value['subtitle'];
                                    }
                                } else {
                                    $value['subtitle'] = "";
                                }
                                $value['stop_time'] = GetStopTimeByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['is_downloaded'] = Is_DownloadByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                                $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                                $value['is_buy'] = IsBuyByUser($user_id);
                                $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                                $value['session_id'] = "0";

                                $RelatedData[] = $value;
                                break;
                            } else {
                                $RelatedData = [];
                            }
                        }
                    }

                    $data['get_related_video'] = $RelatedData;

                    // More Details
                    $More_Details[0]['title'] = "Starring";
                    $More_Details[1]['title'] = "Genres";
                    $More_Details[2]['title'] = "Director";
                    $More_Details[3]['title'] = "Supporting Actors";
                    $More_Details[4]['title'] = "Maturity Rating";
                    $More_Details[5]['title'] = "Networks";

                    $More_Details[0]['description'] = GetCastNameByIds($data['result']['cast_id']);
                    $More_Details[1]['description'] = GetCategoryNameByIds($data['result']['category_id']);
                    $More_Details[2]['description'] = "";
                    $More_Details[3]['description'] = "";
                    $More_Details[4]['description'] = $data['result']['maturity_rating'];
                    $More_Details[5]['description'] = $data['result']['networks'];

                    $data['more_details'] = $More_Details;
                } else {
                    $data['result'] = [];
                }

                return $data;
            } elseif ($video_type == "2") {

                $data['status'] = 200;
                $data['message'] = __('api_msg.get_record_successfully');

                $data['result'] = TVShow::where('id', $video_id)->where('video_type', $video_type)->first();

                if (!empty($data['result'])) {

                    // Thumbnail
                    if (!empty($data['result']['thumbnail'])) {
                        $path = Get_Image($this->folder4, $data['result']['thumbnail']);
                        $data['result']['thumbnail'] = $path;
                    } else {
                        $data['result']['thumbnail'] = asset('/assets/imgs/no_img.png');
                    }
                    // Landscape
                    if (!empty($data['result']['landscape'])) {
                        $path = Get_Image($this->folder4, $data['result']['landscape']);
                        $data['result']['landscape'] = $path;
                    } else {
                        $data['result']['landscape'] = asset('/assets/imgs/no_img.png');
                    }
                    $data['result']['stop_time'] = 0;
                    $data['result']['is_downloaded'] = 0;
                    $data['result']['is_bookmark'] = Is_BookmarkByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['rent_buy'] = VideoRentBuyByUser($user_id, $data['result']['id'], $data['result']['type_id'], $data['result']['video_type']);
                    $data['result']['is_rent'] = IsRentVideo($data['result']['id'], $data['result']['video_type']);
                    $data['result']['rent_price'] = GetPriceByRentVideo($data['result']['id'], $data['result']['video_type']);
                    $data['result']['is_buy'] = IsBuyByUser($user_id);
                    $data['result']['category_name'] = GetCategoryNameByIds($data['result']['category_id']);
                    $data['result']['session_id'] = GetSessionByTVShowId($data['result']['id']);

                    $data['cast'] = array();
                    $data['session'] = array();
                    $data['get_related_video'] = array();
                    $data['language'] = array();
                    $data['more_details'] = array();

                    // Cast
                    $Cast_Ids = explode(',', $data['result']['cast_id']);
                    $data['cast'] = Cast::whereIn('id', $Cast_Ids)->get();
                    for ($i = 0; $i < count($data['cast']); $i++) {
                        if (!empty($data['cast'][$i]['image'])) {
                            $path = Get_Image($this->folder1, $data['cast'][$i]['image']);
                            $data['cast'][$i]['image'] = $path;
                        } else {
                            $data['cast'][$i]['image'] = asset('/assets/imgs/no_img.png');
                        }
                    }

                    // Session
                    $Session_Ids = explode(',', $data['result']['session_id']);
                    $data['session'] = Session::whereIn('id', $Session_Ids)->get();
                    for ($i = 0; $i < count($data['session']); $i++) {

                        $data['session'][$i]['is_downloaded'] = Is_DownloadByUser($user_id, $data['session'][$i]['id'], $data['result']['type_id'], $data['result']['video_type'], $data['result']['id']);
                        $data['session'][$i]['rent_buy'] = 0;
                        $data['session'][$i]['is_rent'] = 0;
                        $data['session'][$i]['rent_price'] = 0;
                        $data['session'][$i]['is_buy'] = IsBuyByUser($user_id);
                    }

                    // Language
                    $Language_Ids = explode(',', $data['result']['language_id']);
                    $data['language'] = Language::whereIn('id', $Language_Ids)->get();
                    for ($i = 0; $i < count($data['language']); $i++) {
                        if (!empty($data['language'][$i]['image'])) {
                            $path = Get_Image($this->folder, $data['language'][$i]['image']);
                            $data['language'][$i]['image'] = $path;
                        } else {
                            $data['language'][$i]['image'] = asset('/assets/imgs/no_img.png');
                        }
                    }

                    // Get Related Video
                    $Category_Ids = explode(',', $data['result']['category_id']);
                    $All_Video = TVShow::where('id', '!=', $data['result']['id'])->latest()->get();

                    foreach ($All_Video as $key => $value) {

                        $C_Ids = explode(',', $value['category_id']);
                        foreach ($C_Ids as $key1 => $value1) {

                            if (in_array($value1, $Category_Ids)) {

                                // Thumbnail
                                if (!empty($value['thumbnail'])) {
                                    $path = Get_Image($this->folder4, $value['thumbnail']);
                                    $value['thumbnail'] = $path;
                                } else {
                                    $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                                }
                                // Landscape
                                if (!empty($value['landscape'])) {
                                    $path = Get_Image($this->folder4, $value['landscape']);
                                    $value['landscape'] = $path;
                                } else {
                                    $value['landscape'] = asset('/assets/imgs/no_img.png');
                                }
                                $value['stop_time'] = 0;
                                $value['is_downloaded'] = 0;
                                $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                                $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                                $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                                $value['is_buy'] = IsBuyByUser($user_id);
                                $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                                $value['session_id'] = GetSessionByTVShowId($value['id']);

                                $RelatedData[] = $value;
                                break;
                            } else {
                                $RelatedData = [];
                            }
                        }
                    }

                    $data['get_related_video'] = $RelatedData;

                    // More Details
                    $More_Details[0]['title'] = "Starring";
                    $More_Details[1]['title'] = "Genres";
                    $More_Details[2]['title'] = "Director";
                    $More_Details[3]['title'] = "Supporting Actors";
                    $More_Details[4]['title'] = "Maturity Rating";
                    $More_Details[5]['title'] = "Networks";

                    $More_Details[0]['description'] = GetCastNameByIds($data['result']['cast_id']);
                    $More_Details[1]['description'] = GetCategoryNameByIds($data['result']['category_id']);
                    $More_Details[2]['description'] = "";
                    $More_Details[3]['description'] = "";
                    $More_Details[4]['description'] = $data['result']['maturity_rating'];
                    $More_Details[5]['description'] = $data['result']['networks'];

                    $data['more_details'] = $More_Details;
                } else {
                    $data['result'] = [];
                }
                return $data;
            } else {
                return APIResponse(400, __('api_msg.data_not_found'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function add_continue_watching(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                    'video_id' => 'required|numeric',
                    'stop_time' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                    'stop_time.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors1 = $validation->errors()->first('video_type');
                $errors2 = $validation->errors()->first('video_id');
                $errors3 = $validation->errors()->first('stop_time');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } elseif ($errors3) {
                    $data['message'] = $errors3;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $video_id = $request->video_id;
            $video_type = $request->video_type;
            $stop_time = $request->stop_time;
            $type_id = isset($request->type_id) ? $request->type_id : 0;

            $data = Video_Watch::where('user_id', $user_id)->where('video_id', $video_id)->where('video_type', $video_type)->first();
            if (!empty($data)) {

                $update = Video_Watch::where('id', $data['id'])->update(['stop_time' => $stop_time, 'status' => '1', 'type_id' => $type_id]);

                $Data = Video_Watch::where('id', $data['id'])->first();
                $Data['status'] = (int) $Data['status'];
                return APIResponse(200, __('api_msg.add_successfully'));
            } else {

                $insert = new Video_Watch();
                $insert->user_id = $user_id;
                $insert->video_id = $video_id;
                $insert->type_id = $type_id;
                $insert->video_type = $video_type;
                $insert->stop_time = $stop_time;
                $insert->status = '1';
                if ($insert->save()) {
                    $Data = Video_Watch::where('id', $insert['id'])->first();
                    $Data['status'] = (int) $Data['status'];
                    return APIResponse(200, __('api_msg.add_successfully'));
                } else {
                    return APIResponse(400, __('api_msg.data_not_save'));
                }
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function remove_continue_watching(Request $request)
    {
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'video_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors1 = $validation->errors()->first('video_type');
                $errors2 = $validation->errors()->first('video_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $video_id = $request->video_id;
            $video_type = $request->video_type;

            $remove = Video_Watch::where('user_id', $user_id)->where('video_type', $video_type)->where('video_id', $video_id)->first();
            if (!empty($remove)) {
                $remove->status = '0';
                $remove->update();
            }
            return APIResponse(200, __('api_msg.delete_success'), []);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function add_remove_bookmark(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'video_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                    'type_id' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors1 = $validation->errors()->first('video_type');
                $errors2 = $validation->errors()->first('video_id');
                $errors3 = $validation->errors()->first('type_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } elseif ($errors3) {
                    $data['message'] = $errors3;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $video_id = $request->video_id;
            $video_type = $request->video_type;
            $type_id = $request->type_id;

            $data = Bookmark::where('user_id', $user_id)->where('video_id', $video_id)->where('type_id', $type_id)->where('video_type', $video_type)->first();

            if (!empty($data)) {

                if ($data['status'] == 1) {

                    $data->status = 0;
                    $data->update();
                    return APIResponse(200, __('api_msg.delete_success'), []);
                } else {

                    $data->status = 1;
                    $data->update();
                    return APIResponse(200, __('api_msg.add_successfully'), []);
                }
            } else {

                $insert = new Bookmark();
                $insert->user_id = $user_id;
                $insert->video_id = $video_id;
                $insert->type_id = $type_id;
                $insert->video_type = $video_type;
                $insert->status = '1';
                if ($insert->save()) {

                    $Data = Bookmark::where('id', $insert['id'])->first();
                    return APIResponse(200, __('api_msg.add_successfully'), []);
                } else {
                    return APIResponse(400, __('api_msg.data_not_save'));
                }
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function add_remove_download(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'video_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                    'type_id' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors1 = $validation->errors()->first('video_type');
                $errors2 = $validation->errors()->first('video_id');
                $errors3 = $validation->errors()->first('type_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } elseif ($errors3) {
                    $data['message'] = $errors3;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $video_id = $request->video_id;
            $video_type = $request->video_type;
            $type_id = $request->type_id;
            $other_id = isset($request->other_id) ? $request->other_id : 0;
            $data = Download::where('user_id', $user_id)->where('video_id', $video_id)->where('type_id', $type_id)->where('video_type', $video_type)->where('other_id', $other_id)->first();

            if (!empty($data)) {

                $data->delete();
                return APIResponse(200, __('api_msg.delete_success'), []);
            } else {

                $insert = new Download();
                $insert->user_id = $user_id;
                $insert->video_id = $video_id;
                $insert->type_id = $type_id;
                $insert->video_type = $video_type;
                $insert->other_id = $other_id;

                if ($insert->save()) {
                    return APIResponse(200, __('api_msg.add_successfully'), []);
                } else {
                    return APIResponse(400, __('api_msg.data_not_save'));
                }
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function add_transaction(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'package_id' => 'required|numeric',
                    'description' => 'required',
                    'amount' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'package_id.required' => __('api_msg.please_enter_required_fields'),
                    'description.required' => __('api_msg.please_enter_required_fields'),
                    'amount.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors2 = $validation->errors()->first('package_id');
                $errors1 = $validation->errors()->first('description');
                $errors3 = $validation->errors()->first('amount');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } elseif ($errors3) {
                    $data['message'] = $errors3;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $package_id = $request->package_id;
            $description = $request->description;
            $amount = $request->amount;
            $payment_id = isset($request->payment_id) ? $request->payment_id : "";
            $currency_code = isset($request->currency_code) ? $request->currency_code : "";

            $Pdata = Package::where('id', $package_id)->where('status', '1')->first();
            if (!empty($Pdata)) {
                $Edate = date("Y-m-d", strtotime("$Pdata->time $Pdata->type"));
            } else {
                return APIResponse(400, __('api_msg.please_enter_right_package_id'));
            }

            $insert = new Transction();
            $insert->user_id = $user_id;
            $insert->package_id = $package_id;
            $insert->description = $description;
            $insert->amount = $amount;
            $insert->payment_id = $payment_id;
            $insert->currency_code = currency_code();
            $insert->expiry_date = $Edate;
            $insert->status = '1';

            if ($insert->save()) {
                return APIResponse(200, __('api_msg.add_successfully'), []);
            } else {
                return APIResponse(400, __('api_msg.data_not_save'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function add_rent_transaction(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required|numeric',
                    'video_id' => 'required|numeric',
                    'price' => 'required|numeric',
                    'type_id' => 'required|numeric',
                    'video_type' => 'required|numeric',
                ],
                [
                    'user_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_id.required' => __('api_msg.please_enter_required_fields'),
                    'price.required' => __('api_msg.please_enter_required_fields'),
                    'type_id.required' => __('api_msg.please_enter_required_fields'),
                    'video_type.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('user_id');
                $errors2 = $validation->errors()->first('video_id');
                $errors1 = $validation->errors()->first('price');
                $errors3 = $validation->errors()->first('type_id');
                $errors4 = $validation->errors()->first('video_type');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                } elseif ($errors2) {
                    $data['message'] = $errors2;
                } elseif ($errors3) {
                    $data['message'] = $errors3;
                } elseif ($errors4) {
                    $data['message'] = $errors4;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $video_id = $request->video_id;
            $price = $request->price;
            $type_id = $request->type_id;
            $video_type = $request->video_type;

            $Rent_Video = RentVideo::where('video_id', $video_id)->where('price', $price)->where('type_id', $type_id)->where('video_type', $video_type)->where('status', '1')->first();
            if (!empty($Rent_Video)) {
                $Edate = date("Y-m-d", strtotime("$Rent_Video->time $Rent_Video->type"));
            } else {
                return APIResponse(400, __('api_msg.please_enter_right_rent_video'));
            }

            $insert = new RentTransction();
            $insert->user_id = $user_id;
            $insert->video_id = $video_id;
            $insert->price = $price;
            $insert->type_id = $type_id;
            $insert->video_type = $video_type;
            $insert->status = '1';
            $insert->date = date("Y-m-d H:i:s");
            $insert->expiry_date = $Edate;

            if ($insert->save()) {
                return APIResponse(200, __('api_msg.add_successfully'), []);
            } else {
                return APIResponse(400, __('api_msg.data_not_save'));
            }
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function video_by_category(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'category_id' => 'required|numeric',
                ],
                [
                    'category_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('category_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $category_id = $request->category_id;
            $user_id = isset($request->user_id) ? $request->user_id : 0;
            $data = array();

            $All_Video = Video::latest()->get();

            foreach ($All_Video as $key => $value) {

                $C_Ids = explode(',', $value['category_id']);
                if (in_array($category_id, $C_Ids)) {

                    // Thumbnail
                    if (!empty($value['thumbnail'])) {
                        $path = Get_Image($this->folder3, $value['thumbnail']);
                        $value['thumbnail'] = $path;
                    } else {
                        $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                    }
                    // Landscape
                    if (!empty($value['landscape'])) {
                        $path = Get_Image($this->folder3, $value['landscape']);
                        $value['landscape'] = $path;
                    } else {
                        $value['landscape'] = asset('/assets/imgs/no_img.png');
                    }
                    // Video
                    if (!empty($value['video'])) {
                        $path = Get_Image($this->folder3, $value['video']);
                        $value['video'] = $path;
                    }
                    // Video_320
                    if (isset($value['video_320']) && !empty($value['video_320'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_320']);
                            $value['video_320'] = $path;
                        } else {
                            $value['video_320'] = $value['video_320'];
                        }
                    } else {
                        $value['video_320'] = "";
                    }
                    // Video_480
                    if (isset($value['video_480']) && !empty($value['video_480'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_480']);
                            $value['video_480'] = $path;
                        } else {
                            $value['video_480'] = $value['video_480'];
                        }
                    } else {
                        $value['video_480'] = "";
                    }
                    // Video_720
                    if (isset($value['video_720']) && !empty($value['video_720'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_720']);
                            $value['video_720'] = $path;
                        } else {
                            $value['video_720'] = $value['video_720'];
                        }
                    } else {
                        $value['video_720'] = "";
                    }
                    // Video_1080
                    if (isset($value['video_1080']) && !empty($value['video_1080'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_1080']);
                            $value['video_1080'] = $path;
                        } else {
                            $value['video_1080'] = $value['video_1080'];
                        }
                    } else {
                        $value['video_1080'] = "";
                    }
                    // Subtitle
                    if (isset($value['subtitle']) && !empty($value['subtitle'])) {
                        if ($value['subtitle_type'] == "server_file") {
                            $path = Get_Image($this->folder3, $value['subtitle']);
                            $value['subtitle'] = $path;
                        } else {
                            $value['subtitle'] = $value['subtitle'];
                        }
                    } else {
                        $value['subtitle'] = "";
                    }
                    $value['stop_time'] = GetStopTimeByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_downloaded'] = Is_DownloadByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                    $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                    $value['is_buy'] = IsBuyByUser($user_id);
                    $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                    $value['session_id'] = "0";

                    $data[] = $value;
                }
            }
            return APIResponse(200, __('api_msg.get_record_successfully'), $data);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function video_by_language(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'language_id' => 'required|numeric',
                ],
                [
                    'language_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('language_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $language_id = $request->language_id;
            $user_id = isset($request->user_id) ? $request->user_id : 0;
            $data = array();

            $All_Video = Video::latest()->get();

            foreach ($All_Video as $key => $value) {

                $C_Ids = explode(',', $value['language_id']);
                if (in_array($language_id, $C_Ids)) {

                    // Thumbnail
                    if (!empty($value['thumbnail'])) {
                        $path = Get_Image($this->folder3, $value['thumbnail']);
                        $value['thumbnail'] = $path;
                    } else {
                        $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                    }
                    // Landscape
                    if (!empty($value['landscape'])) {
                        $path = Get_Image($this->folder3, $value['landscape']);
                        $value['landscape'] = $path;
                    } else {
                        $value['landscape'] = asset('/assets/imgs/no_img.png');
                    }
                    // Video
                    if (!empty($value['video'])) {
                        $path = Get_Image($this->folder3, $value['video']);
                        $value['video'] = $path;
                    }
                    // Video_320
                    if (isset($value['video_320']) && !empty($value['video_320'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_320']);
                            $value['video_320'] = $path;
                        } else {
                            $value['video_320'] = $value['video_320'];
                        }
                    } else {
                        $value['video_320'] = "";
                    }
                    // Video_480
                    if (isset($value['video_480']) && !empty($value['video_480'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_480']);
                            $value['video_480'] = $path;
                        } else {
                            $value['video_480'] = $value['video_480'];
                        }
                    } else {
                        $value['video_480'] = "";
                    }
                    // Video_720
                    if (isset($value['video_720']) && !empty($value['video_720'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_720']);
                            $value['video_720'] = $path;
                        } else {
                            $value['video_720'] = $value['video_720'];
                        }
                    } else {
                        $value['video_720'] = "";
                    }
                    // Video_1080
                    if (isset($value['video_1080']) && !empty($value['video_1080'])) {
                        if ($value['video_upload_type'] == "server_video") {
                            $path = Get_Image($this->folder3, $value['video_1080']);
                            $value['video_1080'] = $path;
                        } else {
                            $value['video_1080'] = $value['video_1080'];
                        }
                    } else {
                        $value['video_1080'] = "";
                    }
                    // Subtitle
                    if (isset($value['subtitle']) && !empty($value['subtitle'])) {
                        if ($value['subtitle_type'] == "server_file") {
                            $path = Get_Image($this->folder3, $value['subtitle']);
                            $value['subtitle'] = $path;
                        } else {
                            $value['subtitle'] = $value['subtitle'];
                        }
                    } else {
                        $value['subtitle'] = "";
                    }
                    $value['stop_time'] = GetStopTimeByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_downloaded'] = Is_DownloadByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                    $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                    $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                    $value['is_buy'] = IsBuyByUser($user_id);
                    $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                    $value['session_id'] = "0";

                    $data[] = $value;
                }
            }
            return APIResponse(200, __('api_msg.get_record_successfully'), $data);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_bookmark_video(Request $request)
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

                $errors = $validation->errors()->first('user_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $user_id = $request->user_id;
            $data = array();
            $All_Video = Bookmark::where('user_id', $user_id)->where('status', 1)->latest()->get();

            foreach ($All_Video as $key => $value) {

                if ($value['video_type'] == 1) {

                    $Video = Video::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder3, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder3, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        // Video
                        if (!empty($Video['video'])) {
                            $path = Get_Image($this->folder3, $Video['video']);
                            $Video['video'] = $path;
                        }
                        // Video_320
                        if (isset($Video['video_320']) && !empty($Video['video_320'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_320']);
                                $Video['video_320'] = $path;
                            } else {
                                $Video['video_320'] = $Video['video_320'];
                            }
                        } else {
                            $Video['video_320'] = "";
                        }
                        // Video_480
                        if (isset($Video['video_480']) && !empty($Video['video_480'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_480']);
                                $Video['video_480'] = $path;
                            } else {
                                $Video['video_480'] = $Video['video_480'];
                            }
                        } else {
                            $Video['video_480'] = "";
                        }
                        // Video_720
                        if (isset($Video['video_720']) && !empty($Video['video_720'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_720']);
                                $Video['video_720'] = $path;
                            } else {
                                $Video['video_720'] = $Video['video_720'];
                            }
                        } else {
                            $Video['video_720'] = "";
                        }
                        // Video_1080
                        if (isset($Video['video_1080']) && !empty($Video['video_1080'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_1080']);
                                $Video['video_1080'] = $path;
                            } else {
                                $Video['video_1080'] = $Video['video_1080'];
                            }
                        } else {
                            $Video['video_1080'] = "";
                        }
                        // Subtitle
                        if (isset($Video['subtitle']) && !empty($Video['subtitle'])) {
                            if ($Video['subtitle_type'] == "server_file") {
                                $path = Get_Image($this->folder3, $Video['subtitle']);
                                $Video['subtitle'] = $path;
                            } else {
                                $Video['subtitle'] = $Video['subtitle'];
                            }
                        } else {
                            $Video['subtitle'] = "";
                        }
                        $Video['stop_time'] = GetStopTimeByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_downloaded'] = Is_DownloadByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_bookmark'] = Is_BookmarkByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['rent_buy'] = VideoRentBuyByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = IsBuyByUser($user_id);
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = "0";

                        $data[] = $Video;
                    }
                } elseif ($value['video_type'] == 2) {

                    $Video = TVShow::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder4, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder4, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        $Video['stop_time'] = 0;
                        $Video['is_downloaded'] = 0;
                        $Video['is_bookmark'] = Is_BookmarkByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['rent_buy'] = VideoRentBuyByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = IsBuyByUser($user_id);
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = GetSessionByTVShowId($Video['id']);

                        $data[] = $Video;
                    }
                }
            }

            return APIResponse(200, __('api_msg.get_record_successfully'), $data);
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function search_video(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                ],
                [
                    'name.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('name');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            $name = $request->name;
            $user_id = isset($request->user_id) ? $request->user_id : 0;

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');
            $data['result'] = array();
            $data['video'] = array();
            $data['tvshow'] = array();

            $All_Video = Video::where('name', 'LIKE', "%{$name}%")->latest()->get();
            foreach ($All_Video as $key => $value) {

                // Thumbnail
                if (!empty($value['thumbnail'])) {
                    $path = Get_Image($this->folder3, $value['thumbnail']);
                    $value['thumbnail'] = $path;
                } else {
                    $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                }
                // Landscape
                if (!empty($value['landscape'])) {
                    $path = Get_Image($this->folder3, $value['landscape']);
                    $value['landscape'] = $path;
                } else {
                    $value['landscape'] = asset('/assets/imgs/no_img.png');
                }
                // Video
                if (!empty($value['video'])) {
                    $path = Get_Image($this->folder3, $value['video']);
                    $value['video'] = $path;
                }
                // Video_320
                if (isset($value['video_320']) && !empty($value['video_320'])) {
                    if ($value['video_upload_type'] == "server_video") {
                        $path = Get_Image($this->folder3, $value['video_320']);
                        $value['video_320'] = $path;
                    } else {
                        $value['video_320'] = $value['video_320'];
                    }
                } else {
                    $value['video_320'] = "";
                }
                // Video_480
                if (isset($value['video_480']) && !empty($value['video_480'])) {
                    if ($value['video_upload_type'] == "server_video") {
                        $path = Get_Image($this->folder3, $value['video_480']);
                        $value['video_480'] = $path;
                    } else {
                        $value['video_480'] = $value['video_480'];
                    }
                } else {
                    $value['video_480'] = "";
                }
                // Video_720
                if (isset($value['video_720']) && !empty($value['video_720'])) {
                    if ($value['video_upload_type'] == "server_video") {
                        $path = Get_Image($this->folder3, $value['video_720']);
                        $value['video_720'] = $path;
                    } else {
                        $value['video_720'] = $value['video_720'];
                    }
                } else {
                    $value['video_720'] = "";
                }
                // Video_1080
                if (isset($value['video_1080']) && !empty($value['video_1080'])) {
                    if ($value['video_upload_type'] == "server_video") {
                        $path = Get_Image($this->folder3, $value['video_1080']);
                        $value['video_1080'] = $path;
                    } else {
                        $value['video_1080'] = $value['video_1080'];
                    }
                } else {
                    $value['video_1080'] = "";
                }
                // Subtitle
                if (isset($value['subtitle']) && !empty($value['subtitle'])) {
                    if ($value['subtitle_type'] == "server_file") {
                        $path = Get_Image($this->folder3, $value['subtitle']);
                        $value['subtitle'] = $path;
                    } else {
                        $value['subtitle'] = $value['subtitle'];
                    }
                } else {
                    $value['subtitle'] = "";
                }
                $value['stop_time'] = GetStopTimeByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['is_downloaded'] = Is_DownloadByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                $value['is_buy'] = IsBuyByUser($user_id);
                $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                $value['session_id'] = "0";

                $data['video'][] = $value;
            }

            $All_TVShow = TVShow::where('name', 'LIKE', "%{$name}%")->latest()->get();
            foreach ($All_TVShow as $key => $value) {

                // Thumbnail
                if (!empty($value['thumbnail'])) {
                    $path = Get_Image($this->folder4, $value['thumbnail']);
                    $value['thumbnail'] = $path;
                } else {
                    $value['thumbnail'] = asset('/assets/imgs/no_img.png');
                }
                // Landscape
                if (!empty($value['landscape'])) {
                    $path = Get_Image($this->folder4, $value['landscape']);
                    $value['landscape'] = $path;
                } else {
                    $value['landscape'] = asset('/assets/imgs/no_img.png');
                }
                $value['stop_time'] = 0;
                $value['is_downloaded'] = 0;
                $value['is_bookmark'] = Is_BookmarkByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['rent_buy'] = VideoRentBuyByUser($user_id, $value['id'], $value['type_id'], $value['video_type']);
                $value['is_rent'] = IsRentVideo($value['id'], $value['video_type']);
                $value['rent_price'] = GetPriceByRentVideo($value['id'], $value['video_type']);
                $value['is_buy'] = IsBuyByUser($user_id);
                $value['category_name'] = GetCategoryNameByIds($value['category_id']);
                $value['session_id'] = GetSessionByTVShowId($value['id']);

                $data['tvshow'][] = $value;
            }

            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function user_rent_video_list(Request $request)
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

                $errors = $validation->errors()->first('user_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                }
                return $data;
            }

            // Delete Expriy data
            $all_data = RentTransction::get();
            for ($i = 0; $i < count($all_data); $i++) {
                if ($all_data[$i]['expiry_date'] < date("Y-m-d")) {
                    $all_data[$i]->status = 0;
                    $all_data[$i]->save();
                }
            }

            $user_id = $request->user_id;

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');
            $data['result'] = array();
            $data['video'] = array();
            $data['tvshow'] = array();

            $Rent_Data = RentTransction::where('user_id', $user_id)->where('status', 1)->get();

            foreach ($Rent_Data as $key => $value) {

                if ($value['video_type'] == 1) {

                    $Video = Video::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder3, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder3, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        // Video
                        if (!empty($Video['video'])) {
                            $path = Get_Image($this->folder3, $Video['video']);
                            $Video['video'] = $path;
                        }
                        // Video_320
                        if (isset($Video['video_320']) && !empty($Video['video_320'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_320']);
                                $Video['video_320'] = $path;
                            } else {
                                $Video['video_320'] = $Video['video_320'];
                            }
                        } else {
                            $Video['video_320'] = "";
                        }
                        // Video_480
                        if (isset($Video['video_480']) && !empty($Video['video_480'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_480']);
                                $Video['video_480'] = $path;
                            } else {
                                $Video['video_480'] = $Video['video_480'];
                            }
                        } else {
                            $Video['video_480'] = "";
                        }
                        // Video_720
                        if (isset($Video['video_720']) && !empty($Video['video_720'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_720']);
                                $Video['video_720'] = $path;
                            } else {
                                $Video['video_720'] = $Video['video_720'];
                            }
                        } else {
                            $Video['video_720'] = "";
                        }
                        // Video_1080
                        if (isset($Video['video_1080']) && !empty($Video['video_1080'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_1080']);
                                $Video['video_1080'] = $path;
                            } else {
                                $Video['video_1080'] = $Video['video_1080'];
                            }
                        } else {
                            $Video['video_1080'] = "";
                        }
                        // Subtitle
                        if (isset($Video['subtitle']) && !empty($Video['subtitle'])) {
                            if ($Video['subtitle_type'] == "server_file") {
                                $path = Get_Image($this->folder3, $Video['subtitle']);
                                $Video['subtitle'] = $path;
                            } else {
                                $Video['subtitle'] = $Video['subtitle'];
                            }
                        } else {
                            $Video['subtitle'] = "";
                        }
                        $Video['stop_time'] = GetStopTimeByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_downloaded'] = Is_DownloadByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_bookmark'] = Is_BookmarkByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['rent_buy'] = VideoRentBuyByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = IsBuyByUser($user_id);
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = "0";

                        $data['video'][] = $Video;
                    }
                } elseif ($value['video_type'] == 2) {

                    $Video = TVShow::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder4, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder4, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        $Video['stop_time'] = 0;
                        $Video['is_downloaded'] = 0;
                        $Video['is_bookmark'] = Is_BookmarkByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['rent_buy'] = VideoRentBuyByUser($user_id, $Video['id'], $Video['type_id'], $Video['video_type']);
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = IsBuyByUser($user_id);
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = GetSessionByTVShowId($Video['id']);

                        $data['tvshow'][] = $Video;
                    }
                }
            }
            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function rent_video_list()
    {
        try {

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');
            $data['result'] = array();
            $data['video'] = array();
            $data['tvshow'] = array();

            $Rent_Data = RentVideo::where('status', 1)->get();

            foreach ($Rent_Data as $key => $value) {

                if ($value['video_type'] == 1) {

                    $Video = Video::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder3, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder3, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        // Video
                        if (!empty($Video['video'])) {
                            $path = Get_Image($this->folder3, $Video['video']);
                            $Video['video'] = $path;
                        }
                        // Video_320
                        if (isset($Video['video_320']) && !empty($Video['video_320'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_320']);
                                $Video['video_320'] = $path;
                            } else {
                                $Video['video_320'] = $Video['video_320'];
                            }
                        } else {
                            $Video['video_320'] = "";
                        }
                        // Video_480
                        if (isset($Video['video_480']) && !empty($Video['video_480'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_480']);
                                $Video['video_480'] = $path;
                            } else {
                                $Video['video_480'] = $Video['video_480'];
                            }
                        } else {
                            $Video['video_480'] = "";
                        }
                        // Video_720
                        if (isset($Video['video_720']) && !empty($Video['video_720'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_720']);
                                $Video['video_720'] = $path;
                            } else {
                                $Video['video_720'] = $Video['video_720'];
                            }
                        } else {
                            $Video['video_720'] = "";
                        }
                        // Video_1080
                        if (isset($Video['video_1080']) && !empty($Video['video_1080'])) {
                            if ($Video['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['video_1080']);
                                $Video['video_1080'] = $path;
                            } else {
                                $Video['video_1080'] = $Video['video_1080'];
                            }
                        } else {
                            $Video['video_1080'] = "";
                        }
                        // Subtitle
                        if (isset($Video['subtitle']) && !empty($Video['subtitle'])) {
                            if ($Video['subtitle_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $Video['subtitle']);
                                $Video['subtitle'] = $path;
                            } else {
                                $Video['subtitle'] = $Video['subtitle'];
                            }
                        } else {
                            $Video['subtitle'] = "";
                        }
                        $Video['stop_time'] = 0;
                        $Video['is_downloaded'] = 0;
                        $Video['is_bookmark'] = 0;
                        $Video['rent_buy'] = 0;
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = 0;
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = "0";

                        $Video['rent_time'] = $value['time'];
                        $Video['rent_type'] = $value['type'];

                        $data['video'][] = $Video;
                    }
                } elseif ($value['video_type'] == 2) {

                    $Video = TVShow::where('id', $value['video_id'])->first();
                    if (!empty($Video)) {

                        // Thumbnail
                        if (!empty($Video['thumbnail'])) {
                            $path = Get_Image($this->folder4, $Video['thumbnail']);
                            $Video['thumbnail'] = $path;
                        } else {
                            $Video['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($Video['landscape'])) {
                            $path = Get_Image($this->folder4, $Video['landscape']);
                            $Video['landscape'] = $path;
                        } else {
                            $Video['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        $Video['stop_time'] = 0;
                        $Video['is_downloaded'] = 0;
                        $Video['is_bookmark'] = 0;
                        $Video['rent_buy'] = 0;
                        $Video['is_rent'] = IsRentVideo($Video['id'], $Video['video_type']);
                        $Video['rent_price'] = GetPriceByRentVideo($Video['id'], $Video['video_type']);
                        $Video['is_buy'] = 0;
                        $Video['category_name'] = GetCategoryNameByIds($Video['category_id']);
                        $Video['session_id'] = GetSessionByTVShowId($Video['id']);

                        $Video['rent_time'] = $value['time'];
                        $Video['rent_type'] = $value['type'];

                        $data['tvshow'][] = $Video;
                    }
                }
            }

            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_payment_option(Request $request)
    {
        try {

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');

            $Option_data = Payment_Option::get();
            foreach ($Option_data as $key => $value) {

                $data['result'][$value['name']] = $value;
            }

            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_video_by_session_id(Request $request)
    {
        try {

            $validation = Validator::make(
                $request->all(),
                [
                    'show_id' => 'required|numeric',
                    'session_id' => 'required|numeric',
                ],
                [
                    'show_id.required' => __('api_msg.please_enter_required_fields'),
                    'session_id.required' => __('api_msg.please_enter_required_fields'),
                ]
            );
            if ($validation->fails()) {

                $errors = $validation->errors()->first('show_id');
                $errors1 = $validation->errors()->first('session_id');
                $data['status'] = 400;
                if ($errors) {
                    $data['message'] = $errors;
                } elseif ($errors1) {
                    $data['message'] = $errors1;
                }
                return $data;
            }

            $session_id = $request->session_id;
            $show_id = $request->show_id;
            $user_id = isset($request->user_id) ? $request->user_id : 0;

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');

            $Show_Data = TVShow::where('id', $show_id)->first();
            if (!empty($Show_Data)) {

                $TVShow_Video = TVShowVideo::where('session_id', $session_id)->where('show_id', $show_id)->latest()->get();
                if (count($TVShow_Video) > 0) {

                    for ($i = 0; $i < count($TVShow_Video); $i++) {

                        // Thumbnail
                        if (!empty($TVShow_Video[$i]['thumbnail'])) {
                            $path = Get_Image($this->folder4, $TVShow_Video[$i]['thumbnail']);
                            $TVShow_Video[$i]['thumbnail'] = $path;
                        } else {
                            $TVShow_Video[$i]['thumbnail'] = asset('/assets/imgs/no_img.png');
                        }
                        // Landscape
                        if (!empty($TVShow_Video[$i]['landscape'])) {
                            $path = Get_Image($this->folder4, $TVShow_Video[$i]['landscape']);
                            $TVShow_Video[$i]['landscape'] = $path;
                        } else {
                            $TVShow_Video[$i]['landscape'] = asset('/assets/imgs/no_img.png');
                        }
                        // Video
                        if (!empty($TVShow_Video[$i]['video'])) {
                            $path = Get_Image($this->folder3, $TVShow_Video[$i]['video']);
                            $TVShow_Video[$i]['video'] = $path;
                        }
                        // Video_320
                        if (isset($TVShow_Video[$i]['video_320']) && !empty($TVShow_Video[$i]['video_320'])) {
                            if ($TVShow_Video[$i]['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $TVShow_Video[$i]['video_320']);
                                $TVShow_Video[$i]['video_320'] = $path;
                            } else {
                                $TVShow_Video[$i]['video_320'] = $TVShow_Video[$i]['video_320'];
                            }
                        } else {
                            $TVShow_Video[$i]['video_320'] = "";
                        }
                        // Video_480
                        if (isset($TVShow_Video[$i]['video_480']) && !empty($TVShow_Video[$i]['video_480'])) {
                            if ($TVShow_Video[$i]['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $TVShow_Video[$i]['video_480']);
                                $TVShow_Video[$i]['video_480'] = $path;
                            } else {
                                $TVShow_Video[$i]['video_480'] = $TVShow_Video[$i]['video_480'];
                            }
                        } else {
                            $TVShow_Video[$i]['video_480'] = "";
                        }
                        // Video_720
                        if (isset($TVShow_Video[$i]['video_720']) && !empty($TVShow_Video[$i]['video_720'])) {
                            if ($TVShow_Video[$i]['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $TVShow_Video[$i]['video_720']);
                                $TVShow_Video[$i]['video_720'] = $path;
                            } else {
                                $TVShow_Video[$i]['video_720'] = $TVShow_Video[$i]['video_720'];
                            }
                        } else {
                            $TVShow_Video[$i]['video_720'] = "";
                        }
                        // Video_1080
                        if (isset($TVShow_Video[$i]['video_1080']) && !empty($TVShow_Video[$i]['video_1080'])) {
                            if ($TVShow_Video[$i]['video_upload_type'] == "server_video") {
                                $path = Get_Image($this->folder3, $TVShow_Video[$i]['video_1080']);
                                $TVShow_Video[$i]['video_1080'] = $path;
                            } else {
                                $TVShow_Video[$i]['video_1080'] = $TVShow_Video[$i]['video_1080'];
                            }
                        } else {
                            $TVShow_Video[$i]['video_1080'] = "";
                        }
                        // Subtitle
                        if (isset($TVShow_Video[$i]['subtitle']) && !empty($TVShow_Video[$i]['subtitle'])) {
                            if ($TVShow_Video[$i]['subtitle_type'] == "server_file") {
                                $path = Get_Image($this->folder3, $TVShow_Video[$i]['subtitle']);
                                $TVShow_Video[$i]['subtitle'] = $path;
                            } else {
                                $TVShow_Video[$i]['subtitle'] = $TVShow_Video[$i]['subtitle'];
                            }
                        } else {
                            $TVShow_Video[$i]['subtitle'] = "";
                        }

                        $TVShow_Video[$i]['stop_time'] = GetStopTimeByUser($user_id, $TVShow_Video[$i]['id'], $TVShow_Video[$i]['type_id'], $TVShow_Video[$i]['video_type']);
                        $TVShow_Video[$i]['is_downloaded'] = Is_DownloadByUser($user_id, $TVShow_Video[$i]['id'], $TVShow_Video[$i]['type_id'], $TVShow_Video[$i]['video_type'], $Show_Data['id']);
                        $TVShow_Video[$i]['is_bookmark'] = 0;
                        $TVShow_Video[$i]['rent_buy'] = 0;
                        $TVShow_Video[$i]['is_rent'] = 0;
                        $TVShow_Video[$i]['rent_price'] = 0;
                        $TVShow_Video[$i]['is_buy'] = IsBuyByUser($user_id);
                        $TVShow_Video[$i]['category_name'] = "";

                        $data['result'] = $TVShow_Video;
                    }
                } else {
                    $data['result'] = [];
                }
            } else {
                $data['result'] = [];
            }
            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_package()
    {
        try {

           

           

            $data['status'] = 200;
            $data['message'] = __('api_msg.get_record_successfully');
           

            $Package_Data = Package::select('id', 'name', 'price', 'location',  'description')->get();
 $data['result'] = $Package_Data;
           
            return $data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function get_payment_token(Request $request)
    {
        try {
            $validation = Validator::make(
                $request->all(),
                [
                    'MID' => 'required',
                    'order_id' => 'required',
                    'CHANNEL_ID' => 'required',
                    'CUST_ID' => 'required',
                    'TXN_AMOUNT' => 'required',
                    'WEBSITE' => 'required',
                    'CALLBACK_URL' => 'required',
                    'INDUSTRY_TYPE_ID' => 'required',
                ]
            );
            if ($validation->fails()) {

                $data['status'] = 400;
                $data['message'] = __('api_msg.please_enter_required_fields');
                return $data;
            }

            $data['MID'] = $request->MID;
            $data['order_id'] = $request->order_id;
            $data['CHANNEL_ID'] = $request->CHANNEL_ID;
            $data['CUST_ID'] = $request->CUST_ID;
            $data['TXN_AMOUNT'] = $request->TXN_AMOUNT;
            $data['WEBSITE'] = $request->WEBSITE;
            $data['CALLBACK_URL'] = $request->CALLBACK_URL;
            $data['INDUSTRY_TYPE_ID'] = $request->INDUSTRY_TYPE_ID;

            $ChackSum = Paytm($data);
            $array['paytmChecksum'] = $ChackSum;
            $array['verifySignature'] = true;

            $final_data['status'] = 200;
            $final_data['message'] = "Success";
            $final_data['result'] = $array;
            return $final_data;
        } catch (Exception $e) {
            return response()->json(array('status' => 400, 'errors' => $e->getMessage()));
        }
    }
}
