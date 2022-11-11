<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrcreate($data);

        return redirect()->route('admin.tag.index');
    }
}
