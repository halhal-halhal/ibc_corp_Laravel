<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Console\Command;
use Schema;
use DB;
use Exception;

/**
 * データベース構築バッチ
 *
 */
class CreateEnvironment extends Command
{
    protected $name = "batch:CreateEnvironment";
    protected $description = "データベース構築";

    /**
     * 実行
     *
     */
    public function fire()
    {
        // トランザクションの開始
        DB::transaction();

        // データベースの存在確認
        if (Schema::hasTable($this->table_name) === true) {
            echo $this->table_name . "は既に存在しています．" . PHP_EOL;
            return false;
        }

        // データベースの作成
        // userテーブルの作成
        shell_exec("php artisan batch:CreateUserTable");
        }

        // トランザクションの終了
        DB::transaction();

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
