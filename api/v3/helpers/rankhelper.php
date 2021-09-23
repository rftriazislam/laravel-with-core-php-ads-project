<?php

class RankHelper
{

	protected $next_rank;
	protected $userid;
	protected $db_access;
	protected $my_rank;

	protected $data = array(
		'rank'=>array(
			'current'=>'Member',
			'next'=>'Bronze'
			),
		'g1'=>array(
				'condition'=>0,
				'achieved'=>0
				),
		'g2'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g3'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g4'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g5'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g6'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g7'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g8'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g9'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'g10'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'bronze'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'silver'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'gold'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'platinum'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'diamond'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'ambassador'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'brand_ambassador'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'royal_ambassador'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'crown_ambassador'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'total'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'total_earn'=>array(
			'condition'=>0,
			'achieved'=>0
			),
		'earn_without_referral'=>array(
			'condition'=>0,
			'achieved'=>0
			)
		);
	
	function __construct($my_rank, $rank, $id, $db)
	{
		$this->my_rank = $my_rank;
		$this->next_rank = $rank;
		$this->userid = $id;
		$this->db_access = $db;
	}

	function getRankData()
	{
		$this->data['rank']['current'] = $this->my_rank;
		
		if($this->my_rank == 'Crown')
			$this->data['rank']['next'] = '';
		else
			$this->data['rank']['next'] = $this->next_rank;
		
		switch ($this->next_rank) {
			case 'Bronze':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);
				
				$this->data['g1']['condition']= 10;
				$this->data['g1']['achieved']= $result->level1;
				
				$this->data['g2']['condition']= 100;
				$this->data['g2']['achieved']= $result->level2;

				$this->data['g3']['condition']= 150;
				$this->data['g3']['achieved']= $result->level3;

				$this->data['total']['condition']= 350;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 50);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$this->data['earn_without_referral']['condition']= sprintf("%.6f", 25);
				$this->data['earn_without_referral']['achieved']= sprintf("%.6f", $result->earn_without_referral);

				return $this->data;
				break;

			case 'Silver':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);
				
				$this->data['g1']['condition']= 20;
				$this->data['g1']['achieved']= $result->level1;
				
				$this->data['g2']['condition']= 200;
				$this->data['g2']['achieved']= $result->level2;

				$this->data['g3']['condition']= 300;
				$this->data['g3']['achieved']= $result->level3;

				$this->data['g4']['condition']= 100;
				$this->data['g4']['achieved']= $result->level4;

				$this->data['total']['condition']= 1550;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 150);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$this->data['earn_without_referral']['condition']= sprintf("%.6f", 100);
				$this->data['earn_without_referral']['achieved']= sprintf("%.6f", $result->earn_without_referral);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
				}

				$this->data['bronze']['condition']= 5;
				$this->data['bronze']['achieved']= $bronze_achieved;

				return $this->data;
				break;

			case 'Gold':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);
				
				$this->data['g1']['condition']= 50;
				$this->data['g1']['achieved']= $result->level1;
				
				$this->data['g2']['condition']= 300;
				$this->data['g2']['achieved']= $result->level2;

				$this->data['g3']['condition']= 500;
				$this->data['g3']['achieved']= $result->level3;

				$this->data['g4']['condition']= 1000;
				$this->data['g4']['achieved']= $result->level4;

				$this->data['total']['condition']= 2500;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 500);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$this->data['earn_without_referral']['condition']= sprintf("%.6f", 250);
				$this->data['earn_without_referral']['achieved']= sprintf("%.6f", $result->earn_without_referral);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					if( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
				}

				$this->data['bronze']['condition']= 10;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 5;
				$this->data['silver']['achieved']= $silver_achieved;

				return $this->data;
				break;
			
			case 'Platinum':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g5']['condition']= 3000;
				$this->data['g5']['achieved']= $result->level5;

				$this->data['total']['condition']= 10000;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 1500);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					if( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					if( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
				}

				$this->data['bronze']['condition']= 15;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 10;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 5;
				$this->data['gold']['achieved']= $gold_achieved;

				return $this->data;
				break;

			case 'Diamond':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g6']['condition']= 15000;
				$this->data['g6']['achieved']= $result->level6;

				$this->data['total']['condition']= 40000;
				$this->data['total']['achieved']= $result->total_team;

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					if( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					if( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					if( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
				}

				$this->data['bronze']['condition']= 25;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 20;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 10;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 5;
				$this->data['platinum']['achieved']= $platinum_achieved;

				return $this->data;
				break;
			
			case 'Ambassador':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g7']['condition']= 25000;
				$this->data['g7']['achieved']= $result->level7;

				$this->data['total']['condition']= 100000;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 16000);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;
				$diamond_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					elseif( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					elseif( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					elseif( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
					elseif( $rank_result->rank == 'Diamond' )
					{
						$diamond_achieved += 1;
					}

				}

				$this->data['bronze']['condition']= 50;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 40;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 20;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 10;
				$this->data['platinum']['achieved']= $platinum_achieved;

				$this->data['diamond']['condition']= 5;
				$this->data['diamond']['achieved']= $diamond_achieved;

				return $this->data;
				break;

			case 'Brand Ambassador':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g8']['condition']= 40000;
				$this->data['g8']['achieved']= $result->level8;

				$this->data['total']['condition']= 200000;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 50000);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;
				$diamond_achieved = 0;
				$ambassador_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					elseif( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					elseif( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					elseif( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
					elseif( $rank_result->rank == 'Diamond' )
					{
						$diamond_achieved += 1;
					}
					elseif( $rank_result->rank == 'Ambassador' )
					{
						$ambassador_achieved += 1;
					}

				}

				$this->data['bronze']['condition']= 100;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 50;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 40;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 20;
				$this->data['platinum']['achieved']= $platinum_achieved;

				$this->data['diamond']['condition']= 10;
				$this->data['diamond']['achieved']= $diamond_achieved;

				$this->data['ambassador']['condition']= 5;
				$this->data['ambassador']['achieved']= $ambassador_achieved;

				return $this->data;
				break;

			case 'Royal Ambassador':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g9']['condition']= 60000;
				$this->data['g9']['achieved']= $result->level9;

				$this->data['total']['condition']= 400000;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 150000);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;
				$diamond_achieved = 0;
				$ambassador_achieved = 0;
				$brand_ambassador_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					elseif( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					elseif( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					elseif( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
					elseif( $rank_result->rank == 'Diamond' )
					{
						$diamond_achieved += 1;
					}
					elseif( $rank_result->rank == 'Ambassador' )
					{
						$ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Brand Ambassador' )
					{
						$brand_ambassador_achieved += 1;
					}

				}

				$this->data['bronze']['condition']= 200;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 100;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 80;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 40;
				$this->data['platinum']['achieved']= $platinum_achieved;

				$this->data['diamond']['condition']= 20;
				$this->data['diamond']['achieved']= $diamond_achieved;

				$this->data['ambassador']['condition']= 10;
				$this->data['ambassador']['achieved']= $ambassador_achieved;

				$this->data['brand_ambassador']['condition']= 5;
				$this->data['brand_ambassador']['achieved']= $brand_ambassador_achieved;

				return $this->data;
				break;

			case 'Crown Ambassador':
				$query = "SELECT levels.*, (levels.level1+levels.level2+levels.level3+levels.level4+levels.level5+levels.level6+levels.level7+levels.level8+levels.level9+levels.level10) AS total_team, earnings.referral_income, (earnings.referral_income+earnings.joining_income+earnings.others_income) AS total_earn, (earnings.joining_income+earnings.others_income) AS earn_without_referral FROM levels JOIN earnings ON earnings.userid=levels.userid WHERE levels.userid={$this->userid}";
				$result = $this->db_access->getRowObject($query);

				$this->data['g10']['condition']= 100000;
				$this->data['g9']['achieved']= $result->level10;

				$this->data['total']['condition']= 600000;
				$this->data['total']['achieved']= $result->total_team;

				$this->data['total_earn']['condition']= sprintf("%.6f", 650000);
				$this->data['total_earn']['achieved']= sprintf("%.6f",$result->total_earn);

				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;
				$diamond_achieved = 0;
				$ambassador_achieved = 0;
				$brand_ambassador_achieved = 0;
				$royal_ambassador_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					elseif( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					elseif( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					elseif( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
					elseif( $rank_result->rank == 'Diamond' )
					{
						$diamond_achieved += 1;
					}
					elseif( $rank_result->rank == 'Ambassador' )
					{
						$ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Brand Ambassador' )
					{
						$brand_ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Royal Ambassador' )
					{
						$royal_ambassador_achieved += 1;
					}

				}

				$this->data['bronze']['condition']= 400;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 200;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 160;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 80;
				$this->data['platinum']['achieved']= $platinum_achieved;

				$this->data['diamond']['condition']= 40;
				$this->data['diamond']['achieved']= $diamond_achieved;

				$this->data['ambassador']['condition']= 20;
				$this->data['ambassador']['achieved']= $ambassador_achieved;

				$this->data['brand_ambassador']['condition']= 10;
				$this->data['brand_ambassador']['achieved']= $brand_ambassador_achieved;

				$this->data['royal_ambassador']['condition']= 5;
				$this->data['royal_ambassador']['achieved']= $royal_ambassador_achieved;

				return $this->data;
				break;

			case 'Crown':
				$rankQ = "SELECT users.sponsorid, ranks.userid, ranks.rank FROM users JOIN ranks ON ranks.userid=users.id WHERE users.sponsorid={$this->userid}";
				$results = $this->db_access->getData($rankQ, array());

				$bronze_achieved = 0;
				$silver_achieved = 0;
				$gold_achieved = 0;
				$platinum_achieved = 0;
				$diamond_achieved = 0;
				$ambassador_achieved = 0;
				$brand_ambassador_achieved = 0;
				$royal_ambassador_achieved = 0;
				$crown_ambassador_achieved = 0;

				foreach ($results as $rank_result) 
				{
					if( $rank_result->rank == 'Bronze' )
					{
						$bronze_achieved += 1;
					}
					elseif( $rank_result->rank == 'Silver' )
					{
						$silver_achieved += 1;
					}
					elseif( $rank_result->rank == 'Gold' )
					{
						$gold_achieved += 1;
					}
					elseif( $rank_result->rank == 'Platinum' )
					{
						$platinum_achieved += 1;
					}
					elseif( $rank_result->rank == 'Diamond' )
					{
						$diamond_achieved += 1;
					}
					elseif( $rank_result->rank == 'Ambassador' )
					{
						$ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Brand Ambassador' )
					{
						$brand_ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Royal Ambassador' )
					{
						$royal_ambassador_achieved += 1;
					}
					elseif( $rank_result->rank == 'Crown Ambassador' )
					{
						$crown_ambassador_achieved += 1;
					}

				}

				$this->data['bronze']['condition']= 600;
				$this->data['bronze']['achieved']= $bronze_achieved;

				$this->data['silver']['condition']= 300;
				$this->data['silver']['achieved']= $silver_achieved;

				$this->data['gold']['condition']= 250;
				$this->data['gold']['achieved']= $gold_achieved;

				$this->data['platinum']['condition']= 150;
				$this->data['platinum']['achieved']= $platinum_achieved;

				$this->data['diamond']['condition']= 80;
				$this->data['diamond']['achieved']= $diamond_achieved;

				$this->data['ambassador']['condition']= 40;
				$this->data['ambassador']['achieved']= $ambassador_achieved;

				$this->data['brand_ambassador']['condition']= 20;
				$this->data['brand_ambassador']['achieved']= $brand_ambassador_achieved;

				$this->data['royal_ambassador']['condition']= 10;
				$this->data['royal_ambassador']['achieved']= $royal_ambassador_achieved;

				$this->data['crown_ambassador']['condition']= 5;
				$this->data['crown_ambassador']['achieved']= $crown_ambassador_achieved;

				return $this->data;
				break;

			default:
				return $this->data;
				break;
		}
	}
}