<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Mobile;
use App\Models\users;
use App\Models\cars;
use App\Models\BookingRequest;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    
    use AuthorizesRequests, ValidatesRequests;
    
    
    function send_otp(Request $req){
        
        $data=users::where('number',$req->number)->first();
        
        if(!$data){
 
            $otp_6 = random_int(100000, 999999); 
            $ins= new users();
            $ins->number=$req->number;
            $ins->otp=$otp_6;
            $ins->save();
            
            $senderId = "BITIFO";

            $message = urlencode($otp_6 ." is your OTP to login. Best Marketing Platform From MyPostzone. qwertyuiop");
            
            $route = "default";
            
            $api = "userid=Safar&password=safar1&mobile=" . $req->number . "&msg=" . $otp_6 ." is your OTP to login. Best Marketing Platform From MyPostzone. qwertyuiop&senderid=".$senderId."&msgType=text&dltEntityId=1201160697951304064&dltTemplateId=1207162002431363615&duplicatecheck=true&output=json&sendMethod=quick";
            
             
            $curl = curl_init();  
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://smsnotify.one/SMSApi/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $api,
              CURLOPT_HTTPHEADER => array(
                "apikey: somerandomuniquekey",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
              ),
            ));
             
            $response = curl_exec($curl); 
            $err = curl_error($curl); 
            if ($err) {
                curl_close($curl);
                $data = array("status" => "0", "data" => array("msg" => "OTP not Send try again"));
            } else {
                curl_close($curl);
                $data = array("status" => "1", "data" => array("msg" => "OTP Send successfully"));
            }
            
        }else{
            $otp_6 = random_int(100000, 999999); 
            $ins = $data;
            $ins->otp=$otp_6;
            
             $senderId = "BITIFO";

            $message = urlencode($otp_6 ." is your OTP to login. Best Marketing Platform From MyPostzone. qwertyuiopoi");
            
            $route = "default";
            
            $api = "userid=Safar&password=safar1&mobile=" . $req->number . "&msg=" . $otp_6 ." is your OTP to login. Best Marketing Platform From MyPostzone. qwertyuiop&senderid=".$senderId."&msgType=text&dltEntityId=1201160697951304064&dltTemplateId=1207162002431363615&duplicatecheck=true&output=json&sendMethod=quick";
            
             
            $curl = curl_init();  
            
           
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://smsnotify.one/SMSApi/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $api,
              CURLOPT_HTTPHEADER => array(
                "apikey: somerandomuniquekey",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
              ),
            ));
        
             
            $response = curl_exec($curl); 
                    
            $err = curl_error($curl); 
                  
            if ($err) {
                curl_close($curl);
                $data = array("status" => "0", "data" => array("msg" => "OTP not Send try again"));
            } else {
                curl_close($curl);
                $data = array("status" => "1", "data" => array("msg" => "OTP Send successfullys"));
                $ins->save();
            }
            
        
        }      
    
        return $data;
        
    }
    
    function verify_otp(Request $req){
        
        $data=users::where('number',$req->number)->where('otp',$req->otp)->first();
        
        if($data){
 
            return response()->json([  "status"=> true,
                                    "message"=> "Otp Verification Success.",
                                    "id"=> $data["id"],
                                    "number"=> $data["number"],
                                ]); 
            
        }else{
          
            return response()->json([  "status"=> false,
                                    "message"=> "Otp Verification Failed.",
                                     
                                ]); 
        
        }      
        
    }
    
    
    function user_details(Request $req){
        
        $data=users::where('id',$req->id)->first();
        
        if($data){
 
            return response()->json([  "status"=> true,
                                    "message"=> "get details Success.",
                                    "data" => $data,
                                ]); 
            
        }else{
          
            return response()->json([  "status"=> false,
                                    "message"=> "Otp Verification Failed.",
                                     
                                ]); 
        
        }      
        
    }
    
    function update_profile(Request $req){
          
        $data=users::where('number',$req->number)->first();
        
        if(!$data){
            
              return response()->json([  "status"=> false,
                                    "message"=> "User Not Found",
                ]); 
            
        }else{
            
            
            
            
            if ($req->file("image") && $req->file('image')->isValid()) {     
                $image = $req->file("image");
                $extension = $image->getClientOriginalExtension();
        
                $filaname = Str::uuid() . '.' . $extension;
                $image->move('uploads/clients/',$filaname);
                $item_url = 'uploads/clients/' . $filaname;
            }
                 
                 
            $ins = $data;
            $ins->image= $item_url;
            $ins->email= $req->email;
            $ins->state= $req->state;
            $ins->name= $req->name;
            $ins->city= $req->city;
            $ins->save();
              
              return response()->json([  "status"=> true,
                                    "message"=> "User Profile Updated SuccessFully.",
                                    "data" => $ins,
                ]);   
        
        }      
    
        return $data;
    }
    
    
    function car_type_km(Request $req){
        $ins = cars::leftJoin('cartypes', 'cartypes.id', '=', 'cars.type_id')->get()->all();
        
        
         return response()->json([  "status"=> true,
                                    "message"=> "Car Details get SuccessFully.",
                                    "data" => $ins,
                ]);  
    }    
    
    function send_booking(Request $req){
        
    
            $ins = new BookingRequest();
            $ins->number= $req->number;
            $ins->isoneway = $req->isround;
            $ins->user_id= $req->user_id;
            $ins->car_type= $req->car_type;
            $ins->car_km= $req->car_km;
            $ins->car_basefare= $req->car_basefare;
            $ins->distance= $req->distance;
            $ins->total_fare= $req->total_fare;
            $ins->pickup_address= $req->pickup_address;
            $ins->drop_address= $req->drop_address;
            $ins->pickup_date= $req->pickup_date;
            $ins->pickup_time= $req->pickup_time;
            $ins->save();
            
            
        if($ins){        
            return response()->json([  "status"=> true,
                                    "message"=> "Booking Rquest Send SuccessFully.",
                                    "book_data" => $ins,
                ]);  
        }else{
             return response()->json([  "status"=> false,
                                    "message"=> "Booking Rquest Failed",
                                  
                ]);  
        }
    }
    
    
    function bookinghistory(Request $req){
        
        $history = BookingRequest::leftJoin('cars', 'cars.id', '=', 'booking_request.car_type')->where("booking_request.user_id",$req->id)->get()->all();
        
        if($history){        
            return response()->json([  "status"=> true,
                                    "message"=> "Booking History Get SuccessFully.",
                                    "book_history" => $history,
                ]);  
        }else{
             return response()->json([  "status"=> false,
                                    "message"=> "Booking History Get Failed.",
                                  
                ]);  
        }
    }
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
