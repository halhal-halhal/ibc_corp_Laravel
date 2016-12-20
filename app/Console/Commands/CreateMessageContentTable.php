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
 * message_content_id: ユニークキー
 * message_content_message_id: message.message_id
 * message_content_writer_id: 書き込んだ人のuser.user_id
 * message_content_reader_id: 書き込みの対象の人のuser.user_id
 * message_content_text: 書き込まれた内容
 * created_at
 * updated_at
 * deleted_at
 */

class CreateMessageContentTable extends Command
{
    protected $name = "batch:CreateMessageContentTable";
    protected $description = "message_contentテーブルを新規に作成";

    /**
     * 実行
     *
     */
    public function fire()
    {
        $table_name = "message_content";

        if (Schema::hasTable($table_name) === true) {
            echo $table_name . "は既に存在しています．" . PHP_EOL;

        } else {
            Schema::create($table_name, function ($table) use ($table_name) {
                $table->increments($table_name . "_id");
                $table->integer($table_name . "_message_id");
                $table->integer($table_name . "_writer_id");
                $table->integer($table_name . "_reader_id");
                $table->text($table_name . "_text");
            });

            DB::statement("alter table " . $table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $table_name . " add column deleted_at timestamp null");
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
