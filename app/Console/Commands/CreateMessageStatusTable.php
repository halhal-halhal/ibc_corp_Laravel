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
 * message_status_id
 * message_status_message_id
 * message_status_user_id
 * message_status_read_status
 * created_at
 * updated_at
 * deleted_at
 */

class CreateMessageStatusTable extends Command
{
    protected $name = "batch:CreateMessageStatusTable";
    protected $description = "message_statusテーブルを新規に作成";

    /**
     * 実行
     *
     */
    public function fire()
    {
        $table_name = "message_status";

        if (Schema::hasTable($table_name) === true) {
            echo $table_name . "は既に存在しています．" . PHP_EOL;

        } else {
            Schema::create($table_name, function ($table) use ($table_name) {
                $table->increments($table_name . "_id");
                $table->integer($table_name . "_message_id");
                $table->integer($table_name . "_user_id");
                $table->smallInteger($table_name . "_read_status");
            });

            DB::statement("alter table " . $table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $table_name . " add column deleted_at timestamp null");
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
