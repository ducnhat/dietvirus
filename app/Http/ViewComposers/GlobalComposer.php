<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Page;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('currentUser', Auth::user());

        $pages = Page::where('show_on_menu', 1)->where('is_published', 1)->get();
        $view->with('pages', $pages);
    }

}

?>