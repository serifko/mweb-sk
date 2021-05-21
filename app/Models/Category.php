<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $appends = ['treeCategory'];

    public function posts(){
        return $this->has_many(Post::class);
    }
    
    public function getTreeCategoryAttribute(){
        $tree = [];
        $tree[] = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug
        ];
        $checkCat = $this;
        while($checkCat->parent_id != null){
            $checkCat = Category::find($checkCat->parent_id);
            $tree[] = [
                'id' => $checkCat->id,
                'name' => $checkCat->name,
                'slug' => $checkCat->slug
            ];
        } ;
        return array_reverse($tree);
    }


}
