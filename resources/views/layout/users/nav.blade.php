<div class="flex w-full py-3  gap-x-2 justify-end items-center">
    <img src="{{ '/storage/users/' . auth()->user()->picture }}" class="w-12 h-12 rounded-full shadow-md" alt="">
    <h2 class="text-xl">Hello, <span class="text-amber-400 font-medium">{{ auth()->user()->firstname }}</span></h2>
</div>
