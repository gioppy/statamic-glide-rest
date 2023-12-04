<?php

namespace Gioppy\StatamicGlideRest\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Statamic\Facades\Asset;

class GlideController
{

  public function index(Request $request, string $container, string $path): JsonResponse
  {
    $presets = explode(',', $request->query('presets'));
    $id = "{$container}::{$path}";
    $asset = Asset::findById($id);

    $config = config('statamic.assets.image_manipulation.presets');

    $paths = collect($presets)
      ->filter(fn (string $preset) => array_key_exists($preset, $config))
      ->mapWithKeys(fn (string $preset) => [$preset => $asset->manipulate($config[$preset])]);

    //$asset->manipulate(['w' => 50])
    return response()->json(['data' => collect($asset)->merge(['thumbnails' => $paths])]);
  }
}