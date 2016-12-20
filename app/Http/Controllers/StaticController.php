<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Exception;
use Redirect;
use Config;

class StaticController extends Controller
{
    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * キャンペーン
     *
     */
    public function campaign()
    {
        return $this->render(
            "static/campaign",
            []
        );
    }

    /**
     * 在宅ワーク
     *
     */
    public function homework()
    {
        return $this->render(
            "static/homework",
            []
        );
    }

    /**
     * フリーランス
     *
     */
    public function freelance()
    {
        return $this->render(
            "static/freelance",
            []
        );
    }

    /**
     * 就職・転職
     *
     */
    public function recruit()
    {
        return $this->render(
            "static/recruit",
            []
        );
    }

    /**
     * 単科
     *
     */
    public function courses()
    {
        return $this->render(
            "static/courses",
            []
        );
    }

    /**
     * 参加者奮闘記
     *
     */
    public function gallery()
    {
        return $this->render(
            "static/gallery",
            []
        );
    }

    /**
     * FAQ
     *
     */
    public function faq()
    {
        return $this->render(
            "static/faq",
            []
        );
    }

    /**
     * BLOG
     *
     */
    public function blog()
    {
        return $this->render(
            "static/blog",
            []
        );
    }

    /**
     * 企業様
     *
     */
    public function company()
    {
        // 呼び出しパスの取得 (campaign_01など)

        $request_path = Request::path();

        // 呼び出しパスに合わせてViewファイルを変更
        if ($request_path === "company-01") {
            $view_file = "static/company/01";
        } elseif ($request_path === "company-02") {
            $view_file = "static/company/02";
        } elseif ($request_path === "company-03") {
            $view_file = "static/company/03";
        } elseif ($request_path === "company-04") {
            $view_file = "static/company/04";
        } else {
            throw new Exception("呼び出しパス: " . $request_path ." 存在しない卒業後ページへのアクセスが有りました。");
        }

        return $this->render(
            $view_file,
            []
        );
    }

}
