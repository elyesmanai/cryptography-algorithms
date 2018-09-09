<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptController extends Controller
{
	private function encpoly($message,$codes){

			//nekhdhou 3ala kol 7arf fil message, il numéro te3ou fil alphabet, w ba3d nzidoulou un nombre au hasard entre 0 et 26, ken tfout 26 na3mlou modulo, then n7otou il original wil new  fi tableau , [ A -> O ] etc...
			// abd , 5 => f,g,h
				$cle=[];
				$crypted="";

			for($i=0;$i<strlen($message);$i++){ //$message = FAC

					$lettre = $message[$i];  // $lettre = F 
					$position = array_search($lettre, $codes); // $position = 5
					$newpos = ($position + rand(0,25))%26; // $newpos = (5 + 12) mod26 = 17

					$newlettre = $codes[$newpos]; // $newlettre = codes(17) = R

					$cle[$i][0] = $lettre; // $cle[$i][0] = F , original
					$cle[$i][1] = $newlettre; // $cle[$i][1] = R , crypté

					$crypted = $crypted.$cle[$i][1]; // $crypted = R

			}
			$tab = [$crypted, $cle];
			return $tab;
	}

	private function encmono($message,$codes){

			
			//nekhdhou 3ala kol 7arf fil message, il numéro te3ou fil alphabet, w ba3d nzidoulou un nombre au hasard entre 0 et 26, ken tfout 26 na3mlou modulo, then n7otou il original wil new  fi tableau , [ A -> O ] etc...
			// abd , 5 => f,g,h
				$cle=[];
				$cle[0][0] ='F';
				$cle[0][1] ='R';
				$crypted="";
				$mawjoud='';

			for($i=0;$i<strlen($message);$i++){ //$message = FAC

					$lettre = strtoupper($message[$i]);  // $lettre = F 
					$aa = array_key_exists($lettre,$cle); 
					echo $aa;
					die;
					if(!array_key_exists($lettre,$cle)){ // $lettre mawjouda fi $cle

						$position = array_search($lettre, $codes); // $position = 5

						$newpos = ($position + rand(0,25))%26; // $newpos = (5 + 12) mod26 = 17

						$newlettre = $codes[$newpos]; // $newlettre = codes(17) = R

						$cle[$i][0] = $lettre; // $cle[$i][0] = F , original
						$cle[$i][1] = $newlettre; // $cle[$i][1] = R , crypté

						$crypted = $crypted.$newlettre; // $crypted = R
					}
					else{
						$mawjoud = array_search($lettre,$cle);
						$crypted = $crypted.$cle[$mawjoud][1];
					}
			}
			$tab = [$crypted, $cle];
			return $tab;
	}

	private function decmono($message,$cle){
		$crypted="";
		for($i=0;$i<strlen($message);$i++){//$message = XDC

			$lettre = strtoupper($message[$i]);  // $lettre = X
			$position = array_search($lettre, $cle); // $position = 5
			$newlettre = $cle[$position][0]; // $newlettre = F
			$decrypted = $decrypted.$newlettre;

		}
		return $decrypted;
	}

	private function enccesar($message,$shift,$codes){
		//cesar haw kifeh,  3andik message, w 3andik nombre, winti ta3mil addition ta3 code il nombre origine bil nombre shift, wiwali il num eka.
		$crypted="";
		for($i=0;$i<strlen($message);$i++){//$message = FAC

			$lettre = strtoupper($message[$i]);  // $lettre = F
			$position = array_search($lettre, $codes); // $position = 5
			$newpos = ($position + $shift)%26; // $newpos = (5 + 12) mod26 = 17
			$newlettre = $codes[$newpos]; // $newlettre = codes(17) = R
			$crypted = $crypted.$newlettre; // $crypted = R
		}
		return $crypted;
	}

	private function deccesar($message,$shift,$codes){
		//cesar haw kifeh,  3andik message, w 3andik nombre, winti ta3mil soustraction ta3 code il nombre origine bil nombre shift, wiwali il num eka.
		$crypted="";
		for($i=0;$i<strlen($message);$i++){//$message = FAC

			$lettre = strtoupper($message[$i]);  // $lettre = F
			$position = array_search($lettre, $codes); // $position = 5
			$newpos = ($position - $shift)%26; // $newpos = (5 + 12) mod26 = 17
			if($newpos<0){$newpos+=26;}
			$newlettre = $codes[$newpos]; // $newlettre = codes(17) = R
			$crypted = $crypted.$newlettre; // $crypted = R
		}
		return $crypted;
	}

	private function encaffine($message,$a,$b,$codes){
		//affine haw kifeh,  3andik message, w 3andik a et b, winti ta3mil aX+b ta3 code il nombre origine, wiwali il num eka.
		$crypted="";
		for($i=0;$i<strlen($message);$i++){//$message = FAC

			$lettre = strtoupper($message[$i]);  // $lettre = F
			$position = array_search($lettre, $codes); // $position = 5
			$newpos = ( ($position*$a) + $b)%26; // $newpos = (5 + 12) mod26 = 17
			$newlettre = $codes[$newpos]; // $newlettre = codes(17) = R
			$crypted = $crypted.$newlettre; // $crypted = R
		}
		return $crypted;
	}

	private function encvigenere($message,$cle,$codes){
		//vigènere 3andik mot cle w message, w ta3mil superposition, w kol lettre de message tekhou addition de lettre superposé

		$crypted="";
		$j=0;

		for($i=0;$i<strlen($message);$i++){//$message = FACULTE, cle = FAC

			$lettre = strtoupper($message[$i]);  // $lettre = F
			$position = array_search($lettre, $codes); // $position = 5
			$d = strtoupper(substr($cle, $j, 1));
			$superposition = array_search($d,$codes); // $superpositon = 5
			$newpos = ($position + $superposition)%26; // $newpos = (5 + 5) mod26 = 10
			$newlettre = $codes[$newpos]; // $newlettre = codes(10) = 
			$crypted = $crypted.$newlettre; // $crypted = 

			if($j==strlen($cle)){$j=0;}
			else{$j++;}
		}
		return $crypted;
	}

	private function decvigenere($message,$cle,$codes){
		//vigènere 3andik mot cle w message, w ta3mil superposition, w kol lettre de message tekhou addition de lettre superposé

		$crypted="";
		$j=0;
		for($i=0;$i<strlen($message);$i++){//$message = FACULTE, cle = FAC

			$lettre = strtoupper($message[$i]);  // $lettre = F
			$position = array_search($lettre,$codes); // $position = 5
			$d = strtoupper(substr($cle, $j, 1));
			$superposition = array_search($d,$codes); // $superpositon = 5
			$newpos = ($position - $superposition); // $newpos = (5 + 5) mod26 = 10
			if($newpos<0){$newpos+=26;}
			$newlettre = $codes[$newpos]; // $newlettre = codes(10) = 
			$crypted = $crypted.$newlettre; // $crypted = 

			if($j==strlen($cle)){$j=0;}
			else{$j++;}
		}
		return $crypted;
	}


	public function __invoke()
		{ 
			$codes= array('A','B', 'C','D','E','F','G','H','I','J','K','L', 'M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

		  	$task = $_POST['task'];

			if (!empty($_POST['cle'])) {  $cle = $_POST['cle'];  }
			if (!empty($_POST['a'])) {  $a = $_POST['a'];  }
			if (!empty($_POST['b'])) {  $b = $_POST['b'];  }
			if (!empty($_POST['shift'])) {  $shift = $_POST['shift'];  }
			
			

			if (!empty($_POST['message'])) {  $message = $_POST['message']; }
			 	else{ $error="Votre message est vide, entrez un message.";
			 		 
		  			  return view('welcome')->with('error',$error);
		  			}

			switch ($task) {
/*----------*/	case 'encmono':
			  		$tab = self::encmono($message,$codes);
			  		$chiffre = $tab[0];
			  		$cle = $tab[1];
			  		return view('welcome')->with('chiffre',$chiffre)->with('cle',$cle);
			  		break;
/*----------*/	case 'decmono':
			  		$result =  self::decmono($message,$cle);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/  case 'encpoly':
			  		$tab = self::encpoly($message,$codes);
			  		$chiffre = $tab[0];
			  		$cle = $tab[1];
			  		return view('welcome')->with('chiffre',$chiffre)->with('cle',$cle);
			  		break;
			  	case 'decpoly':
			  		$result[] = self:: decpoly($message);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/  case 'enccesar':
			  		$result =  self::enccesar($message,$shift,$codes);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/ 	case 'deccesar':
			  		$result =  self::deccesar($message,$shift,$codes);
			  		return view('welcome')->with('result',$result);
			  		break;
			  	case 'encatranspose':
			  		$result[] =  self::encatranspose($message);
			  		return view('welcome')->with('result',$result);
			  		break;
			  	case 'dectranspose':
			  		$result[] = self::dectranspose($message);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/  case 'encaffine':
			  		$result =  self::encaffine($message,$a,$b,$codes);
			  		return view('welcome')->with('result',$result);
			  		break;
			  	case 'decaffine':
			  		$result[] = self::decaffine($message);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/  case 'encvigenere':
			  		$result =  self::encvigenere($message,$cle,$codes);
			  		return view('welcome')->with('result',$result);
			  		break;
/*----------*/  case 'decvigenere':
			  		$result =  self::decvigenere($message,$cle,$codes);
			  		return view('welcome')->with('result',$result);
			  		break;
			  	default:
			  		$error="Erreur inconnue, entrez de nouveau le message.";
		  			return view('welcome')->with('error',$error);
			  		break;
			}
		}
}



