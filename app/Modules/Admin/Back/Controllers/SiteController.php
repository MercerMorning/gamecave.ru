<?php

namespace App\Modules\Admin\Back\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Parsing;
use App\Site;
use http\Env\Request;

class SiteController extends Controller
{
    public function add($request)
    {
        $sitesList = config('site.sites');
        if ($sitesList) {
            foreach ($sitesList as $key => $value) {
                $site = new Site();
                $site->site_name = $key;
                $site->game_name = $request->name;
                $site->game_url = Parsing::getStatus($key, getUrlName($request->name), $value);
                $site->price = clearPrice(Parsing::getPrice($key, getUrlName($request->name), $value));
                $site->save();
            }
        }
    }

    public static function update()
    {
        $sitesList = config('site.sites');
        $site = new Site();
        $games = $site->newQuery()->select('game_name')->groupBy('game_name')->limit(count(config('site.sites')) * 1)->get();
        $games = $site->newQuery()->select('game_name')->groupBy('game_name')->limit(count(config('site.sites')) * count($games))->get();
        foreach ($games as $game)
        {
            if ($sitesList) {
                foreach ($sitesList as $key => $value) {
                    $site = new Site();
                    $site->site_name = $key;
                    $site->game_name = $game->game_name;
                    $site->game_url = Parsing::getStatus($key, $game->game_name, $value);
                    $site->price = clearPrice(Parsing::getPrice($key, $game->game_name, $value));
                    $site->save();
                }
            }
        }
    }
}
