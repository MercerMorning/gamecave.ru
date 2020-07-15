<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VkPost extends Model
{
    public $text;
    public $day;
    public $date;
    public $image;
    public $link;

    public static function getApi()
    {
        $owner_id = -93893399;
        $request_params = array(
            'owner_id' => $owner_id,
            'v' => '5.120',
            'count' => '4',
            'access_token' => 'f7724fb9f7724fb9f7724fb98ef700bde5ff772f7724fb9a876b5956c3fa66a1ba69726'
        );
        $get_params = http_build_query($request_params);
        $result = json_decode(file_get_contents('https://api.vk.com/method/wall.get?'. $get_params));
        $items = $result->response->items;
        $posts = [];
        foreach ($items as $item) {
            $post = new VkPost();
            $post->text = Str::limit($item->text, 150);
            $post->day = date('d', $item->date);
            $post->date = date("m.Y",$item->date);
            foreach ($item->attachments as $attach) {
                if (property_exists($attach,'photo')) {
                    $post->image = $attach->photo->sizes[0]->url;
                }
                if (property_exists($attach,'link')) {
                    $post->link = $attach->link->url;
                }
            }
            $posts[] = $post;
        }
        return $posts;
    }
}
