@props(['task'])

<div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition cursor-move">
    <!-- Task Header -->
    <div class="flex justify-between items-start mb-3">
        <h3 class="font-semibold text-gray-900 flex-1">{{ $task->title }}</h3>

        @if(auth()->check())
            <div class="flex gap-2 items-center">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-xs bg-gray-300">
                    Edit
                </a>
                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        onclick="return confirm('Are you sure you want to delete this task?')"
                        class="btn btn-xs btn-error bg-red-400">
                        Delete
                    </button>
                </form>
            </div>
        @endif
    </div>

    <!-- Task Description -->
    <p class="text-gray-700 text-sm mb-3">
        {{ $task->description }}
    </p>

    <!-- Task Footer -->
    <div class="flex justify-between items-center">
        {{-- Category and Priority Badges (commented) --}}
    </div>
</div>
