<!-- <?php
function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
 function getBillers(){
  $data_array =  array("client_id"=>"2");

 $make_call = callAPI('POST', 'http://197.232.25.77:8080/spotcash_app_switch-1.0.2/spotcash/getBillers', json_encode($data_array));
 $response = json_decode($make_call, true);
 return $response[entity][billers];
 }
 // $result= getBillers();
 // $count =1;
 // $prompt = "Please Select Your Bill \n";
 // $items =array();
 // foreach ($result as $item) {
 //   $items[] =$item;
 //   $prompt .= $count . ". " . $item[billername] . " " . $item[billerid] . "\n";
 //   $count++;
 // }
 // echo $prompt;


 function getPaymentCode(){
 $data_array =  array("client_id"=>"2");
 $make_call = callAPI('POST', 'http://197.232.25.77:8080/spotcash_app_switch-1.0.2/spotcash/getPaymentItem?billerId=16474', json_encode($data_array));
 $response = json_decode($make_call, true);
 return $response[entity][paymentitems];
 }

 // $result = getPaymentCode();
 // $items =array();
 // foreach ($result as $item) {
 //   $items[] =$item;
 //   $prompt .= $item[paymentCode];
 // }
 // echo $prompt;


//  function sendPaymentAdvise(){
// $data_array =  array(  
//                       "paymentCode"=>"0516474266720",
//                       "customerEmail"=>"mogaka.poly@gmail.com",
//                       "customerMobile"=>"254710632360",
//                       "customerId"=>"123456789",
//                       "requestReference": "f234BBE7W3faJQ0a4ODPuaG",
//                       "amount"=>"1000"
//                     );
//  $make_call = callAPI('POST', 'http://197.232.25.77:8080/spotcash_app_switch-1.0.2/spotcash/sendPaymentAdvise', json_encode($data_array));
//  $response = json_decode($make_call, true);
//  return $response[entity][responseMessage];
//  }
 //  $result = sendPaymentAdvise();
 //  $items =array();
 // foreach ($result as $item) {
 //   $items[] =$item;
 //   $prompt .= $item[responseMessage];
 // }
 // echo $prompt;


 function getZreport(){
  $data_array = array(
                    "endTime"=>"23:00:00",
                    "startTime"=>"00:00:00",
                    "clientId"=>"54",
                    "startDate"=>"2019-09-28",
                    "endDate"=>"2019-11-13",
                    "agentPhoneNo"=>"254718918343"
  );
  $make_call = callAPI('POST', 'http://localhost:8083/spotcash_agency_switch_war/spotcash/transactions', json_encode($data_array));
 $response = json_decode($make_call, true);
 return $response[transactions][Transactions];
 }
 $result = getZreport();
 // var_dump($result);

 $count =1;
 $prompt = "Please Select Your Bill \n";
 $items =array();
 foreach ($result as $item) {
   $items[] =$item;
   
   $prompt .= $count . "." . $item[transactionID] . " " . $item[postingDate] . " ". $item[postingTime] . " ". $item[customerNo] . " ". $item[customerName] . " 
   ". $item[customerPhoneNo] . " " . $item[amount] . " " . $item[amount]."\n";
   $count++;
 }
 echo $prompt;
 -->