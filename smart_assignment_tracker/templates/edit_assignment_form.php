<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Assignment - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 600px;
            width: 90%;
        }

        select,
        input,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
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
            <h1 class="comfort-title"><b>✏️ Edit Assignment</b></h1>

            <?php if ($success): ?>
                <div style="color:green; padding:10px; background:rgba(76,175,80,0.1); border-radius:12px; margin-bottom:20px;"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="GET" style="margin-bottom: 30px;">
                <label>Select an assignment to edit:</label>
                <select name="id" required onchange="this.form.submit()">
                    <option value=""></option>
                    <?php foreach ($assignments as $a): ?>
                        <option value="<?php echo $a->getId(); ?>" <?php echo ($selectedAssignment && $selectedAssignment->getId() == $a->getId()) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($a->getTitle()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

            <?php if ($selectedAssignment): ?>
                <form method="POST">
                    <input type="hidden" name="assignment_id" value="<?php echo $selectedAssignment->getId(); ?>">

                    <label>Title:</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($selectedAssignment->getTitle()); ?>" required>

                    <label>Subject:</label>
                    <input type="text" name="subject" value="<?php echo htmlspecialchars($selectedAssignment->getSubject()); ?>" required>

                    <label>Deadline:</label>
                    <input type="date" name="deadline" value="<?php echo $selectedAssignment->getDeadline(); ?>" required>

                    <label>Priority:</label>
                    <select name="priority">
                        <option value="high" <?php echo $selectedAssignment->getPriority() == 'high' ? 'selected' : ''; ?>>High</option>
                        <option value="medium" <?php echo $selectedAssignment->getPriority() == 'medium' ? 'selected' : ''; ?>>Medium</option>
                        <option value="low" <?php echo $selectedAssignment->getPriority() == 'low' ? 'selected' : ''; ?>>Low</option>
                    </select>

                    <button type="submit">Save changes</button>
                </form>
            <?php endif; ?>

            <div style="margin-top: 20px;">
                <a href="dashboard.php" class="back-button"><b>⬅️ Back to dashboard</b></a>
            </div>
        </div>
    </div>
</body>

</html>