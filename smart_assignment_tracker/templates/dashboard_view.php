<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .notification-bell {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            z-index: 1000;
            transition: all 0.2s ease;
        }

        .notification-bell:hover {
            background: rgba(240, 206, 170, 0.5);
        }

        .notification-bell .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #d97757;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 15px;
            font-weight: bold;
        }

        .notification-panel {
            position: fixed;
            top: 70px;
            right: 20px;
            width: 300px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: none;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-panel.show {
            display: block;
        }

        .notification-item {
            padding: 12px;
            border-bottom: 1px solid #eee;
            color: #221c19;
            font-size: 14px;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item .date {
            font-size: 11px;
            color: #999;
            margin-top: 5px;
        }

        .login-container {
            max-width: 1500px;
            width: 95%;
        }

        .assignments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .assignments-table th,
        .assignments-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(139, 102, 85, 0.2);
        }

        .assignments-table th {
            color: #8b6655;
            font-weight: 600;
            border-bottom: 2px solid rgba(240, 206, 170, 0.5);
        }

        .priority-high {
            color: #d97757;
            font-weight: 500;
        }

        .priority-medium {
            color: #e6b17e;
            font-weight: 500;
        }

        .priority-low {
            color: #8bae7a;
            font-weight: 500;
        }

        .dashboard-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 60px;
        }

        .dashboard-link {
            color: #8b6655;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 12px;
            background: rgba(240, 206, 170, 0.2);
            transition: all 0.2s ease;
        }

        .dashboard-link:hover {
            background: rgba(234, 193, 148, 0.4);
        }

        .logout-link {
            color: #8b6655;
        }

        .welcome-text {
            margin-bottom: 24px;
        }

        .subtask-btn {
            display: inline-block;
            padding: 8px 16px;
            background: rgba(139, 174, 122, 0.2);
            border-radius: 20px;
            font-size: 14px;
            text-align: center;
            min-width: 120px;
        }
    </style>
</head>

