<?php

namespace App\Observers;

use App\Action;
use App\Game;

class GameObserver
{
    /**
     * Handle the game "created" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function created(Game $game)
    {
        $action = new Action();
        $action->created_game = $game->name;
        $action->save();
    }

    /**
     * Handle the game "updated" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function updated(Game $game)
    {
        //
    }

    /**
     * Handle the game "deleted" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function deleted(Game $game)
    {

    }

    /**
     * Handle the game "restored" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function restored(Game $game)
    {
        //
    }

    /**
     * Handle the game "force deleted" event.
     *
     * @param  \App\Game  $game
     * @return void
     */
    public function forceDeleted(Game $game)
    {
        //
    }
}
