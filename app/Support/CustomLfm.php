<?php

namespace App\Support;

use UniSharp\LaravelFilemanager\Lfm;

class CustomLfm extends Lfm
{
    /**
     * Override parent to support array inputs without errors.
     *
     * @param  mixed  $input
     * @return mixed
     */
    public function translateFromUtf8($input)
    {
        if (is_array($input)) {
            return array_map(function ($value) {
                return $this->translateFromUtf8($value);
            }, $input);
        }

        if (! is_string($input)) {
            return $input;
        }

        if ($this->isRunningOnWindows()) {
            $input = iconv('UTF-8', mb_detect_encoding($input), $input);
        }

        return $input;
    }
}
