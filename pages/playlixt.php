<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Spotify Playlist
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Spotify+Circular&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
    font-family: "Spotify Circular", "Helvetica Neue", Helvetica, Arial, sans-serif;
    background-color: #121212;
    color: white;
    user-select: none;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-bottom: 80px; /* space for fixed player */
  }
 header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem 1rem;
  background-color: #181818;
  border-bottom: 1px solid #282828;
  flex-shrink: 0;
}

.header-left, .header-right {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.search-wrapper {
  flex-grow: 2;
  max-width: 34rem;
  position: relative;
  display: flex;
  align-items: center;
}
  header button {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 9999px;
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 1.125rem;
    transition: background-color 0.2s;
    padding: 0;
    line-height: 1;
  }
  header button:hover {
    background-color: #282828;
  }
  header button.spotify-logo {
    background-color: #1db954;
    width: 2.5rem;
    height: 2.5rem;
    padding: 0;
  }
  header input[type="search"] {
    width: 100%;
    max-width: 24rem;
    border-radius: 9999px;
    background-color: #282828;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    font-size: 0.875rem;
    color: white;
    border: none;
    outline: none;
    box-sizing: border-box;
    line-height: 1.25rem;
  }
  header input[type="search"]::placeholder {
    color: #b3b3b3;
  }
  header .search-wrapper {
    position: relative;
    flex-grow: 1;
    max-width: 24rem;
    display: flex;
    align-items: center;
  }
  header .search-wrapper i {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #b3b3b3;
    font-size: 0.875rem;
    pointer-events: none;
    line-height: 1;
  }
  header .install-app {
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: white;
    cursor: pointer;
    background: none;
    border: none;
    transition: color 0.2s;
    white-space: nowrap;
    line-height: 1;
  }
  header .install-app:hover {
    color: #1db954;
  }
  header .profile-btn {
    background-color: #2a2a2a;
    font-size: 0.875rem;
    font-weight: 600;
    color: #1db954;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
  }
  .container {
    display: flex;
    flex: 1;
    overflow: hidden;
  }
  aside {
    background-color: #121212;
    width: 16rem;
    border-right: 1px solid #282828;
    padding: 1rem;
    overflow-y: auto;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
  }
  aside .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
  }
  aside .header h2 {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    color: white;
    margin: 0;
  }
  aside .header button {
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 9999px;
    border: 1px solid #b3b3b3;
    color: #b3b3b3;
    background: transparent;
    cursor: pointer;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s, border-color 0.2s;
  }
  aside .header button:hover {
    color: white;
    border-color: white;
  }
  aside .recents {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    font-size: 0.75rem;
    color: #b3b3b3;
    cursor: pointer;
  }
  aside .recents:hover {
    color: white;
  }
  aside nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }
  aside nav ul li a {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background-color: #282828;
    border-radius: 0.375rem;
    padding: 0.5rem 0.75rem;
    text-decoration: none;
    color: white;
    transition: background-color 0.2s;
    cursor: pointer;
  }
  aside nav ul li a:hover {
    background-color: #1db954;
  }
  aside nav ul li a .icon {
    width: 2.5rem;
    height: 3.5rem;
    border-radius: 0.375rem;
    background: linear-gradient(to bottom, #7a5af8, #1db954);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
  }
  aside nav ul li a .text {
    display: flex;
    flex-direction: column;
    font-size: 0.75rem;
  }
  aside nav ul li a .text .title {
    font-weight: 600;
    color: #1db954;
  }
  aside nav ul li a .text .subtitle {
    color: #b3b3b3;
  }
  main {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: relative;
  }
  section.playlist, section#liked-songs-view {
    background: linear-gradient(to bottom, #b80f1a, #7a0a0f);
    border-radius: 0.5rem;
    margin: 1rem;
    padding: 1.5rem;
    max-width: 64rem;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
  }
  /* Override background gradient for liked songs playlist to green */
  section#liked-songs-view {
    background: linear-gradient(to bottom, #1db954, #0a7a0f);
  }
  section.playlist .header, section#liked-songs-view .header {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
  }
  section.playlist .header img.cover, section#liked-songs-view .header img.cover {
    width: 9rem;
    height: 9rem;
    object-fit: cover;
    border-radius: 0.125rem;
    flex-shrink: 0;
  }
  section.playlist .header .info, section#liked-songs-view .header .info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
  }
  section.playlist .header .info .type, section#liked-songs-view .header .info .type {
    font-size: 0.75rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
  }
  section.playlist .header .info h1, section#liked-songs-view .header .info h1 {
    font-size: 1.875rem;
    font-weight: 800;
    margin: 0 0 0.25rem 0;
    line-height: 1.1;
  }
  section.playlist .header .info p, section#liked-songs-view .header .info p {
    font-size: 0.875rem;
    margin: 0 0 0.5rem 0;
  }
  section.playlist .header .info .spotify-info, section#liked-songs-view .header .info .spotify-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
  }
  section.playlist .header .info .spotify-info img, section#liked-songs-view .header .info .spotify-info img {
    width: 1rem;
    height: 1rem;
    flex-shrink: 0;
  }
  section.playlist .controls, section#liked-songs-view .controls {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    color: #b3b3b3;
    font-size: 1.125rem;
    user-select: none;
  }
  /* Controls color override for liked songs */
  section#liked-songs-view .controls {
    color: #b3b3b3;
  }
  section.playlist .controls button, section#liked-songs-view .controls button {
    background: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    transition: color 0.2s, transform 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  section.playlist .controls button.play, section#liked-songs-view .controls button.play {
    width: 3rem;
    height: 3rem;
    border-radius: 9999px;
    background-color: #1db954;
    color: black;
    font-size: 1.25rem;
  }
  section.playlist .controls button.play:hover, section#liked-songs-view .controls button.play:hover {
    transform: scale(1.05);
  }
  section.playlist .controls button:hover:not(.play), section#liked-songs-view .controls button:hover:not(.play) {
    color: white;
  }
  section.playlist .controls .current-cover, section#liked-songs-view .controls .current-cover {
    width: 3rem;
    height: 3rem;
    border-radius: 0.125rem;
    overflow: hidden;
    flex-shrink: 0;
  }
  section.playlist .controls .current-cover img, section#liked-songs-view .controls .current-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  section.playlist .controls .list-label, section#liked-songs-view .controls .list-label {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    cursor: pointer;
    user-select: none;
  }
  section.playlist .controls .list-label:hover, section#liked-songs-view .controls .list-label:hover {
    color: white;
  }
  section.playlist .table-header, section#liked-songs-view .table-header {
    display: grid;
    grid-template-columns: 40px 3fr 2fr 1fr 40px;
    border-bottom: 1px solid #282828;
    padding-bottom: 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: #b3b3b3;
    user-select: none;
  }
  section.playlist ul.songs-list, section#liked-songs-view ul.songs-list {
    margin: 0;
    padding: 0;
    list-style: none;
    overflow-y: auto;
    max-height: calc(100vh - 480px);
    scrollbar-width: thin;
    scrollbar-color: #282828 transparent;
  }
  section.playlist ul.songs-list::-webkit-scrollbar, section#liked-songs-view ul.songs-list::-webkit-scrollbar {
    width: 6px;
    height: 6px;
  }
  section.playlist ul.songs-list::-webkit-scrollbar-thumb, section#liked-songs-view ul.songs-list::-webkit-scrollbar-thumb {
    background-color: #282828;
    border-radius: 3px;
  }
  section.playlist ul.songs-list::-webkit-scrollbar-track, section#liked-songs-view ul.songs-list::-webkit-scrollbar-track {
    background: transparent;
  }
  section.playlist ul.songs-list li, section#liked-songs-view ul.songs-list li {
    display: grid;
    grid-template-columns: 40px 3fr 2fr 1fr 40px;
    align-items: center;
    padding: 0.5rem 0;
    font-size: 0.75rem;
    color: #b3b3b3;
    position: relative;
  }
  /* Override selected background and text color for liked songs */
  section#liked-songs-view ul.songs-list li.selected {
    background-color: #1a4720;
    color: #1db954;
  }
  /* Override selected duration color for liked songs */
  section#liked-songs-view ul.songs-list li.selected .duration {
    color: #1db954;
  }
  section.playlist ul.songs-list li.selected, section#liked-songs-view ul.songs-list li.selected {
    /* fallback for playlist */
  }
  section.playlist ul.songs-list li .index, section#liked-songs-view ul.songs-list li .index {
    text-align: center;
    font-weight: 600;
    font-size: 0.875rem;
    color: inherit;
  }
  section.playlist ul.songs-list li .title, section#liked-songs-view ul.songs-list li .title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: inherit;
  }
  section.playlist ul.songs-list li .title img, section#liked-songs-view ul.songs-list li .title img {
    width: 2.5rem;
    height: 2.5rem;
    object-fit: cover;
    border-radius: 0.125rem;
    flex-shrink: 0;
  }
  section.playlist ul.songs-list li .title .text, section#liked-songs-view ul.songs-list li .title .text {
    display: flex;
    flex-direction: column;
    font-size: 0.75rem;
    color: inherit;
  }
  section.playlist ul.songs-list li .title .text .song-name, section#liked-songs-view ul.songs-list li .title .text .song-name {
    font-weight: 600;
    color: inherit;
  }
  section.playlist ul.songs-list li .title .text .artist, section#liked-songs-view ul.songs-list li .title .text .artist {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: #b3b3b3;
    font-size: 0.625rem;
  }
  section.playlist ul.songs-list li .title .text .artist .explicit, section#liked-songs-view ul.songs-list li .title .text .artist .explicit {
    border: 1px solid #b3b3b3;
    font-size: 0.5rem;
    font-weight: 700;
    padding: 0 0.25rem;
    border-radius: 0.125rem;
    line-height: 1;
    color: #b3b3b3;
    display: inline-block;
  }
  section.playlist ul.songs-list li .album, section#liked-songs-view ul.songs-list li .album {
    font-size: 0.75rem;
    color: inherit;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
  section.playlist ul.songs-list li .duration, section#liked-songs-view ul.songs-list li .duration {
    font-size: 0.75rem;
    color: inherit;
    text-align: right;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 0.5rem;
    min-width: 40px;
    position: relative;
  }
  section.playlist ul.songs-list li .duration button, section#liked-songs-view ul.songs-list li .duration button {
    background: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    font-size: 1rem;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  section.playlist ul.songs-list li .duration button:hover, section#liked-songs-view ul.songs-list li .duration button:hover {
    color: white;
  }
  section.playlist ul.songs-list li .duration .time-text, section#liked-songs-view ul.songs-list li .duration .time-text {
    user-select: none;
  }
  section.playlist ul.songs-list li .duration .check-icon, section#liked-songs-view ul.songs-list li .duration .check-icon {
    color: #1db954;
    font-size: 1rem;
    flex-shrink: 0;
  }
  section.playlist ul.songs-list li .more-options, section#liked-songs-view ul.songs-list li .more-options {
    font-size: 1rem;
    cursor: pointer;
    color: #b3b3b3;
    transition: color 0.2s;
    background: transparent;
    border: none;
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
  }
  section.playlist ul.songs-list li .more-options:hover, section#liked-songs-view ul.songs-list li .more-options:hover {
    color: white;
  }
  section.playlist ul.songs-list li .duration .select-toggle, section#liked-songs-view ul.songs-list li .duration .select-toggle {
    font-size: 1.25rem;
    cursor: pointer;
    color: #b3b3b3;
    margin-right: 0.5rem;
    flex-shrink: 0;
    transition: color 0.2s;
  }
  section.playlist ul.songs-list li .duration .select-toggle:hover, section#liked-songs-view ul.songs-list li .duration .select-toggle:hover {
    color: #e74c3c;
  }
  section.playlist ul.songs-list li.selected .duration .select-toggle, section#liked-songs-view ul.songs-list li.selected .duration .select-toggle {
    color: #1db954;
  }
  section.playlist ul.songs-list li.selected .duration .select-toggle:hover, section#liked-songs-view ul.songs-list li.selected .duration .select-toggle:hover {
    color: #1ed760;
  }

  footer.player-bar {
    position: fixed;
    bottom: 0; /* leave space for new footer */
    left: 0;
    right: 0;
    background-color: #181818;
    border-top: 1px solid #282828;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.5rem 1rem;
    font-size: 0.75rem;
    z-index: 1000;
  }
  footer.player-bar .left,
  footer.player-bar .right {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 16rem;
    flex-shrink: 0;
  }
  footer.player-bar .left img {
    width: 3.5rem;
    height: 3.5rem;
    object-fit: cover;
    border-radius: 0.125rem;
    flex-shrink: 0;
  }
  footer.player-bar .left .info {
    display: flex;
    flex-direction: column;
    color: white;
  }
  footer.player-bar .left .info .title {
    font-weight: 600;
  }
  footer.player-bar .left .info .artist {
    color: #b3b3b3;
    font-size: 0.625rem;
  }
  footer.player-bar .left .check-icon {
    color: #1db954;
    font-size: 1rem;
    flex-shrink: 0;
  }
  footer.player-bar .center {
    flex: 1;
    max-width: 64rem;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    user-select: none;
  }
  footer.player-bar .center .controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    color: white;
  }
  footer.player-bar .center .controls button {
    background: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    font-size: 1.25rem;
    transition: color 0.2s, transform 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  footer.player-bar .center .controls button.play {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 9999px;
    background-color: white;
    color: black;
    font-size: 1.5rem;
  }
  footer.player-bar .center .controls button.play:hover {
    transform: scale(1.1);
  }
  footer.player-bar .center .controls button:hover:not(.play) {
    color: #1db954;
  }
  footer.player-bar .center .progress {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #b3b3b3;
    font-size: 0.75rem;
  }
  footer.player-bar .center .progress .bar {
    flex: 1;
    height: 0.25rem;
    background-color: #282828;
    border-radius: 9999px;
    position: relative;
    cursor: pointer;
  }
  footer.player-bar .center .progress .bar .progress-fill {
    height: 100%;
    background-color: white;
    border-radius: 9999px;
    width: 40%;
  }
  footer.player-bar .right {
    justify-content: flex-end;
    color: #b3b3b3;
    gap: 1rem;
  }
  footer.player-bar .right button {
    background: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    font-size: 1rem;
    transition: color 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  footer.player-bar .right button:hover {
    color: white;
  }
  footer.player-bar .right .volume {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
  }
  footer.player-bar .right .volume .bar {
    width: 6rem;
    height: 0.25rem;
    background-color: #282828;
    border-radius: 9999px;
    position: relative;
  }
  footer.player-bar .right .volume .bar .progress-fill {
    height: 100%;
    background-color: white;
    border-radius: 9999px;
    width: 70%;
  }

  /* Footer */
  footer.footer {
    background-color: #121212;
    border-top: 1px solid #282828;
    padding: 32px 24px;
    font-size: 0.75rem;
    color: #b3b3b3;
    overflow: hidden;
    flex-shrink: 0;
  }
  footer.footer .container {
    max-width: 1120px;
    margin: 0 auto;
  }
  footer.footer .grid-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 48px;
    margin-bottom: 32px;
  }
  @media (min-width: 768px) {
    footer.footer .grid-row {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  footer.footer h3 {
    font-weight: 700;
    color: white;
    margin-bottom: 8px;
  }
  footer.footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  footer.footer ul li {
    margin-bottom: 4px;
  }
  footer.footer ul li a {
    color: #b3b3b3;
    text-decoration: none;
  }
  footer.footer ul li a:hover {
    text-decoration: underline;
  }
  footer.footer .social-icons {
    display: flex;
    gap: 16px;
    margin-bottom: 24px;
  }
  footer.footer .social-icons a {
    width: 32px;
    height: 32px;
    background-color: #282828;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.875rem;
    transition: background-color 0.2s ease;
  }
  footer.footer .social-icons a:hover {
    background-color: #1ed760;
  }
  footer.footer hr {
    border: none;
    border-top: 1px solid #282828;
    margin-bottom: 16px;
  }
  footer.footer .bottom-links {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    font-size: 0.625rem;
    color: #b3b3b3;
    margin-bottom: 8px;
  }
  footer.footer .bottom-links a {
    color: #b3b3b3;
    text-decoration: none;
  }
  footer.footer .bottom-links a:hover {
    text-decoration: underline;
  }
  footer.footer .copyright {
    font-size: 0.625rem;
    color: #b3b3b3;
  }
  /* Responsive */
  @media (max-width: 768px) {
    footer.footer {
      padding: 24px 16px;
    }
    footer.footer .grid-row {
      grid-template-columns: 1fr;
      gap: 24px;
    }
  }
  @media (max-width: 768px) {
    aside {
      width: 12rem;
      padding: 0.5rem;
    }
    section.playlist {
      margin: 0.5rem;
      padding: 1rem;
      max-width: 100%;
    }
    section.playlist .header img.cover {
      width: 6rem;
      height: 6rem;
    }
    footer.player-bar .left,
    footer.player-bar .right {
      width: 12rem;
    }
    header input[type="search"] {
      max-width: 100%;
    }
  }
  </style>
 </head>
 <body>
  <div class="app-container" style="display:flex; flex-direction: column; min-height: 100vh;">
   <header>
    <button aria-label="Spotify logo" class="spotify-logo">
     <img alt="Spotify logo, white circle with three curved lines inside" height="24" src="https://storage.googleapis.com/a1aa/image/63bc5c0f-caa7-44ff-6ada-813c83995397.jpg" width="24"/>
    </button>
    <button aria-label="Home">
     <i class="fas fa-home">
     </i>
    </button>
    <div class="search-wrapper">
     <input placeholder="What do you want to play?" type="search"/>
     <i class="fas fa-search">
     </i>
    </div>
    <button aria-label="Queue">
     <i class="fas fa-list-ul">
     </i>
    </button>
    <button aria-label="Install App" class="install-app">
     <i class="far fa-clock">
     </i>
     Install App
    </button>
    <button aria-label="Notifications">
     <i class="fas fa-bell">
     </i>
    </button>
    <button aria-label="Friends Activity">
     <i class="fas fa-user-friends">
     </i>
    </button>
    <button aria-label="User Profile" class="profile-btn">
     P
    </button>
    <a href="/public/index.php?action=logout" 
   aria-label="Log out" 
   title="Log out" 
   class="logout-btn">Logout</a>
   </header>
   <div class="container" style="flex:1; display:flex; overflow:hidden; flex-direction: row;">
    <aside>
     <div class="header">
      <h2>
       Your Library
      </h2>
      <button aria-label="Add new">
       <i class="fas fa-plus">
       </i>
      </button>
     </div>
     <div class="recents" role="button" tabindex="0">
      Recents
      <i class="fas fa-list-ul">
      </i>
     </div>
     <nav>
      <ul>
       <li>
        <a aria-current="true" class="playlist-link" href="#">
         <div class="icon">
          <i class="fas fa-heart">
          </i>
         </div>
         <div class="text">
          <span class="title">
           Liked Songs
          </span>
          <span class="subtitle" id="liked-songs-count">
           Playlist • 0 songs
          </span>
         </div>
        </a>
       </li>
      </ul>
     </nav>
    </aside>
    <main style="flex:1; display:flex; flex-direction: column; overflow: hidden; position: relative;">
     <section aria-label="Playlist Top 200 GLOBAL" class="playlist" style="flex-shrink: 0;">
      <div class="header">
       <img alt="Top 200 GLOBAL playlist cover art with green and black Spotify style gradient" class="cover" height="150" src="https://storage.googleapis.com/a1aa/image/e7e8a619-8045-4b15-f96d-eca2c7064129.jpg" width="150"/>
       <div class="info">
        <span class="type">
         Public Playlist
        </span>
        <h1 id="playlist-title">
         Top 200 GLOBAL
        </h1>
        <p>
         Top 200 tracks globally from Spotify81 API.
        </p>
        <div class="spotify-info">
         <img alt="Spotify logo icon" height="16" src="https://storage.googleapis.com/a1aa/image/fecc4535-ad86-45fa-52f2-1b16a4aac2a9.jpg" width="16"/>
         <span>
          Spotify
         </span>
         <span>
          •
          <span id="total-tracks-count">
           0
          </span>
          songs
         </span>
        </div>
       </div>
      </div>
      <div aria-label="Playlist controls" class="controls" role="group">
       <button aria-label="Play" class="play" id="play-all-btn">
        <i class="fas fa-play">
        </i>
       </button>
       <button aria-label="Shuffle" id="shuffle-btn">
        <i class="fas fa-random">
        </i>
       </button>
       <div class="list-label" id="toggle-liked-view" role="button" tabindex="0">
        <span>
         Liked Songs
        </span>
        <i class="fas fa-list-ul">
        </i>
       </div>
      </div>
      <div class="table-header" role="row">
       <div>
        #
       </div>
       <div>
        Title
       </div>
       <div>
        Album
       </div>
       <div>
        Duration
       </div>
       <div>
        Like
       </div>
      </div>
      <ul class="songs-list" id="songs-list" role="list" style="max-height: calc(100vh - 480px); overflow-y: auto; padding: 0; margin: 0; list-style: none;">
       <!-- Tracks will be dynamically inserted here -->
      </ul>
     </section>
     <section aria-label="Liked Songs Selected List" id="liked-songs-view" style="display:none; flex-shrink: 0;">
      <div class="header">
       <img alt="Liked Songs cover art with heart icon on gradient background" class="cover" height="150" src="https://storage.googleapis.com/a1aa/image/63bc5c0f-caa7-44ff-6ada-813c83995397.jpg" width="150"/>
       <div class="info">
        <span class="type">
         Liked Songs
        </span>
        <h1>
         Selected Songs
        </h1>
        <p>
         These are the songs you have liked.
        </p>
        <div class="spotify-info">
         <img alt="Spotify logo icon" height="16" src="https://storage.googleapis.com/a1aa/image/fecc4535-ad86-45fa-52f2-1b16a4aac2a9.jpg" width="16"/>
         <span>
          Spotify
         </span>
         <span>
          •
          <span id="liked-count-display">
           0
          </span>
          songs selected
         </span>
        </div>
       </div>
      </div>
      <div aria-label="Liked songs controls" class="controls" role="group">
       <button aria-label="Play" class="play" id="play-liked-btn">
        <i class="fas fa-play">
        </i>
       </button>
       <div class="list-label" id="toggle-all-view" role="button" tabindex="0">
        <span>
         All Songs
        </span>
        <i class="fas fa-list-ul">
        </i>
       </div>
      </div>
      <div class="table-header" role="row">
       <div>
        #
       </div>
       <div>
        Title
       </div>
       <div>
        Album
       </div>
       <div>
        Duration
       </div>
       <div>
        Like
       </div>
      </div>
      <ul class="songs-list" id="liked-songs-list" role="list" style="max-height: calc(100vh - 480px); overflow-y: auto; padding: 0; margin: 0; list-style: none;">
       <!-- Selected songs will be dynamically inserted here -->
      </ul>
     </section>
    </main>
   </div>
   <footer class="player-bar" role="contentinfo">
    <div class="left">
     <img alt="Current playing song album cover art" height="56" id="player-album-art" src="https://storage.googleapis.com/a1aa/image/c989586f-31f1-4422-4e89-c9285192f6a9.jpg" width="56"/>
     <div class="info">
      <span class="title" id="player-track-title">
       Not Playing
      </span>
      <span class="artist" id="player-track-artist">
      </span>
     </div>
     <i class="fas fa-check-circle check-icon" style="visibility:hidden;">
     </i>
    </div>
    <div class="center">
     <div aria-label="Player controls" class="controls" role="group">
      <button aria-label="Shuffle" id="player-shuffle-btn">
       <i class="fas fa-random">
       </i>
      </button>
      <button aria-label="Previous" id="player-prev-btn">
       <i class="fas fa-step-backward">
       </i>
      </button>
      <button aria-label="Play" class="play" id="player-play-btn">
       <i class="fas fa-play">
       </i>
      </button>
      <button aria-label="Next" id="player-next-btn">
       <i class="fas fa-step-forward">
       </i>
      </button>
      <button aria-label="Repeat" id="player-repeat-btn">
       <i class="fas fa-redo">
       </i>
      </button>
      <button aria-label="Connect to device">
       <i class="fas fa-laptop">
       </i>
      </button>
     </div>
     <div class="progress">
      <span id="progress-current">
       0:00
      </span>
      <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="bar" id="progress-bar" role="progressbar" tabindex="0">
       <div class="progress-fill" id="progress-fill" style="width: 0%;">
       </div>
      </div>
      <span id="progress-duration">
       0:00
      </span>
     </div>
    </div>
    <div class="right">
     <button aria-label="Lyrics">
      <i class="fas fa-pen">
      </i>
     </button>
     <button aria-label="Queue">
      <i class="fas fa-list">
      </i>
     </button>
     <button aria-label="Devices">
      <i class="fas fa-desktop">
      </i>
     </button>
     <button aria-label="Volume" class="volume">
      <i class="fas fa-volume-up">
      </i>
      <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="bar" role="progressbar" tabindex="0">
       <div class="progress-fill" style="width: 70%;">
       </div>
      </div>
     </button>
     <button aria-label="Fullscreen">
      <i class="fas fa-expand">
      </i>
     </button>
    </div>
   </footer>
   <footer class="footer" role="contentinfo">
    <div class="container">
     <div class="grid-row">
      <div>
       <h3>
        Company
       </h3>
       <ul>
        <li>
         <a href="#">
          About
         </a>
        </li>
        <li>
         <a href="#">
          Jobs
         </a>
        </li>
        <li>
         <a href="#">
          For the Record
         </a>
        </li>
       </ul>
      </div>
      <div>
       <h3>
        Communities
       </h3>
       <ul>
        <li>
         <a href="#">
          For Artists
         </a>
        </li>
        <li>
         <a href="#">
          Developers
         </a>
        </li>
        <li>
         <a href="#">
          Advertising
         </a>
        </li>
        <li>
         <a href="#">
          Investors
         </a>
        </li>
        <li>
         <a href="#">
          Vendors
         </a>
        </li>
       </ul>
      </div>
     </div>
     <div class="grid-row">
      <div>
       <h3>
        Useful links
       </h3>
       <ul>
        <li>
         <a href="#">
          Support
         </a>
        </li>
        <li>
         <a href="#">
          Free Mobile App
         </a>
        </li>
       </ul>
      </div>
      <div>
       <h3>
        Spotify Plans
       </h3>
       <ul>
        <li>
         <a href="#">
          Premium Individual
         </a>
        </li>
        <li>
         <a href="#">
          Premium Duo
         </a>
        </li>
        <li>
         <a href="#">
          Premium Family
         </a>
        </li>
        <li>
         <a href="#">
          Premium Student
         </a>
        </li>
        <li>
         <a href="#">
          Spotify Free
         </a>
        </li>
       </ul>
      </div>
     </div>
     <div aria-label="Social media links" class="social-icons" role="region">
      <a aria-label="Instagram" href="#" title="Instagram">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a aria-label="Twitter" href="#" title="Twitter">
       <i class="fab fa-twitter">
       </i>
      </a>
      <a aria-label="Facebook" href="#" title="Facebook">
       <i class="fab fa-facebook-f">
       </i>
      </a>
     </div>
     <hr/>
     <div class="bottom-links">
      <a href="#">
       Legal
      </a>
      <a href="#">
       Safety &amp; Privacy Center
      </a>
      <a href="#">
       Privacy Policy
      </a>
      <a href="#">
       Cookies
      </a>
      <a href="#">
       About Ads
      </a>
      <a href="#">
       Accessibility
      </a>
     </div>
     <div class="copyright">
      © 2025 Spotify AB
     </div>
    </div>
   </footer>
  </div>
  <audio id="audio-player" style="display:none;">
  </audio>
  <script>
   (() => {
    const API_KEY = '85c4e1ff18mshe0620c3f8e17d6ap18de85jsne6f3702ce5e3';
    const API_HOST = 'spotify81.p.rapidapi.com';

    const playlistTitleElem = document.getElementById('playlist-title');
    const totalTracksCountElem = document.getElementById('total-tracks-count');
    const songsListElem = document.getElementById('songs-list');
    const likedSongsView = document.getElementById('liked-songs-view');
    const likedSongsListElem = document.getElementById('liked-songs-list');
    const likedCountDisplay = document.getElementById('liked-count-display');
    const likedSongsCountSpan = document.getElementById('liked-songs-count');
    const playlistSection = document.querySelector('section.playlist');
    const toggleLikedViewBtn = document.getElementById('toggle-liked-view');
    const toggleAllViewBtn = document.getElementById('toggle-all-view');
    const audioPlayer = document.getElementById('audio-player');

    const playerAlbumArt = document.getElementById('player-album-art');
    const playerTrackTitle = document.getElementById('player-track-title');
    const playerTrackArtist = document.getElementById('player-track-artist');
    const playerPlayBtn = document.getElementById('player-play-btn');
    const playerPrevBtn = document.getElementById('player-prev-btn');
    const playerNextBtn = document.getElementById('player-next-btn');
    const progressBar = document.getElementById('progress-bar');
    const progressFill = document.getElementById('progress-fill');
    const progressCurrent = document.getElementById('progress-current');
    const progressDuration = document.getElementById('progress-duration');

    let tracks = [];
    let likedTrackIds = new Set();
    let currentTrackIndex = -1;
    let isPlaying = false;
    let currentPlaylist = 'all'; // 'all' or 'liked'
    let likedPlaylistTracks = [];

    function formatDuration(ms) {
      const totalSeconds = Math.floor(ms / 1000);
      const minutes = Math.floor(totalSeconds / 60);
      const seconds = totalSeconds % 60;
      return `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    function createTrackListItem(track, index) {
      const li = document.createElement('li');
      li.setAttribute('role', 'row');
      li.dataset.trackId = track.id;
      li.dataset.index = index;

      if (likedTrackIds.has(track.id)) {
        li.classList.add('selected');
      }

      li.innerHTML = `
        <div class="index" role="gridcell">${index + 1}</div>
        <div class="title" role="gridcell">
          <img alt="Album cover art for ${track.album.name}" src="${track.album.images[0]?.url || 'https://placehold.co/40x40/png?text=No+Image'}" height="40" width="40" />
          <div class="text">
            <span class="song-name">${track.name}</span>
            <span class="artist">${track.artists.map(a => a.name).join(', ')}</span>
          </div>
        </div>
        <div class="album" role="gridcell" title="${track.album.name}">${track.album.name}</div>
        <div class="duration" role="gridcell">
          <button aria-label="Play ${track.name}" class="play-btn" ${!track.preview_url ? 'disabled' : ''} title="${track.preview_url ? 'Play preview' : 'Preview not available'}">
            <i class="far fa-play-circle"></i>
          </button>
          <span class="time-text">${formatDuration(track.duration_ms)}</span>
        </div>
        <div class="duration" role="gridcell">
          <button aria-label="Toggle like for ${track.name}" class="select-toggle" title="Toggle like for ${track.name}">
            <i class="${likedTrackIds.has(track.id) ? 'fas fa-check-circle' : 'far fa-times-circle'}"></i>
          </button>
        </div>
      `;

      // Play button event
      const playBtn = li.querySelector('.play-btn');
      if (playBtn) {
        playBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          playTrackByIndex(index);
        });
      }

      // Like toggle event
      const selectToggle = li.querySelector('.select-toggle');
      if (selectToggle) {
        selectToggle.addEventListener('click', (e) => {
          e.stopPropagation();
          toggleLike(track.id, li);
        });
        selectToggle.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleLike(track.id, li);
          }
        });
      }

      // Clicking row plays track
      li.addEventListener('click', () => {
        playTrackByIndex(index);
      });

      return li;
    }

    function renderTracks() {
      songsListElem.innerHTML = '';
      tracks.forEach((track, index) => {
        const li = createTrackListItem(track, index);
        songsListElem.appendChild(li);
      });
      totalTracksCountElem.textContent = tracks.length;
      updateLikedSongsCount();
    }

    function renderLikedSongs() {
      likedSongsListElem.innerHTML = '';
      likedPlaylistTracks = tracks.filter(t => likedTrackIds.has(t.id));
      if (likedPlaylistTracks.length === 0) {
        likedSongsListElem.innerHTML = '<li style="color:#b3b3b3; padding: 1rem;">No songs selected.</li>';
        likedCountDisplay.textContent = '0';
        return;
      }
      likedPlaylistTracks.forEach((track, index) => {
        const li = document.createElement('li');
        li.setAttribute('role', 'row');
        li.dataset.trackId = track.id;
        li.dataset.index = index;
        li.classList.add('selected');
        li.innerHTML = `
          <div class="index" role="gridcell">${index + 1}</div>
          <div class="title" role="gridcell">
            <img alt="Album cover art for ${track.album.name}" src="${track.album.images[0]?.url || 'https://placehold.co/40x40/png?text=No+Image'}" height="40" width="40" />
            <div class="text">
              <span class="song-name">${track.name}</span>
              <span class="artist">${track.artists.map(a => a.name).join(', ')}</span>
            </div>
          </div>
          <div class="album" role="gridcell" title="${track.album.name}">${track.album.name}</div>
          <div class="duration" role="gridcell">
            <button aria-label="Play ${track.name}" class="play-btn" ${!track.preview_url ? 'disabled' : ''} title="${track.preview_url ? 'Play preview' : 'Preview not available'}">
              <i class="far fa-play-circle"></i>
            </button>
            <span class="time-text">${formatDuration(track.duration_ms)}</span>
          </div>
          <div class="duration" role="gridcell">
            <button aria-label="Toggle like for ${track.name}" class="select-toggle" title="Toggle like for ${track.name}">
              <i class="fas fa-check-circle"></i>
            </button>
          </div>
        `;

        const playBtn = li.querySelector('.play-btn');
        if (playBtn) {
          playBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            playTrackByIndexInLiked(index);
          });
        }

        const selectToggle = li.querySelector('.select-toggle');
        if (selectToggle) {
          selectToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleLike(track.id, li);
          });
          selectToggle.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              toggleLike(track.id, li);
            }
          });
        }

        li.addEventListener('click', () => {
          playTrackByIndexInLiked(index);
        });

        likedSongsListElem.appendChild(li);
      });
      likedCountDisplay.textContent = likedPlaylistTracks.length;
    }

    function toggleLike(trackId, liElement) {
      if (likedTrackIds.has(trackId)) {
        likedTrackIds.delete(trackId);
        liElement.classList.remove('selected');
        const icon = liElement.querySelector('.select-toggle i');
        if (icon) {
          icon.classList.remove('fas', 'fa-check-circle');
          icon.classList.add('far', 'fa-times-circle');
        }
      } else {
        likedTrackIds.add(trackId);
        liElement.classList.add('selected');
        const icon = liElement.querySelector('.select-toggle i');
        if (icon) {
          icon.classList.remove('far', 'fa-times-circle');
          icon.classList.add('fas', 'fa-check-circle');
        }
      }
      updateLikedSongsCount();
      if (likedSongsView.style.display === 'flex') {
        renderLikedSongs();
      }
    }

    function updateLikedSongsCount() {
      const count = likedTrackIds.size;
      likedSongsCountSpan.textContent = `Playlist • ${count} song${count !== 1 ? 's' : ''}`;
      likedCountDisplay.textContent = count;
    }

    function playTrackByIndex(index) {
      if (index < 0 || index >= tracks.length) return;
      const track = tracks[index];
      if (!track.preview_url) return; // no preview available

      currentTrackIndex = index;
      currentPlaylist = 'all';
      audioPlayer.src = track.preview_url;
      audioPlayer.play().catch(() => {});
      isPlaying = true;
      updatePlayerUI(track);
    }

    function playTrackByIndexInLiked(index) {
      if (index < 0 || index >= likedPlaylistTracks.length) return;
      const track = likedPlaylistTracks[index];
      if (!track.preview_url) return; // no preview available

      currentTrackIndex = index;
      currentPlaylist = 'liked';
      audioPlayer.src = track.preview_url;
      audioPlayer.play().catch(() => {});
      isPlaying = true;
      updatePlayerUI(track);
    }

    function updatePlayerUI(track) {
      playerAlbumArt.src = track.album.images[0]?.url || 'https://placehold.co/56x56/png?text=No+Image';
      playerTrackTitle.textContent = track.name;
      playerTrackArtist.textContent = track.artists.map(a => a.name).join(', ');
      playerPlayBtn.querySelector('i').className = 'fas fa-pause';
    }

    function togglePlayPause() {
      if (isPlaying) {
        audioPlayer.pause();
        isPlaying = false;
        playerPlayBtn.querySelector('i').className = 'fas fa-play';
      } else {
        if (audioPlayer.src) {
          audioPlayer.play().catch(() => {});
          isPlaying = true;
          playerPlayBtn.querySelector('i').className = 'fas fa-pause';
        } else if (tracks.length > 0) {
          playTrackByIndex(0);
        }
      }
    }

    function playNextTrack() {
      if (currentPlaylist === 'all') {
        if (tracks.length === 0) return;
        let nextIndex = currentTrackIndex + 1;
        if (nextIndex >= tracks.length) nextIndex = 0;
        playTrackByIndex(nextIndex);
      } else if (currentPlaylist === 'liked') {
        if (likedPlaylistTracks.length === 0) return;
        let nextIndex = currentTrackIndex + 1;
        if (nextIndex >= likedPlaylistTracks.length) nextIndex = 0;
        playTrackByIndexInLiked(nextIndex);
      }
    }

    function playPrevTrack() {
      if (currentPlaylist === 'all') {
        if (tracks.length === 0) return;
        let prevIndex = currentTrackIndex - 1;
        if (prevIndex < 0) prevIndex = tracks.length - 1;
        playTrackByIndex(prevIndex);
      } else if (currentPlaylist === 'liked') {
        if (likedPlaylistTracks.length === 0) return;
        let prevIndex = currentTrackIndex - 1;
        if (prevIndex < 0) prevIndex = likedPlaylistTracks.length - 1;
        playTrackByIndexInLiked(prevIndex);
      }
    }

    function updateProgress() {
      if (!audioPlayer.duration) return;
      const percent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
      progressFill.style.width = percent + '%';
      progressCurrent.textContent = formatDuration(audioPlayer.currentTime * 1000);
      progressDuration.textContent = formatDuration(audioPlayer.duration * 1000);
    }

    function seek(e) {
      const rect = progressBar.getBoundingClientRect();
      const clickX = e.clientX - rect.left;
      const width = rect.width;
      const seekTime = (clickX / width) * audioPlayer.duration;
      audioPlayer.currentTime = seekTime;
    }

    function fetchTop200Tracks() {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        
        xhr.addEventListener('readystatechange', () => {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              try {
                const res = JSON.parse(xhr.responseText);
                resolve(res);
              } catch (e) {
                reject(e);
              }
            } else {
              reject(new Error('Failed to load top 200 tracks'));
            }
          }
        });
        xhr.open('GET', 'https://spotify81.p.rapidapi.com/top_200_tracks?country=GLOBAL');
        xhr.setRequestHeader('x-rapidapi-key', API_KEY);
        xhr.setRequestHeader('x-rapidapi-host', API_HOST);
        xhr.send(null);
      });
    }

    function fetchTrackDetailsBatch(trackIds) {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
       
        xhr.addEventListener('readystatechange', () => {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              try {
                const res = JSON.parse(xhr.responseText);
                resolve(res.tracks);
              } catch (e) {
                reject(e);
              }
            } else {
              reject(new Error('Failed to load track details'));
            }
          }
        });
        xhr.open('GET', `https://spotify81.p.rapidapi.com/tracks?ids=${trackIds.join(',')}`);
        xhr.setRequestHeader('x-rapidapi-key', API_KEY);
        xhr.setRequestHeader('x-rapidapi-host', API_HOST);
        xhr.send(null);
      });
    }

    async function loadPlaylist() {
      try {
        playlistTitleElem.textContent = 'Loading Top 200 GLOBAL...';
        const top200 = await fetchTop200Tracks();
        const trackUris = top200
          .map(item => item.trackMetadata?.trackUri)
          .filter(uri => uri && uri.startsWith('spotify:track:'))
          .map(uri => uri.split(':')[2]);

        // Limit to first 50 tracks for performance
        const limitedTrackIds = trackUris.slice(0, 50);

        // Fetch details in batches of 50 (max per API)
        const detailedTracks = await fetchTrackDetailsBatch(limitedTrackIds);

        tracks = detailedTracks;
        playlistTitleElem.textContent = 'Top 200 GLOBAL';
        renderTracks();
      } catch (e) {
        playlistTitleElem.textContent = 'Failed to load Top 200 GLOBAL';
        console.error(e);
      }
    }

    // Toggle between all tracks and liked tracks view
    toggleLikedViewBtn.addEventListener('click', () => {
      likedSongsView.style.display = 'flex';
      playlistSection.style.display = 'none';
      renderLikedSongs();
    });
    toggleAllViewBtn.addEventListener('click', () => {
      likedSongsView.style.display = 'none';
      playlistSection.style.display = 'flex';
    });

    // Also add event listener to the nav bar liked songs link
    const navLikedSongsLink = document.querySelector('a.playlist-link');
    if (navLikedSongsLink) {
      navLikedSongsLink.addEventListener('click', (e) => {
        e.preventDefault();
        likedSongsView.style.display = 'flex';
        playlistSection.style.display = 'none';
        renderLikedSongs();
      });
    }

    // Player controls
    playerPlayBtn.addEventListener('click', togglePlayPause);
    playerNextBtn.addEventListener('click', playNextTrack);
    playerPrevBtn.addEventListener('click', playPrevTrack);

    audioPlayer.addEventListener('timeupdate', updateProgress);
    audioPlayer.addEventListener('ended', playNextTrack);

    progressBar.addEventListener('click', seek);

    // Play all button plays first track
    document.getElementById('play-all-btn').addEventListener('click', () => {
      if (tracks.length > 0) {
        currentPlaylist = 'all';
        playTrackByIndex(0);
      }
    });

    // Play liked button plays first liked track
    document.getElementById('play-liked-btn').addEventListener('click', () => {
      if (likedPlaylistTracks.length > 0) {
        currentPlaylist = 'liked';
        playTrackByIndexInLiked(0);
      }
    });

    // Shuffle button shuffles and plays random track
    document.getElementById('shuffle-btn').addEventListener('click', () => {
      if (tracks.length === 0) return;
      const randomIndex = Math.floor(Math.random() * tracks.length);
      currentPlaylist = 'all';
      playTrackByIndex(randomIndex);
    });

    // Initialize
    loadPlaylist();
  })();
  </script>
 </body>
</html>