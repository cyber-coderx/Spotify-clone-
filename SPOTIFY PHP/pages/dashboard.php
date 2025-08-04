<?php
//require_once '../includes/session.php';
//require_once '../includes/db.php';
require_once __DIR__ . '/../includes/session.php';
requireAuth(); // Only allow if logged in
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Spotify Clone</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Spotify+Font&amp;display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: "Spotify Font", system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans",
        "Helvetica Neue", sans-serif;
      background-color: #121212;
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    * {
      box-sizing: border-box;
    }
    a {
      color: #b3b3b3;
      text-decoration: none;
      cursor: pointer;
    }
    a:hover {
      text-decoration: underline;
    }
    button {
      cursor: pointer;
      border: none;
      background: none;
      font-family: inherit;
    }
    img {
      display: block;
      max-width: 100%;
      height: auto;
    }
    /* Scrollbar styling for webkit */
    ::-webkit-scrollbar {
      height: 8px;
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: transparent;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #282828;
      border-radius: 10px;
    }

    /* Container for main content */
    .container {
      display: flex;
      flex: 1;
      margin: 1rem;
      border-radius: 0.5rem;
      overflow: hidden;
      background-color: transparent;
      min-height: calc(100vh - 2rem);
    }

    /* Sidebar */
    aside {
      background-color: #181818;
      border-radius: 0.5rem;
      width: 18rem;
      flex-shrink: 0;
      padding: 1rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }
    aside .top-icons {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    aside .top-icons img {
      width: 1.5rem;
      height: 1.5rem;
    }
    aside .top-icons button {
      background-color: #282828;
      padding: 0.5rem;
      border-radius: 9999px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.125rem;
      transition: background-color 0.2s ease;
    }
    aside .top-icons button:hover {
      background-color: #3a3a3a;
    }
    aside h2 {
      font-size: 0.75rem;
      font-weight: 700;
      margin: 0 0 0.5rem 0;
    }
    aside .card {
      background-color: #282828;
      border-radius: 0.375rem;
      padding: 1rem;
      max-width: 17.5rem;
      word-break: break-word;
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }
    aside .card p.title {
      font-size: 0.875rem;
      font-weight: 600;
      margin: 0;
    }
    aside .card p.subtitle {
      font-size: 0.75rem;
      color: #b3b3b3;
      margin: 0;
    }
    aside .card button {
      margin-top: 0.5rem;
      background-color: white;
      color: black;
      font-size: 0.75rem;
      font-weight: 600;
      border-radius: 9999px;
      padding: 0.25rem 1rem;
      transition: background-color 0.2s ease;
      border: none;
    }
    aside .card button:hover {
      background-color: rgba(255, 255, 255, 0.9);
    }

    /* Main content */
    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      background-color: #181818;
      border-radius: 0.5rem;
      padding: 1.5rem;
      overflow: hidden;
    }

    /* Top bar */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      gap: 1rem;
      overflow-x: auto;
      max-width: 100%;
    }
    .search-container {
      display: flex;
      align-items: center;
      background-color: #282828;
      border-radius: 9999px;
      padding: 0.5rem 1rem;
      flex-shrink: 0;
      max-width: 25rem;
      width: 100%;
    }
    .search-container i {
      color: #b3b3b3;
      margin-right: 0.75rem;
      font-size: 1rem;
      flex-shrink: 0;
    }
    .search-container input[type="search"] {
      background: transparent;
      border: none;
      outline: none;
      color: white;
      font-size: 0.875rem;
      width: 100%;
      padding: 0;
      font-family: inherit;
    }
    .search-container input::placeholder {
      color: #b3b3b3;
    }
    .search-history-btn {
      margin-left: 0.75rem;
      background-color: #282828;
      padding: 0.5rem;
      border-radius: 0.375rem;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #b3b3b3;
      font-size: 0.875rem;
      border: none;
      cursor: pointer;
      transition: color 0.2s ease;
      flex-shrink: 0;
    }
    .search-history-btn:hover {
      color: white;
    }

    /* Top bar right buttons */
    .top-bar-right {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-shrink: 0;
    }
    .top-bar-right button.install-app {
      display: flex;
      align-items: center;
      gap: 0.25rem;
      font-size: 0.75rem;
      color: #b3b3b3;
      font-weight: 600;
      background: none;
      border: none;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    .top-bar-right button.install-app:hover {
      color: white;
    }
    .top-bar-right button.icon-btn {
      color: #b3b3b3;
      font-size: 1.125rem;
      background: none;
      border: none;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    .top-bar-right button.icon-btn:hover {
      color: white;
    }
    .top-bar-right button.profile-btn {
      background-color: #2a2a2a;
      border-radius: 9999px;
      width: 2rem;
      height: 2rem;
      color: white;
      font-weight: 600;
      font-size: 0.875rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
      cursor: pointer;
    }

    /* Filters */
    .filters {
      display: flex;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }
    .filters button {
      font-size: 0.75rem;
      font-weight: 600;
      border-radius: 9999px;
      padding: 0.25rem 0.75rem;
      background-color: #282828;
      color: white;
      border: none;
      cursor: pointer;
      transition: background-color 0.2s ease;
      white-space: nowrap;
    }
    .filters button.active {
      background-color: white;
      color: black;
    }

    /* Scrollable content area */
    .content-scroll {
      flex: 1;
      overflow-x: auto;
      overflow-y: scroll;
      padding-right: 1rem;
      scrollbar-width: thin;
      scrollbar-color: #282828 transparent;
    }
    .content-scroll::-webkit-scrollbar {
      height: 8px;
      width: 8px;
    }
    .content-scroll::-webkit-scrollbar-track {
      background: transparent;
    }
    .content-scroll::-webkit-scrollbar-thumb {
      background-color: #282828;
      border-radius: 10px;
    }

    /* Section */
    section {
      margin-bottom: 2rem;
    }
    section:last-child {
      margin-bottom: 0;
    }
    section .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }
    section .section-header h3 {
      font-weight: 700;
      font-size: 1.125rem;
      margin: 0;
    }
    section .section-header button {
      font-size: 0.75rem;
      color: #b3b3b3;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: text-decoration 0.2s ease;
      white-space: nowrap;
    }
    section .section-header button:hover {
      text-decoration: underline;
    }

    /* Horizontal scroll container */
    .horizontal-scroll {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding-bottom: 0.5rem;
      scrollbar-width: thin;
      scrollbar-color: #282828 transparent;
    }
    .horizontal-scroll::-webkit-scrollbar {
      height: 8px;
      width: 8px;
    }
    .horizontal-scroll::-webkit-scrollbar-track {
      background: transparent;
    }
    .horizontal-scroll::-webkit-scrollbar-thumb {
      background-color: #282828;
      border-radius: 10px;
    }

    /* Cards */
    .card {
      min-width: 140px;
      max-width: 140px;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
    }
    .card img {
      border-radius: 0.375rem;
      margin-bottom: 0.25rem;
      width: 140px;
      height: 140px;
      object-fit: cover;
    }
    .card p.description {
      font-size: 0.625rem;
      color: #b3b3b3;
      line-height: 1.2;
      margin: 0;
      white-space: normal;
      overflow-wrap: break-word;
    }
    .card p.title {
      font-size: 0.625rem;
      font-weight: 600;
      margin: 0 0 0.125rem 0;
      color: white;
      white-space: normal;
      overflow-wrap: break-word;
    }
    .card p.subtitle {
      font-size: 0.5625rem;
      color: #b3b3b3;
      margin: 0;
      white-space: normal;
      overflow-wrap: break-word;
    }

    /* Footer links */
    .footer-links {
      border-top: 1px solid #282828;
      padding-top: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      font-size: 0.75rem;
      color: #b3b3b3;
    }
    .footer-links > div {
      min-width: 7.5rem;
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }
    .footer-links > div span.title {
      font-weight: 700;
      color: white;
    }

    /* Bottom player bar */
    footer {
      background-color: #181818;
      border-top: 1px solid #282828;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.5rem 1.5rem;
      gap: 1rem;
      flex-wrap: nowrap;
    }
    footer .left-section {
      display: flex;
      align-items: center;
      gap: 1rem;
      min-width: 11.25rem;
    }
    footer .left-section img {
      width: 3.5rem;
      height: 3.5rem;
      border-radius: 0.375rem;
      object-fit: cover;
    }
    footer .left-section .info {
      display: flex;
      flex-direction: column;
      font-size: 0.75rem;
      line-height: 1.2;
    }
    footer .left-section .info .title {
      font-weight: 600;
      color: white;
    }
    footer .left-section button.like-btn {
      background: none;
      border: none;
      color: #b3b3b3;
      font-size: 1.125rem;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    footer .left-section button.like-btn:hover {
      color: white;
    }

    footer .center-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.25rem;
      flex-grow: 1;
      max-width: 28.75rem;
    }
    footer .center-section .controls {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    footer .center-section .controls button {
      background: none;
      border: none;
      color: #b3b3b3;
      font-size: 1.125rem;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    footer .center-section .controls button.play-pause {
      background-color: white;
      color: black;
      border-radius: 9999px;
      width: 2.5rem;
      height: 2.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
    }
    footer .center-section .controls button:hover {
      color: white;
    }
    footer .center-section input[type="range"] {
      width: 100%;
      height: 0.25rem;
      border-radius: 0.5rem;
      background-color: #535353;
      -webkit-appearance: none;
      cursor: pointer;
      accent-color: white;
    }
    footer .right-section {
      display: flex;
      align-items: center;
      gap: 1rem;
      min-width: 11.25rem;
      justify-content: flex-end;
      color: #b3b3b3;
    }
    footer .right-section button {
      background: none;
      border: none;
      color: inherit;
      font-size: 1.125rem;
      cursor: pointer;
      transition: color 0.2s ease;
    }
    footer .right-section button:hover {
      color: white;
    }
    footer .right-section input[type="range"] {
      width: 6rem;
      height: 0.25rem;
      border-radius: 0.5rem;
      background-color: #535353;
      -webkit-appearance: none;
      cursor: pointer;
      accent-color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        margin: 1rem 1rem 0 1rem;
        min-height: auto;
      }
      aside {
        width: 100%;
        flex-direction: row;
        gap: 1rem;
        overflow-x: auto;
        padding: 0.5rem 1rem;
      }
      aside .card {
        max-width: 12rem;
        flex: 1 0 auto;
      }
      main {
        padding: 1rem;
        margin-top: 1rem;
      }
      .top-bar {
        flex-wrap: wrap;
      }
      .top-bar-right {
        flex-wrap: wrap;
        gap: 0.5rem;
      }
      footer {
        flex-wrap: wrap;
        gap: 0.5rem;
      }
      footer .left-section,
      footer .right-section {
        min-width: auto;
        justify-content: center;
      }
      footer .center-section {
        max-width: 100%;
        flex-grow: 0;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside>
      <div class="top-icons">
        <img
          src="https://storage.googleapis.com/a1aa/image/42f0aecf-f6b4-4dbf-c8f2-001b47582a8f.jpg"
          alt="Spotify logo, white circle with black background"
          width="24"
          height="24"
        />
        <button aria-label="Home" title="Home">
          <i class="fas fa-home"></i>
        </button>
      </div>
      <div>
        <h2>Your Library</h2>
        <div class="card">
          <p class="title">Create your first playlist</p>
          <p class="subtitle">It's easy, we'll help you</p>
          <button>Create playlist</button>
        </div>
        <div class="card">
          <p class="title">Let's find some podcasts to follow</p>
          <p class="subtitle">We'll keep you updated on new episodes</p>
          <button>Browse podcasts</button>
        </div>
      </div>
    </aside>

    <!-- Main content -->
    <main>
      <!-- Top bar -->
      <div class="top-bar">
        <div class="search-container">
          <i class="fas fa-search"></i>
          <input type="search" placeholder="What do you want to play?" />
          <button aria-label="Search history" class="search-history-btn" title="Search history">
            <i class="fas fa-history"></i>
          </button>
        </div>
        <div class="top-bar-right">
          <button class="install-app" title="Install App">
            <i class="fas fa-clock"></i>
            <span>Install App</span>
          </button>
          <button aria-label="Friends" title="Friends" class="icon-btn">
            <i class="fas fa-user-friends"></i>
          </button>
          <button aria-label="Notifications" title="Notifications" class="icon-btn">
            <i class="fas fa-bell"></i>
          </button>
          <button aria-label="User profile" title="User profile" class="profile-btn">P</button>
        </div>
        <a href="/public/index.php?action=logout" 
   aria-label="Log out" 
   title="Log out" 
   class="logout-btn">Logout</a>

      </div>

      <!-- Filters -->
      <div class="filters">
        <button class="active">All</button>
        <button>Music</button>
        <button>Podcasts</button>
      </div>

      <!-- Content scroll area -->
      <div class="content-scroll" tabindex="0">
        <!-- Recommended for you -->
        <section>
          <div class="section-header">
            <h3>Recommended for you</h3>
            <button>Show all</button>
          </div>
          <div class="horizontal-scroll">
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/b422eddf-91ff-4c74-95f8-a46195ef1c85.jpg"
                alt="Person with green coat and gray background, recommended playlist cover"
                width="140"
                height="140"
              />
              <p class="description">the latest and greatest. Cover: Lev...</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/14096cb9-962e-4544-6e63-e2fd92bd717d.jpg"
                alt="Woman in red dress with green equal text, recommended playlist cover"
                width="140"
                height="140"
              />
              <p class="description">Listen to Women at Full Volume. Cover:...</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/63fbd3a0-3cea-4e74-92ba-f16e5470298d.jpg"
                alt="Man in blue hexagon frame, recommended playlist cover"
                width="140"
                height="140"
              />
              <p class="description">Discovery your new favourite artists fro...</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/bdff1140-112f-46ba-a616-2993ae0fb6fe.jpg"
                alt="Person with yellow background and red text, recommended playlist cover"
                width="140"
                height="140"
              />
              <p class="description">New Music from Maff, JHus, Burna...</p>
            </div>
          </div>
        </section>

        <!-- Featured Charts -->
        <section>
          <div class="section-header">
            <h3>Featured Charts</h3>
            <button>Show all</button>
          </div>
          <div class="horizontal-scroll">
<a href="index.php?action=playlist" style="text-decoration: none; color: inherit;">
  <div class="card">
    <img
      src="https://storage.googleapis.com/a1aa/image/8d8ee4c6-5fe2-4510-da49-3abbdb617db0.jpg"
      alt="Top 50 Global blue gradient chart cover"
      width="140"
      height="140"
    />
    <p class="description">Your daily update of the most played...</p>
  </div>
</a>

            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/cd0b15e5-9a33-4841-a015-a39a646558ea.jpg"
                alt="Top 50 USA pink gradient chart cover"
                width="140"
                height="140"
              />
              <p class="description">Your daily update of the most played...</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/0b11bcdc-3e7b-4183-ef92-30bf57894d2a.jpg"
                alt="Top Songs Global purple gradient chart cover"
                width="140"
                height="140"
              />
              <p class="description">Your weekly update of the most played...</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/ad955687-6fa4-44f0-8f26-538319177c99.jpg"
                alt="Top Songs USA red gradient chart cover"
                width="140"
                height="140"
              />
              <p class="description">Your weekly update of the most played...</p>
            </div>
          </div>
        </section>

        <!-- Friday drops picked for you -->
        <section>
          <p style="font-size: 0.75rem; color: #b3b3b3; margin-bottom: 0.25rem;">
            Brand new music from artists you love.
          </p>
          <div class="section-header">
            <h3>Friday drops picked for you</h3>
            <button>Show all</button>
          </div>
          <div class="horizontal-scroll">
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/9324d99a-05c1-4987-5f54-bfb967128b22.jpg"
                alt="Gold ring with diamonds on black background, Friday drops cover"
                width="140"
                height="140"
              />
              <p class="title">Gold</p>
              <p class="subtitle">J Hus, Asake</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/2a3f21c5-7d4b-43fd-f023-6de4d85fad99.jpg"
                alt="Abstract blue and yellow artwork, Friday drops cover"
                width="140"
                height="140"
              />
              <p class="title">Sweet Songs 4 You</p>
              <p class="subtitle">Lasmid, Tml Vibez</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/c135f83e-f3d5-479c-edfe-49c17652db42.jpg"
                alt="Prince of the Street album cover with man in white and group behind"
                width="140"
                height="140"
              />
              <p class="title">Prince of the Street</p>
              <p class="subtitle">Ayo Maff</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/d354ee11-9a50-40c6-436c-17c044c264b6.jpg"
                alt="Excellent Remix album cover with faces and orange background"
                width="140"
                height="140"
              />
              <p class="title">Excellent Remix (with Joeboy, Kizz Daniel)</p>
              <p class="subtitle">KOJO BLAK, Joeboy, Kizz Daniel, King Promise</p>
            </div>
          </div>
        </section>

        <!-- Shows to try -->
        <section>
          <div class="section-header">
            <h3>Shows to try</h3>
            <button>Show all</button>
          </div>
          <div class="horizontal-scroll">
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/e78686a7-be77-45ed-bfca-1c3a4e3c7991.jpg"
                alt="Trash Taste Podcast logo purple and white with trash can icon"
                width="140"
                height="140"
              />
              <p class="title">Trash Taste Podcast</p>
              <p class="subtitle">Trash Taste Podcast</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/898321ad-d594-4272-f40b-da1892ff7ee7.jpg"
                alt="Real Dictators podcast cover with 3 men and red background"
                width="140"
                height="140"
              />
              <p class="title">Real Dictators</p>
              <p class="subtitle">NOISER</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/c4829093-757c-4ff4-309d-978cf94a4b58.jpg"
                alt="Sincerely Accra podcast cover with cartoon faces and yellow background"
                width="140"
                height="140"
              />
              <p class="title">Sincerely Accra</p>
              <p class="subtitle">GCR</p>
            </div>
            <div class="card">
              <img
                src="https://storage.googleapis.com/a1aa/image/efc03f8e-8279-468a-cf67-30d9e2cff05b.jpg"
                alt="The Rest Is History podcast cover with red and white design"
                width="140"
                height="140"
              />
              <p class="title">The Rest Is History</p>
              <p class="subtitle">Goalhanger</p>
            </div>
          </div>
        </section>

        <!-- Footer links -->
        <div class="footer-links">
          <div>
            <span class="title">Company</span>
            <a href="#">About</a>
            <a href="#">Jobs</a>
            <a href="#">For the Record</a>
          </div>
          <div>
            <span class="title">Communities</span>
            <a href="#">For Artists</a>
            <a href="#">Developers</a>
            <a href="#">Advertising</a>
            <a href="#">Investors</a>
            <a href="#">Vendors</a>
          </div>
          <div>
            <span class="title">Useful links</span>
            <a href="#">Support</a>
            <a href="#">Web Player</a>
            <a href="#">Free Mobile App</a>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Bottom player bar -->
  <footer>
    <div class="left-section">
      <img
        src="https://storage.googleapis.com/a1aa/image/de2d69c3-dd1f-4335-cf16-41dfc4e02589.jpg"
        alt="Album cover art with black background and gold ring"
        width="56"
        height="56"
      />
      <div class="info">
        <span class="title">Gold</span>
        <span>J Hus, Asake</span>
      </div>
      <button aria-label="Like" class="like-btn" title="Like">
        <i class="fas fa-heart"></i>
      </button>
    </div>
    <div class="center-section">
      <div class="controls">
        <button aria-label="Shuffle" title="Shuffle">
          <i class="fas fa-random"></i>
        </button>
        <button aria-label="Previous" title="Previous">
          <i class="fas fa-step-backward"></i>
        </button>
        <button aria-label="Play/Pause" title="Play/Pause" class="play-pause">
          <i class="fas fa-pause"></i>
        </button>
        <button aria-label="Next" title="Next">
          <i class="fas fa-step-forward"></i>
        </button>
        <button aria-label="Repeat" title="Repeat">
          <i class="fas fa-redo"></i>
        </button>
      </div>
      <input type="range" min="0" max="100" value="40" />
    </div>
    <div class="right-section">
      <button aria-label="Queue" title="Queue">
        <i class="fas fa-list"></i>
      </button>
      <button aria-label="Devices" title="Devices">
        <i class="fas fa-desktop"></i>
      </button>
      <button aria-label="Volume" title="Volume">
        <i class="fas fa-volume-up"></i>
      </button>
      <input type="range" min="0" max="100" value="80" />
    </div>
  </footer>
</body>
</html>