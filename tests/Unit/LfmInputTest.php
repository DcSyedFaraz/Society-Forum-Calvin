<?php

namespace Tests\Unit;

use Illuminate\Config\Repository;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use App\Support\CustomLfm;

class LfmInputTest extends TestCase
{
    public function test_translate_from_utf8_handles_array_input(): void
    {
        $request = Request::create('/', 'GET', [
            'items' => ['file1.txt', 'file2.txt'],
        ]);
        $config = new Repository(['lfm' => []]);
        $lfm = new CustomLfm($config, $request);

        $result = $lfm->input('items');

        $this->assertSame(['file1.txt', 'file2.txt'], $result);
    }
}
