<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4 lg:p-20">
    <div class="col-span-1 sm:col-span-2 lg:col-span-4 row-span-3 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        <table id="posts-table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>First Post</td>
                    <td>This is the content of the first post.</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Second Post</td>
                    <td>This is the content of the second post.</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                    <td>{{ \Carbon\Carbon::now()->toDateTimeString() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        2asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf
    </div>
    <div class="col-span-1 sm:col-span-1 lg:col-span-2 bg-white/70 shadow-md p-4 lg:p-7 rounded-2xl">
        3asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdfe asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf asdfe asdf
    </div>
</div>
