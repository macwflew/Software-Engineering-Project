<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

class ItemResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public bool $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    /**
     * Returns the permissions of the resource.
     *
     * @return array
     */
    protected function permissions(): array
    {
        return [
            'create' => Gate::allows('create-item', $this->resource),
            'update' => Gate::allows('update-item', $this->resource),
            'delete' => Gate::allows('delete-item', $this->resource)
        ];
    }

    /**
     * Get any additional data that should be returned with the resource array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function with(Request $request): array
    {
        return [
            'can' => $this->permissions()
        ];
    }
}
