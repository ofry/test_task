<?php
/**
 * Created by PhpStorm.
 * User: ofryak
 * Date: 10.06.18
 * Time: 14:30
 */

class ReviewMapper extends Mapper
{
    public function getReviews() {
        $sql = "SELECT tbl_reviews.review_id, tbl_reviews.review_title, tbl_reviews.review_text, tbl_users.user_name
            from tbl_reviews
            join tbl_users on (tbl_reviews.user_id = tbl_users.user_id)";
        $stmt = $this->db->query($sql);
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new ReviewEntity($row);
        }
        return $results;
    }

    public function getReviewsByUser($user_id) {
        $sql = "SELECT tbl_reviews.review_id, tbl_reviews.review_title, tbl_reviews.review_text, tbl_users.user_name
            from tbl_reviews
            join tbl_users on (tbl_reviews.user_id = tbl_users.user_id)
            where tbl_reviews.user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["user_id" => $user_id]);
        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new ReviewEntity($row);
        }
        return $results;
    }

    /**
     * Get one review by its ID
     *
     * @param int $review_id The ID of the review
     * @return ReviewEntity  The review
     */
    public function getReviewById($review_id) {
        $sql = "SELECT tbl_reviews.review_id, tbl_reviews.review_title, tbl_reviews.review_text, tbl_users.user_name
            from tbl_reviews
            join tbl_users on (tbl_reviews.user_id = tbl_users.user_id)
            where tbl_reviews.review_id = :review_id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(["review_id" => $review_id]);
        if($result) {
            return new ReviewEntity($stmt->fetch());
        }
    }
}