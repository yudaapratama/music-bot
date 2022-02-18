<?php

namespace App\Bot;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

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
    public function handle($arguments)
    {
      $update  = $this->getUpdate();
      $message = $update->getMessage();
      $chat = $message->getChat();
      $chatId = $chat->getId();
      var_dump($update);

    }
}
