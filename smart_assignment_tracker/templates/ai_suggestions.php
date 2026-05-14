<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AI Suggestion - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .login-container {
            max-width: 580px;
            width: 90%;
        }

        .suggestion-box {
            text-align: center;
            margin: 30px 0;
            padding: 30px;
            background: rgba(139, 174, 122, 0.1);
            border-radius: 24px;
        }

        .crisis-box {
            background: rgba(217, 119, 87, 0.1);
            border-left: 4px solid #d97757;
            border-radius: 16px;
            padding: 15px 20px;
            margin: 25px 0 20px 0;
            text-align: center;
        }

        .crisis-box p {
            margin: 5px 0;
            color: #8b6655;
            font-size: 15px;
        }

        .crisis-box hr {
            display: none;
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
            <h1 class="comfort-title"><b>Our suggestions, for you ❤️</b></h1>
            <div class="suggestion-box">
                <?php echo nl2br($aiMessage); ?>
            </div>

            <div style="margin-top: 20px; font-size: 12px; text-align: center;">
                <hr>
            </div>

            <div class="crisis-box">
                <p><strong>If you're in crisis or having thoughts of harming yourself:</strong><br>
                    <b>Help is available</b>
                </p>
                <p>📞 Sri Lanka: 1333 (Crisis support line)</p>
            </div>

            <div style="margin-top: 25px; padding: 15px; background: rgba(79, 70, 229, 0.08); border-radius: 16px; text-align: center;">
                <p style="margin-bottom: 8px; font-size: 15px; color: #4f46e5;">
                    📖 <strong>Learn more about managing wellbeing</strong>
                </p>
                <p style="font-size: 15px; color: #4b5563;">
                    The advice you see here is based on the UK National Health Service's<br><br>
                    <a href="https://www.nhs.uk/mental-health/self-help/guides-tools-and-activities/five-steps-to-mental-wellbeing/"
                        target="_blank"
                        rel="noopener noreferrer"
                        style="color: #3e3a8b; text-decoration: underline;">
                        "5 Steps to Mental Wellbeing"<br>
                    </a>.
                </p>
                <p style="font-size: 15px; color: #6b7280; margin-top: 10px;">
                    The five steps are: <b>Connect, Be active, Learn new skills, Give to others, and Pay attention to the present moment</b>
                </p>
            </div>

            <a href="dashboard.php" class="back-button"><b>⬅️ Back to Dashboard</b></a>
        </div>
    </div>


</body>

</html>