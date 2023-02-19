<div x-data="{ show: false}" @click.away="show = false">

    <button @click="show = !show" class="py-2 pl-3 pr-9 text-sm font-semibold"></button>

    {{isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}

    <div x-show="show" class="py-2 absolute w-32" style="display: none">
      {{$slot}}
    </div>
</div>
