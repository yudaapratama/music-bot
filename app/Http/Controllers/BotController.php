<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class BotController extends Controller
{
    public function index()
    {
      // Telegram::setAsyncRequest(true);
      $updates = Telegram::getUpdates();
      return Telegram::commandsHandler(false, ['timeout' => 30]);
    }
}
