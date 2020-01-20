<?php
	function sql_normal($fecha){
		if(strlen($fecha)!=0){
			return date("m/d/Y",strtotime($fecha));
		}else{
			return "";
		}
	} 
	function normal_sql($fecha){
		if(strlen($fecha)!=0){
			list($mes,$dia,$anio)=explode("/",$fecha);
			return $anio."-".$mes."-".$dia;
		}else{
			return "";
		}
	} 
	function removeHTTP($url){
		return str_replace(array('http://','https://'), '', $url);
	}
	function youtubeId($id) {
		$_id = parse_url($id);
		parse_str($_id['query']);
		unset($_id);
		$id = empty($v) ? $id : $v;
		return $id;
	}
	
	function getAge($DOB, $DOD) {
		$CD = date("Y-n-d");
		list($cY,$cm,$cd) = explode("-",$CD);
		list($bY,$bm,$bd) = explode("-",$DOB);
		if ($DOD!="" && $DOD != "0000-00-00") {
			list($dY,$dm,$dd) = explode("-",$DOD);
				if ($bY == $dY) {
	     			$months = $dm - $bm;
		     		if ($months == 0 || $months > 1) {
		     			return "$months months";
		     		} else
		    			return "$months month";
				} else 
	   				$years = ( $dm.$dd < $bm.$bd ? $dY-$bY-1 : $dY-$bY );
		     		if ($years == 0 || $years > 1) {
		     			return "$years years";
					} else { 
		    			return "$years year";
					}
		} else {
			if ($bY != "" && $bY != "0000") {	
		     	if ($bY == $cY) {
		     		$months = $cm - $bm;
			     		if ($months == 0 || $months > 1) {
			     			return "$months months";
			     		} else 
			    			return "$months month";
				} else if ($cY - $bY == 1 && $cm - $bm < 12) {
						if ($cd - $bd > 0) {
							$xm = 0;
						} else { 
							$xm = 1;
						}
					$months = 12 - $bm + $cm - $xm;
			     		if ($months == 0 || $months > 1) {
			     			return "$months months";
			     		} else { 
			    			return "$months month";
						}
				} 
				$years = (date("md") < $bm.$bd ? date("Y")-$bY-1 : date("Y")-$bY );
	     		if ($years == 0 || $years > 1) {
	     			return "$years years";
				} else { 
	    			return "$years year";
				}		
			} else	
	    	return "No Date of Birth!";
		  }	
	}
	
	function dateformat($variable){
		$hora = date("d", strtotime($variable));
		$hora1 = date("F", strtotime($variable));
		$hora2 = date("Y", strtotime($variable));
		echo '<dt><span class="news_month">'.$hora.'</span><span class="news_day">'.mb_substr($hora1,0,3).'</span></dt>';
	}	
	
	function truncatePreserveWords ($h,$n,$w=5,$tag='b') {
		$n = explode(" ",strip_tags($n));    //needles words
		$b = explode(" ",strip_tags($h));    //haystack words
		$c = array();                        //array of words to keep/remove
		for ($j=0;$j<count($b);$j++) $c[$j]=false;
		for ($i=0;$i<count($b);$i++) 
			for ($k=0;$k<count($n);$k++) 
				if (stristr($b[$i],$n[$k])) {
					$b[$i]=preg_replace("/".$n[$k]."/i","<$tag>\\0</$tag>",$b[$i]);
					for ( $j= max( $i-$w , 0 ) ;$j<min( $i+$w, count($b)); $j++) $c[$j]=true; 
				}    
		$o = "";    // reassembly words to keep
		for ($j=0;$j<count($b);$j++) if ($c[$j]) $o.=" ".$b[$j]; else $o.=".";
		return preg_replace("/\.{3,}/i","...",$o);
	}

	function truncate_string($string, $max_length, $readMore=false){
		if (strlen($string) > $max_length) {
			 $string = substr($string,0,$max_length);
			 $string .= '...';
			 $string .= $readMore !== false ? $readMore : "";
			 
		}
		return $string;
	}

	function arr2json($arr = array(), $seek = array()) {
		if (count($seek) == 0) {
			return json_encode($arr);
		} else {
			$out = array();
			foreach ($seek as $item) {
				if (array_key_exists($item, $arr)) $out[$item] = $arr[$item];
			}
			return  json_encode($out);  
		} 
	}
	
	function cleaningFileName($inputFile){
		$fileRoot = substr($_FILES[$inputFile]['name'],0,strrpos($_FILES[$inputFile]['name'],'.'));
		return preg_replace('/[^a-zA-Z0-9_\-\.]/','_',strtolower($fileRoot));
	} 
	
	function array_rand_keys($array, $limit = 1) {
	    $count = @count($array)-1;
	
	    // Sanity checks
	    if ($limit == 0 || !is_array($array) || $limit > $count) return array();
	    if ($count == 1) return $array;
	
	    // Loop through and get the random numbers
	    for ($x = 0; $x < $limit; $x++) {
	        $rand = rand(0, $count);
	
	        // Can't have double randoms, right?
	        while (isset($rands[$rand])) $rand = rand(0, $count);
	
	        $rands[$rand] = $rand;
	    }
	
	    $return = array();
	    $curr = current($rands);
	
	    // I think it's better to return the elements in a random
	    // order, which is why I'm not just using a foreach loop to
	    // loop through the random numbers
	    while (count($return) != $limit) {
	        $cur = 0;
	
	        foreach ($array as $key => $val) {
	            if ($cur == $curr) {
	                $return[$key] = $val;
	
	                // Next...
	                $curr = next($rands);
	                continue 2;
	            } else {
	                $cur++;
	            }
	        }
	    }
	
	    return $return;
	}
	
	/*function save_img($src, $ext, $target = '') {
		$s_folder = TZN_FILE_UPLOAD_URL;
		
		// check photo
		if ($target) {
			$photo_name = $target;
		} else {
			$photo_name = $s_folder.date("H_i",time()).'_'.get_rand(5).'.'.$ext;
		}

		if (eregi("^http",$src)) {
			if ($get_file = @file_get_contents($src)) {
				$fp = @fopen(PRJ_WWW_PATH.$photo_name,"w");
				@fwrite($fp,$get_file);
				@fclose($fp);
				return $photo_name;
			} else {
				return false;
			}
		} else {
			if (copy(PRJ_WWW_PATH.$src, PRJ_WWW_PATH.$photo_name)) {
				return $photo_name;
			} else {
				return false;
			}
		}
	}*/
	function save_img($src, $ext) {
		$s_folder = TZN_FILE_UPLOAD_URL;
		
		// check photo
		$photo_name = date("H_i",time()).'_'.get_rand(5).'.'.$ext;
		

		if (eregi("^http",$src)) {
			if ($get_file = @file_get_contents($src)) {
				$fp = @fopen(PRJ_WWW_PATH.$s_folder.$photo_name,"w");
				@fwrite($fp,$get_file);
				@fclose($fp);
				return $photo_name;
			} else {
				return false;
			}
		} else {
			if (copy(PRJ_WWW_PATH.$src, PRJ_WWW_PATH.$s_folder.$photo_name)) {
				return $photo_name;
			} else {
				return false;
			}
		}
	}
	
	/*function save_thumbnail($file, $width = 100, $height = 100) {
		include_once(PRJ_CLASS_PATH.'resizeimage.inc.php');
		
		$ext = substr($file['name'],-3,3);
		$ext = strtolower($ext);
		$allowed_ext = array('jpg','jpeg','png','gif');
		if (!in_array($ext, $allowed_ext)) {
			die('image no valid');
		}
		$fname = date("H_i",time()).'_'.get_rand(5);
		$dir = date("Ym",time());
		$folder = 'uploads/userfiles/'.$dir;
		$uri = $folder.'/'.$fname.'.'.$ext;
		if (!is_dir($folder))
			mkdir($folder, 0777);
		if ($width == '100') {
			$fill = 'white';
		}
		$resizeimage = new resizeimage($file['tmp_name'], $file['type'], $folder.'/'.$fname, $width, $height, 0, 100,$fill);
		return $folder.'/'.$fname.".".$resizeimage->type;
	}*/
	
	function get_rand($length, $possible = "0123456789abcdefghijklmnopqrstuvwxyz") {
		srand((double)microtime()*1000000);
	    $str = ""; 
	    while(strlen($str) < $length) 
	        $str .= substr($possible, rand(0,50), 1);
	    return($str); 
	
	}

	function valid_youtube_id($id) {
		//$id = youtubeId($url);
		if (!$data = @file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$id)) {
			return false;
		}
		else {
			if (!preg_match("/xml/",$data)) {
				return false;
			}
		}
		return true;
	}
	
	
	function sentence_case($string) {
	    $sentences = preg_split('/([.?!\d]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	    $new_string = '';
	    foreach ($sentences as $key => $sentence) {
	        $new_string .= ($key & 1) == 0?
	            my_ucfirst(strtolower(trim($sentence))) :
	            $sentence.' '; 
	    }
	    return trim($new_string);
	 } 
	 
	 function my_ucfirst($string, $e ='utf-8') {
		    if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) {
		        $string = mb_strtolower($string, $e);
		        $upper = mb_strtoupper($string, $e);
		            preg_match('#(.)#us', $upper, $matches);
		            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
		    }
		    else {
		        $string = ucfirst($string);
		    }
		    return $string;
	  } 
	  
	  function toPrecision($number, $sf) {
          // How many decimal places do we round and format to?
          // @note May be negative.
          $dp = floor($sf - log10(abs($number)));

          // Round as a regular number.
          $numberFinal = round($number, $dp);

          //If the original number it's halp up rounded, don't need the last 0
          $arrDecimais=explode('.',$numberFinal);
          if(strlen($number) > strlen($numberFinal) && $dp > strlen($arrDecimais[1])) {
                $valorFinal=sprintf("%.".($dp-1)."f", $number);
          }
          else {
               //Leave the formatting to format_number(), but always format 0 to 0dp.
                $valorFinal=str_replace(',', '', number_format($numberFinal, 0 == $numberFinal ? 0 : $dp));
          }

          // Verify if needs to be represented in scientific notation
          $arrDecimaisOriginal=explode('.',$number);
          if(sizeof($arrDecimaisOriginal)>=2) {
              return (strlen($arrDecimaisOriginal[0])>$sf)?
                                                            sprintf("%.".($sf-1)."E", $valorFinal) :
                                                            $valorFinal;
          }
          else {
              return sprintf("%.".($sf-1)."E", $valorFinal);
          }
    } 
	
	function clima(&$low, &$height) {
		include_once(PRJ_CLASS_PATH."weather/parser.php");
		include_once(PRJ_CLASS_PATH."weather/weather.php");
		$clima = new weather("PEXX0022", 3600, "c", dirname($_SERVER["SCRIPT_FILENAME"])."/include/classes/weather/tmp/");
		$clima ->parsecached();
		$low = $clima->forecast[0]["LOW"];
		$height = $clima->forecast[0]["HIGH"];
	}

	
?>