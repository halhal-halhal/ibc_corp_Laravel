<?php

Route::group(["middleware" => ["web",]], function () {
    /**
     * トップページ
     *
     */
    Route::get("/", "IndexController@index");

    /**
     * 静的ページ
     *
     */

    // キャンペーン
    Route::get("/campaign", "StaticController@campaign");
    // 在宅ワーク
    Route::get("/homework", "StaticController@homework");
    // フリーランス
    Route::get("/freelance", "StaticController@freelance");
    // 就職・転職
    Route::get("/recruit", "StaticController@recruit");
    // 単科
    Route::get("/courses", "StaticController@courses");
    // 参加者奮闘記
    Route::get("/gallery", "StaticController@gallery");
    // FAQ
    Route::get("/faq", "StaticController@faq");
    // BLOG
    Route::get("/blog", "StaticController@blog");
    // 研修として社員を参加させたい
    Route::get("/company-01", "StaticController@company");
    // 採用したい
    Route::get("/company-02", "StaticController@company");
    // 卒業生に制作をお願いしたい
    Route::get("/company-03", "StaticController@company");
    // 内定者研修として
    Route::get("/company-04", "StaticController@company");

    /**
     * 新コンタクト
     *
     */
    // 入力画面
    Route::get("/contact", "ContactController@index");
    // コンタクト (キャンペーンからのリダイレクト)
    Route::get("/campaign/contact", "ContactController@campaign");
    // コンタクト (在宅ワークからのリダイレクト)
    Route::get("/homework/contact", "ContactController@homework");
    // コンタクト (フリーランスからのリダイレクト)
    Route::get("/freelance/contact", "ContactController@freelance");
    // コンタクト (就職・転職からのリダイレクト)
    Route::get("/recruit/contact", "ContactController@recruit");
    // コンタクト (単科からのリダイレクト)
    Route::get("/courses/contact", "ContactController@courses");
    // コンタクト (参加者奮闘記からのリダイレクト)
    Route::get("/gallery/contact", "ContactController@gallery");
    // コンタクト (FAQからのリダイレクト)
    Route::get("/faq/contact", "ContactController@faq");
    // コンタクト (BLOGからのリダイレクト)
    Route::get("/blog/contact", "ContactController@blog");
    // コンタクト (企業-01からのリダイレクト)
    Route::get("/company-01/contact", "ContactController@company01");
    // コンタクト (企業-02からのリダイレクト)
    Route::get("/company-02/contact", "ContactController@company02");
    // コンタクト (企業-03からのリダイレクト)
    Route::get("/company-03/contact", "ContactController@company03");
    // コンタクト (企業-04からのリダイレクト)
    Route::get("/company-04/contact", "ContactController@company04");

    /**
     * カリキュラムページ
     *
     */
    // リスト
    Route::get("/caliculam_list/{page?}", "CaliculamController@index")->where("page", "[0-9]+");
    // 詳細
    Route::get("/caliculam/{caliculam_id}", "CaliculamController@detail")->where("caliculam_id", "[0-9]+");

    /**
     * 認証
     *
     */
    // 会員登録
    Route::get("/signup", "AuthController@signup");
    // 会員登録確認
    Route::post("/signup_confirm", "AuthController@signupConfirm");
    // ログイン
    Route::get("/login", "AuthController@login");
    // ログイン確認
    Route::post("/login_confirm", "AuthController@loginConfirm");
    // ツイッターログイン
    Route::get("/twitter_login", "AuthController@twitterLogin");
    // ツイッターログインコールバック
    Route::get("/twitter_login_callback", "AuthController@twitterLoginCallback");
    // ログアウト
    Route::get("/logout", "AuthController@logout");
});

/**
 * マイページ
 *
 */
