<?php
/**
 * Created by PhpStorm.
 * User: ofryak
 * Date: 08.06.18
 * Time: 8:01
 */

class ReviewEntity
{
    protected $review_id;
    protected $user_id;
    protected $review_title;
    protected $review_text;
    protected $user_name;

    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */
    public function __construct(array $data) {

        // no id if we're creating
        if(isset($data['review_id'])) {
            $this->review_id = $data['review_id'];
        }

        $this->user_id = $data['user_id'];
        $this->user_name = $data['user_name'];
        $this->review_title = $data['review_title'];
        $this->review_text = $data['review_text'];
    }

    public function getId() {
        return $this->review_id;
    }

    public function getTitle() {
        return $this->review_title;
    }

    public function getText() {
        return $this->review_text;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getUserName() {
        return $this->user_name;
    }
}