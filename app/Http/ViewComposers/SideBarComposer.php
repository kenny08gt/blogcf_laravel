<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;
use App\Tag;

class SideBarComposer{
    public function compose(View $view){
        $categories=Category::orderBy('id','DESC')->get();
        $tags=Tag::orderBy('id','DESC')->get();
        $view->with('category',$categories)
        ->with('tags',$tags);
    }
    
}
?>