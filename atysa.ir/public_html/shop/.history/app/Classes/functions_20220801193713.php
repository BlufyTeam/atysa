<?php
namespace App\Classes;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Morilog\Jalali\CalendarUtils;

class functions
{
    protected $ApiKey = '9b4a9c1754112d1083b49c17';
    protected $SecretKey = 'thisismyapikey';
    public function returnFullMonthFromDateType($string){
        $month = '';
        switch ($string) {
            case 'فرو':
                $month =  "فروردین";
                break;
            case 'ارد':
                $month =  "اردیبهشت";
                break;
            case 'خرد':
                $month =  "خرداد";
                break;
            case 'خرد':
                $month =  "خرداد";
                break;
            case 'تیر':
                $month =  "تیر";
                break;
            case 'مرد':
                $month =  "مرداد";
                break;
            case 'شهر':
                $month =  "شهریور";
                break;
            case 'مهر':
                $month =  "مهر";
                break;
            case 'آبا':
                $month =  "آبان";
                break;
            case 'آذر':
                $month =  "آذر";
                break;
            case 'دی':
                $month =  "دی";
                break;
            case 'بهم':
                $month =  "بهمن";
                break;
            case 'اسف':
                $month =  "اسفند";
                break;
                
        }
        return $month;
    }
    public function __construct()
    {
        $this->APIKey = 'thisismyapikey';
        $this->SecretKey = 'thisismyapikey';
    }
    public $APIURL = "https://ws.sms.ir/";
    public function csvToArray($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
    public function uploadImageWithoutEdit($file,$destination){
        
        $fileNameHash = $file->hashName();
        $date = date("h_i_sa");
        $format = strtolower(strrchr($fileNameHash, '.'));
        $info = pathinfo($fileNameHash);
        $file_name = basename($fileNameHash, '.' . $info['extension']);
        $fileName = "$file_name" . "_" . "$date" . "$format";
        if (!file_exists(public_path($destination))) {
            mkdir(public_path($destination), 666, true);
        }
        Image::make($file)->save(public_path($destination) . '/' . $fileName);
        return $fileName;
    }
    public function uploadRegularImage($file, $destination, $prvImage= null){
        $image = $prvImage;
        if (strlen($image)) {
            $image_path = public_path($destination) . '/' . $image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $fileNameHash = $file->hashName();
        $file = $this->rotateImage($file);
        $date = date("h_i_sa");
        $format = strtolower(strrchr($fileNameHash, '.'));
        $info = pathinfo($fileNameHash);
        $file_name = basename($fileNameHash, '.' . $info['extension']);
        $fileName = "$file_name" . "_" . "$date" . "$format";
        if (!file_exists(public_path($destination))) {
            mkdir(public_path($destination), 666, true);
        }
        Image::make($file)->save(public_path($destination) . '/' . $fileName, 40);


        return $fileName;
    }
    public function uploadImage($file, $destination, $prvImage=null) {

        $image = $prvImage;
        if (strlen($image)) {
            $image_path = public_path($destination) . '/' . $image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

       // $file = $request->file($inputFileName);
        $fileNameHash = $file->hashName();
        // $file = $this->rotateImage($file);
        $date = date("h_i_sa");
        $format = strtolower(strrchr($fileNameHash, '.'));
        $info = pathinfo($fileNameHash);
        $file_name = basename($fileNameHash, '.' . $info['extension']);
        $fileName = "$file_name" . "_" . "$date" . "$format";
        if (!file_exists(public_path($destination))) {
            mkdir(public_path($destination), 666, true);
        }
        Image::make($file)->resize(500, 500)
            ->save(public_path($destination) . '/' . $fileName, 40);


        return $fileName;
    }
    public function rotateImage($file){
        if ($file) {
            $exif = @exif_read_data($file);

            if (!empty($exif['Orientation'])) {
                $image = imagecreatefromjpeg($file);
                switch ($exif['Orientation']) {
                    case 8:
                        $file = imagerotate($image, 90, 0);
                        return $file;
                        break;
                    case 3:
                        $file = imagerotate($image, 180, 0);
                        return $file;
                        break;
                    case 6:
                        $file = imagerotate($image, -90, 0);
                        return $file;
                        break;
                    default:
                        return $file;
                        break;
                }
            } else {
                return $file;
            }

        } else {
            return $file;
        }
    }
    protected function getApiTokenUrl()
    {
        return "api/Token";
    }
    protected function getAPIVerificationCodeUrl() 
    {
        return "api/VerificationCode";
    }
    protected function getFastSendUrl() 
    {
        return "api/UltraFastSend";
    }
    public function _getToken()
    {
        $postData = array(
            'UserApiKey' => '9b4a9c1754112d1083b49c17',
            'SecretKey' => 'thisismyapikey',
            'System' => 'php_rest_v_2_0'
        );
        $postString = json_encode($postData);

        $ch = curl_init($this->APIURL.$this->getApiTokenUrl());
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        $resp = false;
        $IsSuccessful = '';
        $TokenKey = '';
        if (is_object($response)) {
            $IsSuccessful = $response->IsSuccessful;
            if ($IsSuccessful == true) {
                $TokenKey = $response->TokenKey;
                $resp = $TokenKey;
            } else {
                $resp = false;
            }
        }
        return $resp;
    }
    private function _execute($postData, $url, $token)
    {
        $postString = json_encode($postData);

        $ch = curl_init($url);

        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-sms-ir-secure-token: '.$token
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function welcomeMessage($MobileNumber,$name){
        $token = $this->_getToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $postData = array(
                'TemplateId' => '57309',
                'Mobile' => $MobileNumber,
                'ParameterArray' => [
                    [
                        'Parameter' => 'username',
                        'ParameterValue' => $name,
                    ]
                ]
            );
            $url = $this->APIURL.$this->getFastSendUrl();
            $VerificationCode = $this->_execute($postData, $url, $token);
            $object = json_decode($VerificationCode);
            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }
    public function verificationCode($Code, $MobileNumber) 
    {
        $token = $this->_getToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $postData = array(
                'Code' => $Code,
                'MobileNumber' => $MobileNumber,
            );

            $url = $this->APIURL.$this->getAPIVerificationCodeUrl();
            $VerificationCode = $this->_execute($postData, $url, $token);
            $object = json_decode($VerificationCode);

            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }
    public function emroozhaftechandomemahe($d){
        $currentMonthNumber = \Morilog\Jalali\Jalalian::fromCarbon(Carbon::now())->format('m');
        $currentYearNumber = \Morilog\Jalali\Jalalian::fromCarbon(Carbon::now())->format('Y');
        $startOfMonth = CalendarUtils::toGregorian($currentYearNumber,$currentMonthNumber,1 );
        $day = Carbon::parse($startOfMonth[0].'-'.$startOfMonth[1].'-'.$startOfMonth[2])->format('D');
        $outPut = 0;
        switch($day){
            case 'Sat' : 
                if($d <= 7){
                    $outPut = 0;
                }else if($d > 7 && $d <= 14){
                    $outPut = 1;
                }else if($d > 14 && $d <= 21){
                    $outPut = 2;
                }else if($d > 21 && $d <= 28){
                    $outPut = 3;
                }else if($d > 28){
                    $outPut = 4;
                }
                break;
            case 'Sun' : 
                if($d <= 6){
                    $outPut = 0;
                }else if($d > 6 && $d <= 13){
                    $outPut = 1;
                }else if($d > 13 && $d <= 20){
                    $outPut = 2;
                }else if($d > 20 && $d <= 27){
                    $outPut = 3;
                }else if($d > 27){
                    $outPut = 4;
                }
                break;
            case 'Mon' : 
                if($d <= 5){
                    $outPut = 0;
                }else if($d > 5 && $d <= 12){
                    $outPut = 1;
                }else if($d > 12 && $d <= 19){
                    $outPut = 2;
                }else if($d > 19 && $d <= 26){
                    $outPut = 3;
                }else if($d > 26){
                    $outPut = 4;
                }
                break;
            case 'Tue' : 
                if($d <= 4){
                    $outPut = 0;
                }else if($d > 4 && $d <= 11){
                    $outPut = 1;
                }else if($d > 11 && $d <= 18){
                    $outPut = 2;
                }else if($d > 18 && $d <= 25){
                    $outPut = 3;
                }else if($d > 25){
                    $outPut = 4;
                }
                break;
            case 'Wed' : 
                if($d <= 3){
                    $outPut = 0;
                }else if($d > 3 && $d <= 10){
                    $outPut = 1;
                }else if($d > 10 && $d <= 17){
                    $outPut = 2;
                }else if($d > 17 && $d <= 24){
                    $outPut = 3;
                }else if($d > 24){
                    $outPut = 4;
                }
                break;
            case 'Thu' : 
                if($d <= 2){
                    $outPut = 0;
                }else if($d > 2 && $d <= 9){
                    $outPut = 1;
                }else if($d > 9 && $d <= 16){
                    $outPut = 2;
                }else if($d > 16 && $d <= 23){
                    $outPut = 3;
                }else if($d > 23){
                    $outPut = 4;
                }
                break;
            case 'Fri' : 
                if($d <= 1){
                    $outPut = 0;
                }else if($d > 1 && $d <= 8){
                    $outPut = 1;
                }else if($d > 8 && $d <= 15){
                    $outPut = 2;
                }else if($d > 15 && $d <= 22){
                    $outPut = 3;
                }else if($d > 22){
                    $outPut = 4;
                }
                break;

        }
        return $outPut;
    }
    public function removeElementWithValue($array, $key, $value){
        foreach($array as $subKey => $subArray){
             if($subArray[$key] == $value){
                // array_splice($array,$subKey,1 );
                  unset($array[$subKey]);
             }
        }
        return array_values($array);
   }
}