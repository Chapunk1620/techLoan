<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 lg:p-20">
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        <!-- Filters -->
        <div class="mb-4">
            <label for="month-filter" class="mr-2">Month:</label>
            <select id="month-filter" class="p-2 border rounded-lg">
                <option value="">All</option>
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

            <label for="status-filter" class="ml-4 mr-2">Status:</label>
            <select id="status-filter" class="p-2 border rounded-lg">
                <option value="">All</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <!-- Add more statuses as needed -->
            </select>
        </div>

        <table id="posts-table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>First Post</td>
                    <td>This is the content of the first post.</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                    <td>Active</td>
                    <td><button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Second Post</td>
                    <td>This is the content of the second post.</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                    <td>Inactive</td>
                    <td><button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        2asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdf
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        3asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdfe asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdf
    </div>
</div>
