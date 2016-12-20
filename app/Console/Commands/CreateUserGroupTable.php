<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Console\Command;
use Schema;
use DB;
use Exception;
use Log;

/**
 * user_groupテーブル作成用バッチ
 *
 * user_group_id
 * user_group_name
 * created_at
 * updated_at
 * deleted_at
 */

class CreateUserGroupTable extends Command
{
    protected $name = "batch:CreateUserGroupTable";
    protected $description = "user_groupテーブルを新規に作成";
    private $table_name = "user_group";

    /**
     * 実行
     *
     */
    public function fire()
    {
        Schema::drop("group");
//        if (Schema::hasTable($this->table_name) === true) {
//            echo $this->table_name . "は既に存在しています．" . PHP_EOL;
//
//        } else {
//            Schema::create($this->table_name, function ($table) {
//                $table->increments($this->table_name . "_id");
//                $table->text($this->table_name . "_name");
//            });
//
//            DB::statement("alter table " . $this->table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
//            DB::statement("alter table " . $this->table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
//            DB::statement("alter table " . $this->table_name . " add column deleted_at timestamp null");
//        }
//
//        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
