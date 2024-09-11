<x-admin-layout>
    <div class="admin_container">
        <p>Welcome <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong></p>
        <h3>Welcome back to the school</h3>
    </div>
</x-admin-layout>