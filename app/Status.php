<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Status extends Model

{
    public static function getHttpStatusMessage($statusCode){

        $httpStatus = array(

            100 => 'Continue',

            101 => 'Switching Protocols',

            200 => 'Success',

            201 => 'Created',

            202 => 'Accepted',

            203 => 'Non-Authoritative Information',

            204 => 'No Content',

            205 => 'Reset Content',

            206 => 'Partial Content',

            300 => 'Multiple Choices',

            301 => 'Moved Permanently',

            302 => 'Found',

            303 => 'See Other',

            304 => 'Not Modified',

            305 => 'Use Proxy',

            306 => '(Unused)',

            307 => 'Temporary Redirect',

            400 => 'Bad Request',

            401 => 'Unauthorized',

            402 => 'Payment Required',

            403 => 'Forbidden',

            404 => 'Not Found',

            405 => 'Method Not Allowed',

            406 => 'Not Acceptable',

            407 => 'Proxy Authentication Required',

            408 => 'Request Timeout',

            409 => 'Conflict',

            410 => 'Gone',

            411 => 'Length Required',

            412 => 'Precondition Failed',

            413 => 'Request Entity Too Large',

            414 => 'Request-URI Too Long',

            415 => 'Unsupported Media Type',

            416 => 'Requested Range Not Satisfiable',

            417 => 'Expectation Failed',

            500 => 'Internal Server Error',

            501 => 'Not Implemented',

            502 => 'Bad Gateway',

            503 => 'Service Unavailable',

            504 => 'Gateway Timeout',

            505 => 'HTTP Version Not Supported',

            4000 => 'Invalid API Key',

            4001 => 'Missing Paramater',

            4002 => 'Missing API Key',

            4003 => 'Unable To Reach Service',

            4004 => 'Empty Array',

            4005 => 'Invalid Paramater',

            4006 => 'Invalid Credentials',

            4007 => 'Duplicate Entry',

            4008=>'This Session is aready Booked Before',

            4009=>'there is no enough balance',

            4010=>'Invalid Promo Code',

            4011=>'there is no slots',

            4012=>'falied',

            4013=>'Invalid invitation Code',

            4014=>'Invalid Register Promo Code',

            4015=>'Register not active',

            4016=>'email is duplicated',

            4017=>'Invalid Invitation code',

            4018=>'Invitation is Invalid and email is duplicated',

            4019=>'password less than 6 caharcter',

            4020=>'phone is taken',

            4021=>'name is required',

            4022=>'register promo code is required',

            4023=>'falied to update the Expiry date of valid plan',

            4024=>'falied to revoked expiry Plan of User',

            4025=>'this session is cancelled',

            2026=>'this verfication code is scaned before',

            2027=>'this Session not matched with this verfication Code ',

            4028=>'this session is not attached to you' ,

            4029=>'cannot cancel session because you attended it',

            4030=>'this mail doesnot exist',

            4031=>'this tkoen is expired',

	        5000=>'this is Register Promo code doesnot exist',

            5001=>'this session not exist',

            5002=>'Validator Failed',

            5003=>'this not your book',

            5004=>'aready exist',

            5005=>'this facebook account already used',

            5006=>'this facebook account is not register',

            5007=>'this zone isnnot covered',

            5008=> 'dropoff time Already taken by another user ',

            5009=> 'pickup time Already taken by another user ',

            5010=> 'this promocode expired ',

            5011=>'this promocode excced limit of usage',

            5012=>'verification email not sent',

            5013=>'passwords do not match',

            5014=>'we are out of stock',

            5015=>'we dont have enough from this item',

            );



        return ($httpStatus[$statusCode]) ? $httpStatus[$statusCode] : $status[500];

    }



     public static function printValidator($message)

     {

            $status["status"] = array('code' => 5002 , 'message' => $message);

            return $status;

     }



    public static function printStatus($code)

     {

            $status["status"] = array('code' => $code , 'message' => Status::getHttpStatusMessage($code));

            return $status;

     }



     public static function mergeStatus($arr,$code)

     {



     	 $status["status"] = array('code' => $code , 'message' => Status::getHttpStatusMessage($code));

     	 $arr = array_merge($status,$arr);



         return $arr;

     }

}
