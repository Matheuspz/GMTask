<x-layout>
    <x-slot:title>Criar Task</x-slot:title>
    <x-task-form :action="route('tasks.store')" />
</x-layout>
