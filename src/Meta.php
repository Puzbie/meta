<?php
namespace Puzbie\Meta;

/**
 * Class Meta
 *
 * @package Puzbie\Meta
 */
class Meta
{
    /**
     * @var array
     */
    private $tags;
    /**
     * @var string
     */
    private $title;
    /**
     * @var array
     */
    private $tagTypes;
    /**
     * @var $string
     */
    private $html;
    /**
     * @var $string
     */
    private $extraHtml;
    /**
     * @const
     */
    const NL = "\n";

    /**
     *
     */
    public function __construct()
    {
        $this->tags = [];
        $this->title = '';
        $this->html = '';
        $this->extraHtml = '';
        $this->tagTypes = [
            'keywords' => 'name',
            'description' => 'name',
            'subject' => 'name',
            'copyright' => 'name',
            'language' => 'name',
            'robots' => 'name',
            'revised' => 'name',
            'abstract' => 'name',
            'topic' => 'name',
            'summary' => 'name',
            'Classification' => 'name',
            'author' => 'name',
            'designer' => 'name',
            'reply-to' => 'name',
            'owner' => 'name',
            'url' => 'name',
            'identifier-URL' => 'name',
            'directory' => 'name',
            'pagename' => 'name',
            'category' => 'name',
            'coverage' => 'name',
            'distribution' => 'name',
            'rating' => 'name',
            'revisit-after' => 'name',
            'subtitle' => 'name',
            'target' => 'name',
            'HandheldFriendly' => 'name',
            'MobileOptimized' => 'name',
            'date' => 'name',
            'search_date' => 'name',
            'DC.title' => 'name',
            'ResourceLoaderDynamicStyles' => 'name',
            'medium' => 'name',
            'syndication-source' => 'name',
            'original-source' => 'name',
            'verify-v1' => 'name',
            'y_key' => 'name',
            'pageKey' => 'name',
            'apple-mobile-web-app-title' => 'name',
            'apple-mobile-web-app-capable' => 'name',
            'apple-touch-fullscreen' => 'name',
            'apple-mobile-web-app-status-bar-style' => 'name',
            'format-detection' => 'name',
            'viewport' => 'name',
            'msapplication-starturl' => 'name',
            'msapplication-window' => 'name',
            'msapplication-navbutton-color' => 'name',
            'application-name' => 'name',
            'msapplication-tooltip' => 'name',
            'msapplication-task' => 'name',
            'msvalidate.01' => 'name',
            'msapplication-TileColor' => 'name',
            'msapplication-square150x150logo' => 'name',
            'msapplication-wide310x150logo' => 'name',
            'msapplication-square310x310logo' => 'name',
            'msapplication-notification' => 'name',
            'csrf-param' => 'name',
            'csrf-token' => 'name',
            'charset' => '',
            '+name' => 'itemprop',
            '+description' => 'itemprop',
            '+image' => 'itemprop',
            'Expires' => 'http-equiv',
            'Pragma' => 'http-equiv',
            'Cache-Control' => 'http-equiv',
            'imagetoolbar' => 'http-equiv',
            'x-dns-prefetch-control' => 'http-equiv',
            'X-UA-Compatible' => 'http-equiv',
            'twitter:card' => 'name',
            'twitter:site' => 'name',
            'twitter:site:id' => 'name',
            'twitter:creator' => 'name',
            'twitter:creator:id' => 'name',
            'twitter:description' => 'name',
            'twitter:title' => 'name',
            'twitter:image' => 'name',
            'twitter:image:width' => 'name',
            'twitter:image:height' => 'name',
            'twitter:image0' => 'name',
            'twitter:image1' => 'name',
            'twitter:image2' => 'name',
            'twitter:image3' => 'name',
            'twitter:player' => 'name',
            'twitter:player:width' => 'name',
            'twitter:player:height' => 'name',
            'twitter:player:stream' => 'name',
            'twitter:player:stream:content_type' => 'name',
            'twitter:data1' => 'name',
            'twitter:label1' => 'name',
            'twitter:data2' => 'name',
            'twitter:label2' => 'name',
            'twitter:app:name:iphone' => 'name',
            'twitter:app:id:iphone' => 'name',
            'twitter:app:url:iphone' => 'name',
            'twitter:app:name:ipad' => 'name',
            'twitter:app:id:ipad' => 'name',
            'twitter:app:url:ipad' => 'name',
            'twitter:app:name:googleplay' => 'name',
            'twitter:app:id:googleplay' => 'name',
            'twitter:app:url:googleplay' => 'name',
            'twitter:app:country' => 'name',
            'og:url' => 'property',
            'og:title' => 'property',
            'og:description' => 'property',
            'og:site_name' => 'property',
            'og:app_id' => 'property',
            'og:type' => 'property',
            'og:locale' => 'property',
            'og:video' => 'property',
            'og:video:url' => 'property',
            'og:video:secure_url' => 'property',
            'og:video:type' => 'property',
            'og:video:width' => 'property',
            'og:video:height' => 'property',
            'og:image' => 'property',
            'og:image:url' => 'property',
            'og:image:secure_url' => 'property',
            'og:image:type' => 'property',
            'og:image:width' => 'property',
            'og:image:height' => 'property',
            'fb:admins' => 'property'
        ];
    }