<body>

    <div class="notification-bell" onclick="toggleNotifications()">
        🔔
        <span class="badge" id="notificationCount">0</span>
    </div>

    <div class="notification-panel" id="notificationPanel">
        <div style="padding: 12px; background: #f5f0e8; border-radius: 16px 16px 0 0; font-weight: bold;">
            Notifications
        </div>
        <div id="notificationList">

        </div>
    </div>
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
            <div class="comfort-header">
                <div class="gentle-logo">
                    <div class="logo-circle">
                        <div class="comfort-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M16 2C8.3 2 2 8.3 2 16s6.3 14 14 14 14-6.3 14-14S23.7 2 16 2z" fill="none" stroke="currentColor" stroke-width="1.5" />
                                <path d="M12 16a4 4 0 108 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <circle cx="12" cy="12" r="1.5" fill="currentColor" />
                                <circle cx="20" cy="12" r="1.5" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="gentle-glow"></div>
                    </div>
                </div>
                <h1 class="comfort-title"><b>Your Dashboard</b></h1>
                <p class="gentle-subtitle welcome-text">Welcome, <?php echo htmlspecialchars($user->getName()); ?> !</p>
            </div>

            <h2 style="color:#8b6655; margin-bottom:16px;">My Assignments</h2>

            <?php if (count($assignments) > 0): ?>
                <table class="assignments-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Deadline</th>
                            <th>Priority</th>
                            <th>Reminder</th>
                            <th>Subtasks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assignments as $assignment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($assignment->getTitle()); ?></td>
                                <td><?php echo htmlspecialchars($assignment->getSubject()); ?></td>
                                <td><?php echo htmlspecialchars($assignment->getDeadline()); ?></td>
                                <td class="priority-<?php echo $assignment->getPriority(); ?>">
                                    <?php echo ucfirst($assignment->getPriority()); ?>
                                </td>

                                <td style="color:#000000; font-size:15px;">
                                    <?php
                                    $today = new DateTime();
                                    $deadline = new DateTime($assignment->getDeadline());
                                    $diff = $today->diff($deadline)->days;

                                    if ($today > $deadline) {
                                        echo "<b>Past due</b>. Make a plan today ✍🏼";
                                    } elseif ($diff == 0) {
                                        echo "Due <b>today</b>. You got this 🙌🏼";
                                    } elseif ($diff <= 3) {
                                        echo "Due in <b>$diff days</b>. Stick to your plan 📃";
                                    } else {
                                        echo "Due in <b>$diff days</b>. One subtask at a time 🎯";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a href="subtasks.php?assignment_id=<?php echo $assignment->getId(); ?>" class="dashboard-link"><b>View</b></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color:#8b6655; text-align:center; padding:40px;">No assignments yet ! Click "Add Assignment" to create one.</p>
            <?php endif; ?>

            <div class="dashboard-actions">
                <?php if ($_SESSION['user']->getRole() == 'student'): ?>
                    <a href="add_assignment.php" class="dashboard-link">➕ <b>Add Assignment</b></a>
                    <a href="edit_assignment.php" class="dashboard-link">✏️ <b>Edit Assignment</b></a>
                    <a href="delete_assignment.php" class="dashboard-link">🗑️ <b>Delete Assignment</b></a>
                <?php endif; ?>

                <a href="mood_tracker.php" class="dashboard-link">🌱 <b>Mood Tracker</b></a>

                <?php if ($_SESSION['user']->getRole() == 'admin'): ?>
                    <a href="admin.php" class="dashboard-link"><b>Admin Panel</b></a>
                <?php endif; ?>

                <a href="logout.php" class="dashboard-link logout-link">➡️ <b>Logout</b></a>
            </div>
        </div>
    </div>

    <script>
        <?php
        $notificationMessage = "";
        $today = new DateTime();

        foreach ($assignments as $assignment) {
            $deadline = new DateTime($assignment->getDeadline());
            $diff = $today->diff($deadline)->days;

            if ($deadline >= $today && $diff <= 3) {
                $notificationMessage = "⚠️ " . $assignment->getTitle() . " is due in " . $diff . " days!";
                break;
            }
        }
        ?>

        <?php if ($notificationMessage): ?>
            if (Notification.permission === "granted") {
                new Notification("Assignment Reminder", {
                    body: "<?php echo $notificationMessage; ?>"
                });
            } else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        new Notification("Assignment Reminder", {
                            body: "<?php echo $notificationMessage; ?>"
                        });
                    }
                });
            }
        <?php endif; ?>
    </script>

    <script>
        let notifications = [];

        <?php
        $today = new DateTime();
        $notificationsArray = [];

        foreach ($assignments as $assignment) {
            $deadline = new DateTime($assignment->getDeadline());
            $diff = $today->diff($deadline)->days;

            if ($deadline < $today) {
                $notificationsArray[] = [
                    'message' => "" . $assignment->getTitle() . " is overdue !",
                    'date' => $deadline->format('Y-m-d')
                ];
            } elseif ($diff <= 3) {
                $notificationsArray[] = [
                    'message' => "" . $assignment->getTitle() . " is due in " . $diff . " days !",
                    'date' => $deadline->format('Y-m-d')
                ];
            }
        }
        ?>

        notifications = <?php echo json_encode($notificationsArray); ?>;

        function updateNotifications() {
            const count = notifications.length;
            document.getElementById('notificationCount').innerText = count;

            const listDiv = document.getElementById('notificationList');
            if (notifications.length === 0) {
                listDiv.innerHTML = '<div class="notification-item">No new notifications</div>';
            } else {
                let html = '';
                notifications.forEach(n => {
                    html += '<div class="notification-item">' + n.message + '<div class="date">📅 ' + n.date + '</div></div>';
                });
                listDiv.innerHTML = html;
            }
        }

        function toggleNotifications() {
            const panel = document.getElementById('notificationPanel');
            panel.classList.toggle('show');
        }

        document.addEventListener('click', function(event) {
            const panel = document.getElementById('notificationPanel');
            const bell = document.querySelector('.notification-bell');
            if (!bell.contains(event.target) && !panel.contains(event.target)) {
                panel.classList.remove('show');
            }
        });

        updateNotifications();

        <?php if ($notificationMessage): ?>
            if (Notification.permission === "granted") {
                new Notification("Assignment Reminder", {
                    body: "<?php echo $notificationMessage; ?>"
                });
            } else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        new Notification("Assignment Reminder", {
                            body: "<?php echo $notificationMessage; ?>"
                        });
                    }
                });
            }
        <?php endif; ?>
    </script>
</body>

</html>