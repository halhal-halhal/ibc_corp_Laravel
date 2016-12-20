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
 * caliculam テーブル作成用バッチ
 *
 * caliculam_id
 * caliculam_title
 * caliculam_pr_text
 * caliculam_text
 * caliculam_price
 * caliculam_image
 * created_at
 * updated_at
 * deleted_at
 */

class CreateCaliculamTable extends Command
{
    protected $name = "batch:CreateCaliculamTable";
    protected $description = "caliculamテーブルを新規に作成";
    private $table_name = "caliculam";

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
                $table->text($this->table_name . "_title");
                $table->text($this->table_name . "_pr_text");
                $table->text($this->table_name . "_text");
                $table->integer($this->table_name . "_price");
                $table->text($this->table_name . "_image");
            });

            DB::statement("alter table " . $this->table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column deleted_at timestamp null");
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
