<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 1200px;
            width: 95%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(139, 102, 85, 0.2);
        }

        th {
            background: rgba(240, 206, 170, 0.3);
            color: #8b6655;
        }

        .delete-btn {
            color: #d97757;
            text-decoration: none;
            padding: 4px 8px;
            border-radius: 6px;
            background: rgba(217, 119, 87, 0.1);
        }

        .delete-btn:hover {
            background: rgba(217, 119, 87, 0.2);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #8b6655;
            text-decoration: none;
        }

        h1 {
            margin-bottom: 40px;
        }

        h2 {
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .dashboard-link {
            color: #8b6655;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 12px;
            background: rgba(240, 206, 170, 0.2);
            transition: all 0.2s ease;
            display: inline-block;
        }

        .dashboard-link:hover {
            background: rgba(240, 206, 170, 0.4);
        }

        .logout-right {
            text-align: right;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="soft-background">
        <div class="floating-shapes">
            <div class="soft-blob blob-1"></div>
            <div class="soft-blob blob-2"></div>
            <div class="soft-blob blob-3"></div>
            <div class="soft-blob blob-4"></div>
        </div>
    </div>

    <div class="login-container">
        <div class="soft-card">
            <h1 class="comfort-title"><b>Admin Panel</b></h1>
            <p class="gentle-subtitle">Welcome to the admin panel !</p>

            <h2 style="color:#8b6655; margin-top: 30px;">All users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->getId(); ?></td>
                            <td><?php echo htmlspecialchars($user->getName()); ?></td>
                            <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
                            <td><?php echo $user->getRole(); ?></td>
                            <td>
                                <?php if ($user->getRole() != 'admin'): ?>
                                    <a href="delete_user.php?id=<?php echo $user->getId(); ?>" class="delete-btn" onclick="return confirm('Delete this user? Their assignments will also be deleted.')">🗑️ Delete</a>
                                <?php else: ?>
                                    <span style="color:#999;">Admin</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2 style="color:#8b6655; margin-top: 30px;">All user assignments</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Deadline</th>
                        <th>Priority</th>
                        <th>User ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($assignments as $assignment): ?>
                        <tr>
                            <td><?php echo $assignment->getId(); ?></td>
                            <td><?php echo htmlspecialchars($assignment->getTitle()); ?></td>
                            <td><?php echo htmlspecialchars($assignment->getSubject()); ?></td>
                            <td><?php echo $assignment->getDeadline(); ?></td>
                            <td><?php echo ucfirst($assignment->getPriority()); ?></td>
                            <td><?php echo $assignment->getUserId(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="logout-right">
                <a href="logout.php" class="dashboard-link" style="display: inline-block; margin-top: 20px;">➡️ Logout</a>
            </div>
        </div>
    </div>
</body>

</html>