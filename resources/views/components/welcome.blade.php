<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 lg:p-20">
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
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
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <!-- Add more statuses as needed -->
                </select>
            </div>
            <!-- Button to open the modal -->
            <div class="bg-blue-400 text-white rounded-md px-3 hover:bg-custom-blues hover:-translate-y-1">
                <button id="openModal" class="p-2">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="container">
        <table id="postss-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Borrower ID</th>
                    <th>Item Key</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>IT Approver</th>
                    <th>IT Receiver</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Borrower ID</th>
                    <th>Item Key</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>IT Approver</th>
                    <th>IT Receiver</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        2asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdf
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        3asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdfe asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdf
    </div>
    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 transition-opacity hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3 transform transition-transform duration-300 ease-in-out scale-95 opacity-0" id="modalContent">
            <h2 class="text-lg font-semibold mb-4">Add Record</h2>
            <!-- Your Form -->
            <form action="{{ route('loan.store') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="borrower-id" id="borrower-id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="borrower-id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Borrower Id No</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="borrower-name" id="borrower-name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="borrower-name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Borrower Name</label>
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
                        <input type="text" name="it-approver" id="it-approver" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
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
        <h2 class="text-lg font-semibold mb-4">Edit Record</h2>
        <form id="editForm">
            <input type="hidden" id="row-id" name="row-id">
            <div class="mb-4">
                <label for="borrower-id" class="block text-sm font-medium text-gray-700">Borrower ID</label>
                <input type="text" id="borrower-id" name="borrower-id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-400" disabled>
            </div>
            <div class="mb-4">
                <label for="item-key" class="block text-sm font-medium text-gray-700">Item Key</label>
                <input type="text" id="item-key" name="item-key" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-400" disabled>
            </div>
            <div class="mb-4">
                <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                <input type="date" id="due-date" name="due-date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-400" disabled>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" id="status" name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-400" disabled>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description(Reason)</label>
                <textarea id="description" name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-400" disabled></textarea>
            </div>
            <div class="mb-4">
                <label for="it-receiver" class="block text-sm font-medium text-gray-700">IT Receiver</label>
                <input type="text" id="it-receiver" name="it-receiver" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="flex gap-2">
                <button type="button" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5" id="saveChanges">Save Changes</button>
                <button type="button" id="closeModals" class="text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 font-medium rounded-lg px-5 py-2.5">Close</button>
            </div>
        </form>
    </div>
</div>


    
</div>
