<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 lg:p-20">
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl mt-[-70px]">
        <div class="grid grid-cols-7 grid-rows-2 gap-4 py-0">
            <!-- Borrow Status and Items Status -->
            <div class="col-span-3 flex justify-center items-center text-gray-800">BORROW STATUS</div>
            <div class="col-span-3 col-start-5 row-start-1 flex justify-center items-center text-gray-800">ITEM STATUS</div>
            
            <div class="col-start-1 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">RETURNED</div>
                <div class="text-gray-100 bg-green-600 px-16 py-2 rounded-md" id="returned-borrow-count"></div>
            </div>
            
            <div class="col-start-2 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">Pending</div>
                <div class="text-gray-100 bg-yellow-600 px-16 py-2 rounded-md" id="pending-borrow-count"></div>
            </div>
            
            <div class="col-start-3 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">Total</div>
                <div class="text-gray-800 px-11 py-2" id="total-borrow-count"></div>
            </div>
            
            <div class="col-start-5 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">Available</div>
                <div class="text-gray-100 bg-green-600 px-16 py-2 rounded-md" id="available-item-count"></div>
            </div>
            <div class="col-start-6 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">Borrowed</div>
                <div class="text-gray-100 bg-yellow-600 px-16 py-2 rounded-md" id="borrowed-item-count"></div>
            </div>
            <div class="col-start-7 row-start-2 flex flex-col justify-center items-center">
                <div class="text-gray-600">Total</div>
                <div class="text-gray-800" id="total-item-count"></div>
            </div>
            
            <!-- The vertical line div centered inside its grid position -->
            <div class="row-span-2 col-start-4 row-start-1 flex justify-center items-center">
                <div class="h-full w-1 bg-gray-300 rounded-full py-11"></div> <!-- Solid vertical line -->
            </div>
        </div>                         
    </div>
    {{-- table for borrow record --}}
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        <p class="text-center text-2xl py-10">Borrowed Items Record</p>
        <!-- Filters -->
        <p>Filters:</p>
        <div class="flex items-center justify-between mb-4">
            <div class="flex space-x-4">
                <select id="month-filter" class="p-2 border rounded-lg">
                    <option value="">Months</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select id="status-filter" class="p-2 border rounded-lg">
                    <option value="">Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Returned">Returned</option>
                    <!-- Add more statuses as needed -->
                </select>
            </div>
            <!-- Button to open the modal -->
            <div class="bg-blue-400 text-white rounded-md px-3 hover:bg-custom-blues hover:-translate-y-1 transition-transform duration-300 transform">
                <button id="openModal" class="p-2">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto text-sm">
            <table id="postss-table" class="min-w-full display">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Borrower ID</th>
                        <th class="px-4 py-2">Item No.</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Create Date</th>
                        <th class="px-4 py-2">IT Approver</th>
                        <th class="px-4 py-2">IT Receiver</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Borrower ID</th>
                        <th class="px-4 py-2">Item Key</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Create Date</th>
                        <th class="px-4 py-2">IT Approver</th>
                        <th class="px-4 py-2">IT Receiver</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>      
    {{-- table for borrow record end--}}
    {{-- Table for items --}}
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        <p class="text-center text-2xl py-10">Items Record</p>
        <!-- Filters -->
        <p>Filters:</p>
        <div class="flex items-center justify-between mb-4">
            <div class="flex space-x-4">
                <select id="item-month-filter" class="p-2 border rounded-lg">
                    <option value="">Months</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>                
            </div>
            <!-- Button to open the modal -->
            <div class="bg-blue-400 text-white rounded-md px-3 hover:bg-custom-blues hover:-translate-y-1 transition-transform duration-300 transform">
                <button id="openModal-item" class="p-2">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto text-sm">
            <table id="items-table" class="min-w-full display">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Item No.</th>
                        <th class="px-4 py-2">Date Arrived</th>
                        <th class="px-4 py-2">Date Created</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Item No.</th>
                        <th class="px-4 py-2">Date Arrived</th>
                        <th class="px-4 py-2">Date Created</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>    
    {{-- Table for items end --}}
    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 transition-opacity hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3 transform transition-transform duration-300 ease-in-out scale-95 opacity-0" id="modalContent">
            <h2 class="text-lg font-semibold mb-4">New Record Details</h2>
            <!-- Your Form -->
            <form action="{{ route('loan.store') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="flex flex-row space-x-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="borrower-id" id="borrower-id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="borrower-id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Borrower Id No</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="borrower-name" id="borrower-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="borrower-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Borrower Name</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="item-key" id="item-key" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="item-key" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Item No.</label>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="return-date" id="return-date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="return-date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Return Date</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="it-approver" id="it-approver" value="{{ Auth::user()->name }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="it-approver" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">IT Approver</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description(Reason).</label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button type="button" id="closeModal" class="mt-4 bg-red-500 text-white rounded-lg px-4 py-2">Close</button>
            </form>
            <!-- End of Form -->
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 hidden" id="editModal">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg mx-4 md:max-w-md h-[80%] overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4">Update Record</h2>
            <form id="editForm" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="row-id" name="row-id">
                <div class="mb-4">
                    <label for="borrower-id" class=" hidden block text-sm font-medium text-gray-700">Borrower ID</label>
                    <input type="text" id="borrower-id" name="borrower-id" class=" hidden mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled>
                </div>
                <div class="mb-4">
