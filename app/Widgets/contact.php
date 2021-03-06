<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\ContactUs;

class contact extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     *  @author Abdelwahed Madani Yousfi
     * this allow to return contactus widget to super admin dash 
     */
    public function run()
    {
        $count = ContactUs::count();
        $string = trans_choice('messages', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-logbook',
            'title'  => "{$count} {$string}",
            'text'   => __('all messages ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('check the mail'),
                'link' => url('/admin/wilayas'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *  @author Abdelwahed Madani Yousfi
     * 
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
