<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 600px;
            width: 90%;
        }

        .soft-card {
            text-align: center;
        }

        .gentle-subtitle {
            margin-bottom: 30px;
        }

        .question-box {
            text-align: left;
            margin-bottom: 30px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 20px;
        }

        .question-text {
            font-weight: 600;
            color: #8b6655;
            margin-bottom: 12px;
            font-size: 16px;
        }

        .option-group {
            display: flex;
            gap: 15px;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .option {
            flex: 1;
            text-align: center;
            cursor: pointer;
        }

        .option input {
            display: none;
        }

        .option label {
            display: block;
            padding: 12px 8px;
            background: rgba(240, 206, 170, 0.15);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 14px;
            color: #8b6655;
            border: 1px solid transparent;
        }

        .option input:checked+label {
            background: rgba(139, 174, 122, 0.3);
            border-color: #8bae7a;
            color: #5a7e4a;
            font-weight: 500;
        }

        .option label:hover {
            background: rgba(240, 206, 170, 0.3);
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #8bae7a, #6b8e5a);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            width: 100%;
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #7a9e69, #5a7e4a);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(107, 142, 90, 0.3);
        }

        .ai-message {
            background: linear-gradient(135deg, rgba(240, 206, 170, 0.15), rgba(224, 190, 156, 0.1));
            background-image: radial-gradient(circle at 10% 20%, rgba(240, 206, 170, 0.1) 2%, transparent 2.5%);
            background-size: 28px 28px;
            border-left: 4px solid #8bae7a;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .ai-message strong {
            color: #6b8e5a;
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #8b6655;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 12px;
            background: rgba(240, 206, 170, 0.2);
            transition: all 0.2s ease;
        }

        .back-link:hover {
            background: rgba(240, 206, 170, 0.4);
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
            <h1 class="comfort-title"><b>How are you feeling?</b></h1>
            <p class="gentle-subtitle">Take a moment to check in with yourself</p>

            <?php if ($error): ?>
                <div style="color:#d97757; padding:10px; background:rgba(217,119,87,0.1); border-radius:12px; margin-bottom:20px;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div style="color:#4CAF50; padding:10px; background:rgba(76,175,80,0.1); border-radius:12px; margin-bottom:20px;">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="question-box">
                    <div class="question-text">What does your body feel right now?</div>
                    <div class="option-group">
                        <div class="option">
                            <input type="radio" name="q1" id="q1_calm" value="calm" required>
                            <label for="q1_calm">😄 Calm & relaxed</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q1" id="q1_tense" value="tense">
                            <label for="q1_tense">🥲 Slightly tense</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q1" id="q1_heavy" value="heavy">
                            <label for="q1_heavy">🥱 Heavy or restless</label>
                        </div>
                    </div>
                </div>

                <div class="question-box">
                    <div class="question-text">How ready do you feel for work or study?</div>
                    <div class="option-group">
                        <div class="option">
                            <input type="radio" name="q2" id="q2_energetic" value="energetic" required>
                            <label for="q2_energetic">💡 Energetic & focused</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q2" id="q2_tired" value="tired">
                            <label for="q2_tired">📉 Slightly drained</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q2" id="q2_exhausted" value="exhausted">
                            <label for="q2_exhausted">🪫 Not ready at all</label>
                        </div>
                    </div>
                </div>

                <div class="question-box">
                    <div class="question-text">How does it feel in your mind?</div>
                    <div class="option-group">
                        <div class="option">
                            <input type="radio" name="q3" id="q3_clear" value="clear" required>
                            <label for="q3_clear">✨ Clear & peaceful</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q3" id="q3_busy" value="busy">
                            <label for="q3_busy">🍃 Many thoughts running</label>
                        </div>
                        <div class="option">
                            <input type="radio" name="q3" id="q3_overwhelmed" value="overwhelmed">
                            <label for="q3_overwhelmed">⛈️ Overwhelmed or stuck</label>
                        </div>
                    </div>
                </div>

                <button type="submit">Get my guidance</button>
            </form>

            <div style="margin-top: 20px;">
                <a href="dashboard.php" class="back-link"><b>⬅️ Back to Dashboard</b></a>
            </div>
        </div>
    </div>
</body>

</html>