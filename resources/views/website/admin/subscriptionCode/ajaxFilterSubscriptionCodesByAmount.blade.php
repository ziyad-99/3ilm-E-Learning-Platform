<table class="table admin" datatable id="datatable-search-list">
    <thead>
    <tr class="bg-orange/30">
        <th class="font-bold uppercase text-orange text-xxs opacity-70">-</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Code') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Balance') }}</th>
        <th class="font-bold uppercase text-orange text-xxs opacity-70">{{ trans('admin/admin.Status') }}</th>
    </tr>
    </thead>
    <tbody>

    @foreach($subscriptionsCodes as $code)
        <tr>
            <td>
                {{ $loop->iteration }}
            </td>
            <td class="text-sm font-medium text-black34 fontp leading-normal">
                {{ $code->code }}
            </td>
            <td class="text-sm font-medium text-black34 fontp leading-normal">
                {{ $code->balance }}
            </td>
            <td class="text-sm font-normal text-black34 fontp leading-normal">
                {{ $code->status == 1 ? 'not Used' : 'Used'}}
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
