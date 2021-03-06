<?php

namespace App\Console\Commands;

use Telegram;
use Telegram\Bot\Api;
use Illuminate\Console\Command;

class LongPolling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for running telegram bot.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $token = config('telegram.bot_token');
      $telegram = new Api($token);

      $telegram->addCommands([
        \Telegram\Bot\Commands\HelpCommand::class,
         \App\Bot\StartCommand::class,
      ]);

      echo date('Y-m-d H:i:s') . ' - Running Services ...' . PHP_EOL;
      while (true) {
        $update = $telegram->commandsHandler(false);

        if (!empty($update)) {
          $string = $update[0]->getMessage()->getText();
          if (!strpos($string, "/", 1)) {
            $telegram->sendMessage([
              'chat_id' => $update[0]->getMessage()->getChat()->getId(),
              'text' => 'You search \'' . $string . '\' '
            ]);
          }
        }
      }
    }
}
