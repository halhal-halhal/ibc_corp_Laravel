<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Logics\UserLogic;
use Request;
use Redirect;
use DB;

class UserController extends Controller
{
    private $userLogic;

    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->userLogic = new UserLogic;
    }

    /**
     * トップページ
     *
     */
    public function index($page = 1)
    {
        return $this->render(
            "admin/user/index",
            [
                "user_data_list" => $this->userLogic->getDataList(),]
        );
    }

    /**
     * 詳細ページ
     *
     */
    public function detail($user_id)
    {
        return $this->render(
            "admin/user/detail",
            [
                // ユーザー情報 (アクセスユーザのuser_dataと区別するために'account'を使用)
                "account_data" => $this->userLogic->getData($user_id),
                "html_class" => "admin users show",]
        );
    }

    public function delete($user_id = null) //ユーザー削除
    {
        $user_data = [];
        if (isset($user_id) && !empty($user_id)) {
          DB::delete('delete from User where user_id = ?',[$user_id]);
        }

        return Redirect::to("/admin/user_list/");
    }
}
