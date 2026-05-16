<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900">Suas Tasks</h1>
                <p class="text-gray-600 mt-2">Organize e gerencie suas Tasks</p>
            </div>

            <!-- Kanban Board -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Novo Column -->
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Novo</h2>
                        <span class="bg-blue-200 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">
                            {{ count($tasks['novo'] ?? []) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4">
                        @forelse($tasks['novo'] ?? [] as $task)
                            <x-task :task="$task"/>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-8">Nenhuma Task encontrada</p>
                        @endforelse
                    </div>

                    <form method="GET" action="{{ route('tasks.create') }}">
                        @csrf
                        <button class="w-full py-2 px-4 border-2 border-dashed border-blue-300 text-blue-600 rounded-lg hover:bg-blue-100 transition font-semibold hover:cursor-pointer">
                            + Add Task
                        </button>
                    </form>
                </div>

                <!-- Em Andamento Column -->
                <div class="bg-yellow-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Em Andamento</h2>
                        <span class="bg-yellow-200 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full">
                            {{ count($tasks['em_andamento'] ?? []) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4">
                        @forelse($tasks['em_andamento'] ?? [] as $task)
                            <x-task :task="$task"/>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-8">Nenhuma Task encontrada</p>
                        @endforelse
                    </div>

                    <form method="GET" action="{{ route('tasks.create') }}">
                        @csrf
                        <button class="w-full py-2 px-4 border-2 border-dashed border-yellow-300 text-yellow-600 rounded-lg hover:bg-yellow-100 transition font-semibold hover:cursor-pointer">
                            + Add Task
                        </button>
                    </form>
                </div>

                <!-- Pronto Column -->
                <div class="bg-green-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Pronto</h2>
                        <span class="bg-green-200 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                            {{ count($tasks['pronto'] ?? []) }}
                        </span>
                    </div>

                    <div class="space-y-3 mb-4 opacity-75">
                        @forelse($tasks['pronto'] ?? [] as $task)
                            <x-task :task="$task"/>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-8">Nenhuma Task encontrada</p>
                        @endforelse
                    </div>

                    <form method="GET" action="{{ route('tasks.create') }}">
                        @csrf
                        <button class="w-full py-2 px-4 border-2 border-dashed border-green-300 text-green-600 rounded-lg hover:bg-green-100 transition font-semibold hover:cursor-pointer">
                            + Add Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
