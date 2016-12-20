<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Schema;
use DB;

class AddLoginTimeColumnToUserTable extends Command
{
    protected $name = "batch:AddLoginTimeColumnToUserTable";
    protected $description = "userテーブルに最終ログイン時間カラムを追加";

    private $table_name = "user";

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 実行
     */
    public function fire()
    {
        try {
            $this->main();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . PHP_EOL;
            throw $e;
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }

    /**
     * 処理
     *
     */
    public function main()
    {
        if (Schema::hasColumn($this->table_name, "user_login_time") === true) {
            echo "{$this->table_name}." . "user_login_time" . "は既に存在しています。" . PHP_EOL;
        } else {
            DB::statement("alter table user add column user_login_time timestamp null default null");

            echo "{$this->table_name}." . "user_login_time" . "を追加しました。" . PHP_EOL;
        }

        return true;
    }
}
