<?php

namespace App\Http\Controllers;

use Aman\EmailVerifier\EmailChecker;
use Illuminate\Http\Request;
use APP;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;
use App\Imports\AudienceImport;
use Excel;

class emailController extends Controller{

  public $data;
  public $sender_email;

    public function __construct()
    {
      $this->data = [];
      $this->sender_email = "exmarketplace1999@gmail.com";
    }

    public function index(){

    	return view('email_start');

    }

    public function campaigns(){

        $this->campaigns_query = DB::select("SELECT 
                                        c.campaign_id,
                                        c.campaign,
                                        d.design,
                                        c.segment,
                                        c.dateTime
                                        FROM campaigns AS c
                                        INNER JOIN designs AS d ON c.design_id = d.design_id");
        //echo "<pre>";
        //print_r($campaigns_query);
        //die();

        return view('campaigns', [ 
            'campaigns_all' => $this->campaigns_query
        ]);

    }

    public function campaigns_create(){

        $this->campaigns_designs = DB::select("SELECT DISTINCT
                                        design
                                        FROM designs");

        $this->campaigns_segments = DB::select("SELECT DISTINCT
                                        segment
                                        FROM audiences");

        return view('campaigns_create', [
            'designs' => $this->campaigns_designs, 'segments' => $this->campaigns_segments]);

    }

    public function campaigns_submit(Request $request){

        $campaign = $request->input('campaign');
        $design = $request->input('design.0');
        $segment = $request->input('segment.0');
        $dateTime = $request->input('dateTime');

        $this->campaigns_designs = DB::select("SELECT 
                                        design_id
                                        FROM designs
                                        WHERE design = '".$design."'");

        //print_r($this->campaigns_designs[0]);
        //die();

        $array_convert = json_decode(json_encode($this->campaigns_designs), true);
        //print_r($array_convert);
        //echo $array_convert[0]['design_id'];
        //die();

        DB::insert("INSERT INTO campaigns (campaign, design_id, design, segment, dateTime) VALUES (?,?,?,?,?)", [$campaign, $array_convert[0]['design_id'], $design, $segment, $dateTime]);

        $this->campaigns_query = DB::select("SELECT 
                                        c.campaign_id,
                                        c.campaign,
                                        d.design,
                                        c.segment,
                                        c.dateTime
                                        FROM campaigns AS c
                                        INNER JOIN designs AS d ON c.design_id = d.design_id");

        return view('campaigns', [ 
            'campaigns_all' => $this->campaigns_query
        ]);

    }

    public function audience(){

        $this->audience_query = DB::select("SELECT 
                                        id,
                                        first_name,
                                        last_name,
                                        email_address,
                                        segment,
                                        status
                                        FROM audiences");
        //echo "<pre>";
        //print_r($campaigns_query);
        //die();

        //foreach($this->audience_query as $records )
          //echo $records->user_id;

        return view('audience', [ 
            'audience_all' => $this->audience_query
        ]);


    }

    public function audience_add(){

        $this->audience_segment = DB::select("SELECT DISTINCT
                                        segment
                                        FROM audiences");

        return view('audience_add', [
            'segments' => $this->audience_segment]);

    }

    public function audience_add_submit(Request $request){

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email_address = $request->input('email_address');
        $segment = $request->input('segment');
        $status = $request->input('status');

        DB::insert("INSERT INTO audiences (first_name, last_name, email_address, segment, status) VALUES (?,?,?,?,?)", [$first_name, $last_name, $email_address, $segment, $status]);

        $this->audience_query = DB::select("SELECT 
                                        id,
                                        first_name,
                                        last_name,
                                        email_address,
                                        segment,
                                        status
                                        FROM audiences");

        return view('audience', [ 
            'audience_all' => $this->audience_query
        ]);

    }

    public function audience_import(){

        return view('audience_import');

    }

    public function audience_import_submit(Request $request){

        Excel::import(new AudienceImport, $request->file);

        return redirect('audience');

    }

    public function audience_delete($id, $first_name){

        return view('audience_delete', [
          'id' => $id, 'first_name' => $first_name
        ]);

    }

    public function audience_delete_submit($id){

        DB::delete("DELETE FROM audiences
          WHERE id = ?", [$id]);

        $this->audience_query = DB::select("SELECT 
                                        id,
                                        first_name,
                                        last_name,
                                        email_address,
                                        segment,
                                        status
                                        FROM audiences");

        return view('audience', [ 
            'audience_all' => $this->audience_query
        ]);

    }

    public function designs(){

        $this->designs_query = DB::select("SELECT 
                                        design_id,
                                        design,
                                        body
                                        FROM designs");

        return view('designs', [
            'designs_all' => $this->designs_query]);

    }

    public function designs_create(){

        return view('designs_create');

    }

    public function designs_submit(Request $request){

        $design = $request->input('design');
        $body = $request->input('body');

        //echo $body;
        //die();

        DB::insert("INSERT INTO designs (design, body) VALUES (?,?)", [$design, $body]);

        $this->designs_query = DB::select("SELECT 
                                        design_id,
                                        design,
                                        body
                                        FROM designs");

        return view('designs', [
            'designs_all' => $this->designs_query]);

    }

    public function send_email(){

        return view('send_email');

    }

    public function send_email_submit()
     {
     
         //require 'vendor/autoload.php';
         $mytime = Carbon::now('PST')->format('Y-m-d H:i:s');
         //echo $mytime;
         //die();

         /*
         Mailbox::from('exmarketplace1999@gmail.com', function (InboundEmail $email, $username) {
            // Access email attributes and content
            $subject = $email->subject();

            //$email->reply(new ReplyMailable);
        });
        */
 
         $emailquery = DB::select("SELECT a.id, a.first_name, a.last_name, a.email_address, c.campaign, c.campaign_id, d.body
                                   FROM audiences AS a
                                   INNER JOIN campaigns AS c ON a.segment = c.segment
                                   INNER JOIN designs AS d ON c.design_id = d.design_id
                                   WHERE a.status = 'approved'"); //fetches all emails
         // echo "<pre>";
         // print_r($emailquery);
         // die();

         $reportcheck = json_decode(json_encode(DB::select("SELECT email_address, campaign_id, status FROM email_report")), true); //array of arrays

         $emailcheck = array_column($reportcheck, 'email_address'); //1D array of email_address

         set_time_limit(0);

         //$array_notsend = [];
         //$array_send = [];
         
         //$emailcheck =  DB::select("SELECT email_address FROM email_report"); //to fetch email avoid sending same emails

         //$reportcheck = json_decode(json_encode(DB::select("SELECT email_address, campaign_id FROM email_report")), true); //this gives array of arrays (2D)


         //$emailcheck = array_map('current', $reportcheck); //array of emails
        
         //process to send emails 
         
         for ($i=0 ; $i<count($emailquery) ; $i++) {

            $array_convert = json_decode(json_encode($emailquery[$i]), true);
            $this->data = $array_convert;

            if(in_array($array_convert['email_address'], $emailcheck)) //to check if we are sending same campaign to same user
            {
                 foreach ($reportcheck as $check) {
                    if(
                        (
                            ($array_convert['email_address'] == $check['email_address']) 
                            && 
                            ($array_convert['campaign_id'] == $check['campaign_id'])
                        )
                        ||
                        (
                            ($array_convert['email_address'] == $check['email_address']) 
                            && 
                             ($check['status'] == 'fail')
                        )
                        
                      ){

                        // array_push($array_notsend, $array_convert['email_address'], $array_convert['campaign_id']);

                        continue 2;//skips to next element
                    } //endof if
                 } //endof foreach
              
            } //endof if


            //echo $this->data['email_address'];
            //echo $this->data['campaign_id'];


            //array_push($array_send, $array_convert['email_address'], $array_convert['campaign_id']);

            $var1 = app(EmailChecker::class)->checkEmail($this->data['email_address'],'boolean');

            //echo $this->data['email_address'];
            //echo $this->data['campaign_id'];

            //die();
            

            Mail::to($this->data['email_address'])->send(new SendMail($this->data));
            //$sendmail = Mail::to($this->data['email'])->send(new SendMail($this->data));
            

            if ($var1['success']){
                DB::insert("INSERT INTO email_report (id, first_name, email_address, segment, campaign_id, campaign, status, issue, dateTime)
                            SELECT a.id, a.first_name, a.email_address, a.segment, c.campaign_id, c.campaign, 'success', 'no issues',"
                            ."'".$mytime."'".
                            " FROM audiences AS a
                            INNER JOIN campaigns AS c ON a.segment = c.segment
                            WHERE a.id = ".$this->data['id']." AND c.campaign_id = ".$this->data['campaign_id']);
            }

            else{
                DB::insert("INSERT INTO email_report (id, first_name, email_address, segment, campaign_id, campaign, status, issue, dateTime)
                            SELECT a.id, a.first_name, a.email_address, a.segment, c.campaign_id, c.campaign, 'fail',"
                            ."'".$var1['error']."', "
                            ."'".$mytime."'".
                            "FROM audiences AS a
                            INNER JOIN campaigns AS c ON a.segment = c.segment
                            WHERE a.id = ".$this->data['id']." AND c.campaign_id = ".$this->data['campaign_id']);
            } 

            
      } //endof for 

      /*echo "<pre>";
      echo "notesend";
      print_r($array_notsend);
      print_r($array_send);
      die();*/
     
         return view('email_start');


     }

        public function email_report(){

        $this->email_report_query = DB::select("SELECT 
                                        number,
                                        id,
                                        first_name,
                                        email_address,
                                        segment,
                                        campaign_id,
                                        campaign,
                                        status,
                                        issue,
                                        dateTime
                                        FROM email_report");

        return view('email_report', [ 
            'email_report_all' => $this->email_report_query
        ]);

    }
   
}
