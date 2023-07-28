<?php

namespace Terpise\Solid\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection as ResourceCollectionAlias;

abstract class OriginalCollection extends ResourceCollectionAlias
{
    /**
     * The key that should be used to wrap the resource collection data.
     *
     * @var string|null
     */
    public static $wrap = null;

    public function toArray($request = null)
    {
        return $this->collects()::collection($this->collection);
    }
}
