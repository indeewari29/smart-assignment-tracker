<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtasks - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 600px;
            width: 90%;
        }

        .subtask-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            margin: 10px 0;
            background: rgba(240, 206, 170, 0.1);
            border-radius: 16px;
        }

        .subtask-completed {
            text-decoration: line-through;
            opacity: 0.6;
        }

        .subtask-info {
            flex: 1;
        }

        .subtask-actions a {
            margin-left: 10px;
            text-decoration: none;
            color: #8b6655;
        }

        .add-form {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(139, 102, 85, 0.2);
        }

        .add-form input,
        .add-form button {
            padding: 8px;
            margin: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .add-form button {
            background: #8bae7a;
            color: white;
            border: none;
            cursor: pointer;
        }

        .progress-bar {
            background: rgba(240, 206, 170, 0.3);
            border-radius: 20px;
            height: 10px;
            margin: 15px 0;
            overflow: hidden;
        }

        .progress-fill {
            background: #8bae7a;
            height: 100%;
            border-radius: 20px;
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
            text-decoration: none;
        }

        .add-form h3 {
            color: #8b6655;
        }

        .no-subtasks {
            color: #8b6655;
            text-align: center;
            padding: 30px;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
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
            <h1 class="comfort-title"><b>📑 Subtasks</b></h1>

            <?php
            $total = count($subtasks);
            $completed = 0;
            foreach ($subtasks as $st) {
                if ($st->isCompleted()) $completed++;
            }
            $percent = $total > 0 ? ($completed / $total) * 100 : 0;
            ?>

            <div class="progress-bar">
                <div class="progress-fill" style="width: <?php echo $percent; ?>%;"></div>
            </div>
            <p style="text-align:center; font-size:14px; color:#8b6655;"><?php echo $completed; ?> / <?php echo $total; ?> completed</p>

            <!-- IF-ELSE BLOCK: Show subtasks or "no subtasks" message -->
            <?php if (count($subtasks) > 0): ?>
                <?php foreach ($subtasks as $subtask): ?>
                    <div class="subtask-item">
                        <div class="subtask-info <?php echo $subtask->isCompleted() ? 'subtask-completed' : ''; ?>">
                            <strong><?php echo htmlspecialchars($subtask->getName()); ?></strong><br>
                            <small>⏱️ <?php echo htmlspecialchars($subtask->getTimeLimit()); ?></small>
                        </div>
                        <div class="subtask-actions">
                            <?php if (!$subtask->isCompleted()): ?>
                                <a href="?complete=<?php echo $subtask->getId(); ?>&assignment_id=<?php echo $assignmentId; ?>">✅ Done</a>
                            <?php endif; ?>
                            <a href="?delete=<?php echo $subtask->getId(); ?>&assignment_id=<?php echo $assignmentId; ?>" onclick="return confirm('Delete this subtask?')">🗑️ Delete</a>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-subtasks">No subtasks yet ! Break this assignment into smaller steps</p>
            <?php endif; ?>

            <div class="add-form">
                <h3>Add a subtask</h3>
                <form method="POST">
                    <input type="text" name="name" placeholder="Subtask name" required style="width: 60%;">
                    <input type="text" name="time_limit" placeholder="Time (e.g., 30 min)" required style="width: 25%;">
                    <button type="submit" name="add_subtask">Add</button>
                </form>
            </div>

            <div class="back-button">
                <a href="dashboard.php" class="dashboard-link"><b>⬅️ Back to Dashboard</b></a>
            </div>
        </div>
    </div>
</body>

</html>