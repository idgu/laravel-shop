<?php
/**
 * User: idgu
 * Date: 12.01.2018
 * Time: 17:21
 */

namespace App;


class Payu
{
    private $client_id = 309731;
    private $client_secret = '89068f1a01373e0661a7f2b155090f5a';
    private $second_key = '116efd080892a4c79210709097dd7728';
    private $bearer;

    public $header_body_json;
    public $header_body_assoc;

    public $signature_header_assoc;


    public function __construct()
    {
        $this->setBearer();
    }


    
    private function setBearer() {
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->client_id,
            'client_secret'=> $this->client_secret,
        ];

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $bearer = curl_exec($ch);
        curl_close($ch);
        $bearer = json_decode($bearer);
        $this->bearer = $bearer->access_token;
    }


    
    
    public function buyOrderRequest($data)
    {
        $data_string = json_encode($data);
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://secure.snd.payu.com/api/v2_1/orders',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                "Authorization: Bearer $this->bearer",
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_string,
            CURLOPT_RETURNTRANSFER => true,

        ]);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);


        return redirect($response->redirectUri);

    }


    public function catchRequest($request)
    {


        $this->header_body_json = $request->getContent();
        $this->header_body_assoc = json_decode($this->header_body_json);

        //signature
        $signature_header = $request->header('OpenPayu-Signature');

        $sig_header_array = explode(';', $signature_header);
        $count = count($sig_header_array);

        $sig_header_assoc = array();

        for ($i=0; $i<$count; $i++) {
            $nums = explode('=',$sig_header_array[$i]);
            $sig_header_assoc[$nums[0]] = $nums[1];
        }

        $this->signature_header_assoc = $sig_header_assoc;

    }

    public function authorize()
    {
        $incoming_signature = $this->signature_header_assoc['signature'];
        $concatenated = $this->header_body_json . $this->second_key;
        $hash_func = $this->signature_header_assoc['algorithm'];

        $expected_signature = $hash_func($concatenated);


        if($expected_signature == $incoming_signature){
            return true;
        }else{
            return false;
        }

    }



    public function updateSatus() {



        if ($this->header_body_assoc->order->status == 'COMPLETED'){
            file_put_contents('id.txt', $this->header_body_assoc->order->extOrderId);

            $order_id = $this->header_body_assoc->order->extOrderId;
            $order = Order::where('orderId', '=', $order_id)->first();
            $order->status = 'COMPLETED';
            $order->save();
            return true;
        };
    }






}