    /**
     * @param $title string
     *
     * @return void
     */

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the meta title
     * @return string
     */

    public function getMetaTitle()
    {
        return '<title>' . $this->title . '</title>' . self::NL;
    }

    /**
     * Returns the title value
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $html string
     *
     * @return void
     */

    public function setHtml($html)
    {
        $this->html = ' ' . $html;
    }

    /**
     * @param $html string
     *
     * @return void
     */

    public function setExtraHtml($html)
    {
        $this->extraHtml = ' ' . $html;
    }

    /**
     * @return string
     */

    public function getHtml()
    {
        return '<html' . $this->html . $this->extraHtml . '>' . self::NL;
    }

    /**
     * @param $description string
     *
     * @return void
     */

    public function setDescription($description)
    {
        $this->setTag('description', $description);
    }

    /**
     * Returns the meta description
     * @return string
     */

    public function getMetaDescription()
    {
        return $this->getMetaTag('description');
    }

    /**
     * Returns the description value
     * @return string
     */

    public function getDescription()
    {
        return $this->getTag('description.content');
    }

    /**
     * @param $twitterId string
     *
     * @return void
     */

    public function setTwitterId($twitterId)
    {
        $this->setTag('twitter:site', $twitterId);
    }

    /**
     * @return string
     */

    public function getTwitterId()
    {
        return $this->getMetaTag('twitter:site');
    }

    /**
     * @param $fbAdmin string
     *
     * @return void
     */


    public function setFacebookAdmin($fbAdmin)
    {
        $this->setTag('fb:admins', $fbAdmin);
    }

    /**
     * @return string
     */

    public function getFacebookAdmin()
    {
        return $this->getMetaTag('fb:admins');
    }

    /**
     * @param $tagType - either http-equiv, itemprop, name, or property
     * @param $tagId
     * @param $tagContent
     *
     * @return void
     */

    public function setTag($tagId, $tagContent, $tagType = null)
    {

        if ($tagType === null) {
            $tagType = (isset($this->tagTypes[$tagId])) ? $this->tagTypes[$tagId] : "UNKNOWN";
        }
        $this->tags[$tagId] = ['type' => $tagType, 'content' => $tagContent];
    }

    /**
     * Set tags from an array
     * @param array $tagsArray
     *
     * @return void
     */
    public function setTags(array $tagsArray)
    {
        foreach ($tagsArray as $tagId => $tag) {
            $tagContent = null;
            $tagType = null;
            if (is_array($tag)) {
                $tagContent = $tag[0];
                $tagType = $tag[1];
            } else {
                $tagContent = $tag;
            }
            $this->setTag($tagId, $tagContent, $tagType);
        }
    }

