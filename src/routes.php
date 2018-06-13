<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Template routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// REST API routes

$app->get('/api/reviews/', function (Request $request, Response $response, array $args) {
    // Route log message
    $this->logger->info("REST API '/api/reviews' route");
    $mapper = new ReviewMapper($this->db);
    $reviews = $mapper->getReviews();
    $reviewsJson = array();
    foreach($reviews as $review) {
        $reviewsJson[] = array(
            'review_id' => $review->getId(),
            'review_title' => $review->getTitle(),
            'review_text' => $review->getText(),
            'user_name' => $review->getUserName()
        );
    }
    $response = $response->withJson($reviewsJson);
    return $response;
});
