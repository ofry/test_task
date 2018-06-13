<?php
/**
 * Created by PhpStorm.
 * User: ofryak
 * Date: 10.06.18
 * Time: 14:28
 */

class UserMapper extends Mapper
{
    public function getUsers() {
        $sql = "SELECT user_id, user_name
            from tbl_users";
        $stmt = $this->db->query($sql);
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new UserPublicEntity($row);
        }
        return $results;
    }

    public function getUserById($user_id) {
        $sql = "SELECT user_id, user_name
            from tbl_users where user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["user_id" => $user_id]);
        return new UserPublicEntity($stmt->fetch());
    }
}