    /**
     * @param $tagId
     *
     * @return string
     */

    public function getMetaTag($tagId)
    {
        $cleanTagId = str_replace('+', '', $tagId);
        if (empty($this->tags[$tagId]['type'])) {

            return '<meta ' . $cleanTagId . '="' . $this->tags[$tagId]['content'] . '"/>' . self::NL;
        }

        return '<meta ' . $this->tags[$tagId]['type'] . '="' . $cleanTagId . '" content = "' . $this->tags[$tagId]['content'] . '"/>' . self::NL;
    }

    /**
     * Get a used tag from the tags array using "dot" notation.
     * @param $tag
     * @param  mixed $default
     *
     * @return mixed
     */
    public function getTag($tag, $default = null)
    {
        if (function_exists('array_get')) { //Laravel framework
            return array_get($this->tags, $tag, $default);
        } else {
            $array = $this->tags;
            if (is_null($tag)) return $array;

            if (isset($array[$tag])) return $array[$tag];

            foreach (explode('.', $tag) as $segment) {
                if (!is_array($array) || !array_key_exists($segment, $array)) {
                    return $default;
                }

                $array = $array[$segment];
            }
            return $array;
        }
    }

    /**
     * Return all Meta tags.
     *
     * @return string
     */

    public function getAllMetaTags()
    {
        $html = "";
        foreach ($this->tags as $key => $tag) {
            $html .= $this->getMetaTag($key);
        }
        return $html;
    }

    /**
     * Return all used tags
     * @return array
     */
    public function getAllTags()
    {
        return $this->tags;
    }

    /**
     * Return the title and all Meta tags.
     *
     * @return string
     */

    public function dump()
    {
        //return $this->getTitle();

        return $this->getMetaTitle() . $this->getAllMetaTags();
    }


    /**
     * Clear the title and all Meta tags.
     *
     *   - used primarily for testing Moz functionality.
     *
     * @return void
     */

    public function clear()
    {
        $this->tags = [];
        $this->title = '';
    }


    /**
     * Construct Twitter Summary Card
     *
     * @param $params
     *
     * Required:
     *   - title
     *   - description
     *
     * Optional:
     *   - image
     *   - twitterId
     *   - creatorId
     *
     * @Return void
     */

    public function makeTwitterSummaryCard($params)
    {
        $twitterData = [];
        $this->checkDataExists($params, ['title', 'description']);
        $twitterData['twitter:card'] = 'summary';
        $twitterData['twitter:title'] = $params['title'];
        $twitterData['twitter:description'] = $params['description'];

        if (isset($params['image'])) {
            $twitterData = $this->imageInformation($params['image'], $twitterData);
        }

        if (isset($params['twitterId'])) {
            $twitterData['twitter:site'] = $params['twitterId'];
        }

        if (isset($params['creatorId'])) {
            $twitterData['twitter:creator'] = $params['creatorId'];
        }

        $this->makeMetaCard($twitterData);

    }

    /**
     * Construct Twitter Large Summary Card
     *
     * @param $params
     *
     * Required:
     *   - title
     *   - description
     *
     * Optional:
     *   - image
     *   - twitterId
     *   - creatorId
     *
     * @Return void
     */

    public function makeTwitterLargeSummaryCard($params)
    {

        $this->checkDataExists($params, ['title', 'description']);
        $twitterData = [];
        $twitterData['twitter:card'] = 'summary_large_image';
        $twitterData['twitter:title'] = $params['title'];
        $twitterData['twitter:description'] = $params['description'];
        if (isset($params['image'])) {
            $twitterData = $this->imageInformation($params['image'], $twitterData);
        }

        if (isset($params['twitterId'])) {
            $twitterData['twitter:site'] = $params['twitterId'];
        }

        if (isset($params['creatorId'])) {
            $twitterData['twitter:creator'] = $params['creatorId'];
        }

        $this->makeMetaCard($twitterData);

    }

