<?php

class opSkinFacebookPluginStyle
{
  public static function checkIfSmartPhone(sfEvent $event)
  {
    $response = sfContext::getInstance()->getResponse();
    $request = sfContext::getInstance()->getRequest();
    
    if(self::isSmartPhone($request->getHttpHeader('User-Agent')))
    {
      $response->addStylesheet('/opSkinFacebookPlugin/css/smart.css', 'last');
      $response->addMeta('viewport', 'width=320,initial-scale=1.0,user-scalable=yes,maximum-scale=3.0');
    }
  }
  
  protected static function isSmartPhone($userAgent)
  {
    return self::isIphone($userAgent) || self::isAndroid($userAgent);
  }
  
  protected static function isIphone($userAgent)
  {
    return strpos($userAgent, 'iPhone OS')!==FALSE;
  }
  
  protected static function isAndroid($userAgent)
  {
    return strpos($userAgent, 'Linux; U; Android')!==FALSE;
  }
}