<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <textarea name="content" class="w-full border-none mb-3" placeholder="tweet" required autofocus></textarea>
            <x-text-input name="thumbnail" type="file" accept="image/*" class="mt-1 block w-full" />
        </div>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="your avatar" class="rounded-full mr-2" width="50"
                height="50">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                Publish
            </button>
        </footer>
    </form>

    @error('content')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    @error('thumbanail')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
