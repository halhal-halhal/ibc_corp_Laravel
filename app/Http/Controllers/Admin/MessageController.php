<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Logics\UserLogic;
use App\Http\Logics\messageLogic;

class MessageController extends Controller
{
  private $userLogic;
  private $messageLogic;

  /**
  * コンストラクタ
  *
  */
  public function __construct()
  {
    parent::__construct();

    $this->userLogic = new UserLogic;
    $this->messageLogic = new MessageLogic;
  }

  public function index($page = 1)
  {
    return $this->render(
      "admin/message/index",
      [
        "message_data_list" => $this->userLogic->getDataList(),]
      );
    }
  }
