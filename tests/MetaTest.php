<?php

use Puzbie\Meta\Meta;

/**
 * Class RobotsTest
 */
class MetaTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test Set HTML Works.
     *
     * @return void
     *
     * NB: HMTL control is only necessary when you are using tags involving ITEMPROP and the like,
     * so the main test will be performed in the card tests. This is because the use of those
     * tags necessitates additional parameters being added to the html tag. This is an
     * automatic process but cannot be tested in isolation.
     *
     */

    public function test_it_sets_the_html_tag()
    {
        $meta = New Meta;
        $msg1 = 'lang="EN"';
        $meta->setHtml($msg1);
        $this->assertContains('<html ' . $msg1 . '>', $meta->getHtml());
    }

    /**
     * Test Update HTML Works.
     * -  First test we can set it.
     * -  Then test that we can update it.
     *
     * @return void
     *
     */

    public function test_it_updates_the_html_tag()
    {
        $meta = New Meta;
        $msg1 = 'lang="EN"';
        $msg2 = 'lang="FR"';
        $meta->setHtml($msg1);
        $this->assertContains('<html ' . $msg1 . '>', $meta->getHtml());
        $meta->setHtml($msg2);
        $this->assertNotContains('<html ' . $msg1 . '>', $meta->getHtml());
        $this->assertContains('<html ' . $msg2 . '>', $meta->getHtml());
    }

    /**
     * Test Set Title Works.
     *
     * @return void
     *
     */

    public function test_it_sets_the_title_tag()
    {
        $meta = New Meta;
        $msg1 = 'It works!';
        $meta->setTitle($msg1);
        $this->assertContains('<title>' . $msg1 . '</title>', $meta->getTitle());
    }

    /**
     * Test Update Title Works.
     * -  First test we can set it.
     * -  Then test that we can update it.
     *
     * @return void
     *
     */

    public function test_it_updates_the_title_tag()
    {
        $meta = New Meta;
        $msg1 = 'It works!';
        $msg2 = 'It still works!';
        $meta->setTitle($msg1);
        $this->assertContains('<title>' . $msg1 . '</title>', $meta->getTitle());
        $meta->setTitle($msg2);
        $this->assertNotContains('<title>' . $msg1 . '</title>', $meta->getTitle());
        $this->assertContains('<title>' . $msg2 . '</title>', $meta->getTitle());
    }

    /**
     * Test Set Description Works.
     *     - First test it via getDescription()
     *     - Then test it via dump(), which, as we have only added one tag, should be the same.
     *
     * @return void
     *
     */

    public function test_it_sets_the_description_attribute()
    {
        $meta = New Meta;
        $msg1 = 'It works!';
        $meta->setDescription($msg1);
        $this->assertContains('<meta name="description" content = "' . $msg1 . '"/>', $meta->getDescription());
        $this->assertContains('<meta name="description" content = "' . $msg1 . '"/>', $meta->dump());

    }

    /**
     * Test Update Description Works.
     * -  First test we can set it.
     * -  Then test that we can update it.
     *
     * @return void
     *
     */

    public function test_it_updates_the_description_attribute()
    {
        $meta = New Meta;
        $msg1 = 'It works!';
        $msg2 = 'It still works!';
        $meta->setDescription($msg1);
        $this->assertContains('<meta name="description" content = "' . $msg1 . '"/>', $meta->getDescription());
        $meta->setDescription($msg2);
        $this->assertNotContains('<meta name="description" content = "' . $msg1 . '"/>', $meta->getDescription());
        $this->assertContains('<meta name="description" content = "' . $msg2 . '"/>', $meta->getDescription());
    }

    /**
     * Test Set TwitterId works.
     *     - Test it via getTwitterId()
     *
     *    NB: Twitter stores the Twitter Id in the twitter:site tag.
     *
     * @return void
     *
     */

    public function test_it_sets_the_twitterId_attribute()
    {
        $meta = New Meta;
        $myId = '@myTwitterId';
        $meta->setTwitterId($myId);
        $this->assertContains('<meta name="twitter:site" content = "' . $myId . '"/>', $meta->getTwitterId());
    }

    /**
     * Test Set TwitterId works.
     *     - Test it via getTwitterId()
     *
     *    NB: Twitter stores the Twitter Id in the twitter:site tag.
     *
     * @return void
     *
     */

    public function test_it_sets_the_fbAdmin_attribute()
    {
        $meta = New Meta;
        $myId = 'myFacebookId';
        $meta->setFacebookAdmin($myId);
        $this->assertContains('<meta property="fb:admins" content = "' . $myId . '"/>', $meta->getFacebookAdmin());
    }


    /**
     * Test twitter summary card works.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */
    public function test_it_makes_a_twitter_summary_card()
    {
        $meta = New Meta;
        $meta->makeTwitterSummaryCard(['title' => 'A Summary Card.',
            'description' => 'Description of card',
            'image' => 'http://path.to.my/image.jpg',
            'twitterId' => '@bonehead']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<meta name="twitter:card" content = "summary"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:title" content = "A Summary Card."/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:description" content = "Description of card"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:image" content = "http://path.to.my/image.jpg"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:site" content = "@bonehead"/>', $fullMetaText);
    }

    /**
     * Test twitter summary card works without optional parameters,.
     *
     *  - generate without twitter id should be ok. You don't need to set a twitter id
     *    if you have already set it as a default.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */

    public function test_it_makes_a_twitter_summary_card_without_options()
    {
        $meta = New Meta;
        $meta->makeTwitterSummaryCard(['title' => 'A Summary Card.',
            'description' => 'Description of card',
            'image' => 'http://path.to.my/image.jpg']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<meta name="twitter:card" content = "summary"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:title" content = "A Summary Card."/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:description" content = "Description of card"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:image" content = "http://path.to.my/image.jpg"/>', $fullMetaText);
    }

    /**
     * Test twitter summary card fails without required parameters,.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     *
     * /**
     * @expectedException              Exception
     * @expectedExceptionMessage       Required META parameter missing: title
     */
    public function test_it_fails_to_make_a_twitter_summary_card_without_required_parameters()
    {

        $meta = New Meta;
        $meta->makeTwitterSummaryCard(['description' => 'Description of card',
            'image' => 'http://path.to.my/image.jpg']);

    }

    /**
     * Test twitter summary card works.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */
    public function test_it_makes_a_twitter_large_summary_card()
    {
        $meta = New Meta;

        $meta->makeTwitterLargeSummaryCard(['title' => 'A Summary Card.',
            'description' => 'Description of card',
            'image' => 'http://path.to.my/image.jpg',
            'twitterId' => '@bonehead']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<meta name="twitter:card" content = "summary_large_image"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:title" content = "A Summary Card."/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:description" content = "Description of card"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:image" content = "http://path.to.my/image.jpg"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:site" content = "@bonehead"/>', $fullMetaText);
    }


    /**
     * Test twitter app card works.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */
    public function test_it_makes_a_twitter_app_card()
    {
        $meta = New Meta;
        $appArray = [
            ['platform' => 'ipad',
                'name' => 'Cannonball',
                'id' => '929750075',
                'url' => 'cannonball://poem/5149e249222f9e600a7540ef'],
            ['platform' => 'iphone',
                'name' => 'Cannonball',
                'id' => '929750075',
                'url' => 'cannonball://poem/5149e249222f9e600a7540ef'],
            ['platform' => 'googleplay',
                'name' => 'Cannonball',
                'id' => 'io.fabric.samples.cannonball',
                'url' => 'http://cannonball.fabric.io/poem/5149e249222f9e600a7540ef']
        ];

        $meta->makeTwitterAppCard(['twitterId' => '@bonehead',
            'appArray' => $appArray,
            'description' => 'Description of App card',
            'country' => 'EN']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<meta name="twitter:card" content = "app"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:site" content = "@bonehead"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:name:ipad" content = "Cannonball"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:id:ipad" content = "929750075"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:url:ipad" content = "cannonball://poem/5149e249222f9e600a7540ef"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:name:iphone" content = "Cannonball"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:id:iphone" content = "929750075"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:url:iphone" content = "cannonball://poem/5149e249222f9e600a7540ef"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:name:googleplay" content = "Cannonball"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:id:googleplay" content = "io.fabric.samples.cannonball"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:url:googleplay" content = "http://cannonball.fabric.io/poem/5149e249222f9e600a7540ef"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:description" content = "Description of App card"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:app:country" content = "EN"/>', $fullMetaText);
    }

    /**
     * Test twitter player card works.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */
    public function test_it_makes_a_twitter_player_card()
    {
        $meta = New Meta;
        $playerArray = ['player' => 'My Player',
            'width' => '320',
            'height' => '200',
            'image' => 'My Backup image',
            'stream' => 'Streamer',
            'content_type' => 'Streamer content type'];

        $meta->makeTwitterPlayerCard(['title' => 'A Player Card.',
            'playerArray' => $playerArray,
            'description' => 'Player Description',
            'twitterId' => '@bonehead']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<meta name="twitter:card" content = "player"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:player" content = "My Player"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:player:width" content = "320"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:player:height" content = "200"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:image" content = "My Backup image"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:player:stream" content = "Streamer"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:player:stream:content_type" content = "Streamer content type"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:description" content = "Player Description"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:site" content = "@bonehead"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:title" content = "A Player Card."/>', $fullMetaText);
    }

    /**
     * Test twitter player card works.
     *
     *    NB: This test only test for breaking changes. You should test manually using twitter for
     *    complete peace of mind: https://cards-dev.twitter.com/validator
     *
     * @return void
     *
     */
    public function test_it_makes_a_moz_minimum_script()
    {
        $meta = New Meta;
        $meta->clear();

        $meta->makeMozMinimum(['title' => 'Moz minimum Meta Tag Goodness',
            'url' => 'http://www.puzbie.co.uk',
            'image' => 'http://path.to.my/image.jpg',
            'description' => 'Description of the meta tag goodness.']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<title>Moz minimum Meta Tag Goodness</title>', $fullMetaText);
        $this->assertContains('<meta name="description" content = "Description of the meta tag goodness."/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:card" content = "summary"/>', $fullMetaText);
        $this->assertContains('<meta property="og:type" content = "article"/>', $fullMetaText);
        $this->assertContains('<meta property="og:title" content = "Moz minimum Meta Tag Goodness"/>', $fullMetaText);
        $this->assertContains('<meta property="og:url" content = "http://www.puzbie.co.uk"/>', $fullMetaText);
        $this->assertContains('<meta property="og:image" content = "http://path.to.my/image.jpg"/>', $fullMetaText);
        $this->assertContains('<meta property="og:description" content = "Description of the meta tag goodness."/>', $fullMetaText);

    }

    public function test_it_makes_a_moz_standard_script()
    {
        $meta = New Meta;
        $meta->clear();

        $meta->makeMozStandard(['title' => 'Moz Standard Meta Tag Goodness',
            'url' => 'http://www.puzbie.co.uk',
            'image' => 'http://path.to.my/image.jpg',
            'description' => 'Description of the standard meta tag goodness.',
            'siteName' => 'Puzbie',
            'twitterId' => '@zippyPinhead',
            'creatorId' => '@shlurple',
            'fbAdmin' => 'my_facebook_id']);

        $fullMetaText = $meta->dump();

        $this->assertContains('<title>Moz Standard Meta Tag Goodness</title>', $fullMetaText);
        $this->assertContains('<meta name="description" content = "Description of the standard meta tag goodness."/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:card" content = "summary"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:site" content = "@zippyPinhead"/>', $fullMetaText);
        $this->assertContains('<meta name="twitter:creator" content = "@shlurple"/>', $fullMetaText);
        $this->assertContains('<meta property="og:type" content = "article"/>', $fullMetaText);
        $this->assertContains('<meta property="og:title" content = "Moz Standard Meta Tag Goodness"/>', $fullMetaText);
        $this->assertContains('<meta property="og:url" content = "http://www.puzbie.co.uk"/>', $fullMetaText);
        $this->assertContains('<meta property="og:image" content = "http://path.to.my/image.jpg"/>', $fullMetaText);
        $this->assertContains('<meta property="og:description" content = "Description of the standard meta tag goodness."/>', $fullMetaText);

    }

}


