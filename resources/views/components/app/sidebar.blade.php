<!-- Sidebar start  -->
<aside class="w-[15vw]" aria-label="Sidebar">
    <div class="overflow-y-scroll h-[91vh] max-h-[91vh]  py-4 px-3
 bg-gradient-to-b from-[#4f8db3] via-[#2d599f] to-[#4f8db3]
 text-slate-100">
        <ul class="space-y-2">

            <x-app.nav-link url="/admin/dashboard" text="Dashboard" :active="request()->is('admin/dashboard') || request()->is('admin/dashboard/*') || request()->is('admin/dashboard/*/*')" icon="fa fa-edit"></x-appnav-link>

                <x-app.nav-link url="/admin/employer" text="Employers" :active="request()->is('admin/employer') || request()->is('admin/employer/*') || request()->is('admin/employer/*/*')" icon="fa fa-edit"></x-appnav-link>

        </ul>
    </div>
</aside>

<!-- Sidebar end  -->
