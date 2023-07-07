    <x-buttons.action :url="route('activity.edit',$activity)" :theme="'default'">
        <x-icons.edit />Update
    </x-buttons.action>
    <x-buttons.action :url="route('activity.delete',$activity)" :theme="'red'">
        <x-icons.trash />Delete
    </x-buttons.action>
    @if ($activity['status.nama'] == 'To Do')
        <x-buttons.action :url=" route('activity.start',$activity)" :theme="'green'">
            <x-icons.play />Start
        </x-buttons.action>
    @endif
    @if ($activity['status.nama'] == "Work In Progress")
        <x-buttons.action :url=" route('activity.finish',$activity)" :theme="'purple'">
            <x-icons.check />Finish
        </x-buttons.action>
    @endif