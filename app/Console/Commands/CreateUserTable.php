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
 * userテーブル作成用バッチ
 *
 * user_id
 * user_name
 * user_real_name
 * user_email
 * user_password
 * user_image
 * user_birthday
 * user_gender
 * user_address
 * user_role
 * user_rank
 * user_pr_text
 * user_facebook_id
 * user_facebook_access_token
 * user_twitter_id
 * user_twitter_access_token
 * user_is_mail_magazine
 * created_at
 * updated_at
 * deleted_at
 */

class CreateUserTable extends Command
{
    protected $name = "batch:CreateUserTable";
    protected $description = "userテーブルを新規に作成";
    private $table_name = "user";

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
                $table->text($this->table_name . "_name");
                $table->text($this->table_name . "_real_name");
                $table->text($this->table_name . "_email");
                $table->text($this->table_name . "_password");
                $table->text($this->table_name . "_image");
                $table->text($this->table_name . "_birthday");
                $table->smallInteger($this->table_name . "_gender");
                $table->text($this->table_name . "_address");
                $table->smallInteger($this->table_name . "_role");
                $table->text($this->table_name . "_pr_text");
                $table->text($this->table_name . "_facebook_id");
                $table->text($this->table_name . "_facebook_access_token");
                $table->text($this->table_name . "_twitter_id");
                $table->text($this->table_name . "_twitter_access_token");
                $table->smallInteger($this->table_name . "_is_mail_magazine");
            });

            DB::statement("alter table " . $this->table_name . " add column created_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column updated_at timestamp default '0000-00-00 00:00:00'");
            DB::statement("alter table " . $this->table_name . " add column deleted_at timestamp null");
        }

        echo $this->name . "の実行を完了しました．" . PHP_EOL;
    }
}
