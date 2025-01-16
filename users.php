<?php
$page_title = 'All Users';
require_once('includes/load.php');
?>
<?php
// Check the user level permission to view this page
page_require_level(1);
// Pull out all users from the database
$all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="container mx-auto px-4">
    <div class="mt-6">
        <?php echo display_msg($msg); ?>
    </div>
    <div class="mt-8">
        <div class="bg-white shadow rounded-lg">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                <h1 class="text-lg font-semibold text-gray-700">Users</h1>
                <a href="add_user.php" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
                    Add New User
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b">#</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b">Username</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 border-b">User Role</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 border-b">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b">Last Login</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($all_users as $a_user): ?>
                            <tr>
                                <td class="px-6 py-4 text-center text-sm text-gray-700"><?php echo count_id(); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo remove_junk(ucwords($a_user['name'])); ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo remove_junk(ucwords($a_user['username'])); ?>
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-700">
                                    <?php echo remove_junk(ucwords($a_user['group_name'])); ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php if ($a_user['status'] === '1'): ?>
                                        <span class="inline-block bg-green-100 text-green-700 text-xs font-medium px-2 py-1 rounded">
                                            Active
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-block bg-red-100 text-red-700 text-xs font-medium px-2 py-1 rounded">
                                            Deactive
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    <?php echo read_date($a_user['last_login']); ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="edit_user.php?id=<?php echo (int)$a_user['id']; ?>" class="text-yellow-500 hover:text-yellow-600">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete_user.php?id=<?php echo (int)$a_user['id']; ?>" class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>
