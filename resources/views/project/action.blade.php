    <x-buttons.action :url="route('project.edit',$project)" :theme="'default'">
        <x-icons.edit />Update
    </x-buttons.action>
    <x-buttons.action :url="route('project.delete',$project)" :theme="'red'">
        <x-icons.trash />Delete
    </x-buttons.action>