<?php

namespace App\Widgets;

use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use DB;
class Taxi extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

     /**
     *  @author Abdelwahed Madani Yousfi 
     * this allow to return taxi widget to super admin dash 
     */
    public function run()
    {
        $count = DB::table('Guid_Taxis')->count();
        $string = trans_choice('Taxi', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-truck',
            'title'  => "{$count} {$string}",
            'text'   => __('Click on button below to view all ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('View all Taxis'),
                'link' => url('/admin/guid-taxi'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return app('VoyagerAuth')->user()->can('browse', Voyager::model('User'));
    }
}
