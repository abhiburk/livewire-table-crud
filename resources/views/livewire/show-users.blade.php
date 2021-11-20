<div>
    <div x-data="{ expanded: false }">
        <form wire:submit.prevent="search">
            @csrf
            <div class="overflow-hidden bg-opacity-50 p-5 flex bg-gray-100 bg-gray-100" x-show="expanded" x-collapse>
                <div class="w-10/9 mx-auto">
                    <label for="email-address" class="block text-sm font-normal text-gray-700">
                        Customer/Company Name
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                        <input type="text" name="comp-name" id="comp-name" wire:model.defer="name"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                    </div>
                </div>
                <div class="w-10/9 mx-auto">
                    <label for="email-address" class="block text-sm font-normal text-gray-700">
                        Email
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                        <input type="text" name="Email" id="Email" wire:model.defer="email"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                    </div>
                </div>
                <div class="w-10/9 mx-auto">
                    <label for="email-address" class="block text-sm font-normal text-gray-700">
                        Phone Number
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                        <input type="text" name="Phonenumber" id="Phonenumber" wire:model.defer="phone_number"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                    </div>
                </div>
                <div class="w-10/9 mx-auto">
                    <label for="email-address" class="block text-sm font-normal text-gray-700">
                        Status
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">

                        <select name="status" id="status" wire:model.defer="status"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                            <option value="all">All</option>
                            @foreach ($all_status as $status)
                                <option value="{{ $status }}">{{ ucwords($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-10/9 mx-auto self-center">
                    <button type="submit"
                        class="w-40 mx-auto text-center z-10 block rounded-full focus:outline-none py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-7 mt-5">

                        <span class="text-xs self-center font-normal text-white"> Search</span>
                </button>

                </div>
            </div>
        </form>
        <div class="flex justify-between pt-8 bg-white pb-6 px-5">
            <div class="flex justify-between bg-white">
                <div x-data="{ dropdownOpen: false }" class="relative self-center  bottom-0 ">
                    <a href="javascript:void(0)" @click="dropdownOpen = !dropdownOpen"
                        class="relative z-10 block rounded-full focus:outline-none flex py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-7 ">
                        action
                        <svg class="h-2 w-2 self-center ml-2" width="14" height="9" viewBox="0 0 14 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9L0.0717953 -3.51391e-07L13.9282 8.59975e-07L7 9Z" fill="#ffffff" />
                        </svg>
                    </a>
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                    <div x-show="dropdownOpen" class="absolute left-0 mt-2 w-48 bg-white rounded-md border z-20">
                        @foreach ($all_status as $status)
                            <a wire:click="bulkStatusUpdate('{{ $status }}')" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-100">
                                {{ $status }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="px-5">
                    <a href="javascript:void(0)" wire:click="bulkDelete"
                        class="relative z-10 block rounded-full focus:outline-none flex py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-5 w-20">
                        Delete
                    </a>
                </div>
            </div>
            
            
            <div class="flex space-x-6">
                {{-- <div x-data="{ dropdownOpen: false }" class="relative self-center  bottom-0 ">
                    <a href="javascript:void(0)" @click="dropdownOpen = !dropdownOpen"
                        class="relative z-10 block rounded-full focus:outline-none flex py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-7 ">
                        Columns
                        <svg class="h-2 w-2 self-center ml-1" width="14" height="9" viewBox="0 0 14 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 9L0.0717953 -3.51391e-07L13.9282 8.59975e-07L7 9Z" fill="#ffffff" />
                        </svg>
                    </a>
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10">
                    </div>
                    <div x-show="dropdownOpen" class="absolute left-0 mt-2 w-48 bg-white rounded-md border z-20">
                        <a href="manage-user.html" class="px-4 py-2  hover:bg-gray-100 flex">
                            <input type="checkbox" class="form-checkbox text-primary-600 mr-1 self-center" checked />
                            <span class="self-center text-sm capitalize text-gray-700">Payment Status</span>
                        </a>
                        <a href="setting.html"
                            class="px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-100 flex">
                            <input type="checkbox" class="form-checkbox text-primary-600 mr-1" checked />
                            <span class="self-center text-sm capitalize text-gray-700">Created At</span>
                        </a>

                    </div>
                </div>

                <a href="javascript:void(0)"
                    class="relative z-10 block focus:outline-none flex border border-transparent focus:outline-none focus:ring-0 focus:ring-0">
                    <div
                        class="bg-primary-600 hover:bg-indigo-700 w-7 h-7 rounded-full flex justify-center text-center mr-2">
                        <img src="../img/admin/avatar_profile_icon.svg" alt="avatar_profile_icon.svg"
                            class="w-4 h-4 self-center mx-auto">
                    </div>
                    <span class="text-sm self-center font-normal text-black">203 Customers</span>
                </a> --}}
                <a href="javascript:void(0)" @click="expanded = ! expanded"
                    class="relative z-10 block focus:outline-none flex border border-transparent focus:outline-none focus:ring-0 focus:ring-0">
                    <div
                        class="bg-primary-600 hover:bg-indigo-700 w-7 h-7 rounded-full flex justify-center text-center mr-2">
                        <svg class="w-3 h-3 self-center mx-auto" width="9" height="9" viewBox="0 0 9 9" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.79913 8.93097C3.76585 8.93097 3.73257 8.9225 3.70253 8.90556C3.6406 8.87071 3.6022 8.80513 3.6022 8.73404V4.53487L0.455333 0.384939C0.410138 0.325466 0.402654 0.245413 0.435936 0.178358C0.469217 0.111303 0.537552 0.0690613 0.612288 0.0690613H8.38772C8.46256 0.0690613 8.5308 0.111402 8.56408 0.178358C8.59736 0.245315 8.58988 0.325367 8.54468 0.384939L5.39782 4.53487V7.88428C5.39782 7.95311 5.36188 8.01701 5.30299 8.05266L3.90114 8.90241C3.86992 8.92142 3.83448 8.93097 3.79913 8.93097ZM1.00871 0.462924L3.95598 4.34976C3.98198 4.38402 3.99596 4.42577 3.99596 4.4687V8.38439L5.00385 7.77341V4.4687C5.00385 4.42567 5.01794 4.38392 5.04383 4.34976L7.9913 0.462924H1.00871ZM5.20088 7.88428H5.20187H5.20088Z"
                                fill="white" />
                        </svg>
                    </div>
                    <span class="text-sm self-center font-normal text-black">Filter</span>
                </a>
            </div>
        </div>
    </div>

    <div class="shadow border-b border-gray-200 sm:rounded-lg mb-5 ">
        <table class="min-w-full divide-y divide-gray-200 w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <input type="checkbox" class="form-checkbox text-primary-600" wire:model="all_users_selected"/>
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Phone Numer
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Company Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <input type="checkbox" class="form-checkbox text-primary-600" name="selected_users" wire:model="selected_users" value="{{ $user->id }}"/>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm font-normal text-gray-500">
                                {{ $user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-sm text-gray-500">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap  ">
                            <div class="text-sm text-gray-500">
                                {{ $user->phone_number }}
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap ">
                            <div class="text-sm text-gray-500">
                                {{ $user->company_name }}
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap ">
                            <div x-data="{ dropdownOpen: false }" class="relative self-center  bottom-0 ">
                                <a href="javascript:void(0)" @click="dropdownOpen = !dropdownOpen"
                                    class="relative z-10 block rounded-full focus:outline-none flex py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-5 {{ $user->status == 'suspended' ? 'w-32' : ($user->status == 'in active' ? 'w-28' : 'w-24')  }}">
                                    {{ $user->status }}
                                    <svg class="h-2 w-2 self-center ml-1" width="14" height="9" viewBox="0 0 14 9"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 9L0.0717953 -3.51391e-07L13.9282 8.59975e-07L7 9Z" fill="#ffffff" />
                                    </svg>
                                </a>
                                <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                    class="fixed inset-0 h-full w-full z-10"></div>
                                <div x-show="dropdownOpen"
                                    class="absolute left-0 mt-2 w-48 bg-white rounded-md border z-20">
                                    @foreach (array_diff($all_status,[$user->status]) as $status)
                                        <a wire:click="statusUpdate({{ $user->id }},'{{ $status }}')"
                                            class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-gray-100">
                                            {{ $status }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap ">
                            <a href="javascript:void(0)" wire:click="delete({{ $user->id }})"
                                class="relative z-10 block rounded-full focus:outline-none flex py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-5 w-20">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-2 whitespace-nowrap text-center">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
