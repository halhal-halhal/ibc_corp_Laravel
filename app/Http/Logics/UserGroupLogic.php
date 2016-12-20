<?php

namespace App\Http\Logics;

use App\Http\Models\UserGroupModel;
use Session;
use Exception;

class UserGroupLogic
{
    private $userGroupModel;

    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        $this->userGroupModel = new UserGroupModel;
    }

    /**
     * ユーザグループグループ情報を登録
     *
     */
    public function insertData(array $input)
    {
        $insert_record = $this->userGroupModel->insertData(
            [
                "user_group_name" => $input["user_group_name"],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),]
        );

        if (count($insert_record) < 1) {
            throw new Exception("ユーザグループ情報の登録に失敗しました。");
        }

        return true;
    }

    /**
     * ユーザグループ情報の更新
     *
     */
    public function updateData(array $where_data, array $update_data)
    {
        $update_record = $this->userGroupModel->updateData($where_data, $update_data);

        if (count($update_record) < 1) {
            throw new Exception("ユーザグループ情報の更新に失敗しました。");
        }

        return true;
    }

    /**
     * ユーザグループ情報の論理削除
     *
     */
    public function deleteData($user_group_id)
    {
        $delete_record = $this->userGroupModel->deleteData(
            [
                [
                    "key" => "user_group.user_gourp_id",
                    "operator" => "=",
                    "value" => $user_group_id,]],
            [
                "user_group.deleted_at" => date("Y-m-d H:i:s"),]
        );


        if (count($delete_record) < 1) {
            throw new Exception("ユーザグループの論理削除に失敗しました。");
        }

        return true;
    }

    /**
     * ユーザグループ情報を取得
     *
     */
    public function getData($user_group_id)
    {
        $user_group_data = $this->userGroupModel->getData(
            [
                [
                    "key" => "user_group.user_gourp_id",
                    "operator" => "=",
                    "value" => $user_group_id,]]
        );

        if (count($user_group_data) < 1) {
            throw new Exception("ユーザグループ情報の取得に失敗しました。");
        }

        return $user_group_data->toArray();
    }

    /**
     * ユーザグループ一覧情報を取得
     *
     */
    public function getDataList()
    {
        $user_group_data_list = $this->userGroupModel->getDataList([]);

        // 0件の場合がある
        if (count($user_group_data_list) < 1) {
            return [];
        }

        return $user_group_data_list->toArray();
    }
}
