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
 * message_id: ユニークキー
 * message_user_id: 最初に投稿した人のuser.user_id
 * created_at
 * updated_at
 * deleted_at
 */

class CreateMessageTable extends Command
{
    protected $name = "batch:CreateMessageTable";
    protected $description = "messageテーブルを新規に作成";
    private $table_name = "message";

    /**
     * 実行
     *
     */
    public function fire()
    {
        if (Schema::hasTable($this->table_name) === true) {
            echo $this->table_name . "は既に存在しています．" . PHP_EOL;

        } else {
            Schema::create($this->table_name, function ($table) {
                $table->increments($this->table_name . "_id");
                $table->integer($this->table_name . "_user_id");
            });

            DB::statement("alter table " . $this->table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column deleted_at timestamp null");
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
