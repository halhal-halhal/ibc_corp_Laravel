<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Logics\UserGroupLogic;
use Request;
use Redirect;

class UserGroupController extends Controller
{
    private $userGroupLogic;

    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->userGroupLogic = new UserGroupLogic;
    }

    /**
     * トップページ
     *
     */
    public function index()
    {
        return $this->render(
            "admin/user_group/index",
            [
                "user_group_data_list" => $this->userGroupLogic->getDataList(),]
        );
    }

    /**
     * 入力内容確認
     *
     */
    public function confirm()
    {
        $input = Request::all();
        $this->userGroupLogic->insertData($input);

        return Redirect::to("/admin/user_group/");
    }
}
