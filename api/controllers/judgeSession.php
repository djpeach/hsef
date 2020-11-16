<?php

function saveScore(Slim\Slim $app) {
  return function($id) use($app) {
    $reqBody = $app->req->jsonBody();
    $resBody = [];
    $sessionId = $id;
    $score = $reqBody->score;

    $sql = DB::get()->prepare("UPDATE JudgingSession SET RawScore = ? WHERE JudgingSessionId = ?");
    $sql->execute([$score, $sessionId]);

    $app->res->json($resBody);
  };
}