<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Logics\UserLogic;
use App\Http\Logics\messageLogic;
use Request;
use Redirect;
use DB;

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
        "message_data_list" => $this->messageLogic->getDataListAll(),
      ]
      );
    }

    public function detail($message_id)
    {
      return $this->render(
        "admin/message/detail",
        [
          // ユーザー情報 (アクセスユーザのuser_dataと区別するために'account'を使用)
          "message_data" => $this->MessageLogic->getData($message_id),
          "html_class" => "admin messages show",]
        );
      }
  }
