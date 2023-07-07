    <x-buttons.action :url="route('user.edit',$user)" :theme="'default'">
        <x-icons.edit />Update
    </x-buttons.action>
    @if ($user['id'] != 1)
    <x-buttons.action :url="route('user.delete',$user)" :theme="'red'">
        <x-icons.trash />Delete
    </x-buttons.action>
    @endif