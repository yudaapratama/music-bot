<?php

namespace App\Bot;

use Telegram;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritdoc
     */
    public function handle()
    {
      // $keyboard = Keyboard::make()
      //             ->inline()
      //             ->row(
      //                 Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data'])
      //               )
      //             ->row(
      //                 Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2'])
      //               );

      $this->replyWithMessage(['text' => 'Hello, i can help you find a music do you like. Send me a name of singer like \'Adele\'. ']);



    }
}
