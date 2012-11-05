<?php

class VirallyShortCodes
{

  private static $_instance;

  static function instance()
  {
    if (!self::$_instance)
    {
        self::$_instance = new VirallyShortCodes();
    }

    return self::$_instance;
  }

  function virally_buttons_short_code($attrs, $inj=array())
  {
    $inj = array_merge(array(
      'shortcode_atts'=>'shortcode_atts',
      'current_user_can'=>'current_user_can'
    ),$inj);

    global $post;

    $attrs = $inj['shortcode_atts']( array('campaign_id'=>null), $attrs );
    if (is_null($attrs['campaign_id'])) {
      if ($inj['current_user_can']('edit_post', $post->ID)) {
        return "<span style='color: #ae0000; font-weight: bold'>WARNING:</span> You're Virally short code must contain a campaign_id attribute with the id of the campaign you wish to embed buttons for.";
      } else {
        return "";
      }
    } else {
      return "<script type='text/javascript' src='http://virallyapp.com/assets/embedded.js?id={$attrs['campaign_id']}'></script>";
    }
  }

}