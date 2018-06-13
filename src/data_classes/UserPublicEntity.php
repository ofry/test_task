<?php
/**
 * Created by PhpStorm.
 * User: ofryak
 * Date: 08.06.18
 * Time: 8:09
 */

class UserPublicEntity // публичные данные пользователя
{
    protected $user_id;
    protected $user_name;

    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */
    public function __construct(array $data) {
        $this->user_id = $data['user_id'];
        $this->user_name = $data['user_name'];
    }

    public function getId() {
        return $this->user_id;
    }

    public function getName() {
        return $this->user_name;
    }
}