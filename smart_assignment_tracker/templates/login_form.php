<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Assignment & Deadline Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
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
            <div class="comfort-header">
                <div class="gentle-logo">
                    <div class="logo-circle">
                        <div class="comfort-icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M16 2C8.3 2 2 8.3 2 16s6.3 14 14 14 14-6.3 14-14S23.7 2 16 2z" fill="none" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M12 16a4 4 0 108 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="12" cy="12" r="1.5" fill="currentColor"/>
                                <circle cx="20" cy="12" r="1.5" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="gentle-glow"></div>
                    </div>
                </div>
                <h1 class="comfort-title"><b>Welcome Back</b></h1>
                <p class="gentle-subtitle">Sign in to your account</p>
            </div>
            
            <?php if(isset($error) && $error): ?>
                <div style="color:#d97757; text-align:center; margin-bottom:20px; padding:10px; background:rgba(217,119,87,0.1); border-radius:12px;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form class="comfort-form" method="POST">
                <div class="soft-field">
                    <div class="field-container">
                        <input type="email" id="email" name="email" required autocomplete="email" placeholder=" ">
                        <label for="email">Email address</label>
                        <div class="field-accent"></div>
                    </div>
                </div>

                <div class="soft-field">
                    <div class="field-container">
                        <input type="password" id="password" name="password" required autocomplete="current-password" placeholder=" ">
                        <label for="password">Password</label>
                        <button type="button" class="gentle-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <div class="toggle-icon">
                                <svg class="eye-open" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10 3c-4.5 0-8.3 3.8-9 7 .7 3.2 4.5 7 9 7s8.3-3.8 9-7c-.7-3.2-4.5-7-9-7z" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    <circle cx="10" cy="10" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                </svg>
                                <svg class="eye-closed" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M3 3l14 14M8.5 8.5a3 3 0 004 4m2.5-2.5C15 10 12.5 7 10 7c-.5 0-1 .1-1.5.3M10 13c-2.5 0-4.5-2-5-3 .3-.6.7-1.2 1.2-1.7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </button>
                        <div class="field-accent"></div>
                    </div>
                </div>

                <button type="submit" class="comfort-button">
                    <div class="button-background"></div>
                    <span class="button-text">📲 Sign in</span>
                    <div class="button-glow"></div>
                </button>
            </form>

            <div class="comfort-signup">
                <span class="signup-text">Don't have an account?</span>
                <a href="signup.php" class="comfort-link signup-link">📝 Sign up</a>
            </div>
        </div>
    </div>

    <script>  
        const toggleBtn = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        
        if(toggleBtn && passwordInput){
            toggleBtn.addEventListener('click', function(){
                if(passwordInput.type === 'password'){
                    passwordInput.type = 'text';
                    toggleBtn.classList.add('toggle-active');
                } else{
                    passwordInput.type = 'password';
                    toggleBtn.classList.remove('toggle-active');
                }
            });
        }
    </script>
</body>
</html>