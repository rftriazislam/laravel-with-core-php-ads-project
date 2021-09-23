<?php

class Upline
{
	protected $dbaccess;
	protected $now;

	function __construct($dbaccess)
	{
		$this->now = date('Y-m-d H:i:s');
		$this->dbaccess = $dbaccess;
	}

	private function levelUpdate($income_percent, $level, $lvl ,$sponsoreId)
	{
		$str = '';
		$nextLevelQ = "SELECT * FROM users WHERE id={$sponsoreId}";
        $nextLevel = $this->dbaccess->getRow($nextLevelQ);

        $refIncomeQ = "SELECT * FROM earnings WHERE userid={$sponsoreId}";
        $refIncome = $this->dbaccess->getRow($refIncomeQ);

        $levelTableQ = "SELECT * FROM levels WHERE userid={$sponsoreId}";
        $levelTable = $this->dbaccess->getRow($levelTableQ);

        $month = date('m');
        $year = date('Y');
        $today = date('Y-m-d');

        $todayTableQ = "SELECT * FROM todays_users WHERE userid={$sponsoreId} AND updated_at LIKE '%{$today}%'";
        $todayTable = $this->dbaccess->getRow($todayTableQ);

        $monthTableQ = "SELECT * FROM months_users WHERE userid={$sponsoreId} AND MONTH(updated_at)=MONTH(CURDATE())";
        $monthTable = $this->dbaccess->getRow($monthTableQ);

		$earningUpdateQ = "UPDATE earnings SET referral_income = ?, updated_at = ? WHERE userid = ?";
    	$this->dbaccess->postData($earningUpdateQ, array(floatval($refIncome['referral_income']) + $income_percent, $this->now, $sponsoreId));

    	$levelUpdateQ = "UPDATE levels SET {$level} = ?, total = ?, updated_at = ? WHERE userid = ?";
    	$this->dbaccess->postData($levelUpdateQ, array($levelTable[$level] + 1, $levelTable['total'] + 1, $this->now, $sponsoreId));

        if ( empty($todayTable) ){
			$todayUserQ = "UPDATE todays_users SET level1 = ?, level2 = ?, level3 = ?, level4 = ?, level5 = ?, level6 = ?, level7 = ?, level8 = ?, level9 = ?, level10 = ?, updated_at = ? WHERE userid = ?";
        	$this->dbaccess->postData( $todayUserQ, $lvl );
        }
    	else{
        	$todayUserQ = "UPDATE todays_users SET {$level}=?, updated_at = ? WHERE userid = ?";
        	$this->dbaccess->postData( $todayUserQ, array( $todayTable[$level] + 1, $this->now, $sponsoreId ) );
        }
		
		if ( empty($monthTable) ){
        	$monthUserQ = "UPDATE months_users SET level1 = ?, level2 = ?, level3 = ?, level4 = ?, level5 = ?, level6 = ?, level7 = ?, level8 = ?, level9 = ?, level10 = ?, updated_at = ? WHERE userid = ?";
        	$this->dbaccess->postData($monthUserQ, $lvl );
        }else{
        	$monthUserQ = "UPDATE months_users SET {$level}=?, updated_at = ? WHERE userid = ?";
        	$this->dbaccess->postData( $monthUserQ, array( $todayTable[$level] + 1, $this->now, $sponsoreId ) );
        }

        return $nextLevel['sponsorid'];
	}

	public function uplineTableUpdate($sponsoreId, $level){

        $level1_percent = number_format(0.388888*(40/100),6);
        $level2_4_percent = number_format(0.388888*(10/100),6);
        $level5_10_percent = number_format(0.388888*(5/100),6);

        if ($level == 1)
			return $this->levelUpdate($level1_percent, 'level1', array(1,0,0,0,0,0,0,0,0,0,$this->now,$sponsoreId),$sponsoreId);
		if( $level == 2 )
        	return $this->levelUpdate($level2_4_percent, 'level2', array(0,1,0,0,0,0,0,0,0,0,$this->now,$sponsoreId), $sponsoreId);
        if( $level == 3 )
        	return $this->levelUpdate($level2_4_percent, 'level3', array(0,0,1,0,0,0,0,0,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 4 )
        	return $this->levelUpdate($level2_4_percent, 'level4', array(0,0,0,1,0,0,0,0,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 5 )
        	return $this->levelUpdate($level5_10_percent, 'level5', array(0,0,0,0,1,0,0,0,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 6 )
        	return $this->levelUpdate($level5_10_percent, 'level6', array(0,0,0,0,0,1,0,0,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 7 )
        	return $this->levelUpdate($level5_10_percent, 'level7', array(0,0,0,0,0,0,1,0,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 8 )
        	return $this->levelUpdate($level5_10_percent, 'level8', array(0,0,0,0,0,0,0,1,0,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 9 )
        	return $this->levelUpdate($level5_10_percent, 'level9', array(0,0,0,0,0,0,0,0,1,0,$this->now,$sponsoreId) , $sponsoreId);
        if( $level == 10 )
        	return $this->levelUpdate($level5_10_percent, 'level10', array(0,0,0,0,0,0,0,0,0,1,$this->now,$sponsoreId) , $sponsoreId);

    }
}