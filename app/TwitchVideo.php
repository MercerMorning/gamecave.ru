<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitchVideo extends Model
{
    public static function getApi()
    {
        $options = [
            'client_id' => 'byy3pdzkkmq9qvtkiub99laerapt08',
        ];

        $twitchApi = new \TwitchApi\TwitchApi($options);
        $user = $twitchApi->getClip('AmazonianEncouragingLyrebirdAllenHuhu');

// By default API responses are returned as an array, but if you want the raw JSON instead:
//        $twitchApi->setReturnJson(true);
//        $user = $twitchApi->getUser(26490481);
//
//// If you want to switch between API versions on the fly:
//        $twitchApi->setApiVersion(3);
//        $user = $twitchApi->getUser('summit1g');
//        return $user;
        return $user['url'];
    }
}
