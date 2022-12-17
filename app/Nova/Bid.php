<?php

namespace App\Nova;

use App\Nova\Actions\InviteParticipant;
use App\Nova\Traits\AdministratorTraits;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Bid extends Resource
{
    use AdministratorTraits;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Bid>
     */
    public static $model = \App\Models\Bid::class;

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->type == \App\Models\User::TYPE_ADMIN) {
            return $query;
        }

        $bids = auth()->user()->joinedBids->pluck('id')->all();
        return $query->whereIn('id', $bids);
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'topic';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'topic',
        'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [

            DateTime::make('Schedule', 'scheduled_date')
                ->rules(['required']),
            Text::make('Topic')->rules(['required']),
            Textarea::make('Description')
                ->alwaysShow()
                ->rules(['required']),
            File::make('Attachment'),
            Text::make('Meeting Link')->rules(['required']),
            Currency::make('Price')
                ->rules(['required']),
            Badge::make('Status')
                ->map([
                    'Active' => 'info',
                    'Done' => 'Success',
                ]),
            HasMany::make('Participants', 'participants', Participant::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            InviteParticipant::make()->canRun(fn () => auth()->user()->type == \App\Models\User::TYPE_ADMIN),
        ];
    }
}
