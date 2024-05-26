<?php

namespace app\services\Suggestion;

use app\models\forms\SuggestionForm;

use app\models\Suggestion;
use app\services\Suggestion\Contracts\SuggestionServiceInterface;

class SuggestionService implements SuggestionServiceInterface
{
    public function create(SuggestionForm $suggestionForm): bool
    {
        $suggestion = new Suggestion();
        $suggestion->username = $suggestionForm->username;
        $suggestion->email = $suggestionForm->email;
        $suggestion->message = $suggestionForm->message;

        return $suggestion->save();
    }
}
