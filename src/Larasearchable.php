<?php

namespace Jochemict\Larasearch;

use Illuminate\Database\Eloquent\Builder;

trait Larasearchable
{
    /**
     *
     * Scope to search multiple columns on the model.
     *
     * @param Builder $query
     * @param string|null $term
     * @return Builder
     */
    public function scopeSearch(Builder $query, ?string $term)
    {
        if(!$term){
            return $query;
        }

        $columns = $this->searchable ?? [];

        if(empty($columns)){
            return $query;
        }

        return $query->where(function ($q) use ($columns, $term) {
            foreach($columns as $column){
                $q->orWhere($column, 'LIKE', "%{$term}%");
            }
        });
    }
}