    /**
     * Construct Twitter App Card
     *
     * @param $params
     *
     * Required:
     *   - twitterId
     *   - appArray
     *
     * Optional:
     *   - description
     *   - country
     *   - creatorId
     *
     * @Return void
     */

    public function makeTwitterAppCard($params)
    {
        $twitterData = [];
        $this->checkDataExists($params, ['twitterId', 'appArray']);
        $twitterData['twitter:card'] = 'app';
        $twitterData['twitter:site'] = $params['twitterId'];

        foreach ($params['appArray'] as $app) {
            if (is_array($app) && sizeof($app === 4)) {
                if (isset($app['platform'])) {
                    $twitterData['twitter:app:name:' . $app['platform']] = $app['name'];
                    $twitterData['twitter:app:id:' . $app['platform']] = $app['id'];
                    $twitterData['twitter:app:url:' . $app['platform']] = $app['url'];
                } else {
                    $appType = $app[0];
                    $twitterData['twitter:app:name.' . $appType] = $app[1];
                    $twitterData['twitter:app:id.' . $appType] = $app[2];
                    $twitterData['twitter:app:url.' . $appType] = $app[3];
                }

            }
        }

        if (isset($params['description'])) {
            $twitterData['twitter:description'] = $params['description'];
        }
        if (isset($params['country'])) {
            $twitterData['twitter:app:country'] = $params['country'];
        }

        if (isset($params['creatorId'])) {
            $twitterData['twitter:creator'] = $params['creatorId'];
        }

        $this->makeMetaCard($twitterData);

    }

    /**
     * Construct Twitter Player Card
     *
     * @param $params
     *
     * Required:
     *   - title
     *   - player
     *
     * Optional:
     *   - description
     *   - twitterId
     *   - creatorId
     *
     * @Return void
     */

    public function makeTwitterPlayerCard($params)
    {

        $twitterData = [];
        $this->checkDataExists($params, ['title', 'playerArray']);
        $twitterData['twitter:card'] = 'player';
        $twitterData['twitter:title'] = $params['title'];
        $twitterData = $this->expandPlayer($params['playerArray'], $twitterData);

        if (isset($params['description'])) {
            $twitterData['twitter:description'] = $params['description'];
        }

        if (isset($params['twitterId'])) {
            $twitterData['twitter:site'] = $params['twitterId'];
        }

        if (isset($params['creatorId'])) {
            $twitterData['twitter:creator'] = $params['creatorId'];
        }


        $this->makeMetaCard($twitterData);

    }

    /**
     * Construct OG Summary Card
     *
     * @param $params
     *
     * Required:
     *   - title
     *   - url
     *   - image
     *   - description
     *
     *  Optional
     *   - siteName
     *   - fbAdmin
     *
     * @Return void
     */

    public function makeOGSummaryCard($params)
    {
        $OGData = [];
        $this->checkDataExists($params, ['title', 'url', 'image', 'description']);
        $OGData['og:type'] = 'article';
        $OGData['og:title'] = $params['title'];
        $OGData['og:url'] = $params['url'];
        $OGData['og:image'] = $params['image'];
        $OGData['og:description'] = $params['description'];

        if (isset($params['siteName'])) {
            $OGData['og:site_name'] = $params['siteName'];

        }
        if (isset($params['fbAdmin'])) {
            $OGData['fb:admins'] = $params['fbAdmin'];
        }

        $this->makeMetaCard($OGData);

    }

    /**
     * Construct Moz Minimum Template
     *
     * @param $params
     *
     *   - https://moz.com/blog/meta-data-templates-123
     *
     * Required:
     *   - title
     *   - description
     *   - url
     *   - image
     *
     * @Return void
     */

