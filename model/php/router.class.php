<?php

class router {

  // From : ?/page/to/this
  // to :
  //
  public static function auto($landing='Page/Welcome.html',array $newkeys = ['mod','func','arg']){
    if(isset($_GET) && !empty($_GET)){
      $keys = array_keys($_GET);
      $PATH = self::transfert($keys[0],$newkeys);
      return $PATH;
    }
    else{
      $PATH = self::transfert($landing,$newkeys);
      return $PATH;
    }
  }

  public static function transfert($str,array $struc){
    $PATH = [] ; $i=0 ;
    $PATH['url'] = $str;
    $lst = array_pop($struc);
    foreach(explode('/', $str) as $part){
      if(isset($struc[$i])){
        $PATH[$struc[$i]]=str_replace('_','.',$part);
        $i++;
      }
      else{
        $PATH[$lst][]=str_replace('_','.',$part);
      }
    }
    return $PATH;
  }

}
