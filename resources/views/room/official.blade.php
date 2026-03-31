<x-app-layout title="Official Rooms">
    <x-page.header title="Official Rooms Management" subtitle="Manage and view all official attendance locations and their current status.">
        <x-slot:actions>
            <a href="{{ route('rooms.official.create') }}"
                class="flex items-center justify-center gap-2
                   bg-primary hover:bg-blue-700
                   text-white px-5 py-2.5 rounded-lg
                   shadow-sm hover:shadow
                   transition-all font-medium text-sm group">
                <span
                    class="material-symbols-outlined text-[20px]
                       group-hover:rotate-90 transition-transform">
                    add
                </span>
                Create New Room
            </a>
        </x-slot:actions>
    </x-page.header>

    <x-page.filters>
        <x-filters.search label="Search Rooms" placeholder="Search by name or ID..." />

        <x-filters.select label="Status">
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="draft">Draft</option>
            <option value="archived">Archived</option>
        </x-filters.select>

        <x-filters.select label="Sort By" md="md:col-span-4">
            <option value="date_desc">Date Created (Newest)</option>
            <option value="date_asc">Date Created (Oldest)</option>
            <option value="name_asc">Name (A–Z)</option>
        </x-filters.select>
    </x-page.filters>
    <x-filters.chips>
        <x-filters.chip active count="12">
            Active Rooms
        </x-filters.chip>

        <x-filters.chip count="4">
            Drafts
        </x-filters.chip>

        <x-filters.chip count="8">
            Archived
        </x-filters.chip>
    </x-filters.chips>

    <div
        class="bg-white dark:bg-[#151c2b] rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden flex flex-col">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-12">
                            <input class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                type="checkbox" />
                        </th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Room Name</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider hidden sm:table-cell">
                            Description</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider hidden md:table-cell">
                            Last Active</th>
                        <th
                            class="px-6 py-4 text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right">
                            Actions</th>
                    </tr>
                </thead                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($rooms as $room)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input class="rounded border-slate-300 text-primary focus:ring-primary bg-transparent"
                                type="checkbox" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div
                                    class="size-9 rounded-lg bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-teal-600 dark:text-teal-400 shrink-0">
                                    <span class="material-symbols-outlined text-[20px]">forum</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-semibold text-slate-900 dark:text-white">{{ $room->name }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">ID:
                                        #{{ Str::limit($room->room_uuid, 8, '') }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs hidden sm:table-cell">
                            <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2 break-words">{{ $room->description ?: 'No description provided.' }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($room->delete_status == 1)
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-900/50">
                                <span class="size-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                Archived
                            </span>
                            @else
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-900/50">
                                <span class="size-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                Active
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <span class="text-sm text-slate-600 dark:text-slate-400">{{ $room->formatted_updated_at }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div
                                class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('rooms.official.show', $room->room_uuid) }}"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-primary hover:bg-primary/10 transition-colors"
                                    title="View Details">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </a>
                                <a href="{{ route('rooms.official.edit', $room->room_uuid) }}"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors"
                                    title="Edit Room">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </a>
                                <form action="{{ route('rooms.official.destroy', $room->room_uuid) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors"
                                    title="Delete Room">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                                </form>

                               
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500 dark:text-slate-400">
                             <div class="flex flex-col items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[48px] opacity-20">inventory_2</span>
                                <p class="text-sm">No official rooms found. Create one to get started!</p>
                             </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination Footer -->
        <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/20">
            {{ $rooms->links() }}
        </div>
    </div>

    </div>
       
</x-app-layout>