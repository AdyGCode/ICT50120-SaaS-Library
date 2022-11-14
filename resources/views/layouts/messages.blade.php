<div class="pt-6 -mb-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            @if (session('success'))
                <div class="flex flex-row gap-4 bg-emerald-200 text-emerald-800 p-4 m-4 rounded">
                    <i class="fa fa-check-circle fa-2x"></i>
                    <strong class="pt-1">{{ session('success') }}</strong>
                </div>
            @endif

            @if (session('error'))
                <div class="flex flex-row gap-4 bg-red-200 text-red-800 p-4 m-4 rounded">
                    <i class="fa fa-triangle-exclamation fa-2x"></i>
                    <strong class="pt-1">{{ session('error') }}</strong>
                </div>
            @endif

            @if (session('warning'))
                <div class="flex flex-row gap-4 bg-orange-200 text-orange-800 p-4 m-4 rounded">
                    <i class="fa fa-circle-exclamation fa-2x"></i>
                    <strong class="pt-1">{{ session('warning') }}</strong>
                </div>
            @endif

            @if (session('info'))
                <div class="flex flex-row gap-4 bg-sky-200 text-sky-800 p-4 m-4 rounded">
                    <i class="fa fa-circle-info fa-2x"></i>
                    <strong class="pt-1">{{ session('info') }}</strong>
                </div>
            @endif

        </div>
    </div>
</div>