    public function makeMozMinimum($params)
    {
        $mozData = [];
        $this->checkDataExists($params, ['title', 'url', 'image', 'description']);
        $this->setTitle($params['title']);
        $this->setDescription($params['description']);
        $mozData['twitter:card'] = 'summary';
        $this->makeMetaCard($mozData);
        $this->makeOGSummaryCard($params);
    }


    /**
     * Construct Moz Standard Template
     *
     * @param $params
     *
     *   - https://moz.com/blog/meta-data-templates-123
     *
     * Required:
     *   - title
     *   - description
     *   - url
     *   - image
     *   - siteName
     *   - twitterId
     *   - fbAdmin
     *
     * @Return void
     */

    public function makeMozStandard($params)
    {
        $this->checkDataExists($params, ['title', 'description', 'url', 'image',
            'siteName', 'twitterId', 'creatorId', 'fbAdmin']);
        $this->setTitle($params['title']);
        $this->setDescription($params['description']);
        $this->makeTwitterSummaryCard($params);
        $this->makeOGSummaryCard($params);

    }

    /**
     * Convert data to meta tags.
     *
     * @param $arrayData
     *
     * @Return void
     */

    private function makeMetaCard($arrayData)
    {
        foreach ($arrayData as $key => $data) {
            $this->setTag($key, $data);
        }

    }

    /**
     * Extract image information from $image parameter
     *
     * @param $image - either one line URI or array of image data.
     * @param $twitterData - existing array of meta data.
     *
     * @Return $twitterData array
     *
     */

    private function imageInformation($image, $twitterData)
    {
        if (!is_array($image)) {
            $twitterData['twitter:image'] = $image;
        } else {
            if (isset($image['image'])) {
                $twitterData['twitter:image'] = $image['image'];
                $twitterData['twitter:image:width'] = $image['width'];
                $twitterData['twitter:image:height'] = $image['height'];
            } else {
                $twitterData['twitter:image'] = $image[0];
                $twitterData['twitter:image:width'] = $image[1];
                $twitterData['twitter:image:height'] = $image[2];
            }

        }
        return $twitterData;

    }

    /**
     * Convert an associative array from one set of keys to another
     *
     * @param $array - associative array to convert.
     * @param $key - table of keys.
     * @return array
     */

    private function keyConvert($array, $key)
    {
        $converted = [];
        foreach ($array as $field => $data) {
            if (isset($key[$field])) {
                $converted[$key[$field]] = $data;
            }
        }
        return $converted;
    }

    /**
     * Expand player data into full twitter tags
     *
     * @param $player - array to convert.
     * @param $twitterData - existing array of meta data.
     * @return array
     */

    private function expandPlayer($player, $twitterData)
    {
        $keys = [
            'player' => 'twitter:player',
            'width' => 'twitter:player:width',
            'player:width' => 'twitter:player:width',
            'height' => 'twitter:player:height',
            'player:height' => 'twitter:player:height',
            'image' => 'twitter:image',
            'stream' => 'twitter:player:stream',
            'player:stream' => 'twitter:player:stream',
            'content_type' => 'twitter:player:stream:content_type',
            'stream:content_type' => 'twitter:player:stream:content_type',
            'player:stream:content_type' => 'twitter:player:stream:content_type',
        ];

        if (is_array($player)) {
            $twitterData = array_merge($twitterData, $this->keyConvert($player, $keys));
        }

        return $twitterData;
    }

    /**
     * Check that keys exist in associative array
     *
     * @param $params - array to check.
     * @param $keyList - list of keys to check.
     * @throws \Exception if key missing.
     * @return void
     */

    private function checkDataExists($params, $keyList)
    {
        foreach ($keyList as $key) {
            if (!isset($params[$key])) {
                throw new \Exception("Required META parameter missing: " . $key);
            }
        }
        return null;
    }

}
