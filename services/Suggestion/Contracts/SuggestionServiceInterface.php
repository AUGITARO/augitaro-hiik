<?php

namespace app\services\Suggestion\Contracts;

use app\models\forms\SuggestionForm;

interface SuggestionServiceInterface
{
    public function create(SuggestionForm $suggestionForm): bool;
}