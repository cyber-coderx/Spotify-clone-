<?php
//require_once '../includes/csrf.php';
//require_once '../includes/csrf.php';
//require_once '../helpers/Recaptcha.php';
require_once __DIR__ . '/../includes/session.php';
redirectIfAuthenticated(); // Send logged-in users to dashboard

/*
function debugFormPost() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        echo "✅ Form was POSTED (action=signup)\n\n";
        print_r($_POST);
        echo "</pre>";
    } else {
        echo "<pre>⛔ Form was NOT posted (Request Method: {$_SERVER['REQUEST_METHOD']})</pre>";
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'signup') {
    debugFormPost();

    // Example of pulling the email:
    // $email = $_POST['email'] ?? '';
}

*/
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Spotify Login and Sign Up</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
    rel="stylesheet"
  />
  <style>
    /* Shared styles reset */
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(to bottom, #2a2a2a, black);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 1rem;
      box-sizing: border-box;
      overflow-y: hidden;
      color: white;
    }
    body {
      width: 100%;
    }


      .submit-btn.disabled {
        opacity: 0.5;
        pointer-events: none;
        cursor: not-allowed;
      }



    /* Normalize input appearance for email and tel */
    input[type="email"],
    input[type="tel"] {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      font-family: inherit;
      font-size: 0.875rem;
      color: #9ca3af;
      background-color: #121212;
      border: 1px solid #374151;
      border-radius: 0.375rem;
      padding: 0.5rem 0.75rem;
      margin-bottom: 0.25rem;
      box-sizing: border-box;
      width: 100%;
      max-width: 320px;
      outline-offset: 0;
      transition: border-color 0.3s ease, color 0.3s ease;
    }
    input[type="email"]:focus,
    input[type="tel"]:focus {
      border-color: white;
      color: white;
      outline: none;
      box-shadow: none;
    }
    /* LOGIN CONTAINER */
    #login-container {
      background-color: #121212;
      border-radius: 0.375rem;
      max-width: 28rem;
      width: 100%;
      padding: 2rem;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-sizing: border-box;
      max-height: 90vh;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #1db954 transparent;
    }
    .login-container::-webkit-scrollbar {
      display: none;
    }
    /* Custom scrollbar for WebKit browsers */
    #login-container::-webkit-scrollbar {
      width: 6px;
      display: none;
    }
    #login-container::-webkit-scrollbar-track {
      background: transparent;
    }
    #login-container::-webkit-scrollbar-thumb {
      background-color: #1db954;
      border-radius: 3px;
    }
    #login-container .logo {
      width: 2.5rem;
      margin-bottom: 1.5rem;
      flex-shrink: 0;
    }
    #login-container h1 {
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
      flex-shrink: 0;
    }
    #login-container button {
      width: 100%;
      border-radius: 9999px;
      border: 1px solid #4b5563; /* gray-600 */
      background: transparent;
      color: white;
      font-weight: 600;
      font-size: 0.75rem;
      padding: 0.5rem 0;
      margin-bottom: 0.75rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      transition: border-color 0.3s ease;
      flex-shrink: 0;
    }
    #login-container button:hover {
      border-color: white;
    }
    #login-container .btn-icon {
      width: 1.25rem;
      height: 1.25rem;
      display: inline-block;
      flex-shrink: 0;
    }
    #login-container .btn-icon img {
      width: 100%;
      height: 100%;
      display: block;
    }
    #login-container .btn-facebook i {
      font-size: 1rem;
      color: #1877f2;
      flex-shrink: 0;
    }
    #login-container .btn-phone {
      justify-content: center;
    }
    #login-container hr {
      border: none;
      border-top: 1px solid #374151; /* gray-700 */
      width: 100%;
      margin-bottom: 1.5rem;
      flex-shrink: 0;
    }
    #login-container label {
      display: block;
      font-weight: 600;
      font-size: 0.75rem;
      margin-bottom: 0.25rem;
      color: #d1d5db; /* gray-300 */
      max-width: 20rem;
      width: 100%;
      flex-shrink: 0;
    }
    #login-container input[type="text"],
    #login-container input[type="password"],
    #login-container input[type="tel"] {
      width: 100%;
      max-width: 20rem;
      background-color: #121212;
      border: 1px solid #374151; /* gray-700 */
      border-radius: 0.125rem;
      color: white;
      font-size: 0.75rem;
      padding: 0.5rem 0.75rem;
      margin-bottom: 1.5rem;
      box-sizing: border-box;
      flex-shrink: 0;
    }
    #login-container input[type="text"]:focus,
    #login-container input[type="password"]:focus,
    #login-container input[type="tel"]:focus {
      outline: none;
      box-shadow: 0 0 0 2px #1db954;
      border-color: #1db954;
    }
    #login-container .password-wrapper {
      position: relative;
      width: 100%;
      max-width: 20rem;
      margin-bottom: 1.5rem;
      flex-shrink: 0;
    }
    #login-container .password-wrapper input[type="password"],
    #login-container .password-wrapper input[type="text"] {
      width: 100%;
      padding-right: 2.5rem;
      background-color: #121212;
      border: 1px solid #374151;
      border-radius: 0.125rem;
      color: white;
      font-size: 0.75rem;
      box-sizing: border-box;
    }
    #login-container .password-wrapper input[type="password"]:focus,
    #login-container .password-wrapper input[type="text"]:focus {
      outline: none;
      box-shadow: 0 0 0 2px #1db954;
      border-color: #1db954;
    }
    #login-container .toggle-password {
      position: absolute;
      top: 50%;
      right: 0.5rem;
      transform: translateY(-50%);
      color: #9ca3af;
      cursor: pointer;
      font-size: 1rem;
      user-select: none;
      flex-shrink: 0;
    }
    #login-container .toggle-password:hover {
      color: #1db954;
    }
    #login-container .btn-continue {
      background-color: #1db954;
      color: black;
      font-weight: 700;
      font-size: 0.75rem;
      border-radius: 9999px;
      padding: 0.5rem 0;
      max-width: 20rem;
      width: 100%;
      border: none;
      cursor: pointer;
      margin-bottom: 1.5rem;
      transition: background-color 0.3s ease;
      flex-shrink: 0;
    }
    #login-container .btn-continue:hover {
      background-color: #1ed760cc;
    }
    #login-container p.bottom-text {
      font-size: 0.75rem;
      color: #9ca3af; /* gray-400 */
      max-width: 20rem;
      text-align: center;
      margin: 0;
      flex-shrink: 0;
    }
    #login-container p.bottom-text a {
      color: white;
      text-decoration: underline;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    #login-container p.bottom-text a:hover {
      color: #1db954;
    }
    @media (max-width: 320px) {
      #login-container {
        padding: 1.5rem 1rem;
      }
      #login-container label,
      #login-container input[type="text"],
      #login-container input[type="password"],
      #login-container input[type="tel"],
      #login-container .btn-continue,
      #login-container p.bottom-text {
        max-width: 100%;
      }
      #login-container .password-wrapper {
        max-width: 100%;
      }
    }

    /* SIGNUP CONTAINER */
    #signup-container {
      font-family: "Spotify Font", Arial, sans-serif;
      background: linear-gradient(to bottom, #2a2a2a, black);
      color: white;
      min-height: 100vh;
      margin: 0;
      display: none;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      padding: 0 1.5rem;
      box-sizing: border-box;
      width: 100%;
      max-width: 28rem;
      overflow-y: auto;
      max-height: 90vh;
      scrollbar-width: thin;
      scrollbar-color: #1db954 transparent;
    }
    /* Custom scrollbar for WebKit browsers */
    #signup-container::-webkit-scrollbar {
      width: 6px;
    }
    #signup-container::-webkit-scrollbar-track {
      background: transparent;
    }
    #signup-container::-webkit-scrollbar-thumb {
      background-color: #1db954;
      border-radius: 3px;
    }
    #signup-container main {
      padding-top: 4rem;
      width: 100%;
      max-width: 320px;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 0 auto;
      box-sizing: border-box;
      flex-shrink: 0;
    }
    #signup-container img.logo {
      margin-bottom: 1.5rem;
      width: 2.5rem;
      height: 2.5rem;
      flex-shrink: 0;
    }
    #signup-container h1 {
      font-weight: 700;
      font-size: 2rem;
      line-height: 2.5rem;
      text-align: center;
      margin-bottom: 2rem;
      max-width: 320px;
      flex-shrink: 0;
    }
    #signup-container form {
      width: 100%;
      max-width: 320px;
      flex-shrink: 0;
    }
    #signup-container label {
      display: block;
      font-size: 11px;
      font-weight: 600;
      margin-bottom: 0.25rem;
      color: #9ca3af;
    }
    #signup-container input[type="email"],
    #signup-container input[type="tel"] {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      font-family: inherit;
      font-size: 0.875rem;
      color: #9ca3af;
      background-color: #121212;
      border: 1px solid #374151;
      border-radius: 0.375rem;
      padding: 0.5rem 0.75rem;
      margin-bottom: 0.25rem;
      box-sizing: border-box;
      width: 100%;
      outline-offset: 0;
      transition: border-color 0.3s ease, color 0.3s ease;
    }
    #signup-container input[type="email"]:focus,
    #signup-container input[type="tel"]:focus {
      border-color: white;
      color: white;
      outline: none;
      box-shadow: none;
    }
    #signup-container a.phone-switch {
      font-size: 11px;
      color: #1db954;
      font-weight: 400;
      margin-bottom: 1.5rem;
      display: inline-block;
      text-decoration: none;
      cursor: pointer;
    }
    #signup-container a.phone-switch:hover {
      text-decoration: underline;
    }
    #signup-container button.submit-btn {
      width: 100%;
      background-color: #1db954;
      color: black;
      font-weight: 700;
      font-size: 0.875rem;
      border-radius: 9999px;
      padding: 0.75rem 0;
      margin-bottom: 1.5rem;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    #signup-container button.submit-btn:hover {
      background-color: #1ed760;
    }
    #signup-container .divider {
      display: flex;
      align-items: center;
      color: #6b7280;
      font-size: 0.75rem;
      margin-bottom: 1.5rem;
    }
    #signup-container .divider hr {
      flex-grow: 1;
      border: none;
      border-top: 1px solid #374151;
      margin: 0;
    }
    #signup-container .divider span {
      margin: 0 0.75rem;
    }
    #signup-container button.social-btn {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      border-radius: 9999px;
      padding: 0.5rem 0;
      margin-bottom: 0.75rem;
      border: 1px solid #374151;
      background: transparent;
      color: white;
      font-weight: 600;
      font-size: 0.75rem;
      cursor: pointer;
      transition: border-color 0.3s ease;
    }
    #signup-container button.social-btn:hover {
      border-color: white;
    }
    #signup-container button.social-btn:last-of-type {
      margin-bottom: 1.5rem;
    }
    #signup-container button.social-btn img {
      width: 16px;
      height: 16px;
    }
    #signup-container hr.bottom-divider {
      border: none;
      border-top: 1px solid #374151;
      margin-bottom: 1.5rem;
    }
    #signup-container p.login-text {
      color: #9ca3af;
      font-size: 11px;
      max-width: 320px;
      text-align: center;
      margin-bottom: 4rem;
    }
    #signup-container p.login-text a {
      color: white;
      text-decoration: underline;
      cursor: pointer;
    }
    #signup-container p.login-text a:hover {
      color: #ffffffcc;
    }
    #signup-container footer {
      width: 100%;
      max-width: 320px;
      padding: 0 1rem 1rem;
      text-align: center;
      font-size: 9px;
      color: #6b7280;
      box-sizing: border-box;
      flex-shrink: 0;
    }
    #signup-container footer a {
      color: #6b7280;
      text-decoration: underline;
    }
    #signup-container footer a:hover {
      color: #9ca3af;
    }
    @media (max-width: 360px) {
      #signup-container main, #signup-container footer {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="login-container" id="login-container" role="main" aria-label="Spotify login form">
    <img
      src="https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg"
      alt="Spotify logo white circle with three curved lines inside"
      class="logo"
    />
    
      <?php if (isset($_SESSION['error'])): ?>
  <div id="error-alert" style="
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    color: #fff;
    background-color: #dc2626;
    padding: 1rem 1.25rem;
    border-radius: 0.375rem;
    font-weight: 600;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
  ">
    <?= htmlspecialchars($_SESSION['error']) ?>
  </div>
  <script>
    // Automatically hide after 4 seconds
    setTimeout(() => {
      const alert = document.getElementById('error-alert');
      if (alert) {
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500); // Remove after fade-out
      }
    }, 4000);
  </script>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>



    <h1>Log in to Spotify</h1>

    <button type="button" aria-label="Continue with Google">
      <span class="btn-icon">
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"
          alt="Google G logo in color"
        />
      </span>
      Continue with Google
    </button>

    <button type="button" class="btn-facebook" aria-label="Continue with Facebook">
      <i class="fab fa-facebook-f" aria-hidden="true"></i>
      Continue with Facebook
    </button>

    <button type="button" aria-label="Continue with Apple">
      <span class="btn-icon">
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg"
          alt="Apple logo black"
        />
      </span>
      Continue with Apple
    </button>

    <button type="button" class="btn-phone" aria-label="Continue with phone number">
      Continue with phone number
    </button>

    <hr />

  <form action="/public/index.php?action=login" method="POST" novalidate>
  <input type="hidden" name="login-submit" value="1" />
    
  <label for="login-email" id="login-label">Email or username</label>
      <input
        id="login-email"
        type="text"
        placeholder="Email or username"
        autocomplete="username"
        aria-required="true"
        name="email"
        inputmode="email"
      />

      <label for="login-password">Password</label>
      <div class="password-wrapper">
        <input
          id="login-password"
          type="password"
          placeholder="Password"
          autocomplete="current-password"
          aria-required="true"
          name="password"  
        />
        <span class="toggle-password" role="button" tabindex="0" aria-label="Toggle password visibility">
          <i class="fas fa-eye"></i>
        </span>
      </div>

      <button type="submit" class="btn-continue">Continue</button>
    </form> 
      <p class="bottom-text">
        Don't have an account?
        <a href="#" id="show-signup">Sign up for Spotify</a>
      </p>
    </div>

    <div id="signup-container" role="main" aria-label="Spotify sign up form">
      <main>
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg"
          alt="Spotify logo white circle with three curved lines inside"
          class="logo"
          width="32"
          height="32"
        />
        <h1>
          Sign up to
          <br />
          start listening
        </h1>
        <form action="?action=signup" method="POST" novalidate>
           <input type="hidden" name="signup-submit" value="1" />
          <label for="signup-email" id="signup-label">Email address</label>
          <input
            id="signup-email"
            name="email"
            placeholder="name@domain.com"
            required
            type="email"
            aria-required="true"
            inputmode="email"
          />
          <a href="#" class="phone-switch" tabindex="0">Use phone number instead.</a>


          


          <button class="submit-btn" type="submit">Next</button>
          <div class="divider" aria-hidden="true">
            <hr />
            <span>or</span>
            <hr />
          </div>
          <button class="social-btn" type="button" aria-label="Sign up with Google">
            <img
              src="https://storage.googleapis.com/a1aa/image/72b968aa-203e-4bbf-7237-e58ca73fcef2.jpg"
              alt="Google logo with red, yellow, green and blue colors"
              width="16"
              height="16"
            />
            <span>Sign up with Google</span>
          </button>
          <button class="social-btn" type="button" aria-label="Sign up with Apple">
            <img
              src="https://storage.googleapis.com/a1aa/image/592390b8-d159-4256-2560-57282061a621.jpg"
              alt="Apple logo white apple shape"
              width="16"
              height="16"
            />
            <span>Sign up with Apple</span>
          </button>
          <hr class="bottom-divider" />
        </form>
        <p class="login-text">
          Already have an account?
          <a href="#" id="show-login">Log in here</a>.
        </p>
      </main>
      <footer>
        <p>
          This site is protected by reCAPTCHA and the Google
          <a href="#" tabindex="0">Privacy Policy</a> and
          <a href="#" tabindex="0">Terms of Service</a> apply.
        </p>
      </footer>
    </div>

    <script>
      (function() {
        const loginContainer = document.getElementById('login-container');
        const signupContainer = document.getElementById('signup-container');
        const showSignupLink = document.getElementById('show-signup');
        const showLoginLink = document.getElementById('show-login');
        const togglePassword = loginContainer.querySelector('.toggle-password');
        const passwordInput = document.getElementById('login-password');
        const emailInput = document.getElementById('login-email');
        const emailLabel = document.getElementById('login-label');
        const phoneSwitchLink = signupContainer.querySelector('.phone-switch');
        const signupEmailInput = document.getElementById('signup-email');
        const signupEmailLabel = signupContainer.querySelector('label[for="signup-email"]');



        // Disable submit button if input is empty or invalid email
  const signupForm = signupContainer.querySelector('form');
  const signupSubmitButton = signupForm.querySelector('.submit-btn');

    // Initially disable the button
    signupSubmitButton.disabled = true;
    signupSubmitButton.classList.add('disabled');

// Real-time input validation
function isValidEmail(email) {
  // Simple email pattern
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function toggleSubmitButton() {
  const value = signupEmailInput.value.trim();
  const isPhoneMode = signupEmailInput.type === 'tel';
  const isEmailMode = signupEmailInput.type === 'email';

  if (value === '') {
    signupSubmitButton.disabled = true;
    signupSubmitButton.classList.add('disabled');
    return;
  }

  if (isEmailMode && !isValidEmail(value)) {
    signupSubmitButton.disabled = true;
    signupSubmitButton.classList.add('disabled');
    return;
  }

  // Valid input
  signupSubmitButton.disabled = false;
  signupSubmitButton.classList.remove('disabled');
}

signupEmailInput.addEventListener('input', toggleSubmitButton);

// If phone/email switch is used, revalidate
phoneSwitchLink.addEventListener('click', () => {
  setTimeout(() => {
    toggleSubmitButton();
    signupEmailInput.addEventListener('input', toggleSubmitButton);
  }, 0);
});




        function showSignup(e) {
          e.preventDefault();
          loginContainer.style.display = 'none';
          signupContainer.style.display = 'flex';
          // Focus first input in signup form for accessibility
          if (signupEmailInput) {
            signupEmailInput.focus();
          }
        }

        function showLogin(e) {
          e.preventDefault();
          signupContainer.style.display = 'none';
          loginContainer.style.display = 'flex';
          // Focus first input in login form for accessibility
          if (emailInput) {
            emailInput.focus();
          }
        }

        function togglePasswordVisibility() {
          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
          } else {
            passwordInput.type = 'password';
            togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
          }
        }

        phoneSwitchLink.addEventListener('click', function(e) {
          e.preventDefault();
          if (phoneSwitchLink.textContent.trim() === 'Use phone number instead.') {
            // Switch to phone number input with same design
            signupEmailLabel.textContent = 'Phone number';
            signupEmailInput.type = 'tel';
            signupEmailInput.name = 'phone';
            signupEmailInput.placeholder = 'Phone number';
            signupEmailInput.autocomplete = 'tel';
            signupEmailInput.inputMode = 'tel';
            signupEmailInput.value = '';
            phoneSwitchLink.textContent = 'Use email instead.';
          } else {
            // Switch back to email input with same design
            signupEmailLabel.textContent = 'Email address';
            signupEmailInput.type = 'email';
            signupEmailInput.name = 'email';
            signupEmailInput.placeholder = 'name@domain.com';
            signupEmailInput.autocomplete = 'email';
            signupEmailInput.inputMode = 'email';
            signupEmailInput.value = '';
            phoneSwitchLink.textContent = 'Use phone number instead.';
          }
          signupEmailInput.focus();
        });

        showSignupLink.addEventListener('click', showSignup);
        showLoginLink.addEventListener('click', showLogin);

        togglePassword.addEventListener('click', togglePasswordVisibility);
        togglePassword.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            togglePasswordVisibility();
          }
        });

        // Also allow keyboard accessibility for the links (Enter key)
        showSignupLink.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            showSignup(e);
          }
        });
        showLoginLink.addEventListener('keydown', function(e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            showLogin(e);
          }
        });
      })();
    </script>
</body>
</html>