<<<<<<< HEAD
                    <label for="item-key" class="block text-sm font-medium text-gray-700">Item No.</label>
                    <input type="text" id="item-key-update" name="item-key" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled>
=======
                    <label for="item-key" class=" hidden block text-sm font-medium text-gray-700">Item No.</label>
                    <input type="text" id="item-key-update" name="item-key" class=" hidden mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled>
>>>>>>> 530b4ba755d208b125ecce5873237e116c49244b
                </div>
                <div class="mb-4">
                    <label for="due-date" class=" hidden block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="datetime-local" id="due-date" name="due-date" class=" hidden mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled>
                </div>
                <div class="mb-4">
                    <label for="description" class=" hidden block text-sm font-medium text-gray-700">Description(Reason)</label>
                    <textarea id="description" name="description" class=" hidden mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled></textarea>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900">
                        <option value="Returned">Returned</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="it-receiver" class="block text-sm font-medium text-gray-700">IT Receiver</label>
                    <input type="text" id="it-receiver" name="it-receiver" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900">
                </div>
                <div class="mb-4">
                    <label for="item-returner-name" class="block text-sm font-medium text-gray-700">Returner Name</label>
                    <input type="text" id="item-returner-name" name="item-returner-name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900">
                </div>
                <div class="mb-4">
                    <label for="item-returner-id" class="block text-sm font-medium text-gray-700">Returner ID</label>
                    <input type="text" id="item-returner-id" name="item-returner-id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900">
                </div>
                <div class="mb-4">
                    <label for="item-key-after-return" class="block text-sm font-medium text-gray-700">Item No. (After Return)</label>
                    <input type="text" id="item-key-after-return" name="item-key-after-return" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900">
                </div>
                <div class="mb-4">
                    <label for="after-condition" class="block text-sm font-medium text-gray-700">Item Image (after return)</label>
                    <input type="file" id="after-condition" name="after-condition" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500">
                </div>            
                <div class="mb-4" id="current-image">
                    <label for="current-condition" class="block text-sm font-medium text-gray-900">Current Image</label>
                    <img alt="Current Image" id="current-condition">
                </div>                        
                <div class="flex gap-2">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5" id="saveChanges">Save Changes</button>
                    <button type="button" id="closeModals" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5">Close</button>
                </div>
            </form>
        </div>
    </div>
    {{-- item table modals --}}
    <!-- Modal add for item -->
    <div id="myModal-item" class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 transition-opacity hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3 transform transition-transform duration-300 ease-in-out scale-95 opacity-0" id="modalContent-item">
            <h2 class="text-lg font-semibold mb-4">New Item Record</h2>
            <!-- Form -->
            <form action="{{ route('item.store') }}" enctype="multipart/form-data" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="flex flex-row space-x-5">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="item-no" id="item-no" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="item-no" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Item No.</label>
                    </div>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="item-type" id="item-type" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="item-type" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Item Type</label>
                </div>
                <div class="grid md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="datetime-local" name="date-arrived" id="date-arrived" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                        <label for="date-arrived" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Arrived</label>
                    </div>
                </div>
                <div class="grid md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="file" name="image-item" id="image-item" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
                        <label for="image-item" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <button type="button" id="closeModal-item" class="mt-4 bg-red-500 text-white rounded-lg px-4 py-2">Close</button>
            </form>
            <!-- End of Form -->
        </div>
    </div>
    {{-- item table modals end--}}
    <!-- Edit Modal for item -->
    <div class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 hidden" id="edit-item-modal">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg mx-4 md:max-w-md h-[80%] overflow-y-auto">
            <h2 class="text-lg font-semibold mb-4">Edit Record</h2>
            <form id="editFormItem" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-item-row-id" name="edit-item-row-id">
                <div class="mb-4">
                    <label for="edit-item-item-key" class="block text-sm font-medium text-gray-700">Item No.</label>
                    <input type="text" id="edit-item-item-key" name="edit-item-item-key" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500" disabled>
                </div>
                <div class="mb-4">
                    <label for="edit-item-item-type" class="block text-sm font-medium text-gray-700">Item Type</label>
                    <input type="text" id="edit-item-item-type" name="edit-item-item-type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-700">
                </div>
                <div class="mb-4">
                    <label for="edit-item-status" class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="text" id="edit-item-status" name="edit-item-status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-700" disabled>
                </div>
                {{-- <div class="mb-4">
                    <label for="edit-item-status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="edit-item-status" name="edit-item-status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" disabled>
                        <option value="" disabled selected>Select an option</option>
                        <option value="Available">Available</option>
                        <option value="Borrowed">Borrowed</option>
                    </select>
                </div> --}}
                <div class="mb-4">
                    <label for="edit-item-arrive" class="block text-sm font-medium text-gray-700">Date Arrive</label>
                    <input type="datetime-local" id="edit-item-arrive" name="edit-item-arrive" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500">
                </div>
                <div class="mb-4">
                    <label for="edit-item-image" class="block text-sm font-medium text-gray-900">Item Image</label>
                    <input type="file" id="edit-item-image" name="edit-item-image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-500">
                </div>
                <div class="mb-4" id="current-image-item">
                    <label for="edit-item-current-condition" class="block text-sm font-medium text-gray-900">Current Image</label>
                    <img alt="Current Image" id="edit-item-current-condition">
                </div>
                <div class="flex gap-2">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5" id="edit-item-saveChanges">Save Changes</button>
                    <button type="button" id="edit-item-closeModals" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" class="fixed bottom-24 right-5 bg-blue-600 text-white rounded-full shadow-lg transition-transform duration-300 transform hover:scale-105 w-11 h-11 flex items-center justify-center" style="display: none;">
    <i class="fa-solid fa-arrow-up"></i>
    </button>
    {{-- side drawer start --}}
    <div class="fixed inset-0 flex z-50 hidden" id="drawer-wrapper">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity duration-500 opacity-0" id="backdrop"></div>
        
        <!-- Drawer -->
        <div class="relative flex flex-col bg-white w-72 lg:w-1/4 h-full shadow-xl overflow-y-auto transition-transform transform duration-500 -translate-x-full" id="drawer">
            <!-- Close Button -->
            <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" id="closeDrawerButton">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <!-- Drawer Content -->
            {{-- borrow counter --}}
            <div class="p-4">
                <h2 class="text-xl font-semibold text-center">Borrow Counter</h2>
                
                <div class="grid grid-cols-3 grid-rows-1 gap-1">
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300 ">Returned</p>
                        <p class="text-lg font-semibold bg-green-500 rounded-lg mt-2" id="returned-borrow-count"></p>
                    </div>
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300 ">Pending</p>
                        <p class="text-lg font-semibold bg-yellow-500 rounded-lg mt-2" id="pending-borrow-count"></p>
                    </div>
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300">Total</p>
                        <p class="text-lg font-semibold mt-2" id="total-borrow-count"></p>
                    </div>
                </div>
            </div>
            {{-- items counter --}}
            <div class="p-4">
                <h2 class="text-xl font-semibold text-center">Items Counter</h2>
                
                <div class="grid grid-cols-3 grid-rows-1 gap-1">
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300">Available</p>
                        <p class="text-lg font-semibold bg-green-500 rounded-lg mt-2" id="available-item-count"></p>
                    </div>
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300">Borrowed</p>
                        <p class="text-lg font-semibold bg-yellow-500 rounded-lg mt-2" id="borrowed-item-count"></p>
                    </div>
                    <div class="bg-white rounded-md shadow-sm text-center p-4">
                        <p class="border-b border-gray-300">Total</p>
                        <p class="text-lg font-semibold mt-2" id="total-item-count"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- side drawer end --}}
    {{-- side drawer button open --}}
    <button id="openDrawerButton" class="hidden transition-transform duration-300 transform hover:scale-105 fixed bottom-7 right-5 w-11 h-11 bg-blue-600 text-white rounded-full flex items-center justify-center">
    <i class="fa-solid fa-chart-simple"></i>
    </button>
    {{-- errors handler --}}
    @if ($errors->any())
        <script>
            alert('{{ $errors->first() }}');
        </script>
    @endif
</div>
