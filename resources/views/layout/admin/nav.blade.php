<div class="flex w-full py-3  gap-x-2 justify-end items-center">
    <img src="{{ '/storage/admins/' . auth()->guard('admin')->user()->picture }}" class="w-11 h-11 rounded-full shadow-md" alt="">
    <h2 class="text-xl">Hello, Admin <span class="text-amber-400 font-medium">{{ auth()->guard('admin')->user()->username }}</span></h2>
</div>