Route::group(["prefix" => "/mypage/", "namespace" => "Mypage", "middleware" => ["web", "auth_mypage",]], function () {
    // トップページ
    Route::get("/", "IndexController@index");
    // プロフィール入力
    Route::get("/profile/input", "ProfileController@input");
    // プロフィール登録
    Route::post("/profile/confirm", "ProfileController@confirm");
    // プロフィール画像の登録
    Route::post("/profile/upload_profile_image", "ProfileController@uploadProfileImage");
    // パスワード入力
    Route::get("/password/input", "PasswordController@input");
    // パスワード入力確認
    Route::post("/password/confirm", "PasswordController@confirm");
    // カリキュラム一覧
    Route::get("/caliculam_list", "CaliculamController@index");
    // カリキュラム詳細
    Route::get("/caliculam/{caliculam_id}", "CaliculamController@detail")->where("caliculam_id", "[0-9]+");
    // カリキュラム申し込み
    Route::get("/caliculam/regist/{caliculam_id}", "CaliculamController@regist")->where("caliculam_id", "[0-9]+");
    // カリキュラム申し込み完了
    Route::get("/caliculam/regist/complete", "CaliculamController@regist");
    // メッセージ一覧
    Route::get("/message_list", "MessageController@index");
    // メッセージ詳細
    Route::get("/message/{message_id}", "MessageController@detail")->where("message_id", "[0-9]+");
    // メッセージ投稿
    Route::post("/message/confirm", "MessageController@confirm");
});

/**
 * 管理画面
 *
 */
Route::group(["prefix" => "/admin/", "namespace" => "Admin", "middleware" => ["web", "auth_admin"]], function () {
    // トップページ
    Route::get("/", "IndexController@index");
    // ユーザー一覧画面
    Route::get("/user_list/{page?}", "UserController@index")->where("page", "[0-9]+");
    // ユーザー詳細画面
    Route::get("/user/{user_id}", "UserController@detail")->where("user_id", "[0-9]+");

    // ユーザー編集画面
    Route::get("/user/edit/{user_id}", "ProfileController@input");
    // プロフィール登録
    Route::post("/user/confirm", "ProfileController@confirm");

    // ユーザー権限変更 (ajax)
    Route::post("/user/change_user_role", "UserController@changeUserRole");
    // ユーザー削除
    Route::get("/user/delete/{caliculam_id}", "UserController@delete")->where("user_id", "[0-9]+");
    // カリキュラム一覧画面
    Route::get("/caliculam_list/{page?}", "CaliculamController@index")->where("page", "[0-9]+");
    // カリキュラム詳細画面
    Route::get("/caliculam/{caliculam_id}", "CaliculamController@detail")->where("caliculam_id", "[0-9]+");
    // カリキュラム作成画面
    Route::get("/caliculam/edit/{caliculam_id?}", "CaliculamController@edit")->where("caliculam_id", "[0-9]+");
    // カリキュラム登録
    Route::post("/caliculam/confirm", "CaliculamController@confirm");
    // カリキュラム削除
    Route::get("/caliculam/delete/{caliculam_id}", "CaliculamController@delete")->where("caliculam_id", "[0-9]+");
    // レッスン一覧画面
    Route::get("/lessen_list/{page?}", "LessenController@index")->where("page", "[0-9]+");
    // レッスン詳細画面
    Route::get("/lessen/{lessen_id}", "LessenController@detail")->where("lessen_id", "[0-9]+");
    // レッスン作成画面
    Route::get("/lessen/edit/{lessen_id?}", "LessenController@edit")->where("lessen_id", "[0-9]+");
    // レッスン登録
    Route::post("/lessen/confirm", "LessenController@confirm");
    // レッスン削除
    Route::get("/lessen/delete/{lessen_id}", "LessenController@delete")->where("lessen_id", "[0-9]+");
    // メッセージ送信
    Route::get("/send_message", "SendMessageController@index");
    // メッセージ送信 (学生)
    Route::get("/send_message/to_student", "SendMessageController@toStudent");
    // メッセージ送信確認 (学生)
    Route::post("/send_message/to_student_confirm", "SendMessageController@toStudentConfirm");
    // メッセージ送信完了 (学生)
    Route::get("/send_message/to_student_complete", "SendMessageController@toStudentComplete");
    // メッセージ一覧画面
    Route::get("/message_list/{page}", "MessageController@index");
    // メッセージ詳細画面
    Route::get("/message/{message_id}", "MessageController@detail");
    // グループ一覧(作成)画面
    Route::get("/user_group/", "UserGroupController@index");
    // グループ一覧(確認)画面
    Route::post("/user_group/confirm", "UserGroupController@confirm");
});
