<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\FixedTitle;
use App\HomeSlide;
use App\TeamMember;
use App\Brand;
use App\Testimonial;
use App\Service;
use App\ServiceIcon;
use App\ContactMessage;
use App\ContactSetting;
use Mail;
class GeneralController extends Controller
{
    public static function getTitle($slug,$field){
        $fixedTitle=FixedTitle::select('*')->where('slug','=',$slug)->first();
        return $fixedTitle[$field];
    }

    public static function getGeneral($slug,$field){
        $fixedTitle=General::select('*')->where('slug','=',$slug)->first();
        return $fixedTitle[$field];
    }

    public function homePage(){
        $homeSlides = HomeSlide::select('*')->orderby('pos','ASC')->get();
        $teamMembers = TeamMember::select('*')->orderby('pos','ASC')->get();
        $brands = Brand::select('*')->orderby('pos','ASC')->get();
        $testimonials = Testimonial::select('*')->orderby('pos','ASC')->get();
        $services = Service::select('*')->orderby('pos','ASC')->get();
        return view('home')->with(compact('homeSlides','teamMembers','brands','testimonials','services'));
    }

    public static function getServiceIcon($id){
        $services = ServiceIcon::select('*')->where('link_service','=',$id)->orderby('pos','ASC')->get();
        return $services;
    }
    
    
    public function storeMessage(Request $request) {
         $request->validate([
            'email' => 'required|email',
            'fname'=>'required|max:254',
            'lname'=>'required|max:254',
            'phone'=>'required|max:254',
            'subject'=>'required|max:254',
            'message'=>'required|max:254',
            'country'=>'required|max:254',
            'g-recaptcha-response' => 'required',
        ]);
        
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode('6Ledl3IcAAAAAHczugnCrnJfla-sRjl9fMgkbTha') .  '&response=' . urlencode($request['g-recaptcha-response']);
        $response = json_decode(file_get_contents($url), true);
        if (!$response['success']) abort(403, 'bot');
        
        $sendto =ContactSetting::first()->email;
        
        $msg=  new ContactMessage;
        $msg->first_name = $request->fname;
        $msg->last_name = $request->lname;
        $msg->phone_number = $request->phone;
        $msg->country =$request->country;
        $msg->subject = $request->subject;
        $msg->email = $request->email;
        $msg->contact_message = $request->message;
        $msg->save();
        
        Mail::send('contactemail', [
            'email' => $request->email,
            'firstname' =>  $request->fname,
            'lastname' =>  $request->lname,
            'phone'=>   $request->country." ". $request->phone,
            'subject'=>  $request->subject,
            'contact_message' => $request->message
        ], function ($message) use ($sendto){
            $message->to($sendto)->subject('Contact-Form');
        });

        
          return response()->json(array('msg' => "Message Sent"), 200);
    }
    
    
    
    
    
}
