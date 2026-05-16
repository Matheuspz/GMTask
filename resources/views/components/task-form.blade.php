@props(['task' => null, 'action' => null, 'method' => 'POST'])

<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900">
                {{ $task ? 'Editar Task' : 'Criar Task' }}
            </h1>
            <p class="text-gray-600 mt-2">
                {{ $task ? 'Atualize os dados da Task' : 'Adicione uma nova Task' }}
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ $action }}" class="space-y-6">
                @csrf
                @if($method !== 'POST')
                    @method($method)
                @endif

                <!-- Title Field -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titulo</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $task?->title) }}"
                        required
                        placeholder="Escreva um Titulo"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('title') border-red-500 @enderror"
                    >
                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Escreva uma descrição (Opcional)"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('description') border-red-500 @enderror"
                    >{{ old('description', $task?->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Field (Radio Buttons) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Status</label>
                    <div class="space-y-3">
                        <!-- Novo -->
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="status_novo"
                                name="status"
                                value="novo"
                                {{ old('status', $task?->status ?? 'novo') === 'novo' ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 focus:ring-2 focus:ring-blue-500"
                            >
                            <label for="status_novo" class="ml-3 text-sm font-medium text-gray-700 cursor-pointer">
                                <span class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                Novo
                            </label>
                        </div>

                        <!-- Em Andamento -->
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="status_em_andamento"
                                name="status"
                                value="em_andamento"
                                {{ old('status', $task?->status) === 'em_andamento' ? 'checked' : '' }}
                                class="w-4 h-4 text-yellow-600 focus:ring-2 focus:ring-yellow-500"
                            >
                            <label for="status_em_andamento"
                                   class="ml-3 text-sm font-medium text-gray-700 cursor-pointer">
                                <span class="inline-block w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                                Em Andamento
                            </label>
                        </div>

                        <!-- Pronto -->
                        <div class="flex items-center">
                            <input
                                type="radio"
                                id="status_pronto"
                                name="status"
                                value="pronto"
                                {{ old('status', $task?->status) === 'pronto' ? 'checked' : '' }}
                                class="w-4 h-4 text-green-600 focus:ring-2 focus:ring-green-500"
                            >
                            <label for="status_pronto" class="ml-3 text-sm font-medium text-gray-700 cursor-pointer">
                                <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                Pronto
                            </label>
                        </div>
                    </div>
                    @error('status')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6">
                    <button
                        type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
                    >
                        {{ $task ? 'Atualizar Task' : 'Create Task' }}
                    </button>
                    <a
                        href="{{ route('tasks.index') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg transition duration-200 text-center"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
