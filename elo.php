<?php

	class elo{
		public $ratingA;
		public $ratingB;
		public $chanceA;
		public $chanceB;
		public $newRatingA;
		public $newRatingB;

		public function __construct($Ra,$Rb)
		{
			$this->ratingA = $Ra;
			$this->ratingB = $Rb;
		}
		/*********************************
			Desc:
				Elo chance.
			@Parm:
				$Ra = Rating A
				$Ra = Rating B
		*********************************/
		public function chance(){
			$resultA = 1/(1+pow(10,($this->ratingA-$this->ratingB)/400));
			$this->chanceA = $resultA;
			$resultB = 1/(1+pow(10,($this->ratingB-$this->ratingA)/400));
			$this->chanceB = $resultB;
		}

		/*****************************************
			Desc:
				The new ratings!
			@Parms:
				$Wa = Win/lose, 1/0
				$Wb = Win/lose, 1/0
			Return:
				Array
					0 = new rating A
					1 = new rating B
		*****************************************/
		public function rating($Wa,$Wb){
			if($this->ratingA <= 2100){
				$this->newRatingA = $this->ratingA + 32*($Wa - $this->chanceA);
			}elseif($this->ratingA > 2100 && $Ra < 2400){
				$this->newRatingA = $this->ratingA + 24*($Wa - $this->chanceA);
			}elseif($this->ratingA >= 2400){
				$this->newRatingA = $this->ratingA + 16*($Wa - $this->chanceA);
			}

			if($this->ratingB <= 2100){
				$this->newRatingB = $this->ratingB + 32*($Wb - $this->chanceB);
			}elseif($this->ratingB > 2100 && $this->ratingB < 2400){
				$this->newRatingB = $this->ratingB + 24*($Wb - $this->chanceB);
			}elseif($this->ratingB >= 2400){
				$this->newRatingB = $this->ratingB + 1*($Wb - $this->chanceB);
			}

			$result = array(
				0 => round($this->newRatingA,2),
				1 => round($this->newRatingB,2)
			);
			return $result;
		}
	}