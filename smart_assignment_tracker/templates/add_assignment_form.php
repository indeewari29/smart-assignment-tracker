<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assignment - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 600px;
            width: 90%;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
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
            <h1 class="comfort-title"><b>➕ Add Assignment</b></h1>

            <?php if ($error): ?>
                <div style="color:#d97757; padding:10px; background:rgba(217,119,87,0.1); border-radius:12px; margin-bottom:20px;"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div style="color:#4CAF50; padding:10px; background:rgba(76,175,80,0.1); border-radius:12px; margin-bottom:20px;">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <label>Title:</label>
                <input type="text" name="title" required>

                <label>Subject:</label>
                <input type="text" name="subject" required>

                <label>Deadline:</label>
                <input type="date" name="deadline" required>

                <label>Priority:</label>
                <select name="priority">
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>

                <button type="submit">Add Assignment</button>
            </form>

            <div style="margin-top: 20px;">
                <a href="dashboard.php" class="back-button"><b>⬅️ Back to dashboard</b></a>
            </div>
        </div>
    </div>
</body>

</html>