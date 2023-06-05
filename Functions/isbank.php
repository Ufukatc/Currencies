<?php 
function isBankasi(){
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.isbank.com.tr/_vti_bin/DV.Isbank/FinancialData/FinancialDataService.svc/GetFinancialData?_='.time(),
        CURLOPT_RETURNTRANSFER => true
    ]);
    $output = curl_exec($ch);
    curl_close($ch);


    $output = json_decode($output, true);

    $altin = $output['Data']['Market'][3];
    $eur = $output['Data']['Market'][1];
    $usd = $output['Data']['Market'][0];

    return [
        'DOLAR' => [
            'alis' => $usd['FxRateBuy'],
            'oran' => $usd['FxRateSell']
        ],
        'EURO' => [
            'alis' => $usd['FxRateBuy'],
            'oran' => $usd['FxRateSell']
        ],
        'ALTIN' => [
            'alis' => $usd['FxRateBuy'],
            'oran' => $usd['FxRateSell']
        ]
    ];
}

?>