<x-layout>
    <x-slot:title>Editar Task</x-slot:title>
    <x-task-form
        :task="$task"
        :action="route('tasks.update', $task->id)"
        method="PUT"
    />
</x-layout>
