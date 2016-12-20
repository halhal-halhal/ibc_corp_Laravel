<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Redirect;
use Config;

class ContactController extends Controller
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
     * トップページ
     *
     */
    public function index()
    {
        return $this->render(
            "contact/index",
            [
                "prefecture_data_list" => Config::get("prefecture"),
                "generation_data_list" => Config::get("generation"),
                "gender_data_list" => Config::get("gender"),
                "course_data_list" => Config::get("course"),]
        );
    }

    /**
     * コンタクト (キャンペーンからのリダイレクト)
     *
     */
    public function campaign()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (在宅ワークからのリダイレクト)
     *
     */
    public function homework()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (フリーランスからのリダイレクト)
     *
     */
    public function freelance()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (就職・転職からのリダイレクト)
     *
     */
    public function recruit()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (参加者奮闘記からのリダイレクト)
     *
     */
    public function gallery()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (FAQからのリダイレクト)
     *
     */
    public function faq()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (企業01からのリダイレクト)
     *
     */
    public function company01()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (企業02からのリダイレクト)
     *
     */
    public function company02()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (企業03からのリダイレクト)
     *
     */
    public function company03()
    {
        return Redirect::to("/contact", 301);
    }

    /**
     * コンタクト (企業04からのリダイレクト)
     *
     */
    public function company04()
    {
        return Redirect::to("/contact", 301);
    }

}
