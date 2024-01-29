<table class="table admin" datatable id="datatable-search-list">
    <thead>
    <tr class="bg-orange/30">
        <th class="font-bold uppercase text-orange text-xxs opacity-70"></th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.name') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.email') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.subject') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.CourseType') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/allSubscriptions.time') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/addAdmin.status') }}</th>
    </tr>
    </thead>
    <tbody>

    @forelse($subscriptions as $subscription)
        <tr>
            <td class="text-sm font-medium text-black34 fontp flex items-center leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    {{ $loop->iteration }}
                </a>
            </td>

            <td class="text-sm font-medium text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    {{ $subscription->student->lastName }},
                    {{ $subscription->student->firstName }}
                </a>
            </td>

            <td class="text-sm font-normal text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    {{ $subscription->student->email }}
                </a>
            </td>
            <td class="text-sm font-normal text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    {{ $subscription->courseable->title }}
                </a>
            </td>

            <td class="text-sm font-normal text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    @if($subscription->courseable_type === 'App\Models\Course\SupportingCourse')
                        {{ trans('admin/coursesPanel.supporting_courses') }}
                    @elseif($subscription->courseable_type === 'App\Models\Course\LanguageCourse')
                        {{ trans('admin/coursesPanel.languages_courses') }}
                    @elseif($subscription->courseable_type === 'App\Models\Course\IntensiveCourse')
                        {{ trans('admin/coursesPanel.intensive_courses') }}
                    @endif
                </a>
            </td>

            <td class="text-sm font-normal text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    {{ $subscription->created_at }}
                </a>
            </td>

            <td class="text-sm font-normal text-black34 fontp leading-normal">
                <a href="{{ route('admin.subscriptionPanel', ['subscription_id' => $subscription->id]) }}">
                    @if($subscription->status)
                        {{ trans('admin/admin.Accepted') }}
                    @else
                        {{ trans('admin/admin.Notyet') }}
                    @endif
                </a>
            </td>
        </tr>
    @empty

    @endforelse
    </tbody>
</table>
