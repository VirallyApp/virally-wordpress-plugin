<?php

require_once dirname(__FILE__).'/../../VirallyShortCodes.php';

class VirallyShortCodesTest extends PHPUnit_Framework_TestCase
{

  function testInstanceShouldReturnVirallyShortCodesSingleton() {
    $instance = VirallyShortCodes::instance();
    $this->assertInstanceOf('VirallyShortCodes', $instance);
    $this->assertSame(VirallyShortCodes::instance(), $instance);
  }

  function test_virally_buttons_short_code() {
    global $post;
    $post = new stdClass();
    $post->ID = 1;

    $this->assertEquals(
      "",
      VirallyShortCodes::instance()->virally_buttons_short_code(array(), array()),
      "Should return empty string if no campaign id and cannot edit current post"
    );
    $this->assertEquals(
      "<span style='color: #ae0000; font-weight: bold'>WARNING:</span> You're Virally short code must contain a campaign_id attribute with the id of the campaign you wish to embed buttons for.",
      VirallyShortCodes::instance()->virally_buttons_short_code(array(), array('current_user_can'=>'return_true')),
      "Should return warning if user can edit current post and no campaign_id"
    );
    $this->assertEquals(
      "<script type='text/javascript' src='http://virallyapp.com/assets/embedded.js?id=102'></script>",
      VirallyShortCodes::instance()->virally_buttons_short_code(array('campaign_id'=>'102'), array('current_user_can'=>'return_true')),
      "Should return a virally embed code if campaign_id is provided"
    );

  }
}