<?php 

function akbank () {

    $ch = curl_init();  //curl start

    curl_setopt_array($ch,[
        CURLOPT_URL => 'https://www.akbank.com/_vti_bin/AkbankServicesSecure/FrontEndServiceSecure.svc/GetExchangeData?_='.time(),
        CURLOPT_RETURNTRANSFER => true
    ]);

    $output = curl_exec($ch); //curl exe

    curl_close($ch); // curl close 

    $output = json_decode($output, true);
    $results = json_decode($output['GetExchangeDataResult'], true);

    $usd = $results['Currencies'][14];
    $eur = $results['Currencies'][6];
    $altin = $results['Currencies'][15];    


    return [

        'DOLAR' => [
            'oran' => $usd['Rate'],
            'alis' => $usd['Buy'],
            'satis' => $usd['Sell']
        ],

        'EURO' => [
            'oran' => $eur['Rate'],
            'alis' => $eur['Buy'],
            'satis' => $eur['Sell']
        ],
        
        'ALTIN' => [
            'oran' => $altin['Rate'],
            'alis' => $altin['Buy'],
            'satis' => $altin['Sell']
        ]
    ];
}
?>