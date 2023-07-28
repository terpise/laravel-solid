<?php

namespace Terpise\Solid\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Collection extends ResourceCollection
{
    /**
     * The key that should be used to wrap the resource collection data.
     *
     * @var string|null
     */
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  Request|null  $request
     */
    public function toArray($request = null): array
    {
        return [
            'data' => $this->collects()::collection($this->collection),
            'meta' => $this->getMeta(),
        ];
    }

    /**
     * Get an array of meta data to include in the resource collection response.
     */
    protected function getMeta(): array
    {
        if ($this->resource instanceof LengthAwarePaginator) {
            return [
                'total' => $this->total(),
                'per_page' => $this->perPage(),
                'total_page' => $this->lastPage(),
                'current_page' => $this->currentPage(),
            ];
        }

        return [
            'total' => $this->count(),
        ];
    }
}
