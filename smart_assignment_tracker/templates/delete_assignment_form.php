<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Assignment - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 500px;
            width: 90%;
        }

        select,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
        }

        button {
            background: #8bae7a;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="soft-card">
            <h1 class="comfort-title"><b>🗑️ Delete Assignment</b></h1>

            <?php if ($message): ?>
                <div style="color:green; padding:10px; background:rgba(76,175,80,0.1); border-radius:12px; margin-bottom:20px;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div style="color:red; padding:10px; margin-bottom:20px;"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if (count($assignments) > 0): ?>
                <form method="POST">
                    <label>Select an assignment to delete:</label>
                    <select name="assignment_id" required>
                        <option value=""></option>
                        <?php foreach ($assignments as $a): ?>
                            <option value="<?php echo $a->getId(); ?>">
                                <?php echo htmlspecialchars($a->getTitle()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" onclick="return confirm('Permanently delete this assignment and its subtasks?')">Delete</button>
                </form>
            <?php else: ?>
                <p>No assignments to delete</p>
            <?php endif; ?>

            <div style="margin-top: 20px;">
                <a href="dashboard.php" class="back-button"><b>⬅️ Back to Dashboard</b></a>
            </div>
        </div>
    </div>
</body>

</html>